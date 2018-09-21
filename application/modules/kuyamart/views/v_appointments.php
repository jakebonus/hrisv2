<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
						
                        <table id="dt_onlineapplicantforaction" class="cell-border compact hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
									<th><center><input type="checkbox"></center></th> <!-- 1 -->
                                    <th>Applicant #</th>
                                    <th>Applicant Name</th>
                                    <th>Position</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                        </table>
						<div class="row">
							 <div class="x_content">
								<div class="col-xs-4">
									<a  data-toggle="modal" data-target="#mdl_applicantforaction" data-title="Online Applicant for your action"  id="btn_approved_applicant" name="btn_approved_applicant" class="btn btn-md btn-round btn-primary">Action</a>
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
					<input type="text" id="m_ah_id" name="m_ah_id>">
					<button type="button" id="btn_disapproved" name="btn_disapproved" class="col-xs-6 btn btn-default" data-dismiss="modal">Disapproved</button>
					<button type="button" id="btn_approved" name="btn_approved" class="col-xs-6 btn btn-success" data-dismiss="modal" >Approved</button>
				</div>
				<!--/div-->
			</div>
        </div>
		<div class="" id="modal_footer">
			<br/>
        </div>
		</form>
      </div>
    </div>
</div>



