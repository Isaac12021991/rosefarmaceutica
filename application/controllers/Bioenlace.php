<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bioenlace extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('bioenlace_model', 'bioenlace');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            return;
        }
        $this->load->library('encrypt');
    }
    public function index($nb_estatus = -1) {

        $data['inventario_principal'] = $this->bioenlace->get_inventario_principal();
        $data['in_sicronizar_sicm'] = $this->bioenlace->get_sincronizar_sicm_bioenlace_principal();
        $this->load->view('layout/header_view');
        $this->load->view('bioenlace/left_sidebar_bioenlace_view', $data);
        $this->load->view('bioenlace/bioenlace_main_view');
        $this->load->view('layout/footer_view');
    }
    // Ajustar producto

    

        public function nuevo_producto_servicio() {
        $data['principio_activo'] = $this->bioenlace->get_principio_activos();
        $data['concentracion'] = $this->bioenlace->get_concentracion();
        $data['forma_farmaceutica'] = $this->bioenlace->get_forma_farmaceuticas();
        $data['uso_terapeutico'] = $this->bioenlace->get_uso_terapeutico();
        $data['laboratorio'] = $this->bioenlace->get_laboratorio();
        $data['partner'] = $this->bioenlace->get_partner();
        $this->load->view('layout/header_view');
         $this->load->view('bioenlace/left_sidebar_bioenlace_view', $data);
        $this->load->view('bioenlace/nuevo_producto_servicio_view');
        $this->load->view('layout/footer_view');

    }

    

                  public function agregar_nuevo_producto_servicio()
    {

        $error=0;
        $message = '';

    $nb_producto = $this->input->post('nb_producto');
    $tx_descripcion = $this->input->post('tx_descripcion');
    $nb_tipo_busqueda = $this->input->post('nb_tipo_busqueda');
    $ff_vence = $this->input->post('ff_vence');
    $ca_precio = $this->input->post('ca_precio');
    $nb_tags = $this->input->post('nb_tags');
    $co_producto = $this->input->post('co_producto');
    $nb_principio_activo = $this->input->post('nb_principio_activo');
    $nb_forma_farmaceutica = $this->input->post('nb_forma_farmaceutica');
    $nb_concentracion = $this->input->post('nb_concentracion');
    $nb_uso_terapeutico = $this->input->post('nb_uso_terapeutico');
    $nb_fabricante = $this->input->post('nb_fabricante');
    $nombre_archivo = '';


        if (isset($_FILES['mi_archivo']['name'])):

        $mi_archivo_2 = $_FILES['mi_archivo']['name'];

        $ext = pathinfo($mi_archivo_2, PATHINFO_EXTENSION);
        $nombre_archivo_guardar = $this->encrypt->encode($mi_archivo_2);
        $nombre_archivo_guardar = str_replace('=','', $nombre_archivo_guardar);
        $nombre_archivo_guardar = str_replace('/','', $nombre_archivo_guardar); 
        $nombre_archivo = base_url().'img/productos/'.$nombre_archivo_guardar.'.'.$ext;;

        $mi_archivo = 'mi_archivo';
        $config['upload_path'] = "img/productos";
        $config['file_name'] = $nombre_archivo_guardar.'.'.$ext;;
        $config['allowed_types'] = "gif|jpg|jpeg|png";
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
        
      $this->bioenlace->create_producto_servicio_model($nombre_archivo, $nb_producto, $tx_descripcion, $nb_tipo_busqueda, $ff_vence, $ca_precio, $nb_tags, $co_producto, $nb_principio_activo, $nb_forma_farmaceutica, $nb_concentracion, $nb_uso_terapeutico, $nb_fabricante);

        $message = 'Registro agregado';

        endif;

              $arreglo=array(
                                'error'=>$error,
                                'message'=>$message
                        );

     echo json_encode($arreglo);

    }

            public function editar_producto_servicio($co_inventario_principal) {

        // Info producto 

        $data['info_inventario_principal'] = $this->bioenlace->get_info_inventario_principal($co_inventario_principal);

        $data['principio_activo'] = $this->bioenlace->get_principio_activos();
        $data['concentracion'] = $this->bioenlace->get_concentracion();
        $data['forma_farmaceutica'] = $this->bioenlace->get_forma_farmaceuticas();
        $data['uso_terapeutico'] = $this->bioenlace->get_uso_terapeutico();
        $data['laboratorio'] = $this->bioenlace->get_laboratorio();
        $data['partner'] = $this->bioenlace->get_partner();
        $this->load->view('layout/header_view');
         $this->load->view('bioenlace/left_sidebar_bioenlace_view', $data);
        $this->load->view('bioenlace/editar_producto_servicio_view');
        $this->load->view('layout/footer_view');

    }

    

                      public function actualizar_nuevo_producto_servicio()
    {

        $error=0;
        $message = '';

    $co_inventario_principal = $this->input->post('co_inventario_principal');
    $nb_producto = $this->input->post('nb_producto');
    $tx_descripcion = $this->input->post('tx_descripcion');
    $nb_tipo_busqueda = $this->input->post('nb_tipo_busqueda');
    $ff_vence = $this->input->post('ff_vence');
    $ca_precio = $this->input->post('ca_precio');
    $nb_tags = $this->input->post('nb_tags');

    $co_producto = $this->input->post('co_producto');
    $nb_principio_activo = $this->input->post('nb_principio_activo');
    $nb_forma_farmaceutica = $this->input->post('nb_forma_farmaceutica');
    $nb_concentracion = $this->input->post('nb_concentracion');
    $nb_uso_terapeutico = $this->input->post('nb_uso_terapeutico');
    $nb_fabricante = $this->input->post('nb_fabricante');
    $nombre_archivo = '';


        if (isset($_FILES['mi_archivo']['name'])):

        $mi_archivo_2 = $_FILES['mi_archivo']['name'];

        $ext = pathinfo($mi_archivo_2, PATHINFO_EXTENSION);
        $nombre_archivo_guardar = $this->encrypt->encode($mi_archivo_2);
        $nombre_archivo_guardar = str_replace('=','', $nombre_archivo_guardar);
        $nombre_archivo_guardar = str_replace('/','', $nombre_archivo_guardar); 
        $nombre_archivo = base_url().'img/productos/'.$nombre_archivo_guardar.'.'.$ext;

        $mi_archivo = 'mi_archivo';
        $config['upload_path'] = "img/productos";
        $config['file_name'] = $nombre_archivo_guardar.'.'.$ext;
        $config['allowed_types'] = "gif|jpg|jpeg|png";
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
        
      $this->bioenlace->update_producto_servicio_model($nombre_archivo, $nb_producto, $tx_descripcion, $nb_tipo_busqueda, $ff_vence, $ca_precio, $nb_tags, $co_producto, $nb_principio_activo, $nb_forma_farmaceutica, $nb_concentracion, $nb_uso_terapeutico, $nb_fabricante, $co_inventario_principal);

        $message = 'Registro actualizado';

        endif;

              $arreglo=array(
                                'error'=>$error,
                                'message'=>$message
                        );

     echo json_encode($arreglo);

    }

        
        public function eliminar_inventario_principal()
    {

        $error=0;
        $message = '';

    $co_inventario_principal = $this->input->post('co_inventario_principal');

        if ($error == 0):
        
      $this->bioenlace->eliminar_inventario_principal_model($co_inventario_principal);

        $message = 'Registro eliminado';

        endif;

              $arreglo=array(
                                'error'=>$error,
                                'message'=>$message
                        );

     echo json_encode($arreglo);

    }



       public function sicncronizar_sicm_bioenlace()
    {

        $error=0;
        $message = '';

       $in_sicncronizar_sicm = $this->input->post('in_sicncronizar_sicm');

        if ($error == 0):
        
         $this->bioenlace->sicncronizar_sicm_bioenlace_model($in_sicncronizar_sicm);

        $message = 'Se ha establecido la sincronizacion con el Sicm';

        endif;

              $arreglo=array(
                                'error'=>$error,
                                'message'=>$message
                        );

     echo json_encode($arreglo);

    }
    


}
?>