<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Mdl_statistics extends CI_Model {
		
	   function m_get_gender(){
           $sql =   "SELECT
                        `pi`.`pi_gender`,
                    COUNT(`pi`.`pi_gender`)
                    FROM `tbl_account` `a`
                    INNER JOIN `tbl_personalinfo` `pi` ON
                        `a`.`a_id` = `pi`.`a_id`
                    WHERE `a`.`a_isactive` = 'yes'
                    GROUP BY LEFT(`pi`.`pi_gender`,1)";
           
           $query = $this->db->query($sql);
           
           if($query->num_rows > 0){
               return $query->result();
           }else{
               return false;
           }
           
       }
        
        function m_get_leaves($date_from,$date_to){
           $sql = "SELECT 
                        l_typespecify,
                        COUNT(`l_typespecify`) AS `Statistics`
                    FROM `tbl_leaves`
                    WHERE `leave_status` = 'Applied' AND `l_statusasmayor` = 'Approved'
                        AND `l_datefiled` BETWEEN '".$date_from."' AND '".$date_to."'
                    GROUP BY `l_typespecify`";
           
           $query = $this->db->query($sql);
           
           if($query->num_rows > 0){
                return $query->result();
           }else{
                return false;
           }
           
       }

	}

?>