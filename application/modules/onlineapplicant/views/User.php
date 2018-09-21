<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_user');
		$this->load->library('form_validation');
	}
	
	//** NOTE **//
	// 0 - Approved
	// 1 - New / Added
	// 2 - Updated / Edited
	// 3 - Removed / Deleted

	public function index()
	{
		$data['error'] = 0;	
		if($_POST){
			if($this->input->post('username') && $this->input->post('password')){	
				 $username = $this->input->post('username');
				 $password = $this->input->post('password');
				if($result = $this->mdl_user->m_login($username,$password)){
					
					foreach($result as $a)
					{
						$a_id = $a->a_id;
						$this->session->set_userdata('a_empno',$a->a_empno);
						$this->session->set_userdata('a_machineid',$a->a_machineid);
						$this->session->set_userdata('a_eld',$a->a_eld);
						$this->session->set_userdata('a_id',$a->a_id);
						if($alternate_sig = $this->mdl_user->m_checkif_alternate($a->a_id)){
							foreach($alternate_sig as $o){
								$this->session->set_userdata('main',$o->o_head_id);
								$this->session->set_userdata('o_head_name',$o->o_head_name);
								$this->session->set_userdata('solutation',$o->pi_gender);
								$this->session->set_userdata('isalternate','yes');
							}
						}else{
							$this->session->set_userdata('isalternate','no');
						}
						
						$this->session->set_userdata('a_mi',$a->a_mi);
						$this->session->set_userdata('a_namext',$a->a_namext);
						$this->session->set_userdata('a_middlename',$a->a_middlename);
						$this->session->set_userdata('a_firstname',$a->a_firstname);
						$this->session->set_userdata('a_lastname',$a->a_lastname);
						$this->session->set_userdata('a_status',$a->a_status);
                        $this->session->set_userdata('pi_gender',$a->pi_gender);
                        $this->session->set_userdata('a_deptlocation',$a->a_deptlocation);
						$this->session->set_userdata('a_division',$a->a_division);
						$this->session->set_userdata('a_position',$a->a_position);
						$this->session->set_userdata('a_level',$a->a_level);
						$this->session->set_userdata('a_officetype',$a->a_officetype);

					}
					
					if($this->session->userdata('a_status') != 'HR_ERROR'){
						if($this->mdl_user->m_check_password_changed($a_id)){
							$is_pword = '0';
							$result = array('status' => 'yes','content'=> 'Successfully Login','is_pword' => $is_pword);
							echo json_encode($result);
							exit();
						}else{
							$is_pword = '1';
							$result = array('status' => 'yes','content'=> 'Successfully Login','is_pword' => $is_pword);
							echo json_encode($result);
							exit();
						}
					}else{
							$this->session->sess_destroy();
							$result = array('status' => 'no','content'=> 'Please Contact HR Officer to check your details / Service Record');
							echo json_encode($result);
							exit();
					}

				}else{
					$result = array('status' => 'no','content'=> 'User credentials failed!');
					echo json_encode($result);
					exit();
				}
			}else{
				$data['title'] = 'Employee';
				$data['content'] = 'user/v_employee_login';
				$this->load->view('layouts/v_master', $data);
			}
		}else{
			if($this->session->userdata('a_id')){
				redirect('user/account');
			}else{
				$data['title'] = 'Employee';
				$data['content'] = 'user/v_employee_login';
				$this->load->view('layouts/v_master', $data);
			}
		}
	}
	
		
	public function change_password(){
			$data['title'] = 'Employee - Change Password';
			$data['content'] = 'user/v_changepassword';
			$this->load->view('layouts/v_master', $data);
	}
	
	public function update_password(){
		$a_id = $this->session->userdata('a_id');
		if($this->input->post('password') === $this->input->post('password2')){
			
			$password = $this->input->post('password');
			
			if($this->mdl_user->m_update_password($a_id,$password)){
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
		
	}
	
	
	public function account(){
		if($this->session->userdata('a_id')){
			$a_id = $this->session->userdata('a_id');
			$data['result'] 	= $this->mdl_user->m_get_emp_info($a_id);
			$data['familly'] 	= $this->mdl_user->m_get_emp_familly($a_id);
			$data['children'] 	= $this->mdl_user->m_get_emp_children($a_id);
			$data['education'] 	= $this->mdl_user->m_get_emp_education($a_id);
			$data['training'] 	= $this->mdl_user->m_get_emp_training($a_id);
			$data['eligibility'] = $this->mdl_user->m_get_emp_eligibility($a_id);
			$data['skills'] 	= $this->mdl_user->m_get_emp_skills($a_id);
			$data['char_reff']	= $this->mdl_user->m_get_emp_char($a_id);
			$data['vol_work'] 	= $this->mdl_user->m_get_emp_vol_work($a_id);
			$data['work_exp'] 	= $this->mdl_user->m_get_emp_work_exp($a_id);
			$data['q_answer'] 	= $this->mdl_user->m_get_emp_q_answer($a_id);
			$data['dept']	 	= $this->mdl_user->m_get_office();
			$data['div'] 		= $this->mdl_user->m_get_all_division();
			$data['position'] 	= $this->mdl_user->m_get_position();
			
			$data['title'] = 'Employee - Change Password';
			$data['content'] = 'user/v_edit_info';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('user');
	}


	public function ajax_get_position(){
		$result = $this->mdl_user->m_get_position();
		echo json_encode($result);
	}
	
	public function ajax_get_office(){
		$result = $this->mdl_user->m_get_office();
		echo json_encode($result);
	}

	public function ajax_get_division(){
		//if ($this->input->post('search') == 1 ){
			$dept = $this->input->post('sel_office');
			$result = $this->mdl_user->m_get_division($dept);
			echo json_encode($result);
		//}
	}

	public function ajax_get_division1(){
		//if ($this->input->post('search') == 1 ){
			$dept = $this->input->post('sel_office');
			$result = $this->mdl_user->m_get_division1($dept);
			echo json_encode($result);
		//}
	}

	public function ajax_get_hielig(){
		$result = $this->mdl_user->m_get_hielig();
		echo json_encode($result);
	}
	
	public function edit_employee($a_id){
		$data['result'] = $this->mdl_user->m_get_emp_info($a_id);
		$data['familly'] = $this->mdl_user->m_get_emp_familly($a_id);
		$data['children'] = $this->mdl_user->m_get_emp_children($a_id);
		$data['education'] = $this->mdl_user->m_get_emp_education($a_id);
		$data['training'] = $this->mdl_user->m_get_emp_training($a_id);
		$data['eligibility'] = $this->mdl_user->m_get_emp_eligibility($a_id);
		$data['skills'] = $this->mdl_user->m_get_emp_skills($a_id);
		$data['char_reff'] = $this->mdl_user->m_get_emp_char($a_id);
		$data['vol_work'] = $this->mdl_user->m_get_emp_vol_work($a_id);
		$data['work_exp'] = $this->mdl_user->m_get_emp_work_exp($a_id);
		$data['q_answer'] = $this->mdl_user->m_get_emp_q_answer($a_id);
		$data['dept'] = $this->mdl_user->m_get_office();
		$data['div'] = $this->mdl_user->m_get_all_division();
		$data['position'] = $this->mdl_user->m_get_position();
		$data['title'] = 'Edit Employee';
		$data['content'] = 'employee/v_edit_info';
		$this->load->view('layouts/v_master', $data);	
	}
	
	public function update_employee_personal_info(){
		
		// $acc['a_empno'] = $this->input->post('a_empno'); //disabled on View
		$acc['a_firstname'] = $this->input->post('a_firstname');
		$acc['a_middlename'] = $this->input->post('a_middlename');
		$acc['a_mi'] = $this->input->post('a_mi');
		$acc['a_lastname'] = $this->input->post('a_lastname');
		$acc['a_namext'] = $this->input->post('a_namext');
		// $acc['a_fdos'] = $this->input->post('a_fdos');			 //disabled on View
		// $acc['a_status'] = $this->input->post('a_status');			 //disabled on View
		// $acc['a_position'] = $this->input->post('a_position');			 //disabled on View
		// $acc['a_office'] = $this->input->post('a_office');			 //disabled on View
		// $acc['a_division'] = $this->input->post('a_division');			 //disabled on View
		// $acc['a_salarygrade'] = $this->input->post('a_salarygrade');			 //disabled on View
		// $acc['a_salarystep'] = $this->input->post('a_salarystep');			 //disabled on View
		// $acc['a_level'] = $this->input->post('a_level');			 //disabled on View
		$acc['a_hielig'] = $this->input->post('a_hielig');
		$acc['a_hieduc'] = $this->input->post('a_hieduc');
		
		$acc['a_updateddate'] = date('Y-m-d h:i:s');
		$acc['a_updatedby'] = $this->session->userdata('a_machineid');
		
		$pi['pi_birthdate'] = $this->input->post('pi_birthdate');
		$pi['pi_birthplace'] = $this->input->post('pi_birthplace');
		$pi['pi_gender'] = $this->input->post('pi_gender');
		$pi['pi_status'] = $this->input->post('pi_status');
		$pi['pi_citizenship'] = $this->input->post('pi_citizenship');
		$pi['pi_height'] = $this->input->post('pi_height');
		$pi['pi_weight'] = $this->input->post('pi_weight');
		$pi['pi_bloodtype'] = $this->input->post('pi_bloodtype');
		// $pi['pi_gsis'] = $this->input->post('pi_gsis');					 //disabled on View
		// $pi['pi_pagibig'] = $this->input->post('pi_pagibig');					 //disabled on View
		// $pi['pi_philhealth'] = $this->input->post('pi_philhealth');					 //disabled on View
		// $pi['pi_sss'] = $this->input->post('pi_sss');					 //disabled on View
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
		$pi['pi_updatedby'] = $this->session->userdata('a_machineid');
		
		$a_id = $this->input->post('a_id');
		
		if($this->mdl_user->m_update_employee_personal_info($acc,$pi,$a_id)){
			
			$result = array('status' => 'yes','content'=> 'Update successfully saved!');
			echo json_encode($result);
			exit();
		}
	}		
	
	public function update_employee_familly(){
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
		
		$fmly['fb_updateddate'] = date('Y-m-d h:i:s');
		$fmly['fb_updatedby'] = $this->session->userdata('a_machineid');
		
		
		$a_id = $this->input->post('a_id');
		if($this->mdl_user->m_update_update_employee_familly($fmly,$a_id)){
			$result = array('status' => 'yes','content'=> 'Update successfully saved!');
			echo json_encode($result);
			exit();
		}
	}
	
	public function add_employee_familybg(){
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
		
		$fmly['fb_addeddate'] = date('Y-m-d h:i:s');
		$fmly['fb_addedby'] = $this->session->userdata('a_machineid');
		
		$fmly['a_id'] = $this->input->post('a_id');
		
		if($this->mdl_user->m_add_employee_familly($fmly)){
			$result = array('status' => 'yes','content'=> 'Update successfully saved!');
			echo json_encode($result);
			exit();
		}
	}
	
	public function add_employee_child(){
		$child['c_fname'] = $this->input->post('c_fname');
		$child['c_mi'] = $this->input->post('c_mi');
		$child['c_lname'] = $this->input->post('c_lname');
		$child['c_extname'] = $this->input->post('c_extname');
		$child['c_birthdate'] = $this->input->post('c_birthdate');
		$child['a_id'] = $this->input->post('a_id');
		
		$child['c_addeddate'] = date('Y-m-d h:i:s');
		$child['c_addedby'] = $this->session->userdata('a_machineid');
		
		$child['c_forapproval'] = '1';
		
		if($this->mdl_user->m_add_add_employee_child($child)){
			$result = array('status' => 'yes','content'=> 'Child Info successfully saved!');
			echo json_encode($result);
			exit();
		}else{
			$result = array('status' => 'no','content'=> 'Error occurred... Please contact the web developer...');
			echo json_encode($result);
			exit();
		}
	}
	
	public function add_employee_educ(){
		$educ['pi_level'] = $this->input->post('pi_level');
		$educ['pi_schoolname'] = $this->input->post('pi_schoolname');
		$educ['pi_degree'] = $this->input->post('pi_degree');
		$educ['pi_yrgrad'] = $this->input->post('pi_yrgrad');
		$educ['pi_from'] = $this->input->post('pi_from');
		$educ['pi_to'] = $this->input->post('pi_to');
		$educ['pi_honors'] = $this->input->post('pi_honors');
		$educ['a_id'] = $this->input->post('a_id');
		
		$educ['pi_addeddate'] = date('Y-m-d h:i:s');
		$educ['pi_addedby'] = $this->session->userdata('a_machineid');
		
		$educ['pi_forapproval'] = '1';
		
		if($this->mdl_user->m_add_add_employee_educ($educ)){
			$result = array('status' => 'yes','content'=> 'Educational Info successfully saved!');
			echo json_encode($result);
			exit();
		}else{
			$result = array('status' => 'no','content'=> 'Error occurred... Please contact the web developer...');
			echo json_encode($result);
			exit();
		}
	}
	
	public function add_employee_training(){
		$training['t_seminar'] = $this->input->post('t_seminar');
		$training['t_from'] = $this->input->post('t_from');
		$training['t_to'] = $this->input->post('t_to');
		$training['t_hoursno'] = $this->input->post('t_hoursno');
		$training['t_conductor'] = $this->input->post('t_conductor');
		$training['t_relevant'] = $this->input->post('t_relevant');

		$training['a_id'] = $this->input->post('a_id');
		$training['t_addeddate'] = date('Y-m-d h:i:s');
		$training['t_addedby'] = $this->session->userdata('a_machineid');
		
		$training['t_forapproval'] = '1';
		if($this->mdl_user->m_add_employee_training($training)){
			$result = array('status' => 'yes','content'=> 'Training Info successfully saved!');
			echo json_encode($result);
			exit();
		}else{
			$result = array('status' => 'no','content'=> 'Error occurred... Please contact the web developer...');
			echo json_encode($result);
			exit();
		}
	}
	
	public function add_employee_elig(){
		$elig['el_type'] = $this->input->post('el_type');
		$elig['el_career'] = $this->input->post('el_career');
		$elig['el_rating'] = $this->input->post('el_rating');
		$elig['el_examdate'] = $this->input->post('el_examdate');
		$elig['el_examplace'] = $this->input->post('el_examplace');
		$elig['el_number'] = $this->input->post('el_number');
		$elig['el_daterelease'] = $this->input->post('el_daterelease');


		$elig['a_id'] = $this->input->post('a_id');
		$elig['el_addeddate'] = date('Y-m-d h:i:s');
		$elig['el_addedby'] = $this->session->userdata('a_machineid');
		$elig['el_forapproval'] = '1';
		
		if($this->mdl_user->m_add_employee_elig($elig)){
			$result = array('status' => 'yes','content'=> 'Eligibility Info successfully saved!');
			echo json_encode($result);
			exit();
		}else{
			$result = array('status' => 'no','content'=> 'Error occurred... Please contact the web developer...');
			echo json_encode($result);
			exit();
		}
	}
	
	public function add_employee_work(){
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
		$work['p_addedby'] = $this->session->userdata('a_machineid');
		
		$work['p_forapproval'] = '1';
		if($this->mdl_user->m_add_employee_work($work)){
			$result = array('status' => 'yes','content'=> 'Work Experience Info successfully saved!');
			echo json_encode($result);
			exit();
		}else{
			$result = array('status' => 'no','content'=> 'Error occurred... Please contact the web developer...');
			echo json_encode($result);
			exit();
		}
	}	
	
	public function add_employee_vol_work(){
		$volwork['vw_name'] = $this->input->post('vw_name');
		$volwork['vw_address'] = $this->input->post('vw_address');
		$volwork['vw_datefrom'] = $this->input->post('vw_datefrom');
		$volwork['vw_dateto'] = $this->input->post('vw_dateto');
		$volwork['vw_nohours'] = $this->input->post('vw_nohours');
		$volwork['vw_work'] = $this->input->post('vw_work');


		$volwork['a_id'] = $this->input->post('a_id');
		$volwork['vw_addeddate'] = date('Y-m-d h:i:s');
		$volwork['vw_addedby'] = $this->session->userdata('a_machineid');
		
		$volwork['vw_forapproval'] = '1';
		
		if($this->mdl_user->m_add_employee_vol_work($volwork)){
			$result = array('status' => 'yes','content'=> 'Voluntary Work Experience Info successfully saved!');
			echo json_encode($result);
			exit();
		}else{
			$result = array('status' => 'no','content'=> 'Error occurred... Please contact the web developer...');
			echo json_encode($result);
			exit();
		}
	}	
	
	public function add_employee_skills(){
		$sh['sh_skills'] = $this->input->post('sh_skills');
		$sh['sh_nonacademic'] = $this->input->post('sh_nonacademic');
		$sh['sh_membership'] = $this->input->post('sh_membership');

		$sh['a_id'] = $this->input->post('a_id');
		$sh['sh_addeddate'] = date('Y-m-d h:i:s');
		$sh['sh_addedby'] = $this->session->userdata('a_machineid');
		$sh['sh_forapproval'] = '1';
		if($this->mdl_user->m_add_employee_skills($sh)){
			$result = array('status' => 'yes','content'=> 'Skills Info successfully saved!');
			echo json_encode($result);
			exit();
		}else{
			$result = array('status' => 'no','content'=> 'Error occurred... Please contact the web developer...');
			echo json_encode($result);
			exit();
		}
	}	
	

	
		public function update_employee_answers(){
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
		
		if($this->mdl_user->m_check_answers($a_id)){
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
			if($this->mdl_user->m_update_employee_answers($q_ans,$a_id)){
				$result = array('status' => 'yes','content'=> 'Answers successfully updated!');
				echo json_encode($result);
				exit();
			}else{
				$result = array('status' => 'no','content'=> 'Error occurred... Please contact the web developer...');
				echo json_encode($result);
				exit();
			}		
		}else{
			if($this->mdl_user->m_add_employee_answers($q_ans)){
				$result = array('status' => 'yes','content'=> 'Answers successfully saved!');
				echo json_encode($result);
				exit();
			}else{
				$result = array('status' => 'no','content'=> 'Error occurred... Please contact the web developer...');
				echo json_encode($result);
				exit();
			}
		}
	}
	
	public function add_employee_reff(){
		$reff['r_name'] = $this->input->post('r_name');
		$reff['r_address'] = $this->input->post('r_address');
		$reff['r_contactnum'] = $this->input->post('r_contactnum');

		$reff['a_id'] = $this->input->post('a_id');
		$reff['r_addeddate'] = date('Y-m-d h:i:s');
		$reff['r_addedby'] = $this->session->userdata('a_machineid');
		$reff['r_forapproval'] = '1';
		if($this->mdl_user->m_add_employee_reff($reff)){
			$result = array('status' => 'yes','content'=> 'Character Reference successfully saved!');
			echo json_encode($result);
			exit();
		}else{
			$result = array('status' => 'no','content'=> 'Error occurred... Please contact the web developer...');
			echo json_encode($result);
			exit();
		}
	}
	
	public function viewledger(){
		
			$data['a_id'] = $this->input->post('m_a_id');
			$data['b_year'] = $this->input->post('b_year');
			
			if($data['result'] = $this->mdl_user->m_search_record($data['a_id']) == false)
			{
				$data['is_result'] = 1;
			} else {				
				$data['result'] = $this->mdl_user->m_search_record($data['a_id']);
				$data['is_result'] = 0;
				
				foreach ($data['result'] as $r){
					$data['a_palayid'] =  $r->a_palayid;
				}
				
					$data['benefits'] = $this->mdl_user->m_search_benefits($data);
					$data['mandatory_benefits'] = $this->mdl_user->m_get_benefits($data);
					$data['insentives'] = $this->mdl_user->m_get_insentives($data);
					
					$data['title'] = 'Employee Ledger';
					// $data['content'] = 'employee/v_ledger';
					// $this->load->view('layouts/v_master',$data);
					
					$data['content'] = 'employee/v_ledger';
					$this->load->view('layouts/v_master', $data);	
					 
					//$result = array('status' => 'yes', 'content' => '<div class="alert alert-success">Please wait</div>');
					//echo json_encode($result);
			}
	}
	
	public function add_new(){
		$data['dept'] = $this->mdl_user->m_get_office();
		$data['div'] = $this->mdl_user->m_get_all_division();
		$data['position'] = $this->mdl_user->m_get_position();
		
		$data['title'] = 'Add New Employee';
		$data['content'] = 'employee/v_new_employee';
		$this->load->view('layouts/v_master', $data);	
	}
	
	public function add_new_employee(){
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
		$acc['a_salarygrade'] = $this->input->post('a_salarygrade');
		$acc['a_salarystep'] = $this->input->post('a_salarystep');
		$acc['a_level'] = $this->input->post('a_level');
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
		
		if($a_id = $this->mdl_user->m_add_new_employee($acc)){
			
			if($this->mdl_user->m_add_new_employee_personal($pi,$a_id)){
				$this->mdl_user->m_add_new_employee_familybg($a_id);
					$result = array('status' => 'yes','content'=> 'New Employee successfully saved!','a_id' =>$a_id);
					echo json_encode($result);
					exit();
			}
		}
	}
	
	// Update Child Information
	public function edit_child_info(){
		$child['c_fname'] = $this->input->post('c_fname');
		$child['c_mi'] = $this->input->post('c_mi');
		$child['c_lname'] = $this->input->post('c_lname');
		$child['c_extname'] = $this->input->post('c_extname');
		$child['c_birthdate'] = $this->input->post('c_birthdate');
		
		$child['c_updateddate'] = date('Y-m-d h:i:s');
		$child['c_updatedby'] = $this->session->userdata('a_machineid');
		$child['c_forapproval'] = '2';
		$c_id = $this->input->post('c_id');
		
		if($this->mdl_user->m_update_child_info($child,$c_id)){
			$result = array('status' => 'yes','content'=> 'Child Information Successfully Updated');
				echo json_encode($result);
				exit();
		}else{
			$result = array('status' => 'no','content'=> 'Child Information Failed Updated');
				echo json_encode($result);
				exit();
		}
	}	
	
	// Update Education Information
	public function update_employee_educ(){
		$e_id = $this->input->post('e_id');
		$educ['pi_level'] = $this->input->post('pi_level');
		$educ['pi_schoolname'] = $this->input->post('pi_schoolname');
		$educ['pi_degree'] = $this->input->post('pi_degree');
		$educ['pi_yrgrad'] = $this->input->post('pi_yrgrad');
		$educ['pi_from'] = $this->input->post('pi_from');
		$educ['pi_to'] = $this->input->post('pi_to');
		$educ['pi_honors'] = $this->input->post('pi_honors');
		
		$educ['pi_updateddate'] = date('Y-m-d h:i:s');
		$educ['pi_updatedby'] = $this->session->userdata('a_machineid');
		$educ['pi_forapproval'] = '2';

		if($this->mdl_user->m_update_employee_educ($educ,$e_id)){
			$result = array('status' => 'yes','content'=> 'Education Information Successfully Updated');
				echo json_encode($result);
				exit();
		}else{
			$result = array('status' => 'no','content'=> 'Education Information Failed Updated');
				echo json_encode($result);
				exit();
		}
	}
	
	
	// Update Eligibility Information
	public function update_employee_elig(){
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
		
		$elig['el_forapproval'] = '2';

		if($this->mdl_user->m_update_employee_elig($elig,$el_id)){
			$result = array('status' => 'yes','content'=> 'Eligibility Information Successfully Updated');
				echo json_encode($result);
				exit();
		}else{
			$result = array('status' => 'no','content'=> 'm_update_employee_elig Information Failed Updated');
				echo json_encode($result);
				exit();
		}
	}
	
	
	// Update Work Information
	public function update_employee_work(){
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
		$work['p_editby'] = $this->session->userdata('a_machineid');
		
		$work['p_forapproval'] = '2';

		if($this->mdl_user->m_update_employee_work($work,$w_id)){
			$result = array('status' => 'yes','content'=> 'Work Information Successfully Updated');
				echo json_encode($result);
				exit();
		}else{
			$result = array('status' => 'no','content'=> 'Work Information Failed Updated');
				echo json_encode($result);
				exit();
		}
	}
	
	
	// Update Work Information
	public function update_employee_vol_work(){
		$vw_id = $this->input->post('m_vw_id');
		$vol_work['vw_id'] = $this->input->post('m_vw_id');
		$vol_work['vw_name'] = $this->input->post('m_vw_name');
		$vol_work['vw_address'] = $this->input->post('m_vw_address');
		$vol_work['vw_datefrom'] = $this->input->post('m_vw_datefrom');
		$vol_work['vw_dateto'] = $this->input->post('m_vw_dateto');
		$vol_work['vw_nohours'] = $this->input->post('m_vw_nohours');
		$vol_work['vw_work'] = $this->input->post('m_vw_work');
		
		$vol_work['vw_updateddate'] = date('Y-m-d h:i:s');
		$vol_work['vw_updatedby'] = $this->session->userdata('a_machineid');
		
		$vol_work['vw_forapproval'] = '2';

		if($this->mdl_user->m_update_employee_vol_work($vol_work,$vw_id)){
			$result = array('status' => 'yes','content'=> 'Voluntary Work Information Successfully Updated');
				echo json_encode($result);
				exit();
		}else{
			$result = array('status' => 'no','content'=> 'Work Information Failed Updated');
				echo json_encode($result);
				exit();
		}
	}	
	
	// Update Work Information
	public function update_employee_training(){
		$t_id = $this->input->post('m_t_id');
		$training['t_id'] = $this->input->post('m_t_id');
		$training['t_seminar'] = $this->input->post('m_t_seminar');
		$training['t_from'] = $this->input->post('m_t_from');
		$training['t_to'] = $this->input->post('m_t_to');
		$training['t_hoursno'] = $this->input->post('m_t_hoursno');
		$training['t_conductor'] = $this->input->post('m_t_conductor');
		$training['t_relevant'] = $this->input->post('m_t_relevant');
		
		
		$training['t_updateddate'] = date('Y-m-d h:i:s');
		$training['t_updatedby'] = $this->session->userdata('a_machineid');
		$training['t_forapproval'] = '2';

		if($this->mdl_user->m_update_employee_training($training,$t_id)){
			$result = array('status' => 'yes','content'=> 'Training Information Successfully Updated');
				echo json_encode($result);
				exit();
		}else{
			$result = array('status' => 'no','content'=> 'Training Information Failed Updated');
				echo json_encode($result);
				exit();
		}
	}
	
	
	
	// Update Employee Skills
	public function update_employee_skills(){
		$sh_id = $this->input->post('m_sh_id');
		//$skills['sh_id'] = $this->input->post('m_sh_id');
		$skills['sh_skills'] = $this->input->post('m_sh_skills');
		$skills['sh_nonacademic'] = $this->input->post('m_sh_nonacademic');
		$skills['sh_membership'] = $this->input->post('m_sh_membership');

		$skills['sh_updateddate'] = date('Y-m-d h:i:s');
		$skills['sh_updatedby'] = $this->session->userdata('a_machineid');
		$skills['sh_forapproval'] = '2';

		if($this->mdl_user->m_update_employee_skills($skills,$sh_id)){
			$result = array('status' => 'yes','content'=> 'Skills Information Successfully Updated');
				echo json_encode($result);
				exit();
		}else{
			$result = array('status' => 'no','content'=> 'Skills Information Failed Updated');
				echo json_encode($result);
				exit();
		}
	}	
	
	// Update Employee Skills
	public function update_employee_reff(){
		$r_id = $this->input->post('m_r_id');
		//$skills['sh_id'] = $this->input->post('m_sh_id');
		$reff['r_name'] = $this->input->post('m_r_name');
		$reff['r_address'] = $this->input->post('m_r_address');
		$reff['r_contactnum'] = $this->input->post('m_r_contactnum');

		$reff['r_updateddate'] = date('Y-m-d h:i:s');
		$reff['r_updatedby'] = $this->session->userdata('a_machineid');
		$reff['r_forapproval'] = '2';

		if($this->mdl_user->m_update_employee_reff($reff,$r_id)){
			$result = array('status' => 'yes','content'=> 'Reference Information Successfully Updated');
				echo json_encode($result);
				exit();
		}else{
			$result = array('status' => 'no','content'=> 'Reference Information Failed Updated');
				echo json_encode($result);
				exit();
		}
	}
	
	public function asaveimage($id = null)
		{
		//	$folder = $this->session->userdata('accountId').'_'.$this->session->userdata('firstname').' '.$this->session->userdata('lastname');
			
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
		}
	
	public function savesignature(){
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
	}
	
	public function request_delete_employee_child(){
		$field = 'c_id';
		$where = $this->input->post('m_c_id');
		$table = 'tbl_children';
		$forapproval = '3';
		$forapproval_field = 'c_forapproval';
		
		if($this->mdl_user->m_request_delete($where,$table,$field,$forapproval_field,$forapproval)){
			$result = array('status' => 'yes','content'=> 'Request for delete success submitted!');
				echo json_encode($result);
				exit;
		}else{
				$result = array('status' => 'no','content'=> 'Failed to send request for delete!');
				echo json_encode($result);
				exit;	
		}
	}	
	
	public function request_delete_employee_educ(){
		$field = 'e_id';
		$where = $this->input->post('m_e_id');
		$table = 'tbl_educbg';
		$forapproval = '3';
		$forapproval_field = 'pi_forapproval';
		
		if($this->mdl_user->m_request_delete($where,$table,$field,$forapproval_field,$forapproval)){
			$result = array('status' => 'yes','content'=> 'Request for delete success submitted!');
				echo json_encode($result);
				exit;
		}else{
				$result = array('status' => 'no','content'=> 'Failed to send request for delete!');
				echo json_encode($result);
				exit;	
		}
	}	
	
	public function request_delete_employee_elig(){
		$field = 'el_id';
		$where = $this->input->post('m_el_id');
		$table = 'tbl_eligibility';
		$forapproval = '3';
		$forapproval_field = 'el_forapproval';
		
		if($this->mdl_user->m_request_delete($where,$table,$field,$forapproval_field,$forapproval)){
				$result = array('status' => 'yes','content'=> 'Request for delete success submitted!');
				echo json_encode($result);
				exit;
		}else{
				$result = array('status' => 'no','content'=> 'Failed to send request for delete!');
				echo json_encode($result);
				exit;	
		}
	}	
	public function user_delete_employee_work_exp(){
		$field = 'w_id';
		$where = $this->input->post('m_w_id');
		$table = 'tbl_workinfo';
		$forapproval = '3';
		$forapproval_field = 'p_forapproval';
		
		if($this->mdl_user->m_request_delete($where,$table,$field,$forapproval_field,$forapproval)){
				$result = array('status' => 'yes','content'=> 'Request for delete success submitted!');
				echo json_encode($result);
				exit;
		}else{
				$result = array('status' => 'no','content'=> 'Failed to send request for delete!');
				echo json_encode($result);
				exit;	
		}
	}	
	
	public function request_delete_employee_vol_work(){
		$field = 'vw_id';
		$where = $this->input->post('m_vw_id');
		$table = 'tbl_voluntarywork';
		$forapproval = 3;
		$forapproval_field = 'vw_forapproval';
		
		if($this->mdl_user->m_request_delete($where,$table,$field,$forapproval_field,$forapproval)){
				$result = array('status' => 'yes','content'=> 'Request for delete successfully submitted!');
				echo json_encode($result);
				exit;
		}else{
				$result = array('status' => 'no','content'=> 'Failed to send request for delete!');
				echo json_encode($result);
				exit;	
		}
	}
	
	public function request_delete_employee_training(){
		$field = 't_id';
		$where = $this->input->post('m_t_id');
		$table = 'tbl_training';
		$forapproval = 3;
		$forapproval_field = 't_forapproval';
		
		if($this->mdl_user->m_request_delete($where,$table,$field,$forapproval_field,$forapproval)){
				$result = array('status' => 'yes','content'=> 'Request for delete successfully submitted!');
				echo json_encode($result);
				exit;
		}else{
				$result = array('status' => 'no','content'=> 'Failed to send request for delete!');
				echo json_encode($result);
				exit;	
		}
	}	
	public function request_delete_employee_skills(){
		$field = 'sh_id';
		$where = $this->input->post('m_sh_id');
		$table = 'tbl_skills_hobbies';
		$forapproval = 3;
		$forapproval_field = 'sh_forapproval';
		
		if($this->mdl_user->m_request_delete($where,$table,$field,$forapproval_field,$forapproval)){
				$result = array('status' => 'yes','content'=> 'Request for delete successfully submitted!');
				echo json_encode($result);
				exit;
		}else{
				$result = array('status' => 'no','content'=> 'Failed to send request for delete!');
				echo json_encode($result);
				exit;	
		}
	}	
	public function request_delete_employee_reff(){
		$field = 'r_id';
		$where = $this->input->post('m_r_id');
		$table = 'tbl_reference';
		$forapproval = 3;
		$forapproval_field = 'r_forapproval';
		
		if($this->mdl_user->m_request_delete($where,$table,$field,$forapproval_field,$forapproval)){
				$result = array('status' => 'yes','content'=> 'Request for delete successfully submitted!');
				echo json_encode($result);
				exit;
		}else{
				$result = array('status' => 'no','content'=> 'Failed to send request for delete!');
				echo json_encode($result);
				exit;	
		}
	}
	
	public function ajax_get_request_details(){
		$result = $this->mdl_user->m_get_pending_request($this->session->userdata('a_id'));
		echo json_encode($result);
		// exit();
	}
	public function request_document(){
			$data['result'] = $this->mdl_user->m_get_pending_request($this->session->userdata('a_id'));
			$data['title'] = 'Employee';
			$data['content'] = 'user/v_request';
			$this->load->view('layouts/v_master', $data);
	}	
	
	public function save_request(){
		$req['a_id'] = $this->session->userdata('a_id');
		$req['r_type'] = $this->input->post('r_type');
		$req['r_noofcopy'] = $this->input->post('r_noofcopy');
		$req['r_purpose'] = $this->input->post('r_purpose');
		$req['r_datefiled'] = date('Y-m-d');
		if($this->mdl_user->m_save_request($req)){
				$result = array('status' => 'yes','content'=> 'Request successfully submitted!');
				echo json_encode($result);
				exit;
		}else{
				$result = array('status' => 'no','content'=> 'Failed to send request!');
				echo json_encode($result);
				exit;	
		}
	}
	
	public function file_leave(){
		// if alternate or signatory
			if($office = $this->mdl_user->m_get_office_signatory($this->session->userdata('a_id'))){
				foreach($office as $o){
					$data['o_head'] = strtolower($o->o_head);
				}
			}else{
				$data['o_head'] = 0;
			}
		// end if alternate or signatory
		
		
		// check if applicant is City Vice Mayor on tbl_defaults
		if($this->mdl_user->m_check_if_vice_mayor($this->session->userdata('a_id'))){
				$data['signatory'] = $this->mdl_user->m_get_vice_mayor_signatory($this->session->userdata('a_id'));
		}else{

			$data['signatory'] = $this->mdl_user->m_get_signatory($this->session->userdata('a_id'));
			
			
		}
		
		
		
			$data['title'] = 'Employee';
			$data['content'] = 'user/v_leaveapplication';
			$this->load->view('layouts/v_master', $data);
	}
	
	public function save_leave(){
		

			// get holidays
			$holidays = array();
			$result = $this->mdl_user->m_get_holidays();
			
			foreach($result as $r){
				array_push($holidays,$r->h_date); // first entry
			}
			
			
			$leave['a_id'] = $this->session->userdata('a_id');
			$leave['l_eld'] = $this->session->userdata('a_eld');
			$leave['l_agency'] = $this->input->post('l_agency');
			$leave['l_datefiled'] = date('Y-m-d'); // server time
			$leave['l_position'] = $this->input->post('l_position');
			$leave['l_status'] = $this->input->post('l_status');
			$leave['l_sg'] = $this->input->post('l_sg');
			$leave['l_type'] = $this->input->post('l_type');
			$leave['l_typespecify'] = $this->input->post('l_typespecify');
			$leave['l_disapprovereason'] = $this->input->post('l_disapprovereason');
			$leave['l_where'] = $this->input->post('l_where');
			$leave['l_remarks'] = $this->input->post('l_remarks');
			$leave['l_noofworkingdays'] = $this->input->post('l_noofworkingdays');
			$dates['l_from'] = $this->input->post('l_from');
			
			if(empty($this->input->post('l_to'))){
				$dates['l_to'] = $this->input->post('l_from');
			}else{
				$dates['l_to'] = $this->input->post('l_to');
			}
			
			if($dates['l_from'] == $dates['l_to']){
				$leave['l_inclusivedates'] =  $dates['l_from'];
			}else{
				$leave['l_inclusivedates'] =  $dates['l_from'].' to '.$dates['l_to'];
			}
			
			$leave['l_commutation'] = $this->input->post('l_commutation');
			$leave['l_div_sig'] = $this->input->post('l_div_sig');
			
			if($leave['l_div_sig'] == ''){
				$leave['l_statusdivision'] = 'Approved';
				$leave['l_div_action_date'] = date('Y-m-d');
			}
			if($leave['l_div_sig'] == 0){
				$leave['l_statusdivision'] = 'Approved';
				$leave['l_div_action_date'] = date('Y-m-d');
			}
			
			$leave['l_dept_sig'] = $this->input->post('l_dept_sig');
			$leave['l_asmayor'] = $this->input->post('l_asmayor');
			
			if(($leave['l_dept_sig'] == 0) || ($leave['l_dept_sig'] == $leave['a_id']) || ($leave['l_dept_sig'] == $this->session->userdata('a_id'))){
				$leave['l_statusdept'] = 'Approved';
				$leave['l_dept_action_date'] = date('Y-m-d');
			}else{
				$leave['l_dept_sig'] = $this->input->post('l_dept_sig');
			}
			
			
			if(($leave['l_div_sig'] == 0 || $leave['l_div_sig'] == '') &&  $leave['l_dept_sig'] == $leave['l_asmayor']){
				$leave['l_statusdept'] = 'Approved';
				$leave['l_dept_action_date'] = date('Y-m-d');
			}
			
			
			$leave['l_typeofapplication'] = $this->input->post('l_typeofapplication');

			if($this->mdl_user->m_save_leave($leave,$dates,$holidays)){
					$result = array('status' => 'yes','content'=> 'Leave successfully submitted!');
							echo json_encode($result);
							exit;
			}else{
					$result = array('status' => 'no','content'=> 'Failed to send leave request!');
							echo json_encode($result);
							exit;	
			}
		
			
	}
	
	public function own_leave_for_approval(){
			$data['title'] = 'Employee';
			$data['content'] = 'user/v_leaveforapproval';
			$this->load->view('layouts/v_master', $data);
	}
	
	public function ajax_own_get_leave_for_approval(){
		
			$result = $this->mdl_user->m_ajax_own_get_leave_for_approval($this->session->userdata('a_id'));
					echo json_encode($result);	
	}
	
	
	public function for_leave_for_approval(){
			$data['title'] = 'Employee';
			$data['content'] = 'user/v_leaveforapproval_for';
			$this->load->view('layouts/v_master', $data);
	}
	
	public function ajax_for_get_leave_for_approval(){

			$result = $this->mdl_user->m_ajax_own_get_leave_for_approval($this->session->userdata('main'));
					echo json_encode($result);	
	}
	
	
	public function leave_for_approval(){
		
		if($office = $this->mdl_user->m_get_office_signatory($this->session->userdata('a_id'))){
				foreach($office as $o){
					$data['o_id'] = strtolower($o->o_id);
					$data['o_name'] = strtolower($o->o_name);
					$data['o_code'] = strtolower($o->o_code);
					$data['o_mother'] = strtolower($o->o_mother);
					$data['o_head'] = strtolower($o->o_head);
					$data['o_dessig'] = strtolower($o->o_dessig);
					$data['o_type'] = strtolower($o->o_type);
				}
			}
		// echo $data['o_type'];
		// die();
			$data['title'] = 'Employee';
			$data['content'] = 'user/v_leaveforapproval';
			$this->load->view('layouts/v_master', $data);	
	}
	
	public function ajax_get_leave_forapproval(){
		
			if($office = $this->mdl_user->m_get_office_signatory($this->session->userdata('main'))){
				foreach($office as $o){
					$o_id = strtolower($o->o_id);
					$o_name = strtolower($o->o_name);
					$o_code = strtolower($o->o_code);
					$o_mother = strtolower($o->o_mother);
					$o_head = strtolower($o->o_head);
					$o_dessig = strtolower($o->o_dessig);
					$o_type = strtolower($o->o_type);
				}
			}else{
				$result = array('status' => 'no','content'=> 'Your Not Signatory');
					echo json_encode($result);
					exit;
			}
			
		
		if($o_type == 'division'){
				if($o_dessig == 1){
					$result = $this->mdl_user->m_get_leave_forapproval_department($this->session->userdata('main'),$o_dessig);
					echo json_encode($result);
				}else{
					$result = $this->mdl_user->m_get_leave_forapproval_division($this->session->userdata('main'),$o_dessig);
					echo json_encode($result);
				}
		}elseif($o_type == 'department'){
			$result = $this->mdl_user->m_get_leave_forapproval_department($this->session->userdata('main'),$o_dessig);
				echo json_encode($result);
		}

	}
	// Old 
	public function get_actioned_leave(){
			$data['title'] = 'Actioned Leave';
			$data['content'] = 'user/v_leavenotpending';
			$this->load->view('layouts/v_master', $data);
	}
	// Old 
	public function ajax_get_approved_leave(){
		$result = $this->mdl_user->m_get_approved_leave($this->session->userdata('main'));
					echo json_encode($result);	
	}
	
	
	// New as OWN
	public function own_get_actioned_leave(){
			$data['title'] = 'Actioned Leave';
			$data['content'] = 'user/v_leavenotpending';
			$this->load->view('layouts/v_master', $data);
	}
	
	// New as OWN
	public function ajax_own_get_approved_leave(){
		$a_id = $this->session->userdata('a_id');
		$result = $this->mdl_user->m_get_approved_leave($a_id);
					echo json_encode($result);	
	}	
	
	// New
	public function for_get_actioned_leave(){
			$data['title'] = 'Actioned Leave';
			$data['content'] = 'user/v_leavenotpending_for';
			$this->load->view('layouts/v_master', $data);
	}
	
	// New
	public function ajax_for_get_approved_leave(){
		$a_id = $this->session->userdata('main');
		$result = $this->mdl_user->m_get_approved_leave($a_id);
					echo json_encode($result);	
	}
	
	
	
	public function btn_approve_leave(){
		$a_id = $this->session->userdata('a_id');
		$l_id = $this->input->post('m_l_id');

			if($this->mdl_user->m_btn_approve_leave($l_id,$a_id)){
				$result = array('status' => 'yes','content'=> 'Leave successfully approved!');
					echo json_encode($result);
					exit;
				}else{
						$result = array('status' => 'no','content'=> 'Failed to send leave request!');
						echo json_encode($result);
						exit;	
				}
	}
	
	public function btn_approve_leave_asmayor(){
		$a_id = $this->session->userdata('main');
		$l_id = $this->input->post('m_l_id');

			if($this->mdl_user->m_btn_approve_leave($l_id,$a_id)){
				$result = array('status' => 'yes','content'=> 'Leave successfully approved!');
					echo json_encode($result);
					exit;
				}else{
						$result = array('status' => 'no','content'=> 'Failed to send leave request!');
						echo json_encode($result);
						exit;	
				}
	}
	
	
	public function disapproved_leave(){
		
		$a_id = $this->session->userdata('a_id');
		$l_id = $this->input->post('m_l_id');

			if($this->mdl_user->m_dept_disapproved_leave($l_id,$a_id)){
				$result = array('status' => 'yes','content'=> 'Leave successfully disapproved!');
					echo json_encode($result);
					exit;
				}else{
						$result = array('status' => 'no','content'=> 'Failed to send leave request!');
						echo json_encode($result);
						exit;	
				}
	}
	
	public function disapproved_leave_asmayor(){
		
		$a_id = $this->session->userdata('main');
		$l_id = $this->input->post('m_l_id');

			if($this->mdl_user->m_dept_disapproved_leave($l_id,$a_id)){
				$result = array('status' => 'yes','content'=> 'Leave successfully disapproved!');
					echo json_encode($result);
					exit;
				}else{
						$result = array('status' => 'no','content'=> 'Failed to send leave request!');
						echo json_encode($result);
						exit;	
				}
	}

	
	public function approved_leave(){
		
			if($office = $this->mdl_user->m_get_office_signatory($this->session->userdata('a_id'))){
				foreach($office as $o){
					$o_id = strtolower($o->o_id);
					$o_name = strtolower($o->o_name);
					$o_code = strtolower($o->o_code);
					$o_mother = strtolower($o->o_mother);
					$o_head = strtolower($o->o_head);
					$o_dessig = strtolower($o->o_dessig);
					$o_type = strtolower($o->o_type);
				}
			}else{
				$result = array('status' => 'no','content'=> 'Your Not Signatory');
					echo json_encode($result);
					exit;
				}
		
		
		if($o_type == 'division'){
			
			if($o_dessig == 1){
				$l_id = $this->input->post('l_id',TRUE);
				$leave['l_statusdivision'] = 'Approved';
				$leave['l_statusdept'] = 'Approved';
				$leave['l_dept_action_date'] = date('Y-m-d');
				
				if($this->mdl_user->m_dept_approved_leave($l_id,$leave)){
					$result = array('status' => 'yes','content'=> 'Leave successfully approved!');
					echo json_encode($result);
					exit;
				}else{
						$result = array('status' => 'no','content'=> 'Failed to send leave request!');
						echo json_encode($result);
						exit;	
				}
				
			}else{
				$l_id = $this->input->post('l_id',TRUE);
				$l_statusdivision = 'Approved';
				$l_div_action_date = date('Y-m-d');
				if($this->mdl_user->m_div_approved_leave($l_id,$l_statusdivision,$l_div_action_date)){
						$result = array('status' => 'yes','content'=> 'Leave successfully approved!');
						echo json_encode($result);
						exit;
				}else{
						$result = array('status' => 'no','content'=> 'Failed to send leave request!');
						echo json_encode($result);
						exit;	
				}
			}
		}elseif($o_type == 'department'){
			// ADMIN OR AS MAYOR
			if($this->mdl_user->m_check_if_admin_signatory($this->session->userdata('main'))){
				// Admin Signatory
				$leave['l_statusasmayor'] = 'Approved';
				$leave['l_dept_action_date'] = date('Y-m-d');
			}else{
				// Not Admin Signatory
				$leave['l_statusdept'] = 'Approved';
				$leave['l_asmayor_action_date'] = date('Y-m-d');
			}
			
			
			
			$l_id = $this->input->post('l_id',TRUE);
			
			
			// print_r($leave);
			// die();
			if($this->mdl_user->m_dept_approved_leave($l_id,$leave)){
					$result = array('status' => 'yes','content'=> 'Leave successfully approved!');
					echo json_encode($result);
					exit;
			}else{
					$result = array('status' => 'no','content'=> 'Failed to send leave request!');
					echo json_encode($result);
					exit;	
			}
		}
	}
	
	public function disapproved_leave__OLD(){
		
			if($office = $this->mdl_user->m_get_office_signatory($this->session->userdata('a_id'))){
				foreach($office as $o){
					$o_id = strtolower($o->o_id);
					$o_name = strtolower($o->o_name);
					$o_code = strtolower($o->o_code);
					$o_mother = strtolower($o->o_mother);
					$o_head = strtolower($o->o_head);
					$o_dessig = strtolower($o->o_dessig);
					$o_type = strtolower($o->o_type);
				}
			}else{
				$result = array('status' => 'no','content'=> 'Your Not Signatory');
					echo json_encode($result);
					exit;
			}
		
		
		if($o_type == 'division'){
			if($o_dessig == 1){
				$l_id = $this->input->post('m_l_id',TRUE);
				// $l_disapprovereason = $this->input->post('m_l_disapprovereason',TRUE);
				$l_statusdept = 'Disapproved';
				if($this->mdl_user->m_dept_disapproved_leave($l_id,$l_statusdept)){
						$result = array('status' => 'yes','content'=> 'Leave successfully disapproved!');
						echo json_encode($result);
						exit;
				}else{
						$result = array('status' => 'no','content'=> 'Failed to disapproved leave request!');
						echo json_encode($result);
						exit;	
				}
			}else{
				$m_l_id = $this->input->post('m_l_id',TRUE);
				// $m_l_disapprovereason = $this->input->post('m_l_disapprovereason',TRUE);
				$l_statusdivision = 'Disapproved';
				
				if($this->mdl_user->m_div_disapproved_leave($m_l_id,$l_statusdivision)){
						$result = array('status' => 'yes','content'=> 'Leave successfully disapproved!');
						echo json_encode($result);
						exit;
				}else{
						$result = array('status' => 'no','content'=> 'Failed to disapproved leave request!');
						echo json_encode($result);
						exit;	
				}
			}
		}elseif($o_type == 'department'){
			
			$l_id = $this->input->post('m_l_id',TRUE);
			// $l_disapprovereason = $this->input->post('m_l_disapprovereason',TRUE);
			$l_statusdept = 'Disapproved';
			if($this->mdl_user->m_dept_disapproved_leave($l_id,$l_statusdept)){
					$result = array('status' => 'yes','content'=> 'Leave successfully disapproved!');
					echo json_encode($result);
					exit;
			}else{
					$result = array('status' => 'no','content'=> 'Failed to disapproved leave request!');
					echo json_encode($result);
					exit;	
			}
		}
	}
	
	public function leave_filed(){
		$data['title'] = 'Employee';
		$data['content'] = 'user/v_leaverequest';
		$this->load->view('layouts/v_master', $data);
	}
	
	public function ajax_get_leave_filed(){
		$result = $this->mdl_user->m_get_leave_filed($this->session->userdata('a_id'));
			echo json_encode($result);
				
	}
	
	public function cancel_leave_application(){
		if($this->mdl_user->m_cancel_leave_application($this->input->post('m_l_id'))){
			$result = array('status' => 'yes','content'=> 'Leave successfully cancelled!');
				echo json_encode($result);
					
		}else{
			$result = array('status' => 'no','content'=> 'Failed to cancel leave application!');
				echo json_encode($result);
			
		}
	}
	
	public function ajax_get_holidays(){
		$result = $this->mdl_user->m_get_holidays();
		echo json_encode($result);
	}
}
