<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Solicitud_cotizacion extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('solicitud_cotizacion_model', 'solicitud_cotizacion_model');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            return;
        }
        $this->load->library('excel');
        $this->load->library('pagination');
        $this->load->library('encrypt');
        $this->load->library('orden_compra_library');


    }
    public function index() {

        $tx_buscar = '';
        $tx_buscar     = trim($this->input->get('tx_buscar'));
        $nb_estatus = -1;
        $nb_estatus     = trim($this->input->get('nb_estatus'));

        if ($nb_estatus == ''): $nb_estatus = -1; endif;

        $params = array();
        $limit_per_page = 100;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->solicitud_cotizacion_model->get_total($tx_buscar, $nb_estatus);

                    if ($total_records > 0) 
        {
            // get current page records
$data["listado_solicitud_cotizacion"] = $this->solicitud_cotizacion_model->get_solicitud_cotizacion($limit_per_page, $start_index*$limit_per_page, $tx_buscar, $nb_estatus);
            
            $config['base_url'] = base_url() . "producto_publicaciones/index/$nb_estatus";
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

        $data["listado_solicitud_cotizacion"] = $this->solicitud_cotizacion_model->get_solicitud_cotizacion($limit_per_page, $start_index*$limit_per_page, $tx_buscar, $nb_estatus);

        }

        $data["nb_estatus"] = $nb_estatus;
        $data["tx_buscar"] = $tx_buscar;
        $this->load->view('layout/header_view');
        $this->load->view('solicitud_cotizacion/solicitud_cotizacion/solicitud_cotizacion_main_view', $data);
        $this->load->view('layout/footer_view');
    }
    // Ajustar producto
    public function nuevo_solicitud_cotizacion() {
        $data['ubicacion'] = $this->solicitud_cotizacion_model->get_estados();
        $data['username'] = $this->solicitud_cotizacion_model->get_username();
        $this->load->view('layout/header_view');
        $this->load->view('biomercado/left_sidebar_biomercado_view');
        $this->load->view('solicitud_cotizacion/solicitud_cotizacion/nuevo_solicitud_cotizacion_view', $data);
        $this->load->view('layout/footer_view');

    }


    // Agregar producto temporalmente

        public function agregar_producto_solicitud_cotizacion($co_solicitud_cotizacion = 0) {

        $data["co_solicitud_cotizacion"] = $co_solicitud_cotizacion;
        $this->load->view('solicitud_cotizacion/solicitud_cotizacion/producto/nuevo_producto_view', $data);

    }

// agregar producto


    public function ejecutar_agregar_producto() {
        $error               = 0;
        $message             = '';
        $co_solicitud_cotizacion        = trim($this->input->post('co_solicitud_cotizacion'));
        $nb_producto = trim($this->input->post('nb_producto'));
        $ca_unidades        = trim($this->input->post('ca_unidades'));



        if ($error == 0) {
            $this->solicitud_cotizacion_model->ejecutar_agregar_producto_model($co_solicitud_cotizacion, $nb_producto, $ca_unidades);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


        public function lista_productos($co_solicitud_cotizacion) {

        $data["co_solicitud_cotizacion"] = $co_solicitud_cotizacion;

        if($co_solicitud_cotizacion == 0):
        $data['lista_productos'] = $this->solicitud_cotizacion_model->get_tmp_registro();
    else:
        $data['lista_productos'] = $this->solicitud_cotizacion_model->get_lista_productos($co_solicitud_cotizacion);
    endif;

        $this->load->view('solicitud_cotizacion/solicitud_cotizacion/producto/lista_productos_view', $data);

    }
    

        public function eliminar_producto_temporal() {
        $error               = 0;
        $message             = '';
        $co_temp        = trim($this->input->post('co_temp'));
       

        if ($error == 0) {
            $this->solicitud_cotizacion_model->eliminar_producto_temporal_model($co_temp);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }



        public function eliminar_producto_solicitud_cotizacion_linea() {
        $error               = 0;
        $message             = '';
        $co_solicitud_cotizacion_linea        = trim($this->input->post('co_solicitud_cotizacion_linea'));
       

        if ($error == 0) {
            $this->solicitud_cotizacion_model->eliminar_producto_solicitud_cotizacion_linea_model($co_solicitud_cotizacion_linea);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }



    




    public function ejecutar_nuevo_solicitud_cotizacion() {
        $error               = 0;
        $message             = '';

        $nb_estatus      = trim($this->input->post('nb_estatus'));
        $ff_vencimiento      = trim($this->input->post('ff_vencimiento'));
        $nb_estado      = trim($this->input->post('nb_estado'));
        $nb_dirigido_usuario      = trim($this->input->post('nb_dirigido_usuario'));

                // Verificar si hay registro

        $temp_registro = $this->solicitud_cotizacion_model->get_tmp_registro();

        if ($temp_registro->num_rows() == 0):

            $error ++;
            $message .= "Error, Debe agregar los productos en la cotizacion"; 

        endif;
       


        if ($error == 0) {
            $this->solicitud_cotizacion_model->ejecutar_nuevo_solicitud_cotizacion_model($nb_estatus, $ff_vencimiento, $nb_estado, $nb_dirigido_usuario);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }



// editar  solicitud cotiazcion


        public function editar_solicitud_cotizacion($co_solicitud_cotizacion) {

        $data['ubicacion'] = $this->solicitud_cotizacion_model->get_estados();
        $data['info_solicitud_cotizacion'] = $this->solicitud_cotizacion_model->get_info_solicitud_cotizacion($co_solicitud_cotizacion);
        $data['co_solicitud_cotizacion'] = $co_solicitud_cotizacion;
        $data['username'] = $this->solicitud_cotizacion_model->get_username();
        $this->load->view('layout/header_view');
        $this->load->view('biomercado/left_sidebar_biomercado_view');
        $this->load->view('solicitud_cotizacion/solicitud_cotizacion/editar_solicitud_cotizacion_view', $data);
        $this->load->view('layout/footer_view');

    }




     
    public function ejecutar_editar_solicitud_cotizacion() {
        $error               = 0;
        $message             = '';

        $co_solicitud_cotizacion      = trim($this->input->post('co_solicitud_cotizacion'));
        $nb_estatus      = trim($this->input->post('nb_estatus'));
        $ff_vencimiento      = trim($this->input->post('ff_vencimiento'));
        $nb_estado      = trim($this->input->post('nb_estado'));
        $nb_dirigido_usuario      = trim($this->input->post('nb_dirigido_usuario'));

                // Verificar si hay registro

        $linea_solicitud_cotizacion_registro = $this->solicitud_cotizacion_model->get_lista_productos($co_solicitud_cotizacion);

        if ($linea_solicitud_cotizacion_registro->num_rows() == 0):

            $error ++;
            $message .= "Error, Debe agregar los productos en la cotizacion"; 

        endif;
       


        if ($error == 0) {
            $this->solicitud_cotizacion_model->ejecutar_editar_solicitud_cotizacion_model($co_solicitud_cotizacion, $nb_estatus, $ff_vencimiento, $nb_estado, $nb_dirigido_usuario);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }




            public function eliminar_solicitud_cotizacion() {
        $error               = 0;
        $message             = '';
        $co_solicitud_cotizacion = trim($this->input->post('co_solicitud_cotizacion'));

        if ($error == 0) {
            $this->solicitud_cotizacion_model->eliminar_solicitud_cotizacion_model($co_solicitud_cotizacion);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

            public function cambiar_estatus_solicitud_cotizacion() {
        $error               = 0;
        $message             = '';
        $co_solicitud_cotizacion = trim($this->input->post('co_solicitud_cotizacion'));
        $nb_estatus = trim($this->input->post('nb_estatus'));

        if ($error == 0) {
            $this->solicitud_cotizacion_model->cambiar_estatus_solicitud_cotizacion_model($co_solicitud_cotizacion, $nb_estatus);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


                  public function eliminar_solicitud_cotizacion_accion_check() {
        $error               = 0;
        $message             = '';

        $input_check = $this->input->post('input_check');

        if ($error == 0) {
            $this->solicitud_cotizacion_model->eliminar_solicitud_cotizacion_accion_check_model($input_check);
            $message .= 'Eliminado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


                  public function cambiar_estatus_solicitud_cotizacion_accion_check() {
        $error               = 0;
        $message             = '';

        $input_check = $this->input->post('input_check');
        $nb_estatus = $this->input->post('nb_estatus');

        if ($error == 0) {
            $this->solicitud_cotizacion_model->cambiar_estatus_solicitud_cotizacion_accion_check_model($input_check, $nb_estatus);
            $message .= 'Eliminado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


// Ver solicitud cotizacion


            public function ver_solicitud_cotizacion($co_solicitud_cotizacion) {

        $data['info_solicitud_cotizacion'] = $this->solicitud_cotizacion_model->get_info_solicitud_cotizacion($co_solicitud_cotizacion);
        $data['co_solicitud_cotizacion'] = $co_solicitud_cotizacion;
        $data['lista_productos'] = $this->solicitud_cotizacion_model->get_lista_productos($co_solicitud_cotizacion);

        $data['info_solicitud_cotizacion_orden_compra_todos'] = $this->solicitud_cotizacion_model->get_info_solicitud_cotizacion_orden_compra_todo($co_solicitud_cotizacion);
        
        $this->load->view('layout/header_view');
        $this->load->view('biomercado/left_sidebar_biomercado_view');
        $this->load->view('solicitud_cotizacion/solicitud_cotizacion/ver_solicitud_cotizacion_view', $data);
        $this->load->view('layout/footer_view');

    }


// CARTELERA COTIZACION


    public function cartelera_solicitud_cotizacion() {

        $tx_buscar = '';
        $tx_buscar     = trim($this->input->get('tx_buscar'));
        $nb_estado     = trim($this->input->get('nb_estado'));
        $ordenar     = trim($this->input->get('ordenar'));

        if($nb_estado != ''):
        $filtro_estado_query = "and nb_estado in ('".$nb_estado."')";
        else:

            $info_estados_buscar = $this->solicitud_cotizacion_model->get_estados_ubicacion();
            
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
        elseif($ordenar == 'reciente'):
        $ordenar_query = "order by a.id desc, d.username asc";
        elseif($ordenar == 'menos_reciente'):
        $ordenar_query = "order by a.id asc, d.username asc";
        endif;

        $params = array();
        $filtro_producto =  '';
        $limit_per_page = 100;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->solicitud_cotizacion_model->get_total_cartelera_solicitud_cotizacion($tx_buscar, $filtro_estado_query);

            if ($total_records > 0) 
        {
            // get current page records
            $data["listado_solicitud_cotizacion"] = $this->solicitud_cotizacion_model->get_solicitud_cotizacion_cartelera($limit_per_page, $start_index*$limit_per_page, $tx_buscar, $filtro_estado_query, $ordenar_query);
            
            $config['base_url'] = base_url() . 'solicitud_cotizacion/cartelera_solicitud_cotizacion';
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

        $data["estados"] = $this->solicitud_cotizacion_model->get_estados($limit_per_page, $start_index*$limit_per_page, $tx_buscar, $filtro_estado_query);
        $data["listado_solicitud_cotizacion"] = $this->solicitud_cotizacion_model->get_solicitud_cotizacion_cartelera($limit_per_page, $start_index*$limit_per_page, $tx_buscar, $filtro_estado_query, $ordenar_query);

        }

        $data["estados"] = $this->solicitud_cotizacion_model->get_estados_cartelera_solicitud_cotizacion($limit_per_page, $start_index*$limit_per_page, $tx_buscar, $filtro_estado_query);

        $data["ordenar"] = $ordenar;
        $data["nb_estado"] = $nb_estado;
        $this->load->view('layout/header_view', $data);
        $this->load->view('solicitud_cotizacion/cartelera/mercado_solicitud_main_view');
        $this->load->view('layout/footer_view');
    }

    // Crear orden compra solicitud

                public function respuesta_solicitud_cotizacion($co_solicitud_cotizacion) {

        $info_solicitud_cotizacion = $this->solicitud_cotizacion_model->get_info_solicitud_cotizacion($co_solicitud_cotizacion);

        if($info_solicitud_cotizacion->ca_orden_compra_generada > 0):
            redirect("solicitud_cotizacion/ver_solicitud_cotizacion_orden_compra/$co_solicitud_cotizacion");
        endif;

        // establecer como visto

        $this->solicitud_cotizacion_model->establecer_visto_cotizacion_model($co_solicitud_cotizacion);

        $data['info_solicitud_cotizacion']  = $info_solicitud_cotizacion;

        $data['co_solicitud_cotizacion'] = $co_solicitud_cotizacion;
        $data['lista_productos'] = $this->solicitud_cotizacion_model->get_lista_productos($co_solicitud_cotizacion);

        $data['tipo_pago'] = $this->solicitud_cotizacion_model->get_tipo_pago();
        $data['forma_entrega'] = $this->solicitud_cotizacion_model->get_forma_entrega();
        $data['forma_envio'] = $this->solicitud_cotizacion_model->get_forma_envio();
        $data['lista_moneda'] = $this->solicitud_cotizacion_model->get_monedas();
        $data['lista_forma_pago'] = $this->solicitud_cotizacion_model->get_forma_pago();
        $this->load->view('layout/header_view');
        $this->load->view('solicitud_cotizacion/orden_compra_solicitud_cotizacion/respuesta_solicitud_cotizacion_view', $data);
        $this->load->view('layout/footer_view');

    }

    // Ve solo la orden compra

            public function ver_solicitud_cotizacion_orden_compra($co_solicitud_cotizacion) {

                $info_solicitud_cotizacion = $this->solicitud_cotizacion_model->get_info_solicitud_cotizacion($co_solicitud_cotizacion);

        if($info_solicitud_cotizacion->ca_orden_compra_generada == 0):
            redirect("solicitud_cotizacion/respuesta_solicitud_cotizacion/$co_solicitud_cotizacion");
        endif;


         $data['info_solicitud_cotizacion']  = $info_solicitud_cotizacion;
        $data['co_solicitud_cotizacion'] = $co_solicitud_cotizacion;

        $data['lista_productos'] = $this->solicitud_cotizacion_model->get_lista_productos($co_solicitud_cotizacion);

        $data['tipo_pago'] = $this->solicitud_cotizacion_model->get_tipo_pago();
        $data['forma_entrega'] = $this->solicitud_cotizacion_model->get_forma_entrega();

        //  Informacion de la orden de compra

        $data['info_solicitud_cotizacion_orden_compra'] = $this->solicitud_cotizacion_model->get_info_solicitud_cotizacion_orden_compra($co_solicitud_cotizacion);


        $this->load->view('layout/header_view');
        $this->load->view('solicitud_cotizacion/orden_compra_solicitud_cotizacion/ver_solicitud_cotizacion_orden_compra_view', $data);
        $this->load->view('layout/footer_view');

    }



        public function agregar_producto_solicitud_cotizacion_orden_compra(int $co_orden_compra = null, $co_solicitud_cotizacion, $co_moneda) {

        $data["co_orden_compra"] = $co_orden_compra;
        $data["co_solicitud_cotizacion"] = $co_solicitud_cotizacion;
        $data['lista_productos_cotizacion'] = $this->solicitud_cotizacion_model->get_producto_solcititud_cotizacion($co_solicitud_cotizacion);

        $data['lista_productos_producto_publicaciones'] = $this->solicitud_cotizacion_model->get_lista_productos_producto_publicaciones($co_solicitud_cotizacion, $co_moneda);

        $this->load->view('solicitud_cotizacion/cartelera/producto/nuevo_producto_view', $data);

    }


        public function lista_productos_orden_compra(int $co_orden_compra = null, $co_solicitud_cotizacion) {

        $data["co_orden_compra"] = $co_orden_compra;
        $data["co_solicitud_cotizacion"] = $co_solicitud_cotizacion;
        $data['lista_productos_cotizacion_orden_compra'] = $this->solicitud_cotizacion_model->get_tmp_producto_solcititud_cotizacion_orden_compra($co_solicitud_cotizacion);
        $this->load->view('solicitud_cotizacion/cartelera/producto/lista_productos_view', $data);

    }

    // ejecutar_agregar_producto_orden_compra



    public function ejecutar_agregar_producto_orden_compra() {
        $error               = 0;
        $message             = '';
        $co_orden_compra        = trim($this->input->post('co_orden_compra'));
        $co_solicitud_cotizacion        = trim($this->input->post('co_solicitud_cotizacion'));
        $co_producto_publicaciones = trim($this->input->post('co_producto_publicaciones'));
        $nb_producto_solicitado = trim($this->input->post('nb_producto_solicitado'));
        $ca_unidades        = trim($this->input->post('ca_unidades'));
        $ca_precio        = trim($this->input->post('ca_precio'));
        $ff_vence        = trim($this->input->post('ff_vence'));

        //  Info del producto publicaciones
        $info_producto_publicacion = $this->solicitud_cotizacion_model->get_info_producto_publicaciones($co_producto_publicaciones);

        // verificar disponibilidad

        $ca_unidades_disponible = $this->inventario_library->get_producto_disponible($co_producto_publicaciones);

        if ($ca_unidades > $ca_unidades_disponible):

            $error ++;
            $message .= "No hay unidades disponibles, intente con menos de $ca_unidades unidades"; 

        endif;


        // Verificar si existe

        if($co_orden_compra == 0):

        $producto_existente_orden_compra = $this->solicitud_cotizacion_model->get_producto_existente_orden_compra($co_solicitud_cotizacion, $info_producto_publicacion->nb_producto);

        if ($producto_existente_orden_compra->num_rows() > 0):

            $error ++;
            $message .= "Error, Este producto ya esta registrado en esta solicitud"; 

        endif;

        endif;




        if ($error == 0) {
            $this->solicitud_cotizacion_model->ejecutar_agregar_producto_orden_compra_model($co_orden_compra, $co_solicitud_cotizacion, $info_producto_publicacion->nb_producto, $ca_unidades, $ca_precio, $ff_vence, $co_producto_publicaciones, $info_producto_publicacion->tx_descripcion);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


        public function eliminar_producto_orden_compra_temporal() {
        $error               = 0;
        $message             = '';
        $co_temp        = trim($this->input->post('co_temp'));
       

        if ($error == 0) {
            $this->solicitud_cotizacion_model->eliminar_producto_orden_compra_temporal_model($co_temp);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


            public function ver_info_producto_solicitud_cotizacion() {
        $error               = 0;
        $message             = '';
        $nb_producto_solicitado        = trim($this->input->post('nb_producto_solicitado'));
        $co_solicitud_cotizacion        = trim($this->input->post('co_solicitud_cotizacion'));
        $co_producto_publicaciones        = trim($this->input->post('co_producto_publicaciones'));

       

        if ($error == 0) {
          $info_producto_cotizacion =  $this->solicitud_cotizacion_model->ver_info_producto_solicitud_cotizacion_model($nb_producto_solicitado, $co_solicitud_cotizacion);
         $info_producto_publicaciones =  $this->solicitud_cotizacion_model->get_info_producto_publicaciones($co_producto_publicaciones);

        }
        $arreglo = array(
            'nb_producto' => $info_producto_cotizacion->nb_producto,
            'ca_unidades' => $info_producto_cotizacion->ca_unidades,
            'ca_precio' => $info_producto_publicaciones->ca_precio,
            'ff_vence' => $info_producto_publicaciones->ff_vence
        );
        echo json_encode($arreglo);
    }

    


    public function enviar_solicitud_orden_compra() {
        $error               = 0;
        $message             = '';
        $co_solicitud_cotizacion        = trim($this->input->post('co_solicitud_cotizacion'));
        $nb_forma_entrega = trim($this->input->post('nb_forma_entrega'));
        $nb_tipo_pago        = trim($this->input->post('nb_tipo_pago'));
        $nb_forma_envio = trim($this->input->post('nb_forma_envio'));
        $co_moneda        = trim($this->input->post('co_moneda'));
        $nb_forma_pago = trim($this->input->post('nb_forma_pago'));


        // Verificar listado de producto

        $temp_productos_orden_compra = $this->solicitud_cotizacion_model->get_tmp_producto_solcititud_cotizacion_orden_compra($co_solicitud_cotizacion);

        if ($temp_productos_orden_compra->num_rows() == 0):

            $error ++;
            $message .= "Error, Ingrese los productos solicitados por el comprador"; 

        endif;




        if ($error == 0) {
            $this->solicitud_cotizacion_model->enviar_solicitud_orden_compra_model($co_solicitud_cotizacion, $nb_forma_entrega, $nb_tipo_pago, $nb_forma_envio, $co_moneda, $nb_forma_pago);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }



        public function cancelar_solicitud_cotizacion_orden_compra() {
        $error               = 0;
        $message             = '';
        $co_orden_compra        = trim($this->input->post('co_orden_compra'));

        if ($error == 0) {
            $this->solicitud_cotizacion_model->cancelar_solicitud_cotizacion_orden_compra_model($co_orden_compra);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }



}
?>