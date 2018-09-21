<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_employee extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function m_get_employeelist() {
		// $sql = "SELECT
		// 			`a`.`a_id` AS `a_action`,
		// 		  	`a`.`a_id`,
		// 		  	`a`.`a_empno`,
		// 		  	`a`.`a_lastname`,
		// 		  	`a`.`a_middlename`,
		// 		  	`a`.`a_firstname`,
		// 		  	`a`.`a_namext`,
		// 		  	CONCAT (`a`.`a_lastname`,', ',`a`.`a_firstname`) AS `name`,
		// 		  	`a`.`a_office`,
		// 		  	`a`.`a_division`,
		// 		  	`a`.`a_status`,
		// 		  	`a`.`a_position`,
		// 		  	`a`.`a_machineid`,
		// 		  	CASE `p`.`pi_gender`
		// 		    	WHEN 'Male' THEN 'M'
		// 		    	WHEN 'Female' THEN 'F'
		// 		  	END AS `pi_gender`,
		// 		  	`od`.`o_code` AS `a_division`,
		// 		  	`o`.`o_code` AS `a_office`,
		// 		  	`o`.`o_name`,
		// 		  	`a`.`a_fdos`,
		// 		  	`a`.`a_ldos`,
		// 		  	`a`.`a_isactive`,
		// 		  	CASE `a`.`a_isactive`
		// 		    	WHEN 'yes' THEN '✔'
		// 		    	WHEN 'no' THEN 'X'
		// 		  	END AS `active`,
		// 		  	DATE_FORMAT(`p`.`pi_birthdate`,'%m/%d/%Y') AS `pi_birthdate`,
		// 			`p`.`pi_birthplace`,
		// 			DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),`p`.`pi_birthdate` )), '%Y-%m-d')+0 AS pi_age,
		// 			CONCAT (`p`.`pi_resstreet`,' ',`p`.`pi_resbrgy`,' ',`p`.`pi_rescity`) AS `res_address`,
		// 			`p`.`pi_resphone`,
		// 			CONCAT (`p`.`pi_permstreet`,' ',`p`.`pi_permbrgy`,' ',`p`.`pi_permcity`) AS `perm_address`,
		// 			`p`.`pi_permphone`,
		// 			`p`.`pi_status`,
		// 			`p`.`pi_tin`,
		// 			`p`.`pi_gsis`,
		// 			`p`.`pi_philhealth`,
		// 			`p`.`pi_pagibig`,
		// 			`p`.`pi_sss`,
		// 			CONCAT (`a`.`a_salarygrade`,' ',`a`.`a_salarystep`) AS `salary_grade`,
		// 		  	`a`.`a_hieduc`,
		// 		  	`a`.`a_hielig`,
		// 		  	DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),`a`.`a_fdos` )), '%Y-%m-d')+0 AS `no_of_service`
		// 		FROM `tbl_account` `a`
		// 		LEFT JOIN `tbl_office` `o`
		// 			ON `o`.`o_id` = `a`.`a_office`
		// 		LEFT JOIN `tbl_office` `od`
		// 			ON `od`.`o_id` = `a`.`a_division`
		// 		LEFT JOIN `tbl_personalinfo` `p`
		// 			ON `p`.`a_id` = `a`.`a_id`
		// 		WHERE `a_level` != 'Manager'
		// 		GROUP BY `a`.`a_id`";

		$sql = "SELECT
				  `a`.`a_id` AS `a_action`,
				  `a`.`a_id`,
				  `a`.`a_empno`,
				  `a`.`a_lastname`,
				  `a`.`a_middlename`,
				  `a`.`a_firstname`,
				  `a`.`a_namext`,
				  `a`.`a_fdos`,
				  CONCAT(
				    `a`.`a_lastname`,
				    ', ',
				    `a`.`a_firstname`
				  ) AS `name`,
				  -- `a`.`a_office`,
				  -- `a`.`a_division`,
				  -- `a`.`a_status`,
				  -- `a`.`a_position`,
				  `a`.`a_machineid`,
				  CASE
				    `p`.`pi_gender`
				    WHEN 'Male'
				    THEN 'M'
				    WHEN 'Female'
				    THEN 'F'
				  END AS `pi_gender`,
				  `od`.`o_code` AS `a_division`,
				  `o`.`o_code` AS `a_office`,
				  `o`.`o_name`,
				  -- `a`.`a_fdos`,
				  `a`.`a_ldos`,
				  `a`.`a_isactive`,
				  CASE
				    `a`.`a_isactive`
				    WHEN 'yes'
				    THEN '✔'
				    WHEN 'no'
				    THEN 'X'
				  END AS `active`,
				  DATE_FORMAT(`p`.`pi_birthdate`, '%m/%d/%Y') AS `pi_birthdate`,
				  `p`.`pi_birthplace`,
				  DATE_FORMAT(
				    FROM_DAYS(DATEDIFF(NOW(), `p`.`pi_birthdate`)),
				    '%Y-%m-d'
				  ) + 0 AS pi_age,
				  CONCAT(
				    `p`.`pi_resstreet`,
				    ' ',
				    `p`.`pi_resbrgy`,
				    ' ',
				    `p`.`pi_rescity`
				  ) AS `res_address`,
				  `p`.`pi_resphone`,
				  CONCAT(
				    `p`.`pi_permstreet`,
				    ' ',
				    `p`.`pi_permbrgy`,
				    ' ',
				    `p`.`pi_permcity`
				  ) AS `perm_address`,
				  `p`.`pi_permphone`,
				  `p`.`pi_status`,
				  `p`.`pi_tin`,
				  `p`.`pi_gsis`,
				  `p`.`pi_philhealth`,
				  `p`.`pi_pagibig`,

				  `p`.`pi_sss`,
				  /* CONCAT(
				    `a`.`a_salarygrade`,
				    ' ',
				    `a`.`a_salarystep`
				  ) AS `salary_grade`,*/
				  `a`.`a_hieduc`,
				  `a`.`a_hielig`,
				  DATE_FORMAT(
				    FROM_DAYS(DATEDIFF(NOW(), `a`.`a_fdos`)),
				    '%Y-%m-d'
				  ) + 0 AS `no_of_service`,
				  `w`.`a_id`,
				  `w`.`w_id`,
				  `w`.`p_appointment` AS `a_status`,
				  `w`.`p_position` AS `a_position`,
				  `w`.`p_dept` AS `a_office`,
				  `w`.`p_div` AS `a_division`,
				  CONCAT(
				    `w`.`p_salarygrade`,
				    '/',
				    `w`.`p_salarystep`
				  ) AS `salary_grade`,
				  `w`.`p_from`,
				  CASE
				    WHEN `ww`.`p_from` IS NOT NULL
				    THEN `ww`.`p_from`
				    ELSE `a`.`a_fdos`
				  END AS `F_DOS` -- `ww`.`p_from` AS `F_DOS`
				FROM
				  `tbl_account` `a`
				  LEFT JOIN `tbl_office` `o`
				    ON `o`.`o_id` = `a`.`a_office`
				  LEFT JOIN `tbl_office` `od`
				    ON `od`.`o_id` = `a`.`a_division`
				  LEFT JOIN `tbl_personalinfo` `p`
				    ON `p`.`a_id` = `a`.`a_id`
				  LEFT JOIN
				    (SELECT
				      `t1`.`a_id`,
				      `t1`.`w_id`,
				      `t1`.`p_from`,
				      `t1`.`p_position`,
				      `t1`.`p_appointment`,
				      `t1`.`p_dept`,
				      `t1`.`p_div`,
				      `t1`.`p_salarygrade`,
				      `t1`.`p_salarystep`
				    FROM
				      `tbl_workinfo` `t1`
				      JOIN
				        (SELECT
				          `w`.`a_id`,
				          `w`.`w_id`,
				          `w`.`p_position`,
				          `w`.`p_appointment`,
				          `w`.`p_dept`,
				          `w`.`p_div`,
				          `w`.`p_salarygrade`,
				          `w`.`p_salarystep`,
				          MAX(`p_from`) AS `MAXDATE`
				        FROM
				          `tbl_workinfo` `w`
				        WHERE `w`.`p_isservicerecord` = 'YES'
				        GROUP BY `w`.`a_id`) `t2`
				        ON `t1`.`a_id` = `t2`.`a_id`
				        AND `t1`.`p_from` = `t2`.`MAXDATE`
				    WHERE `t1`.`p_isservicerecord` = 'YES') `w`
				    ON `w`.`a_id` = `a`.`a_id`
				  LEFT JOIN
				    (SELECT
				      `min_t1`.`a_id`,
				      `min_t1`.`w_id`,
				      `min_t1`.`p_from`
				    FROM
				      `tbl_workinfo` `min_t1`
				      JOIN
				        (SELECT
				          `min_w`.`a_id`,
				          `min_w`.`w_id`,
				          MIN(`p_from`) AS `MINDATE`
				        FROM
				          `tbl_workinfo` `min_w`
				        WHERE `min_w`.`p_isservicerecord` = 'YES'
				        GROUP BY `min_w`.`a_id`) `min_t2`
				        ON `min_t1`.`a_id` = `min_t2`.`a_id`
				        AND `min_t1`.`p_from` = `min_t2`.`MINDATE`
				    WHERE `min_t1`.`p_isservicerecord` = 'YES'
				      AND (
				        `min_t1`.`p_note_remarks` = 'ORIGINAL APPOINTMENT'
				        OR `min_t1`.`p_note_remarks` = 'RE-EMPLOYMENT'
				        OR `min_t1`.`p_note_remarks` = 'RE-APPOINTMENT'
				      )) `ww`
				    ON `ww`.`a_id` = `a`.`a_id`
				WHERE `a_level` != 'Manager'
				GROUP BY `a`.`a_id`";
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_get_employeelist_xls() {
		$sql = "SELECT
			`a`.`a_id` AS `a_action`,
			`a`.`a_id`,
			`a`.`a_empno`,
			CONCAT(`a`.`a_lastname`,', ',`a`.`a_firstname`) AS `name`,
			`a`.`a_office`,
			`a`.`a_division`,
			`a`.`a_status`,
			`a`.`a_position`,
			`a`.`a_machineid`,
			CASE
			  `p`.`pi_gender`
			  WHEN 'Male'
			  THEN 'M'
			  WHEN 'Female'
			  THEN 'F'
			END AS `pi_gender`,
			`od`.`o_code` AS `a_division`,
			`o`.`o_code` AS `a_office`,
			`o`.`o_name`,
			`a`.`a_fdos`,
			`a`.`a_ldos`,
			`a`.`a_isactive`,
			CASE
			  `a`.`a_isactive`
			  WHEN 'yes'
			  THEN '✔'
			  WHEN 'no'
			  THEN 'X'
			END AS `active`,
			`p`.`pi_birthdate`,
			`p`.`pi_birthplace`,
			DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),`p`.`pi_birthdate` )), '%Y-%m-d')+0 AS pi_age,
			CONCAT(`p`.`pi_resstreet`,' ',`p`.`pi_resbrgy`,' ',`p`.`pi_rescity`) AS `res_address`,
			`p`.`pi_resphone`,
			CONCAT(`p`.`pi_permstreet`,' ',`p`.`pi_permbrgy`,' ',`p`.`pi_permcity`) AS `perm_address`,
			`p`.`pi_permphone`,
			`p`.`pi_status`,
			`p`.`pi_bloodtype`,
			`p`.`pi_tin`,
			`p`.`pi_gsis`,
			`p`.`pi_philhealth`,
			`p`.`pi_pagibig`,
			`p`.`pi_sss`,
			CONCAT(`a`.`a_salarygrade`, ' ', `a`.`a_salarystep`) AS `salary_grade`,
			`a`.`a_hieduc`,
			`a`.`a_hielig`,
			GROUP_CONCAT(DISTINCT(CONCAT(PERIOD_DIFF(DATE_FORMAT(`p_to`,'%Y%m'), DATE_FORMAT(`p_from`,'%Y%m')),'-',`w`.`p_position`)),'\r' SEPARATOR '') AS `work_experience`,
			GROUP_CONCAT(DISTINCT(CONCAT(`t`.`t_hoursno`,'-',`t`.`t_seminar`)),'\r' SEPARATOR '') AS `training`,
			GROUP_CONCAT(DISTINCT(CONCAT(`el`.`el_career`,'-',`el`.`el_examdate`,'-',`el`.`el_examplace`,'-',`el`.`el_rating`)),'\r' SEPARATOR '') AS `eligibility`
			FROM `tbl_account` `a`
			LEFT JOIN `tbl_office` `o`
			ON `o`.`o_id` = `a`.`a_office`
			LEFT JOIN `tbl_office` `od`
			ON `od`.`o_id` = `a`.`a_division`
			LEFT JOIN `tbl_personalinfo` `p`
			ON `p`.`a_id` = `a`.`a_id`
			LEFT JOIN `tbl_workinfo` `w`
			ON `w`.`a_id` = `a`.`a_id`
			LEFT JOIN `tbl_training` `t`
			ON `t`.`a_id` = `a`.`a_id`
			LEFT JOIN `tbl_eligibility` `el`
			ON `el`.`a_id` = `a`.`a_id`
			WHERE `a_level` != 'Manager'
			GROUP BY `a`.`a_id`";
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_delete_emp($id,$data)
	{
		if ($data == 1) {
			$this->db->set('`a_isactive`','no');
		} else {
			$this->db->set('`a_isactive`','yes');
		}
		$this->db->where('`a_id`', $id);
		if($this->db->update('`tbl_account`')) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function m_get_isactive($id)
	{
        $sql = "SELECT `a_isactive`
				FROM `tbl_account`
				WHERE `a_id` = $id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

	public function m_get_position()
	{

		$sql = 'SELECT `p_name` as `a_position` FROM `tbl_positions` ORDER BY `p_name` ASC';
		//$sql = 'SELECT DISTINCT `a_position` FROM `tbl_account` WHERE `a_position` != "" && `a_position` != "All" ORDER BY `a_position` ASC';
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_get_office()
	{
		$sql = "SELECT `o_id`,`o_code`,`o_name`
				FROM `tbl_office`
				WHERE `o_type` = 'Department' ORDER BY `o_code` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_get_all_division()
	{
		$sql = "SELECT `o_id`,`o_code`,`o_name`
				FROM `tbl_office`
				WHERE `o_type` = 'Division' ORDER BY `o_code` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_get_employee_list()
	{
		$sql = "SELECT `a_id`,concat(`a_lastname`,',',`a_firstname`,' ',`a_middlename`) as `emp_name`,`a_isactive` FROM `tbl_account` WHERE `a_level` <> 'Manager'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_get_division($dept){
		$this->db->select('`o_id`');
		$this->db->where('`o_code`',$dept);
		$this->db->where('`o_isactive`','yes');
		$this->db->from('`tbl_office`');
		$query = $this->db->get();
		if($query->num_rows() > 0 ){

			$o_id =  $query->result();

				$this->db->select('*');
				$this->db->where('`o_mother`',$o_id[0]->o_id);
				$this->db->where('`o_isactive`','yes');
				$this->db->from('`tbl_office`');
				$query2 = $this->db->get();
				return $query2->result();
		}else{
			return false;
		}
	}

	public function m_get_division1($dept){
		$this->db->select('`o_id`,`o_code`');
		$this->db->where('`o_mother`',$dept);
		$this->db->where('`o_isactive`','yes');
		$this->db->from('`tbl_office`');
		$query = $this->db->get();
		if($query->num_rows() > 0 ){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_get_hielig()
	{
		$sql = 'SELECT DISTINCT `a_hielig` FROM `tbl_account` WHERE `a_hielig` != "" ORDER BY `a_hielig` ASC';
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_get_hieduc()
	{
		$sql = 'SELECT DISTINCT `a_hieduc` FROM `tbl_account` WHERE `a_hieduc` != "" ORDER BY `a_hieduc` ASC';
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_get_emp_info($a_id){
		// $sql = 'SELECT 	`a`.`a_id`,
						// `a`.`a_empno`,
						// `a`.`a_machineid`,
						// `a`.`a_firstname`,
						// `a`.`a_middlename`,
						// `a`.`a_mi`,
						// `a`.`a_lastname`,
						// `a`.`a_namext`,
						// `a`.`a_fdos`,
						// `a`.`a_office`,
						// `a`.`a_division`,
						// `a`.`a_deptlocation`,
						// `a`.`a_divlocation`,
						// `a`.`a_position`,
						// `a`.`a_status`,
						// `a`.`a_salarygrade`,
						// `a`.`a_salarystep`,
						// `a`.`a_level`,
						// `a`.`a_hieduc`,
						// `a`.`a_hielig`,
						// `p`.`pi_birthdate`,
						// `p`.`pi_gender`,
						// `p`.`pi_status`,
						// `p`.`pi_citizenship`,
						// `p`.`pi_height`,
						// `p`.`pi_weight`,
						// `p`.`pi_bloodtype`,
						// `p`.`pi_gsis`,
						// `p`.`pi_pagibig`,
						// `p`.`pi_philhealth`,
						// `p`.`pi_sss`,
						// `p`.`pi_resstreet`,
						// `p`.`pi_resbrgy`,
						// `p`.`pi_rescity`,
						// `p`.`pi_resprov`,
						// `p`.`pi_reszip`,
						// `p`.`pi_resphone`,
						// `p`.`pi_permstreet`,
						// `p`.`pi_permbrgy`,
						// `p`.`pi_permcity`,
						// `p`.`pi_permprov`,
						// `p`.`pi_permzip`,
						// `p`.`pi_permphone`,
						// `p`.`pi_email`,
						// `p`.`pi_phone`,
						// `p`.`pi_tin`,
						// `p`.`pi_birthplace`
				// FROM `tbl_account` `a`
				// LEFT JOIN `tbl_personalinfo` `p`
						// ON `p`.`a_id` = `a`.`a_id`
				// WHERE `a`.`a_id` = "'.$a_id.'"';
	$sql = 'SELECT 	`a`.`a_id`,
	`a`.`a_id` AS `main_id`,
	`w`.`p_position` AS `a_position`,
	`w`.`p_salarygrade`,
	`w`.`p_salarystep`,
	`w`.`p_appointment` AS `a_status`,
	`w`.`p_dept` AS `a_office`,
	`w`.`p_div` AS `a_division`,
	`w`.`p_salarygrade` AS `a_salarygrade`,
	`w`.`p_salarystep` AS `a_salarystep`,
						`a`.`a_empno`,
						`a`.`a_machineid`,
						`a`.`a_firstname`,
						`a`.`a_middlename`,
						`a`.`a_mi`,
						`a`.`a_lastname`,
						`a`.`a_namext`,
						`a`.`a_fdos`,
						-- `a`.`a_office`,
						-- `a`.`a_division`,
						`a`.`a_deptlocation`,
						`a`.`a_divlocation`,
						-- `a`.`a_position`,
						-- `a`.`a_status`,
						-- `a`.`a_salarygrade`,
						-- `a`.`a_salarystep`,
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
				  LEFT JOIN
				    (SELECT
				      `t1`.`a_id`,
				      `t1`.`w_id`,
				      `t1`.`p_from`,
				      `t1`.`p_position`,
				      `t1`.`p_appointment`,
				      `t1`.`p_dept`,
				      `t1`.`p_div`,
				      `t1`.`p_salarygrade`,
				      `t1`.`p_salarystep`
				    FROM
				      `tbl_workinfo` `t1`
				      JOIN
				        (SELECT
				          `w`.`a_id`,
				          `w`.`w_id`,
				          `w`.`p_position`,
				          `w`.`p_appointment`,
				          `w`.`p_dept`,
				          `w`.`p_div`,
				          `w`.`p_salarygrade`,
				          `w`.`p_salarystep`,
				          MAX(`p_from`) AS `MAXDATE`
				        FROM
				          `tbl_workinfo` `w`
				        WHERE `w`.`p_isservicerecord` = "YES" AND `w`.`is_deleted` = "NO"
				        GROUP BY `w`.`a_id`) `t2`
				        ON `t1`.`a_id` = `t2`.`a_id`
				        AND `t1`.`p_from` = `t2`.`MAXDATE`
				    WHERE `t1`.`p_isservicerecord` = "YES"  AND `t1`.`is_deleted` = "NO" ) `w`
				    ON `w`.`a_id` = `a`.`a_id`
				WHERE `a`.`a_id` = "'.$a_id.'"';
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_get_emp_familly($a_id){

		$sql = "SELECT * FROM `tbl_familybg` WHERE `a_id` = $a_id";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}

	}

	public function m_get_emp_children($a_id){

		$sql = "SELECT * FROM `tbl_children` WHERE `a_id` = $a_id";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}

	}

	public function m_get_emp_education($a_id){

		$sql = "SELECT * FROM `tbl_educbg` WHERE `a_id` = $a_id ORDER BY `pi_from` DESC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}

	}

	public function m_get_emp_training($a_id){

		$sql = "SELECT * FROM `tbl_training` WHERE `a_id` = $a_id";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}

	}

	public function m_get_emp_eligibility($a_id){

		$sql = "SELECT * FROM `tbl_eligibility` WHERE `a_id` = $a_id";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}

	}

	public function m_get_emp_skills($a_id){

		$sql = "SELECT * FROM `tbl_skills_hobbies` WHERE `a_id` = $a_id";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}

	}

	public function m_get_emp_char($a_id){

		$sql = "SELECT * FROM `tbl_reference` WHERE `a_id` = $a_id";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}
	public function m_get_emp_vol_work($a_id){
		$sql = "SELECT * FROM `tbl_voluntarywork` WHERE `a_id` = $a_id";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_get_emp_work_exp($a_id){
		$sql = "SELECT * FROM `tbl_workinfo` WHERE `a_id` = $a_id";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_get_emp_q_answer($a_id){
		$sql = "SELECT * FROM `tbl_questionnaire` WHERE `a_id` = $a_id";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_update_employee_personal_info($acc,$pi,$a_id){
		$this->db->where('`a_id`', $a_id);
		$query = $this->db->update('`tbl_account`',$acc);
		$this->db->where('`a_id`', $a_id);
		$query2 = $this->db->update('`tbl_personalinfo`',$pi);
		if($query && $query2){
			return true;
		}else{

			return false;
		}
	}

	public function m_update_update_employee_familly($fmly,$a_id){
		$this->db->where('`a_id`', $a_id);
		$query = $this->db->update('`tbl_familybg`',$fmly);
		if($query){
			return true;
		}else{
			return false;
		}

	}

	public function m_add_add_employee_child($child){
		$query = $this->db->insert('`tbl_children`',$child);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_add_add_employee_educ($educ){
		$query = $this->db->insert('`tbl_educbg`',$educ);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_add_employee_training($training){
		$query = $this->db->insert('`tbl_training`',$training);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_add_employee_elig($elig){
		$query = $this->db->insert('`tbl_eligibility`',$elig);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_add_employee_work($work){
		$query = $this->db->insert('`tbl_workinfo`',$work);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_add_employee_vol_work($volwork){
		$query = $this->db->insert('`tbl_voluntarywork`',$volwork);
		if($query){
			return true;
		}else{
			return false;
		}
	}


	public function m_check_answers($a_id){
		$sql = "SELECT * FROM `tbl_questionnaire` WHERE `a_id` = $a_id";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function m_add_employee_skills($sh){
		$query = $this->db->insert('`tbl_skills_hobbies`',$sh);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_add_employee_answers($q_ans){
		$query = $this->db->insert('`tbl_questionnaire`',$q_ans);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	public function m_add_employee_reff($reff){
		$query = $this->db->insert('`tbl_reference`',$reff);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_update_employee_answers($q_ans,$a_id){
		$this->db->where('`a_id`', $a_id);
		$query = $this->db->update('`tbl_questionnaire`',$q_ans);
		if($query){
			return true;
		}else{
			return false;
		}
	}


	//Ledeger
	public function m_search_record($id)
	{

		$sql = "SELECT `tbl_account`.`a_id`,`a_empno`,`a_password`,`a_lastname`,
								`a_middlename`,`a_mi`,`a_namext`,`a_firstname`,`a_monthlysalary`,`a_palayid`,
								`a_status`,`a_office`,`o_name`,`o_code`,`o_id`,`a_division`,`a_position`,`a_level`,`a_fdos`,`a_hieduc`,`a_hielig`,`a_salarystep`,`a_salarygrade`,
								`pi_phone`,`pi_email`,`pi_facebook`,`pi_linkedin`,`pi_mobile`,`pi_birthdate`,`pi_birthplace`,`pi_age`,
								`pi_gender`,`pi_status`,`pi_citizenship`,`pi_height`,`pi_weight`,
								`pi_bloodtype`,`pi_gsis`,`pi_pagibig`,`pi_philhealth`,`pi_sss`,
								`pi_tin`,`pi_resstreet`,`pi_resbrgy`,`pi_rescity`,`pi_resprov`,`pi_permstreet`,`pi_permbrgy`,`pi_permcity`,`pi_permprov`,`pi_reszip`,`pi_permzip`,
								`pi_resphone`,`pi_permphone`,
								`fb_spousefname`,`fb_spousemi`,`fb_spouselname`,`fb_spouseextname`,
								`fb_spousework`,`fb_spouseemployer`,`fb_spouseemployeraddress`,
								`fb_spouseemployerphone`,`fb_fatherfname`,`fb_fathermi`,`fb_fatherlname`,
								`fb_motherfname`,`fb_mothermi`,`fb_motherlname`
						FROM `tbl_account`
						LEFT JOIN `tbl_office` ON `tbl_account`.`a_office` = `tbl_office`.`o_id`

						LEFT JOIN `tbl_personalinfo` ON `tbl_account`.`a_id` = `tbl_personalinfo`.`a_id`
						LEFT JOIN `tbl_familybg` ON `tbl_account`.`a_id` = `tbl_familybg`.`a_id`
						WHERE `tbl_account`.`a_id` = ? AND `a_isactive` = ?
						LIMIT 1";
		$values = array($id,'yes');
		$query = $this->db->query($sql,$values);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_search_benefits($data){
		$this->db->select('`emp_cd`,`year`,`month`,`basic`,`pera`,`aca`,`gsis`,`philhealth`,`pagibig`,`si`');
		$this->db->where('`emp_cd`',$data['a_palayid']);
		$this->db->where('`year`',$data['b_year']);
		$this->db->from('`v_employee_ledger`');
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_get_benefits($data){

		$this->db->select('*');
		$this->db->where('`a_id`', $data['a_id']);
		$this->db->where('`b_year`', $data['b_year']);
		$this->db->where('`b_kind`','BENEFITS');
		//$this->db->where('`b_year`','2016');
		$this->db->from('`v_tbl_benefits`');
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_get_insentives($data){
		$this->db->select('*');
		$this->db->where('`a_id`',$data['a_id']);
		$this->db->where('`b_year`',$data['b_year']);
		$this->db->where('`b_kind`','Insentives');
		//$this->db->where('`b_year`','2016');
		$this->db->from('`v_tbl_benefits`');
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_add_new_employee($acc){
		$query = $this->db->insert('`tbl_account`',$acc);
		if($query){
			return $this->db->insert_id();
		}
	}
	public function m_add_new_employee_personal($pi,$a_id){
					$this->db->set('`a_id`',$a_id);
		$query = $this->db->insert('`tbl_personalinfo`',$pi);
		if($query){
			return $this->db->insert_id();
		}
	}

	public function m_update_child_info($child,$c_id){
		$this->db->where('`c_id`',$c_id);
		$query = $this->db->update('`tbl_children`',$child);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_add_new_employee_familybg($a_id){
		$data['a_id'] = $a_id;
		$query = $this->db->insert('`tbl_familybg`',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_add_employee_familly($fmly){
		$query = $this->db->insert('`tbl_familybg`',$fmly);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_update_employee_educ($educ,$e_id){
		$this->db->where('`e_id`',$e_id);
		$query = $this->db->update('`tbl_educbg`',$educ);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_update_employee_work($work,$w_id){
		$this->db->where('`w_id`',$w_id);
		$query = $this->db->update('`tbl_workinfo`',$work);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_update_employee_vol_work($vol_work,$vw_id){
		$this->db->where('`vw_id`',$vw_id);
		$query = $this->db->update('`tbl_voluntarywork`',$vol_work);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_update_employee_training($training,$t_id){
		$this->db->where('`t_id`',$t_id);
		$query = $this->db->update('`tbl_training`',$training);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_update_employee_skills($skills,$sh_id){
		$this->db->where('`sh_id`',$sh_id);
		$query = $this->db->update('`tbl_skills_hobbies`',$skills);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_update_employee_reff($reff,$r_id){
		$this->db->where('`r_id`',$r_id);
		$query = $this->db->update('`tbl_reference`',$reff);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_update_employee_elig($elig,$el_id){
		$sql = "UPDATE `tbl_eligibility` SET
				el_type = ?,
				el_career = ?,
				el_rating = ?,
				el_examdate = ?,
				el_examplace = ?,
				el_number = ?,
				el_daterelease = ?
				WHERE `el_id` = ?";
		$val = array(
				$elig['el_type'],
				$elig['el_career'],
				$elig['el_rating'],
				$elig['el_examdate'],
				$elig['el_examplace'],
				$elig['el_number'],
				$elig['el_daterelease'],
				$el_id
		);

					// $this->db->where('`el_id`',$el_id);
		// $query = $this->db->update('`tbl_eligibility`',$elig);
		if($this->db->query($sql,$val)){
			return true;
		}else{
			return false;
		}
	}


	public function m_get_forapproval_children(){
		$sql = "SELECT `a`.`a_id`,
					CONCAT(`a`.`a_firstname`,' ',`a`.`a_lastname`,' ') AS `fullname`,
					`o`.`o_code`,
					`a`.`a_status`,
					`c`.`c_id`,
					CONCAT(`c`.`c_fname`,' ',`c`.`c_mi`,' ',`c`.`c_lname`,' ') AS `child_name`,
					`c`.`c_birthdate`,
					`c_forapproval`
				FROM `tbl_account` `a`
					INNER JOIN `tbl_children` `c`
						ON `c`.`a_id` = `a`.`a_id`
					LEFT JOIN `tbl_office` `o`
						ON `o`.`o_id` = `a`.`a_office`
				WHERE `a`.`a_isactive` = 'yes'
					AND `c`.`c_forapproval` != '0'
				ORDER BY `fullname` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() != 0){
			$res['result'] = $query->result();
			$res['count'] = $query->num_rows();
			return $res;
		}else{
			return false;
		}
	}
	public function m_get_forapproval_education(){
		$sql = "SELECT `a`.`a_id`,
					CONCAT(`a`.`a_firstname`,' ',`a`.`a_lastname`,' ') AS `fullname`,
					`o`.`o_code`,
					`a`.`a_status`,
					`e`.`e_id`,
					`e`.`pi_schoolname`,
					CONCAT(`e`.`pi_from`,' - ',`e`.`pi_to`) AS `date`,
					`e`.`pi_forapproval`
				FROM `tbl_account` `a`
					INNER JOIN `tbl_educbg` `e`
						ON `e`.`a_id` = `a`.`a_id`
					LEFT JOIN `tbl_office` `o`
						ON `o`.`o_id` = `a`.`a_office`
				WHERE `a`.`a_isactive` = 'yes'
					AND `e`.`pi_forapproval` != '0'
				ORDER BY `fullname` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() != 0){
			$res['result'] = $query->result();
			$res['count'] = $query->num_rows();
			return $res;
		}else{
			return false;
		}
	}
	public function m_get_forapproval_eligibility(){
		$sql = "SELECT `a`.`a_id`,
					CONCAT(`a`.`a_firstname`,' ',`a`.`a_lastname`,' ') AS `fullname`,
					`o`.`o_code`,
					`a`.`a_status`,
					`el`.`el_id`,
					`el`.`el_rating`,
					CONCAT(`el`.`el_type`,' - ',`el`.`el_career`) AS `eligibility`,
					`el`.`el_forapproval`
				FROM `tbl_account` `a`
					INNER JOIN `tbl_eligibility` `el`
						ON `el`.`a_id` = `a`.`a_id`
					LEFT JOIN `tbl_office` `o`
						ON `o`.`o_id` = `a`.`a_office`
				WHERE `a`.`a_isactive` = 'yes'
					AND `el`.`el_forapproval` != '0'
				ORDER BY `fullname` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() != 0){
			$res['result'] = $query->result();
			$res['count'] = $query->num_rows();
			return $res;
		}else{
			return false;
		}
	}

	public function m_get_forapproval_workexp(){
		$sql = "SELECT `a`.`a_id`,
					CONCAT(`a`.`a_firstname`,' ',`a`.`a_lastname`,' ') AS `fullname`,
					`o`.`o_code`,
					`a`.`a_status`,
					`w`.`w_id`,
					`w`.`p_company`,
					`w`.`p_position`,
					CONCAT(`w`.`p_from`,' - ',`w`.`p_to`) AS `date`,
					`w`.`p_forapproval`
				FROM `tbl_account` `a`
					INNER JOIN `tbl_workinfo` `w`
						ON `w`.`a_id` = `a`.`a_id`
					LEFT JOIN `tbl_office` `o`
						ON `o`.`o_id` = `a`.`a_office`
				WHERE `a`.`a_isactive` = 'yes'
					AND `w`.`p_forapproval` != '0'
				ORDER BY `fullname` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() != 0){
			$res['result'] = $query->result();
			$res['count'] = $query->num_rows();
			return $res;
		}else{
			return false;
		}
	}

	public function m_get_forapproval_volworkexp(){
		$sql = "SELECT `a`.`a_id`,
					CONCAT(`a`.`a_firstname`,' ',`a`.`a_lastname`,' ') AS `fullname`,
					`o`.`o_code`,
					`a`.`a_status`,
					`v`.`vw_id`,
					`v`.`vw_name`,
					`v`.`vw_work`,
					CONCAT(`v`.`vw_datefrom`,' - ',`v`.`vw_dateto`) AS `date`,
					`v`.`vw_forapproval`
				FROM `tbl_account` `a`
					INNER JOIN `tbl_voluntarywork` `v`
						ON `v`.`a_id` = `a`.`a_id`
					LEFT JOIN `tbl_office` `o`
						ON `o`.`o_id` = `a`.`a_office`
				WHERE `a`.`a_isactive` = 'yes'
					AND `v`.`vw_forapproval` != '0'
				ORDER BY `fullname` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() != 0){
			$res['result'] = $query->result();
			$res['count'] = $query->num_rows();
			return $res;
		}else{
			return false;
		}
	}

	public function m_get_forapproval_training(){
		$sql = "SELECT `a`.`a_id`,
					CONCAT(`a`.`a_firstname`,' ',`a`.`a_lastname`,' ') AS `fullname`,
					`o`.`o_code`,
					`a`.`a_status`,
					`t`.`t_id`,
					`t`.`t_seminar`,
					`t`.`t_hoursno`,
					CONCAT(`t`.`t_from`,' - ',`t`.`t_to`) AS `date`,
					`t`.`t_forapproval`
				FROM `tbl_account` `a`
				INNER JOIN `tbl_training` `t`
					ON `t`.`a_id` = `a`.`a_id`
				LEFT JOIN `tbl_office` `o`
					ON `o`.`o_id` = `a`.`a_office`
				WHERE `a`.`a_isactive` = 'yes'
					AND `t`.`t_forapproval` != '0'
				ORDER BY `fullname` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() != 0){
			$res['result'] = $query->result();
			$res['count'] = $query->num_rows();
			return $res;
		}else{
			return false;
		}
	}

	public function m_get_forapproval_skills(){
		$sql = "SELECT `a`.`a_id`,
					CONCAT(`a`.`a_firstname`,' ',`a`.`a_lastname`,' ') AS `fullname`,
					`o`.`o_code`,
					`a`.`a_status`,
					`sh`.`sh_id`,
					`sh`.`sh_skills`,
					`sh`.`sh_forapproval`
				FROM `tbl_account` `a`
				INNER JOIN `tbl_skills_hobbies` `sh`
					ON `sh`.`a_id` = `a`.`a_id`
				LEFT JOIN `tbl_office` `o`
					ON `o`.`o_id` = `a`.`a_office`
				WHERE `a`.`a_isactive` = 'yes'
					AND `sh`.`sh_forapproval` != '0'
				ORDER BY `fullname` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() != 0){
			$res['result'] = $query->result();
			$res['count'] = $query->num_rows();
			return $res;
		}else{
			return false;
		}
	}

	public function m_get_forapproval_reff(){
		$sql = "SELECT `a`.`a_id`,
				CONCAT(`a`.`a_firstname`,' ',`a`.`a_lastname`,' ') AS `fullname`,
				`o`.`o_code`,
				`a`.`a_status`,
				`r`.`r_id`,
				`r`.`r_name`,
				`r`.`r_contactnum`,
				`r`.`r_forapproval`
			FROM `tbl_account` `a`
			INNER JOIN `tbl_reference` `r`
				ON `r`.`a_id` = `a`.`a_id`
			LEFT JOIN `tbl_office` `o`
				ON `o`.`o_id` = `a`.`a_office`
			WHERE `a`.`a_isactive` = 'yes'
				AND `r`.`r_forapproval` != '0'
			ORDER BY `fullname` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() != 0){
			$res['result'] = $query->result();
			$res['count'] = $query->num_rows();
			return $res;
		}else{
			return false;
		}
	}

	public function ajax_m_get_employee($a_office,$a_division,$a_status){

			// $a_office = $this->input->post('a_office');
			// $a_division = $this->input->post('a_division');
			// $a_status = $this->input->post('a_status');

		$this->db->select('`a_id`,`a_firstname`,`a_middlename`,`a_lastname`');
		$this->db->from('`tbl_account`');
			if($a_office != 'all'){
				$this->db->where('`a_office`',$a_office);
			}
			if($a_division != 'all'){
				$this->db->where('`a_division`',$a_division);
			}
			if($a_status != 'all'){
				$this->db->where('`a_status`',$a_status);
			}
		$this->db->where('`a_isactive`','yes');
		$this->db->order_by('`a_lastname`', 'ASC'); // or 'ASC'
		$query = $this->db->get();

		// $sql = "SELECT `a_id`,`a_firstname`,`a_middlename`,`a_lastname` FROM `tbl_account` WHERE `a_isactive`= 'yes'";
		// $query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function ajax_m_get_servicerecord($a_id){
		$sql = "SELECT
				`w_id`,
				`a_id`,
				`p_from`,
				IF(p_to IS NULL OR p_to = '0000-00-00',
					IF(p_from=(SELECT MAX(p_from) FROM tbl_workinfo WHERE a_id='$a_id' AND (p_to IS NULL OR p_to = '0000-00-00')),
					 'PRESENT',
					  'V-E-R-I-F-Y'),
					p_to) AS p_to,
				`p_position`,
				`p_salarygrade`,
				`p_salarystep`,
				`p_appointment`,
				FORMAT(`p_salarymonthly`,2)as p_salarymonthly,
				`p_dept`,
				`p_div`,
				`p_company`,
				`p_lwop`,
				`p_sept_date`,
				`p_sept_cause`,
				`p_note_remarks`
				FROM `tbl_workinfo`
				WHERE `p_isservicerecord` = 'yes'
				AND `p_isgovt` = 'yes'
				AND `a_id` = '$a_id'
				AND `is_deleted` = 'NO'
			ORDER BY `p_from` DESC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	//LIST SERVICE RECORD PER EMPLOYEE
	public function m_get_list_servicerecord($id){
		$sql ="SELECT
				  `a_id`,
				  p_from,
				  IF(p_to IS NULL  OR p_to = '0000-00-00',
				    IF(p_from = (SELECT MAX(p_from) FROM tbl_workinfo  WHERE a_id = '$id' AND (p_to IS NULL OR p_to = '0000-00-00')),
				      'PRESENT','V-E-R-I-F-Y'
				    ),
				    DATE_FORMAT(p_to, '%Y-%m-%d')
				  ) AS p_to,
				  `p_position`,
				  CONCAT(`p_salarygrade`,'/',`p_salarystep`) AS `salarygrade`
				FROM
				  tbl_workinfo
				WHERE
					`a_id` ='$id' AND `p_isservicerecord` = 'YES' AND `is_deleted` = 'NO'
				ORDER BY `p_from` DESC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}


	// Dynamic Delete Function
	public function m_delete($where,$table,$field){
		$sql = "DELETE FROM $table WHERE $field = $where";
		if($this->db->query($sql)){
			return true;
		}else{
			return false;
		}
	}

	public function m_apply_approved($table,$field_update,$value,$where_field,$where_value){
		$sql = "UPDATE $table SET $field_update = $value WHERE $where_field = $where_value";

		if($this->db->query($sql)){
			return true;
		}else{
			return false;
		}
	}

	public function m_apply_delete($table,$where_field,$where_value){

		// $sql = "DELETE FROM $table WHERE $field = $where";
		$sql = "DELETE FROM $table WHERE $where_field = $where_value";

		if($this->db->query($sql)){
			return true;
		}else{
			return false;
		}
	}

	// Update Service record
	public function m_ajax_update_service_record($svr,$w_id,$a_id){

		$this->db->where('w_id', $w_id);
		$this->db->where('a_id', $a_id);
	$query =$this->db->update('`tbl_workinfo`',$svr);

		// $sql = "UPDATE `tbl_workinfo` SET $field_update = $value WHERE $where_field = $where_value";

		if($query){
			return true;
		}else{
			return false;
		}
	}

	// Save Service record
	public function m_ajax_save_service_record($svr){

		$query = $this->db->insert('`tbl_workinfo`',$svr);

		if($query){
			return true;
		}else{
			return false;
		}
	}


	public function m_get_leave_forapproval(){
		$sql = "SELECT 	`a`.`a_id`,
					CONCAT(`a`.`a_firstname`,' ',
					`a`.`a_middlename`,' ',
					`a`.`a_lastname`) AS `emp_name`,
					`l`.`l_id`,
					`l`.`l_agency`,
					`l`.`l_datefiled`,
					`l`.`l_position`,
					`l`.`l_sg`,
					`l_typespecify` AS `l_type`,
					`l`.`l_sl`,
					`l`.`l_vl`,
					`l`.`l_asof`,
					`l`.`l_typeofapplication`,
					`l`.`l_inclusivedates`
				FROM `tbl_account` `a`
				INNER JOIN `tbl_leaves` `l`
					ON `l`.`a_id` = `a`.`a_id`
				WHERE `l`.`l_statushr` = 'Pending'
						AND `l`.`leave_status` = 'Applied'
						AND `l`.`l_asof` IS NOT NULL
						AND `l`.`l_statusdept` = 'Approved'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			// $res['result'] = $query->result();
			// $res['count'] =  $query->num_rows();
			return $query->result();
		}else{
			return false;
		}
	}


	public function m_count_leave_forapproval(){
		$sql = "SELECT COUNT(`l_id`)
				FROM `tbl_account` `a`
				INNER JOIN `tbl_leaves` `l`
					ON `l`.`a_id` = `a`.`a_id`
				WHERE `l`.`l_statushr` = 'Pending'
						AND `l`.`leave_status` = 'Applied'
						AND `l`.`l_asof` IS NOT NULL
						AND `l`.`l_statusdept` = 'Approved'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			// $res['result'] = $query->result();
			// $res['count'] =  $query->num_rows();
			return $query->num_rows();
		}else{
			return false;
		}
	}

	public function m_disapproved_leave($l_id){
		$l_dept_action_date = date('Y-m-d');
		$sql = "UPDATE `tbl_leaves` SET
						`l_statushr` = 'Disapproved',
						`l_hr_action_date` = '$l_dept_action_date'
				WHERE `l_id` = '$l_id'";

		$query = $this->db->query($sql);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function approved_leave($l_id){

		$l_dept_action_date = date('Y-m-d');

		$sql = "UPDATE `tbl_leaves` SET
						`l_statushr` = 'Approved',
						`l_hr_action_date` = '$l_dept_action_date'
				WHERE `l_id` = '$l_id'";

		$query = $this->db->query($sql);
		if($query){
			return true;
		}else{
			return false;
		}
	}



	public function m_get_candidate_for_step_increment(){
		 // CONCAT('Present or ',DATE(NOW())),
		$sql = "SELECT 	`w`.`w_id`,
	`w`.`a_id` AS main_id,
	CONCAT(`a`.`a_lastname`,',',`a`.`a_firstname`,' ',`a`.`a_middlename`) AS `emp_name`,
	`w`.`p_from`,
	`w`.`p_to`,
	  IF(p_to IS NULL OR p_to='0000-00-00',
	    IF(p_from=(SELECT MAX(p_from) FROM tbl_workinfo WHERE a_id=main_id AND (p_to IS NULL OR p_to='0000-00-00')),
	    'P-R-E-S-E-N-T',
	      'V-E-R-I-F-Y'),
	    p_to) AS p_to_display,
	`a`.`a_machineid`,
	`a`.`a_empno`,
	`a`.`a_office`,
	`a`.`a_division`,
	CASE `a`.`a_status`
		WHEN 'PERMANENT' THEN 'P'
		WHEN 'CASUAL' THEN 'C'
	END AS `a_status`,
	`a`.`a_position`,
				  	CASE `p`.`pi_gender`
				    	WHEN 'Male' THEN 'M'
				    	WHEN 'Female' THEN 'F'
				  	END AS `pi_gender`,
				  	`od`.`o_code` AS `a_division`,
				  	`o`.`o_code` AS `a_office`,
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
					`w`.`p_from` <= DATE(DATE_SUB(NOW(),INTERVAL 3 YEAR))
					AND `w`.`p_to` IS NULL
					AND IF(p_to IS NULL OR p_to='0000-00-00',
						    IF(p_from=(SELECT MAX(p_from) FROM tbl_workinfo WHERE a_id=`w`.`a_id` AND (p_to IS NULL OR p_to='0000-00-00')),
						      'PRESENT',
						      'V-E-R-I-F-Y'),
						    p_to) != 'V-E-R-I-F-Y'
					AND (`w`.`p_note_remarks` != 'RETIREMENT'
					OR `w`.`p_note_remarks` != 'LAST DAY OF SERVICE'
					OR `w`.`p_note_remarks` != 'TRANSFER'
					OR `w`.`p_note_remarks` != 'NOSA'
					OR `w`.`p_note_remarks` != 'SALARY ADJUSTMENT')
					AND `w`.`p_isservicerecord` = 'YES'
					AND `w`.`is_deleted` = 'NO'
					AND `a`.`a_isactive` = 'yes'
					AND `a`.`a_status` = 'PERMANENT'
				ORDER BY `w`.`p_from` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_get_sv($w_id,$p_effectivitydate){
		$sql = "SELECT `wi`.`a_id`,`wi`.`w_id`,
		CONCAT(`ac`.`a_lastname`,',',`ac`.`a_firstname`) AS `emp_name`,
				`wi`.`p_from`,
				`wi`.`p_position`,
				IF(`wi`.`p_salarygrade` IS NULL OR `wi`.`p_salarystep` IS NULL OR `wi`.`p_salarygrade` = '0' OR `wi`.`p_salarystep` = '0' , 'YES','NO') AS `check_record`,
				`wi`.`p_salarygrade`,
				IF(`wi`.`p_salarystep` != 8, `wi`.`p_salarystep` + 1,`wi`.`p_salarystep`) AS `p_salarystep`,
				(SELECT `ss`.`ss_monthly`
					FROM 	`tbl_salaryschedule` `ss`
					WHERE 	`ss`.`ss_grade` 	= `wi`.`p_salarygrade`
					AND 	`ss`.`ss_step` 		= IF(`wi`.`p_salarystep` != 8, `wi`.`p_salarystep` + 1,`wi`.`p_salarystep`)
					AND 	`ss`.`ss_effectivitydate` <= '$p_effectivitydate'
				ORDER BY `ss`.`ss_effectivitydate` DESC LIMIT 1
				) AS `p_salarymonthly`,
				`wi`.`p_appointment`,
				`wi`.`p_dept`,
				`wi`.`p_div`,
				`wi`.`p_company`,
				`wi`.`p_isservicerecord`,
				`wi`.`p_notes_date`,
				`wi`.`p_note_remarks`
					FROM `tbl_workinfo` `wi`
					INNER JOIN `tbl_account` `ac`
			ON `ac`.`a_id` = `wi`.`a_id`
					WHERE `w_id` IN($w_id)";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}
	public function m_update_sv($w_id,$p_to){
		$sql = "UPDATE `tbl_workinfo` SET `p_to`= '$p_to' WHERE `w_id` IN($w_id)";
		$query = $this->db->query($sql);
		if($query)
		{
			return true;
		} else {
			return false;
		}
	}
	public function m_save_new_sv($new_sv){

		$query = $this->db->query('INSERT INTO `tbl_workinfo` (
		`a_id`,
		`p_from`,
		`p_position`,
		`p_salarygrade`,
		`p_salarystep`,
		`p_salarymonthly`,
		`p_appointment`,
		`p_dept`,
		`p_div`,
		`p_company`,
		`p_isgovt`,
		`p_isservicerecord`,
		`p_notes_date`,
		`p_note_remarks`,
		`p_addedby`,
		`p_addeddate`
		) VALUES '.implode(',', $new_sv));

		if($query)
		{
			return true;
		} else {
			return false;
		}
	}


	public function m_get_leave_for_verification(){
		$sql = "SELECT 	`a`.`a_id`,
					CONCAT(`a`.`a_firstname`,' ',
					`a`.`a_middlename`,' ',
					`a`.`a_lastname`) AS `emp_name`,
					`l`.`l_id`,
					`l`.`l_agency`,
					`l`.`l_datefiled`,
					`l`.`l_position`,
					`l`.`l_sg`,
					`l_typespecify` AS `l_type`,
					`l`.`l_inclusivedates`
				FROM `tbl_account` `a`
				INNER JOIN `tbl_leaves` `l`
					ON `l`.`a_id` = `a`.`a_id`
				WHERE `l`.`l_statushr` = 'Pending'
						AND `l`.`leave_status` = 'Applied'
						AND `l`.`l_asof` IS NULL
						AND `l`.`l_statusdept` = 'Approved'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			// $res['result'] = $query->result();
			// $res['count'] =  $query->num_rows();
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_save_slvl($l_id,$slvl){
		$this->db->where('`l_id`',$l_id);
		$query = $this->db->update('`tbl_leaves`',$slvl);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_update_password($a_id,$password){
			$newpass = sha1(md5($password.'c[x]t!@n>[*]{<Lo[R];eN}Ce}'));
			$sql ="UPDATE `tbl_account` SET `a_password` = '$newpass', `a_ispword` = '1' WHERE `a_id` = '$a_id' ";
			if($this->db->query($sql)){
				return true;
			}else{
				return false;
			}
	}

	public function m_delete_servicerecord($w_id){
		$sql ="UPDATE `tbl_workinfo` SET `is_deleted` = 'YES' WHERE `w_id` = '$w_id'";
			if($this->db->query($sql)){
				return true;
			}else{
				return false;
			}
	}

		public function m_update_workinfo($w_id,$w_type){
		$sql = "UPDATE `tbl_workinfo` SET `w_type`= '$w_type' WHERE `w_id` IN($w_id)";
		$query = $this->db->query($sql);
		if($query)
		{
			return true;
		} else {
			return false;
		}
	}

		public function m_update_trainingtype($t_id,$t_type){
		$sql = "UPDATE `tbl_training` SET `t_type`= '$t_type' WHERE `t_id` IN($t_id)";
		$query = $this->db->query($sql);
		if($query)
		{
			return true;
		} else {
			return false;
		}

	}


		public function m_update_eligibilitytype($el_id,$el_type){
			$sql = "UPDATE `tbl_eligibility` SET `el_type`= '$el_type' WHERE `el_id` IN($el_id)";
			$query = $this->db->query($sql);
			if($query)
			{
				return true;
			} else {
				return false;
			}
		}

		public function m_reset_password($a_id){

			$date = date('Y-m-d H:i:s');
			$a_empno = $this->session->userdata('a_empno');
			$sql = "UPDATE `tbl_account` SET
							`a_ispword` = '0',
							`a_updateddate` = '$date',
							`a_updatedby` = '$a_empno'

					WHERE `a_id` = '$a_id'";
			$query = $this->db->query($sql);
			if($query)
			{
				return true;
			} else {
				return false;
			}
		}
}
