<?php

class Mercado_model extends CI_Model {


    function __construct()
    {
                parent::__construct();
                
        
    }

       function get_current_page_records($limit, $start, $tx_busqueda)
    {

  
                $sql="SELECT
                    a.nb_producto_sicm
                FROM
                    j074t_guia_movilizacion_precio AS a,
                    j072t_guia_movilizacion AS b
                WHERE
                b.nu_guia = a.nu_guia
                AND a.nb_producto_sicm != 'NO EXISTE'
                GROUP BY
                    1
                ORDER BY
                    a.nb_producto_sicm ASC limit $start, $limit";
        $query=$this->db->query($sql);
        return $query;
    }


    // Producto especifico

               function get_producto_especifico($nb_producto)
    {

  
                $sql="SELECT
                a.nb_producto_sicm
            FROM
                j074t_guia_movilizacion_precio AS a,
                j072t_guia_movilizacion AS b
                WHERE b.nu_guia = a.nu_guia
                AND a.nb_producto_sicm = '$nb_producto'
                GROUP BY
                    1
                ORDER BY
                    1 DESC
                LIMIT 25";
        $query=$this->db->query($sql);
        return $query;
    }

    

               function buscar_producto_mercado_model($limit, $start, $tx_busqueda)
    {

        $filtro = '';
        $filtro_producto = '';
        if ($this->ion_auth->tipo_empresa() == 'DROGUERIA'):
            $filtro = "and b.nb_tipo_empresa_origen REGEXP 'Drogueria' and b.nb_tipo_empresa_destino REGEXP 'Farmacia'";
        endif;

        if ($this->ion_auth->tipo_empresa() == 'CASA DE REPRESENTACION'):
            $filtro = "and b.nb_tipo_empresa_origen REGEXP 'CASA DE REPRESENTACION' and b.nb_tipo_empresa_destino REGEXP 'Drogueria'";
        endif;

        if ($tx_busqueda != ''): 

            $filtro_producto = " AND a.nb_producto_sicm REGEXP '$tx_busqueda'"; 

        endif;

            $sql="SELECT
                a.nb_producto_sicm
            FROM
                j074t_guia_movilizacion_precio AS a,
                j072t_guia_movilizacion AS b
            WHERE
            b.nu_guia = a.nu_guia
            $filtro_producto $filtro
            GROUP BY
                1
            ORDER BY
                1 DESC
            limit $start, $limit";

        $query=$this->db->query($sql);
        return $query;
    }


                 function get_total($tx_busqueda)
    {

             $filtro = '';
             $filtro_producto = '';
        if ($this->ion_auth->tipo_empresa() == 'DROGUERIA'):
            $filtro = "and b.nb_tipo_empresa_origen REGEXP 'Drogueria' and b.nb_tipo_empresa_destino REGEXP 'Farmacia'";
        endif;

        if ($this->ion_auth->tipo_empresa() == 'CASA DE REPRESENTACION'):
            $filtro = "and b.nb_tipo_empresa_origen REGEXP 'CASA DE REPRESENTACION' and b.nb_tipo_empresa_destino REGEXP 'Drogueria'";
        endif;

        if ($tx_busqueda != ''): 

            $filtro_producto = " AND a.nb_producto_sicm REGEXP '$tx_busqueda'"; 

        endif;


                            $sql="SELECT
            a.nu_guia
            FROM
                j074t_guia_movilizacion_precio AS a,
                j072t_guia_movilizacion AS b
            WHERE
            b.nu_guia = a.nu_guia
            $filtro_producto $filtro
            GROUP BY
                1";
        $query=$this->db->query($sql);
        return $query->num_rows();
    }




    


    



}
?>