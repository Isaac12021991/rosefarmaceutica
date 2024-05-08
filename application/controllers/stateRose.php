<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class stateRose extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('stateRose_model', 'stateRose_model');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            return;
        }

        $this->load->library('encrypt');


    }
    public function index() {

        $data['mi_estado'] = $this->stateRose_model->get_mi_estado_model();
        $data['infoGetState'] = $this->stateRose_model->get_mi_historias_estado_principal_model();

        $this->load->view('layout/header_view', $data);
        $this->load->view('stateRose/stateRoseMain_view');
        $this->load->view('layout/footer_view');

    }

    public function get_estado_actual()
     {
        


    $informacion_principal_mi_estado_rose = $this->estado_rose_model->get_mi_historias_estado_principal_model();

    $array_mi_stories = [];

    foreach ($informacion_principal_mi_estado_rose->result() as $row):

    $estado_rose_story = $this->estado_rose_model->get_mi_historias_estado_model($row->co_usuario);
       
    $array = array(
        "id" => $row->co_usuario,
        "photo" => $row->nb_foto_perfil,
        "name" => $row->username,
        "link" => $row->nb_foto_perfil,
        "lastUpdated" => $row->lastUpdated,
        "seem" => false,
        "items" => $estado_rose_story,
        );

    array_push($array_mi_stories , $array);

    endforeach;



    // Obtener todas las historias

    $informacion_principal_estado_rose = $this->estado_rose_model->get_historias_estado_principal_model();

    $array_new_stories = [];

    foreach ($informacion_principal_estado_rose->result() as $row):

    $estado_rose_story = $this->estado_rose_model->get_historias_estado_model($row->co_usuario);
       
    $array = array(
        "id" => $row->co_usuario,
        "photo" => $row->nb_foto_perfil,
        "name" => $row->username,
        "link" => $row->nb_foto_perfil,
        "lastUpdated" => $row->lastUpdated,
        "seem" => false,
        "items" => $estado_rose_story,
        );

    array_push($array_new_stories , $array);

    endforeach;


    $informacion_principal_estado_rose = $this->estado_rose_model->get_historias_estado_principal_old_model();

    $array_old_stories = [];

    foreach ($informacion_principal_estado_rose->result() as $row):

    $estado_rose_story_old = $this->estado_rose_model->get_historias_estado_old_model($row->co_usuario);
       
    $array = array(
        "id" => $row->co_usuario,
        "photo" => $row->nb_foto_perfil,
        "name" => $row->username,
        "link" => $row->nb_foto_perfil,
        "lastUpdated" => $row->lastUpdated,
        "seem" => true,
        "items" => $estado_rose_story_old,
        );

    array_push($array_old_stories , $array);

    endforeach;


        $arreglo = array(
            'array_old_stories' => json_encode($array_old_stories, JSON_PRETTY_PRINT),
            'array_new_stories' => json_encode($array_new_stories, JSON_PRETTY_PRINT),
            'array_mi_stories' => json_encode($array_mi_stories, JSON_PRETTY_PRINT)
            
        );
        echo json_encode($arreglo);

             }



    public function actualizar_estado_actual()
     {
        
            $co_stories        = $this->input->post('co_stories');
            $co_usuario        = $this->input->post('co_usuario');

            foreach ($co_stories as $key => $value) {

                if ($key == 'items'){

                    foreach ($value as $key2 => $value2) {

                         $this->estado_rose_model->actualizar_estado_actual_model($co_usuario, $value2['id']);
 
                    }



                }
        
         
            }
            
          

    }


        public function nuevo_estado_rose() {

          $this->load->view('layout/header_view');
        $this->load->view('estado_rose/add/nuevo_estado_desktop_view');
        $this->load->view('layout/footer_view');


    }


        public function agregar_nuevo_estado() {
        $error               = 0;
        $message             = '';
        $tx_descripcion = trim($this->input->post('tx_descripcion'));
        $type = trim($this->input->post('type'));
        $nb_fondo = trim($this->input->post('nb_fondo'));


        $nombre_archivo = '';


        if($this->ion_auth->in_empresa_activado() == 0):

            $message = "Empresa no verificada, por favor pongase en contacto con nosotros para <b>verificar su empresa</b>";
            $error ++;     

        endif;


        if($type == 'mensaje'):


        $nombre_archivo_guardar_mensaje = $this->encrypt->encode(strlen($tx_descripcion));
        $nombre_archivo_guardar_mensaje = str_replace('=','', $nombre_archivo_guardar_mensaje);
        $nombre_archivo_guardar_mensaje = str_replace('/','', $nombre_archivo_guardar_mensaje); 
        
        $nb_fondo_imagen = str_replace('#','', $nb_fondo);
        $nombre_archivo = base_url().'img/estado_rose/'.$nb_fondo_imagen.'.jpg';


       // $this->crear_imagen_texto($tx_descripcion, $nb_fondo, $nombre_archivo_guardar_mensaje);


        endif;

         if($type == 'photo'):

                if (isset($_FILES['mi_archivo']['name'])):

        $mi_archivo_2 = $_FILES['mi_archivo']['name'];


        $ext = pathinfo($mi_archivo_2, PATHINFO_EXTENSION);
        $nombre_archivo_guardar = $this->encrypt->encode($mi_archivo_2);
        $nombre_archivo_guardar = str_replace('=','', $nombre_archivo_guardar);
        $nombre_archivo_guardar = str_replace('/','', $nombre_archivo_guardar); 
        $nombre_archivo = base_url().'img/estado_rose/'.$nombre_archivo_guardar.'.'.$ext;

        $mi_archivo = 'mi_archivo';
        $config['upload_path'] = "img/estado_rose";
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

    endif;


        if ($error == 0) {
            $this->estado_rose_model->agregar_nuevo_estado_model($tx_descripcion, $nombre_archivo, $type, $nb_fondo);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }



public function crear_imagen_texto($texto, $imagen_fondo, $new_imagen)
{



    $font_size = 50;
    $wm_vrt_offset = 150;

    $longito_texto = strlen($texto);

    if ($longito_texto < 40):

        $wm_vrt_offset = 250;
        $font_size = 40;
        $texto = wordwrap($texto, 12, "\n", TRUE);

    endif;

    if ($longito_texto >= 40 and $longito_texto <= 100):

        $font_size = 40;
         $wm_vrt_offset = 200;
        $texto = wordwrap($texto, 15, "\n", TRUE);

    endif;


        if ($longito_texto >= 100 and $longito_texto <= 200):

        $font_size = 28;
        $texto = wordwrap($texto, 20, "\n", TRUE);

    endif;

                if ($longito_texto >= 200 and $longito_texto <= 300):

        $font_size = 22;
        $wm_vrt_offset = 120;
        $texto = wordwrap($texto, 24, "\n", TRUE);

    endif;

            if ($longito_texto >= 300 and $longito_texto <= 400):

        $font_size = 16;
        $wm_vrt_offset = 100;
        $texto = wordwrap($texto, 20, "\n", TRUE);

    endif;





    $this->load->library('image_lib');
    $config['image_library'] = 'NetPBM';
    $config['source_image'] = 'img/estado_rose/plantillas/'.$imagen_fondo.'.png';
    $config['wm_text'] = $texto;
    $config['wm_type'] = 'text';
    $config['wm_font_path'] = realpath('arial-black.ttf');
    $config['wm_font_size'] = $font_size;
    $config['wm_font_color'] = 'ffffff';
   //  $config['wm_shadow_color'] = 'ffffff';

    $config['wm_vrt_alignment'] = 'top';
    $config['wm_hor_alignment'] = 'center';
   // $config['wm_hor_offset'] = '100';

    $config['wm_vrt_offset'] = $wm_vrt_offset;

    

    $config['wm_padding'] = '10';
    $config['quality'] = '100';
    $config['new_image'] = './img/estado_rose/'.$new_imagen.'.jpg';

    $this->image_lib->initialize($config);
    if (!$this->image_lib->watermark()) {
        echo $this->image_lib->display_errors();

    }else{



    }

    


}


    public function eliminar_estado()
     {
        
           $co_estado_rose        = $this->input->post('co_estado_rose');
          $this->estado_rose_model->eliminar_estado_model($co_estado_rose);

          

    }

    

     public function nuevo_estado_texto_rose() {


        $this->load->view('layout/header_view');
        $this->load->view('estado_rose/add/nuevo_estado_mobile_texto_view');
         $this->load->view('layout/footer_view');


    }



     public function nuevo_estado_imagen_rose() {


        $this->load->view('layout/header_view');
        $this->load->view('estado_rose/add/nuevo_estado_mobile_imagen_view');
         $this->load->view('layout/footer_view');


    }

        public function mi_historias_activas() {

        $mi_estado = $this->estado_rose_model->get_mi_estado_model();

        if($mi_estado->num_rows() == 0):

            redirect('estado_rose/mobile_index');

        endif;
        
        $data['mi_estado'] = $mi_estado;

        $this->load->view('layout/header_view', $data);
        $this->load->view('estado_rose/estado_rose_main_mi_historias_activas_mobile_view');
       $this->load->view('layout/footer_view');

    }

    

}
?>