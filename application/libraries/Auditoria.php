<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auditoria {

	function __construct() {
	}
	
	/**
	 * Registra la accion realizada por el usuario.
	 */
	function log_usuario($tx_modulo, $tx_accion,  $tx_descripcion, $co_usuario = 0, $co_usuario_notificar = 0, $co_producto_publicaciones = 0) {
		// Carga las librerias y helpers
		$obj =& get_instance();

		$nb_os = $obj->agent->platform();
		$nb_navegador = $obj->agent->browser();
		$tx_agente = $obj->agent->agent_string();  

		// Obtiene los datos del usuario
		$data = array(
               'tx_ip' => $obj->input->ip_address(),
               'tx_accion' => $tx_accion,
               'tx_descripcion' => $tx_descripcion,
               'tx_modulo' => $tx_modulo,
               'co_usuario' => $co_usuario,
               'co_usuario_notificar' => $co_usuario_notificar,
               'nb_os' => $nb_os,
               'nb_navegador' => $nb_navegador,
               'tx_agente' => $tx_agente,
               'co_producto_publicaciones' => $co_producto_publicaciones
            );
		
		// Inserta la accion en la tabla de auditoria
		$obj->db->insert('x009t_log_usuario_biomercado', $data);
	}


	        function notificaciones()
    {
        $obj =& get_instance();
        $user_id = $obj->ion_auth->user_id();

            $sql = "SELECT
            *
            FROM x009t_log_usuario_biomercado AS a
            WHERE
            a.co_usuario_notificar = '$user_id'
            AND a.in_activo = TRUE and a.in_visto = 0 and a.tx_descripcion != 'VER PRODUCTO EN CARTELERA' order by a.id asc";
    $query = $obj->db->query($sql);
    return $query;  

        
    }


}
?>