<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_office extends CI_Model {

	public function __construct() {
		parent::__construct();
		// $ci = &get_instance();
		// $this->db_access = $ci->load->database('db_access', TRUE);
	}

	public function m_get_records()
	{
		$sql = "SELECT 
			  `o`.*,
			  -- `d`.`o_code` AS `odivision`,
			  IF (`d`.`o_code` != '',`d`.`o_code`,`o`.`o_code`) AS `odivision`,
			  CONCAT(
			    `a`.`a_firstname`,
			    ' ',
			    `a`.`a_middlename`,
			    ' ',
			    `a`.`a_lastname`
			  ) AS `name`,
			CONCAT(
			    `aa`.`a_firstname`,
			    ' ',
			    `aa`.`a_middlename`,
			    ' ',
			    `aa`.`a_lastname`
			  ) AS `o_alternate_name` 
			FROM
			  `tbl_office` `o`
			  LEFT JOIN `tbl_office` `d` 
			    ON `d`.`o_id` = `o`.`o_mother`
			  LEFT JOIN `tbl_account` `a` 
			    ON `a`.`a_id` = `o`.`o_head`
			  LEFT JOIN `tbl_account` `aa` 
			    ON `aa`.`a_id` = `o`.`o_alternate`";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
	}
	
	//SAVE
	public function m_ajax_save_office($data)
	{
		if($this->db->insert('tbl_office',$data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	//UPDATE
	public function m_ajax_update_office($data)
	{
		$id = $data['o_id'];
		unset($data['o_id']);
		$this->db->where('o_id', $id);
		if($this->db->update('tbl_office',$data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
