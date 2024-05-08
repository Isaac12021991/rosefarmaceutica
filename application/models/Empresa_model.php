<?php
class Empresa_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->hash_method = $this->config->item('hash_method', 'ion_auth');
    }
    function get_permisos_empresa() {
        $sql   = "SELECT a.*
          FROM lu_groups as a
                where a.in_activo = '1' and not id in(1,5,6,8)";
        $query = $this->db->query($sql);
        return $query->result();
    }
    // Obtener empresa
    function get_empresa_row() {
        $sql   = "SELECT  * FROM i00t_empresas as a";
        $query = $this->db->query($sql);
        return $query->row();
    }


        function get_business_administration()
    {
       
        $sql="SELECT 
                c.id,
                c.nu_rif,
                c.nb_empresa,
                c.tx_email,
                c.nb_representante_legal,
                c.nb_alias,
                DATE_FORMAT(c.ff_fecha_creacion,'%d-%m-%Y') as ff_fecha_creacion, 
                c.co_estatus,
                c.nb_url_foto
                from i00t_empresas as c";
        $query=$this->db->query($sql);
        return $query->result();
    }

            function get_business_edit_administration($co_empresa)
    {
                $sql="SELECT
                a.*
                FROM
                i00t_empresas AS a
                WHERE a.id = '$co_empresa'";
                $query=$this->db->query($sql);
            return $query->row();
    }

      function write_update_business_model($nombre_archivo, $co_empresa, $nb_empresa, $nu_rif, $nb_representante_legal, $tx_email, $nb_alias)
    {

        //Datos Basicos de la empresa
        $this->db->trans_start();
        $data['nb_empresa']=strtoupper($nb_empresa);  
        $data['nu_rif']=strtoupper($nu_rif);  
        $data['nb_alias']=strtoupper($nb_alias);  
        $data['nb_representante_legal']=strtoupper($nb_representante_legal);  
        $data['tx_email']=$tx_email;
        if ($nombre_archivo != ''):
        $data['nb_url_foto']=$nombre_archivo;
        endif; 
        $this->db->where('id', $co_empresa);
        $this->db->update("i00t_empresas",$data);
        $this->db->trans_complete();
        return "Empresa actualizada";

    }   


                         function get_estados()
    {
        $data = array(''=>'Seleccione estado');
        $this->db->select("id, nb_estado");
        $query = $this->db->get('i00t_estados');


        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[$row->id] = $row->nb_estado;
            }
        }
        $query->free_result();
        return $data;
     
    }

    function get_municipios($id_estado)
    {

        $data = array(''=>'Seleccione Municipio');
        $this->db->select("id, nb_municipio");
        $this->db->where('co_estado', $id_estado);
        $query = $this->db->get('i00t_municipios');


        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[$row->id] = $row->nb_municipio;
            }
        }
        $query->free_result();
        return $data;
     
    }


        function get_parroquias($id_municipios)
    {

        $data = array(''=>'Seleccione parroquia');
        $this->db->select("id, nb_parroquia");
        $this->db->where('co_municipio', $id_municipios);
        $query = $this->db->get('i00t_parroquias');


        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[$row->id] = $row->nb_parroquia;
            }
        }
        $query->free_result();
        return $data;
     
    }

            function get_branch_administration($id)
    {
       
        $sql="SELECT a.*, b.co_municipio, c.co_estado, d.nb_estado FROM i00t_sucursales as a
                    JOIN i00t_parroquias  as b on b.id = a.co_parroquia
                    JOIN i00t_municipios  as c on c.id = b.co_municipio
                    JOIN i00t_estados  as d on d.id = c.co_estado
                    where a.co_empresa = '$id' and a.in_activo = 1";
        $query=$this->db->query($sql);
        return $query->result();
    }

            function save_branch_administration($co_empresa, $cod_sicm, $nu_telefono_local, $nb_direccion, $co_parroquias)
    {       

           
        $this->db->trans_start();
        $data['co_empresa']=$co_empresa;
        $data['cod_sicm']=$cod_sicm;
        $data['nu_telefono_local']=$nu_telefono_local;
        $data['nb_direccion']=strtoupper($nb_direccion);
        $data['co_parroquia']=$co_parroquias; 
        $this->db->insert("i00t_sucursales",$data);
        $this->db->trans_complete();

        return "Sucursal Registrada";

    }    

                    function get_edit_branch_administration($id)
    {
       
        $sql="SELECT a.*, b.co_municipio, c.co_estado, d.nb_estado FROM i00t_sucursales as a
                    LEFT JOIN i00t_parroquias  as b on b.id = a.co_parroquia
                    LEFT JOIN i00t_municipios  as c on c.id = b.co_municipio
                    LEFT JOIN i00t_estados  as d on d.id = c.co_estado
                    where a.id = '$id' and a.in_activo = 1";

        $query=$this->db->query($sql);
        return $query->row();
    }


                function update_branch_administration($co_sucursal, $cod_sicm, $nu_telefono_local, $nb_direccion, $co_parroquias)
    {       

           
        $this->db->trans_start();
        $data['cod_sicm']=$cod_sicm;
        $data['nu_telefono_local']=$nu_telefono_local;
        $data['nb_direccion']=strtoupper($nb_direccion);
        $data['co_parroquia']=$co_parroquias;
        $this->db->where("id",$co_sucursal); 
        $this->db->update("i00t_sucursales",$data);
        $this->db->trans_complete();

        return "sucursal actualizada";

    }    


                function delete_branch_administration($co_sucursal)
    {       

           
        $this->db->trans_start();
        $data['in_activo']=false;
        $this->db->where("id",$co_sucursal); 
        $this->db->update("i00t_sucursales",$data);
        $this->db->trans_complete();

        return "Sucursal eliminada";
    }  

              function verificar_sucursales($co_empresa)
    {
       
        $sql="SELECT a.id FROM i00t_empresas AS a
        join i00t_sucursales as b on b.co_empresa = a.id
        where a.in_activo = 1 and b.in_activo = 1 and a.id = $co_empresa";
        $query=$this->db->query($sql);
        return $query;
    }



}
?>