  <!-- page content -->
        <div class="right_col m-page" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Salary Grade</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table id="dt_sg" class="cell-border compact hover" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Grade</th>
                            <th>Step</th>
                            <th>Monthly Salary</th>
                            <th>Effectivity Date</th>
                          </tr>
                        </thead>
                      </table>
                  </div>
                </div>
              </div>
			  
              
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 class="edit-title">Modified</h2>
                        <div class="clearfix"></div>
                    </div>
					 <div class="x_content">
                        <div class="add-section">
							<button id="btn_new_sg" name="btn_new_sg" class="btn btn-info"><i class="fa fa-plus"></i> Add New</button>
						</div>
                    </div>
					
                    <div class="x_content">
                        <div class="add-section">
                            <?php
                              $frm_sg = array(
                                'id' => 'frm_sg',
                                'name' => 'frm_sg',
                                'class' => 'add form-horizontal form-label-left input_mask'
                              );
                              echo form_open('salarygrade/ajax_save_sg',$frm_sg);
                            ?>
                                
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Grade <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
											<input type="hidden" id="ss_id" name="ss_id" value="">
                                            <select class="form-control col-md-7 col-xs-12" id="ss_grade" name="ss_grade">
                                            <option value="1">Grade 1</option>
										<option value="2">Grade 2</option>
										<option value="3">Grade 3</option>
										<option value="4">Grade 4</option>
										<option value="5">Grade 5</option>
										<option value="6">Grade 6</option>
										<option value="7">Grade 7</option>
										<option value="8">Grade 8</option>
										
										<option value="9">Grade 9</option>
										<option value="10">Grade 10</option>
										<option value="11">Grade 11</option>
										<option value="12">Grade 12</option>
										<option value="13">Grade 13</option>
										<option value="14">Grade 14</option>
										<option value="15">Grade 15</option>
										<option value="16">Grade 16</option>
										
										<option value="17">Grade 17</option>
										<option value="18">Grade 18</option>
										<option value="19">Grade 19</option>
										<option value="20">Grade 20</option>
										<option value="21">Grade 21</option>
										<option value="22">Grade 22</option>
										<option value="23">Grade 23</option>
										<option value="24">Grade 24</option>
										
										<option value="25">Grade 25</option>
										<option value="26">Grade 26</option>
										<option value="27">Grade 27</option>
										<option value="28">Grade 28</option>
										<option value="29">Grade 29</option>
										<option value="30">Grade 30</option>
										</select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12 lbl-office" for="first-name">Step* <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                           <select class="form-control col-md-7 col-xs-12" id="ss_step" name="ss_step">
                                            <option value="1">Step 1</option>
										<option value="2">Step 2</option>
										<option value="3">Step 3</option>
										<option value="4">Step 4</option>
										<option value="5">Step 5</option>
										<option value="6">Step 6</option>
										<option value="7">Step 7</option>
										<option value="8">Step 8</option>
										
										</select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Monthly Salary<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="ss_monthly" id="ss_monthly" required="required" class="form-control col-md-7 col-xs-12 currency" maxlength="50">
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Effectivity Date <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="ss_effectivitydate" id="ss_effectivitydate" required="required" class="form-control col-md-7 col-xs-12 date" maxlength="50">
                                        </div>
                                    </div>
                                    
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-success form-control"><i class="fa fa-save"></i> Save</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
              </div>
            </div>

            </div>
          </div>
        </div>
        <!-- /page content -->
        
    <!-- Delete -->
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                </div>
                <div class="modal-body">
                    <p>Do you want to proceed?</p>
                    <!--p class="debug-url"></p-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>
