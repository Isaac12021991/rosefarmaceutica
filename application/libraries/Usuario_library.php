<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Usuario_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }

    function get_permisos_privilegios($tx_modulo) {
        $obj =& get_instance();
        $sql   = "SELECT * FROM j042t_privilegios as a where a.tx_modulo = '$tx_modulo' and a.in_activo = '1'";
        $query = $obj->db->query($sql);
        return $query;
    }

        function get_permisos_privilegios_editar($tx_modulo, $co_perfil) {
        $obj =& get_instance();
        $sql   = "SELECT *, (SELECT COUNT(id) 
        from j041t_perfil_privilegio_rel
        where co_privilegio = a.id and in_activo = '1' and co_perfil = '$co_perfil') as activado 
        FROM j042t_privilegios as a
        where a.tx_modulo = '$tx_modulo'";
        $query = $obj->db->query($sql);
        return $query;
    }


    
      function perfil($array_perfil)
    {
        $obj =& get_instance();
        $user_id = $obj->ion_auth->user_id();

        $v=0;
        foreach ($array_perfil as $key => $value) {

        $sql="SELECT * FROM j043t_usuario_perfil AS a left join j041t_perfil_privilegio_rel as b on b.co_perfil = a.co_perfil left join j042t_privilegios as c on c.id = b.co_privilegio where a.co_usuario = '$user_id' and c.tx_modulo = '$value'";

        $query=$obj->db->query($sql);

        if ($query->num_rows() > 0): $v ++; endif;

        }

        if ($v == 0) { return false; }else{return true;}
            
        
    }

    function permiso_evento($tx_modulo, $permiso) {

        $obj =& get_instance();    
        $user_id = $obj->ion_auth->user_id();

        $sql   = "SELECT * FROM j043t_usuario_perfil AS a left join j041t_perfil_privilegio_rel as b on b.co_perfil = a.co_perfil left join j042t_privilegios as c on c.id = b.co_privilegio where a.co_usuario = '$user_id' and c.tx_permiso = '$permiso' and c.tx_modulo = '$tx_modulo' ";
        $query = $obj->db->query($sql);

        if ($query->num_rows() > 0): return true; else: return false; endif; 

    }


    // Permiso por empresa

    function permiso_empresa($tx_permiso) {

        $obj =& get_instance();    

        $user_id = $obj->ion_auth->user_id();
        $co_partner = $obj->ion_auth->co_partner();

        $sql   = "SELECT
            b.id,
            b.co_usuario,
            b.co_partner,
            a.tx_permiso
            FROM
            j078t_usuario_partner_permiso AS a
            JOIN j077t_usuario_partner AS b ON b.id = a.co_usuario_partner
            WHERE a.in_activo = true and b.in_activo = TRUE and 
            b.co_partner = '$co_partner' and b.co_usuario = '$user_id' and a.tx_permiso in ($tx_permiso) limit 1";
        $query = $obj->db->query($sql);

        if($query->num_rows() > 0): return true; else: return false; endif;


    }

        function permiso_tipo_empresa($tx_permiso) {

        $obj =& get_instance();    

        $user_id = $obj->ion_auth->user_id();

        $sql   = "SELECT a.*
            FROM lu_users AS a
            WHERE a.id = '$user_id' and a.nb_tipo_empresa in ($tx_permiso) limit 1";
        $query = $obj->db->query($sql);

        if($query->num_rows() > 0): return true; else: return false; endif;


    }


            function get_info_partner($co_partner) {

        $obj =& get_instance();    
        $sql   = "SELECT a.*
            FROM j049t_empresas_farmaceuticas_todas AS a WHERE a.id = '$co_partner' limit 1";
        $query = $obj->db->query($sql);

        if($query->num_rows() > 0): return $query->row(); else: return false; endif;


    }
    
    function permiso_empresa_obtener($co_partner, $tx_permiso) {

        $obj =& get_instance();    

        $user_id = $obj->ion_auth->user_id();

        $sql   = "SELECT
            b.id,
            b.co_usuario,
            b.co_partner,
            a.tx_permiso
            FROM
            j078t_usuario_partner_permiso AS a
            JOIN j077t_usuario_partner AS b ON b.id = a.co_usuario_partner
            WHERE a.in_activo = true and b.in_activo = TRUE and 
            b.co_partner = '$co_partner' and b.co_usuario = '$user_id' and a.tx_permiso in ($tx_permiso) limit 1";
        $query = $obj->db->query($sql);

        if($query->num_rows() > 0): return true; else: return false; endif;


    }

                function get_info_partner_rif($nu_rif) {

        $obj =& get_instance();    
        $sql   = "SELECT a.*
            FROM j049t_empresas_farmaceuticas_todas AS a WHERE a.nu_rif = '$nu_rif' and a.in_activo = true";
        $query = $obj->db->query($sql);

        if($query->num_rows() > 0): return $query; else: return false; endif;


    }
    




    
}
?>