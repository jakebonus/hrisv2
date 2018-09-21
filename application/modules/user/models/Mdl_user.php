<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Mdl_user extends CI_Model {

		public function m_login($username,$password)
		{


			$newpass = sha1(md5($password.'c[x]t!@n>[*]{<Lo[R];eN}Ce}'));


				$sql = "SELECT `a`.`a_id`,
								`a`.`a_eld`,
								`a`.`a_level`,
								`a`.`a_profile`,
								`a`.`a_empno`,
								`a`.`a_machineid`,
								`a`.`a_mi`,
								`a`.`a_middlename`,
								`a`.`a_firstname`,
								`a`.`a_lastname`,
								`a`.`a_namext`,
								`pi`.`pi_gender`,
                                `o`.`o_code` AS `a_deptlocation`,

								`a`.`a_officetype`,
								`w`.`p_appointment` AS `a_status`,
								`w`.`p_dept` AS `a_office`,
								`w`.`p_div` AS `a_division`,
								`w`.`p_position` AS `a_position`,
								IF(`o`.`o_head` = `a`.`a_id`,'yes','no') AS `is_depthead`

							FROM `tbl_account` `a`

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
									WHERE `w`.`p_isservicerecord` = 'YES'  AND `w`.`is_deleted` = 'NO'
									GROUP BY `w`.`a_id`) `t2`
									ON `t1`.`a_id` = `t2`.`a_id`
									AND `t1`.`p_from` = `t2`.`MAXDATE`
								WHERE `t1`.`p_isservicerecord` = 'YES' AND `t1`.`is_deleted` = 'NO' ) `w`
							 ON `w`.`a_id` = `a`.`a_id`
							INNER JOIN `tbl_personalinfo` `pi` ON
								 `pi`.`a_id` = `a`.`a_id`
                            INNER JOIN `tbl_office` `o` ON
								 `o`.`o_id` = `a`.`a_deptlocation`

							WHERE `a_machineid` = '$username'
								AND IF(`a`.`a_password` IS NULL OR `a`.`a_ispword` = '0',REPLACE(`pi`.`pi_birthdate`,'-','') = '$password',
									`a`.`a_password` = '$newpass')
								AND `a`.`a_isactive` = 'yes'";
				// echo $sql;
				// die();
				$query = $this->db->query($sql);

					if($query->num_rows() == 1)
					{
						return $query->result();
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
		public function m_check_password_changed($a_id){
			$sql = "SELECT `a_id` FROM `tbl_account` WHERE `a_ispword` = '0' AND `a_id` = '$a_id'";
			$query  = $this->db->query($sql);
                if($query->num_rows() == 1){
                    return true;
                }else{
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

	public function m_get_emp_info($a_id){
		// $sql = 'SELECT 	`a`.`a_id`,
						// `a`.`a_empno`,
						// `a`.`a_firstname`,
						// `a`.`a_middlename`,
						// `a`.`a_mi`,
						// `a`.`a_lastname`,
						// `a`.`a_namext`,
						// `a`.`a_fdos`,
						// `a`.`a_office`,
						// `a`.`a_division`,
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
				        WHERE `w`.`p_isservicerecord` = "YES"
				        GROUP BY `w`.`a_id`) `t2`
				        ON `t1`.`a_id` = `t2`.`a_id`
				        AND `t1`.`p_from` = `t2`.`MAXDATE`
				    WHERE `t1`.`p_isservicerecord` = "YES") `w`
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

		$sql = "SELECT * FROM `tbl_children` WHERE `a_id` = $a_id order by `c_birthdate` asc";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}

		}

		public function m_get_emp_education($a_id){

		$sql = "SELECT * FROM `tbl_educbg` WHERE `a_id` = $a_id AND `e_isdeleted` = 'NO' ORDER BY `pi_from` DESC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}

		}

			public function m_get_emp_training($a_id){

		$sql = "SELECT * FROM `tbl_training` WHERE `a_id` = $a_id AND `t_deleted` = 'NO' ORDER BY `t_from` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}

	}

		public function m_get_emp_eligibility($a_id){

		$sql = "SELECT * FROM `tbl_eligibility` WHERE `a_id` = $a_id AND `e_deleted` = 'NO' ORDER BY `el_examdate` ASC";
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
		$sql = "SELECT * FROM `tbl_workinfo` WHERE `a_id` = $a_id AND `is_deleted` = 'NO'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
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

	public function m_update_child_info($child,$c_id){
		$this->db->where('`c_id`',$c_id);
		$query = $this->db->update('`tbl_children`',$child);
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

		public function m_update_employee_educ($educ,$e_id){
		$this->db->where('`e_id`',$e_id);
		$query = $this->db->update('`tbl_educbg`',$educ);
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

	public function m_update_employee_elig($elig,$el_id){
		$this->db->where('`el_id`',$el_id);
		$query = $this->db->update('`tbl_eligibility`',$elig);
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

		public function m_add_employee_vol_work($volwork){
		$query = $this->db->insert('`tbl_voluntarywork`',$volwork);
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

		public function m_add_employee_skills($sh){
		$query = $this->db->insert('`tbl_skills_hobbies`',$sh);
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

		public function m_update_employee_answers($q_ans,$a_id){
		$this->db->where('`a_id`', $a_id);
		$query = $this->db->update('`tbl_questionnaire`',$q_ans);
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

		public function m_update_employee_reff($reff,$r_id){
		$this->db->where('`r_id`',$r_id);
		$query = $this->db->update('`tbl_reference`',$reff);
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


	public function m_save_request($req){
		$query = $this->db->insert('`tbl_request`',$req);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_save_leave($leave,$dates,$holidays){

	$alldate = '';

	// First Query
		$query = $this->db->insert('`tbl_leaves`',$leave);
		if($query){
			return true;
		}else{
			return false;
		}

		// $l_id = $this->db->insert_id(); //get Insert_id
	// End of First Query

		// if($dates['l_from'] != $dates['l_to']){

		// 		$aryRange=array();
		// 			$iDateFrom	=mktime(1,0,0,substr($dates['l_from'],5,2),substr($dates['l_from'],8,2),substr($dates['l_from'],0,4));
		// 			$iDateTo	=mktime(1,0,0,substr($dates['l_to'],5,2),substr($dates['l_to'],8,2),substr($dates['l_to'],0,4));

		// 			if ($iDateTo>=$iDateFrom)
		// 			{

		// 				if($this->session->userdata('a_eld') == '1.00'){
		// 					if(date('w',strtotime(date('Y-m-d',$iDateFrom))) == 6 || date('w',strtotime(date('Y-m-d',$iDateFrom))) == 0) {
		// 						// if first entry is weekends add day
		// 						if($leave['l_typespecify'] == 'ML'){
		// 								array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
		// 							}else{
		// 								$iDateFrom+=86400;
		// 							}
		// 					} else {
		// 						if(in_array(date('Y-m-d',$iDateFrom),$holidays)){
		// 							// its holiday do nothing
		// 							if($leave['l_typespecify'] == 'ML'){
		// 								array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
		// 							}
		// 						}else{
		// 							array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
		// 						}
		// 					}

		// 				}elseif($this->session->userdata('a_eld') == '3.00'){
		// 					if($this->session->userdata('a_deptlocation') == 'CAVO' ||
		// 						$this->session->userdata('a_deptlocation') == 'CDRRMD' ||
		// 						$this->session->userdata('a_deptlocation') == 'CEED' ||
		// 						$this->session->userdata('a_deptlocation') == 'UMSD' ||
		// 						$this->session->userdata('a_deptlocation') == 'TMD'){
		// 						array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
		// 					}else{
		// 						if(date('w',strtotime(date('Y-m-d',$iDateFrom))) == 6 || date('w',strtotime(date('Y-m-d',$iDateFrom))) == 0) {
		// 							// if first entry is weekends add day
		// 							if($leave['l_typespecify'] == 'ML'){
		// 								array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
		// 							}else{
		// 								$iDateFrom+=86400;
		// 							}
		// 						} else {
		// 							if(in_array(date('Y-m-d',$iDateFrom),$holidays)){
		// 								// its holiday do nothing
		// 								if($leave['l_typespecify'] == 'ML'){
		// 									array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
		// 								}
		// 							}else{
		// 								array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
		// 						}
		// 						}
		// 					}


		// 				}else{
		// 					if(in_array(date('Y-m-d',$iDateFrom),$holidays)){
		// 							// its holiday do nothing
		// 					}else{
		// 						array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry

		// 					}
		// 				}



		// 				while ($iDateFrom<$iDateTo)
		// 				{
		// 					$iDateFrom+=86400;
		// 					$check_date = date('Y-m-d',$iDateFrom);
		// 					if($this->session->userdata('a_eld') == '1.00'){
		// 						if(date('w',strtotime($check_date)) == 6 || date('w',strtotime($check_date)) == 0) {
		// 							// echo 'Event on a weekend'.'<br/>';
		// 							if($leave['l_typespecify'] == 'ML'){
		// 								array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
		// 							}
		// 						} else {
		// 							// echo 'Event is on a weekday';
		// 							// check if holiday
		// 							if(in_array(date('Y-m-d',$iDateFrom),$holidays)){
		// 									// its Holiday Do nothing
		// 									if($leave['l_typespecify'] == 'ML'){
		// 										array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
		// 									}
		// 							}else{
		// 								array_push($aryRange,$check_date);
		// 							}
		// 							// add 24 hours
		// 						}
		// 					}elseif($this->session->userdata('a_eld') == '3.00'){
		// 						if($this->session->userdata('a_deptlocation') == 'CAVO' ||
		// 							$this->session->userdata('a_deptlocation') == 'CDRRMD' ||
		// 							$this->session->userdata('a_deptlocation') == 'CEED' ||
		// 							$this->session->userdata('a_deptlocation') == 'UMSD' ||
		// 							$this->session->userdata('a_deptlocation') == 'TMD'){
		// 							array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
		// 						}else{
		// 							if(date('w',strtotime(date('Y-m-d',$iDateFrom))) == 6 || date('w',strtotime(date('Y-m-d',$iDateFrom))) == 0) {
		// 								// if first entry is weekends add day
		// 								if($leave['l_typespecify'] == 'ML'){
		// 									array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
		// 								}else{
		// 									$iDateFrom+=86400;
		// 								}
		// 							} else {
		// 								if(in_array(date('Y-m-d',$iDateFrom),$holidays)){
		// 									// its holiday do nothing
		// 									if($leave['l_typespecify'] == 'ML'){
		// 										array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
		// 									}
		// 								}else{
		// 									array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
		// 								}
		// 							}
		// 						}
		// 					}else{
		// 						if(in_array(date('Y-m-d',$iDateFrom),$holidays)){
		// 									// its Holiday Do nothing
		// 									if($leave['l_typespecify'] == 'ML'){
		// 										array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
		// 									}
		// 							}else{
		// 								array_push($aryRange,$check_date);
		// 							}
		// 					}
		// 				}
		// 			}

		// 			$numberofdays = count($aryRange);


		// 			for($i = 0; $i < $numberofdays; $i++){
		// 				$sql_alldate = "INSERT `tbl_inclusivedates`
		// 										SET `l_id` 		= '$l_id',
		// 											`id_dates` 	= '".$aryRange[$i]."'";
		// 				if($query2 = $this->db->query($sql_alldate)){
		// 					// echo 'count_in_array - '.$i.'-'.$aryRange[$i].'<br/>';
		// 					$alldate++;
		// 				}
		// 			}

		// 		if($alldate == $leave['l_noofworkingdays']){
		// 				return true;
		// 		}else{
		// 				return false;
		// 		}
		// }else{
		// 	$sql_alldate = "INSERT `tbl_inclusivedates`
		// 							SET `l_id` 		= '$l_id',
		// 							`id_dates` 	= '".$dates['l_from']."'";
		// 				if($query2 = $this->db->query($sql_alldate)){
		// 					return true;
		// 				}else{
		// 					return false;
		// 				}
		// }
	}

	public function m_get_pending_request($a_id){
		$sql = "SELECT 	`r`.`r_id`,
						`r`.`r_type`,
						`r`.`r_datefiled`,
						`r`.`r_noofcopy`,
						`r`.`r_purpose`,
						`r`.`r_processedby`,
						IF (`r`.`r_printeddate` != '','Printed','Pending') AS remarks

		FROM `tbl_request` `r` WHERE `a_id` = $a_id ORDER BY `r_datefiled` DESC";
		// $query = $this->db->insert('`tbl_request`',$req);
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){

			return $query->result();
		}else{

			return false;
		}
	}

	public function m_get_dept($a_id){
		$sql = "SELECT `o_code` FROM `tbl_office` WHERE `o_head` =  '".$a_id."'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){

			return $query->result();
		}else{

			return false;
		}
	}

	public function m_get_vice_mayor_signatory($a_id){

		$sql = "SELECT
					`a`.`a_id`,
					CONCAT(`a`.`a_lastname`,', ',`a`.`a_firstname`) AS `emp_name`,
					`dept_loc`.`o_code` AS `dept`,
						`div_loc`.`o_code` AS `div`,
					NULL AS `div_head_id`,
					`a`.`a_id` AS `dept_head_id`,
					NULL AS `div_head`,
					CONCAT(`a`.`a_lastname`,', ',`a`.`a_firstname`) AS `dept_head`,
					`div_loc`.`o_dessig`,
						IF (
								(SELECT `wi`.`p_position`
									FROM `tbl_workinfo` `wi`
										WHERE `wi`.`a_id` = `a`.`a_id`
											AND (`wi`.`p_to` IS NULL OR `wi`.`p_to` = '0000-00-00')
										AND `wi`.`p_isservicerecord` = 'YES'
										GROUP BY `wi`.`a_id`
										ORDER BY `wi`.`p_from` ASC
								) IS NULL,

								'HR_ERROR',

								(SELECT `wi`.`p_position`
									FROM `tbl_workinfo` `wi`
										WHERE `wi`.`a_id` = `a`.`a_id`
											AND (`wi`.`p_to` IS NULL OR `wi`.`p_to` = '0000-00-00')
									AND `wi`.`p_isservicerecord` = 'YES'
									GROUP BY `wi`.`a_id`
									ORDER BY `wi`.`p_from` ASC
								))AS `a_position`,
							IF (
					(SELECT CONCAT(REPLACE(`wi`.`p_salarygrade`, 'Grade', ''),'/',REPLACE(`wi`.`p_salarystep`, 'Step', ''))
						FROM `tbl_workinfo` `wi`
					WHERE `wi`.`a_id` = `a`.`a_id`
						AND (`wi`.`p_to` IS NULL OR `wi`.`p_to` = '0000-00-00')
						AND `wi`.`p_isservicerecord` = 'YES'
						GROUP BY `wi`.`a_id`
						ORDER BY `wi`.`p_from` ASC
					) IS NULL,
					'HR_ERROR',
					(SELECT  CONCAT(REPLACE(`wi`.`p_salarygrade`, 'Grade', ''),'/',REPLACE(`wi`.`p_salarystep`, 'Step', ''))
						FROM `tbl_workinfo` `wi`
					WHERE `wi`.`a_id` = `a`.`a_id`
						AND (`wi`.`p_to` IS NULL OR `wi`.`p_to` = '0000-00-00')
						AND `wi`.`p_isservicerecord` = 'YES'
					GROUP BY `wi`.`a_id`
					ORDER BY `wi`.`p_from` ASC
				))AS `sg`,
					(SELECT `d_value` FROM `tbl_defaults` WHERE `d_desc` = 'City Mayor') AS `l_asmayor`

				FROM `tbl_account` `a`
				LEFT JOIN `tbl_office` `dept_loc`
					ON `dept_loc`.`o_id` = `a`.`a_deptlocation`
				LEFT JOIN `tbl_office` `div_loc`
					ON `div_loc`.`o_id` = `a`.`a_divlocation`

				WHERE `a`.`a_id` = '".$a_id."'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){

			return $query->result();
		}else{

			return false;
		}
	}
	public function m_get_signatory($a_id){

		// $sql = "SELECT `a`.`a_id`,`a`.`a_firstname`,`a`.`a_middlename`,`a`.`a_lastname`,`a`.`a_position`,`a`.`a_status`,`od`.`o_dessig`,
					  // CONCAT(REPLACE(`a`.`a_salarygrade`, 'Grade', ''),'/',REPLACE(`a`.`a_salarystep`, 'Step', '')) AS `sg`,
					  // `od`.`o_id`,
					  // `od`.`o_code` AS `div`,
					  // `od`.`o_head` AS `div_head_id`,
					  // CONCAT(`dh`.`a_firstname`,' ',`dh`.`a_middlename`,' ',`dh`.`a_lastname`) AS `div_head`,
					  // `o`.`o_id`,
					  // `o`.`o_code` AS `dept`,
					  // IF(`a`.`a_id` = `o`.`o_head`,(SELECT `o_head` FROM `tbl_office` WHERE `o_id` = '2'),`o`.`o_head`) AS `dept_head_id`,
					  // IF(`a`.`a_id` = `o`.`o_head`,(SELECT CONCAT(`zz`.`a_firstname`,' ',`zz`.`a_middlename`,' ', `zz`.`a_lastname` )
									// FROM `tbl_office` `yy`
									// INNER JOIN `tbl_account` `zz`
										// ON `zz`.`a_id` = `yy`.`o_head`
									// WHERE `yy`.`o_id` = '2'),
									// CONCAT(`depthead`.`a_firstname`,' ',`depthead`.`a_middlename`,' ',`depthead`.`a_lastname`)) AS `dept_head`,
					  // IF(`a`.`a_id` = `o`.`o_head`,(SELECT `o_head` FROM `tbl_office` WHERE `o_id` = '1'),(SELECT `o_head` FROM `tbl_office` WHERE `o_id` = '2')) AS `l_asmayor`
					// FROM
					  // `tbl_account` `a`
					  // LEFT JOIN `tbl_office` `o`
						// ON `o`.`o_id` = `a`.`a_deptlocation`
					  // LEFT JOIN `tbl_office` `od`
						// ON `od`.`o_id` = `a`.`a_divlocation`
					  // LEFT JOIN `tbl_account` `dh`
						// ON `dh`.`a_id` = `od`.`o_head`
					  // LEFT JOIN `tbl_account` `depthead`
						// ON `depthead`.`a_id` = `o`.`o_head`
									// WHERE `a`.`a_id` = $a_id";
		// $sql = "SELECT `a`.`a_id`,`a`.`a_firstname`,`a`.`a_middlename`,`a`.`a_lastname`,`a`.`a_position`,`a`.`a_status`,`od`.`o_dessig`,
				// IF (
					// (SELECT CONCAT(REPLACE(`wi`.`p_salarygrade`, 'Grade', ''),'/',REPLACE(`wi`.`p_salarystep`, 'Step', ''))
						// FROM `tbl_workinfo` `wi`
					// WHERE `wi`.`a_id` = `a`.`a_id`
						// AND (`wi`.`p_to` IS NULL OR `wi`.`p_to` = '0000-00-00')
						// AND `wi`.`p_isservicerecord` = 'YES'
						// GROUP BY `wi`.`a_id`
						// ORDER BY `wi`.`p_from` ASC
					// ) IS NULL,
					// 'HR_ERROR',
					// (SELECT  CONCAT(REPLACE(`wi`.`p_salarygrade`, 'Grade', ''),'/',REPLACE(`wi`.`p_salarystep`, 'Step', ''))
						// FROM `tbl_workinfo` `wi`
					// WHERE `wi`.`a_id` = `a`.`a_id`
						// AND (`wi`.`p_to` IS NULL OR `wi`.`p_to` = '0000-00-00')
						// AND `wi`.`p_isservicerecord` = 'YES'
					// GROUP BY `wi`.`a_id`
					// ORDER BY `wi`.`p_from` ASC
				// ))AS `sg`,
				// `od`.`o_id`,
				// `od`.`o_code` AS `div`,
				// `od`.`o_head` AS `div_head_id`,

				// CONCAT(`dh`.`a_firstname`,' ',`dh`.`a_middlename`,' ',`dh`.`a_lastname`) AS `div_head`,
				// `o`.`o_id`,
				// `o`.`o_code` AS `dept`,

				// IF(`a`.`a_id` = `o`.`o_head`,
					// (SELECT `d_value` FROM `tbl_defaults` WHERE `d_desc` = 'City Admin'),
					// `o`.`o_head`
				// ) AS `dept_head_id`,

				// IF(`a`.`a_id` = `o`.`o_head`,
					// (SELECT CONCAT(`zz`.`a_firstname`,' ',`zz`.`a_middlename`,' ', `zz`.`a_lastname` )
								// FROM `tbl_defaults` `yy`
									// INNER JOIN `tbl_account` `zz`
										// ON `zz`.`a_id` = `yy`.`d_value`
									// WHERE `yy`.`d_desc` = 'City Admin'),
					// CONCAT(`depthead`.`a_firstname`,' ',`depthead`.`a_middlename`,' ',`depthead`.`a_lastname`)
				// ) AS `dept_head`,

				// IF(`a`.`a_id` = `o`.`o_head`,
					// (SELECT `d_value` FROM `tbl_defaults` WHERE `d_desc` = 'City Mayor'),
					// (SELECT `d_value` FROM `tbl_defaults` WHERE `d_desc` = 'City Admin')
				// ) AS `l_asmayor`
			// FROM
				// `tbl_account` `a`
			// LEFT JOIN `tbl_office` `o`
				// ON `o`.`o_id` = `a`.`a_deptlocation`
			// LEFT JOIN `tbl_office` `od`
				// ON `od`.`o_id` = `a`.`a_divlocation`
			// LEFT JOIN `tbl_account` `dh`
				// ON `dh`.`a_id` = `od`.`o_head`
			// LEFT JOIN `tbl_account` `depthead`
				// ON `depthead`.`a_id` = `o`.`o_head`
									// WHERE `a`.`a_id` = $a_id";

									$sql = "SELECT `a`.`a_id`,`a`.`a_firstname`,`a`.`a_middlename`,`a`.`a_lastname`,`a`.`a_position`,`a`.`a_status`,`od`.`o_dessig`,
				IF (
					(SELECT CONCAT(REPLACE(`wi`.`p_salarygrade`, 'Grade', ''),'/',REPLACE(`wi`.`p_salarystep`, 'Step', ''))
						FROM `tbl_workinfo` `wi`
					WHERE `wi`.`a_id` = `a`.`a_id`
						AND (`wi`.`p_to` IS NULL OR `wi`.`p_to` = '0000-00-00')
						AND `wi`.`p_isservicerecord` = 'YES'
						GROUP BY `wi`.`a_id`
						ORDER BY `wi`.`p_from` ASC
					) IS NULL,
					'HR_ERROR',
					(SELECT  CONCAT(REPLACE(`wi`.`p_salarygrade`, 'Grade', ''),'/',REPLACE(`wi`.`p_salarystep`, 'Step', ''))
						FROM `tbl_workinfo` `wi`
					WHERE `wi`.`a_id` = `a`.`a_id`
						AND (`wi`.`p_to` IS NULL OR `wi`.`p_to` = '0000-00-00')
						AND `wi`.`p_isservicerecord` = 'YES'
					GROUP BY `wi`.`a_id`
					ORDER BY `wi`.`p_from` ASC
				))AS `sg`,
				`od`.`o_id`,
				`od`.`o_code` AS `div`,
				`od`.`o_head` AS `div_head_id`,

				CONCAT(`dh`.`a_firstname`,' ',`dh`.`a_middlename`,' ',`dh`.`a_lastname`) AS `div_head`,
				`o`.`o_id`,
				`o`.`o_code` AS `dept`,

				IF(`a`.`a_id` = `o`.`o_head`,
					(SELECT `d_value` FROM `tbl_defaults` WHERE `d_desc` = 'City Admin'),
					`o`.`o_head`
				) AS `dept_head_id`,

				IF(`a`.`a_id` = `o`.`o_head`,
					(SELECT CONCAT(`zz`.`a_firstname`,' ',`zz`.`a_middlename`,' ', `zz`.`a_lastname` )
								FROM `tbl_defaults` `yy`
									INNER JOIN `tbl_account` `zz`
										ON `zz`.`a_id` = `yy`.`d_value`
									WHERE `yy`.`d_desc` = 'City Admin'),
					CONCAT(`depthead`.`a_firstname`,' ',`depthead`.`a_middlename`,' ',`depthead`.`a_lastname`)
				) AS `dept_head`,

			CASE WHEN `o`.`o_code` = 'OCVM'
				OR `o`.`o_code` = 'CC1'
				OR `o`.`o_code` = 'CC2'
				OR `o`.`o_code` = 'CC3'
				OR `o`.`o_code` = 'CC4'
				OR `o`.`o_code` = 'CC5'
				OR `o`.`o_code` = 'CC6'
				OR `o`.`o_code` = 'CC7'
				OR `o`.`o_code` = 'CC8'
				OR `o`.`o_code` = 'CC9'
				OR `o`.`o_code` = 'CC10'
				OR `o`.`o_code` = 'CC11'
				OR `o`.`o_code` = 'OSP' THEN



						(SELECT `d_value` FROM `tbl_defaults` WHERE `d_desc` = 'City Vice Mayor')

			ELSE
				IF(`a`.`a_id` = `o`.`o_head`,
						(SELECT `d_value` FROM `tbl_defaults` WHERE `d_desc` = 'City Mayor'),
						(SELECT `d_value` FROM `tbl_defaults` WHERE `d_desc` = 'City Admin')
					)
				END AS `l_asmayor`

			FROM
				`tbl_account` `a`
			LEFT JOIN `tbl_office` `o`
				ON `o`.`o_id` = `a`.`a_deptlocation`
			LEFT JOIN `tbl_office` `od`
				ON `od`.`o_id` = `a`.`a_divlocation`
			LEFT JOIN `tbl_account` `dh`
				ON `dh`.`a_id` = `od`.`o_head`
			LEFT JOIN `tbl_account` `depthead`
				ON `depthead`.`a_id` = `o`.`o_head`
									WHERE `a`.`a_id` = $a_id";
		// $query = $this->db->insert('`tbl_request`',$req);
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){

			return $query->result();
		}else{

			return false;
		}
	}

	public function m_check_if_vice_mayor($a_id){
		$sql = "SELECT * FROM `tbl_defaults` WHERE `d_desc` = 'City Vice Mayor' AND `d_value` = '".$a_id."'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){

			return $query->result();
		}else{

			return false;
		}
	}

	public function m_check_if_signatory($a_id){
		$sql = "SELECT `o_type` FROM `tbl_office` WHERE `o_head` = '".$a_id."'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){

			return $query->result();
		}else{

			return false;
		}
	}


	// public function m_get_signatory_cc($a_id){

		// $sql = "SELECT `a`.`a_id`,`a`.`a_firstname`,`a`.`a_middlename`,`a`.`a_lastname`,`a`.`a_position`,`a`.`a_status`,`od`.`o_dessig`,
				// IF (
					// (SELECT CONCAT(REPLACE(`wi`.`p_salarygrade`, 'Grade', ''),'/',REPLACE(`wi`.`p_salarystep`, 'Step', ''))
						// FROM `tbl_workinfo` `wi`
					// WHERE `wi`.`a_id` = `a`.`a_id`
						// AND (`wi`.`p_to` IS NULL OR `wi`.`p_to` = '0000-00-00')
						// AND `wi`.`p_isservicerecord` = 'YES'
						// GROUP BY `wi`.`a_id`
						// ORDER BY `wi`.`p_from` ASC
					// ) IS NULL,
					// 'HR_ERROR',
					// (SELECT  CONCAT(REPLACE(`wi`.`p_salarygrade`, 'Grade', ''),'/',REPLACE(`wi`.`p_salarystep`, 'Step', ''))
						// FROM `tbl_workinfo` `wi`
					// WHERE `wi`.`a_id` = `a`.`a_id`
						// AND (`wi`.`p_to` IS NULL OR `wi`.`p_to` = '0000-00-00')
						// AND `wi`.`p_isservicerecord` = 'YES'
					// GROUP BY `wi`.`a_id`
					// ORDER BY `wi`.`p_from` ASC
				// ))AS `sg`,
				// `od`.`o_id`,
				// `od`.`o_code` AS `div`,
				// `od`.`o_head` AS `div_head_id`,

				// CONCAT(`dh`.`a_firstname`,' ',`dh`.`a_middlename`,' ',`dh`.`a_lastname`) AS `div_head`,
				// `o`.`o_id`,
				// `o`.`o_code` AS `dept`,

				// IF(`a`.`a_id` = `o`.`o_head`,
					// (SELECT `d_value` FROM `tbl_defaults` WHERE `d_desc` = 'City Admin'),
					// `o`.`o_head`
				// ) AS `dept_head_id`,

				// IF(`a`.`a_id` = `o`.`o_head`,
					// (SELECT CONCAT(`zz`.`a_firstname`,' ',`zz`.`a_middlename`,' ', `zz`.`a_lastname` )
								// FROM `tbl_defaults` `yy`
									// INNER JOIN `tbl_account` `zz`
										// ON `zz`.`a_id` = `yy`.`d_value`
									// WHERE `yy`.`d_desc` = 'City Admin'),
					// CONCAT(`depthead`.`a_firstname`,' ',`depthead`.`a_middlename`,' ',`depthead`.`a_lastname`)
				// ) AS `dept_head`,

				// IF(`a`.`a_id` = `o`.`o_head`,
					// (SELECT `d_value` FROM `tbl_defaults` WHERE `d_desc` = 'City Mayor'),
					// (SELECT `d_value` FROM `tbl_defaults` WHERE `d_desc` = 'City Admin')
				// ) AS `l_asmayor`
			// FROM
				// `tbl_account` `a`
			// LEFT JOIN `tbl_office` `o`
				// ON `o`.`o_id` = `a`.`a_deptlocation`
			// LEFT JOIN `tbl_office` `od`
				// ON `od`.`o_id` = `a`.`a_divlocation`
			// LEFT JOIN `tbl_account` `dh`
				// ON `dh`.`a_id` = `od`.`o_head`
			// LEFT JOIN `tbl_account` `depthead`
				// ON `depthead`.`a_id` = `o`.`o_head`
									// WHERE `a`.`a_id` = $a_id";
		// $query = $this->db->query($sql);
		// if($query->num_rows() > 0){

			// return $query->result();
		// }else{

			// return false;
		// }
	// }

	public function m_get_leave_forapproval_division($a_id){
		$sql = "SELECT 	`a`.`a_id`,
					CONCAT(`a`.`a_firstname`,' ',
					`a`.`a_middlename`,' ',
					`a`.`a_lastname`) AS `emp_name`,
					`l`.`l_id`,
					`l`.`l_agency`,
					`l`.`l_datefiled`,
					`l`.`l_position`,
					`l`.`l_sg`,
					`l`.`l_type`,
					IF(`l`.`l_typespecify` = ' ',`l`.`l_type`,`l`.`l_typespecify`) AS `l_type`,
					`l`.`l_sl`,
					`l`.`l_vl`,
					`l`.`l_asof`,
					`l`.`l_inclusivedates`
				FROM `tbl_account` `a`
				INNER JOIN `tbl_leaves` `l`
					ON `l`.`a_id` = `a`.`a_id`
				WHERE `l`.`a_id` != '$a_id'
					AND `l`.`l_div_sig` = '$a_id'
					AND `l`.`l_statusdivision` = 'Pending'
					AND `l`.`leave_status` != 'Cancelled'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_btn_approve_leave($l_id,$a_id){
		$actiondate = date('Y-m-d');

		$sql= "UPDATE `tbl_leaves` SET
				`l_statusdivision` 		= IF(`l_div_sig`='$a_id','Approved',`l_statusdivision`),
				`l_div_action_date` 	= IF(`l_div_sig`='$a_id','$actiondate',`l_div_action_date`),
				`l_statusdept` 			= IF(`l_dept_sig`='$a_id' OR `l_dept_sig` = `l_asmayor` AND `l_statusdept`='Pending','Approved',`l_statusdept`),
				`l_dept_action_date` 	= IF(`l_dept_sig`='$a_id' OR `l_dept_sig` = `l_asmayor` AND `l_statusdept`='Approved','$actiondate',`l_dept_action_date`),
				`l_statusasmayor` 		= IF(`l_asmayor`='$a_id','Approved',`l_statusasmayor`),
				`l_asmayor_action_date` = IF(`l_asmayor`='$a_id','$actiondate',`l_asmayor_action_date`)
				WHERE `l_id`= '$l_id'";
		$query = $this->db->query($sql);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_dept_disapproved_leave($l_id,$a_id){
		$actiondate = date('Y-m-d');

		$sql= "UPDATE `tbl_leaves` SET
				`l_statusdivision` 		= IF(`l_div_sig`='$a_id','Disapproved',`l_statusdivision`),
				`l_div_action_date` 	= IF(`l_div_sig`='$a_id','$actiondate',`l_div_action_date`),
				`l_statusdept` 			= IF((`l_dept_sig`='$a_id' OR `l_dept_sig` = `l_asmayor`) AND `l_statusdept`!='Approved','Disapproved',`l_statusdept`),
				`l_dept_action_date` 	= IF((`l_dept_sig`='$a_id' OR `l_dept_sig` = `l_asmayor`) AND `l_statusdept`='Disapproved','$actiondate',`l_dept_action_date`),
				`l_statusasmayor` 		= IF(`l_asmayor`='$a_id','Disapproved',`l_statusasmayor`),
				`l_asmayor_action_date` = IF(`l_asmayor`='$a_id','$actiondate',`l_asmayor_action_date`)
				WHERE `l_id`= '$l_id'";

		$query = $this->db->query($sql);
		if($query){
			return true;
		}else{
			return false;
		}
	}


	public function m_ajax_own_get_leave_for_approval($id){
		$sql = "SELECT `l`.`l_id`,
						`l`.`a_id`,
						CONCAT(`a`.`a_firstname`,' ',`a`.`a_middlename`,' ',`a`.`a_lastname`) AS `emp_name`,
						`l`.`l_agency`,
						DATE_FORMAT(`l`.`l_datefiled`,'%m/%d/%Y') AS `l_datefiled`,
						`l`.`l_position`,
						`l`.`l_typeofapplication`,
						`l`.`l_sg`,
						`l`.`l_sl`,
						`l`.`l_vl`,
						`l`.`l_asof`,
						`l`.`l_div_sig`,
						`l`.`l_statusdivision`,
						`l`.`l_dept_sig`,
						CONCAT(`l`.`l_remarks`,' - ',`l`.`l_disapprovereason`) AS `t_remarks`,

					IF(`l`.`l_typespecify` = ' ',`l`.`l_type`,`l`.`l_typespecify`) AS `l_type`,
					`l`.`l_inclusivedates`,

						`l`.`l_statusdept`,
						`l`.`l_asmayor`,
						`l`.`l_statusasmayor`
					FROM `tbl_leaves` `l`
						INNER JOIN `tbl_account` `a`
							ON `l`.`a_id` = `a`.`a_id`
						WHERE
							(
								(`l`.`l_div_sig` = '$id' AND `l`.`l_statusdivision` = 'Pending')
								OR (`l`.`l_dept_sig` = '$id' AND `l`.`l_statusdivision` = 'Approved' AND `l`.`l_statusdept` = 'Pending')
								OR (`l`.`l_asmayor` = '$id' AND `l`.`l_statushr` = 'Approved' AND `l`.`l_statusasmayor` = 'Pending')
								)
							AND `l`.`leave_status` = 'Applied'
							AND `l`.`a_id` <> '$id'";

		$query = $this->db->query($sql);
		if($query){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_get_leave_forapproval_department($a_id,$o_dessig){
		$a_id = $this->session->userdata('main');
		if($o_dessig == 0){
		$sql = "SELECT 	`a`.`a_id`,
					CONCAT(`a`.`a_firstname`,' ',
					`a`.`a_middlename`,' ',
					`a`.`a_lastname`) AS `emp_name`,
					`l`.`l_id`,
					`l`.`l_agency`,
					`l`.`l_datefiled`,
					`l`.`l_position`,
					`l`.`l_sg`,
					`l`.`l_sl`,
					`l`.`l_vl`,
					`l`.`l_asof`,
					IF(`l`.`l_typespecify` = ' ',`l`.`l_type`,`l`.`l_typespecify`) AS `l_type`,
					`l`.`l_inclusivedates`
				FROM `tbl_account` `a`
				INNER JOIN `tbl_leaves` `l`
					ON `l`.`a_id` = `a`.`a_id`
				WHERE
					(
					 `l`.`leave_status` = 'Applied'
					AND `l`.`l_statusdivision` = 'Approved'
					AND `l`.`l_statusdept` = 'Pending'
					AND (`l`.`l_asmayor` != '$a_id'
						OR `l`.`l_dept_sig` = '$a_id')
					)
					OR
					(
					`l`.`l_statusdept` = 'Approved'
					AND `l`.`leave_status` = 'Applied'
					AND `l`.`l_statushr` = 'Approved'
					AND `l`.`l_statusasmayor` = 'Pending'
					AND ((`l`.`l_asmayor` = '$a_id'  AND `l`.`l_dept_sig` != '$a_id')OR(`l`.`l_asmayor` = '$a_id' AND `l`.`l_dept_sig` = '$a_id'))
					)";
		}else{


	$sql ="SELECT 	`a`.`a_id`,
					CONCAT(`a`.`a_firstname`,' ',
					`a`.`a_middlename`,' ',
					`a`.`a_lastname`) AS `emp_name`,
					`l`.`l_id`,
					`l`.`l_agency`,
					`l`.`l_datefiled`,
					`l`.`l_position`,
					`l`.`l_sg`,
					`l`.`l_sl`,
					`l`.`l_vl`,
					`l`.`l_asof`,
					IF(`l`.`l_typespecify` = ' ',`l`.`l_type`,`l`.`l_typespecify`) AS `l_type`,
					`l`.`l_inclusivedates`
				FROM `tbl_account` `a`
				INNER JOIN `tbl_leaves` `l`
					ON `l`.`a_id` = `a`.`a_id`
				WHERE `l`.`a_id` != '$a_id'
					AND `l`.`l_dept_sig` = '$a_id'
					AND `l`.`leave_status` != 'Cancelled'
					AND `l`.`l_statusdept` = 'Pending'";
		}
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_get_office_signatory($a_id){
		$sql = "SELECT *
				FROM `tbl_office` `o`
				WHERE (`o`.`o_head` = '$a_id' OR `o`.`o_alternate` = '$a_id') AND `o`.`o_isactive` = 'yes' LIMIT 1";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_check_if_admin_signatory($a_id){
		$sql = "SELECT * FROM `tbl_office` WHERE `o_head` = '$a_id' OR `o_alternate` = '$a_id' AND `o_id` = '1' OR `o_id` = '2'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_get_approved_leave($a_id){
		$sql = "SELECT `l`.`l_id`,
					`l`.`a_id`,
					CONCAT(`a`.`a_firstname`,' ',`a`.`a_middlename`,' ',`a`.`a_lastname`) AS `emp_name`,
					`l`.`l_agency`,
					`l`.`l_datefiled`,
					`l`.`l_position`,
					`l`.`l_typeofapplication`,
					`l`.`l_sg`,
					`l`.`l_sl`,
					`l`.`l_vl`,
					`l`.`l_asof`,
					`l`.`l_div_sig`,
					`l`.`l_statusdivision`,
					`l`.`l_dept_sig`,
					CONCAT(`l`.`l_remarks`,' - ',`l`.`l_disapprovereason`) AS `t_remarks`,
					IF(`l`.`l_typespecify` = ' ',`l`.`l_type`,`l`.`l_typespecify`) AS `l_type`,
					`l`.`l_inclusivedates`,
					`l`.`l_statusdept`,
					`l`.`l_asmayor`,
					`l`.`l_statusasmayor`
				FROM `tbl_leaves` `l`
					INNER JOIN `tbl_account` `a`
						ON `l`.`a_id` = `a`.`a_id`
				WHERE
					(
						(`l`.`l_div_sig` = '$a_id' AND `l`.`l_statusdivision` != 'Pending')
						OR (`l`.`l_dept_sig` = '$a_id' AND `l`.`l_statusdept` != 'Pending')
						OR (`l`.`l_asmayor` = '$a_id' AND `l`.`l_statusasmayor` != 'Pending')
					)
						AND `l`.`a_id` != '$a_id'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_div_approved_leave($l_id,$l_statusdivision,$l_div_action_date){
		$sql = "UPDATE `tbl_leaves`
						SET
						`l_statusdivision` = '$l_statusdivision',
						`l_div_action_date` = '$l_div_action_date',
						`l_statusdept` 		= IF(`l_dept_sig` = `l_asmayor`,'Approved','Pending'),
						`l_dept_action_date` = IF(`l_dept_sig` = `l_asmayor`,'$l_div_action_date','(NULL)')
						WHERE `l_id` = '$l_id'";
		$query = $this->db->query($sql);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_dept_approved_leave($l_id,$leave){
		$this->db->where('`l_id`',$l_id);
		if($this->db->update('`tbl_leaves`',$leave)){
			return true;
		}else{
			return false;
		}

		// $sql = "UPDATE `tbl_leaves` SET
					// `l_statusdept` = '$l_statusdept',
					// `l_dept_action_date` = '$l_dept_action_date'
					// WHERE `l_id` = '$l_id'";
		// $query = $this->db->query($sql);

	}
	public function m_div_disapproved_leave($m_l_id,$l_statusdivision){
		$l_div_action_date = date('Y-m-d');
		$sql = "UPDATE `tbl_leaves` SET
					`l_statusdivision` = '$l_statusdivision',
					`l_div_action_date` = '$l_div_action_date'
				WHERE `l_id` = '$m_l_id'";
		$query = $this->db->query($sql);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_dept_disapproved_leave_old($l_id,$l_statusdept){
		$l_dept_action_date = date('Y-m-d');
		$sql = "UPDATE `tbl_leaves` SET
						`l_statusdept` = '$l_statusdept',
						`l_dept_action_date` = '$l_dept_action_date'
				WHERE `l_id` = '$l_id'";
		$query = $this->db->query($sql);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	public function m_get_leave_filed($a_id){
		$sql = "SELECT `a`.`a_id`,
					`l`.`l_id`,
					CONCAT(`a`.`a_firstname`,' ',
					`a`.`a_middlename`,' ',
					`a`.`a_lastname`) AS `name`,
					`l`.`l_agency`,
					`l`.`l_status`,
					`l`.`l_position`,
					`l`.`l_datefiled`,
					IF(`l`.`l_typespecify` = ' ',`l`.`l_type`,`l`.`l_typespecify`) AS `l_type`,
					`l`.`l_statushr`,
					`l`.`l_statusdept`,
					`l`.`l_statusasmayor`,
					`l`.`l_asmayor_action_date`,
					IF(`l`.`l_div_sig` = '0',' ',`l`.`l_statusdivision`) AS `l_statusdivision`,
					`l`.`l_inclusivedates`,
					`l`.`leave_status`,
					`l`.`l_sl`,
					`l`.`l_vl`,
					`l`.`l_asof`,
					`l`.`l_typeofapplication`
				FROM `tbl_leaves` `l`
				INNER JOIN `tbl_account` `a`
					ON `a`.`a_id` = `l`.`a_id`
				WHERE `l`.`a_id` = '$a_id'
				ORDER BY `l`.`l_datefiled` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_cancel_leave_application($l_id){
		$sql = "UPDATE `tbl_leaves` SET `leave_status` = 'Cancelled' WHERE `l_id` = '$l_id'";
		$query = $this->db->query($sql);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_get_cadmino_head(){
		// O_ID 2 is the CADMINO or the City Admin Office
		$sql = "SELECT * FROM `tbl_office` WHERE `o_id` = '2' AND `o_head` IS NOT NULL";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_checkif_alternate($a_id){
		$sql = "SELECT `o_id`,
					`o_name`,
					`o_code`,
					`o_mother`,
					`o_head` AS `o_head_id`,
					`a`.`a_lastname` AS `o_head_name`,
					IF(`pi`.`pi_gender` = 'Male','Mr','Mrs./Ms.') AS `pi_gender`,
					`o_alternate`,
					`o_type`
				FROM `tbl_office` `o`
					INNER JOIN `tbl_account` `a`
						ON `o`.`o_head` = `a`.`a_id`
					INNER JOIN `tbl_personalinfo` `pi`
						ON `a`.`a_id` = `pi`.`a_id`
						WHERE `o_alternate` = '$a_id'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_get_holidays(){
		// $sql = "SELECT DISTINCT(IF(`h_yearly` = '1',
						// DATE_FORMAT(CONCAT(YEAR(NOW()),'-',MONTH(`h_date`),'-',DAY(`h_date`)),'%Y-%m-%d'),
						// `h_date`
						// ))AS `h_date`
					// FROM `tbl_holidays`
				// ORDER BY `h_date` ASC;";

		$sql = "SELECT 
				IF(`h_yearly` = '1', 
					CONCAT(YEAR(CURDATE()), '-', DATE_FORMAT(`h_date`, '%m-%d')),
					`h_date`) AS `h_date`,
					`h_remarks`,
					`h_type`,
					`h_yearly`
				FROM `tbl_holidays` ORDER BY `h_date` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function m_get_personnelrequestlist($id){

		$sql = "SELECT * FROM `tbl_jobmatching` where `jm_officehead` = $id and `jm_isdeleted` = 'NO' ORDER BY `jm_reqdate` ASC ";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

// Dynamic Delete Function
	public function m_request_delete($where,$table,$field,$forapproval_field,$forapproval){
		$sql = "UPDATE $table SET $forapproval_field = $forapproval WHERE $field = $where";
		// $sql = "DELETE FROM $table WHERE $field = $where";
		if($this->db->query($sql)){
			return true;
		}else{
			return false;
		}
	}

	public function m_saverequest($data){
		$query = $this->db->insert('`tbl_jobmatching`', $data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_updaterequest($id,$data){
				$this->db->where('`jm_id`', $id);
		$query = $this->db->update('`tbl_jobmatching`', $data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_delete($where_field,$where_val,$table,$data){
			$this->db->where($where_field, $where_val);
			$query = $this->db->update($table,$data);
			if($query){
				return true;
			}else{
				return false;
			}
	}

}

?>
