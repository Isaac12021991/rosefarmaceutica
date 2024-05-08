<?php
class Monedas_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }


    // Listado de monedas
    function get_monedas() {
        $sql   = "SELECT a.*
        FROM
        i00t_monedas AS a
        where a.in_activo = true order by a.nb_moneda";
        $query = $this->db->query($sql);
        return $query;
    }
    // Informacion de monedas
    function get_info_moneda($co_moneda) {
        $sql   = "SELECT a.*
        FROM
        i00t_monedas AS a
        where a.in_activo = true and a.id = '$co_moneda'";
        $query = $this->db->query($sql);
        return $query->row();
    }

        function get_info_moneda_tasa_cambio($co_moneda) {
        $sql   = "SELECT a.id, b.nb_moneda, a.ca_tasa_cambio, a.ff_sistema
        FROM
        x00t_moneda_paralela AS a
        left join i00t_monedas as b on b.id = a.co_moneda_tasa_cambio
        where a.in_activo = true and a.co_moneda = '$co_moneda' order by a.id desc";
        $query = $this->db->query($sql);
        return $query;
    }
    // 
    // Editar moneda
    function actualizar_moneda_model($co_moneda, $nb_moneda, $nb_acronimo, $nb_simbolo, $nu_redondeo) {

        $this->db->trans_start();
        $data_listado['nb_moneda']     = strtoupper($nb_moneda);
        $data_listado['nb_simbolo']    = $nb_simbolo;
        $data_listado['nb_acronimo'] = $nb_acronimo;
        $data_listado['nu_redondeo'] = $nu_redondeo;
        $this->db->where("id", $co_moneda);
        $this->db->update("i00t_monedas", $data_listado);
        $this->db->trans_complete();
        return 'Actualizado';
    }
    // Agregar moneda
    function agregar_moneda_model($nb_moneda, $nb_acronimo, $nb_simbolo, $nu_redondeo) {

        $co_usuario = $this->ion_auth->user_id();

        $this->db->trans_start();
        $data_listado['nb_moneda']     = strtoupper($nb_moneda);
        $data_listado['nb_simbolo']    = $nb_simbolo;
        $data_listado['nb_acronimo'] = $nb_acronimo;
        $data_listado['nu_redondeo'] = $nu_redondeo;
        $data_listado['co_usuario'] = $co_usuario;
        $this->db->insert("i00t_monedas", $data_listado);
        $this->db->trans_complete();
        return 'Agregado';
    }
 
    // eliminar moneda
    function eliminar_moneda_model($co_moneda) {
        $this->db->trans_start();
        $data['in_activo'] = false;
        $this->db->where("id", $co_moneda);
        $this->db->update("i00t_monedas", $data);
        $this->db->trans_complete();
        return 'Eliminado';
    }
    // Editar tasa
    function actualizar_tasa_cambio_model($co_moneda, $co_tasa_cambio, $co_moneda_tasa_cambio, $ca_tasa_cambio) {

        $this->db->trans_start();
        $data_listado['co_moneda_tasa_cambio'] = $co_moneda_tasa_cambio;
        $data_listado['ca_tasa_cambio'] = $ca_tasa_cambio;
        $this->db->where("id", $co_tasa_cambio);
        $this->db->update("x00t_moneda_paralela", $data_listado);
        $this->db->trans_complete();
        return 'Actualizado';
    }

        function agregar_tasa_cambio_model($co_moneda, $co_moneda_tasa_cambio, $ca_tasa_cambio) {

        $this->db->trans_start();
        $data_listado['co_moneda'] = $co_moneda;
        $data_listado['co_moneda_tasa_cambio'] = $co_moneda_tasa_cambio;
        $data_listado['ca_tasa_cambio'] = $ca_tasa_cambio;
        $this->db->insert("x00t_moneda_paralela", $data_listado);
        $this->db->trans_complete();
        return 'Agregado';
    }
    
    // Info de la tasa de cambio
        function get_info_tasa_cambio($co_tasa_cambio) {
        $sql   = "SELECT a.id, b.nb_moneda, a.ca_tasa_cambio, a.ff_sistema, a.co_moneda, a.co_moneda_tasa_cambio
        FROM
        x00t_moneda_paralela AS a
        left join i00t_monedas as b on b.id = a.co_moneda_tasa_cambio
        where a.in_activo = true and a.id = '$co_tasa_cambio'";
        $query = $this->db->query($sql);
        return $query->row();
    }


}
?>