<?php
class Cuenta_banco_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    // Verificar si el registro esta repetido

    // Codigo del banco
    function get_banco_model() {


  

        $sql   = "SELECT * FROM j083t_entidad_monetaria as a
                where a.in_activo = true";
        $query = $this->db->query($sql);
        return $query;
    }

        function get_moneda_model() {
        $sql   = "SELECT * FROM i00t_monedas as a
                where a.in_activo = true";
        $query = $this->db->query($sql);
        return $query;
    }

        // Informacion Banco
    function get_numero_cuenta($nu_cuenta) {



        $sql   = "SELECT * FROM x003t_cuenta_banco as a
                where a.nu_cuenta = '$nu_cuenta' and a.in_activo = true limit 1";
        $query = $this->db->query($sql);
        return $query;
    }


    function get_info_cuenta_banco_model($co_cuenta_banco) {
        $sql   = "SELECT
            a.*,
            b.nb_banco,
            c.nb_moneda,
            c.nb_acronimo,
            c.nu_redondeo
            FROM
            x003t_cuenta_banco AS a
            JOIN j083t_entidad_monetaria AS b ON b.id = a.co_banco
            join i00t_monedas as c on c.id = a.co_moneda
            where a.id = $co_cuenta_banco";
        $query = $this->db->query($sql);
        return $query->row();
    }

    
    function get_cuenta_banco_model() {

        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

        $sql   = "SELECT
            a.id,
            a.nb_diario,
            a.co_banco,
            a.tx_id_titular,
            a.tx_nb_titular,
            a.tx_tipo_cuenta,
            a.nu_cuenta,
            b.nb_banco,
            c.nb_moneda,
            c.nb_acronimo
            FROM
            x003t_cuenta_banco AS a
            JOIN j083t_entidad_monetaria AS b ON b.id = a.co_banco
            join i00t_monedas as c on c.id = a.co_moneda
            where a.co_usuario = '$co_usuario' and a.co_partner = '$co_partner' and a.in_activo = true";
        $query = $this->db->query($sql);
        return $query;
    }
    // Guardar cuenta banco
    function guardar_cuenta_banco_base_model($nu_cuenta, $tx_tipo_cuenta, $tx_id_titular, $tx_nb_titular, $co_banco, $nb_diario, $tx_tipo_diario, $tx_email, $tx_descripcion, $co_moneda) {
        $this->db->trans_start();

        
        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();
        

        $data_listado['co_usuario']      = $co_usuario;
        $data_listado['co_partner'] = $co_partner;
        $data_listado['nb_diario']      = $nb_diario;
        $data_listado['tx_tipo_diario']      = $tx_tipo_diario;
        $data_listado['tx_email']      = $tx_email;
        $data_listado['tx_descripcion']      = $tx_descripcion;
        $data_listado['nu_cuenta']      = $nu_cuenta;
        $data_listado['tx_tipo_cuenta'] = $tx_tipo_cuenta;
        $data_listado['tx_id_titular']  = $tx_id_titular;
        $data_listado['tx_nb_titular']  = $tx_nb_titular;
        $data_listado['co_banco']       = $co_banco;
        $data_listado['co_moneda']       = $co_moneda;
        $this->db->insert("x003t_cuenta_banco", $data_listado);
        $this->db->trans_complete();
        return 'Agregado';
    }

        function editar_cuenta_banco_base_model($co_cuenta_banco, $nu_cuenta, $tx_tipo_cuenta, $tx_id_titular, $tx_nb_titular, $co_banco, $nb_diario, $tx_tipo_diario, $tx_email, $tx_descripcion, $co_moneda) {
        $this->db->trans_start();

        
        $co_usuario = $this->ion_auth->user_id();
        

        $data_listado['co_usuario']      = $co_usuario;
        $data_listado['co_partner'] = $co_partner;
        $data_listado['nb_diario']      = $nb_diario;
        $data_listado['tx_tipo_diario']      = $tx_tipo_diario;
        $data_listado['tx_email']      = $tx_email;
        $data_listado['tx_descripcion']      = $tx_descripcion;
        $data_listado['nu_cuenta']      = $nu_cuenta;
        $data_listado['tx_tipo_cuenta'] = $tx_tipo_cuenta;
        $data_listado['tx_id_titular']  = $tx_id_titular;
        $data_listado['tx_nb_titular']  = $tx_nb_titular;
        $data_listado['co_banco']       = $co_banco;
        $data_listado['co_moneda']       = $co_moneda;
        $this->db->where("id", $co_cuenta_banco);
        $this->db->update("x003t_cuenta_banco", $data_listado);
        $this->db->trans_complete();
        return true;
    }
    // Informacion general de la cuenta bancaria

  

  
    
}
?>