<div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                    &nbsp;
                    <small>
                        &nbsp;
                    </small>
                </h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><?php echo $status; ?> <small>Employees</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>ACTION</th>
                        <th>GENERATE</th>
                        <th>Employee No.</th>
                        <th>Employee Name</th>
                        <th>Gender</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php if($request != 0){
						foreach($request as $r){
							?>
						<tr>
							<td>
								<a href=""><i class="fa fa-pencil"></i></a> |
								<a href=""><i class="fa fa-user"></i></a> |
								<a href=""><i class="fa fa-trash"></i></a>
							</td>
							<td>
								<button class="btn btn-success"><i class="fa fa-print"></i> LEDGER</button>
								<button class="btn btn-success"><i class="fa fa-print"></i> PDS</button>
								<button class="btn btn-success"><i class="fa fa-print"></i> SRV RCRD</button>
							</td>
							<td><?php echo $r->a_empno; ?></td>
							<td><?php echo $r->a_firstname.' '.$r->a_middlename.' '.$r->a_lastname; ?></td>
							<td><?php ?></td>
                      </tr>
					<?php } } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
                </div>
              </div>
            </div>