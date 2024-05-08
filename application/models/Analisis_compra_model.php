<?php
class Analisis_compra_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function ceiling($number, $significance = 1) {
        return (is_numeric($number) && is_numeric($significance)) ? (ceil($number / $significance) * $significance) : false;
    }


        function get_monedas() {
        $sql = "SELECT * from i00t_monedas as a where a.in_activo = true";
        $query = $this->db->query($sql);
        return $query;
    }

                           function get_estados() {

        $sql   = "SELECT a.*
        FROM
        i00t_estados AS a
        where a.in_activo = true order by a.nb_estado";
        $query = $this->db->query($sql);
        return $query;
    }



    // informacion del compra principal


    function get_info_analisis_compra($co_analisis_compra) {
        $sql = "SELECT * from j086t_analisis_compra as a where a.id = '$co_analisis_compra'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    // Detalle compra principal

        function get_info_analisis_compra_detalle($co_analisis_compra) {
        $sql = "SELECT * from x015t_analisis_compra_linea as a where a.co_analisis_compra = '$co_analisis_compra' and a.in_activo = true";
        $query = $this->db->query($sql);
        return $query;
    }


      
    function get_lista_compra() {
        $sql = "SELECT * from i00t_clientes as a where a.in_compra = 1 order by nb_cliente";
        $query = $this->db->query($sql);
        return $query;
    }

        function get_lista_analisis_compra() {
        $sql = "SELECT a.*, c.nb_moneda, c.nb_acronimo, c.nu_redondeo 
        from j086t_analisis_compra as a
        left join i00t_monedas as c on c.id = a.co_moneda
        where a.in_activo = true";
        $query = $this->db->query($sql);
        return $query;
    }


    

        function importar_masivo_excel($sheetData, $co_usuario, $nb_lista, $co_moneda, $nb_empresa, $tx_descripcion, $nb_estado) {

        $co_partner = $this->ion_auth->co_partner();

        $this->db->trans_start();
        $j086t_analisis_compra['co_usuario']     = $co_usuario;
        $j086t_analisis_compra['co_partner']    = $co_partner;     
        $j086t_analisis_compra['nb_lista'] = $nb_lista;

        $j086t_analisis_compra['nb_empresa'] = $nb_empresa;
        $j086t_analisis_compra['tx_descripcion'] = $tx_descripcion;
        $j086t_analisis_compra['nb_estado'] = $nb_estado;

        $j086t_analisis_compra['nb_modo_comparacion']    = 'LISTA';     
        $j086t_analisis_compra['co_moneda'] = $co_moneda;
        $this->db->insert("j086t_analisis_compra", $j086t_analisis_compra);
        $co_analisis_compra = $this->db->insert_id();


foreach ($sheetData as $key) {

        $nb_producto = trim($key['A']);
        $tx_descripcion = trim($key['B']);
        $ca_precio = trim($key['C']);
        $ca_unidad_manejo = trim($key['D']);
        $ff_vence = trim($key['E']);
        $tx_fabricante = trim($key['F']);

        $x015t_analisis_compra_linea['co_analisis_compra']      = $co_analisis_compra;
        $x015t_analisis_compra_linea['nb_producto']     = strtoupper($nb_producto);
        $x015t_analisis_compra_linea['tx_descripcion']    = $tx_descripcion;
        $x015t_analisis_compra_linea['ca_precio']         = $ca_precio;
        $x015t_analisis_compra_linea['ca_unidad_manejo']      = $ca_unidad_manejo;
        $x015t_analisis_compra_linea['vence']      = $ff_vence;
        $x015t_analisis_compra_linea['tx_fabricante']      = $tx_fabricante;
        $this->db->insert("x015t_analisis_compra_linea", $x015t_analisis_compra_linea);
        
        }

       $this->db->trans_complete();

        return true;
    }



        function editar_ejecutar_analisis_compra_model($co_analisis_compra, $nb_analisis_compra, $co_contacto, $co_moneda) {
        // Comienza transaccion
        $this->db->trans_start();

        $contador = 0;

        $data_save['nb_lista'] = $nb_analisis_compra;
        $data_save['co_moneda'] = $co_moneda;
        $data_save['co_contacto'] = $co_contacto;
        $this->db->where("id", $co_analisis_compra);
        $this->db->update("j086t_analisis_compra", $data_save);
        $this->db->trans_complete();
        return true;
        // Termina transaccion
        
    }

        function eliminar_lista_analisis_compra_model($co_analisis_lista_compra) {
        $this->db->trans_start();
        $data_listado['in_activo'] = false;
        $this->db->where("id", $co_analisis_lista_compra);
        $this->db->update("j086t_analisis_compra", $data_listado);
        $this->db->trans_complete();
        return 'Eliminado';
    }


        function eliminar_lista_analisis_compra_linea_model($co_analisis_lista_compra_linea) {
        $this->db->trans_start();
        $data_listado['in_activo'] = false;
        $this->db->where("id", $co_analisis_lista_compra_linea);
        $this->db->update("x015t_analisis_compra_linea", $data_listado);
        $this->db->trans_complete();
        return 'Eliminado';
    }


    

            function comparar_precios_model($pivote) {
        $this->db->trans_start(); 

    $sql = "SELECT
            a.id,
            b.nb_empresa,
            b.nb_lista,
            a.nb_producto, 
            a.ca_unidad_manejo, 
            a.ca_precio,
            d.nb_moneda
            FROM x015t_analisis_compra_linea as a
            join j086t_analisis_compra as b on b.id = a.co_analisis_compra
            join i00t_monedas as d on d.id = b.co_moneda
            where a.co_analisis_compra in ($pivote) and a.in_activo = true
            GROUP BY
            a.id,
            b.nb_empresa,
            b.nb_lista,
            a.nb_producto, 
            a.ca_unidad_manejo, 
            a.ca_precio,
            d.nb_moneda
            ORDER BY a.nb_producto, a.ca_precio ASC";

    $r = $this->db->query($sql);

    $this->db->trans_complete();
    
    return $r;
    }


    function comparar_precios_dos_model($pivote) {
        $this->db->trans_start(); 

    $sql = "SELECT      
            a.id,
            a.nb_empresa
            FROM j086t_analisis_compra as a
            where a.id in($pivote)
            GROUP BY
            a.id,
            a.nb_empresa
            ORDER BY a.nb_empresa ASC";

    $r = $this->db->query($sql);

    $this->db->trans_complete();
    
    return $r;
    }


   function produtos_comparar($pivote) {
        $this->db->trans_start(); 

    $sql = "SELECT
            a.nb_producto
            FROM x015t_analisis_compra_linea as a
            where a.co_analisis_compra in ($pivote) and a.in_activo = true
            GROUP BY
            a.nb_producto
            ORDER BY a.nb_producto ASC";

    $r = $this->db->query($sql);

    $this->db->trans_complete();
    
    return $r;
    }


        function get_info_analisis_compra_detalle_row($co_analisis_compra_linea) {
        $sql = "SELECT * from x015t_analisis_compra_linea as a where a.id = '$co_analisis_compra_linea' and a.in_activo = true";
        $query = $this->db->query($sql);
        return $query->row();
    }


        function editar_ejecutar_producto_listado_model($co_analisis_compra_detalle, $nb_producto, $ca_precio, $tx_descripcion, $vence, $ca_unidad_manejo, $tx_fabricante) {
        // Comienza transaccion
        $this->db->trans_start();

        $contador = 0;

        $data_save['nb_producto'] = $nb_producto;
        $data_save['ca_precio'] = $ca_precio;
        $data_save['tx_descripcion'] = $tx_descripcion;
        $data_save['vence'] = $vence;
        $data_save['ca_unidad_manejo'] = $ca_unidad_manejo;
        $data_save['tx_fabricante'] = $tx_fabricante;
        $this->db->where("id", $co_analisis_compra_detalle);
        $this->db->update("x015t_analisis_compra_linea", $data_save);
        $this->db->trans_complete();
        return true;
        // Termina transaccion
        
    }

            function agregar_ejecutar_producto_listado_model($co_analisis_compra, $nb_producto, $ca_precio, $tx_descripcion, $vence, $ca_unidad_manejo, $tx_fabricante) {
        // Comienza transaccion
        $this->db->trans_start();
        $data_save['nb_producto'] = $nb_producto;
        $data_save['ca_precio'] = $ca_precio;
        $data_save['tx_descripcion'] = $tx_descripcion;
        $data_save['vence'] = $vence;
        $data_save['ca_unidad_manejo'] = $ca_unidad_manejo;
        $data_save['tx_fabricante'] = $tx_fabricante;
        $data_save['co_analisis_compra'] = $co_analisis_compra;
        $this->db->insert("x015t_analisis_compra_linea", $data_save);
        $this->db->trans_complete();
        return true;
        // Termina transaccion
        
    }





}
?>