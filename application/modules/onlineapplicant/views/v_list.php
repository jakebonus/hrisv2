<!-- page content -->




<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">

                        <!--form id="frm_applicant_search" name="frm_applicant_search" class=""-->
                        <div class="row filter">
                        	<div class="form-group col-xs-12">
                                <a  class="btn btn-primary" href="<?php echo base_url('onlineapplicant/encodeapplicant'); ?>" target="_blank"><i class="fa fa-plus"></i> Encode Applicant</a>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-12">Application #</label>
                                <div class="col-xs-12" id="filter_col2" data-column="1">
                                    <input type="text" class="column_filter form-control" id="col1_filter" name="col1_filter" autocomplete="on">
                                </div>
                            </div>
							

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-12">Course</label>
                                <div class="col-xs-12" id="filter_col10" data-column="9">
                                    <select class="column_filter form-control" id="col9_filter" name="col9_filter">
									 <option value="">All</option>
									 <option value="Elementary">Elementary</option>
									<option value="High School">High School</option>
									<option value="Vocational (2 years)">Vocational (2 years)</option>
									</select>
                                </div>
                            </div>
							
							
                            <div class="form-group col-xs-12">
                                <label class="control-labe col-xs-12">Gender </label>
                                <div class="col-xs-12" id="filter_col8" data-column="7">
                                    <select class="column_filter form-control" id="col7_filter" name="col7_filter">
                                        <option value="">All</option>
                                        <option value="F">FEMALE</option>
                                        <option value="M">MALE</option>
                                    </select>
                                </div>
                            </div>
							
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-12">Eligibility </label>
                                <div class="col-xs-12" id="filter_col5" data-column="4">
                                    <select class="column_filter form-control" id="col4_filter" name="col4_filter">
                                        <option value="">All</option>
										<option value="Bar/Board Eligibility (RA1080)">Bar/Board Eligibility (RA1080)</option>
										<option value="CSC Professional">CSC Professional</option>
										<option value="CSC Subprofessional">CSC Subprofessional</option>
										<option value="Barangay Official Eligibility (BOE)">Barangay Official Eligibility (BOE)</option>
										<option value="Honor Graduate Eligibility (PD907)">Honor Graduate Eligibility (PD907)</option>
										<option value="Sanggunian Member Eligibility (SME)">Sanggunian Member Eligibility (SME)</option>
										<option value="Skill Eligibility (CSC MC No, II)">Skill Eligibility (CSC MC No, II)</option>
                                    </select>
                                </div>
                            </div>
								<div class="form-group col-xs-12">
                                <label class="control-label col-xs-12">Position Desired </label>
                                <div class="col-xs-12" id="filter_col7" data-column="6">
                                    <select class="column_filter form-control" id="col6_filter">
                                          <option value="">All</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-12">Address (Brgy w/in CSFP)</label>
                                <div class="col-xs-12" id="filter_col14" data-column="13">
                                    <select class="column_filter form-control" id="col13_filter">
									  <option value="">All</option>
                                    </select>
                                </div>
                            </div>
							<div class="form-group col-xs-12">
                                <label class="control-label col-xs-12">Remarks</label>
                                <div class="col-xs-12" id="filter_col19" data-column="18">
                                    <select class="column_filter form-control" id="col18_filter">
									 <option value="">All</option>
									<option value="For Exam and Interview"> For Exam and Inital Interview</option>
									<option value="For Job Interview"> For Job Interview</option>
									<option value="For Filing"> For Filing</option>
									<option value="Forward to CESD">Forward to CESD</option>
									<option value="For Regret">For Regret</option>
                                    </select>
                                </div>
                            </div>
							
							<div class="form-group col-xs-12">
                                <label class="control-label col-xs-12">Application Date</label>
                                <div class="col-xs-12  btn-group" id="filter_col19" data-column="18">
                                    <input type="text" class="form-control date" id="fini" placeholder="From date">
									<input type="text" class="form-control date" id="ffin" placeholder="To date">
                                </div>
                            </div>
							
							<!--div class="row">
								<div class="col-md-2 col-xs-12 col-md-offset-10">
									<button type="submit" class="btn btn-success form-control" id="btn_search">Find</button>
								</div>
							</div-->

                        </div>
                        <!--/form-->
                        <br/>

         
                        
					</div>
				    
                </div>
					
            </div>	
			<div class="col-md-9 col-sm-8 col-xs-12">
                <div class="x_panel">
	
                    <div class="x_content">
					<style>
                            ul#menu6 {
                                left: 60px;
                                top: -7px;
                            }
                            
                            ul#menu6 li {
                                display: inline-flex;
                            }
                        </style>
                        <table id="dt_onlineapplicant" class="cell-border compact hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><center><input type="checkbox"></center></th> <!-- 1 -->
                                    <th>Applicant #</th> 							<!-- 2 -->
									<th>Name</th> 									<!-- 3 -->
									<th>Education</th> 								<!-- 4 -->
									<th>Eligibility</th> 							<!-- 5 -->
									<th>Cellphone #</th> 							<!-- 6 -->
									<th>Position Desired</th> 						<!-- 7 -->
									<th>Gender</th>									<!-- 8 -->
									<th>Email</th> 									<!-- 9 -->
									<th>Course</th> 								<!-- 10 -->
									<th>School</th> 								<!-- 11 -->
									<th>Province</th> 								<!-- 12 -->
									<th>City</th> 									<!-- 13 -->
									<th>Brgy</th> 									<!-- 14 -->
									<th>Skills</th> 								<!-- 15 -->
									<th>Award</th> 									<!-- 16 -->
									<th>Bdate</th>									<!-- 17 -->
									<th>Age</th> 									<!-- 18 -->
									<th>Remarks</th> 								<!-- 19 -->
									<th>Date Applied</th> 							<!-- 20 -->
									<th>HR Officer</th> 							<!-- 21 -->
									<th>Action Date</th> 							<!-- 22 -->
									<th>App History</th> 							<!-- 23 -->
									<th>Email Sent</th> 							<!-- 24 -->
									<th>Remarks Status</th> 							<!-- 24 -->
									<th>Remarks Status Date</th> 							<!-- 24 -->
                                </tr>
                            </thead>
                        </table>
					
				</div>
				</div>
            </div>
				<div class="row">
					
				</div>
        </div>
		<!--div class="row">
							<div class="col-md-4 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
								  <h2>For Examination & Interview</h2>
								  <div class="clearfix"></div>
								</div>
								<form class="form-horizontal" id="frm_forexam" name="frm_forexam">
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<label class="form-label">Examination Date</label>
										<input type="text" name="es_date" id="es_date" required="required" class="form-control date">
									</div>
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<label class="form-label">Time</label>
										<input type="text" name="es_time" id="es_time" required="required" class="form-control">
									</div>
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<label class="form-label" >Venue</label>
										<textarea id="es_venue" name="es_venue" class="form-control" required="required"></textarea>
									</div>
									
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<button type="submit" class="btn btn-primary form-control"> <i class="fa fa-envelope"></i> Send Email <small>(For Examination & Interview)</small></button>
									</div>	
								</form>
							</div>
						</div>
						
						<div class="col-md-4 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
								  <h2>For Filing / Forward to CESD</h2>
								  <div class="clearfix"></div>
								</div>
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<button id="btn_forfiling" name="btn_forfiling" class="btn btn-primary form-control"> <i class="fa fa-envelope"></i> Send Email <small>(For Filing)</small></button>
									</div>
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<button id="btn_forwardtocesd" name="btn_forwardtocesd" class="btn btn-primary form-control"> <i class="fa fa-envelope"></i> Send Email <small>(Forward to CESD)</small></button>
									</div>
							</div>
						</div>
						
							<!--div class="col-md-4 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
								  <h2>For Filing</h2>
								  <div class="clearfix"></div>
								</div>
								<form class="form-horizontal" id="frm_forfiling" name="frm_forfiling">
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<label class="form-label">Examination Date</label>
										<input type="text" name="es_date" id="es_date" required="required" class="form-control date">
									</div>
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<label class="form-label">Time</label>
										<input type="text" name="es_time" id="es_time" required="required" class="form-control">
									</div>
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<label class="form-label">Venue</label>
										<textarea id="es_venue" name="es_venue" class="form-control"></textarea>
									</div>
									
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<button id="btn_sendemail" name="btn_sendemail" class="btn btn-primary form-control"> Send</button>
									</div>
											
								</form>
							</div>
						</div-->
						
							<!--div class="col-md-4 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
								  <h2>Forward to CESD</h2>
								  <div class="clearfix"></div>
								</div>
								<form class="form-horizontal">
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<label class="form-label">Examination Date</label>
										<input type="text" name="es_date" id="es_date" required="required" class="form-control date">
									</div>
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<label class="form-label">Time</label>
										<input type="text" name="es_time" id="es_time" required="required" class="form-control">
									</div>
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<label class="form-label">Venue</label>
										<textarea id="es_venue" name="es_venue" class="form-control"></textarea>
									</div>
									
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<button id="btn_sendemail" name="btn_sendemail" class="btn btn-primary form-control"> Send</button>
									</div>
											
								</form>
							</div>
						</div>
				</div-->
    </div>
</div>

<div class="modal fade" id="mdl_appinfo" tabindex = "-1" role = "dialog" aria-hidden = "true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Modal Header</h5>
        </div>
		
        <div class="modal-body" id="modal_body">
        <!--div  id="print_info"-->
			<div class="x_content">
				<div class="row">
					<img src="" id="app_id" style="width:200px;height:200px;">
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">First Name</label>
							<input type="text" class="form-control" readonly id="oa_fname" name="oa_fname">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Middle Name</label>
							 <input type="text" class="form-control" readonly id="oa_mname" name="oa_mname">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Last Name</label>
							 <input type="text" class="form-control" readonly id="oa_lname" name="oa_lname">
						</div>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-12">
						<div class="form-group">
							<label class="control-label">Ext</label>
							 <input type="text" class="form-control" readonly id="oa_extname" name="oa_extname">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<div class="form-group">
							<label class="control-label">Gender</label>
							 <input type="text" class="form-control" readonly id="oa_gender" name="oa_gender">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Birth Date</label>
							 <input type="text" class="form-control" readonly id="oa_bdate" name="oa_bdate">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">School</label>
							 <input type="text" class="form-control" readonly id="oa_school" name="oa_school">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Course</label>
							 <input type="text" class="form-control" readonly id="oa_course" name="oa_course">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Educ Remarks</label>
							 <input type="text" class="form-control" readonly id="oa_educremarks" name="oa_educremarks">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Eligibility</label>
							 <input type="text" class="form-control" readonly id="oa_eligibility" name="oa_eligibility">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Eligibility Remarks</label>
							 <input type="text" class="form-control" readonly id="oa_eligremarks" name="oa_eligremarks">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Province</label>
							 <input type="text" class="form-control" readonly placeholder="" id="oa_province" name="oa_province">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">City</label>
							 <input type="text" class="form-control" readonly id="oa_city" name="oa_city">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Barangay</label>
							 <input type="text" class="form-control" readonly id="oa_brgy" name="oa_brgy">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Skills</label>
							 <input type="text" class="form-control" readonly id="oa_skills" name="oa_skills">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Awards</label>
							 <input type="text" class="form-control" readonly id="oa_awards" name="oa_awards">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label class="control-label">Mobile</label>
							 <input type="text" class="form-control" readonly id="oa_mobile" name="oa_mobile">
						</div>
					</div>
				</div>
			</div>
		
		
            <!--input type="text" id="m_oa_id" name="m_oa_id"-->
			<table class="table">
				<thead>
					<tr>
						<td>Applied Position</td>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
        <!--/div-->
		 </div>
		 <!--div class="modal-footer">
        <button id="onload_click" onclick="printContent('print_rse')" type="button" class="btn btn-primary col-xs-3"><i class="glyphicon glyphicon-print"></i> Print</button>
		 </div-->
      </div>
    </div>
</div>


<!-- Application Status -->
<div class="modal fade" id="mdl_positionapplied____OLD" tabindex = "-1" role = "dialog" aria-hidden = "true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Modal Header</h5>
        </div>
		<form id="mdl_frm_forexam" name="mdl_frm_forexam">
        <div class="modal-body" id="modal_body">
				<div class="row">
				<input type="hidden" id="m_oa_id" name="m_oa_id" class="form-control">
				<div class="col-xs-6">
						<label class="form-label">Position Applied</label>
						<select id="m_positiondesired" name="m_positiondesired" class="form-control"></select>
				</div>
				<div class="col-xs-6">
						<label class="form-label">Application Status</label>
						<select id="m_ah_remarks" name="m_ah_remarks" class="form-control">
							<option value="For Exam and Interview"> For Exam and Initial Interview</option>
							<option value="For Job Interview">For Job Interview</option>
							<option value="For Filing"> For Filing</option>
							<option value="Forward to CESD">Forward to CESD</option>
							<option value="Forward to City Schools">Forward to City Schools</option>
							<option value="For Regret">For Regret</option>
						</select>
				</div>
				<div class="col-xs-6">
						<label> Needs approval of HR Officer?<!--small><small>( 'YES' by default)</small></small--></label>
							<select id="m_ah_status" name="m_ah_status" class="form-control">
								<option value="Pending"> YES</option>
								<option value="Approved"> NO</option>
							</select>
				</div>
				<div class="col-xs-12">
					<hr>
					<table id="dt_positionapplied" class="cell-border compact hover" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Position</th>
								<th>Description</th>
								<th>Status</th>
								<th>Remarks</th>
							</tr>
						</thead>
					</table>
				</div>
				</div>
        </div>
		<div class="modal-footer" id="modal_footer">
			<div class="x_content">
				<div class="btn-group col-xs-6">
					<input type="button" class="col-xs-3 btn btn-default" value="Close" data-dismiss="modal">
					<button type="submit" id="btn_forexam" class="col-xs-3 btn btn-success" >Save</button>
				</div>
			</div>
        </div>
		</form>
      </div>
    </div>
</div>


<!-- Application Status -->
<div class="modal fade" id="mdl_applicationhistory" tabindex = "-1" role = "dialog" aria-hidden = "true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Modal Header</h5>
        </div>
		
        <div class="modal-body" id="modal_body">
				<div class="row">
				
				
				<div class="col-xs-12">
			
					<table id="dt_positionapplied" class="cell-border compact hover" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Position</th>
								<th>Description</th>
								<th>Status</th>
								<th>Remarks</th>
								<th>Remarks Status</th>
								<th>Remarks Status Date</th>
								<th>HR Date filed</th>
								<th>Is Latest</th>
							</tr>
						</thead>
					</table>
				</div>
				</div>
        </div>
		<div class="modal-footer" id="modal_footer">
			<div class="x_content">
				<div class="btn-group col-xs-6">
					<input type="button" class="col-xs-3 btn btn-default" value="Close" data-dismiss="modal">
					
				</div>
			</div>
        </div>
	
      </div>
    </div>
</div>
<!-- Add Application Status -->
<div class="modal fade" id="mdl_addapplicationhistory" tabindex = "-1" role = "dialog" aria-hidden = "true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Modal Header</h5>
        </div>
		<form id="frm_addapplication" name="frm_addapplication">
        <div class="modal-body" id="modal_body">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-12">
						<input type="hidden" id="m_oa_id" name="m_oa_id">
						<label class="form-label"> Applicant for ?</label>
						<select id="m_ah_remark" name="m_ah_remark" class="form-control">
							<option> -- Choose -- </option>
							<option value="For Exam and Interview"> For Exam and Initial Interview</option>
							<option value="For Job Interview">For Job Interview</option>
							<option value="For Filing"> For Filing</option>
							<option value="Forward to CESD">Forward to CESD</option>
							<option value="Forward to City Schools">Forward to City Schools</option>
							<option value="For Regret">For Regret</option>
						</select>
					</div>
					<div class="col-md-12">
						<label class="form-label">Remarks Notes</label>
						<input type="text" id="m_ah_remarksnotes" name="m_ah_remarksnotes" class="form-control">
					</div>
					<div class="col-md-12">
						<label class="form-label">Remarks Date</label>
						<input type="text" id="m_ah_remarksnotes_date" name="m_ah_remarksnotes_date" class="form-control date">
					</div>
				
				</div>
			</div>
        </div>
		<div class="modal-footer" id="modal_footer">
			<div class="x_content">
				<div class="btn-group col-xs-12">
					<input type="button" class="col-xs-6 btn btn-warning" value="Close" data-dismiss="modal">
					<input type="submit" class="col-xs-6 btn btn-success">
				</div>
			</div>
        </div>
		</form>
      </div>
    </div>
</div>


<div class="modal fade" id="mdl_recform" tabindex = "-1" role = "dialog" aria-hidden = "true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Modal Header</h5>
        </div>
		
        <div class="modal-body" id="modal_body">
				<div class="row"  id="print_rse">
				
				
				<div class="col-md-12">
			<style type="text/css">
				.tg  {border-collapse:collapse;border-spacing:0; padding-top: 2px;padding-bottom: 2px;}
				.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal; padding-top: 2px;padding-bottom: 2px;}
				.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal; padding-top: 2px;padding-bottom: 2px;}
				.tg .tg-by3v{font-weight:bold;font-size:14px;text-align:center; padding-top: 2px;padding-bottom: 2px;}
				.tg .tg-glis{font-size:10px; padding-top: 2px;padding-bottom: 2px;}
				.tg .tg-031e{font-size:10px; padding-top: 2px;padding-bottom: 2px;}
				.tg .tg-k6pi{font-size:12px; padding-top: 2px;padding-bottom: 2px;}
				.tg .tg-3zav{font-size:13px; padding-top: 2px;padding-bottom: 2px;}
				.tg .tg-dovx{font-weight:bold;font-size:13px;text-align:center;vertical-align:top; padding-top: 2px;padding-bottom: 2px;}
				.tg .tg-pi53{font-weight:bold;font-size:12px;text-align:center; padding-top: 2px;padding-bottom: 2px;}
				.tg .tg-07dj{font-weight:bold;font-size:14px; padding-top: 2px;padding-bottom: 2px;}
				.tg .tg-dx8v{font-size:12px;vertical-align:top; padding-top: 2px;padding-bottom: 2px;}
				.tg .tg-yw4l{vertical-align:top; padding-top: 2px;padding-bottom: 2px;}
				.tg th, .tg td { border: none;}
				.tg-top { border-top: 1px solid #000 !important}
				.tg-right { border-right: 1px solid #000 !important}
				.tg-bottom { border-bottom: 1px solid #000 !important}
				.tg-left { border-left: 1px solid #000 !important}
				td { position: relative;}
				.box:before {
					content: '';
					position: absolute;
					height: 15px;
					width: 16px;
					border: 1px solid;
					left: 10px;
					top: 3px;
				}
</style>
<table class="tg" style="table-layout: fixed; width: 860px">
<colgroup>
<col style="width: 173px">
<col style="width: 37px">
<col style="width: 116px">
<col style="width: 169px">
<col style="width: 171px">
<col style="width: 194px">
</colgroup>
  <tr>
    <th class="tg-glis tg-top tg-left">FM-CSFP-CHRDO-03</th>
    <th class="tg-by3v tg-top" colspan="4" id="appnum">RECRUITMENT &amp; SELECTION OF EMPLOYEES- _______</th>
    <th class="tg-031e tg-top tg-right tg-bottom" rowspan="3"></th>
  </tr>
  <tr>
    <td class="tg-031e tg-left">Revision no. 02</td>
    <td class="tg-031e " colspan="4"></td>
  </tr>
  <tr>
    <td class="tg-031e tg-left tg-bottom">August 1, 2013</td>
    <td class="tg-031e tg-bottom" colspan="4"></td>
  </tr>
  <tr>
    <td class="tg-pi53 tg-left tg-bottom">PERSON RESPONSIBLE</td>
    <td class="tg-pi53 tg-left tg-bottom" colspan="3">REMARKS</td>
    <td class="tg-pi53 tg-left tg-bottom">DATE</td>
    <td class="tg-pi53 tg-left tg-bottom tg-right">SIGNATURE</td>
  </tr>
  <tr>
    <td class="tg-031e tg-left tg-right"></td>
    <td class="tg-031e tg-left box" id="remarks_forexam"></td>
    <td class="tg-3zav tg-right" colspan="2">For examination on</td>
    <td class="tg-031e tg-left tg-right" id="date_forexam"></td>
    <td class="tg-031e tg-left tg-right tg-top" rowspan="7"><img src="<?php echo base_url('/pds_image/558/558_signature.jpg'); ?>" style="height:50px; width:200px;"></td>
  </tr>
  <tr>
    <td class="tg-031e tg-left tg-right"></td>
    <td class="tg-031e tg-left box" id="remarks_jobinterview"></td>
    <td class="tg-3zav tg-right" colspan="2">For interview on</td>
    <td class="tg-031e tg-left tg-right tg-top" id="date_jobinterview"></td>
  </tr>
  <tr>
    <td class="tg-031e tg-left tg-right"></td>
    <td class="tg-031e tg-left box" id="remarks_regret"></td>
    <td class="tg-3zav tg-right" colspan="2">Regrets</td>
    <td class="tg-031e tg-left tg-right tg-top"  id="date_regret"></td>
  </tr>
  <tr>
    <td class="tg-031e tg-left tg-right"></td>
    <td class="tg-031e tg-left box"></td>
    <td class="tg-3zav tg-right" colspan="2">Rebook on</td>
    <td class="tg-031e tg-left tg-right tg-top"></td>
  </tr>
  <tr>
    <td class="tg-031e tg-left tg-right"></td>
    <td class="tg-031e tg-left box " id="remarks_forward"></td>
    <td class="tg-3zav tg-right" colspan="2">Forward to</td>
    <td class="tg-031e tg-left tg-right tg-top" id="date_forward"></td>
  </tr>
  <tr>
    <td class="tg-031e tg-left tg-right"></td>
    <td class="tg-031e tg-left box" id="remarks_filing"></td>
    <td class="tg-3zav tg-right" colspan="2">For filing</td>
    <td class="tg-031e tg-left tg-right tg-top" id="date_filing"></td>
  </tr>
  <tr>
    <td class="tg-07dj tg-left tg-right tg-bottom">CHRD Officer</td>
    <td class="tg-031e tg-left box"></i></td>
    <td class="tg-3zav tg-right" colspan="2">Others</td>
    <td class="tg-031e tg-left tg-right tg-top"></td>
  </tr>
  <tr>
    <td class="tg-07dj tg-left tg-right tg-bottom">CHRDO Staff</td>
    <td class="tg-031e tg-left tg-right tg-bottom tg-top" colspan="3" id="remarks_notes"></td>
    <td class="tg-031e tg-left tg-right tg-bottom tg-top" id="remarks_notes_date"></td>
    <td class="tg-031e tg-left tg-right tg-bottom tg-top"></td>
  </tr>
  <tr>
    <td class="tg-k6pi tg-left">NAME OF APPLICANT</td>
    <td class="tg-k6pi tg-bottom" colspan="3" id="applicant_name">:</td>
    <td class="tg-3zav tg-bottom"  id="age">Age:</td>
    <td class="tg-031e tg-right"></td>
  </tr>
  <tr>
    <td class="tg-k6pi tg-left">QUALIFICATIONS</td>
    <td class="tg-k6pi " colspan="4"></td>
    <td class="tg-031e tg-right"></td>
  </tr>
  <tr>
    <td class="tg-k6pi tg-left">Education</td>
    <td class="tg-k6pi tg-bottom" colspan="4" id="education">:</td>
    <td class="tg-031e tg-right"></td>
  </tr>
  <tr>
    <td class="tg-dx8v tg-left">Experience</td>
    <td class="tg-dx8v tg-bottom" colspan="4" id="work_exp">:</td>
    <td class="tg-yw4l tg-right"></td>
  </tr>
  <tr>
    <td class="tg-dx8v tg-left">Trainings</td>
    <td class="tg-dx8v tg-bottom" colspan="4"  id="training">:</td>
    <td class="tg-yw4l tg-right"></td>
  </tr>
  <tr>
    <td class="tg-dx8v tg-left">Eligibility</td>
    <td class="tg-dx8v tg-bottom" colspan="4" id="eligibility">:</td>
    <td class="tg-yw4l tg-right"></td>
  </tr>
  <tr>
    <td class="tg-dx8v tg-left">Special Skills</td>
    <td class="tg-dx8v tg-bottom" colspan="4" id="skills">:</td>
    <td class="tg-yw4l tg-right"></td>
  </tr>
  <tr>
    <td class="tg-dx8v tg-left">Awards Received</td>
    <td class="tg-dx8v tg-bottom" colspan="4" id="awards">:</td>
    <td class="tg-yw4l tg-right"></td>
  </tr>
  <tr>
    <td class="tg-dovx tg-left tg-top" colspan="4">EXAMINATION</td>
    <td class="tg-dovx tg-left tg-top tg-right" colspan="2">INTERVIEW</td>
  </tr>
  <tr>
    <td class="tg-dx8v tg-left">DATE:</td>
    <td class="tg-dx8v tg-bottom" colspan="3"></td>
    <td class="tg-dx8v tg-left tg-right tg-bottom" colspan="2">DATE:</td>
  </tr>
  <tr>
    <td class="tg-dx8v tg-left "></td>
    <td class="tg-dx8v tg-bottom" colspan="3"></td>
    <td class="tg-dx8v tg-left tg-right tg-bottom" colspan="2">RESULTS:</td>
  </tr>
  <tr>
    <td class="tg-dx8v tg-left">RESULTS (IQ):</td>
    <td class="tg-dx8v tg-bottom" colspan="3"></td>
    <td class="tg-dx8v tg-left tg-right tg-bottom" colspan="2"></td>
  </tr>
  <tr>
    <td class="tg-dx8v tg-left">(EQ):</td>
    <td class="tg-dx8v tg-bottom" colspan="3"></td>
    <td class="tg-dx8v tg-left tg-right tg-bottom" colspan="2"></td>
  </tr>
  <tr>
    <td class="tg-dx8v tg-left tg-bottom tg-top" colspan="4">CONDUCTED BY:</td>
    <td class="tg-dx8v tg-left tg-right tg-bottom" colspan="2"></td>
  </tr>
</table>
				</div>
        </div>
		<div class="modal-footer" id="modal_footer">
			<div class="x_content">
				<div class="btn-group col-xs-6">
					<input type="button" class="col-xs-3 btn btn-default" value="Close" data-dismiss="modal">
					<button id="onload_click" onclick="printContent('print_rse')" type="button" class="btn btn-primary col-xs-3"><i class="glyphicon glyphicon-print"></i> Print</button>
				</div>
			</div>
        </div>
	
      </div>
    </div>
</div>
</div>




<!-- confrimation for exam -->
<div class="modal fade" id="mdl_sendemailforexam_individual" tabindex = "-1" role = "dialog" aria-hidden = "true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Send Email for Exam</h5>
        </div>
		<form id="mdl_frm_sendemailforexam_individual" name="mdl_frm_sendemailforexam_individual">
        <div class="modal-body" id="modal_body">
				

				<div class="row">
					<div class="col-xs-12">

						<input type="hidden" id="m_ah_id" name="m_ah_id">
						
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<label class="form-label">Examination Date</label>
										<input type="text" name="es_date" id="es_date" required="required" class="form-control date">
									</div>
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<label class="form-label">Time</label>
										<input type="text" name="es_time" id="es_time" required="required" class="form-control">
									</div>
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<label class="form-label" >Venue</label>
										<textarea id="es_venue" name="es_venue" class="form-control" required="required"></textarea>
									</div>
									
									<!--div class="form-group col-md-12 col-sm-12 col-xs-12">
										<button type="submit" class="btn btn-primary form-control"> <i class="fa fa-envelope"></i> Send Email </button>
									</div-->	
	
					</div>
				</div>
		
			 
        </div>
		<div class="modal-footer" id="modal_footer">
			<div class="x_content">
				<div class="btn-group col-xs-12">
					<input type="button" class="col-xs-6 btn btn-default" value="Close" data-dismiss="modal">
					<button type="submit" id="btn_forexam" class="col-xs-6 btn btn-success" ><i class="fa fa-envelope"></i> Send</button>
				</div>
			</div>
        </div>
		</form>
      </div>
	  
    </div>
</div>


<!-- confrimation for filling -->
<div class="modal fade" id="mdl_forfilling_individual" tabindex = "-1" role = "dialog" aria-hidden = "true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Send Email For Filling</h5>
        </div>
		<form id="mdl_frm_forfilling_individual" name="mdl_frm_forfilling_individual">
        <div class="modal-body" id="modal_body">
				<div class="row">
					<div class="col-xs-12">
						<input type="hidden" id="m_ah_id" name="m_ah_id">
					</div>
				</div>
        </div>
		<div class="modal-footer" id="modal_footer">
			<div class="x_content">
				<div class="btn-group col-xs-12">
					<input type="button" class="col-xs-6 btn btn-default" value="Close" data-dismiss="modal">
					<button type="submit" id="btn_forexam" class="col-xs-6 btn btn-success" ><i class="fa fa-envelope"></i> Send</button>
				</div>
			</div>
        </div>
		</form>
      </div>
	  
    </div>
</div>



<!-- confrimation for job interview-->
<div class="modal fade" id="mdl_forjobinterview" tabindex = "-1" role = "dialog" aria-hidden = "true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">For Job Interview</h5>
        </div>
		<form id="mdl_frm_sendemailforjobinterview" name="mdl_frm_sendemailforjobinterview">
        <div class="modal-body" id="modal_body">
				

				<div class="row">
					<div class="col-xs-12">

						<input type="text" id="m_ah_id" name="m_ah_id">
						
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<label class="form-label">Job Interview Date</label>
										<input type="text" name="es_date" id="es_date" required="required" class="form-control date">
									</div>
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<label class="form-label">Time</label>
										<input type="text" name="es_time" id="es_time" required="required" class="form-control">
									</div>
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<label class="form-label" >Venue</label>
										<textarea id="es_venue" name="es_venue" class="form-control" required="required"></textarea>
									</div>
									
									<!--div class="form-group col-md-12 col-sm-12 col-xs-12">
										<button type="submit" class="btn btn-primary form-control"> <i class="fa fa-envelope"></i> Send Email </button>
									</div-->	
	
					</div>
				</div>
		
			 
        </div>
		<div class="modal-footer" id="modal_footer">
			<div class="x_content">
				<div class="btn-group col-xs-12">
					<input type="button" class="col-xs-6 btn btn-default" value="Close" data-dismiss="modal">
					<button type="submit" id="btn_forexam" class="col-xs-6 btn btn-success" ><i class="fa fa-envelope"></i> Send</button>
				</div>
			</div>
        </div>
		</form>
      </div>
	  
    </div>
</div>






<!-- confrimation for forward -->
<div class="modal fade" id="mdl_forforward_individual" tabindex = "-1" role = "dialog" aria-hidden = "true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Send Email For Filling</h5>
        </div>
		<form id="mdl_frm_forforward_individual" name="mdl_frm_forforward_individual">
        <div class="modal-body" id="modal_body">
				<div class="row">
					<div class="col-xs-12">
						<input type="hidden" id="m_ah_id" name="m_ah_id">
					</div>
				</div>
        </div>
		<div class="modal-footer" id="modal_footer">
			<div class="x_content">
				<div class="btn-group col-xs-12">
					<input type="button" class="col-xs-6 btn btn-default" value="Close" data-dismiss="modal">
					<button type="submit" id="btn_forexam" class="col-xs-6 btn btn-success" ><i class="fa fa-envelope"></i> Send</button>
				</div>
			</div>
        </div>
		</form>
      </div>
	  
    </div>
</div>


<!-- confrimation for forward to city schools -->
<div class="modal fade" id="mdl_forcityschools_individual" tabindex = "-1" role = "dialog" aria-hidden = "true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Send Email For Forward to City Schools</h5>
        </div>
		<form id="mdl_frm_forcityschools_individual" name="mdl_frm_forcityschools_individual">
			<div class="modal-body" id="modal_body">
					<div class="row">
						<div class="col-xs-12">
							<input type="text" id="m_ah_id" name="m_ah_id">
						</div>
					</div>
			</div>
			<div class="modal-footer" id="modal_footer">
				<div class="x_content">
					<div class="btn-group col-xs-12">
						<input type="button" class="col-xs-6 btn btn-default" value="Close" data-dismiss="modal">
						<button type="submit" id="btn_forexam" class="col-xs-6 btn btn-success" ><i class="fa fa-envelope"></i> Send</button>
					</div>
				</div>
			</div>
		</form>
      </div>
	  
    </div>
</div>

<!-- confrimation for regret -->
<div class="modal fade" id="mdl_forregret_individual" tabindex = "-1" role = "dialog" aria-hidden = "true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Send Email For Filling</h5>
        </div>
		<form id="mdl_frm_forregret_individual" name="mdl_frm_forregret_individual">
        <div class="modal-body" id="modal_body">
				<div class="row">
					<div class="col-xs-12">
						<input type="hidden" id="m_ah_id" name="m_ah_id">
					</div>
				</div>
        </div>
		<div class="modal-footer" id="modal_footer">
			<div class="x_content">
				<div class="btn-group col-xs-12">
					<input type="button" class="col-xs-6 btn btn-default" value="Close" data-dismiss="modal">
					<button type="submit" id="btn_forexam" class="col-xs-6 btn btn-success" ><i class="fa fa-envelope"></i> Send</button>
				</div>
			</div>
        </div>
		</form>
      </div>
	  
    </div>
</div>


<!-- Add result -->
<div class="modal fade" id="mdl_addresult" tabindex = "-1" role = "dialog" aria-hidden = "true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Add Test Result</h5>
        </div>
		<form id="mdl_frm_addresult" name="mdl_frm_addresult">
        <div class="modal-body" id="modal_body">
				<div class="row">
					<div class="col-xs-12">
						<input type="hidden" id="m_ah_id" name="m_ah_id">
					</div>
					<div class="col-xs-12">
						<label class="form-label ah_status"> </label>
						<select id="m_ah_remarks_status" name="m_ah_remarks_status" class="form-control">
							
						</select>
					</div>
					<div class="col-xs-12">
						<label class="form-label"> Date</label>
						<input type="text" id="m_ah_remarksdate" name="m_ah_remarksdate" class="form-control date">
					</div>
				</div>
        </div>
		<div class="modal-footer" id="modal_footer">
			<div class="x_content">
				<div class="btn-group col-xs-12">
					<input type="button" class="col-xs-6 btn btn-default" value="Close" data-dismiss="modal">
					<button type="submit" id="btn_forexam" class="col-xs-6 btn btn-success" ><i class="fa fa-save"></i> Save Result</button>
				</div>
			</div>
        </div>
		</form>
      </div>
	  
    </div>
</div>

<!-- Capture Image -->
<div class="fade" id="takeaphoto" tabindex = "-1" role = "dialog" aria-hidden = "true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Taking Photo</h5>
        </div>
		<form id="frm_capture2" name="frm_capture2">
        <div class="modal-body" id="modal_body">
				<div class="row">
                        <div class="col-md-6">
                            <input type="text" name="oa_id" id="oa_id" class="oa_id" />
                            <input type="text" name="emp_fullname" id="emp_fullname" class="emp_fullname" value="" />
                            <div id="wrapper">
                                <div id="example" style="min-height: 200px; min-width: 200px;"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="gallery"></div>
                        </div>
                    </div>
        </div>
		<div class="modal-footer" id="modal_footer">
			    <input type="button" class="btn btn-success" id="btn_save_userpics" value="Save Picture">
        </div>
		</form>
      </div>
	  
    </div>
</div>


<!-- edit applicant info -->
<div class="fade modal" id="editappinfo" tabindex = "-1" role = "dialog" aria-hidden = "true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"> </h3>
        </div>
		<form id="frm_editappinfo" name="frm_editappinfo">
        <div class="modal-body" id="modal_body">
				<div class="row">
                    <div class="col-md-12">
					
							<input type="hidden" id="oa_id" name="oa_id" required>
						
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<label class="form-label">First Name</label>
								<input type="text" class="form-control" id="oa_fname" name="oa_fname" required>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<label class="form-label">Middle Name</label>
								<input type="text" class="form-control" id="oa_mname" name="oa_mname" required>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<label class="form-label">Last Name</label>
								<input type="text" class="form-control" id="oa_lname" name="oa_lname" required>
							</div>
							<div class="col-lg-1  col-md-1 col-sm-3 col-xs-12">
								<label class="form-label">Ext.</label>
								<input type="text" class="form-control" id="oa_extname" name="oa_extname">
							</div>
							
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								<label class="form-label">Gender</label>
								<select class="form-control" id="oa_gender" name="oa_gender" required>
									<option> -- Choose --</option>
									<option value="M" >Male</option>
									<option value="F" >Female</option>
								</select>
							</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="form-label">Province</label>
								<select class="form-control" id="oa_province" name="oa_province" required>
									
								</select>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="form-label">City</label>
								<select class="form-control" id="oa_city" name="oa_city" required>
									
								</select>
							</div>
							
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 brgy">
								<label class="form-label">Barangay</label>
								<input type="text" class="form-control" id="oa_brgy" name="oa_brgy" required>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="form-label">Street</label>
								<input type="text" class="form-control" id="oa_street" name="oa_street">
							</div>
						
							<div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
								<label class="form-label">Birth Date</label>
								<input type="text" class="form-control date" id="oa_bdate" name="oa_bdate" required>
							</div> 
							
							<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
								<label class="form-label">Email Address</label>
								<input type="text" class="form-control" id="oa_email" name="oa_email" required>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<label class="form-label">Course</label>
								<select class="form-control" id="oa_course" name="oa_course" required>
									<option value="Elementary">Elementary</option>
									<option value="High School">High School</option>
									<option value="Vocational (2 years)">Vocational (2 years)</option>
								</select>
							</div>
							<div class="col-lg-3 col-md-2 col-sm-6 col-xs-12">
								<label class="form-label">Educational Remarks</label>
								<!--input type="text" class="form-control" id="oa_educremarks" name="oa_educremarks"-->
								<select class="select2_single form-control" tabindex="-1" id="oa_educremarks" name="oa_educremarks" required>
								    <option>-- Choose --</option>
									<option value="Graduate">Graduate</option>
									<option value="Undergraduate" >Undergraduate</option>	
								 </select>	
							</div> 
								<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
								<label class="form-label">Eligibility</label>
								<select class="select2_single form-control" tabindex="-1" id="oa_eligibility" name="oa_eligibility" required>
								    <option>-- Choose --</option>
									<option value="N/A" >N/A</option>
									<option value="Bar/Board Eligibility (RA1080)" >Bar/Board Eligibility (RA1080)</option>
									<option value="CSC Professional" >CSC Professional</option>
									<option value="CSC Subprofessional" >CSC Subprofessional</option>
									<option value="Barangay Official Eligibility (BOE)" >Barangay Official Eligibility (BOE)</option>
									<option value="Honor Graduate Eligibility (PD907)" >Honor Graduate Eligibility (PD907)</option>
									<option value="Sanggunian Member Eligibility (SME)">Sanggunian Member Eligibility (SME)</option>
									<option value="Skill Eligibility (CSC MC No, II)" >Skill Eligibility (CSC MC No, II)</option>	
								 </select>	
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
								<label class="form-label">School</label>
								<input type="text" class="form-control" id="oa_school" name="oa_school" required>
							</div> 
							
							<div class="col-lg-2 col-md-6 col-sm-3 col-xs-12">
								<label class="form-label">Post Graduate</label>
								 <select class="form-control" tabindex="-1" name="oa_postgraduate" id="oa_postgraduate">
							<option value="N/A">-- Choose --</option>
							<option value="Masteral" >Masteral</option>
							<option value="Doctorate" >Doctorate</option>
				
							</select>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<label class="form-label">Post Graduate Course</label>
								<input type="text" class="form-control" id="oa_postgraduateremarks" name="oa_postgraduateremarks">
							</div> 
						
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="form-label">Mobile #</label>
								<input type="text" class="form-control" id="oa_mobile" name="oa_mobile" required>
							</div>
							<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
								<label class="form-label">Most recent work (if any)</label>
								<input type="text" class="form-control" id="oa_recwork" name="oa_recwork" required>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
								<label class="form-label">Most recent training (if any)</label>
								<input type="text" class="form-control" id="oa_rectraining" name="oa_rectraining" required>
							</div>
							 	<!--div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<label class="form-label">Position Desired<br/><small><i class="red">You can choose maximum of 5 position.</i></small></label>
						    <table class="table flexy" id="dt_vacancy">
							<thead> 
							</thead>
							<tbody>
								<?php  // if(!is_null($vacancies)){
								 //	foreach($vacancies as $v){ ?>
									<tr>
										<td>
											<input type="checkbox" id="v_id" name="v_id" value="<?php // echo $v->v_id; ?>" 
											
											 > <?php // echo $v->v_position; 
													// if($v->v_desc == 'VACANT') { 
												//	echo '&nbsp;&nbsp;<strong><small class="green">('.$v->v_desc.')</small><strong>';
										//	}?>
												
										</td>
									</tr>
								<?php // } } ?>
								<?php // if(in_array($v->v_id, $appliedposition)){ echo 'checked'; } ?>
							</tbody>
							</table>
                        </div-->
							
							
							<div class="col-md-4 col-sm-6 col-xs-12">
								<label class="form-label">Skills</label>
								<textarea type="text" class="form-control" rows="8" id="oa_skills" name="oa_skills"></textarea>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<label class="form-label">Awards</label>
								<textarea type="text" class="form-control" rows="8" id="oa_awards" name="oa_awards"></textarea>
							</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
								<hr>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12">
									<input type="submit" class="btn btn-success form-control"  >
								</div>
			</div>
			</div>	
        </div>
		<!--div class="modal-footer" id="modal_footer">
			    <input type="button" class="btn btn-success" id="btn_save_userpics" value="Save Picture">
        </div-->
		</form>
      </div>
	  
    </div>
</div>

<!-- End of Capture -->