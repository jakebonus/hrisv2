<div class="row">
<div class="col-md-4 col-md-offset-4 col-xs-12 col-sm-6 col-sm-offset-3">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>
    <div id="wrapper ">
      <div id="login" class="animate form ">
        <section class="login_content ">
		 <div class="x_panel ">
			<div class="x_title">
			
            <?php
			$frm = array( 'id' => 'frm_userlogin', 'name' => 'frm_userlogin');
			echo form_open('user',$frm); 
			?>
		
            <h1>CSFP - HRIS <small><strong><small>Employee<small></strong></small></h1>

			<?php
				if(isset($error)) {	
					if($error === 1) { ?>
	
			<?php	} } ?> 
            <div>
				<?php
				$username = array(
									'class' => 'form-control',
									'type' => 'text',
									'name' => 'username',
									'id' => 'username',
									'placeholder'=> 'Biometrics ID',
								//	'pattern' => '.{4,}',
								//	'title' => 'Minimum of 4 characters...',
									'autofocus' => 'autofocus',
									'required' => 'required',
									'maxlength' => '80',
									'value' => set_value('username')
							);
						echo form_input($username);
						echo form_error('username');
				?>
            </div>
            <div>
				<?php
				$password = array(
									'class' => 'form-control',
									'type' => 'password',
									'name' => 'password',
									'id' => 'password',
									'placeholder'=> 'Password',
								//	'pattern' => '.{4,}',
								//	'title' => 'Minimum of 4 characters...',
								//	'autofocus' => 'autofocus',
									'required' => 'required',
								//	'maxlength' => '80',
									'value' => set_value('username')
							);
						echo form_input($password);
						echo form_error('password');
				?>
            </div>
            <div>
              <button class="btn btn-success form-control" type="submit">Log in</button>
            </div>

          </form>
		  
		  <!--button class="btn btn-default source" onclick="new PNotify({
                                title: 'Sticky Success',
                                text: 'Sticky success... I\'m not even gonna make a joke.',
                                type: 'success',
                                hide: false
                            });">Success</button-->
		  </div>
		  </div>
		  </div>
        </section>
      </div>
		</div>
		</div>
