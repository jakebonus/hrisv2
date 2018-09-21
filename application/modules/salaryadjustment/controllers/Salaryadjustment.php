<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salaryadjustment extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_salaryadjustment');
		$this->load->library('form_validation');
	}

	public function adjustsalary(){

		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){

			$data['title'] = 'Salary Adjustment';
			$data['content'] = 'salaryadjustment/v_adjustsalary';
			$this->load->view('layouts/v_master',$data);

		}else{
			redirect('user');
		}
	}

	public function ajax_get_candidate_for_salary_adjustment(){
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){

			$result = $this->mdl_salaryadjustment->m_get_candidate_for_salary_adjustment();
			echo json_encode($result);

		}else{
			redirect('user');
		}
	}

	public function ajax_adjust_salary(){
		if($this->session->userdata('a_id') !== null && strtolower($this->session->userdata('a_level')) == 'manager'){


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

				if($old_sv = $this->mdl_salaryadjustment->m_get_sv($w_id,$p_effectivitydate)){

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
									"'.'SALARY ADJUSTMENT'.'",
									"'.$this->session->userdata('a_empno').'",
									"'.date('Y-m-d').'"
							 )';
						}
					}

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

				if($sv_error != 0){
					$sv_error_notify = 'no';
				}else{
					$sv_error_notify = 'yes';
				}
				// echo $sv_error;

				if(!empty($new_sv)){

					if($this->mdl_salaryadjustment->m_update_sv($new_w_id,$p_to)){
						if($this->mdl_salaryadjustment->m_save_new_sv($new_sv)){

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

}
