      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
        

          <div class="row">

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Education</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">

                  <table class="cell-border" id="datatable_employee_skillsapproved">
                    <thead>
                      <tr>
                        <th><input type="checkbox"></th>
                        <th>Employee Name </th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Skills</th>
                        <th>Remarks</th>
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
      <!-- /page content -->

	  
	  
<!-- Delete Educ -->
<div class="modal fade" id="frm_approval_confirmation_skills" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="frm_skillsapproved" name="frm_skillsapproved" method="post" action="#">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Action Confirmation</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <center>
						<h4 class="p_title form-label"></h4>
					</center>
					<input type="hidden" id="m_sh_id" name="m_sh_id" class="m_sh_id" value="">
					<input type="hidden" id="m_sh_forapproval" name="m_sh_forapproval" class="m_sh_forapproval" value="">
                </div>
                <div class="modal-footer">
                    <button id="btn_cancel" type="button" class="btn btn-primary" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> CANCEL</button>
                    <button type="submit" id="btn_approved" name="btn_approved" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> Approved</button>
                </div>

            </div>
        </div>
    </form>
</div>
