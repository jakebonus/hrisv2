<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_api extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function m_api_emp_info($a_id){
		$sql = 'SELECT 	`a`.`a_id`,
						`a`.`a_empno`,
						`a`.`a_machineid`,
						`a`.`a_firstname`,
						`a`.`a_middlename`,
						`a`.`a_mi`,
						`a`.`a_lastname`,
						`a`.`a_namext`,
						`a`.`a_fdos`,
						`a`.`a_office`,
						`a`.`a_division`,
						`a`.`a_deptlocation`,
						`a`.`a_divlocation`,
						`a`.`a_position`,
						`a`.`a_status`,
						`a`.`a_salarygrade`,
						`a`.`a_salarystep`,
						`a`.`a_level`,
						`a`.`a_hieduc`,
						`a`.`a_hielig`,
						`p`.`pi_birthdate`,
						`p`.`pi_gender`,
						`p`.`pi_status`,
						`p`.`pi_citizenship`,
						`p`.`pi_height`,
						`p`.`pi_weight`,
						`p`.`pi_bloodtype`,
						`p`.`pi_gsis`,
						`p`.`pi_pagibig`,
						`p`.`pi_philhealth`,
						`p`.`pi_sss`,
						`p`.`pi_resstreet`,
						`p`.`pi_resbrgy`,
						`p`.`pi_rescity`,
						`p`.`pi_resprov`,
						`p`.`pi_reszip`,
						`p`.`pi_resphone`,
						`p`.`pi_permstreet`,
						`p`.`pi_permbrgy`,
						`p`.`pi_permcity`,
						`p`.`pi_permprov`,
						`p`.`pi_permzip`,
						`p`.`pi_permphone`,
						`p`.`pi_email`,
						`p`.`pi_phone`,
						`p`.`pi_tin`,
						`p`.`pi_birthplace`
				FROM `tbl_account` `a`
				LEFT JOIN `tbl_personalinfo` `p`
						ON `p`.`a_id` = `a`.`a_id`
				WHERE `a`.`a_id` = "'.$a_id.'"';
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();			
		} else {
			return false;
		}
	}

	
}
