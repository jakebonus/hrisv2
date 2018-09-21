<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_statistics');
		
	}
    
    public function index(){
        if(isset($this->session->userdata('a_id'))){
            
        }else{
            $this->load->module('login/index');
        }
    }
}