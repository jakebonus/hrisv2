<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Onlineapplicant extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_onlineapplicant');
		$this->load->library('form_validation');
	}
	
	public function index(){
		
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
				$data['title'] = 'Online Applicant';
				$data['content'] = 'v_list';
				$this->load->view('layouts/v_master', $data);
				
		}else{
			redirect('user');
		}
	}
	
	public function applicant_details($oa_id){
		$data['info'] = $this->mdl_onlineapplicant->m_get_info($oa_id);
		$data['appliedposition'] = $this->mdl_onlineapplicant->m_get_appliedposition($oa_id);
		
		
		$data['title'] = 'Applicant details';
		$data['content'] = 'v_applicantdetails';
		$this->load->view('layouts/v_master', $data);
		
	}
	
	public function listofapplicants(){
			
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
				$data['title'] = 'Online Applicant';
				$data['content'] = 'onlineapplicant/v_list';
				$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}
	
	public function encodeapplicant(){
			
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
				$data['vacancies'] = $this->mdl_onlineapplicant->m_get_vacancy();
				$data['title'] = 'Online Applicant';
				$data['content'] = 'onlineapplicant/v_encodeapplicant';
				$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}
	
	public function vacancies(){
				
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
				$data['title'] = 'Online Applicant';
				$data['content'] = 'onlineapplicant/v_vacancies';
				$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}
	
	public function courses(){
				
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
				$data['title'] = 'Online Applicant';
				$data['content'] = 'onlineapplicant/v_courses';
				$this->load->view('layouts/v_master', $data);
		}else{
			redirect('user');
		}
	}
	
	public function appointments(){
				
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
				$data['title'] = 'Online Applicant';
				$data['content'] = 'onlineapplicant/v_appointments';
				$this->load->view('layouts/v_master', $data);
			}else{
			redirect('user');
		}
	}
		
	public function ajax_get_application_foraction(){
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
			$applicantforaction = $this->mdl_onlineapplicant->m_get_application_foraction();
				echo json_encode($applicantforaction);
		}else{
			redirect('user');
		}
	}	
	
	
	public function ajax_get_application_foraction_bystatus($ah_status){
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
				if($ah_status == 'ALL'){
					$applicantforaction = $this->mdl_onlineapplicant->m_get_application_foraction();
				}else{
					$applicantforaction = $this->mdl_onlineapplicant->m_get_application_foraction_bystatus($ah_status);
				}
				
				echo json_encode($applicantforaction);
		}else{
			redirect('user');
		}		
	}
	
	
	public function ajax_deactivate_vacancy(){
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			$v_id = $this->input->post('v_id');
			$data['v_isavailable'] = 'NO';
			if($this->mdl_onlineapplicant->m_update_vacancy($data,$v_id)){
				$result = array('status' => 'yes','content'=> 'Deactivated');
				echo json_encode($result);
				// exit();
			} else {
				$result = array('status' => 'no','content'=> 'Failed. Please try again!');
				echo json_encode($result);
				// exit();
			}
		}else{
			redirect('user');
		}
	}
	public function ajax_deactivate_course(){
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			$c_id = $this->input->post('c_id');
			$data['c_isdeleted'] = 'YES';
			if($this->mdl_onlineapplicant->m_update_course($c_id,$data)){
					$result = array('status' => 'yes','content'=> 'Successfully deleted!');
					echo json_encode($result);
					// exit();
				} else {
					$result = array('status' => 'no','content'=> 'Failed. Please try again!');
					echo json_encode($result);
					// exit();
				}
			}else{
			redirect('user');
		}
	}

	
	
	public function ajax_save_vacancy(){
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			
			$data['v_position'] = $this->input->post('v_position');
			$data['v_desc'] = $this->input->post('v_desc');
			$v_id = $this->input->post('v_id');
			
			if($v_id == null || $v_id == ''){
				
				if($this->mdl_onlineapplicant->m_save_vacancy($data)){
					$result = array('status' => 'yes','content'=> 'Save Success');
					echo json_encode($result);
					// exit();
				} else {
					$result = array('status' => 'no','content'=> 'Failed. Please try again!');
					echo json_encode($result);
					// exit();
				}
				
			}else{
				
				if($this->mdl_onlineapplicant->m_update_vacancy($data,$v_id)){
					$result = array('status' => 'yes','content'=> 'Update Success');
					echo json_encode($result);
					// exit();
				} else {
					$result = array('status' => 'no','content'=> 'Failed. Please try again!');
					echo json_encode($result);
					// exit();
				}
				
			}
		}else{
			redirect('user');
		}
	}
	
	public function email_forexam(){
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
			if($this->input->post('m_ah_id') != '' || $this->input->post('m_ah_id') != null){
		
			$ah_id 					= $this->input->post('m_ah_id');
			$es_date 				= $this->input->post('es_date');
			$es_time 				= $this->input->post('es_time');
			$es_venue 				= $this->input->post('es_venue');
			$arr_ah_id 				= explode(",",$ah_id);
			$count_oa_id 			= count($arr_ah_id);
			
			$new_oa_id				= '0';
			$oa_id_forstatus				= "'".'0'."'";

			for($i = 0; $i < $count_oa_id; $i++){
				$new_oa_id .= ','.$arr_ah_id[$i];
			}
			
			for($i = 0; $i < $count_oa_id; $i++){
				$oa_id_forstatus .= ','."'".$arr_ah_id[$i]."'";
			}
			
			if($applicant = $this->mdl_onlineapplicant->m_get_candidate_email($new_oa_id)){
				$this->mdl_onlineapplicant->m_update_status($oa_id_forstatus);
				
				foreach($applicant as $a){
					$config = Array('mailtype'  => 'html','charset' => 'utf-8','wordwrap' => TRUE);
					$this->load->library('email', $config);
					$this->email->initialize($config);
					
					$tit ='';
					$subject = "Schedule for Exam";
					$message = "";
					$message .= date('d F Y');
					$message .= "<br/> <br/>";
					if($a->oa_gender == 'M'){
						$tit = 'Mr.';
					}else{
						$tit = 'Ms.';
					}
					
					$message .= "<strong>".strtoupper($tit)." ".strtoupper($a->oa_fname).' '.strtoupper($a->oa_mname).' '.strtoupper($a->oa_lname)."</strong><br/>";
					$message .= $a->oa_street.','.$a->brgy.',<br/>'.$a->city.', '.$a->province;
					$message .= " <br/><br/>";
					
					$message .= "Dear, " .$tit.' '. $a->oa_lname. ",";
					$message .= "<br/> <br/>";
					
					
					$message .= "We refer to your application for a position in the City Government of City of San Fernando (P), and thank you for your interest to join our workforce. Careful evaluation of your records shows that you are pre-qualified for the applied position.";
					$message .= "<br/><br/>";
					$message .= "In view thereof, please be advised of the schedule of your <strong>pre-qualifying written examinations</strong>.";
					$message .= "<br/><br/>";
					$message .= "&nbsp;&nbsp;&nbsp;&nbsp; Date: &nbsp;&nbsp;&nbsp;&nbsp; ". date('F d, Y',strtotime($es_date)) ."";
					$message .= "<br/>";
					$message .= "&nbsp;&nbsp;&nbsp;&nbsp; Time: &nbsp;&nbsp;&nbsp; ".$es_time;
					$message .= "<br/>";
					$message .= "&nbsp;&nbsp;&nbsp;&nbsp; Venue: &nbsp;&nbsp; ".nl2br($es_venue);
					$message .= "<br/> <br/>";
					$message .= "Furthermore, in the event that you satisfactorily pass the examinations, the City Human Resource Management staff would contact you for an interview.";
					$message .= "<br/> <br/>";
					$message .= "Kindly send a confirmation message with your full name as subject to csfp.recruitment@gmail.com.";
					$message .= "<br/> <br/>";
					$message .= "Failure to respond within 24 hours would tantamount to the withdrawal of your job application.";
					$message .= "<br/> <br/>";
					$message .= "Very truly yours,";
					$message .= "<br/> <br/>";
					$message .= "<strong>Recruitment, Selection and Placement Section</strong>";
					$message .= "<br/>";
					$message .= "City Human Resource Management Office";
					$message .= "<br/>";
					$message .= "City of San Fernando, Pampanga";
					$message .= "<br/>";
					$message .= "<i>Tel No. <u>(045) 961-8640</u></i>";
					$message .= "<br/> <br/>";
					// $message .= "<i>Note: This is a system-generated e-mail. <strong>Please do not reply.</strong></i>";

				   $this->email->from('csfp.recruitment@gmail.com', 'City of San Fernando, Pampanga');
				   $this->email->to($a->oa_email);
				   $this->email->cc('csfp.recruitment@gmail.com');
				   $this->email->subject($subject);
				   $this->email->message($message);
				   $this->email->send();
				}
			
			$result = array('status' => 'yes','content'=> 'success');
			echo json_encode($result);
			
			}else{
				$result = array('status' => 'no','content'=> 'Failed. Please try again!');
				echo json_encode($result);
			}
				
			}else{
				$result = array('status' => 'no','content'=> 'Please select applicant by clicking the checkbox.');
						echo json_encode($result);
			}
		}else{
			redirect('user');
		}
	
	}
	
	public function email_forexam_individual(){
	if($this->input->post('m_ah_id') != '' || $this->input->post('m_ah_id') != null){
		
			$ah_id 					= $this->input->post('m_ah_id');
			$es_date 				= $this->input->post('es_date');
			$es_time 				= $this->input->post('es_time');
			$es_venue 				= $this->input->post('es_venue');
			// $arr_ah_id 				= explode(",",$ah_id);
			// $count_oa_id 			= count($arr_ah_id);
			
			// $new_oa_id				= '0';
			// $oa_id_forstatus				= "'".'0'."'";

			// for($i = 0; $i < $count_oa_id; $i++){
				// $new_oa_id .= ','.$arr_ah_id[$i];
			// }
			
			// for($i = 0; $i < $count_oa_id; $i++){
				// $oa_id_forstatus .= ','."'".$arr_ah_id[$i]."'";
			// }
			
			if($applicant = $this->mdl_onlineapplicant->m_get_candidate_email($ah_id)){
			// if($applicant = $this->mdl_onlineapplicant->m_get_candidate_email($new_oa_id)){
				$this->mdl_onlineapplicant->m_update_status($ah_id);
				// $this->mdl_onlineapplicant->m_update_status($oa_id_forstatus);
				
				foreach($applicant as $a){
					$config = Array('mailtype'  => 'html','charset' => 'utf-8','wordwrap' => TRUE);
					$this->load->library('email', $config);
					$this->email->initialize($config);
					
					$tit ='';
					$subject = "Schedule for Exam and Initial Interview";
					$message = "";
					$message .= date('d F Y');
					$message .= "<br/> <br/>";
					if($a->oa_gender == 'M'){
						$tit = 'Mr.';
					}else{
						$tit = 'Ms.';
					}
					
					$message .= "<strong>".strtoupper($tit)." ".strtoupper($a->oa_fname).' '.strtoupper($a->oa_mname).' '.strtoupper($a->oa_lname)."</strong><br/>";
					$message .= $a->oa_street.','.$a->brgy.',<br/>'.$a->city.', '.$a->province;
					$message .= " <br/><br/>";
					
					$message .= "Dear " .$tit.' '. $a->oa_lname. ",";
					$message .= "<br/> <br/>";
					
					
					$message .= "We refer to your application for a position in the City Government of City of San Fernando (P), and thank you for your interest to join our workforce. Careful evaluation of your records shows that you are pre-qualified for the applied position.";
					$message .= "<br/><br/>";
					$message .= "In view thereof, please be advised of the schedule of your <strong>pre-qualifying written examinations</strong>.";
					$message .= "<br/><br/>";
					$message .= "&nbsp;&nbsp;&nbsp;&nbsp; Date: &nbsp;&nbsp;&nbsp;&nbsp; ". date('F d, Y',strtotime($es_date)) ."";
					$message .= "<br/>";
					$message .= "&nbsp;&nbsp;&nbsp;&nbsp; Time: &nbsp;&nbsp;&nbsp; ".$es_time;
					$message .= "<br/>";
					$message .= "&nbsp;&nbsp;&nbsp;&nbsp; Venue: &nbsp;&nbsp; ".nl2br($es_venue);
					$message .= "<br/> <br/>";
					$message .= "Furthermore, in the event that you satisfactorily pass the examinations, the City Human Resource Management staff would contact you for an interview.";
					$message .= "<br/> <br/>";
					$message .= "Kindly send a confirmation message with your full name as subject to csfp.recruitment@gmail.com.";
					$message .= "<br/> <br/>";
					$message .= "Failure to respond within 24 hours would tantamount to the withdrawal of your job application.";
					$message .= "<br/> <br/>";
					$message .= "Very truly yours,";
					$message .= "<br/> <br/>";
					$message .= "<strong>Recruitment, Selection and Placement Section</strong>";
					$message .= "<br/>";
					$message .= "City Human Resource Management Office";
					$message .= "<br/>";
					$message .= "City of San Fernando (P)";
					$message .= "<br/>";
					$message .= "<i>Tel No. <u>(045) 961-8640</u></i>";
					$message .= "<br/> <br/>";
					// $message .= "<i>Note: This is a system-generated e-mail. <strong>Please do not reply.</strong></i>";

				   $this->email->from('csfp.recruitment@gmail.com', 'City of San Fernando, Pampanga');
				   $this->email->to($a->oa_email);
				   $this->email->cc('csfp.recruitment@gmail.com');
				   $this->email->subject($subject);
				   $this->email->message($message);
				   $this->email->send();
				}
			
			$result = array('status' => 'yes','content'=> 'success');
			echo json_encode($result);
			
			}else{
				$result = array('status' => 'no','content'=> 'Failed. Please try again!');
				echo json_encode($result);
			}
				
	}else{
		$result = array('status' => 'no','content'=> 'Please select applicant by clicking the checkbox.');
				echo json_encode($result);
	}
	
	}
	
	
	
	public function email_forjobinterview(){
		// echo $this->input->post('m_ah_id');
		// die();
		if($this->input->post('m_ah_id') != '' || $this->input->post('m_ah_id') != null){
		
			$ah_id 		= $this->input->post('m_ah_id');
			$es_date 	= $this->input->post('es_date');
			$es_time 	= $this->input->post('es_time');
			$es_venue	= $this->input->post('es_venue');

			if($applicant = $this->mdl_onlineapplicant->m_get_candidate_email($ah_id)){
			
				$this->mdl_onlineapplicant->m_update_status($ah_id);
				
				foreach($applicant as $a){
					$config = Array('mailtype'  => 'html','charset' => 'utf-8','wordwrap' => TRUE);
					$this->load->library('email', $config);
					$this->email->initialize($config);
					
					$tit ='';
					$subject = "Schedule for Job Interview";
					$message = "";
					$message .= date('d F Y');
					$message .= "<br/> <br/>";
					if($a->oa_gender == 'M'){
						$tit = 'Mr.';
					}else{
						$tit = 'Ms.';
					}
					
					$message .= "<strong>".strtoupper($tit)." ".strtoupper($a->oa_fname).' '.strtoupper($a->oa_mname).' '.strtoupper($a->oa_lname)."</strong><br/>";
					$message .= $a->oa_street.','.$a->brgy.',<br/>'.$a->city.', '.$a->province;
					$message .= " <br/><br/>";
					
					$message .= "Dear " .$tit.' '. $a->oa_lname. ",";
					$message .= "<br/> <br/>";
					

					$message .= "We are pleased to inform you that you are qualified to take the next step in the recruitment and selection process. Please be advised of the schedule of your <strong>JOB INTERVIEW</strong> with the concerned office/division.";
					$message .= "<br/> <br/>";
					$message .= "&nbsp;&nbsp;&nbsp;&nbsp; Date: &nbsp;&nbsp;&nbsp;&nbsp; ". date('F d, Y',strtotime($es_date)) ."";
					$message .= "<br/>";
					$message .= "&nbsp;&nbsp;&nbsp;&nbsp; Time: &nbsp;&nbsp;&nbsp; ".$es_time;
					$message .= "<br/>";
					$message .= "&nbsp;&nbsp;&nbsp;&nbsp; Venue: &nbsp;&nbsp; ".nl2br($es_venue);
					$message .= "<br/> <br/>";
					$message .= "Kindly send a confirmation message with your full name as subject to csfp.recruitment@gmail.com";
					$message .= "<br/> <br/>";
					$message .= "Failure to respond withing 24 hours woul tantamount to the withdrawal of your job application.";
					$message .= "<br/> <br/><br/>";
					$message .= "Very truly yours,";
					$message .= "<br/> <br/>";
					$message .= "<strong>Recruitment, Selection and Placement Section</strong>";
					$message .= "<br/>";
					$message .= "<i>City Human Resource Management Office</i>";
					$message .= "<br/>";
					$message .= "<i>City Government of San Fernando (P)</i>";
					$message .= "<br/>";
					$message .= "<i>Tel No. <u>(045) 961-8640</u></i>";
					$message .= "<br/> <br/>";
					
				   $this->email->from('csfp.recruitment@gmail.com', 'City of San Fernando, Pampanga');
				   $this->email->to($a->oa_email);
				   $this->email->cc('csfp.recruitment@gmail.com');
				   $this->email->subject($subject);
				   $this->email->message($message);
				   $this->email->send();
				}
			
			$result = array('status' => 'yes','content'=> 'success');
			echo json_encode($result);
			
			}else{
				$result = array('status' => 'no','content'=> 'Failed. Please try again!');
				echo json_encode($result);
			}
				
		}else{
		$result = array('status' => 'no','content'=> 'Please select applicant by clicking the checkbox.'.$this->input->post('m_ah_id').'');
				echo json_encode($result);
		}
	
	}
	
	
	public function email_forfiling(){
	
		if($this->input->post('ah_id') != '' || $this->input->post('ah_id') != null){
		
			$ah_id 					= $this->input->post('ah_id');
			$count_oa_id 			= count($ah_id);
			$new_ah_id				= '0';
			$ah_id_forstatus				= "'".'0'."'";
		
			for($i = 0; $i < $count_oa_id; $i++){
				$new_ah_id .= ','.$ah_id[$i];
			}
			
			for($i = 0; $i < $count_oa_id; $i++){
				$ah_id_forstatus .= ','."'".$ah_id[$i]."'";
			}
			
			if($applicant = $this->mdl_onlineapplicant->m_get_candidate_email($new_ah_id)){
				
				$this->mdl_onlineapplicant->m_update_status($ah_id_forstatus);
					
				foreach($applicant as $a){
					$config = Array('mailtype'  => 'html','charset' => 'utf-8','wordwrap' => TRUE);
					$this->load->library('email', $config);
					$this->email->initialize($config);
					
					$tit ='';
					$subject = "For Filing";
					$message = "";
					
					//$message .= date('F d, Y');
					$message .= date('d F Y');
					
					$message .= "<br/> <br/>";
					
					if($a->oa_gender == 'M'){
						$tit = 'Mr.';
					}else{
						$tit = 'Ms.';
					}
					
					$message .= "<strong>".strtoupper($tit)." ".strtoupper($a->oa_fname).' '.strtoupper($a->oa_mname).' '.strtoupper($a->oa_lname)."</strong><br/>";
					$message .= $a->oa_street.','.$a->brgy.',<br/>'.$a->city.', '.$a->province;
					$message .= " <br/><br/>";
					
					$message .= "Dear " .$tit.' '. $a->oa_lname. ",";
					$message .= "<br/> <br/>";
					
					
					$message .= "We refer to your application in the City Government of San Fernando (P) and thank you for your interest to join our workforce.";
					$message .= "<br/><br/>";
					$message .= "However, we regret to inform you that there is no vacant position that caters to your educational attainment and other qualifications. Nevertheless, your application letter and curriculum vitae will be put on active file for future consideration.";
					$message .= "<br/><br/>";
					$message .= "Thank you for your understanding.";
					$message .= "<br/><br/>";
					$message .= "Very truly yours,";
					$message .= "<br/> <br/>";
					$message .= "<strong>RACHELLE S. YUSI</strong>";
					$message .= "<br/>";
					$message .= "City Human Resource Development Officer";
					$message .= "<br/> <br/>";
					// $message .= "<i>Note: This is a system-generated e-mail. <strong>Please do not reply.</strong></i>";

				   $this->email->from('csfp.recruitment@gmail.com', 'City of San Fernando, Pampanga');
				   $this->email->to($a->oa_email);
				   $this->email->cc('csfp.recruitment@gmail.com');
				   $this->email->subject($subject);
				   $this->email->message($message);
				   $this->email->send();
				}
			
			$result = array('status' => 'yes','content'=> 'success');
			echo json_encode($result);
			
			}else{
				$result = array('status' => 'no','content'=> 'Failed. Please try again!');
				echo json_encode($result);
			}
			
		}else{
		$result = array('status' => 'no','content'=> 'Please select applicant by clicking the checkbox.');
				echo json_encode($result);
	}	

		// echo $new_oa_id;
			// die();
			//	$applicant = $this->mdl_onlineapplicant->m_get_applicant();
			//	echo json_encode($applicant);
				
	}
	
	public function email_forfiling_individual(){
	
	if($this->input->post('m_ah_id') != '' || $this->input->post('m_ah_id') != null){
		
			$ah_id 					= $this->input->post('m_ah_id');
			// $count_oa_id 			= count($ah_id);
			// $new_ah_id				= '0';
			// $ah_id_forstatus				= "'".'0'."'";
		
			// for($i = 0; $i < $count_oa_id; $i++){
				// $new_ah_id .= ','.$ah_id[$i];
			// }
			
			// for($i = 0; $i < $count_oa_id; $i++){
				// $ah_id_forstatus .= ','."'".$ah_id[$i]."'";
			// }
			
			if($applicant = $this->mdl_onlineapplicant->m_get_candidate_email($ah_id)){
				
				$this->mdl_onlineapplicant->m_update_status($ah_id);
					
				foreach($applicant as $a){
					$config = Array('mailtype'  => 'html','charset' => 'utf-8','wordwrap' => TRUE);
					$this->load->library('email', $config);
					$this->email->initialize($config);
					
					$tit ='';
					$subject = "For Filing";
					$message = "";
					
					//$message .= date('F d, Y');
					$message .= date('d F Y');
					
					$message .= "<br/> <br/>";
					
					if($a->oa_gender == 'M'){
						$tit = 'Mr.';
					}else{
						$tit = 'Ms.';
					}
					
					$message .= "<strong>".strtoupper($tit)." ".strtoupper($a->oa_fname).' '.strtoupper($a->oa_mname).' '.strtoupper($a->oa_lname)."</strong><br/>";
					$message .= $a->oa_street.','.$a->brgy.',<br/>'.$a->city.', '.$a->province;
					$message .= " <br/><br/>";
					
					$message .= "Dear " .$tit.' '. $a->oa_lname. ",";
					$message .= "<br/> <br/>";
					
					
					
					$message .= "We refer to your application in the City Government of San Fernando (P) and thank you for your interest to join our workforce.";
					$message .= "<br/><br/>";
					$message .= "However, we regret to inform you that there is no vacant position that caters to your educational attainment and other qualifications. Nevertheless, your application letter and curriculum vitae will be put on active file for future consideration.";
					$message .= "<br/><br/>";
					$message .= "Thank you for your understanding.";
					$message .= "<br/><br/>";
					$message .= "Very truly yours,";
					$message .= "<br/> <br/>";
					$message .= "<strong>RACHELLE S. YUSI</strong>";
					$message .= "<br/>";
					$message .= "City Human Resource Development Officer";
					$message .= "<br/> <br/>";
					// $message .= "<i>Note: This is a system-generated e-mail. <strong>Please do not reply.</strong></i>";

				   $this->email->from('csfp.recruitment@gmail.com', 'City of San Fernando, Pampanga');
				   $this->email->to($a->oa_email);
				   $this->email->cc('csfp.recruitment@gmail.com');
				   $this->email->subject($subject);
				   $this->email->message($message);
				   $this->email->send();
				}
			
			$result = array('status' => 'yes','content'=> 'success');
			echo json_encode($result);
			
			}else{
				$result = array('status' => 'no','content'=> 'Failed. Please try again!');
				echo json_encode($result);
			}
			
		}else{
		$result = array('status' => 'no','content'=> 'Please select applicant by clicking the checkbox.');
				echo json_encode($result);
	}	

		// echo $new_oa_id;
			// die();
			//	$applicant = $this->mdl_onlineapplicant->m_get_applicant();
			//	echo json_encode($applicant);
				
	}
	
	public function email_forwardtocesd(){
			
			// print_r($this->input->post('ah_id'));
			// die();
		
		if($this->input->post('ah_id') != '' || $this->input->post('ah_id') != null || is_array($this->input->post('ah_id') != null)){
		// if(isset($this->input->post('ah_id'))){
			$ah_id 					= $this->input->post('ah_id');
			$count_oa_id 			= count($ah_id);
			$new_ah_id				= '0';
			$ah_id_forstatus		= "'".'0'."'";
		
			for($i = 0; $i < $count_oa_id; $i++){
				$new_ah_id .= ','.$ah_id[$i];
			}
			
			for($i = 0; $i < $count_oa_id; $i++){
				$ah_id_forstatus .= ','."'".$ah_id[$i]."'";
			}
			

			if($applicant = $this->mdl_onlineapplicant->m_get_candidate_email($new_ah_id)){
				
				$this->mdl_onlineapplicant->m_update_status($ah_id_forstatus);
				
				foreach($applicant as $a){
					$config = Array('mailtype'  => 'html','charset' => 'utf-8','wordwrap' => TRUE);
					$this->load->library('email', $config);
					$this->email->initialize($config);
					
					$tit ='';
					$subject = "Forward to CESD";
					$message = "";
					
					//$message .= date('F d, Y');
					$message .= date('d F Y');
					
					$message .= "<br/> <br/>";
					
					if($a->oa_gender == 'M'){
						$tit = 'Mr.';
					}else{
						$tit = 'Ms.';
					}
					
					$message .= "<strong>".strtoupper($tit)." ".strtoupper($a->oa_fname).' '.strtoupper($a->oa_mname).' '.strtoupper($a->oa_lname)."</strong><br/>";
					$message .= $a->oa_street.','.$a->brgy.',<br/>'.$a->city.', '.$a->province;
					$message .= " <br/><br/>";
					
					$message .= "Dear " .$tit.' '. $a->oa_lname. ",";
					$message .= "<br/> <br/>";
					
					
					$message .= "We refer to your application for a position in the City Government of San Fernando (P) and thank you for your interest to join our workforce.";
					$message .= "<br/><br/>";
					$message .= "However, we regret to inform you that there is no vacant position that caters to your educational attainment and other qualifications. Nevertheless, your curriculum vitae was forwared to the City Employment Services Division for futher assessment and recommendation to private companies";
					$message .= "<br/><br/>";
					$message .= "Thank you for your understanding.";
					$message .= "<br/><br/>";
					$message .= "Very truly yours,";
					$message .= "<br/> <br/>";
					$message .= "<strong>RACHELLE S. YUSI</strong>";
					$message .= "<br/>";
					$message .= "City Human Resource Development Officer";
					$message .= "<br/> <br/>";
					// $message .= "<i>Note: This is a system-generated e-mail. <strong>Please do not reply.</strong></i>";

				   $this->email->from('csfp.recruitment@gmail.com', 'City of San Fernando, Pampanga');
				   $this->email->to($a->oa_email);
				   $this->email->cc('csfp.recruitment@gmail.com');
				   $this->email->subject($subject);
				   $this->email->message($message);
				   $this->email->send();
				}
			
			$result = array('status' => 'yes','content'=> 'success');
			echo json_encode($result);
			
			}else{
				$result = array('status' => 'no','content'=> 'Failed. Please try again!');
				echo json_encode($result);
			}
			
				}else{
		$result = array('status' => 'no','content'=> 'Please select applicant by clicking the checkbox.');
				echo json_encode($result);
	}
			// echo $new_oa_id;
			// die();
			//	$applicant = $this->mdl_onlineapplicant->m_get_applicant();
			//	echo json_encode($applicant);
				
	}
	
	
	public function email_forwardtocityschools(){
		
		if($this->input->post('ah_id') != '' || $this->input->post('ah_id') != null || is_array($this->input->post('ah_id') != null)){
		
			$ah_id 					= $this->input->post('ah_id');
			$count_oa_id 			= count($ah_id);
			$new_ah_id				= '0';
			$ah_id_forstatus		= "'".'0'."'";
		
			for($i = 0; $i < $count_oa_id; $i++){
				$new_ah_id .= ','.$ah_id[$i];
			}
			
			for($i = 0; $i < $count_oa_id; $i++){
				$ah_id_forstatus .= ','."'".$ah_id[$i]."'";
			}
			

			if($applicant = $this->mdl_onlineapplicant->m_get_candidate_email($new_ah_id)){
				
				$this->mdl_onlineapplicant->m_update_status($ah_id_forstatus);
				
				foreach($applicant as $a){
					$config = Array('mailtype'  => 'html','charset' => 'utf-8','wordwrap' => TRUE);
					$this->load->library('email', $config);
					$this->email->initialize($config);
					
					$tit ='';
					$subject = "Forward to City Schools";
					$message = "";
					
					$message .= date('d F Y');
					
					$message .= "<br/> <br/>";
					
					if($a->oa_gender == 'M'){
						$tit = 'Mr.';
					}else{
						$tit = 'Ms.';
					}
					
					$message .= "<strong>".strtoupper($tit)." ".strtoupper($a->oa_fname).' '.strtoupper($a->oa_mname).' '.strtoupper($a->oa_lname)."</strong><br/>";
					$message .= $a->oa_street.','.$a->brgy.',<br/>'.$a->city.', '.$a->province;
					$message .= " <br/><br/>";
					
					$message .= "Dear " .$tit.' '. $a->oa_lname. ",";
					$message .= "<br/> <br/>";
					
					
					$message .= "We refer to your application for a position in the City Government of San Fernando (P) and thank you for your interest to join our workforce.";
					$message .= "<br/><br/>";
					$message .= "However, we regret to inform you that there is no vacant position that caters to your educational attainment and other qualifications. Nevertheless, your curriculum vitae was forwared to the City Schools Division for futher assessment and recommendation";
					$message .= "<br/><br/>";
					$message .= "Thank you for your understanding.";
					$message .= "<br/><br/>";
					$message .= "Very truly yours,";
					$message .= "<br/> <br/>";
					$message .= "<strong>RACHELLE S. YUSI</strong>";
					$message .= "<br/>";
					$message .= "City Human Resource Development Officer";
					$message .= "<br/> <br/>";
					// $message .= "<i>Note: This is a system-generated e-mail. <strong>Please do not reply.</strong></i>";

				   $this->email->from('csfp.recruitment@gmail.com', 'City of San Fernando, Pampanga');
				   $this->email->to($a->oa_email);
				   $this->email->cc('csfp.recruitment@gmail.com');
				   $this->email->subject($subject);
				   $this->email->message($message);
				   $this->email->send();
				}
			
				$result = array('status' => 'yes','content'=> 'success');
				echo json_encode($result);
			
			}else{
				$result = array('status' => 'no','content'=> 'Failed. Please try again!');
				echo json_encode($result);
			}
			
		}else{
			$result = array('status' => 'no','content'=> 'Please select applicant by clicking the checkbox.');
				echo json_encode($result);
		}
				
	}
	
	public function email_forwardtocesd_individual(){
			
		if($this->input->post('m_ah_id') != '' || $this->input->post('m_ah_id') != null){
			$ah_id 					= $this->input->post('m_ah_id');
			// $count_oa_id 			= count($ah_id);
			// $new_ah_id				= '0';
			// $ah_id_forstatus		= "'".'0'."'";
		
			// for($i = 0; $i < $count_oa_id; $i++){
				// $new_ah_id .= ','.$ah_id[$i];
			// }
			
			// for($i = 0; $i < $count_oa_id; $i++){
				// $ah_id_forstatus .= ','."'".$ah_id[$i]."'";
			// }
			

			if($applicant = $this->mdl_onlineapplicant->m_get_candidate_email($ah_id)){
				
				$this->mdl_onlineapplicant->m_update_status($ah_id);
				
				foreach($applicant as $a){
					$config = Array('mailtype'  => 'html','charset' => 'utf-8','wordwrap' => TRUE);
					$this->load->library('email', $config);
					$this->email->initialize($config);
					
					$tit ='';
					$subject = "Forward to CESD";
					$message = "";
					
					//$message .= date('F d, Y');
					$message .= date('d F Y');
					
					$message .= "<br/> <br/>";
					
					if($a->oa_gender == 'M'){
						$tit = 'Mr.';
					}else{
						$tit = 'Ms.';
					}
					
					$message .= "<strong>".strtoupper($tit)." ".strtoupper($a->oa_fname).' '.strtoupper($a->oa_mname).' '.strtoupper($a->oa_lname)."</strong><br/>";
					$message .= $a->oa_street.','.$a->brgy.',<br/>'.$a->city.', '.$a->province;
					$message .= " <br/><br/>";
					
					$message .= "Dear " .$tit.' '. $a->oa_lname. ",";
					$message .= "<br/> <br/>";
					
					
					
					$message .= "We refer to your application for a position in the City Government of San Fernando (P) and thank you for your interest to join our workforce.";
					$message .= "<br/><br/>";
					$message .= "However, we regret to inform you that there is no vacant position that caters to your educational attainment and other qualifications. Nevertheless, your curriculum vitae was forwared to the City Employment Services Division for futher assessment and recommendation to private companies";
					$message .= "<br/><br/>";
					$message .= "Thank you for your understanding.";
					$message .= "<br/><br/>";
					$message .= "Very truly yours,";
					$message .= "<br/> <br/>";
					$message .= "<strong>RACHELLE S. YUSI</strong>";
					$message .= "<br/>";
					$message .= "City Human Resource Development Officer";
					$message .= "<br/> <br/>";
					// $message .= "<i>Note: This is a system-generated e-mail. <strong>Please do not reply.</strong></i>";

				   $this->email->from('csfp.recruitment@gmail.com', 'City of San Fernando, Pampanga');
				   $this->email->to($a->oa_email);
				   $this->email->cc('csfp.recruitment@gmail.com');
				   $this->email->subject($subject);
				   $this->email->message($message);
				   $this->email->send();
				}
			
			$result = array('status' => 'yes','content'=> 'success');
			echo json_encode($result);
			
			}else{
				$result = array('status' => 'no','content'=> 'Failed. Please try again!');
				echo json_encode($result);
			}
			
				}else{
		$result = array('status' => 'no','content'=> 'Please select applicant by clicking the checkbox.');
				echo json_encode($result);
	}
			// echo $new_oa_id;
			// die();
			//	$applicant = $this->mdl_onlineapplicant->m_get_applicant();
			//	echo json_encode($applicant);
				
	}
	
	public function email_forregret(){

		if($this->input->post('ah_id') != '' || $this->input->post('ah_id') != null || is_array($this->input->post('ah_id') != null)){

			$ah_id 					= $this->input->post('ah_id');
			$count_oa_id 			= count($ah_id);
			$new_ah_id				= '0';
			$ah_id_forstatus		= "'".'0'."'";
		
			for($i = 0; $i < $count_oa_id; $i++){
				$new_ah_id .= ','.$ah_id[$i];
			}
			
			for($i = 0; $i < $count_oa_id; $i++){
				$ah_id_forstatus .= ','."'".$ah_id[$i]."'";
			}
			

			if($applicant = $this->mdl_onlineapplicant->m_get_candidate_email($new_ah_id)){
				
				$this->mdl_onlineapplicant->m_update_status($ah_id_forstatus);
				
				foreach($applicant as $a){
					$config = Array('mailtype'  => 'html','charset' => 'utf-8','wordwrap' => TRUE);
					$this->load->library('email', $config);
					$this->email->initialize($config);
					
					$tit ='';
					$subject = "Regret Letter";
					$message = "";
					
					//$message .= date('F d, Y');
					$message .= date('d F Y');
					
					$message .= "<br/> <br/>";
					
					if($a->oa_gender == 'M'){
						$tit = 'Mr.';
					}else{
						$tit = 'Ms.';
					}
					
					$message .= "<strong>".strtoupper($tit)." ".strtoupper($a->oa_fname).' '.strtoupper($a->oa_mname).' '.strtoupper($a->oa_lname)."</strong><br/>";
					$message .= $a->oa_street.','.$a->brgy.',<br/>'.$a->city.', '.$a->province;
					$message .= " <br/><br/>";
					
					$message .= "Dear " .$tit.' '. $a->oa_lname. ",";
					$message .= "<br/> <br/>";
					
					
					$message .= "Thank you for your interest in applying in the City Government of San Fernando (P).";
					$message .= "<br/><br/>";
					$message .= "Your interview and qualifications made a favorable impression, however, we regret to inform you that another candidate was selected for the position. We appreciate the time and effort that you have invested in your application.";
					$message .= "<br/><br/>";
					$message .= "Thank you for your understanding and wish you all the best in your career.";
					$message .= "<br/><br/>";
					$message .= "Very truly yours,";
					$message .= "<br/> <br/>";
					$message .= "<strong>RACHELLE S. YUSI</strong>";
					$message .= "<br/>";
					$message .= "City Human Resource Development Officer";
					$message .= "<br/> <br/>";
					// $message .= "<i>Note: This is a system-generated e-mail. <strong>Please do not reply.</strong></i>";

				   $this->email->from('csfp.recruitment@gmail.com', 'City of San Fernando, Pampanga');
				   $this->email->to($a->oa_email);
				   $this->email->cc('csfp.recruitment@gmail.com');
				   $this->email->subject($subject);
				   $this->email->message($message);
				   $this->email->send();
				}
			
			$result = array('status' => 'yes','content'=> 'success');
			echo json_encode($result);
			
			}else{
				$result = array('status' => 'no','content'=> 'Failed. Please try again!');
				echo json_encode($result);
			}
			
				}else{
		$result = array('status' => 'no','content'=> 'Please select applicant by clicking the checkbox.');
				echo json_encode($result);
	}
			// echo $new_oa_id;
			// die();
			//	$applicant = $this->mdl_onlineapplicant->m_get_applicant();
			//	echo json_encode($applicant);
				
	}
	
	public function email_forregret_individual(){

		if($this->input->post('m_ah_id') != '' || $this->input->post('m_ah_id') != null ){

			$ah_id 					= $this->input->post('m_ah_id');
			// $count_oa_id 			= count($ah_id);
			// $new_ah_id				= '0';
			// $ah_id_forstatus		= "'".'0'."'";
		
			// for($i = 0; $i < $count_oa_id; $i++){
				// $new_ah_id .= ','.$ah_id[$i];
			// }
			
			// for($i = 0; $i < $count_oa_id; $i++){
				// $ah_id_forstatus .= ','."'".$ah_id[$i]."'";
			// }
			

			if($applicant = $this->mdl_onlineapplicant->m_get_candidate_email($ah_id)){
				
				$this->mdl_onlineapplicant->m_update_status($ah_id);
				
				foreach($applicant as $a){
					$config = Array('mailtype'  => 'html','charset' => 'utf-8','wordwrap' => TRUE);
					$this->load->library('email', $config);
					$this->email->initialize($config);
					
					$tit ='';
					$subject = "Regrete Letter";
					$message = "";
					
					//$message .= date('F d, Y');
					$message .= date('d F Y');
					
					$message .= "<br/> <br/>";
					
					if($a->oa_gender == 'M'){
						$tit = 'Mr.';
					}else{
						$tit = 'Ms.';
					}
					
					$message .= "<strong>".strtoupper($tit)." ".strtoupper($a->oa_fname).' '.strtoupper($a->oa_mname).' '.strtoupper($a->oa_lname)."</strong><br/>";
					$message .= $a->oa_street.','.$a->brgy.',<br/>'.$a->city.', '.$a->province;
					$message .= " <br/><br/>";
					
					$message .= "Dear " .$tit.' '. $a->oa_lname. ",";
					$message .= "<br/> <br/>";
					
					
					
					$message .= "Thank you for your interest in applying in the City Government of San Fernando (P).";
					$message .= "<br/><br/>";
					$message .= "Your interview and qualifications made a favorable impression, however, we regret to inform you that another candidate was selected for the position. We appreciate the time and effort that you have invested in your application.";
					$message .= "<br/><br/>";
					$message .= "Thank you for your understanding and wish you all the best in your career.";
					$message .= "<br/><br/>";
					$message .= "Very truly yours,";
					$message .= "<br/> <br/>";
					$message .= "<strong>RACHELLE S. YUSI</strong>";
					$message .= "<br/>";
					$message .= "City Human Resource Development Officer";
					$message .= "<br/> <br/>";
					// $message .= "<i>Note: This is a system-generated e-mail. <strong>Please do not reply.</strong></i>";

				   $this->email->from('csfp.recruitment@gmail.com', 'City of San Fernando, Pampanga');
				   $this->email->to($a->oa_email);
				   $this->email->cc('csfp.recruitment@gmail.com');
				   $this->email->subject($subject);
				   $this->email->message($message);
				   $this->email->send();
				}
			
			$result = array('status' => 'yes','content'=> 'success');
			echo json_encode($result);
			
			}else{
				$result = array('status' => 'no','content'=> 'Failed. Please try again!');
				echo json_encode($result);
			}
			
				}else{
		$result = array('status' => 'no','content'=> 'Please select applicant by clicking the checkbox.');
				echo json_encode($result);
	}
			// echo $new_oa_id;
			// die();
			//	$applicant = $this->mdl_onlineapplicant->m_get_applicant();
			//	echo json_encode($applicant);
				
	}
	
	

	
	public function ajax_get_vacancy(){
	   $vacancy = $this->mdl_onlineapplicant->m_get_vacancy();
	   echo json_encode($vacancy);
   }
   
   public function ajax_get_appliedposition($id){
	   $appliedposition = $this->mdl_onlineapplicant->m_get_appliedposition($id);
	   echo json_encode($appliedposition);
   }
   public function ajax_get_info($id){
	   $info = $this->mdl_onlineapplicant->m_get_info($id);
	   echo json_encode($info);
   }
   
   public function ajax_get_application_status($id){
	   
	   $appinfo = $this->mdl_onlineapplicant->m_get_application_status($id);
	   echo json_encode($appinfo);
   }
   
   public function ajax_get_application_status2(){
	   $id = $this->input->get('oa_id');
	   $appinfo = $this->mdl_onlineapplicant->m_get_application_status($id);
	   echo json_encode($appinfo);
   }
   
   public function ajax_get_offices(){
	   $offices = $this->mdl_onlineapplicant->m_get_offices();
	   echo json_encode($offices);
   }
   
   public function ajax_get_requestionoffice(){
	   $requestingoffice = $this->mdl_onlineapplicant->m_get_requestionoffice();
	   echo json_encode($requestingoffice);
   }
   public function ajax_get_jobmatching(){
	   $jobmatch = $this->mdl_onlineapplicant->m_get_jobmatching();
	   echo json_encode($jobmatch);
   }
   
    public function ajax_get_brgy(){
		$id = '3';
	   $brgy = $this->mdl_onlineapplicant->m_get_brgy($id);
	   echo json_encode($brgy);
   }
   
	
	public function ajax_updateapplicationhistory(){
		$m_oa_id 			= $this->input->post('m_oa_id');
		$m_positiondesired 	= $this->input->post('m_positiondesired');
		$m_ah_remarks 		= $this->input->post('m_ah_remarks');
		$m_ah_status 		= $this->input->post('m_ah_status');
		$arr_oa_id 			= explode(",",$m_oa_id);
		$count_oa_id 		= count($arr_oa_id);
	
		$oa_history		= array();
		$oa_update		= "'".'0'."'";
			
		for($i = 0; $i < $count_oa_id; $i++){
			$oa_history[] .= '(
							"'.$arr_oa_id[$i].'",
							"'.$m_positiondesired.'",
							"'.$m_ah_remarks.'",
							"'.$m_ah_status.'",
							"'. 'YES' .'",
							"'. date('Y-m-d') .'"
							)';
		}	
		
		for($i = 0; $i < $count_oa_id; $i++){
			// $new_oa_id .= ','.$m_oa_id[$i];
			$oa_update.= ','."'".$arr_oa_id[$i]."'";
		}

		if($this->mdl_onlineapplicant->m_save_application_history($oa_history,$oa_update)){
				$result = array('status' => 'yes','content'=> 'success');
			echo json_encode($result);
		}else{
				$result = array('status' => 'no','content'=> 'failed');
			echo json_encode($result);
		}
	}
	
	
	public function ajax_application(){
		$m_oa_id 				= $this->input->post('m_oa_id');
		$jm_id 					= $this->input->post('m_jm_id');
		$jm_reqnum 				= $this->input->post('jm_reqnum');
		$m_positiondesired 		= $this->input->post('m_ah_positiondesired');
		$ah_desc 				= $this->input->post('m_ah_desc');
		$m_office 				= $this->input->post('m_office');
		$m_ah_remarks 			= $this->input->post('m_ah_remarks');
		$m_ah_status 			= $this->input->post('m_ah_status'); // YES or NO for approval of HR Head
		$arr_oa_id 				= explode(",",$m_oa_id);
		$count_oa_id 			= count($arr_oa_id);
	
		$oa_history		= array();
		$oa_update		= "'".'0'."'";
			
		for($i = 0; $i < $count_oa_id; $i++){
			$oa_history[] .= '(
							"'.$arr_oa_id[$i].'",
							"'.$jm_id.'",
							"'.$jm_reqnum.'",
							"'.$m_office.'",
							"'.$m_positiondesired.'",
							"'.$ah_desc.'",
							"'.$m_ah_remarks.'",
							"'.$m_ah_status.'",
							"'. 'YES' .'",
							"'. date('Y-m-d') .'"
							)';
		}	
		
		for($i = 0; $i < $count_oa_id; $i++){
			// $new_oa_id .= ','.$m_oa_id[$i];
			$oa_update.= ','."'".$arr_oa_id[$i]."'";
		}

		if($this->mdl_onlineapplicant->m_save_application_history($oa_history,$oa_update)){
				$result = array('status' => 'yes','content'=> 'success');
			echo json_encode($result);
		}else{
				$result = array('status' => 'no','content'=> 'failed');
			echo json_encode($result);
		}
	}
	
	public function ajax_jm_matching_update_and_email(){
		$m_oa_id 		= $this->input->post('m_oa_id');
		$es_position 	= $this->input->post('es_position');
		$es_date 		= $this->input->post('es_date');
		$es_time 		= $this->input->post('es_time');
		$arr_oa_id 			= explode(",",$m_oa_id);
		$count_oa_id 		= count($arr_oa_id);
	
		$oa_history		= array();
		$oa_update		= "'".'0'."'";
			
		for($i = 0; $i < $count_oa_id; $i++){
			$oa_history[] .= '(
							"'.$arr_oa_id[$i].'",
							"'.$m_positiondesired.'",
							"'.$m_ah_remarks.'",
							"'.$m_ah_status.'",
							"'. 'YES' .'",
							"'. date('Y-m-d') .'"
							)';
		}	
		
		for($i = 0; $i < $count_oa_id; $i++){
			$oa_update.= ','."'".$arr_oa_id[$i]."'";
		}

		if($this->mdl_onlineapplicant->m_save_application_history($oa_history,$oa_update)){
				$result = array('status' => 'yes','content'=> 'success');
			echo json_encode($result);
		}else{
				$result = array('status' => 'no','content'=> 'failed');
			echo json_encode($result);
		}
	}
	
	
	
		
	public function ajax_action_for_applicant(){
		$ah_id 		= $this->input->post('ah_id');
		$ah_status 	= $this->input->post('ah_status');
		
		$arr_ah_id			= explode(",",$ah_id);
		$count_ah_id		= count($arr_ah_id);
		$ah_update		= "'".'0'."'";
		
		for($i = 0; $i < $count_ah_id; $i++){
			// $new_oa_id .= ','.$m_oa_id[$i];
			$ah_update.= ','."'".$arr_ah_id[$i]."'";
		}
		
		if($this->mdl_onlineapplicant->m_action_for_applicant($ah_update,$ah_status)){
				$result = array('status' => 'yes','content'=> 'Success');
				echo json_encode($result);
				// exit();
			} else {
				$result = array('status' => 'no','content'=> 'Failed. Please try again!');
				echo json_encode($result);
				// exit();
			}
	}
		
	public function ajax_addapplication(){
		$data['oa_id'] 		= $this->input->post('m_oa_id');
		$data['ah_remarks'] 	= $this->input->post('m_ah_remark');
		$data['ah_remarksnotes'] 	= $this->input->post('m_ah_remarksnotes');
		$data['ah_remarksnotes_date'] 	= $this->input->post('m_ah_remarksnotes_date');
		$data['ah_datefiled'] 	= date('Y-m-d');
		$data['ah_status ']	= 'Pending';
		$data['ah_islatest ']	= 'YES';

		if($this->mdl_onlineapplicant->m_save_application($data)){
				$result = array('status' => 'yes','content'=> 'Success');
				echo json_encode($result);
				// exit();
			} else {
				$result = array('status' => 'no','content'=> 'Failed. Please try again!');
				echo json_encode($result);
				// exit();
			}
	}	
	
	public function update_applicant_result(){
		$ah_id	= $this->input->post('m_ah_id');
		$data['ah_remarks_status'] 	= $this->input->post('m_ah_remarks_status');
		$data['ah_remarksdate'] 	= $this->input->post('m_ah_remarksdate');


		if($this->mdl_onlineapplicant->m_update_app_result($ah_id,$data)){
				$result = array('status' => 'yes','content'=> 'Success');
				echo json_encode($result);
				// exit();
			} else {
				$result = array('status' => 'no','content'=> 'Failed. Please try again!');
				echo json_encode($result);
				// exit();
			}
	}	
	
	
	public function ajax_save_course(){
		$c_id	= $this->input->post('c_id');
		$data['c_name'] 	= $this->input->post('c_name');
		$data['c_code'] 	= $this->input->post('c_code');
		$data['c_category'] 	= $this->input->post('c_category');
		
	if($c_id == '' || $c_id == null){
		// insert
		if($this->mdl_onlineapplicant->m_save_course($data)){
				$result = array('status' => 'yes','content'=> 'Successfully Added');
				echo json_encode($result);
				// exit();
			} else {
				$result = array('status' => 'no','content'=> 'Failed. Please try again!');
				echo json_encode($result);
				// exit();
			}
	}else{
		// update
		if($this->mdl_onlineapplicant->m_update_course($c_id,$data)){
				$result = array('status' => 'yes','content'=> 'Successfully Update');
				echo json_encode($result);
				// exit();
			} else {
				$result = array('status' => 'no','content'=> 'Failed. Please try again!');
				echo json_encode($result);
				// exit();
			}
	}
		
	}
	
		
	public function ajax_get_applicant(){

			$ah_status = 'ALA';

			$applicant = $this->mdl_onlineapplicant->m_get_applicant($ah_status);
				echo json_encode($applicant);
				
	}
	
	public function get_forexam(){
				$data['title'] = 'Online Applicant';
				$data['content'] = 'onlineapplicant/v_forexam';
				$this->load->view('layouts/v_master', $data);
	}
	
	public function ajax_get_applicant_forexam(){
			$ah_status = 'For Exam and Interview';
			$applicant = $this->mdl_onlineapplicant->m_get_applicant_forexam();
				echo json_encode($applicant);		
	}
	
	public function get_forfiling(){
				$data['title'] = 'Online Applicant';
				$data['content'] = 'onlineapplicant/v_forfiling';
				$this->load->view('layouts/v_master', $data);
	}
	
	public function ajax_get_applicant_forfiling(){
			$applicant = $this->mdl_onlineapplicant->m_get_applicant_forfiling();
				echo json_encode($applicant);		
	}
	
	public function get_forforward(){
				$data['title'] = 'Online Applicant';
				$data['content'] = 'onlineapplicant/v_forforward';
				$this->load->view('layouts/v_master', $data);
	}
	
	public function ajax_get_applicant_forforward(){
			$applicant = $this->mdl_onlineapplicant->m_get_applicant_forforward();
				echo json_encode($applicant);		
	}
	
	public function get_forregret(){
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
		
				$data['title'] = 'Online Applicant';
				$data['content'] = 'onlineapplicant/v_forregret';
				$this->load->view('layouts/v_master', $data);
		}else{
			redirect('login');
		}
	}
	
	public function ajax_get_applicant_forregret(){
			$applicant = $this->mdl_onlineapplicant->m_get_applicant_forregret();
				echo json_encode($applicant);		
	}
	
	public function job_matching(){
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
				$data['title'] = 'Online Applicant';
				$data['content'] = 'onlineapplicant/v_jobmatching';
				$this->load->view('layouts/v_master', $data);
		}else{
			redirect('login');
		}
	}
	
	public function requestlist(){
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){
			$data['title'] = 'Online Applicant';
			$data['content'] = 'onlineapplicant/v_requestlist';
			$this->load->view('layouts/v_master', $data);
		}else{
			redirect('login');
		}
	
	}
	
	public function ajax_get_reqeuestlist(){
			$request = $this->mdl_onlineapplicant->m_get_reqeuestlist();
				echo json_encode($request);		
	}
	
	public function disapproved_request(){
		
		$jm_id = $this->input->post('m_jm_id');
		$a_profile = strtoupper($this->session->userdata('a_profile'));
		if($a_profile == 'ADMIN ASST II-STAFF'){
			$data['jm_hrstaff_remarks'] = $this->input->post('remarks');
			$data['jm_hrstaff'] = 'Disapproved';
			$data['jm_hrstaff_actiondate'] = date('Y-m-d');
			$is_authorized = 'yes';
		}elseif($a_profile == 'HRMO IV-RECORDS'){
			$data['jm_hrmofficer_remarks'] = $this->input->post('remarks');
			$data['jm_hrmofficer_c'] = $this->input->post('jm_hrmofficer_c');
			$data['jm_hrmofficer'] = 'Disapproved';
			$data['jm_hrmofficer_actiondate'] = date('Y-m-d');
			$is_authorized = 'yes';
		}elseif($a_profile == 'CHRDO OFFICER'){
			$data['jm_hrhead_remarks'] = $this->input->post('remarks');
			$data['jm_hrhead'] = 'Disapproved';
			$data['jm_hrhead_actiondate'] = date('Y-m-d');
			$is_authorized = 'yes';
		}else{
			$is_authorized = 'no';
		}

		if($is_authorized == 'yes'){
			if($this->mdl_onlineapplicant->m_update_job_matching($data,$jm_id)){
				$result = array('status' => 'yes','content'=> 'Success');
						echo json_encode($result);
			} else {
				$result = array('status' => 'no','content'=> 'Failed. Please try again!');
						echo json_encode($result);
			}
		}else{
				$result = array('status' => 'no','content'=> "You're not authorized!");	
						echo json_encode($result);
		}
		
	}
	
	public function approved_request(){
		
		$jm_id = $this->input->post('m_jm_id');
		$a_profile = strtoupper($this->session->userdata('a_profile'));

		if($a_profile == 'ADMIN ASST II-STAFF'){
			$data['jm_hrstaff_remarks'] = $this->input->post('remarks');
			$data['jm_hrstaff'] = 'Approved';
			$data['jm_hrstaff_actiondate'] = date('Y-m-d');
			$is_authorized = 'yes';
		}elseif($a_profile == 'HRMO IV-RECORDS'){
			$data['jm_hrmofficer_remarks'] = $this->input->post('remarks');
			$data['jm_hrmofficer_c'] = $this->input->post('jm_hrmofficer_c');
			$data['jm_hrmofficer'] = 'Approved';
			$data['jm_hrmofficer_actiondate'] = date('Y-m-d');
			$is_authorized = 'yes';
		}elseif($a_profile == 'CHRDO OFFICER'){
		
			$data['jm_hrhead_remarks'] = $this->input->post('remarks');
			$data['jm_prefix'] = date('m').''.date('y');

			if($result = $this->mdl_onlineapplicant->m_get_suffix_jm($data['jm_prefix'])){
				if($result != null){
					foreach($result as $r){
						$data['jm_suffix'] = $r->jm_suffix;
					} 
				}else{
					$data['jm_suffix'] = '001';
				}
			}else{
				$data['jm_suffix'] = '001';
			}
			
			$data['jm_hrhead'] = 'Approved';
			$data['jm_hrhead_actiondate'] = date('Y-m-d');
			$is_authorized = 'yes';
		}else{
			$is_authorized = 'no';
		}
		
		// if($this->mdl_onlineapplicant->m_update_job_matching($jm_id,$data)){
		// 	$result = array('status' => 'yes','content'=> 'Success');
		// 			echo json_encode($result);
		// } else {
		// 	$result = array('status' => 'no','content'=> 'Failed. Please try again!');
		// 			echo json_encode($result);
		// }

		if($is_authorized == 'yes'){

			if($this->mdl_onlineapplicant->m_update_job_matching($data,$jm_id)){
				$result = array('status' => 'yes','content'=> 'Success');
						echo json_encode($result);
			} else {
				$result = array('status' => 'no','content'=> 'Failed. Please try again!');
						echo json_encode($result);
			}
		}else{
				$result = array('status' => 'no','content'=> "You're not authorized!");	
						echo json_encode($result);
		}




	}
	
	public function ajax_cancel_request($jm_id){
		if($this->mdl_onlineapplicant->m_cancel_request($jm_id)){
			$result = array('status' => 'yes','content'=> 'Success');
						echo json_encode($result);
		}else{
			$result = array('status' => 'no','content'=> "Failed");	
						echo json_encode($result);
		}
	}
	
	
	
	public function ajax_get_course(){
			$vacancies = $this->mdl_onlineapplicant->m_get_course();
				echo json_encode($vacancies);		
	}
	
	
	public function ajax_get_province(){
			$province = $this->mdl_onlineapplicant->m_get_province();
				echo json_encode($province);		
	}
	public function ajax_get_city($p_id){
			$city = $this->mdl_onlineapplicant->m_get_city($p_id);
				echo json_encode($city);		
	}
	public function ajax_get_all_city(){
			$city = $this->mdl_onlineapplicant->m_get_all_city();
				echo json_encode($city);		
	}
	
	public function ajax_get_brgys($c_id){
			$brgy = $this->mdl_onlineapplicant->m_get_brgy($c_id);
				echo json_encode($brgy);		
	}
	
	public function ajax_save_job_matching(){
		
		if($_POST){
			
			$jm_id = $this->input->post('jm_id');
			$data['jm_office'] = $this->input->post('jm_office');
			$data['jm_position'] = $this->input->post('jm_position');
			$data['jm_desc'] = $this->input->post('jm_desc');
			$data['jm_course'] = $this->input->post('jm_course');
			$data['jm_category'] = $this->input->post('jm_category');
			$data['jm_eligibility'] = $this->input->post('jm_eligibility');
			$data['jm_gender'] = $this->input->post('jm_gender');
			$data['jm_reqdate'] = $this->input->post('jm_reqdate');	
			$data['jm_postgrad'] = $this->input->post('jm_postgrad');	
			
				if($jm_id != ''){
					// do update
					if($this->mdl_onlineapplicant->m_update_job_matching($data,$jm_id)){
						$result = array('status' => 'yes','content'=> 'Success');
						echo json_encode($result);
					} else {
						$result = array('status' => 'no','content'=> 'Failed. Please try again!');
						echo json_encode($result);
					}
				}else{
					// do insert
				
					$data['jm_prefix'] = date('m').''.date('y');

					if($result = $this->mdl_onlineapplicant->m_get_suffix_jm($data['jm_prefix'])){
					   if($result != null){
							foreach($result as $r){
								$data['jm_suffix'] = $r->jm_suffix;
							} 
					   }else{
						   $data['jm_suffix'] = '001';
					   }
				   }else{
							$data['jm_suffix'] = '001';
				   }
					
					
					if($this->mdl_onlineapplicant->m_save_job_matching($data)){
						$result = array('status' => 'yes','content'=> 'Success');
						echo json_encode($result);
					} else {
						$result = array('status' => 'no','content'=> 'Failed. Please try again!');
						echo json_encode($result);
					}
				}
		}else{
			$result = array('status' => 'no','content'=> 'YOU ARE NOT AUTHORIZED!');
						echo json_encode($result);
		}	
			
	}
	
	public function ajax_get_candidate($jm_id){
			$vacancies = $this->mdl_onlineapplicant->m_get_candidate($jm_id);
				echo json_encode($vacancies);		
	}
	
	public function ajax_get_course_category(){
			$vacancies = $this->mdl_onlineapplicant->m_get_course_category();
				echo json_encode($vacancies);		
	}
	
	public function ajax_reset_vacancy(){
			if($this->mdl_onlineapplicant->m_reset_vacancy()){
				$result = array('status' => 'yes','content'=> 'Success');
						echo json_encode($result);
			}else{
				$result = array('status' => 'no','content'=> 'Failed. Please try again!');
						echo json_encode($result);
			}
					
	}
	
	public function test_mail(){
				$this->load->view('onlineapplicant/v_email');
	}
	
	public function save_applicant(){
		// $oa_id = $this->input->post('oa_id');
		$data['oa_email'] = $this->input->post('oa_email');
		$data['oa_fname'] = $this->input->post('oa_fname');
		$data['oa_mname'] = $this->input->post('oa_mname');
		$data['oa_lname'] = $this->input->post('oa_lname');
		$data['oa_extname'] = $this->input->post('oa_extname');
		$data['oa_course'] = $this->input->post('oa_course');
		$data['oa_school'] = $this->input->post('oa_school');
		$data['oa_educremarks'] = $this->input->post('oa_educremarks');
		$data['oa_eligibility'] = $this->input->post('oa_eligibility');
		$data['oa_eligremarks'] = $this->input->post('oa_eligremarks');
		$data['oa_bdate'] = $this->input->post('oa_bdate');
		$data['oa_gender'] = $this->input->post('oa_gender');
		$data['oa_mobile'] = $this->input->post('oa_mobile');
		$data['oa_pdesire'] = $this->input->post('checkValues');
		$data['oa_street'] = $this->input->post('oa_street');
		$data['oa_brgy'] = $this->input->post('oa_brgy');
		$data['oa_city'] = $this->input->post('oa_city');
		$data['oa_province'] = $this->input->post('oa_province');
		$data['oa_region'] = $this->input->post('oa_region');
		$data['oa_recwork'] = $this->input->post('oa_recwork');
		$data['oa_rectraining'] = $this->input->post('oa_rectraining');
		$data['oa_awards'] = $this->input->post('oa_awards');
		$data['oa_skills'] = $this->input->post('oa_skills');
		$data['oa_password'] = '8c4b1850f2b93f670b55ab809adf57f1033d9414';
		// $data['oa_activationcode'] = $this->input->post('oa_activationcode');
		$data['oa_activationcode'] = random_string('unique');
		$data['oa_postgraduate'] = $this->input->post('oa_postgraduate');
		$data['oa_postgraduateremarks'] = $this->input->post('oa_postgraduateremarks');
		
		$data['oa_isactivated'] = 'YES';
		
		 // if($result = $this->mdl_onlineapplication->m_get_appnumber($oa_id)){
				// if($result != null){
					// foreach($result as $r){
						// $data['oa_suffix'] = $r->oa_suffix;
						// $data['oa_prefix'] = $r->oa_prefix;
					// } 
			   // }else{
				   // $data['oa_suffix'] = '001';
			   // }
		   // }else{
				 $data['oa_prefix'] = date('m').''.date('y');
			   if($result = $this->mdl_onlineapplicant->m_get_suffix($data['oa_prefix'])){
				   if($result != null){
						foreach($result as $r){
							$data['oa_suffix'] = $r->oa_suffix;
						} 
				   }else{
					   $data['oa_suffix'] = '001';
				   }
				   
			   }else{
						$data['oa_suffix'] = '001';
			   }
		   // }
		
				
		if($this->mdl_onlineapplicant->m_save_info($data)){
				// $activationcode = $this->uri->segment(3);
				$link = "http://cityofsanfernando.gov.ph/careers/onlineapplication/activation/".$data['oa_activationcode'];
				
				 		// $config = Array('mailtype'  => 'html', 'charset' => 'utf-8','wordwrap' => TRUE);
						// $this->load->library('email', $config);
						// $this->email->initialize($config);
						
				$config = Array('mailtype'  => 'html','charset' => 'utf-8','wordwrap' => TRUE);
					$this->load->library('email', $config);
					$this->email->initialize($config);		

						$subject = "LGU - CSFP Online Application number " . $data['oa_prefix'].'-'.$data['oa_suffix']."!";
						// $message = "<br/> <br/>";
						
						// $message .= "Dear, " . $data['oa_lname'] . ",";
						// $message .= " <br/><br/>";
						// $message = "Congratulations!";
						// $message = "<br/>";
						// $message = "You have successfully submitted your application to the City Government of San Fernando (P) Online Recruitment System!";
						// $message .= " <br/><br/>";
						// $message .= "Your Application number is : <h3>". $data['oa_prefix'].'-'.$data['oa_suffix'].'</h3>';
						// $message .= "<br/>";
						// $message .= "To update your details please click the link below";
						// $message .= " <br/><br/>";
						// $message .= $link;
						// $message .= " <br/><br/>";
						// $message .= "Thank you,";
						// $message .= " <br/><br/>";

						    $message = "<br/> <br/>";

                $message .= "Dear, Mam/Sir,";

                $message .= " <br/><br/>";

                $message .= ' Please sign in thru this link:';

                $message .= ' https://cityofsanfernando.gov.ph/careers/';

                $message .= " <br/><br/>";

                $message .= ' You can use your <strong>email address</strong> as your username and the default password is "<strong>password</strong>" (lowercase).';

                $message .= " <br/><br/>";

                $message .= "Thank you,";
                $message .= " <br/><br/>";

					   $this->email->from('csfp.recruitment@gmail.com', 'City of San Fernando, Pampanga');
					   $this->email->to($data['oa_email']);
					   $this->email->cc('csfp.recruitment@gmail.com');
					   $this->email->subject($subject);
					   $this->email->message($message);
					   $this->email->send();
					   
				$result = array('status' => 'yes', 'content' =>  'Success! Please take note of your Application #'. $data['oa_prefix'].'-'.$data['oa_suffix']);
				echo json_encode($result);   
				
		}else{
			 $result = array('status' => 'no', 'content' =>  'Failed');
				echo json_encode($result);
		}

	}
	
	

	
	
	public function update_applicant_info(){
		$oa_id = $this->input->post('oa_id');
		$data['oa_email'] = $this->input->post('oa_email');
		$data['oa_fname'] = $this->input->post('oa_fname');
		$data['oa_mname'] = $this->input->post('oa_mname');
		$data['oa_lname'] = $this->input->post('oa_lname');
		$data['oa_extname'] = $this->input->post('oa_extname');
		$data['oa_course'] = $this->input->post('oa_course');
		$data['oa_school'] = $this->input->post('oa_school');
		$data['oa_educremarks'] = $this->input->post('oa_educremarks');
		$data['oa_eligibility'] = $this->input->post('oa_eligibility');
		$data['oa_eligremarks'] = $this->input->post('oa_eligremarks');
		$data['oa_bdate'] = $this->input->post('oa_bdate');
		$data['oa_gender'] = $this->input->post('oa_gender');
		$data['oa_mobile'] = $this->input->post('oa_mobile');
		$data['oa_pdesire'] = $this->input->post('checkValues');
		$data['oa_street'] = $this->input->post('oa_street');
		$data['oa_brgy'] = $this->input->post('oa_brgy');
		$data['oa_city'] = $this->input->post('oa_city');
		$data['oa_province'] = $this->input->post('oa_province');
		$data['oa_region'] = $this->input->post('oa_region');
		$data['oa_recwork'] = $this->input->post('oa_recwork');
		$data['oa_rectraining'] = $this->input->post('oa_rectraining');
		$data['oa_awards'] = $this->input->post('oa_awards');
		$data['oa_skills'] = $this->input->post('oa_skills');
		$data['oa_activationcode'] = random_string('unique');
		$data['oa_postgraduate'] = $this->input->post('oa_postgraduate');
		$data['oa_postgraduateremarks'] = $this->input->post('oa_postgraduateremarks');
		
		$data['oa_isactivated'] = 'YES';
		
//$this->do_upload();
				
		if($this->mdl_onlineapplicant->m_update_info($data,$oa_id)){
				
					   
				$result = array('status' => 'yes', 'content' =>  'Applicant information successfully updated');
				echo json_encode($result);   
				
		}else{
			 $result = array('status' => 'no', 'content' =>  'Failed');
				echo json_encode($result);
		}

	}
	
	public function requestform($id){
		if($data['result'] = $this->mdl_onlineapplicant->m_get_requestinfo($id)){
			$data['content'] = 'onlineapplicant/v_requisitionform';
			$this->load->view('layouts/v_master',$data);
		}else{
			echo 'aa';
		}
	}
	
	public function ajax_check_oa_email(){
		$oa_email = $this->input->get('oa_email');
		if($this->mdl_onlineapplicant->m_check_oa_email($oa_email)){
			 $result = array('status' => 'yes', 'content' =>  'Email exist!');
				echo json_encode($result);
		}else{
			$result = array('status' => 'no', 'content' =>  "Email doesn't exist, you can now proceed.");
				echo json_encode($result);
		}
	}
	
	
	public function asaveimage($id = null)
		{
		//	$folder = $this->session->userdata('accountId').'_'.$this->session->userdata('firstname').' '.$this->session->userdata('lastname');
			
			if($this->input->post('pic') == 1){
				
				$emp_id = $this->input->post('oa_id');
				// $fullname = $this->input->post('hid_fullname');
					
				if (!file_exists('onlineapplicant_images/'.$emp_id)) {
					mkdir('onlineapplicant_images/'.$emp_id, 0777, true);
				}
				
				// echo ''
				// echo 'make directory';
				// die();

				$dataimage = $this->input->post('userpics');
			
				$newimage=	explode('[removed]',$dataimage);
				$me = 'data:image/png;base64,'.$newimage[0];
				$img = str_replace('data:image/png;base64,', '', $me);
				$img = str_replace(' ', '+', $img);
				$data = base64_decode($img);
				$file = 'onlineapplicant_images/'.$emp_id.'/'.$emp_id.'.png';
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
}
