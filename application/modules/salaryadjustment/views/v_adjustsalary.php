<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">

                        <div class="form-horizontal row filter">
                        	
                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                                <div class="col-md-9 col-sm-9 col-xs-12" id="filter_col2" data-column="1">
                                    <input type="text" class="column_filter form-control" id="col1_filter" autocomplete="on">
                                </div>
                            </div>
							

                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender </label>
                                <div class="col-md-9 col-sm-9 col-xs-12" id="filter_col9" data-column="8">
                                    <select class="column_filter form-control" id="col8_filter">
                                        <option value="">All</option>
                                        <option value="F">FEMALE</option>
                                        <option value="M">MALE</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Office </label>
                                <div class="col-md-9 col-sm-9 col-xs-12" id="filter_col7" data-column="6">
                                    <select class="column_filter form-control" id="col6_filter">
                                        <option value="">ALL</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Division </label>
                                <div class="col-md-9 col-sm-9 col-xs-12" id="filter_col8" data-column="7">
                                    <select class="column_filter form-control" id="col7_filter">
                                        <option value="">ALL</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Position </label>
                                <div class="col-md-9 col-sm-9 col-xs-12" id="filter_col5" data-column="4">
                                    <select class="column_filter form-control" id="col4_filter">
                                    </select>
                                </div>
                            </div>

                            <!--div class="form-group col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Status </label>
                                <div class="col-md-9 col-sm-9 col-xs-12" id="filter_col5" data-column="4">
                                    <select class="column_filter form-control" id="col4_filter">
                                        <option value="">ALL</option>
                                        <option value="PERMANENT">PERMANENT</option>
                                        <option value="CASUAL">CASUAL</option>
                                        <option value="PROJECT BASED">PROJECT BASED</option>
                                    </select>
                                </div>
                            </div-->


                        </div>
                        <br/>

                        <style>
                            ul#menu6 {
                                left: 60px;
                                top: -7px;
                            }
                            
                            ul#menu6 li {
                                display: inline-flex;
                            }
                        </style>
                        <table id="dt_employee_for_salary_adjustment" class="cell-border compact hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                  <th><input type="checkbox"></th>
                                    <th>NAME</th>
									<th>POSITION</th>
									<th>STATUS</th>
									 
                                    <th>LAST DATE PROMOTED</th>
                                    <th>NOTE</th>
                                    <th>REMARKS</th>
                                   
                                   
                                    <th>OFFICE</th>
                                    <th>DIVISION</th>
                                    <th>GENDER</th>
                                    <th>Employee No.</th>
                                    <th>Machine No.</th>
                                </tr>
                            </thead>
                        </table>
						<div class="row">
							<div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
								<br/>
							</div>
							<div class="col-md-2 col-md-2 col-sm-2 col-xs-12">
								<label class="form-label">Effectivity Date</label>
							</div>
							<div class="col-md-2 col-md-2 col-sm-2 col-xs-12">
								<input type="text" name="p_effectivitydate" id="p_effectivitydate" required="required" class="form-control col-md-3 col-xs-12 date">
							</div>
								<button id="btn_promote" name="btn_promote" class="btn btn-primary"> PROCESS!</button>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="modal-isactive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <p class="name"></p>
                <!--p class="debug-url"></p-->
            </div>
            <div class="modal-footer">
                <?php
                    $frm = array(
                        'id' => 'frm_isactivate',
                        'name' => 'frm_isactivate'
                        );
                    echo form_open('employee/ajax_delete_employee',$frm);
                ?>
                	<input type="hidden" name="del_a_id" class="del_a_id" />
                	<!-- <a class="btn btn-default" data-dismiss="modal">Cancel</button> -->
                	<button type="submit" class="btn btn-danger btn-ok"></button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="frm_viewledger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                <div>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                    <h4 class="modal-title" id="myModalLabel">PLEASE SELECT YEAR</h4>
                </div>
            </div>

            <form id="frm_ledger" target="_blank" name="frm_ledger" method="POST" action="<?php echo base_url('employee/viewledger/');?>">
                <div class="modal-body">
                    <p class="p_title"></p>
                    <input type="hidden" id="m_a_id" name="m_a_id" class="m_a_id" value="">
                    <hr>
                    <select name="b_year" id="b_year" class="btn btn-default" required>
                        <option value="">Please Select year:</option>
                        <?php
							for ($i=date("Y"); $i>2008; $i--) 
							{ 
								echo "<option>$i</option>\n"; 
							} 
						?>
                    </select>
                </div>

                <div class="modal-footer">
                    <button id="btn_cancel" type="button" class="btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> CANCEL</button>
                    <input target="_blank" type="submit" id="btn_viewledger" href="#" class="btn btn-success" value="VIEW LEDGER" /><i class="glyphicon glyphicon-profile"></i>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /page content -->

<div class="modal fade" id="modal-servicerecord" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Service Record</h4>
            </div>
            <div class="modal-body">
            <div class="table-responsive">
               <table class="table">
                  <thead>
                    <tr>
                      <th>Position</th>
                      <th>Form</th>
                      <th>To</th>
                      <th>Salary Grade</th>
                    </tr>
                  </thead>
                  <tbody class="sr_content">
                    <tr>
                    <tr>
                  </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
