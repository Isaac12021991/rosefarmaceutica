<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Analisis_compra_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }
    // GENERAL
    function get_info_producto_co_analisis_compra_linea($co_analisis_porveedor_linea) {
        $obj =& get_instance();
        $sql  = "SELECT *
        FROM x015t_analisis_compra_linea as a
        where a.id = '$co_analisis_porveedor_linea' limit 1";

        $query = $obj->db->query($sql);
        return $query->row()    ;
    }

    function info_producto_compra($nb_empresa, $nb_producto) {
        $obj =& get_instance();
        $sql  = "SELECT *, (SELECT MAX(ca_precio) as max_ca_precio FROM 
        x015t_analisis_compra_linea as a 
        where a.nb_producto = '$nb_producto' and in_activo = true) as max_ca_precio,
        (SELECT MIN(ca_precio) as min_ca_precio FROM 
        x015t_analisis_compra_linea as a 
        where a.nb_producto = '$nb_producto' and in_activo = true) as min_ca_precio
        FROM x015t_analisis_compra_linea as a
        join j086t_analisis_compra as b on b.id = a.co_analisis_compra
        join i00t_monedas as d on d.id = b.co_moneda
        where b.nb_empresa = '$nb_empresa' and a.nb_producto = '$nb_producto' limit 1";
        $query = $obj->db->query($sql);
        return $query;
    }

        function info_producto_compra_comparacion_precio_minimo($nb_producto) {
        $obj =& get_instance();

        $sql  = "SELECT a.ca_precio, a.nb_producto, b.nb_empresa 
        FROM x015t_analisis_compra_linea as a 
        join j086t_analisis_compra as b on b.id = a.co_analisis_compra 
        join i00t_monedas as d on d.id = b.co_moneda where a.nb_producto = '$nb_producto' ORDER BY a.ca_precio asc limit 1";
        $query = $obj->db->query($sql);
        return $query->row();
    }


            function info_producto_compra_comparacion_precio_maximo($nb_producto) {

        $obj =& get_instance();
        $sql  = "SELECT a.ca_precio, b.nb_lista, b.nb_empresa 
        FROM x015t_analisis_compra_linea as a 
        join j086t_analisis_compra as b on b.id = a.co_analisis_compra 
        join i00t_monedas as d on d.id = b.co_moneda where a.nb_producto = '$nb_producto' ORDER BY a.ca_precio desc limit 1";
        $query = $obj->db->query($sql);
        return $query->row();
    }


// Analisis compra shopping cart

        function info_producto_compra_carro($username, $pivote) {
        $obj =& get_instance();

        $sql  = "SELECT b.*, (SELECT MAX(b.ca_precio) as max_ca_precio FROM 
        e003t_carro_compras AS a
        JOIN e002t_producto_publicaciones AS b ON b.id = a.co_producto_publicaciones
        where
        a.nb_estatus in ('En carro','Compra ganada')
        AND a.in_activo = TRUE
        AND b.in_activo = TRUE
        AND a.in_preparado_compra = TRUE
        AND b.nb_estatus = 'Publicado' and a.id in ($pivote)) as max_ca_precio,

        (SELECT MIN(b.ca_precio) as min_ca_precio FROM 
        e003t_carro_compras AS a
        JOIN e002t_producto_publicaciones AS b ON b.id = a.co_producto_publicaciones
        where
        a.nb_estatus in ('En carro','Compra ganada')
        AND a.in_activo = TRUE
        AND b.in_activo = TRUE
        AND a.in_preparado_compra = TRUE
        AND b.nb_estatus = 'Publicado' and a.id in ($pivote)) as min_ca_precio
    FROM e003t_carro_compras AS a
    JOIN e002t_producto_publicaciones AS b ON b.id = a.co_producto_publicaciones
    JOIN lu_users as c on c.id = b.co_usuario where c.username = '$username' and a.id in ($pivote) limit 1";


        $query = $obj->db->query($sql);
        return $query;
    }

    


}
?>