<!-- page content -->
<div class="right_col holiday-page" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Request Record</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="form-horizontal row filter">
                            <div class="form-group col-md-2 col-sm-3 col-xs-12">
                                <label >From</label>
                                <input type="text" id="fini" placeholder="yyyy-mm-dd" class="form-control date">
                            </div>
                            <div class="form-group col-md-2 col-sm-3 col-xs-12">
                                <label>To</label>
                                <input type="text" id="ffin" placeholder="yyyy-mm-dd" class="form-control date">
                            </div>
                            <div class="form-group col-md-2 col-sm-3 col-xs-12" id="filter_col3" data-column="2">
                                <label>Type</label>
                                <select class="form-control column_filter" id="col2_filter">
                                    <option value="">All</option>
                                    <option value="Employment Certificate">Employment Certificate</option>
                                    <option value="Employment Certificate - Income & Benefits">Employment Certificate - Income & Benefits</option>
                                    <option value=" Service Record">Service Record</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2 col-sm-3 col-xs-12" id="filter_col9" data-column="8">
                                <label>Remark</label>
                                <select class="form-control column_filter" id="col8_filter">
                                    <option value="">All</option>
                                    <option value="Printed">Printed</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <table id="dt_requestrecord" class="cell-border compact hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Copies</th>
                                    <th style="min-width:70px;">Date Filed</th> 
                                    <th>Purpose</th> 
                                    <th>Processby</th> 
                                    <th style="min-width:80px;">Printed Date</th> 
                                    <th>Remark</th>  
                                </tr>
                            </thead>
                        </table>

                        <?php
                            $frm = array(
                                'id' => 'frm_request_report',
                                'name' => 'frm_request_report',
                                'target' => '_blank'

                                );
                            echo form_open('reports/request',$frm);
                        ?>
                            <input type="hidden" name="r_id" id="r_id" />
                            <input type="hidden" name="a_id" id="a_id" />
                            <input type="hidden" name="r_type" id="r_type" />
                            <input type="hidden" name="r_noofcopy" id="r_noofcopy" />
                            <br/>
                            <button type="submit" class="btn btn-primary">Process</button>
                        </form>

                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
