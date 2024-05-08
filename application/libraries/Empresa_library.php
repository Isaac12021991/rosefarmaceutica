<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Empresa_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }

        function get_info_cuentas_bancarias($co_partner)

    {

        $obj =& get_instance();  
        $sql="SELECT a.*, b.nb_moneda, b.nb_acronimo, c.nb_banco
            FROM x003t_cuenta_banco as a
            left join i00t_monedas as b on b.id = a.co_moneda
            left join j083t_entidad_monetaria  as c on c.id = a.co_banco
            where a.in_activo = 1 and b.in_activo = 1 and a.co_partner = $co_partner";
        $query=$obj->db->query($sql);
        if ($query->num_rows() > 0): return $query; else: return false; endif;
    }

            function get_info_diario($co_diario)

    {

        $obj =& get_instance();  
        $sql="SELECT a.*, b.nb_moneda, b.nb_acronimo, c.nb_banco
            FROM x003t_cuenta_banco as a
            left join i00t_monedas as b on b.id = a.co_moneda
            left join j083t_entidad_monetaria  as c on c.id = a.co_banco
            where a.in_activo = 1 and b.in_activo = 1 and a.id = $co_diario";
        $query=$obj->db->query($sql);
        return $query->row();


    }


        function get_info_empresa() {
        $obj =& get_instance();
        $sql   = "SELECT a.*, b.nb_direccion
            FROM i00t_empresas as a
            left join i00t_sucursales as b on b.co_empresa = a.id limit 1";
        $query = $obj->db->query($sql);
        return $query->row();
    }

            function get_info_usuario($co_usuario) {
        $obj =& get_instance();
        $sql   = "SELECT a.*
            FROM lu_users as a where a.id = $co_usuario";
        $query = $obj->db->query($sql);
        return $query->row();
    }

            function get_info_aplicacion() {
        $obj =& get_instance();
        $sql   = "SELECT a.*
            FROM lu_app as a limit 1";
        $query = $obj->db->query($sql);
        return $query->row();
    }


// Info empresas en rose


                function get_empresa_rose($nb_tipo_empresa)

    {

        $obj =& get_instance();  
            $sql = "SELECT b.id, b.nb_tipo_empresa, b.nb_empresa, b.nu_rif, b.nb_estado, b.nb_representante, b.in_validado, c.email, c.id as co_usuario
        FROM j077t_usuario_partner as a
        join j049t_empresas_farmaceuticas_todas as b on b.id = a.co_partner
        join lu_users as c on c.id = a.co_usuario
        where a.in_activo = true and b.nb_tipo_empresa REGEXP '$nb_tipo_empresa' and b.in_validado = 1
        group by b.id, b.nb_tipo_empresa, b.nb_empresa, b.nu_rif, b.nb_estado, b.nb_representante, b.in_validado, c.email, c.id order by a.id desc
         limit 100";
        $query=$obj->db->query($sql);
        return $query;


    }

                    function get_empresa_rose_solicitud_cotizacion($nb_tipo_empresa, $nb_ubicacion_dirigido)

    {

        $nb_ubicacion_dirigido = str_replace(',', '|', $nb_ubicacion_dirigido);
        $nb_tipo_empresa = str_replace(',', '|', $nb_tipo_empresa);

        $obj =& get_instance();  
            $sql = "SELECT b.id, b.nb_tipo_empresa, b.nb_empresa, b.nu_rif, b.nb_estado, b.nb_representante, b.in_validado, c.email, c.id as co_usuario
        FROM j077t_usuario_partner as a
        join j049t_empresas_farmaceuticas_todas as b on b.id = a.co_partner
        join lu_users as c on c.id = a.co_usuario
        where a.in_activo = true and b.nb_tipo_empresa REGEXP '$nb_tipo_empresa' and b.in_validado = 1 and b.nb_estado REGEXP '$nb_ubicacion_dirigido'
        group by b.id, b.nb_tipo_empresa, b.nb_empresa, b.nu_rif, b.nb_estado, b.nb_representante, b.in_validado, c.email, c.id order by a.id desc
         limit 100";
        $query=$obj->db->query($sql);
        return $query;


    }


                        function get_empresa_rose_solicitud_cotizacion_by_username($username)

    {



        $obj =& get_instance();  
            $sql = "SELECT b.id, b.nb_tipo_empresa, b.nb_empresa, b.nu_rif, b.nb_estado, b.nb_representante, b.in_validado, c.email, c.id as co_usuario
        FROM j077t_usuario_partner as a
        join j049t_empresas_farmaceuticas_todas as b on b.id = a.co_partner
        join lu_users as c on c.id = a.co_usuario
        where a.in_activo = true and c.username REGEXP '$username' and b.in_validado = 1
        group by b.id, b.nb_tipo_empresa, b.nb_empresa, b.nu_rif, b.nb_estado, b.nb_representante, b.in_validado, c.email, c.id order by a.id desc
         limit 100";
        $query=$obj->db->query($sql);
        return $query->row();


    }




    
}
?>