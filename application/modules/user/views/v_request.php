<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-bars"></i> Employee <small> Request Document</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
					<?php
						$frm = array( 'id' => 'frm_saverequest', 'name' => 'frm_saverequest');
						echo form_open('user',$frm);
						?>
						<div class="row">
							<div class="col-sm-3">
								<label class="form-label">Request for:</label>
								<select class="form-control" id="r_type" name="r_type">
									<option > -- Choose --</option>
									<option value="Employment Certificate" >Employment Certificate</option>
									<option value="Employment Certificate - Income & Benefits" >Employment Certificate - Income & Benefits</option>
									<option value="Service Record" >Service Record</option>
								</select>
							</div>
							<div class="col-sm-1">
								<label class="form-label">Copies:</label>
								<input   type="text" maxlength="1" class="numeric form-control" id="r_noofcopy" name="r_noofcopy" >
							</div>
							<div class="col-sm-4">
								<label class="form-label">Purpose:</label>
								<input   type="text" class="form-control" id="r_purpose" name="r_purpose" >
							</div>
							<div class="col-sm-2">
								<label class="form-label">Request Date:</label>
								<input readonly  type="text" class="form-control" id="r_datefiled" name="r_datefiled" value="<?php echo date('Y-m-d'); ?>">
							</div>
							<div class="col-sm-2">
								<label class="form-label">Request Time:</label>
								<input readonly type="text" class="form-control" id="r_datefiled" name="r_datefiled" value="<?php echo date('h:s:i'); ?>">
							</div>
						</div>
							<div class="row ">
							<div class="col-sm-12">
								<hr>
								<div class="col-md-4 col-md-offset-4">
									<button id="btn_save" name="btn_save" class="btn btn-success form-control " type="submit"><i class="fa fa-save"></i> Save Request</button>
								</div>
							</div>
							</div>
						</form>
						<div class="row">
						<div class="col-sm-12">
						<hr>
						</div>
						</div>
						<table id="req" name="req" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
							<thead>
								<tr>
									<td>Request Type</td>
									<td>Request Date</td>
									<td>Copies</td>
									<td>Purpose</td>
									<td>Remarks</td>

								</tr>
							</thead>
							<tbody>

							</tbody>
							</table>
                   </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
