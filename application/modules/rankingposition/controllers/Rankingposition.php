<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rankingposition extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_rankingposition');
		$this->load->library('form_validation');
	}

	public function filter_candidate(){
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			$data['title'] = 'Online Applicant';
			$data['content'] = 'v_filtercandidate';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}

	public function get_dept(){
			$r = $this->mdl_rankingposition->m_get_dept();
			echo json_encode($r);
	}

	public function qualitystandards(){
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			$data['title'] = 'Online Applicant';
			$data['content'] = 'v_qualitystandards';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_position($o){
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			$result = $this->mdl_rankingposition->m_get_position($o);
			echo json_encode($result);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_position_sg($p_id){

		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			$result = $this->mdl_rankingposition->m_get_position_sg($p_id);
			echo json_encode($result);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_educ(){

		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			$result = $this->mdl_rankingposition->m_get_educ();
			echo json_encode($result);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_educ_sector(){

		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			$result = $this->mdl_rankingposition->m_get_educ_sector();
			echo json_encode($result);
		}else{
			redirect('user');
		}
	}

	public function ajax_save_position(){

		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){


			$p_id = $this->input->post('p_id');
			$data['p_code'] = $this->input->post('p_code');
			$data['p_name'] = $this->input->post('p_name');
			$data['p_sg'] = $this->input->post('p_sg');
			$data['p_level'] = $this->input->post('p_level');
			$data['p_eligibilitykind'] = $this->input->post('p_eligibilitykind');
			$data['p_eligibility'] = $this->input->post('p_eligibility');
			$data['p_education'] = $this->input->post('p_education');
			$data['p_educdesc'] = $this->input->post('p_educdesc');
			$data['p_educsector'] = $this->input->post('p_educsector');
			$data['p_work_exp_years'] = $this->input->post('p_work_exp_years');
			$data['p_workdesc'] = $this->input->post('p_workdesc');
			$data['p_traininghrs'] = $this->input->post('p_traininghrs');
			$data['p_trainingdesc'] = $this->input->post('p_trainingdesc');
			$data['p_parent'] = $this->input->post('p_parent');
			$data['p_relevance'] = $this->input->post('p_relevance');


			if($p_id != null || $p_id != ''){
				// update
				if($this->mdl_rankingposition->m_update_position($p_id,$data)){
					$result = array('status' => 'yes','content'=> 'Successfully Updated');
					echo json_encode($result);
					exit;
				}else{
					$result = array('status' => 'No','content'=> 'Failed to update');
					echo json_encode($result);
					exit;
				}
			}else{
				// insert
				if($this->mdl_rankingposition->m_insert_position($data)){
					$result = array('status' => 'yes','content'=> 'Successfully save');
					echo json_encode($result);
					exit;
				}else{
					$result = array('status' => 'No','content'=> 'Failed to save');
					echo json_encode($result);
					exit;
				}
			}

		}else{
			redirect('user');
		}
	}

	public function ajax_get_candidates($position){

		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			$result = $this->mdl_rankingposition->m_get_candidates($position);
			echo json_encode($result);
		}else{
			redirect('user');
		}
	}

}
