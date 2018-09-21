<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_salaryadjustment extends CI_Model {

	public function __construct() {
		parent::__construct();
		// $ci = &get_instance();
		// $this->db_access = $ci->load->database('db_access', TRUE);
	}

	// nosa all casual and permanent
	public function m_get_candidate_for_salary_adjustment()
	{
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
					`w`.`p_to` IS NULL
					AND IF(p_to IS NULL OR p_to='0000-00-00',
						    IF(p_from=(SELECT MAX(p_from) FROM tbl_workinfo WHERE a_id=`w`.`a_id` AND (p_to IS NULL OR p_to='0000-00-00')),
						      'PRESENT',
						      'V-E-R-I-F-Y'),
						    p_to) != 'V-E-R-I-F-Y'
					AND (`w`.`p_note_remarks` != 'RETIREMENT'
					OR `w`.`p_note_remarks` != 'LAST DAY OF SERVICE'
					OR `w`.`p_note_remarks` != 'TRANSFER')
					AND `w`.`p_isservicerecord` = 'YES'
					AND `w`.`is_deleted` = 'NO'
					AND `a`.`a_isactive` = 'yes'
					AND (`a`.`a_status` = 'PERMANENT'
						OR `a`.`a_status` = 'CASUAL')
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
				IF(`wi`.`p_salarystep` != 8, `wi`.`p_salarystep`,`wi`.`p_salarystep`) AS `p_salarystep`,
				(SELECT `ss`.`ss_monthly`
					FROM 	`tbl_salaryschedule` `ss`
					WHERE 	`ss`.`ss_grade` 	= `wi`.`p_salarygrade`
					AND 	`ss`.`ss_step` 		= IF(`wi`.`p_salarystep` != 8, `wi`.`p_salarystep`,`wi`.`p_salarystep`)
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



}
