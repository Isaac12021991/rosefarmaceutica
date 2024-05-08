<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Publicidad_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }

    function get_publicidad($tx_ubicacion_publicidad) {

            $obj =& get_instance(); 

        $fecha_hoy = date('Y-m-d');

        $sql="SELECT * FROM j044t_publicidad as a where a.tx_ubicacion_publicidad = '$tx_ubicacion_publicidad' and a.ff_inicio <= '$fecha_hoy' and a.ff_vence >= '$fecha_hoy' and a.nb_estatus = 'Activa' limit 1";

        $query=$obj->db->query($sql);
        return $query;


    }

        function get_publicidad_cartelera() {



            $obj =& get_instance(); 

        $fecha_hoy = time();
        $tipo_empresa = $obj->ion_auth->tipo_empresa();
        $co_usuario = $obj->ion_auth->user_id();
        $tx_ubicacion = $obj->ion_auth->ubicacion_estado();


        $sql="SELECT a.*, b.nb_empresa, c.username, d.nb_producto, d.ca_precio, e.nb_acronimo
        FROM j044t_publicidad as a 
        join j049t_empresas_farmaceuticas_todas as b on b.id = a.co_partner
        join lu_users as c on c.id = a.co_usuario
        join e002t_producto_publicaciones as d on d.id = a.co_producto_publicaciones
        join i00t_monedas as e on e.id = d.co_moneda
        where a.tx_ubicacion_publicidad = 'Cartelera' 
        and a.ff_inicio <= '$fecha_hoy' 
        and a.ff_vence >= '$fecha_hoy' 
        and a.nb_estatus = 'Activo' 
        and a.tx_ubicacion REGEXP '$tx_ubicacion'
        and a.nb_tipo_empresa_dirigido REGEXP '$tipo_empresa'
        and (SELECT count(id) from x011t_publicidad_vista as aa where aa.co_publicidad = a.id and aa.co_usuario = '$co_usuario') = 0
        limit 1";

        $query=$obj->db->query($sql);


       if($query->num_rows() > 0):

        $info_publicidad = $query->row();
        $obj->db->trans_start();

        $x011t_publicidad_vista['co_publicidad'] = $info_publicidad->id;
        $x011t_publicidad_vista['tx_ip'] = $obj->input->ip_address();
        $x011t_publicidad_vista['co_usuario'] = $co_usuario;
        $x011t_publicidad_vista['nb_estado'] = $tx_ubicacion;
        $x011t_publicidad_vista['ff_sistema'] = time();
        $obj->db->insert("x011t_publicidad_vista", $x011t_publicidad_vista);
        $obj->db->trans_complete();

        endif; 

        return $query;


    }




}
?>