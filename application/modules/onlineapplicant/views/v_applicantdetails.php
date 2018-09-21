<!-- page content -->
<?php
if(isset($info)){
	foreach($info as $i){
		$oa_id = $i->oa_id;
		$oa_activationcode = $i->oa_activationcode;
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


<div class="row">
<br/>

<div class="col-md-6 col-xs-12 col-md-offset-3">
	<div class="row">
		<button onclick="printContent('applicantdetails')" type="button" class="btn btn-primary col-xs-3"><i class="glyphicon glyphicon-print"></i> Print</button>
	</div>
<div id="applicantdetails">
                <div class="x_panel">
                  <div class="x_title">
                    <h4><center>Applicant No. <?php echo $oa_prefix.'-'.$oa_suffix; ?> Details</center></h4>
							
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
						<?php
						$a 	=  'https://cityofsanfernando.gov.ph/careers/images/'.$oa_id.'/'.$oa_id.'.JPG';
						$aa =  'https://cityofsanfernando.gov.ph/careers/images/'.$oa_id.'/'.$oa_id.'.jpg';
						$b 	=  'https://cityofsanfernando.gov.ph/careers/images/'.$oa_id.'/'.$oa_id.'.JPEG';
						$bb =  'https://cityofsanfernando.gov.ph/careers/images/'.$oa_id.'/'.$oa_id.'.jpeg';
						$c 	=  'https://cityofsanfernando.gov.ph/careers/images/'.$oa_id.'/'.$oa_id.'.PNG';
						$cc =  'https://cityofsanfernando.gov.ph/careers/images/'.$oa_id.'/'.$oa_id.'.png';
						$file ='';
					
						if(getimagesize($a) !== false){
							$file = $a;
						}elseif(getimagesize($aa) !== false){
							$file = $aa;
						}elseif(getimagesize($b) !== false){
							$file = $b;
						}elseif(getimagesize($bb) !== false){
							$file = $bb;
						}elseif(getimagesize($c) !== false){
							$file = $c;
						}elseif(getimagesize($cc) !== false){
							$file = $cc;
						}else{
							$file =  'https://cityofsanfernando.gov.ph/careers/img/img.png';
						}
						?>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<img src="<?php echo $file;?>" height="150" width = "150"/>
						<hr/>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
                        <p class="form-label"><i>First Name</i></p>
                         <label  class="form-label"><?php echo $oa_fname; ?></label>
                      </div>
					  
					  <div class="col-md-6 col-sm-6 col-xs-6">
                        <p class="form-label"><i>Middle Name</i></p>
                         <label  class="form-label"><?php echo $oa_mname; ?></label>
                      </div>
						<div class="col-md-6 col-sm-6 col-xs-6">
                        <p class="form-label"><i>Last Name</i></p>
                         <label  class="form-label"><?php echo $oa_lname; ?></label>
                      </div>
					  <div class="col-md-6 col-sm-6 col-xs-6">
                        <p class="form-label"><i>Ext. Name</i></p>
                         <label  class="form-label"><?php echo $oa_extname;  ?>&nbsp;</label>
                      </div>
					  
					<div class="col-md-6 col-sm-6 col-xs-6">
                        <p class="form-label"><i>Gender</i></p>
                         <label  class="form-label"><?php if($oa_gender == 'M'){ echo 'MALE';}elseif($oa_gender == 'F'){echo 'FEMALE';}else{ echo '---';} ?></label>
                      </div>
					  <?php $date = new DateTime($oa_bdate); ?>
					  <div class="col-md-6 col-sm-6 col-xs-6">
                        <p class="form-label"><i>Birth Date</i></p>
                         <label  class="form-label"><?php echo $date->format('m/d/Y'); ?></label>
                      </div>
					
					<div class="col-md-12 col-sm-12 col-xs-12">
                        <p class="form-label"><i>School Name</i></p>
                         <label  class="form-label"><?php echo $oa_school; ?></label>
                      </div>
					  
					  <div class="col-md-12 col-sm-12 col-xs-12">
                        <p class="form-label"><i>Course / Education</i></p>
                         <label  class="form-label"><?php echo $oa_educremarks.' of '.$oa_course; ?></label>
                      </div>
                 
					  <div class="col-md-12 col-sm-12 col-xs-12">
                        <p class="form-label"><i>Post Graduate</i></p>
                         <label  class="form-label"><?php if($oa_postgraduate != 'N/A') {echo $oa_postgraduate.' in '.$oa_postgraduateremarks; } else { echo $oa_postgraduate;}?></label>
                      </div>
					   
					  <div class="col-md-6 col-sm-6 col-xs-6">
                        <p class="form-label"><i>Eligibility</i></p>
                         <label  class="form-label"><?php echo $oa_eligibility; ?></label>
                      </div>
					  
					  <div class="col-md-6 col-sm-6 col-xs-6">
                        <p class="form-label"><i>Mobile No.</i></p>
                         <label  class="form-label"><?php echo $oa_mobile; ?></label>
                      </div>
					 <div class="col-md-12 col-sm-12 col-xs-12">
                        <p class="form-label"><i>Address</i></p>
                         <label  class="form-label"><?php echo $oa_street.', '.$b_name.', '.$c_name.', '.$p_name; ?></label>
                      </div>
					   
					  <!--div class="col-md-12 col-sm-12 col-xs-12">
                        <p class="form-label"><i>Province</i></p>
                         <label  class="form-label"><?php // echo $p_name; ?></label>
                      </div>
					  
					  <div class="col-md-12 col-sm-12 col-xs-12">
                        <p class="form-label"><i>City / Municipality</i></p>
                         <label  class="form-label"><?php // echo $c_name; ?></label>
                      </div>
					  
					  <div class="col-md-12 col-sm-12 col-xs-12">
                        <p class="form-label"><i>Barangay</i></p>
                         <label  class="form-label"><?php // echo $b_name; ?></label>
                      </div>
					  
					  <div class="col-md-12 col-sm-12 col-xs-12">
                        <p class="form-label"><i>Street</i></p>
                         <label  class="form-label"><?php // echo $oa_street; ?></label>
                      </div-->
					 
					  <div class="col-md-12 col-sm-12 col-xs-12">
                        <p class="form-label"><i>Recent Work</i></p>
                         <label  class="form-label"><?php echo $oa_recwork; ?></label>
                      </div>
					  
					   <div class="col-md-12 col-sm-12 col-xs-12">
                        <p class="form-label"><i>Recent Training</i></p>
                         <label  class="form-label"><?php echo $oa_rectraining; ?></label>
                      </div>
					   
					   <div class="col-md-12 col-sm-12 col-xs-12">
                        <p class="form-label"><i>Special Skills</i></p>
                         <label  class="form-label"><?php echo $oa_skills; ?></label>
                      </div>
					    
					 
					   <div class="col-md-12 col-sm-12 col-xs-12">
                        <p class="form-label"><i>Awards Received</i></p>
                         <label  class="form-label"><?php echo $oa_awards; ?></label>
                      </div>
					  
					  <div class="col-md-12 col-sm-12 col-xs-12">
                        <p class="form-label"><i>Position Desired</i></p>
                         <?php
									if(isset($appliedposition)){
									foreach($appliedposition as $ap){
								?>
										• <?php echo $ap->v_position; ?><br/>
								<?php	 }
									}
								?>
                      </div>
                  </div>
                </div>
              </div>
		</div>
	</div>





