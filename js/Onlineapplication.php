<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Onlineapplication extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_onlineapplication');
		$this->load->library('form_validation');
	}
	
	public function index(){
				$data['err'] = '0';
				$data['title'] = 'Online Application';
				$data['content'] = 'v_form';
				$this->load->view('layouts/v_master', $data);
	}
	
	public function updateinfo(){
		$oa_id = $this->input->post('oa_id');
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
		$data['oa_awards'] = $this->input->post('oa_awards');
		$data['oa_skills'] = $this->input->post('oa_skills');
		$data['oa_isactivated'] = 'YES';
		
		// echo $data['oa_pdesire'];
		// die();
		
		  $data['oa_prefix'] = date('m').''.date('y');
		  // $data['oa_prefix'] = '0417';
		   // die();
		   
		   if($result = $this->mdl_onlineapplication->m_get_suffix($data['oa_prefix'],$oa_id)){
			   if($result != null){
					foreach($result as $r){
						$data['oa_suffix'] = $r->oa_suffix;
					} 
			   }else{
				   $data['oa_suffix'] = '001';
			   }
			   
			   // echo $data['oa_suffix'];
			   // echo 'null ya';
			   // die();
		   }else{
					$data['oa_suffix'] = '001';
		   }
		   // echo $data['oa_prefix'].'-'.$data['oa_suffix'].' ('.$oa_id;
		   // die();
		
		if($this->mdl_onlineapplication->m_update_info($oa_id,$data)){
				$result = array('status' => 'yes', 'content' =>  'Success!');
				echo json_encode($result);
		}else{
			 $result = array('status' => 'no', 'content' =>  'Failed');
				echo json_encode($result);
		}

	}
	
	
	public function verifyemail(){
       if ($_POST) {
           $data['oa_activationcode'] = random_string('unique');
           $activation_url = auto_link('http://cityofsanfernando.gov.ph/careers/onlineapplication/activation/' . $data['oa_activationcode']);

           $data['oa_email'] = preg_replace('/\s+/', '', $this->input->post('oa_email'));
           // $data['txt_regconfirm'] = preg_replace('/\s+/', '', $this->input->post('txt_regconfirm'));
           $parts = explode("@", $data['oa_email']);
           $info['username'] = ucwords($parts[0]);

           $this->session->set_userdata('oa_email', $data['oa_email']);


				   if ($this->mdl_onlineapplication->m_save_applicant($data)) {

					  $config = Array(
								'mailtype'  => 'html', 
								'charset' => 'utf-8',
								'wordwrap' => TRUE

							);
						$this->load->library('email', $config);
						$this->email->initialize($config);

						$subject = "LGU - CSFP Online Application for " . $info['username']."!";
						$message = "<br/> <br/>";
						$message .= "Dear, " . $info['username'] . ",";
						$message .= " <br/><br/>";
						$message .= " WELCOME to CSFP Online Recruitment System";
						$message .= " <br/><br/>";
						$message .= " Please verify your email address and start your online application by clicking the link below:";
						$message .= "<br/><br/>". $activation_url."<br/><br/>";
						$message .= " <br/><br/>";
						$message .= " Thnks,";
						$message .= " <br/>--<br/>";
						$message .= "<strong>Recruitment, Selection and Placement Section</strong>";
						$message .= " <br/>";
						$message .= "<i>City Human Resource Management Office</i>";
						$message .= " <br/>";
						$message .= "<i>Local Government Unit</i>";
						$message .= " <br/>";
						$message .= "<i>City of San Fernando, Pampanga</i>";
						$message .= " <br/>";
						$message .= "<i>Tel No. <u>(045) 961-8640 </u> local 203 </i>";
						$message .= " <br/><br/>";
						$message .= "<i>Note: This is a system-generated e-mail. <strong>Please do not reply.</strong></i>";

					   $this->email->from('csfp.recruitment@gmail.com', 'City of San Fernando, Pampanga');
					   $this->email->to($data['oa_email']);
					   $this->email->subject($subject);
					   $this->email->message($message);
					   $this->email->send();
					   $content = "We've sent an email to  ".$data['oa_email'].". Kindly also check our message on spam folder. Thank you!";
					   $result = array('status' => 'yes', 'content' =>  $content);
						echo json_encode($result);
					}else{
						$result = array('status' => 'no', 'content' =>  ' '. $data['oa_email'].' already exist!');
						echo json_encode($result);
						
					}
			
		}
	}
	
	
	public function activation()
	{
       $activationcode = $this->uri->segment(3);
       if ($activationcode == "") {
				$data['err'] = '1';
			    $data['title'] = 'Online Application';
				$data['content'] = 'v_form';
				$this->load->view('layouts/v_master', $data);
       } else {
		   
		  // echo  date('m');
		  // echo  '<br/>';
		  // echo  date('y');
		  // $prefix = date('m').''date('y');
		   // die();
		   
           if ($data['result'] = $this->mdl_onlineapplication->m_account_activation($activationcode)) {
				// echo '<pre>';
				// print_r($data['result']);
				// echo $data['result']['0']=>['oa_id'];
				// die();
				foreach ($data['result'] as $i){
					$oa_id = $i->oa_id;
				}
			   $data['course'] = $this->mdl_onlineapplication->m_get_course();
			   $data['province'] = $this->mdl_onlineapplication->m_get_province();
			   $data['city'] = $this->mdl_onlineapplication->m_all_get_city();
			   $data['brgy'] = $this->mdl_onlineapplication->m_all_get_brgy();
			   $data['vacancies'] = $this->mdl_onlineapplication->m_get_vacancy();
			   
			   $data['appliedposition'] = $this->mdl_onlineapplication->m_get_appliedposition($oa_id);
			   // $appliedposition = $this->mdl_onlineapplication->m_get_appliedposition($oa_id);
				// $data['appliedposition'] = array();
				// $data['appliedposition'] = '0';
					// foreach($appliedposition as $a){
						// $data['appliedposition'] .= ','.$a->v_id;
					// }
				// print_r($data['appliedposition']);
				// print_r($appliedposition);
				// die();
				// echo $oa_id;
				// foreach($data['vacancies'] as $v){
				// if(in_array($v->v_id, $data['appliedposition'])){ echo 'checked <br/>'; }
				// }
				// die();
               $data['title'] = 'Online Application';
			   $data['content'] = 'v_information';
               $this->load->view('layouts/v_master',$data);
           } else {
				$data['err'] = '1';
			    $data['title'] = 'Online Application';
				$data['content'] = 'v_form';
				$this->load->view('layouts/v_master', $data);
           }
       }
   }
   
   public function resend(){
	   
	   $data['oa_email'] = $this->input->post('oa_email');
	   if($result = $this->mdl_onlineapplication->m_check_email($data)){
		   foreach($result as $r){
			  $oa_activationcode = $r->oa_activationcode;
			  $oa_email = $r->oa_email;
		   }
						$activation_url = auto_link('http://cityofsanfernando.gov.ph/careers/onlineapplication/activation/' . $oa_activationcode);
						
						$parts = explode("@", $oa_email);
						$username = ucwords($parts[0]);
						
						
						$config = Array('mailtype'  => 'html','charset' => 'utf-8','wordwrap' => TRUE);
						$this->load->library('email', $config);
						$this->email->initialize($config);

						$subject = "LGU - CSFP Online Application for " . $username."!";
						$message = "<br/> <br/>";
						$message .= "Dear, " . $username . ",";
						$message .= " <br/><br/>";
						$message .= " WELCOME to CSFP Online Recruitment System";
						$message .= " <br/><br/>";
						$message .= " Please verify your email address and start your online application by clicking the link below:";
						$message .= "<br/><br/>". $activation_url."<br/><br/>";
						$message .= " <br/><br/>";
						$message .= " Thnks,";
						$message .= " <br/>--<br/>";
						$message .= "<strong>Recruitment, Selection and Placement Section</strong>";
						$message .= " <br/>";
						$message .= "<i>City Human Resource Management Office</i>";
						$message .= " <br/>";
						$message .= "<i>Local Government Unit</i>";
						$message .= " <br/>";
						$message .= "<i>City of San Fernando, Pampanga</i>";
						$message .= " <br/>";
						$message .= "<i>Tel No. <u>(045) 961-8640 </u> local 203 </i>";
						$message .= " <br/><br/>";
						$message .= "<i>Note: This is a system-generated e-mail. <strong>Please do not reply.</strong></i>";

					   $this->email->from('csfp.recruitment@gmail.com', 'City of San Fernando, Pampanga');
					   $this->email->to($oa_email);
					   $this->email->subject($subject);
					   $this->email->message($message);
					   $this->email->send();
					   $content = "We've sent an email to  ".$oa_email.". Kindly also check our message on spam folder. Thank you!";
					   $result = array('status' => 'yes', 'content' =>  $content);
						echo json_encode($result);
		   
	   }else{
		   
	   }
	   
	   
   }

   
   public function ajax_get_city($id){
	   $city = $this->mdl_onlineapplication->m_get_city($id);
	   echo json_encode($city);
   }
	
	public function ajax_get_brgy($id){
	   $brgy = $this->mdl_onlineapplication->m_get_brgy($id);
	   echo json_encode($brgy);
   }
	 public function ajax_get_vacancy(){
	   $vacancy = $this->mdl_onlineapplication->m_get_vacancy();
	   echo json_encode($vacancy);
   }
}
