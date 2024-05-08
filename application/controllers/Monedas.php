<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Monedas extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('monedas_model', 'monedas');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            return;
        }

    }
    public function index() {
        $data['listado_monedas'] = $this->monedas->get_monedas();
        $this->load->view('layout/header_view');
        $this->load->view('monedas/monedas_main_view', $data);
        $this->load->view('layout/footer_view');
    }
    // Ajustar moneda
    public function editar_moneda($co_moneda) {
        $data['co_moneda']   = $co_moneda;
        $data['info_moneda'] = $this->monedas->get_info_moneda($co_moneda);
        $data['info_moneda_tasa_cambio'] = $this->monedas->get_info_moneda_tasa_cambio($co_moneda);
        $this->load->view('layout/header_view');
        $this->load->view('monedas/ajustar_monedas_view', $data);
        $this->load->view('layout/footer_view');
    }
    // Agregar moneda
    public function actualizar_moneda() {
        $error               = 0;
        $message             = '';
        $co_moneda         = trim($this->input->post('co_moneda'));
        $nb_moneda = trim($this->input->post('nb_moneda'));
        $nb_acronimo         = trim($this->input->post('nb_acronimo'));
        $nb_simbolo = trim($this->input->post('nb_simbolo'));
        $nu_redondeo = trim($this->input->post('nu_redondeo'));

        if ($error == 0) {
            $this->monedas->actualizar_moneda_model($co_moneda, $nb_moneda, $nb_acronimo, $nb_simbolo, $nu_redondeo);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }
    // Nuevo moneda
    public function nuevo_moneda() {
        $this->load->view('layout/header_view');
        $this->load->view('monedas/nuevo_monedas_view');
        $this->load->view('layout/footer_view');

    }
    // Agregar moneda
    public function agregar_nuevo_moneda() {
        $error               = 0;
        $message             = '';
        $nb_moneda = trim($this->input->post('nb_moneda'));
        $nb_acronimo         = trim($this->input->post('nb_acronimo'));
        $nb_simbolo = trim($this->input->post('nb_simbolo'));
        $nu_redondeo = trim($this->input->post('nu_redondeo'));

        if ($error == 0) {
            $this->monedas->agregar_moneda_model($nb_moneda, $nb_acronimo, $nb_simbolo, $nu_redondeo);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }
    // Eliminar moneda
    public function eliminar_moneda() {
        $error       = 0;
        $message     = '';
        $co_moneda = trim($this->input->post('co_moneda'));
        if ($error == 0) {
            $this->monedas->eliminar_moneda_model($co_moneda);
            $message .= 'Eliminado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }



    public function editar_moneda_tasa_cambio($co_tasa_cambio) {
        $data['co_moneda']   = $co_moneda;
        $data['info_moneda'] = $this->monedas->get_info_moneda($co_moneda);
        $data['info_moneda_tasa_cambio'] = $this->monedas->get_info_moneda_tasa_cambio($co_moneda);
        $this->load->view('layout/header_view');
        $this->load->view('monedas/ajustar_monedas_view', $data);
        $this->load->view('layout/footer_view');
    }


        public function editar_tasa_cambio($co_tasa_cambio, $co_moneda) {
        $data['co_moneda']   = $co_moneda;
        $data['co_tasa_cambio']   = $co_tasa_cambio;
        $data['listado_monedas'] = $this->monedas->get_monedas();
        $data['info_tasa_cambio'] = $this->monedas->get_info_tasa_cambio($co_tasa_cambio);
        $this->load->view('monedas/tasa_cambio/form_editar_tasa_cambio_view', $data);
    }


    // Agregar moneda
    public function actualizar_tasa_cambio() {
        $error               = 0;
        $message             = '';
        $co_moneda = trim($this->input->post('co_moneda'));
        $co_tasa_cambio         = trim($this->input->post('co_tasa_cambio'));
        $co_moneda_tasa_cambio = trim($this->input->post('co_moneda_tasa_cambio'));
        $ca_tasa_cambio = trim($this->input->post('ca_tasa_cambio'));

        if ($error == 0) {
            $this->monedas->actualizar_tasa_cambio_model($co_moneda, $co_tasa_cambio, $co_moneda_tasa_cambio, $ca_tasa_cambio);
            $message .= 'Tasa de cambio actualizada';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


        public function nueva_tasa_cambio($co_moneda) {
        $data['co_moneda']   = $co_moneda;
        $data['listado_monedas'] = $this->monedas->get_monedas();
        $this->load->view('monedas/tasa_cambio/form_agregar_tasa_cambio_view', $data);
    }


        // Agregar moneda
    public function agregar_tasa_cambio() {
        $error               = 0;
        $message             = '';
        $co_moneda = trim($this->input->post('co_moneda'));
        $co_moneda_tasa_cambio = trim($this->input->post('co_moneda_tasa_cambio'));
        $ca_tasa_cambio = trim($this->input->post('ca_tasa_cambio'));

        if ($error == 0) {
            $this->monedas->agregar_tasa_cambio_model($co_moneda, $co_moneda_tasa_cambio, $ca_tasa_cambio);
            $message .= 'Tasa de cambio agregada';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

    
}
?>