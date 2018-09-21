
      <!-- page content -->
      <div class="right_col" role="main">

        <div class="">
 
          <div class="clearfix"></div>

          <div class="">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><i class="fa fa-bars"></i> Tabs <small>Float left</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
					
                      <li role="presentation" class="active">
								<a href="#tab_content1" 
										id="personalinfo" 
										role="tab" 
										data-toggle="tab" 
										aria-expanded="true">
								Info</a>
                      </li>
					  
                      <li  role="presentation" class="">
								<a href="#tab_content2" 
										role="tab" 
										id="famillybg" 
										data-toggle="tab" 
										aria-expanded="false">
								Familly</a>
                      </li>
					  
					
					  
                      <li  role="presentation" class="">
								<a href="#tab_content3" 
										role="tab" 
										id="educ_bg" 
										data-toggle="tab" 
										aria-expanded="false">
								Educational</a>
                      </li>
					  
					    	<li  role="presentation" class="">
								<a href="#tab_content5" 
										role="tab" 
										id="elig" 
										data-toggle="tab" 
										aria-expanded="false">
								Eligibility</a>
                      </li>
					  
					   <li  role="presentation" class="">
								<a href="#tab_content9" 
										role="tab" 
										id="wor_exp" 
										data-toggle="tab" 
										aria-expanded="false">
								Work</a>
                      </li>
					  <li  role="presentation" class="">
								<a href="#tab_content8" 
										role="tab" 
										id="vol_work" 
										data-toggle="tab" 
										aria-expanded="false">
								Voluntary Work</a>
                      </li>
					  
					  <li  role="presentation" class="">
								<a href="#tab_content4" 
										role="tab" 
										id="training" 
										data-toggle="tab" 
										aria-expanded="false">
								Training</a>
                      </li>
					  
				
					  
					  <li  role="presentation" class="">
								<a href="#tab_content6" 
										role="tab" 
										id="skills" 
										data-toggle="tab" 
										aria-expanded="false">
								Skills</a>
                      </li>
					  
					  <li  role="presentation" class="">
								<a  href="#tab_content7" 
										role="tab" 
										id="char_reff" 
										data-toggle="tab" 
										aria-expanded="false">
								Question & Reff</a>
                      </li>
					  
					
					  
				
                    </ul>
					
                    <div id="myTabContent" class="tab-content">
					 <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="personalinfo">
					  <form id="frm_new_emp" name="frm_new_emp">
				
						<div class="row">
							<div class="col-md-12">
							
							<div class="col-md-3 col-sm-3">
								<img src="http://localhost/csfphris_dev/pds_image/default-pictures.jpg" style="width:200px;height:200px;" class="hoverZoomLink">
								<img src="http://localhost/csfphris_dev/pds_image/DefaultSignature.jpg" style="width:200px;height:40px;">
							</div>
							<div class="col-md-9 col-sm-9"><hr></div>
								<div class="col-md-2">
								<label class="form-label">Employee No.: </label>
									<input type="text" id="a_empno" name="a_empno" class="form-control col-md-4" value="" placeholder="Employee No.">
								</div>
								<div class="col-md-2">
									<label class="form-label">FDOS: </label>
									<input type="text" id="a_fdos" name="a_fdos" class="date form-control col-md-4" value="" placeholder="FDOS">
								</div>
								<div class="col-md-2">
									<label class="form-label">Employement Status: </label>
									<select type="text" id="a_status" name="a_status" class="form-control col-md-4">
															<option>-- Choose --</option>
															<option value="PERMANENT">Permanent</option>
															<option value="CO-TERMINUS">Co-Termnus</option>
															<option value="ELECTED">Elected</option>
															<option value="CASUAL">Casual</option>
															<option value="PROJECT BASED">Project Based</option>
														</select>
									
									<!-- <input type="text" id="a_status" name="a_status" class="form-control col-md-4" value="" placeholder="Employement Status"> -->
								</div>
								<div class="col-md-3">
									<label class="form-label">Position: </label>
									<select id="a_position" name="a_position" class="form-control col-md-4">
										<option>-- Choose --</option>
									<?php foreach($position as $p) {?>
										<option value="<?php echo $p->a_position; ?>"><?php echo $p->a_position; ?></option>
									<?php } ?>
									</select>
									<!--
									<input type="text" id="a_position" name="a_position" class="form-control col-md-4" value="" placeholder="Position">
									-->
								</div>
								<div class="col-md-2">
									<label class="form-label">Department: </label>
									<select id="a_office" name="a_office" class="form-control col-md-4">
										<option>-- Choose --</option>
										<?php foreach($dept as $d){ ?>
										<option value="<?php echo $d->o_id;?>"><?php echo $d->o_code; ?></option>
										<?php }?>
										</select>
									
								<!--	<input type="text" id="a_office" name="a_office" class="form-control col-md-4" value="" placeholder="Department"> -->
								</div>
								<div class="col-md-2">
									<label class="form-label">Division: </label>
									<select id="a_division" name="a_division" class="form-control col-md-4">
									</select>
									<!--<select id="a_division" name="a_division" class="form-control col-md-4">
									<option>-- Choose --</option>
									<?php foreach($div as $dv){ ?>
										<option value="<?php echo $dv->o_id;?>" ><?php echo $dv->o_code; ?></option>
									<?php }?>
									</select>
									<input type="text" id="a_division" name="a_division" class="form-control col-md-4" value="" placeholder="Division"> -->
								</div>

								
								<div class="col-md-2">
									<label class="form-label">Grade: </label>
									<select name="a_salarygrade" id="a_salarygrade" class="form-control">
										<option>-- Choose --</option>
										<option value="Grade 1" >Grade 1</option>
										<option value="Grade 2" >Grade 2</option>
										<option value="Grade 3" >Grade 3</option>
										<option value="Grade 4" >Grade 4</option>
										<option value="Grade 5" >Grade 5</option>
										<option value="Grade 6" >Grade 6</option>
										<option value="Grade 7" >Grade 7</option>
										<option value="Grade 8" >Grade 8</option>
										
										<option value="Grade 9" >Grade 9</option>
										<option value="Grade 10" >Grade 10</option>
										<option value="Grade 11" >Grade 11</option>
										<option value="Grade 12" >Grade 12</option>
										<option value="Grade 13" >Grade 13</option>
										<option value="Grade 14" >Grade 14</option>
										<option value="Grade 15" >Grade 15</option>
										<option value="Grade 16" >Grade 16</option>
										
										<option value="Grade 17" >Grade 17</option>
										<option value="Grade 18" >Grade 18</option>
										<option value="Grade 19" >Grade 19</option>
										<option value="Grade 20" >Grade 20</option>
										<option value="Grade 21" >Grade 21</option>
										<option value="Grade 22" >Grade 22</option>
										<option value="Grade 23" >Grade 23</option>
										<option value="Grade 24" >Grade 24</option>
										
										<option value="Grade 25" >Grade 25</option>
										<option value="Grade 26" >Grade 26</option>
										<option value="Grade 27" >Grade 27</option>
										<option value="Grade 28" >Grade 28</option>
										<option value="Grade 29" >Grade 29</option>
										<option value="Grade 30" >Grade 30</option>
									</select>
								<!--	<input type="text" id="a_salarygrade" name="a_salarygrade" class="form-control col-md-4" value="" placeholder="Grade"> -->
								</div>
								<div class="col-md-2">
									<label class="form-label">Step: </label>
									<select name="a_salarystep" id="a_salarystep" class="form-control">
										<option class="form-control col-md-4">Choose Step</option>
										<option value="No Step" >No Step</option>
										<option value="Step 1" >Step 1</option>
										<option value="Step 2" >Step 2</option>
										<option value="Step 3" >Step 3</option>
										<option value="Step 4" >Step 4</option>
										<option value="Step 5" >Step 5</option>
										<option value="Step 6" >Step 6</option>
										<option value="Step 7" >Step 7</option>
										<option value="Step 8" >Step 8</option>
									</select>
								<!--	<input type="text" id="a_salarystep" name="a_salarystep" class="form-control col-md-4" value="" placeholder="Step"> -->
								</div>
								<div class="col-md-2">
									<label class="form-label">Access Level: </label>
									<select id="a_level" name="a_level" class="form-control col-md-4">
								<option  	value="">Choose Level</option>
								<option 	value="Manager">Manager</option>
								<option		value="Admin">Admin</option>
								<option 	value="Mayor">Mayor</option>
								<option 	value="Department">Department Head</option>
								<option 	value="Division">Division Head</option>
								<option 	value="HR">HR Head</option>
								<option 	value="HROfficer">HR Officer</option>
								<option		value="Employee">Employee</option>
							</select>
								<!--	<input type="text" id="a_level" name="a_level" class="form-control col-md-4" value="" placeholder="Access Level"> -->
								</div>
								
								<div class="col-md-3">
									<label class="form-label">Hiest Eligibility: </label>
									<input type="text" id="a_hielig" name="a_hielig" class="form-control col-md-4" value="" placeholder="Employee No.">
								</div>
								<div class="col-md-4">
									<label class="form-label">Hiest Education: </label>
									<input type="text" id="a_hieduc" name="a_hieduc" class="form-control col-md-4" value="" placeholder="Employee No.">
								</div>
							</div>
						</div>
						
					
							
					
                     
						<div class="row">
							<div class="col-md-12">
							<hr>
								
								<div class="col-md-12">
									<label class="form-label">Full Name: </label>
								</div>
								
								<div class="col-md-2">
									<input type="text" id="a_firstname" name="a_firstname" class="form-control" value="" placeholder="First Name">
								</div>
								<div class="col-md-2">
									<input type="text" id="a_middlename" name="a_middlename" class="form-control col-md-4" value="" placeholder="Middle Name">
								</div>
								<div class="col-md-2">
									<input type="text" id="a_mi" name="a_mi" class="form-control col-md-4" value="" placeholder="Middle Initial">
								</div>
								<div class="col-md-2">
									<input type="text" id="a_lastname" name="a_lastname" class="form-control col-md-4" value="" placeholder="Last Name">
								</div>
								<div class="col-md-2">
									<input type="text" id="a_namext" name="a_namext" class="form-control col-md-4" value="" placeholder="Ext. Name">
								</div>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-2">
									<label class="form-label">Date of Birth: </label>
									
									<input type="text" id="pi_birthdate" name="pi_birthdate" class="date form-control" value="" placeholder="Date of Birth">
								</div>
								<div class="col-md-4">
									<label class="form-label">Place of Birth: </label>
									<input type="text" id="pi_birthplace" name="pi_birthplace" class="form-control" value="" placeholder="Place of Birth">
								</div>
								<div class="col-md-2">
									<label class="form-label">Gender: </label>
									<select name="pi_gender" id="pi_gender" class="form-control">
									<option>Choose Gender</option>
										<option value="MALE">MALE</option>
										<option value="FEMALE">FEMALE</option>
									</select>
								<!--	<input type="text" id="pi_gender" name="pi_gender" class="form-control" value="" placeholder="First Name"> -->
								</div>
								<div class="col-md-2">
									<label class="form-label">Civil Status: </label>
									<select name="pi_status" id="pi_status" class="form-control">
															<option value="SINGLE">SINGLE</option>
															<option value="MARRIED">MARRIED</option>
															<option value="SEPARATED">SEPARATED</option>
															<option value="WIDOWED">WIDOWED</option>
														 </select>
								<!--	<input type="text" id="pi_status" name="pi_status" class="form-control" value="" placeholder="Civil Status"> -->
								</div>
								<div class="col-md-2">
									<label class="form-label">Citizenship: </label>
									<input type="text" id="pi_citizenship" name="pi_citizenship" class="form-control" value="" placeholder="Citizenship">
								</div>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-1">
									<label class="form-label">Height: </label>
									<input type="text" id="pi_height" name="pi_height" class="form-control" value="" placeholder="Height">
								</div>
								<div class="col-md-1">
									<label class="form-label">Weight: </label>
									<input type="text" id="pi_weight" name="pi_weight" class="form-control" value="" placeholder="Weight">
								</div>
								<div class="col-md-2">
									<label class="form-label">Blood Type: </label>
									<input type="text" id="pi_bloodtype" name="pi_bloodtype" class="form-control" value="" placeholder="Blood Type">
								</div>
								<div class="col-md-2">
									<label class="form-label">GSIS No.: </label>
									<input type="text" id="pi_gsis" name="pi_gsis" class="form-control" value="" placeholder="GSIS No.">
								</div>
								<div class="col-md-2">
									<label class="form-label">PAG-IBIG ID NO.: </label>
									<input type="text" id="pi_pagibig" name="pi_pagibig" class="form-control" value="" placeholder="PAG-IBIG ID NO.">
								</div>
								<div class="col-md-2">
									<label class="form-label">PHILHEALTH NO.: </label>
									<input type="text" id="pi_philhealth" name="pi_philhealth" class="form-control" value="" placeholder="PHILHEALTH NO.">
								</div>
								<div class="col-md-2">
									<label class="form-label">SSS NO.: </label>
									<input type="text" id="pi_sss" name="pi_sss" class="form-control" value="" placeholder="SSS No.">
								</div>
							
							</div>
						</div>
						
						
						<div class="row">
							<div class="col-md-12">
							<hr>
							<div class="col-md-12">
								<label class="form-label">Residential Address </label>
							</div>
								<div class="col-md-2">
									<label class="form-label">Street: </label>
									<input type="text" id="pi_resstreet" name="pi_resstreet" class="form-control" value="" placeholder="Street">
								</div>
								<div class="col-md-2">
									<label class="form-label">Barangay: </label>
									<input type="text" id="pi_resbrgy" name="pi_resbrgy" class="form-control" value="" placeholder="Barangay">
								</div>
								<div class="col-md-3">
									<label class="form-label">City: </label>
									<input type="text" id="pi_rescity" name="pi_rescity" class="form-control" value="" placeholder="City">
								</div>
								<div class="col-md-2">
									<label class="form-label">Province: </label>
									<input type="text" id="pi_resprov" name="pi_resprov" class="form-control" value="" placeholder="Province">
								</div>
								<div class="col-md-1">
									<label class="form-label">Zip: </label>
									<input type="text" id="pi_reszip" name="pi_reszip" class="form-control" value="" placeholder="Zip">
								</div>
								<div class="col-md-2">
									<label class="form-label">Contact No.: </label>
									<input type="text" id="pi_resphone" name="pi_resphone" class="numeric form-control" value="" placeholder="Contact No.">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
							<hr>
							<div class="col-md-10">
								<label class="form-label">Permanent Address </label>
							</div>
							<div class="col-md-2">
								<button type="button" id="sameasres" name="sameasres" class="btn btn-info">Same as Residential</button>
							</div>
								<div class="col-md-2">
									<label class="form-label">Street: </label>
									<input type="text" id="pi_permstreet" name="pi_permstreet" class="form-control" value="" placeholder="Street">
								</div>
								<div class="col-md-2">
									<label class="form-label">Barangay: </label>
									<input type="text" id="pi_permbrgy" name="pi_permbrgy" class="form-control" value="" placeholder="Barangay">
								</div>
								<div class="col-md-3">
									<label class="form-label">City: </label>
									<input type="text" id="pi_permcity" name="pi_permcity" class="form-control" value="" placeholder="City">
								</div>
								<div class="col-md-2">
									<label class="form-label">Province: </label>
									<input type="text" id="pi_permprov" name="pi_permprov" class="form-control" value="" placeholder="Province">
								</div>
								<div class="col-md-1">
									<label class="form-label">Zip: </label>
									<input type="text" id="pi_permzip" name="pi_permzip" class="form-control" value="" placeholder="Zip">
								</div>
								<div class="col-md-2">
									<label class="form-label">Contact No.: </label>
									<input type="text" id="pi_permphone" name="pi_permphone" class="numeric form-control" value="" placeholder="Contact No.">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
							<hr/>
								<div class="col-md-3">
									<label class="form-label">E-mail address (if any): </label>
									<input type="text" id="pi_email" name="pi_email" class="form-control" value="" placeholder="E-mail">
								</div>
								<div class="col-md-2">
									<label class="form-label">Cellphone No. (if any): </label>
									<input type="text" id="pi_phone" name="pi_phone" class="numeric form-control" value="" placeholder="Cellphone No.">
								</div>
								<div class="col-md-2">
									<label class="form-label">Tin No.: </label>
								
									<input type="text" id="pi_tin" name="pi_tin" class="form-control" value="" placeholder="Street">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
							<hr/>
								<div class="col-md-4 col-md-offset-4">
							
								<input type="hidden" id="a_id" name="a_id" class="form-control" value="" placeholder="Street">
									<button type="submit" class="form-control btn btn-success"><i class="fa fa-save"></i> Save New Eployee</button>
								</div>
							</div>
						</div>
						</form>
                      </div>
					
					  
	<!-- FAMILLY BACK GROUND -->	
					<!--
						<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="famillybg">
						<form id="frm_familly" name="frm_familly">
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-12">
										<label class="form-label">Spouse Full Name: </label>
									</div>
								
								
									<div class="col-md-3">
										<input type="text" id="fb_spousefname" name="fb_spousefname" class="form-control" value="" placeholder="First Name">
									</div>
							
									<div class="col-md-3">
										<input type="text" id="fb_spousemi" name="fb_spousemi" class="form-control col-md-4" value="" placeholder="Middle Initial">
									</div>
									<div class="col-md-3">
										<input type="text" id="fb_spouselname" name="fb_spouselname" class="form-control col-md-4" value="" placeholder="Last Name">
									</div>
									<div class="col-md-3">
										<input type="text" id="fb_spouseextname" name="fb_spouseextname" class="form-control col-md-4" value="" placeholder="Ext. Name">
									</div>
							
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-3">
										<label class="form-label">Occupation: </label>
										<input type="text" id="fb_spousework" name="fb_spousework" class="form-control" value="" placeholder="First Name">
									</div>
									<div class="col-md-3">
										<label class="form-label">Employer: </label>
										<input type="text" id="fb_spouseemployer" name="fb_spouseemployer" class="form-control" value="" placeholder="First Name">
									</div>
									<div class="col-md-4">
										<label class="form-label">Employer Address: </label>
										<input type="text" id="fb_spouseemployeraddress" name="fb_spouseemployeraddress" class="form-control" value="" placeholder="First Name">
									</div>
									<div class="col-md-2">
										<label class="form-label">Employer Phone: </label>
										<input type="text" id="fb_spouseemployerphone" name="fb_spouseemployerphone" class="form-control" value="" placeholder="First Name">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
								<hr>
									<div class="col-md-12">
										<label class="form-label">Father Full Name: </label>
									</div>

									<div class="col-md-3">
										<input type="text" id="fb_fatherfname" name="fb_fatherfname" class="form-control" value="" placeholder="First Name">
									</div>
				
									<div class="col-md-3">
										<input type="text" id="fb_fathermi" name="fb_fathermi" class="form-control col-md-4" value="" placeholder="Middle Initial">
									</div>
									<div class="col-md-3">
										<input type="text" id="fb_fatherlname" name="fb_fatherlname" class="form-control col-md-4" value="" placeholder="Last Name">
									</div>
									<div class="col-md-3">
										<input type="text" id="fb_fatherext" name="fb_fatherext" class="form-control col-md-4" value="" placeholder="Ext. Name">
									</div>
							
								</div>
							</div>
							
							
							<div class="row">
								<div class="col-md-12">
								<hr>
									<div class="col-md-12">
										<label class="form-label">Father Full Name: </label>
									</div>

									<div class="col-md-3">
										<input type="text" id="fb_motherfname" name="fb_motherfname" class="form-control" value="" placeholder="First Name">
									</div>
				
									<div class="col-md-3">
										<input type="text" id="fb_mothermi" name="fb_mothermi" class="form-control col-md-4" value="" placeholder="Middle Initial">
									</div>
									<div class="col-md-3">
										<input type="text" id="fb_motherlname" name="fb_motherlname" class="form-control col-md-4" value="" placeholder="Last Name">
									</div>
									<div class="col-md-3">
										<input type="text" id="fb_motherext" name="fb_motherext" class="form-control col-md-4" value="" placeholder="Ext. Name">
									</div>
							
								</div>
							</div>
							<div class="row">
							<hr>
								<div class="col-md-4 col-md-offset-4">
									<input type="hidden" id="a_id" name="a_id" class="form-control col-md-4" value="">
									<button type="submit" class="form-control btn btn-success"><i class="fa fa-save"></i> Save Update</button>
								</div>
							</div>
							</form>
						
					
						
							<div class="row">
								<div class="col-md-12">
								
								<hr>
									<div class="col-md-4">
										<button class="btn btn-info" id="add_child" name="add_child"><i class="fa fa-plus"></i> Add Child</button>
									</div>
									<table class="table table-bordered">
										<thead>
											<tr>
												<td>First Name</td>
												<td>Middile Name</td>
												<td>Last Name</td>
												<td>Extention Name</td>
												<td>Birth Date</td>
												<td>Action</td>
											</tr>
										</thead>
										<tbody>
									
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td>
													<a href="">e</a>
												</td>
											</tr>
									
										</tbody>
									
									</table>
									<div id="add_new_child" name="add_new_child">
									<form id="frm_child" name="frm_child">
										<hr>
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-3">
													<label class="form-label">First Name:</label>
													<input type="text" id="c_fname" name="c_fname" class="form-control">
												</div>
												<div class="col-md-2">
													<label class="form-label">Middile Initial:</label>
													<input type="text" id="c_mi" name="c_mi" class="form-control">
												</div>
												<div class="col-md-3">
													<label class="form-label">Last Name:</label>
													<input type="text" id="c_lname" name="c_lname" class="form-control">
												</div>
												<div class="col-md-2">
													<label class="form-label">Extention Name:</label>
													<input type="text" id="c_extname" name="c_extname" class="form-control">
												</div>
												<div class="col-md-2">
													<label class="form-label">Birth Date:</label>
													<input type="text" id="c_birthdate" name="c_birthdate" class="form-control">
												</div>
											</div>
										</div>
										
										<div class="row">
										<br/>
											<div class="col-md-4 col-md-offset-4">
												<input type="hidden" id="a_id" name="a_id" value="" class="form-control">
												<button type="submit" class="btn btn-success form-control"><i class="fa fa-save"></i> Save Child Info</button>
											</div>
										</div>
										
										</form>
									</div>
								</div>
							</div>
								
                      </div>
					  -->
				<!--
                      <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="educ_bg">
							<div class="row">
								<div class="col-md-12">
								<hr>
									<div class="col-md-4">
										<button class="btn btn-info" id="add_educ" name="add_educ"><i class="fa fa-plus"></i> Add Educational Background</button>
									</div>
						
									<table class="table table-bordered">
										<thead>
											<tr>
												<td>Level</td>
												<td>School Name</td>
												<td>Degree</td>
												<td>Year Graduated</td>
												<td>From</td>
												<td>To</td>
												<td>Award</td>
												<td>Action</td>
											</tr>
										</thead>
										<tbody>
								
									
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td>
													<a href=""></a>
												</td>
											</tr>
										
										</tbody>
									
									</table>
									
									<div id="add_new_educ" name="add_new_educ">
									<form id="frm_educbg" name="frm_educbg">
										<hr>
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-3">
													<label class="form-label">Level:</label>
													<input type="text" id="pi_level" name="pi_level" class="form-control">
												</div>
												<div class="col-md-4">
													<label class="form-label">School Name:</label>
													<input type="text" id="pi_schoolname" name="pi_schoolname" class="form-control">
												</div>
												<div class="col-md-3">
													<label class="form-label">Degree:</label>
													<input type="text" id="pi_degree" name="pi_degree" class="form-control">
												</div>
												<div class="col-md-2">
													<label class="form-label">Year Graduated:</label>
													<input type="text" id="pi_yrgrad" name="pi_yrgrad" class="form-control">
												</div>
												<div class="col-md-2">
													<label class="form-label">From:</label>
													<input type="text" id="pi_from" name="pi_from" class="form-control">
												</div>
												<div class="col-md-2">
													<label class="form-label">To:</label>
													<input type="text" id="pi_to" name="pi_to" class="form-control">
												</div>
												
												<div class="col-md-2">
													<label class="form-label">Award:</label>
													<input type="text" id="pi_honors" name="pi_honors" class="form-control">
												</div>
											</div>
										</div>
										
										<div class="row">
										<br/>
											<div class="col-md-4 col-md-offset-4">
												<input type="hidden" id="a_id" name="a_id" value="" class="form-control">
												<button type="submit" class="btn btn-success form-control"><i class="fa fa-save"></i> Save Education Info</button>
											</div>
										</div>
										
										</form>
								</div>
								</div>
								
								
							</div>
                      </div>   
					  -->
					  
					  <!--
					  <div role="tabpanel" class="tab-pane fade" id="tab_content9" aria-labelledby="work_exp">
							<div class="row">
								<div class="col-md-12">
								<hr>
									<div class="col-md-4">
										<button class="btn btn-info" id="add_work" name="add_work"><i class="fa fa-plus"></i> Add Work Experience </button>
									</div>
						
									<table class="table table-bordered">
										<thead>
											<tr>
												<td>Inclusive Date</td>
												<td>Position</td>
												<td>Agency / Company</td>
												<td>Salary</td>
												<td>Salary Grade</td>
												<td>Status</td>
												<td>Gov't Service</td>
												<td>Action</td>
											</tr>
										</thead>
										<tbody>
										
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											
												<td>
													<a href=""></a>
												</td>
											</tr>
									
										</tbody>
									
									</table>
									
								<div id="add_new_work" name="add_new_work">
									<form id="frm_work" name="frm_work">
										<hr>
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-1">
													<label class="form-label">From</label>
													<input type="text" id="p_from" name="p_from" class="form-control">
												</div>
												<div class="col-md-1">
													<label class="form-label">To:</label>
													<input type="text" id="p_to" name="p_to" class="form-control">
												</div>
												<div class="col-md-2">
													<label class="form-label">Position:</label>
													<input type="text" id="p_position" name="p_position" class="form-control">
												</div>
												
												<div class="col-md-2">
													<label class="form-label">Monthly Salary:</label>
													<input type="text" id="p_salarymonthly" name="p_salarymonthly" class="form-control">
												</div>
												<div class="col-md-1">
													<label class="form-label">Grade:</label>
													<input type="text" id="p_salarygrade" name="p_salarygrade" class="form-control">
												</div>
												<div class="col-md-1">
													<label class="form-label">Step:</label>
													<input type="text" id="p_salarystep" name="p_salarystep" class="form-control">
												</div>
												<div class="col-md-2">
													<label class="form-label">Status:</label>
													<input type="text" id="p_appointment" name="p_appointment" class="form-control">
												</div>
												<div class="col-md-1">
													<label class="form-label">is Gov't:</label>
													<input type="text" id="p_isgovt" name="p_isgovt" class="form-control">
												</div>
									
											</div>
										</div>
										
										<div class="row">
										<br/>
											<div class="col-md-4 col-md-offset-4">
												<input type="hidden" id="a_id" name="a_id" value="" class="form-control">
												<button type="submit" class="btn btn-success form-control"><i class="fa fa-save"></i> Save Work Experience</button>
											</div>
										</div>
									</form>
								</div>
								</div>
								
								
							</div>
                      </div>   
					  
					  -->
					  
					  <!--
					  <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="training">
							<div class="row">
								<div class="col-md-12">
									<hr>
									<div class="col-md-4">
										<button class="btn btn-info" id="add_training" name="add_training"><i class="fa fa-plus"></i> Add Educational Background</button>
									</div>
									<table class="table table-bordered">
										<thead>
											<tr>
												<td>Seminar</td>
												<td>From</td>
												<td>To</td>
												<td>Hrs</td>
												<td>Condocted by</td>
												<td>Relevant</td>
												<td>Action</td>
											</tr>
										</thead>
										<tbody>
									
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td>
													<a href=""></a>
												</td>
											</tr>
										
										</tbody>
									</table>
									<div id="add_new_training" name="add_new_training">
									<form id="frm_training" name="frm_training">
										<hr>
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-5">
													<label class="form-label">Training:</label>
													<input type="text" id="t_seminar" name="t_seminar" class="form-control">
												</div>
												<div class="col-md-2">
													<label class="form-label">From:</label>
													<input type="text" id="t_from" name="t_from" class="form-control">
												</div>
												<div class="col-md-2">
													<label class="form-label">To:</label>
													<input type="text" id="t_to" name="t_to" class="form-control">
												</div>
												<div class="col-md-2">
													<label class="form-label">Hrs:</label>
													<input type="text" id="t_hoursno" name="t_hoursno" class="form-control">
												</div>
												<div class="col-md-4">
													<label class="form-label">Conducted by:</label>
													<input type="text" id="t_conductor" name="t_conductor" class="form-control">
												</div>
												<div class="col-md-2">
													<label class="form-label">Relevant?:</label>
													<input type="text" id="t_relevant" name="t_relevant" class="form-control">
												</div>
											
											</div>
										</div>
										<div class="row">
										<br/>
											<div class="col-md-4 col-md-offset-4">
												<input type="hidden" id="a_id" name="a_id" value="" class="form-control">
												<button type="submit" class="btn btn-success form-control"><i class="fa fa-save"></i> Save Training Info</button>
											</div>
										</div>
										
										</form>
									</div>
									
									
							
								</div>
							</div>
                      </div>
					  
					  -->
					  
					  <!--
					   <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="elig">
							<div class="row">
								<div class="col-md-12">
								<hr>
									<div class="col-md-4">
										<button class="btn btn-info" id="add_elig" name="add_elig"><i class="fa fa-plus"></i> Add Eligibility</button>
									</div>
									<table class="table table-bordered">
										<thead>
											<tr>
												<td>Type</td>
												<td>Career</td>
												<td>Rating</td>
												<td>Exam Date</td>
												<td>Exam Place</td>
												<td>Number</td>
												<td>Date Realease</td>
												<td>Action</td>
											</tr>
										</thead>
										<tbody>
										
									
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td>
													<a href=""></a>
												</td>
											</tr>
										
										</tbody>
									</table>
								
								<div id="add_new_elig" name="add_new_elig">
									<form id="frm_elig" name="frm_elig">
										<hr>
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-2">
													<label class="form-label">Type:</label>
													<input type="text" id="el_type" name="el_type" class="form-control">
												</div>
												<div class="col-md-4">
													<label class="form-label">Career:</label>
													<input type="text" id="el_career" name="el_career" class="form-control">
												</div>
												<div class="col-md-2">
													<label class="form-label">Rating:</label>
													<input type="text" id="el_rating" name="el_rating" class="form-control">
												</div>
												<div class="col-md-2">
													<label class="form-label">Exam Date:</label>
													<input type="text" id="el_examdate" name="el_examdate" class="form-control">
												</div>
												<div class="col-md-4">
													<label class="form-label">Examination	 Place:</label>
													<input type="text" id="el_examplace" name="el_examplace" class="form-control">
												</div>
												<div class="col-md-2">
													<label class="form-label">Number:</label>
													<input type="text" id="el_number" name="el_number" class="form-control">
												</div>
												<div class="col-md-2">
													<label class="form-label">Date Release:</label>
													<input type="text" id="el_daterelease" name="el_daterelease" class="form-control">
												</div>
											
											</div>
										</div>
										<div class="row">
										<br/>
											<div class="col-md-4 col-md-offset-4">
												<input type="hidden" id="a_id" name="a_id" value="" class="form-control">
												<button type="submit" class="btn btn-success form-control"><i class="fa fa-save"></i> Save Training Info</button>
											</div>
										</div>
										
										</form>
									</div>
								</div>
							</div>
                      </div>
					  -->
					  
					  <!--
					  <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="skills">
							<div class="row">
								<div class="col-md-12">
									<hr>
									<div class="col-md-4">
										<button class="btn btn-info" id="add_skills" name="add_skills"><i class="fa fa-plus"></i> Add Skills</button>
									</div>
									<table class="table table-bordered">
										<thead>
											<tr>
												<td>Skills</td>
												<td>Non-Academic</td>
												<td>Membership</td>
											
												<td>Action</td>
											</tr>
										</thead>
										<tbody>
									
									
											<tr>
												<td></td>
												<td></td>
												<td></td>
										
												<td>
													<a href=""></a>
												</td>
											</tr>
									
										</tbody>
									</table>
									<div id="add_new_skills" name="add_new_skills">
									<form id="frm_skills" name="frm_skills">
										<hr>
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-3">
													<label class="form-label">Skill:</label>
													<input type="text" id="sh_skills" name="sh_skills" class="form-control">
												</div>
												
												<div class="col-md-3">
													<label class="form-label">Non-Academic:</label>
													<input type="text" id="sh_nonacademic" name="sh_nonacademic" class="form-control">
												</div>
												<div class="col-md-3">
													<label class="form-label">Membership:</label>
													<input type="text" id="sh_membership" name="sh_membership" class="form-control">
												</div>
											
											</div>
										</div>
										<div class="row">
										<br/>
											<div class="col-md-4 col-md-offset-4">
												<input type="hidden" id="a_id" name="a_id" value="" class="form-control">
												<button type="submit" class="btn btn-success form-control"><i class="fa fa-save"></i> Save Skills</button>
											</div>
										</div>
										
										</form>
									</div>
								</div>
							</div>
                      </div>
					  -->
					  
					  
					  <!--
					  <div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="char_reff">
					  
				
							<div class="row">
							<form id="frm_questions" name="frm_questions">
								<div class="col-md-12">
								
								
								<hr>
									<div class="col-md-12">
										<p>36.	Are you related by consanguinity or affinity to any of the following :</p>
									</div>
									<div class="col-md-8">
										<p>a.	Within the third degree (for National Government Employees): appointing authority, recommending authority, chief of office/bureau/departmentor person who has immediate supervision over you in the Office, Bureau or Department where you will be appointed?</p>
									</div>
									<div class="col-md-4">
										<input type="radio" value="Yes" id="q_36_a" name="q_36_a" > Yes
										<input type="radio" value="No" id="q_36_a" name="q_36_a" > No
										<textarea id="q_36_a_details" name="q_36_a_details"></textarea>
									</div>
									
									<div class="col-md-8">
										<p>b.	Within the fourth degree (for Local Government Employees): appointing authority or recommending authority where you will be appointed??</p>
									</div>
									<div class="col-md-4">
										<input type="radio" value="Yes" id="q_36_b" name="q_36_b" > Yes
										<input type="radio" value="No"  id="q_36_b" name="q_36_b"> No
										<textarea id="q_36_b_details" name="q_36_b_details"></textarea>
									</div>
									
								</div>
								
								<div class="col-md-12">
								<hr>
									<div class="col-md-12">
										<p>37.</p>
									</div>
									<div class="col-md-8">
										<p>a.	Have you ever been formally charged?</p>
									</div>
									<div class="col-md-4">
										<input type="radio"  value="Yes" id="q_37_a" name="q_37_a" > Yes
										<input type="radio" value="No"  id="q_37_a" name="q_37_a" > No
										<textarea id="q_37_a_details" name="q_37_a_details"></textarea>
									</div>
									
									<div class="col-md-8">
										<p>b. Have you ever been guilty of any administrative offense?</p>
									</div>
									<div class="col-md-4">
										<input type="radio" value="Yes"  id="q_37_b" name="q_37_b" > Yes
										<input type="radio" value="No"  id="q_37_b" name="q_37_b"> No
										<textarea id="q_37_b_details" name="q_37_b_details"></textarea>
									</div>
								</div>
								
								<div class="col-md-12">
									<hr>
									<div class="col-md-8">
										<p>38. Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</p>
									</div>
									<div class="col-md-4">
										<input type="radio"  value="Yes" id="q_38" name="q_38"> Yes
										<input type="radio" value="No"  id="q_38" name="q_38" > No
										<textarea id="q_38_details" name="q_38_details"></textarea>
									</div>
								</div>
								
								<div class="col-md-12">
									<hr>
									<div class="col-md-8">
										<p>39. Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract, AWOL or phased out, in the public or private sector?</p>
									</div>
									<div class="col-md-4">
										<input type="radio"  value="Yes" id="q_39" name="q_39"> Yes
										<input type="radio" value="No"  id="q_39" name="q_39" > No
										<textarea id="q_39_details" name="q_39_details"></textarea>
									</div>
								</div>	
								
								<div class="col-md-12">
									<hr>
									<div class="col-md-8">
										<p>40. Have you ever been a candidate in a national or local election (except Barangay election)?</p>
									</div>
									<div class="col-md-4">
										<input type="radio" value="Yes"  id="q_40" name="q_40"> Yes
										<input type="radio" value="No"  id="q_40" name="q_40" > No
										<textarea id="q_40_details" name="q_40_details"></textarea>
									</div>
								</div>
								
								<div class="col-md-12">
								<hr>
									<div class="col-md-12">
										<p>41. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</p>
									</div>
									<div class="col-md-8">
										<p>a.	Are you a member of any indigenous group?</p>
									</div>
									<div class="col-md-4">
										<input type="radio" value="Yes"  id="q_41_a" name="q_41_a" > Yes
										<input type="radio" value="No"  id="q_41_a" name="q_41_a"> No
										<textarea id="q_41_a_details" name="q_41_a_details"></textarea>
									</div>
									
									<div class="col-md-8">
										<p>b. Are you differently abled?</p>
									</div>
									<div class="col-md-4">
										<input type="radio" value="Yes"  id="q_41_b" name="q_41_b"> Yes
										<input type="radio" value="No"  id="q_41_b" name="q_41_b" > No
										<textarea id="q_41_b_details" name="q_41_b_details"></textarea>
									</div>
									
									<div class="col-md-8">
										<p>C. Are you a solo parent?</p>
									</div>
									<div class="col-md-4">
										<input type="radio" value="Yes"  id="q_41_c" name="q_41_c"> Yes
										<input type="radio" value="No"  id="q_41_c" name="q_41_c" > No
										<textarea id="q_41_c_details" name="q_41_c_details"></textarea>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
									<hr>
										<div class="col-md-4 col-md-offset-4">
											<input type="hidden" id="a_id" name="a_id" value="">
											<button type="submit" class="btn btn-success form-control"><i class="fa fa-save"></i> Updated Answers</button>
										</div>
									</div>
								</div>
								</form>
							</div>
			
					  
							<div class="row">
								<div class="col-md-12">
								<hr>
									<div class="col-md-4">
										<button class="btn btn-info" id="add_reff" name="add_reff"><i class="fa fa-plus"></i> Add Character Refference</button>
									</div>
									<table class="table table-bordered">
										<thead>
											<tr>
												<td>Name</td>
												<td>Address</td>
												<td>Contact No.</td>
											
												<td>Action</td>
											</tr>
										</thead>
										<tbody>
								
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td>
													<a href=""></a>
												</td>
											</tr>
											
										</tbody>
									</table>
									
									<div id="add_new_reff" name="add_new_reff">
									<form id="frm_reff" name="frm_reff">
										<hr>
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-3">
													<label class="form-label">Name:</label>
													<input type="text" id="r_name" name="r_name" class="form-control">
												</div>
												<div class="col-md-4">
													<label class="form-label">Address:</label>
													<input type="text" id="r_address" name="r_address" class="form-control">
												</div>
												
												<div class="col-md-3">
													<label class="form-label">Address:</label>
													<input type="text" id="r_contactnum" name="r_contactnum" class="form-control">
												</div>
												
											
											</div>
										</div>
										<div class="row">
										<br/>
											<div class="col-md-4 col-md-offset-4">
												<input type="hidden" id="a_id" name="a_id" value="" class="form-control">
												<button type="submit" class="btn btn-success form-control"><i class="fa fa-save"></i> Save Skills</button>
											</div>
										</div>
										
										</form>
									</div>
									
								</div>
							</div>
                      </div>
					-->  
					  
					  <!--
					  <div role="tabpanel" class="tab-pane fade" id="tab_content8" aria-labelledby="vol_work">
							<div class="row">
								<div class="col-md-12">
									<hr>
									<div class="col-md-4">
										<button class="btn btn-info" id="add_vol_work" name="add_vol_work"><i class="fa fa-plus"></i> Add Voluntary Work Information</button>
									</div>
						
									<table class="table table-bordered">
										<thead>
											<tr>
												<td>Company</td>
												<td>Address</td>
												<td>From</td>
												<td>To</td>
												<td>Hrs</td>
												<td>Work</td>
											
												<td>Action</td>
											</tr>
										</thead>
										<tbody>
										
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
										
												<td>
													<a href=""></a>
												</td>
											</tr>
									
										</tbody>
									</table>
									<div id="add_new_vol_work" name="add_new_vol_work">
									<form id="frm_vol_work" name="frm_vol_work">
										<hr>
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-3">
													<label class="form-label">Name:</label>
													<input type="text" id="vw_name" name="vw_name" class="form-control">
												</div>
												
												<div class="col-md-3">
													<label class="form-label">Address:</label>
													<input type="text" id="vw_address" name="vw_address" class="form-control">
												</div>	
												<div class="col-md-1">
													<label class="form-label">From:</label>
													<input type="text" id="vw_datefrom" name="vw_datefrom" class="form-control">
												</div>
												<div class="col-md-1">
													<label class="form-label">To:</label>
													<input type="text" id="vw_dateto" name="vw_dateto" class="form-control">
												</div>	
												<div class="col-md-1">
													<label class="form-label"># Hrs:</label>
													<input type="text" id="vw_nohours" name="vw_nohours" class="form-control">
												</div>
												
												<div class="col-md-3">
													<label class="form-label">Work:</label>
													<input type="text" id="vw_work" name="vw_work" class="form-control">
												</div>
												
											
											</div>
										</div>
										<div class="row">
										<br/>
											<div class="col-md-4 col-md-offset-4">
												<input type="hidden" id="a_id" name="a_id" value="" class="form-control">
												<button type="submit" class="btn btn-success form-control"><i class="fa fa-save"></i> Save Voluntary Work</button>
											</div>
										</div>
										
										</form>
									</div>
								</div>
							</div>
                      </div>
					  -->
                    </div>
                  </div>

                </div>
              </div>
            </div>

        </div>
        <div class="clearfix"></div>


      </div>
      </div>