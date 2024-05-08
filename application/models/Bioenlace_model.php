<?php
class Bioenlace_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }


    function get_sincronizar_sicm_bioenlace_principal() {

        $co_partner = $this->ion_auth->co_partner();

        $sql   = "SELECT a.*
        FROM
        x004t_bioenlace_empresas AS a
        where a.in_activo = true and a.co_partner = '$co_partner'";
        $query = $this->db->query($sql);

        if($query->num_rows() > 0): return true; else: return false; endif;

    }
    // Listado de Productos
    function get_inventario_principal() {

        $co_partner = $this->ion_auth->co_partner();

        $sql   = "SELECT a.*
        FROM
        j075t_inventario_principal AS a
        left join j049t_empresas_farmaceuticas_todas as b on b.id = a.co_partner
        where a.in_activo = true and b.id = '$co_partner' and a.tx_fuente = 'USUARIO' order by a.nb_producto";
        $query = $this->db->query($sql);
        return $query;
    }


        function get_partner() {

        $co_partner = $this->ion_auth->co_partner();

        $sql   = "SELECT a.*
        FROM
        j049t_empresas_farmaceuticas_todas AS a
        where a.in_activo = true and a.id = '$co_partner' order by 1";
        $query = $this->db->query($sql);
        return $query;
    }

    

            function get_principio_activos()
    {

    $sql = "SELECT a.id, LEFT(a.nb_principio_activo, 40) as nb_principio_activo FROM j004t_principio_activos as a";
    $r = $this->db->query($sql);

    return $r;  

    }

        function get_concentracion()
    {

    $sql = "SELECT a.id, LEFT(a.nb_concentracion, 40) as nb_concentracion FROM j005t_concentracion as a";

    $r = $this->db->query($sql);

    return $r;  


    }


        function get_forma_farmaceuticas()
    {

     $sql = "SELECT a.id, LEFT(a.nb_forma_farmaceutica, 40) as nb_forma_farmaceutica FROM j006t_forma_farmaceutica as a";
    $r = $this->db->query($sql);

    return $r;  


    }


        function get_uso_terapeutico()
    {


    $sql = "SELECT a.id, LEFT(a.nb_uso_terapeutico, 40) as nb_uso_terapeutico FROM j008t_uso_terapeutico as a";
    $r = $this->db->query($sql);

    return $r;  


    }

        function get_laboratorio()
    {

        $sql = "SELECT a.id, LEFT(a.nb_laboratorio, 40) as nb_laboratorio FROM j010t_laboratorio as a";
    $r = $this->db->query($sql);

    return $r;  


    }



        function create_producto_servicio_model($nombre_archivo, $nb_producto, $tx_descripcion, $nb_tipo_busqueda, $ff_vence, $ca_precio, $nb_tags, $co_producto, $nb_principio_activo, $nb_forma_farmaceutica, $nb_concentracion, $nb_uso_terapeutico, $nb_fabricante)
    {
        $co_partner = $this->ion_auth->co_partner();
        $time_hoy = time();

        if ($ff_vence == ''):
        $ff_vence = time();
        $tiempo_diferencia = strtotime ('+1 months' , strtotime($time_hoy));
        $ff_vence = $ff_vence + $tiempo_diferencia;

        else:

        $ff_vence = strtotime($ff_vence);

        endif;

        //Datos Basicos de la empresa
        $this->db->trans_start();
        $data['tx_fuente']='USUARIO'; 
        $data['nb_producto_sicm']=''; 
        $data['nb_producto']=$nb_producto;  
        $data['tx_descripcion']=$tx_descripcion;  
        $data['nb_tipo_busqueda']=$nb_tipo_busqueda;  
        $data['ff_vence']=$ff_vence;  
        $data['ca_precio']=$ca_precio;
        $data['nb_tags']=$nb_tags;
        $data['co_partner']=$co_partner;
        $data['co_producto']=$co_producto;
        $data['ff_sistema_time'] = time();

        $data['nb_principio_activo']=$nb_principio_activo;
        $data['nb_forma_farmaceutica']=$nb_forma_farmaceutica;
        $data['nb_concentracion']=$nb_concentracion;
        $data['nb_uso_terapeutico']=$nb_uso_terapeutico;
        $data['nb_fabricante']=$nb_fabricante;
        $data['nb_url_foto']=$nombre_archivo;
        $data['in_sincronizar']=0;
        $this->db->insert("j075t_inventario_principal",$data);

        $this->db->trans_complete();
        return true;

    }    

    //

        function get_info_inventario_principal($co_inventario_principal)
    {

        $sql = "SELECT * FROM j075t_inventario_principal as a where a.id = $co_inventario_principal";


    $r = $this->db->query($sql);

    return $r->row();  

    }


            function update_producto_servicio_model($nombre_archivo, $nb_producto, $tx_descripcion, $nb_tipo_busqueda, $ff_vence, $ca_precio, $nb_tags, $co_producto, $nb_principio_activo, $nb_forma_farmaceutica, $nb_concentracion, $nb_uso_terapeutico, $nb_fabricante, $co_inventario_principal)
    {

        $co_partner = $this->ion_auth->co_partner();
        $time_hoy = time();

        if ($ff_vence == ''):
        $ff_vence = time();
        $tiempo_diferencia = strtotime ('+1 months' , strtotime($time_hoy));
        $ff_vence = $ff_vence + $tiempo_diferencia;

        else:

        $ff_vence = strtotime($ff_vence);

        endif;

        //Datos Basicos de la empresa
        $this->db->trans_start();
        $data['tx_fuente']='USUARIO'; 
        $data['nb_producto_sicm']=''; 
        $data['nb_producto']=$nb_producto;  
        $data['tx_descripcion']=$tx_descripcion;  
        $data['nb_tipo_busqueda']=$nb_tipo_busqueda;  
        $data['ff_vence']=$ff_vence;  
        $data['ca_precio']=$ca_precio;
        $data['nb_tags']=$nb_tags;
        $data['co_partner']=$co_partner;
        $data['co_producto']=$co_producto;
        $data['ff_sistema_time'] = time();

        $data['nb_principio_activo']=$nb_principio_activo;
        $data['nb_forma_farmaceutica']=$nb_forma_farmaceutica;
        $data['nb_concentracion']=$nb_concentracion;
        $data['nb_uso_terapeutico']=$nb_uso_terapeutico;
        $data['nb_fabricante']=$nb_fabricante;
        $data['nb_url_foto']=$nombre_archivo;
        $data['in_sincronizar']=0;
        $this->db->where("id",$co_inventario_principal);
        $this->db->update("j075t_inventario_principal",$data);

        $this->db->trans_complete();
        return true;

    }  

                function eliminar_inventario_principal_model($co_inventario_principal)
    {
        
        //Datos Basicos de la empresa
        $this->db->trans_start();
        $data['in_activo']=0;
        $this->db->where("id",$co_inventario_principal);
        $this->db->update("j075t_inventario_principal",$data);

        $this->db->trans_complete();
        return true;

    }  


    function sicncronizar_sicm_bioenlace_model($in_sicncronizar_sicm) {



        $co_partner = $this->ion_auth->co_partner();
        $info_partner = $this->usuario_library->get_info_partner($co_partner);
        $todos_partner = $this->usuario_library->get_info_partner_rif($info_partner->nu_rif);

        if($in_sicncronizar_sicm == '1'):

        if($todos_partner):

            $this->db->trans_start();
            foreach ($todos_partner->result() as $row):

            $data['co_partner'] = $row->id;
            $data['nu_rif'] = $row->nu_rif;
            $this->db->insert("x004t_bioenlace_empresas",$data);

            endforeach;

            $this->db->trans_complete();
        endif;

    else:

     $this->db->trans_start();
        $this->db->where("nu_rif",$info_partner->nu_rif);
        $this->db->delete("x004t_bioenlace_empresas");

         $this->db->trans_complete();


    endif;

        return true;
    }



}
?>