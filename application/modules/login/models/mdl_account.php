<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Mdl_account extends CI_Model {
		
		public function m_login($username,$password)
		{
				$newpass = sha1(md5($password.'c[x]t!@n>[*]{<Lo[R];eN}Ce}'));
				
					$sql = "SELECT 
									`a`.`a_id`,
									`a`.`a_empno`,
									`a`.`a_password`,
									`a`.`a_secondpass`,
									`a`.`a_lastname`,
									`a`.`a_mi`,
									`a`.`a_middlename`,
									`a`.`a_firstname`,
									`a`.`a_status`,
									`a`.`a_office`,
									`a`.`a_division`,
									`a`.`a_position`,
									`a`.`a_level`,
									`a`.`a_officetype`,
									`a`.`a_profile`,
									`o`.`o_code`
						FROM `tbl_account` `a`
						LEFT JOIN `tbl_office` `o`
								ON `o`.`o_id` = `a`.`a_office`
						WHERE `a_empno` = '$username'
						AND `a_password` = '$newpass'
						";
				$query = $this->db->query($sql);
				
					if($query->num_rows() == 1)
					{
						return $query->result();
					}else{
						return FALSE;
					}
		}

	}

?>