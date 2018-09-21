<!-- page content -->
<div class="right_col" role="main">
    <div class="x_panel">

        <div class="x_title">
            <h2><i class="fa fa-users"></i> PERSONNEL REQUISITION FORM </h2>
                <div class="clearfix"></div>
        </div>
    <div class="x_content">
		<form id="frm_personnelrequest" name="frm_personnelrequest">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<label class="form-label">Department:</label>
					<input type="text" class="form-control" id="jm_office" name="jm_office" value="<?php  echo $this->session->a_office; ?>" readonly>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
					<label class="form-label">Date Requested:</label>
					<input type="text" class="form-control" id="jm_reqdate" name="jm_reqdate" value="<?php echo date('Y-m-d'); ?>" readonly>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<label class="form-label">Target Date Needed:</label>
					
					<!--fieldset>
                          <div class="control-group">
                            <div class="controls">
                              <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left date_pick" id="jm_dateneeded" name="jm_dateneeded" >
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>
                        </fieldset-->
					<input type="text" class="form-control datepicker" id="jm_dateneeded" name="jm_dateneeded">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<label class="form-label">Program/Project:</label>
					<input type="text" class="form-control" id="jm_project" name="jm_project" value="">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<label class="form-label">Duration of Project: &nbsp;&nbsp;<small><small>(for Project-based only)</small></small></label>
					<!--input type="text" class="form-control" id="jm_projectduration" name="jm_projectduration" value=""-->
					<fieldset>
                            <div class="control-group">
                              <div class="controls">
                                <div class="input-prepend input-group">
                                  <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                  <input type="text" style="width: 200px" name="jm_projectduration" id="jm_projectduration" class="form-control date_range" value="" />
                                </div>
                              </div>
                            </div>
                          </fieldset>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<label class="form-label">Naturre of Request</label>
					<select class="form-control" id="jm_reqnature" name="jm_reqnature">
						<option> -- Choose --</option>
						<option value="1"> Additional Manpower</option>
						<option value="2"> Replacement</option>
						<option value="3"> Others</option>
					</select>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" id="request">
					<label class="form-label">Specific</small></small></label>
					<div id="specific">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<label class="form-label">Justification</label>
					<textarea class="form-control" id="jm_justification" name="jm_justification"></textarea>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<label class="form-label">Employment Status</label>
					<select class="form-control" id="jm_emp_status" name="jm_emp_status">
						<option> -- Choose --</option>
						<option value="PROJECT BASED">PROJECT BASED</option>
						<option value="JOB ORDER">JOB ORDER</option>
						<option value="CASUAL">CASUAL</option>
						<option value="PERMANENT">PERMANENT</option>
						<option value="CO-TERMINOUS">CO-TERMINOUS</option>
					</select>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<label class="form-label">Position</label>
					<select class="form-control select2_single" id="jm_position" name="jm_position">
						<option> -- Choose --</option>
					</select>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<label class="form-label">Duties and Reponsibilities</label>
					<textarea class="form-control" id="jm_desc" name="jm_desc"></textarea>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<label class="form-label">Post Graduate</label>
					<select class="form-control" id="jm_postgrad" name="jm_postgrad">
						<option value='N/A'> Not Applicable </option>
						<option value="Materal">Materal</option>
						<option value="Doctorate">Doctorate</option>
					</select>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<label class="form-label">Gender</label>
					<select class="form-control" id="jm_postgrad" name="jm_postgrad">
						<option value='N/A'> Not Applicable </option>
						<option value="M">Male</option>
						<option value="F">Doctorate</option>
					</select>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<label class="form-label">Requested by:</label>
					<input type="text" class="form-control"  value="<?php echo $this->session->userdata('a_lastname').', '.$this->session->userdata('a_firstname').' '.$this->session->userdata('a_middlename'); ?>" readonly>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><hr></div>
				<label class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-label">QUALIFICATION:</label>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<label class="form-label">Education</label>
						<select class="form-control select2_multiple" id="jm_course" name="jm_course" multiple="multiple">
							<option> -- Choose --</option>
						</select>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<label class="form-label">Training</label>
						<input type="text" class="form-control" id="jm_training" name="jm_training" value="">
					</div>

					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<label class="form-label">Experience</label>
						<input type="text" class="form-control" id="jm_experience" name="jm_experience" value="">
					</div>

					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<label class="form-label">Skills</label>
						<textarea class="form-control" id="jm_skills" name="jm_skills"></textarea>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<label class="form-label">Eligibility</label>
						<select class="form-control" id="jm_eligibility" name="jm_eligibility">
							<option> -- Choose --</option>
							<option value="CS PROFESSIONAL">CS PROFESSIONAL</option>
							<option value="CS SUBPROFESSIONAL">CS SUBPROFESSIONAL</option>
							<option value="BAR/BOARD ELIGIBILITY (RA1080)">BAR/BOARD ELIGIBILITY (RA1080)</option>
							<option value="BARANGAY OFFICIAL ELIGIBILITY (BOE)">BARANGAY OFFICIAL ELIGIBILITY (BOE)</option>
							<option value="HONOR GRADUATE ELIGIBILITY (PD907)">HONOR GRADUATE ELIGIBILITY (PD907)</option>
							<option value="SANGGUNIAN MEMBER ELIGIBILITY (SME)">SANGGUNIAN MEMBER ELIGIBILITY (SME)</option>
							<option value="SKILL ELIGIBILITY (CSC MC NO II)">SKILL ELIGIBILITY (CSC MC NO II)</option>
						</select>
					</div>
			</div>
			
	
			
			
			<div class="row">
			<hr>
				<div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-12 col-xs-12">
					<input type="submit" class="form-control btn btn-success" value="SAVE PERSONNEL REQUEST">
				</div>
			</div>
		</form>
    </div>
    </div>

</div>
<div class="clearfix"></div>
</div>
