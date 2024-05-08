<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Despacho_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }
    //Inventrio GENERAL


    function get_despachos_id_documento($co_documento) {
        $obj =& get_instance();
        $fecha_actual = date("Y-m-d");
        $sql   = "SELECT
                    a.id,
                    a.ff_sistema,
                    a.nu_codigo,
                    a.co_orden_compra,
                    b.nu_rif,
                    b.nu_sicm,
                    a.nu_documento,
                    a.ff_emision,
                    a.co_cliente,
                    a.co_estatus,
                    b.nb_cliente,
                    b.tx_direccion,
                    b.nu_sicm,
                    c.nb_estatus,
                    d.nb_tipo_pago,
                    a.co_tipo_movimiento,
                    a.co_tipo_documento,
                    e.nb_documento,
                    f.nb_movimiento,
                    a.co_sucursal,
                    a.tx_observaciones,
                    a.ca_bulto,
                    a.ff_time,
                    h.first_name,
                    h.last_name,
                    h.email,
                    a.co_vendedor,
                    a.co_tipo_pago,
                    a.co_usuario_empresa,
                    a.ff_sistema,
                    a.ff_vencimiento,
                    a.nu_control,
                    a.co_documento,
                    a.co_moneda,
                    j.nb_acronimo,
                    j.nb_moneda,
                    (SELECT
                    max(nu_documento) as nu_documento_consecutivo
                    FROM
                    i00t_documentos
                    WHERE
                    co_estatus IN ('1','2','4')
                    AND co_tipo_movimiento = a.co_tipo_movimiento
                    AND co_tipo_documento = a.co_tipo_documento) as nu_factura_futura,
                    (SELECT count(aa.id) FROM x00t_documentos_detalle as aa where aa.co_documento = a.id and aa.in_activo = true) as nu_productos,
                    (SELECT sum(bb.nu_precio) FROM x00t_documentos_detalle as bb where bb.co_documento = a.id and bb.in_activo = true) as nu_precio,
                    (SELECT count(cc.id) FROM x00t_documento_archivo as cc where cc.co_documento = a.id and cc.in_activo = true) as nu_archivos_cargados,
                    (SELECT sum(bb.nu_precio * bb.nu_unidades) FROM x00t_documentos_detalle as bb where bb.co_documento = a.id and bb.in_activo = true) as nu_precio_factura,
                    (SELECT sum(bb.ca_pago) FROM x00t_orden_compra_avance_financiero as bb where bb.co_orden_compra = a.co_orden_compra and bb.in_activo = true) as ca_pago_monto,
                    (SELECT count(aa.id) FROM x00t_documentos_impresion as aa where aa.co_documento = a.id and aa.in_activo = true) as nu_impresion,
                    (SELECT sum(bb.nu_precio * bb.nu_unidades) FROM x00t_orden_compra_detalle as bb where bb.co_orden_compra = a.co_orden_compra and bb.in_activo = true) as nu_precio_orden_compra
                    FROM
                    i00t_documentos AS a
                    left JOIN i00t_clientes AS b ON b.id = a.co_cliente
                    left JOIN i00t_estatus AS c ON c.id = a.co_estatus
                    LEFT JOIN i00t_tipo_pago as d on d.id = a.co_tipo_pago
                    left join i00t_tipo_documentos as e on e.id = a.co_tipo_documento
                    left join i00t_tipo_movimiento as f on f.id = a.co_tipo_movimiento
                    left join lu_users as h on h.id = a.co_vendedor
                    left join i00t_documentos as i on i.id = a.co_documento
                    left join i00t_monedas as j on j.id = a.co_moneda
                    where a.id = '$co_documento' limit 1";
        $query = $obj->db->query($sql);
        return $query;
    }
}
?>