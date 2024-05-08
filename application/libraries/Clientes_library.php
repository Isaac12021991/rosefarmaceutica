<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Clientes_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }
    // GENERAL
    function get_info_cliente_detalle_documento($co_cliente, $co_tipo_documento_cliente) {
        $obj =& get_instance();
        $sql   = "SELECT a.id, a.co_tipo_documento_cliente, a.tx_observacion, a.nb_url, a.ff_sistema, a.co_cliente, b.nb_documento_cliente FROM
        i00t_clientes_detalle AS A 
        join i00t_tipo_documento_cliente as b on b.id = a.co_tipo_documento_cliente WHERE A .in_activo = 'true' and a.co_cliente = '$co_cliente' and a.co_tipo_documento_cliente = '$co_tipo_documento_cliente'";
        $query = $obj->db->query($sql);
        if($query->num_rows() > 0): return true; else: return false; endif;
    }
}
?>