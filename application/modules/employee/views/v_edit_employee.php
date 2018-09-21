<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-bars"></i> Employee <small>Information</small></h2>
                       
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">

                                <li role="presentation" class="active">
                                    <a href="#tab_personalinfo" id="personalinfo" role="tab" data-toggle="tab" aria-expanded="true">
								Info</a>
                                </li>

                                <li role="presentation" class="">
                                    <a href="#tab_famillybg" role="tab" id="famillybg" data-toggle="tab" aria-expanded="false">
								Family</a>
                                </li>

                                <li role="presentation" class="">
                                    <a href="#tab_educ_bg" role="tab" id="educ_bg" data-toggle="tab" aria-expanded="false">
								Educational</a>
                                </li>

                                <li role="presentation" class="">
                                    <a href="#tab_elig" role="tab" id="elig" data-toggle="tab" aria-expanded="false">
								Eligibility</a>
                                </li>

                                <li role="presentation" class="">
                                    <a href="#tab_wor_exp" role="tab" id="wor_exp" data-toggle="tab" aria-expanded="false">
								Work</a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#tab_vol_work" role="tab" id="vol_work" data-toggle="tab" aria-expanded="false">
								Voluntary Work</a>
                                </li>

                                <li role="presentation" class="">
                                    <a href="#tab_training" role="tab" id="training" data-toggle="tab" aria-expanded="false">
								Training</a>
                                </li>

                                <li role="presentation" class="">
                                    <a href="#tab_skills" role="tab" id="skills" data-toggle="tab" aria-expanded="false">
								Skills</a>
                                </li>

                                <li role="presentation" class="">
                                    <a href="#tab_char_reff" role="tab" id="char_reff" data-toggle="tab" aria-expanded="false">
								Question & Reff</a>
                                </li>

                            </ul>

                            <div id="MyTab_Content" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_personalinfo" aria-labelledby="personalinfo">
                                    <form id="frm_personal" name="frm_personal">
                                        <?php
					if(is_array($result)){
					foreach($result as $r){ 
					$a_id = $r->a_id;
					?>
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <div class="col-md-3 col-sm-3">
                                                        <?php 
										$file = 'pds_image/'.$a_id.'/'.$a_id.'.png';
										if (file_exists($file)) {
									?>
                                                            <img src="<?php echo base_url($file); ?>" style="width:200px;height:200px; border: 1px solid #9E9E9E;">
                                                            <?php } else { ?>
                                                                <img src="<?php echo base_url('pds_image/default-pictures.jpg'); ?>" style="width:200px;height:200px;">
                                                                <?php } ?>
                                                                    <!-- <img src="http://localhost/csfphris_dev/pds_image/default-pictures.jpg" style="width:200px;height:200px;" class="hoverZoomLink"> -->

                                                                    <!--<img src="http://localhost/csfphris_dev/pds_image/DefaultSignature.jpg" style="width:200px;height:40px;"> -->

                                                                    <?php 
										$sig_jgp = 'pds_image/'.$a_id.'/'.$a_id.'_signature'.'.jpg';
										$sig_png = 'pds_image/'.$a_id.'/'.$a_id.'_signature'.'.png';
										
										
										if (file_exists($sig_jgp)) {
									?>
                                                                        <img src="<?php echo base_url($sig_jgp); ?>" style="width:200px;height:40px;">
                                                                        <?php } elseif (file_exists($sig_png)) { ?>
                                                                            <img src="<?php echo base_url($sig_png); ?>" style="width:200px;height:40px;">
                                                                            <?php } else { ?>
                                                                                <img src="<?php echo base_url('pds_image/DefaultSignature.jpg'); ?>" style="width:200px;height:40px;">
                                                                                <?php } ?>
                                                    </div>

                                                    <?php 
									                    if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
									                    	strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr' &&
									                    	strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff')
									                    { 
               										?>
                                                    <div class="col-md-4 col-sm-4">
                                                        <a href="#" class="btn btn-info form-control" type="button" id="take-a-photo" title="" data-toggle="modal" data-a_id="<?php echo $a_id; ?>" data-a_fullname="<?php echo $r->a_firstname.' '.$r->a_lastname; ?>" data-target="#takeaphoto"><i class="glyphicon glyphicon-camera"></i> Capture Image</a>
                                                    </div>

                                                    <!--div class="col-md-1 col-sm-1">

                                                    </div-->
                                                    <div class="col-md-5 col-sm-5">
                                                        <a href="#" class="btn btn-info form-control" onclick="javascript:onSign()" type="button" id="SignBtn2" name="SignBtn2" data-toggle="modal" data-a_id="<?php echo $a_id; ?>" data-a_fullname="<?php echo $r->a_firstname.' '.$r->a_lastname; ?>" data-target="#mdl_signature"><i class="fa fa-pencil"></i> Enroll Signature</a>	
                                                    </div>
													<?php } ?>
								

                                                    <div class="col-md-2">
                                                        <label class="form-label">Employee No.: </label>
                                                        <input type="text" id="a_empno" name="a_empno" class="form-control col-md-4" value="<?php echo $r->a_empno; ?>" >
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">FDOS: </label>
                                                        <input type="text" id="a_fdos" name="a_fdos" class="date form-control col-md-4" value="<?php echo $r->a_fdos; ?>" >
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Employement Status: </label>
														<input type="text" id="a_status" name="a_status" class="form-control col-md-4" value="<?php echo $r->a_status; ?>" readonly>
														<!--select id="a_status" name="a_status" class="form-control col-md-4">
														
															<option <?php // if(strtolower($r->a_status) =="permanent"){ echo 'selected';}?> value="PERMANENT">Permanent</option>
															<option <?php // if(strtolower($r->a_status) =="co-termnus"){ echo 'selected';}?> value="CO-TERMINUS">Co-Termnus</option>
															<option <?php // if(strtolower($r->a_status) =="elected"){ echo 'selected';}?> value="ELECTED">Elected</option>
															<option <?php // if(strtolower($r->a_status) =="casual"){ echo 'selected';}?> value="CASUAL">Casual</option>
															<option <?php // if(strtolower($r->a_status) =="project based"){ echo 'selected';}?> value="PROJECT BASED">Project Based</option>
														</select-->
														<!--
                                                        <input type="text" id="a_status" name="a_status" class="form-control col-md-4" value="<?php echo $r->a_status; ?>" placeholder="Employee No.">
														-->
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Position: </label>
														<input type="text" id="a_position" name="a_position" class="form-control col-md-4" value="<?php echo $r->a_position; ?>" readonly>
														<!--select id="a_position" name="a_position" class="form-control col-md-4">
														<option> -- Choose --</option>
															<?php // foreach($position as $p) {?>
															<option <?php // if(strtoupper($p->a_position) == strtoupper($r->a_position)){ echo 'selected';} ?> value="<?php // echo $p->a_position; ?>"><?php // echo $p->a_position; ?></option>
															<?php // } ?>
														</select-->
														<!--
                                                        <input type="text" id="a_position" name="a_position" class="form-control col-md-4" value="<?php echo $r->a_position; ?>" placeholder="Employee No.">
														-->
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Department: </label>
														<input type="text" id="a_office" name="a_office" class="form-control col-md-4" value="<?php echo $r->a_office; ?>" readonly>
														<!--select id="a_office" name="a_office" class="form-control col-md-4">
															<?php // foreach($dept as $d){ ?>
															<option value="<?php // echo $d->o_id;?>" <?php // if($d->o_id == $r->a_office){ echo 'selected';} ?>><?php // echo $d->o_code; ?></option>
															<?php // } ?>
														</select-->
														<!--
                                                        <input type="text" id="a_office" name="a_office" class="form-control col-md-4" value="<?php echo $r->a_office; ?>" placeholder="Employee No.">
														-->
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Division: </label>
														<input type="text" id="a_division" name="a_division" class="form-control col-md-4" value="<?php echo $r->a_division; ?>" readonly>
														<!--select id="a_division" name="a_division" class="form-control col-md-4">
															<?php // foreach($div as $dv){ ?>
															<option value="<?php // echo $dv->o_id;?>" <?php // if($dv->o_id == $r->a_division){ echo 'selected';} ?>><?php // echo $dv->o_code; ?></option>
															<?php // }?>
														</select-->
														<!--
                                                        <input type="text" id="a_division" name="a_division" class="form-control col-md-4" value="<?php echo $r->a_division; ?>" placeholder="Employee No.">
														-->
                                                    </div>



                                                    <div class="col-md-2">
                                                        <label class="form-label">Salary Grade: </label>
														<input type="text" id="a_salarygrade" name="a_salarygrade" class="form-control col-md-4" value="<?php echo $r->a_salarygrade; ?>" readonly>
														<!--select name="a_salarygrade" id="a_salarygrade" class="form-control">
														<option> -- Choose -- </option>
										<option value="1" <?php // if($r->a_salarygrade == "1"){ echo 'selected'; } ?>>1</option>
										<option value="2" <?php // if($r->a_salarygrade == "2"){ echo 'selected'; } ?>>2</option>
										<option value="3" <?php // if($r->a_salarygrade == "3"){ echo 'selected'; } ?>>3</option>
										<option value="4" <?php // if($r->a_salarygrade == "4"){ echo 'selected'; } ?>>4</option>
										<option value="5" <?php // if($r->a_salarygrade == "5"){ echo 'selected'; } ?>>5</option>
										<option value="6" <?php // if($r->a_salarygrade == "6"){ echo 'selected'; } ?>>6</option>
										<option value="7" <?php // if($r->a_salarygrade == "7"){ echo 'selected'; } ?>>7</option>
										<option value="8" <?php // if($r->a_salarygrade == "8"){ echo 'selected'; } ?>>8</option>
										
										<option value="9" <?php // if($r->a_salarygrade == "9"){ echo 'selected'; } ?>>9</option>
										<option value="10" <?php // if($r->a_salarygrade == "10"){ echo 'selected'; } ?>>10</option>
										<option value="11" <?php // if($r->a_salarygrade == "11"){ echo 'selected'; } ?>>11</option>
										<option value="12" <?php // if($r->a_salarygrade == "12"){ echo 'selected'; } ?>>12</option>
										<option value="13" <?php // if($r->a_salarygrade == "13"){ echo 'selected'; } ?>>13</option>
										<option value="14" <?php // if($r->a_salarygrade == "14"){ echo 'selected'; } ?>>14</option>
										<option value="15" <?php // if($r->a_salarygrade == "15"){ echo 'selected'; } ?>>15</option>
										<option value="16" <?php // if($r->a_salarygrade == "16"){ echo 'selected'; } ?>>16</option>
										
										<option value="17" <?php // if($r->a_salarygrade == "17"){ echo 'selected'; } ?>>17</option>
										<option value="18" <?php // if($r->a_salarygrade == "18"){ echo 'selected'; } ?>>18</option>
										<option value="19" <?php // if($r->a_salarygrade == "19"){ echo 'selected'; } ?>>19</option>
										<option value="20" <?php // if($r->a_salarygrade == "20"){ echo 'selected'; } ?>>20</option>
										<option value="21" <?php // if($r->a_salarygrade == "21"){ echo 'selected'; } ?>>21</option>
										<option value="22" <?php // if($r->a_salarygrade == "22"){ echo 'selected'; } ?>>22</option>
										<option value="23" <?php // if($r->a_salarygrade == "23"){ echo 'selected'; } ?>>23</option>
										<option value="24" <?php // if($r->a_salarygrade == "24"){ echo 'selected'; } ?>>24</option>
										
										<option value="25" <?php // if($r->a_salarygrade == "25"){ echo 'selected'; } ?>>25</option>
										<option value="26" <?php // if($r->a_salarygrade == "26"){ echo 'selected'; } ?>>26</option>
										<option value="27" <?php // if($r->a_salarygrade == "27"){ echo 'selected'; } ?>>27</option>
										<option value="28" <?php // if($r->a_salarygrade == "28"){ echo 'selected'; } ?>>28</option>
										<option value="29" <?php // if($r->a_salarygrade == "29"){ echo 'selected'; } ?>>29</option>
										<option value="30" <?php // if($r->a_salarygrade == "30"){ echo 'selected'; } ?>>30</option>
									</select-->
									<!--
                                                        <input type="text" id="a_salarygrade" name="a_salarygrade" class="form-control col-md-4" value="<?php echo $r->a_salarygrade; ?>" placeholder="Employee No.">
									-->
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="form-label">Step: </label>
														<input type="text" id="a_salarystep" name="a_salarystep" class="form-control col-md-4" value="<?php echo $r->a_salarystep; ?>" readonly>
														<!--select name="a_salarystep" id="a_salarystep" class="form-control">
															<option> -- Choose Step -- </option>
															<option value="1" <?php // if($r->a_salarystep == '1'){ echo 'selected';} ?>>1</option>
															<option value="2" <?php // if($r->a_salarystep == '2'){ echo 'selected';} ?>>2</option>
															<option value="3" <?php // if($r->a_salarystep == '3'){ echo 'selected';} ?>>3</option>
															<option value="4" <?php // if($r->a_salarystep == '4'){ echo 'selected';} ?>>4</option>
															<option value="5" <?php // if($r->a_salarystep == '5'){ echo 'selected';} ?>>5</option>
															<option value="6" <?php // if($r->a_salarystep == '6'){ echo 'selected';} ?>>6</option>
															<option value="7" <?php // if($r->a_salarystep == '7'){ echo 'selected';} ?>>7</option>
															<option value="8" <?php // if($r->a_salarystep == '8'){ echo 'selected';} ?>>8</option>
														</select-->
														<!--
                                                        <input type="text" id="a_salarystep" name="a_salarystep" class="form-control col-md-4" value="<?php echo $r->a_salarystep; ?>" placeholder="Employee No.">
														-->
                                                    </div>
                                                    <!--div class="col-md-2">
                                                        <label class="form-label">Access Level: </label>
													<select id="a_level" name="a_level" class="form-control col-md-4">
													<option> -- Choose -- </option>
														<option <?php // if($r->a_level == ''){ echo 'selected';} ?> value="">Choose Level</option>
														<option <?php // if($r->a_level == 'Manager'){ echo 'selected';} ?> value="Manager">Manager</option>
														<option <?php // if($r->a_level == 'Admin'){ echo 'selected';} ?> value="Admin">Admin</option>
														<option <?php // if($r->a_level == 'Mayor'){ echo 'selected';} ?> value="Mayor">Mayor</option>
														<option <?php // if($r->a_level == 'Department'){ echo 'selected';} ?> value="Department">Department Head</option>
														<option <?php // if($r->a_level == 'Division'){ echo 'selected';} ?> value="Division">Division Head</option>
														<option <?php // if($r->a_level == 'HR'){ echo 'selected';} ?> value="HR">HR Head</option>
														<option <?php // if($r->a_level == 'HROfficer'){ echo 'selected';} ?> value="HROfficer">HR Officer</option>
														<option <?php // if($r->a_level == 'Employee'){ echo 'selected';} ?> value="Employee">Employee</option>
													</select>
														
                                                    </div-->
													
													<div class="col-md-2">
                                                        <label class="form-label">Biometrics ID: </label>
                                                        <input type="text" id="a_machineid" name="a_machineid" class="form-control col-md-4 numeric" value="<?php echo $r->a_machineid; ?>" >
                                                    </div>
													
													<div class="col-md-2">
                                                        <label class="form-label">Location (Department): </label>
														<select id="a_deptlocation" name="a_deptlocation" class="form-control col-md-4">
															<?php foreach($dept as $d){ ?>
															<option value="<?php echo $d->o_id;?>" <?php if($d->o_id == $r->a_deptlocation){ echo 'selected';} ?>><?php echo $d->o_code; ?></option>
															<?php }?>
														</select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Location (Division): </label>
														<select id="a_divlocation" name="a_divlocation" class="form-control col-md-4">
															<?php foreach($div as $dv){ ?>
															<option value="<?php echo $dv->o_id;?>" <?php if($dv->o_id == $r->a_divlocation){ echo 'selected';} ?>><?php echo $dv->o_code; ?></option>
															<?php }?>
														</select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Hiest Eligibility: </label>
                                                        <input type="text" id="a_hielig" name="a_hielig" class="form-control col-md-4" value="<?php echo $r->a_hielig; ?>" >
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Hiest Education: </label>
                                                        <input type="text" id="a_hieduc" name="a_hieduc" class="form-control col-md-4" value="<?php echo $r->a_hieduc; ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <hr>

                                                    <div class="col-md-3">
                                                        <label class="form-label">First Name: </label>
                                                    </div>
													<div class="col-md-3">
                                                        <label class="form-label">Middle Name: </label>
                                                    </div>
													 <div class="col-md-2">
                                                        <label class="form-label">Middle Initial: </label>
                                                    </div>
													 <div class="col-md-3">
                                                        <label class="form-label">Last Name: </label>
                                                    </div>
													 <div class="col-md-1">
                                                        <label class="form-label">Ext Name: </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" id="a_firstname" name="a_firstname" class="form-control" value="<?php echo $r->a_firstname; ?>" >
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" id="a_middlename" name="a_middlename" class="form-control col-md-4" value="<?php echo $r->a_middlename; ?>" >
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" id="a_mi" name="a_mi" class="form-control col-md-4" value="<?php echo $r->a_mi; ?>">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" id="a_lastname" name="a_lastname" class="form-control col-md-4" value="<?php echo $r->a_lastname; ?>" >
                                                    </div>
                                                    <div class="col-md-1">
                                                        <input type="text" id="a_namext" name="a_namext" class="form-control col-md-4" value="<?php echo $r->a_namext; ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Date of Birth: </label>
                                                        <input type="text" id="pi_birthdate" name="pi_birthdate" class="date form-control" value="<?php echo $r->pi_birthdate; ?>" >
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Place of Birth: </label>
                                                        <input type="text" id="pi_birthplace" name="pi_birthplace" class="form-control" value="<?php echo $r->pi_birthplace; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Gender: </label>
														
														<select name="pi_gender" id="pi_gender" class="form-control">
									<option>Choose Gender</option>
									<option <?php if(strtolower($r->pi_gender) == 'male'){echo 'selected';} ?> value="MALE">MALE</option>
									<option <?php if(strtolower($r->pi_gender) == 'female'){echo 'selected';} ?> value="FEMALE">FEMALE</option>
									</select>
									
									<!--
                                                        <input type="text" id="pi_gender" name="pi_gender" class="form-control" value="<?php echo $r->pi_gender; ?>" placeholder="First Name">
														-->
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Civil Status: </label>
														<select name="pi_status" id="pi_status" class="form-control">
															<option <?php if(strtolower($r->pi_status) == 'single'){echo 'selected';} ?> value="SINGLE">SINGLE</option>
															<option <?php if(strtolower($r->pi_status) == 'married'){echo 'selected';} ?> value="MARRIED">MARRIED</option>
															<option <?php if(strtolower($r->pi_status) == 'separated'){echo 'selected';} ?> value="SEPARATED">SEPARATED</option>
															<option <?php if(strtolower($r->pi_status) == 'widowed'){echo 'selected';} ?> value="WIDOWED">WIDOWED</option>
														 </select>
														<!--
                                                        <input type="text" id="pi_status" name="pi_status" class="form-control" value="<?php echo $r->pi_status; ?>" placeholder="Civil Status">
														-->
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Citizenship: </label>
                                                        <input type="text" id="pi_citizenship" name="pi_citizenship" class="form-control" value="<?php echo $r->pi_citizenship; ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-1">
                                                        <label class="form-label">Height: </label>
                                                        <input type="text" id="pi_height" name="pi_height" class="form-control" value="<?php echo $r->pi_height; ?>" >
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="form-label">Weight: </label>
                                                        <input type="text" id="pi_weight" name="pi_weight" class="form-control" value="<?php echo $r->pi_weight; ?>" >
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Blood Type: </label>
                                                        <input type="text" id="pi_bloodtype" name="pi_bloodtype" class="form-control" value="<?php echo $r->pi_bloodtype; ?>" >
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">GSIS No.: </label>
                                                        <input type="text" id="pi_gsis" name="pi_gsis" class="form-control" value="<?php echo $r->pi_gsis; ?>" >
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">PAG-IBIG ID NO.: </label>
                                                        <input type="text" id="pi_pagibig" name="pi_pagibig" class="form-control" value="<?php echo $r->pi_pagibig; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">PHILHEALTH NO.: </label>
                                                        <input type="text" id="pi_philhealth" name="pi_philhealth" class="form-control" value="<?php echo $r->pi_philhealth; ?>" >
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">SSS NO.: </label>
                                                        <input type="text" id="pi_sss" name="pi_sss" class="form-control" value="<?php echo $r->pi_sss; ?>" >
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
                                                        <input type="text" id="pi_resstreet" name="pi_resstreet" class="form-control" value="<?php echo $r->pi_resstreet; ?>" >
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Barangay: </label>
                                                        <input type="text" id="pi_resbrgy" name="pi_resbrgy" class="form-control" value="<?php echo $r->pi_resbrgy; ?>" >
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">City: </label>
                                                        <input type="text" id="pi_rescity" name="pi_rescity" class="form-control" value="<?php echo $r->pi_rescity; ?>" >
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Province: </label>
                                                        <input type="text" id="pi_resprov" name="pi_resprov" class="form-control" value="<?php echo $r->pi_resprov; ?>" >
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="form-label">Zip: </label>
                                                        <input type="text" id="pi_reszip" name="pi_reszip" class="form-control" value="<?php echo $r->pi_reszip; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Contact No.: </label>
                                                        <input type="text" id="pi_resphone" name="pi_resphone" class="form-control" value="<?php echo $r->pi_resphone; ?>" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <hr>
                                                    <div class="col-md-12">
                                                        <label class="form-label">Permanent Address </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Street: </label>
                                                        <input type="text" id="pi_permstreet" name="pi_permstreet" class="form-control" value="<?php echo $r->pi_permstreet; ?>" >
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Barangay: </label>
                                                        <input type="text" id="pi_permbrgy" name="pi_permbrgy" class="form-control" value="<?php echo $r->pi_permbrgy; ?>">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">City: </label>
                                                        <input type="text" id="pi_permcity" name="pi_permcity" class="form-control" value="<?php echo $r->pi_permcity; ?>" >
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Province: </label>
                                                        <input type="text" id="pi_permprov" name="pi_permprov" class="form-control" value="<?php echo $r->pi_permprov; ?>" >
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="form-label">Zip: </label>
                                                        <input type="text" id="pi_permzip" name="pi_permzip" class="form-control" value="<?php echo $r->pi_permzip; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Contact No.: </label>
                                                        <input type="text" id="pi_permphone" name="pi_permphone" class="form-control" value="<?php echo $r->pi_permphone; ?>" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <hr/>
                                                    <div class="col-md-3">
                                                        <label class="form-label">E-mail address (if any): </label>
                                                        <input type="text" id="pi_email" name="pi_email" class="form-control" value="<?php echo $r->pi_email; ?>" >
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Cellphone No. (if any): </label>
                                                        <input type="text" id="pi_phone" name="pi_phone" class="form-control" value="<?php echo $r->pi_phone; ?>" >
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Tin No.: </label>

                                                        <input type="text" id="pi_tin" name="pi_tin" class="form-control" value="<?php echo $r->pi_tin; ?>" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <hr/>
                                                    <div class="col-md-12">
                                                        <input type="checkbox" />I declare under oath that this Personal Data Sheet has been accomplished by me, and is a true, correct and complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the Philippines.
I also authorize the agency head / authorized representative to verify / validate the contents stated herein.,I trust that,this information shall remain confidential.
                                                    </div>
                                                   
                                                </div>
                                            </div>
											
											<?php 
									            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
									            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr' &&
									            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff')
									            { 
               								?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <hr/>
                                                    <div class="col-md-4 col-md-offset-4">

                                                        <input type="hidden" id="a_id" name="a_id" class="form-control" value="<?php echo $a_id; ?>" placeholder="Street">
                                                        <button type="submit" class="form-control btn btn-success"><i class="fa fa-save"></i> Save Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                    </form>
                                </div>
                                <?php }} ?>

                                    <!-- FAMILLY BACK GROUND -->
                                <div role="tabpanel" class="tab-pane fade" id="tab_famillybg" aria-labelledby="famillybg">
                                        <?php 
						if(is_array($familly)){
						foreach($familly as $f){ ?>

                                            <form id="frm_familly" name="frm_familly">
                                                <div class="row">
                                                    <div class="col-md-12">
													<div class="col-md-12">
													 <label class="form-label">Spouse: </label>
													</div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">First Name: </label>
                                                        </div>
														<div class="col-md-3">
                                                            <label class="form-label">Middle Initial: </label>
                                                        </div>
														<div class="col-md-3">
                                                            <label class="form-label">Last Initial: </label>
                                                        </div>
														<div class="col-md-3">
                                                            <label class="form-label">Ext. Initial: </label>
                                                        </div>

                                                        <div class="col-md-3">
														
                                                            <input type="text" id="fb_spousefname" name="fb_spousefname" class="form-control" value="<?php echo $f->fb_spousefname; ?>" placeholder="First Name">
                                                        </div>
														
                                                        <!--
									<div class="col-md-3">
										<input type="text" id="fb_spousemname" name="fb_spousemname" class="form-control col-md-4" value="<?php echo $f->fb_spousemname; ?>" placeholder="Middle Name">
									</div>
									-->
                                                        <div class="col-md-3">
                                                            <input type="text" id="fb_spousemi" name="fb_spousemi" class="form-control col-md-4" value="<?php echo $f->fb_spousemi; ?>" placeholder="Middle Initial">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" id="fb_spouselname" name="fb_spouselname" class="form-control col-md-4" value="<?php echo $f->fb_spouselname; ?>" placeholder="Last Name">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" id="fb_spouseextname" name="fb_spouseextname" class="form-control col-md-4" value="<?php echo $f->fb_spouseextname; ?>" placeholder="Ext. Name">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-3">
                                                            <label class="form-label">Occupation: </label>
                                                            <input type="text" id="fb_spousework" name="fb_spousework" class="form-control" value="<?php echo $f->fb_spousework; ?>" placeholder="First Name">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">Employer: </label>
                                                            <input type="text" id="fb_spouseemployer" name="fb_spouseemployer" class="form-control" value="<?php echo $f->fb_spouseemployer; ?>" placeholder="First Name">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">Employer Address: </label>
                                                            <input type="text" id="fb_spouseemployeraddress" name="fb_spouseemployeraddress" class="form-control" value="<?php echo $f->fb_spouseemployeraddress; ?>" placeholder="First Name">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="form-label">Employer Phone: </label>
                                                            <input type="text" id="fb_spouseemployerphone" name="fb_spouseemployerphone" class="form-control" value="<?php echo $f->fb_spouseemployerphone; ?>" placeholder="First Name">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <hr>
														<div class="col-md-12">
														<label class="form-label">Father: </label>
														</div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">First Name: </label>
                                                        </div>
														<div class="col-md-3">
                                                            <label class="form-label">Middle Initial: </label>
                                                        </div>
														<div class="col-md-3">
                                                            <label class="form-label">Last Initial: </label>
                                                        </div>
														<div class="col-md-3">
                                                            <label class="form-label">Ext. Initial: </label>
                                                        </div>
                                                       

                                                        <div class="col-md-3">
                                                            <input type="text" id="fb_fatherfname" name="fb_fatherfname" class="form-control" value="<?php echo $f->fb_fatherfname; ?>" placeholder="First Name">
                                                        </div>

                                                        <div class="col-md-3">
                                                            <input type="text" id="fb_fathermi" name="fb_fathermi" class="form-control col-md-4" value="<?php echo $f->fb_fathermi; ?>" placeholder="Middle Initial">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" id="fb_fatherlname" name="fb_fatherlname" class="form-control col-md-4" value="<?php echo $f->fb_fatherlname; ?>" placeholder="Last Name">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" id="fb_fatherext" name="fb_fatherext" class="form-control col-md-4" value="<?php echo $f->fb_fatherext; ?>" placeholder="Ext. Name">
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <hr>
                                                       <div class="col-md-12">
														<label class="form-label">Mother: </label>
														</div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">First Name: </label>
                                                        </div>
														<div class="col-md-3">
                                                            <label class="form-label">Middle Initial: </label>
                                                        </div>
														<div class="col-md-3">
                                                            <label class="form-label">Last Initial: </label>
                                                        </div>
														<div class="col-md-3">
                                                            <label class="form-label">Ext. Initial: </label>
                                                        </div>
                                                       

                                                        <div class="col-md-3">
                                                            <input type="text" id="fb_motherfname" name="fb_motherfname" class="form-control" value="<?php echo $f->fb_motherfname; ?>" placeholder="First Name">
                                                        </div>

                                                        <div class="col-md-3">
                                                            <input type="text" id="fb_mothermi" name="fb_mothermi" class="form-control col-md-4" value="<?php echo $f->fb_mothermi; ?>" placeholder="Middle Initial">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" id="fb_motherlname" name="fb_motherlname" class="form-control col-md-4" value="<?php echo $f->fb_motherlname; ?>" placeholder="Last Name">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" id="fb_motherext" name="fb_motherext" class="form-control col-md-4" value="<?php echo $f->fb_motherext; ?>" placeholder="Ext. Name">
                                                        </div>

                                                    </div>
                                                </div>
                                                <?php 
										            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
										            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr' &&
									                    	strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff')
										            { 
	               								?>
                                                <div class="row">
                                                    <hr>
                                                    <div class="col-md-4 col-md-offset-4">
                                                        <input type="hidden" id="a_id" name="a_id" class="form-control col-md-4" value="<?php echo $a_id; ?>">
                                                        <button type="submit" class="form-control btn btn-success"><i class="fa fa-save"></i> Save Update</button>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </form>
                                            <?php }}else{ ?>
                                                <form id="frm_add_familly" name="frm_add_familly">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12">
                                                                <label class="form-label">Spouse Full Name: </label>
                                                            </div>


                                                            <div class="col-md-3">
                                                                <input type="text" id="fb_spousefname" name="fb_spousefname" class="form-control" value="" placeholder="First Name">
                                                            </div>
                                                            <!--
									<div class="col-md-3">
										<input type="text" id="fb_spousemname" name="fb_spousemname" class="form-control col-md-4" value="<?php echo $f->fb_spousemname; ?>" placeholder="Middle Name">
									</div>
									-->
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
                                                                <label class="form-label">Mother Full Name: </label>
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
                                                    <?php 
											            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
											            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr' &&
									                    	strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff')
											            { 
		               								?>
                                                    <div class="row">
                                                        <hr>
                                                        <div class="col-md-4 col-md-offset-4">
                                                            <input type="hidden" id="a_id" name="a_id" class="form-control col-md-4" value="<?php echo $a_id; ?>">
                                                            <button type="submit" class="form-control btn btn-success"><i class="fa fa-save"></i> Add Familly Background</button>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </form>
                                                <?php }?>
                                                    <div class="row">
                                                        <div class="col-md-12">

                                                            <hr>
                                                            <?php 
													            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
													            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr' &&
									                    	strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff')
													            { 
				               								?>
                                                            <div class="col-md-4">
                                                                <button class="btn btn-info" id="add_child" name="add_child"><i class="fa fa-plus"></i> Add Child</button>
                                                            </div>
                                                            <?php } ?>
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
                                                                    <?php 
										if(is_array($children)){
										foreach($children as $c){?>
                                                                        <tr>
                                                                            <td>
                                                                                <?php echo $c->c_fname; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $c->c_mi; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $c->c_lname; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $c->c_extname; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $c->c_birthdate; ?>
                                                                            </td>
                                                                            <td>
                                                                             <?php 
												            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
												            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr' &&
									                    	strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff')
												            { 
			               								?>
		
                                                                                <a title="Edit Child Info" 
																					data-href="<?php echo base_url('employee/edit_child_info/'.$c->c_id); ?>" 
																					data-toggle="modal" 
																					data-target="#frm_edit_child" href="#" 
																					data-title="<?php echo $c->c_fname.' '.$c->c_mi.' '.$c->c_lname; ?>" 
																					data-c_fname="<?php echo $c->c_fname;?>" 
																					data-c_mi="<?php echo $c->c_mi; ?>" 
																					data-c_lname="<?php echo $c->c_lname; ?>" 
																					data-c_extname="<?php echo $c->c_extname; ?>" 
																					data-c_birthdate="<?php echo $c->c_birthdate; ?>" 
																					data-child_id="<?php echo $c->c_id; ?>">
																				<i class="fa fa-pencil"></i>
																				</a> |
                                                                                <a title="Delete Child Info" 
																					data-href="<?php echo base_url('employee/delete_child_info/'.$c->c_id); ?>" 
																					data-toggle="modal" 
																					data-target="#frm_del_child" href="#" 
																					data-title="<?php echo $c->c_fname.' '.$c->c_mi.' '.$c->c_lname; ?>" 
																					data-c_id="<?php echo $c->c_id;?>" >
																				<i class="glyphicon glyphicon-trash"></i>
																				</a>
																				<?php } ?>
                                                                            </td>
                                                                        </tr>
                                                                        <?php }} ?>
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
                                                                                <input type="text" id="c_birthdate" name="c_birthdate" class="date form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <?php 
															            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
															            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr' &&
									                    	strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff')
															            { 
						               								?>
						
                                                                    <div class="row">
                                                                        <br/>
                                                                        <div class="col-md-4 col-md-offset-4">
                                                                            <input type="hidden" id="a_id" name="a_id" value="<?php echo $a_id; ?>" class="form-control">
                                                                            <button type="submit" class="btn btn-success form-control"><i class="fa fa-save"></i> Save Child Info</button>
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                    </div>


								<div role="tabpanel" class="tab-pane fade" id="tab_educ_bg" aria-labelledby="educ_bg">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <hr>
                                                <?php 
										            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
										            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr' &&
									                    	strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff')
										            { 
	               								?>
                                                <div class="col-md-4">
                                                    <button class="btn btn-info" id="add_educ" name="add_educ"><i class="fa fa-plus"></i> Add Educational Background</button>
                                                </div>
                                                <?php } ?>

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
                                                        <?php 
										if(is_array($education)){
										foreach($education as $e){?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $e->pi_level; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $e->pi_schoolname; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $e->pi_degree; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $e->pi_yrgrad; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $e->pi_from; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $e->pi_to; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $e->pi_honors; ?>
                                                                </td>
                                                                <td>
<?php 
												            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
												            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr' &&
									                    	strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff')
												            { 
			               								?>
                                                                    <a title="Edit Education Info" 
																		data-href="<?php echo base_url('employee/edit_child_info/'.$e->e_id); ?>" 
																		data-toggle="modal" 
																		data-target="#frm_edit_educ" href="#" 
																		data-title="<?php echo $e->pi_level.' '.$e->pi_schoolname; ?>" 
																		data-pi_level="<?php echo $e->pi_level;?>" 
																		data-pi_schoolname="<?php echo $e->pi_schoolname; ?>" 
																		data-pi_degree="<?php echo $e->pi_degree; ?>" 
																		data-pi_yrgrad="<?php echo $e->pi_yrgrad; ?>" 
																		data-pi_from="<?php echo $e->pi_from; ?>" 
																		data-pi_to="<?php echo $e->pi_to; ?>" 
																		data-pi_honors="<?php echo $e->pi_honors; ?>" 
																		data-e_type="<?php echo $e->e_type; ?>" 
																		data-e_sector="<?php echo $e->e_sector; ?>" 
																		data-educ_id="<?php echo $e->e_id; ?>"><i class="fa fa-pencil"></i>
													</a> |
                                                                   <a title="Delete Education Info" 
																					data-href="<?php echo base_url('employee/delete_educ_info/'.$e->e_id); ?>" 
																					data-toggle="modal" 
																					data-target="#frm_del_educ" href="#" 
																					data-title="<?php echo $e->pi_level.' '.$e->pi_schoolname; ?>"
																					data-e_id="<?php echo $e->e_id;?>" >
																				<i class="glyphicon glyphicon-trash"></i>
																				</a>
																				<?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php }} ?>
                                                    </tbody>

                                                </table>

                                                <div id="add_new_educ" name="add_new_educ">
                                                    <form id="frm_educbg" name="frm_educbg">
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="col-md-3">
                                                                    <label class="form-label">Level:</label>
																	<select id="pi_level" name="pi_level" class="pi_level form-control" required="">
																			<option value="">Choose One</option>
																			<option value="Elementary">Elementary</option>
																			<option value="Secondary">Secondary</option>
																			<option value="Vocational">Vocational</option>
																			<option value="College">College</option>
																			<option value="Graduate Studies">Graduate Studies</option>
																			<option value="Masteral">Masteral</option>
																			<option value="Doctorate">Doctorate</option>
																	  </select>
																	
                                                                    <!-- <input type="text" id="pi_level" name="pi_level" class="form-control"> -->
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
                                                                    <input type="text" id="pi_yrgrad" name="pi_yrgrad" class="form-control numeric">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="form-label">From:</label>
                                                                    <input type="text" id="pi_from" name="pi_from" class="date form-control">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="form-label">To:</label>
                                                                    <input type="text" id="pi_to" name="pi_to" class="date form-control">
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <label class="form-label">Award:</label>
                                                                    <input type="text" id="pi_honors" name="pi_honors" class="form-control">
                                                                </div>
																  <div class="col-md-3">
                                                                    <label class="form-label">Type:</label>
																	<select id="e_type" name="e_type" class="form-control" required="">
																			<option value="">Choose One</option>
																			<option value="ELEMENTARY GRADUATE">ELEMENTARY GRADUATE</option>
																			<option value="HIGH SCHOOL GRADUATE">HIGH SCHOOL GRADUATE</option>
																			<option value="COMPLETION OF TWO YEAR STUDIES">COMPLETION OF TWO YEAR STUDIES</option>
																			<option value="BACHELOR'S DEGREE">BACHELOR'S DEGREE</option>
																			<option value="MASTER'S DEGREE">MASTER'S DEGREE</option>
																			<option value="DOCTORATE DEGREE">DOCTORATE DEGREE</option>
																			
																	  </select>
                                                                </div>
																  <div class="col-md-3">
                                                                    <label class="form-label">Sector:</label>
																	<select id="e_sector" name="e_sector" class="form-control" required="">
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
                                                        </div>

                                                        <?php 
												            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
												            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr' &&
									                    	strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff')
												            { 
			               								?>

                                                        <div class="row">
                                                            <br/>
                                                            <div class="col-md-4 col-md-offset-4">
                                                                <input type="hidden" id="a_id" name="a_id" value="<?php echo $a_id; ?>" class="form-control">
                                                                <button type="submit" class="btn btn-success form-control"><i class="fa fa-save"></i> Save Education Info</button>
                                                            </div>
                                                        </div>
                                                        <?php } ?>

                                                    </form>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="tab_wor_exp" aria-labelledby="work_exp">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <hr>
                                                <?php 
										            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
										            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr' &&
									                    	strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff')
										            { 
	               								?>
                                                <div class="col-md-3">
                                                    <button class="btn btn-info" id="add_work" name="add_work"><i class="fa fa-plus"></i> Add Work Experience </button>
                                                </div>
                                                <?php } ?>
												<div class="col-md-2">
                                                    <label class="form-label">Work Experience Type</label>
                                                </div>
												<div class="col-md-2">
                                                    <select class="form-control col-md-3 col-xs-12" id="w_type" name="w_type">
														<option> -- Choose -- </option>
														<option value="MANAGERIAL">MANAGERIAL</option>
														<option value="SUPERVISORY">SUPERVISORY</option>
														<option value="ADMINISTRATIVE">ADMINISTRATIVE</option>
														<option value="TECHNICAL">TECHNICAL</option>
														<option value="SKILLED">SKILLED</option>
													</select>
													
                                                </div>
												<div class="col-md-2">
												<button id="btn_save_worktype" name="btn_save_worktype" class="btn btn-primary"> UPDATE WORK TYPE</button>
                                                </div>
                                                <table class="cell-border compact hover" cellspacing="0" width="100%" id="dt_workinfo" name="dt_workinfo">
                                                    <thead>
                                                        <tr>
                                                            <td><input type="checkbox"></td>
                                                            <td>Inclusive Date</td>
                                                            <td>Position</td>
															<td>Type</td>
                                                            <td>Agency / Company</td>
                                                            <td>Salary</td>
                                                            <td>Salary Grade</td>
                                                            <td>Status</td>
                                                            <td>Gov't Service</td>
                                                            
                                                            <td>Action</td>
                                                         
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!--?php 
										// if(is_array($work_exp)){
										// foreach($work_exp as $w){ ?>
                                                            <tr>
                                                                <td>
                                                                   <!--?php // echo $w->p_from.'-'.$w->p_to; ?>
                                                                </td>
                                                                <td>
                                                                    <!--?php // echo $w->p_position; ?>
                                                                </td>
                                                                <td>
                                                                    <!--?php // echo $w->p_company; ?>
                                                                </td>
                                                                <td>
                                                                    <!--?php // echo $w->p_salarymonthly; ?>
                                                                </td>
                                                                <td>
                                                                    <!--?php // echo $w->p_salarygrade.'-'.$w->p_salarystep; ?>
                                                                </td>
                                                                <td>
                                                                    <!--?php // echo $w->p_appointment; ?>
                                                                </td>
                                                                <td>
                                                                    <!--?php // echo $w->p_isgovt; ?>
                                                                </td>

                                                                <td>
                                                                <!--?php 
												            // if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
												            // strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr' &&
									                    	// strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff')
												            { 
			               								?>
                                                                    <a title="Edit Work Info" 
																	data-href="<!--?php // echo base_url('employee/update_employee_work/'.$w->w_id); ?>" 
																	data-toggle="modal" data-target="#frm_edit_work" href="#"
																	data-title="<!--?php // echo $w->p_position.' '.$w->p_company; ?>" 
																	data-p_from="<!--?php // echo $w->p_from;?>"
																	data-p_to="<!--?php // echo $w->p_to; ?>" 
																	data-p_position="<!--?php  //echo $w->p_position; ?>" 
																	data-p_company="<!--?php // echo $w->p_company; ?>" 
																	data-p_salarymonthly="<!--?php // echo $w->p_salarymonthly; ?>" 
																	data-p_salarygrade="<!--?php // echo $w->p_salarygrade; ?>" 
																	data-p_salarystep="<!--?php // echo $w->p_salarystep; ?>" 
																	data-p_appointment="<!--?php // echo $w->p_appointment; ?>" 
																	data-p_isgovt="<!--?php // echo $w->p_isgovt; ?>" 
																	data-w_id="<!--?php // echo $w->w_id; ?>">
																	<i class="fa fa-pencil"></i>
													</a> |
                                                                <a title="Delete Education Info" 
																					data-href="<!--?php // echo base_url('employee/delete_elig_work_exp/'.$w->w_id); ?>" 
																					data-toggle="modal" 
																					data-target="#frm_del_work_exp" href="#" 
																					data-title="<!--?php // echo $w->p_position.' '.$w->p_company; ?>" 
																					data-w_id="<!--?php // echo $w->w_id; ?>">
																				<i class="glyphicon glyphicon-trash"></i>
																				</a>
																				<!--?php  //} ?>

                                                                </td>
                                                            </tr>
                                                            <!--?php  //}} ?-->
                                                    </tbody>

                                                </table>
						<!--div class="row">
							<div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
								<br/>
							</div>
							<div class="col-md-2 col-md-2 col-sm-2 col-xs-12">
								<label class="form-label">Work Experience Type</label>
							</div>
							<div class="col-md-2 col-md-2 col-sm-2 col-xs-12">
								<!--input type="text" name="p_effectivitydate" id="p_effectivitydate" required="required" class="form-control col-md-3 col-xs-12 date"-->
								
							<!--/div>
								
						</div-->
                                                <div id="add_new_work" name="add_new_work">
                                                    <form id="frm_work" name="frm_work">
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="col-md-2">
                                                                    <label class="form-label">From</label>
                                                                    <input type="text" id="p_from" name="p_from" class="date form-control">
                                                                </div>
                                                                <div class="col-md-2">	
                                                                    <label class="form-label">To:</label>
                                                                    <input type="text" id="p_to" name="p_to" class="date form-control">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="form-label">Position:</label>
                                                                    <input type="text" id="p_position" name="p_position" class="form-control">
                                                                </div>
																
																 <div class="col-md-3">
                                                                    <label class="form-label">Agency/Company:</label>
                                                                    <input type="text" id="p_company" name="p_company" class="form-control">
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <label class="form-label">Monthly Salary:</label>
                                                                    <input type="text" id="p_salarymonthly" name="p_salarymonthly" class="form-control">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="form-label">Grade:</label>
																	<!--select id="p_salarygrade" name="p_salarygrade" class="form-control">
																			<option>Choose Grade</option>
																			<option value="Grade 1">Grade 1</option>
																			<option value="Grade 2">Grade 2</option>
																			<option value="Grade 3">Grade 3</option>
																			<option value="Grade 4">Grade 4</option>
																			<option value="Grade 5">Grade 5</option>
																			<option value="Grade 6">Grade 6</option>
																			<option value="Grade 7">Grade 7</option>
																			<option value="Grade 8">Grade 8</option>
																			
																			<option value="Grade 9">Grade 9</option>
																			<option value="Grade 10">Grade 10</option>
																			<option value="Grade 11">Grade 11</option>
																			<option value="Grade 12">Grade 12</option>
																			<option value="Grade 13">Grade 13</option>
																			<option value="Grade 14">Grade 14</option>
																			<option value="Grade 15">Grade 15</option>
																			<option value="Grade 16">Grade 16</option>
																			
																			<option value="Grade 17">Grade 17</option>
																			<option value="Grade 18">Grade 18</option>
																			<option value="Grade 19">Grade 19</option>
																			<option value="Grade 20">Grade 20</option>
																			<option value="Grade 21">Grade 21</option>
																			<option value="Grade 22">Grade 22</option>
																			<option value="Grade 23">Grade 23</option>
																			<option value="Grade 24">Grade 24</option>
																			
																			<option value="Grade 25">Grade 25</option>
																			<option value="Grade 26">Grade 26</option>
																			<option value="Grade 27">Grade 27</option>
																			<option value="Grade 28">Grade 28</option>
																			<option value="Grade 29">Grade 29</option>
																			<option value="Grade 30">Grade 30</option>
														
																		</select -->
                                                                   <input type="text" id="p_salarygrade" name="p_salarygrade" class="form-control"> 
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="form-label">Step:</label>
																	<!--select id="p_salarystep" name="p_salarystep" class="form-control">
																		<option>Choose Step</option>
																		<option value="No Step">No Step</option>
																		<option value="Step 1">Step 1</option>
																		<option value="Step 2">Step 2</option>
																		<option value="Step 3">Step 3</option>
																		<option value="Step 4">Step 4</option>
																		<option value="Step 5">Step 5</option>
																		<option value="Step 6">Step 6</option>
																		<option value="Step 7">Step 7</option>
																		<option value="Step 8">Step 8</option>
																	</select-->
																	
																	
                                                                   <input type="text" id="p_salarystep" name="p_salarystep" class="form-control"> 
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="form-label">Status:</label>
																	<select id="p_appointment" name="p_appointment" class="form-control">
																		<option>-- Choose --</option>
																		<option value="PERMANENT">Permanent</option>
																		<option value="CO-TERMINUS">Co-Termnus</option>
																		<option value="ELECTED">Elected</option>
																		<option value="CASUAL">Casual</option>
																		<option value="PROJECT BASED">Project Based</option>
																		<option value="Contractual">Contractual</option>
																	</select>
                                                                    <!-- <input type="text" id="p_appointment" name="p_appointment" class="form-control"> -->
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="form-label">is Gov't:</label>
																	<select id="p_isgovt" name="p_isgovt" class="form-control">
																		<option>Please Choose</option>
																		<option value="YES">YES</option>
																		<option value="NO">NO</option>
																	</select>
																	
                                                                   <!-- <input type="text" id="p_isgovt" name="p_isgovt" class="form-control"> -->
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <?php 
												            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
												            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr' &&
									                    	strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff')
												            { 
			               								?>

                                                        <div class="row">
                                                            <br/>
                                                            <div class="col-md-4 col-md-offset-4">
                                                                <input type="hidden" id="a_id" name="a_id" value="<?php echo $a_id; ?>" class="form-control">
                                                                <button type="submit" class="btn btn-success form-control"><i class="fa fa-save"></i> Save Work Experience</button>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                    </form>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="tab_training" aria-labelledby="training">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <hr>
                                                <?php 
										            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
										            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr' &&
									                    	strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff')
										            { 
	               								?>
                                                <div class="col-md-2">
                                                    <button class="btn btn-info" id="add_training" name="add_training"><i class="fa fa-plus"></i> Add Training</button>
                                                </div>
                                                <?php } ?>
												<div class="col-md-2">
                                                    <label class="form-label">Training Type</label>
                                                </div>
												<div class="col-md-2">
                                                    <select class="form-control col-md-3 col-xs-12" id="t_type" name="t_type">
														<option> -- Choose -- </option>
														<option value="MANAGERIAL">MANAGERIAL</option>
														<option value="SUPERVISORY">SUPERVISORY</option>
														<option value="ADMINISTRATIVE">ADMINISTRATIVE</option>
														<option value="TECHNICAL">TECHNICAL</option>
														<option value="SKILLED">SKILLED</option>
													</select>
													
                                                </div>
												<div class="col-md-2">
												<button id="btn_save_trainingtype" name="btn_save_trainingtype" class="btn btn-primary"> UPDATE TRAINING TYPE</button>
                                                </div>
                                                <table class="cell-border compact hover"  id="dt_training" name="dt_training">
                                                    <thead>
                                                        <tr>
															<td><input type="checkbox"></td>
                                                            <td>Seminar</td>
                                                            <td>Type</td>
                                                            <td>From</td>
                                                            <td>To</td>
                                                            <td>Hrs</td>
                                                            <td>Condocted by</td>
                                                            <td>Action</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       
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
                                                                    <input type="text" id="t_from" name="t_from" class="date form-control">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="form-label">To:</label>
                                                                    <input type="text" id="t_to" name="t_to" class="date form-control">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="form-label">Hrs:</label>
                                                                    <input type="text" id="t_hoursno" name="t_hoursno" class="numeric form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="form-label">Conducted by:</label>
                                                                    <input type="text" id="t_conductor" name="t_conductor" class="form-control">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="form-label">Relevant?:</label>
																	<select id="t_relevant" name="t_relevant" class="form-control">
																		<option>Please Choose</option>
																		<option value="YES">YES</option>
																		<option value="NO">NO</option>
																	</select>
                                                                   <!-- <input type="text" id="t_relevant" name="t_relevant" class="form-control"> -->
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <?php 
												            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
												            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff' &&
												            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr')
												            { 
			               								?>
                                                        <div class="row">
                                                            <br/>
                                                            <div class="col-md-4 col-md-offset-4">
                                                                <input type="hidden" id="a_id" name="a_id" value="<?php echo $a_id; ?>" class="form-control">
                                                                <button type="submit" class="btn btn-success form-control"><i class="fa fa-save"></i> Save Training Info</button>
                                                            </div>
                                                        </div>
                                                        <?php } ?>

                                                    </form>
                                                </div>



                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="tab_elig" aria-labelledby="elig">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <hr>
                                                <?php 
										            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
										            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff' &&
										            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr')
										            { 
	               								?>
                                                <div class="col-md-4">
                                                    <button class="btn btn-info" id="add_elig" name="add_elig"><i class="fa fa-plus"></i> Add Eligibility</button>
                                                </div>
                                                <?php } ?>
                                                <table class="cell-border compact hover" id="dt_eligibility" name="dt_eligibility">
                                                    <thead>
                                                        <tr>
                                                            <td><input type="checkbox"></td>
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
                                                        <!--?php 
										// if(is_array($eligibility)){
										// foreach($eligibility as $e){?>
                                                            <tr>
                                                                <td>
                                                                    <!--?php // echo $e->el_type; ?>
                                                                </td>
                                                                <td>
                                                                    <!--?php // echo $e->el_career; ?>
                                                                </td>
                                                                <td>
                                                                    <!--?php // echo $e->el_rating; ?>
                                                                </td>
                                                                <td>
                                                                    <!--?php // echo $e->el_examdate; ?>
                                                                </td>
                                                                <td>
                                                                    <!--?php // echo $e->el_examplace; ?>
                                                                </td>
                                                                <td>
                                                                    <!--?php // echo $e->el_number; ?>
                                                                </td>
                                                                <td>
                                                                    <!--?php // echo $e->el_daterelease; ?>
                                                                </td>
                                                                <td-->
                                                                <!--?php 
												         //   if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
												        //    strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff' &&
												        //    strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr')
												        //    { 
			               								?-->
                                                                    <!--a id="popup_elig" title="Edit Eligibility Info"
																	data-href="<!--?php e//cho base_url('employee/update_employee_elig/'.$e->el_id); ?>" 
																	data-toggle="modal" data-target="#frm_edit_elig" href="#" 
																	data-title="<!--?php //echo $e->el_type.' '.$e->el_career; ?>" 
																	data-el_type="<!--?php //echo $e->el_type;?>"
																	data-el_career="<!--?php //echo $e->el_career; ?>" 
																	data-el_rating="<!--?php //echo $e->el_rating; ?>" 
																	data-el_examdate="<!--?php //echo $e->el_examdate; ?>" 
																	data-el_examplace="<!--?php //echo $e->el_examplace; ?>" 
																	data-el_number="<!--?php //echo $e->el_number; ?>"
																	data-el_daterelease="<!--?php //echo $e->el_daterelease; ?>" 
																	data-el_id="<!--?php //echo $e->el_id; ?>"><i class="fa fa-pencil"></i>
													</a> |
                                                                   <a title="Delete Education Info" 
																					data-href="<!--?php //echo base_url('employee/delete_elig_info/'.$e->el_id); ?>" 
																					data-toggle="modal" 
																					data-target="#frm_del_elig" href="#" 
																					data-title="<!--?php // echo $e->el_type.' '.$e->el_career; ?>" 
																					data-el_id="<!--?php //echo $e->el_id;?>" >
																				<i class="glyphicon glyphicon-trash"></i>
																				</a>
																				<!--?php // } ?-->
                                                                <!--/td>
                                                            </tr-->
                                                            <!--?php }} ?-->
                                                    </tbody>
                                                </table>

                                                <div id="add_new_elig" name="add_new_elig">
                                                    <form id="frm_elig" name="frm_elig">
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="col-md-3">
                                                                    <label class="form-label">Type:</label>
																	<select id="el_type" name="el_type" class="form-control">
																		<option value="">Choose Eligibility</option>
																		<option value="CS PROFESSIONAL">CS PROFESSIONAL</option>
																		<option value="CS SUBPROFESSIONAL">CS SUBPROFESSIONAL</option>
																		<option value="BAR/BOARD ELIGIBILITY (RA1080)">BAR/BOARD ELIGIBILITY (RA1080)</option>
																		<option value="BARANGAY OFFICIAL ELIGIBILITY (BOE)">BARANGAY OFFICIAL ELIGIBILITY (BOE)</option>
																		<option value="HONOR GRADUATE ELIGIBILITY (PD907)">HONOR GRADUATE ELIGIBILITY (PD907)</option>
																		<option value="SANGGUNIAN MEMBER ELIGIBILITY (SME)">SANGGUNIAN MEMBER ELIGIBILITY (SME)</option>
																		<option value="SKILL ELIGIBILITY (CSC MC NO II)">SKILL ELIGIBILITY (CSC MC NO II)</option>
																
																	</select>
			
                                                                   <!-- <input type="text" id="el_type" name="el_type" class="form-control"> -->
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
                                                                    <input type="text" id="el_examdate" name="el_examdate" class="date form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="form-label">Examination Place:</label>
                                                                    <input type="text" id="el_examplace" name="el_examplace" class="form-control">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="form-label">Number:</label>
                                                                    <input type="text" id="el_number" name="el_number" class="form-control">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="form-label">Date Release:</label>
                                                                    <input type="text" id="el_daterelease" name="el_daterelease" class="date form-control">
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <?php 
												            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
												            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff' &&
												            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr')
												            { 
			               								?>
                                                        <div class="row">
                                                            <br/>
                                                            <div class="col-md-4 col-md-offset-4">
                                                                <input type="hidden" id="a_id" name="a_id" value="<?php echo $a_id; ?>" class="form-control">
                                                                <button type="submit" class="btn btn-success form-control"><i class="fa fa-save"></i> Save Training Info</button>
                                                            </div>
                                                        </div>
                                                        <?php } ?>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="tab_skills" aria-labelledby="skills">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <hr>
                                                <?php 
										            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
										            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff' &&
										            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr')
										            { 
	               								?>
                                                <div class="col-md-4">
                                                    <button class="btn btn-info" id="add_skills" name="add_skills"><i class="fa fa-plus"></i> Add Skills</button>
                                                </div>
                                                <?php } ?>
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
                                                        <?php 
										if(is_array($skills)){
										foreach($skills as $s){?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $s->sh_skills; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $s->sh_nonacademic; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $s->sh_membership; ?>
                                                                </td>

                                                                <td>
                                                                <?php 
												            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
												            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff' &&
												            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr')
												            { 
			               								?>
                                                                    <a title="Edit Skills Info" 
																	data-href="<?php echo base_url('employee/update_employee_skills/'.$s->sh_id); ?>" 
																	data-toggle="modal" data-target="#frm_edit_skills" href="#" 
																	data-title="<?php echo $s->sh_skills; ?>" 
																	data-sh_skills="<?php echo $s->sh_skills;?>" 
																	data-sh_nonacademic="<?php echo $s->sh_nonacademic; ?>" 
																	data-sh_membership="<?php echo $s->sh_membership; ?>" 
																	data-sh_id="<?php echo $s->sh_id; ?>"><i class="fa fa-pencil"></i>
													</a> |
                                                               	<a title="Delete Skills Info" 
																					data-href="<?php echo base_url('employee/delete_employee_skills/'.$s->sh_id); ?>" 
																					data-toggle="modal" 
																					data-target="#frm_del_skills" href="#" 
																					data-title="<?php echo $s->sh_skills; ?>" 
																					data-sh_id="<?php echo $s->sh_id; ?>">
																				<i class="glyphicon glyphicon-trash"></i>
																				</a>
																				<?php } ?>

                                                                </td>
                                                            </tr>
                                                            <?php }} ?>
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
                                                        <?php 
												            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
												            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff' &&
												            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr')
												            { 
			               								?>
                                                        <div class="row">
                                                            <br/>
                                                            <div class="col-md-4 col-md-offset-4">
                                                                <input type="hidden" id="a_id" name="a_id" value="<?php echo $a_id; ?>" class="form-control">
                                                                <button type="submit" class="btn btn-success form-control"><i class="fa fa-save"></i> Save Skills</button>
                                                            </div>
                                                        </div>
                                                        <?php } ?>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="tab_char_reff" aria-labelledby="char_reff">

                                        <?php if(is_array($q_answer)){
							foreach($q_answer as $q){
					  ?>
                                            <div class="row">
                                                <form id="frm_questions" name="frm_questions">
                                                    <div class="col-md-12">


                                                        <hr>
                                                        <div class="col-md-12">
                                                            <p>36. Are you related by consanguinity or affinity to any of the following :</p>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <p>a. Within the third degree (for National Government Employees): appointing authority, recommending authority, chief of office/bureau/departmentor person who has immediate supervision over you in the Office, Bureau or Department where you will be appointed?</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="radio" value="Yes" id="q_36_a" name="q_36_a" <?php if($q->q_36_a == 'Yes'){ echo 'checked';} ?>> Yes
                                                            <input type="radio" value="No" id="q_36_a" name="q_36_a" <?php if($q->q_36_a == 'No'){ echo 'checked';} ?>> No
                                                            <textarea id="q_36_a_details" name="q_36_a_details">
                                                                <?php echo $q->q_36_a_details; ?>
                                                            </textarea>
                                                        </div>

                                                        <div class="col-md-8">
                                                            <p>b. Within the fourth degree (for Local Government Employees): appointing authority or recommending authority where you will be appointed??</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="radio" value="Yes" id="q_36_b" name="q_36_b" <?php if($q->q_36_b == 'Yes'){ echo 'checked';} ?>> Yes
                                                            <input type="radio" value="No" id="q_36_b" name="q_36_b" <?php if($q->q_36_b == 'No'){ echo 'checked';} ?>> No
                                                            <textarea id="q_36_b_details" name="q_36_b_details">
                                                                <?php echo $q->q_36_b_details; ?>
                                                            </textarea>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-12">
                                                        <hr>
                                                        <div class="col-md-12">
                                                            <p>37.</p>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <p>a. Have you ever been formally charged?</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="radio" value="Yes" id="q_37_a" name="q_37_a" <?php if($q->q_37_a == 'Yes'){ echo 'checked';} ?>> Yes
                                                            <input type="radio" value="No" id="q_37_a" name="q_37_a" <?php if($q->q_37_a == 'No'){ echo 'checked';} ?>> No
                                                            <textarea id="q_37_a_details" name="q_37_a_details">
                                                                <?php echo $q->q_37_a_details; ?>
                                                            </textarea>
                                                        </div>

                                                        <div class="col-md-8">
                                                            <p>b. Have you ever been guilty of any administrative offense?</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="radio" value="Yes" id="q_37_b" name="q_37_b" <?php if($q->q_37_b == 'Yes'){ echo 'checked';} ?>> Yes
                                                            <input type="radio" value="No" id="q_37_b" name="q_37_b" <?php if($q->q_37_b == 'No'){ echo 'checked';} ?>> No
                                                            <textarea id="q_37_b_details" name="q_37_b_details">
                                                                <?php echo $q->q_37_b_details; ?>
                                                            </textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <hr>
                                                        <div class="col-md-8">
                                                            <p>38. Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="radio" value="Yes" id="q_38" name="q_38" <?php if($q->q_38 == 'Yes'){ echo 'checked';} ?>> Yes
                                                            <input type="radio" value="No" id="q_38" name="q_38" <?php if($q->q_38 == 'No'){ echo 'checked';} ?>> No
                                                            <textarea id="q_38_details" name="q_38_details">
                                                                <?php echo $q->q_38_details; ?>
                                                            </textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <hr>
                                                        <div class="col-md-8">
                                                            <p>39. Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract, AWOL or phased out, in the public or private sector?</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="radio" value="Yes" id="q_39" name="q_39" <?php if($q->q_39 == 'Yes'){ echo 'checked';} ?>> Yes
                                                            <input type="radio" value="No" id="q_39" name="q_39" <?php if($q->q_39 == 'No'){ echo 'checked';} ?>> No
                                                            <textarea id="q_39_details" name="q_39_details">
                                                                <?php echo $q->q_39_details; ?>
                                                            </textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <hr>
                                                        <div class="col-md-8">
                                                            <p>40. Have you ever been a candidate in a national or local election (except Barangay election)?</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="radio" value="Yes" id="q_40" name="q_40" <?php if($q->q_40 == 'Yes'){ echo 'checked';} ?>> Yes
                                                            <input type="radio" value="No" id="q_40" name="q_40" <?php if($q->q_40 == 'No'){ echo 'checked';} ?>> No
                                                            <textarea id="q_40_details" name="q_40_details">
                                                                <?php echo $q->q_40_details; ?>
                                                            </textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <hr>
                                                        <div class="col-md-12">
                                                            <p>41. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</p>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <p>a. Are you a member of any indigenous group?</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="radio" value="Yes" id="q_41_a" name="q_41_a" <?php if($q->q_41_a == 'Yes'){ echo 'checked';} ?>> Yes
                                                            <input type="radio" value="No" id="q_41_a" name="q_41_a" <?php if($q->q_41_a == 'No'){ echo 'checked';} ?>> No
                                                            <textarea id="q_41_a_details" name="q_41_a_details">
                                                                <?php echo $q->q_41_a_details; ?>
                                                            </textarea>
                                                        </div>

                                                        <div class="col-md-8">
                                                            <p>b. Are you differently abled?</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="radio" value="Yes" id="q_41_b" name="q_41_b" <?php if($q->q_41_b == 'Yes'){ echo 'checked';} ?>> Yes
                                                            <input type="radio" value="No" id="q_41_b" name="q_41_b" <?php if($q->q_41_b == 'No'){ echo 'checked';} ?>> No
                                                            <textarea id="q_41_b_details" name="q_41_b_details">
                                                                <?php echo $q->q_41_b_details; ?>
                                                            </textarea>
                                                        </div>

                                                        <div class="col-md-8">
                                                            <p>C. Are you a solo parent?</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="radio" value="Yes" id="q_41_c" name="q_41_c" <?php if($q->q_41_c == 'Yes'){ echo 'checked';} ?>> Yes
                                                            <input type="radio" value="No" id="q_41_c" name="q_41_c" <?php if($q->q_41_c == 'No'){ echo 'checked';} ?>> No
                                                            <textarea id="q_41_c_details" name="q_41_c_details">
                                                                <?php echo $q->q_41_c_details; ?>
                                                            </textarea>
                                                        </div>
                                                    </div>

                                                    <?php 
											            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
											            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff' &&
											            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr')
											            { 
		               								?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <hr>
                                                            <div class="col-md-4 col-md-offset-4">
                                                                <input type="hidden" id="a_id" name="a_id" value="<?php echo $a_id; ?>">
                                                                <button type="submit" class="btn btn-success form-control"><i class="fa fa-save"></i> Updated Answers</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </form>
                                            </div>
                                            <?php } }else{ ?>

                                                <div class="row">
                                                    <form id="frm_questions" name="frm_questions">
                                                        <div class="col-md-12">


                                                            <hr>
                                                            <div class="col-md-12">
                                                                <p>36. Are you related by consanguinity or affinity to any of the following :</p>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <p>a. Within the third degree (for National Government Employees): appointing authority, recommending authority, chief of office/bureau/departmentor person who has immediate supervision over you in the Office, Bureau or Department where you will be appointed?</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" value="Yes" id="q_36_a" name="q_36_a"> Yes
                                                                <input type="radio" value="No" id="q_36_a" name="q_36_a"> No
                                                                <textarea id="q_36_a_details" name="q_36_a_details"></textarea>
                                                            </div>

                                                            <div class="col-md-8">
                                                                <p>b. Within the fourth degree (for Local Government Employees): appointing authority or recommending authority where you will be appointed??</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" value="Yes" id="q_36_b" name="q_36_b"> Yes
                                                                <input type="radio" value="No" id="q_36_b" name="q_36_b"> No
                                                                <textarea id="q_36_b_details" name="q_36_b_details"></textarea>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-12">
                                                            <hr>
                                                            <div class="col-md-12">
                                                                <p>37.</p>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <p>a. Have you ever been formally charged?</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" value="Yes" id="q_37_a" name="q_37_a"> Yes
                                                                <input type="radio" value="No" id="q_37_a" name="q_37_a"> No
                                                                <textarea id="q_37_a_details" name="q_37_a_details"></textarea>
                                                            </div>

                                                            <div class="col-md-8">
                                                                <p>b. Have you ever been guilty of any administrative offense?</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" value="Yes" id="q_37_b" name="q_37_b"> Yes
                                                                <input type="radio" value="No" id="q_37_b" name="q_37_b"> No
                                                                <textarea id="q_37_b_details" name="q_37_b_details"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <hr>
                                                            <div class="col-md-8">
                                                                <p>38. Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" value="Yes" id="q_38" name="q_38"> Yes
                                                                <input type="radio" value="No" id="q_38" name="q_38"> No
                                                                <textarea id="q_38_details" name="q_38_details"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <hr>
                                                            <div class="col-md-8">
                                                                <p>39. Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract, AWOL or phased out, in the public or private sector?</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" value="Yes" id="q_39" name="q_39"> Yes
                                                                <input type="radio" value="No" id="q_39" name="q_39"> No
                                                                <textarea id="q_39_details" name="q_39_details"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <hr>
                                                            <div class="col-md-8">
                                                                <p>40. Have you ever been a candidate in a national or local election (except Barangay election)?</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" value="Yes" id="q_40" name="q_40"> Yes
                                                                <input type="radio" value="No" id="q_40" name="q_40"> No
                                                                <textarea id="q_40_details" name="q_40_details"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <hr>
                                                            <div class="col-md-12">
                                                                <p>41. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</p>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <p>a. Are you a member of any indigenous group?</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" value="Yes" id="q_41_a" name="q_41_a"> Yes
                                                                <input type="radio" value="No" id="q_41_a" name="q_41_a"> No
                                                                <textarea id="q_41_a_details" name="q_41_a_details"></textarea>
                                                            </div>

                                                            <div class="col-md-8">
                                                                <p>b. Are you differently abled?</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" value="Yes" id="q_41_b" name="q_41_b"> Yes
                                                                <input type="radio" value="No" id="q_41_b" name="q_41_b"> No
                                                                <textarea id="q_41_b_details" name="q_41_b_details"></textarea>
                                                            </div>

                                                            <div class="col-md-8">
                                                                <p>C. Are you a solo parent?</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" value="Yes" id="q_41_c" name="q_41_c"> Yes
                                                                <input type="radio" value="No" id="q_41_c" name="q_41_c"> No
                                                                <textarea id="q_41_c_details" name="q_41_c_details"></textarea>
                                                            </div>
                                                        </div>

                                                        <?php 
												            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
												            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff' &&
												            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr')
												            { 
			               								?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <hr>
                                                                <div class="col-md-4 col-md-offset-4">
                                                                    <input type="hidden" id="a_id" name="a_id" value="<?php echo $a_id; ?>">
                                                                    <button type="submit" class="btn btn-success form-control"><i class="fa fa-save"></i> Saved Answers</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                    </form>
                                                </div>
                                                <?php }?>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <hr>

                                                            <?php 
													            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
													            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff' &&
													            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr')
													            { 
				               								?>
                                                            <div class="col-md-4">
                                                                <button class="btn btn-info" id="add_reff" name="add_reff"><i class="fa fa-plus"></i> Add Character Refference</button>
                                                            </div>
                                                            <?php } ?>
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
                                                                    <?php 
											if(is_array($char_reff)){
										foreach($char_reff as $cr){?>
                                                                        <tr>
                                                                            <td>
                                                                                <?php echo $cr->r_name; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $cr->r_address; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $cr->r_contactnum; ?>
                                                                            </td>
                                                                            <td>
                                                                            <?php 
												            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
												            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff' &&
												            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr')
												            { 
			               								?>
                                                                                <a title="Edit Character Referrence Info" 
																				data-href="<?php echo base_url('employee/update_employee_reff/'.$cr->r_id); ?>" 
																				data-toggle="modal" 
																				data-target="#frm_edit_reff" href="#" 
																				data-title="<?php echo $cr->r_name; ?>" 
																				data-r_name="<?php echo $cr->r_name;?>" 
																				data-r_address="<?php echo $cr->r_address; ?>" 
																				data-r_contactnum="<?php echo $cr->r_contactnum; ?>" 
																				data-r_id="<?php echo $cr->r_id; ?>">
																				<i class="fa fa-pencil"></i>
													</a> |
                                                               	<a title="Delete Refference Info" 
																					data-href="<?php echo base_url('employee/delete_employee_reff/'.$cr->r_id); ?>" 
																					data-toggle="modal" 
																					data-target="#frm_del_reff" href="#" 
																					data-title="<?php echo $cr->r_name; ?>" 
																					data-r_id="<?php echo $cr->r_id; ?>">
																				<i class="glyphicon glyphicon-trash"></i>
																				</a>
																				<?php } ?>
                                                                            </td>
                                                                        </tr>
                                                                        <?php }} ?>
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
                                                                                <label class="form-label">Contact No.:</label>
                                                                                <input type="text" id="r_contactnum" name="r_contactnum" class="numeric form-control">
                                                                            </div>


                                                                        </div>
                                                                    </div>

                                                                    <?php 
															            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
															            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff' &&
															            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr')
															            { 
						               								?>
                                                                    <div class="row">
                                                                        <br/>
                                                                        <div class="col-md-4 col-md-offset-4">
                                                                            <input type="hidden" id="a_id" name="a_id" value="<?php echo $a_id; ?>" class="form-control">
                                                                            <button type="submit" class="btn btn-success form-control"><i class="fa fa-save"></i> Save Skills</button>
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>

                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                    </div>
                                  
								  <div role="tabpanel" class="tab-pane fade" id="tab_vol_work" aria-labelledby="vol_work">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <hr>

                                                <?php 
										            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
										            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff' &&
										            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr')
										            { 
	               								?>
                                                <div class="col-md-4">
                                                    <button class="btn btn-info" id="add_vol_work" name="add_vol_work"><i class="fa fa-plus"></i> Add Voluntary Work Information</button>
                                                </div>
                                                <?php } ?>

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
                                                        <?php if(is_array($vol_work)){
											
										foreach($vol_work as $v){?>
                                                            <tr class="<?php if($v->vw_forapproval == '1'){ echo 'alert alert-warning';} ?>">
                                                                <td>
                                                                    <?php echo $v->vw_name; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $v->vw_address; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $v->vw_datefrom; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $v->vw_dateto; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $v->vw_nohours; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $v->vw_work; ?>
                                                                </td>

                                                                <td>
                                                                <?php 
												            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
												            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff' &&
												            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr')
												            { 
			               								?>

                                                                    <a title="Edit Voluntary Work Info" 
																	data-href="<?php echo base_url('employee/update_employee_vol_work/'.$v->vw_id); ?>" 
																	data-toggle="modal" 
																	data-target="#frm_edit_vol_work" href="#" 
																	data-title="<?php echo $v->vw_name; ?>" 
																	data-vw_name="<?php echo $v->vw_name;?>" 
																	data-vw_address="<?php echo $v->vw_address; ?>" 
																	data-vw_datefrom="<?php echo $v->vw_datefrom; ?>" 
																	data-vw_dateto="<?php echo $v->vw_dateto; ?>" 
																	data-vw_nohours="<?php echo $v->vw_nohours; ?>" 
																	data-vw_work="<?php echo $v->vw_work; ?>" 
																	data-vw_id="<?php echo $v->vw_id; ?>"><i class="fa fa-pencil"></i>
													</a> |
																			<a title="Delete Voluntary Info" 
																					data-href="<?php echo base_url('employee/delete_vol_work_delete/'.$v->vw_id); ?>" 
																					data-toggle="modal" 
																					data-target="#frm_del_vol_work" href="#" 
																					data-title="<?php echo $v->vw_name; ?>" 
																					data-vw_id="<?php echo $v->vw_id; ?>">
																				<i class="glyphicon glyphicon-trash"></i>
																				</a>
																				<?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php } }?>
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

                                                                <div class="col-md-4">
                                                                    <label class="form-label">Address:</label>
                                                                    <input type="text" id="vw_address" name="vw_address" class="form-control">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="form-label">From:</label>
                                                                    <input type="text" id="vw_datefrom" name="vw_datefrom" class="date form-control">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="form-label">To:</label>
                                                                    <input type="text" id="vw_dateto" name="vw_dateto" class="date form-control">
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <label class="form-label"># Hrs:</label>
                                                                    <input type="text" id="vw_nohours" name="vw_nohours" class="numeric form-control">
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <label class="form-label">Work:</label>
                                                                    <input type="text" id="vw_work" name="vw_work" class="form-control">
                                                                </div>


                                                            </div>
                                                        </div>

                                                        <?php 
												            if(strtolower($this->session->userdata('a_profile')) != 'admin asst ii-leave' &&
												            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-staff' &&
												            strtolower($this->session->userdata('a_profile')) != 'admin asst ii-svr')
												            { 
			               								?>
                                                        <div class="row">
                                                            <br/>
                                                            <div class="col-md-4 col-md-offset-4">
                                                                <input type="hidden" id="a_id" name="a_id" value="<?php echo $a_id; ?>" class="form-control">
                                                                <button type="submit" class="btn btn-success form-control"><i class="fa fa-save"></i> Save Voluntary Work</button>
                                                            </div>
                                                        </div>
                                                        <?php } ?>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>
</div>


<!-- Modals -->
<div class="modal fade" id="frm_edit_child" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="frm_child_update" name="frm_child_update" method="post" action="#">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Employee Child Information</h4>
                    </div>
                </div>


                <div class="modal-body">
                    <p class="p_title"></p>
                    <input type="hidden" id="c_id" name="c_id" class="c_id" value="">
                    <hr>

                    <div class="row">
                        <div class="col-md-3">
                            <label>First Name:</label>
                            <input type="text" id="c_fname" name="c_fname" class="c_fname form-control" value="">
                        </div>
                        <div class="col-md-3">
                            <label>Middile Initial :</label>
                            <input type="text" id="c_mi" name="c_mi" class="c_mi form-control" value="">
                        </div>
                        <div class="col-md-3">
                            <label>Last Name:</label>
                            <input type="text" id="c_lname" name="c_lname" class="c_lname form-control" value="">
                        </div>
                        <div class="col-md-3">
                            <label>Name Extention:</label>
                            <input type="text" id="c_extname" name="c_extname" class="c_extname form-control" value="">
                        </div>
                        <div class="col-md-3">
                            <label>Birth Date:</label>
                            <input type="text" id="c_birthdate" name="c_birthdate" class="date c_birthdate form-control" value="">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="btn_cancel" type="button" class="btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> CANCEL</button>
                    <button type="submit" id="btn_updatechild" name="btn_updatechild" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> SAVE</button>
                </div>

            </div>
        </div>
    </form>
</div>


<!-- Education Modals -->
<div class="modal fade" id="frm_edit_educ" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="frm_educ_update" name="frm_educ_update" method="post" action="#">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Employee Child Information</h4>
                    </div>
                </div>


                <div class="modal-body">
                    <p class="p_title"></p>
                    <input type="hidden" id="e_id" name="e_id" class="e_id" value="">
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <label class="form-label">Level:</label>
								<select id="pi_level" name="pi_level" class="pi_level form-control" required="">
										<option value="">Choose One</option>
										<option value="Elementary">Elementary</option>
										<option value="Secondary">Secondary</option>
										<option value="Vocational">Vocational</option>
										<option value="College">College</option>
										<option value="Graduate Studies">Graduate Studies</option>
										<option value="Masteral">Masteral</option>
										<option value="Doctorate">Doctorate</option>
								  </select>
                                <!-- <input type="text" id="pi_level" name="pi_level" class="pi_level form-control"> -->
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">School Name:</label>
                                <input type="text" id="pi_schoolname" name="pi_schoolname" class="pi_schoolname form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Degree:</label>
                                <input type="text" id="pi_degree" name="pi_degree" class="pi_degree form-control">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Year Graduated:</label>
                                <input type="text" id="pi_yrgrad" name="pi_yrgrad" class="pi_yrgrad form-control">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">From:</label>
                                <input type="text" id="pi_from" name="pi_from" class="pi_from date form-control">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">To:</label>
                                <input type="text" id="pi_to" name="pi_to" class="pi_to date form-control">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Award:</label>
                                <input type="text" id="pi_honors" name="pi_honors" class="pi_honors form-control">
                            </div>
							 <div class="col-md-3">
                                                                    <label class="form-label">Type:</label>
																	<select id="e_type" name="e_type" class="e_type form-control" required="">
																			<option value="">Choose One</option>
																			<option value="ELEMENTARY GRADUATE">ELEMENTARY GRADUATE</option>
																			<option value="HIGH SCHOOL GRADUATE">HIGH SCHOOL GRADUATE</option>
																			<option value="COMPLETION OF TWO YEAR STUDIES">COMPLETION OF TWO YEAR STUDIES</option>
																			<option value="BACHELOR'S DEGREE">BACHELOR'S DEGREE</option>
																			<option value="MASTER'S DEGREE">MASTER'S DEGREE</option>
																			<option value="DOCTORATE DEGREE">DOCTORATE DEGREE</option>
																			
																	  </select>
                                                                </div>
								<div class="col-md-3">
                                    <label class="form-label">Sector:</label>
									<select id="e_sector" name="e_sector" class="e_sector form-control" required="">
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
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="btn_cancel" type="button" class="btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> CANCEL</button>
                    <button type="submit" id="btn_updateeduc" name="btn_updateeduc" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> SAVE</button>
                </div>

            </div>
        </div>
    </form>
</div>


<!-- Eligibility Modals -->
<div class="modal fade" id="frm_edit_elig" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="frm_elig_update" name="frm_elig_update" method="post" action="#">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Eligibility Information</h4>
                    </div>
                </div>

                <div class="modal-body">
                    <p class="p_title"></p>
                    <input type="hidden" id="m_el_id" name="m_el_id" class="m_el_id" value="">
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <label class="form-label">Type:</label>
                                <!--input type="text" id="m_el_type" name="m_el_type" class="m_el_type form-control"-->
								<select id="m_el_type" name="m_el_type" class="m_el_type form-control">
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
                            <div class="col-md-4">
                                <label class="form-label">Career:</label>
                                <input type="text" id="m_el_career" name="m_el_career" class="m_el_career form-control">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Rating:</label>
                                <input type="text" id="m_el_rating" name="m_el_rating" class="m_el_rating form-control">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Exam Date:</label>
                                <input type="text" id="m_el_examdate" name="m_el_examdate" class="m_el_examdate form-control date">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Examination Place:</label>
                                <input type="text" id="m_el_examplace" name="m_el_examplace" class="m_el_examplace form-control">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Number:</label>
                                <input type="text" id="m_el_number" name="m_el_number" class="m_el_number form-control">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Date Release:</label>
                                <input type="text" id="m_el_daterelease" name="m_el_daterelease" class="m_el_daterelease form-control date">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="btn_cancel" type="button" class="btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> CANCEL</button>
                    <button type="submit" id="btn_updateelig" name="btn_updateelig" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> SAVE</button>
                </div>

            </div>
        </div>
    </form>
</div>



<!-- Eligibility Modals -->
<div class="modal fade" id="frm_edit_work" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="frm_work_update" name="frm_work_update" method="post" action="#">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Work Information</h4>
                    </div>
                </div>

                <div class="modal-body">
                    <p class="p_title"></p>
                    <input type="hidden" id="m_w_id" name="m_w_id" class="m_w_id" value="">
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <label class="form-label">From</label>
                                <input type="text" id="m_p_from" name="m_p_from" class="m_p_from form-control date">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">To:</label>
                                <input type="text" id="m_p_to" name="m_p_to" class="m_p_to form-control date">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Position:</label>
                                <input type="text" id="m_p_position" name="m_p_position" class="m_p_position form-control">
                            </div>
							
							<div class="col-md-3">
                                <label class="form-label">Agency/Company:</label>
                                <input type="text" id="m_p_company" name="m_p_company" class="m_p_company form-control">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Monthly Salary:</label>
                                <input type="text" id="m_p_salarymonthly" name="m_p_salarymonthly" class="m_p_salarymonthly currency form-control">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Grade:</label>
								<select id="m_p_salarygrade" name="m_p_salarygrade" class="m_p_salarygrade form-control">
										<option>Choose Grade</option>
										<option value="Grade 1">Grade 1</option>
										<option value="Grade 2">Grade 2</option>
										<option value="Grade 3">Grade 3</option>
										<option value="Grade 4">Grade 4</option>
										<option value="Grade 5">Grade 5</option>
										<option value="Grade 6">Grade 6</option>
										<option value="Grade 7">Grade 7</option>
										<option value="Grade 8">Grade 8</option>
										
										<option value="Grade 9">Grade 9</option>
										<option value="Grade 10">Grade 10</option>
										<option value="Grade 11">Grade 11</option>
										<option value="Grade 12">Grade 12</option>
										<option value="Grade 13">Grade 13</option>
										<option value="Grade 14">Grade 14</option>
										<option value="Grade 15">Grade 15</option>
										<option value="Grade 16">Grade 16</option>
										
										<option value="Grade 17">Grade 17</option>
										<option value="Grade 18">Grade 18</option>
										<option value="Grade 19">Grade 19</option>
										<option value="Grade 20">Grade 20</option>
										<option value="Grade 21">Grade 21</option>
										<option value="Grade 22">Grade 22</option>
										<option value="Grade 23">Grade 23</option>
										<option value="Grade 24">Grade 24</option>
										
										<option value="Grade 25">Grade 25</option>
										<option value="Grade 26">Grade 26</option>
										<option value="Grade 27">Grade 27</option>
										<option value="Grade 28">Grade 28</option>
										<option value="Grade 29">Grade 29</option>
										<option value="Grade 30">Grade 30</option>
					
									</select>
                               <!--input type="text" id="m_p_salarygrade" name="m_p_salarygrade" class="m_p_salarygrade form-control"-->
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Step:</label>
                               <!-- <input type="text" id="m_p_salarystep" name="m_p_salarystep" class="m_p_salarystep form-control"> -->
								<select id="m_p_salarystep" name="m_p_salarystep" class="m_p_salarystep form-control">
									<option>Choose Step</option>
									<option value="No Step">No Step</option>
									<option value="Step 1">Step 1</option>
									<option value="Step 2">Step 2</option>
									<option value="Step 3">Step 3</option>
									<option value="Step 4">Step 4</option>
									<option value="Step 5">Step 5</option>
									<option value="Step 6">Step 6</option>
									<option value="Step 7">Step 7</option>
									<option value="Step 8">Step 8</option>
								</select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Status:</label>
                               <!-- <input type="text" id="m_p_appointment" name="m_p_appointment" class="m_p_appointment form-control"> -->
								<select class="form-control m_p_appointment" id="m_p_appointment" name="m_p_appointment">
									<option value="">-- Choose --</option>
									<option value="PERMANENT">Permanent</option>
									<option value="CO-TERMINUS">Co-Termnus</option>
									<option value="ELECTED">Elected</option>
									<option value="CASUAL">Casual</option>
									<option value="PROJECT BASED">Project Based</option>
								</select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">is Gov't:</label>
                                <!--input type="text" id="m_p_isgovt" name="m_p_isgovt" class="m_p_isgovt form-control"-->
								<select id="m_p_isgovt" name="m_p_isgovt" class="m_p_isgovt form-control">
									<option>-- Choose --</option>
									<option value="YES">YES</option>
									<option value="NO">NO</option>
								</select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="btn_cancel" type="button" class="btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> CANCEL</button>
                    <button type="submit" id="btn_updatework" name="btn_updatework" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> SAVE</button>
                </div>

            </div>
        </div>
    </form>
</div>


<!-- Eligibility Modals -->
<div class="modal fade" id="frm_edit_vol_work" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="frm_vol_work_update" name="frm_vol_work_update" method="post" action="#">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Voluntary Work Information</h4>
                    </div>
                </div>

                <div class="modal-body">
                    <p class="p_title"></p>
                    <input type="hidden" id="m_w_id" name="m_vw_id" class="m_vw_id" value="">
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="form-label">Voluntary Work Name:</label>
                                <input type="text" id="m_vw_name" name="m_vw_name" class="m_vw_name form-control">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Address:</label>
                                <input type="text" id="m_vw_address" name="m_vw_address" class="m_vw_address form-control">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">From:</label>
                                <input type="text" id="m_vw_datefrom" name="m_vw_datefrom" class="m_vw_datefrom date form-control">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">To:</label>
                                <input type="text" id="m_vw_dateto" name="m_vw_dateto" class="m_vw_dateto date form-control">
                            </div>
                            <div class="col-md-1">
                                <label class="form-label"># Hrs:</label>
                                <input type="text" id="m_vw_nohours" name="m_vw_nohours" class="m_vw_nohours numeric form-control">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Work:</label>
                                <input type="text" id="m_vw_work" name="m_vw_work" class="m_vw_work form-control">
                            </div>


                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="btn_cancel" type="button" class="btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> CANCEL</button>
                    <button type="submit" id="btn_updatework" name="btn_updatework" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> SAVE</button>
                </div>

            </div>
        </div>
    </form>
</div>


<!-- Training Modals -->
<div class="modal fade" id="frm_edit_training" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="frm_training_update" name="frm_training_update" method="post" action="#">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Training Information</h4>
                    </div>
                </div>

                <div class="modal-body">
                    <p class="p_title"></p>
                    <input type="hidden" id="m_t_id" name="m_t_id" class="m_t_id" value="">
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <label class="form-label">Training:</label>
                                <input type="text" id="m_t_seminar" name="m_t_seminar" class="m_t_seminar form-control">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">From:</label>
                                <input type="text" id="m_t_from" name="m_t_from" class="m_t_from date form-control">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">To:</label>
                                <input type="text" id="m_t_to" name="m_t_to" class="m_t_to date form-control">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Hrs:</label>
                                <input type="text" id="m_t_hoursno" name="m_t_hoursno" class="m_t_hoursno form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Conducted by:</label>
                                <input type="text" id="m_t_conductor" name="m_t_conductor" class="m_t_conductor form-control">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Relevant?:</label>
								<select id="m_t_relevant" name="m_t_relevant" class="m_t_relevant form-control">
																		<option>Please Choose</option>
																		<option value="YES">YES</option>
																		<option value="NO">NO</option>
																	</select>
                               <!-- <input type="text" id="m_t_relevant" name="m_t_relevant" class="m_t_relevant form-control"> -->
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="btn_cancel" type="button" class="btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> CANCEL</button>
                    <button type="submit" id="btn_updatework" name="btn_updatework" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> SAVE</button>
                </div>

            </div>
        </div>
    </form>
</div>


<!-- Skills Modals -->
<div class="modal fade" id="frm_edit_skills" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="frm_skills_update" name="frm_skills_update" method="post" action="#">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Skills Information</h4>
                    </div>
                </div>

                <div class="modal-body">
                    <p class="p_title"></p>
                    <input type="hidden" id="m_sh_id" name="m_sh_id" class="m_sh_id" value="">
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <label class="form-label">Skill:</label>
                                <input type="text" id="m_sh_skills" name="m_sh_skills" class="m_sh_skills form-control">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Non-Academic:</label>
                                <input type="text" id="m_sh_nonacademic" name="m_sh_nonacademic" class="m_sh_nonacademic form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Membership:</label>
                                <input type="text" id="m_sh_membership" name="m_sh_membership" class="m_sh_membership form-control">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="btn_cancel" type="button" class="btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> CANCEL</button>
                    <button type="submit" id="btn_updatework" name="btn_updatework" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> SAVE</button>
                </div>

            </div>
        </div>
    </form>
</div>


<!-- Skills Modals -->
<div class="modal fade" id="frm_edit_reff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="frm_reff_update" name="frm_reff_update" method="post" action="#">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Reference Information</h4>
                    </div>
                </div>

                <div class="modal-body">
                    <p class="p_title"></p>
                    <input type="hidden" id="m_r_id" name="m_r_id" class="m_r_id" value="">
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <label class="form-label">Name:</label>
                                <input type="text" id="m_r_name" name="m_r_name" class="m_r_name form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Address:</label>
                                <input type="text" id="m_r_address" name="m_r_address" class="m_r_address form-control">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Contact No.:</label>
                                <input type="text" id="m_r_contactnum" name="m_r_contactnum" class="m_r_contactnum numeric form-control">
                            </div>


                        </div>
                    </div>
                </div>



                <div class="modal-footer">
                    <button id="btn_cancel" type="button" class="btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> CANCEL</button>
                    <button type="submit" id="btn_updatework" name="btn_updatework" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> SAVE</button>
                </div>

            </div>
        </div>
    </form>
</div>


<!-- Capture Image -->
<div class="fade" id="takeaphoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="frm_capture2" name="frm_capture2" method="post">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Taking Photo</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <h3><input readonly type="text" class="emp_fullname form-control"></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="emp_id" id="emp_id" class="emp_id" />
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
                <div class="modal-footer">
                    <input type="button" class="btn btn-success" id="btn_save_userpics" value="Save Picture">
                </div>
            </div>
        </div>
    </form>
</div>
<!-- End of Capture -->


<!-- Signature -->
<div class="fade" id="mdl_signature" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                <div>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                    <h4 class="modal-title" id="myModalLabel">Signature</h4>
                </div>
            </div>
            <div class="modal-body">
                <h3><input readonly type="text" class="emp_fullname form-control"></h3>
                <hr>
				 <input type="hidden" name="emp_id" id="emp_id" class="emp_id" />
                 <input type="hidden" name="emp_fullname" id="emp_fullname" class="emp_fullname" value="" />
                <div class="form-group col-lg-12" id="signature">
                    <div class="row">
                        <canvas id="cnv" name="cnv" width="500" height="100"></canvas>
                    </div>

                    <div class="row">
                        <input type="hidden" name="bioSigData" id="bioSigData">
                        <input type="hidden" name="sigImgData" id="sigImgData">
                        <br>
                        <input type="hidden" name="sigStringData" id="sigStringData">
                        <input type="hidden" name="sigImageData" id="sigImageData">
                    </div>

                   
                    <div class="col-sm-12">
                        <hr>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-sm-2">
                        <input class="btn btn-warning form-control" id="button1" name="ClearBtn" type="button" value="Clear" onclick="javascript:onClear()">
                    </div>
					<!--
                    <div class="col-sm-3">
                        <input class="btn btn-primary form-control" id="button2" name="DoneBtn" type="button" value="Done" onclick="javascript:onDone()">
                    </div>
					-->
                    <div class="col-sm-4">
                        <button type="submit" id="save_empsig" name="save_empsig" class="btn btn-success form-control">SAVE SIGNATURE</button>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Capture -->


<!-- Delete Child -->
<div class="modal fade" id="frm_del_child" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="frm_child_delete" name="frm_child_delete" method="post" action="#">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Delete Employee Child Information</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <center>
						<h1 class="p_title form-label"></h1>
					</center>
					<input type="hidden" id="m_c_id" name="m_c_id" class="m_c_id" value="">
                </div>
                <div class="modal-footer">
                    <button id="btn_cancel" type="button" class="btn btn-success" data-dismiss="modal"><i class="glyphicon glyphicon-check"></i> CANCEL</button>
                    <button type="submit" id="btn_delchild" name="btn_delchild" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete </button>
                </div>

            </div>
        </div>
    </form>
</div>

<!-- Delete Educ -->
<div class="modal fade" id="frm_del_educ" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="frm_educ_delete" name="frm_educ_delete" method="post" action="#">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Delete Education Information</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <center>
						<h1 class="p_title form-label"></h1>
					</center>
					<input type="hidden" id="m_e_id" name="m_e_id" class="m_e_id" value="">
                </div>
                <div class="modal-footer">
                    <button id="btn_cancel" type="button" class="btn btn-success" data-dismiss="modal"><i class="glyphicon glyphicon-check"></i> CANCEL</button>
                    <button type="submit" id="btn_delchild" name="btn_delchild" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete </button>
                </div>

            </div>
        </div>
    </form>
</div>

<!-- Delete Educ -->
<div class="modal fade" id="frm_del_elig" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="frm_elig_delete" name="frm_elig_delete" method="post" action="#">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Delete Eligibility Information</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <center>
						<h1 class="p_title form-label"></h1>
					</center>
					<input type="hidden" id="m_el_id" name="m_el_id" class="m_el_id" value="">
                </div>
                <div class="modal-footer">
                    <button id="btn_cancel" type="button" class="btn btn-success" data-dismiss="modal"><i class="glyphicon glyphicon-check"></i> CANCEL</button>
                    <button type="submit" id="btn_delchild" name="btn_delchild" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete </button>
                </div>

            </div>
        </div>
    </form>
</div>

<!-- Delete Educ -->
<div class="modal fade" id="frm_del_work_exp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="frm_work_exp_delete" name="frm_work_exp_delete" method="post" action="#">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Delete Work Experience Information</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <center>
						<h1 class="p_title form-label"></h1>
					</center>
					<input type="hidden" id="m_w_id" name="m_w_id" class="m_w_id" value="">
                </div>
                <div class="modal-footer">
                    <button id="btn_cancel" type="button" class="btn btn-success" data-dismiss="modal"><i class="glyphicon glyphicon-check"></i> CANCEL</button>
                    <button type="submit" id="btn_delchild" name="btn_delchild" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete </button>
                </div>

            </div>
        </div>
    </form>
</div>

<!-- Delete Educ -->
<div class="modal fade" id="frm_del_vol_work" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="frm_vol_work_delete" name="frm_vol_work_delete" method="post" action="#">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Delete Voluntary Work Experience Information</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <center>
						<h1 class="p_title form-label"></h1>
					</center>
					<input type="hidden" id="m_vw_id" name="m_vw_id" class="m_vw_id" value="">
                </div>
                <div class="modal-footer">
                    <button id="btn_cancel" type="button" class="btn btn-success" data-dismiss="modal"><i class="glyphicon glyphicon-check"></i> CANCEL</button>
                    <button type="submit" id="btn_delchild" name="btn_delchild" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete </button>
                </div>

            </div>
        </div>
    </form>
</div>

<!-- Delete Educ -->
<div class="modal fade" id="frm_del_training" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="frm_training_delete" name="frm_training_delete" method="post" action="#">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Delete Training Information</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <center>
						<h1 class="p_title form-label"></h1>
					</center>
					<input type="hidden" id="m_t_id" name="m_t_id" class="m_t_id" value="">
                </div>
                <div class="modal-footer">
                    <button id="btn_cancel" type="button" class="btn btn-success" data-dismiss="modal"><i class="glyphicon glyphicon-check"></i> CANCEL</button>
                    <button type="submit" id="btn_delchild" name="btn_delchild" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete </button>
                </div>

            </div>
        </div>
    </form>
</div>

<!-- Delete Educ -->
<div class="modal fade" id="frm_del_skills" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="frm_skills_delete" name="frm_skills_delete" method="post" action="#">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Delete Skills Information</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <center>
						<h1 class="p_title form-label"></h1>
					</center>
					<input type="hidden" id="m_sh_id" name="m_sh_id" class="m_sh_id" value="">
                </div>
                <div class="modal-footer">
                    <button id="btn_cancel" type="button" class="btn btn-success" data-dismiss="modal"><i class="glyphicon glyphicon-check"></i> CANCEL</button>
                    <button type="submit" id="btn_delchild" name="btn_delchild" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</button>
                </div>

            </div>
        </div>
    </form>
</div>

<!-- Delete Educ -->
<div class="modal fade" id="frm_del_reff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="frm_reff_delete" name="frm_reff_delete" method="post" action="#">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background-color:rgba(58,82,120,0.9); color:#FFF; font-weight:bold;">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Delete Character Reference Information</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <center>
						<h1 class="p_title form-label"></h1>
					</center>
					<input type="hidden" id="m_r_id" name="m_r_id" class="m_r_id" value="">
                </div>
                <div class="modal-footer">
                    <button id="btn_cancel" type="button" class="btn btn-success" data-dismiss="modal"><i class="glyphicon glyphicon-check"></i> CANCEL</button>
                    <button type="submit" id="btn_delchild" name="btn_delchild" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete </button>
                </div>

            </div>
        </div>
    </form>
</div>
