<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cuenta_banco extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Cuenta_banco_model', 'cuenta_banco');


        $this->load->model('cuenta_model');
        $this->load->model('partner_model');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            return;
        }
                $this->load->library(array(
            'pagos_library' 
        ));


    }
    public function index() {
        $data['list_cuenta_banco'] = $this->cuenta_banco->get_cuenta_banco_model();
        $data['info_usuario'] = $this->cuenta_model->get_info_usuario();
        $data["partner"] = $this->partner_model->get_partner();
        $this->load->view('layout/header_view', $data);
        $this->load->view('cuenta_banco/cuenta_banco_main_view');
        $this->load->view('layout/footer_view');
    }


    // Crae orden_compra
    public function crear_cuenta_banco() {
        $data['list_cuenta_banco'] = $this->cuenta_banco->get_cuenta_banco_model();
        $data['info_usuario'] = $this->cuenta_model->get_info_usuario();
        $data['list_banco'] = $this->cuenta_banco->get_banco_model();
        $data['list_moneda'] = $this->cuenta_banco->get_moneda_model();
               $this->load->view('layout/header_view', $data);
       
        $this->load->view('cuenta_banco/add/form_agregar_cuenta_banco_view');
        $this->load->view('layout/footer_view');
    }

        public function editar_cuenta_banco($co_cuenta_banco) {
        $data['list_cuenta_banco'] = $this->cuenta_banco->get_cuenta_banco_model();
        $data['info_usuario'] = $this->cuenta_model->get_info_usuario();
        $data['info_cuenta_banco'] = $this->cuenta_banco->get_info_cuenta_banco_model($co_cuenta_banco);
        $data['list_banco'] = $this->cuenta_banco->get_banco_model();
        $data['list_moneda'] = $this->cuenta_banco->get_moneda_model();
        $data['co_cuenta_banco'] = $co_cuenta_banco;
        $this->load->view('layout/header_view', $data);
       
        $this->load->view('cuenta_banco/edit/form_editar_cuenta_banco_view');
        $this->load->view('layout/footer_view');
    }

    

    public function guardar_cuenta_banco_base() {
        $error           = 0;
        $message         = '';
        $nu_cuenta       = trim($this->input->post('nu_cuenta'));
        $tx_tipo_cuenta  = trim($this->input->post('tx_tipo_cuenta'));
        $tx_id_titular   = trim($this->input->post('tx_id_titular'));
        $tx_nb_titular   = trim($this->input->post('tx_nb_titular'));
        $nb_diario   = trim($this->input->post('nb_diario'));
        $tx_tipo_diario   = trim($this->input->post('tx_tipo_diario'));
        $co_banco   = trim($this->input->post('co_banco'));
        $tx_email   = trim($this->input->post('tx_email'));
        $tx_descripcion   = trim($this->input->post('tx_descripcion'));
        $co_moneda   = trim($this->input->post('co_moneda'));
        // Cuenta existente
        if ($nu_cuenta != ''):
        $cuenta_bancaria = $this->cuenta_banco->get_numero_cuenta($nu_cuenta);
        if ($cuenta_bancaria->num_rows() > 0):
            $message .= 'Numero de cuenta ya registrado';
            $error++;
        endif;
        endif;

        // Validacion 1
        if ($error == 0) {
            $info_cuenta = $this->cuenta_banco->guardar_cuenta_banco_base_model($nu_cuenta, $tx_tipo_cuenta, $tx_id_titular, $tx_nb_titular, $co_banco, $nb_diario, $tx_tipo_diario, $tx_email, $tx_descripcion, $co_moneda);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }



    public function editar_cuenta_banco_base() {
        $error           = 0;
        $message         = '';
        $co_cuenta_banco       = trim($this->input->post('co_cuenta_banco'));
        $nu_cuenta       = trim($this->input->post('nu_cuenta'));
        $tx_tipo_cuenta  = trim($this->input->post('tx_tipo_cuenta'));
        $tx_id_titular   = trim($this->input->post('tx_id_titular'));
        $tx_nb_titular   = trim($this->input->post('tx_nb_titular'));
        $nb_diario   = trim($this->input->post('nb_diario'));
        $tx_tipo_diario   = trim($this->input->post('tx_tipo_diario'));
        $co_banco   = trim($this->input->post('co_banco'));
        $tx_email   = trim($this->input->post('tx_email'));
        $tx_descripcion   = trim($this->input->post('tx_descripcion'));
        $co_moneda   = trim($this->input->post('co_moneda'));
        // Cuenta existente
        /*$cuenta_bancaria = $this->cuenta_banco->get_numero_cuenta($nu_cuenta);
        if ($cuenta_bancaria->num_rows() > 0):
            $message .= 'Numero de cuenta ya registrado';
            $error++;
        endif; */

        // Validacion 1
        if ($error == 0) {
            $this->cuenta_banco->editar_cuenta_banco_base_model($co_cuenta_banco, $nu_cuenta, $tx_tipo_cuenta, $tx_id_titular, $tx_nb_titular, $co_banco, $nb_diario, $tx_tipo_diario, $tx_email, $tx_descripcion, $co_moneda);
            $message .= 'Actualizado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }
    // Pago
    function financiero($co_cuenta_banco) {
        $data['info_cuenta_banco'] = $this->cuenta_banco->get_info_cuenta_banco_model($co_cuenta_banco);
        $data['lista_movimiento_banco']       = $this->cuenta_banco->get_financiero_model($co_cuenta_banco);
        $data['co_cuenta_banco']   = $co_cuenta_banco;
        

               $this->load->view('layout/header_view', $data);
       
        $this->load->view('cuenta_banco/financiero/financiero_view');
        $this->load->view('layout/footer_view');
    }


    public function agregar_financiero_cuenta_banco() {
        $error             = 0;
        $in_verificado     = 0;
        $message           = '';
        $co_cuenta_banco   = $this->input->post('co_cuenta_banco');
        $nu_referencia     = trim($this->input->post('nu_referencia'));
        $ca_pago           = trim($this->input->post('ca_pago'));
        $ff_pago           = trim($this->input->post('ff_pago'));
        $tx_observacion           = trim($this->input->post('tx_observacion'));
        // Validar si esta repetido
        $info_cuenta_banco = $this->cuenta_banco->verificar_financiero_cuenta_banco_model($co_cuenta_banco, $nu_referencia);
        if ($info_cuenta_banco->num_rows() > 0):
            $message .= 'El numero de referencia ya existe para esta cuenta';
            $error++;
        endif;
        if ($error == 0) {
            $in_verificado = $this->cuenta_banco->agregar_financiero_cuenta_banco_model($co_cuenta_banco, $nu_referencia, $ca_pago, $ff_pago, $tx_observacion);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'in_verificado' => $in_verificado,
            'message' => $message
        );
        echo json_encode($arreglo);
    }
    // Eliminar avance financiero
    function eliminar_financiero() {
        $error                = 0;
        $message              = '';
        $co_avance_financiero = trim($this->input->post('co_avance_financiero'));
        // Validacion 1 Verificar el pago no sea mayor al restante
        if ($error == 0) {
            $this->cuenta_banco->eliminar_financiero_model($co_avance_financiero);
            $message .= 'agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }
    // Adjjuntar archivos
    public function adjuntar_archivo_cuenta_banco_financiero($co_cuenta_banco_financiero) {
        $data['co_cuenta_banco_financiero'] = $co_cuenta_banco_financiero;
        $this->load->view('cuenta_banco/financiero/financiero_form_adjuntar_archivo_view', $data);
    }
    // Guardar archivo
    function guardar_archivo_cuenta_banco_financiero($co_cuenta_banco_financiero) {
        $archivo = $_FILES['file'];
        $temp    = $archivo["tmp_name"];
        $name    = $archivo["name"];
        $conca   = $co_cuenta_banco_financiero . 'cuenta_banco_financiero' . $name;
        $this->cuenta_banco->guardar_archivo_cuenta_banco_financiero_model($co_cuenta_banco_financiero, $conca);
        move_uploaded_file($temp, "archivos/cuentas/$conca");
    }
    // Pagos
    public function listado_pagos() {
        $data['lista_movimiento_banco'] = $this->cuenta_banco->get_listado_pagos_model();
               $this->load->view('layout/header_view', $data);
       
        $this->load->view('cuenta_banco/pagos/listado_pagos_view');
        $this->load->view('layout/footer_view');

    }
    // Ver cuentas bancarias modal
    public function ver_cuenta_bancaria_pago($co_orden_compra_avance_financiero, $co_cuenta_banco) {
        $data['co_orden_compra_avance_financiero'] = $co_orden_compra_avance_financiero;
        $data['co_cuenta_banco']                   = $co_cuenta_banco;
        $data['info_orden_avance_financiero']              = $this->cuenta_banco->get_ver_cuenta_bancaria_pago_info_model($co_orden_compra_avance_financiero);
        $data['cuenta_bancaria_pago']              = $this->cuenta_banco->get_ver_cuenta_bancaria_pago_model($co_cuenta_banco);
        $data['informacion_cuenta']              = $this->cuenta_banco->get_info_cuenta_banco_model($co_cuenta_banco);

        $this->load->view('cuenta_banco/pagos/ver_cuenta_bancaria_pago_view', $data);
    }
    // Reload
    public function reload_ver_cuenta_bancaria_pago($co_cuenta_banco) {
        $data['cuenta_bancaria_pago'] = $this->cuenta_banco->get_ver_cuenta_bancaria_pago_model($co_cuenta_banco);
        $this->load->view('cuenta_banco/pagos/reload_tabla_ver_cuenta_bancaria_pago_view', $data);
    }
    // Asociar pagos
    function asociar_pago_ejecutar() {
        $error                             = 0;
        $message                           = '';
        $co_cuenta_banco_financiero        = trim($this->input->post('co_cuenta_banco_financiero'));
        $co_orden_compra_avance_financiero = trim($this->input->post('co_orden_compra_avance_financiero'));
        // Validacion 1 Verificar el pago no sea mayor al restante
        if ($error == 0) {
            $this->cuenta_banco->asociar_pago_ejecutar_model($co_cuenta_banco_financiero, $co_orden_compra_avance_financiero);
            $message .= 'agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }
     // Resumen financiero
    function ver_estado_cuenta($co_cuenta_banco) {
        $data['info_cuenta_banco'] = $this->cuenta_banco->get_info_cuenta_banco_model($co_cuenta_banco);
        $data['lista_movimiento_banco'] = $this->cuenta_banco->info_estado_cuenta_model($co_cuenta_banco);

       $this->load->view('layout/header_view', $data);
       
        $this->load->view('cuenta_banco/pagos/estado_cuenta_banco_view');
        $this->load->view('layout/footer_view');
    }

    
     function confirma_pago() {
        $error                = 0;
        $message              = '';
        $co_cuenta_banco_pago = trim($this->input->post('co_cuenta_banco_pago'));
        // Validacion 1 Verificar el pago no sea mayor al restante
        if ($error == 0) {
            $this->cuenta_banco->confirma_pago_model($co_cuenta_banco_pago);
            $message .= 'Pago confirmado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


     function rechazar_pago() {
        $error                = 0;
        $message              = '';
        $co_cuenta_banco_pago = trim($this->input->post('co_cuenta_banco_pago'));
        // Validacion 1 Verificar el pago no sea mayor al restante
        if ($error == 0) {
            $this->cuenta_banco->rechazar_pago_model($co_cuenta_banco_pago);
            $message .= 'Pago rechazado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

         function eliminar_pago() {
        $error                = 0;
        $message              = '';
        $co_cuenta_banco_pago = trim($this->input->post('co_cuenta_banco_pago'));
        // Validacion 1 Verificar el pago no sea mayor al restante
        if ($error == 0) {
            $this->cuenta_banco->eliminar_pago_model($co_cuenta_banco_pago);
            $message .= 'Pago eliminado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

    
}
?>