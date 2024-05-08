<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Ajuste_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }


    function get_configuracion($nb_configuracion, $tx_modulo) {
        $obj =& get_instance();
        $sql   = "SELECT * from i00t_configuracion as a
        where a.nb_configuracion = '$nb_configuracion' and a.tx_modulo = '$tx_modulo' and in_encendido = '1' and in_activo = true";
        $query = $obj->db->query($sql);
        if ($query->num_rows() > 0):
        return true;
        else:
         return false;
        endif;
    }



        function get_lista_ajuste($nb_ajuste) {
        $obj =& get_instance();
        $sql   = "SELECT a.*
        FROM i00t_configuracion as a
        where a.nb_ajuste = '$nb_ajuste'";
        $query = $obj->db->query($sql);
        return $query;
    }
    
}
?>