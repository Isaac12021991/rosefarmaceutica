<?php
class Pagos_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }


     function get_tipo_pago()
    {
        $sql = "SELECT a.*
        FROM
        i00t_tipo_pago AS a
        where a.in_activo = true";
        $query = $this->db->query($sql);
        return $query;
    }


        function get_contactos_model($suplidor) {

        if($suplidor == 'cliente'):
        $query_busqueda = "and a.in_cliente = '1'";
        else:
        $query_busqueda = "and a.in_proveedor = '1'";
        endif;

        $sql   = "SELECT * FROM i00t_clientes as a where a.in_activo = true $query_busqueda order by a.id desc";
        $query = $this->db->query($sql);
        return $query;
    }

    
    // Lista de Bancos
    function get_bancos()
    {
        $sql = "SELECT id, nb_banco FROM i00t_banco as a";
        $query = $this->db->query($sql);
        return $query;
    }
    // Lista de Bancos
    function get_cuentas()
    {
        $sql = "SELECT a.id, a.nb_diario, a.nu_cuenta, b.nb_banco, a.tx_nb_titular, substr(a.nu_cuenta,1,4) as primer_numero_cuenta,
    substr(a.nu_cuenta,15) as ultimo_numero_cuenta FROM i00t_cuenta_banco as a
                    join i00t_banco as b on b.id = a.co_banco
                 where a.in_activo = true and a.tx_tipo_diario != 'General'";
        $query = $this->db->query($sql);
        return $query;
    }

        function get_divisas()
    {
        $sql = "SELECT id, nb_moneda FROM i00t_monedas as a WHERE in_activo = true order by 1";
        $query = $this->db->query($sql);
        return $query;
    }

                // Lista de Bancos
    function get_lista_forma_pago()
    {
        $sql = "SELECT id, nb_forma_pago FROM i00t_forma_pago as a WHERE in_activo = true";
        $query = $this->db->query($sql);
        return $query;
    }



        function get_facturas_model() {

         $user_id = $this->ion_auth->user_id();
             
        if ($this->usuario_library->permiso_evento('FACTURACION', 'VER REGISTROS PROPIOS')): 

            $documentos_propios = "and a.co_vendedor = '$user_id'"; 
            
        else:

            $documentos_propios = "";

        endif;

        $sql = "SELECT a.*, b.nb_documento, c.nb_cliente
                    FROM 
                    i00t_documentos as a 
                    join i00t_tipo_documentos as b on b.id = a.co_tipo_documento
                    join i00t_clientes as c on c.id = a.co_cliente
                    WHERE a.in_activo = true and a.co_estatus in (1,2,4) and a.co_tipo_movimiento = 2 $documentos_propios";
        $query = $this->db->query($sql);
        return $query;
    }

        function get_orden_compra_model()
    {   

        $user_id = $this->ion_auth->user_id();

        if ($this->usuario_library->permiso_evento('ORDEN DE COMPRA ENTRADA', 'VER REGISTROS PROPIOS')): 

            $documentos_propios = "and a.co_usuario_empresa = '$user_id'"; 
            
        else:

            $documentos_propios = "";

        endif;
         
        $sql = "SELECT id, nb_empresa, nu_codigo_orden_compra FROM i00t_orden_compra as a where a.in_activo = true and a.co_estatus in (22,24) $documentos_propios";
        $query = $this->db->query($sql);
        return $query;
    }



    function get_pagos_model($suplidor) {

        if($suplidor == 'cliente'):

            $query = "and a.tx_movimiento_pago = 'entrada'";

        else:

            $query = "and a.tx_movimiento_pago = 'salida'";

        endif;

        $sql   = "SELECT a.id, a.nu_referencia, a.ff_pago, a.ff_sistema, b.nb_banco, c.nu_cuenta, a.nb_url, a.ca_pago, d.nb_banco as nb_banco_destino, a.tx_descripcion, a.tx_movimiento_pago,
              (select count(id) FROM i00t_pago_verificado where in_activo = true and co_orden_compra_avance_financiero = a.id) as in_verificado
              FROM x00t_orden_compra_avance_financiero as a
              left join i00t_banco as b on b.id = a.co_banco_origen
              left join i00t_cuenta_banco as c on c.id = a.co_cuenta_banco
              left join i00t_banco as d on d.id = c.co_banco
              left join i00t_documentos as e on e.id = a.co_documento
              left join i00t_clientes as f on f.id = a.co_contacto
            where a.in_activo = true $query";
        $query = $this->db->query($sql);
        return $query;
    }
    // Informacion de un almacen
   


        function verificar_orden_compra_avance_financiero_model($co_cuenta, $nu_referencia)
    {
        $sql = "SELECT * FROM x00t_orden_compra_avance_financiero AS a
                where a.co_cuenta_banco = '$co_cuenta' and a.nu_referencia = '$nu_referencia' and a.in_activo = true limit 1";
        $query = $this->db->query($sql);
        return $query;
    }

        function agregar_avance_financiero_ejecutar_model($ca_pago, $ff_pago, $nu_referencia, $co_banco, $co_cuenta, $tipo_divisa, $ca_tasa_cambio, $ca_cantidad_divisa, $co_forma_pago, $co_contacto, $tx_movimiento_pago)
    {       

        $user_id = $this->ion_auth->user_id();
        $this->db->trans_start();
        // Verificar si ha registrado un pago
        $sql = "SELECT * from x00t_cuenta_banco_financiero as a
        where a.in_activo = true and a.nu_referencia = '$nu_referencia' and a.co_cuenta_banco = '$co_cuenta' and a.ca_pago = '$ca_pago' and (SELECT count(id) FROM i00t_pago_verificado where in_activo = true and co_cuenta_banco_financiero = a.id) = 0";
        $query = $this->db->query($sql);
        
        $data_listado['ca_pago'] = $ca_pago;
        $data_listado['nu_referencia'] = $nu_referencia;


        $data_listado['co_contacto'] = $co_contacto;
        $data_listado['tx_movimiento_pago'] = $tx_movimiento_pago;

        if ($tipo_divisa == 1):
        $data_listado['co_banco_origen'] = $co_banco;
        endif; 
        
        $data_listado['co_cuenta_banco'] = $co_cuenta;
        $data_listado['co_tipo_divisa'] = $tipo_divisa;
        $data_listado['ca_tasa_cambio'] = $ca_tasa_cambio;

        $data_listado['ca_cantidad_divisa'] = $ca_cantidad_divisa;
        $data_listado['co_forma_pago'] = $co_forma_pago;

        $data_listado['co_usuario'] = $user_id;    
        $data_listado['ff_pago'] = date_system($ff_pago);
        $data_listado['ff_sistema'] = date("Y-m-d H:i:s");
        $this->db->insert("x00t_orden_compra_avance_financiero", $data_listado);
        $new_co_orden_compra_avance_financiero = $this->db->insert_id();

        // Movimiento contable




        if ($query->num_rows() > 0) :
        
        $info_cuenta_banco = $query->row();

        $data_pago['co_cuenta_banco_financiero'] = $info_cuenta_banco->id;
        $data_pago['co_orden_compra_avance_financiero'] = $new_co_orden_compra_avance_financiero;
        $data_pago['ff_sistema'] = date('Y-m-d');
        $this->db->insert("i00t_pago_verificado", $data_pago);
        $data_1['in_aprobado'] = true;
        $this->db->where("id", $co_orden_compra);
        $this->db->update("i00t_orden_compra", $data_1);
        endif;


        $this->db->trans_complete();
        return $new_co_orden_compra_avance_financiero;
    }



 function agregar_pago_model($co_pago, $co_documento)
    {       

        $this->db->trans_start();
        $data_pago['co_documento'] = $co_documento;
        $this->db->where("id", $co_pago);
        $this->db->update("x00t_orden_compra_avance_financiero", $data_pago);
        $this->db->trans_complete();
        return true;
    }



}
?>