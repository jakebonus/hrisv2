<!-- page content -->
<div class="right_col holiday-page" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h5><i class="fa fa-users"></i> PERSONNEL REQUEST</h5>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                     
                        <br/>
                        <table id="dt_personnelrequestlist" name="dt_personnelrequestlist" class="cell-border compact hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Control #</th>
                                    <th>Office</th>
									<th>Project</th>
									<th>HR Staff</th>
									<th>HRM Officer</th>
									<th>CHRDO Head</th>
                                    <th>Project Duration</th>
                                    <th>Education</th>  
                                    <th>Position</th>  
                                    <th>Employement Status</th>  
                                    <th>Action</th>  
                                </tr>
                            </thead>
                        </table>

                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<div class="modal fade" id="modal_approverequest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<form id="frm_request" name="frm_request" method="post">
            <div class="modal-content">
                <div class="modal-header" >
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h5 class="modal-title" id="myModalLabel">Action Confirmation</h5>
                    </div>
                </div>
                <div class="modal-body">
					<input type="hidden" id="m_jm_id" name="m_jm_id" value="">
						<div class="row">
						
						<?php if(strtolower($this->session->userdata('a_profile')) == 'chrdo officer' 
							|| strtolower($this->session->userdata('a_profile')) == 'admin asst ii-staff'
							|| strtolower($this->session->userdata('a_profile')) == 'admin asst ii-pds') { ?>
							<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
								<label class="form-label"> Remarks:</label>
								<textarea class="form-control" value="" id="remarks" name="remarks">
								</textarea>
							</div>
							
							<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
								<br/>
							</div>
							
							<!--div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
								<input class="form-control date" type="text" value="<?php // echo date('Y-m-d'); ?>"  id="" name="">
							</div-->
							
							<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
								<br/>
							</div>
						<?php }else if(strtolower($this->session->userdata('a_profile')) == 'hrmo iv-records'){ ?>
							
							<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
								<label class="form-label"> Remarks:</label>
								<input type="text" class="form-control" id="remarks" name="remarks">
							</div>
							<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
								<label class="form-label"> Budgeted or Not:</label>
								<select class="form-control" id="jm_hrmofficer_c" name="jm_hrmofficer_c">
									<option value=""> -- Choose -- </option>
									<option value="YES">YES</option>
									<option value="NO"> NO</option>
								</select>
							</div>
							<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
								<br/>
							</div>
						<?php } ?>
						<div class="btn-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
							<button id="disapproved_request" name="disapproved_request"  class="btn btn-warning col-md-6 col-lg-6 col-sm-6 col-xs-6">Disapprove</button>
							<button id="approved_request" name="approved_request" class="btn btn-success col-md-6 col-lg-6 col-sm-6 col-xs-6">Approve</button>
						</div>
					</div>
                </div>
            </div>
		</form>
	</div>
</div>

<div class="modal fade" id="mdl_cancelrequest" tabindex = "-1" role = "dialog" aria-hidden = "true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Do you want to cancel personnel request?</h5>
        </div>
			
		<div class="modal-footer" id="modal_footer">
				<div class="btn-group col-xs-12">
					<input type="hidden" id="jm_id" name="jm_id" >
					<button type="button" class="col-xs-3 btn btn-default" data-dismiss="modal">No </button>
					<button type="button" id="btn_canceljm" name="btn_canceljm" class="col-xs-9 btn btn-warning" data-dismiss="modal">Yes, cancel it!</button>
				</div>
        </div>
		
      </div>
	  
    </div>
</div>

