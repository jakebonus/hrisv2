<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_rankingposition extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function m_get_position($o)
	{
		// $sql = 'SELECT `p_id`,`p_name`,if(`p_parent` is null," ",`p_parent`) as `p_parent` FROM `tbl_position` ORDER BY `p_name` ASC';
		// $sql = 'SELECT * FROM `tbl_position` ORDER BY `p_name` ASC';
		$sql = "SELECT
							`b`.`p_id`,
							`a`.`ID`,
							`a`.`POSITION_TITLE`,
							`a`.`PARENTHETICAL`,
							`b`.`p_name`,
							`b`.`p_parent`
						FROM `position` `a`
						JOIN `tbl_position` `b`
						WHERE IF (`b`.`p_parent` IS NULL,
								`a`.`POSITION_TITLE` = `b`.`p_name`,
								`a`.`POSITION_TITLE` = `b`.`p_name` AND `a`.`PARENTHETICAL` = `b`.`p_parent`)
							AND`a`.`CODE` LIKE '%$o%'
						GROUP BY `b`.`p_id`";
		$query = $this->db->query($sql);
			if($query->num_rows() > 0)
			{
				return $query->result();
			} else {
				return false;
			}
	}
	public function m_get_dept(){
		$sql="SELECT
				`o_code` as `office`
			FROM `tbl_office`
			WHERE `o_isactive` = 'yes'
				AND `o_type` = 'Department'
			ORDER BY `office` ASC";

		$query = $this->db->query($sql);

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function m_get_educ()
	{
		$sql = 'SELECT DISTINCT(`p`.`p_education`) AS `p_education` FROM `tbl_position` `p` WHERE `p_education` IS NOT NULL ORDER BY `p_education` ASC';
		$query = $this->db->query($sql);
			if($query->num_rows() > 0)
			{
				return $query->result();
			} else {
				return false;
			}
	}
	public function m_get_educ_sector()
	{
		$sql = 'SELECT DISTINCT(`p`.`p_educsector`) AS `p_educsector` FROM `tbl_position` `p` WHERE `p_educsector` IS NOT NULL ORDER BY `p_educsector` ASC';
		$query = $this->db->query($sql);
			if($query->num_rows() > 0)
			{
				return $query->result();
			} else {
				return false;
			}
	}

	public function m_insert_position($data)
	{
		$query = $this->db->insert('`tbl_position`',$data);
			if($query)
			{
				return true;
			} else {
				return false;
			}
	}

	public function m_update_position($p_id,$data)
	{
				$this->db->where('`p_id`',$p_id);
		$query = $this->db->update('`tbl_position`',$data);
			if($query)
			{
				return true;
			} else {
				return false;
			}
	}


	public function m_get_candidates($position)
	{
		// $sql = "SELECT
  // CONCAT(c.a_lastname, ', ', c.a_firstname, ' ', LEFT(c.a_middlename,1), '.') AS `name`,
  // b.p_position,
  // CONCAT(IF(b.p_dept IS NULL,'',b.p_dept),IF(b.p_dept IS NOT NULL AND b.p_div IS NOT NULL, ' - ',''),IF(b.p_div IS NULL,'',b.p_div)) AS office,
  // d.e_type,
  // d.e_sector,
  // FLOOR(f.yearsexperience) AS yearsexp,
  // e.el_career,
  // g.hourstraining
// FROM
  // (
    // SELECT
      // a_id,
      // MAX(p_from) AS maxfrom
    // FROM
      // tbl_workinfo
    // WHERE
      // is_deleted='no'
      // AND p_appointment='permanent'
    // GROUP BY
      // a_id
  // ) a

  // LEFT JOIN tbl_workinfo b ON a.a_id=b.a_id AND a.maxfrom=b.p_from

  // LEFT JOIN tbl_account c ON b.a_id=c.a_id

  // RIGHT JOIN tbl_educbg d ON a.a_id = d.a_id

  // RIGHT JOIN tbl_eligibility e ON a.a_id=e.a_id

  // RIGHT JOIN
  // (
    // SELECT
      // a_id,
      // SUM(t_hoursno) AS hourstraining
    // FROM
      // tbl_training
		// WHERE
			// case when t_type is null then
				// true
			// else
				// t_type = '".$relevance."'
			// end
    // GROUP BY
      // a_id
  // ) g ON a.a_id = g.a_id

  // RIGHT JOIN
  // (
    // SELECT
      // a_id,
      // SUM(TIMESTAMPDIFF(MONTH,p_from,p_to)/12) AS yearsexperience
    // FROM
      // tbl_workinfo
    // WHERE
			// case when w_type is null then
				// true
			// else
				// w_type = '".$relevance."'

			// end
    // GROUP BY
      // a_id
  // ) f ON a.a_id = f.a_id

// JOIN `tbl_position` `p`

// WHERE
  // c.a_isactive='yes'
	// AND d.e_type = `p`.`p_education`
	// AND d.e_sector = IF(`p`.`p_educsector` IS NULL,d.e_sector,`p`.`p_educsector`)

	 // AND FLOOR(f.yearsexperience) >  (`p`.`p_work_exp_years` - 1)


	 // AND `p`.`p_rank` <= e.el_rank
	// AND g.hourstraining > `p`.`p_traininghrs`
	// AND `p`.`p_id` = '".$position."'
	// ORDER BY
	// c.a_id";
	$sql = "select
  a.a_id,
  concat(a.a_lastname,', ',a.a_firstname,' ',left(a.a_middlename,1),'.') as name,
  b.p_from,
  b.p_appointment,
  b.p_position,
  concat(if(b.p_dept is null,'',b.p_dept),if(b.p_dept is not null and b.p_div is not null,' - ', ''),if(b.p_div is null,'',b.p_div)) as office,
  b.p_salarygrade,
  if(b.p_salarygrade is null,'',if(b.p_salarystep is null, b.p_salarygrade,concat(b.p_salarygrade,'-',b.p_salarystep))) as x_sg,
  g.el_type,
  g.el_career as x_eligibility,
  g.maxexamdate as x_examdate,
  j.e_type,
  j.e_sector,
  j.pi_degree as x_education,
  k.w_type as x_exptype,
  sum(floor(k.expyears)) as x_expyears,
  l.t_type as x_trntype,
  sum(l.trnhours) as x_trnhours,
  m.p_id as r_id,
  m.p_name as r_name,
  m.p_sg as r_sg,
  m.p_level as r_level,
  (case when m.p_eligibilitykind='BAR/BOARD ELIGIBILITY (RA1080)' then 5
        when m.p_eligibilitykind='CS PROFESSIONAL' then 4
        when m.p_eligibilitykind='HONOR GRADUATE ELIGIBILITY (PD907)' then 4
        when m.p_eligibilitykind='CS SUBPROFESSIONAL' then 3
        when m.p_eligibilitykind='SANGGUNIAN MEMBER ELIGIBILITY (SME)' then 3
        when m.p_eligibilitykind='BARANGAY OFFICIAL ELIGIBILITY (BOE)' then 3
        when m.p_eligibilitykind='SKILL ELIGIBILITY (CSC MC NO II)' then 2
        else null
        end
  ) as r_rank,
  m.p_eligibility as r_eligibility,
  (case when m.p_education='DOCTORATE DEGREE' then 6
                   when m.p_education='MASTER''S DEGREE' then 5
                   when m.p_education='BACHELOR''S DEGREE' then 4
                   when m.p_education='COMPLETION OF TWO YEARS STUDIES' then 3
                   when m.p_education='HIGH SCHOOL GRADUATE' then 2
                   when m.p_education='ELEMENTARY GRADUATE' then 1
                   else 0
                   end
  ) as r_erank,
  m.p_education as r_educ,
  m.p_educsector as r_sec,
  m.p_relevance as r_relevance,
  m.p_work_exp_years as r_expyears,
  m.p_traininghrs as r_trnhours
from


  tbl_account a


  right join
    (select
      a_id,
      max(p_from) as maxfrom
    from
      tbl_workinfo
    group by
      a_id
    )c
    on a.a_id=c.a_id
  left join tbl_workinfo b
    on c.a_id=b.a_id and c.maxfrom=b.p_from


  left join
    (select
      f.a_id,
      f.el_type,
      f.el_career,
      max(f.el_examdate) as maxexamdate
    from
      tbl_eligibility f
      right join
       (select
        a_id,
        max(
          case when el_type='BAR/BOARD ELIGIBILITY (RA1080)' then 5
          when el_type='CS PROFESSIONAL' then 4
          when el_type='HONOR GRADUATE ELIGIBILITY (PD907)' then 4
          when el_type='CS SUBPROFESSIONAL' then 3
          when el_type='SANGGUNIAN MEMBER ELIGIBILITY (SME)' then 3
          when el_type='BARANGAY OFFICIAL ELIGIBILITY (BOE)' then 3
          when el_type='SKILL ELIGIBILITY (CSC MC NO II)' then 2
          else null
          end
          ) as maxelrank
       from
        tbl_eligibility
       group by
        a_id
       )e on f.a_id=e.a_id and (case when f.el_type='BAR/BOARD ELIGIBILITY (RA1080)' then 5
                                    when f.el_type='CS PROFESSIONAL' then 4
                                    when f.el_type='HONOR GRADUATE ELIGIBILITY (PD907)' then 4
                                    when f.el_type='CS SUBPROFESSIONAL' then 3
                                    when f.el_type='SANGGUNIAN MEMBER ELIGIBILITY (SME)' then 3
                                    when f.el_type='BARANGAY OFFICIAL ELIGIBILITY (BOE)' then 3
                                    when f.el_type='SKILL ELIGIBILITY (CSC MC NO II)' then 2
                                    else null
                                    end)=e.maxelrank
    group by
      f.a_id
    )g
    on a.a_id=g.a_id


  left join
    (select
      i.a_id,
      i.e_type,
      i.e_sector,
      max(i.pi_to) as maxeto,
      i.pi_degree
    from
      tbl_educbg i
      right join
       (select
        a_id,
        max(
          case when e_type='DOCTORATE DEGREE' then 6
          when e_type='MASTER''S DEGREE' then 5
          when e_type='BACHELOR''S DEGREE' then 4
          when e_type='COMPLETION OF TWO YEARS STUDIES' then 3
          when e_type='HIGH SCHOOL GRADUATE' then 2
          when e_type='ELEMENTARY GRADUATE' then 1
          else 0
          end
          ) as maxerank
       from
        tbl_educbg
       group by
        a_id
       )h on i.a_id=h.a_id and (case when i.e_type='DOCTORATE DEGREE' then 6
                                     when i.e_type='MASTER''S DEGREE' then 5
                                     when i.e_type='BACHELOR''S DEGREE' then 4
                                     when i.e_type='COMPLETION OF TWO YEARS STUDIES' then 3
                                     when i.e_type='HIGH SCHOOL GRADUATE' then 2
                                     when i.e_type='ELEMENTARY GRADUATE' then 1
                                     else 0
                                     end)=h.maxerank
    group by
      i.a_id
    )j on a.a_id=j.a_id


  left join
    (select
      a_id,
      w_type,
      sum(timestampdiff(month,p_from,p_to)/12) as expyears
    from
      tbl_workinfo
    where
      p_isservicerecord='yes' or p_isservicerecord='no'
    group by
      a_id,
      w_type
    )k on a.a_id=k.a_id


  left join
    (select
      a_id,
      t_type,
      sum(t_hoursno) as trnhours
    from
      tbl_training
    group by
      a_id,
      t_type
    )l
    on a.a_id=l.a_id


  right join
    (select
      p_id,
      p_name,
      p_sg,
      p_level,
      p_rank,
      p_eligibility,
      p_eligibilitykind,
      p_education,
      (case when p_education='DOCTORATE DEGREE' then 6
                                     when p_education='MASTER''S DEGREE' then 5
                                     when p_education='BACHELOR''S DEGREE' then 4
                                     when p_education='COMPLETION OF TWO YEARS STUDIES' then 3
                                     when p_education='HIGH SCHOOL GRADUATE' then 2
                                     when p_education='ELEMENTARY GRADUATE' then 1
                                     else 0
                                     end) as p_erank,
      p_educsector,
      p_relevance,
      p_workdesc,
      p_work_exp_years,
      p_trainingdesc,
      p_traininghrs
    from
      tbl_position
    where
      p_id=".$position."
    )m
    on
      case when m.p_educsector is null then
        true
      else
        j.e_sector=m.p_educsector
      end
      and b.p_salarygrade<=m.p_sg
      and (case when g.el_type='BAR/BOARD ELIGIBILITY (RA1080)' then 5
                when g.el_type='CS PROFESSIONAL' then 4
                when g.el_type='HONOR GRADUATE ELIGIBILITY (PD907)' then 4
                when g.el_type='CS SUBPROFESSIONAL' then 3
                when g.el_type='SANGGUNIAN MEMBER ELIGIBILITY (SME)' then 3
                when g.el_type='BARANGAY OFFICIAL ELIGIBILITY (BOE)' then 3
                when g.el_type='SKILL ELIGIBILITY (CSC MC NO II)' then 2
                else null
                end
          )>=(case when m.p_eligibilitykind='BAR/BOARD ELIGIBILITY (RA1080)' then 5
                   when m.p_eligibilitykind='CS PROFESSIONAL' then 4
                   when m.p_eligibilitykind='HONOR GRADUATE ELIGIBILITY (PD907)' then 4
                   when m.p_eligibilitykind='CS SUBPROFESSIONAL' then 3
                   when m.p_eligibilitykind='SANGGUNIAN MEMBER ELIGIBILITY (SME)' then 3
                   when m.p_eligibilitykind='BARANGAY OFFICIAL ELIGIBILITY (BOE)' then 3
                   when m.p_eligibilitykind='SKILL ELIGIBILITY (CSC MC NO II)' then 2
                   else null
                   end)
      and (case when j.e_type='DOCTORATE DEGREE' then 6
                when j.e_type='MASTER''S DEGREE' then 5
                when j.e_type='BACHELOR''S DEGREE' then 4
                when j.e_type='COMPLETION OF TWO YEARS STUDIES' then 3
                when j.e_type='HIGH SCHOOL GRADUATE' then 2
                when j.e_type='ELEMENTARY GRADUATE' then 1
                else 0
                end
          )>=(case when m.p_education='DOCTORATE DEGREE' then 6
                   when m.p_education='MASTER''S DEGREE' then 5
                   when m.p_education='BACHELOR''S DEGREE' then 4
                   when m.p_education='COMPLETION OF TWO YEARS STUDIES' then 3
                   when m.p_education='HIGH SCHOOL GRADUATE' then 2
                   when m.p_education='ELEMENTARY GRADUATE' then 1
                   else 0
                   end)


where
  case when m.p_relevance is null then
    true
  else
    case when m.p_work_exp_years=0 and m.p_traininghrs=0 then
      true
    when m.p_work_exp_years>0 and m.p_traininghrs>0 then
      k.w_type=m.p_relevance
      and k.expyears>=m.p_work_exp_years
      and l.t_type =m.p_relevance
      and l.trnhours>=m.p_traininghrs
    when m.p_work_exp_years>0 and m.p_traininghrs=0 then
      k.w_type=m.p_relevance
      and k.expyears>=m.p_work_exp_years
    when m.p_work_exp_years=0 and m.p_traininghrs>0 then
      l.t_type =m.p_relevance
      and l.trnhours>=m.p_traininghrs
    end
  end
  and a.a_isactive='yes'
  and b.p_appointment='permanent'
  and b.p_isservicerecord='yes'
group by
  a_id
order by
  name";
    // -- AND FLOOR(f.yearsexperience) >  if(`p`.`p_work_exp_years` is null,'0',(`p`.`p_work_exp_years`- 1))
		 // AND e.el_type = `p`.`p_eligibilitykind`

      // AND p_isservicerecord='yes'
		$query = $this->db->query($sql);
			if($query->num_rows() > 0)
			{
				return $query->result();
			} else {
				return false;
			}
	}

	public function m_get_position_sg($p_id)
	{
		// $sql = 'SELECT *,if(`p`.`p_traininghrs` is null,"0",`p`.`p_traininghrs`) as `traininghrs` FROM `tbl_position` `p` WHERE `p_id`= "'.$p_id.'" ORDER BY `p_name` ASC';
		$sql = 'SELECT * FROM `tbl_position` `p` WHERE `p`.`p_id`= "'.$p_id.'" ORDER BY `p`.`p_name` ASC';
		$query = $this->db->query($sql);
			if($query->num_rows() > 0)
			{
				return $query->result();
			} else {
				return false;
			}
	}


}
