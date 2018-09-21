<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
				<div class="x_title">
                    <h2>Quality Standards<small> ...</small></h2>
					<div class="clearfix"></div>
				</div>
					<div class="x_content">
					<form id="frm_position" name="frm_position">
						<div class="form-group col-md-12 col-sm-12 col-xs-12">
						  <input type="hidden" class="form-control" id="p_id" name="p_id" >
						</div>
						<div class="row">
						<div class="col-md-2 col-sm-12 col-xs-12">
                            <label class="control-label">Position Code</label>
                            <input type="text" class="form-control" id="p_code" name="p_code">
                         </div>
						<div class="col-md-5 col-sm-12 col-xs-12">
                            <label class="control-label">Position Name</label>
                            <input type="text" class="form-control" id="p_name" name="p_name" >
                         </div>
						   <div class="col-md-3 col-sm-12 col-xs-12">
                            <label class="control-label">Parenthetic</label>
                            <input type="text" class="form-control" id="p_parent" name="p_parent" >
                         </div>
						<div class="col-md-1 col-sm-3 col-xs-3">
                            <label class="control-label">SG</label>
                            <input type="text" class="form-control numeric" id="p_sg" name="p_sg" >
                         </div>
						 <div class="col-md-1 col-sm-3 col-xs-3">
                            <label class="control-label">Level</label>
                            <input type="text" class="form-control numeric" id="p_level" name="p_level" >
                         </div>
						  <div class="col-md-8 col-sm-12 col-xs-12">
                            <label class="control-label">Eligibility Description</label>
                            <input type="text" class="form-control" id="p_eligibility" name="p_eligibility" >
                         </div>
						<div class="col-md-4 col-sm-12 col-xs-12">
                            <label class="control-label">Eligibility Kind</label>
                            <!--input type="text" class="form-control" id="p_eligibilitykind" name="p_eligibilitykind" -->
							<select id="p_eligibilitykind" name="p_eligibilitykind" class="form-control">
								<option value="">Choose Eligibility</option>
								<option value="CS PROFESSIONAL">CS PROFESSIONAL</option>
								<option value="CS SUBPROFESSIONAL">CS SUBPROFESSIONAL</option>
								<option value="BAR/BOARD ELIGIBILITY (RA1080)">BAR/BOARD ELIGIBILITY (RA1080)</option>
								<option value="BARANGAY OFFICIAL ELIGIBILITY (BOE)">BARANGAY OFFICIAL ELIGIBILITY (BOE)</option>
								<option value="HONOR GRADUATE ELIGIBILITY (PD907)">HONOR GRADUATE ELIGIBILITY (PD907)</option>
								<option value="SANGGUNIAN MEMBER ELIGIBILITY (SME)">SANGGUNIAN MEMBER ELIGIBILITY (SME)</option>
								<option value="SKILL ELIGIBILITY (CSC MC NO II)">SKILL ELIGIBILITY (CSC MC NO II)</option>
							</select>
                         </div>
						  <div class="col-md-6 col-sm-12 col-xs-12">
                            <label class="control-label">Education Description</label>
                            <input type="text" class="form-control" id="p_educdesc" name="p_educdesc" >
                         </div>
						 <div class="col-md-4 col-sm-12 col-xs-12">
                            <label class="control-label">Education</label>
                            <!--input type="text" class="form-control" id="p_education" name="p_education" -->
							<select id="p_education" name="p_education" class="form-control" required="">
								<option value="">Choose One</option>
								<option value="ELEMENTARY GRADUATE">ELEMENTARY GRADUATE</option>
								<option value="HIGH SCHOOL GRADUATE">HIGH SCHOOL GRADUATE</option>
								<option value="COMPLETION OF TWO YEAR STUDIES">COMPLETION OF TWO YEAR STUDIES</option>
								<option value="BACHELOR'S DEGREE">BACHELOR'S DEGREE</option>
								<option value="MASTER'S DEGREE">MASTER'S DEGREE</option>
								<option value="DOCTORATE DEGREE">DOCTORATE DEGREE</option>
							 </select>
                         </div>
						
						 
						 
						   <div class="col-md-2 col-sm-12 col-xs-12">
                            <label class="control-label">Education Sector</label>
                            <!--input type="text" class="form-control" id="p_educsector" name="p_educsector" -->
							<select id="p_educsector" name="p_educsector" class="form-control" required="">
								<option value="">Choose One</option>
								<option value="ARCHITECTURE">ARCHITECTURE</option>
								<option value="BUSINESS">BUSINESS</option>
								<option value="COMMUNICATION">COMMUNICATION</option>
								<option value="EDUCATION">EDUCATION</option>
								<option value="ENGINEERING">ENGINEERING</option>
								<option value="INFORMATION TECHNOLOGY">INFORMATION TECHNOLOGY</option>
								<option value="LAW">LAW</option>
								<option value="MEDICAL TECHNOLOGYU">MEDICAL TECHNOLOGYU</option>
								<option value="NATURAL SCIENCES">NATURAL SCIENCES</option>
								<option value="NURSING">NURSING</option>
								<option value="NUTRITION">NUTRITION</option>
								<option value="PHARMACY">PHARMACY</option>
								<option value="SOCIAL SCIENCES">SOCIAL SCIENCES</option>
								<option value="SOCIAL WORK">SOCIAL WORK</option>
								<option value="URBAN PLANNING">URBAN PLANNING</option>
							</select>
                         </div>
						 
                         </div>
						  <div class="row">
						    <div class="col-md-2 col-sm-12 col-xs-12">
                            <label class="control-label">Relevance</label>
                            <!--input type="text" class="form-control" id="p_relevance" name="p_relevance" -->
							<select class="form-control col-md-3 col-xs-12" id="p_relevance" name="p_relevance">
								<option> -- Choose -- </option>
								<option value="MANAGERIAL">MANAGERIAL</option>
								<option value="SUPERVISORY">SUPERVISORY</option>
								<option value="ADMINISTRATIVE">ADMINISTRATIVE</option>
								<option value="TECHNICAL">TECHNICAL</option>
								<option value="SKILLED">SKILLED</option>
							</select>
                         </div>
                         </div>
			
						 <div class="row">
						
						   <div class="col-md-2 col-sm-12 col-xs-12">
                            <label class="control-label">Work Experience (years)</label>
                            <!--input type="text" class="form-control" id="p_work_exp_years" name="p_work_exp_years" -->
							<select class="form-control col-md-3 col-xs-12" id="p_work_exp_years" name="p_work_exp_years">
								<option> -- Choose -- </option>
								<option value="0"> N/A</option>
								<option value="1">1 year</option>
								<option value="2">2 years</option>
								<option value="3">3 years</option>
								<option value="4">4 years</option>
								<option value="5">5 years</option>
								<option value="6">6 years</option>
								<option value="7">7 years</option>
								<option value="8">8 years</option>
								<option value="9">9 years</option>
								<option value="10">10 years</option>
								<option value="11">11 years</option>
								<option value="12">12 years</option>
								<option value="13">13 years</option>
								<option value="14">14 years</option>
								<option value="15">15 years</option>
							</select>
                         </div>
						   <div class="col-md-4 col-sm-12 col-xs-12">
                            <label class="control-label">Work Description</label>
                            <input type="text" class="form-control" id="p_workdesc" name="p_workdesc" >
                         </div>
						  <div class="col-md-2 col-sm-12 col-xs-12">
                            <label class="control-label">Training Hrs</label>
                            <input type="text" class="form-control" id="p_traininghrs" name="p_traininghrs" >
                         </div>
						   <div class="col-md-4 col-sm-12 col-xs-12">
                            <label class="control-label">Training Description</label>
                            <input type="text" class="form-control" id="p_trainingdesc" name="p_trainingdesc" >
                         </div>
                         </div>
						
						<div class="form-group col-md-12 col-sm-12 col-xs-12">
						</br>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12 btn-group">
								<a type="button" id="btn_position_addnew" class="btn btn-primary col-xs-4"><i class="fa fa-plus"> </i> Add New</a>
								<!--a type="button" id="btn_removeposition" class="btn btn-danger col-xs-4"><i class="fa fa-remove"> </i> Remove</a-->
								<!--a type="submit" class="btn btn-success col-xs-4"><i class="fa fa-save"> </i> Save</a-->
								<button type="submit" id="btn_position_save" class="btn btn-success col-xs-4"><i class="fa fa-save"> </i> Save</button> 
							</div>
						<div class="form-group col-md-12 col-sm-12 col-xs-12">	
						<hr> 
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
                        <table id="dt_position" class="cell-border compact hover" cellspacing="0" width="100%">
                            <thead>
							
								<tr>
									<th colspan="4"><strong>POSITION</strong></th>
									<th colspan="2"><strong>ELIGIBILITY</strong></th>
									<th colspan="3"><strong>EDUCATION</strong></th>
									<th colspan="2"><strong>WORK EXPERIENCE</strong></th>
									<th colspan="2"><strong>TRAINING</strong></th>
									<th colspan="2"><strong>OTHERS</strong></th>
								</tr>
                                <tr>
									<th>Code</th>
                                    <th>Title</th>
									<th>SG</th>
									<th>Level</th> <!-- end of position -->
									<th>Kind</th>
									<th>Course</th>  <!-- end of eligibility -->
									<th>Requirements</th>
									<th>Description</th>
									<th>Sector</th> <!-- end of education -->
									<th>Years</th>
									<th>Description</th><!-- end of WORK EXP -->
									<th>Hourse</th>
									<th>Description</th><!-- end of TRAINING -->
									<th>Parent</th>
									<th>Relevance</th> <!-- end of OTHERS -->
                                </tr>
                            </thead>
                        </table>
					</div>
				</div>
			</div>
		
            
        </div>
    </div>
</div>


