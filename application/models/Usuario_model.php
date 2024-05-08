<?php
class Usuario_model extends CI_Model {
    protected $_ion_hooks;
    protected $esquema = array();
    public $tables = array();
    function __construct() {
        parent::__construct();
        $this->tables      = $this->config->item('tables', 'ion_auth');
        $this->esquema     = $this->config->item('esquema_db', 'ion_auth');
        $this->hash_method = $this->config->item('hash_method', 'ion_auth');
    }
    public function hash_password_db($id, $password, $use_sha1_override = false) {
        if (empty($id) || empty($password)) {
            return false;
        }
        $this->trigger_events('extra_where');
        $query            = $this->db->select('password, salt')->where('id', $id)->limit(1)->order_by('id', 'desc')->get($this->tables['users']);
        $hash_password_db = $query->row();
        if ($query->num_rows() !== 1) {
            return false;
        }
        // bcrypt
        if ($use_sha1_override === false && $this->hash_method == 'bcrypt') {
            if ($this->bcrypt->verify($password, $hash_password_db->password)) {
                return true;
            }
            return false;
        }
        // sha1
        if ($this->store_salt) {
            $db_password = sha1($password . $hash_password_db->salt);
        } else {
            $salt        = substr($hash_password_db->password, 0, $this->salt_length);
            $db_password = $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
        }
        if ($db_password == $hash_password_db->password) {
            return true;
        } else {
            return false;
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
    public function hash_password($password, $use_sha1_override = false) {
        if (empty($password)) {
            return false;
        }
        // bcrypt
        if ($use_sha1_override === false && $this->hash_method == 'bcrypt') {
            return $this->bcrypt->hash($password);
        }
    }
    // Usuarios
    function get_user_usuario() {
        $sql   = "SELECT * from lu_users where id not in (1) ORDER by 1";
        $query = $this->db->query($sql);
        return $query;
    }

        function get_user_usuario_activos() {
        $sql   = "SELECT * from lu_users where active = 1 and id not in (1) ORDER by 1";
        $query = $this->db->query($sql);
        return $query;
    }

    
    // Usuarios Inactivos o con problemas
    function get_user_usuario_id($co_usuario) {
        $sql   = "SELECT a.* FROM lu_users as a where a.id = '$co_usuario'";
        $query = $this->db->query($sql);
        return $query->row();
    }
    function active_user_model($co_usuario) {
        $this->db->trans_start();
        $data['active'] = '1';
        $this->db->where("id", $co_usuario);
        $this->db->update("lu_users", $data);
        $this->db->trans_complete();
        return "Usuario activado";
    }
    function desactive_user_model($co_usuario) {
        $this->db->trans_start();
        $data['active'] = '0';
        $this->db->where("id", $co_usuario);
        $this->db->update("lu_users", $data);
        $this->db->trans_complete();
        return "Usuario desactivado";
    }
    // Agregar nuevo usuario
    function nuevo_usuario_model($email, $first_name, $last_name, $nu_cedula, $accion_check_reci, $password) {

        $new_password = $this->hash_password($password);

        // crear link de referido

        $this->db->trans_start();
        $data['first_name']   = strtoupper($first_name);
        $data['last_name']    = strtoupper($last_name);
        $data['nu_cedula']    = $nu_cedula;
        $data['email']        = $email;
        $data['active']       = '1';
        $data['nu_intentos']  = '0';
        $data['attempt_time'] = '0';
        $data['password']     = $new_password;
        $data['created_on']   = time();
        $this->db->insert("lu_users", $data);
        $co_new_usuario    = $this->db->insert_id();
        $data5['user_id']  = $co_new_usuario;
        $data5['group_id'] = 8;
        $this->db->insert("lu_users_groups", $data5);

         if ($accion_check_reci):

        foreach ($accion_check_reci as $key => $value) {
            $data_principal['co_usuario'] = $co_new_usuario;
            $data_principal['co_perfil'] = $value["value"];
            $this->db->insert("j043t_usuario_perfil", $data_principal);
        }

        endif;

        // Referido
        $rand_cedula = rand(1,$nu_cedula);
        $link_referido = $rand_cedula.$co_new_usuario;
        
        $data_referido['link_referido']   = $link_referido ;
        $this->db->where("id", $co_new_usuario);
        $this->db->update("lu_users", $data_referido);

        $this->db->trans_complete();
        return "Usuario Agregado";
    }
    // Actualizar Usuario
    function actualizar_usuario_model($co_usuario, $email, $first_name, $last_name, $nu_cedula, $accion_check_reci) {

        $red = '';
        $red_final = '';

        $this->db->trans_start();
        $data['first_name'] = strtoupper($first_name);
        $data['last_name']  = strtoupper($last_name);
        $data['nu_cedula']  = $nu_cedula;
        $data['email']      = $email;
        $this->db->where("id", $co_usuario);
        $this->db->update("lu_users", $data);

        // Actualizar permisos privilegios


        if ($accion_check_reci):

        foreach ($accion_check_reci as $key => $value) {

        $sql   = "SELECT * FROM 
        j043t_usuario_perfil  as a 
        WHERE a.in_activo = '1' and a.co_usuario = '$co_usuario'
        and a.co_perfil = ".$value["value"]."";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0):

        
            else: 

        
            $data_principal['co_usuario'] = $co_usuario;
            $data_principal['co_perfil'] = $value["value"];
            $this->db->insert("j043t_usuario_perfil ", $data_principal);


        endif;

            $red       = $value["value"] . ", ";
            $red_final = $red_final . $red;
            $perfil_lote           = substr($red_final, 0, -2);


        }

        $sql   = "DELETE FROM j043t_usuario_perfil WHERE co_usuario = $co_usuario and not co_perfil in ($perfil_lote)";
        $this->db->query($sql);



        else:


        $sql   = "DELETE FROM j043t_usuario_perfil  WHERE co_usuario = $co_usuario";
        $this->db->query($sql);


        endif;



        $this->db->trans_complete();
        return "Usuario Agregado";
    }
    function get_user_detail_usuario_id($co_usuario) {
        $sql   = "SELECT a.* 
        FROM lu_users as a
        where a.id = '$co_usuario'";
        $query = $this->db->query($sql);
        return $query->row();
    }
    function get_permisos_usuario() {
        $sql   = "SELECT a.*
          FROM lu_groups as a
                where a.in_activo = '1' and not id in(1,5,6,8)";
        $query = $this->db->query($sql);
        return $query->result();
    }
    // Verificar correo existente
    // Buscar producto existente
    function get_email_existente_model($email) {
        $sql   = "SELECT * FROM lu_users as a
        WHERE a.email = '$email'";
        $query = $this->db->query($sql);
        return $query;
    }


    function get_lista_perfiles() {
        $sql   = "SELECT * FROM j040t_perfil AS a WHERE a.in_activo = '1'";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_lista_privilegios() {
        $sql   = "SELECT a.tx_modulo FROM j042t_privilegios as a WHERE a.in_activo = '1' GROUP BY a.tx_modulo ORDER BY 1 DESC ";
        $query = $this->db->query($sql);
        return $query;
    }

        function create_perfil_model($nb_perfil, $tx_descripcion, $accion_check_reci) {
        $this->db->trans_start();

        $data['nb_perfil']    = $nb_perfil;
        $data['tx_descripcion'] = $tx_descripcion;
        $this->db->insert("j040t_perfil", $data);
        $co_new_perfil = $this->db->insert_id();

        foreach ($accion_check_reci as $key => $value) {
            $data_principal['co_privilegio'] = $value["value"];
            $data_principal['co_perfil'] = $co_new_perfil;
            $this->db->insert("j041t_perfil_privilegio_rel", $data_principal);
        }

        $this->db->trans_complete();
        return "Enviado";
    }

            function write_perfil_model($co_perfil, $nb_perfil, $tx_descripcion, $accion_check_reci) {
        $this->db->trans_start();

        $red = '';
        $red_final = '';

        $data['nb_perfil']    = $nb_perfil;
        $data['tx_descripcion'] = $tx_descripcion;
        $this->db->where("id", $co_perfil);
        $this->db->update("j040t_perfil", $data);

        // veificar s el privilegio lo tiene

        if ($accion_check_reci):

        foreach ($accion_check_reci as $key => $value) {

        $sql   = "SELECT * FROM 
        j041t_perfil_privilegio_rel as a 
        WHERE a.in_activo = '1' and a.co_perfil = '$co_perfil'
        and a.co_privilegio = ".$value["value"]."";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0):

        
            else: 

        
            $data_principal['co_privilegio'] = $value["value"];
            $data_principal['co_perfil'] = $co_perfil;
            $this->db->insert("j041t_perfil_privilegio_rel", $data_principal);


        endif;

            $red       = $value["value"] . ", ";
            $red_final = $red_final . $red;


        }

        $privilegios_lote           = substr($red_final, 0, -2);


        $sql   = "DELETE FROM j041t_perfil_privilegio_rel WHERE co_perfil = $co_perfil and not co_privilegio in ($privilegios_lote)";
        $this->db->query($sql);



        else:


        $sql   = "DELETE FROM j041t_perfil_privilegio_rel WHERE co_perfil = $co_perfil";
        $this->db->query($sql);


        endif;

 

        $this->db->trans_complete();
        return "Enviado";
    }



            function get_info_perfil($co_perfil) {
        $sql   = "SELECT * FROM j040t_perfil as a where a.in_activo = '1' and a.id = $co_perfil";
        $query = $this->db->query($sql);
        return $query->row();
    }


                function get_info_perfiles() {
        $sql   = "SELECT * FROM j040t_perfil as a where a.in_activo = '1'";
        $query = $this->db->query($sql);
        return $query;
    }

                    function get_info_perfiles_user_model($co_usuario) {
        $sql   = "SELECT a.*,
(SELECT count(id) from j043t_usuario_perfil where co_usuario = $co_usuario and in_activo = '1' and co_perfil = a.id) as activado FROM j040t_perfil as a where a.in_activo = '1'";

        $query = $this->db->query($sql);
        return $query;
    }

        function eliminar_perfil_model($co_perfil) {
        $this->db->trans_start();
        $data['in_activo'] = '0';
        $this->db->where("id", $co_perfil);
        $this->db->update("j040t_perfil", $data);
        $this->db->trans_complete();
        return "Perfil eliminado";
    }
    
}
?>