<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Membresia extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('membresia_model', 'membresia');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            return;
        }
        $this->load->library('authjwt');
        $this->load->library('membresia_library');
        $this->load->library('encrypt');

    }

    public function index() {
        $data["membresia_precios"] = $this->membresia->get_membresias();
        $data["membresia_pagos"] = $this->membresia->get_pagos_membresias();
        $this->load->view('layout/header_view', $data);
        $this->load->view('membresia/membresia_main_view');
        $this->load->view('layout/footer_view');
    }


        public function pago($co_membresia, $ca_precio) {

        $data["co_membresia"] = $co_membresia;
        $data["ca_precio"] = $ca_precio;
        $data["info_membresia"] = $this->membresia->get_membresias_row($co_membresia);
        $data["list_cuenta_banco"] = $this->membresia->get_cuenta_banco();
        $data["list_forma_pago"] = $this->membresia->get_forma_pago();
        $this->load->view('layout/header_view', $data);
        $this->load->view('membresia/pago_view');
        $this->load->view('layout/footer_view');
    }

        public function agregar_pago() {
        $error               = 0;
        $message             = '';
        $ff_pago = trim($this->input->post('ff_pago'));
        $ca_pago        = trim($this->input->post('ca_pago'));
        $ca_pago_bolivar      = trim($this->input->post('ca_pago_bolivar'));
        $ca_mes      = trim($this->input->post('ca_mes'));
        $co_membresia      = trim($this->input->post('co_membresia'));
        $tx_descripcion      = trim($this->input->post('tx_descripcion'));
        $co_diario        = trim($this->input->post('co_diario'));
        $nb_forma_pago        = trim($this->input->post('nb_forma_pago'));
        $nombre_archivo = '';

        // Foto

                if (isset($_FILES['mi_archivo']['name'])):

        $mi_archivo_2 = $_FILES['mi_archivo']['name'];

        $ext = pathinfo($mi_archivo_2, PATHINFO_EXTENSION);
        $nombre_archivo_guardar = $this->encrypt->encode($mi_archivo_2);
        $nombre_archivo_guardar = str_replace('=','', $nombre_archivo_guardar);
        $nombre_archivo_guardar = str_replace('/','', $nombre_archivo_guardar); 
        $nombre_archivo = base_url().'img/pago_membresia/'.$nombre_archivo_guardar.'.'.$ext;

        $mi_archivo = 'mi_archivo';
        $config['upload_path'] = "img/pago_membresia";
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
            $this->membresia->agregar_pago_model($ff_pago, $ca_pago, $ca_pago_bolivar, $ca_mes, $co_membresia, $nombre_archivo, $tx_descripcion, $co_diario, $nb_forma_pago);
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
            $this->membresia->eliminar_pago_model($co_pago);
            $message .= 'Eliminado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }
        



    

}
?>