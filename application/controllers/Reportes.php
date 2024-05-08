<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reportes extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('reportes_model', 'reportes');
         if (!$this->ion_auth->logged_in()) {
             redirect('/auth/login');
             return;
         }
        if (!$this->ion_auth->perfil(array(
            'ADMINISTRADOR','DOCUMENTOS','INVENTARIO','ALMACEN'
        ))):
            redirect('inicio/index');
         endif;

    }
    public function index() {
        $this->load->view('layout/header_view');
        $this->load->view('reportes/reportes_main_view');
        $this->load->view('layout/footer_view');
    }
    // Inventario general
    public function inventario_main_general() {
        //$data['listado_inventario_general']=$this->reportes->get_inventario_general_model();
        $data['lista_almacenes'] = $this->reportes->get_lista_almacen();
        $this->load->view('reportes/inventario/general/inventario_general_main_view', $data);
    }
    // Inventario detalle
    public function reporte_inventario_general_submain() {
        $co_almacen     = trim($this->input->post('co_almacen'));
        $co_tipo_salida = trim($this->input->post('co_tipo_salida'));
        if ($co_tipo_salida == -1):
            $data['inventario_general'] = $this->reportes->get_inventario_general_model($co_almacen);
        else:
            $data['inventario_general_detalle'] = $this->reportes->get_inventario_detalle_model($co_almacen);
        endif;
        $data['co_tipo_salida'] = $co_tipo_salida;
        $this->load->view('reportes/inventario/general/inventario_general_submain_view', $data);
    }
    // Exportar a excel
    public function exportar_inventario_general_excel() {
        $co_almacen     = trim($this->input->post('co_almacen'));
        $co_tipo_salida = trim($this->input->post('co_tipo_salida'));
        if ($co_tipo_salida == -1):
            $data['inventario_general'] = $this->reportes->get_inventario_general_model($co_almacen);
        else:
            $data['inventario_general_detalle'] = $this->reportes->get_inventario_detalle_model($co_almacen);
        endif;
        $data['co_tipo_salida'] = $co_tipo_salida;
        $this->load->view('reportes/inventario/general/excel_inventario_general_submain_view', $data);
    }
    // Movimiento de Inventario Main
    function inventario_main_movimiento() {
        $data['lista_almacenes']       = $this->reportes->get_lista_almacen();
        $data['lista_tipo_movimiento'] = $this->reportes->get_tipo_movimiento();
        $this->load->view('reportes/inventario/movimiento/inventario_main_movimiento_view', $data);
    }
    // Movimiento de Inventario Submain
    function reporte_inventario_movimiento_submain() {
        $co_almacen                 = trim($this->input->post('co_almacen'));
        $co_tipo_salida             = trim($this->input->post('co_tipo_salida'));
        $co_tipo_movimiento         = trim($this->input->post('co_tipo_movimiento'));
        $ff_desde                   = trim($this->input->post('ff_desde'));
        $ff_hasta                   = trim($this->input->post('ff_hasta'));
        $data['inventario_detalle'] = $this->reportes->reporte_inventario_movimiento_submain_model($co_almacen, $co_tipo_movimiento, $ff_desde, $ff_hasta, $co_tipo_salida);
        $data['co_tipo_salida']     = $co_tipo_salida;
        $this->load->view('reportes/inventario/movimiento/inventario_submain_movimiento_view', $data);
    }
    // Reportes de documentos
    function main_listado_cuentas_por_cobrar() {
        $data['lista_pagos'] = $this->reportes->get_lista_pagos();
        $this->load->view('reportes/documentos/cuentas_por_cobrar/main_listado_cuentas_por_cobrar_view',$data);
    }
    function sub_main_listado_cuentas_por_cobrar() {
        $ff_desde                           = trim($this->input->post('ff_desde'));
        $ff_hasta                           = trim($this->input->post('ff_hasta'));
        $co_tipo_pago                           = trim($this->input->post('co_tipo_pago'));
        $data['listado_cuentas_por_cobrar_resumen'] = $this->reportes->get_listado_cuentas_por_cobrar_resumen_model($ff_desde, $ff_hasta, $co_tipo_pago);
        $data['listado_cuentas_por_cobrar'] = $this->reportes->get_listado_cuentas_por_cobrar_model($ff_desde, $ff_hasta, $co_tipo_pago);
        $this->load->view('reportes/documentos/cuentas_por_cobrar/sub_main_listado_cuentas_por_cobrar_view', $data);
    }
    // Exportar a excel documentos 
        function sub_main_listado_cuentas_por_cobrar_excel() {
        $ff_desde                           = trim($this->input->post('ff_desde'));
        $ff_hasta                           = trim($this->input->post('ff_hasta'));
        $co_tipo_pago                           = trim($this->input->post('co_tipo_pago'));
        $co_estatus_pago                           = trim($this->input->post('co_estatus_pago'));
        $data['listado_cuentas_por_cobrar_resumen'] = $this->reportes->get_listado_cuentas_por_cobrar_resumen_model($ff_desde, $ff_hasta, $co_tipo_pago, $co_estatus_pago);
        $data['listado_cuentas_por_cobrar'] = $this->reportes->get_listado_cuentas_por_cobrar_model($ff_desde, $ff_hasta, $co_tipo_pago, $co_estatus_pago);
        $this->load->view('reportes/documentos/cuentas_por_cobrar/sub_main_listado_cuentas_por_cobrar_excel', $data);
    }
    // Reporte salida inventario
    function listado_inventario_salida() {
        $this->load->view('reportes/inventario/inventario_salida_main_view');
    }
    // Reporte
    function reporte_inventario_salida() {
        $ff_desde                  = trim($this->input->post('ff_desde'));
        $ff_hasta                  = trim($this->input->post('ff_hasta'));
        $data['inventario_salida'] = $this->reportes->get_unidades_salidas($ff_desde, $ff_hasta);
        $this->load->view('reportes/inventario/inventario_salida_view', $data);
    }
    // Ver detalle de factura orden compra pagos
    function reporte_detalle_factura_orden_compra_pago($co_documento) {
        $data['info_general']              = $this->reportes->get_info_general_factura_orden_compra($co_documento);
        $data['factura_orden_compra_pago'] = $this->reportes->get_reporte_detalle_factura_orden_compra_pago($co_documento);
        $this->load->view('reportes/documentos/reporte_detalle_factura_orden_compra_pago_view', $data);
    }
    // Ver reporte almacen
    function reporte_almacen() {
        $data['lista_almacen'] = $this->reportes->get_lista_almacen();
        $this->load->view('reportes/almacen/almacen_main_view', $data);
    }
    // Reporte encuesta
    function reporte_encuesta() {
        $data['lista_usuarios'] = $this->reportes->get_lista_usuario();
        $data['estatus']        = $this->reportes->get_estatus();
        $this->load->view('reportes/encuesta/encuesta_main_view', $data);
    }
    // Reporte_encuesta
    function reporte_encuesta_submain() {
        $ff_desde                         = trim($this->input->post('ff_desde'));
        $ff_hasta                         = trim($this->input->post('ff_hasta'));
        $co_usuario                       = trim($this->input->post('co_usuario'));
        $co_estatus                       = trim($this->input->post('co_estatus'));
        $data['reporte_encuesta_general'] = $this->reportes->reporte_encuesta_general_model($ff_desde, $ff_hasta, $co_usuario, $co_estatus);
        $data['reporte_encuesta_detalle'] = $this->reportes->reporte_encuesta_detalle_model($ff_desde, $ff_hasta, $co_usuario, $co_estatus);
        $data['reporte_encuesta_usuario'] = $this->reportes->reporte_encuesta_por_usuario_model($ff_desde, $ff_hasta, $co_usuario, $co_estatus);
        $this->load->view('reportes/encuesta/encuesta_submain_view', $data);
    }
    // Reporte relacion documento - inventario
    function reporte_documento_inventario() {
        $this->load->view('reportes/documentos_inventario/documento_inventario_main_view');
    }
    function reporte_documento_inventario_submain() {
        $ff_desde                             = trim($this->input->post('ff_desde'));
        $ff_hasta                             = trim($this->input->post('ff_hasta'));
        $data['reporte_documento_inventario'] = $this->reportes->reporte_documento_inventario_model($ff_desde, $ff_hasta);
        $this->load->view('reportes/documentos_inventario/documento_inventario_submain_view', $data);
    }
    // Reporte mesnsual documento
    function reporte_documento_mensual() {
        $this->load->view('reportes/documentos_mensual/documento_mensual_main_view');
    }
    function reporte_documento_mensual_submain() {
        $ff_desde                                                     = trim($this->input->post('ff_desde'));
        $ff_hasta                                                     = trim($this->input->post('ff_hasta'));
        $data['reporte_documento_general_mensual']                    = $this->reportes->reporte_documento_general_mensual_model($ff_desde, $ff_hasta);
        $data['reporte_documento_general_mensual_verificacion_monto'] = $this->reportes->reporte_documento_general_mensual_verificacion_monto_model($ff_desde, $ff_hasta);
        $data['reporte_documento_mensual']                            = $this->reportes->reporte_documento_mensual_model($ff_desde, $ff_hasta);
        $this->load->view('reportes/documentos_mensual/documento_mensual_submain_view', $data);
    }
    function reporte_encuesta_submain_excel() {
        $ff_desde                         = trim($this->input->post('ff_desde'));
        $ff_hasta                         = trim($this->input->post('ff_hasta'));
        $co_usuario                       = trim($this->input->post('co_usuario'));
        $co_estatus                       = trim($this->input->post('co_estatus'));
        $data['reporte_encuesta_general'] = $this->reportes->reporte_encuesta_general_model($ff_desde, $ff_hasta, $co_usuario, $co_estatus);
        $data['reporte_encuesta_detalle'] = $this->reportes->reporte_encuesta_detalle_model($ff_desde, $ff_hasta, $co_usuario, $co_estatus);
        $data['reporte_encuesta_usuario'] = $this->reportes->reporte_encuesta_por_usuario_model($ff_desde, $ff_hasta, $co_usuario, $co_estatus);
        $this->load->view('reportes/encuesta/excel/encuesta_submain_excel_view', $data);
    }
        // Reporte encuesta
    function lista_precio_general() {
        $this->load->view('reportes/lista_precio/lista_precio_main_view');
    }
        function reporte_lista_precio_submain() {
        $ff_desde                                                     = trim($this->input->post('ff_desde'));
        $ff_hasta                                                     = trim($this->input->post('ff_hasta'));
        $data['info_general']                            = $this->reportes->info_general_lista_precio_stack_model($ff_desde, $ff_hasta);        
        $data['info_lista_precio']                            = $this->reportes->reporte_lista_precio_submain_model($ff_desde, $ff_hasta);
        $this->load->view('reportes/lista_precio/lista_precio_submain_view', $data);
    }

            function reporte_lista_precio_submain_excel() {
      
        $ff_desde                                                     = trim($this->input->post('ff_desde'));
        $ff_hasta                                                     = trim($this->input->post('ff_hasta'));
        $data['info_lista_precio']                            = $this->reportes->reporte_lista_precio_submain_model($ff_desde, $ff_hasta);
        $this->load->view('reportes/lista_precio/excel/lista_precio_submain_excel_view', $data);
    }

        // Reporte movimiento inventario 2
    function reporte_movimiento_inventario_2_main() {
        $this->load->view('reportes/inventario/movimiento_2/inventario_movimiento_2_main_view');
    }

    function reporte_movimiento_inventario_2_submain() {
        $ff_desde                                                     = trim($this->input->post('ff_desde'));
        $ff_hasta                                                     = trim($this->input->post('ff_hasta'));       
        $data['info_movimiento_inventario']                            = $this->reportes->reporte_movimiento_inventario_2_submain_model($ff_desde, $ff_hasta);
        $this->load->view('reportes/inventario/movimiento_2/inventario_movimiento_2_submain_view', $data);
    }

    function reporte_movimiento_inventario_2_submain_excel() {
      
        $ff_desde                                                     = trim($this->input->post('ff_desde'));
        $ff_hasta                                                     = trim($this->input->post('ff_hasta'));
        $data['info_movimiento_inventario']                            = $this->reportes->reporte_movimiento_inventario_2_submain_model($ff_desde, $ff_hasta);
        $this->load->view('reportes/inventario/movimiento_2/excel/reporte_movimiento_inventario_2_submain_excel_view', $data);
    }

    // Reporte Plan Vs Real del mes y año
    function reporte_planvsreal_main() {
        $this->load->view('reportes/documentos/planvsreal_main_view');
    }

    function reporte_planvsreal() {
        $mes = trim($this->input->post('mes'));
        $ano = trim($this->input->post('ano')); 
        $co_tipo_plan = trim($this->input->post('co_tipo_plan')); 
        $data['info_planvsreal'] = $this->reportes->reporte_plan_vs_real_model($mes, $ano, $co_tipo_plan);
        $this->load->view('reportes/documentos/planvsreal_reporte_view', $data);
    }
    
    // Reporte Productos facturados al mes y a���o
    function reporte_facturadomes_main() {
        $this->load->view('reportes/documentos/facturadomes_main_view');
    }

    function reporte_facturadomes() {
        $ff_desde = trim($this->input->post('ff_desde'));
        $ff_hasta = trim($this->input->post('ff_hasta')); 
        $data['info_facturadomes'] = $this->reportes->reporte_facturadomes_model($ff_desde, $ff_hasta);
        $this->load->view('reportes/documentos/facturadomes_reporte_view', $data);
    }


}
?>