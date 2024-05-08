<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cuenta extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->library('authjwt');


    $this->load->model('cuenta_model');
    $this->load->model('partner_model');
    }

        function registrarse($link_referido = 0) {
            

        $data['link_referido'] = $link_referido;
        $data['estados'] = $this->cuenta_model->get_estados_model();
        $data['tipos_empresa'] = $this->cuenta_model->get_tipos_empresa_model();
        $this->load->view('cuenta/registrarse_view', $data);

    }

    public function agregar_usuario_ejecutar() {
        $error          = 0;
        $message        = '';
        $first_name     = trim($this->input->post('first_name'));
        $last_name      = trim($this->input->post('last_name'));
        $nu_cedula      = trim($this->input->post('nu_cedula'));
        $username      = trim($this->input->post('username'));
        $email          = trim($this->input->post('email'));
        $password          = trim($this->input->post('password'));
        $nb_estado          = trim($this->input->post('nb_estado'));
        $nb_empresa          = trim($this->input->post('nb_empresa'));
        $nu_rif          = trim($this->input->post('nu_rif'));
        $tx_direccion          = trim($this->input->post('tx_direccion'));
        $nb_tipo_empresa          = trim($this->input->post('nb_tipo_empresa'));
        // Validar Email

      $resp_existente_username = $this->cuenta_model->get_existente_username_model($username);
        if ($resp_existente_username->num_rows() > 0) {
            $message .= 'El seudonimo: ' . $username . ' ya esta registrado en sistema';
            $error++;
        }

        $resp_existente = $this->cuenta_model->get_email_existente_model($email);
        if ($resp_existente->num_rows() > 0) {
            $message .= 'El email: ' . $email . ' ya esta registrado en sistema';
            $error++;
        }

        // verificar si la empresa esta registrada

    $resp_existente_rif = $this->cuenta_model->get_partner_existente_model($nu_rif);
        if ($resp_existente_rif->num_rows() > 0) {
            $message .= 'El RIF: ' . $nu_rif . ' ya está registrado en sistema';
            $error++;
        }

        // Validacion 1
        if ($error == 0) {


        $token =  $this->authjwt->encode_token_verficar_email($email);

        $link = base_url().'cuenta/verificar_link/'.$token;

            $co_usuario = $this->cuenta_model->nuevo_cuenta_model($email, $first_name, $last_name, $nu_cedula, $password, $nb_estado, $token, $nb_empresa, $nu_rif, $tx_direccion, $nb_tipo_empresa, $username);
            $message .= 'Agregado';

        $data               = array(
            'nombre' => $first_name,
            'apellido' => $last_name,
            'username' => $username,
            'cedula' => $nu_cedula,
            'email' => $email,
            'nb_estado' => $nb_estado,
            'link' => $link
        );


        $htmlContent        = $this->load->view('/cuenta/template_email/template_email_view', $data, true);
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to($email);
        $this->email->reply_to('admision@rosefarmaceutica.com');
        $this->email->from('admision@rosefarmaceutica.com', 'ROSE C.A');
        $this->email->subject('[ROSE C.A]');
        $this->email->message($htmlContent);
        $this->email->send();


        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }
    // Editar Usuario


            function registro_exitoso() {


        $this->load->view('cuenta/registro_exitoso_view');

    }


       function verificar_link($token) {

        $resp = $this->cuenta_model->get_verificar_link($token);

        if($resp->num_rows() > 0):

        $info_usuario = $resp->row();
        $info_user = $this->cuenta_model->in_verificar_model($info_usuario->id);

        $data               = array(
            'nombre' => $info_user->first_name,
            'apellido' => $info_user->last_name,
            'cedula' => $info_user->nu_cedula,
            'email' => $info_user->email,
            'nb_estado' => $info_user->nb_estado
            
        );

        $this->load->view('cuenta/usuario_verificado_exitoso_view', $data);



        $htmlContent        = $this->load->view('/cuenta/template_email/template_cuenta_verificada_view', $data, true);
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to($info_user->email);
        $this->email->reply_to('admision@rosefarmaceutica.com');
        $this->email->from('admision@rosefarmaceutica.com', 'ROSE');
        $this->email->subject('[ROSE]');
        $this->email->message($htmlContent);
        $this->email->send();


            else:

        $this->load->view('sistema/system_404');

        endif;



    }


            function cuenta() {


      if (!$this->ion_auth->logged_in()):

            redirect('auth/login');

        endif;

        $data['info_usuario'] = $this->cuenta_model->get_info_usuario();
        $data['info_dispositivos_vinculados'] = $this->cuenta_model->get_info_dispositivos_vinculados();
        $data["partner"] = $this->partner_model->get_partner();
        $this->load->view('layout/header_view');
        $this->load->view('cuenta/left_sidebar_cuenta_view', $data);
        $this->load->view('cuenta/cuenta_view');
        $this->load->view('layout/footer_view');
    }


                function ver_partner_cuenta() {


      if (!$this->ion_auth->logged_in()): redirect('auth/login'); endif;

        $data['info_usuario'] = $this->cuenta_model->get_info_usuario();
        $data["partner"] = $this->partner_model->get_partner();
        $this->load->view('layout/header_view');
        $this->load->view('cuenta/left_sidebar_cuenta_view', $data);
        $this->load->view('cuenta/ver_partner_cuenta_view');
        $this->load->view('layout/footer_view');
    }


                function editar_cuenta() {


             if (!$this->ion_auth->logged_in()):

            redirect('auth/login');

        endif;


        $data['info_usuario'] = $this->cuenta_model->get_info_usuario();
        $data['estados'] = $this->cuenta_model->get_estados_model();
        $this->load->view('cuenta/editar_cuenta_view', $data);
    }


    public function editar_cuenta_usuario() {
        $error          = 0;
        $message        = '';
        $in_verificado = '1';

        $info_usuario = $this->cuenta_model->get_info_usuario();

        $first_name     = trim($this->input->post('first_name'));
        $last_name      = trim($this->input->post('last_name'));
        $nu_cedula      = trim($this->input->post('nu_cedula'));
        $email          = trim($this->input->post('email'));
        $phone          = trim($this->input->post('phone'));
        $nu_whatsapp          = trim($this->input->post('nu_whatsapp'));


        if ($email != $info_usuario->email):

        $in_verificado = '0';

        $resp_existente = $this->cuenta_model->get_email_existente_model($email);
        if ($resp_existente->num_rows() > 0) {
            $message .= 'El email: ' . $email . ' ya esta registrado en nuestra plataforma';
            $error++;
        }

        endif;


        // Validacion 1
        if ($error == 0) {


        $token =  $this->authjwt->encode_token_verficar_email($email);
        $link = base_url().'cuenta/verificar_link/'.$token;

        $this->cuenta_model->actualizar_cuenta_model($email, $first_name, $last_name, $nu_cedula, $token, $in_verificado, $link, $phone, $nu_whatsapp);

        $message .= 'Actualizado';

        if ($email != $info_usuario->email):


        $data               = array(
            'nombre' => $first_name,
            'apellido' => $last_name,
            'cedula' => $nu_cedula,
            'email' => $email,
            'link' => $link,
            'email_viejo' => $info_usuario->email
            
        );


        $htmlContent        = $this->load->view('/cuenta/template_email/template_cuenta_actualizada_email_view', $data, true);
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to($email);
        $this->email->reply_to('admision@rosefarmaceutica.com');
        $this->email->from('admision@rosefarmaceutica.com', 'ROSE');
        $this->email->subject('[ROSE]');
        $this->email->message($htmlContent);
        $this->email->send();

        endif;


        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


        function completar_perfil() {

                
             if (!$this->ion_auth->logged_in()):

            redirect('auth/login');

        endif;


        $data['info_usuario'] = $this->cuenta_model->get_info_usuario();
        $data['estados'] = $this->cuenta_model->get_estados_model();
        


        $this->load->view('cuenta/completar_cuenta_view', $data);
    
    }



                function cambiar_password() {

        $data['info_usuario'] = $this->cuenta_model->get_info_usuario();
        $this->load->view('cuenta/password_modal_view', $data);
    }


    public function cambiar_password_ejecutar() {
        $error          = 0;
        $message        = '';
        $password          = trim($this->input->post('password'));
        $tx_password_actual          = trim($this->input->post('tx_password_actual'));
        // Validar Email
        

        $resp_existente = $this->cuenta_model->verificar_password_actual($tx_password_actual);

        if (!$resp_existente) {
            $message .= 'La contraseña actual es incorrecta';
            $error++;
        }

        // Validacion 1
        if ($error == 0) {

            $this->cuenta_model->ejecutar_cambiar_password($password);
            $message .= 'Contraseña actualizada';

        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

    

                function eliminar_cuenta() {

        $data['info_usuario'] = $this->cuenta_model->get_info_usuario();
        $this->load->view('cuenta/eliminar_cuenta_modal_view', $data);
    }


        public function eliminar_cuenta_ejecutar() {
        $error          = 0;
        $message        = '';
        $tx_password_actual          = trim($this->input->post('tx_password_actual'));
        // Validar Email
        
        $resp_existente = $this->cuenta_model->verificar_password_actual($tx_password_actual);

        if (!$resp_existente) {
            $message .= 'La contraseña actual es incorrecta';
            $error++;
        }

        // Validacion 1
        if ($error == 0) {
            
            $this->cuenta_model->eliminar_cuenta_ejecutar_model();
             $this->ion_auth->logout();
            $message .= 'Contraseña eliminada';

        }



        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

    // Contraseña


    public function recuperar_password() {
            
            $this->load->view('cuenta/recuperar_password/recuperar_password_view');

    }


             public function verificar_email() {

        $error      = 0;
        $message    = '';

        $tx_email     = trim($this->input->post('tx_email'));

        if ($error == 0) {
           $resp = $this->cuenta_model->verificar_email_model($tx_email);

            if ($resp):

            $message .= "Recuperacion de contraseña enviado correctamente al email ".$tx_email;
            $this->enviar_recuperar_contrasena($resp);

            else:

            $message .= "Error, el email ingresado es incorrecto, por favor verifique.";

            endif;

        }

        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
 

    }

    public function enviar_recuperar_contrasena($resp) {
        $error          = 0;
        $message        = '';

        // Validacion 1
        if ($error == 0) {

        $info_user = $resp->row();

        $this->load->library('authjwt'); 
        $token =  $this->authjwt->encode_token_verficar_email($info_user->email);

        $link = base_url().'cuenta/recuperar_link/'.$token;

        $this->cuenta_model->set_link_remember_password($info_user->id, $token);

        $message .= 'Agregado';

        $data               = array(
            'nombre' => $info_user->first_name,
            'apellido' => $info_user->last_name,
            'cedula' => $info_user->nu_cedula,
            'email' => $info_user->email,
            'link' => $link
        );

        $htmlContent        = $this->load->view('/cuenta/template_email/recuperar_password_template_email_view', $data, true);
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to($info_user->email);
        $this->email->reply_to('admision@rosefarmaceutica.com');
        $this->email->from('admision@rosefarmaceutica.com', 'ROSE');
        $this->email->subject('[ROSE]');
        $this->email->message($htmlContent);
        $this->email->send();
        }

    }

    

           function recuperar_link($token) {

        $resp = $this->cuenta_model->get_verificar_link($token);

        if($resp->num_rows() > 0):

        $info_usuario = $resp->row();

        $data               = array(
            'co_usuario' => $info_usuario->id,
            'nombre' => $info_usuario->first_name,
            'apellido' => $info_usuario->last_name,
            'cedula' => $info_usuario->nu_cedula,
            'email' => $info_usuario->email,
            'nb_estado' => $info_usuario->nb_estado
            
        );


        $this->load->view('cuenta/usuario_password_formulario_view', $data);


            else:

        $this->load->view('sistema/system_404');

        endif;



    }



             public function restablecer_contrasena_ejecutar() {

        $error      = 0;
        $message    = '';

        $password     = trim($this->input->post('password'));
        $co_usuario     = trim($this->input->post('co_usuario'));

        if ($error == 0):
           $this->cuenta_model->restablecer_contrasena_ejecutar_model($co_usuario, $password);

            $message .= "Exito.";

        $resp = $this->cuenta_model->get_usuario_row_model($co_usuario);

        $info_usuario = $resp->row();

        $data               = array(
            'co_usuario' => $info_usuario->id,
            'nombre' => $info_usuario->first_name,
            'apellido' => $info_usuario->last_name,
            'cedula' => $info_usuario->nu_cedula,
            'email' => $info_usuario->email,
            'nb_estado' => $info_usuario->nb_estado
            
        );



        $htmlContent        = $this->load->view('/cuenta/template_email/recuperar_password_template_cuenta_verificada_view', $data, true);
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to($info_usuario->email);
        $this->email->reply_to('admision@rosefarmaceutica.com');
        $this->email->from('admision@rosefarmaceutica.com', 'ROSE');
        $this->email->subject('[ROSE]');
        $this->email->message($htmlContent);
        $this->email->send();

         endif;


        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
 

    }


        public function cambiar_foto_perfil() {
            
            $co_usuario = $this->ion_auth->user_id();
            $data['co_usuario'] = $co_usuario;
            $this->load->view('cuenta/archivo_foto_view',$data);

    }


    function ejecutar_cambiar_foto_perfil($co_usuario)
    {
        $archivo = $_FILES['file'];
        $temp = $archivo["tmp_name"];
        $name = $archivo["name"];
        $conca = $co_usuario . 'nb_foto_perfil' . $name;
        $nb_foto_perfil = base_url().'img/perfil/usuario/'.$conca;
        $this->cuenta_model->ejecutar_cambiar_foto_perfil_model($nb_foto_perfil);
        move_uploaded_file($temp, "img/perfil/usuario/$conca");
    }


    public function eliminar_dispositivo_vinculado() {
        $error          = 0;
        $message        = '';
        $co_user_session          = trim($this->input->post('co_user_session'));
        // Validar Email
        
        $this->cuenta_model->eliminar_dispositivo_vinculado_model($co_user_session);


        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

         public function ver_empresas_asociadas() {
            
             $co_usuario = $this->ion_auth->user_id();
             $data["partner"] = $this->partner_model->get_partner();
             $this->load->view('cuenta/ver_empresas_asociadas_view', $data);

    }


    

}
?>