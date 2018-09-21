<div class="row">
<div class="col-md-4 col-md-offset-4 col-xs-12 col-sm-6 col-sm-offset-3">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>
    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
		 <div class="x_panel">
			<div class="x_title">
			
            <?php
				$frm = array( 'id' => 'frm_login', 'name' => 'frm_login');
					echo form_open('login',$frm); 
				?>
			
            <h1>CSFP - HRIS</h1>

			<?php
				 if(isset($error)) {	
					 if($error === 1) { ?>
					<div class="alert alert-danger alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
						<strong>Invalid</strong> Username or Password.
					</div>
			<?php	 } } ?> 
            <div>
				<?php
				$username = array(
									'class' => 'form-control',
									'type' => 'text',
									'name' => 'username',
									'id' => 'username',
									'placeholder'=> 'Username',
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
									'required' => 'required',
									'value' => set_value('username')
							);
						echo form_input($password);
						echo form_error('password');
				?>
            </div>
            <div>
			<hr>
			<!-- <h1>System under maintenance...</h1> -->
              <button class="btn btn-primary form-control" type="submit">Log in</button>
            </div>

          </form>
		  </div>
		  </div>
		  </div>
        </section>
      </div>
		</div>
		</div>
