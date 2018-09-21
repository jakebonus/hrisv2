<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salarygrade extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_salarygrade');
		$this->load->library('form_validation');
	}

	public function index()
	{
		
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
			$data['title'] = 'Salary Grade';
			$data['content'] = 'salarygrade/v_salarygrade';
			$this->load->view('layouts/v_master', $data);
			
		}else{
			redirect('user');
		}
	}

	public function ajax_get_sg(){
		
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			$result = $this->mdl_salarygrade->m_get_records();
			echo json_encode($result);
		}else{
			redirect('user');
		}
	}
	
	public function ajax_save_sg(){
		
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			if($this->input->post('ss_id') != ''){
				//Update
				$ss_id = $this->input->post('ss_id');
				$sg['ss_grade'] = $this->input->post('ss_grade');
				$sg['ss_step'] = $this->input->post('ss_step');
				$sg['ss_monthly'] = str_replace(',','',str_replace('₱ ','',$this->input->post('ss_monthly')));
				$sg['ss_effectivitydate'] = $this->input->post('ss_effectivitydate');
				$sg['ss_updatedby'] = $this->session->userdata('a_empno');
				$sg['ss_updateddate'] = date('Y-m-d');
				
				if($this->mdl_salarygrade->m_update_sg($ss_id,$sg)){
					$result = array('status' => 'yes','content'=> 'Salary Grade Successfully Updated!');
					echo json_encode($result);
					exit();
				}else{
					$result = array('status' => 'no','content'=> 'Salary Grade Failed Updated!');
					echo json_encode($result);
					exit();
				}
				
			}else{
				// Add New
				$sg['ss_grade'] = $this->input->post('ss_grade');
				$sg['ss_step'] = $this->input->post('ss_step');
				$sg['ss_monthly'] = str_replace(',','',str_replace('₱ ','',$this->input->post('ss_monthly')));
				// $sg['ss_monthly'] = preg_replace("/[^0-9+]./", "", $this->input->post('ss_monthly'));
				$sg['ss_effectivitydate'] = $this->input->post('ss_effectivitydate');
				$sg['ss_addedby'] = $this->session->userdata('a_empno');
				$sg['ss_addeddate'] = date('Y-m-d');
				
				if($this->mdl_salarygrade->m_save_sg($sg)){
					$result = array('status' => 'yes','content'=> 'Salary Grade Successfully Saved!');
					echo json_encode($result);
					exit();
				}else{
					$result = array('status' => 'no','content'=> 'Salary Grade Failed Saved!');
					echo json_encode($result);
					exit();
				}
			}
		}else{
			redirect('user');
		}
	}
	
}
