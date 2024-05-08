<?php
class Venta_model extends CI_Model {
    function __construct() {
        parent::__construct();
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
            a.nb_empresa_comprador,
            a.co_partner_vendedor,
            a.nb_estatus,
            a.ff_fecha_elaboracion,
            a.nu_codigo_orden_compra,
            a.co_partner_comprador,
            a.co_usuario_comprador,
            b.nb_acronimo,
            c.username,
            d.nb_tipo_empresa as nb_tipo_empresa_comprador,
            d.nb_estado as nb_estado_comprador,
            (SELECT SUM(b.ca_unidades * b.ca_precio) FROM x008t_orden_compra_linea as b where b.co_orden_compra = a.id and a.in_activo = true) as ca_monto,
            (SELECT COUNT(d.id) FROM x008t_orden_compra_linea as d where d.co_orden_compra = a.id and d.in_activo = true) as ca_renglon
            FROM
            j076t_orden_compra AS a
            left join i00t_monedas as b on b.id = a.co_moneda
            join lu_users as c on c.id = a.co_usuario_comprador
            join j049t_empresas_farmaceuticas_todas as d on d.id = a.co_partner_comprador
            WHERE
            a.co_usuario_vendedor = '$co_usuario'
            AND a.in_activo_vendedor = TRUE $filtro_ordenar ";
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
            (SELECT SUM(b.ca_unidades * b.ca_precio) FROM x008t_orden_compra_linea as b where b.co_orden_compra = a.id and a.in_activo = true) as ca_monto,
            (SELECT COUNT(d.id) FROM x008t_orden_compra_linea as d where d.co_orden_compra = a.id and d.in_activo = true) as ca_renglon,
            b.nu_rif,
            b.nb_estado,
            b.nb_tipo_empresa,
            b.tx_direccion,
            b.tx_email,
            b.cod_sicm as cod_sicm_comprador,
            c.first_name,
            c.last_name,
            c.username,
            c.phone,
            c.nu_whatsapp,
            c.email as email_comprador,
            e.phone as phone_vendedor,
            d.nb_acronimo,
            e.first_name as nombre_vendedor,
            e.last_name as apellido_vendedor,
            e.email as email_vendedor,
            e.username as username_vendedor,
            f.tx_direccion as tx_direccion_vendedor,
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
            a.co_usuario_vendedor = '$co_usuario' and a.id = '$co_orden_compra'
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

    
    function ejecutar_calificacion_model($co_orden_compra, $ca_calificacion, $co_partner_comprador, $co_usuario_comprador, $tx_observacion) {


        $this->db->trans_start();
        $j079t_usuario_partner_calificado['co_orden_compra']      = $co_orden_compra;
        $j079t_usuario_partner_calificado['ca_calificacion']      = $ca_calificacion;
        $j079t_usuario_partner_calificado['co_partner_calificado']      = $co_partner_comprador;
        $j079t_usuario_partner_calificado['co_usuario_calificado']      = $co_usuario_comprador;
        $j079t_usuario_partner_calificado['tx_observacion']      = $tx_observacion;
        $j079t_usuario_partner_calificado['nb_ambito']      = 'COMPRADOR';
        $j079t_usuario_partner_calificado['co_usuario']      = $this->ion_auth->user_id();
        $j079t_usuario_partner_calificado['co_partner']      = $this->ion_auth->co_partner();
        $j079t_usuario_partner_calificado['ff_sistema_time']      = time();
        $this->db->insert("j079t_usuario_partner_calificado", $j079t_usuario_partner_calificado);
        $this->db->trans_complete();
        return true;
    }


    function cancelar_orden_compra_model($co_orden_compra) {


        $this->db->trans_start();
        $j076t_orden_compra['nb_estatus']      = 'Cancelado por el vendedor';
        $this->db->where("id", $co_orden_compra);
        $this->db->update("j076t_orden_compra", $j076t_orden_compra);
        $this->db->trans_complete();
        return true;
    }


        function confirmar_orden_compra_model($co_orden_compra) {

        $this->db->trans_start();

        // Restar del inventario
        $info_detalle_orden_compra =$this->get_detalle_orden_compra_producto_publicaciones($co_orden_compra);

        if($info_detalle_orden_compra->num_rows() > 0):

            foreach ($info_detalle_orden_compra->result() as $row):
               
        $e002t_producto_publicaciones['ca_disponible'] = $row->ca_disponible - $row->ca_unidades;
        $this->db->where("id", $row->co_producto_publicaciones);
        $this->db->update("e002t_producto_publicaciones", $e002t_producto_publicaciones);

        $this->biomercado_library->reporte_inventario($row->ca_unidades, $row->id, $co_orden_compra, $row->co_producto_publicaciones, 'SALIDA', 'SALIDA ORDEN DE COMPRA', 'SALIDA DE INVENTARIO POR ORDEN COMPRA');

            endforeach;

        endif;


        $j076t_orden_compra['nb_estatus']      = 'Confirmado por el vendedor';
        $this->db->where("id", $co_orden_compra);
        $this->db->update("j076t_orden_compra", $j076t_orden_compra);
        $this->db->trans_complete();

        return true;
    }

    

         function get_detalle_orden_compra_producto_publicaciones($co_orden_compra)
    {

            $sql = "SELECT a.*, a.ca_unidades * a.ca_precio as ca_subtotal, b.ca_disponible
            FROM
            x008t_orden_compra_linea AS a
            join e002t_producto_publicaciones as b on b.id = a.co_producto_publicaciones
            WHERE
            a.co_orden_compra = '$co_orden_compra'
            AND a.in_activo = TRUE";
    $query = $this->db->query($sql);
    return $query;  

        
    }



    function remover_orden_compra_model($co_orden_compra) {

        $this->db->trans_start();
        $j076t_orden_compra['in_activo_vendedor']      = 0;
        $this->db->where("id", $co_orden_compra);
        $this->db->update("j076t_orden_compra", $j076t_orden_compra);
        $this->db->trans_complete();
        return true;
    }








}
?>