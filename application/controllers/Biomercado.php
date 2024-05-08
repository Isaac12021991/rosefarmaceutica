<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Biomercado extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('biomercado_model', 'biomercado');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            return;
        }
        $this->load->library('authjwt');
        $this->load->library('pagination');
        $this->load->library('publicidad_library');
    }

    public function info_compra_general()
    {
        echo $this->biomercado_library->get_info_comprado_general();  
    }

    public function cartelera() {

        $tx_buscar = '';
        $tx_buscar     = trim($this->input->get('tx_buscar'));

        $nb_estado     = trim($this->input->get('nb_estado'));
        $nb_producto     = trim($this->input->get('nb_producto'));
        $nb_categoria     = trim($this->input->get('nb_categoria'));
        $ordenar     = trim($this->input->get('ordenar'));

        if($nb_categoria != ''):

            $filtro_categoria_query = "and nb_categoria = '$nb_categoria'";

            else:

                $filtro_categoria_query = "";

        endif;

        if($nb_estado != ''):
        $filtro_estado_query = "and nb_estado in ('".$nb_estado."')";
        else:

            $info_estados_buscar = $this->biomercado->get_estados_ubicacion();
            
            $red_final_region    = "";
            foreach ($info_estados_buscar->result() as $row):

            $red_region       = $row->nb_estado . "', '";
            $red_final_region = $red_final_region . $red_region;
            endforeach;
            $red_final_region           = substr($red_final_region, 0, -3);
            $red_final_region = "'".$red_final_region;


        $filtro_estado_query = "and nb_estado in ($red_final_region)";
        endif;


        if($ordenar == ''):
        $ordenar_query = "order by a.id desc, d.username asc";
        elseif($ordenar == 'mayor_precio'):
        $ordenar_query = "order by a.ca_precio desc, d.username asc";
        elseif($ordenar == 'menor_precio'):
        $ordenar_query = "order by a.ca_precio asc, d.username asc";
        endif;

        $params = array();
        $filtro_producto =  '';
        $limit_per_page = 100;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->biomercado->get_total($tx_buscar, $filtro_estado_query, $filtro_categoria_query);

            if ($total_records > 0) 
        {
            // get current page records
            $data["listado_publicaciones"] = $this->biomercado->get_current_page_records($limit_per_page, $start_index*$limit_per_page, $tx_buscar, $filtro_estado_query, $ordenar_query, $filtro_categoria_query);
            
            $config['base_url'] = base_url() . 'biomercado/cartelera';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;


            $config['num_links'] = 5;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;

             
            $config['full_tag_open'] = '<div class="d-flex flex-wrap py-2 mr-0">';
            $config['full_tag_close'] = '</div>';
            $config['first_link'] = '<i class="ki ki-bold-double-arrow-back icon-xs"></i>';
            $config['first_tag_open'] = ' <span class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">';
            $config['first_tag_close'] = '</span>';             
            $config['last_link'] = '<i class="ki ki-bold-double-arrow-next icon-xs"></i>';
            $config['last_tag_open'] = '<span class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">';
            $config['last_tag_close'] = '</span>';
            $config['next_link'] = '<i class="ki ki-bold-arrow-next icon-xs"></i>';
            $config['next_tag_open'] = ' <span class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">';
            $config['next_tag_close'] = '</span>';
            $config['prev_link'] = '<i class="ki ki-bold-arrow-back icon-xs"></i>';
            $config['prev_tag_open'] = ' <span class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">';
            $config['prev_tag_close'] = '</span>';
            $config['cur_tag_open'] = '<span class="btn btn-icon btn-sm border-0 btn-hover-primary active mr-2 my-1">';
            $config['cur_tag_close'] = '</span>';
            $config['num_tag_open'] = '<span class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">';
            $config['num_tag_close'] = '</span>';
             
            $this->pagination->initialize($config);

            $data["links"] = $this->pagination->create_links();
        }else{

        $data["estados"] = $this->biomercado->get_estados($limit_per_page, $start_index*$limit_per_page, $tx_buscar, $filtro_estado_query, $filtro_categoria_query);
        $data["listado_publicaciones"] = $this->biomercado->get_current_page_records($limit_per_page, $start_index*$limit_per_page, $tx_buscar, $filtro_estado_query, $ordenar_query, $filtro_categoria_query);

        }

        $data["estados"] = $this->biomercado->get_estados($limit_per_page, $start_index*$limit_per_page, $tx_buscar, $filtro_estado_query, $filtro_categoria_query);
        $data["categorias"] = $this->biomercado->get_list_categoria($limit_per_page, $start_index*$limit_per_page, $tx_buscar, $filtro_estado_query);

        $data["list_empresas_certificadas"] = $this->biomercado->get_list_empresas_certificadas();

        $data["ordenar"] = $ordenar;
        $data["nb_estado"] = $nb_estado;
        $data["nb_categoria"] = $nb_categoria;
        $data["tx_buscar"] = $tx_buscar;
        $this->load->view('layout/header_view');
        $this->load->view('biomercado/left_sidebar_biomercado_view', $data);
        $this->load->view('biomercado/biomercado_main_view');
        $this->load->view('layout/footer_view');
    }
    // Ajustar producto

    function reload_carro_compra()

    {
        $this->load->view('biomercado/carro/dropdown_carro_compra_view');
    }


    function imprimir_orden_compra_pdf($co_orden_compra) {
        $data['info_empresa'] = $this->empresa_library->get_info_empresa(); 
        $data["info_orden_compra"] = $this->biomercado->get_info_orden_compra($co_orden_compra);
        $data["detalle_orden_compra"] = $this->biomercado->get_detalle_orden_compra($co_orden_compra);
        $this->load->view('biomercado/orden_compra_pdf', $data);
    }



}
?>