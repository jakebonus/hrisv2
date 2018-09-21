<!-- page content -->
<?php
if(isset($info)){
	foreach($info as $i){
		$oa_prefix = $i->oa_prefix;
		$oa_suffix = $i->oa_suffix;
		$oa_fname = $i->oa_fname;
		$oa_mname = $i->oa_mname;
		$oa_lname = $i->oa_lname;
		$oa_extname = $i->oa_extname;
		$oa_email = $i->oa_email;
		$oa_course = $i->oa_course;
		$oa_school = $i->oa_school;
		$oa_educremarks = $i->oa_educremarks;
		$oa_postgraduate = $i->oa_postgraduate;
		$oa_postgraduateremarks = $i->oa_postgraduateremarks;
		$oa_eligibility = $i->oa_eligibility;
		$oa_eligremarks = $i->oa_eligremarks;
		$oa_bdate = $i->oa_bdate;
		$oa_gender = $i->oa_gender;
		$oa_mobile = $i->oa_mobile;
		$oa_pdesire = $i->oa_pdesire;
		$oa_street = $i->oa_street;
		$oa_brgy = $i->oa_brgy;
		$b_name = $i->b_name;
		$brgy = $i->brgy;
		$oa_city = $i->oa_city;
		$c_name = $i->c_name;
		$oa_province = $i->oa_province;
		$p_name = $i->p_name;
		$oa_recwork = $i->oa_recwork;
		$oa_rectraining = $i->oa_rectraining;
		$oa_skills = $i->oa_skills;
		$oa_awards = $i->oa_awards;
	}
}

								$from = new DateTime($oa_bdate);
							 	$to   = new DateTime(date('Y-m-d'));
							 	$age = $from->diff($to)->y;

					

?>
<div class="right_col" role="main">
<div class="clearfix"></div>
	<div class="x_panel">
		<div class="x_content">
			<div class="row">
				<div class="col-md-12">
					<div id="applicantdetails">
					<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-hgcj{font-weight:bold;text-align:center}
.tg .tg-yw4l{vertical-align:top}

</style>
<table class="tg" style="table-layout: fixed; width: 786px;">
<colgroup>
<col style="width: 50px">
<col style="width: 49px">
<col style="width: 51px">
<col style="width: 41px">
<col style="width: 42px">
<col style="width: 36px">
<col style="width: 36px">
<col style="width: 40px">
<col style="width: 34px">
<col style="width: 42px">
<col style="width: 35px">
<col style="width: 34px">
<col style="width: 36px">
<col style="width: 39px">
<col style="width: 37px">
<col style="width: 35px">
<col style="width: 41px">
<col style="width: 35px">
<col style="width: 35px">
<col style="width: 38px">
</colgroup>
  <tr>
    <th class="tg-hgcj" colspan="25">Applicant No. <?php echo $oa_prefix.'-'.$oa_suffix; ?> Details</th>
  </tr>
  <tr>
    <td class="tg-031e" colspan="4" rowspan="3"><center><img src="" id="app_id" style="width:170px;height:170px;"></center></td>
    <td class="tg-yw4l" colspan="5"><small><i>First Name</i></small><br/><?php echo $oa_fname; ?></td>
    <td class="tg-yw4l" colspan="5"><small><i>Middle Name</i></small><br/><?php echo $oa_mname; ?></td>
    <td class="tg-yw4l" colspan="5"><small><i>Last Name</i></small><br/><?php echo $oa_lname; ?></td>
    <td class="tg-yw4l" colspan="2"><small><i>Ext. Name</i></small><br/><?php if($oa_extname != '-- Choose' ){ echo $oa_extname; } ?></td>
	<td class="tg-yw4l" colspan="4" style="white-space:pre-wrap; !important"><small><i>Mobile Number</i></small><br/><?php echo $oa_mobile; ?></td>
  </tr>
  <tr>
    <!--td class="tg-031e" colspan="9" style="white-space:pre-wrap; !important"><small><i>School</i></small><br/><?php // echo $oa_school; ?></td-->
    <td class="tg-yw4l" colspan="9" style="white-space:pre-wrap; !important"><small><i>School</i></small><br/><?php echo $oa_school; ?></td>
    <td class="tg-yw4l" colspan="16" style="white-space:pre-wrap; !important"><small><i>Course &nbsp; &nbsp; &nbsp;<?php if($oa_educremarks != '-- Course Remarks --') { echo '**'.$oa_educremarks;} ?></i></small><br/><?php if($oa_course != '-- Choose --') { echo $oa_course; } ?></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="6"><small><i>Eligibility</i></small><br/><?php echo $oa_eligibility; ?></td>
    <td class="tg-yw4l" colspan="2"><small><i>Gender</i></small><br/><?php if($oa_gender == 'F'){ echo 'Female';}elseif($oa_gender == 'M'){ echo 'Male';}else{echo '**';};?></td>
    <td class="tg-yw4l" colspan="4"><small><i>Birth date</i></small><br/><?php if($age < 50 ) { echo $oa_bdate; }?></td>
    <td class="tg-yw4l" colspan="2"><small><i>Age</i></small><br/><?php if($age < 50 ) { echo $age; } ?></td>
    <td class="tg-yw4l" colspan="7"><small><i>Email Address</i></small><br/><?php echo $oa_email; ?></td>

  </tr>
   <tr>
    <td class="tg-yw4l" colspan="6" style="white-space:pre-wrap; !important"><small><i>Recent Work</i></small><br/><?php echo $oa_recwork; ?></td>
    <td class="tg-yw4l" colspan="6" style="white-space:pre-wrap; !important"><small><i>Recent Training</i></small><br/><?php echo $oa_rectraining; ?></td>
    <td class="tg-yw4l" colspan="4"><small><i>Post Graduate</i></small><br/><?php echo $oa_postgraduate; ?></td>
    <td class="tg-yw4l" colspan="9"><small><i>Post Graduate Course</i></small><br/><?php echo '&nbsp;'.$oa_postgraduateremarks; ?></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="6"><small><i>Street</i></small><br/><?php echo $oa_street; ?></td>
    <td class="tg-yw4l" colspan="4"><small><i>Barangay</i></small><br/><?php echo $b_name; ?></td>
    <td class="tg-yw4l" colspan="7"><small><i>City / Municipality</i></small><br/><?php echo $c_name; ?></td>
    <td class="tg-yw4l" colspan="8"><small><i>Province</i></small><br/><?php echo $p_name; ?></td>
  </tr>

  <tr>
    <td class="tg-yw4l" colspan="9" rowspan="4"><small><i>Skills</i></small><br/><?php echo $oa_skills; ?></td>
	<td class="tg-yw4l" colspan="8" rowspan="4"><small><i>Awards</i></small><br/><?php echo $oa_awards; ?></td>
    <td class="tg-yw4l" colspan="8" rowspan="4"><small><i>Position</i></small><br/><?php
									if(isset($appliedposition)){
									foreach($appliedposition as $ap){
								?>
										• <?php echo $ap->v_position; ?><br/>
								<?php	 }
									}
								?></td>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
</table>
					<!--div id="applicantdetails">
						<div class="row">
							<div class="col-md-3 col-sm-3">
								<img src="" id="app_id" style="width:200px;height:200px;">
							</div>
							
							<div class="col-md-9 col-sm-9">
							<hr>
								<div class="row">
									<div class="col-md-4">
										<label class="control-label">First Name</label><br/>
										<label class="control-label"><u><?php // echo $oa_fname; ?></u></label>
									</div>
									<div class="col-md-2">
										<label class="control-label">Middle Name</label><br/>
										<label class="control-label"><u><?php // echo $oa_mname; ?></u></label>
									</div>
									<div class="col-md-4">
										<label class="control-label">Last Name</label><br/>
										<label class="control-label"><u><?php // echo $oa_lname; ?></u></label>
									</div>
									<div class="col-md-1">
										<label class="control-label">Ext</label><br/>
										<label class="control-label"><u><?php // echo $oa_extname; ?></u></label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<hr>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label class="control-label">School</label><br/>
										<label class="control-label"><u><?php // echo $oa_school; ?></u></label>
									</div>
									<div class="col-md-6">
										<label class="control-label">Course &nbsp; &nbsp; &nbsp;<i><small>**<?php // echo $oa_educremarks; ?></small></i></label><br/>
										<label class="control-label"><u><?php // echo $oa_course; ?></u></label>
									</div>
								</div>
							</div>
						
						</div>	
						<div class="row">
							<div class="col-md-12">
								<hr>
							</div>
							
							<div class="col-md-3">
								<label class="control-label">Eligibility</label><br/>
								<label class="control-label"><u><?php // echo $oa_eligibility; ?></u></label>
							</div>
							<div class="col-md-2">
								<label class="control-label">Gender</label><br/>
								<label class="control-label"><u><?php // if($oa_gender == 'F'){ echo 'Female';}elseif($oa_gender == 'M'){ echo 'Male';}else{echo '**';}; ?></u></label>
							</div>
							<div class="col-md-2">
								<label class="control-label">Birth Date</label><br/>
								<label class="control-label"><u><?php // echo $oa_bdate; ?></u></label>
							</div>
							<div class="col-md-1">
							<?php
								 //$from = new DateTime($oa_bdate);
							 //	$to   = new DateTime(date('Y-m-d'));
							 //	$age = $from->diff($to)->y;

							?>
								<label class="control-label">Age</label><br/>
								<label class="control-label"><u><?php // echo $age.' y/o'; ?></u></label>
							</div>
							<div class="col-md-4">
								<label class="control-label">E-Mail address</label><br/>
								<label class="control-label"><u><?php // echo $oa_email; ?></u></label>
							</div>
							<div class="col-md-12">
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label class="control-label">Street</label><br/>
								<label class="control-label"><u><?php // echo $oa_street; ?></u></label>
							</div>
							<div class="col-md-2">
								<label class="control-label">Barangay</label><br/>
								<label class="control-label"><u><?php // echo $b_name; ?></u></label>
							</div>
							<div class="col-md-2">
								<label class="control-label">City</label><br/>
								<label class="control-label"><u><?php // echo $c_name; ?></u></label>
							</div>
							<div class="col-md-2">
								<label class="control-label">Province</label><br/>
								<label class="control-label"><u><?php // echo $p_name; ?></u></label>
							</div>
								<div class="col-md-2">
								<label class="control-label">Mobile #</label><br/>
								<label class="control-label"><u><?php // echo $oa_mobile; ?></u></label>
							</div>
							<div class="col-md-12">
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label class="control-label">Skills</label><br/>
								<label class="control-label"><u><?php // echo $oa_skills; ?></u></label>
							</div>
							<div class="col-md-4">
								<label class="control-label">Awards</label><br/>
								<label class="control-label"><u><?php // echo $oa_awards; ?></u></label>
							</div>
							<div class="col-md-4">
								<label class="control-label">Position Applied</label><br/>
								<?php 
									 //if(isset($appliedposition)){
									 //	foreach($appliedposition as $ap){
								?>
										<label class="control-label">• <u><?php // echo $ap->v_position; ?></u></label><br/>
								<?php	 //}
								 //	}
								?>
								
							</div>
							<div class="col-md-12">
								<hr>
							</div>
						</div>
					</div-->
					</div>
					<div class="row">
					<div class="col-xs-12">
						<hr>
					<button onclick="printContent('applicantdetails')" type="button" class="btn btn-primary col-xs-3"><i class="glyphicon glyphicon-print"></i> Print</button>
					</div>
					</div>
				</div>
			</div>	
		</div>	
	</div>





