<?php
class Estado_rose_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }


              function get_mi_estado_model() {


        $user_id = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

         $tipo_empresa = $this->ion_auth->tipo_empresa();
         $mi_estado = $this->ion_auth->ubicacion_estado();
         $ff_sistema_time = time();


        $sql   = "SELECT a.*
        FROM x016t_estado_rose AS a 
        join lu_users as b on b.id = a.co_usuario
        where a.in_activo = true and a.time_fin > '$ff_sistema_time' and a.co_usuario = '$user_id' and a.co_partner = '$co_partner'
        order by a.id desc";

        $query = $this->db->query($sql);
        return $query;
    }

    // Mi historia


              function get_mi_historias_estado_principal_model() {


        $user_id = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

         $tipo_empresa = $this->ion_auth->tipo_empresa();
         $mi_estado = $this->ion_auth->ubicacion_estado();
         $ff_sistema_time = time();


        $sql   = "SELECT a.co_usuario, b.nb_foto_perfil, b.username, max(a.time_creado) as lastUpdated,
        (SELECT count(id) from x017t_estado_rose_visto where co_usuario = a.co_usuario and co_usuario_visto = $user_id) as seem
        FROM x016t_estado_rose AS a 
        join lu_users as b on b.id = a.co_usuario
        where a.in_activo = true and a.time_fin > '$ff_sistema_time' and a.co_usuario = '$user_id' and a.co_partner = '$co_partner'
        group by a.co_usuario, b.nb_foto_perfil, b.username  order by a.id desc";

        $query = $this->db->query($sql);
        return $query;
    }

        function get_mi_historias_estado_model($co_usuario) {


                $user_id = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

            $tipo_empresa = $this->ion_auth->tipo_empresa();
         $mi_estado = $this->ion_auth->ubicacion_estado();
         $ff_sistema_time = time();

        $sql   = "SELECT a.id, a.type, a.length, a.src, a.preview, a.link, a.linkText, a.time_creado as time, 
        (SELECT count(id) from x017t_estado_rose_visto where co_estado_rose = a.id and co_usuario_visto = '$user_id') as seem 
        FROM x016t_estado_rose AS a where a.in_activo = true and a.co_usuario = '$co_usuario' and a.time_fin > '$ff_sistema_time' and a.co_partner = '$co_partner'  order by a.id desc";
        $query = $this->db->query($sql);
        return $query->result_Array();
    }


// Nuevas historias o estado

  
          function get_historias_estado_principal_model() {


        $user_id = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

         $tipo_empresa = $this->ion_auth->tipo_empresa();
         $mi_estado = $this->ion_auth->ubicacion_estado();
         $ff_sistema_time = time();


        $sql   = "SELECT a.co_usuario, b.nb_foto_perfil, b.username, max(a.time_creado) as lastUpdated,
        (SELECT count(id) from x017t_estado_rose_visto where co_usuario = a.co_usuario and co_usuario_visto = $user_id) as seem
        FROM x016t_estado_rose AS a 
        join lu_users as b on b.id = a.co_usuario
        where a.in_activo = true and (SELECT count(cc.id) from x016t_estado_rose as cc where cc.co_usuario = a.co_usuario and cc.in_activo = true  and cc.time_fin > '$ff_sistema_time' and cc.nb_tipo_empresa REGEXP '$tipo_empresa' and cc.nb_ubicacion_estado REGEXP '$mi_estado') > (SELECT count(aa.id) from x017t_estado_rose_visto as aa
        JOIN x016t_estado_rose as bb on bb.id = aa.co_estado_rose
        where aa.co_usuario = a.co_usuario and aa.co_usuario_visto = $user_id and bb.in_activo = true  and bb.time_fin > '$ff_sistema_time' and bb.nb_tipo_empresa REGEXP '$tipo_empresa' and bb.nb_ubicacion_estado REGEXP '$mi_estado') and a.time_fin > '$ff_sistema_time' and a.nb_tipo_empresa REGEXP '$tipo_empresa' and a.nb_ubicacion_estado REGEXP '$mi_estado' and not a.co_usuario = $user_id
        group by a.co_usuario, b.nb_foto_perfil, b.username order by a.id desc";

        $query = $this->db->query($sql);
        return $query;
    }

        function get_historias_estado_model($co_usuario) {


                $user_id = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

                 $tipo_empresa = $this->ion_auth->tipo_empresa();
         $mi_estado = $this->ion_auth->ubicacion_estado();
         $ff_sistema_time = time();

        $sql   = "SELECT a.id, a.type, a.length, a.src, a.preview, a.link, a.linkText, a.time_creado as time, 
        (SELECT count(id) from x017t_estado_rose_visto where co_estado_rose = a.id and co_usuario_visto = '$user_id') as seem 
        FROM x016t_estado_rose AS a where a.in_activo = true and a.co_usuario = '$co_usuario' and a.time_fin > '$ff_sistema_time' and a.nb_tipo_empresa REGEXP '$tipo_empresa' and a.nb_ubicacion_estado REGEXP '$mi_estado'  order by a.id desc";
        $query = $this->db->query($sql);
        return $query->result_Array();
    }


// Viejas historias


              function get_historias_estado_principal_old_model() {

                $user_id = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

                 $tipo_empresa = $this->ion_auth->tipo_empresa();
         $mi_estado = $this->ion_auth->ubicacion_estado();
         $ff_sistema_time = time();

        $sql   = "SELECT a.co_usuario, b.nb_foto_perfil, b.username, max(a.time_creado) as lastUpdated,
        (SELECT count(id) from x017t_estado_rose_visto where co_usuario = a.co_usuario and co_usuario_visto = $user_id) as seem,
                 (SELECT count(id) from x016t_estado_rose where co_usuario = a.co_usuario) as cuantas_hay
        FROM x016t_estado_rose AS a 
        join lu_users as b on b.id = a.co_usuario
        where a.in_activo = true and 
        (SELECT count(aa.id) from x017t_estado_rose_visto as aa
        JOIN x016t_estado_rose as bb on bb.id = aa.co_estado_rose
        where aa.co_usuario = a.co_usuario and aa.co_usuario_visto = $user_id and bb.in_activo = true and bb.time_fin > '$ff_sistema_time' and bb.nb_tipo_empresa REGEXP '$tipo_empresa' and bb.nb_ubicacion_estado REGEXP '$mi_estado') = 
        (SELECT count(cc.id) from x016t_estado_rose as cc where cc.co_usuario = a.co_usuario and cc.in_activo = true and cc.time_fin > '$ff_sistema_time' and cc.nb_tipo_empresa REGEXP '$tipo_empresa' and cc.nb_ubicacion_estado REGEXP '$mi_estado') and a.time_fin > '$ff_sistema_time' and a.nb_tipo_empresa REGEXP '$tipo_empresa' and a.nb_ubicacion_estado REGEXP '$mi_estado' and not a.co_usuario = $user_id
        group by a.co_usuario, b.nb_foto_perfil, b.username
        order by a.id desc";



        $query = $this->db->query($sql);
        return $query;
    }

        function get_historias_estado_old_model($co_usuario) {


        $user_id = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

                 $tipo_empresa = $this->ion_auth->tipo_empresa();
         $mi_estado = $this->ion_auth->ubicacion_estado();
         $ff_sistema_time = time();

        $sql   = "SELECT a.id, a.type, a.length, a.src, a.preview, a.link, a.linkText, a.time_creado as time, 
        (SELECT count(id) from x017t_estado_rose_visto where co_estado_rose = a.id and co_usuario_visto = '$user_id') as seem 
        FROM x016t_estado_rose AS a where a.in_activo = true and a.co_usuario = '$co_usuario' and a.time_fin > '$ff_sistema_time' and a.nb_tipo_empresa REGEXP '$tipo_empresa' and a.nb_ubicacion_estado REGEXP '$mi_estado' order by a.id desc";

        $query = $this->db->query($sql);
        return $query->result_Array();
    }




    function actualizar_estado_actual_model($co_stories, $co_estado_rose) {

        $user_id = $this->ion_auth->user_id();

        if (!$this->get_historia_vista($co_estado_rose)):
        
        $this->db->trans_start();
        $x017t_estado_rose_visto['co_usuario'] = $co_stories;
        $x017t_estado_rose_visto['co_usuario_visto'] = $user_id;
        $x017t_estado_rose_visto['co_estado_rose'] = $co_estado_rose;
        $this->db->insert("x017t_estado_rose_visto", $x017t_estado_rose_visto);
        $this->db->trans_complete();

        endif;

        return true;
    }

    // Verificar si lo vio


           function get_historia_vista($co_estado_rose) {


        $user_id = $this->ion_auth->user_id();
        $sql   = "SELECT a.id
        FROM x017t_estado_rose_visto AS a where a.co_usuario_visto = '$user_id' and a.co_estado_rose = '$co_estado_rose' limit 1";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0): return true; else: false; endif;
        
    }


        function agregar_nuevo_estado_model($tx_descripcion, $nombre_archivo, $type, $nb_fondo) {

        // Verificar el Partner Empresa
        $nb_dirigido = '';
        $link = '';

        $co_partner = $this->ion_auth->co_partner();
          $co_usuario = $this->ion_auth->user_id();

        if($this->ion_auth->tipo_empresa() == 'DROGUERIA'):

            $nb_dirigido = 'FARMACIA,CLINICA';

        endif;

        if($this->ion_auth->tipo_empresa() == 'CASA DE REPRESENTACION'):

            $nb_dirigido = 'DROGUERIA';

        endif;

        if($this->ion_auth->tipo_empresa() == 'LABORATORIO'):

            $nb_dirigido = 'DROGUERIA';

        endif;

        if($type == 'mensaje'):

            $tipo = 'text';
            $nombre_archivo_preview = $nombre_archivo;
            $nombre_archivo = $nb_fondo;

        endif;

        if($type == 'photo'):
            $nombre_archivo_preview = $nombre_archivo;
            
            $tipo = 'photo';
            if ($tx_descripcion == ''):

            $link = '';
            

        else:

            $link = 'javascript:';
            

        endif;

        endif;


        $this->db->trans_start();

        $x016t_estado_rose['co_usuario']      = $co_usuario;
        $x016t_estado_rose['co_partner']      = $co_partner;
        $x016t_estado_rose['type'] = $tipo;
        $x016t_estado_rose['length'] = 3;
        $x016t_estado_rose['src']         = $nombre_archivo;
        $x016t_estado_rose['preview']         = $nombre_archivo_preview;
        $x016t_estado_rose['link']         = $link;
        $x016t_estado_rose['linkText']         = $tx_descripcion;
        $x016t_estado_rose['nb_fondo']         = $nb_fondo;
        $x016t_estado_rose['time_creado']         = time();
        $x016t_estado_rose['time_fin']         = time() + 86400;
        $x016t_estado_rose['nb_ubicacion_estado'] = 'AMAZONAS,ANZOATEGUI,APURE,ARAGUA,BARINAS,BOLÍVAR,CARABOBO,COJEDES,DELTA AMACURO,DEPENDENCIAS FEDERALES,DISTRITO CAPITAL,FALCON,GUÁRICO,LARA,MÉRIDA,MIRANDA,MONAGAS,NUEVA ESPARTA,PORTUGUESA,SUCRE,TÁCHIRA,TRUJILLO,VARGAS,YARACUY,ZULIA';
        $x016t_estado_rose['nb_tipo_empresa']         = $nb_dirigido;

        $this->db->insert("x016t_estado_rose", $x016t_estado_rose);
        $this->db->trans_complete();
    
        return true;
    }

       function eliminar_estado_model($co_estado_rose) {


        $this->db->trans_start();
        $x016t_estado_rose['in_activo'] = 0;
        $this->db->where("id", $co_estado_rose);
        $this->db->update("x016t_estado_rose", $x016t_estado_rose);
        $this->db->trans_complete();


        return true;
    }




}
?>