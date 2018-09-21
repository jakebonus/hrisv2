<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        <div class="navbar nav_title" style="border: 0;">
            <a href="" class="site_title"><i class="fa fa-paw"></i> <span>CSFP HRIS <i class="version">v2.2</i></span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="<?php echo base_url('img/img.png'); ?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata('a_firstname'); ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />
        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-clipboard"></i> RECORDS <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('employee'); ?>">Employee</a></li>
                             <?php 
                                if(strtolower($this->session->userdata('a_profile')) == 'sys admin' || 
                                strtolower($this->session->userdata('a_profile')) == 'chrdo officer' || 
                                strtolower($this->session->userdata('a_profile')) == 'hrmo iv-records' || 
                                strtolower($this->session->userdata('a_profile')) == 'hrmo ii-records' ||
                                strtolower($this->session->userdata('a_profile')) == 'admin asst ii-svr' || 
                                strtolower($this->session->userdata('a_profile')) == 'admin asst ii-leave')
                                { 
                            ?> 
                                <li><a target="_blank" href="<?php echo base_url('employee/service_record'); ?>">Service Record</a></li>
                            <?php } ?>
                            <?php 
                                if(strtolower($this->session->userdata('a_profile')) == 'sys admin' || 
                                strtolower($this->session->userdata('a_profile')) == 'chrdo officer' || 
                                strtolower($this->session->userdata('a_profile')) == 'hrmo iv-records' || 
                                strtolower($this->session->userdata('a_profile')) == 'hrmo ii-records' ||
                                strtolower($this->session->userdata('a_profile')) == 'admin asst ii-leave')
                                { 
                            ?> 
                                <li><a target="_blank" href="<?php echo base_url('employee/step_increment'); ?>">Step Increment</a></li>
                                <li><a target="_blank" href="<?php echo base_url('salaryadjustment/adjustsalary'); ?>">Salary Adjustment</a></li>
    							<li>
                                   <a>Leave<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="">
                                       <li class="sub_menu">
                                            <a target="_blank" href="<?php echo base_url('employee/for_verification'); ?>">For Verification</a>
                                        </li>
                                        <li class="sub_menu">
                                            <a target="_blank" href="<?php echo base_url('reports/leave'); ?>">Approved Leave</a>
                                        </li>
                                        <li class="sub_menu">
                                            <a target="_blank" href="<?php echo base_url('reports/leave_masterlist'); ?>">Leave Status</a>
                                        </li>
                                      </ul>
                                </li>
                            <?php } ?>
                            <?php 
                                if(strtolower($this->session->userdata('a_profile')) == 'sys admin' || 
                                strtolower($this->session->userdata('a_profile')) == 'chrdo officer' || 
                                strtolower($this->session->userdata('a_profile')) == 'hrmo iv-records' || 
                                strtolower($this->session->userdata('a_profile')) == 'hrmo ii-records' ||
                                strtolower($this->session->userdata('a_profile')) == 'admin asst ii-svr' ||
                                strtolower($this->session->userdata('a_profile')) == 'admin asst ii-leave')
                                { 
                            ?>
							     <li><a target="_blank" href="<?php echo base_url('reports/requestrecord'); ?>">Documents Request</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
							
				<ul class="nav side-menu">
                    <li><a><i class="fa fa-briefcase"></i> Placement <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a target="_blank" href="<?php echo base_url('onlineapplicant/listofapplicants'); ?>">Talent Bank</a></li>
								<!--li>
                                   <a>Send email<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="">
                                       <li class="sub_menu">
                                            <a target="_blank" href="<?php // echo base_url('onlineapplicant/get_forexam'); ?>">For Exam & Interview</a>
                                        </li>
                                        <li class="sub_menu">
                                            <a target="_blank" href="<?php // echo base_url('onlineapplicant/get_forfiling'); ?>">For Filing</a>
                                        </li>
                                        <li class="sub_menu">
                                            <a target="_blank" href="<?php // echo base_url('onlineapplicant/get_forforward'); ?>">For Forward to CESD</a>
                                        </li>
										<!--li class="divider"></li>
										 <li class="sub_menu">
                                            <a target="_blank" href="<?php // echo base_url('onlineapplicant/get_forregret'); ?>">For Regret</a>
                                        </li>
                                     </ul>
                                </li-->
                            <li><a target="_blank" href="<?php echo base_url('onlineapplicant/vacancies'); ?>">Vacancies</a></li>
                            <li><a target="_blank" href="<?php echo base_url('onlineapplicant/job_matching'); ?>">Job Matching</a></li>
                            
                        </ul>
                    </li>
                </ul>
				
				<!--
				 <ul class="nav side-menu">
                    <li><a><i class="fa fa-gift"></i> Welfare <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a  target="_blank" href="<?php echo base_url('') ?>">Benefits</a></li>
                            <li><a  target="_blank" href="<?php echo base_url('') ?>">Incentives</a></li>
                        </ul>
                    </li>
                </ul>
				-->
				<!--
				<ul class="nav side-menu">
                    <li><a><i class="fa fa-plane"></i> Employee Leave <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        </ul>
                    </li>
                </ul>
				-->
				<ul class="nav side-menu">
				<?php 
                    if(strtolower($this->session->userdata('a_profile')) == 'sys admin' || 
                    strtolower($this->session->userdata('a_profile')) == 'chrdo officer' || 
                    strtolower($this->session->userdata('a_profile')) == 'hrmo iv-records' || 
                    strtolower($this->session->userdata('a_profile')) == 'hrmo ii-records' ||
                    strtolower($this->session->userdata('a_profile')) == 'admin asst ii-pds' ||
                    strtolower($this->session->userdata('a_profile')) == 'admin asst ii-leave')
                    { 
                ?>
                    <li><a><i class="fa fa-pencil"></i> For Approval <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
							
                            <?php if(strtolower($this->session->userdata('a_profile')) == 'sys admin' || strtolower($this->session->userdata('a_profile')) == 'chrdo officer'){ ?>
                            <li>
								<a target="_blank" href="<?php echo base_url('employee/leave_for_approval'); ?>">Pending Leave 
									<span class="badge bg-blue leave">0</span>
								</a>
							</li>
                            <?php } ?>
							
                           <!-- <li><a target="_blank" href="<?php echo base_url('employee/leave_for_approval'); ?>">Leave <span class="badge bg-blue leave">0</span></a></li> -->
						   <li>
                               <a>Employee 201<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="">
                                      <li><a target="_blank" href="<?php echo base_url('employee/get_forapproval_reff'); ?>">Character Reference <span class="badge bg-blue reff"></span></a></li>
										<li><a target="_blank" href="<?php echo base_url('employee/get_forapproval_children'); ?>">Children <span class="badge bg-blue children">10</span></a></li>
										<li><a target="_blank" href="<?php echo base_url('employee/get_forapproval_education'); ?>">Education <span class="badge bg-blue education">20</span></a></li>
										<li><a target="_blank" href="<?php echo base_url('employee/get_forapproval_eligibility'); ?>">Eligibility <span class="badge bg-blue eligibility">30</span></a></li>
										<li><a target="_blank" href="<?php echo base_url('employee/get_forapproval_workexp'); ?>">Work Experience <span class="badge bg-blue workexp">40</span></a></li>
										<li><a target="_blank" href="<?php echo base_url('employee/get_forapproval_volworkexp'); ?>">Voluntary Work <span class="badge bg-blue volworkexp">50</span></a></li>
										<li><a target="_blank" href="<?php echo base_url('employee/get_forapproval_training'); ?>">Training <span class="badge bg-blue training">60</span></a></li>
										<li><a target="_blank" href="<?php echo base_url('employee/get_forapproval_skills'); ?>">Skills And Hobbies <span class="badge bg-blue skills">70</span></a></li>
                                  </ul>
                            </li>
							<li><a target="_blank" href="<?php echo base_url('onlineapplicant/appointments'); ?>">Talent Bank</a></li>
                        </ul>
                    </li>
				<?php }?>
                </ul>
				
                <?php 
                    if(strtolower($this->session->userdata('a_profile')) == 'sys admin' || 
                    strtolower($this->session->userdata('a_profile')) == 'chrdo officer' || 
                    strtolower($this->session->userdata('a_profile')) == 'hrmo iv-records' || 
                    strtolower($this->session->userdata('a_profile')) == 'hrmo ii-records')
                    { 
                ?>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-print"></i> Reports <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                           
                            <li><a target="_blank" href="<?php echo base_url('reports'); ?>">Employee List</a></li>
                            <li><a href="<?php echo base_url('employee/export'); ?>" target="_blank">Employee Masterlist</a></li>
                            <li><a href="<?php echo base_url('reports/salarygrade'); ?>" target="_blank">Salary Schedule</a></li>
                        </ul>
                    </li>
                </ul>
	
				
                <?php } ?>
                
                <?php 
                    if(strtolower($this->session->userdata('a_profile')) == 'sys admin' || 
                    strtolower($this->session->userdata('a_profile')) == 'chrdo officer' || 
                    strtolower($this->session->userdata('a_profile')) == 'hrmo iv-records')
                    { 
                ?>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-wrench"></i> Maintenance <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a  target="_blank" href="<?php echo base_url('employee/change_password') ?>">Change Password</a></li>
                            <li><a  target="_blank" href="<?php echo base_url('office') ?>">Office</a></li>
                            <li><a  target="_blank" href="<?php echo base_url('salarygrade') ?>">Salary Grade</a></li>
                        </ul>
                    </li>
                </ul>
                <?php } ?>
            </div>


        </div>
        <div class="sidebar-footer hidden-small">
            <a href="<?php echo base_url('employee/logout'); ?>" data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
    </div>
</div>
