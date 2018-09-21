<!-- page content -->
<div class="right_col holiday-page" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Request Leave</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="form-horizontal row filter">
                            <div class="form-group col-md-2 col-sm-3 col-xs-12">
                                <label>Date Approved <sup>(From)</sup></label>
                                <input type="text" id="fini" placeholder="yyyy-mm-dd" class="form-control date">
                            </div>
                            <div class="form-group col-md-2 col-sm-3 col-xs-12">
                                <label>Date Approved <sup>(To)</sup></label>
                                <input type="text" id="ffin" placeholder="yyyy-mm-dd" class="form-control date">
                            </div>
                            <div class="form-group col-md-2 col-sm-3 col-xs-12" id="filter_col3" data-column="2">
                                <label>Name</label>
                                <input type="text" class="form-control column_filter" id="col2_filter">
                            </div>
                            <div class="form-group col-md-2 col-sm-3 col-xs-12" id="filter_col10" data-column="9">
                                <label>Status</label>
                                <select class="form-control column_filter" id="col9_filter">
                                    <option value="">ALL</option>
                                    <option value="PERMANENT">PERMANENT</option>
                                    <option value="CASUAL">CASUAL</option>
                                    <option value="PROJECT BASED">PROJECT BASED</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2 col-sm-3 col-xs-12" id="filter_col14" data-column="13">
                                <label>Print Remark</label>
                                <select class="form-control column_filter" id="col13_filter">
                                    <option value="">All</option>
                                    <option value="Printed">Printed</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <table id="dt_leave" class="cell-border compact hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><input type="checkbox"/></th>
                                    <th>a_id</th>
                                    <th>Name</th>
                                    <th style="min-width:100px;">Date Filed</th>
                                    <th style="min-width:100px;">Date Approved</th> 
                                    <th>Type</th>
                                    <th style="min-width:100px;">Inclusive Dates</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Status</th>
                                    <th>SL</th>
                                    <th>VL</th>
                                    <th style="min-width:50px;">As of</th>
                                    <th style="min-width:100px;">Print Remark</th>  
                                </tr>
                            </thead>
                        </table>

                        <?php
                            $frm = array(
                                'id' => 'frm_leave_report',
                                'name' => 'frm_leave_report',
                                'target' => '_blank'

                                );
                            echo form_open('reports/leave_print_request',$frm);
                        ?>
                            <input type="hidden" name="l_id" id="l_id" />
                            <input type="hidden" name="a_id" id="a_id" />
    
                            <br/>
                            <button type="submit" class="btn btn-primary">Print Leave form</button>
                            <button type="button" id="btn_printsummary" name="btn_printsummary" class="btn btn-primary" target="_blank">Print Summary</button>
                        </form>

                   </div>
                </div>
            </div>
        </div>
    </div>
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
<!-- /page content -->
