<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">

                        <!--form id="frm_applicant_search" name="frm_applicant_search" class=""-->
                        <div class="form-horizontal row filter">
                        	
                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Application #</label>
                                <div class="col-md-8 col-sm-8 col-xs-12" id="filter_col2" data-column="1">
                                    <input type="text" class="column_filter form-control" id="col1_filter" name="col1_filter" autocomplete="on">
                                </div>
                            </div>
							

                            <div class="form-group col-md-5 col-sm-5 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Course</label>
                                <div class="col-md-9 col-sm-9 col-xs-12" id="filter_col10" data-column="9">
                                    <select class="column_filter form-control" id="col9_filter" name="course">
                                        <option value="">ALL</option>
                                        <option value="BSIT">BSIT</option>
                                    </select>
                                </div>
                            </div>
							
							
                            <div class="form-group col-md-3 col-sm-3 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender </label>
                                <div class="col-md-9 col-sm-9 col-xs-12" id="filter_col8" data-column="7">
                                    <select class="column_filter form-control" id="col7_filter" name="col7_filter">
                                        <option value="">All</option>
                                        <option value="F">FEMALE</option>
                                        <option value="M">MALE</option>
                                    </select>
                                </div>
                            </div>
							
                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Eligibility </label>
                                <div class="col-md-8 col-sm-8 col-xs-12" id="filter_col5" data-column="4">
                                    <select class="column_filter form-control" id="col4_filter" name="col4_filter">
                                         <option>-- Choose --</option>
										<option value="Bar/Board Eligibility">Bar/Board Eligibility</option>
										<option value="CSC - Professional">CSC - Professional</option>
										<option value="CSC - Non-Professional">CSC - Non-Professional</option>
										<option value="Bar/Board Eligibility">Bar/Board Eligibility</option>
										<option value="Barangay Health Worker (BHW) Eligibility">Barangay Health Worker (BHW) Eligibility</option>
										<option value="Barangay Nutrition Scholar (BNS) Eligibility">Barangay Nutrition Scholar (BNS) Eligibility</option>
										<option value="Barangay Official Eligibility (BOE)">Barangay Official Eligibility (BOE)</option>
										<option value="Electronic Data Processing Specialist (EDPS) Eligibility">Electronic Data Processing Specialist (EDPS) Eligibility</option>
										<option value="Foreign School Honor Graduate Eligibility (FSHGE)">Foreign School Honor Graduate Eligibility (FSHGE)</option>
										<option value="Honor Graduate Eligibility (HGE)">Honor Graduate Eligibility (HGE)</option>
										<option value="Sanggunian Member Eligibility (SME)">Sanggunian Member Eligibility (SME)</option>
										<option value="Scientific and Technological Specialist (STS) Eligibility">Scientific and Technological Specialist (STS) Eligibility</option>
										<option value="Skill Eligibility - CSC MC No. 11">Skill Eligibility - CSC MC No. 11</option>
                                    </select>
                                </div>
                            </div>
								<div class="form-group col-md-5 col-sm-5 col-xs-12">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Position Desired </label>
                                <div class="col-md-8 col-sm-8 col-xs-12" id="filter_col7" data-column="6">
                                    <select class="column_filter form-control" id="col6_filter">
                                         <option>-- Choose --</option>
										
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-3 col-sm-3 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                                <div class="col-md-9 col-sm-9 col-xs-12" id="filter_col14" data-column="13">
                                    <select class="column_filter form-control" id="col13_filter">
									<option>-- Choose --</option>
                                    </select>
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
                                    <th><input type="checkbox"></th>
                                    <th>Applicant #</th>
									<th>Name</th>
									<th>Education</th>
									<th>Eligibility</th>
									<th>Cellphone #</th>
									<th>Position Desired</th>
									<th>Gender</th>
									<th>Email</th>
									<th>Course</th>
									<th>School</th>
									<th>Province</th>
									<th>City</th>
									<th>Brgy</th>
									<th>Skills</th>
									<th>Award</th>
									<th>Bdate</th>
									<th>Age</th>
                                </tr>
                            </thead>
                        </table>
						<div class="row">
						<form class="form-horizontal">
							<div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
								<br/>
								<hr>
							</div>
							<div class="form-group col-md-2 col-md-2 col-sm-12 col-xs-12">
								<label class="form-label">Examination Date</label>
							</div>
							<div class="col-md-2 col-md-2 col-sm-12 col-xs-12">
								<input type="text" name="es_date" id="es_date" required="required" class="form-control col-md-3 col-xs-12 date">
							</div>
							<div class="col-md-1 col-md-1 col-sm-12 col-xs-12">
								<label class="form-label">Time</label>
							</div>
							<div class="col-md-1 col-md-1 col-sm-12 col-xs-12">
								<input type="text" name="es_time" id="es_time" required="required" class="form-control col-md-3 col-xs-12 date">
							</div>
							<div class="col-md-1 col-md-1 col-sm-12 col-xs-12">
								<label class="form-label">Venue</label>
							</div>
							<div class="col-md-2 col-md-2 col-sm-12 col-xs-12">
								<textarea id="es_venue" name="es_venue" class="form-control"></textarea>
							</div>
							
							<div class="col-md-offset-1 col-md-2 col-md-2 col-sm-12 col-xs-12">
								<button id="btn_sendemail" name="btn_sendemail" class="btn btn-primary form-control"> Send</button>
							</div>
								
						</div>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


