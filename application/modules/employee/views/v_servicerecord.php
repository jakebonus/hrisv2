      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">


          <div class="row">

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Service Record</h2>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
					<div class="row">

					<div class="col-lg-3 col-md-4 col-xs-12 col-sm-12">
					<div class="col-xs-12" id="filter_col2">
						<select class="form-control column_filter" id="col1_filter" data-column="1">

							<option value="yes" selected> Yes</option>
							<option value="no"> No</option>
							<option value=""> -- All -- </option>
						</select>
						<hr>
					</div>
					<table id="dt_employee_sr" class="cell-border compact hover dt-employee-sv">
							<thead>
							  <tr>
								<th>Employee Name</th>
								<th>Active?</th>
							  </tr>
							</thead>
						  </table>

						<!--
							<label class="form-label">Department:</label>
							<select class="form-control" id="a_office" name="a_office">

							</select>


							<label class="form-label">Division:</label>
							<select class="form-control" id="a_division" name="a_division">
								<option value="all"> ALL</option>
							</select>

							<label class="form-label">Status:</label>
							<select class="form-control" id="a_status" name="a_status">
								<option value="all">ALL</option>
								<option value="PERMANENT">PERMANENT</option>
								<option value="CASUAL">CASUAL</option>
								<option value="PROJECT BASED">PROJECT BASED</option>
							</select>

							<label class="form-label">Employee Name:</label>
							<select class="form-control" id="employee" name="employee">
								<option></option>
							</select>
						-->
						<!--div class="col-sm-2">
							<label class="form-label">&nbsp;</label>
							<button class="btn btn-success form-control" id="btn_loadsvr" name="btn_loadsvr"> Load</button>
						</div-->
					</div>
					<!--/div>
					<div class="row"-->

					<div class="col-lg-9 col-md-8 col-xs-12 col-sm-12">
						<div class="col-sm-12">
						<div class="col-sm-2">
							<button id="add_new_svr" name="add_new_svr" class="btn btn-primary form-control"><i class="fa fa-plus"></i> Add New</button>
						</div>
						<div class="col-sm-3">
							<label class="form-label" id="label"> <center>Add New Service Record </center></label>
						</div>

						</div>
						<?php
							$frm = array( 'id' => 'frm_servicerecord', 'name' => 'frm_servicerecord');
								echo form_open('servicerecord',$frm);
						?>


							<input readonly type="text" class="form-control" id="w_id" name="w_id">
							<input readonly type="text" class="form-control" id="a_id" name="a_id">

						<div class="col-sm-2">
							<label class="form-label">From</label>
							<input type="text" class="form-control date" id="p_from" name="p_from" required>
						</div>
						<div class="col-sm-2">
							<label class="form-label">To</label>
							<input type="text" class="form-control date" id="p_to" name="p_to">
						</div>
						<div class="col-sm-3">
							<label class="form-label">Position</label>
							<input type="text" class="form-control" id="p_position" name="p_position" required>
						</div>
						<div class="col-sm-2">
							<label class="form-label">Appointment</label>
							<!--input type="text" class="form-control " id="p_appointment" name="p_appointment" required -->
							<select type="text" id="p_appointment" name="p_appointment" class="form-control col-md-4" required>
								<option>-- Choose --</option>
								<option value="PERMANENT">Permanent</option>
								<option value="CO-TERMINUS">Co-Termnus</option>
								<option value="ELECTED">Elected</option>
								<option value="CASUAL">Casual</option>
								<option value="PROJECT BASED">Project Based</option>
							</select>
						</div>

						<div class="col-sm-3">
							<label class="form-label">Monthly Salary:</label>
							<input type="text" class="form-control currency" id="p_salarymonthly" name="p_salarymonthly" required>
						</div>
						<div class="col-sm-3">
							<label class="form-label">Station Department</label>
							<input type="text" class="form-control" id="p_dept" name="p_dept" required>
						</div>

						<div class="col-sm-2">
							<label class="form-label">Station Division</label>
							<input type="text" class="form-control" id="p_div" name="p_div" required>
						</div>
						<div class="col-sm-4">
							<label class="form-label">Company/Agency/Branch:</label>
							<input type="text" class="form-control " id="p_company" name="p_company" required>
						</div>
						<div class="col-sm-2">
							<label class="form-label">Salary Grade</label>
							<!--input type="text" class="form-control " id="p_salarygrade" name="p_salarygrade"-->
							<select name="p_salarygrade" id="p_salarygrade" class="form-control" required>
										<option>-- Choose --</option>
										<option value="1" >1</option>
										<option value="2" >2</option>
										<option value="3" >3</option>
										<option value="4" >4</option>
										<option value="5" >5</option>
										<option value="6" >6</option>
										<option value="7" >7</option>
										<option value="8" >8</option>

										<option value="9" >9</option>
										<option value="10" >10</option>
										<option value="11" >11</option>
										<option value="12" >12</option>
										<option value="13" >13</option>
										<option value="14" >14</option>
										<option value="15" >15</option>
										<option value="16" >16</option>

										<option value="17" >17</option>
										<option value="18" >18</option>
										<option value="19" >19</option>
										<option value="20" >20</option>
										<option value="21" >21</option>
										<option value="22" >22</option>
										<option value="23" >23</option>
										<option value="24" >24</option>

										<option value="25" >25</option>
										<option value="26" >26</option>
										<option value="27" >27</option>
										<option value="28" >28</option>
										<option value="29" >29</option>
										<option value="30" >30</option>
							</select>
						</div>
						<div class="col-md-1">
							<label class="form-label">Step: </label>
							<select name="p_salarystep" id="p_salarystep" class="form-control">
								<option class="form-control col-md-4">Choose Step</option>
								<option value="1" >1</option>
								<option value="2" >2</option>
								<option value="3" >3</option>
								<option value="4" >4</option>
								<option value="5" >5</option>
								<option value="6" >6</option>
								<option value="7" >7</option>
								<option value="8" >8</option>
							</select>
						</div>

						<div class="col-sm-2">
							<label class="form-label">Remarks:</label>
							<select type="text" id="p_note_remarks" name="p_note_remarks" class="form-control col-md-4" required>
								<option>-- Choose --</option>
								<option value="ORIGINAL APPOINTMENT">ORIGINAL APPOINTMENT</option>
								<option value="SALARY ADJUSTMENT">SALARY ADJUSTMENT</option>
								<option value="RE-EMPLOYMENT">RE-EMPLOYMENT</option>
								<option value="RE-APPOINTMENT">RE-APPOINTMENT</option>
								<option value="PROMOTION">PROMOTION</option>
								<option value="STEP-INCREMENT">STEP-INCREMENT</option>
							</select>
						</div>


						<div class="col-sm-1">
							<label class="form-label">LWOP:</label>
							<input type="text" class="form-control numeric" id="p_lwop" name="p_lwop" >
						</div>
						<div class="col-sm-2">
							<label class="form-label">Separation Date:</label>
							<input type="text" class="form-control date" id="p_sept_date" name="p_sept_date" >
						</div>
						<div class="col-sm-3">
							<label class="form-label">Separation Cause:</label>
							<input type="text" class="form-control" id="p_sept_cause" name="p_sept_cause" >
						</div>
						<div class="col-sm-2">
							<label class="form-label">&nbsp;</label>
							<button class="btn btn-success form-control" id="btn_save_sr"><i class="fa fa-save"></i> Save New</button>
						</div>

						<div class="col-sm-2">
						<label class="form-label">&nbsp;</label>
							<a class="form-control btn btn-danger"
									id="modal_id"
									data-toggle="modal"
									data-target="#modal_svr_delete"
									>
							<i class="fa fa-remove"></i> Delete</a>
						</div>
						</form>

						<div class="col-sm-12">
						<hr>
						  <table id="dt_employee_service_record" class="cell-border compact hover">
							<thead>
							  <tr>
								<th>w_id</th>
								<th>a_id</th>
								<th>Position</th>
								<th>From - To</th>
								<th>SG</th>
								<th>Status</th>
								<th>Mo. Salary</th>
								<th>Company/Agency</th>
								<th>Department</th>
								<th>Division</th>
								<th>LWOP</th>
								<th>Separation Date</th>
								<th>Separation Cause</th>
								<th>Separation Remarks</th>
							  </tr>
							</thead>
						  </table>
						</div>
					</div>
					</div>
					<div class="row">

				  </div>
              </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /page content -->



<!-- Delete Educ -->
<div class="modal fade" id="modal_svr_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="frm_svr_delete" name="frm_svr_delete" method="post" action="#">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this service record?</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <center>
						<h4 class="p_title form-label"> No Service Record Selected</h4>
					</center>
					<input type="hidden" id="m_is_svr" name="m_is_svr" value="0">
					<input type="hidden" id="m_w_id" name="m_w_id" value="">
                </div>
                <div class="modal-footer">
                    <button id="btn_close"
							type="button"
							class="btn btn-primary"
							data-dismiss="modal">
							<i class="glyphicon glyphicon-remove"></i>
					Close</button>
                    <button type="submit"
							id="btn_approved"
							name="btn_approved"
							class="btn btn-success">
							<i class="glyphicon glyphicon-check"></i>
					Delete</button>
                </div>

            </div>
        </div>
    </form>
</div>
