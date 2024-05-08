<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Mercado_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }

    function get_info_producto_mercado_actual($nb_producto) {
        $obj =& get_instance();

    $date_now = date('Y-m-d');

    $date_past = strtotime('-1 day', strtotime($date_now));
    $date_past = date('Y-m-d', $date_past);

        $sql   = "
        SELECT a.nb_producto_sicm, b.ff_emision_date,
(SELECT ca_tasa_cambio FROM x00t_moneda_paralela WHERE DATE_FORMAT(ff_sistema,'%Y-%m-%d') <= b.ff_emision_date LIMIT 1) as ca_dolar,
AVG(a.ca_precio / (SELECT count(id) FROM j074t_guia_movilizacion_precio WHERE nb_producto_sicm = a.nb_producto_sicm)) as promedio,
min(a.ca_precio) as min_precio, max(a.ca_precio) as max_precio,
sum(a.ca_unidades) as ca_unidades
FROM j074t_guia_movilizacion_precio as a, j072t_guia_movilizacion as b
where b.nu_guia = a.nu_guia and a.nb_producto_sicm = '$nb_producto'
GROUP BY 1,2
ORDER BY  b.ff_emision_date DESC, a.nb_producto_sicm ASC LIMIT 1";

        $query = $obj->db->query($sql);
        return $query->row();

    }

        function get_info_producto_mercado_anterior($nb_producto) {
        $obj =& get_instance();

        $date_now = date('Y-m-d');
    $date_past = strtotime('-1 day', strtotime($date_now));
    $date_past = date('Y-m-d', $date_past);

        $sql   = "SELECT a.nb_producto_sicm, b.ff_emision_date,
(SELECT ca_tasa_cambio FROM x00t_moneda_paralela WHERE DATE_FORMAT(ff_sistema,'%Y-%m-%d') <= b.ff_emision_date LIMIT 1) as ca_dolar,
AVG(a.ca_precio / (SELECT ca_tasa_cambio FROM x00t_moneda_paralela WHERE DATE_FORMAT(ff_sistema,'%Y-%m-%d') <= b.ff_emision_date LIMIT 1)) as promedio
FROM j074t_guia_movilizacion_precio as a, j072t_guia_movilizacion as b
where CHAR_LENGTH(ca_precio) > 8 and b.nu_guia = a.nu_guia
AND b.ff_emision_date < $date_past  and a.nb_producto_sicm = '$nb_producto'
GROUP BY 1,2
ORDER BY  b.ff_emision_date DESC, a.nb_producto_sicm ASC LIMIT 1";

        $query = $obj->db->query($sql);
        return $query->row();
        
    }

            function get_info_producto_especificaciones($nb_producto) {
        $obj =& get_instance();


        $sql   = "SELECT * from j003t_productos as a where a.nb_producto_sicm = '$nb_producto' limit 1";

        $query = $obj->db->query($sql);
        return $query->row();
        
    }

    


}
?>