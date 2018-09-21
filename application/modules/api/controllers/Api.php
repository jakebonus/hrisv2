<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_api');
		// $this->load->library('form_validation');
	}
	
	public function ajax_login(){
		
		$username = $this->input->post('username');
		// echo $this->input->post('password');
		
		$result = array('status' => 1,'content'=> $username);
			echo json_encode(array($result)); 
			exit();
	}


	public function api_get_info(){
		$result = $this->mdl_api->m_api_emp_info(2520);
		echo json_encode(array($result));
	}
		
}
