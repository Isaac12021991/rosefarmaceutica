<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Perfil_empresa extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library(array('ion_auth'));
        $this->load->model('perfil_empresa_model');     
        $this->load->helper(array('url','language','url_encrypt_helper', 'cookie'));

        $this->load->library('authjwt'); 
        $this->load->library('encrypt');
        $this->load->library('pagination');
        $this->load->library('publicidad_library');


    }
    public function empresa($token_empresa) {


            $tx_buscar = '';
            $tx_buscar     = trim($this->input->get('tx_buscar'));
            $nb_estado     = trim($this->input->get('nb_estado'));
            $nb_producto     = trim($this->input->get('nb_producto'));
            $ordenar     = trim($this->input->get('ordenar'));


            if($ordenar == ''):
            $ordenar_query = "order by a.id desc, d.username asc";
            elseif($ordenar == 'mayor_precio'):
            $ordenar_query = "order by a.ca_precio desc, d.username asc";
            elseif($ordenar == 'menor_precio'):
            $ordenar_query = "order by a.ca_precio asc, d.username asc";
            endif;

            $info_token =  $this->authjwt->decode_token($token_empresa);

            $data['info_empresa'] = $this->perfil_empresa_model->get_perfil_empresa($info_token->co_partner);
            $data['info_usuario'] = $this->perfil_empresa_model->get_perfil_usuario($info_token->co_usuario);
            $data['listado_publicaciones'] = $this->perfil_empresa_model->get_info_producto_servicios_empresa($info_token->co_usuario, $ordenar_query);
            $data["ordenar"] = $ordenar;
            $data["nb_estado"] = $nb_estado;
            $data["tx_buscar"] = $tx_buscar;
            $data["estados"] = $this->perfil_empresa_model->get_estados($info_token->co_partner);
        

        $this->load->view('layout/header_view');
        $this->load->view('biomercado/left_sidebar_biomercado_view', $data);
        $this->load->view('perfil_empresa/perfil_empresa_view');
        $this->load->view('layout/footer_view');

    }


  

}
