<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('mdl_account');
    }  

	public function index()
	{
		$data['error'] = 0;	
		if(!$this->session->userdata('a_id')){
			

			if($this->input->post('username') && $this->input->post('password')){	
				 $username = $this->input->post('username',true);
				 $password = $this->input->post('password',true);

				if($result = $this->mdl_account->m_login($username,$password)){
					
					foreach($result as $a)
					{
						$this->session->set_userdata('a_empno',$a->a_empno);
						$this->session->set_userdata('a_id',$a->a_id);
						$this->session->set_userdata('a_lastname',$a->a_lastname);
						//$this->session->set_userdata('officename', $a->o_name);
						$this->session->set_userdata('a_mi',$a->a_mi);
						$this->session->set_userdata('a_middlename',$a->a_middlename);
						$this->session->set_userdata('a_firstname',$a->a_firstname);
						$this->session->set_userdata('a_status',$a->a_status);
						$this->session->set_userdata('a_status',$a->a_status);
						$this->session->set_userdata('a_division',$a->a_division);
						$this->session->set_userdata('a_position',$a->a_position);
						$this->session->set_userdata('a_level',$a->a_level);
						$this->session->set_userdata('a_officetype',$a->a_officetype);
						$this->session->set_userdata('a_profile',$a->a_profile);
					}
					
					// module::run('employee/employee/index');
					//redirect('employee');
					$result = array('status' => 'yes','content'=> 'Success Login');
								echo json_encode($result);
								exit();
				}else{
					$data['error'] = 1;
					$result = array('status' => 'no','content'=> 'Failed to Login');
					echo json_encode($result);
					exit();
				}
			}
				$data['title'] = 'Account Log In Page';
				$data['content'] = 'v_login';
				$this->load->view('layouts/v_master', $data);
		}else{
			
			$a_level = strtolower($this->session->userdata('a_level'));
		
			switch ($a_level){
				
				case "manager":
					redirect('employee');
				break;
				
				case "employee":
					redirect('user');
				break;
			}
				
			
		}
	}
}
