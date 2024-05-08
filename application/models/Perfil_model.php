<?php
class Perfil_model extends CI_Model {
    protected $_ion_hooks;
    protected $esquema = array();
    public $tables = array();
    function __construct() {
        parent::__construct();
        $this->tables      = $this->config->item('tables', 'ion_auth');
        $this->esquema     = $this->config->item('esquema_db', 'ion_auth');
        $this->hash_method = $this->config->item('hash_method', 'ion_auth');
    }
    public function hash_password_db($id, $password, $use_sha1_override = FALSE) {
        if (empty($id) || empty($password)) {
            return FALSE;
        }
        $this->trigger_events('extra_where');
        $query            = $this->db->select('password, salt')->where('id', $id)->limit(1)->order_by('id', 'desc')->get($this->tables['users']);
        $hash_password_db = $query->row();
        if ($query->num_rows() !== 1) {
            return FALSE;
        }
        // bcrypt
        if ($use_sha1_override === FALSE && $this->hash_method == 'bcrypt') {
            if ($this->bcrypt->verify($password, $hash_password_db->password)) {
                return TRUE;
            }
            return FALSE;
        }
        // sha1
        if ($this->store_salt) {
            $db_password = sha1($password . $hash_password_db->salt);
        } else {
            $salt        = substr($hash_password_db->password, 0, $this->salt_length);
            $db_password = $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
        }
        if ($db_password == $hash_password_db->password) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function trigger_events($events) {
        if (is_array($events) && !empty($events)) {
            foreach ($events as $event) {
                $this->trigger_events($event);
            }
        } else {
            if (isset($this->_ion_hooks->$events) && !empty($this->_ion_hooks->$events)) {
                foreach ($this->_ion_hooks->$events as $name => $hook) {
                    $this->_call_hook($events, $name);
                }
            }
        }
    }
    public function salt() {
        $raw_salt_len = 16;
        $buffer       = '';
        $buffer_valid = false;
        if (function_exists('mcrypt_create_iv') && !defined('PHALANGER')) {
            $buffer = mcrypt_create_iv($raw_salt_len, MCRYPT_DEV_URANDOM);
            if ($buffer) {
                $buffer_valid = true;
            }
        }
        if (!$buffer_valid && function_exists('openssl_random_pseudo_bytes')) {
            $buffer = openssl_random_pseudo_bytes($raw_salt_len);
            if ($buffer) {
                $buffer_valid = true;
            }
        }
        if (!$buffer_valid && @is_readable('/dev/urandom')) {
            $f    = fopen('/dev/urandom', 'r');
            $read = strlen($buffer);
            while ($read < $raw_salt_len) {
                $buffer .= fread($f, $raw_salt_len - $read);
                $read = strlen($buffer);
            }
            fclose($f);
            if ($read >= $raw_salt_len) {
                $buffer_valid = true;
            }
        }
        if (!$buffer_valid || strlen($buffer) < $raw_salt_len) {
            $bl = strlen($buffer);
            for ($i = 0; $i < $raw_salt_len; $i++) {
                if ($i < $bl) {
                    $buffer[$i] = $buffer[$i] ^ chr(mt_rand(0, 255));
                } else {
                    $buffer .= chr(mt_rand(0, 255));
                }
            }
        }
        $salt            = $buffer;
        // encode string with the Base64 variant used by crypt
        $base64_digits   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
        $bcrypt64_digits = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $base64_string   = base64_encode($salt);
        $salt            = strtr(rtrim($base64_string, '='), $base64_digits, $bcrypt64_digits);
        $salt            = substr($salt, 0, $this->salt_length);
        return $salt;
    }
    public function hash_password($password, $use_sha1_override = FALSE) {
        if (empty($password)) {
            return FALSE;
        }
        // bcrypt
        if ($use_sha1_override === FALSE && $this->hash_method == 'bcrypt') {
            return $this->bcrypt->hash($password);
        }
    }

    function get_user_perfil() {
        $sql   = "SELECT a.*
        from lu_users as a 
        where a.id = '" . $this->ion_auth->user_id() . "'";
        $query = $this->db->query($sql);
        return $query->row();
    }
    function update_perfil_model($first_name, $last_name, $nb_nacionalidad, $nu_cedula, $ff_nacimiento, $phone) {
        //Datos Basicos del usuario
        $user = $this->ion_auth->user_id();
        $this->db->trans_start();
        $data['first_name']      = strtoupper($first_name);
        $data['last_name']       = strtoupper($last_name);
        $data['nb_nacionalidad'] = $nb_nacionalidad;
        $data['nu_cedula']       = $nu_cedula;
        $data['ff_nacimiento']   = date_system($ff_nacimiento);
        $data['phone']           = $phone;
        $this->db->where('id', $user);
        $this->db->update("lu_users", $data);
        $this->db->trans_complete();
        return "Perfil Actualizado";
    }
    //Método con rand()
    function generate_random($email) {
        $length           = 8;
        $characters       = $email;
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    function generar_codigo_model() {
        //Datos Basicos del usuario
        $user              = $this->ion_auth->user_id();
        $user_info         = $this->medinet_lib->inf_usuario($user);
        $email_user        = $user_info->email;
        $email             = $this->input->post('email');
        $codigo_generado_1 = $this->generate_random($user_info->email);
        $codigo_generado_2 = $this->generate_random($email);
        $this->db->trans_start();
        $data['tx_new_email']              = $email;
        $data['in_verificacion']           = $codigo_generado_1;
        $data['in_verificacion_new_email'] = $codigo_generado_2;
        $data['ff_verificacion']           = date('Y-m-d');
        $this->db->where('id', $user);
        $this->db->update("lu_users", $data);
        $this->db->trans_complete();
        $this->load->library('encrypt');
        $encrypted_string = $this->encrypt->encode($user_info->email);
        $link             = site_url('inicio/cancelar_envio_codigo/' . $encrypted_string);
        $this->load->library('email');
        $htmlContent = '<h2>Cambio de correo electrónico</h2>';
        $htmlContent .= '<p>Has realizado una peticion de cambio de correo electrónico, para verificar si es usted ingrese el siguiente código generado por <b>Medinet</b> de 8 digitos.</p><br>';
        $htmlContent .= '<p>Código de verificacion: <b>' . $codigo_generado_1 . '</b> </p><br>';
        $htmlContent .= '<p>Dispones de 24 horas para ingresar este código al sistema, de lo contrario este código querará invalidado.</p><br>';
        $htmlContent .= '<p>Si desconoce de esta solicitud haga click en CANCELAR SOLICITUD para anular el procedimiento.</p>';
        $htmlContent .= '<a href="' . $link . '"><B>CANCELAR SOLICITUD</B></a>';
        $htmlContent .= '<br><p>Grupo Medinet.</p>';
        $htmlContent_2 = '<h2>Cambio de correo electrónico</h2>';
        $htmlContent_2 .= '<p>Verificacion del nuevo correo electrónico, codigo generado por <b>Medinet</b> de 8 digitos.</p><br>';
        $htmlContent_2 .= '<p>Código de verificacion: <b>' . $codigo_generado_2 . '</b> </p><br>';
        $htmlContent_2 .= '<p>Dispones de 24 horas para ingresar este código al sistema, de lo contrario este código querará invalidado.</p><br>';
        $htmlContent_2 .= '<br><p>Grupo Medinet.</p>';
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to($email_user);
        $this->email->reply_to('admision@medinet.vip', 'Medinet');
        $this->email->from('admision@medinet.vip', 'Medinet');
        $this->email->subject('[Medinet] Cambio de correo electrónico');
        $this->email->message($htmlContent);
        $this->email->send();
        $this->email->initialize($config);
        $this->email->to($email);
        $this->email->reply_to('admision@medinet.vip', 'Medinet');
        $this->email->from('admision@medinet.vip', 'Medinet');
        $this->email->subject('[Medinet] Verificacion de nuevo correo electrónico');
        $this->email->message($htmlContent_2);
        $this->email->send();
        return "Codigo Generado";
    }
    function verificar_codigo_model() {
        $user  = $this->ion_auth->user_id();
        $sql   = "SELECT a.*
        from lu_users as a 
        where a.id = '$user'";
        $query = $this->db->query($sql);
        $user  = $query->row();
        $user->email;
        return $user->tx_new_email;
    }
    function change_email_user_model() {
        //Datos Basicos del usuario
        $user      = $this->ion_auth->user_id();
        $user_info = $this->medinet_lib->inf_usuario($user);
        $user_info->tx_new_email;
        $this->db->trans_start();
        $data['email'] = $user_info->tx_new_email;
        $this->db->where('id', $user);
        $this->db->update("lu_users", $data);
        $data_2['tx_new_email']    = null;
        $data_2['in_verificacion'] = null;
        $data_2['ff_verificacion'] = null;
        $this->db->where('id', $user);
        $this->db->update("lu_users", $data_2);
        $this->db->trans_complete();
        $this->load->library('email');
        $htmlContent = '<h2>Cambio de Correo Electrónico</h2>';
        $htmlContent .= '<p>Se ha realizado exitosamente el cambio de dirección de correo electrónico a ' . $user_info->tx_new_email . '</p><br>';
        $htmlContent .= '<p>De ahora en adelante recibirá notificaciones a este correo.</p><br>';
        $htmlContent .= '<br><p>Grupo Medinet.</p>';
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to($user_info->tx_new_email);
        $this->email->reply_to('medinet@medinet.vip', 'Medinet');
        $this->email->from('admision@medinet.vip', 'Medinet');
        $this->email->subject('[Medinet] Cambio de correo electronico');
        $this->email->message($htmlContent);
        $this->email->send();
        return "Email Cambiado";
    }
    // Contraseña
    function update_change_seguridad_model() {
        $error                  = 0;
        $message                = '';
        $user                   = $this->ion_auth->user_id();
        $co_password_user       = $this->input->post('co_password_user');
        $password               = $this->hash_password_db($user, $co_password_user);
        $new_password_verificar = $this->input->post('new_password');
        $new_password_existe    = $this->hash_password_db($user, $new_password_verificar);
        if ($new_password_existe == 1):
            $error++;
            $message .= 'Error, Ingrese una contraseña nueva a la actual';
        endif;
        if ($password != 1):
            $error++;
            $message .= 'La contraseña actual no es correcta';
        endif;
        if ($error == 0) {
            $fecha_actual = date('Y-m-d');
            $new_password = $this->hash_password($this->input->post('new_password'));
            $this->db->trans_start();
            $data_2['password'] = $new_password;
            $this->db->where('id', $user);
            $this->db->update('lu_users', $data_2);
            $this->db->trans_complete();
            $message .= 'La informacion suministrada ha sido correcta, por favor inicie nuevamente la sesion con su nueva contraseña, gracias';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        return $arreglo;
    }
    function cancelar_envio_codigo_model() {
        $user = $this->ion_auth->user_id();
        $this->db->trans_start();
        $data_2['tx_new_email']              = null;
        $data_2['in_verificacion']           = null;
        $data_2['ff_verificacion']           = null;
        $data_2['in_verificacion_new_email'] = null;
        $this->db->where('id', $user);
        $this->db->update("lu_users", $data_2);
        $this->db->trans_complete();
    }
}
?>