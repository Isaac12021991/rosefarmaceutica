<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Membresia_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }
    // GENERAL

     function get_membresia() {

        $obj =& get_instance();

        $info_empresa = $obj->ion_auth->info_partner_todo();
        $time = time();

        if($info_empresa->ff_vence_membresia < $time):
        $sql   = "SELECT a.* FROM j081t_membresia as a where a.nb_tipo_empresa REGEXP '$info_empresa->nb_tipo_empresa' and a.nb_membresia = 'GRATIS' limit 1";
        $query = $obj->db->query($sql);
        $info_membresia = $query->row();
            return $info_membresia;

        else:
            
        $sql   = "SELECT a.* FROM j081t_membresia as a where a.id = '$info_empresa->co_membresia'";
        $query = $obj->db->query($sql);
        $info_membresia = $query->row();
          return $info_membresia;
        endif;
      
    }




}
?>