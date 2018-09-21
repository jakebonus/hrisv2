                      <?php
					if(is_array($result)){
					foreach($result as $r){
					$a_id = $r->a_id;
					$a_firstname = $r->a_firstname;
					$a_middlename = $r->a_middlename;
					$a_mi = $r->a_mi;
					$a_lastname = $r->a_lastname;
					$a_namext = $r->a_namext;
					$pi_resstreet = $r->pi_resstreet;
					$pi_resbrgy = $r->pi_resbrgy;
					$pi_rescity = $r->pi_rescity;
					$pi_resprov = $r->pi_resprov;
					$pi_resphone = $r->pi_resphone;

					$pi_permstreet = $r->pi_permstreet;
					$pi_permbrgy = $r->pi_permbrgy;
					$pi_permcity = $r->pi_permcity;
					$pi_permprov = $r->pi_permprov;
					$pi_permphone = $r->pi_permphone;
					$a_position = $r->a_position;

					$pi_status = $r->pi_status;
					$a_status = $r->a_status;

					$sg = $r->p_salarygrade.'/'.$r->p_salarystep;
					$a_office = $r->a_office;
					$pi_email = $r->pi_email;
					$pi_birthdate = $r->pi_birthdate;

					$pi_gender = $r->pi_gender;
					}}



	if(is_array($familly)){
		foreach($familly as $f){
			$fb_spousefname =	$f->fb_spousefname;
			$fb_spousemname =	$f->fb_spousemname;
			$fb_spousemi =	$f->fb_spousemi;
			$fb_spouselname =	$f->fb_spouselname;
			$fb_spouseextname =	$f->fb_spouseextname;
			$fb_spousework =	$f->fb_spousework;
			$fb_spouseemployer =	$f->fb_spouseemployer;
			$fb_spouseemployeraddress =	$f->fb_spouseemployeraddress;
			$fb_spouseemployerphone =	$f->fb_spouseemployerphone;


			$fb_fatherfname =	$f->fb_fatherfname;
			$fb_fathermi =	$f->fb_fathermi;
			$fb_fatherlname =	$f->fb_fatherlname;
			$fb_fatherext =	$f->fb_fatherext;

			$fb_motherfname =	$f->fb_motherfname;
			$fb_mothermi =	$f->fb_mothermi;
			$fb_motherlname =	$f->fb_motherlname;
			$fb_motherext =	$f->fb_motherext;
		}
	}
?>



<!-- page content -->
        <div class="right_col" role="main">
          <div class="">


            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Profile </h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
						    <?php
								$file = 'pds_image/'.$a_id.'/'.$a_id.'.png';
								if (file_exists($file)) {
							?>
								<img class="img-responsive avatar-view" src="<?php echo base_url($file);?>" alt="Avatar" title="Change the avatar">
							<?php
								}else{
							?>
								<img class="img-responsive avatar-view" src="<?php echo base_url('pds_image/default-pictures.jpg');?>" alt="Avatar" title="Change the avatar">

							<?php	}
							?>
                        </div>
						<?php
							$sig_jgp = 'pds_image/'.$a_id.'/'.$a_id.'_signature'.'.jpg';
							$sig_png = 'pds_image/'.$a_id.'/'.$a_id.'_signature'.'.png';
							if (file_exists($sig_jgp)) {
						?>
							<img  class="img-responsive avatar-view" src="<?php echo base_url($sig_jgp); ?>" style="width:246px;height:50px;">
						<?php
							} elseif (file_exists($sig_png)) {
						?>
							<img  class="img-responsive avatar-view" src="<?php echo base_url($sig_png); ?>" style="width:246px;height:50px;">
						<?php }else{ ?>
							<img src="<?php echo base_url('pds_image/DefaultSignature.jpg'); ?>" style="width:246px;height:50px;">
						<?php }?>
                      </div>
                      <h4><center><?php echo $a_firstname.' '.$a_mi.' '.$a_lastname.' '.$a_namext; ?></center></h4>
<hr>
                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i><small> <?php echo $pi_resstreet.' '.$pi_resbrgy.' '.$pi_rescity.', '.$pi_resprov; ?></small>
						</li>
						<li>
                          <i class="fa fa-phone user-profile-icon"></i><small> <?php echo $pi_resphone;?></small> &nbsp; &nbsp; &nbsp;

                        </li>

						<li>
							<i class="fa fa-heart user-profile-icon"></i><small> <?php echo $pi_status;?></small>
                        </li>
						<li>
							<i class="fa fa-envelope user-profile-icon"></i><small> <?php echo $pi_email;?></small>
						</li>
						<li>
						 <?php
							$newDate = date("F d Y", strtotime($pi_birthdate));
						 ?>
                          <i class="fa fa-calendar user-profile-icon"></i><small> <?php echo $newDate;?></small>
                        </li>
                          <hr>
						 <li>
                          <i class="fa fa-bank user-profile-icon"></i><small> <?php echo $a_office;?></small>
                        </li>
						 <li>
                          <i class="fa fa-briefcase user-profile-icon"></i><small> <?php echo $a_position;?></small>
                        </li>
						   <li>
                          <i class="fa fa-certificate user-profile-icon"></i><small> <?php echo $sg.' - '.$a_status;?></small>
                        </li>

                      </ul>

                      <br />

					  <hr>
                      <h4>FAMILY INFORMATION</h4>
                      <ul class="list-unstyled user_data">
                        <li>
							<?php if(strtolower($pi_gender) == 'male') {
										$class = 'fa fa-female';
								}else{
									$class = 'fa fa-male';
								}
							?>
                          <p> <i class="fa fa-angle-right"></i> Spouse</p>
                         <i class="<?php echo $class; ?>"></i><small> <?php echo $fb_spousefname.' '.$fb_spousemi.' '.$fb_spouselname.' '.$fb_spouseextname; ?></small>
                        </li>
						<li>
                         <i class="fa fa-briefcase"></i><small> <?php echo $fb_spousework; ?></small>
                        </li>
						<li>
                         <i class="fa fa-bank"></i><small> <?php echo $fb_spouseemployer; ?></small>
                        </li>
						<li>
                         <i class="fa fa-map-marker"></i><small> <?php echo $fb_spouseemployeraddress; ?></small>
                        </li>
						<li>
                         <i class="fa fa-phone"></i><small> <?php echo $fb_spouseemployerphone; ?></small>
                        </li>
						<br/>

						<li>
							<p> <i class="fa fa-angle-right"></i> Father</p>
							<i class="fa fa-male"></i> <small><?php echo $fb_fatherfname.' '.$fb_fathermi.' '.$fb_fatherlname.' '.$fb_fatherext; ?></small>

						</li>
						<li>
							<p> <i class="fa fa-angle-right"></i> Mother</p>
							<i class="fa fa-female"></i> <small><?php echo $fb_motherfname.' '.$fb_mothermi.' '.$fb_motherlname.' '.$fb_motherext; ?></small>
						</li>
					  </ul>
                      <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#education" id="education-tab" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-graduation-cap"></i></a>
                          </li>
                          <li role="presentation" class=""><a href="#workinfo" role="tab" id="work-tab" data-toggle="tab" aria-expanded="false">Work</a>
                          </li>
                          <li role="presentation" class=""><a href="#eligibility" role="tab" id="eligibility_tab" data-toggle="tab" aria-expanded="false">Eligibility</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="education" aria-labelledby="education-tab">

                            <!-- start recent activity -->
              <ul class="list-unstyled timeline">
                <?php
                  if(is_array($education)){
                  foreach($education as $e){
                ?>

                    <li>
                      <div class="block">
                        <div class="tags">
                          <a href="" class="tag">
                            <span id="yrgrad"><?php echo $e->pi_yrgrad; ?></span>
                          </a>
                        </div>
                        <div class="block_content">
                          <h2 class="title">
                            <a id="school"><?php echo $e->pi_degree.' : '.$e->pi_schoolname; ?></a>
                          </h2>
                          <div class="byline">
                            <span>at</span> <a><?php echo $e->pi_from.' : '.$e->pi_to; ?></a>
                          </div>
                        </div>
                      </div>
                    </li>
                    <?php
                        }
                        }
                      ?>
                  </ul>
                <!-- end recent activity -->
                  </div>

                  <div role="tabpanel" class="tab-pane fade" id="workinfo" aria-labelledby="work-tab">
                      <!-- start user projects -->
                            <!-- <table class="data table table-striped no-margin" id="dt_workinfo" name="dt_workinfo"> -->
                            <table class="cell-border compact hover dt-employee-sv" id="dt_workinfo" name="dt_workinfo">
                              <thead>
                                <tr>
                                  <th>INCLUSIVE DATES</th>
                                  <th>POSITION</th>
                                  <th>TYPE</th>
                                  <th>AGENCY</th>
                                  <th>SALARY</th>
                                  <th>SG</th>
                                  <th>STATUS</th>
                                  <th>GOV'T SERVICE</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                            </table>
                            <!-- end user projects -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="eligibility" aria-labelledby="education_tab">
                            <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                              photo booth letterpress, commodo enim craft beer mlkshk </p>
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
        <!-- /page content -->
