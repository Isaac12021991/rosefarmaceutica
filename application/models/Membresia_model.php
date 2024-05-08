<?php
class Membresia_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }


                     function get_pagos_membresias()
    {

         $co_usuario = $this->ion_auth->user_id();
         $co_partner = $this->ion_auth->co_partner();
         $tipo_empresa = $this->ion_auth->tipo_empresa();
       

            $sql = "SELECT a.*, b.nb_membresia
            FROM
            x010t_pagos AS a
            left join j081t_membresia as b on b.id = a.co_membresia
            WHERE
            a.co_partner = '$co_partner' and a.in_activo = true";

    $query = $this->db->query($sql);
    return $query;  

        
    }

                     function get_cuenta_banco()
    {

            $sql = "SELECT a.*
            FROM
            x003t_cuenta_banco AS a
            WHERE
            a.in_activo = true";

    $query = $this->db->query($sql);
    return $query;  

        
    }

        function get_forma_pago()
    {

            $sql = "SELECT a.*
            FROM
            j082t_forma_pago AS a
            WHERE
            a.in_activo = true";

    $query = $this->db->query($sql);
    return $query;  

        
    }


                 function get_membresias()
    {

         $co_usuario = $this->ion_auth->user_id();
         $tipo_empresa = $this->ion_auth->tipo_empresa();
       

            $sql = "SELECT a.*
            FROM
            j081t_membresia AS a
            WHERE
            a.nb_tipo_empresa REGEXP '$tipo_empresa'";

    $query = $this->db->query($sql);
    return $query;  

        
    }

                function get_membresias_row($co_membresia)
    {

            $sql = "SELECT a.*
            FROM
            j081t_membresia AS a
            WHERE
            a.id = '$co_membresia'";

            $query = $this->db->query($sql);
            return $query->row();  

        
    }

            function agregar_pago_model($ff_pago, $ca_pago, $ca_pago_bolivar, $ca_mes, $co_membresia, $nombre_archivo, $tx_descripcion, $co_diario, $nb_forma_pago) {

        // Verificar el Partner Empresa
        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        $this->db->trans_start();
        $x010t_pagos['ff_pago']     = $ff_pago;
        $x010t_pagos['ca_pago']    = $ca_pago;
        $x010t_pagos['co_diario']    = $co_diario;
        $x010t_pagos['ca_pago_bolivar'] = $ca_pago_bolivar;
        $x010t_pagos['nb_forma_pago'] = $nb_forma_pago;
        $x010t_pagos['ca_mes']         = $ca_mes;
        $x010t_pagos['co_membresia']      = $co_membresia;
        $x010t_pagos['co_partner']      = $co_partner;
        $x010t_pagos['tx_descripcion']      = $tx_descripcion;
        $x010t_pagos['co_usuario']      = $co_usuario;
        $x010t_pagos['nb_url_adjunto']      = $nombre_archivo;

        $this->db->insert("x010t_pagos", $x010t_pagos);
        $this->db->trans_complete();
        return true;
    }

                function eliminar_pago_model($co_pago) {

        $this->db->trans_start();
        $x010t_pagos['in_activo']      = 0;
        $this->db->where("id", $co_pago);
        $this->db->update("x010t_pagos", $x010t_pagos);
        $this->db->trans_complete();
        return true;
    }








}
?>