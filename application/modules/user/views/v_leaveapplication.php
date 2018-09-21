<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-bars"></i> Employee <small> Filing of Leave</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php
						$frm = array( 'id' => 'frm_leaverequest', 'name' => 'frm_leaverequest');
						echo form_open('user',$frm); 
						?>
                            <?php if(isset($signatory)){
								foreach($signatory as $s){?>
                            <div class="row">

                                <div class="col-md-3">
                                    <label class="form-label">1.) Office / Agency:</label>
                                    <input readonly class="form-control" type="text" id="l_agency" name="l_agency" value="<?php echo $s->dept.'-'.$s->div; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Status</label>
                                    <input readonly class="form-control" type="text" id="l_status" name="l_status" value="<?php echo $this->session->userdata('a_status'); ?>">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">2.) Last Name:</label>
                                    <input readonly class="form-control" type="text" id="a_lastname" name="a_lastname" value="<?php echo $this->session->userdata('a_lastname').' '.$this->session->userdata('a_namext'); ?>">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">First Name:</label>
                                    <input readonly class="form-control" type="text" id="a_firstname" name="a_firstname" value="<?php echo $this->session->userdata('a_firstname'); ?>">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Middle:</label>
                                    <input readonly class="form-control" type="text" id="a_middlename" name="a_middlename" value="<?php echo $this->session->userdata('a_middlename'); ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">3.) Date of Filing:</label>
                                    <input readonly class="form-control date" type="text" id="l_datefiled" name="l_datefiled" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">4.) Position:</label>

                                    <input readonly class="form-control" type="text" id="l_position" name="l_position" value="<?php echo $s->a_position; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">5.) Salary</label>

                                    <input readonly class="form-control" type="text" id="l_sg" name="l_sg" value="<?php echo $s->sg; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">

                                    <label class="form-label">6 a.) Type of Leave:</label>
                                    <select class="form-control" id="l_typespecify" name="l_typespecify" required>
										<option value="" selected>-- Choose Here --</option>
										<!-- Vacation -->
										<option value="VL">Vacation Leave</option>
										<option value="FL">Forced Leave</option>
										<option value="SLP">Special Leave Privilege</option>
										<option value="SLP(ML)">SLP(Mourning Leave)</option>
										<option value="Study Leave">Study Leave</option>
										<?php if($this->session->userdata('pi_gender') == 'Male' || 
												$this->session->userdata('pi_gender') == 'M' || 
												$this->session->userdata('pi_gender') == 'MALE'){ ?>
										<option value="PL">Paternity Leave</option>
										<?php } ?>
										<option value="SPL">Solo Parent Leave</option>
										<option value="Monetization of Leave Credits">Monetization of Leave Credits</option>
										<!-- Sick -->
										<option value="SL">Sick Leave</option>
											<?php if($this->session->userdata('pi_gender') == 'Female' || 
												$this->session->userdata('pi_gender') == 'F' || 
												$this->session->userdata('pi_gender') == 'FEMALE'){ ?>
										<option value="ML">Maternity Leave</option>
											<?php } ?>
										<option value="RL">Rehabilitation Leave</option>
									</select>
                                </div>
                                <div class="col-md-3">
                                    <div class="">
                                        <label class="form-label"> Leave Kind</label>
                                        <input readonly type="text" class="form-control" id="l_type" name="l_type" required>
                                        <!--select readonly class="form-control" id="l_type" name="l_type" required>
					</select-->
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">6 b.) Where Leave be spent:</label>
                                    <select class="form-control" id="l_where" name="l_where" required>
						<option></option>
					</select>
                                    <!-- vacation 
				<div id="is_vacation">
					<input type="radio" value="0" id="l_where[]" name="l_where[]" class="is_phil"><label class="form-label"> Within the Philippines</label>
					<input type="radio" value="1" id="l_where[]" name="l_where[]"><label class="form-label"> Abroad (Specify)</label>
				</div>
				-->
                                    <!-- sick 
				<div id="is_sick">
					<input type="radio" value="0" id="l_where[]" name="l_where[]" class="is_out"><label class="form-label" > Out-Patient</label>
					<input type="radio" value="1" id="l_where[]" name="l_where[]"><label class="form-label"> In Hospital</label>
				</div>
				-->
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Location or Remarks:</label>
                                    <input type="text" id="l_remarks" name="l_remarks" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="form-label">6 c.) <small><small>Number of working day/s:</small></small></label>
                                    <input readonly class="form-control numeric" type="text" id="l_noofworkingdays" name="l_noofworkingdays" required >
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Inclusive Dates&nbsp;&nbsp;<small>(From)</small></label>
                                    <input placeholder="From" class="form-control date col-md-2" type="text" id="l_from" name="l_from" required >
                                    <!-- input placeholder="" class="form-control multidate" type="text" id="l_inclusivedates" name="l_inclusivedates" required -->
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">&nbsp;&nbsp;<small>(To)</small></label>
                                    <input placeholder="To" class="form-control date col-md-2" type="text" id="l_to" name="l_to" >
                                    <!-- input placeholder="" class="form-control multidate" type="text" id="l_inclusivedates" name="l_inclusivedates" required -->
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">6 d.) Commutation:</label>
                                    <select class="form-control" id="l_commutation" name="l_commutation" required>
									<option selected value="Requested">Requested</option>
									<option value="Not Requested" selected>Not Requested</option>
								</select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Type of Application:</label>
                                    <select class="form-control" id="l_typeofapplication" name="l_typeofapplication" required>
									<option selected value="For Approval">For Approval</option>
									<option value="For Disapproval">For Disapproval</option>
								</select>
                                </div>
                                <div class="col-md-6">
                                    <?php 
										$sig_jgp = 'pds_image/'.$this->session->userdata('a_id').'/'.$this->session->userdata('a_id').'_signature'.'.jpg';
										$sig_png = 'pds_image/'.$this->session->userdata('a_id').'/'.$this->session->userdata('a_id').'_signature'.'.png';
										if (file_exists($sig_jgp)) {
									?>
                                    <img src="<?php echo base_url($sig_jgp); ?>" style="width:510;height:105px;">
                                    <?php } elseif (file_exists($sig_png)) { ?>
                                    <img src="<?php echo base_url($sig_png); ?>" style="width:510;height:105px;">
                                    <?php } else { ?>
                                    <img src="<?php echo base_url('pds_image/DefaultSignature.jpg'); ?>" style="width:510;height:105px;">
                                    <?php } ?>
                                    <hr>
                                    <center><label> (Signature of Applicant) </label></center>
                                </div>
                                <div class="col-md-6">

                                    <label class="form-label">Reason for disapproval:</label>
                                    <textarea class="form-control" id="l_disapprovereason" name="l_disapprovereason"></textarea>

                                </div>
                            </div>



                            <!-- 	<div class="row">
						<div class="col-md-4">
					<?php //if(isset($o_head)){ 
							//if($o_head == $this->session->userdata('a_id') && $o_head != 0){?>
							<label class="form-label">Action</label>
							<select class="form-control" id="l_action" name="l_action"  required>
									<option value=""> -- Choose --</option>
									<option value="For Approval">For Approval</option>
									<option value="For Dispproval">For Dispproval</option>
							</select>
					<?php //}}?>
						</div>
					</div> -->

                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label pull-right">Immediate Supervisor:</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly class="form-control" type="text" id="l_divhead" name="l_divhead" value="<?php if($s->o_dessig == 0) { if($s->div_head_id != $this->session->userdata('a_id')){ echo $s->div_head; } }?>">
                                    <input readonly class="form-control" type="hidden" id="l_div_sig" name="l_div_sig" value="<?php if($s->o_dessig == 0) { if($s->div_head_id != $this->session->userdata('a_id')){ echo $s->div_head_id; } }?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label pull-right">Recommending Approval:</label>
                                </div>
                                <div class="col-md-3">
                                    <?php if($s->o_dessig == 0) {  
											$l_depthead = $s->dept_head; 
										}else{
											if($s->div_head_id != $this->session->userdata('a_id')){
												$l_depthead =  $s->div_head; 
											}else{
												$l_depthead = $s->dept_head;
											}
										}
								?>
                                    <input readonly class="form-control" type="text" id="l_depthead" name="l_depthead" value="<?php echo $l_depthead; ?>">
                                    <?php  if($s->o_dessig == 0) {
											$l_dept_sig = $s->dept_head_id;
										} else{
											if($s->div_head_id != $this->session->userdata('a_id')){
												$l_dept_sig = $s->div_head_id; 
											}else{
												$l_dept_sig = $s->dept_head_id;
											}
										} ?>
                                    <input readonly class="form-control" type="hidden" id="l_dept_sig" name="l_dept_sig" value="<?php echo $l_dept_sig; ?>">
                                    <input readonly class="form-control" type="hidden" id="l_asmayor" name="l_asmayor" value="<?php echo $s->l_asmayor; ?>">
                                </div>
                            </div>
                            <?php } }?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <hr>
                                    <div class="col-md-4 col-md-offset-4">
                                        <button id="btn_save" name="btn_save" class="btn btn-success form-control " type="submit"><i class="fa fa-save"></i> File My Leave</button>
                                    </div>
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
