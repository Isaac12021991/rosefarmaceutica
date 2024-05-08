<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Biomercado_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }

                function get_info_dolar_bcv($ca_monto, $ff_moneda_paralela = '') {
        $obj =& get_instance();

        if($ff_moneda_paralela == ''): $filtro_fecha = ''; else: $filtro_fecha = " and a.ff_sistema <= '$ff_moneda_paralela'"; endif;


        $sql   = "SELECT * from x00t_moneda_paralela as a where a.co_moneda = '2' and  a.co_moneda_tasa_cambio = '1' $filtro_fecha and a.in_activo = true order by a.id desc limit 1";

        $query = $obj->db->query($sql);

        if ($query->num_rows() > 0): 
            $info_moneda_paralela = $query->row();
            $ca_monto_mostrar_bs = $ca_monto * $info_moneda_paralela->ca_tasa_cambio;
            return $ca_monto_mostrar_bs; 
        else: 
            return 0; 
        endif;
        
    }


            function get_info_comprado($co_producto_publicaciones) {
        $obj =& get_instance();

        $user_id = $obj->ion_auth->user_id();
        $sql   = "SELECT id from e003t_carro_compras as a where a.co_producto_publicaciones = '$co_producto_publicaciones' and a.nb_estatus in ('En carro','En subasta') and a.co_usuario = '$user_id' and a.in_activo = true limit 1";
        $query = $obj->db->query($sql);
        if ($query->num_rows() > 0): return true; else: return false; endif;
        
    }

    
                function get_info_comprado_general() {
        $obj =& get_instance();
        $ff_sistema_time = time();
        $user_id = $obj->ion_auth->user_id();
        $sql   = "SELECT b.*, a.ca_unidades as ca_unidades_comprado  from e003t_carro_compras as a
        join e002t_producto_publicaciones as b on b.id = a.co_producto_publicaciones
         where  a.nb_estatus in ('En carro','Compra ganada') and a.co_usuario = '$user_id' and a.in_activo = true and b.in_activo = true and b.nb_estatus = 'Publicado' and b.ff_vence_publicacion > '$ff_sistema_time'";
        $query = $obj->db->query($sql);
        return $query;
        
    }

                function info_comprado_carrito($co_producto_publicaciones) {
        $obj =& get_instance();
        $ff_sistema_time = time();
        $user_id = $obj->ion_auth->user_id();
        $sql   = "SELECT a.* from e003t_carro_compras as a
        join e002t_producto_publicaciones as b on b.id = a.co_producto_publicaciones
         where a.co_producto_publicaciones = '$co_producto_publicaciones'  and a.co_usuario = '$user_id' and a.nb_estatus in ('En carro','En subasta')  and a.in_activo = true and b.in_activo = true and b.nb_estatus = 'Publicado' and b.ff_vence_publicacion > '$ff_sistema_time' limit 1";
        $query = $obj->db->query($sql);
        return $query->row();
        
    }

    function info_preparar_compra() {
        $obj =& get_instance();
        $ff_sistema_time = time();

        $user_id = $obj->ion_auth->user_id();
        $sql   = "SELECT    (
        CASE
        WHEN a.nb_estatus = 'Compra ganada' THEN
            SUM(
                a.ca_unidades * a.ca_precio_carrito
            )
        ELSE
            SUM(a.ca_unidades * b.ca_precio)
        END
    ) AS total_precio, d.username, e.nb_acronimo
        from e003t_carro_compras as a
        join e002t_producto_publicaciones as b on b.id = a.co_producto_publicaciones
        join j049t_empresas_farmaceuticas_todas as c on c.id = b.co_partner
        join lu_users as d on d.id = b.co_usuario
        join i00t_monedas as e on e.id = b.co_moneda
        where a.nb_estatus in ('En carro','Compra ganada') 
        and a.co_usuario = '$user_id' 
        and a.in_activo = true
        and b.in_activo = true 
        and a.in_preparado_compra = true
        and b.nb_estatus = 'Publicado' and
        (case WHEN a.nb_estatus = 'En carro' then b.ff_vence_publicacion > '$ff_sistema_time' ELSE b.ff_vence_publicacion < '$ff_sistema_time'  end)
        GROUP BY d.username, e.nb_acronimo
        ";
        $query = $obj->db->query($sql);
        return $query;
        
    }

                  function info_comprado_carrito_subasta($co_producto_publicaciones) {
        $obj =& get_instance();
        $ff_sistema_time = time();
        $sql   = "SELECT a.* from e003t_carro_compras as a
        join e002t_producto_publicaciones as b on b.id = a.co_producto_publicaciones
         where a.co_producto_publicaciones = '$co_producto_publicaciones' and a.nb_estatus in ('En carro','En subasta','Compra ganada')  and a.in_activo = true and b.in_activo = true and b.nb_estatus = 'Publicado' order by a.ca_precio_carrito desc limit 1";
        $query = $obj->db->query($sql);
        return $query->row();
        
    }


    function get_info_calificado($co_orden_compra) {
        $obj =& get_instance();
        $ff_sistema_time = time();
        $user_id = $obj->ion_auth->user_id();
        $sql   = "SELECT a.* from j079t_usuario_partner_calificado as a where a.co_usuario = '$user_id' and a.co_orden_compra = '$co_orden_compra' and a.in_activo = true limit 1";
        $query = $obj->db->query($sql);

        if ($query->num_rows() > 0): return true; else: return false; endif;
        
    }
    
    // ordenes de compras activos


                     function ordenes_compras_activos($limite)
    {
        $obj =& get_instance();
        $user_id = $obj->ion_auth->user_id();

            $sql = "SELECT
            a.id
            FROM j076t_orden_compra AS a
            WHERE
            a.co_usuario_comprador = '$user_id'
            AND a.in_activo = TRUE and a.nb_estatus = 'Confirmado por el comprador'";
    $query = $obj->db->query($sql);
    if ($query->num_rows() > $limite): return true; else: return false; endif;  

        
    }

    // Reporte Inventario

            function reporte_inventario($ca_unidades, $co_orden_compra_linea, $co_orden_compra, $co_producto_publicaciones, $nb_movimiento, $nb_tipo_movimiento, $tx_descripcion) {

        $obj =& get_instance();
        $co_usuario = $obj->ion_auth->user_id();
        $co_partner = $obj->ion_auth->co_partner();

        $obj->db->trans_start();
        $x012t_producto_publicaciones_movimiento_inventario['nb_movimiento']      = $nb_movimiento;
        $x012t_producto_publicaciones_movimiento_inventario['nb_tipo_movimiento']      = $nb_tipo_movimiento;
        $x012t_producto_publicaciones_movimiento_inventario['co_producto_publicaciones']      = $co_producto_publicaciones;
        $x012t_producto_publicaciones_movimiento_inventario['ca_unidades']      = $ca_unidades;
        $x012t_producto_publicaciones_movimiento_inventario['co_orden_compra_linea']      = $co_orden_compra_linea;
        $x012t_producto_publicaciones_movimiento_inventario['co_orden_compra']      = $co_orden_compra;
        $x012t_producto_publicaciones_movimiento_inventario['ff_sistema_time']      = time();
        $x012t_producto_publicaciones_movimiento_inventario['co_usuario']      = $co_usuario;
        $x012t_producto_publicaciones_movimiento_inventario['co_partner']      = $co_partner;
        $x012t_producto_publicaciones_movimiento_inventario['tx_descripcion']      = $tx_descripcion;
        $obj->db->insert("x012t_producto_publicaciones_movimiento_inventario", $x012t_producto_publicaciones_movimiento_inventario);
        $obj->db->trans_complete();
        return true;
    }





    


}
?>