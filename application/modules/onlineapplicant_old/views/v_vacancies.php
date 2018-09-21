<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
			<div class="col-md-4 col-sm-12 col-xs-12">
                <div class="x_panel">
					<div class="x_content">
					<form id="frm_vacancies" name="frm_vacancies">
						<div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12">Position</label>
                                <div class="col-md-12 col-sm-12 col-xs-12" id="filter_col2" data-column="1">
                                    <input type="text" class="form-control" id="v_id" name="v_id" >
                                    <input type="text" class="form-control" id="v_position" name="v_position" >
                                </div>
                         </div>
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12">Description</label>
                                <div class="col-md-12 col-sm-12 col-xs-12" id="filter_col2" data-column="1">
                                    <input type="text" class="form-control" id="v_desc" name="v_desc" >
                                </div>
                         </div>
							<div class="col-md-12 col-sm-12 col-xs-12">
                                <button type="submit" class="btn btn-success form-control">Save</button>
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
                        <table id="dt_vacancies" class="cell-border compact hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Position</th>
									<th>Description</th>
									<th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


