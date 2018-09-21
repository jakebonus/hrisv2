<!-- page content -->
<div class="right_col holiday-page" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-2 col-sm-6 col-xs-6">
				<button id="pds_page1" onclick="printContent('leave_summary')" type="button" class="btn btn-primary form-control"><i class="glyphicon glyphicon-print"></i> Print</button>
			</div>
            <div id="leave_summary" name="leave_summary">
               <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-s6z2{text-align:center}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-by3v{font-weight:bold;font-size:14px;text-align:center}
.tg .tg-yw4l{vertical-align:top}
</style>
<table class="tg" style="undefined;table-layout: fixed; width: 1000px">
<colgroup>
<col style="width: 105px">
<col style="width: 48px">
<col style="width: 58px">
<col style="width: 301px">
<col style="width: 82px">
<col style="width: 246px">
<col style="width: 54px">
<col style="width: 106px">
</colgroup>
  <tr>
    <th class="tg-by3v" colspan="8">PROCESSING OF ONLINE LEAVE APPLICATION SUMMARY</th>
  </tr>
  <tr>
    <td class="tg-by3v" colspan="2">Receiving</td>
    <td class="tg-by3v" colspan="6">Releasing</td>
  </tr>
  <tr>
    <td class="tg-s6z2" rowspan="2">Date of<br>Application</td>
    <td class="tg-s6z2">Time </td>
    <td class="tg-s6z2" rowspan="2">Load<br> No.</td>
    <td class="tg-s6z2" rowspan="2">Name Of Applicant</td>
    <td class="tg-s6z2" rowspan="2">Leave<br> Applied<br>for</td>
    <td class="tg-s6z2" rowspan="2">Inclusive Dates</td>
    <td class="tg-yw4l">No. of</td>
    <td class="tg-baqh" rowspan="2"><br>Date Served/<br>Ended</td>
  </tr>
  <tr>
    <td class="tg-s6z2">In</td>
    <td class="tg-yw4l">Days</td>
  </tr>

  
  <?php if($result != 0){
		$count = 0;
		foreach($result as $r){
	?><tr>
		<td class="tg-031e"><?php echo $r->l_asmayor_action_date; ?></td>
		<td class="tg-s6z2">-</td>
		<td class="tg-031e"><?php $count = $count + 1; echo $count; ?></td>
		<td class="tg-031e"><?php echo $r->a_lastname.', '.$r->a_firstname.' '.$r->a_middlename; ?></td>
		<td class="tg-031e"><?php echo $r->l_typespecify; ?></td>
		<td class="tg-031e"><?php echo $r->l_inclusivedates; ?></td>
		<td class="tg-yw4l"><?php echo $r->l_noofworkingdays; ?></td>
		<td class="tg-yw4l"><?php echo $r->l_printeddate; ?></td>
	  </tr>
	<?php	  
	  }
  } ?>
   

</table>
</table>
<div class="row">
<br/>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-6 col-sm-6 col-xs-6">
			<label class="form-label">Prepared by:</label><br/>
			<label class="form-label<br/>"><?php echo $this->session->userdata('a_lastname').', '.$this->session->userdata('a_firstname').' '.$this->session->userdata('a_mi'); ?></label>
			<br/>
			<label class="form-label<br/>"><?php echo $this->session->userdata('a_position');?></label>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-6">
		</div>
	</div>
	</div>
<div class="row">
<br/>
<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-6 col-sm-6 col-xs-6">
			<label class="form-label">Reviewed by:</label><br/><br/><br/>
			<label class="form-label<br/>">Hazel S. Mallari</label><br/>
			<label class="form-label<br/>">HRMO V</label>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-6">
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
