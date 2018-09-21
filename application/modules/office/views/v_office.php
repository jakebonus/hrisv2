  <!-- page content -->
        <div class="right_col m-page" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Office</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <?php if($results != 0){ ?>
                      <table id="datatable-buttons" class="cell-border compact hover nowrap moffice" style="width:100%">
                        <thead>
                          <tr>
                            <th>Department</th>
                            <th>Division</th>
                          </tr>
                        </thead>
                        <tbody class="hide">
                          <?php foreach($results as $r) { ?>
                          <tr>
                            <td href="" class="edit-modal" title="Edit"
                                  data-o_id="<?php echo $r->o_id; ?>"
                                  data-o_name="<?php echo $r->o_name; ?>"
                                  data-o_code="<?php echo $r->o_code; ?>"
                                  data-o_mother="<?php echo $r->o_mother; ?>"
                                  data-o_type="<?php echo $r->o_type; ?>"
                                  data-o_isactive="<?php echo $r->o_isactive; ?>"
                                  data-o_head="<?php echo $r->o_head; ?>"
                                  data-o_alternate="<?php echo $r->o_alternate; ?>"
                                  data-o_alternate_name="<?php echo $r->o_alternate_name; ?>"
                                  data-name="<?php echo $r->name; ?>"
                                  data-o_dessig="<?php echo $r->o_dessig; ?>"
                                  data-toggle="modal">
                                  <a><?php echo $r->odivision; ?>
                                </a>
                            </td>
                             <td><?php echo $r->o_code; ?></td>
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                      <?php } else { ?>
                            <a class="btn btn-default buttons-html5 btn-sm btn-primary" tabindex="0" aria-controls="datatable-buttons" data-toggle="modal" data-target=".modal-add"><span>Add</span></a>
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                          <strong>No Record Found!</strong>
                        </div>
                      <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 class="edit-title">Add Office</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="dt-buttons btn-group btn-maintenance">
                        <a class="add-dep-btn btn btn-default buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons"><span>New Department</span></a>
                        <a class="add-div-btn btn btn-default buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons"><span>New Division</span></a>
                        <a class="edit-btn btn btn-default buttons-copy buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons"><span>Edit</span></a>
                        <!-- <a class="del-btn btn btn-default buttons-excel buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons"><span>Delete</span></a>  -->
                        
                    </div>

                    <div class="x_content">
                        <div class="edit-section">
                          <?php
                              $frm_add = array(
                                'id' => 'frm_update_office',
                                'name' => 'frm_update_office',
                                'class' => 'edit form-horizontal form-label-left input_mask'
                              );
                              echo form_open('office/ajax_update_office',$frm_add);
                            ?>
                                    <input type="hidden" name="o_id" id="o_id" />
                                    
                                    <div class="form-group d_division">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Department <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control col-md-7 col-xs-12" id="o_department" name="o_mother">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12 lbl-office" for="first-name">Office <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="o_name" name="o_name" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Code <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="o_code" name="o_code" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Office Type <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="o_type" name="o_type" required="required" class="form-control col-md-7 col-xs-12" value="Department" readonly="readonly">
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    
                                    <div class="form-group row-centered">
                                      <div class="col-md-6 col-sm-6 col-xs-12 col-centered">
                                      <label class="form-label"><small>Department:</small></label>
                                      <select class="form-control" id="a_office"></select>
        
                                     </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Designated Signatory: <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <div class="row">
                                           <div class="col-xs-10">
                                              <select class="form-control" id="employee" name="o_head">
                                                <option></option>
                                              </select>
                                            </div>
                                            <div class="col-xs-2 d_division">
                                            <input type="checkbox" value="0" id="o_dessig" name="o_dessig">
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>

                                    <div class="form-group row-centered">
                                      <div class="col-md-6 col-sm-6 col-xs-12 col-centered">
                                      <label class="form-label"><small>Department:</small></label>
                                      <select class="form-control" id="a_office_a"></select>
        
                                     </div>
                                    </div>
 
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alternate: <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <select class="form-control" id="o_alternate" name="o_alternate">
                                              <option></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-success">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                        <div class="add-section">
                            <?php
                              $frm_add = array(
                                'id' => 'frm_save_office',
                                'name' => 'frm_save_office',
                                'class' => 'add form-horizontal form-label-left input_mask'
                              );
                              echo form_open('office/ajax_save_office',$frm_add);
                            ?>
                                
                                    <div class="form-group d_division">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Department <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control col-md-7 col-xs-12" id="o_department" name="o_mother">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12 lbl-office" for="first-name">Office <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="o_name" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Code <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="o_code" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Office Type <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="o_type" required="required" class="form-control col-md-7 col-xs-12" maxlength="50" value="Department" readonly="readonly">
                                        </div>
                                    </div>
                                    
                                    <div class="ln_solid"></div>

                                    <div class="form-group row-centered">
                                      <div class="col-md-6 col-sm-6 col-xs-12 col-centered">
                                      <label class="form-label"><small>Department:</small></label>
                                      <select class="form-control" id="a_office"></select>
        
                                     </div>
                                    </div>
 
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Designated Signatory: <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <div class="row">
                                           <div class="col-xs-10">
                                              <select class="form-control" id="employee" name="o_head">
                                                <option></option>
                                              </select>
                                            </div>
                                            <div class="col-xs-2 d_division">
                                            <input type="checkbox" value="0" id="o_dessig" name="o_dessig">
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>

                                    <div class="form-group row-centered">
                                      <div class="col-md-6 col-sm-6 col-xs-12 col-centered">
                                      <label class="form-label"><small>Department:</small></label>
                                      <select class="form-control" id="a_office_a"></select>
        
                                     </div>
                                    </div>
 
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alternate: <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <select class="form-control" id="o_alternate" name="o_alternate">
                                              <option></option>
                                            </select>
                                        </div>
                                    </div>

          
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-success">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
              </div>
            </div>

            </div>
          </div>
        </div>
        <!-- /page content -->
        
    <!-- Delete -->
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                </div>
                <div class="modal-body">
                    <p>Do you want to proceed?</p>
                    <!--p class="debug-url"></p-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>
