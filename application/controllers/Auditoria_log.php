<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auditoria_log extends CI_Controller{

	function __construct(){

		parent::__construct();
		$this->load->model('auditoria_log_model');
	}



}