<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuyamart extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_kuyamart');
		$this->load->library('form_validation');
	}
	
	public function index(){
				$data['title'] = 'Online Applicant';
				$data['content'] = 'v_computers';
				$this->load->view('layouts/v_master', $data);
	}
	
	public function ajax_save_computers(){
		
		$kuya_id = $this->input->post('kuya_id');
		
		// echo $kuya_id;
		// die();
		if($kuya_id != ''){
		
			// do update
			
			$data['kuya_group'] = $this->input->post('kuya_group');
			$data['kuya_compname'] = $this->input->post('kuya_compname');
			$data['kuya_compnum'] = $this->input->post('kuya_compnum');
			
			if($this->mdl_kuyamart->m_update_computer($kuya_id,$data)){
				$result = array('status' => 'yes','content'=> 'Success Update');
				echo json_encode($result);

			} else {
				$result = array('status' => 'no','content'=> 'Failed Update.');
				echo json_encode($result);

			}
		}else{
				// do insert
			$data['kuya_group'] = $this->input->post('kuya_group');
			$data['kuya_compname'] = $this->input->post('kuya_compname');
			$data['kuya_compnum'] = $this->input->post('kuya_compnum');
		
		
			if($this->mdl_kuyamart->m_save_computer($data)){
				$result = array('status' => 'yes','content'=> 'Success');
				echo json_encode($result);

			} else {
				$result = array('status' => 'no','content'=> 'Failed.');
				echo json_encode($result);

			}
		}
		
		
	}
	
	public function ajax_delete_computers(){
		
		$kuya_id = $this->input->post('kuya_id');
		$data['kuya_isdeleted'] = 'YES';
		
			
			if($this->mdl_kuyamart->m_delete_computer($kuya_id,$data)){
				$result = array('status' => 'yes','content'=> 'Success Delete');
				echo json_encode($result);

			} else {
				$result = array('status' => 'no','content'=> 'Failed Delete.');
				echo json_encode($result);

			}

	}
	
	public function ajax_get_computers(){
				$computers = $this->mdl_kuyamart->m_get_computers();
				echo json_encode($computers);
				
	}
	
		

	
	
}
