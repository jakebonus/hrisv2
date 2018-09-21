<div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                    &nbsp;
                </h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><?php echo $title; ?> <small> &nbsp; </small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
				<form class="form-horizontal form-label-left" novalidate>
				<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_content">
                    <span class="section">Personal Information</span>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
							First Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" 
								class="form-control col-md-3 col-xs-12 " 
								name="name"
								placeholder=""
								required="required" 
								type="text">
                      </div>
                    </div>
					
					<div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
							Middle Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" 
								class="form-control col-md-3 col-xs-12" 
								name="name" 
								placeholder="" 
								required="required" 
								type="text">
                      </div>
                    </div>
					
					<div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
							Last Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" 
								class="form-control col-md-6 col-xs-12" 

								name="name" 
								placeholder="" 
								required="required" 
								type="text">
                      </div>
                    </div>
					
					<div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
							Suffix <span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" 
								class="form-control col-md-6 col-xs-12" 
								name="name" 
								placeholder="" 
								type="text">
                      </div>
                    </div>
					
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" 
						id="email" 
						name="email" 
						required="required"
						class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label 	class="control-label col-md-3 col-sm-3 col-xs-12" 
								for="Mobile number">
									Mobile <span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="tel" 
							id="telephone" 
							name="phone" 
							class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-3">
							Birth Date
							<span class="required"> *</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input 	type="text" 
								class="form-control col-md-7 col-xs-12" 
								data-inputmask="'mask': '99/99/9999'" 
								required="required">
								
                    <!--    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Cancel</button>
                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
				</div>
			</div>
			
				<div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_content">

                  
                    <span class="section">Employee Information</span>
					
					
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
							First Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" 
								class="form-control col-md-6 col-xs-12" 
								data-validate-length-range="6" 
								data-validate-words="2" 	
								name="name" 
								placeholder="" 
								required="required" 
								type="text">
                      </div>
                    </div>
					
					<div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
							Middle Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" 
								class="form-control col-md-6 col-xs-12" 
								data-validate-length-range="6" 
								data-validate-words="2"
								name="name" 
								placeholder="" 
								required="required" 
								type="text">
                      </div>
                    </div>
					
					<div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
							Last Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" 
								class="form-control col-md-6 col-xs-12" 
								data-validate-length-range="6" 
								data-validate-words="2" 
								name="name" 
								placeholder="" 
								required="required" 
								type="text">
                      </div>
                    </div>
					
					<div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
							Suffix <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" 
								class="form-control col-md-6 col-xs-12" 
								data-validate-length-range="6" 
								data-validate-words="2" 
								name="name" 
								placeholder="" 
								required="required" 
								type="text">
                      </div>
                    </div>
					
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" 
						id="email" 
						name="email" 
						required="required" 
						class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="tel" 
								id="telephone" name="phone" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Cancel</button>
                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
				</div>
			</div>
                </div>
				
				</form>
              </div>
            </div>
          </div>
        </div>

      </div>