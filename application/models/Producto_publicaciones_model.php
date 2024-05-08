<?php
class Producto_publicaciones_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }



            function get_publicaciones_activas() {

        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

        $ff_sistema_time = time();

        $sql = "SELECT a.id
        FROM
        e002t_producto_publicaciones AS a
        where a.in_activo = true and a.co_partner = '$co_partner' and a.nb_estatus = 'Publicado'  and a.ff_vence_publicacion > '$ff_sistema_time'
        order by a.nb_producto";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    // Listado de Productos
    function get_producto_publicaciones($limit, $start, $tx_buscar_producto_publicaciones, $nb_estatus) {

        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();
        if ($nb_estatus == -1): $filtro = ""; else: $filtro = " and a.nb_estatus = '$nb_estatus'"; endif;

        if ($tx_buscar_producto_publicaciones != '') {
            
        $resultado2 = $tx_buscar_producto_publicaciones;
        $filtro .= " and a.nb_producto REGEXP '$resultado2'";

        }

        if($this->usuario_library->permiso_empresa_obtener($co_partner, "'Administrador'")):

            $filtro_usuario = "";
        else:
            $filtro_usuario = "AND a.co_usuario = $co_usuario";
        endif;

        $fecha_hoy = time();


        $sql   = "SELECT a.*, b.nb_moneda, b.nb_acronimo, c.username,
        (SELECT count(aa.id) from j044t_publicidad as aa where aa.co_producto_publicaciones = a.id and aa.in_activo = true and aa.nb_estatus = 'Activo' and aa.ff_inicio <= '$fecha_hoy' and aa.ff_vence >= '$fecha_hoy') as ca_promocion_activa
        FROM
        e002t_producto_publicaciones AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join lu_users as c on c.id = a.co_usuario
        where a.in_activo = true $filtro_usuario and a.co_partner = $co_partner $filtro order by a.nb_producto limit $start, $limit";
        $query = $this->db->query($sql);

        return $query;
    }

                    function get_total($tx_busqueda, $nb_estatus)
    {

        $filtro = '';

        if ($nb_estatus == -1): $filtro = ""; else: $filtro = " and a.nb_estatus = '$nb_estatus'"; endif;

     if ($tx_busqueda != '') {
            
        $resultado2 = $tx_busqueda;
        $filtro .= "and a.nb_producto REGEXP '$resultado2'";

        }


    $sql = "SELECT a.*, b.nb_moneda, b.nb_acronimo
        FROM
        e002t_producto_publicaciones AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        where a.in_activo = true $filtro order by a.nb_producto";
    $query = $this->db->query($sql);

    return $query->num_rows();  

        
    }

        function get_monedas() {
        $sql   = "SELECT a.*
        FROM
        i00t_monedas AS a
        where a.in_activo = true order by a.nb_moneda";
        $query = $this->db->query($sql);
        return $query;
    }

            function get_tipo_pago() {
        $sql   = "SELECT a.*
        FROM
        j011t_tipo_pago AS a
        where a.in_activo = true order by a.id";
        $query = $this->db->query($sql);
        return $query;
    }

                function get_categoria() {
        $sql   = "SELECT a.*
        FROM
        j013t_producto_publicaciones_categoria AS a
        where a.in_activo = true order by a.id";
        $query = $this->db->query($sql);
        return $query;
    }

                    function get_forma_entrega() {
        $sql   = "SELECT a.*
        FROM
        j012t_forma_entrega AS a
        where a.in_activo = true order by a.id";
        $query = $this->db->query($sql);
        return $query;
    }

                        function get_forma_envio() {
        $sql   = "SELECT a.*
        FROM
        j014t_forma_envio AS a
        where a.in_activo = true order by a.id";
        $query = $this->db->query($sql);
        return $query;
    }

                        function get_estados() {

        $filtro_estado = "";

        $info_membresia = $this->membresia_library->get_membresia();

        if($info_membresia->nb_alcance_ubicacion_venta == 'ESTADAL'):
        $filtro_estado = "and a.nb_estado in ('".$this->ion_auth->ubicacion_estado()."')";

        endif;


        if($info_membresia->nb_alcance_ubicacion_venta == 'REGIONAL'):

        // Obtener region
        $sql   = "SELECT a.* FROM i00t_estados AS a where a.in_activo = true and a.nb_estado in ('".$this->ion_auth->ubicacion_estado()."')";
        $query_region = $this->db->query($sql);

        $info_estado_region = $query_region->row();
        $filtro_estado = "and a.nb_estado in ('".$this->ion_auth->ubicacion_estado()."') or a.nb_region = '$info_estado_region->nb_region'";


        endif;


        if($info_membresia->nb_alcance_ubicacion_venta == 'NACIONAL'):

            $filtro_estado = "";

        endif;

        $sql   = "SELECT a.*
        FROM
        i00t_estados AS a
        where a.in_activo = true $filtro_estado order by a.nb_estado";
        $query = $this->db->query($sql);
        return $query;
    }





        function verficar_empresa($co_partner) {

        $sql   = "SELECT a.*
        FROM
        j049t_empresas_farmaceuticas_todas AS a
        where a.id = '$co_partner'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    

        function agregar_nuevo_producto_publicaciones_model($nb_producto, $nb_tipo_venta, $nb_estatus, $ca_precio, $ca_disponible, $co_moneda, $tx_descripcion, $ff_vence, $ff_vence_publicacion, $nb_categoria, $nb_tipo_pago, $nb_forma_entrega, $nombre_archivo, $nb_estado, $ca_pedido_minimo, $ca_multiplo, $nb_tags, $nb_forma_envio, $nb_origen_producto, $nb_permiso_importacion, $cod_barra) {

        // Verificar el Partner Empresa
        $nb_dirigido = '';
        $co_partner = $this->ion_auth->co_partner();

        if($this->ion_auth->tipo_empresa() == 'DROGUERIA'):

            $nb_dirigido = 'FARMACIA,CLINICA';

        endif;

        if($this->ion_auth->tipo_empresa() == 'CASA DE REPRESENTACION'):

            $nb_dirigido = 'DROGUERIA';

        endif;

        if($this->ion_auth->tipo_empresa() == 'LABORATORIO'):

            $nb_dirigido = 'DROGUERIA';

        endif;


        if($ff_vence_publicacion == ''): $ff_vence_publicacion = time() + 2592000; else: $ff_vence_publicacion = strtotime($ff_vence_publicacion); endif;
        $co_usuario = $this->ion_auth->user_id();

        $this->db->trans_start();
        $e002t_producto_publicaciones['nb_producto']     = strtoupper($nb_producto);
        $e002t_producto_publicaciones['nb_tipo_venta']    = $nb_tipo_venta;
        $e002t_producto_publicaciones['nb_estatus'] = $nb_estatus;
        $e002t_producto_publicaciones['ca_precio']         = $ca_precio;
        $e002t_producto_publicaciones['ca_disponible']      = $ca_disponible;
        $e002t_producto_publicaciones['co_moneda']     = $co_moneda;
        $e002t_producto_publicaciones['co_partner']      = $co_partner;
        $e002t_producto_publicaciones['tx_descripcion']      = $tx_descripcion;
        $e002t_producto_publicaciones['ff_inicio_publicacion']      = time();
        $e002t_producto_publicaciones['ff_vence_publicacion']      = $ff_vence_publicacion;
        $e002t_producto_publicaciones['ff_sistema']      = time();
        $e002t_producto_publicaciones['ff_vence']      = $ff_vence;
        $e002t_producto_publicaciones['nb_dirigido']      = $nb_dirigido;
        $e002t_producto_publicaciones['co_usuario']      = $co_usuario;
        $e002t_producto_publicaciones['nb_categoria']      = $nb_categoria;
        $e002t_producto_publicaciones['nb_tipo_pago']      = $nb_tipo_pago;
        $e002t_producto_publicaciones['nb_forma_entrega']      = $nb_forma_entrega;
        $e002t_producto_publicaciones['ca_pedido_minimo']      = $ca_pedido_minimo;
        $e002t_producto_publicaciones['ca_multiplo']      = $ca_multiplo;
        $e002t_producto_publicaciones['nb_url_foto']      = $nombre_archivo;
        $e002t_producto_publicaciones['nb_dirigido_ubicacion']      = $nb_estado;
        $e002t_producto_publicaciones['nb_tags']=$nb_tags;

        $e002t_producto_publicaciones['nb_forma_envio']      = $nb_forma_envio;
        $e002t_producto_publicaciones['nb_origen_producto']=$nb_origen_producto;
        $e002t_producto_publicaciones['nb_permiso_importacion']      = $nb_permiso_importacion;
        $e002t_producto_publicaciones['cod_barra']=$cod_barra;

        $this->db->insert("e002t_producto_publicaciones", $e002t_producto_publicaciones);
        $co_producto_publicaciones = $this->db->insert_id();
        $this->db->trans_complete();

        // Reporte inventario
        $this->biomercado_library->reporte_inventario($ca_disponible, 0, 0, $co_producto_publicaciones, 'ENTRADA', 'NUEVA PUBLICACION', 'ENTRADA POR NUEVA PUBLICACION');

    
        return true;
    }

        function get_info_producto_publicaciones($co_producto_publicaciones) {
        $sql   = "SELECT a.*, b.nb_moneda, b.nb_acronimo, c.username, c.first_name, c.last_name
        FROM
        e002t_producto_publicaciones AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        left join lu_users as c on c.id = a.co_usuario
        where a.in_activo = true and a.id = $co_producto_publicaciones";
        $query = $this->db->query($sql);
        return $query->row();
    }

        function ejecutar_editar_producto_publicaciones_model($co_producto_publicaciones, $nb_producto, $nb_tipo_venta, $nb_estatus, $ca_precio, $ca_disponible, $co_moneda, $tx_descripcion, $ff_vence, $ff_vence_publicacion, $nb_categoria, $nb_tipo_pago, $nb_forma_entrega, $nombre_archivo, $nb_estado, $ca_pedido_minimo, $ca_multiplo, $nb_tags, $nb_forma_envio, $nb_origen_producto, $nb_permiso_importacion, $cod_barra) {

                $nb_dirigido = '';

        $co_partner = $this->ion_auth->co_partner();
        
        if($this->ion_auth->tipo_empresa() == 'DROGUERIA'):

            $nb_dirigido = 'FARMACIA,CLINICA';

        endif;

        if($this->ion_auth->tipo_empresa() == 'CASA DE REPRESENTACION'):

            $nb_dirigido = 'DROGUERIA';

        endif;

        if($this->ion_auth->tipo_empresa() == 'LABORATORIO'):

            $nb_dirigido = 'DROGUERIA';

        endif;


        if($ff_vence_publicacion == ''): $ff_vence_publicacion = time() + 2592000; else: $ff_vence_publicacion = strtotime($ff_vence_publicacion); endif;


        // Detectar si hubo cambios en unidades

        $info_producto_publicaciones = $this->get_info_producto_publicaciones($co_producto_publicaciones);

        if($info_producto_publicaciones->ca_disponible != $ca_disponible):
            $ca_unidades_diferencia = $ca_disponible - $info_producto_publicaciones->ca_disponible;

            if($ca_unidades_diferencia < 0): $nb_movimiento = 'SALIDA';  else: $nb_movimiento = 'ENTRADA'; endif; 
        $this->biomercado_library->reporte_inventario($ca_unidades_diferencia, 0, 0, $co_producto_publicaciones, $nb_movimiento, 'AJUSTE POR USUARIO', 'AJUSTE DE LA PUBLICACION');

        endif;


        $co_usuario = $this->ion_auth->user_id();
        $this->db->trans_start();
        $e002t_producto_publicaciones['nb_producto']     = strtoupper($nb_producto);
        $e002t_producto_publicaciones['nb_tipo_venta']    = $nb_tipo_venta;
        $e002t_producto_publicaciones['nb_estatus'] = $nb_estatus;
        $e002t_producto_publicaciones['ca_precio']         = $ca_precio;
        $e002t_producto_publicaciones['ca_disponible']      = $ca_disponible;
        $e002t_producto_publicaciones['co_moneda']     = $co_moneda;
        $e002t_producto_publicaciones['tx_descripcion']      = $tx_descripcion;
        $e002t_producto_publicaciones['ff_sistema']      = time();
        $e002t_producto_publicaciones['ff_vence']      = $ff_vence;
        $e002t_producto_publicaciones['ff_vence_publicacion']      = $ff_vence_publicacion;
        $e002t_producto_publicaciones['nb_dirigido']      = $nb_dirigido;
        $e002t_producto_publicaciones['nb_categoria']      = $nb_categoria;
        $e002t_producto_publicaciones['nb_tipo_pago']      = $nb_tipo_pago;
        $e002t_producto_publicaciones['nb_forma_entrega']      = $nb_forma_entrega;
        $e002t_producto_publicaciones['nb_dirigido_ubicacion']      = $nb_estado;
        $e002t_producto_publicaciones['ca_pedido_minimo']      = $ca_pedido_minimo;
        $e002t_producto_publicaciones['ca_multiplo']      = $ca_multiplo;
        if ($nombre_archivo != ''):
        $e002t_producto_publicaciones['nb_url_foto']      = $nombre_archivo;
        endif;
        $e002t_producto_publicaciones['nb_tags']=$nb_tags;

        $e002t_producto_publicaciones['nb_forma_envio']      = $nb_forma_envio;
        $e002t_producto_publicaciones['nb_origen_producto']=$nb_origen_producto;
        $e002t_producto_publicaciones['nb_permiso_importacion']      = $nb_permiso_importacion;
        $e002t_producto_publicaciones['cod_barra']=$cod_barra;

        $this->db->where("id", $co_producto_publicaciones);
        $this->db->update("e002t_producto_publicaciones", $e002t_producto_publicaciones);
        $this->db->trans_complete();
        return true;
    }

        function eliminar_producto_publicaciones_model($co_producto_publicaciones) {

        $this->db->trans_start();
        $e002t_producto_publicaciones['in_activo']      = 0;
        $this->db->where("id", $co_producto_publicaciones);
        $this->db->update("e002t_producto_publicaciones", $e002t_producto_publicaciones);
        $this->db->trans_complete();
        return true;
    }




        function importar_masivo_excel($sheetData, $co_usuario, $nb_tipo_venta, $nb_estatus, $co_moneda, $ff_vence_publicacion, $nb_categoria, $nb_tipo_pago, $nb_forma_entrega, $nb_estado, $ca_pedido_minimo, $ca_multiplo, $nb_forma_envio, $nb_origen_producto) {

            $co_partner = $this->ion_auth->co_partner();

                    $nb_dirigido = '';

        if($this->ion_auth->tipo_empresa() == 'DROGUERIA'):

            $nb_dirigido = 'FARMACIA,CLINICA';

        endif;

        if($this->ion_auth->tipo_empresa() == 'CASA DE REPRESENTACION'):

            $nb_dirigido = 'DROGUERIA';

        endif;

        if($this->ion_auth->tipo_empresa() == 'LABORATORIO'):

            $nb_dirigido = 'DROGUERIA';

        endif;

         if($ff_vence_publicacion == ''): $ff_vence_publicacion = time() + 2592000; else: $ff_vence_publicacion = strtotime($ff_vence_publicacion); endif;

        
            

foreach ($sheetData as $key) {

    $nb_producto = trim($key['A']);
    $tx_descripcion = trim($key['B']);
    $ca_precio = trim($key['C']);
    $ca_disponible = trim($key['D']);
    $ff_vence = trim($key['E']);

        $this->db->trans_start();
        $e002t_producto_publicaciones['nb_producto']     = strtoupper($nb_producto);
        $e002t_producto_publicaciones['nb_tipo_venta']    = $nb_tipo_venta;
        $e002t_producto_publicaciones['nb_estatus'] = $nb_estatus;
        $e002t_producto_publicaciones['ca_precio']         = $ca_precio;
        $e002t_producto_publicaciones['ca_disponible']      = $ca_disponible;
        $e002t_producto_publicaciones['co_moneda']     = $co_moneda;
        $e002t_producto_publicaciones['co_partner']      = $co_partner;
        $e002t_producto_publicaciones['tx_descripcion']      = $tx_descripcion;
        $e002t_producto_publicaciones['ff_inicio_publicacion']      = time();
        $e002t_producto_publicaciones['ff_vence_publicacion']      = $ff_vence_publicacion;
        $e002t_producto_publicaciones['ff_sistema']      = time();
        $e002t_producto_publicaciones['ff_vence']      = $ff_vence;
        $e002t_producto_publicaciones['co_usuario']      = $co_usuario;
        $e002t_producto_publicaciones['nb_dirigido']      = $nb_dirigido;
        $e002t_producto_publicaciones['nb_categoria']      = $nb_categoria;
        $e002t_producto_publicaciones['nb_tipo_pago']      = $nb_tipo_pago;
        $e002t_producto_publicaciones['nb_forma_entrega']      = $nb_forma_entrega;
        $e002t_producto_publicaciones['nb_dirigido_ubicacion']      = $nb_estado;
        $e002t_producto_publicaciones['ca_pedido_minimo']      = $ca_pedido_minimo;
        $e002t_producto_publicaciones['ca_multiplo']      = $ca_multiplo;

        $e002t_producto_publicaciones['nb_forma_envio']      = $nb_forma_envio;
        $e002t_producto_publicaciones['nb_origen_producto']=$nb_origen_producto;

        $this->db->insert("e002t_producto_publicaciones", $e002t_producto_publicaciones);
        $co_producto_publicaciones = $this->db->insert_id();
        $this->db->trans_complete();
                // Reporte inventario
        $this->biomercado_library->reporte_inventario($ca_disponible, 0, 0, $co_producto_publicaciones, 'ENTRADA', 'NUEVA PUBLICACION', 'ENTRADA POR NUEVA PUBLICACION');


        }

       
        return true;
    }



            function eliminar_producto_publicaciones_accion_check_model($input_check) {

        $this->db->trans_start();

         foreach ($input_check as $key => $value):
        $e002t_producto_publicaciones['in_activo']      = 0;
        $this->db->where("id", $value);
        $this->db->update("e002t_producto_publicaciones", $e002t_producto_publicaciones);
        endforeach;

        $this->db->trans_complete();
        return true;
    }

                function suspender_producto_publicaciones_model($co_producto_publicaciones) {

        $this->db->trans_start();
        $e002t_producto_publicaciones['nb_estatus']      = 'Suspendido';
        $this->db->where_not_in("nb_estatus", 'Vencido');
        $this->db->where("id", $co_producto_publicaciones);
        $this->db->update("e002t_producto_publicaciones", $e002t_producto_publicaciones);
        $this->db->trans_complete();
        return true;
    }


           function suspender_producto_publicaciones_accion_check_model($input_check) {

        $this->db->trans_start();
         foreach ($input_check as $key => $value):
        $e002t_producto_publicaciones['nb_estatus']      = 'Suspendido';
        $this->db->where_not_in("nb_estatus", 'Vencido');
        $this->db->where("id", $value);
        $this->db->update("e002t_producto_publicaciones", $e002t_producto_publicaciones);
        endforeach;
        $this->db->trans_complete();
        return true;
    }


               function publicar_producto_publicaciones_model($co_producto_publicaciones) {

        $this->db->trans_start();
        $e002t_producto_publicaciones['nb_estatus']      = 'Publicado';
        $this->db->where_not_in("nb_estatus", 'Vencido');
        $this->db->where("id", $co_producto_publicaciones);
        $this->db->update("e002t_producto_publicaciones", $e002t_producto_publicaciones);
        $this->db->trans_complete();
        return true;
    }


    

           function publicar_producto_publicaciones_accion_check_model($input_check) {

        $this->db->trans_start();
         foreach ($input_check as $key => $value):
        $e002t_producto_publicaciones['nb_estatus']      = 'Publicado';
        $this->db->where_not_in("nb_estatus", 'Vencido');
        $this->db->where("id", $value);
        $this->db->update("e002t_producto_publicaciones", $e002t_producto_publicaciones);
        endforeach;
        $this->db->trans_complete();
        return true;
    }


        function ejecutar_nueva_publicidad_industrial_model($tx_descripcion, $ca_dias, $nb_estado, $co_producto_publicaciones) {

        // Verificar el Partner Empresa

        if($this->ion_auth->tipo_empresa() == 'DROGUERIA'):
            $nb_dirigido = 'FARMACIA,CLINICA';
        endif;

        if($this->ion_auth->tipo_empresa() == 'CASA DE REPRESENTACION'):
            $nb_dirigido = 'DROGUERIA';
        endif;

        if($this->ion_auth->tipo_empresa() == 'LABORATORIO'):
            $nb_dirigido = 'DROGUERIA';
        endif;


        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        $ca_presupuesto = $ca_dias * 1;

        $ca_dias_segundo = $ca_dias * 86420;
        $time = time() + $ca_dias_segundo;

        $co_usuario = $this->ion_auth->user_id();

        $this->db->trans_start();
        $j044t_publicidad['co_partner']      = $co_partner;
        $j044t_publicidad['tx_descripcion']      = $tx_descripcion;
        $j044t_publicidad['co_usuario']      = $co_usuario;
        $j044t_publicidad['co_producto_publicaciones']      = $co_producto_publicaciones;
        $j044t_publicidad['tx_ubicacion_publicidad']      = 'Cartelera';
        $j044t_publicidad['tx_ubicacion']      = $nb_estado;
        $j044t_publicidad['ca_presupuesto']      = $ca_presupuesto;
        $j044t_publicidad['ca_dias']      = $ca_dias;
        $j044t_publicidad['nb_tipo_empresa_dirigido']      = $nb_dirigido;
        $j044t_publicidad['ff_sistema_time']      = $time;
        $this->db->insert("j044t_publicidad", $j044t_publicidad);
        $co_publicidad = $this->db->insert_id();
        $this->db->trans_complete();
        return $co_publicidad;
    }   

    
         function get_publicacion_existente($co_producto_publicaciones) {

        $sql   = "SELECT a.* FROM j044t_publicidad AS a
        where a.co_producto_publicaciones = '$co_producto_publicaciones' and a.nb_estatus = 'Borrador' and a.in_activo = true limit 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0): return $query->row(); else: return false; endif;
    }

             function get_info_producto_publicaciones_inventario($co_producto_publicaciones) {

        $sql   = "SELECT a.* FROM x012t_producto_publicaciones_movimiento_inventario AS a
        where a.co_producto_publicaciones = '$co_producto_publicaciones'and a.in_activo = true";
        $query = $this->db->query($sql);
        return $query;
    }


             function get_info_producto_publicaciones_estadistica($co_producto_publicaciones)
    {

            $sql = "SELECT COALESCE((SELECT  sum(a.ca_unidades * a.ca_precio) as ca_monto_vendido
            FROM
            x008t_orden_compra_linea AS a
            WHERE
            a.co_producto_publicaciones = '$co_producto_publicaciones'
            AND a.in_activo = TRUE),0) ca_monto_vendido,
             COALESCE((SELECT  count(a.co_producto_publicaciones) as ca_visita_producto
            FROM
            x009t_log_usuario_biomercado AS a
            WHERE
            a.co_producto_publicaciones = '$co_producto_publicaciones'
            AND a.in_activo = TRUE),0) ca_visita_producto

            ";
    $query = $this->db->query($sql);
    return $query->row();  

        
    }


    function get_listado_producto_publicaciones() {

        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();


        if($this->usuario_library->permiso_empresa_obtener($co_partner, "'Administrador'")):

            $filtro_usuario = "";
        else:
            $filtro_usuario = "AND a.co_usuario = $co_usuario";
        endif;

        $fecha_hoy = time();


        $sql   = "SELECT a.*, b.nb_moneda, b.nb_acronimo, c.username, b.nu_redondeo,
        (SELECT count(aa.id) from j044t_publicidad as aa where aa.co_producto_publicaciones = a.id and aa.in_activo = true and aa.nb_estatus = 'Activo' and aa.ff_inicio <= '$fecha_hoy' and aa.ff_vence >= '$fecha_hoy') as ca_promocion_activa
        FROM
        e002t_producto_publicaciones AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join lu_users as c on c.id = a.co_usuario
        where a.in_activo = true $filtro_usuario and a.co_partner = $co_partner and a.nb_estatus = 'Publicado' order by a.nb_producto";
        $query = $this->db->query($sql);

        return $query;
    }




}
?>