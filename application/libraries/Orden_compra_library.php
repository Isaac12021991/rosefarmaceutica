<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Orden_compra_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }
    // GENERAL
    function get_detalle_orden_compra($co_orden_compra) {
        $obj =& get_instance();
        $sql   = "SELECT
            a.*
            FROM
            x008t_orden_compra_linea AS a
            WHERE a.in_activo = true and a.co_orden_compra = $co_orden_compra";
        $query = $obj->db->query($sql);
        return $query;
    }

     
}
?>