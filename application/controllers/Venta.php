<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Venta extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('venta_model', 'venta');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            return;
        }
        $this->load->library('authjwt');
        $this->load->library('pagination');

    }

 // Orden de compra

            public function orden_compra($filtro = 'nuevo') {

        $data["listado_orden_compra"] = $this->venta->get_orden_compra($filtro);
        $this->load->view('layout/header_view');
        $this->load->view('biomercado/left_sidebar_biomercado_view', $data);
        $this->load->view('biomercado/venta/orden_compra_view');
        $this->load->view('layout/footer_view');
    }



                public function detalle_orden_compra($co_orden_compra) {

        $data["info_orden_compra"] = $this->venta->get_info_orden_compra($co_orden_compra);
        $data["detalle_orden_compra"] = $this->venta->get_detalle_orden_compra($co_orden_compra);
        $this->load->view('layout/header_view');
        $this->load->view('biomercado/left_sidebar_biomercado_view', $data);
        $this->load->view('biomercado/venta/detalle_orden_compra_view');
        $this->load->view('layout/footer_view');
    }


    // Calificar vendedor



            public function calificar_proceso($co_orden_compra) {


        $data["co_orden_compra"] = $co_orden_compra;
        $data["info_orden_compra"] = $this->venta->get_info_orden_compra($co_orden_compra);
        $this->load->view('biomercado/venta/calificar_usuario_modal_view', $data);

    }


            public function ejecutar_calificacion() {
        $error               = 0;
        $message             = '';
        $co_orden_compra = $this->input->post('co_orden_compra');
        $ca_calificacion = $this->input->post('ca_calificacion');
        $tx_observacion = $this->input->post('tx_observacion');
        $info_orden_compra = $this->venta->get_info_orden_compra($co_orden_compra);

        if ($error == 0) {
            $this->venta->ejecutar_calificacion_model($co_orden_compra, $ca_calificacion, $info_orden_compra->co_partner_vendedor, $info_orden_compra->co_usuario_vendedor, $tx_observacion);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }



            public function cancelar_orden_compra() {
        $error               = 0;
        $message             = '';
        $co_orden_compra = $this->input->post('co_orden_compra');

        if ($error == 0) {
            $this->venta->cancelar_orden_compra_model($co_orden_compra);
            $message .= 'Orden cancelada';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }




            public function confirmar_orden_compra() {
        $error               = 0;
        $message             = '';
        $co_orden_compra = $this->input->post('co_orden_compra');

        if ($error == 0) {
            $this->venta->confirmar_orden_compra_model($co_orden_compra);
            $message .= 'Orden cancelada';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

    
            public function remover_orden_compra() {
        $error               = 0;
        $message             = '';
        $co_orden_compra = $this->input->post('co_orden_compra');

        if ($error == 0) {
            $this->venta->remover_orden_compra_model($co_orden_compra);
            $message .= 'Removido';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }



    

}
?>