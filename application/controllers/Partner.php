<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Partner extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library(array(
            'form_validation'
        ));

           // load Pagination library
        $this->load->library('pagination');
        $this->load->library('encrypt');
    // load URL helper
        $this->load->helper('url');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }

    $this->load->model('partner_model');
    }


        public function set_response_json($error, $message) {
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
        die();
    }

    function index() {

                // init params

            // get current page records
        $data["partner"] = $this->partner_model->get_partner();
        $data['estados'] = $this->partner_model->get_estado();
        $data['municipios'] = $this->partner_model->get_municipio();
        $data['parroquias'] = $this->partner_model->get_parroquia();


        $this->load->view('layout/header_view');
         $this->load->view('cuenta/left_sidebar_cuenta_view', $data);
        $this->load->view('partner/partner_view');
        $this->load->view('layout/footer_view');
    }

        function crear_partner() {

        $data['estados'] = $this->partner_model->get_estado();
        $data['municipios'] = $this->partner_model->get_municipio();
        $data['parroquias'] = $this->partner_model->get_parroquia();
        $this->load->view('layout/header_view');
        $this->load->view('cuenta/left_sidebar_cuenta_view', $data);
        $this->load->view('partner/agregar_partner_view');
        $this->load->view('layout/footer_view');
    }

    

        function actualizar_partner() {
        $error             = 0;
        $message           = '';
        $accion_check_reci = $this->input->post('accion_check', true);
        $nb_partner      = $this->input->post('nb_partner');
        $nb_estado      = $this->input->post('nb_estado');
        $nb_municipio      = $this->input->post('nb_municipio');
        $nb_parroquia      = $this->input->post('nb_parroquia');
        // Validacion 1
        if ($error == 0) {
            $this->partner_model->accion_check_asociar_partner_model($accion_check_reci, $nb_partner, $nb_estado, $nb_municipio, $nb_parroquia);
            $message .= 'partner asociados';
            // Obtener informacion de la factura
          
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

        public function agregar_partner() {
        $error             = 0;
        $message           = '';
        $nu_identificacion = trim($this->input->post('nu_identificacion'));
        $nb_partner         = trim($this->input->post('nb_partner'));
        $nb_representante       = trim($this->input->post('nb_representante'));
        $nu_telefono       = trim($this->input->post('nu_telefono'));
        $tx_direccion      = trim($this->input->post('tx_direccion'));
        $tx_email          = trim($this->input->post('tx_email'));
        $cod_sicm          = trim($this->input->post('cod_sicm'));
        $nb_tipo_empresa          = trim($this->input->post('nb_tipo_empresa'));
        $nb_estado          = trim($this->input->post('nb_estado'));
        $nb_municipio          = trim($this->input->post('nb_municipio'));
        $nb_parroquia          = trim($this->input->post('nb_parroquia'));
        $tx_latitud          = trim($this->input->post('tx_latitud'));
        $tx_longitud          = trim($this->input->post('tx_longitud'));
        // Validacion, verificar si existe el rif
        /*

        if ($cod_sicm != 0):
         $info_existencia_sicm = $this->clientes->get_verificar_existencia_sicm_clientes_model($cod_sicm);
        if ($info_existencia_sicm->num_rows() > 0):
            $error ++;
            $message .="El codigo Sicm: <b>$cod_sicm</b> ya existe en el sistema, por favor verificar.";
            $this->set_response_json($error, $message);
        endif;
        endif;

        */

        if ($error == 0) {
            $this->partner_model->agregar_partner_model($nu_identificacion, $nb_partner, $nb_representante, $nu_telefono, $tx_direccion, $tx_email, $cod_sicm, $nb_tipo_empresa, $nb_estado, $nb_municipio, $nb_parroquia, $tx_latitud, $tx_longitud);
            $message .= 'Agregado';
        }
        $this->set_response_json($error, $message);
    }

    
            function editar_partner($co_partner) {
        $data['info_partner'] = $this->partner_model->get_info_partner($co_partner);
        $data['usuarios_partner'] = $this->partner_model->get_usuarios_partner($co_partner);
        $data['documentos_partner'] = $this->partner_model->get_documentos_partner($co_partner);
        $data['co_partner'] = $co_partner;
        $data['estados'] = $this->partner_model->get_estado();
        $data['municipios'] = $this->partner_model->get_municipio();
        $data['parroquias'] = $this->partner_model->get_parroquia();


        $data['moneda'] = $this->partner_model->get_monedas();
        $data['tipo_pago'] = $this->partner_model->get_tipo_pago();
        $data['forma_entrega'] = $this->partner_model->get_forma_entrega();
        $data['forma_envio'] = $this->partner_model->get_forma_envio();
        $data['lista_forma_pago'] = $this->partner_model->get_forma_pago();

        $this->load->view('layout/header_view');
        $this->load->view('cuenta/left_sidebar_cuenta_view', $data);
        $this->load->view('partner/editar_partner_view');
        $this->load->view('layout/footer_view');
    }



        public function actualizar_partner_editar() {
        $error             = 0;
        $message           = '';
        $co_partner = trim($this->input->post('co_partner'));
        $nu_identificacion = trim($this->input->post('nu_identificacion'));
        $nb_partner         = trim($this->input->post('nb_partner'));
        $nb_representante       = trim($this->input->post('nb_representante'));
        $nu_telefono       = trim($this->input->post('nu_telefono'));
        $tx_direccion      = trim($this->input->post('tx_direccion'));
        $tx_email          = trim($this->input->post('tx_email'));
        $cod_sicm          = trim($this->input->post('nu_sicm'));
        $nb_estado          = trim($this->input->post('nb_estado'));
        $nb_municipio          = trim($this->input->post('nb_municipio'));
        $nb_parroquia          = trim($this->input->post('nb_parroquia'));
        $tx_latitud          = trim($this->input->post('tx_latitud'));
        $tx_longitud          = trim($this->input->post('tx_longitud'));


        $tx_condiciones          = $this->input->post('tx_condiciones');

        $co_moneda          = $this->input->post('co_moneda');
        $nb_tipo_pago          = $this->input->post('nb_tipo_pago');
        $nb_forma_entrega          = $this->input->post('nb_forma_entrega');
        $nb_forma_pago          = $this->input->post('nb_forma_pago');
        $nb_forma_envio          = $this->input->post('nb_forma_envio');

        // Validacion, verificar si existe el rif
        /*

        if ($cod_sicm != 0):
         $info_existencia_sicm = $this->clientes->get_verificar_existencia_sicm_clientes_model($cod_sicm);
        if ($info_existencia_sicm->num_rows() > 0):
            $error ++;
            $message .="El codigo Sicm: <b>$cod_sicm</b> ya existe en el sistema, por favor verificar.";
            $this->set_response_json($error, $message);
        endif;
        endif;

        */

        if ($error == 0) {
            $this->partner_model->actualizar_partner_model($co_partner, $nu_identificacion, $nb_partner, $nb_representante, $nu_telefono, $tx_direccion, $tx_email, $cod_sicm, $nb_estado, $nb_municipio, $nb_parroquia, $tx_latitud, $tx_longitud, $tx_condiciones, $co_moneda, $nb_tipo_pago, $nb_forma_entrega, $nb_forma_pago, $nb_forma_envio);
            $message .= 'Agregado';
        }
        $this->set_response_json($error, $message);
    }


        public function eliminar_partner() {
        $error             = 0;
        $message           = '';
        $co_partner = trim($this->input->post('co_partner'));
        if ($error == 0) {
            $this->partner_model->eliminar_partner_model($co_partner);
            $message .= 'Agregado';
        }
        $this->set_response_json($error, $message);
    }

               function agregar_usuario_partner($co_partner) {


        $data['co_partner'] = $co_partner;
        $this->load->view('partner/usuarios/agregar_usuario_modal_view', $data);
    }




    public function ejecutar_agregar_usuario_partner() {
        $error          = 0;
        $message        = '';
        $first_name     = trim($this->input->post('first_name'));
        $last_name      = trim($this->input->post('last_name'));
        $email          = trim($this->input->post('email'));
        $co_partner          = trim($this->input->post('co_partner'));
        $password          = trim($this->input->post('password'));
        $tx_permiso = $this->input->post('tx_permiso', true);
        // Validar membresia


        $info_membresia = $this->membresia_library->get_membresia(); 
        
        if ($this->partner_model->get_usuarios_activos() > $info_membresia->ca_usuarios):

            $message = 'Has superado el límite de usuarios activos en tu cuenta, si deseas crear mas usuarios debes adquirir una nueva membresia.';
            $error ++;

        endif;



        if ($error == 0) {

            $co_usuario = $this->partner_model->ejecutar_agregar_usuario_partner_model($email, $first_name, $last_name, $tx_permiso, $password, $co_partner);
            $message .= 'Agregado';
        }

        $data               = array(
            'nombre' => $first_name,
            'apellido' => $last_name,
            'email' => $email,
            'password' => $password
        );


      /*  $htmlContent        = $this->load->view('/usuario/user/email/template_email_view', $data, true);
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to($email);
        $this->email->reply_to('admision@bionewpharma.com');
        $this->email->from('admision@bionewpharma.com', 'Bio New Pharma C.A');
        $this->email->subject('[BIENVENIDO]');
        $this->email->message($htmlContent);
        $this->email->send(); */


        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


               function editar_usuario_partner_permisos($co_usuario_partner) {

        $data['co_usuario_partner'] = $co_usuario_partner;
        $data['info_usuario'] = $this->partner_model->get_info_usuario_partner($co_usuario_partner);
        $data['tx_permiso'] = $this->partner_model->get_permisos_partner($co_usuario_partner);
        $this->load->view('partner/usuarios/editar_usuario_modal_view', $data);
    }




    public function ejecutar_usuario_partner_permiso() {
        $error          = 0;
        $message        = '';

        $co_usuario_partner          = trim($this->input->post('co_usuario_partner'));
        $tx_permiso = $this->input->post('tx_permiso', true);
        // Validar Email

        if ($error == 0) {

            $co_usuario = $this->partner_model->ejecutar_usuario_partner_permiso_model($co_usuario_partner, $tx_permiso);
            $message .= 'Agregado';
        }


      /*  $htmlContent        = $this->load->view('/usuario/user/email/template_email_view', $data, true);
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to($email);
        $this->email->reply_to('admision@bionewpharma.com');
        $this->email->from('admision@bionewpharma.com', 'Bio New Pharma C.A');
        $this->email->subject('[BIENVENIDO]');
        $this->email->message($htmlContent);
        $this->email->send(); */


        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


    public function cambiar_partner() {
        $error             = 0;
        $message           = '';
        $co_partner = trim($this->input->post('co_partner'));
        if ($error == 0) {
            $this->partner_model->cambiar_partner_model($co_partner);
            $message .= 'Cambiado';
        }
        $this->set_response_json($error, $message);
    }



               function agregar_documento($co_partner) {

        $data['co_partner'] = $co_partner;
        $this->load->view('partner/documentos/agregar_documento_modal_view', $data);
    }



        public function ejecutar_agregar_documento()
    {

        $error=0;
        $message = '';

    $co_partner = $this->input->post('co_partner');
    $nb_documento = $this->input->post('nb_documento');
    $tx_descripcion = $this->input->post('tx_descripcion');
    $ff_vencimiento = $this->input->post('ff_vencimiento');
    $nombre_archivo = '';



      /*  if ($this->partner_model->verificar_documento_cargado($co_partner, $nb_documento)):

            $error ++;
            $message .= "$nb_documento, ya esta registrado en nuestra plataforma"; 

        endif; */


        if (isset($_FILES['mi_archivo']['name'])):

        $mi_archivo_2 = $_FILES['mi_archivo']['name'];

        $ext = pathinfo($mi_archivo_2, PATHINFO_EXTENSION);
        $nombre_archivo_guardar = $this->encrypt->encode($mi_archivo_2);
        $nombre_archivo_guardar = str_replace('=','', $nombre_archivo_guardar);
        $nombre_archivo_guardar = str_replace('/','', $nombre_archivo_guardar); 
        $nombre_archivo = base_url().'archivos/documentos/'.$nombre_archivo_guardar.'.'.$ext;

        $mi_archivo = 'mi_archivo';
        $config['upload_path'] = "archivos/documentos";
        $config['file_name'] = $nombre_archivo_guardar.'.'.$ext;
        $config['allowed_types'] = "*";
        $config['max_size'] = "2000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

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


        if ($error == 0):
        
      $this->partner_model->ejecutar_agregar_documento_model($co_partner, $nb_documento, $tx_descripcion, $nombre_archivo, $ff_vencimiento);

        $message = 'Registro agregado';

        endif;

              $arreglo=array(
                                'error'=>$error,
                                'message'=>$message
                        );

     echo json_encode($arreglo);

    }

            public function eliminar_documento()
    {

        $error=0;
        $message = '';

        $co_documentos_partner = $this->input->post('co_documentos_partner');

        if ($error == 0):
        
      $this->partner_model->eliminar_documento_model($co_documentos_partner);

        $message = 'Registro eliminado';

        endif;

              $arreglo=array(
                                'error'=>$error,
                                'message'=>$message
                        );

     echo json_encode($arreglo);

    }

            public function eliminar_usuario_partner()
        {

            $error=0;
            $message = '';

            $co_usuario_partner = $this->input->post('co_usuario_partner');

            if ($error == 0):

            $this->partner_model->eliminar_usuario_partner_model($co_usuario_partner);

            $message = 'Registro eliminado';

            endif;

            $arreglo=array(
                'error'=>$error,
                'message'=>$message
            );

            echo json_encode($arreglo);

            }


                        public function buscar_municipio()
        {

            $nb_estado = $this->input->post('nb_estado');
            $info_municipio =  $this->partner_model->get_buscar_municipio($nb_estado);
            echo '<select id="nb_municipio_accion" name="nb_municipio_accion" class="form-control" onchange="buscar_parroquia(this.value)">'; 
            echo '<option value="">Sin municipio</option>';
            foreach($info_municipio->result() as $row){
            echo "<option value='".$row->nb_municipio."'>".$row->nb_municipio."</option>"; }
            echo '</select>';


            }

                                    public function buscar_parroquia()
        {

            $nb_municipio = $this->input->post('nb_municipio');
            $info_parroquia =  $this->partner_model->get_buscar_parroquia($nb_municipio);
            echo '<select id="nb_parroquia_accion" name="nb_parroquia_accion" class="form-control">';
            echo '<option value="">Sin parroquia</option>';
            foreach($info_parroquia->result() as $row){
            echo "<option value='".$row->nb_parroquia."'>".$row->nb_parroquia."</option>"; }
            echo '</select>';


            }

                public function obtener_posicionamiento() {
        $error          = 0;
        $message        = '';

        $co_partner          = $this->ion_auth->co_partner();
        $tx_latitud          = trim($this->input->post('tx_latitud'));
        $tx_longitud          = trim($this->input->post('tx_longitud'));

        if ($error == 0) {
            $this->partner_model->obtener_posicionamiento_model($co_partner, $tx_latitud, $tx_longitud);
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