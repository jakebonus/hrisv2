<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-bars"></i> Employee <small>Change Password</small></h2>
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
			<?php
			$frm = array( 'id' => 'frm_userchangepassword', 'name' => 'frm_userchangepassword');
			echo form_open('user',$frm); 
			?>
								<?php
									if(isset($error)) {	
										if($error === 1) { ?>
								<?php	} } ?> 
							<div class="col-md-4">
								<?php
									$password = array(
										'class' => 'form-control',
										'type' => 'password',
										'name' => 'password',
										'id' => 'password',
										'placeholder'=> 'Password',
										'autofocus' => 'autofocus',
										'required' => 'required',
										'value' => set_value('password')
									);
									echo form_input($password);
									echo form_error('password');
								?>
							</div>

							<div class="col-md-4">
								<?php
									$password2 = array(
										'class' => 'form-control',
										'type' => 'password',
										'name' => 'password2',
										'id' => 'password2',
										'placeholder'=> 'Repeat Password',
										'required' => 'required',
										'value' => set_value('password2')
									);
									echo form_input($password2);
									echo form_error('password2');
								?>
							</div>
							<div id="btn">
								<div class="col-md-3 col-md-offset-1">
									<button id="btn_update" name="btn_update" class="btn btn-success form-control " type="submit">Update Password</button>
								</div>
							</div>
						</form>
                   </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

