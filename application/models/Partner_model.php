<?php
class Partner_model extends CI_Model {
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




            function get_usuarios_activos() {

        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();


        $sql = "SELECT a.id
        FROM j077t_usuario_partner as a
        where b.in_activo = true and a.co_partner = '$co_partner'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }


        public function get_partner() 
    {
        $co_usuario = $this->ion_auth->user_id();

            $sql = "SELECT a.*, b.co_usuario
        FROM j049t_empresas_farmaceuticas_todas as a
        join j077t_usuario_partner as b on b.co_partner = a.id 
        where a.in_activo = true and b.in_activo = true and b.co_usuario = '$co_usuario'";
        $query = $this->db->query($sql);
        return $query;

    }

            public function get_usuarios_partner($co_partner) 
    {

        $co_usuario = $this->ion_auth->user_id();
            $sql = "SELECT c.*, b.co_usuario, b.in_activo, b.id as co_usuario_partner
        FROM j049t_empresas_farmaceuticas_todas as a
        join j077t_usuario_partner as b on b.co_partner = a.id
        join lu_users as c on c.id = b.co_usuario
        where a.in_activo = true and b.in_activo = true and b.co_partner = '$co_partner' and not c.id = '$co_usuario'";
        $query = $this->db->query($sql);
        return $query;

    }

                public function get_documentos_partner($co_partner) 
    {

        $co_usuario = $this->ion_auth->user_id();
            $sql = "SELECT a.*
        FROM j080t_documentos_partner as a
        where a.in_activo = true and a.co_partner = '$co_partner'";
        $query = $this->db->query($sql);
        return $query;

    }
 

     public function get_total($filtro) 
    {
    
                $sql = "SELECT a.id
FROM j049t_empresas_farmaceuticas_todas as a
where a.in_activo = true $filtro";

        $query = $this->db->query($sql);        

        return $query->num_rows();
    }
        


        function get_estado()
    {

    $sql = "SELECT a.id, a.nb_estado FROM i00t_estados as a";
    $r = $this->db->query($sql);
    return $r;  

    }

        function get_municipio()
    {

    $sql = "SELECT a.id, a.nb_municipio FROM i00t_municipios as a";
    $r = $this->db->query($sql);
    return $r;  


    }

            function get_parroquia()
    {

    $sql = "SELECT a.id, a.nb_parroquia FROM i00t_parroquias as a";
    $r = $this->db->query($sql);
    return $r;  

    }

      function agregar_partner_model($nu_identificacion, $nb_partner, $nb_representante, $nu_telefono, $tx_direccion, $tx_email, $cod_sicm, $nb_tipo_empresa, $nb_estado, $nb_municipio, $nb_parroquia, $tx_latitud, $tx_longitud) {
        $this->db->trans_start();
        $j049t_empresas_farmaceuticas_todas['nu_rif'] = $nu_identificacion;
        $j049t_empresas_farmaceuticas_todas['nb_representante']   = strtoupper($nb_representante);
        $j049t_empresas_farmaceuticas_todas['nb_empresa']         = strtoupper($nb_partner);
        $j049t_empresas_farmaceuticas_todas['nu_telefono_celular']       = $nu_telefono;
        $j049t_empresas_farmaceuticas_todas['tx_direccion']      = $tx_direccion;
        $j049t_empresas_farmaceuticas_todas['tx_email']          = $tx_email;
        $j049t_empresas_farmaceuticas_todas['cod_sicm']        = $cod_sicm;
        $j049t_empresas_farmaceuticas_todas['nb_tipo_empresa']       = $nb_tipo_empresa;
        $j049t_empresas_farmaceuticas_todas['nb_estado']      = $nb_estado;
        $j049t_empresas_farmaceuticas_todas['nb_municipio']      = $nb_municipio;
        $j049t_empresas_farmaceuticas_todas['nb_parroquia']      = $nb_parroquia;
        $j049t_empresas_farmaceuticas_todas['tx_latitud']      = $tx_latitud;
        $j049t_empresas_farmaceuticas_todas['tx_longitud']      = $tx_longitud;
        $j049t_empresas_farmaceuticas_todas['in_validado']      = 0;
        $this->db->insert("j049t_empresas_farmaceuticas_todas", $j049t_empresas_farmaceuticas_todas);
        $this->db->trans_complete();
        return true;
    }


          function actualizar_partner_model($co_partner, $nu_identificacion, $nb_partner, $nb_representante, $nu_telefono, $tx_direccion, $tx_email, $cod_sicm, $nb_estado, $nb_municipio, $nb_parroquia, $tx_latitud, $tx_longitud, $tx_condiciones, $co_moneda, $nb_tipo_pago, $nb_forma_entrega, $nb_forma_pago, $nb_forma_envio) {

        $this->db->trans_start();
         if($this->ion_auth->in_empresa_activado() == 0):
        $j049t_empresas_farmaceuticas_todas['nu_rif'] = $nu_identificacion;
        endif;  

        $j049t_empresas_farmaceuticas_todas['nb_representante']   = strtoupper($nb_representante);
        $j049t_empresas_farmaceuticas_todas['nb_empresa']         = strtoupper($nb_partner);
        $j049t_empresas_farmaceuticas_todas['nu_telefono_celular']       = $nu_telefono;
        $j049t_empresas_farmaceuticas_todas['tx_direccion']      = $tx_direccion;
        $j049t_empresas_farmaceuticas_todas['tx_email']          = $tx_email;
        $j049t_empresas_farmaceuticas_todas['cod_sicm']        = $cod_sicm;
        if($this->ion_auth->in_empresa_activado() == 0):
        $j049t_empresas_farmaceuticas_todas['nb_estado']      = $nb_estado;
        $j049t_empresas_farmaceuticas_todas['nb_municipio']      = $nb_municipio;
        $j049t_empresas_farmaceuticas_todas['nb_parroquia']      = $nb_parroquia;
        endif;
        $j049t_empresas_farmaceuticas_todas['tx_latitud']      = $tx_latitud;
        $j049t_empresas_farmaceuticas_todas['tx_longitud']      = $tx_longitud;
        $this->db->where("id", $co_partner);
        $this->db->update("j049t_empresas_farmaceuticas_todas", $j049t_empresas_farmaceuticas_todas);

        if($this->get_info_partner_terimnos_condiciones($co_partner)):

        $j085t_partner_politicas_terminos_condiciones['co_usuario']      = $this->ion_auth->user_id();
        $j085t_partner_politicas_terminos_condiciones['ff_sistema_time']      = time();
        $j085t_partner_politicas_terminos_condiciones['tx_terminos_condiciones']      = $tx_condiciones;
        $j085t_partner_politicas_terminos_condiciones['co_moneda']      = $co_moneda;
        $j085t_partner_politicas_terminos_condiciones['nb_tipo_pago']      = $nb_tipo_pago;
        $j085t_partner_politicas_terminos_condiciones['nb_forma_entrega']      = $nb_forma_entrega;
        $j085t_partner_politicas_terminos_condiciones['nb_forma_pago']      = $nb_forma_pago;
        $j085t_partner_politicas_terminos_condiciones['nb_forma_envio']      = $nb_forma_envio;
        $this->db->where("co_partner", $co_partner);
        $this->db->update("j085t_partner_politicas_terminos_condiciones", $j085t_partner_politicas_terminos_condiciones);

    else:

        $j085t_partner_politicas_terminos_condiciones['co_usuario']      = $this->ion_auth->user_id();
        $j085t_partner_politicas_terminos_condiciones['ff_sistema_time']      = time();
        $j085t_partner_politicas_terminos_condiciones['co_partner']      = $co_partner;
        $j085t_partner_politicas_terminos_condiciones['tx_terminos_condiciones']      = $tx_condiciones;
        $j085t_partner_politicas_terminos_condiciones['co_moneda']      = $co_moneda;
        $j085t_partner_politicas_terminos_condiciones['nb_tipo_pago']      = $nb_tipo_pago;
        $j085t_partner_politicas_terminos_condiciones['nb_forma_entrega']      = $nb_forma_entrega;
        $j085t_partner_politicas_terminos_condiciones['nb_forma_pago']      = $nb_forma_pago;
        $j085t_partner_politicas_terminos_condiciones['nb_forma_envio']      = $nb_forma_envio;
        $this->db->insert("j085t_partner_politicas_terminos_condiciones", $j085t_partner_politicas_terminos_condiciones);


    endif;


        $this->db->trans_complete();
        return true;
    }

              function eliminar_partner_model($co_partner) {
        $this->db->trans_start();
        $j049t_empresas_farmaceuticas_todas['in_activo'] = 0;
        $this->db->where("id", $co_partner);
        $this->db->update("j049t_empresas_farmaceuticas_todas", $j049t_empresas_farmaceuticas_todas);
        $this->db->trans_complete();
        return true;
    }
    
    

    

         public function get_info_partner($co_partner) 
    {
    
                $sql = "SELECT a.*, b.tx_terminos_condiciones, b.nb_tipo_pago, b.nb_forma_pago, b.nb_forma_entrega, b.nb_forma_envio, b.co_moneda
            FROM j049t_empresas_farmaceuticas_todas as a
            left join j085t_partner_politicas_terminos_condiciones as b on b.co_partner = a.id
            where a.id = $co_partner";
        $query = $this->db->query($sql);        

        return $query->row();
    }
        


            function ejecutar_agregar_usuario_partner_model($email, $first_name, $last_name, $tx_permiso, $password, $co_partner) {

        $new_password = $this->hash_password($password);

        // crear link de referido

        $this->db->trans_start();

        // Verficar usuario

        $info_usuario_existente = $this->get_email_existente_model($email);

        if ($info_usuario_existente->num_rows() > 0):

            foreach ($info_usuario_existente->result() as $row):
                $co_usuario = $row->id;
            endforeach;

        else:

        $data['first_name']   = strtoupper($first_name);
        $data['last_name']    = strtoupper($last_name);
        $data['email']        = $email;
        $data['active']       = '1';
        $data['nu_intentos']  = '0';
        $data['attempt_time'] = '0';
        $data['password']     = $new_password;
        $data['created_on']   = time();
        $data['co_partner']   = $co_partner;
        $this->db->insert("lu_users", $data);
        $co_usuario    = $this->db->insert_id();
        $data5['user_id']  = $co_usuario;
        $data5['group_id'] = 8;
        $this->db->insert("lu_users_groups", $data5);


        endif;
        // Agregar usuario partner usuario

        $j077t_usuario_partner['co_usuario']   = $co_usuario;
        $j077t_usuario_partner['co_partner']    = $co_partner;
        $this->db->insert("j077t_usuario_partner", $j077t_usuario_partner);
        $co_usuario_partner    = $this->db->insert_id();


         if ($tx_permiso):

        foreach ($tx_permiso as $key => $value) {
            $data_principal['co_usuario_partner'] = $co_usuario_partner;
            $data_principal['tx_permiso'] = $value;
            $this->db->insert("j078t_usuario_partner_permiso", $data_principal);
        }

        endif;


        $this->db->trans_complete();
        return "Usuario Agregado";
    }


        function get_email_existente_model($email) {
        $co_usuario = $this->ion_auth->user_id();

        $sql   = "SELECT * FROM lu_users as a
        WHERE a.email = '$email' and not a.id = $co_usuario limit 1";
        $query = $this->db->query($sql);
        return $query;
    }

            function get_permisos_partner($co_usuario_partner) {

        $sql   = "SELECT a.tx_permiso FROM j078t_usuario_partner_permiso as a
        WHERE a.co_usuario_partner = '$co_usuario_partner' and a.in_activo = true";
        $query = $this->db->query($sql);
        return $query;
    }


                function get_info_usuario_partner($co_usuario_partner) {

        $sql   = "SELECT b.* FROM j077t_usuario_partner as a
        left join lu_users as b on b.id = a.co_usuario
        WHERE a.id = '$co_usuario_partner' and a.in_activo = true";

        $query = $this->db->query($sql);
        return $query->row();
    }


    function eliminar_usuario_partner_model($co_usuario_partner)
    
    {
        
        //Datos Basicos de la empresa
        $this->db->trans_start();
        $data['in_activo']=0;
        $this->db->where("id",$co_usuario_partner);
        $this->db->update("j077t_usuario_partner",$data);

        $this->db->trans_complete();
        return true;

    }  


        function ejecutar_usuario_partner_permiso_model($co_usuario_partner, $tx_permiso) {

             $this->db->trans_start();

            $this->db->where('co_usuario_partner', $co_usuario_partner);
            $this->db->delete('j078t_usuario_partner_permiso');

         if ($tx_permiso):

        foreach ($tx_permiso as $key => $value) {
            $data_principal['co_usuario_partner'] = $co_usuario_partner;
            $data_principal['tx_permiso'] = $value;
            $this->db->insert("j078t_usuario_partner_permiso", $data_principal);
        }

        endif;

        $this->db->trans_complete();
        return "Permiso actualizado";
    }

    function cambiar_partner_model($co_partner) {
        $co_usuario = $this->ion_auth->user_id();

        // Buscar informacion del partner

        $info_partner = $this->usuario_library->get_info_partner($co_partner);

        $this->db->trans_start();
        $lu_users['co_partner'] = $co_partner;
        $lu_users['nb_tipo_empresa'] = $info_partner->nb_tipo_empresa;
        $lu_users['nb_empresa'] = $info_partner->nb_empresa;
        $lu_users['nb_estado'] = $info_partner->nb_estado;
        $lu_users['nu_rif'] = $info_partner->nu_rif;
        $lu_users['tx_direccion'] = $info_partner->tx_direccion;
        $this->db->where("id", $co_usuario);
        $this->db->update("lu_users", $lu_users);
        $this->db->trans_complete();
        return true;
    }


     function ejecutar_agregar_documento_model($co_partner, $nb_documento, $tx_descripcion, $nombre_archivo, $ff_vencimiento)
    {


        //Datos Basicos de la empresa
         $co_usuario = $this->ion_auth->user_id();

        $this->db->trans_start();
        $data['co_partner']=$co_partner; 
        $data['nb_documento']=$nb_documento; 
        $data['nb_url']=$nombre_archivo;  
        $data['tx_descripcion']=$tx_descripcion;
        $data['co_usuario']=$co_usuario; 
        $data['ff_vencimiento'] = strtotime($ff_vencimiento);
        $data['ff_sistema_time'] = time();
        $this->db->insert("j080t_documentos_partner",$data);

        $this->db->trans_complete();
        return true;

    }    


                function eliminar_documento_model($co_documentos_partner)
    {
        
        //Datos Basicos de la empresa
        $this->db->trans_start();
        $data['in_activo']=0;
        $this->db->where("id",$co_documentos_partner);
        $this->db->update("j080t_documentos_partner",$data);

        $this->db->trans_complete();
        return true;

    }  

    
        function verificar_documento_cargado($co_partner, $nb_documento) {

        $sql   = "SELECT a.* FROM j080t_documentos_partner as a WHERE a.nb_documento = '$nb_documento' and a.co_partner = '$co_partner' and a.in_activo = true";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0): return true; else: return false; endif;
    }

    
        function get_buscar_municipio($nb_estado)
    {

    $sql = "SELECT a.id, a.nb_municipio FROM i00t_municipios as a
            join i00t_estados as b on b.id = a.co_estado where b.nb_estado = '$nb_estado'";
    $r = $this->db->query($sql);
    return $r;  


    }

            function get_buscar_parroquia($nb_municipio)
    {

    $sql = "SELECT a.id, a.nb_parroquia FROM i00t_parroquias as a
            join i00t_municipios as b on b.id = a.co_municipio where b.nb_municipio = '$nb_municipio'";
    $r = $this->db->query($sql);
    return $r;  


    }


        function obtener_posicionamiento_model($co_partner, $tx_latitud, $tx_longitud)
    {

        $this->db->trans_start();
        $j049t_empresas_farmaceuticas_todas['tx_latitud']=$tx_latitud;
        $j049t_empresas_farmaceuticas_todas['tx_longitud']=$tx_longitud;
        $this->db->where("id",$co_partner);
        $this->db->update("j049t_empresas_farmaceuticas_todas",$j049t_empresas_farmaceuticas_todas);
        $this->db->trans_complete();
        return true;

    }  



         function get_monedas() {
        $sql   = "SELECT a.*
        FROM
        i00t_monedas AS a
        where a.in_activo = true order by a.nb_moneda";
        $query = $this->db->query($sql);
        return $query;
    }

            function get_tipo_pago() {
        $sql   = "SELECT a.*
        FROM
        j011t_tipo_pago AS a
        where a.in_activo = true order by a.id";
        $query = $this->db->query($sql);
        return $query;
    }

                    function get_forma_entrega() {
        $sql   = "SELECT a.*
        FROM
        j012t_forma_entrega AS a
        where a.in_activo = true order by a.id";
        $query = $this->db->query($sql);
        return $query;
    }

                        function get_forma_envio() {
        $sql   = "SELECT a.*
        FROM
        j014t_forma_envio AS a
        where a.in_activo = true order by a.id";
        $query = $this->db->query($sql);
        return $query;
    }


           function get_forma_pago() {
        $sql   = "SELECT a.*
        FROM
        j082t_forma_pago AS a
        where a.in_activo = true order by a.id";
        $query = $this->db->query($sql);
        return $query;
    }

         public function get_info_partner_terimnos_condiciones($co_partner) 
    {
    
                $sql = "SELECT a.*
            FROM j085t_partner_politicas_terminos_condiciones as a
            where a.co_partner = $co_partner and a.in_activo = true";
        $query = $this->db->query($sql);        
        if($query->num_rows() > 0): return true; else: return false; endif;
        
    }
    
}
?>