<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Inventario_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }
    //Inventrio GENERAL


    function get_reserva_inventario_producto($co_producto_publicaciones) {
        $obj =& get_instance();
        $fecha_actual = date("Y-m-d");

        $sql   = "SELECT
            COALESCE((SELECT
            SUM(a.ca_unidades)  as ca_unidades_reserva  
            FROM
            x008t_orden_compra_linea AS a
            JOIN e002t_producto_publicaciones AS b ON b.id = a.co_producto_publicaciones
                        JOIN j076t_orden_compra AS c on c.id = a.co_orden_compra
            where a.co_producto_publicaciones = '$co_producto_publicaciones' and c.nb_estatus = 'Confirmado por el comprador'),0) as ca_unidades_reserva";

        $query = $obj->db->query($sql);
        $info_producto_inventario = $query->row();
        return $info_producto_inventario->ca_unidades_reserva;
    }

        function get_producto_disponible($co_producto_publicaciones) {
        $obj =& get_instance();
        $fecha_actual = date("Y-m-d");
        $ff_sistema_time = time();

        $sql   = "SELECT
            COALESCE((SELECT
            SUM(a.ca_unidades)  as ca_unidades_reserva  
            FROM
            x008t_orden_compra_linea AS a
            JOIN e002t_producto_publicaciones AS b ON b.id = a.co_producto_publicaciones
                        JOIN j076t_orden_compra AS c on c.id = a.co_orden_compra
            where a.co_producto_publicaciones = '$co_producto_publicaciones' and c.nb_estatus in ('Confirmado por el comprador','En espera por aprobacion')),0) as ca_unidades_reserva,
            COALESCE((SELECT
            SUM(a.ca_disponible)  as ca_unidades_disponible  
            FROM
            e002t_producto_publicaciones AS a
            where a.id = '$co_producto_publicaciones' and a.nb_estatus = 'Publicado' and a.in_activo = true),0) as ca_unidades_disponible";

        $query = $obj->db->query($sql);
        $info_producto_inventario = $query->row();

        $ca_unidades_disponible = $info_producto_inventario->ca_unidades_disponible - $info_producto_inventario->ca_unidades_reserva;
        return $ca_unidades_disponible;
    }





}
?>