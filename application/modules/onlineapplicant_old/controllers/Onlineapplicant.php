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
				$data['title'] = 'Online Applicant';
				$data['content'] = 'v_list';
				$this->load->view('layouts/v_master', $data);
	}
	
	public function listofapplicants(){
				$data['title'] = 'Online Applicant';
				$data['content'] = 'onlineapplicant/v_list';
				$this->load->view('layouts/v_master', $data);
	}
	
	public function vacancies(){
				$data['title'] = 'Online Applicant';
				$data['content'] = 'onlineapplicant/v_vacancies';
				$this->load->view('layouts/v_master', $data);
	}
	public function ajax_save_vacancy(){
		$data['v_position'] = $this->input->post('v_position');
		$data['v_desc'] = $this->input->post('v_desc');
		
		if($this->mdl_onlineapplicant->m_save_vacancy($data)){
			$result = array('status' => 'yes','content'=> 'success');
			echo json_encode($result);
			// exit();
		} else {
			$result = array('status' => 'no','content'=> 'Failed. Please try again!');
			echo json_encode($result);
			// exit();
		}
	}
	
	public function send_email(){
		
		$p_effectivitydate 	= $this->input->post('es_date');
			$oa_id 					= $this->input->post('oa_id');
			$es_date 				= $this->input->post('es_date');
			$es_time 				= $this->input->post('es_time');
			$es_venue 				= $this->input->post('es_venue');
			$count_oa_id 			= count($oa_id);
			// $new_sv 			= array();
			$new_oa_id				= '0';
		
			for($i = 0; $i < $count_oa_id; $i++){
				$new_oa_id .= ','.$oa_id[$i];
			}
			
			// $date = date("F t, Y", strtotime($es_date));
			// echo $date;
			// die();
			
			
			$applicant = $this->mdl_onlineapplicant->m_get_candidate_email($new_oa_id);
			
				$config = Array('mailtype'  => 'html','charset' => 'utf-8','wordwrap' => TRUE);
				$this->load->library('email', $config);
				$this->email->initialize($config);
				$tit ='';
				
				
				$subject = "Schedule for Exam";
				$message = "<br/> <br/>";
				
				
				
			foreach($applicant as $a){
		
				if($a->oa_gender == 'M'){
					$tit = 'Mr.';
				}else{
					$tit = 'Ms.';
				}
				
				$message .= $tit." ".$a->oa_fname.' '.$a->oa_mname.' '.$a->oa_lname;
				$message .= " <br/><br/>";
				$message .= $a->oa_street.'<br/>'.$a->brgy.' '.$a->city.' '.$a->province;
				$message .= " <br/><br/>";
				
				$message .= "Dear, ".$tit.' '. $a->oa_lname. "!";
			   	$message .= "<br/> <br/>";
				
				
				$message .= "Bla Bla";
				$message .= "<i>Note: This is a system-generated e-mail. <strong>Please do not reply.</strong></i>";

               $this->email->from('csfp.recruitment@gmail.com', 'City of San Fernando, Pampanga');
               $this->email->to($a->oa_email);
               $this->email->subject($subject);
               $this->email->message($message);
               $this->email->send();
			}
			
			// echo $new_oa_id;
			// die();
			//	$applicant = $this->mdl_onlineapplicant->m_get_applicant();
			//	echo json_encode($applicant);
				
	}
	public function ajax_get_applicant(){
				$applicant = $this->mdl_onlineapplicant->m_get_applicant();
				echo json_encode($applicant);
				
	}
	
	public function ajax_get_vacancy(){
	   $vacancy = $this->mdl_onlineapplicant->m_get_vacancy();
	   echo json_encode($vacancy);
   }
   
    public function ajax_get_brgy(){
		$id = '3';
	   $brgy = $this->mdl_onlineapplicant->m_get_brgy($id);
	   echo json_encode($brgy);
   }
   
	
	public function test_mail(){
				$this->load->view('onlineapplicant/v_email');
	}
	
}
