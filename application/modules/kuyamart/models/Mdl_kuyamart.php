<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_kuyamart extends CI_Model {
	
	
	public function m_save_computer($data){
		$query = $this->db->insert('`kuya_computer`',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	
	public function m_get_computers(){
		$sql = "SELECT * FROM `kuya_computer` WHERE `kuya_isdeleted` = 'NO'";
		
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	public function m_update_computer($kuya_id,$data){
					$this->db->where('`kuya_id`',$kuya_id);
		$query = $this->db->update('`kuya_computer`',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	
	public function m_delete_computer($kuya_id,$data){
					$this->db->where('`kuya_id`',$kuya_id);
		$query = $this->db->update('`kuya_computer`',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	
}
?>
