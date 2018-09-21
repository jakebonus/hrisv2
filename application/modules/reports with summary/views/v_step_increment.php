<!-- page content -->
<div class="right_col holiday-page" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <!-- <div class="x_title">
                        <h2>Request Record</h2>
                        <div class="clearfix"></div>
                    </div> -->
                    <div class="x_content">
                        <div class="form-horizontal row filter">
                            <div class="form-group col-md-3 col-sm-3 col-xs-12">
                                <label >From</label>
                                <input type="text" id="fini" placeholder="yyyy-mm-dd" class="form-control date">
                            </div>
                            <div class="form-group col-md-3 col-sm-3 col-xs-12">
                                <label>To</label>
                                <input type="text" id="ffin" placeholder="yyyy-mm-dd" class="form-control date">
                            </div>
                            <div class="form-group col-md-3 col-sm-3 col-xs-12" id="filter_col3" data-column="2">
                                <label>Name</label>
                                <input class="form-control column_filter" id="col2_filter">
                            </div>
                            <div class="form-group col-md-3 col-sm-3 col-xs-12" id="filter_col4" data-column="3">
                                <label>Remark</label>
                                <select class="form-control column_filter" id="col3_filter">
                                    <option value="">All</option>
                                    <option value="NOSI" selected="selected">NOSI</option>
                                    <option value="ORIGINAL APPOINTMENT">ORIGINAL APPOINTMENT</option>
                                    <option value="PROMOTION">PROMOTION</option>
                                    <option value="RE-EMPLOYMENT">RE-EMPLOYMENT</option>
                                    <option value="RE-APPOINTMENT">RE-APPOINTMENT</option>
                                    <option value="STEP-INCREMENT">STEP-INCREMENT</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3 col-sm-3 col-xs-12" id="filter_col6" data-column="5">
                                <label>Position</label>
                                <select class="form-control column_filter" id="col5_filter">
                                </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-3 col-xs-12" id="filter_col7" data-column="6">
                                <label>Status</label>
                                <select class="form-control column_filter" id="col6_filter">
                                    <option value="">ALL</option>
                                    <option value="PERMANENT">PERMANENT</option>
                                    <option value="CASUAL">CASUAL</option>
                                    <option value="PROJECT BASED">PROJECT BASED</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-3 col-xs-12" id="filter_col8" data-column="7">
                                <label>Office</label>
                                <select class="form-control column_filter" id="col7_filter">
                                </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-3 col-xs-12" id="filter_col9" data-column="8">
                                <label>Division</label>
                                <select class="form-control column_filter" id="col8_filter">
                                </select>
                            </div>
                        </div>
                        <br/>
                       
                        <table id="dt_stepincrement" class="cell-border compact hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><input type="checkbox"></th>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Remarks</th>
                                    <th>From</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th>Office</th> 
                                    <th>Division</th> 
                                    <th>Gender</th>  
                                    
                                </tr>
                            </thead>
                        </table>

                        <?php
                            $frm = array(
                                'id' => 'frm_get_ids',
                                'name' => 'frm_get_ids',
                                'target' => '_blank'

                                );
                            echo form_open('reports/nosi_report',$frm);
                        ?>
                            <input type="hidden" name="w_id" id="w_id1" />
                            <br/>
                            <button id="btn_process" class="btn btn-primary"> PROCESS</button>
                        </form>
                        

                        

                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
