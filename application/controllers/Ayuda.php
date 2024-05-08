<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ayuda extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Ayuda_model');
         $this->load->library('encrypt');

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


    public function ayuda_rose_general() {
        
       if (!$this->ion_auth->logged_in()) {
            redirect('auth/index');
            return;
        }

            $this->load->view('layout/header_view');
            $this->load->view('ayuda/inicio_view');
            $this->load->view('layout/footer_view');

    }


        public function ayuda_rose_vender() {
        
       if (!$this->ion_auth->logged_in()) {
            redirect('auth/index');
            return;
        }

            $this->load->view('layout/header_view');
            $this->load->view('ayuda/ayuda_rose_vender_view');
            $this->load->view('layout/footer_view');

    }

            public function ayuda_rose_compra() {
        
       if (!$this->ion_auth->logged_in()) {
            redirect('auth/index');
            return;
        }

            $this->load->view('layout/header_view');
            $this->load->view('ayuda/ayuda_rose_compra_view');
            $this->load->view('layout/footer_view');

    }
              public function ayuda_rose_anuncios() {
        
       if (!$this->ion_auth->logged_in()) {
            redirect('auth/index');
            return;
        }

            $this->load->view('layout/header_view');
            $this->load->view('ayuda/ayuda_rose_anuncios_view');
            $this->load->view('layout/footer_view');

    }


              public function ayuda_perfiles_usuarios() {
        
       if (!$this->ion_auth->logged_in()) {
            redirect('auth/index');
            return;
        }

            $this->load->view('layout/header_view');
            $this->load->view('ayuda/ayuda_perfiles_usuarios_view');
            $this->load->view('layout/footer_view');

    }


                  public function ayuda_indice_precio() {
        
       if (!$this->ion_auth->logged_in()) {
            redirect('auth/index');
            return;
        }

            $this->load->view('layout/header_view');
            $this->load->view('ayuda/ayuda_indice_precio_view');
            $this->load->view('layout/footer_view');

    }

    



}
