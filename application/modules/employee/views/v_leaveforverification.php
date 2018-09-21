      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
        

          <div class="row">

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Employee<small>Leave</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
					<div class="row">
					<form id="frm_leaveverification" name="frm_leaveverification">
					<input type="hidden" id="l_id" name="l_id">
						<div class="col-md-4">
							<label class="form-label">Employee Name - Office :</label>
							<input readonly class="form-control"  type="text" id="emp_name" name="emp_name" required>
						</div>
						<div class="col-md-2">
							<label class="form-label">Type of Leaves Name:</label>
							<input readonly class="form-control" type="text" id="l_type" name="l_type">
						</div>
            <div class="col-md-1">
              <label class="form-label">VL:</label>
              <input class="form-control numeric" type="text" id="l_vl" name="l_vl"  required>
            </div>
						<div class="col-md-1">
							<label class="form-label">SL:</label>
							<input class="form-control numeric" type="text" id="l_sl" name="l_sl" required>
						</div>
						<div class="col-md-2">
							<label class="form-label">As Of:</label>
							<input class="form-control date" type="text" id="l_asof" name="l_asof" value="<?php echo date('Y-m-d'); ?>">
						</div>
						<div class="col-md-2">
							<label class="form-label ">&nbsp; </label>
							<button type="submit" class="btn btn-success form-control"><i class="fa fa-save"></i> Save</button>
						</div>
						<div class="row">
							<div class="col-md-12">
								<hr>
							</div>
						</div>
						<div class="x_content"></div>
					</form>
					</div>
                  <table class="cell-border compact hover" id="db_employee_leave_for_verification">
                    <thead>
                      <tr>
                        <th>ID </th>
                        <th>Employee Name </th>
                        <th>Datefiled</th>
                        <th>Leave Type</th>
                        <th>Inclusive Dates</th>
                        <th>Office</th>
                        
                        <th>Position</th>
                        
                        
                      
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


<div class="modal fade" id="frm_approval_confirmation_leave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="frm_approved_leave" name="frm_approved_leave" method="post">
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
						<label class="form-label">Take a Action for:&nbsp;</label><label class="p_title form-label"></label>
					</div>
					</div>
                </div>
                <div class="modal-footer">
					<div class="row">
						<div class="col-sm-12">
							<div class="col-sm-12">
						<button  type="button" class="btn btn-warning pull-right" data-dismiss="modal"> Close</button>
							</div>
							<div class="col-sm-12">
					<button type="submit" class="btn btn-success pull-right"> Approved</button>
							</div>
						</div>
					</div>
                </div>

            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="frm_disapproval_confirmation_leave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <form id="frm_disapproved_leave" name="frm_disapproved_leave" method="post" action="#">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Disapproved Leave</h4>
                    </div>
                </div>
                <div class="modal-body">
                
						<h5 class="p_title form-label"></h5>
					
						<input type="hidden" id="m_l_id" name="m_l_id" class="m_l_id" value="">
					
					<div class="row">
					<div class="col-md-12">
						<label class="form-label">Reason for not approval</label>
						<input type="text" id="m_l_disapprovereason" name="m_l_disapprovereason" class="m_l_disapprovereason form-control" value="">
					</div>
					</div>
                </div>
                <div class="modal-footer">
                    <button id="btn_cancel" type="button" class="btn btn-primary" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> CANCEL</button>
                    <button type="submit" id="btn_approved" name="btn_approved" class="btn btn-danger"><i class="fa fa-thumbs-o-down"></i> Disapproved</button>
                </div>

            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="emp_pic" tabindex = "-1" role = "dialog" aria-hidden = "true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Modal Header</h5>
        </div>
        <div class="modal-body">
            <p class="position"></p>
            <p class="office"></p>
            <img src="" id="pic_id" style="width:100%;border:1px solid #91929f;"/>
        </div>
        
      </div>
    </div>
</div>
