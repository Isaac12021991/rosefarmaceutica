<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Evento_cron extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('evento_cron_model');

    }
    function getRemoteFile($url, $timeout = 3) {
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents = curl_exec($ch);
        curl_close($ch);
        return ($file_contents) ? $file_contents : FALSE;
}


   function ejecutar_cron()

   {

    $this->evento_cron_model->verificar_producto_publicacion_subasta(); 

    // verificar sin una orden de compra ya tiene mas de 15 dias, calificar negativo al vendedor por no responder
     $this->evento_cron_model->verificar_compra_activa(); 

     // Verificar documentacion

     $this->evento_cron_model->verificar_documentacion(); 

   }

    
        public function enviar_mail_sistema_rose() {


            $info_email_enviar = $this->evento_cron_model->get_email_pendiente();

            if($info_email_enviar->num_rows() > 0):

            $this->db->trans_start();

            foreach ($info_email_enviar->result() as $row):
                // code...
            if($row->nb_programado == 'NO'):

            $data_mensaje = json_decode($row->tx_mensaje);

            $html_data = $this->load->view('/email_sistema/template_general_view', $data_mensaje, true);

                    $config['mailtype'] = 'html';
                $this->email->initialize($config);
                $this->email->to($row->tx_email_to);
                if($row->tx_email_bcc != ''):
                 $this->email->bcc($row->tx_email_bcc);
                endif;
                $this->email->reply_to('admision@rosefarmaceutica.com');
                $this->email->from('admision@rosefarmaceutica.com', 'ROSE C.A');
                $this->email->subject($row->nb_asunto);
                $this->email->message($html_data);
                $this->email->send();

            if($this->email->send(FALSE)){

            $nb_estatus = 'Enviado';
             echo "enviado<br/>";
             echo $this->email->print_debugger(array('headers'));
            }else {
             echo "fallo <br/>";
             echo "error: ".$this->email->print_debugger(array('headers'));
             $nb_estatus = 'No enviado';
            }

             $this->evento_cron_model->set_email_recorrido($row->id, $nb_estatus);


            else:

            $in_semana = date("N");
            // Obtener Hora
            $in_hora = date("G");
            // Minutos con ceros iniciales
            $in_minuto = intval(date('i')); 


            if ($row->nb_semana == $in_semana and $row->nb_hora == $in_hora and $row->nb_minuto == $in_minuto):


            $data_mensaje = json_decode($row->tx_mensaje);

            $html_data = $this->load->view('/email_sistema/template_general_view', $data_mensaje, true);

                    $config['mailtype'] = 'html';
                $this->email->initialize($config);
                $this->email->to($row->tx_email_to);
                if($row->tx_email_bcc != ''):
                 $this->email->bcc($row->tx_email_bcc);
                endif;
                $this->email->reply_to('admision@rosefarmaceutica.com');
                $this->email->from('admision@rosefarmaceutica.com', 'ROSE C.A');
                $this->email->subject($row->nb_asunto);
                $this->email->message($html_data);
                $this->email->send();

            if($this->email->send(FALSE)){

            $nb_estatus = 'Enviado';
             echo "enviado<br/>";
             echo $this->email->print_debugger(array('headers'));
            }else {
             echo "fallo <br/>";
             echo "error: ".$this->email->print_debugger(array('headers'));
             $nb_estatus = 'No enviado';
            }

             $this->evento_cron_model->set_email_recorrido($row->id, $nb_estatus);




            endif;




            endif;


            endforeach;


              $this->db->trans_complete();

        endif;
        


    }

            public function envio_automatico_mensaje() {

            $in_semana = date("N");

            // Obtener Hora
            $in_hora = date("G");

            // Minutos con ceros iniciales
            $in_minuto = intval(date('i')); 


    $info_email_enviar = $this->evento_cron_model->get_email_mensajes_automaticos($in_semana, $in_hora, $in_minuto);



            if($info_email_enviar->num_rows() > 0):

                foreach ($info_email_enviar->result() as $row):

         $empresas     = $this->evento_cron_model->obtener_empresas_model($row->nb_tipo_empresa);
         $empresas_token_firebase     = $this->evento_cron_model->obtener_empresas_con_token_firebase_model($row->nb_tipo_empresa);


         if($empresas->num_rows() == 0):
            break;
            die();
         endif;

        $red_final    = "";
        $red_final_email_malo    = "";
        $lote_email_mal = "";


        foreach ($empresas->result() as $row_secund):
            $email = filter_var($row_secund->tx_email, FILTER_VALIDATE_EMAIL);

        if($email == false):
            continue;
            endif;
                
            $domain = strchr($email,'@');
            $domain = substr($domain, 1);

            if(!checkdnsrr($domain,'MX')):
            $red_2       = $row_secund->tx_email . ", ";
            $red_final_email_malo = $red_final_email_malo . $red_2;
                continue;
            endif;

            $red       = $row_secund->tx_email . ", ";
            $red_final = $red_final . $red;
        endforeach;

        $lote_email           = substr($red_final, 0, -2);

        $lote_email_mal           = substr($red_final_email_malo, 0, -2);





            if($row->nb_tipo_promocion == 'PRODUCTOS MAS SOLICITADOS'):

            $info_producto_solicitado = $this->evento_cron_model->get_productos_mas_solicitados_model();

            if($info_producto_solicitado->num_rows() > 0):

                    $html_tabla = "

            <table border='1' align='center'>
            <tr>
            <td>Producto</td>
            <td>Cantidad</td>
            </tr>"; ?>

            <?php foreach ($info_producto_solicitado->result() as $row_two): 
            $ca_producto = number_format($row_two->ca_producto,2,',','.'); ?>
            <?php $html_tabla .= "<tr>
            <td>$row_two->nb_producto</td>
            <td>$ca_producto</td>
            </tr>"; ?>

            <?php endforeach; 


            $data_mensaje['titulo_1'] = 'Productos más solicitados';
            $data_mensaje['titulo_2'] = '';
            $data_mensaje['mensaje_subtitulo'] = 'Los productos mas solicitados por las empresas farmaceuticas a nivel nacional';
            $data_mensaje['mensaje_principal'] = $html_tabla;
            $data_mensaje['mensaje_pie_pagina'] = '';
            


            $html_data = $this->load->view('/email_sistema/template_general_view', $data_mensaje, true);


            $lote_email = trim($lote_email);
            $this->email->to('admision@rosefarmaceutica.com');
            $this->email->bcc($lote_email);
            $this->email->reply_to('admision@rosefarmaceutica.com');
            $this->email->from('admision@rosefarmaceutica.com', 'ROSE.', 'admision@rosefarmaceutica.com');
            $this->email->subject('[ROSE - PRODUCTOS MAS SOLICITADOS]');
            $this->email->message($html_data);
            //$this->email->attach('pdf/lista_precio/' . $nombre_pdf . '.pdf');
            $this->email->send();

         endif;

 endif;

 // fin de los productos mas solicitados


            if($row->nb_tipo_promocion == 'MOSTRAR ALEATORIO PRODUCTOS DE DROGUERIA'):


             $info_producto_cartelera_para_farmacia =  $this->evento_cron_model->get_productos_aleatorios_de_drogueria();

             if($info_producto_cartelera_para_farmacia->num_rows() > 0):

            $tx_mensaje_notificacion_push_sms = '';

            $html_tabla = "

            <table border='1' align='center'>
            <tr>
            <td>Producto</td>
            <td>Descripcion</td>
            <td>Precio $</td>
            </tr>"; ?>

            <?php foreach ($info_producto_cartelera_para_farmacia->result() as $row_two): 
            $ca_precio = number_format($row_two->ca_precio,2,',','.'); ?>
            <?php $html_tabla .= "<tr>
            <td>$row_two->nb_producto</td>
             <td>$row_two->tx_descripcion</td>
            <td>$ca_precio;</td>

            </tr>"; ?>



            <?php $tx_mensaje_notificacion_push_sms = $row_two->nb_producto.' a '.$ca_precio.' $, Sólo para ti.'; endforeach; 


            // Notificar vias notificacion_push_sms

            $this->agregar_notificacion_push_sms($empresas_token_firebase, $tx_mensaje_notificacion_push_sms);


              $data_mensaje['titulo_1'] = 'Productos que te pueden interesar en Rose';
            $data_mensaje['titulo_2'] = '';
            $data_mensaje['mensaje_subtitulo'] = 'Te ofrecemos algunos de los productos disponibles en Rose';
            $data_mensaje['mensaje_principal'] = $html_tabla;
            $data_mensaje['mensaje_pie_pagina'] = '';
            


            $html_data = $this->load->view('/email_sistema/template_general_view', $data_mensaje, true);


            $lote_email = trim($lote_email);
            $this->email->to('admision@rosefarmaceutica.com');
            $this->email->bcc($lote_email);
            $this->email->reply_to('admision@rosefarmaceutica.com');
            $this->email->from('admision@rosefarmaceutica.com', 'ROSE.', 'admision@rosefarmaceutica.com');
            $this->email->subject('[ROSE - PRODUCTOS QUE TE PUEDEN INTERESAR]');
            $this->email->message($html_data);
            //$this->email->attach('pdf/lista_precio/' . $nombre_pdf . '.pdf');
            $this->email->send();


            endif;




            endif;

            // Fin de promocion de productos


            // Inicio de promocion productos casa de representacion


            if($row->nb_tipo_promocion == 'MOSTRAR ALEATORIO PRODUCTOS DE CASA DE REPRESENTACION'):


             $info_producto_cartelera_para_casa_de_representacion =  $this->evento_cron_model->get_productos_aleatorios_de_casa_representacion();

             if($info_producto_cartelera_para_casa_de_representacion->num_rows() > 0):

                                 $html_tabla = "

            <table border='1' align='center'>
            <tr>
            <td>Producto</td>
            <td>Descripcion</td>
            <td>Precio $</td>
            </tr>"; ?>

            <?php foreach ($info_producto_cartelera_para_casa_de_representacion->result() as $row_two): 
            $ca_precio = number_format($row_two->ca_precio,2,',','.'); ?>
            <?php $html_tabla .= "<tr>
            <td>$row_two->nb_producto</td>
             <td>$row_two->tx_descripcion</td>
            <td>$ca_precio</td>

            </tr>"; ?>

            <?php endforeach; 


              $data_mensaje['titulo_1'] = 'Productos que te pueden interesar en Rose';
            $data_mensaje['titulo_2'] = '';
            $data_mensaje['mensaje_subtitulo'] = 'Te ofrecemos algunos de los productos disponibles en Rose';
            $data_mensaje['mensaje_principal'] = $html_tabla;
            $data_mensaje['mensaje_pie_pagina'] = '';
            


            $html_data = $this->load->view('/email_sistema/template_general_view', $data_mensaje, true);


            $lote_email = trim($lote_email);
            $this->email->to('admision@rosefarmaceutica.com');
            $this->email->bcc($lote_email);
            $this->email->reply_to('admision@rosefarmaceutica.com');
            $this->email->from('admision@rosefarmaceutica.com', 'ROSE.', 'admision@rosefarmaceutica.com');
            $this->email->subject('[ROSE - PRODUCTOS QUE TE PUEDEN INTERESAR]');
            $this->email->message($html_data);
            //$this->email->attach('pdf/lista_precio/' . $nombre_pdf . '.pdf');
            $this->email->send();


            endif;




            endif;


            // Avisar si hay  solicitud a las casa de representacion



            if($row->nb_tipo_promocion == 'AVISAR SI HAY SOLICITUD DE DROGUERIA A CASA DE REPRESENTACION'):

             $info_empresa = $this->empresa_library->get_empresa_rose('CASA DE REPRESENTACION|LABORATORIO');


             if ($info_empresa->num_rows() > 0):

            foreach ($info_empresa->result() as $row_empresa):
    
            $info_solicitud_cotizacion_farmacia_clinica_drogueria =  $this->evento_cron_model->get_solicitud_cotizacion_farmacia_clinica_drogueria($row_empresa->id, $row_empresa->nb_estado, $row_empresa->co_usuario, 'CASA DE REPRESENTACION|LABORATORIO');

             if($info_solicitud_cotizacion_farmacia_clinica_drogueria->num_rows() > 0):


           $html_tabla = "

            <table border='1' align='center'>
            <tr>
            <td>Solicitud Nro</td>
            <td>Empresa</td>
            <td>Usuario</td>
            <td>Estado</td>
            </tr>"; ?>

            <?php foreach ($info_solicitud_cotizacion_farmacia_clinica_drogueria->result() as $row_two): ?>
            <?php $html_tabla .= "<tr>
            <td>$row_two->nu_codigo_cotizacion</td>
             <td>$row_two->nb_tipo_empresa</td>
             <td>$row_two->username</td>
            <td>$row_two->nb_estado</td>

            </tr>"; ?>

            <?php endforeach; 


              $data_mensaje['titulo_1'] = 'Solicitud de Cotización';
            $data_mensaje['titulo_2'] = 'Nuevas solicitudes';
            $data_mensaje['mensaje_subtitulo'] = 'Tienes nuevas solicitudes de cotizacion';
            $data_mensaje['mensaje_principal'] = $html_tabla;
            $data_mensaje['mensaje_pie_pagina'] = 'Entra a Rose para más información';
            


            $html_data = $this->load->view('/email_sistema/template_general_view', $data_mensaje, true);

            $this->email->to('admision@rosefarmaceutica.com');
            $this->email->bcc($row_empresa->email);
            $this->email->reply_to('admision@rosefarmaceutica.com');
            $this->email->from('admision@rosefarmaceutica.com', 'ROSE', 'admision@rosefarmaceutica.com');
            $this->email->subject('[ROSE - NUEVAS SOLICITUDES DE COTIZACION]');
            $this->email->message($html_data);
            //$this->email->attach('pdf/lista_precio/' . $nombre_pdf . '.pdf');
            $this->email->send();




             endif;


            endforeach;


            endif;
            endif;



            if($row->nb_tipo_promocion == 'AVISAR SI HAY SOLICITUD DE FARMACIA O CLINICA A DROGUERIA'):

             $info_empresa = $this->empresa_library->get_empresa_rose('DROGUERIA');


             if ($info_empresa->num_rows() > 0):

            foreach ($info_empresa->rsult() as $row_empresa):
    
            $info_solicitud_cotizacion_farmacia_clinica_drogueria =  $this->evento_cron_model->get_solicitud_cotizacion_farmacia_clinica_drogueria($row_empresa->id, $row_empresa->nb_estado, $row_empresa->co_usuario, 'DROGUERIA');

             if($info_solicitud_cotizacion_farmacia_clinica_drogueria->num_rows() > 0):


           $html_tabla = "

            <table border='1' align='center'>
            <tr>
            <td>Solicitud Nro</td>
            <td>Empresa</td>
            <td>Usuario</td>
            <td>Estado</td>
            </tr>"; ?>

            <?php foreach ($info_solicitud_cotizacion_farmacia_clinica_drogueria->result() as $row_two): ?>
            <?php $html_tabla .= "<tr>
            <td>$row_two->nu_codigo_cotizacion</td>
             <td>$row_two->nb_tipo_empresa</td>
             <td>$row_two->username</td>
            <td>$row_two->nb_estado</td>

            </tr>"; ?>

            <?php endforeach; 


              $data_mensaje['titulo_1'] = 'Solicitud de Cotización';
            $data_mensaje['titulo_2'] = 'Nuevas solicitudes';
            $data_mensaje['mensaje_subtitulo'] = 'Tienes nuevas solicitudes de cotizacion';
            $data_mensaje['mensaje_principal'] = $html_tabla;
            $data_mensaje['mensaje_pie_pagina'] = 'Entra a Rose para más información';
            


            $html_data = $this->load->view('/email_sistema/template_general_view', $data_mensaje, true);

            $this->email->to('admision@rosefarmaceutica.com');
            $this->email->bcc($row_empresa->email);
            $this->email->reply_to('admision@rosefarmaceutica.com');
            $this->email->from('admision@rosefarmaceutica.com', 'ROSE', 'admision@rosefarmaceutica.com');
            $this->email->subject('[ROSE - NUEVAS SOLICITUDES DE COTIZACION]');
            $this->email->message($html_data);
            //$this->email->attach('pdf/lista_precio/' . $nombre_pdf . '.pdf');
            $this->email->send();




             endif;


            endforeach;


            endif;
            endif;





             endforeach;


        endif;
        





    }


// Notificacionpush cliente

               public function conexion_servidor() {
        $error            = 0;
        $message          = '';
        $ca_notificacion = 0;


        if ($error == 0) {

        $ca_mensajes_estado_rose =  $this->evento_cron_model->get_ca_mensajes_estado_rose();

          $mensajes_notificacion_push_sms =  $this->evento_cron_model->get_mensajes_notificacion_push_sms();
          $info_evento_compra_venta_solicitud =  $this->evento_cron_model->get_evento_compra_venta_solicitud();
          $ca_solicitud_cotizacion_pendiente =  $this->evento_cron_model->get_evento_solicitud_cotizacion();


        }

        if($mensajes_notificacion_push_sms->num_rows() > 0):

            $this->evento_cron_model->set_mensaje_visto_push_sms();

        endif;

        $data = $mensajes_notificacion_push_sms->result_array();

        $arreglo = array(
            'array_notificacion_push_sms' => json_encode($data, JSON_PRETTY_PRINT),
            'ca_mensajes_notificacion_push_sms' => $mensajes_notificacion_push_sms->num_rows(),
             'nu_venta_confirmada' => $info_evento_compra_venta_solicitud->nu_venta_confirmada,
              'nu_propuesta_orden_compra' => $info_evento_compra_venta_solicitud->nu_propuesta_orden_compra,
              'ca_solicitud_cotizacion_pendiente' => $ca_solicitud_cotizacion_pendiente,
              'ca_mensajes_estado_rose' => $ca_mensajes_estado_rose
            
        );
        echo json_encode($arreglo);
        die();

    }

     function cerrar_notificacion() {
    $error               = 0;
    $message             = '';
    $co_notificacion_mensaje_push_sms     = $this->input->post('co_notificacion_mensaje_push_sms');
    
    $this->evento_cron_model->cerrar_notificacion_model($co_notificacion_mensaje_push_sms);
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);

    }


    // Enviar notificacion push o sms


    function enviar_notificacion_push()
    {

       $info_notificacion_push = $this->evento_cron_model->get_notificacion_push_pendiente();

        if($info_notificacion_push->num_rows() > 0):
            foreach ($info_notificacion_push->result() as $row):
                $this->evento_cron_model->ejecutar_conexion_firebase('Rose Farmaceutica', $row->tx_mensaje, $row->token_firebase);
                $this->evento_cron_model->set_notificacion_push_enviado($row->id);
            endforeach;
        endif;
    }



    function agregar_notificacion_push_sms($empresas_usuarios_token, $tx_mensaje)
    {


        if($empresas_usuarios_token->num_rows() > 0):

            foreach ($empresas_usuarios_token->result() as $row):

                $this->evento_cron_library->set_notificacion_push_sms($row->co_usuario, $tx_mensaje);


            endforeach;

        endif;

    }





}
