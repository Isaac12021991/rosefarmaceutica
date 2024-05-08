<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Producto_publicaciones extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('producto_publicaciones_model', 'producto_publicaciones_model');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            return;
        }
        $this->load->library('excel');
        $this->load->library('pagination');
        $this->load->library('encrypt');


    }
    public function index() {

        $tx_buscar_producto_publicaciones = '';
        $tx_buscar_producto_publicaciones     = trim($this->input->get('tx_buscar_producto_publicaciones'));
        $nb_estatus = -1;
        $nb_estatus     = trim($this->input->get('nb_estatus'));

        if ($nb_estatus == ''): $nb_estatus = -1; endif;

        $params = array();
        $limit_per_page = 100;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->producto_publicaciones_model->get_total($tx_buscar_producto_publicaciones, $nb_estatus);

                    if ($total_records > 0) 
        {
            // get current page records
$data["listado_productos"] = $this->producto_publicaciones_model->get_producto_publicaciones($limit_per_page, $start_index*$limit_per_page, $tx_buscar_producto_publicaciones, $nb_estatus);
            
            $config['base_url'] = base_url() . "producto_publicaciones/index/$nb_estatus";
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;

            $config['num_links'] = 5;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;

             
            $config['full_tag_open'] = '<div class="d-flex flex-wrap py-2 mr-0">';
            $config['full_tag_close'] = '</div>';
            $config['first_link'] = '<i class="ki ki-bold-double-arrow-back icon-xs"></i>';
            $config['first_tag_open'] = ' <span class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">';
            $config['first_tag_close'] = '</span>';             
            $config['last_link'] = '<i class="ki ki-bold-double-arrow-next icon-xs"></i>';
            $config['last_tag_open'] = '<span class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">';
            $config['last_tag_close'] = '</span>';
            $config['next_link'] = '<i class="ki ki-bold-arrow-next icon-xs"></i>';
            $config['next_tag_open'] = ' <span class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">';
            $config['next_tag_close'] = '</span>';
            $config['prev_link'] = '<i class="ki ki-bold-arrow-back icon-xs"></i>';
            $config['prev_tag_open'] = ' <span class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">';
            $config['prev_tag_close'] = '</span>';
            $config['cur_tag_open'] = '<span class="btn btn-icon btn-sm border-0 btn-hover-primary active mr-2 my-1">';
            $config['cur_tag_close'] = '</span>';
            $config['num_tag_open'] = '<span class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">';
            $config['num_tag_close'] = '</span>';
             
            $this->pagination->initialize($config);

            $data["links"] = $this->pagination->create_links();
        }else{

        $data["listado_productos"] = $this->producto_publicaciones_model->get_producto_publicaciones($limit_per_page, $start_index*$limit_per_page, $tx_buscar_producto_publicaciones, $nb_estatus);

        }

        $data["nb_estatus"] = $nb_estatus;
        $data["tx_buscar_producto_publicaciones"] = $tx_buscar_producto_publicaciones;
        $this->load->view('layout/header_view');
        $this->load->view('biomercado/left_sidebar_biomercado_view');
        $this->load->view('biomercado/producto_publicaciones/producto_publicaciones_main_view', $data);
        $this->load->view('layout/footer_view');
    }
    // Ajustar producto
    public function nuevo_producto_publicaciones() {
        $data['ubicacion'] = $this->producto_publicaciones_model->get_estados();
        $data['moneda'] = $this->producto_publicaciones_model->get_monedas();
        $data['tipo_pago'] = $this->producto_publicaciones_model->get_tipo_pago();
        $data['forma_entrega'] = $this->producto_publicaciones_model->get_forma_entrega();
        $data['forma_envio'] = $this->producto_publicaciones_model->get_forma_envio();
        $data['categoria'] = $this->producto_publicaciones_model->get_categoria();
        $this->load->view('layout/header_view');
        $this->load->view('biomercado/left_sidebar_biomercado_view');
        $this->load->view('biomercado/producto_publicaciones/nuevo_producto_publicaciones_view', $data);
        $this->load->view('layout/footer_view');

    }

    public function agregar_nuevo_producto_publicaciones() {
        $error               = 0;
        $message             = '';
        $nb_producto = trim($this->input->post('nb_producto'));
        $nb_tipo_venta        = trim($this->input->post('nb_tipo_venta'));
        $nb_estatus      = trim($this->input->post('nb_estatus'));
        $ca_precio      = trim($this->input->post('ca_precio'));
        $ca_disponible      = trim($this->input->post('ca_disponible'));
        $co_moneda      = trim($this->input->post('co_moneda'));
        $tx_descripcion      = trim($this->input->post('tx_descripcion'));
        $ff_vence      = trim($this->input->post('ff_vence'));
        $ff_vence_publicacion      = trim($this->input->post('ff_vence_publicacion'));
        $nb_categoria      = trim($this->input->post('nb_categoria'));
        $nb_tipo_pago      = trim($this->input->post('nb_tipo_pago'));
        $nb_forma_entrega      = trim($this->input->post('nb_forma_entrega'));
        $nb_estado      = trim($this->input->post('nb_estado'));
        $ca_pedido_minimo      = trim($this->input->post('ca_pedido_minimo'));
        $ca_multiplo      = trim($this->input->post('ca_multiplo'));
        $nb_tags = $this->input->post('nb_tags');
        $nombre_archivo = '';

        $nb_forma_envio      = trim($this->input->post('nb_forma_envio'));
        $nb_origen_producto      = trim($this->input->post('nb_origen_producto'));
        $nb_permiso_importacion      = trim($this->input->post('nb_permiso_importacion'));
        $cod_barra      = trim($this->input->post('cod_barra'));


        $ca_precio = str_replace(".", "", $ca_precio);
        $ca_precio = str_replace(",", ".", $ca_precio);

        if($this->ion_auth->in_empresa_activado() == 0):

            $message = "Empresa no verificada, por favor pongase en contacto con nosotros para <b>verificar su empresa</b>";
            $error ++;     

        endif;

        // Membresia

        $info_membresia = $this->membresia_library->get_membresia();
        if ($this->producto_publicaciones_model->get_publicaciones_activas() > $info_membresia->ca_publicaciones_activas):

            $message = 'Has superado el límite de publicaiones activas en tu cuenta, si deseas crear mas publicaciones debes adquirir una nueva membresia.';
            $error ++;

        endif;





                if (isset($_FILES['mi_archivo']['name'])):

        $mi_archivo_2 = $_FILES['mi_archivo']['name'];

        $ext = pathinfo($mi_archivo_2, PATHINFO_EXTENSION);
        $nombre_archivo_guardar = $this->encrypt->encode($mi_archivo_2);
        $nombre_archivo_guardar = str_replace('=','', $nombre_archivo_guardar);
        $nombre_archivo_guardar = str_replace('/','', $nombre_archivo_guardar); 
        $nombre_archivo = base_url().'img/producto_publicaciones/'.$nombre_archivo_guardar.'.'.$ext;

        $mi_archivo = 'mi_archivo';
        $config['upload_path'] = "img/producto_publicaciones";
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
            $this->producto_publicaciones_model->agregar_nuevo_producto_publicaciones_model($nb_producto, $nb_tipo_venta, $nb_estatus, $ca_precio, $ca_disponible, $co_moneda, $tx_descripcion, $ff_vence, $ff_vence_publicacion, $nb_categoria, $nb_tipo_pago, $nb_forma_entrega, $nombre_archivo, $nb_estado, $ca_pedido_minimo, $ca_multiplo, $nb_tags, $nb_forma_envio, $nb_origen_producto, $nb_permiso_importacion, $cod_barra);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }



    public function editar_producto_publicaciones($co_producto_publicaciones) {

        $data['info_producto_publicaciones'] = $this->producto_publicaciones_model->get_info_producto_publicaciones($co_producto_publicaciones);
        $data['ubicacion'] = $this->producto_publicaciones_model->get_estados();
        $data['moneda'] = $this->producto_publicaciones_model->get_monedas();
        $data['tipo_pago'] = $this->producto_publicaciones_model->get_tipo_pago();
        $data['forma_entrega'] = $this->producto_publicaciones_model->get_forma_entrega();
        $data['forma_envio'] = $this->producto_publicaciones_model->get_forma_envio();
        $data['categoria'] = $this->producto_publicaciones_model->get_categoria();
        $this->load->view('layout/header_view');
        $this->load->view('biomercado/left_sidebar_biomercado_view');
        $this->load->view('biomercado/producto_publicaciones/editar_producto_publicaciones_view', $data);
        $this->load->view('layout/footer_view');

    }

        public function ejecutar_editar_producto_publicaciones() {
        $error               = 0;
        $message             = '';
        $co_producto_publicaciones = trim($this->input->post('co_producto_publicaciones'));
        $nb_producto = trim($this->input->post('nb_producto'));
        $nb_tipo_venta        = trim($this->input->post('nb_tipo_venta'));
        $nb_estatus      = trim($this->input->post('nb_estatus'));
        $ca_precio      = trim($this->input->post('ca_precio'));
        $ca_disponible      = trim($this->input->post('ca_disponible'));
        $co_moneda      = trim($this->input->post('co_moneda'));
        $tx_descripcion      = trim($this->input->post('tx_descripcion'));
        $ff_vence      = trim($this->input->post('ff_vence'));
        $ff_vence_publicacion      = trim($this->input->post('ff_vence_publicacion'));
        $nb_categoria      = trim($this->input->post('nb_categoria'));
        $nb_tipo_pago      = trim($this->input->post('nb_tipo_pago'));
        $nb_forma_entrega      = trim($this->input->post('nb_forma_entrega'));
        $nb_estado      = trim($this->input->post('nb_estado'));
        $ca_pedido_minimo      = trim($this->input->post('ca_pedido_minimo'));
        $ca_multiplo      = trim($this->input->post('ca_multiplo'));
        $nb_tags = $this->input->post('nb_tags');

        $nb_forma_envio      = trim($this->input->post('nb_forma_envio'));
        $nb_origen_producto      = trim($this->input->post('nb_origen_producto'));
        $nb_permiso_importacion      = trim($this->input->post('nb_permiso_importacion'));
        $cod_barra      = trim($this->input->post('cod_barra'));


        $ca_precio = str_replace(".", "", $ca_precio);
        $ca_precio = str_replace(",", ".", $ca_precio);


        $nombre_archivo = '';

        if($this->ion_auth->in_empresa_activado() == 0):

            $message = "Empresa no verificada, por favor pongase en contacto con nosotros para <b>verificar su empresa</b>";
            $error ++;     

        endif;
        // Verificacion de unidades

         $ca_unidades_reserva = $this->inventario_library->get_reserva_inventario_producto($co_producto_publicaciones);

        if ($ca_disponible < $ca_unidades_reserva):

            $error ++;
            $message .= "Error, Usted tiene ($ca_unidades_reserva) unidades comprometidas con un comprador"; 

        endif;

        // verificacion foto

        if (isset($_FILES['mi_archivo']['name'])):

        $mi_archivo_2 = $_FILES['mi_archivo']['name'];
        $ext = pathinfo($mi_archivo_2, PATHINFO_EXTENSION);
        $nombre_archivo_guardar = $this->encrypt->encode($mi_archivo_2);
        $nombre_archivo_guardar = str_replace('=','', $nombre_archivo_guardar);
        $nombre_archivo_guardar = str_replace('/','', $nombre_archivo_guardar); 
        $nombre_archivo = base_url().'img/producto_publicaciones/'.$nombre_archivo_guardar.'.'.$ext;

        $mi_archivo = 'mi_archivo';
        $config['upload_path'] = "img/producto_publicaciones";
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
            $this->producto_publicaciones_model->ejecutar_editar_producto_publicaciones_model($co_producto_publicaciones, $nb_producto, $nb_tipo_venta, $nb_estatus, $ca_precio, $ca_disponible, $co_moneda, $tx_descripcion, $ff_vence, $ff_vence_publicacion, $nb_categoria, $nb_tipo_pago, $nb_forma_entrega, $nombre_archivo, $nb_estado, $ca_pedido_minimo, $ca_multiplo, $nb_tags,  $nb_forma_envio, $nb_origen_producto, $nb_permiso_importacion, $cod_barra);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

            public function eliminar_producto_publicaciones() {
        $error               = 0;
        $message             = '';
        $co_producto_publicaciones = trim($this->input->post('co_producto_publicaciones'));

        if ($error == 0) {
            $this->producto_publicaciones_model->eliminar_producto_publicaciones_model($co_producto_publicaciones);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

function cargar_excel()

{
    $co_usuario = $this->ion_auth->user_id();
    $nb_tipo_venta        = trim($this->input->post('nb_tipo_venta'));
    $nb_estatus      = trim($this->input->post('nb_estatus'));
    $co_moneda      = trim($this->input->post('co_moneda'));
    $ff_vence_publicacion      = trim($this->input->post('ff_vence_publicacion'));
    $nb_categoria      = trim($this->input->post('nb_categoria'));
    $nb_tipo_pago      = trim($this->input->post('nb_tipo_pago'));
    $nb_forma_entrega      = trim($this->input->post('nb_forma_entrega'));
    $nb_estado      = trim($this->input->post('nb_estado'));
    $ca_pedido_minimo      = trim($this->input->post('ca_pedido_minimo'));
    $ca_multiplo      = trim($this->input->post('ca_multiplo'));
//Ruta donde se guardan los ficheros

    $nb_forma_envio      = trim($this->input->post('nb_forma_envio'));
    $nb_origen_producto      = trim($this->input->post('nb_origen_producto'));


        $archivo = $_FILES['file'];
        $temp = $archivo["tmp_name"];
        $name = $archivo["name"];
        $conca = 'archivo_'.$co_usuario.$name;
        move_uploaded_file($temp, "archivos/importar/$conca");


        $inputFileName = "archivos/importar/$conca";

//  Read your Excel workbook
try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
} catch(Exception $e) {
    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}

$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

  $this->producto_publicaciones_model->importar_masivo_excel($sheetData, $co_usuario, $nb_tipo_venta, $nb_estatus, $co_moneda, $ff_vence_publicacion, $nb_categoria, $nb_tipo_pago, $nb_forma_entrega, $nb_estado, $ca_pedido_minimo, $ca_multiplo, $nb_forma_envio, $nb_origen_producto);

  redirect('producto_publicaciones/index');


}


    public function importar_producto_publicaciones() {
        $data['ubicacion'] = $this->producto_publicaciones_model->get_estados();
        $data['moneda'] = $this->producto_publicaciones_model->get_monedas();
         $data['tipo_pago'] = $this->producto_publicaciones_model->get_tipo_pago();
         $data['forma_entrega'] = $this->producto_publicaciones_model->get_forma_entrega();
         $data['categoria'] = $this->producto_publicaciones_model->get_categoria();
         $data['forma_envio'] = $this->producto_publicaciones_model->get_forma_envio();
        $this->load->view('layout/header_view');
        $this->load->view('biomercado/left_sidebar_biomercado_view');
        $this->load->view('biomercado/producto_publicaciones/importar_producto_publicaciones_view', $data);
        $this->load->view('layout/footer_view');

    }




                    public function eliminar_producto_publicaciones_accion_check() {
        $error               = 0;
        $message             = '';

        $input_check = $this->input->post('input_check');

        if ($error == 0) {
            $this->producto_publicaciones_model->eliminar_producto_publicaciones_accion_check_model($input_check);
            $message .= 'Eliminado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

                        public function suspender_producto_publicaciones() {
        $error               = 0;
        $message             = '';

        $co_producto_publicaciones = trim($this->input->post('co_producto_publicaciones'));
    
        if ($error == 0) {
            $this->producto_publicaciones_model->suspender_producto_publicaciones_model($co_producto_publicaciones);
            $message .= 'Suspender';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

                    public function suspender_producto_publicaciones_accion_check() {
        $error               = 0;
        $message             = '';

        $input_check = $this->input->post('input_check');

        if ($error == 0) {
            $this->producto_publicaciones_model->suspender_producto_publicaciones_accion_check_model($input_check);
            $message .= 'Suspendidos';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


                public function publicar_producto_publicaciones() {
        $error               = 0;
        $message             = '';

        $co_producto_publicaciones = trim($this->input->post('co_producto_publicaciones'));
    
        if ($error == 0) {
            $this->producto_publicaciones_model->publicar_producto_publicaciones_model($co_producto_publicaciones);
            $message .= 'Publicar';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


                    public function publicar_producto_publicaciones_accion_check() {
        $error               = 0;
        $message             = '';

        $input_check = $this->input->post('input_check');

        if ($error == 0) {
            $this->producto_publicaciones_model->publicar_producto_publicaciones_accion_check_model($input_check);
            $message .= 'Publicados';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

           public function ejecutar_nueva_publicidad_industrial() {
        $error               = 0;
        $message             = '';
        $co_publicidad = 0;



        $co_producto_publicaciones      = trim($this->input->post('co_producto_publicaciones'));
        $tx_descripcion      = '';
        $ca_dias      = 1;
        $nb_estado      = $this->ion_auth->ubicacion_estado();

                // Verificar si existe en borrador
        $info_publicacion = $this->producto_publicaciones_model->get_publicacion_existente($co_producto_publicaciones);
        
        if($info_publicacion):

        $co_publicidad = $info_publicacion->id;

        $arreglo = array(
            'error' => $error,
            'message' => $message,
            'co_publicidad' => $co_publicidad
        );
        echo json_encode($arreglo);

        die();

        endif;



        if($this->ion_auth->in_empresa_activado() == 0):

            $message = "Empresa no verificada, por favor pongase en contacto con nosotros para <b>verificar su empresa</b>";
            $error ++;     

        endif;


        if ($error == 0) {
            $co_publicidad = $this->producto_publicaciones_model->ejecutar_nueva_publicidad_industrial_model($tx_descripcion, $ca_dias, $nb_estado, $co_producto_publicaciones);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message,
            'co_publicidad' => $co_publicidad
        );
        echo json_encode($arreglo);
    }


    public function dashboard_producto($co_producto_publicaciones) {

        $data['info_producto_publicaciones'] = $this->producto_publicaciones_model->get_info_producto_publicaciones($co_producto_publicaciones);
        $data['inventario'] = $this->producto_publicaciones_model->get_info_producto_publicaciones_inventario($co_producto_publicaciones);
        $data['estadistica'] = $this->producto_publicaciones_model->get_info_producto_publicaciones_estadistica($co_producto_publicaciones);

        $this->load->view('layout/header_view');
        $this->load->view('biomercado/producto_publicaciones/dashboard_producto_view', $data);
        $this->load->view('layout/footer_view');

    }

        function imprimir_lista_producto_publicaciones_pdf() {
        $data['info_empresa'] = $this->empresa_library->get_info_empresa();
        $data["info_empresa_personal"] = $this->ion_auth->info_partner_todo();
        $data["listado_producto_publicaciones"] = $this->producto_publicaciones_model->get_listado_producto_publicaciones();
        $this->load->view('biomercado/producto_publicaciones/lista_producto_publicaciones_pdf', $data);
    }





}
?>