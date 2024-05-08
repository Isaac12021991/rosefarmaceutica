<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mercado extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('mercado_model');

                $this->load->library(array(
            'form_validation',
            'mercado_library'
        ));

        $this->load->library('pagination');


    }
    function getRemoteFile($url, $timeout = 3) {
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents = curl_exec($ch);
        curl_close($ch);
        return ($file_contents) ? $file_contents : FALSE;
}


    public function index() {
        
       if (!$this->ion_auth->logged_in()) {
            redirect('auth/index');
            return;
        }

            $tx_buscar_producto = '';
            $tx_buscar_producto = trim($this->input->post('tx_buscar_producto'));


        $params = array();
        $limit_per_page = 100;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->mercado_model->get_total($tx_buscar_producto);

            if ($total_records > 0) 
        {
            // get current page records
            $data["productos"] = $this->mercado_model->buscar_producto_mercado_model($limit_per_page, $start_index*$limit_per_page, $tx_buscar_producto);
            
            $config['base_url'] = base_url() . 'mercado/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;


            $config['num_links'] = 5;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;

             
            $config['full_tag_open'] = '<div class="d-flex flex-wrap py-2 mr-0">';
            $config['full_tag_close'] = '</div>';
            $config['first_link'] = '<i class="ki ki-bold-double-arrow-back icon-xs"></i>';
            $config['first_tag_open'] = ' <span class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">';
            $config['first_tag_close'] = '</span>';             
            $config['last_link'] = '<i class="ki ki-bold-double-arrow-next icon-xs"></i>';
            $config['last_tag_open'] = '<span class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">';
            $config['last_tag_close'] = '</span>';
            $config['next_link'] = '<i class="ki ki-bold-arrow-next icon-xs"></i>';
            $config['next_tag_open'] = ' <span class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">';
            $config['next_tag_close'] = '</span>';
            $config['prev_link'] = '<i class="ki ki-bold-arrow-back icon-xs"></i>';
            $config['prev_tag_open'] = ' <span class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">';
            $config['prev_tag_close'] = '</span>';
            $config['cur_tag_open'] = '<span class="btn btn-icon btn-sm border-0 btn-hover-primary active mr-2 my-1">';
            $config['cur_tag_close'] = '</span>';
            $config['num_tag_open'] = '<span class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">';
            $config['num_tag_close'] = '</span>';
             
            $this->pagination->initialize($config);

            $data["links"] = $this->pagination->create_links();
        }else{

        $data["productos"] = $this->mercado_model->buscar_producto_mercado_model($limit_per_page, $start_index*$limit_per_page, $tx_buscar_producto);

        }
            
            $data['class_body'] = 'page-full-width';
            $this->load->view('layout/header_view', $data);
            $this->load->view('mercado/left_sidebar_mercado_view');
            $this->load->view('mercado/mercado_view');
            $this->load->view('layout/footer_view');



    }

        public function ver_producto_mercado() {
        
       if (!$this->ion_auth->logged_in()) {
            redirect('auth/index');
            return;
        }

            $nb_producto     = trim($this->input->post('nb_producto'));


            $data['producto_especifico'] = $this->mercado_model->get_producto_especifico($nb_producto);
            
            $data['class_body'] = 'page-full-width';
            $this->load->view('layout/header_view', $data);
            $this->load->view('mercado/mercado_producto_view', $data);
            $this->load->view('layout/footer_view');

    }


    
    

}
