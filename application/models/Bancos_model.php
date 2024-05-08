<?php
class Bancos_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    // Verificar si el registro esta repetido
    
    function get_bancos_model() {
        $sql   = "SELECT
            a.*
            FROM
            i00t_banco AS a
            where a.in_activo = true";
        $query = $this->db->query($sql);
        return $query;
    }

        function get_banco_one_model($co_banco) {
        $sql   = "SELECT
            a.*
            FROM
            i00t_banco AS a
            where a.id = $co_banco";
        $query = $this->db->query($sql);
        return $query->row();
    }


    

        function guardar_nuevo_banco_model($nb_banco, $tx_co_banco, $tx_direccion) {
        $this->db->trans_start();

        $data_listado['nb_banco']  = strtoupper($nb_banco);
        $data_listado['tx_co_banco']   = $tx_co_banco;
        $data_listado['tx_direccion'] = $tx_direccion;
        $data_listado['in_activo']    = true;
        $this->db->insert("i00t_banco", $data_listado);
        $co_new_banco = $this->db->insert_id();
        $this->db->trans_complete();
        return $co_new_banco;
    }

            function write_banco_model($co_banco, $nb_banco, $tx_co_banco, $tx_direccion) {
        $this->db->trans_start();

        $data_listado['nb_banco']  = strtoupper($nb_banco);
        $data_listado['tx_co_banco']   = $tx_co_banco;
        $data_listado['tx_direccion'] = $tx_direccion;
        $data_listado['in_activo']    = true;
        $this->db->where("id", $co_banco);
        $this->db->update("i00t_banco", $data_listado);
        $this->db->trans_complete();
        return true;
    }

        function unlink_banco($co_banco) {
        $this->db->trans_start();
        $data_listado['in_activo']    = false;
        $this->db->where("id", $co_banco);
        $this->db->update("i00t_banco", $data_listado);
        $this->db->trans_complete();
        return true;
    }

    
}
?>