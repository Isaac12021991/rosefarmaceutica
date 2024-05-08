<?php
class Publicidad_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    // Listado de Productos
    function get_publicaciones($limit, $start) {

        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

        $sql   = "SELECT a.*, b.nb_empresa, d.nb_producto, d.ca_precio
        FROM
        j044t_publicidad AS a
        left join j049t_empresas_farmaceuticas_todas as b on b.id = a.co_partner
        left join e002t_producto_publicaciones as d on d.id = a.co_producto_publicaciones
        join lu_users as c on c.id = a.co_usuario
        where a.in_activo = true and a.co_usuario = $co_usuario  and a.co_partner = $co_partner  order by a.id limit $start, $limit";
        $query = $this->db->query($sql);

        return $query;
    }

                    function get_total()
    {

        $filtro = '';
        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();


    $sql = "SELECT a.*, b.nb_empresa
        FROM
        j044t_publicidad AS a
        left join j049t_empresas_farmaceuticas_todas as b on b.id = a.co_partner
        join lu_users as c on c.id = a.co_usuario
        where a.in_activo = true and a.co_usuario = $co_usuario and a.co_partner = $co_partner";
    $query = $this->db->query($sql);

    return $query->num_rows();  

        
    }



        function get_info_publicidad($co_publicidad) {

        $sql   = "SELECT a.*, b.nb_empresa
        FROM
        j044t_publicidad AS a
        left join j049t_empresas_farmaceuticas_todas as b on b.id = a.co_partner
        join lu_users as c on c.id = a.co_usuario
        where a.in_activo = true and a.id = $co_publicidad limit 1";
        $query = $this->db->query($sql);
        return $query->row();
    }


                        function get_estados() {

        $sql   = "SELECT a.*
        FROM
        i00t_estados AS a
        where a.in_activo = true order by a.nb_estado";
        $query = $this->db->query($sql);
        return $query;
    }


                        function get_producto_publicaciones() {

                $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

        if($this->usuario_library->permiso_empresa_obtener($co_partner, "'Administrador'")):

            $filtro_usuario = "";
        else:

            $filtro_usuario = "AND a.co_usuario = $co_usuario";

        endif;

        $ff_sistema_time = time();


        $sql   = "SELECT a.*, b.nb_moneda, b.nb_acronimo, c.username
        FROM
        e002t_producto_publicaciones AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join lu_users as c on c.id = a.co_usuario
        where a.in_activo = true $filtro_usuario and a.co_partner = $co_partner and a.ff_vence_publicacion > '$ff_sistema_time' and a.nb_estatus = 'Publicado' order by a.nb_producto";
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

    

        function agregar_nueva_publicidad_model($tx_descripcion, $ca_dias, $tx_link_dirigir, $tx_link, $nombre_archivo, $nb_estado) {

        // Verificar el Partner Empresa

        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        $ca_presupuesto = $ca_dias * 0.5;

        $ca_dias_segundo = $ca_dias * 86420;
        $time = time() + $ca_dias_segundo;

        $co_usuario = $this->ion_auth->user_id();

        $this->db->trans_start();
        $j044t_publicidad['co_partner']      = $co_partner;
        $j044t_publicidad['tx_descripcion']      = $tx_descripcion;
        $j044t_publicidad['co_usuario']      = $co_usuario;
        $j044t_publicidad['tx_link']      = $tx_link;
        $j044t_publicidad['tx_link_dirigir']      = $tx_link_dirigir;
        $j044t_publicidad['tx_ubicacion_publicidad']      = 'Feeds';
        $j044t_publicidad['nb_url_foto']      = $nombre_archivo;
        $j044t_publicidad['tx_ubicacion']      = $nb_estado;
        $j044t_publicidad['ca_presupuesto']      = $ca_presupuesto;
        $j044t_publicidad['ca_dias']      = $ca_dias;
        $this->db->insert("j044t_publicidad", $j044t_publicidad);
        $this->db->trans_complete();
        return true;
    }


            function agregar_nueva_publicidad_industrial_model($tx_descripcion, $ca_dias, $nb_estado, $co_producto_publicaciones) {

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
        $this->db->insert("j044t_publicidad", $j044t_publicidad);
        $this->db->trans_complete();
        return true;
    }

                function ejecutar_editar_nueva_publicidad_industrial_model($tx_descripcion, $ca_dias, $nb_estado, $co_producto_publicaciones, $co_publicidad) {

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
        $this->db->where("id", $co_publicidad);
        $this->db->update("j044t_publicidad", $j044t_publicidad);
        $this->db->trans_complete();
        return true;
    }   

            function ejecutar_editar_publicidad_model($co_publicidad, $tx_descripcion, $ca_dias, $tx_link_dirigir, $tx_link, $nombre_archivo, $nb_estado) {

        // Verificar el Partner Empresa

        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        $ca_presupuesto = $ca_dias * 0.5;

        $ca_dias_segundo = $ca_dias * 86420;
        $time = time() + $ca_dias_segundo;

        $co_usuario = $this->ion_auth->user_id();

        $this->db->trans_start();
        $j044t_publicidad['tx_descripcion']      = $tx_descripcion;
        $j044t_publicidad['tx_link']      = $tx_link;
        $j044t_publicidad['tx_link_dirigir']      = $tx_link_dirigir;
        $j044t_publicidad['tx_ubicacion_publicidad']      = 'Feeds';
        $j044t_publicidad['nb_url_foto']      = $nombre_archivo;
        $j044t_publicidad['tx_ubicacion']      = $nb_estado;
        $j044t_publicidad['ca_presupuesto']      = $ca_presupuesto;
        $j044t_publicidad['ca_dias']      = $ca_dias;
        $this->db->where("id", $co_publicidad);
        $this->db->update("j044t_publicidad", $j044t_publicidad);
        $this->db->trans_complete();
        return true;
    }


    


        function eliminar_publicidad_model($co_publicidad) {

        $this->db->trans_start();
        $j044t_publicidad['in_activo']      = 0;
        $this->db->where("id", $co_publicidad);
        $this->db->update("j044t_publicidad", $j044t_publicidad);
        $this->db->trans_complete();
        return true;
    }


         function agregar_pago_model($ff_pago, $ca_pago, $ca_pago_bolivar, $co_publicidad, $nombre_archivo, $tx_descripcion) {

        // Verificar el Partner Empresa
        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        $this->db->trans_start();
        $x010t_pagos['ff_pago']     = $ff_pago;
        $x010t_pagos['ca_pago']    = $ca_pago;
        $x010t_pagos['ca_pago_bolivar'] = $ca_pago_bolivar;
        $x010t_pagos['co_publicidad']      = $co_publicidad;
        $x010t_pagos['co_partner']      = $co_partner;
        $x010t_pagos['tx_descripcion']      = $tx_descripcion;
        $x010t_pagos['co_usuario']      = $co_usuario;
        $x010t_pagos['nb_url_adjunto']      = $nombre_archivo;
        $this->db->insert("x010t_pagos", $x010t_pagos);

        $j044t_publicidad['nb_estatus']      = 'En espera por aprobacion';
        $this->db->where("id", $co_publicidad);
        $this->db->update("j044t_publicidad", $j044t_publicidad);

        $this->db->trans_complete();
        return true;
    }

                function eliminar_pago_model($co_pago) {

        $this->db->trans_start();
        $x010t_pagos['in_activo']      = 0;
        $this->db->where("id", $co_pago);
        $this->db->update("x010t_pagos", $x010t_pagos);
        $this->db->trans_complete();
        return true;
    }


                function detener_publicidad_model($co_publicidad) {

       $info_publicidad = $this->get_info_publicidad($co_publicidad);

       $ff_restante = $info_publicidad->ff_vence - time();

        $this->db->trans_start();
        $j044t_publicidad['nb_estatus']      = 'Detenido';
        $j044t_publicidad['ff_restante']      = $ff_restante;
        $j044t_publicidad['ff_vence']      = 0;
        $this->db->where("id", $co_publicidad);
        $this->db->update("j044t_publicidad", $j044t_publicidad);
        $this->db->trans_complete();
        return true;
    }


                function activar_publicidad_model($co_publicidad) {

       $info_publicidad = $this->get_info_publicidad($co_publicidad);
       $ff_vence = $info_publicidad->ff_restante + time();

        $this->db->trans_start();
        $j044t_publicidad['nb_estatus']      = 'Activo';
        $j044t_publicidad['ff_restante']      = 0;
        $j044t_publicidad['ff_vence']      = $ff_vence;
        $this->db->where("id", $co_publicidad);
        $this->db->update("j044t_publicidad", $j044t_publicidad);
        $this->db->trans_complete();
        return true;
    }








}
?>