<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_salarygrade extends CI_Model {

	public function __construct() {
		parent::__construct();
		// $ci = &get_instance();
		// $this->db_access = $ci->load->database('db_access', TRUE);
	}

	public function m_get_records()
	{
		// $sql = "SELECT * FROM `tbl_salaryschedule` ";
		$sql = "SELECT * FROM `tbl_salaryschedule` ORDER BY `ss_effectivitydate` DESC, `ss_grade` DESC, `ss_step` DESC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
	}
	
	//SAVE
	public function m_save_sg($data)
	{
		if($this->db->insert('tbl_salaryschedule',$data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	//UPDATE
	public function m_update_sg($ss_id,$sg)
	{
		$this->db->where('ss_id', $ss_id);
		if($this->db->update('tbl_salaryschedule',$sg)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
