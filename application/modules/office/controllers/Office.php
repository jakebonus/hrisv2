<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_office');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
			if($data['results'] = $this->mdl_office->m_get_records()){
				$data['title'] = 'Office';
				$data['content'] = 'office/v_office';
				$this->load->view('layouts/v_master', $data);
			}else{
				$data['results'] = 0;
				$data['title'] = 'Office';
				$data['content'] = 'office/v_office';
				$this->load->view('layouts/v_master', $data);
			}
		}else{
			redirect('user');
		}
	}

	public function ajax_get_office(){
		
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			$result = $this->mdl_office->m_get_records();
			echo json_encode($result);
		}else{
			redirect('user');
		}
	}

	public function ajax_save_office()
	{
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
			if ($this->input->post('o_type') == 'Division' || $this->input->post('o_type') == 'DIVISION') {
				$data['o_mother'] = $this->input->post('o_mother');
				$data['o_type'] = 'Division';
			} else {
				$data['o_type'] = 'Department';
			}
			$data['o_name'] = $this->input->post('o_name');
			$data['o_code'] = $this->input->post('o_code');
			$data['o_head'] = $this->input->post('o_head');
			$data['o_alternate'] = $this->input->post('o_alternate');
			$data['o_dessig'] = $this->input->post('o_dessig');
			$data['o_dessig']= ($data['o_dessig'] == "1" ? 1 : 0);

			if($this->mdl_office->m_ajax_save_office($data))
			{
				$result = array('status' => 'yes','content'=> 'Successfully added!');
				echo json_encode($result);
			} else {
				$result = array('status' => 'no','content'=> 'Failed to update. Please try again!');
				echo json_encode($result);
			}
		}else{
			redirect('user');
		}
	}
	
	public function ajax_update_office()
	{
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
			$data['o_id'] = $this->input->post('o_id');
			if ($this->input->post('o_type') == 'Division' || $this->input->post('o_type') == 'DIVISION') {
				$data['o_mother'] = $this->input->post('o_mother');
				$data['o_type'] = 'Division';
			} else {
				$data['o_type'] = 'Department';
			}
			$data['o_name'] = $this->input->post('o_name');
			$data['o_code'] = $this->input->post('o_code');
			$data['o_head'] = $this->input->post('o_head');
			$data['o_alternate'] = $this->input->post('o_alternate');
			$data['o_dessig'] = $this->input->post('o_dessig');
			$data['o_dessig']= ($data['o_dessig'] == "1" ? 1 : 0);
			
			if($this->mdl_office->m_ajax_update_office($data))
			{
				$result = array('status' => 'yes','content'=> 'Successfully updated!');
				echo json_encode($result);
			} else {
				$result = array('status' => 'no','content'=> 'Failed to update. Please try again!');
				echo json_encode($result);
			}
		}else{
			redirect('user');
		}
	}
	
	function ajax_delete_office($id)
    {
		
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
			$this->db->where('o_id', $id);
			$this->db->delete('tbl_office');
			redirect('office');
		}else{
			redirect('user');
		}
    }
	


}
