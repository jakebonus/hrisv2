<!-- page content -->
<div class="right_col holiday-page" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-users"></i> PERSONNEL REQUEST</h2>
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
<div class="modal fade" id="modal_cancelrequest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<form id="frm_cancelrequest" name="frm_cancelrequest" method="post">
            <div class="modal-content">
                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Action Confirmation</h4>
                    </div>
                </div>
                <div class="modal-body">
					<input type="hidden" id="m_jm_id" name="m_jm_id" value="">
						<div class="row">
							<div class="col-md-12">
								<h5>Are you sure you want to cancel your personnel request?</h5>
							</div>
						</div>
                </div>
                <div class="modal-footer">
					<div class="btn-group">
						<button type="button" class="btn btn-success" data-dismiss="modal">No</button>
						<button type="submit" class="btn btn-warning" > Yes</button>
					</div>
                </div>
            </div>
		</form>
	</div>
</div>
