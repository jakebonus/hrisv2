<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
		
		
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
				<div class="x_title">
                    <h2>Courses<small> ...</small></h2>
					<div class="clearfix"></div>
				</div>
                    <div class="x_content">
						<div class="row">
							<div class="col-md-12">
							<form id="frm_courses" name="frm_courses">
							<input type="hidden" class="form-control" id="c_id" name="c_id">
								<div class="col-md-12">
									<label class="form-label">Course Name</label>
									<input type="text" class="form-control" id="c_name" name="c_name">
								</div>
								<div class="col-md-3">
									<label class="form-label">Course Code</label>
									<input type="text" class="form-control" id="c_code" name="c_code">
								</div>
								<div class="col-md-6">
									<label class="form-label">Course Category</label>
									<input type="text" class="form-control" id="c_category" name="c_category">
								</div>
								<div class="col-md-3 col-sm-6 col-xs-12 btn-group">
									<br/>
										<button type="submit" class="btn btn-success col-xs-6"><i class="fa fa-save"> </i> </button>
										<button type="button" id="btn_deletecourse" class="btn btn-danger col-xs-6"><i class="fa fa-remove"> </i> </button>
								</div>	
							</form>
							</div>
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
                        <table id="dt_courses" class="cell-border compact hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
									<th>Code</th>
									<th>Category</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


