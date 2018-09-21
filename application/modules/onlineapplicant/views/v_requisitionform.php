<?php 
	if(!empty($result)){
		foreach($result as $r){
?>
			

<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content"> <div class="row t_section">
                            <div class="col-sm-2">
                                <button id="onload_click" onclick="printContent('requisition_form')" type="button" class="btn btn-primary form-control"><i class="glyphicon glyphicon-print"></i> Print</button>
                            </div>
                        </div>
                        <br/>
<div id="requisition_form" class="t_section">
<style type="text/css">
.border {border-style:solid !important;  border-width:1px !important; }
.border-bottom {border-bottom: solid  !important; border-width: 1px !important; }
.border-top {border-top: solid  !important; border-width: 1px !important; }
.border-right {border-right: solid  !important; border-width: 1px !important; }
.border-left {border-left: solid  !important; border-width: 1px !important; }
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:3px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:3px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-zx0n{font-weight:bold;font-size:13px;background-color:#9b9b9b;text-align:center;vertical-align:top}
.tg .tg-glis{font-size:10px}
.tg .tg-k6pi{font-size:12px}
.tg .tg-hgcj{font-weight:bold;text-align:center}
.tg .tg-yw4l{vertical-align:top}
.tg .tg-dx8v{font-size:12px;vertical-align:top}
.tg .tg-3sk9{font-weight:bold;font-size:12px}
.tg .tg-rg0h{font-size:12px;text-align:center;vertical-align:top}
.tg .tg-3ood{font-size:12px;background-color:#9b9b9b;color:#000000;vertical-align:top}
.text-wrap{ word-wrap:break-word;}
</style>
<table class="tg border" style="undefined;table-layout: fixed; width: 740px">
<colgroup>
<col style="width: 36px">
<col style="width: 30px">
<col style="width: 36px">
<col style="width: 33px">
<col style="width: 30px">
<col style="width: 32px">
<col style="width: 38px">
<col style="width: 35px">
<col style="width: 46px">
<col style="width: 37px">
<col style="width: 38px">
<col style="width: 37px">
<col style="width: 32px">
<col style="width: 41px">
<col style="width: 41px">
<col style="width: 39px">
<col style="width: 44px">
<col style="width: 39px">
<col style="width: 35px">
<col style="width: 41px">
</colgroup>
  <tr>
    <th class="tg-glis" colspan="20">FM-CSFP-CHRDO-18</th>
  </tr>
  <tr>
    <td class="tg-glis" colspan="5">Revision No: 00</td>
    <td class="tg-hgcj" colspan="10">City Government of San Fernando (P)</td>
    <td class="tg-031e" colspan="5"></td>
  </tr>
  <tr>
    <td class="tg-glis" colspan="6">Effectivity Date: 05/02/2017</td>
    <td class="tg-hgcj" colspan="8">City Human Resource Development Office</td>
    <td class="tg-031e" colspan="6"></td>
  </tr>
  <tr>
    <td class="tg-031e" colspan="20"></td>
  </tr>
  <tr>
    <td class="tg-hgcj" colspan="20">PERSONNEL REQUISITION FORM</td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="14"></td>
    <td class="tg-dx8v" colspan="6">Control No: ___________________</td>
  </tr>
  <tr>
    <td class="tg-k6pi border-top" colspan="11">DEPARTMENT:<br></td>
    <td class="tg-k6pi border-top border-left  border-bottom" colspan="9">Date Requested:<strong><?php echo $r->jm_reqdate; ?></strong></td>
  </tr>
  <tr>
    <td class="tg-k6pi border-bottom" colspan="11"><strong><?php echo $r->jm_office; ?></strong></td>
    <td class="tg-k6pi border-left  border-bottom" colspan="9">Target Date Needed:<strong><?php echo $r->jm_dateneeded; ?></strong></td>
  </tr>
  <tr>
    <td class="tg-k6pi " colspan="11">Program/Project:</td>
    <td class="tg-k6pi border-left" colspan="9">Duration of Project:</td>
  </tr>
  <tr>
    <td class="tg-k6pi border-bottom" colspan="11"><strong><?php echo $r->jm_project; ?></strong></td>
    <td class="tg-k6pi border-left border-bottom" colspan="9"><strong><?php echo $r->jm_projectduration; ?></strong></td>
  </tr>
  <tr>
    <td class="tg-3sk9 border-bottom" colspan="11">NATURE OF REQUEST</td>
    <td class="tg-3sk9 border-bottom border-left" colspan="9">JUSTIFICATION:</td>
  </tr>
  <tr>
    <td class="tg-k6pi" colspan="11">(<?php if($r->jm_reqnature == '1'){ echo '<i class="fa fa-check"></i>';} ?>) Additional Manpower</td>
    <td class="tg-k6pi border-left border-bottom" colspan="9" rowspan="3"><strong><?php echo $r->jm_justification; ?></strong></td>
  </tr>
  <tr>
    <td class="tg-k6pi"></td>
    <td class="tg-k6pi" colspan="10">No. <strong><u><?php if($r->jm_reqnature == '1'){  echo $r->jm_reqnature_specific; }?></u></strong></td>
  </tr>
  <tr>
    <td class="tg-k6pi" colspan="11">(<?php if($r->jm_reqnature == '2'){ echo '<i class="fa fa-check"></i>';} ?>) Replacement</td>
  </tr>
  <tr>
    <td class="tg-k6pi"> </td>
    <td class="tg-k6pi" colspan="5"> <strong><u><?php if($r->jm_reqnature == '2'){  echo $r->jm_reqnature_specific; }?></u></strong></td>
    <td class="tg-k6pi"> </td>
    <td class="tg-k6pi" colspan="4"> </td>
    <td class="tg-3sk9 border-left border-bottom" colspan="9">DUTIES AND RESPONSIBILITIES:</td>
  </tr>
  <tr>
    <td class="tg-k6pi" colspan="11"> </td>
    <!--td class="tg-k6pi"> </td>
    <td class="tg-k6pi" colspan="4"> </td>
    <td class="tg-k6pi" colspan="3"> </td-->
    <td class="tg-k6pi border-left" colspan="9" rowspan="21"><strong><?php echo $r->jm_desc; ?></strong></td>
  </tr>
  <tr>
    <td class="tg-k6pi" colspan="11">(<?php if($r->jm_reqnature == '2'){ echo '<i class="fa fa-check"></i>';} ?>) Others:</td>
  </tr>
  <tr>
    <td class="tg-k6pi" colspan="11"><?php if($r->jm_reqnature == '2'){ echo $r->jm_reqnature_specific;} ?></td>
  </tr>
  <tr>
    <td class="tg-k6pi" colspan="11"></td>
  </tr>
  <tr>
    <td class="tg-3sk9  border-bottom border-top" colspan="11">EMPLOYMENT STATUS</td>
  </tr>
  <tr>
    <td class="tg-k6pi" colspan="11">(<?php if(strtolower($r->jm_emp_status) == 'project based'){ echo '<i class="fa fa-check"></i>';} ?>) Project Based</td>
  </tr>
  <tr>
    <td class="tg-k6pi" colspan="11">(<?php if(strtolower($r->jm_emp_status) == 'job order'){ echo '<i class="fa fa-check"></i>';} ?>) Job Order</td>
  </tr>
  <tr>
    <td class="tg-k6pi" colspan="11">(<?php if(strtolower($r->jm_emp_status) == 'casual'){ echo '<i class="fa fa-check"></i>';} ?>) Casual</td>
  </tr>
  <tr>
    <td class="tg-k6pi" colspan="11">(<?php if(strtolower($r->jm_emp_status) == 'permanent'){ echo '<i class="fa fa-check"></i>';} ?>) Permanent</td>
  </tr>
  <tr>
    <td class="tg-k6pi" colspan="11">(<?php if(strtolower($r->jm_emp_status) == 'co-terminous'){ echo '<i class="fa fa-check"></i>';} ?>) Co-Terminous</td>
  </tr>
  <tr>
    <td class="tg-k6pi" colspan="11"></td>
  </tr>
  <tr>
    <td class="tg-3sk9 border-bottom border-top" colspan="11">QUALIFICATIONS:</td>
  </tr>
  <tr>
    <td class="tg-k6pi" colspan="4">EDUCATION:</td>
    <td class="tg-k6pi" colspan="7"><strong><?php echo $r->jm_course; ?></strong></td>
  </tr>
  <tr>
    <td class="tg-k6pi" colspan="4">TRAINING:</td>
    <td class="tg-k6pi" colspan="7"><strong><?php echo $r->jm_training; ?></strong></td>
  </tr>
  <tr>
    <td class="tg-k6pi" colspan="4">EXPERIENCE:</td>
    <td class="tg-k6pi" colspan="7"><strong><?php echo $r->jm_experience; ?></strong></td>
  </tr>
  <tr>
    <td class="tg-k6pi" colspan="4">SKILLS</td>
    <td class="tg-k6pi" colspan="7"><strong><?php echo $r->jm_skills; ?></strong></td>
  </tr>
  <tr>
    <td class="tg-dx8v" colspan="4">ELIGIBILITY:</td>
    <td class="tg-dx8v" colspan="7"><strong><?php echo $r->jm_eligibility; ?></strong></td>
  </tr>
  <tr>
    <td class="tg-dx8v" colspan="11"></td>
  </tr>
  <tr>
    <td class="tg-dx8v border-top" colspan="11">REQUESTED BY:</td>
  </tr>
  <tr>
    <td class="tg-dx8v" colspan="11"><strong><?php echo $r->dhead; ?></strong></td>
  </tr>
  <tr>
    <td class="tg-dx8v" colspan="11">HEAD OF OFFICE</td>
  </tr>
  <tr>
    <td class="tg-zx0n border-top border-bottom" colspan="20">MANPOWER REQUISITION STATUS (for HR personnel use only)</td>
  </tr>
  <tr>
    <td class="tg-dx8v border-top border-bottom border-left" colspan="7">REVIEWED BY: HR ASSISTANT</td>
    <td class="tg-rg0h border-top border-bottom border-left" colspan="4">DATE</td>
    <td class="tg-rg0h border-top border-bottom border-left" colspan="9">REMARKS</td>
  </tr>
  <tr>
    <td class="tg-dx8v  border-bottom" colspan="7" rowspan="3"><strong><?php if(strtolower($r->jm_hrstaff) == 'approved'){ 
		echo '<img src="'.base_url('pds_image/1618/1618_signature.jpg').'" style="width:100%; border: none; position: relative; ">';} ?></strong></td>
    <td class="tg-dx8v border-left border-bottom" colspan="4" rowspan="3"><strong><?php echo $r->jm_hrstaff_actiondate; ?></strong></td>
    <td class="tg-dx8v border-left border-bottom" colspan="9" rowspan="3"><strong><?php echo $r->jm_hrstaff_remarks; ?></strong></td>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
  <tr>
    <td class="tg-rg0h border-top border-left" colspan="20">BUDGETARY / COMPENSATION REQUIREMENT</td>
  </tr>
  <tr>
    <td class="tg-rg0h border-bottom" colspan="20">(budgeted or not)</td>
  </tr>
  <tr>
    <td class="tg-dx8v" colspan="11"></td>
    <td class="tg-dx8v" colspan="9"></td>
  </tr>
  <tr>
    <td class="tg-dx8v" colspan="6"><br/><br/>(<?php if(strtolower($r->jm_hrmofficer_c) == 'yes'){ echo '<i class="fa fa-check"></i>) YES  <u>'.$r->jm_hrmofficer_remarks.'</u>';}else{ echo ') YES';}?></td>
    <td class="tg-dx8v" colspan="5"><br/><br/>(<?php if(strtolower($r->jm_hrmofficer_c) == 'no'){ echo '<i class="fa fa-check"></i>) NO  <u>'.$r->jm_hrmofficer_remarks.'</u>';}else{ echo ') NO';} ?></td>
    <td class="tg-rg0h" colspan="9"><?php if(strtolower($r->jm_hrmofficer) == 'approved'){ 
		echo '<img src="'.base_url('pds_image/316/316_signature.jpg').'" style="width:100%; border: none; position: relative; top:-10px; ">';} ?> <br/><span style="position: relative; top: -35px;">Checked by: Supervising Administrative <br/>Officer (HRMO IV)</span></td>
  </tr>
  <tr>
    <td class="tg-dx8v" colspan="11"></td>
    <td class="tg-rg0h" colspan="9"></td>
  </tr>
  <tr>
    <td class="tg-3ood border-top border-bottom" style="background-color:#9b9b9b; !important" colspan="20">&nbsp;</td>
  </tr>
  <tr>
    <td class="tg-dx8v border-top border-bottom border-left" colspan="7">APPROVED BY: CHRDO</td>
    <td class="tg-rg0h border-top border-bottom border-left" colspan="4">DATE</td>
    <td class="tg-rg0h border-top border-bottom border-left" colspan="9">REMARKS</td>
  </tr>
  <tr>
    <td class="tg-dx8v border-left" colspan="7" rowspan="3"><br/><strong>
	<?php if(strtolower($r->jm_hrhead) == 'approved'){ 
		echo '<img src="'.base_url('pds_image/558/558_signature.jpg').'" style="width:150%; border: none; position: relative; top:-15px; left: -20%;">';} ?></strong></td>
    <td class="tg-dx8v border-left" colspan="4" rowspan="3"><br/><strong><?php echo $r->jm_hrhead_actiondate; ?></strong></td>
    <td class="tg-dx8v border-left" colspan="9" rowspan="3"><br/><strong><?php echo $r->jm_hrhead_remarks; ?></strong></td>
  </tr>

  <tr>
  </tr>
  <tr>
  </tr>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php	}
	}
?>