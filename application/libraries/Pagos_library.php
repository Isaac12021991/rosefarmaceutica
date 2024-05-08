<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Pagos_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }
    // GENERAL

                function get_pagos_registrados($co_orden_compra) {

        $obj =& get_instance();

        $sql   = "SELECT a.*, b.nb_moneda, b.nb_acronimo, c.nb_diario
              FROM x010t_pagos as a
              left join i00t_monedas as b on b.id = a.co_moneda
              left join x003t_cuenta_banco as c on c.id = a.co_diario
            where a.in_activo = true and a.co_orden_compra = '$co_orden_compra'";
        $query = $obj->db->query($sql);
        return $query;
    }




}
?>