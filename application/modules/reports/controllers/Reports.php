<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_reports');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			$data['title'] = 'Reports';
			$data['content'] = 'reports/v_reports';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}

	public function employee_list()
	{	
	
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			$data['list'] = $this->input->post('list');

			if(isset($_POST['a_isactive'])){
				$data['a_isactive'] = 'yes';
			} else {
				$data['a_isactive'] = 'no';
			}

			$data['a_office'] = $this->input->post('a_office');
			$data['a_division'] = $this->input->post('a_division');

			if ($data['list'] == 0) {
				//EMPLOYEE LIST
				if(isset($_POST['status'])){
					$data['status'] = $_POST['status'];
				}

				if($res = $this->mdl_reports->m_employee_lists($data)) {
					$data['results'] = $res['results'];
					$data['count'] = $res['count'];
					$data['title'] = 'Results';
					$data['content'] = 'reports/v_employee_list';
					$this->load->view('layouts/v_master',$data);
					} else {
					$data['results'] = $res['results'];
					$data['count'] = 0;
					$data['title'] = 'Results';
					$data['content'] = 'reports/v_employee_list';
					$this->load->view('layouts/v_master',$data);
				}
			} else {
				//EMPLOYEE SUMMARY (PER OFFICE, DIVISION)

				if(isset($_POST['status'])){
					$data['status'] = $_POST['status'];
					$data['status'] = implode('", "', $data['status']);
					$data['status'] = '"'.$data['status'].'"';
				} else {
					$data['status'] = "";
				}

				if($res = $this->mdl_reports->m_employee_summary_lists($data)) {
					$data['cnt_emp_per_office']  = $this->mdl_reports->m_count_emp_per_office();
					$data['results'] = $res['results'];
					$data['count'] = $res['count'];
					$data['title'] = 'Results';
					$data['content'] = 'reports/v_employee_summary_prince';
					$this->load->view('layouts/v_master',$data);
					} else {
					$data['results'] = $res['results'];
					$data['count'] = 0;
					$data['title'] = 'Results';
					$data['content'] = 'reports/v_employee_summary_prince';
					$this->load->view('layouts/v_master',$data);
				}
			}
		}else{
			redirect('user');
		}

	}

	//SERVICE RECORD
	public function service_record($id)
	{
		
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			$data['a_id'] = $id;
			if($data['a_id'] != "") {
				
				if($res = $this->mdl_reports->m_get_employee_servicerecord($data)) {
					$data['result'] = $res['result'];
					$data['workinfo'] = $res['workinfo'];
					$data['count'] = $res['count'];
					$data['title'] = 'Service Record';
					$data['content'] = 'reports/v_service_record';
					$this->load->view('layouts/v_master',$data);
				}
			}
		}else{
			redirect('user');
		}
	}

	//PDS EMPLOYEE
	public function personal_data_sheet(){
		if($this->session->userdata('a_id') !== null){
		$data['a_id'] = $this->session->userdata('a_id');
		if($data['a_id'] != "") {
			if($data['results'] = $this->mdl_reports->m_get_pds($data)) {
				$res = $this->mdl_reports->m_get_pds_child($data);
				$data['pds_child'] = $res['pds_child'];
				$data['pds_child_cnt'] = $res['pds_child_cnt'];
				
				$res_e = $this->mdl_reports->m_get_pds_educbg($data);
				$data['pds_educbg'] = $res_e['pds_educbg'];
				$data['pds_educbg_cnt'] = $res_e['pds_educbg_cnt'];
				
				$res_elig = $this->mdl_reports->m_get_pds_eligibility($data);
				$data['pds_elig'] = $res_elig['pds_elig'];
				$data['pds_elig_cnt'] = $res_elig['pds_elig_cnt'];
				
				$res_workinfo = $this->mdl_reports->m_get_pds_workinfo($data);
				$data['pds_workinfo'] = $res_workinfo['pds_workinfo'];
				$data['pds_workinfo_cnt'] = $res_workinfo['pds_workinfo_cnt'];
				
				$res_training = $this->mdl_reports->m_get_pds_training($data);
				$data['pds_training'] = $res_training['pds_training'];
				$data['pds_training_cnt'] = $res_training['pds_training_cnt'];
				
				$res_skills = $this->mdl_reports->m_get_pds_skills($data);
				$data['pds_skills'] = $res_skills['pds_skills'];
				$data['pds_skills_cnt'] = $res_skills['pds_skills_cnt'];
				
				$res_vwork = $this->mdl_reports->m_get_pds_voluntarywork($data);
				$data['pds_vwork'] = $res_vwork['pds_vwork'];
				$data['pds_vwork_cnt'] = $res_vwork['pds_vwork_cnt'];

				$res_ques = $this->mdl_reports->m_get_pds_questionnaire($data);
				$data['pds_ques'] = $res_ques['pds_ques'];
				
				$res_ref = $this->mdl_reports->m_get_pds_reference($data);
				$data['pds_ref'] = $res_ref['pds_ref'];
				$data['pds_ref_cnt'] = $res_ref['pds_ref_cnt'];
				
				$data['title'] = 'Personal Data Sheet';
				$data['content'] = 'reports/v_pds';
				$this->load->view('layouts/v_master',$data);
			}
		}
		}else{
			redirect('user');
		}
	}

	//PDS
	public function pds($id){
		
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		$data['a_id'] = $id;
		if($data['a_id'] != "") {
			if($data['results'] = $this->mdl_reports->m_get_pds($data)) {
				$res = $this->mdl_reports->m_get_pds_child($data);
				$data['pds_child'] = $res['pds_child'];
				$data['pds_child_cnt'] = $res['pds_child_cnt'];
				
				$res_e = $this->mdl_reports->m_get_pds_educbg($data);
				$data['pds_educbg'] = $res_e['pds_educbg'];
				$data['pds_educbg_cnt'] = $res_e['pds_educbg_cnt'];
				
				$res_elig = $this->mdl_reports->m_get_pds_eligibility($data);
				$data['pds_elig'] = $res_elig['pds_elig'];
				$data['pds_elig_cnt'] = $res_elig['pds_elig_cnt'];
				
				$res_workinfo = $this->mdl_reports->m_get_pds_workinfo($data);
				$data['pds_workinfo'] = $res_workinfo['pds_workinfo'];
				$data['pds_workinfo_cnt'] = $res_workinfo['pds_workinfo_cnt'];
				
				$res_training = $this->mdl_reports->m_get_pds_training($data);
				$data['pds_training'] = $res_training['pds_training'];
				$data['pds_training_cnt'] = $res_training['pds_training_cnt'];
				
				$res_skills = $this->mdl_reports->m_get_pds_skills($data);
				$data['pds_skills'] = $res_skills['pds_skills'];
				$data['pds_skills_cnt'] = $res_skills['pds_skills_cnt'];
				
				$res_vwork = $this->mdl_reports->m_get_pds_voluntarywork($data);
				$data['pds_vwork'] = $res_vwork['pds_vwork'];
				$data['pds_vwork_cnt'] = $res_vwork['pds_vwork_cnt'];

				$res_ques = $this->mdl_reports->m_get_pds_questionnaire($data);
				$data['pds_ques'] = $res_ques['pds_ques'];
				
				$res_ref = $this->mdl_reports->m_get_pds_reference($data);
				$data['pds_ref'] = $res_ref['pds_ref'];
				$data['pds_ref_cnt'] = $res_ref['pds_ref_cnt'];
				
				$data['title'] = 'Personal Data Sheet';
				$data['content'] = 'reports/v_pds';
				$this->load->view('layouts/v_master',$data);
			}
		}
		}else{
			redirect('user');
		}
	}

	//REQUEST RECORD
	public function requestrecord()
	{
		
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			$data['title'] = 'Request Record';
			$data['content'] = 'reports/v_request_record';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_requestrecord() {
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
		$result = $this->mdl_reports->m_get_requestrecord();
		echo json_encode($result);
		}else{
			redirect('user');
		}
	}

	public function request()
	{
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
		$data['r_id'] = $this->input->post('r_id');
		$data['a_id'] = $this->input->post('a_id');

		$chk = $this->mdl_reports->m_ajax_check_dateprinted_requestrecord($data['r_id']);
		if($chk == '0') {
			$data['r_printeddate'] = date('Y-m-d');
		}
		$data['r_processedby'] = $this->session->userdata('a_empno');
		$type = $this->input->post('r_type');

		if ($type == 'Employment Certificate - Income & Benefits') {
			$res = $this->mdl_reports->m_get_latest_servicerecord($data);
			if($res['count2'] != 0) {
				$this->mdl_reports->m_ajax_save_requestrecord($data);
			}
		} else {
			$this->mdl_reports->m_ajax_save_requestrecord($data);
		}

		switch ($type) {
			case 'Employment Certificate':
				$this->cert_of_employemnt($this->input->post('a_id'),1);
			break;
			case 'Employment Certificate - Income & Benefits':
				$this->cert_of_employemnt($this->input->post('a_id'),0);
			break;
			case 'Service Record':
				$this->service_record($this->input->post('a_id'));
			break;
		}
			}else{
			redirect('user');
		}
	}

	public function cert_of_employemnt($a_id,$str)
	{
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
		$data['a_id'] = $a_id;
		if($data['a_id'] != "") {
			if($res = $this->mdl_reports->m_get_latest_servicerecord($data)) {
				$data['result'] = $res['result'];
				$data['workinfo'] = $res['workinfo'];
				$data['count2'] = $res['count2'];
				$data['title'] = 'Certificate of Employment';
				if ($str == 0) {
					$data['content'] = 'reports/v_cert_of_employement_benefits';
				} else {
					$data['content'] = 'reports/v_cert_of_employement';
				}
				$this->load->view('layouts/v_master', $data);
			}
		}
			}else{
			redirect('user');
		}
	}
	
	//LEAVB PRINT
	public function leave()
	{
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
		$data['title'] = 'Leave';
		$data['content'] = 'reports/v_leave';
		$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_leave() {
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
		$result = $this->mdl_reports->m_ajax_leave_list();
		echo json_encode($result);
		}else{
			redirect('user');
		}
	}
	
	public function leave_report()
	{
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
			$data['title'] = 'Leave';
			$data['content'] = 'reports/v_leave_report';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}
	public function leave_masterlist()
	{
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
			$data['title'] = 'Leave Masterlist';
			$data['content'] = 'reports/v_leave_list';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_leavemasterlist() {
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
		$result = $this->mdl_reports->m_ajax_leave_masterlist();
		echo json_encode($result);
		}else{
			redirect('user');
		}
	}

	public function leave_print1()
	{	if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
		$data['title'] = 'Leave';
		$data['content'] = 'reports/v_leave_form';
		$this->load->view('layouts/v_master', $data);
			}else{
			redirect('user');
		}
	}

	public function ajax_get_leaveoffice() {
		
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		$result = $this->mdl_reports->m_get_leaveposition();
		echo json_encode($result);
			}else{
			redirect('user');
		}
	}

	public function leave_print_request()
	{
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
			$data['l_id'] = $this->input->post('l_id');
			$data['a_id'] = $this->input->post('a_id');

			$chk = $this->mdl_reports->m_ajax_check_dateprinted_leave($data['l_id']);
			if($chk == '0') {
				$data['l_printeddate'] = date('Y-m-d');
			}
			$data['l_processedby'] = $this->session->userdata('a_empno');
			$this->mdl_reports->m_ajax_save_dateprinted_leave($data);

			$this->leave_print($this->input->post('l_id'));
		}else{
			redirect('user');
		}
	}

	public function leave_print($l_id)
	{
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			
			if($l_id != "") {
				if($res = $this->mdl_reports->m_ajax_get_leave($l_id)) {
					// $oic = $this->mdl_reports->m_ajax_get_oic();
					// $data['oic'] = $oic['results'];

					$head_chrdo = $this->mdl_reports->m_ajax_get_head_chrdo();
					$data['head_chrdo'] = $head_chrdo['results'];

					$data['results'] = $res['results'];
					$data['count'] = $res['count'];
					$data['title'] = 'Print';
					$data['content'] = 'reports/v_leave_form';
					$this->load->view('layouts/v_master',$data);
				}
			}
		}else{
			redirect('user');
		}
	}

	public function step_increment_report()
	{
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
			$data['title'] = 'Step Increment';
			$data['content'] = 'reports/v_step_increment';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}
	
	public function ajax_printsummary()
	{
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
			$l 					= $this->input->post('w');
			$count_l 			= count($l);
			$new_sv 			= array();
			$l_id				= '0';
		
			for($i = 0; $i < $count_l; $i++){
				$l_id .= ','.$l[$i];
			}
			$new_l_ids = '';
			$print_date = date('Y-m-d');
			if($this->mdl_reports->m_update_leave_printdate($l_id,$print_date)){
					$new_l_ids = str_replace(",","a",$l_id);
					$result = array('status' => 'yes','content'=> 'Leave Records', 'l_ids' => $new_l_ids);
							echo json_encode($result);
							exit;
			}else{
				$result = array('status' => 'no','content'=> 'Service Record Failed Updated!');
							echo json_encode($result);
							exit;
			}
		}else{
			redirect('user');
		}
	}

	public function get_leaves_summary($new_l_ids) {
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			
			$l_ids = str_replace("a",",",$new_l_ids);
			
			if($data['result'] = $this->mdl_reports->get_leaves_summary($l_ids)){
				
			}else{
				$data['result'] = '0';
			}
			$data['title'] = 'Leave Report';
			$data['content'] = 'reports/v_leave_report';
			$this->load->view('layouts/v_master',$data);
		}else{
			redirect('user');
		}
	}
	
	public function ajax_step_increment() {
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			
		$result = $this->mdl_reports->m_get_step_increment();
		echo json_encode($result);
		}else{
			redirect('user');
		}
	}

	public function nosi_report() {
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			
			$data['results'] = $this->mdl_reports->m_ajax_get_nosi($this->input->post('w_id'));
			$data['title'] = 'Nosi Report';
			$data['content'] = 'reports/v_nosi_report';
			$this->load->view('layouts/v_master',$data);
		}else{
			redirect('user');
		}
	}

	public function salarygrade()
	{
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
		$data['title'] = 'Salary Schedule';
		$data['content'] = 'reports/v_salarygrade';
		$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}

	public function ajax_salarygrade() {
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
		$result = $this->mdl_reports->m_get_salarygrade();
		echo json_encode($result);
		}else{
			redirect('user');
		}
	}

	public function ajax_salarygrade_year() {
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
		$result = $this->mdl_reports->m_get_salarygrade_year();
		echo json_encode($result);
		}else{
			redirect('user');
		}
	}

}
