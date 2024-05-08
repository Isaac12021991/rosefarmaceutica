<?php
class Compra_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }


             function get_producto_publicaciones($co_producto_publicaciones)
    {

        $filtro = '';


    $ff_sistema_time = time();

    $sql = "SELECT a.*, b.nb_moneda, b.nb_acronimo, c.nb_empresa, c.nb_tipo_empresa, c.nb_estado, a.ff_vence_publicacion, a.in_activo, d.username
        FROM
        e002t_producto_publicaciones AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join j049t_empresas_farmaceuticas_todas as c on c.id = a.co_partner
        join lu_users as d on d.id = a.co_usuario
        where a.nb_estatus = 'Publicado' and a.id = '$co_producto_publicaciones' and a.in_activo = true and a.ff_vence_publicacion > '$ff_sistema_time' limit 1";
    $query = $this->db->query($sql);
    return $query->row();  

        
    }

    function ejecutar_agregar_carro_model($co_producto_publicaciones, $ca_unidades, $co_carro_compras, $ca_precio) {
       
        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();
        $info_producto_publicaciones = $this->get_producto_publicaciones($co_producto_publicaciones);
        
        if ($co_carro_compras != '0'):

            if($info_producto_publicaciones->nb_tipo_venta == 'Venta directa'):

        $this->db->trans_start();
        $e003t_carro_compras['ca_unidades']    = $ca_unidades;
        $e003t_carro_compras['co_partner']      = $co_partner;
        $this->db->where("id", $co_carro_compras);
        $this->db->update("e003t_carro_compras", $e003t_carro_compras);
        $this->db->trans_complete();

             else:

        $this->db->trans_start();
        $e003t_carro_compras['ca_precio_carrito']    = $ca_precio;
        $e003t_carro_compras['ca_unidades']    = $info_producto_publicaciones->ca_disponible;
        $e003t_carro_compras['nb_estatus']    = 'En subasta';
        $e003t_carro_compras['co_partner']      = $co_partner;
        $this->db->where("id", $co_carro_compras);
        $this->db->update("e003t_carro_compras", $e003t_carro_compras);
        $this->db->trans_complete();

                endif;

        else:

            if($info_producto_publicaciones->nb_tipo_venta == 'Venta directa'):

        $this->db->trans_start();
        $e003t_carro_compras['co_producto_publicaciones']     = $co_producto_publicaciones;
        $e003t_carro_compras['ca_unidades']    = $ca_unidades;
        $e003t_carro_compras['ca_precio_carrito']         = $info_producto_publicaciones->ca_precio;
        $e003t_carro_compras['co_partner']      = $co_partner;
        $e003t_carro_compras['ff_sistema_time']      = time();
        $e003t_carro_compras['co_usuario']      = $co_usuario;
        $this->db->insert("e003t_carro_compras", $e003t_carro_compras);
        $this->db->trans_complete();

    else:

        $this->db->trans_start();
        $e003t_carro_compras['co_producto_publicaciones']     = $co_producto_publicaciones;
        $e003t_carro_compras['ca_unidades']    = $info_producto_publicaciones->ca_disponible;
        $e003t_carro_compras['ca_precio_carrito']    = $ca_precio;
        $e003t_carro_compras['co_partner']      = $co_partner;
        $e003t_carro_compras['nb_estatus']    = 'En subasta';
        $e003t_carro_compras['ff_sistema_time']      = time();
        $e003t_carro_compras['co_usuario']      = $co_usuario;
        $this->db->insert("e003t_carro_compras", $e003t_carro_compras);
        $this->db->trans_complete();

    endif;

        endif;

        return true;
    }


    function eliminar_producto_carro_compra_model($co_producto_publicaciones) {

        $info_producto_publicaciones = $this->get_producto_publicaciones($co_producto_publicaciones);

        $co_usuario = $this->ion_auth->user_id();
        $this->db->trans_start();
        $e003t_carro_compras['in_activo']      = 0;
        $this->db->where("co_usuario", $co_usuario);
        $this->db->where("co_producto_publicaciones", $co_producto_publicaciones);
        $this->db->update("e003t_carro_compras", $e003t_carro_compras);
        $this->db->trans_complete();
        return true;
    }

    

                 function get_monto_compra_activas()
    {

    $co_usuario = $this->ion_auth->user_id();
    $co_partner = $this->ion_auth->co_partner();


            $ff_limite = time() - 2592000;
            $time = time();

            $sql = "SELECT
                 COALESCE(SUM((SELECT SUM(b.ca_unidades * b.ca_precio) FROM x008t_orden_compra_linea as b where b.co_orden_compra = a.id and a.in_activo = true)),0) as ca_monto
            FROM
            j076t_orden_compra AS a
            WHERE a.in_activo = true and
            a.co_partner_comprador = '$co_partner' and a.nb_estatus in('Confirmado por el comprador','Confirmado por el vendedor')
            and a.ff_fecha_elaboracion BETWEEN '$ff_limite' AND '$time'";
            $query = $this->db->query($sql);
            $info_monto_mensual = $query->row();

            return $info_monto_mensual->ca_monto;  


        
    }

    // Menu carrito 


             function get_info_carrito()
    {


    $ff_sistema_time = time();
    $co_usuario = $this->ion_auth->user_id();

    $sql = "SELECT a.*, b.nb_moneda, b.nb_acronimo, c.nb_empresa, c.nb_tipo_empresa, c.nb_estado, a.ff_vence_publicacion, a.in_activo, d.ca_unidades as ca_unidades_comprado, d.ff_sistema_time, d.in_preparado_compra, d.id as co_carro_compra, d.nb_estatus as nb_estatus_compra, e.username
        FROM
        e002t_producto_publicaciones AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join j049t_empresas_farmaceuticas_todas as c on c.id = a.co_partner
        join e003t_carro_compras as d on d.co_producto_publicaciones = a.id
        join lu_users as e on e.id = a.co_usuario
        where a.nb_estatus = 'Publicado' and d.in_activo = true and a.in_activo = true and d.co_usuario = '$co_usuario' and d.nb_estatus in ('En carro','En Subasta','Compra ganada', 'Compra perdida')";
    $query = $this->db->query($sql);
    return $query;  

        
    }

    
    function producto_listo_comprar_model($co_carro_compras, $check) {

        if($check == 'true'): $check = 1; else: $check = 0; endif;

        $this->db->trans_start();
        $e003t_carro_compras['in_preparado_compra']      = $check;
        $this->db->where("id", $co_carro_compras);
        $this->db->update("e003t_carro_compras", $e003t_carro_compras);
        $this->db->trans_complete();
        return true;
    }



            function comprar_ahora_model() {


        $info_carro_compra_general = $this->get_carro_compra_general();

        if($info_carro_compra_general->num_rows() > 0):

            foreach ($info_carro_compra_general->result() as $row):

                // Tabla Principal
         $this->db->trans_start();

        $sql = "SELECT COUNT(a.id) as sec
        from j076t_orden_compra as a";
        $r = $this->db->query($sql);
        $r->row();
        $secuen = $r->row();
        $secuen->sec;
        $year = date('Y');
        $mes = date('m');
        $dia = date('d');
        $secuen->sec++;
        $nu_codigo = $year . '' . $mes . '' . $dia . '' . $secuen->sec;

        $j076t_orden_compra['nb_empresa_comprador']    = $row->nb_empresa_comprador;
        $j076t_orden_compra['co_partner_comprador']    = $row->co_partner_comprador;
        $j076t_orden_compra['co_usuario_comprador']    = $row->co_usuario_comprador;
        $j076t_orden_compra['nb_empresa_vendedor']      = $row->nb_empresa_vendedor;
        $j076t_orden_compra['co_partner_vendedor']      = $row->co_partner_vendedor;
        $j076t_orden_compra['co_usuario_vendedor']      = $row->co_usuario_vendedor;
        $j076t_orden_compra['co_moneda']      = $row->co_moneda;
        $j076t_orden_compra['ff_fecha_elaboracion']      = time();
        $j076t_orden_compra['nu_codigo_orden_compra']      = $nu_codigo;
        $this->db->insert("j076t_orden_compra", $j076t_orden_compra);
        $co_orden_compra    = $this->db->insert_id();

            // info linea orden compra

                $info_carro_compra_linea = $this->get_carro_compra_linea($row->co_usuario_vendedor, $row->co_partner_vendedor, $row->co_moneda);

        if($info_carro_compra_linea->num_rows() > 0):

            foreach ($info_carro_compra_linea->result() as $row_two):

        $x008t_orden_compra_linea['co_orden_compra']    = $co_orden_compra;
        $x008t_orden_compra_linea['co_producto_publicaciones']    = $row_two->id;
        $x008t_orden_compra_linea['nb_producto']    = $row_two->nb_producto;
        $x008t_orden_compra_linea['tx_descripcion']      = $row_two->tx_descripcion;
        $x008t_orden_compra_linea['ff_vence']      = $row_two->ff_vence;
        $x008t_orden_compra_linea['ca_unidades']      = $row_two->ca_unidades_comprado;
        $x008t_orden_compra_linea['ca_precio']      = $row_two->total_precio;
        $this->db->insert("x008t_orden_compra_linea", $x008t_orden_compra_linea);

        $e003t_carro_compras['nb_estatus']  = 'Comprado';
        $this->db->where("id", $row_two->co_carro_compras);
        $this->db->update("e003t_carro_compras", $e003t_carro_compras);

            endforeach;

        endif;

        // Enviar Email a Vendedor

            $data_vendedor                     = array(
                'nombre' => 'Bio New Pharma C.A',
                'nu_codigo' => $nu_codigo,
                'nb_empresa_comprador' => $row->nb_empresa_comprador,
                'tx_direccion_comprador' => $row->tx_direccion_comprador,
                'nu_rif_comprador' => $row->nu_rif_comprador,
                'tx_email_comprador' => $row->tx_email_comprador,
                'nb_empresa_vendedor' => $row->nb_empresa_vendedor,
                'tx_direccion_vendedor' => $row->tx_direccion_vendedor,
                'nu_rif_vendedor' => $row->nu_rif_vendedor,
                'tx_email_vendedor' => $row->tx_email_vendedor,
                'info_carro_compra_linea' => $info_carro_compra_linea
            );


        

          $htmlContent_vendedor = $this->load->view('/biomercado/template_email/template_email_orden_compra_view', $data_vendedor, true);

            $this->email->to($row->tx_email_vendedor);
            $this->email->bcc($row->tx_email_comprador);
            $this->email->reply_to('admision@rosefarmaceutica.com');
            $this->email->from('admision@rosefarmaceutica.com', 'ROSE C.A.', 'admision@rosefarmaceutica.com');
            $this->email->subject('[ROSE] Orden de compra '.$nu_codigo);
            $this->email->message($htmlContent_vendedor);
            $this->email->send(); 


        // Enviar Email a Comprador
        

           /* $data_comprador                     = array(
                'nombre' => 'Bio New Pharma C.A',
                'nb_empresa_vendedor' => $row->nb_empresa_vendedor,
                'tx_direccion_vendedor' => $row->tx_direccion_vendedor,
                'nu_rif_vendedor' => $row->nu_rif_vendedor,
                'tx_email_vendedor' => $row->tx_email_vendedor,
                'info_carro_compra_linea' => $info_carro_compra_linea
            ); */


         /* $htmlContent_comprador = $this->load->view('/biomercado/template_email/template_email_orden_compra_comprador_view', $data_comprador, true);

            $this->email->to($row->tx_email_comprador);
            $this->email->reply_to('admision@rosefarmaceutica.com');
            $this->email->from('admision@rosefarmaceutica.com', 'Bio New Pharma C.A.', 'admision@rosefarmaceutica.com');
            $this->email->subject('[BioMercado] Has emitido una orden de compra para '.$row->nb_empresa_vendedor);
            $this->email->message($htmlContent_comprador);
            $this->email->send();  */


        $co_usuario = $this->ion_auth->user_id();
        $username = $this->ion_auth->username();


        $this->db->trans_complete();

        $this->auditoria->log_usuario('COMPRA', 'EJECUTO COMPRA', 'El usuario '.$username.' ha generado la orden compra # '.$nu_codigo.' a la empresa '.$row->nb_empresa_vendedor, $co_usuario, $row->co_usuario_vendedor);

            endforeach;

        endif;

        return true;
    }


    function get_carro_compra_general() {

        $ff_sistema_time = time();

        $co_usuario = $this->ion_auth->user_id();

        $sql   = "SELECT
            c.nb_empresa as nb_empresa_vendedor,
            c.id as co_partner_vendedor,
            c.nu_rif as nu_rif_vendedor,
            c.tx_email as tx_email_vendedor,
            c.tx_direccion as tx_direccion_vendedor,
            b.co_usuario as co_usuario_vendedor,
            a.co_usuario as co_usuario_comprador,
            a.co_partner as co_partner_comprador,
            d.nb_empresa as nb_empresa_comprador,
            d.tx_email as tx_email_comprador,
            d.nu_rif as nu_rif_comprador,
            d.tx_direccion as tx_direccion_comprador,
            b.co_moneda
            FROM
            e003t_carro_compras AS a
            JOIN e002t_producto_publicaciones AS b ON b.id = a.co_producto_publicaciones
            JOIN j049t_empresas_farmaceuticas_todas AS c ON c.id = b.co_partner
            JOIN j049t_empresas_farmaceuticas_todas AS d ON d.id = a.co_partner
            WHERE
            a.nb_estatus in ('En carro','Compra ganada')
            AND a.co_usuario = $co_usuario
            AND a.in_activo = TRUE
            AND b.in_activo = TRUE
            AND a.in_preparado_compra = TRUE
            AND b.nb_estatus = 'Publicado'
            and (case WHEN a.nb_estatus = 'En carro' then b.ff_vence_publicacion > '$ff_sistema_time' ELSE b.ff_vence_publicacion < '$ff_sistema_time'  end)
            GROUP BY 1,2,3,4,5,6,7,8,9,10,11,12,13";
        $query = $this->db->query($sql);
        return $query;
        
    }


    function get_carro_compra_linea($co_usuario_vendedor, $co_partner_vendedor, $co_moneda) {

        $ff_sistema_time = time();

        $co_usuario = $this->ion_auth->user_id();

        $sql   = "SELECT
        b.*, a.ca_unidades as ca_unidades_comprado, a.id as co_carro_compras, 
    (
        CASE

        WHEN a.nb_estatus = 'Compra ganada' THEN a.ca_precio_carrito
        ELSE
             b.ca_precio
        END
    ) AS total_precio
        FROM
        e003t_carro_compras AS a
        JOIN e002t_producto_publicaciones AS b ON b.id = a.co_producto_publicaciones
        WHERE
        a.nb_estatus in ('En carro','Compra ganada')
        AND a.co_usuario = $co_usuario
        AND b.co_usuario = $co_usuario_vendedor
        AND b.co_partner = $co_partner_vendedor
        AND b.co_moneda = $co_moneda
        AND a.in_activo = TRUE
        AND b.in_activo = TRUE
        AND a.in_preparado_compra = TRUE
        AND b.nb_estatus = 'Publicado'
        and (case WHEN a.nb_estatus = 'En carro' then b.ff_vence_publicacion > '$ff_sistema_time' ELSE b.ff_vence_publicacion < '$ff_sistema_time'  end)
        ";
        $query = $this->db->query($sql);
        return $query;
        
    }

    

                 function get_orden_compra($filtro_ordenar)
    {


        $co_usuario = $this->ion_auth->user_id();
                
        if ($filtro_ordenar == 'nuevo'):

            $filtro_ordenar = "order by a.id desc limit 20";

        endif;

        if ($filtro_ordenar == 'historial'):

            $filtro_ordenar = '';

        endif;

            $sql = "SELECT
            a.id,
            a.nb_empresa_vendedor,
            a.co_partner_vendedor,
            a.nb_estatus,
            a.ff_fecha_elaboracion,
            a.nu_codigo_orden_compra,
            a.co_partner_comprador,
            a.co_usuario_comprador,
            a.co_moneda,
            b.nb_acronimo,
            c.username,
            d.nb_estado as nb_estado_vendedor,
            (SELECT SUM(b.ca_unidades * b.ca_precio) FROM x008t_orden_compra_linea as b where b.co_orden_compra = a.id and a.in_activo = true) as ca_monto,
            (SELECT COUNT(d.id) FROM x008t_orden_compra_linea as d where d.co_orden_compra = a.id and d.in_activo = true) as ca_renglon,
            (SELECT COUNT(e.id) FROM x010t_pagos as e where e.co_orden_compra = a.id and e.in_activo = true) as ca_pagado
            FROM
            j076t_orden_compra AS a
            left join i00t_monedas as b on b.id = a.co_moneda
            join lu_users as c on c.id = a.co_usuario_vendedor
            join j049t_empresas_farmaceuticas_todas as d on d.id = a.co_partner_vendedor
            WHERE
            a.co_usuario_comprador = '$co_usuario'
            AND a.in_activo_comprador = TRUE $filtro_ordenar ";

    $query = $this->db->query($sql);
    return $query;  

        
    }


                         function get_info_orden_compra($co_orden_compra)
    {


        $co_usuario = $this->ion_auth->user_id();

            $sql = "SELECT
            a.id,
            a.nb_empresa_vendedor,
            a.nb_empresa_comprador,
            a.ff_fecha_vencimiento,
            a.co_partner_vendedor,
            a.nb_estatus,
            a.ff_fecha_elaboracion,
            a.nu_codigo_orden_compra,
            a.co_partner_comprador,
            a.co_usuario_comprador,
            a.co_usuario_vendedor,
            a.nb_forma_entrega,
            a.nb_tipo_pago,
            a.co_moneda,
            (SELECT SUM(b.ca_unidades * b.ca_precio) FROM x008t_orden_compra_linea as b where b.co_orden_compra = a.id and a.in_activo = true) as ca_monto,
            (SELECT COUNT(d.id) FROM x008t_orden_compra_linea as d where d.co_orden_compra = a.id and d.in_activo = true) as ca_renglon,
            (SELECT COUNT(e.id) FROM x010t_pagos as ee where ee.co_orden_compra = a.id and ee.in_activo = true) as ca_pagado,
            b.nu_rif,
            b.nb_estado,
            b.tx_direccion,
            b.tx_email,
            b.cod_sicm as cod_sicm_comprador,
            c.first_name,
            c.last_name,
            c.username,
            c.phone,
            c.email as tx_email_comprador,
            e.phone as phone_vendedor,
            d.nb_acronimo,
            e.first_name as nombre_vendedor,
            e.last_name as apellido_vendedor,
            e.email as email_vendedor,
            e.nu_whatsapp as whatsapp_vendedor,
            e.username as username_vendedor,
            f.tx_direccion as tx_direccion_vendedor,
            f.nb_tipo_empresa as nb_tipo_empresa_vendedor,
            f.nb_estado as nb_estado_vendedor,
            f.nu_rif as nu_rif_vendedor,
            f.cod_sicm as cod_sicm_vendedor
            FROM
            j076t_orden_compra AS a
            join j049t_empresas_farmaceuticas_todas as b on b.id = a.co_partner_comprador
            join lu_users as c on c.id = a.co_usuario_comprador
            join lu_users as e on e.id = a.co_usuario_vendedor
            left join i00t_monedas as d on d.id = a.co_moneda
            join j049t_empresas_farmaceuticas_todas as f on f.id = a.co_partner_vendedor
            WHERE
            a.co_usuario_comprador = '$co_usuario' and a.id = '$co_orden_compra'
            AND a.in_activo = TRUE";
    $query = $this->db->query($sql);
    return $query->row();  

    }


     function get_detalle_orden_compra($co_orden_compra)
    {

            $sql = "SELECT a.*, a.ca_unidades * a.ca_precio as ca_subtotal
            FROM
            x008t_orden_compra_linea AS a
            WHERE
            a.co_orden_compra = '$co_orden_compra'
            AND a.in_activo = TRUE";
    $query = $this->db->query($sql);
    return $query;  

        
    }

    
    function ejecutar_calificacion_model($co_orden_compra, $ca_calificacion, $co_partner_vendedor, $co_usuario_vendedor, $tx_observacion) {


        $this->db->trans_start();
        $j079t_usuario_partner_calificado['co_orden_compra']      = $co_orden_compra;
        $j079t_usuario_partner_calificado['ca_calificacion']      = $ca_calificacion;
        $j079t_usuario_partner_calificado['co_partner_calificado']      = $co_partner_vendedor;
        $j079t_usuario_partner_calificado['co_usuario_calificado']      = $co_usuario_vendedor;
        $j079t_usuario_partner_calificado['tx_observacion']      = $tx_observacion;
        $j079t_usuario_partner_calificado['nb_ambito']      = 'VENDEDOR';
        $j079t_usuario_partner_calificado['co_usuario']      = $this->ion_auth->user_id();
        $j079t_usuario_partner_calificado['co_partner']      = $this->ion_auth->co_partner();
        $j079t_usuario_partner_calificado['ff_sistema_time']      = time();
        $this->db->insert("j079t_usuario_partner_calificado", $j079t_usuario_partner_calificado);
        $this->db->trans_complete();
        return true;
    }


    function cancelar_orden_compra_model($co_orden_compra) {


        $this->db->trans_start();
        $j076t_orden_compra['nb_estatus']      = 'Cancelado por el comprador';
        $this->db->where("id", $co_orden_compra);
        $this->db->update("j076t_orden_compra", $j076t_orden_compra);
        $this->db->trans_complete();
        return true;
    }


// Publicaciones sin disponibilidad

        function get_carro_compra_general_disponible() {

        $ff_sistema_time = time();
        $return = false;

        $co_usuario = $this->ion_auth->user_id();

        $sql   = "SELECT
            a.id,
            a.ca_unidades,
            a.co_producto_publicaciones
            FROM
            e003t_carro_compras AS a
            JOIN e002t_producto_publicaciones AS b ON b.id = a.co_producto_publicaciones
            WHERE
            a.nb_estatus in ('En carro','Compra ganada')
            AND a.co_usuario = $co_usuario
            AND a.in_activo = TRUE
            AND b.in_activo = TRUE
            AND a.in_preparado_compra = TRUE
            AND b.nb_estatus = 'Publicado'
            and (case WHEN a.nb_estatus = 'En carro' then b.ff_vence_publicacion > '$ff_sistema_time' ELSE b.ff_vence_publicacion < '$ff_sistema_time'  end)";
        $query = $this->db->query($sql);


        if ($query->num_rows() > 0):

            foreach ($query->result() as $row):

        $ca_unidades_disponible = $this->inventario_library->get_producto_disponible($row->co_producto_publicaciones);

        if ($row->ca_unidades > $ca_unidades_disponible):

        $this->db->trans_start();
        $e003t_carro_compras['in_preparado_compra']      = FALSE;
        $this->db->where("id", $row->id);
        $this->db->update("e003t_carro_compras", $e003t_carro_compras);
        $this->db->trans_complete();
        $return = true;


        endif;

                // code...
            endforeach;

        endif;


        return $return;
        
    }

    // Producto Preparados


            function in_preparado_orden_compra() {

        $ff_sistema_time = time();

        $co_usuario = $this->ion_auth->user_id();

        $sql   = "SELECT
            a.id,
            a.ca_unidades,
            a.co_producto_publicaciones,
            b.ca_precio * a.ca_unidades as ca_total_orden
            FROM
            e003t_carro_compras AS a
            JOIN e002t_producto_publicaciones AS b ON b.id = a.co_producto_publicaciones
            WHERE
            a.nb_estatus in ('En carro','Compra ganada')
            AND a.co_usuario = $co_usuario
            AND a.in_activo = TRUE
            AND b.in_activo = TRUE
            AND a.in_preparado_compra = TRUE
            AND b.nb_estatus = 'Publicado'
            and (case WHEN a.nb_estatus = 'En carro' then b.ff_vence_publicacion > '$ff_sistema_time' ELSE b.ff_vence_publicacion < '$ff_sistema_time'  end)";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0): return $query->row(); else: return false; endif;

    }




    function remover_orden_compra_model($co_orden_compra) {

        $this->db->trans_start();
        $j076t_orden_compra['in_activo_comprador']      = 0;
        $this->db->where("id", $co_orden_compra);
        $this->db->update("j076t_orden_compra", $j076t_orden_compra);
        $this->db->trans_complete();
        return true;
    }



    function cambiar_estatus_orden_compra_model($co_orden_compra, $nb_estatus) {


        $this->db->trans_start();
        $j076t_orden_compra['nb_estatus']      = $nb_estatus;
        $this->db->where("id", $co_orden_compra);
        $this->db->update("j076t_orden_compra", $j076t_orden_compra);
        $this->db->trans_complete();

        // Notificar al usuario vendedor si es aprobado

        if($nb_estatus == 'Confirmado por el comprador'):

        $info_orden_compra = $this->get_info_orden_compra($co_orden_compra);

        $info_carro_compra_linea = $this->get_detalle_orden_compra($co_orden_compra);


        $html_tabla = "<h4 align='center'>Detalle del Pedido</h4>

                    <table border='1' align='center'>
            <tr>
            <td>Nombre:</td><td>$info_orden_compra->nb_empresa_comprador</td>
            </tr>
            <tr>
            <td>Rif:</td><td>$info_orden_compra->nu_rif</td>
            </tr>
            <tr>
            <td>Direccion Fiscal:</td><td>$info_orden_compra->tx_direccion</td>
            </tr>

            </table>

            <table border='1' align='center'>
            <tr>
            <td>Producto</td>
            <td>Descripcion</td>
            <td>Precio</td>
            <td>Cantidad</td>
            <td>Total</td>
            </tr>"; ?>

            <?php foreach ($info_carro_compra_linea->result() as $row_two): 
            $total_renglon = $row_two->ca_precio * $row_two->ca_unidades; ?>
            <?php $html_tabla .= "<tr>
            <td>$row_two->nb_producto</td>
            <td>$row_two->tx_descripcion</td>
            <td>$row_two->ca_precio</td>
            <td>$row_two->ca_unidades</td>
            <td>$total_renglon</td>
            </tr>"; ?>

            <?php endforeach; ?>

            <?php $html_tabla .= "<h4 align='center'>Orden de compra de:</h4>

                <table border='1' width='100%' align='center'>
                <tr>
                <td>Nombre:</td><td>$info_orden_compra->nb_empresa_comprador</td>
                </tr>
                <tr>
                <td>Contacto:</td><td>$info_orden_compra->tx_email_comprador</td>
                </tr>
                </table>

                <h4 align='center'>Orden de compra para:</h4>

                <table border='1' width='100%' align='center'>
                <tr>
                <td>Nombre:</td><td>$info_orden_compra->nb_empresa_vendedor</td>
                </tr>
                <tr>
                <td>Contacto:</td><td>$info_orden_compra->email_vendedor</td>
                </tr>
                </table>";
                    

        $data_mensaje['titulo_1'] = 'Orden de compra aceptada';
        $data_mensaje['titulo_2'] = 'Orden de compra Nro '.$info_orden_compra->nu_codigo_orden_compra.' fue aceptada por el comprador';
        $data_mensaje['mensaje_subtitulo'] = 'Estimado usuario la orden de compra fue aceptada por el comprador '.$info_orden_compra->nu_codigo_orden_compra;
        $data_mensaje['mensaje_principal'] = $html_tabla;
        $data_mensaje['mensaje_pie_pagina'] = 'Pongase en contacto con el comprador para culminar la negociación';
        

        $tx_mensaje = json_encode($data_mensaje);

        $this->evento_cron_library->set_email_system('[Orden de Compra Aceptada]', $tx_mensaje,  'admision@rosefarmaceutica.com', $info_orden_compra->email_vendedor, '', '');


                // Notificaicon  sms push

        $tx_mensaje_push_sms = 'Orden de compra Nro '.$info_orden_compra->nu_codigo_orden_compra.' fue aceptada por el comprador';

        $this->evento_cron_library->set_notificacion_push_sms($info_orden_compra->co_usuario_vendedor, $tx_mensaje_push_sms);



        endif;


        return true;
    }

          function ejecutar_guardar_marcar_pagado_model($co_orden_compra, $co_diario, $ca_pago, $nu_referencia, $ff_pago, $nombre_archivo, $nb_forma_pago) {

 
        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        // Info del diario

        $info_diario = $this->empresa_library->get_info_diario($co_diario);

        // Info orden compra

        $this->db->trans_start();
        $x010t_pagos['co_orden_compra']     = $co_orden_compra;
        $x010t_pagos['co_diario']    = $co_diario;
        $x010t_pagos['ca_pago'] = $ca_pago;
        $x010t_pagos['nu_referencia']         = $nu_referencia;
        $x010t_pagos['ff_pago']      = $ff_pago;
        $x010t_pagos['nb_forma_pago']      = $nb_forma_pago;
        $x010t_pagos['co_moneda']     = $info_diario->co_moneda;
        $x010t_pagos['co_partner']      = $co_partner;
        $x010t_pagos['co_usuario']      = $co_usuario;
        $x010t_pagos['nb_url_adjunto ']      = $nombre_archivo;
        $this->db->insert("x010t_pagos", $x010t_pagos);

        $this->db->trans_complete();

        return true;
    }


            function get_forma_pago() {

        $sql   = "SELECT a.* FROM j082t_forma_pago AS a WHERE a.in_activo = true";
        $query = $this->db->query($sql);
        return $query;

    }


    


                function comparar_precios_model($pivote) {

        $ff_sistema_time = time();

        $co_usuario = $this->ion_auth->user_id();

        $sql   = "SELECT
            a.id,
            a.ca_unidades,
            a.co_producto_publicaciones,
            b.ca_precio * a.ca_unidades as ca_total_orden,
            b.nb_producto,
            b.ca_precio,
            b.ff_vence,
            b.tx_descripcion,
            b.nb_forma_entrega,
            b.nb_tipo_pago,
            b.nb_forma_envio,
            c.username,
            d.nb_estado
            FROM
            e003t_carro_compras AS a
            JOIN e002t_producto_publicaciones AS b ON b.id = a.co_producto_publicaciones
            JOIN lu_users as c on c.id = b.co_usuario
            JOIN j049t_empresas_farmaceuticas_todas as d on d.id = b.co_partner
            WHERE
            a.nb_estatus in ('En carro','Compra ganada')
            AND a.co_usuario = $co_usuario
            AND a.in_activo = TRUE
            AND b.in_activo = TRUE
            AND a.in_preparado_compra = TRUE
            AND b.nb_estatus = 'Publicado' and a.id in ($pivote)
            and (case WHEN a.nb_estatus = 'En carro' then b.ff_vence_publicacion > '$ff_sistema_time' ELSE b.ff_vence_publicacion < '$ff_sistema_time'  end)";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0): return $query; else: return false; endif;

    }


    function comparar_precios_solo_partner_model($pivote) {

                $ff_sistema_time = time();

        $co_usuario = $this->ion_auth->user_id();

        $sql   = "SELECT
            c.username
            FROM
            e003t_carro_compras AS a
            JOIN e002t_producto_publicaciones AS b ON b.id = a.co_producto_publicaciones
            JOIN lu_users as c on c.id = b.co_usuario
            JOIN j049t_empresas_farmaceuticas_todas as d on d.id = b.co_partner
            WHERE
            a.nb_estatus in ('En carro','Compra ganada')
            AND a.co_usuario = $co_usuario
            AND a.in_activo = TRUE
            AND b.in_activo = TRUE
            AND a.in_preparado_compra = TRUE
            AND b.nb_estatus = 'Publicado' and a.id in ($pivote)
            and (case WHEN a.nb_estatus = 'En carro' then b.ff_vence_publicacion > '$ff_sistema_time' ELSE b.ff_vence_publicacion < '$ff_sistema_time'  end) GROUP BY
            c.username order by c.username";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0): return $query; else: return false; endif;

    }


   function produtos_comparar($pivote) {

            $ff_sistema_time = time();

        $co_usuario = $this->ion_auth->user_id();


    $sql = "SELECT
            b.nb_producto
            FROM
            e003t_carro_compras AS a
            JOIN e002t_producto_publicaciones AS b ON b.id = a.co_producto_publicaciones
            JOIN lu_users as c on c.id = b.co_usuario
            JOIN j049t_empresas_farmaceuticas_todas as d on d.id = b.co_partner
            WHERE
            a.nb_estatus in ('En carro','Compra ganada')
            AND a.co_usuario = $co_usuario
            AND a.in_activo = TRUE
            AND b.in_activo = TRUE
            AND a.in_preparado_compra = TRUE
            AND b.nb_estatus = 'Publicado' and a.id in ($pivote)
            and (case WHEN a.nb_estatus = 'En carro' then b.ff_vence_publicacion > '$ff_sistema_time' ELSE b.ff_vence_publicacion < '$ff_sistema_time'  end) GROUP by
            b.nb_producto order by b.nb_producto";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0): return $query; else: return false; endif;
    }


}
?>