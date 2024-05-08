<?php

class Evento_cron_model extends CI_Model {


    function __construct()
    {
                parent::__construct();
        
    }



function verificar_producto_publicacion_subasta()  {       

    $ff_sistema_time = time();

    $sql  = "SELECT a.*, b.nb_moneda, b.nb_acronimo, c.nb_empresa, c.nb_tipo_empresa, c.nb_estado, a.in_activo, a.ff_vence_publicacion
        FROM
        e002t_producto_publicaciones AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join j049t_empresas_farmaceuticas_todas as c on c.id = a.co_partner
        where a.in_activo = true and a.nb_tipo_venta = 'Subasta' and a.nb_estatus = 'Publicado' and ff_vence_publicacion < '$ff_sistema_time'";
    $query = $this->db->query($sql);

    if($query->num_rows() > 0):

        foreach ($query->result() as $row):
            // code...
                
              $con = 0;  $info_subasta = $this->info_subasta_ganada($row->id);

                if($info_subasta->num_rows() > 0):

                    foreach ($info_subasta->result() as $key): $con ++;

                        if ($con == 1):

                    $this->db->trans_start();
                    $e003t_carro_compras['nb_estatus']      = 'Compra ganada';
                    $this->db->where("id", $key->id);
                    $this->db->update("e003t_carro_compras", $e003t_carro_compras);
                    $this->db->trans_complete();

                    // Notificar por correo
                        continue;

                        endif;


                    $this->db->trans_start();
                    $e003t_carro_compras['nb_estatus']      = 'Compra perdida';
                    $this->db->where("id", $key->id);
                    $this->db->update("e003t_carro_compras", $e003t_carro_compras);
                    $this->db->trans_complete();
                    
                    // Notificar por correo perdido
                         
                     endforeach;




                endif;




        endforeach;

    endif;

    return true;
 }


     function info_subasta_ganada($co_producto_publicaciones) {

        $sql   = "SELECT a.* from e003t_carro_compras as a
        join e002t_producto_publicaciones as b on b.id = a.co_producto_publicaciones
         where a.co_producto_publicaciones = '$co_producto_publicaciones' and a.nb_estatus in ('En carro','En subasta')  and a.in_activo = true and b.in_activo = true and b.nb_estatus = 'Publicado' order by a.ca_precio_carrito desc";
        $query = $this->db->query($sql);
        return $query;
        
    }


function verificar_compra_activa()  {       

    $ff_sistema_time = time();
    $ff_limite = 1296000;

    $sql  = "SELECT a.*
        FROM
        j076t_orden_compra AS a
        join j049t_empresas_farmaceuticas_todas as c on c.id = a.co_partner_vendedor
        where a.in_activo = true and a.nb_estatus = 'Confirmado por el comprador' and a.ff_fecha_elaboracion+$ff_limite < '$ff_sistema_time'";
    $query = $this->db->query($sql);

    if($query->num_rows() > 0):

    $this->db->trans_start();

    foreach ($query->result() as $row):

                  
                    $j076t_orden_compra['nb_estatus']      = 'Orden de compra abandonada';
                    $this->db->where("id", $row->id);
                    $this->db->update("j076t_orden_compra", $j076t_orden_compra);

                    // calificar al comprador

                    $j079t_usuario_partner_calificado['nb_ambito']      = 'VENDEDOR';
                    $j079t_usuario_partner_calificado['ff_sistema_time']      = time();
                    $j079t_usuario_partner_calificado['ca_calificacion']      = 1;
                    $j079t_usuario_partner_calificado['tx_observacion']      = 'Vendedor calificado negativo por la plataforma, no reportó la compra solicitada';
                    $j079t_usuario_partner_calificado['co_usuario_calificado']      = $row->co_usuario_vendedor;;
                    $j079t_usuario_partner_calificado['co_partner_calificado']      = $row->co_partner_vendedor;
                    $j079t_usuario_partner_calificado['co_orden_compra']      = $row->id;
                    $j079t_usuario_partner_calificado['nb_agente']      = 'PLATAFORMA';
                    $this->db->insert("j079t_usuario_partner_calificado", $j079t_usuario_partner_calificado);
                   

        // code...
    endforeach;

     $this->db->trans_complete();

    endif;
}


// Verificar documentacion


function verificar_documentacion()  {       

    $ff_sistema_time = time();


    $sql  = "SELECT a.*
        FROM
        j080t_documentos_partner AS a
        join j049t_empresas_farmaceuticas_todas as c on c.id = a.co_partner
        where a.in_activo = true and a.nb_estatus = 'Aprobado' and a.ff_vencimiento < '$ff_sistema_time'";
    $query = $this->db->query($sql);

    if($query->num_rows() > 0):

    $this->db->trans_start();

    foreach ($query->result() as $row):

                  
                    $j080t_documentos_partner['nb_estatus']      = 'Vencido';
                    $this->db->where("id", $row->id);
                    $this->db->update("j080t_documentos_partner", $j080t_documentos_partner);

                    // calificar al comprador

                    $j049t_empresas_farmaceuticas_todas['in_validado']      = 0;
                    $this->db->where("id", $row->co_partner);
                    $this->db->update("j049t_empresas_farmaceuticas_todas", $j049t_empresas_farmaceuticas_todas);
                   

        // code...
    endforeach;

     $this->db->trans_complete();

    endif;


}

// notificacion de email


function get_email_pendiente()  {       

    $sql  = "SELECT a.* FROM j052t_mail_sistema as a
             WHERE a.in_activo = true and a.nb_estatus  = 'En espera'
             ORDER BY a.id desc, a.nb_programado limit 150";
    $query = $this->db->query($sql);
    return $query;
 }


    
    function set_email_recorrido($co_email_sistema, $nb_estatus) {

        $j052t_mail_sistema['nb_estatus']      = $nb_estatus;
        $this->db->where("id", $co_email_sistema);
        $this->db->update("j052t_mail_sistema", $j052t_mail_sistema);
  
    }

// Verificar email automatico


            function get_email_mensajes_automaticos($in_semana, $in_hora, $in_minuto) {



        $sql = "SELECT * from j053t_mensajes_automaticos where nb_semana REGEXP '$in_semana' and nb_hora = $in_hora and nb_minuto = $in_minuto and nb_estatus = 'Ejecucion' and in_activo = true";

        $query = $this->db->query($sql);
        return $query;
    }


// Obtener empresas

         function obtener_empresas_model($nb_tipo_empresa) {

                // Buscar empresa en otra base de datos

        $sql="SELECT
            a.tx_email
            FROM
             j049t_empresas_farmaceuticas_todas AS a
             join j077t_usuario_partner as b on b.co_partner = a.id
            WHERE
            a.in_activo = true
            AND  a.nb_tipo_empresa  REGEXP '$nb_tipo_empresa' and  a.tx_email <>  ('na') and a.tx_email <>  ('n/a') and a.tx_email <> '' and a.in_validado = true and b.in_activo = true group by a.tx_email order by RAND() limit 150";
            $query = $this->db->query($sql);


        return $query;
    }


             function obtener_empresas_con_token_firebase_model($nb_tipo_empresa) {

                // Buscar empresa en otra base de datos

        $sql="SELECT
            b.co_usuario
            FROM
             j049t_empresas_farmaceuticas_todas AS a
             join j077t_usuario_partner as b on b.co_partner = a.id
             join lu_users as c on c.id = b.co_usuario
            WHERE
            a.in_activo = true
            AND  a.nb_tipo_empresa  REGEXP '$nb_tipo_empresa' and b.in_activo = true and c.token_firebase IS NOT NULL group by b.co_usuario order by RAND() limit 150";
            $query = $this->db->query($sql);


        return $query;
    }



    function get_productos_mas_solicitados_model()  {   

   $ff_sistema_time_last = time() - 432000;
   $time = time();

   $ff_sistema_time_date_last = date('Y-m-d', $ff_sistema_time_last);
   $date_actual = date('Y-m-d');



    $sql  = "SELECT sum(a.ca_producto) as ca_producto, a.nb_producto FROM j072t_guia_movilizacion as a WHERE a.in_activo = true and a.ff_sistema BETWEEN '$ff_sistema_time_date_last' AND '$date_actual' GROUP by 2 ORDER by 1 DESC limit 10";

    $query = $this->db->query($sql);
    return $query;
 }



         function get_productos_aleatorios_de_drogueria()
    {


      $ff_sistema_time = time();
      // ubicacion que puede buscar el comprador

    $sql = "SELECT a.*, b.nb_moneda, b.nb_acronimo, c.nb_empresa, c.nb_tipo_empresa, c.nb_estado, a.in_activo, a.ff_vence_publicacion, d.username
        FROM
        e002t_producto_publicaciones AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join j049t_empresas_farmaceuticas_todas as c on c.id = a.co_partner
        join lu_users as d on d.id = a.co_usuario
        where a.in_activo = true and a.nb_estatus = 'Publicado'  
        and (a.nb_dirigido REGEXP 'FARMACIA|CLINICA')
        HAVING id > 0 and in_activo = true and ff_vence_publicacion > '$ff_sistema_time' order by RAND()
        limit 10";

    $query = $this->db->query($sql);

    return $query;  

        
    }



         function get_productos_aleatorios_de_casa_representacion()
    {


      $ff_sistema_time = time();
      // ubicacion que puede buscar el comprador

    $sql = "SELECT a.*, b.nb_moneda, b.nb_acronimo, c.nb_empresa, c.nb_tipo_empresa, c.nb_estado, a.in_activo, a.ff_vence_publicacion, d.username
        FROM
        e002t_producto_publicaciones AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join j049t_empresas_farmaceuticas_todas as c on c.id = a.co_partner
        join lu_users as d on d.id = a.co_usuario
        where a.in_activo = true and a.nb_estatus = 'Publicado'  
        and (a.nb_dirigido REGEXP 'DROGUERIA')
        HAVING id > 0 and in_activo = true and ff_vence_publicacion > '$ff_sistema_time' order by RAND()
        limit 10";

    $query = $this->db->query($sql);

    return $query;  

        
    }

  function get_mensajes_notificacion_push_sms() {

        $co_usuario = $this->ion_auth->user_id();

        $sql   = "SELECT
                        cc.*
                    FROM
                        j054t_notificacion_push_sms AS cc
                    WHERE
                        cc.co_usuario = '$co_usuario'
                    and cc.in_visto = 0 and cc.in_activo = true limit 99";

        $query = $this->db->query($sql);
        return $query;
    }



            function set_mensaje_visto_push_sms() {
        $this->db->trans_start();
        $co_usuario = $this->ion_auth->user_id();
        $j054t_notificacion_push_sms['in_visto']    = 1;
        $this->db->where("co_usuario", $co_usuario);
        $this->db->update("j054t_notificacion_push_sms", $j054t_notificacion_push_sms);
        $this->db->trans_complete();
        return true;
    }


   function cerrar_notificacion_model($co_notificacion_mensaje_push_sms)
    {
        

        $this->db->trans_start();
        $j054t_notificacion_push_sms['in_activo'] = 0;
        $this->db->where("id", $co_notificacion_mensaje_push_sms);
        $this->db->update("j054t_notificacion_push_sms", $j054t_notificacion_push_sms);
        $this->db->trans_complete();
        return true;

    }

  
  function get_evento_compra_venta_solicitud() {

        $co_usuario = $this->ion_auth->user_id();

        $sql   = "SELECT (SELECT count(a.id) as nu_venta_confirmada
            FROM
            j076t_orden_compra AS a
            WHERE
            a.co_usuario_vendedor = '$co_usuario' and a.nb_estatus in ('Confirmado por el comprador')
            AND a.in_activo_vendedor = TRUE) as nu_venta_confirmada,
                        (SELECT count(a.id) as nu_venta_confirmada
            FROM
            j076t_orden_compra AS a
            WHERE
            a.co_usuario_comprador = '$co_usuario' and a.nb_estatus in ('En espera por aprobacion')
            AND a.in_activo_comprador = TRUE) as nu_propuesta_orden_compra";

        $query = $this->db->query($sql);
        return $query->row();
    }


  function get_evento_solicitud_cotizacion() {

        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();
        $tipo_empresa = $this->ion_auth->tipo_empresa();
        $mi_estado = $this->ion_auth->ubicacion_estado();
        $username = $this->ion_auth->username();
        $ff_sistema_time = time();

        $sql   = "SELECT count(a.id) as num_registro, sum((SELECT count(aa.id) from x014t_solicitud_cotizacion_visto as aa where aa.in_activo = true and aa.co_solicitud_cotizacion = a.id and aa.co_partner = '$co_partner' and aa.co_usuario = '$co_usuario')) as co_solicitud_cotizacion_visto
        FROM
        j084t_solicitud_cotizacion AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join j049t_empresas_farmaceuticas_todas as c on c.id = a.co_partner
        join lu_users as d on d.id = a.co_usuario
        where a.in_activo = true and a.nb_estatus = 'Abierta'
        and (case WHEN a.co_partner != '$co_partner' then a.nb_dirigido_ubicacion REGEXP '$mi_estado' end)
        and (case WHEN a.nb_dirigido_usuario != '' then a.nb_dirigido_usuario REGEXP '$username' end)
        and (case WHEN a.co_partner != '$co_partner' then a.nb_dirigido REGEXP '$tipo_empresa' end) and (a.ff_vencimiento > '$ff_sistema_time')";

        $query = $this->db->query($sql);
        $info_cantidad_solicitud_cotizacion = $query->row();
        return $ca_solicitud_cotizacion_pendiente = $info_cantidad_solicitud_cotizacion->num_registro - $info_cantidad_solicitud_cotizacion->co_solicitud_cotizacion_visto;
    }

    // Aviso emergente de solicitud


      function get_solicitud_cotizacion_farmacia_clinica_drogueria($co_partner, $nb_estado, $co_usuario, $nb_tipo_empresa) {

        
        $ff_sistema_time = time();

        $sql   = "SELECT a.*, b.nb_moneda, b.nb_acronimo, c.nb_empresa, c.nb_tipo_empresa, c.nb_estado, a.in_activo, d.username
        FROM
        j084t_solicitud_cotizacion AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join j049t_empresas_farmaceuticas_todas as c on c.id = a.co_partner
        join lu_users as d on d.id = a.co_usuario
        where a.in_activo = true and a.nb_estatus = 'Abierta'
        and (case WHEN a.co_partner != '$co_partner' then a.nb_dirigido_ubicacion REGEXP '$nb_estado' end)
        and (case WHEN a.co_partner != '$co_partner' then a.nb_dirigido REGEXP '$nb_tipo_empresa' end) and (a.ff_vencimiento > '$ff_sistema_time') and ((SELECT count(aa.id) from x014t_solicitud_cotizacion_visto as aa where aa.in_activo = true and aa.co_solicitud_cotizacion = a.id and aa.co_partner = '$co_partner' and aa.co_usuario = '$co_usuario') = 0) limit 5";

        $query = $this->db->query($sql);

        return $query;
    }





  function get_notificacion_push_pendiente() {


        $sql   = "SELECT a.*, b.token_firebase
            FROM
            j054t_notificacion_push_sms AS a
            join lu_users as b on b.id = a.co_usuario
            WHERE a.in_push = '1' and a.in_enviado_push = '0' and a.in_activo = true limit 100";

        $query = $this->db->query($sql);
        return $query;
    }


 function ejecutar_conexion_firebase($title,$description,$tokenId) {


        $severKey="AAAAukvrZV4:APA91bHc49gsdUOPfWSV3rRDQayru2OQp6t2pI9Mm_2_ccls7lmsMfXFh-6HN2ZZi2gvsBkGnN-5qQMgMDbJJUlm6i5qYSctzcOglCL0ZJ__3KWMVQ3lu5puE3ICcd7AOXujmnNy8nZB";
        $url="https://fcm.googleapis.com/fcm/send";

        $field=array(
            'data'=>array(
                'notification'=>array(
                    'title'=>$title,
                    'body'=>$description,
                    'icon'=> base_url().'img/logo/logo_blanco_rose_farmaceutica.png'
                )
                ),
            'to'=>$tokenId    
        );
        $fields=json_encode($field);

        $header=array(
            'Authorization: key='.$severKey,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

        $result=curl_exec($ch);
        echo $result;
        curl_close($ch);


        }



     function set_notificacion_push_enviado($id) {
        $this->db->trans_start();
        $j054t_notificacion_push_sms['in_enviado_push']     = 1;
        $this->db->where("id", $id);
        $this->db->update("j054t_notificacion_push_sms", $j054t_notificacion_push_sms);
        $this->db->trans_complete();
        return true;
    }



  
          function get_ca_mensajes_estado_rose() {


        $user_id = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

         $tipo_empresa = $this->ion_auth->tipo_empresa();
         $mi_estado = $this->ion_auth->ubicacion_estado();
         $ff_sistema_time = time();


        $sql   = "SELECT a.co_usuario, b.nb_foto_perfil, b.username, max(a.time_creado) as lastUpdated,
        (SELECT count(id) from x017t_estado_rose_visto where co_usuario = a.co_usuario and co_usuario_visto = $user_id) as seem
        FROM x016t_estado_rose AS a 
        join lu_users as b on b.id = a.co_usuario
        where a.in_activo = true and (SELECT count(cc.id) from x016t_estado_rose as cc where cc.co_usuario = a.co_usuario and cc.in_activo = true  and cc.time_fin > '$ff_sistema_time' and cc.nb_tipo_empresa REGEXP '$tipo_empresa' and cc.nb_ubicacion_estado REGEXP '$mi_estado') > (SELECT count(aa.id) from x017t_estado_rose_visto as aa
        JOIN x016t_estado_rose as bb on bb.id = aa.co_estado_rose
        where aa.co_usuario = a.co_usuario and aa.co_usuario_visto = $user_id and bb.in_activo = true  and bb.time_fin > '$ff_sistema_time' and bb.nb_tipo_empresa REGEXP '$tipo_empresa' and bb.nb_ubicacion_estado REGEXP '$mi_estado') and a.time_fin > '$ff_sistema_time' and a.nb_tipo_empresa REGEXP '$tipo_empresa' and a.nb_ubicacion_estado REGEXP '$mi_estado' and not a.co_usuario = $user_id
        group by a.co_usuario, b.nb_foto_perfil, b.username order by a.id desc";

        $query = $this->db->query($sql);
        return $query->num_rows();
    }




}
?>