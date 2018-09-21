<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
             <a href="<?php echo base_url(); ?>" class="site_title"><i class="fa fa-users"></i> <span>CSFP HRIS <sup>v<?php echo VERSION;?></sup></span></a>
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
			     <?php 
				 // image directory
					$file = 'pds_image/'.$this->session->userdata('a_id').'/'.$this->session->userdata('a_id').'.png';
					if (file_exists($file)) { ?>
						<img src="<?php echo base_url($file); ?>" alt="..." class="img-circle profile_img">
					<?php  }else{?>
					
						<img src="<?php echo base_url('img/img.png'); ?>" alt="..." class="img-circle profile_img">
					<?php } ?>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata('a_firstname'); ?> <br/> <small><?php // echo $this->session->userdata('a_status');?></small></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>&nbsp;</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Profile <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('user/account'); ?>">Personal Information</a></li>
             <li><a target="_blank" href="<?php echo base_url('reports/personal_data_sheet'); ?>">Personal Data Sheet</a></li>
					   <li><a href="<?php echo base_url('user/change_password'); ?>">Change Password</a></li>
                    </ul>
                  </li>
				  
				  <li><a><i class="fa fa-file"></i> HR Transaction <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('user/request_document'); ?>">Document Request</a></li>
					  <?php if(strtolower($this->session->userdata('a_status')) != "project based") { ?>
						<li>
                        <a>Leave<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" style="">
                                <li class="sub_menu">
                                    <a target="_blank" href="<?php echo base_url('user/file_leave'); ?>">Leave Application</a>
                                </li>
                                <li class="sub_menu">
                                  <a target="_blank" href="<?php echo base_url('user/leave_filed'); ?>">Leave Status</a>
                                </li>
                             </ul>
                      </li>
					  
					  
                      <!--li><a href="<?php // echo base_url('user/file_leave'); ?>">Leave Application</a></li>
					  <li><a href="<?php // echo base_url('user/leave_filed'); ?>">Leave Status</a></li-->
					  <?php if($this->session->userdata('is_depthead') == 'yes') {?>
					  
					  <li>
                        <a>Personnel Request<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" style="">
                                <li class="sub_menu">
                                    <a target="_blank" href="<?php echo base_url('user/personnelrequest'); ?>">File Personnel Request</a>
                                </li>
                                <li class="sub_menu">
                                    <a target="_blank" href="<?php echo base_url('user/listofpersonnelrequest'); ?>">List of Personnel Request</a>
                                </li>
                             </ul>
                      </li>
					  
						<?php } ?>
					  <?php } ?>
					  <!--li><a href="<?php echo base_url('user/get_approved_req'); ?>">Approved Transactions</a></li-->
                    </ul>
                  </li>
				  
				   
				  
				 
				  <li>
				  
				  
				  
				  
                        <a><i class="fa fa-plane"></i> Leave Approval<span class="fa fa-chevron-down"></span></a>
							<ul class="nav child_menu" style="">
							
								<li class="">
                                   <a>Own<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none;">
										<li class="sub_menu"><a href="<?php echo base_url('user/own_leave_for_approval'); ?>">Pending</a></li>
										<li class="sub_menu"><a href="<?php echo base_url('user/own_get_actioned_leave'); ?>">Processed</a></li>
                                    </ul>
                                </li>
								
								<?php if($this->session->userdata('isalternate') == 'yes'){ ?>
								<li class="">
                                   <a>For <?php echo $this->session->userdata('solutation').' '.$this->session->userdata('o_head_name');?><span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none;">
										<li class="sub_menu"><a href="<?php echo base_url('user/for_leave_for_approval'); ?>">Pending</a></li>
										<li class="sub_menu"><a href="<?php echo base_url('user/for_get_actioned_leave'); ?>">Processed</a></li>
                                    </ul>
                                </li>
								<?php } ?>
								<!--
									<li class="sub_menu"><a href="<?php echo base_url('user/leave_for_approval'); ?>">Pending</a></li>
									<li class="sub_menu"><a href="<?php echo base_url('user/get_actioned_leave'); ?>">Processed</a></li>
								-->
							</ul>
						
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
            
			<!--  <a href="<?php echo base_url('employee/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a> -->
              <a href="<?php echo base_url('user/logout'); ?>" data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
