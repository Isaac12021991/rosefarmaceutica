<?php
class Reportes_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    // Lista de almacenes
    function get_lista_almacen() {
        $sql = "SELECT * FROM i00t_almacenes where in_activo = 't'";
        $query = $this->db->query($sql);
        return $query;
    }
    // Lista de Movimiento
    function get_tipo_movimiento() {
        $sql = "SELECT b.id, b.nb_movimiento, b.tx_descripcion FROM x00t_inventario_detalle as a
                            join i00t_tipo_movimiento as b on b.id = a.co_tipo_movimiento
                            GROUP BY 1,2,3
                            ORDER BY 2 ASC";
        $query = $this->db->query($sql);
        return $query;
    }
    // Inventario
    function get_inventario_general_model($co_almacen) {
        if ($co_almacen == '-1'):
            $query_almacen = "";
        else:
            $query_almacen = "and a.co_almacen = '$co_almacen'";
        endif;
        $sql = "SELECT
            SUM(a.ca_unidades) as ca_unidades_disponibles,
            b.nb_producto,
            c.nb_almacen,
            c.tx_direccion
            FROM
            i00t_inventario AS a
            JOIN i00t_productos AS b ON b.id = a.co_producto
            JOIN i00t_almacenes as c on c.id = a.co_almacen
            WHERE a.in_activo = true $query_almacen
            GROUP BY b.nb_producto, c.nb_almacen, c.tx_direccion
            ORDER BY 2, 1";
        $query = $this->db->query($sql);
        return $query;
    }
    function get_inventario_detalle_model($co_almacen) {
        if ($co_almacen == '-1'):
            $query_almacen = "";
        else:
            $query_almacen = "and a.co_almacen = '$co_almacen'";
        endif;
        $sql = "SELECT c.nb_producto, a.nu_lote, a.ff_vencimiento, a.ca_unidades, d.nb_almacen
        from i00t_inventario as a
        left join i00t_productos as c on c.id = a.co_producto
        left join i00t_almacenes as d on d.id = a.co_almacen
        where a.in_activo = true $query_almacen
        and a.ca_unidades >0";
        $query = $this->db->query($sql);
        return $query;
    }
    // Detalle de inventario
    function reporte_inventario_movimiento_submain_model($co_almacen, $co_tipo_movimiento, $ff_desde, $ff_hasta, $co_tipo_salida) {
        if ($co_almacen == '-1'):
            $query_almacen = "";
        else:
            $query_almacen = "and b.co_almacen = '$co_almacen'";
        endif;
        if ($co_tipo_movimiento == '-1'):
            $query_movimiento = "";
        else:
            $query_movimiento = "and a.co_tipo_movimiento = '$co_tipo_movimiento'";
        endif;
        if ($ff_desde == '' or $ff_hasta == ''):
            $query_fecha = "";
        else:
            $ff_desde = date_system($ff_desde);
            $ff_hasta = date_system($ff_hasta);
            $query_fecha = "and a.ff_movimiento BETWEEN '$ff_desde' AND '$ff_hasta'";
        endif;
        if ($co_tipo_salida == '-1'):
            $query_tipo_salida = "";
        elseif ($co_tipo_salida == - 2): // Salida
            $query_tipo_salida = "and a.in_suma = '0'";
        elseif ($co_tipo_salida == - 3): // Entrada
            $query_tipo_salida = "and a.in_suma = '1'";
        endif;
        $sql = "SELECT
                    a.id,
                    a.co_inventario,
                    d.nb_producto,
                    b.nu_lote,
                    b.ff_vencimiento,
                    c.nb_movimiento,
                    a.ca_unidades,
                    a.ff_movimiento,
                    a.in_suma,
                    a.tx_observacion,
                    e.nb_almacen
                    FROM
                    x00t_inventario_detalle AS a
                    JOIN i00t_inventario AS b ON b.id = a.co_inventario
                    JOIN i00t_tipo_movimiento AS c ON c.id = a.co_tipo_movimiento
                    JOIN i00t_productos AS d ON d.id = b.co_producto
                    join i00t_almacenes as e on e.id = b.co_almacen
                    where a.in_activo = true $query_almacen $query_movimiento $query_fecha $query_tipo_salida order by a.ff_movimiento desc";
        $query = $this->db->query($sql);
        return $query;
    }


    function get_listado_cuentas_por_cobrar_model($ff_desde, $ff_hasta, $co_tipo_pago, $co_estatus_pago) {
        $ff_desde = date_system($ff_desde);
        $ff_hasta = date_system($ff_hasta);

        if ($co_tipo_pago == '-1'):
            $query_tipo_pago = "";
        else:

             $query_tipo_pago = " and co_tipo_pago = $co_tipo_pago";
        endif;
        $sql="select co_documento,nu_documento,nb_documento,nb_cliente,tipo_pago nb_tipo_pago,vendedor,ff_factura_emision,nu_codigo_orden_compra,ff_vencimiento_orden_compra,co_tipo_pago,ff_vencimiento,tot_documento ca_total_factura,mnt_dolar_fact ca_pago_dolares,mnt_bss_pagado ca_pago_reportado,pago_verificado ca_pago_verificado from a005_documentos   where ff_factura_emision BETWEEN '$ff_desde' AND '$ff_hasta'  and (  mnt_bss_pagado < tot_documento  ) $query_tipo_pago order by co_documento asc";
        $query = $this->db->query($sql);
        return $query;

        /*if ($co_estatus_pago == '-1'):
=======
=======
>>>>>>> db1ebd8719e6188335c6fc596641b06927270cb5
             $query_tipo_pago = " and a.co_tipo_pago = $co_tipo_pago";
        endif;

        if ($co_estatus_pago == '-1'):
<<<<<<< HEAD
>>>>>>> db1ebd8719e6188335c6fc596641b06927270cb5
=======
>>>>>>> db1ebd8719e6188335c6fc596641b06927270cb5
            $query_estatus_pago = "";
        elseif($co_estatus_pago == '0'):
        $query_estatus_pago = " and COALESCE((SELECT SUM(nu_unidades * nu_precio) FROM x00t_documentos_detalle where co_documento = a.id and in_activo = true),0) <> COALESCE((SELECT SUM(ca_pago) FROM x00t_orden_compra_avance_financiero where co_orden_compra = h.id and in_activo = true),0)";
        else:
        $query_estatus_pago = "and COALESCE((SELECT SUM(nu_unidades * nu_precio) FROM x00t_documentos_detalle where co_documento = a.id and in_activo = true),0) = COALESCE((SELECT SUM(ca_pago) FROM x00t_orden_compra_avance_financiero where co_orden_compra = h.id and in_activo = true),0)";
        endif;

        $sql = "SELECT
            a.id as co_documento,
            f.nb_documento,
            a.nu_documento,
            b.nb_cliente,
            C .nb_tipo_pago,
            d.first_name,
            d.last_name,
            a.ff_emision,
            h.nu_codigo_orden_compra,
            h.ff_fecha_vencimiento,
            h.co_tipo_pago,
            a.ff_vencimiento,
            SUM(e.nu_unidades * nu_precio) as ca_total_factura,
            COALESCE((SELECT SUM(bb.nu_precio_dolar) FROM x00t_presupuesto_detalle as aa
                JOIN x00t_lista_precio_detalle AS bb ON bb.co_lista_precio = aa.co_lista_precio and bb.nb_producto = aa.nb_producto
             where aa.co_presupuesto = h.co_presupuesto and aa.in_activo = true and bb.in_activo = true),0) * SUM(e.nu_unidades)  as ca_pago_dolares,
            COALESCE((SELECT SUM(ca_pago) FROM x00t_orden_compra_avance_financiero where co_orden_compra = h.id and in_activo = true),0) as ca_pago_reportado,
            COALESCE((select SUM(a.ca_pago) FROM x00t_orden_compra_avance_financiero as a
            join x00t_cuenta_banco_financiero as b on b.ca_pago = a.ca_pago and b.co_cuenta_banco = a.co_cuenta_banco
            where a.co_orden_compra = h.id and a.in_activo = true),0) as ca_pago_verificado
            FROM
            i00t_documentos AS A
            JOIN i00t_clientes AS b ON b. ID = A .co_cliente
            JOIN i00t_tipo_pago AS C ON C . ID = A .co_tipo_pago
            JOIN lu_users AS d ON d. ID = A .co_vendedor
            join x00t_documentos_detalle as e on e.co_documento = a.id
            join i00t_tipo_documentos as f on f.id = a.co_tipo_documento
            left join i00t_orden_compra as h on h.id = a.co_orden_compra
            where a.ff_emision BETWEEN '$ff_desde' AND '$ff_hasta' and a.co_estatus in (1,2) and a.co_tipo_documento in (1,2) and a.co_tipo_movimiento = 2 and e.in_activo = true $query_tipo_pago $query_estatus_pago
            GROUP BY
            a.id,
            a.nu_documento,
            b.nb_cliente,
            C .nb_tipo_pago,
            d.first_name,
            d.last_name,
            a.ff_emision,
            f.nb_documento,
            a.ff_vencimiento,
            h.nu_codigo_orden_compra,
            h.id
            ORDER BY 8 desc";
        $query = $this->db->query($sql);
<<<<<<< HEAD
<<<<<<< HEAD
        return $query;*/
    }
    // Reporte de documentos

    function get_listado_cuentas_por_cobrar_resumen_model($ff_desde, $ff_hasta, $co_tipo_pago, $co_estatus_pago) {


        $ff_desde = date_system($ff_desde);
        $ff_hasta = date_system($ff_hasta);

      if ($co_tipo_pago == '-1'):
            $query_tipo_pago = "";
        else:
             $query_tipo_pago = " and co_tipo_pago = $co_tipo_pago";
        endif;
        $sql="select count(co_documento)nu_documentos,sum(tot_documento) ca_total_factura,sum(mnt_dolar_fact) ca_monto_total_dolares,sum(mnt_bss_pagado)ca_pago_reportado,sum(pago_verificado) ca_pago_verificado from a005_documentos  where ff_factura_emision BETWEEN '$ff_desde' AND '$ff_hasta' $query_tipo_pago and nb_documento in ('FACTURA','NOTA DE ENTREGA')";
        $query = $this->db->query($sql);
        return $query;
        /*if ($co_estatus_pago == '-1'):
=======
             $query_tipo_pago = " and a.co_tipo_pago = $co_tipo_pago";
        endif;
        if ($co_estatus_pago == '-1'):
>>>>>>> db1ebd8719e6188335c6fc596641b06927270cb5
=======
             $query_tipo_pago = " and a.co_tipo_pago = $co_tipo_pago";
        endif;
        if ($co_estatus_pago == '-1'):
>>>>>>> db1ebd8719e6188335c6fc596641b06927270cb5
            $query_estatus_pago = "";
        elseif($co_estatus_pago == '0'):
        $query_estatus_pago = " and COALESCE((SELECT SUM(nu_unidades * nu_precio) FROM x00t_documentos_detalle where co_documento = a.id and in_activo = true),0) <> COALESCE((SELECT SUM(ca_pago) FROM x00t_orden_compra_avance_financiero where co_orden_compra = h.id and in_activo = true),0)";
        else:
        $query_estatus_pago = "and COALESCE((SELECT SUM(nu_unidades * nu_precio) FROM x00t_documentos_detalle where co_documento = a.id and in_activo = true),0) = COALESCE((SELECT SUM(ca_pago) FROM x00t_orden_compra_avance_financiero where co_orden_compra = h.id and in_activo = true),0)";
        endif;

        $sql = "SELECT
    COUNT(a.id) as nu_documentos,
    SUM (e.nu_unidades * nu_precio) AS ca_total_factura,

    sum(COALESCE (
        (
            SELECT
                SUM (bb.nu_precio_dolar)
            FROM
                x00t_presupuesto_detalle AS aa
            JOIN x00t_lista_precio_detalle AS bb ON bb.co_lista_precio = aa.co_lista_precio
            AND bb.nb_producto = aa.nb_producto
            WHERE
                aa.co_presupuesto = h.co_presupuesto
            AND aa.in_activo = true
            AND bb.in_activo = true
        ),
        0
    )) * SUM (e.nu_unidades) AS ca_pago_dolares,
    sum(COALESCE (
        (
            SELECT
                SUM (ca_pago)
            FROM
                x00t_orden_compra_avance_financiero
            WHERE
                co_orden_compra = h. ID
            AND in_activo = true
        ),
        0
    )) AS ca_pago_reportado,
    sum(COALESCE (
        (
            SELECT
                SUM (A .ca_pago)
            FROM
                x00t_orden_compra_avance_financiero AS A
            JOIN x00t_cuenta_banco_financiero AS b ON b.ca_pago = A .ca_pago
            AND b.co_cuenta_banco = A .co_cuenta_banco
            WHERE
                A .co_orden_compra = h. ID
            AND A .in_activo = true
        ),
        0
    )) AS ca_pago_verificado
FROM
            i00t_documentos AS A
            JOIN i00t_clientes AS b ON b. ID = A .co_cliente
            JOIN i00t_tipo_pago AS C ON C . ID = A .co_tipo_pago
            JOIN lu_users AS d ON d. ID = A .co_vendedor
            join x00t_documentos_detalle as e on e.co_documento = a.id
            join i00t_tipo_documentos as f on f.id = a.co_tipo_documento
            left join i00t_orden_compra as h on h.id = a.co_orden_compra
            where a.ff_emision BETWEEN '$ff_desde' AND '$ff_hasta' and a.co_estatus in (1,2) and a.co_tipo_documento in (1,2) and a.co_tipo_movimiento = 2 and e.in_activo = true $query_tipo_pago $query_estatus_pago";
        $query = $this->db->query($sql);
<<<<<<< HEAD
<<<<<<< HEAD
        return $query;*/


    }
    // Reporte de unidades que estan despachadas
    function get_unidades_salidas($ff_desde, $ff_hasta) {
        $ff_desde = date_system($ff_esde);
        $ff_hasta = date_system($ff_hasta);
        $sql = "SELECT
        SUM(a.ca_unidades) as ca_unidades,
        e.nb_producto
        FROM
        x00t_inventario_detalle AS a
        JOIN i00t_tipo_movimiento AS b ON b.id = a.co_tipo_movimiento
        LEFT JOIN i00t_documentos AS c ON c.nu_documento :: INTEGER = a.nu_documento :: INTEGER
        join i00t_inventario as d on d.id = a.co_inventario
        join i00t_productos as e on e.id = d.co_producto
        WHERE b.in_accion = 0 and
        a.in_activo = true and c.co_estatus = 2 
        and c.ff_emision BETWEEN '$ff_desde' and '$ff_hasta' 
        and a.ff_movimiento BETWEEN '$ff_desde' and '$ff_hasta'
        GROUP BY
        e.nb_producto
        order by 1, 2";
        $query = $this->db->query($sql);
        return $query;
    }
    // Info general factura orden compra
    function get_info_general_factura_orden_compra($co_documento) {
        $sql = "SELECT
    a.id,
    a.nu_documento,
    a.id as co_documento,
    a.co_tipo_pago,
    a.co_estatus,
    a.ff_emision,
    b.nu_codigo_orden_compra,
    b.co_presupuesto,
    e.nu_codigo_presupuesto,
    f.nb_tipo_pago,
    h.nb_documento,
    c.first_name,
    c.last_name,
    COALESCE((SELECT SUM(ca_pago) FROM x00t_orden_compra_avance_financiero where co_orden_compra = b.id and in_activo = true),0) as ca_pago_reportado,
    COALESCE((select SUM(a.ca_pago) FROM x00t_orden_compra_avance_financiero as a
    join x00t_cuenta_banco_financiero as b on b.ca_pago = a.ca_pago and b.co_cuenta_banco = a.co_cuenta_banco
    where a.co_orden_compra = b.id and a.in_activo = true),0) as ca_pago_verificado,
    (SELECT SUM(nu_precio * nu_unidades) FROM x00t_documentos_detalle as b where  b.co_documento = a.id and b.in_activo = true) ca_total_factura
    FROM
    i00t_documentos AS a
    LEFT JOIN i00t_orden_compra AS b ON b.id = a.co_orden_compra
    LEFT JOIN lu_users AS c ON c.id = a.co_vendedor
    join i00t_clientes as d on d.id = a.co_cliente
    left join i00t_presupuesto as e on e.id = b.co_presupuesto
    join i00t_tipo_pago as f on f.id = a.co_tipo_pago
    join i00t_tipo_documentos as h on h.id = a.co_tipo_documento
    where a.id = '$co_documento'";
        $query = $this->db->query($sql);
        return $query->row();
    }
    function get_reporte_detalle_factura_orden_compra_pago($co_documento) {
        $sql = "SELECT c.nu_referencia, c.ca_pago, c.ff_pago, c.co_cuenta_banco, c.co_banco_origen, c.nb_url,
                d.nb_banco, e.nu_cuenta, e.tx_nb_titular, e.tx_id_titular
                FROM i00t_documentos as a
                join i00t_orden_compra as b on b.id = a.co_orden_compra
                join x00t_orden_compra_avance_financiero as c on c.co_orden_compra = b.id
                join i00t_banco as d on d.id = c.co_banco_origen
                join i00t_cuenta_banco as e on e.id = c.co_cuenta_banco
                where a.id = '$co_documento' and c.in_activo = true";
        $query = $this->db->query($sql);
        return $query;
    }
    // MODULO DE ENCUESTA
    // Lista de usuarios
    function get_lista_usuario() {
        $sql = "SELECT b.id, b.first_name, b.last_name FROM x00t_encuesta_llamada as a
                    join lu_users as b on b.id = a.co_usuario_empresa
                    GROUP BY 1,2,3";
        $query = $this->db->query($sql);
        return $query;
    }
    // Lista de estatus
    function get_estatus() {
        $sql = "SELECT b.id, b.nb_estatus FROM x00t_encuesta_llamada as a
                    join i00t_estatus as b on b.id = a.co_estatus
                    GROUP BY 1,2";
        $query = $this->db->query($sql);
        return $query;
    }
    // reporte encuesta
    function reporte_encuesta_detalle_model($ff_desde, $ff_hasta, $co_usuario, $co_estatus) {
        if ($ff_desde == '' or $ff_hasta == ''):
            $query_fecha = "";
        else:
            $ff_desde = date_system($ff_desde);
            $ff_hasta = date_system($ff_hasta);
            $query_fecha = "and a.ff_registro BETWEEN '$ff_desde' AND '$ff_hasta'";
        endif;
        if ($co_usuario == '-1'):
            $query_usuario = "";
        else:
            $query_usuario = "and a.co_usuario_empresa = $co_usuario";
        endif;
        if ($co_estatus == '-1'):
            $query_estatus = "";
        else:
            $query_estatus = "and a.co_estatus = $co_estatus";
        endif;
        $sql = "SELECT
    a.id,
    a.nb_empresa,
    a.nb_persona_contacto,
    a.nu_rif,
    a.nu_telefono_local,
    a.nu_telefono_movil,
a.tx_email,
a.tx_direccion,
a.ff_registro,
b.nb_estatus,
c.first_name,
c.last_name,
a.time_duracion_llamada
FROM
    x00t_encuesta_llamada AS a
JOIN i00t_estatus AS b ON b.id = a.co_estatus
JOIN lu_users AS c ON c.id = a.co_usuario_empresa
where a.in_activo = true $query_fecha $query_usuario $query_estatus
order by a.ff_registro desc";
        $query = $this->db->query($sql);
        return $query;
    }
    // Resumen
    function reporte_encuesta_general_model($ff_desde, $ff_hasta, $co_usuario, $co_estatus) {
        if ($ff_desde == '' or $ff_hasta == ''):
            $query_fecha = "";
        else:
            $ff_desde = date_system($ff_desde);
            $ff_hasta = date_system($ff_hasta);
            $query_fecha = "and a.ff_registro BETWEEN '$ff_desde' AND '$ff_hasta'";
        endif;
        if ($co_usuario == '-1'):
            $query_usuario = "";
        else:
            $query_usuario = "and a.co_usuario_empresa = $co_usuario";
        endif;
        if ($co_estatus == '-1'):
            $query_estatus = "";
        else:
            $query_estatus = "and a.co_estatus = $co_estatus";
        endif;
        $sql = "SELECT
                        SUM(
                        CASE
                        WHEN (a.co_estatus = 5) THEN 1
                        ELSE '0'
                        END) as contactadas,
                        SUM(
                        CASE
                        WHEN (a.co_estatus = 6) THEN 1
                        ELSE '0'
                        END) as no_contactadas_numero_errado,
                        SUM(
                        CASE
                        WHEN (a.co_estatus = 7) THEN 1
                        ELSE '0'
                        END) as no_contactadas_no_atendio,
                        SUM(
                        CASE
                        WHEN (a.co_estatus = 8) THEN 1
                        ELSE '0'
                        END) as pendiente_por_llamar,
                        count(a.id) as nu_llamadas
                        FROM
                        x00t_encuesta_llamada AS a
                        JOIN i00t_estatus AS b ON b.id = a.co_estatus
                        JOIN lu_users AS c ON c.id = a.co_usuario_empresa
                        where a.in_activo = true $query_fecha $query_usuario $query_estatus";
        $query = $this->db->query($sql);
        return $query->row();
    }
    // Reporte por usuario
    function reporte_encuesta_por_usuario_model($ff_desde, $ff_hasta, $co_usuario, $co_estatus) {
        if ($ff_desde == '' or $ff_hasta == ''):
            $query_fecha = "";
        else:
            $ff_desde = date_system($ff_desde);
            $ff_hasta = date_system($ff_hasta);
            $query_fecha = "and a.ff_registro BETWEEN '$ff_desde' AND '$ff_hasta'";
        endif;
        if ($co_usuario == '-1'):
            $query_usuario = "";
        else:
            $query_usuario = "and a.co_usuario_empresa = $co_usuario";
        endif;
        if ($co_estatus == '-1'):
            $query_estatus = "";
        else:
            $query_estatus = "and a.co_estatus = $co_estatus";
        endif;
        $sql = "SELECT
                            c.first_name,
                            c.last_name,
                            SUM(
                            CASE
                            WHEN (a.co_estatus = 5) THEN 1
                            ELSE '00'
                            END) as contactadas,
                            SUM(
                            CASE
                            WHEN (a.co_estatus = 6) THEN 1
                            ELSE '00'
                            END) as no_contactadas_numero_errado,
                            SUM(
                            CASE
                            WHEN (a.co_estatus = 7) THEN 1
                            ELSE '00'
                            END) as no_contactadas_no_atendio,
                            SUM(
                            CASE
                            WHEN (a.co_estatus = 8) THEN 1
                            ELSE '00'
                            END) as pendiente_por_llamar,
                            count(a.id) as nu_llamadas
                            FROM
                            x00t_encuesta_llamada AS A
                            JOIN i00t_estatus AS b ON b. ID = A .co_estatus
                            JOIN lu_users AS c ON c. ID = A .co_usuario_empresa
                            where a.in_activo = true $query_fecha $query_usuario $query_estatus
                            GROUP BY c.first_name, c.last_name order by 7 desc";
        $query = $this->db->query($sql);
        return $query;
    }
    //Reporte de documento inventario
    function reporte_documento_inventario_model($ff_desde, $ff_hasta) {
        if ($ff_desde == '' or $ff_hasta == ''):
            $query_fecha = "";
        else:
            $ff_desde = date_system($ff_desde);
            $ff_hasta = date_system($ff_hasta);
            $query_fecha = "and e.ff_emision BETWEEN '$ff_desde' AND '$ff_hasta'";
        endif;
        $sql = "SELECT
    a.co_inventario,
    a.ca_unidades,
    d.nb_producto,
    b.nu_lote,
    b.ff_vencimiento,
    c.nb_movimiento,
    a.ff_movimiento,
    e.nu_documento,
    e.ff_emision,
    f.nb_documento,
    h.nb_cliente,
    h.nu_rif,
    (select count (aa.id) from x00t_inventario_detalle as aa where aa.nu_documento = a.nu_documento) as nu_productos,
    e.id as co_documento
FROM
    x00t_inventario_detalle AS a
JOIN i00t_inventario AS b ON b.id = a.co_inventario
JOIN i00t_tipo_movimiento AS c ON c.id = a.co_tipo_movimiento
JOIN i00t_productos AS d ON d.id = b.co_producto
JOIN i00t_documentos AS e ON e.nu_documento :: INTEGER = a.nu_documento :: INTEGER
JOIN i00t_tipo_documentos AS f ON f.id = e.co_tipo_documento
JOIN i00t_clientes as h on h.id = e.co_cliente
where a.in_activo = true $query_fecha
GROUP BY
    1,
    2,
    3,
    4,
    5,
    6,
    7,
    8,
    9,
10,
11,
12,
13,
14
ORDER BY
    8 desc, 3 asc";
        $query = $this->db->query($sql);
        return $query;
    }
    // Reporte mensual detalle
    function reporte_documento_general_mensual_model($ff_desde, $ff_hasta) {
        if ($ff_desde == '' or $ff_hasta == ''):
            $query_fecha = "";
        else:
            $ff_desde = date_system($ff_desde);
            $ff_hasta = date_system($ff_hasta);
            $query_fecha = "and a.ff_emision BETWEEN '$ff_desde' AND '$ff_hasta'";
        endif;
        $sql = "  SELECT
                                sum ((SELECT SUM(aa.nu_unidades * aa.nu_precio) FROM x00t_documentos_detalle as aa where aa.co_documento = a.id and aa.in_activo = true)) as monto_documento,
                                sum(CASE
                                WHEN a.co_tipo_pago = 1 THEN (SELECT SUM(aa.nu_unidades * aa.nu_precio) FROM x00t_documentos_detalle as aa where aa.co_documento = a.id and aa.in_activo = true )
                                ELSE 0
                                END) as monto_contra_despacho,
                                sum(CASE
                                WHEN a.co_tipo_pago = 2 THEN (SELECT SUM(aa.nu_unidades * aa.nu_precio) FROM x00t_documentos_detalle as aa where aa.co_documento = a.id and aa.in_activo = true )
                                ELSE 0
                                END) as monto_credito,
                                sum(CASE
                                WHEN a.co_tipo_pago = 3 THEN (SELECT SUM(aa.nu_unidades * aa.nu_precio) FROM x00t_documentos_detalle as aa where aa.co_documento = a.id and aa.in_activo = true )
                                ELSE 0
                                END) as monto_prepagado,
                                SUM(CASE
                                WHEN a.co_tipo_documento = 1 THEN 1
                                ELSE 0
                                END) as ca_factura,
                                SUM(CASE
                                WHEN a.co_tipo_documento = 2 THEN 1
                                ELSE 0
                                END) as ca_nota_entrega
                                FROM
                                i00t_documentos AS A
                                JOIN i00t_tipo_documentos AS b ON b. ID = A .co_tipo_documento
                                JOIN i00t_tipo_movimiento AS C ON C . ID = A .co_tipo_movimiento
                                left join i00t_tipo_pago as d on d.id = a.co_tipo_pago
                                where a.co_estatus in (1, 2) $query_fecha
                                ORDER BY 1 DESC";
        $query = $this->db->query($sql);
        return $query->row();
    }
    // Reporte mensual verificacion de monto
    function reporte_documento_general_mensual_verificacion_monto_model($ff_desde, $ff_hasta) {
        if ($ff_desde == '' or $ff_hasta == ''):
            $query_fecha = "";
        else:
            $ff_desde = date_system($ff_desde);
            $ff_hasta = date_system($ff_hasta);
            $query_fecha = "and a.ff_emision BETWEEN '$ff_desde' AND '$ff_hasta'";
        endif;
        $sql = "  SELECT
                        sum ((SELECT SUM(aa.ca_pago) FROM x00t_orden_compra_avance_financiero as aa where aa.co_orden_compra = f.id and aa.in_activo = true)) as monto_verificado,
                        sum(CASE
                        WHEN a.co_tipo_pago = 1 THEN (SELECT SUM(aa.ca_pago) FROM x00t_orden_compra_avance_financiero as aa where aa.co_orden_compra = f.id and aa.in_activo = true)
                        ELSE 0
                        END) as monto_verificado_contra_despacho,
                        sum(CASE
                        WHEN a.co_tipo_pago = 2 THEN (SELECT SUM(aa.ca_pago) FROM x00t_orden_compra_avance_financiero as aa where aa.co_orden_compra = f.id and aa.in_activo = true)
                        ELSE 0
                        END) as monto_verificado_credito,
                        sum(CASE
                        WHEN a.co_tipo_pago = 3 THEN (SELECT SUM(aa.ca_pago) FROM x00t_orden_compra_avance_financiero as aa where aa.co_orden_compra = f.id and aa.in_activo = true)
                        ELSE 0
                        END) as monto_verificado_prepagado
                        FROM
                        i00t_documentos AS A
                        JOIN i00t_tipo_documentos AS b ON b. ID = A .co_tipo_documento
                        JOIN i00t_tipo_movimiento AS C ON C . ID = A .co_tipo_movimiento
                        left join i00t_tipo_pago as d on d.id = a.co_tipo_pago
                        join lu_users as e on e.id = a.co_vendedor
                        left JOIN i00t_orden_compra as f on f.id = a.co_orden_compra
                        LEFT JOIN i00t_presupuesto as g on g.id = f.co_presupuesto
                        left join x00t_orden_compra_avance_financiero as h on h.co_orden_compra = f.id
                        left join i00t_cuenta_banco as i on i.id = h.co_cuenta_banco
                        left join i00t_banco as j on j.id = h.co_banco_origen
                        join i00t_clientes as k on k.id = a.co_cliente
                        where a.co_estatus in (1, 2) $query_fecha
                        ORDER BY 1 DESC";
        $query = $this->db->query($sql);
        return $query->row();
    }
    // Reporte mensual detalle
    function reporte_documento_mensual_model($ff_desde, $ff_hasta) {
        if ($ff_desde == '' or $ff_hasta == ''):
            $query_fecha = "";
        else:
            $ff_desde = date_system($ff_desde);
            $ff_hasta = date_system($ff_hasta);
            $query_fecha = "and a.ff_emision BETWEEN '$ff_desde' AND '$ff_hasta'";
        endif;
        $sql = "  SELECT
    A . ID AS co_documento,
    a.co_estatus,
    CASE
    WHEN a.co_estatus = 1 THEN 'SIN DESPACHAR'
    WHEN a.co_estatus = 2 THEN 'DESPACHADO'
    ELSE 'N/D'
    END AS estatus_despacho,
    a.ff_emision,
    (SELECT SUM(aa.nu_unidades * aa.nu_precio) FROM x00t_documentos_detalle as aa where aa.co_documento = a.id and aa.in_activo = true) as monto_documento,
    b.nb_documento,
    c.nb_movimiento,
    a.nu_documento,
    d.nb_tipo_pago,
    e.first_name,
    e.last_name,
    f.id as co_orden_compra,
    g.id as co_presupuesto,
h.id as co_orden_compra_avance_financiero,
    h.ff_pago,
    h.ca_pago,
    h.nu_referencia,
    i.tx_nb_titular,
    j.nb_banco as nb_banco_origen,
    k.nb_cliente,
    k.nu_rif
    FROM
    i00t_documentos AS a
    JOIN i00t_tipo_documentos AS b ON b.id = a.co_tipo_documento
    JOIN i00t_tipo_movimiento AS c ON c.id = a.co_tipo_movimiento
    left join i00t_tipo_pago as d on d.id = a.co_tipo_pago
    join lu_users as e on e.id = a.co_vendedor
    left JOIN i00t_orden_compra as f on f.id = a.co_orden_compra
    LEFT JOIN i00t_presupuesto as g on g.id = f.co_presupuesto
    left join x00t_orden_compra_avance_financiero as h on (h.co_orden_compra = f.id and h.in_activo = true)
    left join i00t_cuenta_banco as i on i.id = h.co_cuenta_banco
    left join i00t_banco as j on j.id = h.co_banco_origen
    join i00t_clientes as k on k.id = a.co_cliente
    where a.co_estatus in (1, 2) $query_fecha
ORDER BY 4 DESC";
        $query = $this->db->query($sql);
        return $query;
    }


        function reporte_lista_precio_submain_model($ff_desde, $ff_hasta) {
            if ($ff_desde == '' or $ff_hasta == ''):
            $query_fecha = "";
            else:
            $ff_desde = date_system($ff_desde);
            $ff_hasta = date_system($ff_hasta);
            $query_fecha = "and a.ff_inicio BETWEEN '$ff_desde' AND '$ff_hasta'";
            endif;
            $sql = "SELECT
            a.id,
            a.nu_codigo as codigo,
            to_char(a.ff_inicio, 'DD/MM/YYYY') as ff_inicio,
            to_char(a.ff_fin, 'DD/MM/YYYY') as ff_fin,
            a.nu_tasa_cambio,
            a.nb_lista,
            a.nb_moneda,
            b.first_name,
            (SELECT COUNT(bb.id) from x00t_lista_precio_detalle as bb where bb.in_activo = true and bb.co_lista_precio = a.id) as nu_producto
            FROM
            x00t_lista_precio AS a
            join lu_users as b on b.id = a.co_usuario_empresa
            WHERE a.in_activo = true $query_fecha
            ORDER BY a.id DESC";
        $query = $this->db->query($sql);
        return $query;
    }

          function info_general_lista_precio_stack_model($ff_desde, $ff_hasta) {
            if ($ff_desde == '' or $ff_hasta == ''):
            $query_fecha = "";
            else:
            $ff_desde = date_system($ff_desde);
            $ff_hasta = date_system($ff_hasta);
            $query_fecha = "and a.ff_inicio BETWEEN '$ff_desde' AND '$ff_hasta'";
            endif;

            $sql = "SELECT
            count(a.id) as nu_lista_precio,
            SUM(
            CASE
            WHEN (a.nb_moneda = 'BOLIVARES') THEN 1
            ELSE '0'
            END) as nu_bolivares,
            SUM(
            CASE
            WHEN (a.nb_moneda = 'Dolares') THEN 1
            ELSE '0'
            END) as nu_dolares
            FROM
            x00t_lista_precio AS a
            join lu_users as b on b.id = a.co_usuario_empresa
            WHERE a.in_activo = true $query_fecha";

        $query = $this->db->query($sql);
        return $query->row();
    }


function reporte_movimiento_inventario_2_submain_model($ff_desde, $ff_hasta) {
    if ($ff_desde == '' or $ff_hasta == ''):
        $query_fecha = "";
    else:
        $ff_desde = date_system($ff_desde);
        $ff_hasta = date_system($ff_hasta);
        $query_fecha = "and b.ff_emision BETWEEN '$ff_desde' AND '$ff_hasta'";
    endif;

    $sql = "SELECT
    sum(A .nu_unidades) as nu_unidades,
    a.nu_precio,
    d.nb_producto,
    EXTRACT (YEAR FROM b.ff_emision) as nu_year,
    EXTRACT (MONTH FROM b.ff_emision) as nu_mes
    FROM
        x00t_documentos_detalle AS a
    JOIN i00t_documentos AS b ON b.id = a.co_documento
    join i00t_inventario as c on c.id = a.co_inventario
    join i00t_productos as d on d.id = c.co_producto
    WHERE
        a.in_activo = true
    AND b.in_activo = true
    and b.co_estatus = 2
    and b.co_tipo_movimiento = 2 $query_fecha
    GROUP BY 2,3,4,5
    ORDER BY 3 ASC,4 DESC,5 DESC";
    $query = $this->db->query($sql);
    return $query;
}

function reporte_plan_vs_real_model($mes, $ano, $co_tipo_plan) {
    if ($mes == '' or $ano == ''):
        $mes = date("n");
        $ano = date("Y");
    endif;
    if ($co_tipo_plan == ''):
        $co_tipo_plan = 1;    // original por defecto
    endif; 

    $sql = "SELECT EXTRACT(MONTH from plan.ff_plan) as mes,  EXTRACT(YEAR FROM plan.ff_plan) as ano, plan.co_tipo_plan as co_tipo_plan, plan.nb_producto, coalesce(plan.ca_producto,0) plan,coalesce(v_real.uni_real,0) reall
            FROM (SELECT ff_plan, co_tipo_plan, co_producto,nb_producto,ca_producto FROM x00t_plan_venta
            WHERE EXTRACT(MONTH from ff_plan)=$mes
              AND co_tipo_plan =$co_tipo_plan
            ORDER BY nb_producto asc) AS plan 
            LEFT JOIN (SELECT prd.id,
                   prd.nb_producto, 
                   sum(b.nu_unidades) uni_real 
                FROM i00t_documentos a
                   LEFT JOIN x00t_documentos_detalle b ON (a.id = b.co_documento)
                   LEFT JOIN i00t_inventario inv on (b.co_inventario = inv.id)
                   LEFT JOIN i00t_productos prd on (inv.co_producto = prd.id)
                   WHERE EXTRACT(MONTH from a.ff_emision)=$mes
                     AND EXTRACT(YEAR FROM a.ff_emision)=$ano
                     AND a.in_Activo=TRUE and b.in_Activo=true
                     AND a.co_estatus in (1,2)
                   GROUP BY prd.id,prd.nb_producto
                   ORDER BY prd.nb_producto asc) v_real ON (plan.co_producto = v_real.id AND plan.nb_producto = v_real.nb_producto)";
    $query = $this->db->query($sql);
    return $query;
}
function reporte_facturadomes_model($ff_desde, $ff_hasta) {
    if ($ff_desde == '' or $ff_hasta == ''):
        $query_fecha = "";
    else:
        $ff_desde = date_system($ff_desde);
        $ff_hasta = date_system($ff_hasta);
        $query_fecha = "and c.ff_emision BETWEEN '$ff_desde' AND '$ff_hasta'";
    endif;
    
    $sql = "SELECT 
                TO_CHAR(c.ff_emision,'yyyy') AS Anno,
                TO_CHAR(c.ff_emision,'mm')   AS MES,
                a.nb_producto        AS Principio_Activo,
                SUM(b.nu_unidades)           AS Cantidad_Vendido,
                TO_CHAR(b.nu_precio,'99999999999999999D99') AS Precio_Bs,
                TO_CHAR((b.nu_precio/f.ca_bolivar_dolar),'99999999999999999D99') AS Precio_USD,
                TO_CHAR(f.ca_bolivar_dolar,'99999999999999999D99') AS Tasa
            FROM i00t_productos          AS a,
                 x00t_documentos_detalle AS b,
                 i00t_documentos         AS c,
                 i00t_tipo_documentos    AS d,
                 i00t_estatus AS e,
                 j071t_moneda_paralela   AS f
            WHERE -- a.id = b.id_producto
                  a.nb_producto = b.nb_producto 
            AND c.id = b.co_documento
            AND d.id = c.co_tipo_documento
            AND (c.co_tipo_documento = 1 OR c.co_tipo_documento = 2) -- Documento: 1 = Factura, 2 = Nota de entrega
            AND  e.id = c.co_estatus
            AND (e.id = 1 OR e.id = 2) -- Estatus: 1 = Emitida, 2 = Generada
            AND TO_CHAR(c.ff_emision,'yyyy-mm-dd') = TO_CHAR(f.ff_sistema,'yyyy-mm-dd') $query_fecha
            GROUP BY TO_CHAR(c.ff_emision,'yyyy'), TO_CHAR(c.ff_emision,'mm'), a.nb_producto, b.nu_precio, f.ca_bolivar_dolar 
            ORDER BY TO_CHAR(c.ff_emision,'yyyy') DESC, TO_CHAR(c.ff_emision,'mm') ASC, a.nb_producto DESC, SUM(b.nu_unidades) DESC";
    $query = $this->db->query($sql);
    return $query;
}

    function get_detalle_ejecucion_financiera($condicion,$mes,$vendedor,$co_tipo_documento){
        if ($mes != "" ):
            $meses = substr($mes,0,2);
            $anio = substr($mes,3,4);
            $query_mes = " where date_part ('month', ff_factura_emision) = '$meses' and date_part('year', ff_factura_emision) = '$anio' ";
        else:
            $query_mes = "";
        endif;
        if ($condicion != ""):
            $query_condicion = "and co_tipo_pago = $condicion";
        else:
            $query_condicion = "";
        endif;
        if ($vendedor != ""):
            $query_vendedor = " and vendedor = '$vendedor'";
        else:
            $query_vendedor = "";
        endif;
        if ($co_tipo_documento != ""):
            $co_tipo_documento= strtoupper($co_tipo_documento);
            $query_documento = " and nb_documento = '$co_tipo_documento' ";
        else:
            $query_documento = "";
        endif;    
        $sql="select *  from a005_documentos  $query_mes $query_condicion  $query_documento $query_vendedor";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function get_resumen_ejecucion_financiera($condicion,$mes,$vendedor,$co_tipo_documento){
        if ($mes != "" ):
            $meses = substr($mes,0,2);
            $anio = substr($mes,3,4);
            $query_mes = " where date_part ('month', ff_factura_emision) = '$meses' and date_part('year', ff_factura_emision) = '$anio' ";
        else:
            $query_mes = "";
        endif;
        if ($condicion != ""):
            $query_condicion = "and co_tipo_pago = $condicion";
        else:
            $query_condicion = "";
        endif;
        if ($vendedor != ""):
            $query_vendedor = " and vendedor =  '$vendedor'";
        else:
            $query_vendedor="";
        endif;
        if ($co_tipo_documento != ""):
            $co_tipo_documento= strtoupper($co_tipo_documento);
            $query_documento = " and nb_documento = '$co_tipo_documento' ";
        else:
            $query_documento = "";
        endif;
        $sql="select vendedor,nb_documento, tipo_pago,count(co_documento) cant_doc,sum(tot_documento) tot_fact_bss,sum(mnt_dolar_fact) tot_fact_usd,sum(mnt_bss_pagado) tot_pagado_bss,sum(mnt_dolar_cob) tot_pagado_usd,sum(pago_verificado) tot_verificado_bss from a005_documentos    $query_mes $query_condicion $query_documento $query_vendedor  group by vendedor,nb_documento,tipo_pago order by tot_fact_bss desc ";
        $query=$this->db->query($sql);
        return $query->row();

    }


    function get_lista_pagos() {
        $sql = "SELECT id,upper(nb_tipo_pago)nb_tipo_pago,upper(tx_descripcion) tx_descripcion, in_activo from i00t_tipo_pago as a
                    WHERE a.in_activo = true
                    ORDER BY nb_tipo_pago";
        $query = $this->db->query($sql);
        return $query;
    }
    function get_lista_vendedores(){
        $sql="select id,first_name||' '||last_name vendedor from lu_users where in_vendedor=true order by first_name asc";
        $query=$this->db->query($sql);
        return $query;
    }
    function get_tipo_documento(){
        $this->db->select('id, nb_documento');
        $this->db->from('i00t_tipo_documentos');
        $this->db->order_by('nb_documento', 'ASC');
        $query = $this->db->get();
        return $query;
    }

}
?>