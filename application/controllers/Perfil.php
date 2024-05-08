<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Perfil extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library(array(
            'form_validation'
        ));
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login');
            return;
        }
        $this->load->model('perfil_model');
    }
    public function user() {
        $data['perfil'] = $this->perfil_model->get_user_perfil();
            $this->load->view('layout/header_view');
            $this->load->view('perfil/user_perfil_view', $data);
            $this->load->view('layout/footer_view');
    }
    // Cambio de página
    public function personal() {
        $data['perfil'] = $this->perfil_model->get_user_perfil();
        $this->load->view('layout/header_view');
        $this->load->view('perfil/perfil/personal_view', $data);
        $this->load->view('layout/footer_view');
    }
    public function email() {
        $data['perfil'] = $this->perfil_model->get_user_perfil();
        $this->load->view('layout/header_view');
        $this->load->view('perfil/perfil/email_view', $data);
        $this->load->view('layout/footer_view');
    }
    public function password() {
        $data['perfil'] = $this->perfil_model->get_user_perfil();
        $this->load->view('layout/header_view');
        $this->load->view('perfil/perfil/password_view', $data);
        $this->load->view('layout/footer_view');
    }

    function update_perfil() {
        $error           = 0;
        $message         = '';
        $first_name      = trim($this->input->post('first_name'));
        $last_name       = trim($this->input->post('last_name'));
        $nb_nacionalidad = trim($this->input->post('nb_nacionalidad'));
        $nu_cedula       = trim($this->input->post('nu_cedula'));
        $ff_nacimiento   = trim($this->input->post('ff_nacimiento'));
        $phone           = trim($this->input->post('phone'));
        if ($first_name == '') {
            $message .= 'Ingrese el nombre de usuario<br>';
            $error++;
            # code...
        }
        if ($last_name == '') {
            $message .= 'Ingrese el apellido de usuario<br>';
            $error++;
            # code...
        }
        if ($nu_cedula == '') {
            $message .= 'Ingrese la cedula del usuario<br>';
            $error++;
        }
        if ($phone == '') {
            $message .= 'Ingrese un número telefonico<br>';
            $error++;
        }
        if ((!is_numeric($nu_cedula) or $nu_cedula <= 0)) {
            $message .= 'Ingrese un numero de cedula válidado<br>';
            $error++;
        }
        if ((!is_numeric($phone) or $phone <= 0)) {
            $message .= 'Ingrese un numero de telefono válidado<br>';
            $error++;
        }
        if ($error == 0) {
            $message .= $this->perfil_model->update_perfil_model($first_name, $last_name, $nb_nacionalidad, $nu_cedula, $ff_nacimiento, $phone);
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }
    function generar_codigo() {
        $email   = $this->input->post('email');
        $user    = $this->ion_auth->user_id();
        $error   = 0;
        $message = '';
        // Validacion 1
        $sql     = "SELECT a.* from lu_users as a 
    where a.id <> '$user' and a.email = '$email'
    limit 1";
        $query   = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $error++;
            $message .= 'El email ya existe en el sistema';
        }
        if ($error == 0) {
            $message .= $this->perfil_model->generar_codigo_model();
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }
    function verificar_codigo() {
        $user    = $this->ion_auth->user_id();
        $existe  = 0;
        $message = '';
        // Validacion 2
        $sql     = "SELECT a.* from lu_users as a where a.id = '$user' AND a.tx_new_email NOTNULL ";
        $query   = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $existe++;
        }
        if ($existe == 1) {
            $message .= $this->perfil_model->verificar_codigo_model();
        }
        $arreglo = array(
            'existe' => $existe,
            'message' => $message
        );
        echo json_encode($arreglo);
    }
    function change_email_user() {
        $user                      = $this->ion_auth->user_id();
        $co_verificacion           = $this->input->post('co_verificacion');
        $co_verificacion_new_email = $this->input->post('co_verificacion_new_email');
        $error                     = 0;
        $message                   = '';
        // Validacion 1
        $sql                       = "SELECT a.* from lu_users as a where a.id = '$user' and CURRENT_DATE() = a.ff_verificacion and a.in_verificacion_new_email = '$co_verificacion_new_email' and a.in_verificacion = '$co_verificacion'";
        $query                     = $this->db->query($sql);
        if ($query->num_rows() == 0) {
            $error++;
            $message .= 'El código ingresado es invalido';
        }
        if ($error == 0) {
            $message .= $this->perfil_model->change_email_user_model();
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }
    // Contraseña
    public function update_change_seguridad() {
        $arreglo = $this->perfil_model->update_change_seguridad_model();
        echo json_encode($arreglo);
    }
    function cancelar_envio_codigo() {
        $error   = 0;
        $message = '';
        if ($error == 0) {
            $message .= $this->perfil_model->cancelar_envio_codigo_model();
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


}
?>
