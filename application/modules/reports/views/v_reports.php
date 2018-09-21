<!-- page content -->
<div class="right_col holiday-page" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Reports</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php
                            $frm_add = array(
                                'id' => 'frm_generate_list',
                                'name' => 'frm_generate_list',
                                'class' => 'form-horizontal form-label-left input_mask',
								'target' => '_blank'
                            );
                            echo form_open('reports/employee_list',$frm_add);
                        ?>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="list" name="list" class="form-control">
                                        <option value="0">List of Employee</option>
                                        <option value="1">List of Employee - Summary</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">  
                                    <label></label>
                                    <label class="a_isactive">
                                      <input type="checkbox" id="a_isactive" name="a_isactive[]" value="1" checked=""> <span>Active Employees</span>
                                    </label>
 
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">  
                                    <label><strong>Employment Status</strong></label>
                                    <label>
                                      <input type="checkbox" id="permanent" name="status[]" value="PERMANENT" checked=""> Permanent
                                    </label>
                                    <label>
                                      <input type="checkbox" id="casual" name="status[]" value="CASUAL" checked=""> Casual
                                    </label>
                                    <label>
                                      <input type="checkbox" id="project-based" name="status[]" value="PROJECT BASED" checked=""> Project-Based
                                    </label>
                                 
                                    <!--label>
                                      <input type="checkbox" id="co-terminus" name="co-terminus" value="0"> Co-terminus
                                    </label>
                                 
                                    <label>
                                      <input type="checkbox" id="elected" name="elected" value="0"> Elected
                                    </label>
                                    <label>
                                      <input type="checkbox" id="sef" name="sef" value="0"> SEF
                                    </label-->
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label for="heard">Office:</label>
                                    <select id="a_office" name="a_office" class="form-control">
                                        <option value="ALL">ALL</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label for="heard">Division/Agency:</label>
                                    <select id="a_division" name="a_division" class="form-control">
                                        <option value="ALL">ALL</option>
                                    </select>
                                </div>
                            </div>
                            <p><button type="submit" class="btn btn-primary">Process</button></p>
                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
