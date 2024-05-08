<?php
class Ajustes_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Usuarios
  

    function get_lista_ajuste() {

 
        $sql   = "SELECT a.nb_ajuste FROM i00t_configuracion as a WHERE a.in_activo = '1' GROUP BY a.nb_ajuste ORDER BY 1 DESC ";
        $query = $this->db->query($sql);
        return $query;


    }



    function write_ajustes_model($accion_check_reci) {
        $this->db->trans_start();


        $data_principal['in_encendido'] = '0';
        $this->db->update("i00t_configuracion", $data_principal);

        // veificar s el privilegio lo tiene

        if ($accion_check_reci):

        foreach ($accion_check_reci as $key => $value) {


        
            $data_principal['in_encendido'] = '1';
            $this->db->where("id", $value["value"]);
            $this->db->update("i00t_configuracion", $data_principal);


        }

        else:

        $data_principal['in_encendido'] = '0';
        $this->db->update("i00t_configuracion", $data_principal);

        endif;

 

        $this->db->trans_complete();
        return "Enviado";
    }

        function get_config_sicm_model() {

        $sql   = "SELECT * FROM j044t_configuracion_sicm as a WHERE a.in_activo = '1' ORDER BY 1 DESC ";
        $query = $this->db->query($sql);
        return $query;

    }

            function get_config_sicm_general_model($co_configuracion_sicm) {

        $sql   = "SELECT * FROM j044t_configuracion_sicm as a WHERE a.in_activo = '1' and a.id = '$co_configuracion_sicm' ORDER BY 1 DESC ";
        $query = $this->db->query($sql);
        return $query->row();

    }

        function actualizar_sicm_model($co_configuracion_sicm, $nb_codigo_servicio, $in_conexion_sicm) {

        $in_conexion_sicm = ($in_conexion_sicm == 'true') ? true : false;

        $this->db->trans_start();
        $data_listado['in_conexion_sicm']      = $in_conexion_sicm;
        $data_listado['nb_codigo_servicio']   = $nb_codigo_servicio;
        $this->db->where("id", $co_configuracion_sicm);
        $this->db->update("j044t_configuracion_sicm", $data_listado);
        $this->db->trans_complete();
        return 'Actualizado';
    }


    


    
}
?>