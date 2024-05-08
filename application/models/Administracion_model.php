<?php
class Administracion_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    // Ordenes de compra emitidas nuevas
    function get_orden_orden_compra_nueva_model($estatus, $movimiento) {
        $co_usuario = $this->ion_auth->user_id();
        if ($estatus != '-1'):
            $query = "and a.co_estatus = '$estatus' and a.co_tipo_movimiento = '$movimiento'";
        else:
            $query = "";
        endif;
        $sql   = "SELECT
        a.id,
        a.nb_empresa,
        a.nu_rif,
        a.nb_persona_contacto,
        a.tx_direccion,
        a.ff_fecha_elaboracion,
        a.nu_codigo_orden_compra,
        a.co_estatus,
        b.nb_estatus,
        c.first_name,
        c.last_name,
        a.ff_fecha_elaboracion,
        a.ff_fecha_vencimiento,
        a.in_aprobado,
        d.id as co_presupuesto,
        d.nu_codigo_presupuesto,
        e.nb_tipo_pago,
        f.id as co_documento,
        (select count(id) from i00t_clientes as aa where aa.nu_rif = a.nu_rif) as in_cliente,
        (select sum(nu_precio * nu_unidades) from x00t_orden_compra_detalle as aa where aa.co_orden_compra = a.id and aa.in_activo = true) as total_precio_orden_compra,
        (select sum(ca_pago) from x00t_orden_compra_avance_financiero as aa where aa.co_orden_compra = a.id and aa.in_activo = true) as total_precio_pagado,
        h.nb_movimiento,
        a.co_tipo_movimiento
        FROM
        i00t_orden_compra AS a
        join i00t_estatus as b on b.id = a.co_estatus
        join lu_users as c on c.id = a.co_usuario_empresa
        left join i00t_presupuesto as d on d.id = a.co_presupuesto
        left join i00t_tipo_pago as e on e.id = a.co_tipo_pago
        left join i00t_documentos as f on f.co_orden_compra = a.id
        left join i00t_tipo_movimiento as h on h.id = a.co_tipo_movimiento
        WHERE a.in_activo = true and f.id is null $query and a.in_visto = false order by a.ff_fecha_elaboracion asc";
        $query = $this->db->query($sql);
        return $query;
    }
    function aprobar_orden_compra_model($co_orden_compra) {
        $this->db->trans_start();

        $info_orden_compra = $this->orden_compra_library->get_info_orden_compra($co_orden_compra);

        $data_presupuesto['co_estatus'] = '15';
        $this->db->where("id", $info_orden_compra->co_presupuesto);
        $this->db->update("i00t_presupuesto", $data_presupuesto);


        $data['in_aprobado'] = true;
        $this->db->where("id", $co_orden_compra);
        $this->db->update("i00t_orden_compra", $data);
        $this->db->trans_complete();
        return 'Aprobado';
    }
    // rehazar orden compra
    function rechazar_orden_compra_model($co_orden_compra) {
        $this->db->trans_start();
        $data['in_aprobado'] = false;
        $data['in_visto'] = true; 
        $data['co_estatus']  = '27';
        $this->db->where("id", $co_orden_compra);
        $this->db->update("i00t_orden_compra", $data);
        $this->db->trans_complete();
        return 'Rechazado';
    }
    // Lista de presupuesto
    function get_orden_emitidas_cerradas_model() {
        $co_usuario = $this->ion_auth->user_id();
        $sql        = "SELECT
    a.id,
    a.nb_empresa,
    a.nb_persona_contacto,
    a.co_estatus,
    a.nu_codigo_presupuesto,
    a.tx_email,
    a.tx_direccion,
    a.nu_telefono,
    b.nb_estatus,
    a.ff_fecha_elaboracion,
    a.ff_fecha_vencimiento,
    d.nb_moneda,
    d.nb_acronimo,
    a.nu_rif,
    c.first_name,
    c.last_name,
    (
        SELECT
            COUNT(aa.id)
        FROM
            x00t_presupuesto_detalle AS aa
        WHERE
            aa.co_presupuesto = a.id
        AND aa.in_activo = true
    ) AS nu_productos,
    (
        SELECT
            COUNT(cc.id)
        FROM
            x00t_presupuesto_email AS cc
        WHERE
            cc.co_presupuesto = a.id
        AND cc.in_activo = true
    ) AS presupuesto_enviado,
    (
        SELECT
            COUNT(dd.id)
        FROM
            x00t_presupuesto_archivo AS dd
        WHERE
            dd.co_presupuesto = a.id
        AND dd.in_activo = true
    ) AS nu_archivos_cargados,
    (
        SELECT
            SUM(
                bb.nu_precio * bb.nu_unidades
            )
        FROM
            x00t_presupuesto_detalle AS bb
        WHERE
            bb.co_presupuesto = a.id
        AND bb.in_activo = true
    ) AS nu_precio
FROM
    i00t_presupuesto AS a
JOIN i00t_estatus AS b ON b.id = a.co_estatus
join lu_users as c on c.id = a.co_usuario_empresa
left join i00t_monedas as d on d.id = a.co_moneda
WHERE
    a.in_activo = true
ORDER BY
    10 DESC";
        $query      = $this->db->query($sql);
        return $query;
    }
    // Ver pagos
    function ver_pago_orden_compra_model($co_orden_compra) {
        $sql   = "SELECT
    a.id AS a,
    b.ca_pago,
    b.nb_url,
    b.ff_pago,
    b.nu_referencia,
    d.nb_banco as banco_origen,
    e.nb_banco as banco_destino,
    c.nu_cuenta,
    c.tx_nb_titular
FROM
    i00t_orden_compra AS a
JOIN x00t_orden_compra_avance_financiero AS b ON b.co_orden_compra = a.id
JOIN i00t_cuenta_banco AS c ON c.id = b.co_cuenta_banco
JOIN i00t_banco AS d ON d.id = b.co_banco_origen
JOIN i00t_banco AS e ON e.id = c.co_banco
where a.id = '$co_orden_compra' and b.in_activo = true";
        $query = $this->db->query($sql);
        return $query;
    }
    // Info orden compra
    function get_info_orden_compra($co_orden_compra) {
        $sql   = "SELECT
    a.id AS a,
    a.co_estatus
FROM
    i00t_orden_compra AS a
where a.id = '$co_orden_compra' and a.in_activo = true";
        $query = $this->db->query($sql);
        return $query->row();
    }
    // Ordenes de compra emitidas
    function get_orden_orden_compra_en_espera_model() {
        $co_usuario = $this->ion_auth->user_id();
        $sql        = "SELECT
        a.id,
        a.nb_empresa,
        a.nu_rif,
        a.nb_persona_contacto,
        a.tx_direccion,
        a.ff_fecha_elaboracion,
        a.nu_codigo_orden_compra,
        a.co_estatus,
        b.nb_estatus,
        c.first_name,
        c.last_name,
        a.ff_fecha_elaboracion,
        a.ff_fecha_vencimiento,
        a.in_aprobado,
        d.id as co_presupuesto,
        d.nu_codigo_presupuesto,
        e.nb_tipo_pago,
        a.co_tipo_movimiento,
        (select count(id) from i00t_clientes as aa where aa.nu_rif = a.nu_rif) as in_cliente,
        (select sum(nu_precio * nu_unidades) from x00t_orden_compra_detalle as aa where aa.co_orden_compra = a.id and aa.in_activo = true) as total_precio_orden_compra,
        (select sum(ca_pago) from x00t_orden_compra_avance_financiero as aa where aa.co_orden_compra = a.id and aa.in_activo = true) as total_precio_pagado
        FROM
        i00t_orden_compra AS a
        join i00t_estatus as b on b.id = a.co_estatus
        join lu_users as c on c.id = a.co_usuario_empresa
        join i00t_presupuesto as d on d.id = a.co_presupuesto
        join i00t_tipo_pago as e on e.id = a.co_tipo_pago
        WHERE a.in_activo = true and a.co_estatus = '27' order by a.ff_fecha_elaboracion asc";
        $query      = $this->db->query($sql);
        return $query;
    }
    // Todas las ordenes de compra
    function get_orden_orden_compra_todo_model() {
        $co_usuario = $this->ion_auth->user_id();
        $sql        = "SELECT
        a.id,
        a.nb_empresa,
        a.nu_rif,
        a.nb_persona_contacto,
        a.tx_direccion,
        a.ff_fecha_elaboracion,
        a.nu_codigo_orden_compra,
        a.co_estatus,
        b.nb_estatus,
        c.first_name,
        c.last_name,
        a.ff_fecha_elaboracion,
        a.ff_fecha_vencimiento,
        a.in_aprobado,
        d.id as co_presupuesto,
        d.nu_codigo_presupuesto,
        e.nb_tipo_pago,
        f.id as co_documento,
        a.co_tipo_movimiento,
        (select count(id) from i00t_clientes as aa where aa.nu_rif = a.nu_rif) as in_cliente,
        (select sum(nu_precio * nu_unidades) from x00t_orden_compra_detalle as aa where aa.co_orden_compra = a.id and aa.in_activo = true) as total_precio_orden_compra,
        (select sum(ca_pago) from x00t_orden_compra_avance_financiero as aa where aa.co_orden_compra = a.id and aa.in_activo = true) as total_precio_pagado
        FROM
        i00t_orden_compra AS a
        join i00t_estatus as b on b.id = a.co_estatus
        join lu_users as c on c.id = a.co_usuario_empresa
        join i00t_presupuesto as d on d.id = a.co_presupuesto
        join i00t_tipo_pago as e on e.id = a.co_tipo_pago
        left join i00t_documentos as f on f.co_orden_compra = a.id
        WHERE a.in_activo = true  order by a.ff_fecha_elaboracion desc";
        $query      = $this->db->query($sql);
        return $query;
    }
        function aprobar_orden_compra_rechazada_model($co_orden_compra) {
        $this->db->trans_start();

        $info_orden_compra = $this->orden_compra_library->get_info_orden_compra($co_orden_compra);

        $data_presupuesto['co_estatus'] = '15';
        $this->db->where("id", $info_orden_compra->co_presupuesto);
        $this->db->update("i00t_presupuesto", $data_presupuesto);



        $data['in_aprobado'] = true;
        $data['co_estatus'] = '22';
        $this->db->where("id", $co_orden_compra);
        $this->db->update("i00t_orden_compra", $data);
        $this->db->trans_complete();
        return 'Aprobado';
    }

    
       // Ordenes de compra emitidas
    function get_orden_orden_compra_model($estatus, $movimiento) {
        $co_usuario = $this->ion_auth->user_id();

        if ($estatus != '-1'):
            $query = "and a.co_estatus = '$estatus' and a.co_tipo_movimiento = '$movimiento'";
        else:
            $query = "";
        endif;
        $sql   = "SELECT
        a.id,
        a.nb_empresa,
        a.nu_rif,
        a.nb_persona_contacto,
        a.tx_direccion,
        a.ff_fecha_elaboracion,
        a.nu_codigo_orden_compra,
        a.co_estatus,
        b.nb_estatus,
        c.first_name,
        c.last_name,
        a.ff_fecha_elaboracion,
        a.ff_fecha_vencimiento,
        a.in_aprobado,
        d.id as co_presupuesto,
        d.nu_codigo_presupuesto,
        e.nb_tipo_pago,
        f.id as co_documento,
        a.co_tipo_movimiento,
        (select count(id) from i00t_clientes as aa where aa.nu_rif = a.nu_rif) as in_cliente,
        (select sum(nu_precio * nu_unidades) from x00t_orden_compra_detalle as aa where aa.co_orden_compra = a.id and aa.in_activo = true) as total_precio_orden_compra,
        (select sum(ca_pago) from x00t_orden_compra_avance_financiero as aa where aa.co_orden_compra = a.id and aa.in_activo = true) as total_precio_pagado
        FROM
        i00t_orden_compra AS a
        join i00t_estatus as b on b.id = a.co_estatus
        join lu_users as c on c.id = a.co_usuario_empresa
        left join i00t_presupuesto as d on d.id = a.co_presupuesto
        left join i00t_tipo_pago as e on e.id = a.co_tipo_pago
        left join i00t_documentos as f on f.co_orden_compra = a.id
        WHERE a.in_activo = true $query order by a.ff_fecha_elaboracion asc";
        $query = $this->db->query($sql);
        return $query;
    }


    // Cerrar orden de compra
       function cerrar_orden_compra_model($co_orden_compra) {
        $this->db->trans_start();
        $data['co_estatus'] = '24';
        $this->db->where("id", $co_orden_compra);
        $this->db->update("i00t_orden_compra", $data);
        $this->db->trans_complete();
        return 'Cerrada';
    }
    // Obtener un registro
        function get_orden_compra_row_model($co_orden_compra) {

        $sql   = "SELECT
        a.id,
        a.nb_empresa,
        a.nu_rif,
        a.nb_persona_contacto,
        a.tx_direccion,
        a.ff_fecha_elaboracion,
        a.nu_codigo_orden_compra,
        a.co_estatus,
        b.nb_estatus,
        c.first_name,
        c.last_name,
        a.ff_fecha_elaboracion,
        a.ff_fecha_vencimiento,
        a.in_aprobado,
        d.id as co_presupuesto,
        d.nu_codigo_presupuesto,
        e.nb_tipo_pago,
        f.id as co_documento,
        a.co_tipo_movimiento,
        (select count(id) from i00t_clientes as aa where aa.nu_rif = a.nu_rif) as in_cliente,
        (select sum(nu_precio * nu_unidades) from x00t_orden_compra_detalle as aa where aa.co_orden_compra = a.id and aa.in_activo = true) as total_precio_orden_compra,
        (select sum(ca_pago) from x00t_orden_compra_avance_financiero as aa where aa.co_orden_compra = a.id and aa.in_activo = true) as total_precio_pagado
        FROM
        i00t_orden_compra AS a
        join i00t_estatus as b on b.id = a.co_estatus
        join lu_users as c on c.id = a.co_usuario_empresa
        left join i00t_presupuesto as d on d.id = a.co_presupuesto
        left join i00t_tipo_pago as e on e.id = a.co_tipo_pago
        left join i00t_documentos as f on f.co_orden_compra = a.id
        WHERE a.id = $co_orden_compra";
        $query = $this->db->query($sql);
        return $query->row();
    }

            function get_detalle_orden_compra_model($co_orden_compra) {

        $sql = "SELECT a.*
        FROM
        x00t_orden_compra_detalle AS a
        WHERE a.co_orden_compra = $co_orden_compra and a.in_activo = true";
        $query = $this->db->query($sql);
        return $query;
    }


}
?>