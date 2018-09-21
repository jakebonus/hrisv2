<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
				<div class="x_title">
                    <h2>Vacancies<small> ...</small></h2>
					<div class="clearfix"></div>
				</div>
					<div class="x_content">
					<form id="frm_vacancies" name="frm_vacancies">
						<div class="col-md-6 col-sm-12 col-xs-12 btn-group">
									<a type="button" id="btn_addnew" class="btn btn-primary col-xs-6"><i class="fa fa-plus"> </i> Add New</a>
									<a type="button" id="btn_reloadtable" class="btn btn-primary col-xs-6"><i class="fa fa-refresh"> </i> Reload Table</a>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12 btn-group">
									<button type="submit" class="btn btn-success col-xs-6"><i class="fa fa-save"> </i> Save</button>
									<a type="button" id="btn_removeposition" class="btn btn-danger col-xs-6"><i class="fa fa-remove"> </i> Remove</a>
							</div>
							
						<div class="form-group col-md-12 col-sm-12 col-xs-12">
						</br>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
                                <label class="control-label">Position</label>
                                <!--div class="col-md-12 col-sm-12 col-xs-12" id="filter_col2" data-column="1"-->
                                    <input type="hidden" class="form-control" id="v_id" name="v_id" >
                                    <input type="text" class="form-control" id="v_position" name="v_position" required>
                                <!--/div-->
                         </div>
						<div class="col-md-6 col-sm-12 col-xs-12">
                               <label class="control-label">Is Available?</label>
									<select class="form-control" id="v_desc" name="v_desc" required>
										<option value="VACANT">YES</option>
										<option value="NO VACANCIES">NO</option>
									</select>
                             
                         </div>
						 	<div class="form-group col-md-12 col-sm-12 col-xs-12">
						</br>
						</div>
						 
							
					</form>
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
                                </tr>
                            </thead>
                        </table>
					</div>
				</div>
			</div>
		
            
        </div>
    </div>
</div>


