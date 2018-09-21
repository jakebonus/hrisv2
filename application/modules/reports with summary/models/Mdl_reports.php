<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_reports extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function m_get_account()
	{
		$sql = "SELECT `a_id`,`a_firstname`,`a_position`
				FROM `tbl_account`";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();			
		} else {
			return false;
		}
	}

	//GET EMPLOYEE LIST
	public function m_employee_lists($data)
	{	
		$this->db->select('`tbl_account`.`a_id`,
							`tbl_account`.`a_empno`,
							`tbl_account`.`a_lastname`,
							`tbl_account`.`a_firstname`,
							`tbl_account`.`a_middlename`,
							`tbl_account`.`a_mi`,
							`tbl_account`.`a_namext`,
							`tbl_account`.`a_office`,
							`tbl_account`.`a_position`,
							`tbl_account`.`a_salarygrade`,
							`tbl_account`.`a_salarystep`,
							
							`tbl_account`.`a_status`,
							`tbl_account`.`a_isactive`,
							`tbl_personalinfo`.`pi_gender`,
							`tbl_personalinfo`.`pi_birthplace`,
							
							`od`.`o_code` AS `division`,
				  			`o`.`o_code` AS `o_code`,
							`tbl_account`.`a_level`,
							`tbl_account`.`a_fdos`,
							`tbl_account`.`a_ldos`');
							// `tbl_eligibility`.`el_type`');
		$this->db->from('`tbl_account`');
		$this->db->join('`tbl_office` `o`',
						'`o`.`o_id`=`tbl_account`.`a_office`',
						'left');
		$this->db->join('`tbl_office` `od`',
						'`od`.`o_id`=`tbl_account`.`a_division`',
						'left');
		// $this->db->join('`tbl_eligibility`',
		// 				'`tbl_eligibility`.`a_id`=`tbl_account`.`a_id`',
		// 				'left');
		$this->db->join('`tbl_personalinfo`',
						'`tbl_personalinfo`.`a_id`=`tbl_account`.`a_id`',
						'left');
		
		if ($data["a_isactive"] == 'no'){
			$this->db->where('`a_isactive`','no');
		} else {
			$this->db->where('`a_isactive`','yes');
		}
		if($data['a_office'] != 'ALL'){
			$this->db->where('`a_office`',$data['a_office']);
		}
		if($data['a_division'] != 'ALL'){
			$this->db->where('`a_division`',$data['a_division']);
		}
		
		// if($data['pi_gender'] != 'All'){
		// 	$this->db->where('`pi_gender`',$data['pi_gender']);
		// }
		
		// if ($data['a_level'] != 'All'){
		// 	$this->db->where('`a_level`',$data['a_level']);
		// }
		
		// if($data['a_position'] != 'All'){
		// 	$this->db->where('`a_position`',$data['a_position']);
		// }
			
		// if ($a_fdos == 1){
		// 	if($data['a_fdos_from'] != '' && $data['a_fdos_to'] != ''){
		// 		$this->db->where('a_fdos BETWEEN "'. date('Y-m-d', strtotime($data['a_fdos_from'])). '" AND "'. date('Y-m-d', strtotime($data['a_fdos_to'])).'"');
		// 	}
		// }
		
		// if ($a_ldos == 1){
		// 	if($data['a_ldos_from'] != '' && $data['a_ldos_to'] != ''){
		// 		$this->db->where('a_ldos BETWEEN "'. date('Y-m-d', strtotime($data['a_ldos_from'])). '" AND "'. date('Y-m-d', strtotime($data['a_ldos_to'])).'"');
		// 	}
		// }
		
		if (isset($data["status"])){	
			$this->db->where_in('a_status', $data["status"]);
		}

		$this->db->order_by('o_code', 'ASC');
		$this->db->order_by('division', 'ASC');
		$this->db->order_by('a_salarygrade', 'DESC');
		
		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$res['results'] = $query->result();
			$res['count'] = $query->num_rows();
			return $res;
		} else {
			return false;
		}
	}

	//GET EMPLOYEE SUMMARY LIST
	public function m_employee_summary_lists($data)
	{
		$a_isactive = $data['a_isactive'];
		
		$a_office = $data['a_office'];
		$a_office = ($a_office == 'ALL') ? "" : "AND `a`.`a_office` = '$a_office'";

		$a_division = $data['a_division'];
		$a_division = ($a_division == 'ALL') ? "" : "AND `a`.`a_division` = '$a_division'";

		$status = $data['status'];
		$a_status = "AND `a`.`a_status` IN ($status)";
		
		$where = "`a`.`a_isactive` = '$a_isactive' $a_office $a_division $a_status";
		
		$sql = "SELECT 
					`o`.`o_code` AS `department`,
					COUNT(`a`.`a_office`) AS `department_total`,
					`od`.`o_code` AS `divison`,
					COUNT(`a`.`a_division`)  AS `divison_total`
				FROM `tbl_account` `a`
				LEFT JOIN `tbl_office` `o`
					ON `o`.`o_id` = `a`.`a_office`
				LEFT JOIN `tbl_office` `od`
					ON `od`.`o_id` = `a`.`a_division`
				WHERE $where
				GROUP BY `divison`,`department`
				ORDER BY `department`,`divison` ASC";

		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$res['results'] = $query->result();
			$res['count'] = $query->num_rows();
			return $res;	
		} else {
			return false;
		}
	}

	public function m_count_emp_per_office()
	{
		$sql = "SELECT 
					`o`.`o_code` AS `department`,
					COUNT(`a`.`a_office`) AS `dept_total`
					
				FROM `tbl_account` `a`
					LEFT JOIN `tbl_office` `o`
						ON `o`.`o_id` = `a`.`a_office`

				WHERE `a`.`a_isactive` = 'yes'
					GROUP BY `department`
					ORDER BY `department` ASC";

		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			return $query->result();	
		} else {
			return false;
		}
	}


	//SERVICE RECORD
	public function m_get_employee_servicerecord($data){
		$id = $data['a_id'];
		$sql1 ="SELECT 
			`a`.`a_id`,
			`a`.`a_lastname`,
			`a`.`a_firstname`,
			`a`.`a_middlename`,
			DATE_FORMAT(`p`.`pi_birthdate`,'%M %d, %Y') AS `pi_birthdate`,
			`p`.`pi_birthplace`
			FROM `tbl_account` `a`
			LEFT JOIN `tbl_personalinfo` `p`
				ON `p`.`a_id` = `a`.`a_id`
			WHERE `a`.`a_id` = '$id'";
		$query1 = $this->db->query($sql1);
		
		// $sql2 ="SELECT 
			// `tbl_workinfo`.`a_id`,
			// `tbl_workinfo`.`p_from`,
			// `tbl_workinfo`.`p_to`,
			// `tbl_workinfo`.`p_position`,
			// `tbl_workinfo`.`p_appointment`,
			// `tbl_workinfo`.`p_salarymonthly`,
			// `tbl_workinfo`.`p_dept`,
			// `tbl_workinfo`.`p_div`,
			// `tbl_workinfo`.`p_lwop`,
			// `tbl_workinfo`.`p_company`,
			// `tbl_workinfo`.`p_sept_date`,
			// `tbl_workinfo`.`p_sept_cause`,
			// `tbl_workinfo`.`p_isservicerecord`
			// FROM `tbl_workinfo`
			// WHERE `tbl_workinfo`.`a_id` = '$id'
			// AND `tbl_workinfo`.`p_isservicerecord` = 'YES'
			// AND `tbl_workinfo`.`is_deleted` = 'NO'
			// ORDER BY `tbl_workinfo`.`p_from` DESC";
			$sql2 ="SELECT
					`a_id`,
					  p_from,
					  IF(p_to IS NULL OR p_to = '0000-00-00',
						IF(p_from=(SELECT MAX(p_from) FROM tbl_workinfo WHERE a_id='$id' AND (p_to IS NULL OR p_to = '0000-00-00')),
						  DATE_FORMAT(NOW(),'%m-%d--%y'),
						  'V-E-R-I-F-Y'),
						DATE_FORMAT(p_to,'%m-%d--%y')) AS p_to,
					  `p_position`,
					`p_appointment`,
					`p_salarymonthly`,
					`p_dept`,
					`p_div`,
					`p_lwop`,
					`p_company`,
					`p_sept_date`,
					`p_sept_cause`,
					`p_isservicerecord`
					FROM
					  tbl_workinfo
					WHERE
					  `a_id` ='$id' AND `p_isservicerecord` = 'YES' AND `is_deleted` = 'NO'
					ORDER BY
					  `p_from` ASC";
		$query2 = $this->db->query($sql2);
	
		if($query1){
			$res['result'] = $query1->result();
			$res['count'] = $query1->num_rows();
		}
		if($query2){
			$res['workinfo'] = $query2->result();
			$res['count'] = $query2->num_rows();
		}
		return $res;
	}

	//PDS
	public function m_get_pds($data){
		$this->db->select('
			`tbl_account`.`a_id`,
			`tbl_account`.`a_lastname`,
			`tbl_account`.`a_firstname`,
			`tbl_account`.`a_middlename`,
			`tbl_account`.`a_namext`,
			
			`tbl_personalinfo`.`a_id`,
			`tbl_personalinfo`.`pi_birthdate`,
			`tbl_personalinfo`.`pi_birthplace`,
			`tbl_personalinfo`.`pi_gender`,
			`tbl_personalinfo`.`pi_status`,
			`tbl_personalinfo`.`pi_citizenship`,
			`tbl_personalinfo`.`pi_height`,
			`tbl_personalinfo`.`pi_weight`,
			`tbl_personalinfo`.`pi_bloodtype`,
			`tbl_personalinfo`.`pi_gsis`,
			`tbl_personalinfo`.`pi_pagibig`,
			`tbl_personalinfo`.`pi_philhealth`,
			`tbl_personalinfo`.`pi_sss`,
			`tbl_personalinfo`.`pi_resstreet`,
			`tbl_personalinfo`.`pi_resbrgy`,
			`tbl_personalinfo`.`pi_rescity`,
			`tbl_personalinfo`.`pi_resprov`,
			`tbl_personalinfo`.`pi_reszip`,
			`tbl_personalinfo`.`pi_resphone`,
			`tbl_personalinfo`.`pi_permstreet`,
			`tbl_personalinfo`.`pi_permbrgy`,
			`tbl_personalinfo`.`pi_permcity`,
			`tbl_personalinfo`.`pi_permprov`,
			`tbl_personalinfo`.`pi_permzip`,
			`tbl_personalinfo`.`pi_permphone`,
			`tbl_personalinfo`.`pi_email`,
			`tbl_personalinfo`.`pi_mobile`,
			`tbl_personalinfo`.`pi_tin`,
			
			`tbl_familybg`.`a_id`,
			`tbl_familybg`.`fb_spouselname`,
			`tbl_familybg`.`fb_spousefname`,
			`tbl_familybg`.`fb_spousemi`,
			`tbl_familybg`.`fb_spousework`,
			`tbl_familybg`.`fb_spouseemployer`,
			`tbl_familybg`.`fb_spouseemployeraddress`,
			`tbl_familybg`.`fb_spouseemployerphone`,
			`tbl_familybg`.`fb_fatherlname`,
			`tbl_familybg`.`fb_fatherfname`,
			`tbl_familybg`.`fb_fathermi`,
			`tbl_familybg`.`fb_motherlname`,
			`tbl_familybg`.`fb_motherfname`,
			`tbl_familybg`.`fb_mothermi`,

		');
		$this->db->from('`tbl_account`');
		$this->db->join('`tbl_personalinfo`',
						'`tbl_personalinfo`.`a_id`=`tbl_account`.`a_id`',
						'left');
		$this->db->join('`tbl_familybg`',
						'`tbl_familybg`.`a_id`=`tbl_account`.`a_id`',
						'left');
		$this->db->where('`tbl_account`.`a_id`',$data['a_id']);
		// $this->db->where('`p_isservicerecord`','YES');
		$query = $this->db->get();
		if($query){
			return $query->result();
		}
	}
	
	public function m_get_pds_child($data){
		$this->db->select('
			`tbl_children`.`a_id`,
			`tbl_children`.`c_fname`,
			`tbl_children`.`c_mi`,
			`tbl_children`.`c_lname`,
			`tbl_children`.`c_extname`,
			`tbl_children`.`c_birthdate`,
			`tbl_children`.`c_forapproval`
		');
		$this->db->from('`tbl_children`');
		$this->db->where('`tbl_children`.`a_id`',$data['a_id']);
		$this->db->limit(13);
		$query = $this->db->get();
		if($query){
			$res['pds_child'] = $query->result();
			$res['pds_child_cnt'] = $query->num_rows();
			return $res;
		}
		
		
	}
	
	public function m_get_pds_educbg($data){
		$this->db->select('
			`tbl_educbg`.`a_id`,
			`tbl_educbg`.`pi_level`,
			`tbl_educbg`.`pi_schoolname`,
			`tbl_educbg`.`pi_degree`,
			`tbl_educbg`.`pi_yrgrad`,
			`tbl_educbg`.`pi_highestgrade`,
			`tbl_educbg`.`pi_from`,
			`tbl_educbg`.`pi_to`,
			`tbl_educbg`.`pi_honors`,
			`tbl_educbg`.`pi_forapproval`
		');
		$this->db->from('`tbl_educbg`');
		$this->db->where('`tbl_educbg`.`a_id`',$data['a_id']);
		$this->db->order_by('pi_from', 'ASC');
		$this->db->limit(5);
		$query = $this->db->get();
		if($query){
			$res_e['pds_educbg'] = $query->result();
			$res_e['pds_educbg_cnt'] = $query->num_rows();
			return $res_e;
		}
	}
	
	public function m_get_pds_eligibility($data){
		$this->db->select('
			`tbl_eligibility`.`a_id`,
			`tbl_eligibility`.`el_career`,
			`tbl_eligibility`.`el_rating`,
			`tbl_eligibility`.`el_examdate`,
			`tbl_eligibility`.`el_examplace`,
			`tbl_eligibility`.`el_number`,
			`tbl_eligibility`.`el_daterelease`,
			`tbl_eligibility`.`el_forapproval`,
		');
		$this->db->from('`tbl_eligibility`');
		$this->db->where('`tbl_eligibility`.`a_id`',$data['a_id']);
		$this->db->limit(7);
		$query = $this->db->get();
		if($query){
			$res_elig['pds_elig'] = $query->result();
			$res_elig['pds_elig_cnt'] = $query->num_rows();
			return $res_elig;
		}
	}
	
	public function m_get_pds_workinfo($data){
		$this->db->select('
			`tbl_workinfo`.`a_id`,
			`tbl_workinfo`.`p_from`,
			`tbl_workinfo`.`p_to`,
			`tbl_workinfo`.`p_position`,
			`tbl_workinfo`.`p_company`,
			`tbl_workinfo`.`p_salarymonthly`,
			`tbl_workinfo`.`p_salarygrade`,
			`tbl_workinfo`.`p_salarystep`,
			`tbl_workinfo`.`p_appointment`,
			`tbl_workinfo`.`p_isgovt`,
			`tbl_workinfo`.`p_forapproval`,
		');
		$this->db->from('`tbl_workinfo`');
		$this->db->where('`tbl_workinfo`.`a_id`',$data['a_id']);
		$this->db->order_by('`tbl_workinfo`.`p_from`', 'desc'); 
		$this->db->limit(19);	
		$query = $this->db->get();
		if($query){
			$res_workinfo['pds_workinfo'] = $query->result();
			$res_workinfo['pds_workinfo_cnt'] = $query->num_rows();
			return $res_workinfo;
		}
	}
	
	
	public function m_get_pds_training($data){
		$this->db->select('
			`tbl_training`.`a_id`,
			`tbl_training`.`t_seminar`,
			`tbl_training`.`t_from`,
			`tbl_training`.`t_to`,
			`tbl_training`.`t_hoursno`,
			`tbl_training`.`t_conductor`,
			`tbl_training`.`t_forapproval`
		');
		$this->db->from('`tbl_training`');
		$this->db->where('`tbl_training`.`a_id`',$data['a_id']);
		$this->db->order_by('`tbl_training`.`t_from`', 'desc'); 
		$this->db->limit(14);
		$query = $this->db->get();
		if($query){
			$res_training['pds_training'] = $query->result();
			$res_training['pds_training_cnt'] = $query->num_rows();
			return $res_training;
		}
	}
	
	public function m_get_pds_skills($data){
		$this->db->select('
			`tbl_skills_hobbies`.`a_id`,
			`tbl_skills_hobbies`.`sh_skills`,
			`tbl_skills_hobbies`.`sh_nonacademic`,
			`tbl_skills_hobbies`.`sh_membership`,
			`tbl_skills_hobbies`.`sh_forapproval`

		');
		$this->db->from('`tbl_skills_hobbies`');
		$this->db->where('`tbl_skills_hobbies`.`a_id`',$data['a_id']);
		$this->db->limit(5);
		$query = $this->db->get();
		if($query){
			$res_skills['pds_skills'] = $query->result();
			$res_skills['pds_skills_cnt'] = $query->num_rows();
			return $res_skills;
		}
	}
	
	public function m_get_pds_voluntarywork($data){
		$this->db->select('
			`tbl_voluntarywork`.`a_id`,
			`tbl_voluntarywork`.`vw_name`,
			`tbl_voluntarywork`.`vw_datefrom`,
			`tbl_voluntarywork`.`vw_dateto`,
			`tbl_voluntarywork`.`vw_nohours`,
			`tbl_voluntarywork`.`vw_work`,
			`tbl_voluntarywork`.`vw_forapproval`

		');
		$this->db->from('`tbl_voluntarywork`');
		$this->db->where('`tbl_voluntarywork`.`a_id`',$data['a_id']);
		$this->db->limit(6);
		$query = $this->db->get();
		if($query){
			$res_vwork['pds_vwork'] = $query->result();
			$res_vwork['pds_vwork_cnt'] = $query->num_rows();
			return $res_vwork;
		}
	}

	public function m_get_pds_questionnaire($data){
		$this->db->select('
			`tbl_questionnaire`.`q_id`,
			`tbl_questionnaire`.`a_id`,
			`tbl_questionnaire`.`q_36_a`,
			`tbl_questionnaire`.`q_36_a_details`,
			`tbl_questionnaire`.`q_36_b`,
			`tbl_questionnaire`.`q_36_b_details`,
			`tbl_questionnaire`.`q_37_a`,
			`tbl_questionnaire`.`q_37_a_details`,
			`tbl_questionnaire`.`q_37_b`,
			`tbl_questionnaire`.`q_37_b_details`,
			`tbl_questionnaire`.`q_38`,
			`tbl_questionnaire`.`q_38_details`,
			`tbl_questionnaire`.`q_39`,
			`tbl_questionnaire`.`q_39_details`,
			`tbl_questionnaire`.`q_40`,
			`tbl_questionnaire`.`q_40_details`,
			`tbl_questionnaire`.`q_41_a`,
			`tbl_questionnaire`.`q_41_a_details`,
			`tbl_questionnaire`.`q_41_b`,
			`tbl_questionnaire`.`q_41_b_details`,
			`tbl_questionnaire`.`q_41_c`,
			`tbl_questionnaire`.`q_41_c_details`
		');
		$this->db->from('`tbl_questionnaire`');
		$this->db->where('`tbl_questionnaire`.`a_id`',$data['a_id']);
		$query = $this->db->get();
		if($query){
			$res_ques['pds_ques'] = $query->result();
			return $res_ques;
		}
	}
	
	public function m_get_pds_reference($data){
		$this->db->select('
			`tbl_reference`.`a_id`,
			`tbl_reference`.`r_name`,
			`tbl_reference`.`r_address`,
			`tbl_reference`.`r_contactnum`,
			`tbl_reference`.`r_forapproval`
		');
		$this->db->from('`tbl_reference`');
		$this->db->where('`tbl_reference`.`a_id`',$data['a_id']);
		$this->db->limit(3);
		$query = $this->db->get();
		if($query){
			$res_ref['pds_ref'] = $query->result();
			$res_ref['pds_ref_cnt'] = $query->num_rows();
			return $res_ref;
		}
	}

	//REQUEST RECORD
	public function m_get_requestrecord()
	{
		$sql = "SELECT 
				CONCAT (`a`.`a_lastname`,', ',`a`.`a_firstname`) AS `name`,
				`r`.`r_id` AS id,
				`r`.`a_id`,
				`r`.`r_type`,
				`r`.`r_datefiled`,
				IF (`r`.`r_printeddate` != '','Printed','Pending') AS remarks,
				`r`.`r_noofcopy`,
				`r`.`r_purpose`,
				`r`.`r_processedby`,
				`r`.`r_printeddate`
			FROM `tbl_request` `r`
				LEFT JOIN `tbl_account` `a`
				ON `a`.`a_id` = `r`.`a_id`
			ORDER BY `r`.`r_datefiled` DESC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();			
		} else {
			return false;
		}
	}

	//SAVE RESQUEST RECORD 
	public function m_ajax_save_requestrecord($data)
	{
		$id = $data['r_id'];
		unset($data['r_id']);
		$this->db->where('r_id', $id);
		if($this->db->update('tbl_request',$data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function m_ajax_check_dateprinted_requestrecord($id)
	{
		$sql = "SELECT `r`.`r_id`
				FROM `tbl_request` `r`
				WHERE `r`.`r_printeddate` IS NULL AND `r`.`r_id` = '$id'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return '0';			
		} else {
			return '1';
		}
	}

	//LATEST SERVICE RECORD
	public function m_get_latest_servicerecord($data){
		$id = $data['a_id'];
		$sql1 ="SELECT 
		  `a`.`a_id`,
		  `a`.`a_lastname`,
		  `a`.`a_firstname`,
		  `a`.`a_middlename`,
		  `a`.`a_mi`,
		  LEFT(`a`.`a_middlename`, 1) AS `mi`,
		  `a`.`a_status`,
		  `a`.`a_position`,
		  `a`.`a_fdos`,
		  CASE
		    `pi`.`pi_gender` 
		    WHEN 'MALE' 
		    THEN 'He' 
		    WHEN 'FEMALE' 
		    THEN 'She' 
		  END AS `gender`,
		  `o`.`o_code` AS `department`,
		  `o`.`o_name` AS `department_name`,
		  `od`.`o_code` AS `division`,
		  `od`.`o_name` AS `division_name`
		FROM
		  `tbl_account` `a`
		LEFT JOIN `tbl_office` `o`
			ON `o`.`o_id` = `a`.`a_office` 
		LEFT JOIN `tbl_office` `od`
			ON `od`.`o_id` = `a`.`a_division`
		LEFT JOIN `tbl_personalinfo` `pi` 
    		ON `pi`.`a_id` = `a`.`a_id` 
		WHERE `a`.`a_id` = '$id'";
		$query1 = $this->db->query($sql1);
		
		$sql2 ="SELECT 
			  `w`.`a_id`,
			  `w`.`p_from`,
			  `w`.`p_to`,
			  `w`.`p_position`,
			  `w`.`p_appointment`,
			  `w`.`p_salarymonthly`,
			  `w`.`p_dept`,
			  `w`.`p_div`,
			  `w`.`p_lwop`,
			  `w`.`p_company`,
			  `w`.`p_sept_date`,
			  `w`.`p_sept_cause`,
			  `w`.`p_isservicerecord` 
			FROM
			  `tbl_workinfo` `w`
			WHERE `w`.`a_id` = '$id' 
			  AND `w`.`p_isservicerecord` = 'YES' 
			  AND `w`.`is_deleted` = 'NO'
			ORDER BY `w`.`p_from` DESC
			LIMIT 1";
		$query2 = $this->db->query($sql2);
	
		if($query1){
			$res['result'] = $query1->result();
			$res['count'] = $query1->num_rows();
		}
		if($query2){
			$res['workinfo'] = $query2->result();
			$res['count2'] = $query2->num_rows();
		}
		return $res;
	}

	//LEAVE
	public function m_ajax_leave_list()
	{
		$sql = "SELECT 
					`l`.`l_id`,
					`l`.`a_id`,
					CONCAT (`n`.`a_lastname`,', ',`n`.`a_firstname`,' ',`n`.`a_middlename`) AS `name`,
					`l`.`l_status`,
					`l`.`l_agency`,
					`l`.`l_datefiled`,
					`l`.`l_position`,
					`l`.`l_sg`,
					IF(`l`.`l_typespecify` = ' ',`l`.`l_type`,`l`.`l_typespecify`) AS `l_type`,
					`l`.`l_remarks`,
					`l`.`l_sg`,
					`l`.`l_inclusivedates`,
					`l`.`l_commutation`,
					`l`.`l_disapprovereason`,
					`l`.`l_statusdivision`,
					`l`.`l_statusdept`,
					`l`.`l_statushr`,
					`l`.`l_hr_action_date`,
					`l`.`l_asmayor_action_date`,
					`l`.`l_vl`,
					`l`.`l_sl`,
					`l`.`l_asof`,
					CONCAT (`a`.`a_firstname`,' ',`a`.`a_middlename`,' ',`a`.`a_lastname`) AS `depthead`,
					CONCAT (`a`.`a_firstname`,' ',`a`.`a_middlename`,' ',`a`.`a_lastname`) AS `divhead`,
					IF (`l`.`l_printeddate` != '','Printed','Pending') AS remarks
				FROM
				  `tbl_leaves` `l`
				INNER JOIN `tbl_account` `a`
					ON `a`.`a_id` = `l`.`l_dept_sig`
				LEFT JOIN `tbl_account` `aa`
					ON `aa`.`a_id` = `l`.`l_div_sig`
				LEFT JOIN `tbl_account` `n`
					ON `n`.`a_id` = `l`.`a_id`
				WHERE `l`.`l_statusasmayor` = 'Approved'
				AND `l`.`leave_status` = 'Applied'
				";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();			
		} else {
			return false;
		}
	}

	//LEAVE MASTERLIST
	public function m_ajax_leave_masterlist()
	{
		$sql = "SELECT 
					`l`.`l_id`,
					`l`.`a_id`,
					CONCAT (`n`.`a_firstname`,' ',`n`.`a_middlename`,' ',`n`.`a_lastname`) AS `name`,
					`l`.`l_status`,
					`l`.`l_agency`,
					`l`.`l_datefiled`,
					`l`.`l_position`,
					IF(`l`.`l_typespecify` = ' ',`l`.`l_type`,`l`.`l_typespecify`) AS `l_type`,
					`l`.`l_remarks`,
					`l`.`l_inclusivedates`,
					`l`.`leave_status`,
					`l`.`l_disapprovereason`,
					`l`.`l_statusdivision`,
					DATE_FORMAT(`l`.`l_div_action_date`,'%b %d, %Y') AS `l_div_action_date`,
					`l`.`l_statusdept`,
					DATE_FORMAT(`l`.`l_dept_action_date`,'%b %d, %Y') AS `l_dept_action_date`,
					`l`.`l_statushr`,
					DATE_FORMAT(`l`.`l_hr_action_date`,'%b %d, %Y') AS `l_hr_action_date`,
					`l`.`l_statusasmayor`,
					DATE_FORMAT(`l`.`l_asmayor_action_date`,'%b %d, %Y') AS `l_asmayor_action_date`,
					`l`.`l_vl`,
					`l`.`l_sl`,
					`l`.`l_asof`,
					CONCAT (`a`.`a_firstname`,' ',`a`.`a_middlename`,' ',`a`.`a_lastname`) AS `depthead`,
					CONCAT (`a`.`a_firstname`,' ',`a`.`a_middlename`,' ',`a`.`a_lastname`) AS `divhead`,
					IF (`l`.`l_printeddate` != '','Printed','Pending') AS remarks
				FROM
				  `tbl_leaves` `l`
				INNER JOIN `tbl_account` `a`
					ON `a`.`a_id` = `l`.`l_dept_sig`
				LEFT JOIN `tbl_account` `aa`
					ON `aa`.`a_id` = `l`.`l_div_sig`
				LEFT JOIN `tbl_account` `n`
					ON `n`.`a_id` = `l`.`a_id`
				-- WHERE `l`.`l_statusasmayor` = 'Approved' 
				";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();			
		} else {
			return false;
		}
	}

	//LEAVE - CHECK DATE IF NULL
	public function m_ajax_check_dateprinted_leave($id)
	{
		$sql = "SELECT `l`.`l_id`
				FROM `tbl_leaves` `l`
				WHERE `l`.`l_printeddate` IS NULL AND `l`.`l_id` = '$id'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return '0';			
		} else {
			return '1';
		}
	}

	
	public function m_update_leave_printdate($l_id,$print_date){
		$sql = "UPDATE `tbl_leaves` SET `l_printeddate`= '$print_date' WHERE `l_id` IN($l_id)";
		$query = $this->db->query($sql);
		if($query)
		{
			return true;
		} else {
			return false;
		}
	}	
	public function get_leaves_summary($l_ids){
		$sql = "SELECT *  FROM `tbl_leaves` `l`
					INNER JOIN `tbl_account` `a` ON
						`a`.`a_id` = `l`.`a_id`
				WHERE `l`.`l_id` IN($l_ids)";
		
		
		
		$query = $this->db->query($sql);
		if($query->num_rows() > 0 )
		{
			return $query->result();
		} else {
			return false;
		}
	}
	
	//LEAVE - SAVE DATE  
	public function m_ajax_save_dateprinted_leave($data)
	{
		$id = $data['l_id'];
		unset($data['l_id']);
		$this->db->where('l_id', $id);
		if($this->db->update('tbl_leaves',$data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	//LEAVE SELECT
	public function m_ajax_get_leave($l_id)
	{
		/*
			l_where
			SL
				0 -  Out pat
				1 - Hospital
					
			Vl
				0 - Within Phil
				1 - ABRoad

		*/
		$sql = "SELECT 
					`l`.`l_id`,
					`l`.`a_id`,
					`n`.`a_lastname`,
					`n`.`a_middlename`,
					`n`.`a_firstname`,

					`l`.`l_eld`,
					`l`.`l_agency`,
					`l`.`l_datefiled`,
					`l`.`l_status`,
					`l`.`l_typespecify`,
					`l`.`l_where`,
					`l`.`l_position`,
					`a`.`a_status`,
					`l`.`l_sg`,
					`l`.`l_type`,
					`l`.`l_remarks`,
					`l`.`l_noofworkingdays`,
					`l`.`l_inclusivedates`,
					`l`.`l_commutation`,
					`l`.`l_disapprovereason`,
					`l`.`l_div_sig`,
					`l`.`l_dept_sig`,
					`l`.`l_statusdivision`,
					`l`.`l_statusdept`,
					`l`.`l_typeofapplication`,
					
					`l`.`l_statusasmayor`,
					`l`.`l_asmayor`,
					`l`.`l_statushr`,
					`l`.`l_vl`,
					`l`.`l_sl`,
					`l`.`l_asof`,
					CONCAT (`a`.`a_firstname`,' ',`a`.`a_middlename`,' ',`a`.`a_lastname`) AS `depthead`,
					CONCAT (`a`.`a_firstname`,' ',`a`.`a_middlename`,' ',`a`.`a_lastname`) AS `divhead`,
					CONCAT (`m`.`a_firstname`,' ',`m`.`a_middlename`,' ',`m`.`a_lastname`) AS `asmayor_name`,
					`m`.`a_position` AS `m_position`,
					IF (`l`.`l_printeddate` != '','Printed','Pending') AS remarks,
					`a`.`a_office` AS sig_officeid,
  					`o`.`o_code` AS sig_office,
  					`o`.`o_type`,
  					`o`.`o_dessig`
				FROM
				  `tbl_leaves` `l`
				INNER JOIN `tbl_account` `a`
					ON `a`.`a_id` = `l`.`l_dept_sig`
				LEFT JOIN `tbl_account` `aa`
					ON `aa`.`a_id` = `l`.`l_div_sig`
				LEFT JOIN `tbl_account` `m`
					ON `m`.`a_id` = `l`.`l_asmayor`
				LEFT JOIN `tbl_account` `n`
					ON `n`.`a_id` = `l`.`a_id`
				LEFT JOIN `tbl_office` `o`
					ON `a`.`a_office` = `o`.`o_id`
				WHERE `l`.`l_id` = '$l_id'
				";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$res['results'] = $query->result();
			$res['count'] = $query->num_rows();
			return $res;	
		} else {
			return false;
		}
	}

	//LEAVE GET POSITION
	public function m_get_leaveposition()
	{
		$sql = 'SELECT DISTINCT `l_agency` FROM `tbl_leaves` WHERE `l_agency` != "" ORDER BY `l_agency` ASC';
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();			
		} else {
			return false;
		}
	}

	//GET OIC
	// public function m_ajax_get_oic()
	// {
	// 	$sql = "SELECT 
	// 	  `o`.`o_id`,
	// 	  `a`.`a_id`,
	// 	  CONCAT(`a`.`a_firstname`,' ',CONCAT(SUBSTR(`a`.`a_middlename`, 1, 1), '.'),' ',`a`.`a_lastname`) AS `oic_name`
	// 	FROM
	// 	  `tbl_office` `o` 
	// 	  LEFT JOIN `tbl_account` `a` 
	// 	    ON `a`.`a_id` = `o`.`o_head` 
	// 	WHERE `o_id` = '2'";
	// 	$query = $this->db->query($sql);
	// 	if($query->num_rows() > 0)
	// 	{
	// 		$res['results'] = $query->result();
	// 		$res['count'] = $query->num_rows();
	// 		return $res;	
	// 	} else {
	// 		return false;
	// 	}
	// }

	//GET OIC
	public function m_ajax_get_head_chrdo()
	{
		$sql = "SELECT 
				  `o`.`o_id`,
				  `a`.`a_id`,
				  CONCAT(
				    `a`.`a_firstname`,
				    ' ',
				    CONCAT(SUBSTR(`a`.`a_middlename`, 1, 1), '.'),
				    ' ',
				    `a`.`a_lastname`
				  ) AS `chrdo_name`,
				  CASE
				    `pi`.`pi_gender` 
				    WHEN 'MALE' 
				    THEN 'MR.' 
				    WHEN 'FEMALE' 
				    THEN 'MS.' 
				  END AS `mm`
				FROM
				  `tbl_office` `o` 
				  LEFT JOIN `tbl_account` `a` 
				    ON `a`.`a_id` = `o`.`o_head` 
				  LEFT JOIN `tbl_personalinfo` `pi` 
				    ON `pi`.`a_id` = `a`.`a_id` 
				WHERE `o_id` = '11'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$res['results'] = $query->result();
			$res['count'] = $query->num_rows();
			return $res;	
		} else {
			return false;
		}
	}

	//NOTICE OF STEP INCREMENT
	public function m_get_step_increment(){
		$sql = "SELECT 	`w`.`w_id`,
					`w`.`a_id`,
					CONCAT(`a`.`a_firstname`,' ',`a`.`a_middlename`,' ',`a`.`a_lastname`) AS `emp_name`,
					DATE(DATE_SUB(NOW(),INTERVAL 3 YEAR)) AS `3years`,
					`a`.`a_machineid`,
					`a`.`a_empno`,
					`a`.`a_office`,
				  	`a`.`a_division`,
				  	`a`.`a_status`,
				  	`a`.`a_position`,
				  	CASE `p`.`pi_gender`
				    	WHEN 'Male' THEN 'M' 
				    	WHEN 'Female' THEN 'F' 
				  	END AS `pi_gender`,
				  	`od`.`o_code` AS `a_division`,
				  	`o`.`o_code` AS `a_office`,
					`w`.`p_from`,
					`w`.`p_to`,
					`w`.`p_position`,
					`w`.`p_note_remarks`
				FROM `tbl_workinfo` `w`
				INNER JOIN `tbl_account` `a`
					ON `a`.`a_id` = `w`.`a_id`
				LEFT JOIN `tbl_office` `o`
					ON `o`.`o_id` = `a`.`a_office`
				LEFT JOIN `tbl_office` `od`
					ON `od`.`o_id` = `a`.`a_division`
				LEFT JOIN `tbl_personalinfo` `p`
					ON `p`.`a_id` = `a`.`a_id`
				WHERE
					`w`.`p_from` >= DATE(DATE_SUB(NOW(),INTERVAL 3 YEAR))
					AND `w`.`p_to` IS NULL
					AND (`w`.`p_note_remarks` = 'ORIGINAL APPOINTMENT'
					OR `w`.`p_note_remarks` = 'RE-EMPLOYMENT'
					OR `w`.`p_note_remarks` = 'RE-APPOINTMENT'
					OR `w`.`p_note_remarks` = 'PROMOTION'
					OR `w`.`p_note_remarks` = 'STEP-INCREMENT'
					OR `w`.`p_note_remarks` = 'NOSI')
					AND `w`.`p_isservicerecord` = 'YES'
					AND `a`.`a_isactive` = 'yes'
					AND `a`.`a_status` = 'PERMANENT'
				ORDER BY `w`.`p_from` DESC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}		
	}

	public function m_ajax_get_nosi($w_id)
	{
		$sql = "SELECT 
			  `w`.`w_id`,
			  `w`.`p_position`,
			  `a`.`a_lastname`,
			  `a`.`a_middlename`,
			  LEFT(`a`.`a_middlename`, 1) AS `a_mi`,
			 `a`.`a_firstname`,
			  `a`.`a_namext`,
			  `w`.`p_salarygrade`,
			  `w`.`p_salarystep`,
			  `w`.`p_salarymonthly` * 12 AS `annual_salary`,
			  `w`.`p_salarystep` - 1 AS `old_salary_step`,
			  (SELECT `ss_monthly` * 12 FROM `tbl_salaryschedule` WHERE `ss_grade` = `w`.`p_salarygrade` AND `ss_step` = `p_salarystep` - 1 AND `ss_effectivitydate` < `w`.`p_from` ORDER BY `ss_effectivitydate` DESC LIMIT 1) AS `oldsalary`,
			  CASE
			    `p`.`pi_gender` 
			    WHEN 'Male' 
			    THEN 'Mr.' 
			    WHEN 'Female' 
			    THEN 'Ms.' 
			  END AS `pi_gender` 
			FROM
			  `tbl_workinfo` `w` 
			  LEFT JOIN `tbl_account` `a` 
			    ON `a`.`a_id` = `w`.`a_id` 
			  LEFT JOIN `tbl_personalinfo` `p` 
			    ON `p`.`a_id` = `w`.`a_id` 
			   -- LEFT JOIN `tbl_salaryschedule` `s` 
			     -- ON `s`.`ss_grade` = `w`.`p_salarygrade` 
			WHERE `w_id` IN($w_id)";

		// $sql = "SELECT * FROM `tbl_workinfo` WHERE `w_id` IN($w_id)";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}


	//GET SALARY GRADE LIST
	public function m_get_salarygrade()
	{
		$sql = "SELECT s.ss_grade, ss_effectivitydate,
		   MAX(CASE WHEN s.ss_step ='1' THEN FORMAT(s.ss_monthly/22,2) END) AS daily_wage,
	       MAX(CASE WHEN s.ss_step ='1' THEN FORMAT(s.ss_monthly,2) END) AS step1,  
	       MAX(CASE WHEN s.ss_step ='2' THEN FORMAT(s.ss_monthly,2) END) AS step2,
	       MAX(CASE WHEN s.ss_step ='3' THEN FORMAT(s.ss_monthly,2) END) AS step3,
	       MAX(CASE WHEN s.ss_step ='4' THEN FORMAT(s.ss_monthly,2) END) AS step4,
	       MAX(CASE WHEN s.ss_step ='5' THEN FORMAT(s.ss_monthly,2) END) AS step5,
	       MAX(CASE WHEN s.ss_step ='6' THEN FORMAT(s.ss_monthly,2) END) AS step6,
	       MAX(CASE WHEN s.ss_step ='7' THEN FORMAT(s.ss_monthly,2) END) AS step7,
	       MAX(CASE WHEN s.ss_step ='8' THEN FORMAT(s.ss_monthly,2) END) AS step8
			FROM tbl_salaryschedule s
			-- WHERE ss_effectivitydate = '2016-01-01'
			GROUP BY ss_grade, ss_effectivitydate
			ORDER BY ss_effectivitydate,ss_grade ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();			
		} else {
			return false;
		}
	}

	public function m_get_salarygrade_year()
	{
		
		$sql = "SELECT DISTINCT(`ss_effectivitydate`) AS year FROM `tbl_salaryschedule` ORDER BY year DESC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();			
		} else {
			return false;
		}
	}
	

	
}
