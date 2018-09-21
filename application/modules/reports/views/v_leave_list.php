<!-- page content -->
<div class="right_col holiday-page" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="form-horizontal row filter">
                            <div class="form-group col-md-2 col-sm-3 col-xs-12">
                                <label>Date Filed <sup>(From)</sup></label>
                                <input type="text" id="fini" placeholder="yyyy-mm-dd" class="form-control date">
                            </div>
                            <div class="form-group col-md-2 col-sm-3 col-xs-12">
                                <label>Date Filed <sup>(To)</sup></label>
                                <input type="text" id="ffin" placeholder="yyyy-mm-dd" class="form-control date">
                            </div>
                            <div class="form-group col-md-2 col-sm-3 col-xs-12" id="filter_col1" data-column="0">
                                <label>Name</label>
                                <input type="text" class="form-control column_filter" id="col0_filter">
                            </div>
                            <div class="form-group col-md-2 col-sm-3 col-xs-12" id="filter_col5" data-column="4">
                                <label>Application</label>
                                <select class="form-control column_filter" id="col4_filter">
                                    <option value="Applied">Applied</option>
                                    <option value="Cancelled">Cancelled</option>
                                    <option value="">ALL</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-horizontal row filter">
                            <div class="form-group col-md-2 col-sm-3 col-xs-12" id="filter_col13" data-column="12">
                                <label>Supervisor</label>
                                <select class="form-control column_filter" id="col12_filter">
                                    <option value="">ALL</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Disapprov">Disapproved</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2 col-sm-3 col-xs-12" id="filter_col14" data-column="13">
                                <label>Head</label>
                                <select class="form-control column_filter" id="col13_filter">
                                    <option value="">ALL</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Disapprov">Disapproved</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2 col-sm-3 col-xs-12" id="filter_col15" data-column="14">
                                <label>HR</label>
                                <select class="form-control column_filter" id="col14_filter">
                                    <option value="">ALL</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Disapprov">Disapproved</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2 col-sm-3 col-xs-12" id="filter_col16" data-column="15">
                                <label>Final</label>
                                <select class="form-control column_filter" id="col15_filter">
                                    <option value="">ALL</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Disapproved">Disapproved</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4 col-sm-4 col-xs-12" id="filter_col12" data-column="11">
                                <label>Office</label>
                                <select class="form-control column_filter" id="col11_filter">
                                    <option value="">ALL</option>
                                </select>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <table id="dt_leavemasterlist" class="cell-border compact hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th  style="min-width:70px;">Date Filed</th>
                                    <th>Type</th>
                                    <th style="min-width:100px;">Inclusive Dates</th>
                                    <th>Application</th>

                                    <th>Supervisor</th>
                                    <th>Head</th>
                                    <th>HR</th>
                                    <th>Final</th>

                                    <th>Status</th>
                                    <th>Position</th>
                                    <th>Office</th>

                                    <th>Supervisor</th>
                                    <th>Head</th>
                                    <th>HR</th>
                                    <th>Final</th>

                                    <th>SL</th>
                                    <th>VL</th>
                                    <th style="min-width:50px;">As of</th>
                                </tr>
                            </thead>
                        </table>
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
