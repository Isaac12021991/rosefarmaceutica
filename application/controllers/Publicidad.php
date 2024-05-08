<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Publicidad extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('publicidad_model', 'publicidad_model');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            return;
        }
        $this->load->library('excel');
        $this->load->library('pagination');
        $this->load->library('encrypt');


    }
    public function index() {


        $params = array();
        $limit_per_page = 100;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $total_records = $this->publicidad_model->get_total();

                    if ($total_records > 0) 
        {
            // get current page records
            $data["listado_publicaciones"] = $this->publicidad_model->get_publicaciones($limit_per_page, $start_index*$limit_per_page);
            
            $config['base_url'] = base_url() . "publicidad/index";
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;

            $config['num_links'] = 5;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;

             
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';             
            $config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['next_link'] = '<i class="fa fa-angle-right"></i>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="javascript:;">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
             
            $this->pagination->initialize($config);

            $data["links"] = $this->pagination->create_links();
        }else{

        $data["listado_publicaciones"] = $this->publicidad_model->get_publicaciones($limit_per_page, $start_index*$limit_per_page);

        }


        $this->load->view('layout/header_view');
        $this->load->view('publicidad/publicidad_main_view', $data);
        $this->load->view('layout/footer_view');
    }
    // Ajustar producto
    public function nueva_publicidad() {
        $data['ubicacion'] = $this->publicidad_model->get_estados();
        $this->load->view('layout/header_view');
        $this->load->view('publicidad/nueva_publicidad_view', $data);
        $this->load->view('layout/footer_view');

    }

    public function nueva_publicidad_industrial() {
        $data['ubicacion'] = $this->publicidad_model->get_estados();
        $data['producto_publicaciones'] = $this->publicidad_model->get_producto_publicaciones();
        $this->load->view('layout/header_view');
        $this->load->view('publicidad/nueva_publicidad_industrial_view', $data);
        $this->load->view('layout/footer_view');

    }

    public function agregar_nueva_publicidad() {
        $error               = 0;
        $message             = '';

        $tx_descripcion      = trim($this->input->post('tx_descripcion'));
        $ca_dias      = trim($this->input->post('ca_dias'));
        $tx_link_dirigir      = trim($this->input->post('tx_link_dirigir'));
        $tx_link      = trim($this->input->post('tx_link'));
        $nb_estado      = trim($this->input->post('nb_estado'));
        $nombre_archivo = '';

        if($this->ion_auth->in_empresa_activado() == 0):

            $message = "Empresa no verificada, por favor pongase en contacto con nosotros para <b>verificar su empresa</b>";
            $error ++;     

        endif;

        // publicidad



                if (isset($_FILES['mi_archivo']['name'])):

        $mi_archivo_2 = $_FILES['mi_archivo']['name'];

        $ext = pathinfo($mi_archivo_2, PATHINFO_EXTENSION);
        $nombre_archivo_guardar = $this->encrypt->encode($mi_archivo_2);
        $nombre_archivo_guardar = str_replace('=','', $nombre_archivo_guardar);
        $nombre_archivo_guardar = str_replace('/','', $nombre_archivo_guardar); 
        $nombre_archivo = base_url().'img/publicidad/'.$nombre_archivo_guardar.'.'.$ext;

        $mi_archivo = 'mi_archivo';
        $config['upload_path'] = "img/publicidad";
        $config['file_name'] = $nombre_archivo_guardar.'.'.$ext;
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "3000";
        $config['max_width'] = "3000";
        $config['max_height'] = "3000";

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();

            $message = $this->upload->display_errors();
            $error ++;

        }else{

            $data['uploadSuccess'] = $this->upload->data();

        }


        endif;


        if ($error == 0) {
            $this->publicidad_model->agregar_nueva_publicidad_model($tx_descripcion, $ca_dias, $tx_link_dirigir, $tx_link, $nombre_archivo, $nb_estado);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

        public function agregar_nueva_publicidad_industrial() {
        $error               = 0;
        $message             = '';

        $co_producto_publicaciones      = trim($this->input->post('co_producto_publicaciones'));
        $tx_descripcion      = trim($this->input->post('tx_descripcion'));
        $ca_dias      = trim($this->input->post('ca_dias'));
        $nb_estado      = trim($this->input->post('nb_estado'));

        if($this->ion_auth->in_empresa_activado() == 0):

            $message = "Empresa no verificada, por favor pongase en contacto con nosotros para <b>verificar su empresa</b>";
            $error ++;     

        endif;


        if ($error == 0) {
            $this->publicidad_model->agregar_nueva_publicidad_industrial_model($tx_descripcion, $ca_dias, $nb_estado, $co_producto_publicaciones);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }





    public function editar_publicidad($co_publicidad) {

        $data['info_publicidad'] = $this->publicidad_model->get_info_publicidad($co_publicidad);
        $data['ubicacion'] = $this->publicidad_model->get_estados();
        $this->load->view('layout/header_view');
        $this->load->view('publicidad/editar_publicidad_view', $data);
        $this->load->view('layout/footer_view');

    }


    public function editar_publicidad_industrial($co_publicidad) {

        $data['info_publicidad'] = $this->publicidad_model->get_info_publicidad($co_publicidad);
        $data['ubicacion'] = $this->publicidad_model->get_estados();
        $data['producto_publicaciones'] = $this->publicidad_model->get_producto_publicaciones();
        $this->load->view('layout/header_view');
        $this->load->view('publicidad/editar_publicidad_industrial_view', $data);
        $this->load->view('layout/footer_view');

    }


        public function ejecutar_editar_nueva_publicidad_industrial() {
        $error               = 0;
        $message             = '';

        $co_publicidad      = trim($this->input->post('co_publicidad'));
        $co_producto_publicaciones      = trim($this->input->post('co_producto_publicaciones'));
        $tx_descripcion      = trim($this->input->post('tx_descripcion'));
        $ca_dias      = trim($this->input->post('ca_dias'));
        $nb_estado      = trim($this->input->post('nb_estado'));

        if($this->ion_auth->in_empresa_activado() == 0):

            $message = "Empresa no verificada, por favor pongase en contacto con nosotros para <b>verificar su empresa</b>";
            $error ++;     

        endif;


        if ($error == 0) {
            $this->publicidad_model->ejecutar_editar_nueva_publicidad_industrial_model($tx_descripcion, $ca_dias, $nb_estado, $co_producto_publicaciones, $co_publicidad);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


    public function ejecutar_editar_publicidad() {
        $error               = 0;
        $message             = '';

        $co_publicidad      = trim($this->input->post('co_publicidad'));
        $tx_descripcion      = trim($this->input->post('tx_descripcion'));
        $ca_dias      = trim($this->input->post('ca_dias'));
        $tx_link_dirigir      = trim($this->input->post('tx_link_dirigir'));
        $tx_link      = trim($this->input->post('tx_link'));
        $nb_estado      = trim($this->input->post('nb_estado'));
        $nombre_archivo = '';

        if($this->ion_auth->in_empresa_activado() == 0):
            $message = "Empresa no verificada, por favor pongase en contacto con nosotros para <b>verificar su empresa</b>";
            $error ++;     
        endif;

                if (isset($_FILES['mi_archivo']['name'])):

        $mi_archivo_2 = $_FILES['mi_archivo']['name'];

        $ext = pathinfo($mi_archivo_2, PATHINFO_EXTENSION);
        $nombre_archivo_guardar = $this->encrypt->encode($mi_archivo_2);
        $nombre_archivo_guardar = str_replace('=','', $nombre_archivo_guardar);
        $nombre_archivo_guardar = str_replace('/','', $nombre_archivo_guardar); 
        $nombre_archivo = base_url().'img/publicidad/'.$nombre_archivo_guardar.'.'.$ext;

        $mi_archivo = 'mi_archivo';
        $config['upload_path'] = "img/publicidad";
        $config['file_name'] = $nombre_archivo_guardar.'.'.$ext;
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "3000";
        $config['max_width'] = "3000";
        $config['max_height'] = "3000";

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();

            $message = $this->upload->display_errors();
            $error ++;

        }else{
            $data['uploadSuccess'] = $this->upload->data();
        }

        endif;


        if ($error == 0) {
            $this->publicidad_model->ejecutar_editar_publicidad_model($co_publicidad, $tx_descripcion, $ca_dias, $tx_link_dirigir, $tx_link, $nombre_archivo, $nb_estado);
            $message .= 'Editado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


            public function eliminar_publicidad() {
        $error               = 0;
        $message             = '';
        $co_publicidad = trim($this->input->post('co_publicidad'));

        if ($error == 0) {
            $this->publicidad_model->eliminar_publicidad_model($co_publicidad);
            $message .= 'Eliminado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

    

  public function pago($co_publicidad, $ca_presupuesto) {

        $data["co_publicidad"] = $co_publicidad;
        $data["ca_presupuesto"] = $ca_presupuesto;
        $data["info_publicidad"] = $this->publicidad_model->get_info_publicidad($co_publicidad);
        $this->load->view('layout/header_view', $data);
        $this->load->view('publicidad/pago_view');
        $this->load->view('layout/footer_view');
    }

        public function agregar_pago() {
        $error               = 0;
        $message             = '';
        $ff_pago = trim($this->input->post('ff_pago'));
        $ca_pago        = trim($this->input->post('ca_pago'));
        $ca_pago_bolivar      = trim($this->input->post('ca_pago_bolivar'));
        $co_publicidad      = trim($this->input->post('co_publicidad'));
        $tx_descripcion      = trim($this->input->post('tx_descripcion'));
        $nombre_archivo = '';

        // Foto

        if (isset($_FILES['mi_archivo']['name'])):

        $mi_archivo_2 = $_FILES['mi_archivo']['name'];

        $ext = pathinfo($mi_archivo_2, PATHINFO_EXTENSION);
        $nombre_archivo_guardar = $this->encrypt->encode($mi_archivo_2);
        $nombre_archivo_guardar = str_replace('=','', $nombre_archivo_guardar);
        $nombre_archivo_guardar = str_replace('/','', $nombre_archivo_guardar); 
        $nombre_archivo = base_url().'img/pago_publicidad/'.$mi_archivo_2;

        $mi_archivo = 'mi_archivo';
        $config['upload_path'] = "img/pago_publicidad";
        $config['file_name'] = $nombre_archivo_guardar.'.'.$ext;
        $config['allowed_types'] = "*";
        $config['max_size'] = "3000";
        $config['max_width'] = "3000";
        $config['max_height'] = "3000";

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();

            $message = $this->upload->display_errors();
            $error ++;

        }else{

            $data['uploadSuccess'] = $this->upload->data();

        }


        endif;


        if ($error == 0) {
            $this->publicidad_model->agregar_pago_model($ff_pago, $ca_pago, $ca_pago_bolivar, $co_publicidad, $nombre_archivo, $tx_descripcion);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


        public function eliminar_pago() {
        $error               = 0;
        $message             = '';
        $co_pago = trim($this->input->post('co_pago'));

        if ($error == 0) {
            $this->publicidad_model->eliminar_pago_model($co_pago);
            $message .= 'Eliminado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

                public function detener_publicidad() {
        $error               = 0;
        $message             = '';
        $co_publicidad = trim($this->input->post('co_publicidad'));

        if ($error == 0) {
            $this->publicidad_model->detener_publicidad_model($co_publicidad);
            $message .= 'Detenido';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


                    public function activar_publicidad() {
        $error               = 0;
        $message             = '';
        $co_publicidad = trim($this->input->post('co_publicidad'));

        if ($error == 0) {
            $this->publicidad_model->activar_publicidad_model($co_publicidad);
            $message .= 'Activo';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }
    

        

}
?>