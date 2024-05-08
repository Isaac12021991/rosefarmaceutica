<?php
class Solicitud_cotizacion_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }



    // Listado de Productos
    function get_solicitud_cotizacion($limit, $start, $tx_buscar, $nb_estatus) {

        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();
        if ($nb_estatus == -1): $filtro = ""; else: $filtro = " and a.nb_estatus = '$nb_estatus'"; endif;

        if ($tx_buscar != '') {
            
        $resultado2 = $tx_buscar;
        $filtro .= " and a.nu_codigo_cotizacion REGEXP '$resultado2'";

        }

        if($this->usuario_library->permiso_empresa_obtener($co_partner, "'Administrador'")):

            $filtro_usuario = "";
        else:
            $filtro_usuario = "AND a.co_usuario = $co_usuario";
        endif;

        $fecha_hoy = time();


        $sql   = "SELECT a.*, b.nb_moneda, b.nb_acronimo, c.username,
         (SELECT COUNT(id) FROM x013t_solicitud_cotizacion_linea as aa where aa.co_solicitud_cotizacion = a.id and aa.in_activo = true) as ca_producto,
         (SELECT COUNT(id) FROM j076t_orden_compra as aa where aa.co_solicitud_cotizacion = a.id and aa.in_activo = true and aa.nb_estatus = 'En espera por aprobacion') as ca_solicitud_en_espera
        FROM
        j084t_solicitud_cotizacion AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join lu_users as c on c.id = a.co_usuario
        where a.in_activo = true $filtro_usuario and a.co_partner = $co_partner $filtro order by a.id desc limit $start, $limit";
        $query = $this->db->query($sql);

        return $query;
    }

                    function get_total($tx_buscar, $nb_estatus)
    {

        $filtro = '';

        if ($nb_estatus == -1): $filtro = ""; else: $filtro = " and a.nb_estatus = '$nb_estatus'"; endif;

     if ($tx_buscar != '') {
            
        $resultado2 = $tx_buscar;
        $filtro .= "and a.nu_codigo_cotizacion REGEXP '$resultado2'";

        }


    $sql = "SELECT a.*, b.nb_moneda, b.nb_acronimo,
        (SELECT COUNT(id) FROM x013t_solicitud_cotizacion_linea as aa where aa.co_solicitud_cotizacion = a.id and aa.in_activo = true) as ca_producto
        FROM
        j084t_solicitud_cotizacion AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        where a.in_activo = true $filtro order by a.id desc";
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

            function get_forma_pago() {
        $sql   = "SELECT a.*
        FROM
        j082t_forma_pago AS a
        where a.in_activo = true order by a.id";
        $query = $this->db->query($sql);
        return $query;
    }


    


                    function get_producto_solcititud_cotizacion($co_solicitud_cotizacion) {
        $sql   = "SELECT a.nb_producto
        FROM
        x013t_solicitud_cotizacion_linea AS a
        where a.in_activo = true and a.co_solicitud_cotizacion = '$co_solicitud_cotizacion' order by a.nb_producto asc";
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

          function ejecutar_agregar_producto_model($co_solicitud_cotizacion, $nb_producto, $ca_unidades) {

        // Verificar el Partner Empresa
        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        // Agregar  si  registro  previo co solicitud cotizacion

        if($co_solicitud_cotizacion == 0):

        $this->db->trans_start();

        $array = array('nb_producto'=>$nb_producto, 'ca_unidades'=>$ca_unidades);

        $i00t_z00t_data['tx_modulo'] = 'SOLICITUD COTIZACION';
        $i00t_z00t_data['tx_carga'] = json_encode($array);
        $i00t_z00t_data['co_user'] = $co_usuario;
        $i00t_z00t_data['co_partner'] = $co_partner;
        $this->db->insert("z00t_temporal_json", $i00t_z00t_data);
        $this->db->trans_complete();



        else:


        $this->db->trans_start();
        $x013t_solicitud_cotizacion_linea['nb_producto']     = strtoupper($nb_producto);
        $x013t_solicitud_cotizacion_linea['co_solicitud_cotizacion']    = $co_solicitud_cotizacion;
        $x013t_solicitud_cotizacion_linea['ca_unidades'] = $ca_unidades;
        $this->db->insert("x013t_solicitud_cotizacion_linea", $x013t_solicitud_cotizacion_linea);

        $this->db->trans_complete();

        endif;

        return true;
    }

    // Producto temporales


           function get_tmp_registro() {

        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();
        $tx_modulo = 'SOLICITUD COTIZACION';

        $sql   = "SELECT a.* FROM
        z00t_temporal_json AS a WHERE a.co_user = $co_usuario and a.co_partner = $co_partner and a.tx_modulo = '$tx_modulo'";
        $query = $this->db->query($sql);
        return $query;
    }


           function get_lista_productos($co_solicitud_cotizacion) {

        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        $sql   = "SELECT a.* FROM
        x013t_solicitud_cotizacion_linea AS a WHERE a.co_solicitud_cotizacion = $co_solicitud_cotizacion and a.in_activo = true";
        $query = $this->db->query($sql);
        return $query;
    }

    

                function eliminar_producto_temporal_model($co_temp) {

        $this->db->trans_start();

        $this->db->where("id", $co_temp);
        $this->db->delete("z00t_temporal_json");

        $this->db->trans_complete();
        return true;
    }


                function eliminar_todo_producto_temporal_model() {

        $this->db->trans_start();

        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        $this->db->where("co_partner", $co_partner);
        $this->db->where("co_user", $co_usuario);
        $this->db->delete("z00t_temporal_json");
        $this->db->trans_complete();
        return true;
    }

                function eliminar_producto_solicitud_cotizacion_linea_model($co_solicitud_cotizacion_linea) {

        $this->db->trans_start();
        $x013t_solicitud_cotizacion_linea['in_activo'] = 0;
        $this->db->where("id", $co_solicitud_cotizacion_linea);
        $this->db->update("x013t_solicitud_cotizacion_linea", $x013t_solicitud_cotizacion_linea);

        $this->db->trans_complete();
        return true;
    }

    

        function ejecutar_nuevo_solicitud_cotizacion_model($nb_estatus, $ff_vencimiento, $nb_estado, $nb_dirigido_usuario) {

        // Verificar el Partner Empresa
        $nb_dirigido = '';
        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        if($this->ion_auth->tipo_empresa() == 'FARMACIA' or $this->ion_auth->tipo_empresa() == 'CLINICA'):

            $nb_dirigido = 'DROGUERIA';

        endif;

        if($this->ion_auth->tipo_empresa() == 'DROGUERIA'):

            $nb_dirigido = 'CASA DE REPRESENTACION,LABORATORIO';

        endif;


        $sql = "SELECT COUNT(a.id) as sec
        from j084t_solicitud_cotizacion as a";
        $r = $this->db->query($sql);
        $r->row();
        $secuen = $r->row();
        $secuen->sec;
        $year = date('Y');
        $mes = date('m');
        $dia = date('d');
        $secuen->sec++;
        $nu_codigo =  $year . '' . $mes . '' . $dia . '' . $secuen->sec;


        if($ff_vencimiento == ''): $ff_vencimiento = time() + 2592000; else: $ff_vencimiento = strtotime($ff_vencimiento); endif;
        

        $this->db->trans_start();

        $j084t_solicitud_cotizacion['nb_estatus'] = $nb_estatus;
        $j084t_solicitud_cotizacion['co_partner']      = $co_partner;
        $j084t_solicitud_cotizacion['ff_vencimiento']      = $ff_vencimiento;
        $j084t_solicitud_cotizacion['ff_fecha_elaboracion']      = time();
        $j084t_solicitud_cotizacion['nb_dirigido']      = $nb_dirigido;
        $j084t_solicitud_cotizacion['co_usuario']      = $co_usuario;
        $j084t_solicitud_cotizacion['nb_dirigido_ubicacion']      = $nb_estado;
        $j084t_solicitud_cotizacion['nb_dirigido_usuario']      = $nb_dirigido_usuario;
        $j084t_solicitud_cotizacion['nu_codigo_cotizacion']      = $nu_codigo;
        $this->db->insert("j084t_solicitud_cotizacion", $j084t_solicitud_cotizacion);
        $co_solicitud_cotizacion= $this->db->insert_id();



        //Producto

        $tmp_registro = $this->get_tmp_registro();

        foreach ($tmp_registro->result() as $row) :
  

        $x013t_solicitud_cotizacion_linea = json_decode($row->tx_carga, true);

        $x013t_solicitud_cotizacion_linea['co_solicitud_cotizacion']   = $co_solicitud_cotizacion;
        $this->db->insert("x013t_solicitud_cotizacion_linea", $x013t_solicitud_cotizacion_linea);

        
        endforeach;



        $this->db->trans_complete();

        $this->eliminar_todo_producto_temporal_model();


        // Enviar mensaje

                // Notificaicon  sms push

        $tx_mensaje_push_sms = '¡Nueva solicitud de cotizacion!, N° '.$nu_codigo.'.';
        $tx_link = base_url().'/solicitud_cotizacion/respuesta_solicitud_cotizacion/'.$co_solicitud_cotizacion;

        // Buscar los usuairios a notificar todos

    if($nb_dirigido_usuario == ''):

        $info_usuario_notificar = $this->empresa_library->get_empresa_rose_solicitud_cotizacion($nb_dirigido, $nb_estado);

        if($info_usuario_notificar->num_rows() > 0):

            foreach ($info_usuario_notificar->result() as $key_usuario):

        $this->evento_cron_library->set_notificacion_push_sms($key_usuario->co_usuario, $tx_mensaje_push_sms, $tx_link);

          endforeach;

        endif;

    endif;

       // especifico

    if($nb_dirigido_usuario != ''):

        $etiqueta_array = json_decode($nb_dirigido_usuario);

         foreach ($etiqueta_array as $posicion):

            $info_usuario_notificar = $this->empresa_library->get_empresa_rose_solicitud_cotizacion_by_username($posicion->value);

            $this->evento_cron_library->set_notificacion_push_sms($info_usuario_notificar->co_usuario, $tx_mensaje_push_sms, $tx_link);

         endforeach;


    endif;

        return true;
    }



        function get_info_solicitud_cotizacion($co_solicitud_cotizacion) {

        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        $sql   = "SELECT a.*, b.nb_moneda, b.nb_acronimo, c.username, c.first_name, c.last_name, d.nb_tipo_empresa, d.nb_empresa, d.nb_estado, c.email,
        (SELECT count(aa.id) from j076t_orden_compra as aa where aa.in_activo = true and aa.co_solicitud_cotizacion = a.id and aa.co_partner_vendedor = '$co_partner' and aa.nb_estatus = 'En espera por aprobacion') as ca_orden_compra_generada
        FROM
        j084t_solicitud_cotizacion AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        left join lu_users as c on c.id = a.co_usuario
        left join j049t_empresas_farmaceuticas_todas as d on d.id = a.co_partner
        where a.in_activo = true and a.id = $co_solicitud_cotizacion";
        $query = $this->db->query($sql);
        return $query->row();
    }




        function ejecutar_editar_solicitud_cotizacion_model($co_solicitud_cotizacion, $nb_estatus, $ff_vencimiento, $nb_estado, $nb_dirigido_usuario) {

        // Verificar el Partner Empresa
        $nb_dirigido = '';
        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        if($this->ion_auth->tipo_empresa() == 'FARMACIA' or $this->ion_auth->tipo_empresa() == 'CLINICA'):

            $nb_dirigido = 'DROGUERIA';

        endif;

        if($this->ion_auth->tipo_empresa() == 'DROGUERIA'):

            $nb_dirigido = 'CASA DE REPRESENTACION,LABORATORIO';

        endif;


        if($ff_vencimiento == ''): $ff_vencimiento = time() + 2592000; else: $ff_vencimiento = strtotime($ff_vencimiento); endif;
        

        $this->db->trans_start();

        $j084t_solicitud_cotizacion['nb_estatus'] = $nb_estatus;
        $j084t_solicitud_cotizacion['co_partner']      = $co_partner;
        $j084t_solicitud_cotizacion['ff_vencimiento']      = $ff_vencimiento;
        $j084t_solicitud_cotizacion['nb_dirigido']      = $nb_dirigido;
        $j084t_solicitud_cotizacion['co_usuario']      = $co_usuario;
        $j084t_solicitud_cotizacion['nb_dirigido_ubicacion']      = $nb_estado;
        $j084t_solicitud_cotizacion['nb_dirigido_usuario']      = $nb_dirigido_usuario;
        $this->db->where("id", $co_solicitud_cotizacion);
        $this->db->update("j084t_solicitud_cotizacion", $j084t_solicitud_cotizacion);


        $this->db->trans_complete();




        return true;
    }



        function eliminar_solicitud_cotizacion_model($co_solicitud_cotizacion) {

        $this->db->trans_start();
        $j084t_solicitud_cotizacion['in_activo']      = 0;
        $this->db->where("id", $co_solicitud_cotizacion);
        $this->db->update("j084t_solicitud_cotizacion", $j084t_solicitud_cotizacion);
        $this->db->trans_complete();
        return true;
    }


// Cambiar estatu

            function cambiar_estatus_solicitud_cotizacion_model($co_solicitud_cotizacion, $nb_estatus) {

        $this->db->trans_start();
        $j084t_solicitud_cotizacion['nb_estatus']      = $nb_estatus;
        $this->db->where("id", $co_solicitud_cotizacion);
        $this->db->update("j084t_solicitud_cotizacion", $j084t_solicitud_cotizacion);
        $this->db->trans_complete();
        return true;
    }


            function eliminar_solicitud_cotizacion_accion_check_model($input_check) {

        $this->db->trans_start();

         foreach ($input_check as $key => $value):
        $j084t_solicitud_cotizacion['in_activo']      = 0;
        $this->db->where("id", $value);
        $this->db->update("j084t_solicitud_cotizacion", $j084t_solicitud_cotizacion);
        endforeach;

        $this->db->trans_complete();
        return true;
    }


            function cambiar_estatus_solicitud_cotizacion_accion_check_model($input_check, $nb_estatus) {

        $this->db->trans_start();

         foreach ($input_check as $key => $value):
        $j084t_solicitud_cotizacion['nb_estatus']      = $nb_estatus;
        $this->db->where("id", $value);
        $this->db->update("j084t_solicitud_cotizacion", $j084t_solicitud_cotizacion);
        endforeach;

        $this->db->trans_complete();
        return true;
    }


    // CARTELERA SOLICITUD 

            function get_solicitud_cotizacion_cartelera($limit, $start, $tx_busqueda, $filtro_estado_query, $ordenar_query)
    {


        $filtro = '';

     if ($tx_busqueda != '') {
            
        $resultado2 = $tx_busqueda;
        $filtro .= "and a.nb_producto REGEXP '$resultado2'";
        }

      $ff_sistema_time = time();
      $co_partner = $this->ion_auth->co_partner();
      $tipo_empresa = $this->ion_auth->tipo_empresa();
      $mi_estado = $this->ion_auth->ubicacion_estado();
      $co_usuario = $this->ion_auth->user_id();
      $username = $this->ion_auth->username();

      // ubicacion que puede buscar el comprador

     // $info_estado_buscar = $this->get_estados_ubicacion();



    $this->db->trans_start(); 

    $sql = "SELECT a.*, b.nb_moneda, b.nb_acronimo, c.nb_empresa, c.nb_tipo_empresa, c.nb_estado, a.in_activo, d.username,
        (SELECT count(aa.id) from j076t_orden_compra as aa where aa.in_activo = true and aa.co_solicitud_cotizacion = a.id and aa.co_partner_vendedor = '$co_partner' and aa.nb_estatus = 'En espera por aprobacion') as ca_orden_compra_generada,
                (SELECT count(aa.id) from x014t_solicitud_cotizacion_visto as aa where aa.in_activo = true and aa.co_solicitud_cotizacion = a.id and aa.co_partner = '$co_partner' and aa.co_usuario = '$co_usuario') as co_solicitud_cotizacion_visto
        FROM
        j084t_solicitud_cotizacion AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join j049t_empresas_farmaceuticas_todas as c on c.id = a.co_partner
        join lu_users as d on d.id = a.co_usuario
        where a.in_activo = true and a.nb_estatus = 'Abierta' $filtro 
        and (case WHEN a.co_partner != '$co_partner' then a.nb_dirigido_ubicacion REGEXP '$mi_estado' end)
        and (case WHEN a.co_partner != '$co_partner' then a.nb_dirigido REGEXP '$tipo_empresa' end)
        and (case WHEN a.nb_dirigido_usuario != '' then a.nb_dirigido_usuario REGEXP '$username' end)
        HAVING id > 0 and in_activo = true and ff_vencimiento > '$ff_sistema_time' $filtro_estado_query $ordenar_query
        limit $start, $limit";

    $query = $this->db->query($sql);

    $this->db->trans_complete();
    return $query;  

        
    }





                function get_total_cartelera_solicitud_cotizacion($tx_busqueda, $filtro_estado_query)
    {

        $filtro = '';

     if ($tx_busqueda != '') {
            
        $resultado2 = $tx_busqueda;
        $filtro .= "and a.nu_codigo_cotizacion REGEXP '$resultado2'";


        }

        $ff_sistema_time = time();

      $co_partner = $this->ion_auth->co_partner();
      $tipo_empresa = $this->ion_auth->tipo_empresa();


    $this->db->trans_start(); 

    $sql = "SELECT a.*, b.nb_moneda, b.nb_acronimo, c.nb_empresa, c.nb_tipo_empresa, c.nb_estado, a.in_activo, d.username
        FROM
        j084t_solicitud_cotizacion AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join j049t_empresas_farmaceuticas_todas as c on c.id = a.co_partner
        join lu_users as d on d.id = a.co_usuario
        where a.in_activo = true  and a.nb_estatus = 'Abierta' $filtro and
        (case WHEN a.co_partner != '$co_partner' then a.nb_dirigido REGEXP '$tipo_empresa' else a.nb_dirigido LIKE '%%' end)
        HAVING id > 0 and in_activo = true and ff_vencimiento > '$ff_sistema_time' $filtro_estado_query
        order by a.nu_codigo_cotizacion";
    $query = $this->db->query($sql);

    $this->db->trans_complete();
    return $query->num_rows();  

        
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



                function get_estados_cartelera_solicitud_cotizacion($limit, $start, $tx_busqueda, $filtro_estado_query)
    {

        
        $filtro = '';

     if ($tx_busqueda != '') {
            
        $resultado2 = $tx_busqueda;
        $filtro .= " and a.nu_codigo_cotizacion REGEXP '$resultado2'";


        }

      
      $ff_sistema_time = time();
      $co_partner = $this->ion_auth->co_partner();
      $tipo_empresa = $this->ion_auth->tipo_empresa();

    $sql = "SELECT c.nb_estado
        FROM
        j084t_solicitud_cotizacion AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join j049t_empresas_farmaceuticas_todas as c on c.id = a.co_partner 
    where a.in_activo = true  $filtro and a.ff_vencimiento > '$ff_sistema_time' and
     (case WHEN a.co_partner != '$co_partner' then a.nb_dirigido REGEXP '$tipo_empresa' else a.nb_dirigido LIKE '%%' end)
    group by c.nb_estado limit $start, $limit";
    $query = $this->db->query($sql);

    return $query;  

        
    }


               function get_tmp_producto_solcititud_cotizacion_orden_compra($co_solicitud_cotizacion) {

        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();
        $tx_modulo = 'ORDEN COMPRA SOLICITUD COTIZACION';

        $sql   = "SELECT a.* FROM
        z00t_temporal_json AS a WHERE a.co_user = $co_usuario and a.co_partner = $co_partner and a.tx_modulo = '$tx_modulo' and a.co_id_modulo = '$co_solicitud_cotizacion'";
        $query = $this->db->query($sql);
        return $query;
    }


              function ejecutar_agregar_producto_orden_compra_model($co_orden_compra, $co_solicitud_cotizacion, $nb_producto, $ca_unidades, $ca_precio, $ff_vence, $co_producto_publicaciones, $tx_descripcion) {

        // Verificar el Partner Empresa
        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        // Agregar  si  registro  previo co solicitud cotizacion

        if($co_orden_compra == 0):

        $this->db->trans_start();

        $array = array('nb_producto'=>$nb_producto, 'ff_vence'=>$ff_vence, 'ca_unidades'=>$ca_unidades, 'ca_precio'=>$ca_precio, 'co_producto_publicaciones'=>$co_producto_publicaciones, 'tx_descripcion'=>$tx_descripcion);

        $i00t_z00t_data['tx_modulo'] = 'ORDEN COMPRA SOLICITUD COTIZACION';
        $i00t_z00t_data['co_id_modulo'] = $co_solicitud_cotizacion;
        $i00t_z00t_data['tx_carga'] = json_encode($array);
        $i00t_z00t_data['co_user'] = $co_usuario;
        $i00t_z00t_data['co_partner'] = $co_partner;
        $this->db->insert("z00t_temporal_json", $i00t_z00t_data);
        $this->db->trans_complete();

        else:


        $this->db->trans_start();
        $x008t_orden_compra_linea['nb_producto']     = strtoupper($nb_producto);
        $x008t_orden_compra_linea['co_solicitud_cotizacion']    = $co_solicitud_cotizacion;
        $x008t_orden_compra_linea['ca_unidades'] = $ca_unidades;
        $x008t_orden_compra_linea['ca_precio'] = $ca_precio;
        $x008t_orden_compra_linea['ff_vence'] = $ff_vence;
        $x008t_orden_compra_linea['co_producto_publicaciones'] = $co_producto_publicaciones;
        $x008t_orden_compra_linea['co_orden_compra'] = $co_orden_compra;
        $this->db->insert("x008t_orden_compra_linea", $x008t_orden_compra_linea);

        $this->db->trans_complete();

        endif;

        return true;
    }


    function eliminar_producto_orden_compra_temporal_model($co_temp) {

        $this->db->trans_start();
        $this->db->where("id", $co_temp);
        $this->db->delete("z00t_temporal_json");
        $this->db->trans_complete();
        return true;
    }


               function get_producto_existente_orden_compra($co_solicitud_cotizacion, $nb_producto) {

        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();
        $tx_modulo = 'ORDEN COMPRA SOLICITUD COTIZACION';

        $sql   = "SELECT a.* FROM
        z00t_temporal_json AS a WHERE a.co_user = $co_usuario and a.co_partner = $co_partner 
        and a.tx_modulo = '$tx_modulo' and a.co_id_modulo = '$co_solicitud_cotizacion' and a.tx_carga LIKE '%$nb_producto%'";
        $query = $this->db->query($sql);
        return $query;
    }

                   function ver_info_producto_solicitud_cotizacion_model($nb_producto, $co_solicitud_cotizacion) {


        $sql   = "SELECT a.* FROM
        x013t_solicitud_cotizacion_linea AS a WHERE a.nb_producto = '$nb_producto' and a.co_solicitud_cotizacion = $co_solicitud_cotizacion and a.in_activo = true limit 1";
        $query = $this->db->query($sql);
        return $query->row();
    }



              function enviar_solicitud_orden_compra_model($co_solicitud_cotizacion, $nb_forma_entrega, $nb_tipo_pago, $nb_forma_envio, $co_moneda, $nb_forma_pago) {

        // Verificar el Partner Empresa
        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        $this->db->trans_start();

        $sql = "SELECT COUNT(a.id) as sec
        from j076t_orden_compra as a";
        $r = $this->db->query($sql);
        $r->row();
        $secuen = $r->row();
        $secuen->sec;
        $year = date('Y');
        $mes = date('m');
        $dia = date('d');
        $secuen->sec++;
        $nu_codigo = $year . '' . $mes . '' . $dia . '' . $secuen->sec;

        // Informacion de producto general

        $info_solicitud_cotizacion = $this->get_info_solicitud_cotizacion($co_solicitud_cotizacion);

        $info_partner_vendedor = $this->usuario_library->get_info_partner($co_partner);
        $info_partner_comprador = $this->usuario_library->get_info_partner($info_solicitud_cotizacion->co_partner);

        



        $j076t_orden_compra['nb_empresa_comprador']     = $info_partner_comprador->nb_empresa;
        $j076t_orden_compra['co_partner_comprador']     = $info_partner_comprador->id;
        $j076t_orden_compra['co_usuario_comprador']     = $info_solicitud_cotizacion->co_usuario;

        $j076t_orden_compra['nb_empresa_vendedor']     = $info_partner_vendedor->nb_empresa;
        $j076t_orden_compra['co_partner_vendedor']     = $info_partner_vendedor->id;
        $j076t_orden_compra['co_usuario_vendedor']     = $co_usuario;


        $j076t_orden_compra['co_solicitud_cotizacion']    = $co_solicitud_cotizacion;
        $j076t_orden_compra['nb_estatus']    = 'En espera por aprobacion';

        $j076t_orden_compra['ff_fecha_elaboracion'] = time();
        $j076t_orden_compra['nu_codigo_orden_compra'] = $nu_codigo;

        $j076t_orden_compra['nb_forma_entrega'] = $nb_forma_entrega;
        $j076t_orden_compra['nb_tipo_pago'] = $nb_tipo_pago;

        $j076t_orden_compra['nb_forma_envio'] = $nb_forma_envio;
        $j076t_orden_compra['nb_forma_pago'] = $nb_forma_pago;
        $j076t_orden_compra['co_moneda'] = $co_moneda;

        $this->db->insert("j076t_orden_compra", $j076t_orden_compra);
        $co_orden_compra = $this->db->insert_id();

        


        $info_producto_temporal = $this->get_tmp_producto_solcititud_cotizacion_orden_compra($co_solicitud_cotizacion);

        foreach ($info_producto_temporal->result() as $row):
        $x008t_orden_compra_linea = json_decode($row->tx_carga, true);

        $x008t_orden_compra_linea['co_orden_compra'] = $co_orden_compra;
        $this->db->insert("x008t_orden_compra_linea", $x008t_orden_compra_linea);
            // code...
        
        endforeach;

        // Borrar  temporal

        $this->borrar_productos_orden_compra_temp($co_solicitud_cotizacion);


        $this->db->trans_complete();

        // Notificar email al usuario

        $data_mensaje['titulo_1'] = 'Propuesta de orden de compra Nro';
        $data_mensaje['titulo_2'] = $nu_codigo;
        $data_mensaje['mensaje_subtitulo'] = 'Orden de compra Nro '.$nu_codigo;
        $data_mensaje['mensaje_principal'] = 'Estimado usuario usted ha recibido una propuesta de orden de compra en ROSE de la solicitud de cotizacion Nro '.$info_solicitud_cotizacion->nu_codigo_cotizacion;
        $data_mensaje['mensaje_pie_pagina'] = '';
        

        $tx_mensaje = json_encode($data_mensaje);

        $this->evento_cron_library->set_email_system('[Propuesta Orden de Compra]', $tx_mensaje,  'admision@rosefarmaceutica.com', $info_solicitud_cotizacion->email, '', '');

        // Notificaicon  sms push

        $tx_mensaje_push_sms = 'Has recibido una propuesta de orden de compra N° '.$nu_codigo.' de la solicitud nro '. $info_solicitud_cotizacion->nu_codigo_cotizacion;
        $tx_link = base_url().'/compra/detalle_orden_compra/'.$co_orden_compra;

        $this->evento_cron_library->set_notificacion_push_sms($info_solicitud_cotizacion->co_usuario, $tx_mensaje_push_sms, $tx_link);




        return true;
    }


                function borrar_productos_orden_compra_temp($co_solicitud_cotizacion) {

        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();
        $tx_modulo = 'ORDEN COMPRA SOLICITUD COTIZACION';

        $this->db->where("tx_modulo", $tx_modulo);
        $this->db->where("co_partner", $co_partner);
        $this->db->where("co_user", $co_usuario);
        $this->db->where("co_id_modulo", $co_solicitud_cotizacion);
        $this->db->delete("z00t_temporal_json");

    }


           function get_info_solicitud_cotizacion_orden_compra($co_solicitud_cotizacion) {

        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        $sql   = "SELECT a.*
        FROM
        j076t_orden_compra AS a
        where a.in_activo = true and a.co_solicitud_cotizacion = $co_solicitud_cotizacion and a.co_partner_vendedor = $co_partner and a.co_usuario_vendedor = $co_usuario and a.nb_estatus = 'En espera por aprobacion'";
        $query = $this->db->query($sql);
        return $query->row();
    }

               function get_info_solicitud_cotizacion_orden_compra_todo($co_solicitud_cotizacion) {

        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        $sql   = "SELECT a.*, b.username, c.nb_tipo_empresa, c.nb_estado,
        (SELECT sum(aa.ca_unidades * aa.ca_precio) from x008t_orden_compra_linea as aa where aa.co_orden_compra = a.id and aa.in_activo = true) as ca_monto_orden_compra
        FROM
        j076t_orden_compra AS a
        left join lu_users as b on b.id = a.co_usuario_vendedor
        left join j049t_empresas_farmaceuticas_todas as c on c.id = a.co_partner_vendedor
        where a.in_activo = true and a.co_solicitud_cotizacion = $co_solicitud_cotizacion and a.co_partner_comprador = $co_partner and a.co_usuario_comprador = $co_usuario";
        $query = $this->db->query($sql);
        return $query;
    }



            function get_lista_productos_producto_publicaciones($co_solicitud_cotizacion, $co_moneda) {

        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

        $ff_sistema_time = time();


        if($this->usuario_library->permiso_empresa_obtener($co_partner, "'Administrador'")):

            $filtro_usuario = "";
        else:
            $filtro_usuario = "AND a.co_usuario = $co_usuario";
        endif;



        $sql   = "SELECT a.*, b.nb_moneda, b.nb_acronimo, c.username
        FROM
        e002t_producto_publicaciones AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join lu_users as c on c.id = a.co_usuario
        where a.in_activo = true $filtro_usuario and a.co_partner = $co_partner and a.nb_estatus in ('Publicado', 'No Publicado') and a.co_moneda = '$co_moneda' order by a.nb_producto";


        $query = $this->db->query($sql);

        return $query;
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



            function cancelar_solicitud_cotizacion_orden_compra_model($co_orden_compra) {

        $this->db->trans_start();

        $j076t_orden_compra['nb_estatus']      = 'Orden de compra cancelada por el vendedor';
        $this->db->where("id", $co_orden_compra);
        $this->db->update("j076t_orden_compra", $j076t_orden_compra);

        $this->db->trans_complete();
        return true;
    }

    // Esrtablecer como visto


                function establecer_visto_cotizacion_model($co_solicitud_cotizacion) {

        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

                $sql   = "SELECT a.*
        FROM
        x014t_solicitud_cotizacion_visto AS a
        where a.in_activo = true and a.co_solicitud_cotizacion = $co_solicitud_cotizacion and a.co_partner = '$co_partner' and a.co_usuario = '$co_usuario' limit 1";
        $query = $this->db->query($sql);

        if($query->num_rows() == 0):
        $this->db->trans_start();
        $x014t_solicitud_cotizacion_visto['co_solicitud_cotizacion']      = $co_solicitud_cotizacion;
        $x014t_solicitud_cotizacion_visto['co_partner']      = $co_partner;
        $x014t_solicitud_cotizacion_visto['co_usuario']      = $co_usuario;
        $this->db->insert("x014t_solicitud_cotizacion_visto", $x014t_solicitud_cotizacion_visto);
        $this->db->trans_complete();
        endif;


        return true;
    }



            function get_username()
    {


      $ff_sistema_time = time();
      $co_partner = $this->ion_auth->co_partner();
      $co_usuario = $this->ion_auth->user_id();
      $tipo_empresa = $this->ion_auth->tipo_empresa();
      $mi_estado = $this->get_estados_ubicacion();

      $red_final    = "";
      foreach ($mi_estado->result() as $row):
         $red = "".$row->nb_estado.","; 
        $red_final = $red_final . $red;
      endforeach;

      $list_estado = substr($red_final, 0, -2);
      $list_estado = str_replace(',', '|', $list_estado);


    $busca_tipo_empresa = '';

    if($tipo_empresa == 'FARMACIA' or $tipo_empresa == 'CLINICA'):

        $busca_tipo_empresa = 'DROGUERIA';

    endif;

    if($tipo_empresa == 'DROGUERIA'):

        $busca_tipo_empresa = 'CASA DE REPRESENTACION|LABORATORIO';

    endif;


    $sql = "SELECT d.username
        FROM
        j077t_usuario_partner AS a
        join j049t_empresas_farmaceuticas_todas as c on c.id = a.co_partner
        join lu_users as d on d.id = a.co_usuario
        where a.in_activo = true and a.co_partner != '$co_partner' and a.co_usuario != '$co_usuario' and c.nb_estado REGEXP '$list_estado' and c.in_validado = true and c.nb_tipo_empresa REGEXP '$busca_tipo_empresa'
        limit 500";


    $query = $this->db->query($sql);

    if($query->num_rows() > 0):

        $red_final    = "";
        foreach ($query->result() as $row):
            
        $red = "'".$row->username."', "; 
        $red_final = $red_final . $red;

        endforeach;

        $list_username = substr($red_final, 0, -2);

        return $list_username; 


    else:

         return false;  


    endif;

    
    }



}
?>