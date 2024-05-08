<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Lista_precio_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }
    // GENERAL
    function get_lista_precio_presupuesto($co_lista_precio) {
        $obj =& get_instance();
        $sql  = "SELECT a.* from x00t_lista_precio as a
        where a.id = '$co_lista_precio' limit 1";

        $query = $obj->db->query($sql);
        return $query;
    }

        function get_lista_precio_presupuesto_asociado($co_lista_precio) {
        $obj =& get_instance();
        $sql  = "SELECT b.id, b.nb_lista, c.nu_codigo_presupuesto from x00t_presupuesto_detalle as a
        left join x00t_lista_precio AS b on b.id = a.co_lista_precio
        left join i00t_presupuesto as c on c.id = a.co_presupuesto
        where a.in_activo = 'true' and b.id = '$co_lista_precio'
        group by 1,2,3";
        $query = $obj->db->query($sql);
        return $query;
    }

    
}
?>