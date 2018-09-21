<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_onlineapplicant extends CI_Model {
	
	
	public function m_get_applicant(){
		$sql = "SELECT  CONCAT(`oa`.`oa_lname`,' ',`oa`.`oa_extname`,',',`oa`.`oa_fname`,' ',`oa`.`oa_mname`) AS `name`,
					`oa`.`oa_id`,
					CONCAT(`oa`.`oa_prefix`,'-',`oa`.`oa_suffix`) AS `application_no`,
					`oa`.`oa_email`,
					`oa`.`oa_activationcode`,
					`oa`.`oa_course`,
					`oa`.`oa_school`,
					CONCAT(`oa`.`oa_course`,' (',`oa`.`oa_school`,')') as `education`,
					`oa`.`oa_educremarks`,
					`oa`.`oa_eligibility`,
					`oa`.`oa_eligremarks`,
					`oa`.`oa_gender`,
					`oa`.`oa_mobile`,
					`oa`.`oa_pdesire`,
					CONCAT(`v`.`v_position`,' (',`v`.`v_desc`,')') AS `position_desired`,
					`oa`.`oa_province`,
					`oa`.`oa_skills`,
					`oa`.`oa_awards`,
					`p`.`p_name`,
					`oa`.`oa_city`,
					`c`.`c_name`,
					IF (`oa`.`oa_city` = '3',`b`.`b_name`,`oa`.`oa_brgy`) AS `brgy`,
					`oa`.`oa_street`,
					CONCAT(`v`.`v_position`,' (',`v`.`v_position`,')') AS `position_applied`,
					`oa`.`oa_bdate`,
					DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),`oa`.`oa_bdate`)),'%Y-%m-d') + 0 AS `age`
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
					WHERE `oa`.`oa_isactivated` = 'YES'";
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
	
	public function m_get_candidate_email($new_oa_id){
			$sql = "SELECT `oa`.*,
						`p`.`p_name` AS `province`,
						`c`.`c_name` AS `city`,
						IF(`oa`.`oa_city` = '3',`b`.`b_name`,`oa`.`oa_brgy`) AS `brgy`
					FROM `tbl_onlineapplicant` `oa`
					INNER JOIN `tbl_province` `p` ON
						`oa`.`oa_province` = `p`.`p_id`
					INNER JOIN `tbl_city` `c` ON
						`oa`.`oa_city` = `c`.`c_id`
					LEFT JOIN `tbl_brgy` `b` ON
						`oa`.`oa_brgy` = `b`.`b_id`
					WHERE oa_id IN (".$new_oa_id.")";
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
	
	public function m_save_vacancy($data){
		$query = $this->db->insert('`tbl_vacancies`',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	
	
}
?>
