<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
 <div class="x_panel">
                    <div class="x_content">
				<div class="row filter">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-4 col-sm-6 col-xs-12">
							<label class="form-label">Status:</label>
							<select class="form-control column_filter" id="ah_status" name="ah_status">
								<option value="ALL">ALL</option>
								<option value="Pending">Pending</option>
								<option value="Approved">Approved</option>
							</select>
						</div>
					</div>
            <div class="col-md-12 col-sm-12 col-xs-12">
               <hr>
                        <table id="dt_onlineapplicantforaction" class="cell-border compact hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
									<th><center><input type="checkbox"></center></th> <!-- 1 -->
                                    <th>Applicant #</th>
                                    <th>Applicant Name</th>
                                    <th>Position</th>
                                    <th>Remarks</th>
                                    <th>Application History</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        </table>
						<div class="row">
							 <div class="x_content">
								<div class="col-xs-4">
									<a  data-toggle="modal" data-target="#mdl_applicantforaction" data-title="Online Applicant for your action"  id="btn_approved_applicant" name="btn_approved_applicant" class="btn btn-md btn-round btn-primary"> Approve ?</a>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Application Status -->
<div class="modal fade" id="mdl_applicantforaction" tabindex = "-1" role = "dialog" aria-hidden = "true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Modal Header</h5>
        </div>
		<form id="mdl_frm_forexam" name="mdl_frm_forexam">
        <div class="modal-body" id="modal_body">
			<div class="x_content">
				<!--div class="col-md-offset-4"-->
				<div class="btn-group col-xs-12">
					<input type="hidden" id="m_ah_id" name="m_ah_id>">
					<button type="button" id="btn_disapproved" name="btn_disapproved" class="col-xs-6 btn btn-default" data-dismiss="modal">Disapprove</button>
					<button type="button" id="btn_approved" name="btn_approved" class="col-xs-6 btn btn-success" data-dismiss="modal" >Approve</button>
				</div>
				<!--/div-->
			</div>
        </div>
		<div class="" id="modal_footer">
			<br/>
			<br/>
			<br/>
        </div>
		</form>
      </div>
    </div>
</div>

<!-- Application Status -->
<div class="modal fade" id="mdl_applicantforaction" tabindex = "-1" role = "dialog" aria-hidden = "true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Modal Header</h5>
        </div>
		<form id="mdl_frm_forexam" name="mdl_frm_forexam">
        <div class="modal-body" id="modal_body">
			<div class="x_content">
				<!--div class="col-md-offset-4"-->
				<div class="btn-group col-xs-12">
					<input type="hidden" id="m_ah_id" name="m_ah_id>">
					<button type="button" id="btn_disapproved" name="btn_disapproved" class="col-xs-6 btn btn-default" data-dismiss="modal">Disapprove</button>
					<button type="button" id="btn_approved" name="btn_approved" class="col-xs-6 btn btn-success" data-dismiss="modal" >Approve</button>
				</div>
				<!--/div-->
			</div>
        </div>
		<div class="" id="modal_footer">
			<br/>
			<br/>
			<br/>
        </div>
		</form>
      </div>
    </div>
</div>


<!-- Application Status -->
<div class="modal fade" id="mdl_applicationhistory" tabindex = "-1" role = "dialog" aria-hidden = "true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Modal Header</h5>
        </div>
		
        <div class="modal-body" id="modal_body">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<form id="frm_changeremarks" name="frm_changeremarks">
						<input type="hidden" id="m_oa_id" name="m_oa_id">
							<label class="form-label">Remarks</label>
								<select class="form-control" id="m_ah_remark" name="m_ah_remark" required>
									<option value=""> -- Choose -- </option>
									<option value="For Exam and Interview"> For Exam and Initial Interview</option>
									<option value="For Job Interview">For Job Interview</option>
									<option value="For Filing"> For Filing</option>
									<option value="Forward to CESD">Forward to CESD</option>
									<option value="Forward to City Schools">Forward to City Schools</option>
									<option value="For Regret">For Regret</option>
								</select>
								<hr>
							<input type="submit" class="btn btn-success col-lg-6 col-md-6 col-sm-12 col-xs-12" value="Save">
						</form>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<label class="form-label">Remarks Note</label>
							<input type="text" id="m_ah_remarksnotes" name="m_ah_remarksnotes" class="form-control">
						</div>
						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
							<label class="form-label">Remarks Date</label>
							<input type="text" id="m_ah_remarksnotes_date" name="m_ah_remarksnotes_date" class="form-control date">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<table id="dt_positionapplied" class="cell-border compact hover" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Position</th>
									<th>Description</th>
									<th>Status</th>
									<th>Remarks</th>
									<th>Remarks Status</th>
									<th>Remarks Date</th>
									<th>HR Date filed</th>
									<th>Is Latest</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
				
        </div>
		<div class="modal-footer" id="modal_footer">
			<div class="x_content">
				<div class="btn-group col-xs-6">
					<input type="button" class="col-xs-3 btn btn-default" value="Close" data-dismiss="modal">
					
				</div>
			</div>
        </div>
	
      </div>
    </div>
</div>

<div class="modal fade" id="mdl_appinfo" tabindex = "-1" role = "dialog" aria-hidden = "true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Modal Header</h5>
        </div>
        <div class="modal-body" id="modal_body">
			<div class="x_content">
			<div class="row">
					<img src="" id="app_id" style="width:200px;height:200px;">
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">First Name</label>
							<input type="text" class="form-control" readonly id="oa_fname" name="oa_fname">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Middle Name</label>
							 <input type="text" class="form-control" readonly id="oa_mname" name="oa_mname">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Last Name</label>
							 <input type="text" class="form-control" readonly id="oa_lname" name="oa_lname">
						</div>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-12">
						<div class="form-group">
							<label class="control-label">Ext</label>
							 <input type="text" class="form-control" readonly id="oa_extname" name="oa_extname">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<div class="form-group">
							<label class="control-label">Gender</label>
							 <input type="text" class="form-control" readonly id="oa_gender" name="oa_gender">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Birth Date</label>
							 <input type="text" class="form-control" readonly id="oa_bdate" name="oa_bdate">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Birth Date</label>
							 <input type="text" class="form-control" readonly id="oa_school" name="oa_school">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Course</label>
							 <input type="text" class="form-control" readonly id="oa_course" name="oa_course">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Educ Remarks</label>
							 <input type="text" class="form-control" readonly id="oa_educremarks" name="oa_educremarks">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Eligibility</label>
							 <input type="text" class="form-control" readonly id="oa_eligibility" name="oa_eligibility">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Eligibility Remarks</label>
							 <input type="text" class="form-control" readonly id="oa_eligremarks" name="oa_eligremarks">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Province</label>
							 <input type="text" class="form-control" readonly placeholder="" id="oa_province" name="oa_province">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">City</label>
							 <input type="text" class="form-control" readonly id="oa_city" name="oa_city">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Barangay</label>
							 <input type="text" class="form-control" readonly id="oa_brgy" name="oa_brgy">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Skills</label>
							 <input type="text" class="form-control" readonly id="oa_skills" name="oa_skills">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Awards</label>
							 <input type="text" class="form-control" readonly id="oa_awards" name="oa_awards">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Mobile</label>
							 <input type="text" class="form-control" readonly id="oa_mobile" name="oa_mobile">
						</div>
					</div>
				</div>
			</div>
		
		
            <!--input type="text" id="m_oa_id" name="m_oa_id"-->
			<table class="table">
				<thead>
					<tr>
						<td>Applied Position</td>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
        </div>
        
      </div>
    </div>
</div>


