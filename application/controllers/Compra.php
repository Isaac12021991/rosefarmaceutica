<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Compra extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('compra_model', 'compra');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            return;
        }
        $this->load->library('authjwt');
        $this->load->library('pagination');
        $this->load->library('encrypt');
        $this->load->library('analisis_compra_library');


    }

        public function agregar_carro($co_producto_publicaciones) {

        if (!$this->ion_auth->logged_in()) {
        $this->load->view('sistema/sesion_expirada_view');
            return;
        }   
        $co_usuario = $this->ion_auth->user_id();
        $info_producto_publicaciones = $this->compra->get_producto_publicaciones($co_producto_publicaciones);

        // Notificar auditoria
        if ($co_usuario != $info_producto_publicaciones->co_usuario):
        $this->auditoria->log_usuario('CARTELERA', 'VER PRODUCTO', 'VER PRODUCTO EN CARTELERA', $co_usuario, $info_producto_publicaciones->co_usuario, $co_producto_publicaciones);
        endif;

        $data["info_producto_publicaciones"] = $info_producto_publicaciones;
        $this->load->view('biomercado/carro/agregar_carro_modal_view', $data);
    }

    

        public function ejecutar_agregar_carro() {
        $error               = 0;
        $message             = '';
        $co_carro_compras = trim($this->input->post('co_carro_compras'));
        $co_producto_publicaciones = trim($this->input->post('co_producto_publicaciones'));
        $ca_unidades        = trim($this->input->post('ca_unidades'));
        $ca_precio        = trim($this->input->post('ca_precio'));
        // Verificar Disponibilidad
        $ca_unidades_disponible = $this->inventario_library->get_producto_disponible($co_producto_publicaciones);

        if ($ca_unidades > $ca_unidades_disponible):

            $error ++;
            $message .= "No hay unidades disponibles, intente con menos de $ca_unidades unidades"; 

        endif;


        if ($error == 0) {
            $this->compra->ejecutar_agregar_carro_model($co_producto_publicaciones, $ca_unidades, $co_carro_compras, $ca_precio);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


           public function eliminar_producto_carro_compra() {
        $error               = 0;
        $message             = '';
        $co_producto_publicaciones = trim($this->input->post('co_producto_publicaciones'));

        if ($error == 0) {
            $this->compra->eliminar_producto_carro_compra_model($co_producto_publicaciones);
            $message .= 'Elimindado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

        public function menu_carro() {

        $data["listado_carro"] = $this->compra->get_info_carrito();
        $this->load->view('layout/header_view');
        $this->load->view('biomercado/left_sidebar_biomercado_view', $data);
        $this->load->view('biomercado/carro/menu_carro_view');
        $this->load->view('layout/footer_view');
    }


            public function actualizar_carro_orden_compra_total() {

        $data["carro_orden_compra_total"] = $this->biomercado_library->info_preparar_compra();
        $this->load->view('biomercado/carro/carro_orden_compra_total_view', $data);

    }



        public function producto_listo_comprar() {
        $error               = 0;
        $message             = '';
        $co_carro_compras = $this->input->post('co_carro_compras');
        $check = $this->input->post('check');

        if ($error == 0) {
            $this->compra->producto_listo_comprar_model($co_carro_compras, $check);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }
    

    public function comprar_ahora() {
        $error               = 0;
        $message             = '';
        $co_usuario = $this->ion_auth->user_id();
        

        // Verificar Dinero

        // verificar si hay unidades para comprar

    if (!$this->compra->in_preparado_orden_compra()):

            $error ++;
            $message .= "Por favor seleccione los productos para proceder a realizar la orden de compra"; 

        endif;



        // Verificar disponibilidad

        if ($this->compra->get_carro_compra_general_disponible()):

            $error ++;
            $message .= "Algunas unidades no estan disponibles para ejecutar la orden de compra, por favor verifique"; 

        endif;


        // verificar si tiene ordenes de compra activas

        $info_reputacion_comprado_usuario = $this->ion_auth->promedio_reputacion_usuario('COMPRADOR', $co_usuario);
        $limite = 5;

         if ($info_reputacion_comprado_usuario): 

            if($info_reputacion_comprado_usuario->nb_reputacion == 'BAJO'):

                $limite = 3;

            endif;

            if($info_reputacion_comprado_usuario->nb_reputacion == 'MEDIO'):

                $limite = 6;

            endif;

            if($info_reputacion_comprado_usuario->nb_reputacion == 'ALTO'):

                $limite = 12;

            endif;


            endif;


        if ($this->biomercado_library->ordenes_compras_activos($limite)):

            $error ++;
            $message .= "No es posible ejecutar la compra, debido a que tiene ordenes de compra activas, por favor contacte con el vendedor o cancele las ordenes de compra activas para continuar"; 

        endif;

        // validacion de membresias

        $info_membresia = $this->membresia_library->get_membresia(); 
        $info_orden_preparado = $this->compra->in_preparado_orden_compra();
        $ca_monto_total = $info_orden_preparado->ca_total_orden + $this->compra->get_monto_compra_activas();

        if ($ca_monto_total > $info_membresia->ca_monto_maximo_compra_mensual):

            $message = 'Has superado el límite del monto a comprar en tu cuenta, si deseas seguir comprando con montos mas elevados debes adquirir una nueva membresia.';
            $error ++;

        endif;


        if ($error == 0) {
            $this->compra->comprar_ahora_model();
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

    
 // Orden de compra

            public function orden_compra($filtro = 'nuevo') {

        $data["listado_orden_compra"] = $this->compra->get_orden_compra($filtro);
        $this->load->view('layout/header_view');
        $this->load->view('biomercado/left_sidebar_biomercado_view', $data);
        $this->load->view('biomercado/compra/orden_compra_view');
        $this->load->view('layout/footer_view');
    }



                public function detalle_orden_compra($co_orden_compra) {

        $data["info_orden_compra"] = $this->compra->get_info_orden_compra($co_orden_compra);
        $data["detalle_orden_compra"] = $this->compra->get_detalle_orden_compra($co_orden_compra);
        $this->load->view('layout/header_view', $data);
        $this->load->view('biomercado/compra/detalle_orden_compra_view');
        $this->load->view('layout/footer_view');
    }


    // Calificar vendedor



            public function calificar_proceso($co_orden_compra) {


        $data["co_orden_compra"] = $co_orden_compra;
      //  $data["info_calificado"] = $this->biomercado_library->get_info_calificado();
        $data["info_orden_compra"] = $this->compra->get_info_orden_compra($co_orden_compra);
        $this->load->view('biomercado/compra/calificar_usuario_modal_view', $data);

    }


            public function ejecutar_calificacion() {
        $error               = 0;
        $message             = '';
        $co_orden_compra = $this->input->post('co_orden_compra');
        $ca_calificacion = $this->input->post('ca_calificacion');
        $tx_observacion = $this->input->post('tx_observacion');
        $info_orden_compra = $this->compra->get_info_orden_compra($co_orden_compra);

        if ($error == 0) {
            $this->compra->ejecutar_calificacion_model($co_orden_compra, $ca_calificacion, $info_orden_compra->co_partner_vendedor, $info_orden_compra->co_usuario_vendedor, $tx_observacion);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }



            public function cancelar_orden_compra() {
        $error               = 0;
        $message             = '';
        $co_orden_compra = $this->input->post('co_orden_compra');

        if ($error == 0) {
            $this->compra->cancelar_orden_compra_model($co_orden_compra);
            $message .= 'Orden cancelada';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


            public function remover_orden_compra() {
        $error               = 0;
        $message             = '';
        $co_orden_compra = $this->input->post('co_orden_compra');

        if ($error == 0) {
            $this->compra->remover_orden_compra_model($co_orden_compra);
            $message .= 'Removido';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


          public function cambiar_estatus_orden_compra() {
        $error               = 0;
        $message             = '';
        $co_orden_compra = $this->input->post('co_orden_compra');
        $nb_estatus = $this->input->post('nb_estatus');

        if ($error == 0) {
            $this->compra->cambiar_estatus_orden_compra_model($co_orden_compra, $nb_estatus);
            $message .= $nb_estatus;
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

    // Marcar como pagado

                public function marcar_pagado($co_orden_compra, $ca_monto_orden_compra) {


        $data["co_orden_compra"] = $co_orden_compra;
        $data["ca_monto_orden_compra"] = $ca_monto_orden_compra;
        $data["info_orden_compra"] = $this->compra->get_info_orden_compra($co_orden_compra);
        $data["lista_forma_pago"] = $this->compra->get_forma_pago();
        $this->load->view('biomercado/compra/pagar_orden_compra_view', $data);

    }


 public function ejecutar_guardar_marcar_pagado() {
        $error               = 0;
        $message             = '';

        $co_orden_compra = trim($this->input->post('co_orden_compra'));
        $co_diario        = trim($this->input->post('co_diario'));
        $ca_pago      = trim($this->input->post('ca_pago'));
        $nu_referencia      = trim($this->input->post('nu_referencia'));
        $ff_pago      = trim($this->input->post('ff_pago'));
        $nb_forma_pago      = trim($this->input->post('nb_forma_pago'));

        $nombre_archivo = '';


        $ca_pago = str_replace(".", "", $ca_pago);
        $ca_pago = str_replace(",", ".", $ca_pago);



                if (isset($_FILES['mi_archivo']['name'])):

        $mi_archivo_2 = $_FILES['mi_archivo']['name'];

        $ext = pathinfo($mi_archivo_2, PATHINFO_EXTENSION);
        $nombre_archivo_guardar = $this->encrypt->encode($mi_archivo_2);
        $nombre_archivo_guardar = str_replace('=','', $nombre_archivo_guardar);
        $nombre_archivo_guardar = str_replace('/','', $nombre_archivo_guardar); 
        $nombre_archivo = base_url().'img/pago_orden_compra/'.$nombre_archivo_guardar.'.'.$ext;

        $mi_archivo = 'mi_archivo';
        $config['upload_path'] = "img/pago_orden_compra";
        $config['file_name'] = $nombre_archivo_guardar.'.'.$ext;
        $config['allowed_types'] = "*";
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
            $this->compra->ejecutar_guardar_marcar_pagado_model($co_orden_compra, $co_diario, $ca_pago, $nu_referencia, $ff_pago, $nombre_archivo, $nb_forma_pago);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

// Analizar compra

            public function analisis_compra() {

                

        $accion_check      = $this->input->post('accion_check', true);

                $red_final    = "";
        foreach ($accion_check as $key => $value):

        $red = "'".$value."', "; 
        $red_final = $red_final . $red;

        endforeach;

        $pivote = substr($red_final, 0, -2);


        $data['resultado_busqueda'] = $this->compra->comparar_precios_model($pivote);
        $data['comparar_precios_solo_partner'] = $this->compra->comparar_precios_solo_partner_model($pivote);
        $data['produtos_comparar'] = $this->compra->produtos_comparar($pivote);
        $data['pivote'] = $pivote;

        $this->load->view('layout/header_view');
        $this->load->view('biomercado/carro/analisis_compra_view', $data);
        $this->load->view('layout/footer_view');



   
    }

    

}
?>