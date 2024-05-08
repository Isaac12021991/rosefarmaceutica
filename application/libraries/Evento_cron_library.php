<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Evento_cron_library {

	function __construct() {
	$obj =& get_instance();
    $obj->load->model('evento_cron_model');
	}
	
	/**
	 * Registra la accion realizada por el usuario.
	 */
	function set_notificacion_push_sms($co_usuario, $tx_mensaje, $tx_link = '') {
		// Carga las librerias y helpers
		$obj =& get_instance();

		// Obtiene los datos del usuario
		$data = array(
               'co_usuario' => $co_usuario,
               'tx_mensaje' => $tx_mensaje,
               'tx_link' => $tx_link,
               'ff_sistema_time' => time(),
               'ff_hora_minuto_segundo' => date('H:i'),
               'ff_date' => date('d-m-Y')
            );
		
		// Inserta la accion en la tabla de auditoria
		$obj->db->insert('j054t_notificacion_push_sms', $data);
	}


	            function get_info_notificacion_push_sms() {

        $obj =& get_instance();

        $user_id = $obj->ion_auth->user_id();
        $sql   = "SELECT a.* from j054t_notificacion_push_sms as a where a.co_usuario = '$user_id' and a.in_activo = true  order by a.id desc limit 99";
        $query = $obj->db->query($sql);

        if ($query->num_rows() > 0): $obj->evento_cron_model->set_mensaje_visto_push_sms(); endif;

        if ($query->num_rows() > 0): return $query; else: return false; endif;
        
    }


    	function set_email_system($nb_asunto, $tx_mensaje,  $tx_email_from, $tx_email_to, $tx_email_bcc, $tx_url_adjunto = '') {
		// Carga las librerias y helpers
		$obj =& get_instance();

		// Obtiene los datos del usuario
		$data = array(
               'nb_asunto' => $nb_asunto,
               'tx_mensaje' => $tx_mensaje,
               'tx_email_from' => $tx_email_from,
               'tx_email_to' => $tx_email_to,
               'tx_email_bcc' => $tx_email_bcc,
               'tx_url_adjunto' => $tx_url_adjunto,
               'ff_creado' => time()
            );
		
		// Inserta la accion en la tabla de auditoria
		$obj->db->insert('j052t_mail_sistema', $data);
	}





}
?>