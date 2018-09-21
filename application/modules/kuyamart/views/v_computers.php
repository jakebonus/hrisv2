<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
			<div class="col-md-4 col-sm-12 col-xs-12">
                <div class="x_panel">
					<div class="x_content">
					<form id="frm_computer" name="frm_computer">
						<div class="col-md-12 col-sm-12 col-xs-12 btn-group">
									<a type="button" id="btn_addnew" class="btn btn-primary col-xs-6"><i class="fa fa-plus"> </i> Add New</a>
									<a type="button" id="btn_reloadtable" class="btn btn-primary col-xs-6"><i class="fa fa-refresh"> </i> Reload Table</a>
							</div>
							 <input type="text" class="form-control" id="kuya_id" name="kuya_id">
						<div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12">Computer #</label>
                                <div class="col-md-12 col-sm-12 col-xs-12" id="filter_col2" data-column="1">
                                    <input type="text" class="form-control" id="kuya_compnum" name="kuya_compnum" required>
                                </div>
                         </div>
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12">Computer Name</label>
                                <div class="col-md-12 col-sm-12 col-xs-12" id="filter_col2" data-column="1">
                                    <input type="text" class="form-control" id="kuya_compname" name="kuya_compname" required>
                                </div>
                         </div>
						 
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12">Group</label>
                                <div class="col-md-12 col-sm-12 col-xs-12" id="filter_col2" data-column="1">
                                    <input type="text" class="form-control" id="kuya_group" name="kuya_group" required>
                                </div>
                         </div>
						 
							<div class="col-md-12 col-sm-12 col-xs-12 btn-group">
									<button type="submit" class="btn btn-success col-xs-6"><i class="fa fa-save"> </i> Save</button>
									<a type="button" id="btn_delete" class="btn btn-danger col-xs-6"><i class="fa fa-remove"> </i> Remove</a>
							</div>
					</form>
					</div>
				</div>
			</div>
		
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">

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
                        <table id="dt_computers" class="cell-border compact hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Computer #</th>
									<th>Computer Name</th>
									<th>Group</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


