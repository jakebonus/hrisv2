<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_employee');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if($this->session->userdata('a_id') !== null){
				$data['title'] = 'Employee Masterlist';
				$data['content'] = 'employee/v_employee';
				$this->load->view('layouts/v_master', $data);

		}else{
			// modules::run('login/login/index');
			// $this->load->module('login/index');
			// Modules::run('login/login/index');
			// echo 'aaa';
			// modules::run('login/index');
			// $data['title'] = 'Login';
			// $data['content'] = 'login/v_login';
			// $this->load->view('layouts/v_master', $data);
			// modules::run('login/login/index');
			// $this->load->module(' login/login');
			// $this->login->index();
			redirect('user');
		}

	}

	public function export()
	{
		$data['title'] = 'Export Excel';
		$data['content'] = 'employee/v_employee_xls';
		$this->load->view('layouts/v_master', $data);
	}

	public function grid_view()
	{
		$data['title'] = 'Reports';
		$data['content'] = 'employee/v_employee_contact_view';
		$this->load->view('layouts/v_master', $data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

	//DEACTIVE EMPLOYEE
	public function ajax_delete_employee()
    {
		if($this->session->userdata('a_id') !== null){
			$id = $this->input->post('del_a_id');
			$result = $this->mdl_employee->m_get_isactive($id);
			if ($result[0]->a_isactive == 'yes') {
				$data = 1;
				$txt = 'Employee successfully deactivated!';
			} else {
				$data = 0;
				$txt = 'Employee successfully activated!';
			}

			if($this->mdl_employee->m_delete_emp($id,$data))
			{
				$result = array('status' => 'yes','content'=> $txt);
				echo json_encode($result);
				exit();
			} else {
				$result = array('status' => 'no','content'=> 'Failed. Please try again!');
				echo json_encode($result);
				exit();
			}
		}else{
			redirect('user');
		}
    }

	public function ajax_get_account(){
		if($this->session->userdata('a_id') !== null){
			$result = $this->mdl_employee->m_get_employeelist();
			echo json_encode($result);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_employee_xls(){
		if($this->session->userdata('a_id') !== null){
			$result = $this->mdl_employee->m_get_employeelist_xls();
			echo json_encode($result);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_position(){
		if($this->session->userdata('a_id') !== null){
			$result = $this->mdl_employee->m_get_position();
			echo json_encode($result);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_office(){
		if($this->session->userdata('a_id') !== null){
			$result = $this->mdl_employee->m_get_office();
			echo json_encode($result);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_division(){
		//if ($this->input->post('search') == 1 ){
		if($this->session->userdata('a_id') !== null){
			$dept = $this->input->post('sel_office');
			$result = $this->mdl_employee->m_get_division($dept);
			echo json_encode($result);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_division1(){
		if($this->session->userdata('a_id') !== null){
			$dept = $this->input->post('sel_office');
			$result = $this->mdl_employee->m_get_division1($dept);
			echo json_encode($result);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_hielig(){
		if($this->session->userdata('a_id') !== null){
			$result = $this->mdl_employee->m_get_hielig();
			echo json_encode($result);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_hieduc(){
		if($this->session->userdata('a_id') !== null){
			$result = $this->mdl_employee->m_get_hieduc();
			echo json_encode($result);
		}else{
			redirect('user');
		}
	}
	public function ajax_get_workinfo($a_id){
		// $result = $this->mdl_employee->m_get_emp_work_exp();
		if($this->session->userdata('a_id') !== null){
			$result = $this->mdl_employee->m_get_emp_work_exp($a_id);
			echo json_encode($result);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_emp_training($a_id){
		// $result = $this->mdl_employee->m_get_emp_work_exp();
		if($this->session->userdata('a_id') !== null){
			$result = $this->mdl_employee->m_get_emp_training($a_id);
			echo json_encode($result);
		}else{
			redirect('user');
		}
	}
	public function ajax_get_emp_eligibility($a_id){
		// $result = $this->mdl_employee->m_get_emp_work_exp();
		if($this->session->userdata('a_id') !== null){
			$result = $this->mdl_employee->m_get_emp_eligibility($a_id);
			echo json_encode($result);
		}else{
			redirect('user');
		}
	}

	public function edit_employee($a_id){
		if($this->session->userdata('a_id') !== null){
			$data['result'] = $this->mdl_employee->m_get_emp_info($a_id);
			$data['familly'] = $this->mdl_employee->m_get_emp_familly($a_id);
			$data['children'] = $this->mdl_employee->m_get_emp_children($a_id);
			$data['education'] = $this->mdl_employee->m_get_emp_education($a_id);
			// $data['training'] = $this->mdl_employee->m_get_emp_training($a_id);
			// $data['eligibility'] = $this->mdl_employee->m_get_emp_eligibility($a_id);
			$data['skills'] = $this->mdl_employee->m_get_emp_skills($a_id);
			$data['char_reff'] = $this->mdl_employee->m_get_emp_char($a_id);
			$data['vol_work'] = $this->mdl_employee->m_get_emp_vol_work($a_id);
			// $data['work_exp'] = $this->mdl_employee->m_get_emp_work_exp($a_id);
			$data['q_answer'] = $this->mdl_employee->m_get_emp_q_answer($a_id);
			$data['dept'] = $this->mdl_employee->m_get_office();
			$data['div'] = $this->mdl_employee->m_get_all_division();
			$data['position'] = $this->mdl_employee->m_get_position();
			$data['title'] = 'Edit Employee';
			$data['content'] = 'employee/v_edit_employee';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}

	public function update_employee_personal_info(){
		if($this->session->userdata('a_id') !== null){

			$acc['a_empno'] = $this->input->post('a_empno');
			$acc['a_firstname'] = $this->input->post('a_firstname');
			$acc['a_middlename'] = $this->input->post('a_middlename');
			$acc['a_mi'] = $this->input->post('a_mi');
			$acc['a_lastname'] = $this->input->post('a_lastname');
			$acc['a_namext'] = $this->input->post('a_namext');
			$acc['a_fdos'] = $this->input->post('a_fdos');
			// $acc['a_status'] = $this->input->post('a_status');
			// $acc['a_position'] = $this->input->post('a_position');

			// $acc['a_office'] = $this->input->post('a_office');
			// $acc['a_division'] = $this->input->post('a_division');

			$acc['a_deptlocation'] = $this->input->post('a_deptlocation');
			$acc['a_divlocation'] = $this->input->post('a_divlocation');

			// $acc['a_salarygrade'] = $this->input->post('a_salarygrade');
			// $acc['a_salarystep'] = $this->input->post('a_salarystep');
			//$acc['a_level'] = $this->input->post('a_level');
			$acc['a_machineid'] = $this->input->post('a_machineid');
			$acc['a_hielig'] = $this->input->post('a_hielig');
			$acc['a_hieduc'] = $this->input->post('a_hieduc');

			$acc['a_updateddate'] = date('Y-m-d h:i:s');
			$acc['a_updatedby'] = $this->session->userdata('a_empno');

			$pi['pi_birthdate'] = $this->input->post('pi_birthdate');
			$pi['pi_birthplace'] = $this->input->post('pi_birthplace');
			$pi['pi_gender'] = $this->input->post('pi_gender');
			$pi['pi_status'] = $this->input->post('pi_status');
			$pi['pi_citizenship'] = $this->input->post('pi_citizenship');
			$pi['pi_height'] = $this->input->post('pi_height');
			$pi['pi_weight'] = $this->input->post('pi_weight');
			$pi['pi_bloodtype'] = $this->input->post('pi_bloodtype');
			$pi['pi_gsis'] = $this->input->post('pi_gsis');
			$pi['pi_pagibig'] = $this->input->post('pi_pagibig');
			$pi['pi_philhealth'] = $this->input->post('pi_philhealth');
			$pi['pi_sss'] = $this->input->post('pi_sss');
			$pi['pi_resstreet'] = $this->input->post('pi_resstreet');
			$pi['pi_resbrgy'] = $this->input->post('pi_resbrgy');
			$pi['pi_rescity'] = $this->input->post('pi_rescity');
			$pi['pi_resprov'] = $this->input->post('pi_resprov');
			$pi['pi_reszip'] = $this->input->post('pi_reszip');
			$pi['pi_resprov'] = $this->input->post('pi_resprov');
			$pi['pi_resphone'] = $this->input->post('pi_resphone');
			$pi['pi_permstreet'] = $this->input->post('pi_permstreet');
			$pi['pi_permbrgy'] = $this->input->post('pi_permbrgy');
			$pi['pi_permcity'] = $this->input->post('pi_permcity');
			$pi['pi_permprov'] = $this->input->post('pi_permprov');
			$pi['pi_permzip'] = $this->input->post('pi_permzip');
			$pi['pi_permphone'] = $this->input->post('pi_permphone');
			$pi['pi_email'] = $this->input->post('pi_email');
			$pi['pi_phone'] = $this->input->post('pi_phone');
			$pi['pi_tin'] = $this->input->post('pi_tin');

			$pi['pi_updateddate'] = date('Y-m-d h:i:s');
			$pi['pi_updatedby'] = $this->session->userdata('a_empno');

			$a_id = $this->input->post('a_id');

			if($this->mdl_employee->m_update_employee_personal_info($acc,$pi,$a_id)){

				$result = array('status' => 'yes','content'=> 'Update successfully saved!');
				echo json_encode($result);
				exit();
			}
		}else{
			redirect('user');
		}
	}

	public function update_employee_familly(){
		if($this->session->userdata('a_id') !== null){
			$fmly['fb_spousefname'] = $this->input->post('fb_spousefname');
			$fmly['fb_spousemi'] = $this->input->post('fb_spousemi');
			$fmly['fb_spouselname'] = $this->input->post('fb_spouselname');
			$fmly['fb_spouseextname'] = $this->input->post('fb_spouseextname');
			$fmly['fb_spousework'] = $this->input->post('fb_spousework');
			$fmly['fb_spouseemployer'] = $this->input->post('fb_spouseemployer');
			$fmly['fb_spouseemployeraddress'] = $this->input->post('fb_spouseemployeraddress');
			$fmly['fb_spouseemployerphone'] = $this->input->post('fb_spouseemployerphone');
			$fmly['fb_fatherfname'] = $this->input->post('fb_fatherfname');
			$fmly['fb_fathermi'] = $this->input->post('fb_fathermi');
			$fmly['fb_fatherlname'] = $this->input->post('fb_fatherlname');
			$fmly['fb_fatherext'] = $this->input->post('fb_fatherext');
			$fmly['fb_motherfname'] = $this->input->post('fb_motherfname');
			$fmly['fb_mothermi'] = $this->input->post('fb_mothermi');
			$fmly['fb_motherlname'] = $this->input->post('fb_motherlname');
			$fmly['fb_motherext'] = $this->input->post('fb_motherext');
			$a_id = $this->input->post('a_id');
			if($this->mdl_employee->m_update_update_employee_familly($fmly,$a_id)){
				$result = array('status' => 'yes','content'=> 'Update successfully saved!');
				echo json_encode($result);
				exit();
			}
		}else{
			redirect('user');
		}
	}

	public function add_employee_familybg(){
		if($this->session->userdata('a_id') !== null){
			$fmly['fb_spousefname'] = $this->input->post('fb_spousefname');
			$fmly['fb_spousemi'] = $this->input->post('fb_spousemi');
			$fmly['fb_spouselname'] = $this->input->post('fb_spouselname');
			$fmly['fb_spouseextname'] = $this->input->post('fb_spouseextname');
			$fmly['fb_spousework'] = $this->input->post('fb_spousework');
			$fmly['fb_spouseemployer'] = $this->input->post('fb_spouseemployer');
			$fmly['fb_spouseemployeraddress'] = $this->input->post('fb_spouseemployeraddress');
			$fmly['fb_spouseemployerphone'] = $this->input->post('fb_spouseemployerphone');
			$fmly['fb_fatherfname'] = $this->input->post('fb_fatherfname');
			$fmly['fb_fathermi'] = $this->input->post('fb_fathermi');
			$fmly['fb_fatherlname'] = $this->input->post('fb_fatherlname');
			$fmly['fb_fatherext'] = $this->input->post('fb_fatherext');
			$fmly['fb_motherfname'] = $this->input->post('fb_motherfname');
			$fmly['fb_mothermi'] = $this->input->post('fb_mothermi');
			$fmly['fb_motherlname'] = $this->input->post('fb_motherlname');
			$fmly['fb_motherext'] = $this->input->post('fb_motherext');

			$fmly['a_id'] = $this->input->post('a_id');

			if($this->mdl_employee->m_add_employee_familly($fmly)){
				$result = array('status' => 'yes','content'=> 'Update successfully saved!');
				echo json_encode($result);
				exit();
			}
		}else{
			redirect('user');
		}
	}

	public function add_employee_child(){
		if($this->session->userdata('a_id') !== null){
			$child['c_fname'] = $this->input->post('c_fname');
			$child['c_mi'] = $this->input->post('c_mi');
			$child['c_lname'] = $this->input->post('c_lname');
			$child['c_extname'] = $this->input->post('c_extname');
			$child['c_birthdate'] = $this->input->post('c_birthdate');
			$child['a_id'] = $this->input->post('a_id');

			$child['c_addeddate'] = date('Y-m-d h:i:s');
			$child['c_addedby'] = $this->session->userdata('a_empno');
			if($this->mdl_employee->m_add_add_employee_child($child)){
				$result = array('status' => 'yes','content'=> 'Child Info successfully saved!');
				echo json_encode($result);
				exit();
			}else{
				$result = array('status' => 'no','content'=> 'Error occurred... Please contact the web developer...');
				echo json_encode($result);
				exit();
			}
		}else{
			redirect('user');
		}
	}

	public function add_employee_educ(){
		if($this->session->userdata('a_id') !== null){
			$educ['pi_level'] = $this->input->post('pi_level');
			$educ['pi_schoolname'] = $this->input->post('pi_schoolname');
			$educ['pi_degree'] = $this->input->post('pi_degree');
			$educ['pi_yrgrad'] = $this->input->post('pi_yrgrad');
			$educ['pi_from'] = $this->input->post('pi_from');
			$educ['pi_to'] = $this->input->post('pi_to');
			$educ['pi_honors'] = $this->input->post('pi_honors');
			$educ['a_id'] = $this->input->post('a_id');
			$educ['e_type'] = $this->input->post('e_type');
			$educ['e_sector'] = $this->input->post('e_sector');
			$educ['pi_addeddate'] = date('Y-m-d h:i:s');
			$educ['pi_addedby'] = $this->session->userdata('a_empno');
			if($this->mdl_employee->m_add_add_employee_educ($educ)){
				$result = array('status' => 'yes','content'=> 'Educational Info successfully saved!');
				echo json_encode($result);
				exit();
			}else{
				$result = array('status' => 'no','content'=> 'Error occurred... Please contact the web developer...');
				echo json_encode($result);
				exit();
			}
		}else{
			redirect('user');
		}
	}

	public function add_employee_training(){
		if($this->session->userdata('a_id') !== null){
			$training['t_seminar'] = $this->input->post('t_seminar');
			$training['t_from'] = $this->input->post('t_from');
			$training['t_to'] = $this->input->post('t_to');
			$training['t_hoursno'] = $this->input->post('t_hoursno');
			$training['t_conductor'] = $this->input->post('t_conductor');
			$training['t_relevant'] = $this->input->post('t_relevant');

			$training['a_id'] = $this->input->post('a_id');
			$training['t_addeddate'] = date('Y-m-d h:i:s');
			$training['t_addedby'] = $this->session->userdata('a_empno');
			if($this->mdl_employee->m_add_employee_training($training)){
				$result = array('status' => 'yes','content'=> 'Training Info successfully saved!');
				echo json_encode($result);
				exit();
			}else{
				$result = array('status' => 'no','content'=> 'Error occurred... Please contact the web developer...');
				echo json_encode($result);
				exit();
			}
		}else{
			redirect('user');
		}
	}

	public function add_employee_elig(){
		if($this->session->userdata('a_id') !== null){

			$elig['el_type'] = $this->input->post('el_type');
			$elig['el_career'] = $this->input->post('el_career');
			$elig['el_rating'] = $this->input->post('el_rating');
			$elig['el_examdate'] = $this->input->post('el_examdate');
			$elig['el_examplace'] = $this->input->post('el_examplace');
			$elig['el_number'] = $this->input->post('el_number');
			$elig['el_daterelease'] = $this->input->post('el_daterelease');


			$elig['a_id'] = $this->input->post('a_id');
			$elig['el_addeddate'] = date('Y-m-d h:i:s');
			$elig['el_addedby'] = $this->session->userdata('a_empno');
			if($this->mdl_employee->m_add_employee_elig($elig)){
				$result = array('status' => 'yes','content'=> 'Eligibility Info successfully saved!');
				echo json_encode($result);
				exit();
			}else{
				$result = array('status' => 'no','content'=> 'Error occurred... Please contact the web developer...');
				echo json_encode($result);
				exit();
			}
		}else{
			redirect('user');
		}
	}

	public function add_employee_work(){
		if($this->session->userdata('a_id') !== null){

			$work['p_from'] = $this->input->post('p_from');
			$work['p_to'] = $this->input->post('p_to');
			$work['p_position'] = $this->input->post('p_position');
			$work['p_company'] = $this->input->post('p_company');
			$work['p_salarymonthly'] = $this->input->post('p_salarymonthly');
			$work['p_salarygrade'] = $this->input->post('p_salarygrade');
			$work['p_salarystep'] = $this->input->post('p_salarystep');
			$work['p_appointment'] = $this->input->post('p_appointment');
			$work['p_isgovt'] = $this->input->post('p_isgovt');

			$work['a_id'] = $this->input->post('a_id');
			$work['p_addeddate'] = date('Y-m-d h:i:s');
			$work['p_addedby'] = $this->session->userdata('a_empno');
			if($this->mdl_employee->m_add_employee_work($work)){
				$result = array('status' => 'yes','content'=> 'Work Experience Info successfully saved!');
				echo json_encode($result);
				exit();
			}else{
				$result = array('status' => 'no','content'=> 'Error occurred... Please contact the web developer...');
				echo json_encode($result);
				exit();
			}
		}else{
			redirect('user');
		}
	}

	public function add_employee_vol_work(){
		if($this->session->userdata('a_id') !== null){

			$volwork['vw_name'] = $this->input->post('vw_name');
			$volwork['vw_address'] = $this->input->post('vw_address');
			$volwork['vw_datefrom'] = $this->input->post('vw_datefrom');
			$volwork['vw_dateto'] = $this->input->post('vw_dateto');
			$volwork['vw_nohours'] = $this->input->post('vw_nohours');
			$volwork['vw_work'] = $this->input->post('vw_work');


			$volwork['a_id'] = $this->input->post('a_id');
			$volwork['vw_addeddate'] = date('Y-m-d h:i:s');
			$volwork['vw_addedby'] = $this->session->userdata('a_empno');
			if($this->mdl_employee->m_add_employee_vol_work($volwork)){
				$result = array('status' => 'yes','content'=> 'Voluntary Work Experience Info successfully saved!');
				echo json_encode($result);
				exit();
			}else{
				$result = array('status' => 'no','content'=> 'Error occurred... Please contact the web developer...');
				echo json_encode($result);
				exit();
			}
		}else{
			redirect('user');
		}
	}

	public function add_employee_skills(){
		if($this->session->userdata('a_id') !== null){

			$sh['sh_skills'] = $this->input->post('sh_skills');
			$sh['sh_nonacademic'] = $this->input->post('sh_nonacademic');
			$sh['sh_membership'] = $this->input->post('sh_membership');

			$sh['a_id'] = $this->input->post('a_id');
			$sh['sh_addeddate'] = date('Y-m-d h:i:s');
			$sh['sh_addedby'] = $this->session->userdata('a_empno');
			if($this->mdl_employee->m_add_employee_skills($sh)){
				$result = array('status' => 'yes','content'=> 'Skills Info successfully saved!');
				echo json_encode($result);
				exit();
			}else{
				$result = array('status' => 'no','content'=> 'Error occurred... Please contact the web developer...');
				echo json_encode($result);
				exit();
			}
		}else{
			redirect('user');
		}
	}



	public function update_employee_answers(){
		if($this->session->userdata('a_id') !== null){

				$q_ans['q_36_a'] = $this->input->post('q_36_a');
				$q_ans['q_36_a_details'] = $this->input->post('q_36_a_details');
				$q_ans['q_36_b'] = $this->input->post('q_36_b');
				$q_ans['q_36_b_details'] = $this->input->post('q_36_b_details');
				$q_ans['q_37_a'] = $this->input->post('q_37_a');
				$q_ans['q_37_a_details'] = $this->input->post('q_37_a_details');
				$q_ans['q_37_b'] = $this->input->post('q_37_b');
				$q_ans['q_37_b_details'] = $this->input->post('q_37_b_details');
				$q_ans['q_38'] = $this->input->post('q_38');
				$q_ans['q_38_details'] = $this->input->post('q_38_details');
				$q_ans['q_39'] = $this->input->post('q_39');
				$q_ans['q_39_details'] = $this->input->post('q_39_details');
				$q_ans['q_40'] = $this->input->post('q_40');
				$q_ans['q_40_details'] = $this->input->post('q_40_details');
				$q_ans['q_41_a'] = $this->input->post('q_41_a');
				$q_ans['q_41_a_details'] = $this->input->post('q_41_a_details');
				$q_ans['q_41_b'] = $this->input->post('q_41_b');
				$q_ans['q_41_b_details'] = $this->input->post('q_41_b_details');
				$q_ans['q_41_c'] = $this->input->post('q_41_c');
				$q_ans['q_41_c_details'] = $this->input->post('q_41_c_details');


			$a_id = $this->input->post('a_id');

			if($this->mdl_employee->m_check_answers($a_id)){
				$q_ans['q_updateddate'] = date('Y-m-d h:i:s');
				$q_ans['q_updatedby'] = $this->session->userdata('a_empno');
				$meron = 1;
			}else{
				$q_ans['q_addeddate'] = date('Y-m-d h:i:s');
				$q_ans['q_addedby'] = $this->session->userdata('a_empno');
				$q_ans['a_id'] = $a_id;
				$meron = 0;
			}

			if($meron == 1){
				if($this->mdl_employee->m_update_employee_answers($q_ans,$a_id)){
					$result = array('status' => 'yes','content'=> 'Answers successfully updated!');
					echo json_encode($result);
					exit();
				}else{
					$result = array('status' => 'no','content'=> 'Error occurred... Please contact the web developer...');
					echo json_encode($result);
					exit();
				}
			}else{
				if($this->mdl_employee->m_add_employee_answers($q_ans)){
					$result = array('status' => 'yes','content'=> 'Answers successfully saved!');
					echo json_encode($result);
					exit();
				}else{
					$result = array('status' => 'no','content'=> 'Error occurred... Please contact the web developer...');
					echo json_encode($result);
					exit();
				}
			}
		}else{
			redirect('user');
		}
	}

	public function add_employee_reff(){
		if($this->session->userdata('a_id') !== null){

			$reff['r_name'] = $this->input->post('r_name');
			$reff['r_address'] = $this->input->post('r_address');
			$reff['r_contactnum'] = $this->input->post('r_contactnum');

			$reff['a_id'] = $this->input->post('a_id');
			$reff['r_addeddate'] = date('Y-m-d h:i:s');
			$reff['r_addedby'] = $this->session->userdata('a_empno');
			if($this->mdl_employee->m_add_employee_reff($reff)){
				$result = array('status' => 'yes','content'=> 'Character Reference successfully saved!');
				echo json_encode($result);
				exit();
			}else{
				$result = array('status' => 'no','content'=> 'Error occurred... Please contact the web developer...');
				echo json_encode($result);
				exit();
			}
		}else{
			redirect('user');
		}
	}

	public function viewledger(){
		if($this->session->userdata('a_id') !== null){

			$data['a_id'] = $this->input->post('m_a_id');
			$data['b_year'] = $this->input->post('b_year');

			if($data['result'] = $this->mdl_employee->m_search_record($data['a_id']) == false)
			{
				$data['is_result'] = 1;
			} else {
				$data['result'] = $this->mdl_employee->m_search_record($data['a_id']);
				$data['is_result'] = 0;

				foreach ($data['result'] as $r){
					$data['a_palayid'] =  $r->a_palayid;
				}

					$data['benefits'] = $this->mdl_employee->m_search_benefits($data);
					$data['mandatory_benefits'] = $this->mdl_employee->m_get_benefits($data);
					$data['insentives'] = $this->mdl_employee->m_get_insentives($data);

					$data['title'] = 'Employee Ledger';
					// $data['content'] = 'employee/v_ledger';
					// $this->load->view('layouts/v_master',$data);

					$data['content'] = 'employee/v_ledger';
					$this->load->view('layouts/v_master', $data);

					//$result = array('status' => 'yes', 'content' => '<div class="alert alert-success">Please wait</div>');
					//echo json_encode($result);
			}
		}else{
			redirect('user');
		}
	}

	public function add_new(){
		if($this->session->userdata('a_id') !== null){

			$data['dept'] = $this->mdl_employee->m_get_office();
			$data['div'] = $this->mdl_employee->m_get_all_division();
			$data['position'] = $this->mdl_employee->m_get_position();

			$data['title'] = 'Add New Employee';
			$data['content'] = 'employee/v_new_employee';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}

	public function add_new_employee(){
		if($this->session->userdata('a_id') !== null){
			$acc['a_empno'] = $this->input->post('a_empno');
			$acc['a_password'] = 'f429781927403971ff7cb702fc4c899126113f22';
			$acc['a_secondpass'] = '5d6f782a414989762ce82ae09a92cf7c414c695c';
			$acc['a_firstname'] = $this->input->post('a_firstname');
			$acc['a_middlename'] = $this->input->post('a_middlename');
			$acc['a_lastname'] = $this->input->post('a_lastname');
			$acc['a_fdos'] = $this->input->post('a_fdos');
			$acc['a_status'] = $this->input->post('a_status');
			$acc['a_position'] = $this->input->post('a_position');

			$acc['a_office'] = $this->input->post('a_office');
			$acc['a_division'] = $this->input->post('a_division');

			$acc['a_deptlocation'] = $this->input->post('a_deptlocation');
			$acc['a_divlocation'] = $this->input->post('a_divlocation');

			$acc['a_machineid'] = $this->input->post('a_machineid');

			$acc['a_salarygrade'] = $this->input->post('a_salarygrade');
			$acc['a_salarystep'] = $this->input->post('a_salarystep');

			$acc['a_level'] = 'Employee';

			$acc['a_hielig'] = $this->input->post('a_hielig');
			$acc['a_hieduc'] = $this->input->post('a_hieduc');

			$acc['a_updateddate'] = date('Y-m-d h:i:s');
			$acc['a_updatedby'] = $this->session->userdata('a_empno');

			$pi['pi_birthdate'] = $this->input->post('pi_birthdate');
			$pi['pi_birthplace'] = $this->input->post('pi_birthplace');
			$pi['pi_gender'] = $this->input->post('pi_gender');
			$pi['pi_status'] = $this->input->post('pi_status');
			$pi['pi_citizenship'] = $this->input->post('pi_citizenship');
			$pi['pi_height'] = $this->input->post('pi_height');
			$pi['pi_weight'] = $this->input->post('pi_weight');
			$pi['pi_bloodtype'] = $this->input->post('pi_bloodtype');
			$pi['pi_gsis'] = $this->input->post('pi_gsis');
			$pi['pi_pagibig'] = $this->input->post('pi_pagibig');
			$pi['pi_philhealth'] = $this->input->post('pi_philhealth');
			$pi['pi_sss'] = $this->input->post('pi_sss');
			$pi['pi_resstreet'] = $this->input->post('pi_resstreet');
			$pi['pi_resbrgy'] = $this->input->post('pi_resbrgy');
			$pi['pi_rescity'] = $this->input->post('pi_rescity');
			$pi['pi_resprov'] = $this->input->post('pi_resprov');
			$pi['pi_reszip'] = $this->input->post('pi_reszip');
			$pi['pi_resprov'] = $this->input->post('pi_resprov');
			$pi['pi_resphone'] = $this->input->post('pi_resphone');
			$pi['pi_permstreet'] = $this->input->post('pi_permstreet');
			$pi['pi_permbrgy'] = $this->input->post('pi_permbrgy');
			$pi['pi_permcity'] = $this->input->post('pi_permcity');
			$pi['pi_permprov'] = $this->input->post('pi_permprov');
			$pi['pi_permzip'] = $this->input->post('pi_permzip');
			$pi['pi_permphone'] = $this->input->post('pi_permphone');
			$pi['pi_email'] = $this->input->post('pi_email');
			$pi['pi_phone'] = $this->input->post('pi_phone');
			$pi['pi_tin'] = $this->input->post('pi_tin');

			$pi['pi_addeddate'] = date('Y-m-d h:i:s');
			$pi['pi_addedby'] = $this->session->userdata('a_empno');

			if($a_id = $this->mdl_employee->m_add_new_employee($acc)){

				if($this->mdl_employee->m_add_new_employee_personal($pi,$a_id)){
					$this->mdl_employee->m_add_new_employee_familybg($a_id);
						$result = array('status' => 'yes','content'=> 'New Employee successfully saved!','a_id' =>$a_id);
						echo json_encode($result);
						exit();
				}
			}else{
				$result = array('status' => 'no','content'=> 'Failed to save new employee');
						echo json_encode($result);
						exit();

			}
		}else{
			redirect('user');
		}
	}

	// Update Child Information
	public function edit_child_info(){
		if($this->session->userdata('a_id') !== null){

			$child['c_fname'] = $this->input->post('c_fname');
			$child['c_mi'] = $this->input->post('c_mi');
			$child['c_lname'] = $this->input->post('c_lname');
			$child['c_extname'] = $this->input->post('c_extname');
			$child['c_birthdate'] = $this->input->post('c_birthdate');
			$c_id = $this->input->post('c_id');

			if($this->mdl_employee->m_update_child_info($child,$c_id)){
				$result = array('status' => 'yes','content'=> 'Child Information Successfully Updated');
					echo json_encode($result);
					exit();
			}else{
				$result = array('status' => 'no','content'=> 'Child Information Failed Updated');
					echo json_encode($result);
					exit();
			}
		}else{
			redirect('user');
		}
	}

	// Update Education Information
	public function update_employee_educ(){
		if($this->session->userdata('a_id') !== null){

			$e_id = $this->input->post('e_id');
			$educ['pi_level'] = $this->input->post('pi_level');
			$educ['pi_schoolname'] = $this->input->post('pi_schoolname');
			$educ['pi_degree'] = $this->input->post('pi_degree');
			$educ['pi_yrgrad'] = $this->input->post('pi_yrgrad');
			$educ['pi_from'] = $this->input->post('pi_from');
			$educ['pi_to'] = $this->input->post('pi_to');
			$educ['pi_honors'] = $this->input->post('pi_honors');
			$educ['e_type'] = $this->input->post('e_type');
			$educ['e_sector'] = $this->input->post('e_sector');

			if($this->mdl_employee->m_update_employee_educ($educ,$e_id)){
				$result = array('status' => 'yes','content'=> 'Education Information Successfully Updated');
					echo json_encode($result);
					exit();
			}else{
				$result = array('status' => 'no','content'=> 'Education Information Failed Updated');
					echo json_encode($result);
					exit();
			}
		}else{
			redirect('user');
		}
	}


	// Update Eligibility Information
	public function update_employee_elig(){
		if($this->session->userdata('a_id') !== null){
			$el_id = $this->input->post('m_el_id');
			//$elig['pi_level'] = $this->input->post('pi_level');
			$elig['el_type'] = $this->input->post('m_el_type');
			$elig['el_career'] = $this->input->post('m_el_career');
			$elig['el_rating'] = $this->input->post('m_el_rating');
			$elig['el_examdate'] = $this->input->post('m_el_examdate');
			$elig['el_examplace'] = $this->input->post('m_el_examplace');
			$elig['el_number'] = $this->input->post('m_el_number');
			$elig['el_daterelease'] = $this->input->post('m_el_daterelease');

			$elig['el_updateddate'] = date('Y-m-d h:i:s');
			$elig['el_updatedby'] = $this->session->userdata('a_empno');

			if($this->mdl_employee->m_update_employee_elig($elig,$el_id)){
				$result = array('status' => 'yes','content'=> 'Eligibility Information Successfully Updated');
					echo json_encode($result);
					exit();
			}else{
				$result = array('status' => 'no','content'=> 'm_update_employee_elig Information Failed Updated');
					echo json_encode($result);
					exit();
			}
		}else{
			redirect('user');
		}
	}


	// Update Work Information
	public function update_employee_work(){
		if($this->session->userdata('a_id') !== null){

			$w_id = $this->input->post('m_w_id');
			//$elig['pi_level'] = $this->input->post('pi_level');
			$work['p_from'] = $this->input->post('m_p_from');
			$work['p_to'] = $this->input->post('m_p_to');
			$work['p_position'] = $this->input->post('m_p_position');
			$work['p_company'] = $this->input->post('m_p_company');
			$work['p_salarymonthly'] = $this->input->post('m_p_salarymonthly');
			$work['p_salarygrade'] = $this->input->post('m_p_salarygrade');
			$work['p_salarystep'] = $this->input->post('m_p_salarystep');
			$work['p_appointment'] = $this->input->post('m_p_appointment');
			$work['p_isgovt'] = $this->input->post('m_p_isgovt');

			$work['p_editdate'] = date('Y-m-d h:i:s');
			$work['p_editby'] = $this->session->userdata('a_empno');

			if($this->mdl_employee->m_update_employee_work($work,$w_id)){
				$result = array('status' => 'yes','content'=> 'Work Information Successfully Updated');
					echo json_encode($result);
					exit();
			}else{
				$result = array('status' => 'no','content'=> 'Work Information Failed Updated');
					echo json_encode($result);
					exit();
			}
		}else{
			redirect('user');
		}
	}


	// Update Work Information
	public function update_employee_vol_work(){
		if($this->session->userdata('a_id') !== null){
			$vw_id = $this->input->post('m_vw_id');
			$vol_work['vw_id'] = $this->input->post('m_vw_id');
			$vol_work['vw_name'] = $this->input->post('m_vw_name');
			$vol_work['vw_address'] = $this->input->post('m_vw_address');
			$vol_work['vw_datefrom'] = $this->input->post('m_vw_datefrom');
			$vol_work['vw_dateto'] = $this->input->post('m_vw_dateto');
			$vol_work['vw_nohours'] = $this->input->post('m_vw_nohours');
			$vol_work['vw_work'] = $this->input->post('m_vw_work');

			$vol_work['vw_updateddate'] = date('Y-m-d h:i:s');
			$vol_work['vw_updatedby'] = $this->session->userdata('a_empno');

			if($this->mdl_employee->m_update_employee_vol_work($vol_work,$vw_id)){
				$result = array('status' => 'yes','content'=> 'Voluntary Work Information Successfully Updated');
					echo json_encode($result);
					exit();
			}else{
				$result = array('status' => 'no','content'=> 'Work Information Failed Updated');
					echo json_encode($result);
					exit();
			}
		}else{
			redirect('user');
		}
	}

	// Update Work Information
	public function update_employee_training(){
		if($this->session->userdata('a_id') !== null){
			$t_id = $this->input->post('m_t_id');
			$training['t_id'] = $this->input->post('m_t_id');
			$training['t_seminar'] = $this->input->post('m_t_seminar');
			$training['t_from'] = $this->input->post('m_t_from');
			$training['t_to'] = $this->input->post('m_t_to');
			$training['t_hoursno'] = $this->input->post('m_t_hoursno');
			$training['t_conductor'] = $this->input->post('m_t_conductor');
			$training['t_relevant'] = $this->input->post('m_t_relevant');


			$training['t_updateddate'] = date('Y-m-d h:i:s');
			$training['t_updatedby'] = $this->session->userdata('a_empno');

			if($this->mdl_employee->m_update_employee_training($training,$t_id)){
				$result = array('status' => 'yes','content'=> 'Training Information Successfully Updated');
					echo json_encode($result);
					exit();
			}else{
				$result = array('status' => 'no','content'=> 'Training Information Failed Updated');
					echo json_encode($result);
					exit();
			}
		}else{
			redirect('user');
		}
	}



	// Update Employee Skills
	public function update_employee_skills(){
		if($this->session->userdata('a_id') !== null){

			$sh_id = $this->input->post('m_sh_id');
			//$skills['sh_id'] = $this->input->post('m_sh_id');
			$skills['sh_skills'] = $this->input->post('m_sh_skills');
			$skills['sh_nonacademic'] = $this->input->post('m_sh_nonacademic');
			$skills['sh_membership'] = $this->input->post('m_sh_membership');

			$skills['sh_updateddate'] = date('Y-m-d h:i:s');
			$skills['sh_updatedby'] = $this->session->userdata('a_empno');

			if($this->mdl_employee->m_update_employee_skills($skills,$sh_id)){
				$result = array('status' => 'yes','content'=> 'Skills Information Successfully Updated');
					echo json_encode($result);
					exit();
			}else{
				$result = array('status' => 'no','content'=> 'Skills Information Failed Updated');
					echo json_encode($result);
					exit();
			}
		}else{
			redirect('user');
		}
	}

	// Update Employee Skills
	public function update_employee_reff(){
		if($this->session->userdata('a_id') !== null){
			$r_id = $this->input->post('m_r_id');
			//$skills['sh_id'] = $this->input->post('m_sh_id');
			$reff['r_name'] = $this->input->post('m_r_name');
			$reff['r_address'] = $this->input->post('m_r_address');
			$reff['r_contactnum'] = $this->input->post('m_r_contactnum');

			$reff['r_updateddate'] = date('Y-m-d h:i:s');
			$reff['r_updatedby'] = $this->session->userdata('a_empno');

			if($this->mdl_employee->m_update_employee_reff($reff,$r_id)){
				$result = array('status' => 'yes','content'=> 'Reference Information Successfully Updated');
					echo json_encode($result);
					exit();
			}else{
				$result = array('status' => 'no','content'=> 'Reference Information Failed Updated');
					echo json_encode($result);
					exit();
			}
		}else{
			redirect('user');
		}
	}

	public function asaveimage($id = null){
		//	$folder = $this->session->userdata('accountId').'_'.$this->session->userdata('firstname').' '.$this->session->userdata('lastname');
		if($this->session->userdata('a_id') !== null){

			if($this->input->post('pic') == 1){

				$emp_id = $this->input->post('hid_id');
				$fullname = $this->input->post('hid_fullname');

				if (!file_exists('pds_image/'.$emp_id)) {
					mkdir('pds_image/'.$emp_id, 0777, true);
				}


				$dataimage = $this->input->post('userpics');

				$newimage=	explode('[removed]',$dataimage);
				$me = 'data:image/png;base64,'.$newimage[0];
				$img = str_replace('data:image/png;base64,', '', $me);
				$img = str_replace(' ', '+', $img);
				$data = base64_decode($img);
				$file = 'pds_image/'.$emp_id.'/'.$emp_id.'.png';
				$success = file_put_contents($file, $data);
				//print $success ? $file : 'Unable to save the file.';
				$result = array('status' => 'yes','content'=> 'Picture was successfully updated!');
				echo json_encode($result);
				exit;
			}else{
				$result = array('status' => 'no','content'=> 'Picture was successfully FAILED!');
				echo json_encode($result);
				exit;

			}
		}else{
			redirect('user');
		}
	}

	public function savesignature(){
		if($this->session->userdata('a_id') !== null){
			if ($this->input->post('sigImage') == 1){
				$emp_id = $this->input->post('emp_id');
				if (!file_exists('pds_image/'.$emp_id)) {
					mkdir('pds_image/'.$emp_id, 0777, true);
				}
				$signature = $this->input->post('sigImageData');
				//$newimage=	explode('[removed]',$dataimage);
				$me = 'data:image/png;base64,'.$signature;
				$img = str_replace('data:image/png;base64,', '', $me);
				$img = str_replace(' ', '+', $img);
				$data = base64_decode($img);
				$file = 'pds_image/'.$emp_id.'/'.$emp_id.'_signature'.'.jpg';
				$success = file_put_contents($file, $data);
				//print $success ? $file : 'Unable to save the file.';
				$result = array('status' => 'yes','content'=> 'Signature was successfully updated!');
				echo json_encode($result);
				exit;
			}
		}else{
			redirect('user');
		}
	}

	public function delete_employee_child(){
		if($this->session->userdata('a_id') !== null){
			$field = 'c_id';
			$where = $this->input->post('m_c_id');
			$table = 'tbl_children';

			if($this->mdl_employee->m_delete($where,$table,$field)){
				$result = array('status' => 'yes','content'=> 'Successfully Deleted!');
					echo json_encode($result);
					exit;
			}else{
					$result = array('status' => 'no','content'=> 'Failed to Delete!');
					echo json_encode($result);
					exit;
			}
		}else{
			redirect('user');
		}
	}

	public function delete_employee_educ(){
		if($this->session->userdata('a_id') !== null){
			$field = 'e_id';
			$where = $this->input->post('m_e_id');
			$table = 'tbl_educbg';

			if($this->mdl_employee->m_delete($where,$table,$field)){
				$result = array('status' => 'yes','content'=> 'Successfully Deleted!');
					echo json_encode($result);
					exit;
			}else{
					$result = array('status' => 'no','content'=> 'Failed to Delete!');
					echo json_encode($result);
					exit;
			}
		}else{
			redirect('user');
		}
	}

	public function delete_employee_elig(){
		if($this->session->userdata('a_id') !== null){
			$field = 'el_id';
			$where = $this->input->post('m_el_id');
			$table = 'tbl_eligibility';

			if($this->mdl_employee->m_delete($where,$table,$field)){
				$result = array('status' => 'yes','content'=> 'Successfully Deleted!');
					echo json_encode($result);
					exit;
			}else{
					$result = array('status' => 'no','content'=> 'Failed to Delete!');
					echo json_encode($result);
					exit;
			}
		}else{
			redirect('user');
		}
	}

	public function delete_employee_work_exp(){
		if($this->session->userdata('a_id') !== null){
			$field = 'w_id';
			$where = $this->input->post('m_w_id');
			$table = 'tbl_workinfo';

			if($this->mdl_employee->m_delete($where,$table,$field)){
				$result = array('status' => 'yes','content'=> 'Successfully Deleted!');
					echo json_encode($result);
					exit;
			}else{
					$result = array('status' => 'no','content'=> 'Failed to Delete!');
					echo json_encode($result);
					exit;
			}
		}else{
			redirect('user');
		}
	}

	public function delete_employee_vol_work(){
		if($this->session->userdata('a_id') !== null){

			$field = 'vw_id';
			$where = $this->input->post('m_vw_id');
			$table = 'tbl_voluntarywork';

			if($this->mdl_employee->m_delete($where,$table,$field)){
				$result = array('status' => 'yes','content'=> 'Successfully Deleted!');
					echo json_encode($result);
					exit;
			}else{
					$result = array('status' => 'no','content'=> 'Failed to Delete!');
					echo json_encode($result);
					exit;
			}
		}else{
			redirect('user');
		}
	}

	public function delete_employee_training(){
		if($this->session->userdata('a_id') !== null){
			$field = 't_id';
			$where = $this->input->post('m_t_id');
			$table = 'tbl_training';

			if($this->mdl_employee->m_delete($where,$table,$field)){
				$result = array('status' => 'yes','content'=> 'Successfully Deleted!');
					echo json_encode($result);
					exit;
			}else{
					$result = array('status' => 'no','content'=> 'Failed to Delete!');
					echo json_encode($result);
					exit;
			}
		}else{
			redirect('user');
		}
	}
	public function delete_employee_skills(){
		if($this->session->userdata('a_id') !== null){
			$field = 'sh_id';
			$where = $this->input->post('m_sh_id');
			$table = 'tbl_skills_hobbies';

			if($this->mdl_employee->m_delete($where,$table,$field)){
				$result = array('status' => 'yes','content'=> 'Successfully Deleted!');
					echo json_encode($result);
					exit;
			}else{
					$result = array('status' => 'no','content'=> 'Failed to Delete!');
					echo json_encode($result);
					exit;
			}
		}else{
			redirect('user');
		}
	}
	public function delete_employee_reff(){
		if($this->session->userdata('a_id') !== null){
			$field = 'r_id';
			$where = $this->input->post('m_r_id');
			$table = 'tbl_reference';

			if($this->mdl_employee->m_delete($where,$table,$field)){
				$result = array('status' => 'yes','content'=> 'Successfully Deleted!');
					echo json_encode($result);
					exit;
			}else{
					$result = array('status' => 'no','content'=> 'Failed to Delete!');
					echo json_encode($result);
					exit;
			}
		}else{
			redirect('user');
		}
	}

	public function get_forapproval_children(){
		if($this->session->userdata('a_id') !== null){
			$data['title'] = 'For Approval';
			$data['content'] = 'employee/v_childforapproval';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_forapproval_children(){
		if($this->session->userdata('a_id') !== null){
			$result = $this->mdl_employee->m_get_forapproval_children();
			$data['result_child'] = $result['result'];
			echo json_encode($data['result_child']);
			exit;
		}else{
			redirect('user');
		}
	}

	public function get_forapproval_education(){
		if($this->session->userdata('a_id') !== null){
			$data['title'] = 'For Approval';
			$data['content'] = 'employee/v_educationforapproval';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}


	public function apply_approved_child_changes(){
		if($this->session->userdata('a_id') !== null){
														//					UPDATE
			$table = 'tbl_children'; 						//table				table
			$field_update = 'c_forapproval';				// field_update		set_field
			$value = 0; 									//value				value
			$where_field = 'c_id'; 							// where field		where
			$where_value = $this->input->post('m_c_id'); 	// where			where_value

			if($this->input->post('m_c_forapproval') == '3'){
				// Approved Delete -- Delete the Record
				if($this->mdl_employee->m_apply_delete($table,$where_field,$where_value)){
					$result = array('status' => 'yes','content'=> 'Record Deleted!');
						echo json_encode($result);
						exit;
				}else{
						$result = array('status' => 'no','content'=> 'Failed to approved employee changes!');
						echo json_encode($result);
						exit;
				}

			}else{
					// Set c_forapproval to 0
					if($this->mdl_employee->m_apply_approved($table,$field_update,$value,$where_field,$where_value)){
						$result = array('status' => 'yes','content'=> 'Changes succe approved!');
							echo json_encode($result);
							exit;
					}else{
							$result = array('status' => 'no','content'=> 'Failed to approved employee changes!');
							echo json_encode($result);
							exit;
					}

			}
		}else{
			redirect('user');
		}
	}

	public function ajax_get_forapproval_education(){
		if($this->session->userdata('a_id') !== null){
			$result = $this->mdl_employee->m_get_forapproval_education();
			$data['result_child'] = $result['result'];
			echo json_encode($data['result_child']);
			exit;
		}else{
			redirect('user');
		}
	}
	public function apply_approved_education_changes(){
		if($this->session->userdata('a_id') !== null){
														//					UPDATE
			$table = 'tbl_educbg'; 							//table				table
			$field_update = 'pi_forapproval';				// field_update		set_field
			$value = 0; 									//value				value
			$where_field = 'e_id'; 							// where field		where
			$where_value = $this->input->post('m_e_id'); 	// where			where_value

			if($this->input->post('m_pi_forapproval') == '3'){
				// Approved Delete -- Delete the Record
				if($this->mdl_employee->m_apply_delete($table,$where_field,$where_value)){
					$result = array('status' => 'yes','content'=> 'Record Deleted!');
						echo json_encode($result);
						exit;
				}else{
						$result = array('status' => 'no','content'=> 'Failed to approved employee changes!');
						echo json_encode($result);
						exit;
				}

			}else{
					// Set c_forapproval to 0
					if($this->mdl_employee->m_apply_approved($table,$field_update,$value,$where_field,$where_value)){
						$result = array('status' => 'yes','content'=> 'Changes succe approved!');
							echo json_encode($result);
							exit;
					}else{
							$result = array('status' => 'no','content'=> 'Failed to approved employee changes!');
							echo json_encode($result);
							exit;
					}
			}
		}else{
			redirect('user');
		}
	}


	public function get_forapproval_eligibility(){
		if($this->session->userdata('a_id') !== null){
			$data['title'] = 'For Approval';
			$data['content'] = 'employee/v_eligibilityforapproval';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_forapproval_eligibility(){
		if($this->session->userdata('a_id') !== null){
			$result = $this->mdl_employee->m_get_forapproval_eligibility();
			$data['result_child'] = $result['result'];
			echo json_encode($data['result_child']);
			exit;
		}else{
			redirect('user');
		}
	}

	public function apply_approved_eligibility_changes(){
		if($this->session->userdata('a_id') !== null){												//					UPDATE
			$table = 'tbl_eligibility'; 							//table				table
			$field_update = 'el_forapproval';				// field_update		set_field
			$value = 0; 									//value				value
			$where_field = 'el_id'; 							// where field		where
			$where_value = $this->input->post('m_el_id'); 	// where			where_value

			if($this->input->post('m_el_forapproval') == '3'){
				// Approved Delete -- Delete the Record
				if($this->mdl_employee->m_apply_delete($table,$where_field,$where_value)){
					$result = array('status' => 'yes','content'=> 'Record Deleted!');
						echo json_encode($result);
						exit;
				}else{
						$result = array('status' => 'no','content'=> 'Failed to approved employee changes!');
						echo json_encode($result);
						exit;
				}

			}else{
					// Set c_forapproval to 0
					if($this->mdl_employee->m_apply_approved($table,$field_update,$value,$where_field,$where_value)){
						$result = array('status' => 'yes','content'=> 'Changes succe approved!');
							echo json_encode($result);
							exit;
					}else{
							$result = array('status' => 'no','content'=> 'Failed to approved employee changes!');
							echo json_encode($result);
							exit;
					}
			}
		}else{
			redirect('user');
		}
	}

	// Work Experience

	public function get_forapproval_workexp(){
		if($this->session->userdata('a_id') !== null){
			$data['title'] = 'For Approval';
			$data['content'] = 'employee/v_workexpforapproval';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_forapproval_workexp(){
		if($this->session->userdata('a_id') !== null){
			$result = $this->mdl_employee->m_get_forapproval_workexp();
			$data['result_child'] = $result['result'];
			echo json_encode($data['result_child']);
			exit;
		}else{
			redirect('user');
		}
	}

	public function apply_approved_workexp_changes(){
		if($this->session->userdata('a_id') !== null){
														//					UPDATE
			$table = 'tbl_workinfo'; 							//table				table
			$field_update = 'p_forapproval';				// field_update		set_field
			$value = 0; 									//value				value
			$where_field = 'w_id'; 							// where field		where
			$where_value = $this->input->post('m_w_id'); 	// where			where_value

			if($this->input->post('m_p_forapproval') == '3'){
				// Approved Delete -- Delete the Record
				if($this->mdl_employee->m_apply_delete($table,$where_field,$where_value)){
					$result = array('status' => 'yes','content'=> 'Record Deleted!');
						echo json_encode($result);
						exit;
				}else{
						$result = array('status' => 'no','content'=> 'Failed to approved employee changes!');
						echo json_encode($result);
						exit;
				}

			}else{
					// Set c_forapproval to 0
					if($this->mdl_employee->m_apply_approved($table,$field_update,$value,$where_field,$where_value)){
						$result = array('status' => 'yes','content'=> 'Changes succe approved!');
							echo json_encode($result);
							exit;
					}else{
							$result = array('status' => 'no','content'=> 'Failed to approved employee changes!');
							echo json_encode($result);
							exit;
					}
			}
		}else{
			redirect('user');
		}
	}
	// End Work Experience


	// Voluntary Work Experience

	public function get_forapproval_volworkexp(){
		if($this->session->userdata('a_id') !== null){
			$data['title'] = 'For Approval';
			$data['content'] = 'employee/v_volworkexpforapproval';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_forapproval_volworkexp(){
		if($this->session->userdata('a_id') !== null){
			$result = $this->mdl_employee->m_get_forapproval_volworkexp();
			$data['result_child'] = $result['result'];
			echo json_encode($data['result_child']);
			exit;
		}else{
			redirect('user');
		}
	}

	public function apply_approved_volworkexp_changes(){
		if($this->session->userdata('a_id') !== null){
															//					UPDATE
			$table = 'tbl_voluntarywork'; 					//table				table
			$field_update = 'vw_forapproval';				// field_update		set_field
			$value = 0; 									//value				value
			$where_field = 'vw_id'; 						// where field		where
			$where_value = $this->input->post('m_vw_id'); 	// where			where_value

			if($this->input->post('m_vw_forapproval') == '3'){
				// Approved Delete -- Delete the Record
				if($this->mdl_employee->m_apply_delete($table,$where_field,$where_value)){
					$result = array('status' => 'yes','content'=> 'Record Deleted!');
						echo json_encode($result);
						exit;
				}else{
						$result = array('status' => 'no','content'=> 'Failed to approved employee changes!');
						echo json_encode($result);
						exit;
				}

			}else{
					// Set c_forapproval to 0
					if($this->mdl_employee->m_apply_approved($table,$field_update,$value,$where_field,$where_value)){
						$result = array('status' => 'yes','content'=> 'Changes succe approved!');
							echo json_encode($result);
							exit;
					}else{
							$result = array('status' => 'no','content'=> 'Failed to approved employee changes!');
							echo json_encode($result);
							exit;
					}
			}
		}else{
			redirect('user');
		}
	}
	// End Work Experience



	// Training
	public function get_forapproval_training(){
		if($this->session->userdata('a_id') !== null){
			$data['title'] = 'For Approval';
			$data['content'] = 'employee/v_trainingforapproval';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_forapproval_training(){
		if($this->session->userdata('a_id') !== null){
			$result = $this->mdl_employee->m_get_forapproval_training();
			$data['result_child'] = $result['result'];
			echo json_encode($data['result_child']);
			exit;
		}else{
			redirect('user');
		}
	}

	public function apply_approved_training_changes(){
		if($this->session->userdata('a_id') !== null){
															//					UPDATE
			$table = 'tbl_training'; 					//table				table
			$field_update = 't_forapproval';				// field_update		set_field
			$value = 0; 									//value				value
			$where_field = 't_id'; 						// where field		where
			$where_value = $this->input->post('m_t_id'); 	// where			where_value

			if($this->input->post('m_t_forapproval') == '3'){
				// Approved Delete -- Delete the Record
				if($this->mdl_employee->m_apply_delete($table,$where_field,$where_value)){
					$result = array('status' => 'yes','content'=> 'Record Deleted!');
						echo json_encode($result);
						exit;
				}else{
						$result = array('status' => 'no','content'=> 'Failed to approved employee changes!');
						echo json_encode($result);
						exit;
				}

			}else{
					// Set c_forapproval to 0
					if($this->mdl_employee->m_apply_approved($table,$field_update,$value,$where_field,$where_value)){
						$result = array('status' => 'yes','content'=> 'Changes succe approved!');
							echo json_encode($result);
							exit;
					}else{
							$result = array('status' => 'no','content'=> 'Failed to approved employee changes!');
							echo json_encode($result);
							exit;
					}
			}
		}else{
			redirect('user');
		}
	}
	// End Training



	// Skills
	public function get_forapproval_skills(){
		if($this->session->userdata('a_id') !== null){
			$data['title'] = 'For Approval';
			$data['content'] = 'employee/v_skillsforapproval';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_forapproval_skills(){
		if($this->session->userdata('a_id') !== null){
			$result = $this->mdl_employee->m_get_forapproval_skills();
			$data['result_child'] = $result['result'];
			echo json_encode($data['result_child']);
			exit;
		}else{
			redirect('user');
		}
	}

	public function apply_approved_skills_changes(){
		if($this->session->userdata('a_id') !== null){
														//					UPDATE
			$table = 'tbl_skills_hobbies'; 					//table				table
			$field_update = 'sh_forapproval';				// field_update		set_field
			$value = 0; 									//value				value
			$where_field = 'sh_id'; 						// where field		where
			$where_value = $this->input->post('m_sh_id'); 	// where			where_value

			if($this->input->post('m_sh_forapproval') == '3'){
				// Approved Delete -- Delete the Record
				if($this->mdl_employee->m_apply_delete($table,$where_field,$where_value)){
					$result = array('status' => 'yes','content'=> 'Record Deleted!');
						echo json_encode($result);
						exit;
				}else{
						$result = array('status' => 'no','content'=> 'Failed to approved employee changes!');
						echo json_encode($result);
						exit;
				}

			}else{
					// Set c_forapproval to 0
					if($this->mdl_employee->m_apply_approved($table,$field_update,$value,$where_field,$where_value)){
						$result = array('status' => 'yes','content'=> 'Changes succe approved!');
							echo json_encode($result);
							exit;
					}else{
							$result = array('status' => 'no','content'=> 'Failed to approved employee changes!');
							echo json_encode($result);
							exit;
					}
			}
		}else{
			redirect('user');
		}
	}
	// End Training

	// Skills
	public function get_forapproval_reff(){
		if($this->session->userdata('a_id') !== null){

			$data['title'] = 'For Approval';
			$data['content'] = 'employee/v_reffforapproval';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_forapproval_reff(){
		if($this->session->userdata('a_id') !== null){
			$result = $this->mdl_employee->m_get_forapproval_reff();
			$data['result_child'] = $result['result'];
			echo json_encode($data['result_child']);
			exit;
		}else{
			redirect('user');
		}
	}

	public function apply_approved_reff_changes(){
		if($this->session->userdata('a_id') !== null){
													//					UPDATE
			$table = 'tbl_reference'; 					//table				table
			$field_update = 'r_forapproval';				// field_update		set_field
			$value = 0; 									//value				value
			$where_field = 'r_id'; 						// where field		where
			$where_value = $this->input->post('m_r_id'); 	// where			where_value

			if($this->input->post('m_r_forapproval') == '3'){
				// Approved Delete -- Delete the Record
				if($this->mdl_employee->m_apply_delete($table,$where_field,$where_value)){
					$result = array('status' => 'yes','content'=> 'Record Deleted!');
						echo json_encode($result);
						exit;
				}else{
						$result = array('status' => 'no','content'=> 'Failed to approved employee changes!');
						echo json_encode($result);
						exit;
				}

			}else{
					// Set c_forapproval to 0
					if($this->mdl_employee->m_apply_approved($table,$field_update,$value,$where_field,$where_value)){
						$result = array('status' => 'yes','content'=> 'Changes succe approved!');
							echo json_encode($result);
							exit;
					}else{
							$result = array('status' => 'no','content'=> 'Failed to approved employee changes!');
							echo json_encode($result);
							exit;
					}
			}
		}else{
			redirect('user');
		}
	}
	// End Training


	// All Count
	public function ajax_count_forapproval_reff(){
		if($this->session->userdata('a_id') !== null){
			if($result = $this->mdl_employee->m_get_forapproval_reff()){
				$result = array('count' => $result['count']);
				echo '['.json_encode($result).']';
				exit;
			}else{
				$result = array('count' => 0);
				echo '['.json_encode($result).']';
				exit;
			}
		}else{
			redirect('user');
		}
	}
	public function ajax_count_forapproval_skills(){
		if($this->session->userdata('a_id') !== null){
			if($result = $this->mdl_employee->m_get_forapproval_skills()){
				$result = array('count' => $result['count']);
				echo '['.json_encode($result).']';
				exit;
			}else{
				$result = array('count' => 0);
				echo '['.json_encode($result).']';
				exit;
			}
		}else{
			redirect('user');
		}
	}
	public function ajax_count_forapproval_training(){
		if($this->session->userdata('a_id') !== null){
			if($result = $this->mdl_employee->m_get_forapproval_training()){
				$result = array('count' => $result['count']);
				echo '['.json_encode($result).']';
				exit;
			}else{
				$result = array('count' => 0);
				echo '['.json_encode($result).']';
				exit;
			}
		}else{
			redirect('user');
		}
	}
	public function ajax_count_forapproval_volworkexp(){
		if($this->session->userdata('a_id') !== null){
			if($result = $this->mdl_employee->m_get_forapproval_volworkexp()){
				$result = array('count' => $result['count']);
				echo '['.json_encode($result).']';
				exit;
			}else{
				$result = array('count' => 0);
				echo '['.json_encode($result).']';
				exit;
			}
		}else{
			redirect('user');
		}
	}
	public function ajax_count_forapproval_workexp(){
		if($this->session->userdata('a_id') !== null){
			if($result = $this->mdl_employee->m_get_forapproval_workexp()){
				$result = array('count' => $result['count']);
				echo '['.json_encode($result).']';
				exit;
			}else{
				$result = array('count' => 0);
				echo '['.json_encode($result).']';
				exit;
			}
		}else{
			redirect('user');
		}
	}
	public function ajax_count_forapproval_eligibility(){
		if($this->session->userdata('a_id') !== null){
			if($result = $this->mdl_employee->m_get_forapproval_eligibility()){
				$result = array('count' => $result['count']);
				echo '['.json_encode($result).']';
				exit;
			}else{
				$result = array('count' => 0);
				echo '['.json_encode($result).']';
				exit;
			}
		}else{
			redirect('user');
		}
	}
	public function ajax_count_forapproval_education(){
		if($this->session->userdata('a_id') !== null){
			if($result = $this->mdl_employee->m_get_forapproval_education()){
				$result = array('count' => $result['count']);
				echo '['.json_encode($result).']';
				exit;
			}else{
				$result = array('count' => 0);
				echo '['.json_encode($result).']';
				exit;
			}
		}else{
			redirect('user');
		}
	}
	public function ajax_count_forapproval_children(){
		if($this->session->userdata('a_id') !== null){
			if($result = $this->mdl_employee->m_get_forapproval_children()){
				$result = array('count' => $result['count']);
				echo '['.json_encode($result).']';
				exit;
			}else{
				$result = array('count' => 0);
				echo '['.json_encode($result).']';
				exit;
			}
		}else{
			redirect('user');
		}
	}

	public function ajax_get_employee(){
		if($this->session->userdata('a_id') !== null){
			$a_office = strtolower($this->input->post('a_office'));
			$a_division = strtolower($this->input->post('a_division'));
			$a_status = strtolower($this->input->post('a_status'));

			// $a_office = '13';
			// $a_division =  '97';
			// $a_status =  'PERMANENT';

			$employee = $this->mdl_employee->ajax_m_get_employee($a_office,$a_division,$a_status);
			echo json_encode($employee);
			exit;
		}else{
			redirect('user');
		}
	}

	public function service_record(){
		if($this->session->userdata('a_id') !== null){
			$data['title'] = 'Employee Service Record';
			$data['content'] = 'employee/v_servicerecord';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_servicerecord($a_id){
		if($this->session->userdata('a_id') !== null){

			$service_record = $this->mdl_employee->ajax_m_get_servicerecord($a_id);
			echo json_encode($service_record);
			exit;
		}else{
			redirect('user');
		}
	}

	public function ajax_get_employee_list(){
		if($this->session->userdata('a_id') !== null){

			$emp_list = $this->mdl_employee->m_get_employee_list();
			echo json_encode($emp_list);
			exit;
		}else{
			redirect('user');
		}
	}

		//list service record per employee
	public function list_service_record(){
		if($this->session->userdata('a_id') !== null){
			$id = $this->input->post('a_id');
			if ($result = $this->mdl_employee->m_get_list_servicerecord($id)) {
				echo json_encode($result);
			}
		}else{
			redirect('user');
		}
	}

	public function ajax_save_service_record(){
		if($this->session->userdata('a_id') !== null){

			if($this->input->post('w_id') != '' || $this->input->post('w_id') != NULL){

					$w_id = $this->input->post('w_id');
					$a_id = $this->input->post('a_id');
					$svr['p_position'] = $this->input->post('p_position');
					$svr['p_from'] = $this->input->post('p_from');
					$svr['p_to'] = $this->input->post('p_to');
					$svr['p_company'] = $this->input->post('p_company');
					$svr['p_salarygrade'] = $this->input->post('p_salarygrade');
					$svr['p_appointment'] = $this->input->post('p_appointment');
					// $svr['p_salarymonthly'] = $this->input->post('p_salarymonthly');
					$p_salarymonthly = str_replace('₱ ','',$this->input->post('p_salarymonthly'));
					$svr['p_salarymonthly'] = str_replace(',','',$p_salarymonthly);
					// echo $svr['p_salarymonthly'];
					// die();
					$svr['p_salarystep'] = $this->input->post('p_salarystep');
					$svr['p_dept'] = $this->input->post('p_dept');
					$svr['p_div'] = $this->input->post('p_div');
					// $svr['p_lwop'] = $this->input->post('p_lwop');
					// $svr['p_sept_date'] = $this->input->post('p_sept_date');
					if($this->input->post('p_lwop') == ''){
						$svr['p_lwop'] = (NULL);
					}else{
						$svr['p_lwop'] = $this->input->post('p_lwop');
					}
					if($this->input->post('p_sept_date') == ''){
						$svr['p_sept_date'] = (NULL);
					}else{
						$svr['p_sept_date'] = $this->input->post('p_sept_date');
					}
					$svr['p_sept_cause'] = $this->input->post('p_sept_cause');
					$svr['p_note_remarks'] = $this->input->post('p_note_remarks');

					$svr['p_editby'] = $this->session->userdata('a_id');
					$svr['p_editdate'] = date('Y-m-d');

					$svr['p_isgovt'] = 'yes';
					$svr['p_isservicerecord'] = 'yes';

				if($this->mdl_employee->m_ajax_update_service_record($svr,$w_id,$a_id)){
						$result = array('status' => 'yes','content'=> 'Service Record Successfully Updated');
						echo json_encode($result);
						exit;
				}else{
						$result = array('status' => 'no','content'=> 'Failed to update service record!');
						echo json_encode($result);
						exit;
				}

			}else{
					$svr['a_id'] = $this->input->post('a_id');
					$svr['p_position'] = $this->input->post('p_position');
					$svr['p_from'] = $this->input->post('p_from');
					$svr['p_to'] = $this->input->post('p_to');
					$svr['p_company'] = $this->input->post('p_company');
					$svr['p_salarygrade'] = $this->input->post('p_salarygrade');
					$svr['p_appointment'] = $this->input->post('p_appointment');

					$p_salarymonthly = str_replace('₱ ','',$this->input->post('p_salarymonthly'));
					$svr['p_salarymonthly'] = str_replace(',','',$p_salarymonthly);

					$svr['p_salarystep'] = $this->input->post('p_salarystep');
					$svr['p_dept'] = $this->input->post('p_dept');
					$svr['p_div'] = $this->input->post('p_div');
					if($this->input->post('p_lwop') == ''){
						$svr['p_lwop'] = (NULL);
					}else{
						$svr['p_lwop'] = $this->input->post('p_lwop');
					}
					if($this->input->post('p_sept_date') == ''){
						$svr['p_sept_date'] = (NULL);
					}else{
						$svr['p_sept_date'] = $this->input->post('p_sept_date');
					}
					// $svr['p_sept_date'] = $this->input->post('p_sept_date');
					$svr['p_sept_cause'] = $this->input->post('p_sept_cause');
					$svr['p_note_remarks'] = $this->input->post('p_note_remarks');

					$svr['p_addedby'] = $this->session->userdata('a_id');
					$svr['p_addeddate'] = date('Y-m-d');

					$svr['p_isgovt'] = 'yes';
					$svr['p_isservicerecord'] = 'yes';

				if($this->mdl_employee->m_ajax_save_service_record($svr)){
						$result = array('status' => 'yes','content'=> 'New Service Record Saved!');
						echo json_encode($result);
						exit;
				}else{
						$result = array('status' => 'no','content'=> 'Failed to submit service record!');
						echo json_encode($result);
						exit;
				}
			}
		}else{
			redirect('user');
		}
	}
	// m_get_leave_forapprovalm_get_leave_forapproval

	public function leave_for_approval(){
		if($this->session->userdata('a_id') !== null){
			$data['title'] = 'Employee';
			$data['content'] = 'employee/v_leaveforapproval';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}

	public function ajax_get_leave_forapproval(){
		if($this->session->userdata('a_id') !== null){
			$result = $this->mdl_employee->m_get_leave_forapproval();
				echo json_encode($result);
		}else{
			redirect('user');
		}
	}


	public function ajax_count_leave_forapproval(){
		if($this->session->userdata('a_id') !== null){
			if($result = $this->mdl_employee->m_count_leave_forapproval()){
				$result = array('count' => $result);
				echo '['.json_encode($result).']';
				exit;
			}else{
				$result = array('count' => 0);
				echo '['.json_encode($result).']';
				exit;
			}
		}else{
			redirect('user');
		}
	}

	public function disapproved_leave(){
		if($this->session->userdata('a_id') !== null){

			$l_id = $this->input->post('m_l_id',TRUE);
			// $l_disapprovereason = $this->input->post('m_l_disapprovereason',TRUE);
			if($this->mdl_employee->m_disapproved_leave($l_id)){
					$result = array('status' => 'yes','content'=> 'Leave successfully disapproved!');
					echo json_encode($result);
					exit;
			}else{
					$result = array('status' => 'no','content'=> 'Failed to disapproved leave request!');
					echo json_encode($result);
					exit;
			}
		}else{
			redirect('user');
		}
	}

	public function approved_leave(){
		if($this->session->userdata('a_id') !== null){

			$l_id = $this->input->post('m_l_id',TRUE);
			if($this->mdl_employee->approved_leave($l_id)){
					$result = array('status' => 'yes','content'=> 'Leave successfully Approved!');
					echo json_encode($result);
					exit;
			}else{
					$result = array('status' => 'no','content'=> 'Failed to Approved leave request!');
					echo json_encode($result);
					exit;
			}
		}else{
			redirect('user');
		}
	}

	function step_increment(){
		if($this->session->userdata('a_id') !== null){
			if($this->session->userdata('a_id') !== null){
				$data['title'] = 'Employee - Step Increment';
				$data['content'] = 'employee/v_stepincrement';
				$this->load->view('layouts/v_master', $data);
			}else{
				redirect('user');
			}
		}else{
			redirect('user');
		}
	}

	function ajax_get_candidate_for_step_increment(){
		if($this->session->userdata('a_id') !== null){
			$result = $this->mdl_employee->m_get_candidate_for_step_increment();
			echo json_encode($result);
		}else{
			redirect('user');
		}
	}

	function ajax_step_increment(){
		if($this->session->userdata('a_id') !== null){
			if($this->input->post('p_effectivitydate') != ''){
			//Multiple Value
				$p_effectivitydate 	= $this->input->post('p_effectivitydate');
				$w 					= $this->input->post('w');
				$count_w 			= count($w);
				$new_sv 			= array();
				$w_id				= '0';

				for($i = 0; $i < $count_w; $i++){
					$w_id .= ','.$w[$i];
				}

			// $w_id = str_replace('0','',$val);
			// echo $w_id;
			// die();
				if($old_sv = $this->mdl_employee->m_get_sv($w_id,$p_effectivitydate)){

				// Arrange the new service record values
					$sv_error = '0';
					$del_w_id = array();
					$del_w_id[] = '0';
					foreach($old_sv as $r){
						if($r->check_record == 'YES'){

							$del_w_id[] = $r->w_id;
							$sv_error .= ' & '.$r->emp_name;

						}else{
							$new_sv[] = '(
									"'. $r->a_id .'",
									"'. $p_effectivitydate .'",
									"'. $r->p_position .'",
									"'. $r->p_salarygrade .'",
									"'. $r->p_salarystep.'",
									"'. $r->p_salarymonthly.'",
									"'. $r->p_appointment.'",
									"'. $r->p_dept.'",
									"'. $r->p_div.'",
									"'. $r->p_company.'",
									"'. 'YES'.'",
									"'. 'YES'.'",
									"'. $p_effectivitydate.'",
									"'.'STEP-INCREMENT'.'",
									"'.$this->session->userdata('a_empno').'",
									"'.date('Y-m-d').'"
							 )';
						}
					}


					// echo '<pre>';
					// print_r($new_sv);
					// echo '-------------------';
					// echo $sv_error;
					// die();
				}else{
					$result = array('status' => 'no','content'=> 'No Selected Service Record');
							echo json_encode($result);
							exit;
				}

			// Update Service Record
				$p_to = date('Y-m-d', strtotime('-1 day', strtotime($p_effectivitydate)));

				$myArray = explode(',', $w_id);
				$new = array_diff($myArray, $del_w_id);
				$new_w_id = '0';

				foreach($new as $n){
					$new_w_id .= ','.$n;
				}
				$new_w_id = str_replace('0,','',$new_w_id);
				$sv_error = str_replace('0 &','',$sv_error);
				// echo $new_w_id.'<br/>';


				// print_r($new_sv);
				// echo $sv_error;
				// die();



				// die();
				if($sv_error != 0){
					$sv_error_notify = 'no';
				}else{
					$sv_error_notify = 'yes';
				}
				// echo $sv_error;

				if(!empty($new_sv)){
					// $sv_error_notify = 'no';
					// print_r($del_w_id);
					// echo $sv_error_notify;
					// die();
					if($this->mdl_employee->m_update_sv($new_w_id,$p_to)){
						if($this->mdl_employee->m_save_new_sv($new_sv)){

								$result = array('status' => 'yes',
												'content'=> 'Service Record Successfully Updated!',
												'sv_error_notify' => $sv_error_notify,
												'names'=> 'Please check the record/s of '.$sv_error.'!');
								echo json_encode($result);
								exit;
						}else{
								$result = array('status' => 'no',
												'content'=> 'Service Record Failed Updated!',
												'sv_error_notify' =>  $sv_error_notify,
												'names'=> 'Please check the record/s of '.$sv_error.'!');
								echo json_encode($result);
								exit;
						}
					}else{
								$result = array('status' => 'no',
												'content'=> 'Service Record Failed Updated!',
												'sv_error_notify' => $sv_error_notify,
												'names'=> 'Please check the record/s of '.$sv_error.'!');
								echo json_encode($result);
								exit;
					}
				}else{

					// print_r($del_w_id);
					// echo $sv_error_notify;
					// die();
						$result = array('status' => 'no',
										'content'=> 'Service Record Failed Updated! ',
										'sv_error_notify' =>  $sv_error_notify,
										'names'=> 'Please check the record/s of '.$sv_error.'!');
								echo json_encode($result);
								exit;
				}

			}else{
				$result = array('status' => 'no','content'=> 'Please enter Effectivity Date');
						echo json_encode($result);
						exit;
			}
		}else{
			redirect('user');
		}
	}

	public function for_verification(){
		if($this->session->userdata('a_id') !== null){
			$data['title'] = 'Employee';
			$data['content'] = 'employee/v_leaveforverification';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}
	public function ajax_get_leave_for_verification(){
		if($this->session->userdata('a_id') !== null){
			$result = $this->mdl_employee->m_get_leave_for_verification();
				echo json_encode($result);
		}else{
			redirect('user');
		}
	}
	public function ajax_save_slvl(){
		if($this->session->userdata('a_id') !== null){
			$l_id = $this->input->post('l_id');
			$slvl['l_vl'] = $this->input->post('l_vl');
			$slvl['l_sl'] = $this->input->post('l_sl');
			$slvl['l_asof'] = $this->input->post('l_asof');
			if($l_id != ''){
				if($this->mdl_employee->m_save_slvl($l_id,$slvl)){
					$result = array('status' => 'yes','content'=> 'SL & VL Successfully SAVE!');
						echo json_encode($result);
						exit;
				}else{
					$result = array('status' => 'no','content'=> 'Failed to save SL and VL');
						echo json_encode($result);
						exit;
				}
			}else{
				$result = array('status' => 'no','content'=> 'No Selected Leave');
						echo json_encode($result);
						exit;
			}
		}else{
			redirect('user');
		}
	}

	public function change_password(){
		if($this->session->userdata('a_id') !== null){
			$data['title'] = 'Admin - Change Password';
			$data['content'] = 'employee/v_changepassword';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}

	public function update_password(){
		if($this->session->userdata('a_id') !== null){
			$a_id = $this->session->userdata('a_id');
			if($this->input->post('password') == $this->input->post('password2')){
				if($this->mdl_employee->m_update_password($a_id,$this->input->post('password'))){
					$result = array('status' => 'yes','content'=> 'Password Successfully Updated');
					echo json_encode($result);
					exit();
				}else{
					$result = array('status' => 'no','content'=> 'Password failed to updated');
					echo json_encode($result);
					exit();
				}
			}else{
				$result = array('status' => 'no','content'=> 'Password did not match');
				echo json_encode($result);
				exit();
			}
		}else{
			redirect('user');
		}
	}

	public function delete_servicerecord(){
		if($this->session->userdata('a_id') !== null){
			$m_is_svr = $this->input->post('m_is_svr');
			$m_w_id = $this->input->post('m_w_id');

			// echo $m_is_svr.'<br/>';
			// echo $m_w_id;
			// die();
			if($m_is_svr== '1'){
				if($this->mdl_employee->m_delete_servicerecord($m_w_id)){
					$result = array('status' => 'yes','content'=> 'Service record deleted');
					echo json_encode($result);
					exit();
				}else{
					$result = array('status' => 'no','content'=> 'Failed to delete service record!');
					echo json_encode($result);
					exit();
				}
			}else{
				$result = array('status' => 'no','content'=> 'No service record selected ');
					echo json_encode($result);
					exit();
			}
		}else{
			redirect('user');
		}

	}


	public function ajax_save_worktype(){
		if($this->session->userdata('a_id') !== null){
			if($this->input->post('ajax') == 1){
			//Multiple Value
				$w_type 	= $this->input->post('w_type');
				$w 			= $this->input->post('w');
				$count_w 	= count($w);
				$new_sv 	= array();
				$w_id		= '0';

				for($i = 0; $i < $count_w; $i++){
					$w_id .= ','.$w[$i];
				}

				// echo $w_id;
				// echo $w_type ;
				// die();

				if($this->mdl_employee->m_update_workinfo($w_id,$w_type)){
					$result = array('status' => 'yes','content'=> 'Work experience successfully updated');
					echo json_encode($result);
					exit();
				}else{
					$result = array('status' => 'no','content'=> 'Failed to update work experience!');
					echo json_encode($result);
					exit();
				}

			}else{
				$result = array('status' => 'no','content'=> 'ACCESS NOT ALLOWED');
						echo json_encode($result);
						exit;
			}
		}else{
			redirect('user');
		}
	}


	public function ajax_save_trainingtype(){
		if($this->session->userdata('a_id') !== null){
			if($this->input->post('ajax') == 1){
			//Multiple Value
				$t_type 	= $this->input->post('t_type');
				$t 			= $this->input->post('t');
				$count_t 	= count($t);
				$new_sv 	= array();
				$t_id		= '0';

				for($i = 0; $i < $count_t; $i++){
					$t_id .= ','.$t[$i];
				}

				if($this->mdl_employee->m_update_trainingtype($t_id,$t_type)){
					$result = array('status' => 'yes','content'=> 'Training successfully updated');
					echo json_encode($result);
					exit();
				}else{
					$result = array('status' => 'no','content'=> 'Failed to update training!');
					echo json_encode($result);
					exit();
				}

			}else{
				$result = array('status' => 'no','content'=> 'ACCESS NOT ALLOWED');
						echo json_encode($result);
						exit;
			}
		}else{
			redirect('user');
		}
	}

	public function ajax_save_eligibilitytype(){
		if($this->session->userdata('a_id') !== null){
			if($this->input->post('ajax') == 1){
			//Multiple Value
				$el_type 	= $this->input->post('el_type');
				$el 			= $this->input->post('el');
				$count_el 	= count($el);
				$new_sv 	= array();
				$el_id		= '0';

				for($i = 0; $i < $count_el; $i++){
					$el_id .= ','.$el[$i];
				}

				if($this->mdl_employee->m_update_eligibilitytype($el_id,$el_type)){
					$result = array('status' => 'yes','content'=> 'Training successfully updated');
					echo json_encode($result);
					exit();
				}else{
					$result = array('status' => 'no','content'=> 'Failed to update training!');
					echo json_encode($result);
					exit();
				}

			}else{
				$result = array('status' => 'no','content'=> 'ACCESS NOT ALLOWED');
						echo json_encode($result);
						exit;
			}
		}else{
			redirect('user');
		}
	}

	public function ajax_resetpassword(){
		if($this->session->userdata('a_id') !== null){
			$a_id = $this->input->get('a_id');
			if($this->mdl_employee->m_reset_password($a_id)){
				$result = array('status' => 'yes','content'=> 'Password successfully reset!');
					echo json_encode($result);
			}else{
				$result = array('status' => 'no','content'=> 'Failed to reset password!');
						echo json_encode($result);
			}
		}else{
			redirect('user');
		}
	}

}
