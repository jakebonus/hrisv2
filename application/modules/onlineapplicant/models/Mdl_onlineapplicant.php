<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_onlineapplicant extends CI_Model {


	public function m_update_info($data,$oa_id){
				$this->db->where('`oa_id`', $oa_id);
		 $query = $this->db->update('`tbl_onlineapplicant`', $data);
		 if($query){
			 return true;
		 }else{
			 return false;
		 }
	}


	public function m_get_applicant($ah_status){


		$sql = "SELECT  CONCAT(`oa`.`oa_lname`,' ',`oa`.`oa_extname`,',',`oa`.`oa_fname`,' ',`oa`.`oa_mname`) AS `name`,
		`oa`.`oa_id`,
		`ah`.`ah_id`,
		`ah`.`ah_emailsent`,
		CONCAT(`oa`.`oa_prefix`,'-',`oa`.`oa_suffix`) AS `application_no`,
		`oa`.`oa_email`,
		`oa`.`oa_activationcode`,
		`oa`.`oa_course`,
		`oa`.`oa_school`,
		CONCAT(`oa`.`oa_course`,' (',`oa`.`oa_school`,')') AS `education`,
		`oa`.`oa_educremarks`,
		`oa`.`oa_eligibility`,
		`oa`.`oa_eligremarks`,
		`oa`.`oa_gender`,
		`oa`.`oa_mobile`,
		`oa`.`oa_pdesire`,
		`oa`.`oa_province`,
		`oa`.`oa_skills`,
		`oa`.`oa_awards`,
		`oa`.`oa_status`,
		DATE(`oa`.`oa_date`) AS `oa_date`,
		`p`.`p_name`,
		`oa`.`oa_city`,
		`c`.`c_name`,
		IF (`oa`.`oa_city` = '3',`b`.`b_name`,`oa`.`oa_brgy`) AS `brgy`,
		`oa`.`oa_street`,
		GROUP_CONCAT(CONCAT(`v`.`v_position`,' (',`v`.`v_position`,')') SEPARATOR ', ') AS `position_desired`,
		`oa`.`oa_bdate`,
		DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),`oa`.`oa_bdate`)),'%Y-%m-d') + 0 AS `age`,
		`ah`.`ah_remarks`,
		`ah`.`ah_actiondate`,
		`ah`.`ah_status`,
		`ah`.`ah_remarks_status`,
		`ah`.`ah_remarksdate`
	FROM `tbl_onlineapplicant` `oa`
		INNER JOIN `tbl_positionapplied` `pa` ON
			`pa`.`oa_id` = `oa`.`oa_id`
		INNER JOIN `tbl_vacancies` `v` ON
			`v`.`v_id` = `pa`.`v_id`
		INNER JOIN `tbl_province` `p` ON
			`p`.`p_id` = `oa`.`oa_province`
		INNER JOIN `tbl_city` `c` ON
			`c`.`c_id` = `oa`.`oa_city`
		LEFT JOIN `tbl_brgy` `b` ON
			`b`.`b_id` = `oa`.`oa_brgy`
		LEFT JOIN `tbl_applicationhistory` `ah` ON
			`ah`.`oa_id` = `oa`.`oa_id`
	WHERE `oa`.`oa_isactivated` = 'YES'
	 AND (`ah`.`ah_islatest` = 'YES' OR `ah`.`ah_islatest` IS NULL) 
	 GROUP BY `oa`.`oa_id`
	ORDER BY `oa`.`oa_date` ASC
					";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function m_get_applicant_forexam(){


		$sql = "SELECT  CONCAT(`oa`.`oa_lname`,' ',`oa`.`oa_extname`,',',`oa`.`oa_fname`,' ',`oa`.`oa_mname`) AS `name`,
		`oa`.`oa_id`,
		`ah`.`ah_id`,
		`ah`.`ah_emailsent`,
		CONCAT(`oa`.`oa_prefix`,'-',`oa`.`oa_suffix`) AS `application_no`,
		`oa`.`oa_email`,
		`oa`.`oa_activationcode`,
		`oa`.`oa_course`,
		`oa`.`oa_school`,
		CONCAT(`oa`.`oa_course`,' (',`oa`.`oa_school`,')') AS `education`,
		`oa`.`oa_educremarks`,
		`oa`.`oa_eligibility`,
		`oa`.`oa_eligremarks`,
		`oa`.`oa_gender`,
		`oa`.`oa_mobile`,
		`oa`.`oa_pdesire`,
		`oa`.`oa_province`,
		`oa`.`oa_skills`,
		`oa`.`oa_awards`,
		`oa`.`oa_status`,
		DATE(`oa`.`oa_date`) AS `oa_date`,
		`p`.`p_name`,
		`oa`.`oa_city`,
		`c`.`c_name`,
		IF (`oa`.`oa_city` = '3',`b`.`b_name`,`oa`.`oa_brgy`) AS `brgy`,
		`oa`.`oa_street`,
		GROUP_CONCAT(CONCAT(`v`.`v_position`,' (',`v`.`v_position`,')') SEPARATOR ', ') AS `position_desired`,
		`oa`.`oa_bdate`,
		DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),`oa`.`oa_bdate`)),'%Y-%m-d') + 0 AS `age`,
		`ah`.`ah_remarks`,
		`ah`.`ah_actiondate`,
		`ah`.`ah_status`
	FROM `tbl_onlineapplicant` `oa`
		INNER JOIN `tbl_positionapplied` `pa` ON
			`pa`.`oa_id` = `oa`.`oa_id`
		INNER JOIN `tbl_vacancies` `v` ON
			`v`.`v_id` = `pa`.`v_id`
		INNER JOIN `tbl_province` `p` ON
			`p`.`p_id` = `oa`.`oa_province`
		INNER JOIN `tbl_city` `c` ON
			`c`.`c_id` = `oa`.`oa_city`
		LEFT JOIN `tbl_brgy` `b` ON
			`b`.`b_id` = `oa`.`oa_brgy`
		LEFT JOIN `tbl_applicationhistory` `ah` ON
			`ah`.`oa_id` = `oa`.`oa_id`
	WHERE `oa`.`oa_isactivated` = 'YES' AND (`ah`.`ah_islatest` = 'YES' OR `ah`.`ah_islatest` IS NULL) AND `ah`.`ah_remarks` = 'For Exam and Interview' GROUP BY `oa`.`oa_id`
	ORDER BY `oa`.`oa_date` ASC
					";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function m_get_applicant_forfiling(){


		$sql = "SELECT  CONCAT(`oa`.`oa_lname`,' ',`oa`.`oa_extname`,',',`oa`.`oa_fname`,' ',`oa`.`oa_mname`) AS `name`,
		`oa`.`oa_id`,
		`ah`.`ah_id`,
		`ah`.`ah_emailsent`,
		CONCAT(`oa`.`oa_prefix`,'-',`oa`.`oa_suffix`) AS `application_no`,
		`oa`.`oa_email`,
		`oa`.`oa_activationcode`,
		`oa`.`oa_course`,
		`oa`.`oa_school`,
		CONCAT(`oa`.`oa_course`,' (',`oa`.`oa_school`,')') AS `education`,
		`oa`.`oa_educremarks`,
		`oa`.`oa_eligibility`,
		`oa`.`oa_eligremarks`,
		`oa`.`oa_gender`,
		`oa`.`oa_mobile`,
		`oa`.`oa_pdesire`,
		`oa`.`oa_province`,
		`oa`.`oa_skills`,
		`oa`.`oa_awards`,
		`oa`.`oa_status`,
		DATE(`oa`.`oa_date`) AS `oa_date`,
		`p`.`p_name`,
		`oa`.`oa_city`,
		`c`.`c_name`,
		IF (`oa`.`oa_city` = '3',`b`.`b_name`,`oa`.`oa_brgy`) AS `brgy`,
		`oa`.`oa_street`,
		GROUP_CONCAT(CONCAT(`v`.`v_position`,' (',`v`.`v_position`,')') SEPARATOR ', ') AS `position_desired`,
		`oa`.`oa_bdate`,
		DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),`oa`.`oa_bdate`)),'%Y-%m-d') + 0 AS `age`,
		`ah`.`ah_remarks`,
		`ah`.`ah_actiondate`,
		`ah`.`ah_status`
	FROM `tbl_onlineapplicant` `oa`
		INNER JOIN `tbl_positionapplied` `pa` ON
			`pa`.`oa_id` = `oa`.`oa_id`
		INNER JOIN `tbl_vacancies` `v` ON
			`v`.`v_id` = `pa`.`v_id`
		INNER JOIN `tbl_province` `p` ON
			`p`.`p_id` = `oa`.`oa_province`
		INNER JOIN `tbl_city` `c` ON
			`c`.`c_id` = `oa`.`oa_city`
		LEFT JOIN `tbl_brgy` `b` ON
			`b`.`b_id` = `oa`.`oa_brgy`
		LEFT JOIN `tbl_applicationhistory` `ah` ON
			`ah`.`oa_id` = `oa`.`oa_id`
	WHERE `oa`.`oa_isactivated` = 'YES' AND (`ah`.`ah_islatest` = 'YES' OR `ah`.`ah_islatest` IS NULL) AND `ah`.`ah_remarks` = 'For Filing' GROUP BY `oa`.`oa_id`
	ORDER BY `oa`.`oa_date` ASC
					";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}


	public function m_get_applicant_forforward(){

		$sql = "SELECT  CONCAT(`oa`.`oa_lname`,' ',`oa`.`oa_extname`,',',`oa`.`oa_fname`,' ',`oa`.`oa_mname`) AS `name`,
		`oa`.`oa_id`,
		`ah`.`ah_id`,
		`ah`.`ah_emailsent`,
		CONCAT(`oa`.`oa_prefix`,'-',`oa`.`oa_suffix`) AS `application_no`,
		`oa`.`oa_email`,
		`oa`.`oa_activationcode`,
		`oa`.`oa_course`,
		`oa`.`oa_school`,
		CONCAT(`oa`.`oa_course`,' (',`oa`.`oa_school`,')') AS `education`,
		`oa`.`oa_educremarks`,
		`oa`.`oa_eligibility`,
		`oa`.`oa_eligremarks`,
		`oa`.`oa_gender`,
		`oa`.`oa_mobile`,
		`oa`.`oa_pdesire`,
		`oa`.`oa_province`,
		`oa`.`oa_skills`,
		`oa`.`oa_awards`,
		`oa`.`oa_status`,
		DATE(`oa`.`oa_date`) AS `oa_date`,
		`p`.`p_name`,
		`oa`.`oa_city`,
		`c`.`c_name`,
		IF (`oa`.`oa_city` = '3',`b`.`b_name`,`oa`.`oa_brgy`) AS `brgy`,
		`oa`.`oa_street`,
		GROUP_CONCAT(CONCAT(`v`.`v_position`,' (',`v`.`v_position`,')') SEPARATOR ', ') AS `position_desired`,
		`oa`.`oa_bdate`,
		DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),`oa`.`oa_bdate`)),'%Y-%m-d') + 0 AS `age`,
		`ah`.`ah_remarks`,
		`ah`.`ah_actiondate`,
		`ah`.`ah_status`
	FROM `tbl_onlineapplicant` `oa`
		INNER JOIN `tbl_positionapplied` `pa` ON
			`pa`.`oa_id` = `oa`.`oa_id`
		INNER JOIN `tbl_vacancies` `v` ON
			`v`.`v_id` = `pa`.`pa_id`
		INNER JOIN `tbl_province` `p` ON
			`p`.`p_id` = `oa`.`oa_province`
		INNER JOIN `tbl_city` `c` ON
			`c`.`c_id` = `oa`.`oa_city`
		LEFT JOIN `tbl_brgy` `b` ON
			`b`.`b_id` = `oa`.`oa_brgy`
		LEFT JOIN `tbl_applicationhistory` `ah` ON
			`ah`.`oa_id` = `oa`.`oa_id`
	WHERE `oa`.`oa_isactivated` = 'YES' AND (`ah`.`ah_islatest` = 'YES' OR `ah`.`ah_islatest` IS NULL) AND `ah`.`ah_remarks` = 'Forward to CESD' GROUP BY `oa`.`oa_id`
	ORDER BY `oa`.`oa_date` ASC
					";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_get_applicant_forregret(){

		$sql = "SELECT  CONCAT(`oa`.`oa_lname`,' ',`oa`.`oa_extname`,',',`oa`.`oa_fname`,' ',`oa`.`oa_mname`) AS `name`,
		`oa`.`oa_id`,
		`ah`.`ah_id`,
		`ah`.`ah_emailsent`,
		CONCAT(`oa`.`oa_prefix`,'-',`oa`.`oa_suffix`) AS `application_no`,
		`oa`.`oa_email`,
		`oa`.`oa_activationcode`,
		`oa`.`oa_course`,
		`oa`.`oa_school`,
		CONCAT(`oa`.`oa_course`,' (',`oa`.`oa_school`,')') AS `education`,
		`oa`.`oa_educremarks`,
		`oa`.`oa_eligibility`,
		`oa`.`oa_eligremarks`,
		`oa`.`oa_gender`,
		`oa`.`oa_mobile`,
		`oa`.`oa_pdesire`,
		`oa`.`oa_province`,
		`oa`.`oa_skills`,
		`oa`.`oa_awards`,
		`oa`.`oa_status`,
		DATE(`oa`.`oa_date`) AS `oa_date`,
		`p`.`p_name`,
		`oa`.`oa_city`,
		`c`.`c_name`,
		IF (`oa`.`oa_city` = '3',`b`.`b_name`,`oa`.`oa_brgy`) AS `brgy`,
		`oa`.`oa_street`,
		GROUP_CONCAT(CONCAT(`v`.`v_position`,' (',`v`.`v_position`,')') SEPARATOR ', ') AS `position_desired`,
		`oa`.`oa_bdate`,
		DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),`oa`.`oa_bdate`)),'%Y-%m-d') + 0 AS `age`,
		`ah`.`ah_remarks`,
		`ah`.`ah_actiondate`,
		`ah`.`ah_status`
	FROM `tbl_onlineapplicant` `oa`
		INNER JOIN `tbl_positionapplied` `pa` ON
			`pa`.`oa_id` = `oa`.`oa_id`
		INNER JOIN `tbl_vacancies` `v` ON
			`v`.`v_id` = `pa`.`pa_id`
		INNER JOIN `tbl_province` `p` ON
			`p`.`p_id` = `oa`.`oa_province`
		INNER JOIN `tbl_city` `c` ON
			`c`.`c_id` = `oa`.`oa_city`
		LEFT JOIN `tbl_brgy` `b` ON
			`b`.`b_id` = `oa`.`oa_brgy`
		LEFT JOIN `tbl_applicationhistory` `ah` ON
			`ah`.`oa_id` = `oa`.`oa_id`
	WHERE `oa`.`oa_isactivated` = 'YES' AND (`ah`.`ah_islatest` = 'YES' OR `ah`.`ah_islatest` IS NULL) AND `ah`.`ah_remarks` = 'For Regret' GROUP BY `oa`.`oa_id`
	ORDER BY `oa`.`oa_date` ASC
					";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_get_vacancy(){
			$sql = "SELECT * FROM `tbl_vacancies` WHERE `v_isavailable` = 'YES' AND `v_isdeleted` = 'NO' ORDER BY `v_position` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_check_oa_email($oa_email){
			$sql = "SELECT `oa_email` FROM `tbl_onlineapplicant` WHERE `oa_email` = '$oa_email' AND `oa_isactivated` = 'YES'";
			$query = $this->db->query($sql);
		if($query->num_rows() == 1)
		{
			return true;
		} else {
			return false;
		}
	}

	public function m_get_course(){
			$sql = "SELECT * FROM `tbl_courses`  WHERE `c_isdeleted` = 'NO' ORDER BY `c_name` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}
	public function m_get_province(){
			$sql = "SELECT * FROM `tbl_province` WHERE `r_id` = '5' ORDER BY `p_name` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}
	public function m_get_city($p_id){
			$sql = "SELECT * FROM `tbl_city` WHERE `p_id` = '".$p_id."' ORDER BY `c_name` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}
	public function m_get_all_city(){
			$sql = "SELECT * FROM `tbl_city` ORDER BY `c_name` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}
	// public function m_get_brgy($c_id){
			// $sql = "SELECT * FROM `tbl_brgy` WHERE `c_id` = '".$c_id."' ORDER BY `b_name` ASC";
		// $query = $this->db->query($sql);
		// if($query->num_rows() > 0)
		// {
			// return $query->result();
		// } else {
			// return false;
		// }
	// }

	public function m_get_candidate_email($new_oa_id){
			$sql = "SELECT `oa`.*,
						`p`.`p_name` AS `province`,
						`c`.`c_name` AS `city`,
						`ah`.`jm_reqnum`,
						`ah`.`ah_office`,
						`ah`.`ah_position`,
						`ah`.`ah_desc`,
						IF(`oa`.`oa_city` = '3',`b`.`b_name`,`oa`.`oa_brgy`) AS `brgy`
					FROM `tbl_onlineapplicant` `oa`

					LEFT JOIN `tbl_applicationhistory` `ah` ON
						`ah`.`oa_id` = `oa`.`oa_id`
					INNER JOIN `tbl_province` `p` ON
						`oa`.`oa_province` = `p`.`p_id`
					INNER JOIN `tbl_city` `c` ON
						`oa`.`oa_city` = `c`.`c_id`
					LEFT JOIN `tbl_brgy` `b` ON
						`oa`.`oa_brgy` = `b`.`b_id`
					WHERE `ah`.`ah_id` IN (".$new_oa_id.")";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_get_brgy($id){
		$sql = "SELECT * FROM `tbl_brgy` WHERE `c_id` = '".$id."'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	// public function m_get_courses(){
		// $sql = "SELECT * FROM `tbl_courses`";
		// $query = $this->db->query($sql);
		// if($query->num_rows() > 0)
		// {
			// return $query->result();
		// } else {
			// return false;
		// }
	// }

	public function m_get_info($id){
		$sql = "SELECT * ,
				IF (`oa`.`oa_city` = '3',`b`.`b_name`,`oa`.`oa_brgy`) AS `brgy`,
				`oa`.`oa_prefix`,
				`oa`.`oa_suffix`,
				`oa`.`oa_suffix`,
				`oa`.`oa_recwork`,
				`oa`.`oa_rectraining`,
				`p`.`p_name`,
				`c`.`c_name`,
				`ah`.`ah_remarksnotes`,
				`ah`.`ah_remarksnotes_date`,
				DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),`oa`.`oa_bdate`)),'%Y-%m-%d') + 0 AS `age`
				FROM `tbl_onlineapplicant` `oa`
						INNER JOIN `tbl_province` `p` ON
							`p`.`p_id` = `oa`.`oa_province`
						INNER JOIN `tbl_city` `c` ON
							`c`.`c_id` = `oa`.`oa_city`
						LEFT JOIN `tbl_brgy` `b` ON
							`b`.`b_id` = `oa`.`oa_brgy`
						LEFT JOIN `tbl_applicationhistory` `ah` ON
							`ah`.`oa_id` = `oa`.`oa_id`
				WHERE `oa`.`oa_id` = '".$id."' AND (`ah`.`ah_islatest` = 'YES'  OR `ah`.`ah_islatest` = ''  OR `ah`.`ah_islatest` IS NULL)";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_save_vacancy($data){
		$query = $this->db->insert('`tbl_vacancies`',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_save_course($data){
		$query = $this->db->insert('`tbl_courses`',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_update_course($c_id,$data){
				$this->db->where('`c_id`',$c_id);
		$query = $this->db->update('`tbl_courses`',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_save_job_matching($data){
		$query = $this->db->insert('`tbl_jobmatching`',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_update_vacancy($data,$v_id){
				$this->db->where('`v_id`',$v_id);
		$query = $this->db->update('`tbl_vacancies`',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_update_job_matching($data,$jm_id){
				$this->db->where('`jm_id`',$jm_id);
		$query = $this->db->update('`tbl_jobmatching`',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_update_app_result($ah_id,$data){
				$this->db->where('`ah_id`',$ah_id);
		$query = $this->db->update('`tbl_applicationhistory`',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_get_appliedposition($id){
		$sql = "SELECT *
						FROM `tbl_positionapplied` `pa`
						INNER JOIN `tbl_vacancies` `v` ON
						`v`.`v_id` = `pa`.`v_id`
						WHERE `oa_id` = '".$id."' AND `pa_islatest` = 'YES'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}


	public function m_get_application_status($id){
		$sql = "SELECT `ah`.`oa_id`,
						`ah`.`ah_position`,
						`ah`.`ah_desc`,
						`ah`.`ah_status`,
						`ah`.`ah_remarks`,
						`ah`.`ah_remarks_status`,
						`ah`.`ah_remarksdate`,
						`ah`.`ah_datefiled`,
						`ah`.`ah_islatest`
			FROM `tbl_applicationhistory` `ah`
			WHERE `ah`.`oa_id` = '".$id."'
			ORDER BY `ah`.`ah_datefiled` ASC
";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_get_application_foraction(){
		$sql = "SELECT `ah`.`ah_id`,
					`ah`.`oa_id`,
					CONCAT(`oa`.`oa_prefix`,'-',`oa`.`oa_suffix`) AS `oa_num`,
					CONCAT(`oa`.`oa_lname`,' ',`oa`.`oa_extname`,',',`oa`.`oa_fname`,' ',`oa`.`oa_mname`) AS `oa_name`,
					`ah`.`ah_position` AS `oa_positionapplied`,
					`ah`.`ah_remarks`,
					`ah`.`ah_status`
				FROM `tbl_applicationhistory` `ah`
				INNER JOIN `tbl_onlineapplicant` `oa` ON
					`oa`.`oa_id` = `ah`.`oa_id`
				WHERE `ah`.`ah_islatest` = 'YES' ";
				// if(!null($ah_status)){
					// $sql .= "AND `ah_status` = '".$ah_status."'";
				// }

		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}
	public function m_get_application_foraction_bystatus($ah_status){
		$sql = "SELECT `ah`.`ah_id`,
					`ah`.`oa_id`,
					CONCAT(`oa`.`oa_prefix`,'-',`oa`.`oa_suffix`) AS `oa_num`,
					CONCAT(`oa`.`oa_lname`,' ',`oa`.`oa_extname`,',',`oa`.`oa_fname`,' ',`oa`.`oa_mname`) AS `oa_name`,
					`ah`.`ah_position` AS `oa_positionapplied`,
					`ah`.`ah_remarks`,
					`ah`.`ah_status`
				FROM `tbl_applicationhistory` `ah`
				INNER JOIN `tbl_onlineapplicant` `oa` ON
					`oa`.`oa_id` = `ah`.`oa_id`
				WHERE `ah`.`ah_islatest` = 'YES' AND `ah_status` = '".$ah_status."'";


		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}


	public function m_save_application_history($oa_history,$oa_update){

		$sql2 = "UPDATE `tbl_applicationhistory` `ah`
				SET `ah`.`ah_islatest` = 'NO'
				WHERE `oa_id` IN(".$oa_update.")";
		$query2 = $this->db->query($sql2);

		$query = $this->db->query('INSERT INTO `tbl_applicationhistory` (
		`oa_id`,
		`jm_id`,
		`jm_reqnum`,
		`ah_office`,
		`ah_position`,
		`ah_desc`,
		`ah_remarks`,
		`ah_status`,
		`ah_islatest`,
		`ah_datefiled`

		) VALUES '.implode(',', $oa_history));



		if($query && $query2 )
		{
			return true;
		} else {
			return false;
		}
	}


	public function m_save_application($data){


		$sql_check = "SELECT * FROM `tbl_applicationhistory` `ah`
				WHERE `oa_id` = '".$data['oa_id']."'";

		$check_query = $this->db->query($sql_check);

		if($check_query->num_rows() > 0){

			$sql2 = "UPDATE `tbl_applicationhistory` `ah`
				SET `ah`.`ah_islatest` = 'NO'
				WHERE `oa_id` = '".$data['oa_id']."'";

			$update_query = $this->db->query($sql2);
			$data['ah_status'] = 'Approved';
			$insert_query = $this->db->insert('`tbl_applicationhistory`',$data);


			if($insert_query && $update_query)
			{
				return true;
			} else {
				return false;
			}

		}else{
			$data['ah_status'] = 'Pending';
			$insert_query = $this->db->insert('`tbl_applicationhistory`',$data);

			if($insert_query)
			{
				return true;
			} else {
				return false;
			}

		}


	}

	public function m_update_status($oa_id_forstatus){

		$sql = "UPDATE `tbl_applicationhistory` `ah`
					SET `ah`.`ah_emailsent` = '".date('Y-m-d')."',
						`ah`.`ah_sentby` = '".$this->session->userdata('a_id')."'
				WHERE `ah_id` IN(".$oa_id_forstatus.")";
		$query = $this->db->query($sql);

		if($query){
			return true;
		}else{
			return false;
		}
	}


	public function m_cancel_request($jm_id){

		$sql = "UPDATE `tbl_jobmatching` `jm`
					SET `jm`.`jm_iscancel` = 'YES',
						`jm`.`jm_canceldate` = '".date('Y-m-d')."'
				WHERE `jm_id` = '$jm_id' ";
		$query = $this->db->query($sql);

		if($query){
			return true;
		}else{
			return false;
		}
	}


	public function m_action_for_applicant($ah_update,$ah_status){

		// echo $ah_status;
		// die();
		$sql = "UPDATE `tbl_applicationhistory` `ah`
				SET `ah`.`ah_status` = '".$ah_status."',
					`ah`.`ah_actiondate` = '".date('Y-m-d')."'
				WHERE `ah_id` IN(".$ah_update.")";
		$query = $this->db->query($sql);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_get_offices(){
		$sql="SELECT
				CONCAT(`dept`.`o_code`,'-',`div`.`o_code`)AS `office`
			FROM `tbl_office` `div`
			INNER JOIN `tbl_office` `dept` ON
					`div`.`o_mother` = `dept`.`o_id`
			WHERE `dept`.`o_isactive` = 'yes'
			ORDER BY `office` ASC";

		$query = $this->db->query($sql);

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function m_get_jobmatching(){
		$sql="SELECT `jm`.`jm_id`,
				CONCAT(`jm`.`jm_prefix`,'-',`jm`.`jm_suffix`) AS `rnum`,
				`jm`.`jm_office`,
				`jm`.`jm_position`,
				`jm`.`jm_desc`,
				`jm`.`jm_category`,
				`jm`.`jm_course`,
				`jm`.`jm_eligibility`,
				`jm`.`jm_gender`,
				`jm`.`jm_postgrad`,
				`jm`.`jm_reqdate`
			FROM `tbl_jobmatching` `jm`
			WHERE `jm`.`jm_isdeleted` = 'NO'";

		$query = $this->db->query($sql);

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_get_suffix_jm($prefix){
		$sql =	"SELECT IF(`jm_suffix` IS NULL,LPAD((000) + 1,3,0),LPAD(MAX(`jm_suffix`) + 1, 3, 0)) AS `jm_suffix`
				FROM `tbl_jobmatching`
					WHERE `jm_isdeleted` = 'NO'
						AND `jm_prefix` = '".$prefix."' LIMIT 1";

		$query = $this->db->query($sql);

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_get_candidate($jm_id){
		$sql =	"SELECT
					`oa`.`oa_id`,
					CONCAT(`oa`.`oa_prefix`,'-',`oa`.`oa_suffix`) AS `appnum`,
					CONCAT(`oa`.`oa_lname`,', ',`oa`.`oa_fname`,' ',`oa`.`oa_mname`) AS `name`,
					`oa`.`oa_course`,
					`oa`.`oa_eligibility`,
					`v`.`v_position`,
					`ah`.`ah_id`,
					`ah`.`ah_islatest`,
					`ah`.`ah_remarks`,
					`ah`.`ah_status`,
					`ah`.`ah_emailsent`,
					`ah`.`ah_remarksdate`,
					`ah`.`ah_remarks_status`,
					`c`.`c_category`
				FROM `tbl_onlineapplicant` `oa`
				INNER JOIN `tbl_positionapplied` `pa` ON
					`pa`.`oa_id` = `oa`.`oa_id`
				INNER JOIN `tbl_vacancies` `v` ON
					`v`.`v_id` = `pa`.`v_id`
				INNER JOIN `tbl_courses` `c` ON
					`c`.`c_name` = `oa`.`oa_course`
				LEFT JOIN `tbl_applicationhistory` `ah` ON
					`ah`.`oa_id` = `oa`.`oa_id`
				JOIN `tbl_jobmatching` `jm`
				WHERE `oa`.`oa_isactivated` = 'YES'
				 AND `ah`.`ah_islatest` = 'YES'
				AND IF(`jm`.`jm_position` != 'ANY', `jm`.`jm_position`,`v`.`v_position`) = `v`.`v_position`
				AND IF(`jm`.`jm_eligibility` != 'N/A', `jm`.`jm_eligibility`,`oa`.`oa_eligibility`) = `oa`.`oa_eligibility`
				 AND
					(
					IF(`jm`.`jm_category` != 'ANY', `jm`.`jm_category`,`c`.`c_category`) = `c`.`c_category`
					OR
					IF(`jm`.`jm_course` != 'ANY', `jm`.`jm_course`,`oa`.`oa_course`) = `oa`.`oa_course`
					)
				 AND IF(`jm`.`jm_gender` != 'ANY', `jm`.`jm_gender`,`oa`.`oa_gender`) = `oa`.`oa_gender`
				 AND (
					`ah`.`ah_remarks_status` != 'FAILED' OR
					`ah`.`ah_remarks_status` IS NULL OR
					`ah`.`ah_remarks_status` = 'PASSED[1]' OR
					 `ah`.`ah_remarks_status` = 'PASSED[2]' OR
					 `ah`.`ah_remarks_status` = 'PASSED[3]'
					 )
				AND IF(`jm`.`jm_postgrad` != 'N/A', `jm`.`jm_postgrad`,`oa`.`oa_postgraduate`) = `oa`.`oa_postgraduate`
				  AND `ah`.`ah_remarks` != 'For Regret'
				AND `jm`.`jm_id` = '".$jm_id."'
				GROUP BY `oa`.`oa_id`";

		$query = $this->db->query($sql);

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_get_course_category(){
		$sql =	"SELECT
					DISTINCT(`c`.`c_category`) AS `category`
				FROM `tbl_courses` `c`
				WHERE `c`.`c_category` IS NOT NULL
				ORDER BY `c`.`c_category` ASC";

		$query = $this->db->query($sql);

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_reset_vacancy(){
		$sql =	"UPDATE `tbl_vacancies` `v`
				SET `v`.`v_desc` = 'NO VACANCIES'";

		$query = $this->db->query($sql);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_save_info($data){

					// $this->db->where('`oa_id`', $oa_id);
		 $query = $this->db->insert('`tbl_onlineapplicant`', $data);
		 $oa_id = $this->db->insert_id();
		 if($query){
				$new_v_id = array();
				$myArray = explode(',', $data['oa_pdesire']);

				foreach($myArray as $n){

					$new_v_id[] = '(
								"'. $oa_id .'",
								"'. $n .'"
								)';
				}

			// insert batch

				$query3 = $this->db->query('UPDATE `tbl_positionapplied` SET `pa_islatest` = "NO" WHERE `oa_id` IN('.$oa_id.')');
				if($query3){
					$query2 = $this->db->query('INSERT INTO `tbl_positionapplied` (`oa_id`,`v_id`) VALUES '.implode(',',$new_v_id));
					if($query2){
						 return true;
					}else{
						 return false;
					}
				}else{
					return false;
				}



		 }else{
			 return false;
		 }
	}

	public function m_get_reqeuestlist(){

		$sql = "SELECT * FROM `tbl_jobmatching`  WHERE jm_isdeleted = 'NO' ORDER BY `jm_reqdate` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}


	public function m_get_appnumber($oa_id){
		$sql =	"SELECT `oa_prefix`,`oa_suffix`  FROM `tbl_onlineapplicant` WHERE  `oa_id` = '".$oa_id."' AND `oa_prefix` IS NOT NULL  AND `oa_suffix` IS NOT NULL ";
		$query = $this->db->query($sql);

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_get_requestinfo($id){
		$sql =	"SELECT
					`jm`.*,
					`a`.`a_firstname`,
					`a`.`a_lastname`,
					`a`.`a_middlename`,
					CONCAT(`a`.`a_lastname`,',',`a`.`a_firstname`,' ',`a`.`a_middlename`) AS `dhead`
				FROM `tbl_jobmatching` `jm`
				INNER JOIN `tbl_account` `a` ON
					`a`.`a_id` = `jm`.`jm_officehead`
				WHERE `jm_id` = '$id'";
		$query = $this->db->query($sql);

		if($query->num_rows() == 1){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_get_suffix($prefix){
		$sql =	"SELECT IF(`oa_suffix` IS NULL,LPAD((000) + 1,3,0),LPAD(MAX(`oa_suffix`) + 1, 3, 0)) AS `oa_suffix` FROM `tbl_onlineapplicant` WHERE `oa_isactivated` = 'YES' AND `oa_prefix` = '".$prefix."' LIMIT 1";

		$query = $this->db->query($sql);

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
}
?>
