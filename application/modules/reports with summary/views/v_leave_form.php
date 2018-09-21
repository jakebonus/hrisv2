<!-- page content -->
<div class="right_col holiday-page" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                         <div class="row t_section">
                            <div class="col-sm-2">
                                <button id="onload_click" onclick="printContent('print_reportlist')" type="button" class="btn btn-primary form-control"><i class="glyphicon glyphicon-print"></i> Print</button>
                            </div>
                        </div>
                        <br/>
                        <div id="print_reportlist" class="t_section">
                         <?php
                            if (isset($head_chrdo)) {
                                foreach ($head_chrdo as $r) {
                                  $chrdo_id = $r->a_id;
                                  $chrdo_name = $r->chrdo_name;
                                  $mm = $r->mm;
                                }
                            }

                                if (isset($results)) {
                                    foreach ($results as $r) {
                                        $a_id = $r->a_id;
                                        $l_agency = $r->l_agency;
                                        $a_status = $r->l_status;
                                        $a_lastname = $r->a_lastname;
                                        $a_firstname = $r->a_firstname;
                                        $a_middlename = $r->a_middlename;   
                                       
                                        if ($r->l_eld == "0.75") {
                                            $l_eld = '(x'.$r->l_eld.')';
                                        } else {
                                            $l_eld = "";
                                        }
                                        
                                        $l_datefiled = date('F d, Y',strtotime($r->l_datefiled));
                                        $l_position = $r->l_position;
                                        $l_sg = $r->l_sg;
                                        $l_type = $r->l_type;
                                        $l_typespecify = $r->l_typespecify;
                                        $l_where = $r->l_where;
                                        $l_remarks = $r->l_remarks;
                                       
                                        $l_noofworkingdays = $r->l_noofworkingdays;
                                        $l_inclusivedates = $r->l_inclusivedates;

                                        $l_commutation = $r->l_commutation;

                                        $depthead = $r->depthead;
                                        $l_dept_sig = $r->l_dept_sig;
                                        $sig_office = $r->sig_office;

                                        $divhead = $r->divhead;
                                        $l_div_sig = $r->l_div_sig;
                                        $l_disapprovereason = $r->l_disapprovereason;

                                        $l_statusasmayor = $r->l_statusasmayor;
                                        $l_statushr = $r->l_statushr;

                                        $l_vl = floatval($r->l_vl);
                                        $l_sl = floatval($r->l_sl);
                                        $l_asof = $r->l_asof;
                                        $l_typeofapplication = $r->l_typeofapplication;
                                        $l_asmayor = $r->l_asmayor;
                                        $asmayor_name = $r->asmayor_name;
                                        $m_position = $r->m_position;
                                    }
                                }
                            ?>

                        <style type="text/css"> 
                            table.tg{border:2px solid #000;}
.tg  {border-collapse:collapse;border-spacing:0;}
.tg th{font-family:Arial, sans-serif;font-size:11px!important;font-weight:normal;padding:0 5px!important;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;color:#000;border:0;}
.tg .tg-baqh{text-align:center;vertical-align:middle;line-height:1;}
.tg .tg-baqh1{text-align:center;vertical-align:middle;line-height:1;padding-top:25px;}
.tg .tg-baqh2{text-align:center;vertical-align:middle;line-height:1;padding-top:0;}
.tg .tg-ihln{font-weight:bold;font-style:italic;text-align:center;vertical-align:middle}
.tg .tg-e3zv{font-weight:bold}
.tg .tg-093g{font-weight:bold;font-style:italic;text-align:center;padding:0 5px!important;font-size:12px;}
.tg .tg-yfvh{font-weight:bold;font-style:italic;vertical-align:middle}
.tg .tg-9hbo{font-weight:bold;vertical-align:middle}
.tg .tg-amwm{font-weight:bold;text-align:center;vertical-align:middle}
.tg .tg-5frq{font-style:italic;text-align:center;vertical-align:middle}
.tg .tg-jogk{font-style:italic;vertical-align:middle}
.tg .tg-p_left_b{vertical-align:middle;font-weight:bold;padding:0 5px!important;}
.tg .tg-p_Center_b{vertical-align:middle;font-weight:bold;padding:0 5px!important;text-align:center;}
.tg .tg-p_left{vertical-align:middle;padding:0 5px!important;}
.tg .tg-p_right{vertical-align:middle;padding:0 5px!important;text-align:right;}
.tg .tg-p_center{vertical-align:middle;padding:0 5px!important;text-align:center;}
.tg .tg-t_center_i{padding:0 5px!important;font-style:italic;text-align:center;}
.tg .tg-t_center{padding:0 5px!important;text-align:center;}
.tg td{font-family:Arial, sans-serif;vertical-align:middle;font-size:11px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;color:#000;border:0;}
.glyphicon-ok.sqr{background-color:#484848!important;}
.sqr {padding:1px;margin-right:6px;}
.l_content, .sqr {height:14px;width:28px;border:1px solid #000;margin-right:0;margin-right:0;text-align:center;}
.b_left{border-left:2px solid #000!important;}
.b_bottom{border-bottom:2px solid #000!important;}
.b_top{border-top:2px solid #000!important;}
.b_all{border:1px solid #000!important;}
.b_no{border:0!important;}
.b_top1{border-top:1px solid #000!important;}
.b_bottom1{border-bottom:1px solid #000!important;}
.b_right1{border-right:1px solid #000!important;}
.b_left1{border-left:1px solid #000!important;}
.name,.name1,.name2,.name3,.day,.dates,.phil,.abroad,.other1,.other2{position:relative!important;}
.name:before{content:"_______________________";position:absolute;top:-12px;right:0;left:0;}
.name3:before{content:"_______________________";position:absolute;top:30px;right:0;left:0;}
.name1:before{content:"_______________________";position:absolute;top:11px;right:0;left:0;}
.name2:before{content:"_______________________";position:absolute;top:-11px;right:0;left:0;}
.day:before{content:"______________________________________________";position:absolute;top:1px;right:0;left:0;}
.dates:before{content:"_______________________";position:absolute;top:10px;right:0;left:0;}
.phil:before{content:"_________________";position:absolute;left:108px;top:2px;}
.abroad:before{content:"____________________";position:absolute;left:90px;top:0;}
.other1:before{content:"____________________";position:absolute;top:0;}
.other2:before{content:"__________________________";position:absolute;top:0;}
.uline{text-decoration:underline;line-height:1;}
.sick_l,.sick_l1{position:relative;}
.sick_l:before{content:"__________________________________";position:absolute;top:1px;right:0;left:5px;}
.sick_l1:before{content:"__________________________________";position:absolute;top:0;right:0;left:5px;}

span.signature{position:absolute;top:1px;left:0;right:0;}
span.signature_hr{position:absolute;top:0;left:0;right:0;}
span.signature_deptsig{position:absolute;top:0;right:0;width:178px;}
span.fullname{position:absolute!important;z-index:999;top:32px;left:0;right:0;line-height:1;}
span.fullname_hr{position:absolute!important;z-index:999;top:40px;left:0;right:0;line-height:1;}
span.fullname_deptsig{position:absolute!important;z-index:999;top:30px;right:0;line-height:1;width:200px;}
.signature_divsig{width:130px;position:absolute;right:150px;top:22px;z-index:9999;
    -webkit-transform: rotate(-52deg);
    -moz-transform: rotate(-52deg);
    -o-transform: rotate(-52deg);
    -ms-transform: rotate(-52deg);
    transform: rotate(-52deg);}
</style>
<table class="tg" style="max-width:560px;">
  <tr>
    <th class="tg-e3zv" colspan="5">1 OFFICE/AGENCY</th>
    <th class="tg-9hbo" colspan="5">Status</th>
    <th class="tg-9hbo b_left" colspan="3">2 NAME (Last)</th>
    <th class="tg-amwm" colspan="4">(First)</th>
    <th class="tg-amwm" colspan="3">(Middle)</th>
  </tr>
  <tr>


    <td class="tg-093g b_bottom" colspan="5"><p style="margin-bottom: 0;max-width: 160px;word-wrap: break-word;"><?php echo $l_agency; ?></p></td>
    <td class="tg-093g b_bottom" colspan="5"><?php echo $a_status; ?></td>
    <td class="tg-093g b_left b_bottom" colspan="3"><?php echo $a_lastname; ?></td>
    <td class="tg-093g b_bottom" colspan="4"><?php echo $a_firstname; ?></td>
    <td class="tg-093g b_bottom" colspan="3"><?php echo $a_middlename; ?></td>
  </tr>
  <tr>
    <td class="tg-p_left_b" colspan="7">3 DATE OF FILING</td>
    <td class="tg-p_left_b"></td>
    <td class="tg-p_left_b"></td>
    <td class="tg-p_left_b"></td>
    <td class="tg-p_left_b b_left" colspan="6">4 POSITION</td>
    <td class="tg-p_left_b" colspan="4">5 SALARY (Monthly)</td>
  </tr>
  <tr>
    <td class="tg-t_center_i b_bottom" colspan="10"><?php echo $l_datefiled; ?></td>
    <td class="tg-t_center_i b_bottom b_left" colspan="6"><?php echo $l_position; ?></td>
    <td class="tg-t_center_i b_bottom" colspan="4"></td>
  </tr>
  <tr>
    <td class="tg-p_left_b" colspan="7">6 a) TYPE OF LEAVE</td>
    <td class="tg-p_left_b"></td>
    <td class="tg-p_left_b"></td>
    <td class="tg-p_left_b"></td>
    <td class="tg-p_left_b b_left" colspan="10">6 b) WHERE LEAVE BE SPENT</td>
  </tr>


  <tr>
    <td class="tg-p_left"></td>
    <td class="tg-p_right"><span class="glyphicon <?php if($l_type == 'Vacation') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span></td>
    <td class="tg-p_left" colspan="7">VACATION</td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left b_left" colspan="10">1 In case of VACATION LEAVE</td>
  </tr>
  <tr>
    <td class="tg-p_leftp_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_right"><span class="glyphicon <?php if($l_typespecify == 'To Seek Employment') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span></td>
    <td class="tg-p_left" colspan="6">To seek employment</td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left b_left"></td>
    <td class="tg-p_right"><span class="glyphicon <?php if($l_type == 'Vacation' && $l_where == 0) { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span></td>
    <td class="tg-p_left phil" colspan="8">within the Philippines <?php if($l_type == 'Vacation' && $l_where == 0) { echo '<span class="uline">'.$l_remarks.'</span>'; } ?></td>
  </tr>
  <tr>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_right"><span class="glyphicon <?php if($l_type == 'Vacation' && $l_typespecify != 'VL' && $l_typespecify != 'To Seek Employment') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span></td>
    <td class="tg-p_left" colspan="6">Others (Specify)</td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left b_left"></td>
    <td class="tg-p_right"><span class="glyphicon <?php if($l_type == 'Vacation' && $l_where == 1) { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span></td>
    <td class="tg-p_left abroad" colspan="8">Abroad (Specify) <?php if($l_type == 'Vacation' && $l_where == 1) { echo '<span class="uline">'.$l_remarks.'</span>'; } ?></td>
  </tr>

  <tr>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left other1" colspan="6"><?php if($l_type == 'Vacation' && $l_typespecify != 'VL' && $l_typespecify != 'To Seek Employment') { 
      switch ($l_typespecify) {
            case 'FL': echo '<span class="uline">Forced Leave</span>'; break;
            case 'SLP': echo '<span class="uline">Special Leave Privilege</span>'; break;
            case 'Study Leave': echo '<span class="uline">Study Leave</span>'; break;
            case 'PL': echo '<span class="uline">Paternity Leave</span>'; break;
            case 'SPL': echo '<span class="uline">Solo Parent Leave</span>'; break;
            case 'Monetization of Leave Credits': echo '<span class="uline">Monetization of Leave Credits</span>'; break;
            default:
                echo '<span class="uline">'.$l_typespecify.'</span>'; 
        }
      } ?></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left b_left" colspan="10">2 In case of SICK LEAVE</td>
  </tr>
  <tr>
    <td class="tg-p_left"></td>
    <td class="tg-p_right"><span class="glyphicon <?php if($l_type == 'Sick' && $l_typespecify == 'SL') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span></td>
    <td class="tg-p_left" colspan="7">SICK</td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left b_left"></td>
    <td class="tg-p_right"><span class="glyphicon <?php if($l_type == 'Sick' && $l_where == 1) { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span></td>
    <td class="tg-p_left" colspan="8">In Hospital (Specify) _________________</td>
  </tr>
  <tr>
    <td class="tg-p_left"></td>
    <td class="tg-p_right"><span class="glyphicon <?php if($l_type == 'Sick' && $l_typespecify == 'ML') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span></td>
    <td class="tg-p_left" colspan="7">Maternity</td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left b_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left sick_l" colspan="8">&nbsp;<?php if($l_type == 'Sick' && $l_where == 1) { echo '<span class="uline">'.$l_remarks.'</span>'; } ?></td>
  </tr>
  <tr>
    <td class="tg-p_left"></td>
    <td class="tg-p_right"><span class="glyphicon <?php if($l_type == 'Sick' && $l_typespecify != 'SL' && $l_typespecify != 'ML') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span></td>
    <td class="tg-p_left" colspan="7">Other (Specify)</td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left b_left"></td>
    <td class="tg-p_right"><span class="glyphicon <?php if($l_type == 'Sick' && $l_where == 0) { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span></td>
    <td class="tg-p_left" colspan="8">Out-Patient (Specify) _________________</td>
  </tr>
  <tr>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left other2" colspan="7"><?php if($l_type == 'Sick' && $l_typespecify != 'SL'  && $l_typespecify != 'ML') { 
        switch ($l_typespecify) {
            case 'RL':
              echo '<span class="uline">Rehabilitation Leave</span>'; 
            break;
            default:
                echo '<span class="uline">'.$l_typespecify.'</span>'; 
        }
      } 
      ?></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left b_left"></td>
    <td class="tg-p_left "></td>
    <td class="tg-p_left sick_l1" colspan="8">&nbsp; <?php if($l_type == 'Sick' && $l_where == 0) { echo '<span class="uline">'.$l_remarks.'</span>'; } ?></td>
  </tr>
  <tr>
    <td class="tg-p_left_b" colspan="10">6 c) NUMBER OF WORKING DAY APPLIED FOR</td>
    <td class="tg-p_left_b b_left" colspan="10">6 d) COMMUTATION:</td>
  </tr>
  <tr>
    <td class="tg-p_left"></td>
    <td class="tg-t_center_i day" colspan="8"><?php echo '<span class="uline">'.$l_noofworkingdays.' '.$l_eld.'</span>'; ?></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left b_left"></td>
    <td class="tg-p_right"><span class="glyphicon <?php if($l_commutation == 'Requested') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span></td>
    <td class="tg-p_left" colspan="3">Requested</td>
    <td class="tg-p_right"><span class="glyphicon <?php if($l_commutation == 'Not Requested') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span></td>
    <td class="tg-p_left" colspan="3">Not Requested</td>
    <td class="tg-p_left"></td>
  </tr>
  <tr>
    <td class="tg-p_left" colspan="3" style="vertical-align:top;padding-top:10px!important;">INCLUSIVE DATES</td>
    <td class="tg-t_center_i dates" colspan="6" style="vertical-align:top;padding-top:10px!important;"><?php echo '<span class="uline">'.$l_inclusivedates.'</span>'; ?></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left b_left"></td>
    <td class="tg-p_center" colspan="9" style="padding-top:20px!important;height:45px;position:relative;">
      <span class="signature">
        <?php
          $sig_jgp = 'pds_image/'.$a_id.'/'.$a_id.'_signature'.'.jpg';
          $sig_png = 'pds_image/'.$a_id.'/'.$a_id.'_signature'.'.png';
          if (file_exists($sig_jgp)) {
        ?>
          <img src="<?php echo base_url($sig_jgp); ?>" style="width:270px;">
        <?php } elseif (file_exists($sig_png)) { ?>
          <img src="<?php echo base_url($sig_png); ?>" style="width:270px;">
        <?php } else { ?>
          <img src="<?php echo base_url('pds_image/DefaultSignature.jpg'); ?>" style="width:270px;">
        <?php } ?>
      </span>
      <span class="fullname name"> <?php echo $a_firstname.' '.$a_middlename.' '.$a_lastname; ?></span>
     
    </td>
  </tr>
  <tr>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
  </tr>
  <tr>
    <td class="tg-p_left_b b_top b_bottom">7</td>
    <td class="tg-p_Center_b b_top b_bottom" colspan="19">DETAILS OF LEAVE CREDITS</td>
  </tr>
  <tr>
    <td class="tg-p_left_b" colspan="10">7 a) CERTIFICATION OF LEAVE CREDITS</td>
    <td class="tg-p_left_b" colspan="10">7 b) RECOMMENDATION:</td>
  </tr>
  <tr>
    <td class="tg-p_left"></td>
    <td class="tg-p_left_b dates" colspan="6">AS OF: <span class="uline"><?php echo $l_asof; ?></span> </td>
    <td class="tg-p_left" colspan="3"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_right"><span class="glyphicon <?php if($l_typeofapplication == 'For Approval') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span></td>
    <td class="tg-p_left" colspan="7">Approval</td>
    <td class="tg-p_left"></td>
  </tr>
  <tr>
    <td class="tg-p_left"></td>
    <td class="tg-p_Center_b b_all" colspan="2">VACATION</td>
    <td class="tg-p_Center_b b_bottom1" colspan="2">SICK</td>
    <td class="tg-p_Center_b b_all" colspan="2">TOTAL</td>
    <td class="tg-p_left" colspan="4">&nbsp;</td>
    <td class="tg-p_right"><span class="glyphicon <?php if($l_typeofapplication != 'For Approval') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span></td>
    <td class="tg-p_left" colspan="8">Disapproval due to </td>
  </tr>

  <tr>
    <td class="tg-p_left"></td>
    <td class="tg-t_center_i b_left1" colspan="2">&nbsp;<?php echo $l_vl; ?></td>
    <td class="tg-t_center_i b_left1 b_right1" colspan="2">&nbsp;<?php echo $l_sl; ?></td>
    <td class="tg-t_center_i b_right1" colspan="2">&nbsp;<?php echo $l_vl + $l_sl; ?></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <!-- <td class="tg-p_left" colspan="8">__________________________________</td> -->
    <td class="tg-p_left" colspan="8"><?php if($l_typeofapplication != 'For Approval' && $l_disapprovereason != '') { echo '<span class="uline">'.$l_disapprovereason.'</span>'; } ?></td>
  </tr>
  <tr>
    <td class="tg-p_left"></td>
    <td class="tg-p_center b_all" colspan="2">Days</td>
    <td class="tg-p_center b_all" colspan="2">Days</td>
    <td class="tg-p_center b_all" colspan="2">Days</td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
  </tr>
  <tr>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
  </tr>
  <tr>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
  </tr>
  <tr>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
   
    

    <td class="tg-baqh1 " colspan="9" style="height:64px;position:relative;">

        <?php 
           $sig_jgp = 'pds_image/'.$l_div_sig.'/'.$l_div_sig.'_signature'.'.jpg';
           $sig_png = 'pds_image/'.$l_div_sig.'/'.$l_div_sig.'_signature'.'.png';
          if (file_exists($sig_jgp)) {
        ?>
          <img class="signature_divsig" src="<?php echo base_url($sig_jgp); ?>">
        <?php } elseif (file_exists($sig_png)) { ?>
          <img class="signature_divsig" src="<?php echo base_url($sig_png); ?>">
        <?php } ?>
    
      <span class="signature_deptsig">
        <?php 
           $sig_jgp = 'pds_image/'.$l_dept_sig.'/'.$l_dept_sig.'_signature'.'.jpg';
           $sig_png = 'pds_image/'.$l_dept_sig.'/'.$l_dept_sig.'_signature'.'.png';
          if (file_exists($sig_jgp)) {
        ?>
          <img src="<?php echo base_url($sig_jgp); ?>" style="width:202px;">
        <?php } elseif (file_exists($sig_png)) { ?>
          <img src="<?php echo base_url($sig_png); ?>" style="width:202px;">
        <?php } ?>
      </span>
      <span class="fullname_deptsig name1"> <strong><?php echo $depthead; ?></strong> <br> Head, <?php echo $sig_office; ?><br>(Authorized Official)</span>
    </td>


  </tr>
  <tr>
    <td class="tg-baqh2 name2" colspan="20" style="padding-top:3px!important;height:70px;">
      <span class="signature_hr">
        <?php
          $sig_jgp = 'pds_image/'.$chrdo_id.'/'.$chrdo_id.'_signature'.'.jpg';
          $sig_png = 'pds_image/'.$chrdo_id.'/'.$chrdo_id.'_signature'.'.png';
          if (file_exists($sig_jgp)) {
        ?>
          <img src="<?php echo base_url($sig_jgp); ?>" style="width:270px;">
        <?php } elseif (file_exists($sig_png)) { ?>
          <img src="<?php echo base_url($sig_png); ?>" style="width:270px;">
        <?php } else { ?>
          <img src="<?php echo base_url('pds_image/DefaultSignature.jpg'); ?>" style="width:270px;">
        <?php } ?>
      </span>
      <span class="fullname_hr name"> <strong><?php echo $mm.' '.$chrdo_name ?></strong><br/>(HEAD-CHRDO)</span>
      </td>
  </tr>
  <tr>
    <td class="tg-p_left_b b_top" colspan="10">7 c) APPROVED FOR:</td>
    <td class="tg-p_left_b b_top" colspan="10">7 d) DISAPPROVED DUE TO:</td>
  </tr>
  <tr>
    <td class="tg-p_left"></td>
    <td class="tg-p_left">_______</td>
    <td class="tg-p_left" colspan="8">Days with pay</td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left" colspan="9">_________________________________________</td>
  </tr>
  <tr>
    <td class="tg-p_left"></td>
    <td class="tg-p_left">_______</td>
    <td class="tg-p_left" colspan="8">Days without pay</td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left" colspan="9">_________________________________________</td>
  </tr>
  <tr>
    <td class="tg-p_left"></td>
    <td class="tg-p_left">_______</td>
    <td class="tg-p_left" colspan="8">Others (Specify)</td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
  </tr>
  <tr>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
  </tr>
  <tr>
    <td class="tg-baqh" colspan="20">
      <?php if ($m_position == "CITY MAYOR") { echo 'Approved by'; } else { ?>
      By Authority of the City Mayor
      <?php } ?>
      </td>
  </tr>
  <tr>
    <td class="tg-baqh name3" colspan="20" style="padding-top:30px!important;">
      <?php if($l_statusasmayor == 'Approved') { ?>
      <span class="signature_hr">
        <?php
          $sig_jgp = 'pds_image/'.$l_asmayor.'/'.$l_asmayor.'_signature'.'.jpg';
          $sig_png = 'pds_image/'.$l_asmayor.'/'.$l_asmayor.'_signature'.'.png';
          if (file_exists($sig_jgp)) {
        ?>
          <img src="<?php echo base_url($sig_jgp); ?>" style="width:202px;">
        <?php } elseif (file_exists($sig_png)) { ?>
          <img src="<?php echo base_url($sig_png); ?>" style="width:202px;">
        <?php } else { ?>
          <img src="<?php echo base_url('pds_image/DefaultSignature.jpg'); ?>" style="width:202px;">
        <?php } ?>
      </span>
      <?php } ?>
      <span style='z-index:9;position:relative;line-height:1;'><strong><?php echo $asmayor_name?></strong> <br/>
        <?php if ($m_position == "CITY MAYOR") { echo $m_position; } else { ?>
        OIC- City Administrator
        <?php } ?>
      </span>
    </td>
  </tr>
  <tr>
    <td class="tg-p_left_b" colspan="10">DATE: __________________</td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
  </tr>
  <tr>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
    <td class="tg-p_left"></td>
  </tr>
</table>
                        <div id="print_reportlist" class="t_section">
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
