<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('mdl_manager');
    }  

	public function permanent(){
			$data['status'] = 'Permanent';
			if($data['request'] = $this->mdl_manager->m_get_employees($data['status'])){
				$data['title'] = $data['status'];
				$data['content'] = 'admin/v_mainrecords';
				$this->load->view('layouts/v_main',$data);
			}else{
				$data['request'] = 0;
				$data['title'] = $data['status'];
				$data['content'] = 'admin/v_mainrecords';
				$this->load->view('layouts/v_main',$data);
				
			}	
	}
	public function casual(){
			$data['status'] = 'Casual';
			if($data['request'] = $this->mdl_manager->m_get_employees($data['status'])){
				$data['title'] = $data['status'];
				$data['content'] = 'admin/v_mainrecords';
				$this->load->view('layouts/v_main',$data);
			}else{
				$data['request'] = 0;
				$data['title'] = $data['status'];
				$data['content'] = 'admin/v_mainrecords';
				$this->load->view('layouts/v_main',$data);
			}	
	}
	
	public function project_based(){
			$data['status'] = 'Project Based';
			if($data['request'] = $this->mdl_manager->m_get_employees($data['status'])){
				$data['title'] = $data['status'];
				$data['content'] = 'admin/v_mainrecords';
				$this->load->view('layouts/v_main',$data);
			}else{
				$data['request'] = 0;
				$data['title'] = $data['status'];
				$data['content'] = 'admin/v_mainrecords';
				$this->load->view('layouts/v_main',$data);
			}	
	}
	
	public function add_new_employee(){
		$data['title'] = 'Add new employee';
		$data['content'] = 'admin/v_addemployee';
		$this->load->view('layouts/v_main',$data);
	}
	
}
