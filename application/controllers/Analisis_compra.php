<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Analisis_compra extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('analisis_compra_model');
        $this->load->library('analisis_compra_library');

        $this->load->library('excel');
        $this->load->library('encrypt');

        if (!$this->ion_auth->logged_in()) {
             redirect('auth/login');
         }
    }
    public function index() {

        $data['lista_analisis_compra'] = $this->analisis_compra_model->get_lista_analisis_compra();
        $this->load->view('layout/header_view');
        $this->load->view('analisis_compra/analisis_compra_main_view', $data);
        $this->load->view('layout/footer_view');
    }

        public function crear_lista_carga_masiva() {
        $data['lista_monedas'] = $this->analisis_compra_model->get_monedas();
        $data['ubicacion'] = $this->analisis_compra_model->get_estados();
        $this->load->view('layout/header_view');
        $this->load->view('analisis_compra/carga_masiva_view', $data);
        $this->load->view('layout/footer_view');      
    }

function cargar_excel()

{
    $co_usuario = $this->ion_auth->user_id();
    $nb_lista        = trim($this->input->post('nb_lista'));
    $co_moneda      = trim($this->input->post('co_moneda'));

        $nb_empresa        = trim($this->input->post('nb_empresa'));
        $tx_descripcion      = trim($this->input->post('tx_descripcion'));
        $nb_estado      = trim($this->input->post('nb_estado'));

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

  $this->analisis_compra_model->importar_masivo_excel($sheetData, $co_usuario, $nb_lista, $co_moneda, $nb_empresa, $tx_descripcion, $nb_estado);

  redirect('analisis_compra/index');


}

        function editar_ejecutar_analisis_compra() {
        $error                  = 0;
        $message                = '';

        $co_analisis_compra = trim($this->input->post('co_analisis_compra'));
        $nb_analisis_compra = trim($this->input->post('nb_analisis_compra'));
        $co_contacto        = trim($this->input->post('co_contacto'));
        $co_moneda        = trim($this->input->post('co_moneda'));

        if ($error == 0) {
        $this->analisis_compra_model->editar_ejecutar_analisis_compra_model($co_analisis_compra, $nb_analisis_compra, $co_contacto, $co_moneda, $nb_empresa, $tx_descripcion, $nb_estado);
            $message .= 'Registros enviados';
            // Notificacion
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }
 

 

     function eliminar_lista_analisis_compra() {
        $error                = 0;
        $message              = '';
        $co_analisis_lista_proveedor = trim($this->input->post('co_analisis_lista_proveedor'));
        if ($error == 0) {
            $this->analisis_compra_model->eliminar_lista_analisis_compra_model($co_analisis_lista_proveedor);
            $message .= 'Lista eliminada';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


     function eliminar_lista_analisis_compra_linea() {
        $error                = 0;
        $message              = '';
        $co_analisis_lista_proveedor_linea = trim($this->input->post('co_analisis_lista_proveedor_linea'));
        if ($error == 0) {
            $this->analisis_compra_model->eliminar_lista_analisis_compra_linea_model($co_analisis_lista_proveedor_linea);
            $message .= 'Eliminado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


    public function editar_lista_proveedor($co_analisis_compra) {
        $data['lista_proveedores'] = $this->analisis_compra_model->get_lista_proveedor();
        $data['lista_monedas'] = $this->analisis_compra_model->get_monedas();

        $data['info_analisis_compra'] = $this->analisis_compra_model->get_info_analisis_compra($co_analisis_compra);
        $data['info_analisis_compra_detalle'] = $this->analisis_compra_model->get_info_analisis_compra_detalle($co_analisis_compra);

        $this->load->view('layout/header_view');
        $this->load->view('analisis_compra/editar/editar_analisis_compra_view', $data);
        $this->load->view('layout/footer_view');      
    }

    function comparar_precios() {
        $error                  = 0;
        $message                = '';

        $accion_check_reci = $this->input->get('accion_check', true);


        $red_final    = "";
        foreach ($accion_check_reci as $key => $value):

        $red = "'".$value."', "; 
        $red_final = $red_final . $red;

        endforeach;

        $pivote = substr($red_final, 0, -2);


        $data['resultado_busqueda'] = $this->analisis_compra_model->comparar_precios_model($pivote);
        $data['resultado_busqueda_dos'] = $this->analisis_compra_model->comparar_precios_dos_model($pivote);
        $data['produtos_comparar'] = $this->analisis_compra_model->produtos_comparar($pivote);


        $this->load->view('layout/header_view');
        $this->load->view('analisis_compra/reportes/reporte_analisis_compra_uno_view', $data);
        $this->load->view('layout/footer_view');   
    }
 


    public function editar_lista_proveedor_linea($co_analisis_compra_linea) {


        $data['info_analisis_compra_detalle'] = $this->analisis_compra_model->get_info_analisis_compra_detalle_row($co_analisis_compra_linea);
        $this->load->view('analisis_compra/editar/editar_analisis_compra_producto_linea_view', $data);
    }
 

        function editar_ejecutar_producto_listado() {
        $error                  = 0;
        $message                = '';

        $co_analisis_compra_detalle = trim($this->input->post('co_analisis_compra_detalle'));
        $nb_producto = trim($this->input->post('nb_producto'));
        $ca_precio        = trim($this->input->post('ca_precio'));
        $tx_descripcion        = trim($this->input->post('tx_descripcion'));
        $vence        = trim($this->input->post('vence'));
        $ca_unidad_manejo        = trim($this->input->post('ca_unidad_manejo'));
        $tx_fabricante        = trim($this->input->post('tx_fabricante'));

        if ($error == 0) {
        $this->analisis_compra_model->editar_ejecutar_producto_listado_model($co_analisis_compra_detalle, $nb_producto, $ca_precio, $tx_descripcion, $vence, $ca_unidad_manejo, $tx_fabricante);
            $message .= 'Registros enviados';
            // Notificacion
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


    public function agregar_lista_proveedor_linea($co_analisis_compra) {

        $data['co_analisis_compra'] = $co_analisis_compra;
        $this->load->view('analisis_compra/editar/agregar_analisis_compra_producto_linea_view', $data);
    }

    

            function agregar_ejecutar_producto_listado() {
        $error                  = 0;
        $message                = '';

        $co_analisis_compra = trim($this->input->post('co_analisis_compra'));
        $nb_producto = trim($this->input->post('nb_producto'));
        $ca_precio        = trim($this->input->post('ca_precio'));
        $tx_descripcion        = trim($this->input->post('tx_descripcion'));
        $vence        = trim($this->input->post('vence'));
        $ca_unidad_manejo        = trim($this->input->post('ca_unidad_manejo'));
        $tx_fabricante        = trim($this->input->post('tx_fabricante'));

        if ($error == 0) {
        $this->analisis_compra_model->agregar_ejecutar_producto_listado_model($co_analisis_compra, $nb_producto, $ca_precio, $tx_descripcion, $vence, $ca_unidad_manejo, $tx_fabricante);
            $message .= 'Registros enviados';
            // Notificacion
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }
 

}
?>