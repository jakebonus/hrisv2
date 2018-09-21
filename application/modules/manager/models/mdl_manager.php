<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Mdl_manager extends CI_Model {
		
		public function m_get_employees($status)
		{
			$sql = "SELECT * 
					
					FROM `tbl_account`
					WHERE `a_status` = '$status'
					AND `a_isactive` = 'YES'";
			$query = $this->db->query($sql);
			
			if($query->num_rows() != 0){
				return $query->result();
			}else{
				return false;
			}
				
		}

	}

?>