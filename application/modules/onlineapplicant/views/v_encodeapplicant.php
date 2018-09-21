<!-- page content -->
<div class="right_col" role="main">
        <div class="clearfix"></div>
			<div class="x_panel">
                <div class="x_content">
                    <!--div class="row">
                    <div class="col-md-12"-->
						<form id="frm_encodeapplicant" name="frm_encodeapplicant">
							<div class="row">
								<div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
									<label class="form-label">Email Address:</label>
									<input type="email" class="form-control" id="oa_email" name="oa_email" onblur="validateEmail(this);" required>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<hr>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
									<label class="form-label">First Name</label>
									<input type="text" class="form-control" id="oa_fname" name="oa_fname" required disabled>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
									<label class="form-label">Middle Name</label>
									<input type="text" class="form-control" id="oa_mname" name="oa_mname" required disabled>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
									<label class="form-label">Last Name</label>
									<input type="text" class="form-control" id="oa_lname" name="oa_lname" required disabled>
								</div>
								<div class="col-lg-1  col-md-1 col-sm-3 col-xs-12">
									<label class="form-label">Ext.</label>
									<input type="text" class="form-control" id="oa_extname" name="oa_extname" disabled>
								</div>
								
								<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
									<label class="form-label">Gender</label>
									<select class="form-control" id="oa_gender" name="oa_gender" required disabled>
										<option> -- Choose --</option>
										<option value="M" >Male</option>
										<option value="F" >Female</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="form-label">Province</label>
									<select class="form-control" id="oa_province" name="oa_province" required disabled>
										
									</select>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="form-label">City</label>
									<select class="form-control" id="oa_city" name="oa_city" required disabled>
										
									</select>
								</div>
								
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 brgy">
									<label class="form-label">Barangay</label>
									<input type="text" class="form-control" id="oa_brgy" name="oa_brgy" required disabled>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="form-label">Street</label>
									<input type="text" class="form-control" id="oa_street" name="oa_street" disabled>
								</div>
							</div>
						
						
							<div class="row">
								<div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
									<label class="form-label">Birth Date</label>
									<input type="text" class="form-control date" id="oa_bdate" name="oa_bdate" required disabled>
								</div> 
								
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<label class="form-label">Course</label>
									<select class="select2_single form-control" id="oa_course" name="oa_course" required disabled>
										<option value="Elementary">Elementary</option>
										<option value="High School">High School</option>
										<option value="Vocational (2 years)">Vocational (2 years)</option>
									</select>
								</div>
								<div class="col-lg-3 col-md-2 col-sm-6 col-xs-12">
									<label class="form-label">Educational Remarks</label>
									<!--input type="text" class="form-control" id="oa_educremarks" name="oa_educremarks"-->
									<select class="form-control" tabindex="-1" id="oa_educremarks" name="oa_educremarks" required disabled>
										<option>-- Choose --</option>
										<option value="Graduate">Graduate</option>
										<option value="Undergraduate" >Undergraduate</option>	
									 </select>	
								</div> 
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
									<label class="form-label">Eligibility</label>
									<!--select class="select2_single form-control" tabindex="-1" id="oa_eligibility" name="oa_eligibility" required-->
									<select class="form-control" tabindex="-1" id="oa_eligibility" name="oa_eligibility" required disabled>
										<option>-- Choose --</option>
										<option value="N/A" >N/A</option>
										<option value="Bar/Board Eligibility (RA1080)" >Bar/Board Eligibility (RA1080)</option>
										<option value="CSC Professional" >CSC Professional</option>
										<option value="CSC Subprofessional" >CSC Subprofessional</option>
										<option value="Barangay Official Eligibility (BOE)" >Barangay Official Eligibility (BOE)</option>
										<option value="Honor Graduate Eligibility (PD907)" >Honor Graduate Eligibility (PD907)</option>
										<option value="Sanggunian Member Eligibility (SME)">Sanggunian Member Eligibility (SME)</option>
										<option value="Skill Eligibility (CSC MC No, II)" >Skill Eligibility (CSC MC No, II)</option>	
									 </select>	
								</div>
							</div>
							
							
							<div class="row">
								<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
									<label class="form-label">School</label>
									<input type="text" class="form-control" id="oa_school" name="oa_school" required disabled>
								</div> 
								
								<div class="col-lg-2 col-md-6 col-sm-3 col-xs-12">
									<label class="form-label">Post Graduate</label>
									 <select class="form-control" tabindex="-1" name="oa_postgraduate" id="oa_postgraduate" disabled>
								<option value="N/A">-- Choose --</option>
								<option value="Masteral" >Masteral</option>
								<option value="Doctorate" >Doctorate</option>
					
								</select>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<label class="form-label">Post Graduate Course</label>
									<input type="text" class="form-control" id="oa_postgraduateremarks" name="oa_postgraduateremarks" disabled>
								</div> 
							
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="form-label">Mobile #</label>
									<input type="text" class="form-control" id="oa_mobile" name="oa_mobile" required disabled>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
									<label class="form-label">Most recent work (if any)</label>
									<input type="text" class="form-control" id="oa_recwork" name="oa_recwork" required disabled>
								</div>
								<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
									<label class="form-label">Most recent training (if any)</label>
									<input type="text" class="form-control" id="oa_rectraining" name="oa_rectraining" required disabled>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
									<label class="form-label">Date Applied</label>
									<input type="text" class="form-control date" id="oa_date" name="oa_date" required disabled>
								</div>
							</div>
						<!--/div>
					</div-->							
							<div class="row">
							 	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<label class="form-label">Position Desired<br/><small><i class="red">You can choose maximum of 5 position.</i></small></label>
									<table class="table flexy" id="dt_vacancy">
									<thead> 
									</thead>
										<tbody>
										<?php   if(!is_null($vacancies)){
											foreach($vacancies as $v){ ?>
											<tr>
												<td>
													<input type="checkbox" id="v_id" name="v_id" value="<?php  echo $v->v_id; ?>"> 
													<?php  echo $v->v_position; 
														if($v->v_desc == 'VACANT') { 
														echo '&nbsp;&nbsp;<strong><small class="green">('.$v->v_desc.')</small><strong>';
													}?>
												
												</td>
											</tr>
										<?php  } } ?>
										<?php // if(in_array($v->v_id, $appliedposition)){ echo 'checked'; } ?>
										</tbody>
									</table>
								</div>
							
							
								<div class="col-md-4 col-sm-6 col-xs-12">
									<label class="form-label">Skills</label>
									<textarea type="text" class="form-control" rows="8" id="oa_skills" name="oa_skills"  disabled></textarea>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-12">
									<label class="form-label">Awards</label>
									<textarea type="text" class="form-control" rows="8" id="oa_awards" name="oa_awards"  disabled></textarea>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
								<hr>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12">
									<input type="submit" class="btn btn-success form-control" id="btn_encodeapplicant"  disabled> 
								</div>
							</div>
							
							
						</form>
					</div>
				</div>	
			</div>	
</div>





