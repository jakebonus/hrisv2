<!-- page content -->
<div class="right_col holiday-page" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Leave Filed</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                     
                        <br/>
                        <table id="dt_leave_request" class="cell-border compact hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Type of Application</th>
                                    <th>Leave Type</th>
									<th>Date Filed</th>
                                    <th>Supervisor</th>
                                    <th>Head</th>
                                    <th>HR Status</th>
                                    <th>Final Status</th>
                                    <th>Inclusive Date</th>
                                    <th>VL</th>
                                    <th>SL</th>
									<th>As of</th>
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
<div class="modal fade" id="frm_cancel_leave_application" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <form id="frm_cancel_leave" name="frm_cancel_leave" method="post">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Action Confirmation</h4>
                    </div>
                </div>
                <div class="modal-body">
					<input type="hidden" id="m_l_id" name="m_l_id" class="m_l_id" value="">
					<div class="row">
					<div class="col-md-12">
						<h4>Are you sure you want to cancel you leave application?</h4>
					</div>
					</div>
                </div>
                <div class="modal-footer">
					
								<button type="button" class="btn btn-success" id="btn_leaveAppliedClosedModal" data-dismiss="modal">Close</button>
							
								<button type="submit" class="btn btn-warning" > Cancel My Leave Application</button>
					
                </div>

            </div>
        </div>
    </form>
</div>
