<?php

class Perfil_empresa_model extends CI_Model {

    
    function __construct()
    {
                parent::__construct();
        
    }


        function get_perfil_usuario($co_usuario)
    {

            $sql = "SELECT a.*
            FROM lu_users as a
            WHERE a.id = '$co_usuario'";
            $r = $this->db->query($sql);
            return $r->row();    

    }


            function get_perfil_empresa($co_partner)
    {

        $sql="SELECT a.*, b.nb_tipo_pago, b.nb_forma_pago, b.nb_forma_entrega, b.nb_forma_envio, b.co_moneda  
        from j049t_empresas_farmaceuticas_todas as a
        left join j085t_partner_politicas_terminos_condiciones as b on b.co_partner = a.id
        where a.id = '$co_partner' and a.in_activo = true limit 1";
        $query=$this->db->query($sql);
        return $query->row();
    }


       function get_info_producto_servicios_empresa($co_usuario, $ordenar_query)
    {

      $ff_sistema_time = time();
      $co_partner = $this->ion_auth->co_partner();
      $tipo_empresa = $this->ion_auth->tipo_empresa();
      $mi_estado = $this->ion_auth->ubicacion_estado();

    $sql = "SELECT a.*, b.nb_moneda, b.nb_acronimo, c.nb_empresa, c.nb_tipo_empresa, c.nb_estado, a.in_activo, a.ff_vence_publicacion, d.username
        FROM
        e002t_producto_publicaciones AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join j049t_empresas_farmaceuticas_todas as c on c.id = a.co_partner
        join lu_users as d on d.id = a.co_usuario
        where a.in_activo = true and a.nb_estatus = 'Publicado' 
        and (case WHEN a.co_partner != '$co_partner' then a.nb_dirigido_ubicacion REGEXP '$mi_estado' else a.nb_dirigido_ubicacion LIKE '%%' end)
        and (case WHEN a.co_partner != '$co_partner' then a.nb_dirigido REGEXP '$tipo_empresa' else a.nb_dirigido LIKE '%%' end) and a.co_usuario = $co_usuario
        HAVING id > 0 and in_activo = true and ff_vence_publicacion > '$ff_sistema_time' $ordenar_query";
    $query = $this->db->query($sql);

    return $query; 

        
    }
    

                function get_estados($co_partner)
    {

        
        $filtro = '';

      
      $ff_sistema_time = time();
      $co_partner = $this->ion_auth->co_partner();
      $tipo_empresa = $this->ion_auth->tipo_empresa();

    $sql = "SELECT c.nb_estado
        FROM
        e002t_producto_publicaciones AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join j049t_empresas_farmaceuticas_todas as c on c.id = a.co_partner 
    where a.in_activo = true  $filtro and a.ff_vence_publicacion > '$ff_sistema_time' and a.co_partner = $co_partner and
     (case WHEN a.co_partner != '$co_partner' then a.nb_dirigido REGEXP '$tipo_empresa' else a.nb_dirigido LIKE '%%' end)";
    $query = $this->db->query($sql);

    return $query;  

        
    }


}
?>