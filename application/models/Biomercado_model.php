<?php
class Biomercado_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }



            function get_current_page_records($limit, $start, $tx_busqueda, $filtro_estado_query, $ordenar_query, $filtro_categoria_query)
    {


        $filtro = '';

     if ($tx_busqueda != '') {
            
        $filtro .= "and (a.nb_producto REGEXP '$tx_busqueda' or a.nb_tags REGEXP '$tx_busqueda' or a.tx_descripcion REGEXP '$tx_busqueda' or d.username REGEXP '$tx_busqueda' or a.cod_barra REGEXP '$tx_busqueda')";
        }

      $ff_sistema_time = time();
      $co_partner = $this->ion_auth->co_partner();
      $tipo_empresa = $this->ion_auth->tipo_empresa();
      $mi_estado = $this->ion_auth->ubicacion_estado();

      // ubicacion que puede buscar el comprador

     // $info_estado_buscar = $this->get_estados_ubicacion();



    $this->db->trans_start(); 

    $sql = "SELECT a.*, b.nb_moneda, b.nb_acronimo, c.nb_empresa, c.nb_tipo_empresa, c.nb_estado, a.in_activo, a.ff_vence_publicacion, d.username
        FROM
        e002t_producto_publicaciones AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join j049t_empresas_farmaceuticas_todas as c on c.id = a.co_partner
        join lu_users as d on d.id = a.co_usuario
        where (a.in_activo = true and a.nb_estatus = 'Publicado') $filtro
        and (case WHEN a.co_partner != '$co_partner' then a.nb_dirigido_ubicacion REGEXP '$mi_estado' else a.nb_dirigido_ubicacion LIKE '%%' end)
        and (case WHEN a.co_partner != '$co_partner' then a.nb_dirigido REGEXP '$tipo_empresa' else a.nb_dirigido LIKE '%%' end)
        HAVING id > 0 and in_activo = true and ff_vence_publicacion > '$ff_sistema_time' $filtro_estado_query $filtro_categoria_query $ordenar_query
        limit $start, $limit";

    $query = $this->db->query($sql);

    $this->db->trans_complete();
    return $query;  

        
    }

                function get_total($tx_busqueda, $filtro_estado_query, $filtro_categoria_query)
    {

        $filtro = '';

     if ($tx_busqueda != '') {
            
        $filtro .= "and (a.nb_producto REGEXP '$tx_busqueda' or a.nb_tags REGEXP '$tx_busqueda' or a.tx_descripcion REGEXP '$tx_busqueda' or d.username REGEXP '$tx_busqueda' or a.cod_barra REGEXP '$tx_busqueda')";

        }

        $ff_sistema_time = time();

      $co_partner = $this->ion_auth->co_partner();
      $tipo_empresa = $this->ion_auth->tipo_empresa();


    $this->db->trans_start(); 

    $sql = "SELECT a.*, b.nb_moneda, b.nb_acronimo, c.nb_empresa, c.nb_tipo_empresa, c.nb_estado, a.ff_vence_publicacion, a.in_activo, d.username
        FROM
        e002t_producto_publicaciones AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join j049t_empresas_farmaceuticas_todas as c on c.id = a.co_partner
        join lu_users as d on d.id = a.co_usuario
        where (a.in_activo = true  and a.nb_estatus = 'Publicado') $filtro and
        (case WHEN a.co_partner != '$co_partner' then a.nb_dirigido REGEXP '$tipo_empresa' else a.nb_dirigido LIKE '%%' end)
        HAVING id > 0 and in_activo = true and ff_vence_publicacion > '$ff_sistema_time' $filtro_estado_query $filtro_categoria_query
        order by a.nb_producto";
    $query = $this->db->query($sql);

    $this->db->trans_complete();
    return $query->num_rows();  

        
    }

                function get_estados($limit, $start, $tx_busqueda, $filtro_estado_query, $filtro_categoria_query)
    {

        
        $filtro = '';

     if ($tx_busqueda != '') {
            
        $resultado2 = $tx_busqueda;
        $filtro .= " and a.nb_producto REGEXP '$resultado2'";


        }

      
      $ff_sistema_time = time();
      $co_partner = $this->ion_auth->co_partner();
      $tipo_empresa = $this->ion_auth->tipo_empresa();

    $sql = "SELECT c.nb_estado
        FROM
        e002t_producto_publicaciones AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join j049t_empresas_farmaceuticas_todas as c on c.id = a.co_partner 
    where a.in_activo = true  $filtro and a.ff_vence_publicacion > '$ff_sistema_time' and
     (case WHEN a.co_partner != '$co_partner' then a.nb_dirigido REGEXP '$tipo_empresa' else a.nb_dirigido LIKE '%%' end)
    group by c.nb_estado limit $start, $limit";
    $query = $this->db->query($sql);

    return $query;  

        
    }


                        function get_estados_ubicacion() {

        $filtro_estado = "";

        $info_membresia = $this->membresia_library->get_membresia();

        if($info_membresia->nb_alcance_ubicacion_compra == 'ESTADAL'):
        $filtro_estado = "and a.nb_estado in ('".$this->ion_auth->ubicacion_estado()."')";

        endif;


        if($info_membresia->nb_alcance_ubicacion_compra == 'REGIONAL'):

        // Obtener region
        $sql   = "SELECT a.* FROM i00t_estados AS a where a.in_activo = true and a.nb_estado in ('".$this->ion_auth->ubicacion_estado()."')";
        $query_region = $this->db->query($sql);

        $info_estado_region = $query_region->row();
        $filtro_estado = "and a.nb_estado in ('".$this->ion_auth->ubicacion_estado()."') or a.nb_region = '$info_estado_region->nb_region'";


        endif;


        if($info_membresia->nb_alcance_ubicacion_compra == 'NACIONAL'):

            $filtro_estado = "";

        endif;

        $sql   = "SELECT a.*
        FROM
        i00t_estados AS a
        where a.in_activo = true $filtro_estado order by a.nb_estado";
        $query = $this->db->query($sql);
        return $query;
    }

        function get_info_orden_compra($co_orden_compra)
    {


        $co_usuario = $this->ion_auth->user_id();

            $sql = "SELECT
            a.id,
            a.nb_empresa_vendedor,
            a.nb_empresa_comprador,
            a.ff_fecha_vencimiento,
            a.co_partner_vendedor,
            a.nb_estatus,
            a.ff_fecha_elaboracion,
            a.nu_codigo_orden_compra,
            a.co_partner_comprador,
            a.co_usuario_comprador,
            a.co_usuario_vendedor,
            (SELECT SUM(b.ca_unidades * b.ca_precio) FROM x008t_orden_compra_linea as b where b.co_orden_compra = a.id and a.in_activo = true) as ca_monto,
            (SELECT COUNT(d.id) FROM x008t_orden_compra_linea as d where d.co_orden_compra = a.id and d.in_activo = true) as ca_renglon,
            b.nu_rif,
            b.nb_estado,
            b.tx_direccion,
            b.tx_email,
            c.first_name,
            c.last_name,
            c.username,
            c.phone,
            e.phone as phone_vendedor,
            d.nb_acronimo,
            e.first_name as nombre_vendedor,
            e.last_name as apellido_vendedor,
            e.email as email_vendedor,
            e.username as username_vendedor,
            f.tx_direccion as tx_direccion_vendedor
            FROM
            j076t_orden_compra AS a
            join j049t_empresas_farmaceuticas_todas as b on b.id = a.co_partner_comprador
            join lu_users as c on c.id = a.co_usuario_comprador
            join lu_users as e on e.id = a.co_usuario_vendedor
            left join i00t_monedas as d on d.id = a.co_moneda
            join j049t_empresas_farmaceuticas_todas as f on f.id = a.co_partner_vendedor
            WHERE a.id = '$co_orden_compra'
            AND a.in_activo = TRUE";
    $query = $this->db->query($sql);
    return $query->row();  

    }

         function get_detalle_orden_compra($co_orden_compra)
    {

            $sql = "SELECT a.*, a.ca_unidades * a.ca_precio as ca_subtotal
            FROM
            x008t_orden_compra_linea AS a
            WHERE
            a.co_orden_compra = '$co_orden_compra'
            AND a.in_activo = TRUE";
    $query = $this->db->query($sql);
    return $query;  

        
    }

                  function get_list_categoria()
    {




      $ff_sistema_time = time();
      $co_partner = $this->ion_auth->co_partner();
      $tipo_empresa = $this->ion_auth->tipo_empresa();
      $mi_estado = $this->ion_auth->ubicacion_estado();

      // ubicacion que puede buscar el comprador

     // $info_estado_buscar = $this->get_estados_ubicacion();


    $this->db->trans_start(); 

    $sql = "SELECT a.nb_categoria
        FROM
        e002t_producto_publicaciones AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join j049t_empresas_farmaceuticas_todas as c on c.id = a.co_partner
        join lu_users as d on d.id = a.co_usuario
        where a.in_activo = true and a.nb_estatus = 'Publicado'
        and (case WHEN a.co_partner != '$co_partner' then a.nb_dirigido_ubicacion REGEXP '$mi_estado' end)
        and (case WHEN a.co_partner != '$co_partner' then a.nb_dirigido REGEXP '$tipo_empresa' end) and (a.in_activo = true and a.ff_vence_publicacion > '$ff_sistema_time') and a.nb_categoria != '' group by a.nb_categoria
        limit 10";

    $query = $this->db->query($sql);

    $this->db->trans_complete();
    return $query;  

        
    }


             function get_list_empresas_certificadas()
    {




      $ff_sistema_time = time();
      $co_partner = $this->ion_auth->co_partner();
      $tipo_empresa = $this->ion_auth->tipo_empresa();
      $mi_estado = $this->ion_auth->ubicacion_estado();

      // ubicacion que puede buscar el comprador

     // $info_estado_buscar = $this->get_estados_ubicacion();


    $this->db->trans_start(); 

    $sql = "SELECT d.username, a.co_usuario, a.co_partner, c.nb_empresa, c.nb_estado
        FROM
        e002t_producto_publicaciones AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join j049t_empresas_farmaceuticas_todas as c on c.id = a.co_partner
        join lu_users as d on d.id = a.co_usuario
        where a.in_activo = true and a.nb_estatus = 'Publicado'
        and (case WHEN a.co_partner != '$co_partner' then a.nb_dirigido_ubicacion REGEXP '$mi_estado' end)
        and (case WHEN a.co_partner != '$co_partner' then a.nb_dirigido REGEXP '$tipo_empresa' end) and (a.in_activo = true and a.ff_vence_publicacion > '$ff_sistema_time') group by d.username, a.co_usuario, a.co_partner, c.nb_empresa, c.nb_estado
        limit 10";

    $query = $this->db->query($sql);

    $this->db->trans_complete();
    return $query;  

        
    }
    


}
?>