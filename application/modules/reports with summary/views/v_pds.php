<!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="padding: 10px 0;">
                    <?php 
                        if (isset($results)) {
                            foreach ($results as $r) {
                                $a_id = $r->a_id;
                                $a_lastname = $r->a_lastname;
                                $a_firstname = $r->a_firstname;
                                $a_middlename = $r->a_middlename;
                                $a_namext = $r->a_namext;
                                
                                $pi_birthdate = date_create($r->pi_birthdate);
                                $pi_birthplace = ucfirst($r->pi_birthplace);
                                $pi_gender = strtoupper($r->pi_gender);
                                $pi_status = strtoupper($r->pi_status);
                                $pi_citizenship = ucfirst($r->pi_citizenship);
                                $pi_height = $r->pi_height;
                                $pi_weight = $r->pi_weight;
                                $pi_bloodtype = $r->pi_bloodtype;
                                $pi_gsis = $r->pi_gsis;
                                $pi_pagibig = $r->pi_pagibig;
                                $pi_philhealth = $r->pi_philhealth;
                                $pi_sss = $r->pi_sss;
                                $pi_resstreet = ucfirst($r->pi_resstreet);
                                $pi_resbrgy = ucfirst($r->pi_resbrgy);
                                $pi_rescity = ucfirst($r->pi_rescity);
                                $pi_resprov = ucfirst($r->pi_resprov);
                                $pi_reszip = $r->pi_reszip;
                                $pi_resphone = $r->pi_resphone;
                                
                                $pi_permstreet = ucfirst($r->pi_permstreet);
                                $pi_permbrgy = ucfirst($r->pi_permbrgy);
                                $pi_permcity = ucfirst($r->pi_permcity);
                                $pi_permprov = ucfirst($r->pi_permprov);
                                $pi_resprov = ucfirst($r->pi_resprov);
                                $pi_permzip = $r->pi_permzip;
                                $pi_permphone = $r->pi_permphone;
                                $pi_email = $r->pi_email;
                                $pi_mobile = $r->pi_mobile;
                                $pi_tin = $r->pi_tin;
                                
                                $fb_spouselname = strtoupper($r->fb_spouselname);
                                $fb_spousefname = strtoupper($r->fb_spousefname);
                                $fb_spousemi = strtoupper($r->fb_spousemi);
                                $fb_spousework = strtoupper($r->fb_spousework);
                                $fb_spouseemployer = strtoupper($r->fb_spouseemployer);
                                $fb_spouseemployeraddress = strtoupper($r->fb_spouseemployeraddress);
                                $fb_spouseemployerphone = strtoupper($r->fb_spouseemployerphone);
                                $fb_fatherlname = strtoupper($r->fb_fatherlname);
                                $fb_fatherfname = strtoupper($r->fb_fatherfname);
                                $fb_fathermi = strtoupper($r->fb_fathermi);
                                $fb_motherlname = strtoupper($r->fb_motherlname);
                                $fb_motherfname = strtoupper($r->fb_motherfname);
                                $fb_mothermi = strtoupper($r->fb_mothermi);

                            }
                        }
                    ?>

                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#page1">Page 1</a></li>
                        <li><a data-toggle="tab" href="#page2">Page 2</a></li>
                        <li><a data-toggle="tab" href="#page3">Page 3</a></li>
                        <li><a data-toggle="tab" href="#page4">Page 4</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="page1" class="tab-pane fade in active">
                            <br/>
                                <div class="row">
                                    <div class="col-sm-2 btn-print-section">
                                        <button id="pds_page1" onclick="printContent('page_1')" type="button" class="btn btn-primary form-control"><i class="glyphicon glyphicon-print"></i> Print</button>
                                    </div>
                                </div>
                           
                            <div id="page_1">
                                    <style>
                                        .tg td, .tg th {font-family: Arial, sans-serif;font-size: 14.5px;border-style: solid;border-width: 1px;overflow: hidden }.tg .tg-hsed, .tg .tg-le8v, .tg .tg-lqy6, .tg .tg-s4m5, .tg .tg-x5m0 {vertical-align: top }.tg .tg-lqy6, .tg .tg-tkkh, .tg .tg-x5m0 {text-align: right }.tg {border-collapse: collapse;border-spacing: 0;margin: 0 auto }.tg td {padding: 4px 3px;border-color: #000;word-wrap: break-word;white-space: normal }.tg th {font-weight: 400;padding: 3px 0;word-break: normal }.cnt, .tg .tg-9e37, .tg .tg-hsed {font-weight: 700 }.tg .tg-x5m0 {background-color: silver!important }.tg .tg-hsed {font-style: italic;background-color: #656565!important;color: #fff!important;border: 1px solid #000;font-size: 14.5px }.td_bg, .tg .tg-hy62, .tg .tg-le8v, .tg .tg-tkkh {background-color: silver!important }.b_top, .b_top_bottom {border-top: 0!important }.b_bottom, .b_top_bottom {border-bottom: 0!important }.b_left, .b_left_right {border-left: 0!important }.b_left_right, .b_right {border-right: 0!important }.tg .tg-s4m5 {font-size: 12px;font-family: Arial, Helvetica, sans-serif!important }.tg .tg-9e37, .tg .tg-i9x5 {text-align: center;vertical-align: top }.cnt {color: red!important;font-size: 12px!important }.l_content, .sqr {height: 15px;width: 15px;border: 1px solid #000 }.sqr {padding: 1px;margin-right: 6px }i.box {width: 11px;height: 11px;margin: 0 5px;display: inline-block;border: 1px solid }th.tg-031e {font-size: 13.5px!important;line-height: 1;padding: 5px!important }.tg .tg-9e37 {font-size: 32px;font-family: "Arial Black", Gadget, sans-serif!important;padding: 25px }.tg .tg-i9x5 {background-color: #656565!important;color: #fff!important;border-color: #000 }._ii .tg-0ord {text-align: right }._ii .tg-baqh, ._iii .tg-baqh, ._iii .tg-s6z2 {text-align: center }._ii .tg-baqh, ._ii .tg-yw4l {vertical-align: top }._iii .tg-baqh {vertical-align: top }._iii .tg-lqy6 {text-align: right;vertical-align: top }._iii .tg-031e, ._iv .tg-baqh, ._iv .tg-s6z2, ._v .tg-031e, ._v .tg-0ord, ._v .tg-baqh, ._v .tg-s6z2 {text-align: center }._iii .tg-031e, ._iii .tg-yw4l {vertical-align: top }._iv .tg-baqh, ._iv .tg-yw4l {vertical-align: top }._v .tg-baqh {vertical-align: top }._v .tg-lqy6 {text-align: right;vertical-align: top }._v .tg-yw4l, .l_content, .l_title, .picture, .tg .tg-baqh, .tg .tg-s6z2 {text-align: center }._v .tg-yw4l {vertical-align: top }.tg .tg-baqh {vertical-align: top }.ans {padding: 5px 15px 5px!important }.tg .tg-yw4l {vertical-align: top }.l_section {padding: 5px 20px 0!important }.l_content {border-bottom: 0;min-height: 25px;width: 100% }.l_title, .picture, .thumbmark {border: 1px solid #000 }.l_title {font-size: 14.5px;background-color: silver!important }.thumbmark {height: 128px;margin: 10px 10px 0 0 }._red {color: red!important }.picture {margin: 10px 10px 0;min-height: 227px;padding-top: 45px }.border_ltr {border-top: 4px solid #000;border-left: 4px solid #000;border-right: 4px solid #000 }.border_lrb {border-bottom: 4px solid #000;border-left: 4px solid #000;border-right: 4px solid #000 }.border_lr {border-left: 4px solid #000;border-right: 4px solid #000 }.tg .tg-lqy6 {font-size: 12px }
                                    </style>
                                <div class="tg-wrap">
                                <table class="tg i border_ltr" style="width:100%; max-width: 1062px; color:#000;">
                                        <tr>
                                            <th class="tg-031e b_bottom" colspan="8">CS FORM 212 (Revised 2005)</th>
                                        </tr>
                                        <tr>
                                            <td class="tg-9e37 b_top_bottom" colspan="8">PERSONAL DATA SHEET</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-s4m5 b_top" colspan="5">Print legibly.,Mark appropriate boxes,with <i class="box"></i>"<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>" and use separate sheet if necessary.</td>
                                            <td class="tg-i9x5" style="width: 220px;">1. CS ID No.</td>
                                            <td class="tg-lqy6" colspan="2">(to be filled up by CSC)</td>
                                        </tr>
                                        <tr>
                                            <?php if (strtolower($this->session->userdata('a_level')) == 'manager') {
                                                $by = $this->session->userdata('a_empno');
                                            } else {
                                                $by = $this->session->userdata('a_machineid');
                                            }?>
                                            <td class="tg-hsed" colspan="8">I. PERSONAL INFORMATION <span style="float:right;color:#a9a9a9!important;font-size:9px!important;line-height:1">CSFP-HRIS-<?php echo $a_id.'-by-'.$by;?></span></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-le8v b_right" rowspan="3" style="width: 20px;">2.</td>
                                            <td class="tg-le8v b_left b_bottom" style="width: 150px;">SURNAME</td>
                                            <td class="tg-yw4l" colspan="6">
                                                <?php echo $a_lastname; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tg-le8v b_left b_top_bottom">FIRST NAME</td>
                                            <td class="tg-yw4l" colspan="6">
                                                <?php echo $a_firstname; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tg-le8v b_left b_top">MIDDLE NAME</td>
                                            <td class="tg-yw4l" colspan="4">
                                                <?php echo $a_middlename; ?>
                                            </td>
                                            <td class="tg-yw4l tg-le8v" style="width: 176px; white-space: nowrap;">3. NAME EXTENSION. <sub>(e.g. Jr., Sr.)<sub></td>
                                            <td class="tg-yw4l" style="width: 150px;"><?php if ($a_namext == null || $a_namext == "") { echo "N/A"; } else { $a_namext; }?></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-le8v b_right">4.</td>
                                            <td class="tg-le8v b_left" colspan="2" style="width: 200px; white-space: nowrap;font-size:11px;">DATE OF BIRTH <sub>(mm/dd/yyyy)</sub></td>
                                            <td class="tg-yw4l" style="width: 530px;">
                                                <?php echo date_format($pi_birthdate,"m/d/Y"); ?>
                                            </td>
                                            <td class="tg-le8v" rowspan="3" style="width: 500px;">16. RESIDENTIAL ADDRESS</td>
                                            <td class="tg-031e" colspan="3" rowspan="3">
                                                <?php echo $pi_resstreet." ".$pi_resbrgy." ".$pi_rescity.", ".$pi_resprov;?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tg-le8v b_right">5.</td>
                                            <td class="tg-le8v b_left">PLACE OF BIRTH</td>
                                            <td class="tg-yw4l" colspan="2" style="text-transform: capitalize;">
                                                <?php echo ucwords($pi_birthplace); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tg-le8v b_right">6.</td>
                                            <td class="tg-le8v b_left">SEX</td>
                                            <td class="tg-yw4l" colspan="2" style="font-size: 12px;">
                                                <span class="glyphicon <?php if (($pi_gender == "MALE") || ($pi_gender =="M")) { ?>glyphicon-ok<?php } ?> sqr" aria-hidden="true"></span>Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span class="glyphicon <?php if (($pi_gender =="FEMALE") || ($pi_gender =="F")) { ?>glyphicon-ok<?php } ?> sqr" aria-hidden="true"></span>Female
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tg-le8v b_right" rowspan="3">7.</td>
                                            <td class="tg-le8v b_left" rowspan="3">CIVIL STATUS</td>
                                            <td class="tg-yw4l" colspan="2" rowspan="3" style="font-size: 12px;">
                                                <span class="glyphicon <?php if ($pi_status =="SINGLE") { ?>glyphicon-ok<?php } ?> sqr" aria-hidden="true"></span>Single &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span class="glyphicon <?php if ($pi_status =="WIDOWED") { ?>glyphicon-ok<?php } ?> sqr" aria-hidden="true"></span>Widowed
                                                <br/>
                                                <span class="glyphicon <?php if ($pi_status =="MARRIED") { ?>glyphicon-ok<?php } ?> sqr" aria-hidden="true"></span>Married &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span class="glyphicon <?php if ($pi_status =="SEPARATED") { ?>glyphicon-ok<?php } ?> sqr" aria-hidden="true"></span>Separated
                                                <br/>
                                                <span class="glyphicon <?php if ($pi_status =="ANNULLED"){ ?>glyphicon-ok<?php } ?> sqr" aria-hidden="true"></span>Annulled &nbsp;&nbsp;&nbsp;
                                                <span class="glyphicon <?php if ($pi_status ==" ") { ?>glyphicon-ok<?php } ?> sqr" aria-hidden="true"></span>Others, specify __________
                                                <br/>
                                            </td>
                                            <td class="tg-le8v">ZIP CODE</td>
                                            <td class="tg-yw4l" colspan="3">
                                                <?php echo $pi_reszip; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tg-le8v">17. TELEPHONE NO.</td>
                                            <td class="tg-yw4l" colspan="3">
                                                <?php echo $pi_resphone; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tg-le8v" rowspan="3">18. PERMANENT ADDRESS</td>
                                            <td class="tg-031e" colspan="3" rowspan="3">
                                                <?php echo $pi_permstreet." ".$pi_permbrgy." ".$pi_permcity.", ".$pi_permprov;?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tg-le8v b_right">8.</td>
                                            <td class="tg-le8v b_left">CITIZENSHIP</td>
                                            <td class="tg-yw4l" colspan="2">
                                                <?php echo $pi_citizenship; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tg-le8v b_right">9.</td>
                                            <td class="tg-le8v b_left">HEIGHT (m)</td>
                                            <td class="tg-yw4l" colspan="2">
                                                <?php echo $pi_height; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tg-hy62 b_right">10.</td>
                                            <td class="tg-hy62 b_left">WEIGHT (kg)</td>
                                            <td class="tg-031e" colspan="2">
                                                <?php echo $pi_weight; ?>
                                            </td>
                                            <td class="tg-le8v">ZIP CODE</td>
                                            <td class="tg-yw4l" colspan="3">
                                                <?php echo $pi_permzip; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tg-le8v b_right">11.</td>
                                            <td class="tg-le8v b_left">BLOOD TYPE</td>
                                            <td class="tg-yw4l" colspan="2">
                                                <?php echo $pi_bloodtype; ?>
                                            </td>
                                            <td class="tg-le8v">19. TELEPHONE NO.</td>
                                            <td class="tg-yw4l" colspan="3">
                                                <?php echo $pi_permphone; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tg-le8v b_right">12.</td>
                                            <td class="tg-le8v b_left">GSIS ID NO.</td>
                                            <td class="tg-yw4l" colspan="2">
                                                <?php echo $pi_gsis; ?>
                                            </td>
                                            <td class="tg-le8v">20. E-MAIL ADDRESS (if any)</td>
                                            <td class="tg-yw4l" colspan="3">
                                                <?php echo $pi_email; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tg-le8v b_right">13.</td>
                                            <td class="tg-le8v b_left">PAG-IBIG ID NO.</td>
                                            <td class="tg-yw4l" colspan="2">
                                                <?php echo $pi_pagibig; ?>
                                            </td>
                                            <td class="tg-le8v">21. CELLPHONE NO. (if any)</td>
                                            <td class="tg-yw4l" colspan="3">
                                                <?php echo $pi_mobile; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tg-le8v b_right">14.</td>
                                            <td class="tg-le8v b_left">PHILHEALTH NO.</td>
                                            <td class="tg-yw4l" colspan="2">
                                                <?php echo $pi_philhealth; ?>
                                            </td>
                                            <td class="tg-le8v">22. AGENCY EMPLOYEE NO.</td>
                                            <td class="tg-yw4l" colspan="3"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-hy62 b_right">15.</td>
                                            <td class="tg-hy62 b_left">SSS NO.</td>
                                            <td class="tg-031e" colspan="2">
                                                <?php echo $pi_sss; ?>
                                            </td>
                                            <td class="tg-hy62">23. TIN</td>
                                            <td class="tg-yw4l" colspan="3">
                                                <?php echo $pi_tin; ?>
                                            </td>
                                        </tr>
                                    </table>

                                    <table class="tg _ii border_lr" style="width: 1062px; color:#000;">
                                        <tr>
                                            <th class="tg-hsed" colspan="5">II. FAMILY BACKGROUND</th>
                                        </tr>
                                        <tr>
                                            <td class="tg-031e td_bg b_right b_bottom" style="width: 20px;">24.</td>
                                            <td class="tg-031e td_bg b_left b_bottom" style="width: 195px;">SPOUSE'S SURNAME</td>
                                            <td class="tg-031e" style="width: 300px;">
                                                <?php echo $fb_spouselname; ?>
                                            </td>
                                            <td colspan="2" rowspan="14" style="position:relative;padding:0">



                                                <table class="tg" style="width:100%;position:absolute;top:0">
                                                    <tr>
                                                        <th class="tg-031e td_bg b_top b_left" style="height:29px;">25. NAME OF CHILD (Write full name and list all)</th>
                                                        <th class="tg-031e td_bg b_top b_right">DATE OF BIRTH <sub>(mm/dd/yyyy)</th>
                                                    </tr>
      
                                                    <?php
                                                    if (isset($pds_child)) {
                                                        foreach ($pds_child as $c) {
                                                            switch ($c->c_forapproval) {
                                                                case 1:
                                                                    $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup  style="color:red!important;">new</sup>)</span>';
                                                                break;
                                                                case 2:
                                                                    $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup style="color:red!important;">update</sup>)</span>';
                                                                break;
                                                                case 3:
                                                                    $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup style="color:red!important;">for delete</sup>)</span>';
                                                                break;
                                                                
                                                                default:
                                                                   $c_birthdate = date_create($c->c_birthdate);
                                                                   $txt = date_format($c_birthdate,"m/d/Y");
                                                                break;
                                                            }
                                                    ?>
                                                    
                                                        <tr>
                                                            <td class="tg-yw4l b_left" <?php if ($c->c_forapproval != 0 && $c->c_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?>><?php echo $c->c_fname.' '.$c->c_mi.' '.$c->c_lname.' '.$c->c_extname; ?></td>
                                                            <td class="tg-yw4l b_right" <?php if ($c->c_forapproval != 0 && $c->c_forapproval != NULL) { ?> style="color:red!important;font-style:italic;text-align:center"<?php } else { ?> style="text-align:center" <?php } ?>><?php echo $txt; ?></td>
                                                        </tr>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                    
                                                    <?php for ($i = $pds_child_cnt; $i <= 12; $i++) { ?>
                                                        <tr>
                                                            <td class="tg-yw4l b_left">&nbsp;</td>
                                                            <td class="tg-yw4l b_right"></td>
                                                         </tr>
                                                    <?php } ?>

                                                    <tr>
                                                        <td class="tg-yw4l b_left b_bottom">&nbsp;</td>
                                                        <td class="tg-yw4l b_right b_bottom"></td>
                                                    </tr>
                                                </table>
                    
                                    </td>
                                  
                                </tr>
                                
                                <tr>
                                    <td class="tg-031e td_bg b_right b_top_bottom"></td>
                                    <td class="tg-0ord td_bg b_left b_top_bottom">FIRST NAME</td>
                                    <td class="tg-031e"><?php echo $fb_spousefname; ?></td>
                                   
                                </tr>
                                
                                <tr>
                                    <td class="tg-031e td_bg b_right b_top"></td>
                                    <td class="tg-0ord td_bg b_left b_top_bottom">MIDDLE NAME</td>
                                    <td class="tg-031e"><?php echo $fb_spousemi; ?></td>
                                  
                                </tr>
                                <tr>
                                    <td class="tg-031e td_bg b_right"></td>
                                    <td class="tg-031e td_bg b_left">OCCUPATION</td>
                                    <td class="tg-031e"><?php echo $fb_spousework; ?></td>
                                  
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_right"></td>
                                    <td class="tg-yw4l td_bg b_left">EMPLOYER/BUS. NAME</td>
                                    <td class="tg-yw4l"><?php echo $fb_spouseemployer; ?></td>
                                   
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_right"></td>
                                    <td class="tg-yw4l td_bg b_left">BUSINESS ADDRESS</td>
                                    <td class="tg-yw4l"><?php echo $fb_spouseemployeraddress; ?></td>
                                  
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_right"></td>
                                    <td class="tg-yw4l td_bg b_left">TELEPHONE NO.</td>
                                    <td class="tg-yw4l"><?php echo $fb_spouseemployerphone; ?></td>
                                   
                                </tr>
                                <tr>
                                    <td class="tg-baqh td_bg cnt" colspan="3" style="height:30px;">(Continue on separate sheet if necessary)</td>
                                   
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_right b_bottom">26.</td>
                                    <td class="tg-yw4l td_bg b_left b_bottom">FATHER'S SURNAME</td>
                                    <td class="tg-yw4l"><?php echo $fb_fatherlname; ?></td>
                                   
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_right b_top_bottom"></td>
                                    <td class="tg-yw4l td_bg b_left b_top_bottom">FIRST NAME</td>
                                    <td class="tg-yw4l"><?php echo $fb_fatherfname; ?></td>
                                   
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_right b_top"></td>
                                    <td class="tg-yw4l td_bg b_left b_top">MIDDLE NAME</td>
                                    <td class="tg-yw4l"><?php echo $fb_fathermi; ?></td>
                                    
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_right b_bottom">27.</td>
                                    <td class="tg-yw4l td_bg b_left b_bottom">MOTHER'S MAIDEN NAME</td>
                                    <td class="tg-yw4l"></td>
                                    
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_right b_top_bottom"></td>
                                    <td class="tg-yw4l td_bg b_left b_top_bottom">SURNAME</td>
                                    <td class="tg-yw4l"><?php echo $fb_motherlname; ?></td>
                                   
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_right b_top_bottom"></td>
                                    <td class="tg-yw4l td_bg b_left b_top_bottom">FIRST NAME</td>
                                    <td class="tg-yw4l"><?php echo $fb_motherfname; ?></td>
                                    
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_right b_top"></td>
                                    <td class="tg-yw4l td_bg b_left b_top">MIDDLE NAME</td>
                                    <td class="tg-yw4l"><?php echo $fb_mothermi; ?></td>
                                    <td class="tg-baqh td_bg cnt" colspan="2">(Continue on separate sheet if necessary)</td>
                                </tr>
                            </table>
                                    
                                    <table class="tg _iii border_lrb" style="width: 1062px; color:#000;">
                                <tr>
                                    <th class="tg-hsed" colspan="9">III. EDUCATIONAL BACKGROUND</th>
                                </tr>
                                <tr>
                                    <td class="tg-031e td_bg b_right" rowspan="2" style="width: 20px;">28.</td>
                                    <td class="tg-s6z2 td_bg b_left" style="width: 125px;" rowspan="2">LEVEL</td>
                                    <td class="tg-s6z2 td_bg" style="width: 300px;" rowspan="2">NAME OF SCHOOL
                                        <br/>(Write in full)</td>
                                    <td class="tg-s6z2 td_bg" rowspan="2" style="width: 205px;">DEGREE COURSE
                                        <br/>(Write in full)</td>
                                    <td class="tg-s6z2 td_bg" style="width: 50px;" rowspan="2">YEAR
                                        <br/>GRADUATED
                                        <br/>(if graduated)</td>
                                    <td class="tg-s6z2 td_bg" rowspan="2" style="font-size: 12px;width: 100px;">HIGHEST GRADE/
                                        <br/>LEVEL/
                                        <br/>UNITS EARNED
                                        <br/>(if not graduated)</td>
                                    <td class="tg-baqh td_bg" colspan="2">INCLUSIVE DATES OF
                                        <br/>ATTENDANCE</td>
                                    <td class="tg-s6z2 td_bg" rowspan="2">SCHOLARSHIP/
                                        <br/>ACADEMIC HONORS
                                        <br/> RECEIVED</td>
                                </tr>
                                <tr>
                                    <td class="tg-baqh td_bg" style="width: 90px;">From</td>
                                    <td class="tg-baqh td_bg" style="width: 90px;">To</td>
                                </tr>
                                
                                <?php 
                                if (isset($pds_educbg)) {
                                    foreach ($pds_educbg as $e) {

                                        switch ($e->pi_forapproval) {
                                            case 1:
                                                $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup  style="color:red!important;">new</sup>)</span>';
                                            break;
                                            case 2:
                                                $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup style="color:red!important;">update</sup>)</span>';
                                            break;
                                            case 3:
                                                $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup style="color:red!important;">for delete</sup>)</span>';
                                            break;
                                            default:
                                                $txt = $e->pi_level;
                                            break;
                                        }
                                ?>
                                
                                <tr <?php if ($e->pi_forapproval != 0 && $e->pi_forapproval != NULL) { ?> style="background-color:#ffdfdc;"<?php } ?>>
                                    <td class="tg-031e" colspan="2" <?php if ($e->pi_forapproval != 0 && $e->pi_forapproval != NULL) { ?> style="color:red!important;font-style:italic;height:41px;"<?php } else { ?>style="height:41px;"<?php } ?>><?php echo $txt; ?></td>
                                    <td class="tg-031e" <?php if ($e->pi_forapproval != 0 && $e->pi_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?> ><?php echo $e->pi_schoolname; ?></td>
                                    <td class="tg-031e" <?php if ($e->pi_forapproval != 0 && $e->pi_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?> ><?php echo $e->pi_degree; ?></td>
                                    <td class="tg-031e" <?php if ($e->pi_forapproval != 0 && $e->pi_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?> ><?php echo $e->pi_yrgrad; ?></td>
                                    <td class="tg-031e" <?php if ($e->pi_forapproval != 0 && $e->pi_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?> ><?php echo $e->pi_highestgrade; ?></td>
                                    <td class="tg-031e" <?php if ($e->pi_forapproval != 0 && $e->pi_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?> >
                                        <?php $pi_from = date_create($e->pi_from); echo date_format($pi_from,"m/d/Y"); ?>
                                    </td>
                                    <td class="tg-031e" <?php if ($e->pi_forapproval != 0 && $e->pi_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?> >
                                        <?php $pi_to = date_create($e->pi_to); echo date_format($pi_to,"m/d/Y"); ?>
                                    </td>
                                    <td class="tg-031e" <?php if ($e->pi_forapproval != 0 && $e->pi_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?> ><?php echo $e->pi_honors; ?></td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                                
                                <?php for ($i = $pds_educbg_cnt; $i <= 4; $i++) { ?>
                                <tr>
                                    <td class="tg-031e" colspan="2" style="height:41px;">&nbsp;</td>
                                    <td class="tg-031e"></td>
                                    <td class="tg-031e"></td>
                                    <td class="tg-031e"></td>
                                    <td class="tg-031e"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                </tr>
                                <?php } ?>
                                
                                
                                <tr>
                                    <td class="tg-baqh td_bg cnt" colspan="9">(Continue on separate sheet if necessary)</td>
                                </tr>
                                <tr>
                                    <td class="tg-lqy6" colspan="9">Page 1 of 4</td>
                                </tr>
                            </table>
                            
                                </div>
                            </div>
                          
                        </div>
                        
                        <div id="page2" class="tab-pane fade">
                            <br/>
                                <div class="row">
                                    <div class="col-sm-2 btn-print-section">
                                        <button id="pds_page1" onclick="printContent('page_2')" type="button" class="btn btn-primary form-control"><i class="glyphicon glyphicon-print"></i> Print</button>
                                    </div>
                                </div>
                          
                            <div id="page_2">
                                <div class="tg-wrap">
                                    <style>
                                    .tg td,.tg th{font-family:Arial,sans-serif;font-size:14.5px;border-style:solid;border-width:1px;overflow:hidden}.tg .tg-hsed,.tg .tg-le8v,.tg .tg-lqy6,.tg .tg-s4m5,.tg .tg-x5m0{vertical-align:top}.tg .tg-lqy6,.tg .tg-tkkh,.tg .tg-x5m0{text-align:right}.tg{border-collapse:collapse;border-spacing:0;margin:0 auto}.tg td{padding:4px 3px;border-color:#000;word-wrap:break-word;white-space:normal}.tg th{font-weight:400;padding:3px 0;word-break:normal}.cnt,.tg .tg-9e37,.tg .tg-hsed{font-weight:700}.tg .tg-x5m0{background-color:silver!important}.tg .tg-hsed{font-style:italic;background-color:#656565!important;color:#fff!important;border:1px solid #000;font-size:14.5px}.td_bg,.tg .tg-hy62,.tg .tg-le8v,.tg .tg-tkkh{background-color:silver!important}.b_top,.b_top_bottom{border-top:0!important}.b_bottom,.b_top_bottom{border-bottom:0!important}.b_left,.b_left_right{border-left:0!important}.b_left_right,.b_right{border-right:0!important}.tg .tg-s4m5{font-size:12px;font-family:Arial,Helvetica,sans-serif!important}.tg .tg-9e37,.tg .tg-i9x5{text-align:center;vertical-align:top}.cnt{color:red!important;font-size:12px!important}.l_content,.sqr{height:15px;width:15px;border:1px solid #000}.sqr{padding:1px;margin-right:6px}i.box{width:11px;height:11px;margin:0 5px;display:inline-block;border:1px solid}th.tg-031e{font-size:13.5px!important;line-height:1;padding:5px!important}.tg .tg-9e37{font-size:32px;font-family:"Arial Black",Gadget,sans-serif!important;padding:25px}.tg .tg-i9x5{background-color:#656565!important;color:#fff!important;border-color:#000}._ii .tg-0ord{text-align:right}._ii .tg-baqh,._iii .tg-baqh,._iii .tg-s6z2{text-align:center}._ii .tg-baqh,._ii .tg-yw4l{vertical-align:top}._iii .tg-baqh{vertical-align:top}._iii .tg-lqy6{text-align:right;vertical-align:top}._iii .tg-031e,._iv .tg-baqh,._iv .tg-s6z2,._v .tg-031e,._v .tg-0ord,._v .tg-baqh,._v .tg-s6z2{text-align:center}._iii .tg-031e,._iii .tg-yw4l{vertical-align:top}._iv .tg-baqh,._iv .tg-yw4l{vertical-align:top}._v .tg-baqh{vertical-align:top}._v .tg-lqy6{text-align:right;vertical-align:top}._v .tg-yw4l,.l_content,.l_title,.picture,.tg .tg-baqh,.tg .tg-s6z2{text-align:center}._v .tg-yw4l{vertical-align:top}.tg .tg-baqh{vertical-align:top}.ans{padding:5px 15px 5px!important}.tg .tg-yw4l{vertical-align:top}.l_section{padding:5px 20px 0!important}.l_content{border-bottom:0;min-height:25px;width:100%}.l_title,.picture,.thumbmark{border:1px solid #000}.l_title{background-color:silver!important}.thumbmark{height:128px;margin:10px 10px 0 0}._red{color:red!important}.picture{margin:10px 10px 0;min-height:227px;padding-top:45px}
                                    .border_ltr{border-top:4px solid #000;border-left:4px solid #000;border-right: 4px solid #000}
                                    .border_lrb{border-bottom:4px solid #000;border-left:4px solid #000;border-right: 4px solid #000}
                                    .border_lr{border-left:4px solid #000;border-right: 4px solid #000}
                                    .tg .tg-lqy6{font-size:12px}
                                    .29_min_height{height:45px!important}
                                    </style>
                                
                                     
                                    <table class="tg _iv border_ltr" style="width: 1062px; color:#000;">
                                <tr>
                                    <th class="tg-hsed" colspan="7">IV. CIVIL SERVICE ELIGIBILITY</th>
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_right" rowspan="2" style="width: 20px;">29.</td>
                                    <td class="tg-s6z2 td_bg b_left" rowspan="2">CAREER SERVICE/ RA 1080 (BOARD/ BAR)
                                        <br/>UNDER SPECIAL LAWS/ CES/ CSEE</td>
                                    <td class="tg-s6z2 td_bg" rowspan="2">RATING</td>
                                    <td class="tg-s6z2 td_bg" rowspan="2">DATE OF
                                        <br/>EXAMINATION /
                                        <br/> CONFERMENT</td>
                                    <td class="tg-s6z2 td_bg" rowspan="2">PLACE OF EXAMINATION / CONFERMENT</td>
                                    <td class="tg-baqh td_bg" colspan="2">LICENSE (if applicable)</td>
                                </tr>
                                <tr>
                                    <td class="tg-s6z2 td_bg">NUMBER</td>
                                    <td class="tg-s6z2 td_bg">DATE OF
                                        <br/>RELEASE</td>
                                </tr>
                                <?php 
                                if (isset($pds_elig)) {
                                    foreach ($pds_elig as $el) {
                                        switch ($el->el_forapproval) {
                                            case 1:
                                                $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup  style="color:red!important;">new</sup>)</span>';
                                            break;
                                            case 2:
                                                $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup style="color:red!important;">update</sup>)</span>';
                                            break;
                                            case 3:
                                                $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup style="color:red!important;">for delete</sup>)</span>';
                                            break;
                                            default:
                                                $txt = $el->el_career;
                                            break;
                                        }
                                ?>
                                    <tr <?php if ($el->el_forapproval != 0 && $el->el_forapproval != NULL) { ?> style="background-color:#ffdfdc;height:45px;text-align:center"<?php } else { ?>style="height:45px;text-align:center;"<?php } ?>>
                                        <td class="tg-031e" colspan="2" <?php if ($el->el_forapproval != 0 && $el->el_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?> ><?php echo $txt; ?></td>
                                        <td class="tg-031e"<?php if ($el->el_forapproval != 0 && $el->el_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?> ><?php echo $el->el_rating; ?></td>
                                        <td class="tg-031e" <?php if ($el->el_forapproval != 0 && $el->el_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?> ><?php $el_examdate = date_create($el->el_examdate); echo date_format($el_examdate,"m/d/Y"); ?></td>
                                        <td class="tg-031e" <?php if ($el->el_forapproval != 0 && $el->el_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?> ><?php echo $el->el_examplace; ?></td>
                                        <td class="tg-031e" <?php if ($el->el_forapproval != 0 && $el->el_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?> ><?php echo $el->el_number; ?></td>
                                        <td class="tg-031e" <?php if ($el->el_forapproval != 0 && $el->el_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?> ><?php $el_daterelease = date_create($el->el_daterelease); echo date_format($el_daterelease,"m/d/Y"); ?></td>
                                    </tr>
                                <?php 
                                    }
                                }
                                ?>
                                <?php for ($i = $pds_elig_cnt; $i <= 6; $i++) { ?>
                                <tr style="height:43px">
                                    <td class="tg-031e" colspan="2">&nbsp;</td>
                                    <td class="tg-031e"></td>
                                    <td class="tg-031e"></td>
                                    <td class="tg-031e"></td>
                                    <td class="tg-031e"></td>
                                    <td class="tg-031e"></td>
                                </tr>
                                <?php } ?>
                                
                                <tr>
                                    <td class="tg-s6z2 td_bg cnt" colspan="7">(Continue on separate sheet if necessary)</td>
                                </tr>
                            </table>
                                    
                                      
                                    <table class="tg _v border_lrb" style="width: 1062px; color:#000;">
                                <tr>
                                    <th class="tg-hsed" colspan="8">V. WORK EXPERIENCE (Include private employment.,Start from your current work)</th>
                                </tr>
                                <tr>
                                    <td class="tg-031e td_bg" colspan="2">30. INCLUSIVE DATES
                                        <br/>(mm/dd/yyyy)</td>
                                    <td class="tg-s6z2 td_bg" rowspan="2" style="width: 235px;">POSITION TITLE
                                        <br/>(Write in full)</td>
                                    <td class="tg-0ord td_bg" rowspan="2">DEPARTMENT / AGENCY / OFFICE /
                                        <br/>COMPANY
                                        <br/>(Write in full)</td>
                                    <td class="tg-0ord td_bg" rowspan="2" style="width:100px">MONTHLY
                                        <br/>SALARY</td>
                                    <td class="tg-s6z2 td_bg" rowspan="2" style="width: 105px; font-size: 13px;">SALARY
                                        <br/>GRADE &amp; STEP
                                        <br/> INCREMENT
                                        <br/>(Format "00-0")</td>
                                    <td class="tg-s6z2 td_bg" rowspan="2">STATUS OF
                                        <br/>APPOINTMENT</td>
                                    <td class="tg-s6z2 td_bg" rowspan="2">GOV'T
                                        <br/>SERVICE
                                        <br/>(Yes / No)</td>
                                </tr>
                                <tr>
                                    <td class="tg-s6z2 td_bg" style="width: 90px;">From</td>
                                    <td class="tg-s6z2 td_bg" style="width: 90px;">To</td>
                                </tr>
                                <?php 
                                if (isset($pds_workinfo)) {
                                    foreach ($pds_workinfo as $w) {
                                        switch ($w->p_forapproval) {
                                            case 1:
                                                $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup  style="color:red!important;">new</sup>)</span>';
                                            break;
                                            case 2:
                                                $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup style="color:red!important;">update</sup>)</span>';
                                            break;
                                            case 3:
                                                $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup style="color:red!important;">for delete</sup>)</span>';
                                            break;
                                            default:
                                                $p_from = date_create($w->p_from); 
                                                $txt =  date_format($p_from,"m/d/Y");
                                            break;
                                        }
                                ?>
                                <tr class="<?php echo $w->p_forapproval; ?>" <?php if ($w->p_forapproval != 0 && $w->p_forapproval != NULL) { ?> style="background-color: #ffdfdc;height: 44px;color: red;"<?php } else { ?>style="height:45px"<?php } ?> >
                                    <td class="tg-031e" <?php if ($w->p_forapproval != 0 && $w->p_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?>><?php echo $txt; ?></td>
                                    <td class="tg-031e" <?php if ($w->p_forapproval != 0 && $w->p_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?>>
                                        <?php
                                            $p_to = date_create($w->p_to);
                                            $get_y = date_format($p_to,"Y"); 
                                            if ($get_y == "1900") {
                                                echo "Present";
                                            } else {
                                                echo date_format($p_to,"Y/m/d"); 
                                            }
                                        ?>
                                    </td>
                                    <td class="tg-031e" <?php if ($w->p_forapproval != 0 && $w->p_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?> ><?php echo $w->p_position; ?></td>
                                    <td class="tg-031e" <?php if ($w->p_forapproval != 0 && $w->p_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?>><?php echo $w->p_company; ?></td>
                                    <td class="tg-031e" <?php if ($w->p_forapproval != 0 && $w->p_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?>>
                                        <?php
                                            //$w->p_salarymonthly = preg_replace("/[^0-9]/", "",$w->p_salarymonthly);
                                           // $p_salarymonthly = number_format(($w->p_salarymonthly),2);
                                            echo "P ".$w->p_salarymonthly;
                                        ?>
                                    </td>
                                    <td class="tg-031e" <?php if ($w->p_forapproval != 0 && $w->p_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?>>
                                        <?php
                                            $w->p_salarygrade !='Choose Grade' ? $w->p_salarygrade : '&nbsp;'; 
                                            $w->p_salarystep !='Choose Step' ? $w->p_salarystep : '&nbsp;'; 

                                            $w->p_salarygrade = str_replace("Choose","1",$w->p_salarygrade);
                                            $w->p_salarystep = str_replace("Choose","1",$w->p_salarystep);
                                            $w->p_salarystep = str_replace("No","1",$w->p_salarystep);

                                            if ($w->p_salarygrade != "") {
                                                echo str_replace("Grade","",$w->p_salarygrade).'/'.str_replace("Step","",$w->p_salarystep);
                                            }
                                            
                                        ?>
                                    </td>
                                    <td class="tg-031e" <?php if ($w->p_forapproval != 0 && $w->p_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?>><?php echo $w->p_appointment; ?></td>
                                    <td class="tg-031e" <?php if ($w->p_forapproval != 0 && $w->p_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php } ?>><?php echo $w->p_isgovt; ?></td>
                                </tr>
                                <?php 
                                    }
                                }
                                ?>
                                
                                <?php for ($i = $pds_workinfo_cnt; $i <= 19; $i++) { ?>
                                <tr style="height:43px">
                                    <td class="tg-031e">&nbsp;</td>
                                    <td class="tg-031e"></td>
                                    <td class="tg-031e"></td>
                                    <td class="tg-031e"></td>
                                    <td class="tg-031e"></td>
                                    <td class="tg-031e"></td>
                                    <td class="tg-031e"></td>
                                    <td class="tg-031e"></td>
                                </tr>
                                <?php } ?>
                               
                                <tr>
                                    <td class="tg-baqh td_bg cnt" colspan="8">(Continue on separate sheet if necessary)</td>
                                </tr>
                                <tr>
                                    <td class="tg-lqy6" colspan="8">CS FORM 212 (Revised 2005), Page 2 of 4</td>
                                </tr>
                                
                            </table>
                                <div style="text-align: right!important;padding: 5px 5px 0 0!important;"><?php echo $a_firstname.' '.$a_middlename.' '.$a_lastname.' '.$a_namext; ?></div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="page3" class="tab-pane fade">
                            <br/>
                                <div class="row">
                                    <div class="col-sm-2 btn-print-section">
                                        <button id="pds_page1" onclick="printContent('page_3')" type="button" class="btn btn-primary form-control"><i class="glyphicon glyphicon-print"></i> Print</button>
                                    </div>
                                </div>
                            
                            
                            <div id="page_3">
                                <div class="tg-wrap">
                                    <style>
                                    .tg td,.tg th{font-family:Arial,sans-serif;font-size:14.5px;border-style:solid;border-width:1px;overflow:hidden}.tg .tg-hsed,.tg .tg-le8v,.tg .tg-lqy6,.tg .tg-s4m5,.tg .tg-x5m0{vertical-align:top}.tg .tg-lqy6,.tg .tg-tkkh,.tg .tg-x5m0{text-align:right}.tg{border-collapse:collapse;border-spacing:0;margin:0 auto}.tg td{padding:4px 3px;border-color:#000;word-wrap:break-word;white-space:normal}.tg th{font-weight:400;padding:3px 0;word-break:normal}.cnt,.tg .tg-9e37,.tg .tg-hsed{font-weight:700}.tg .tg-x5m0{background-color:silver!important}.tg .tg-hsed{font-style:italic;background-color:#656565!important;color:#fff!important;border:1px solid #000;font-size:14.5px}.td_bg,.tg .tg-hy62,.tg .tg-le8v,.tg .tg-tkkh{background-color:silver!important}.b_top,.b_top_bottom{border-top:0!important}.b_bottom,.b_top_bottom{border-bottom:0!important}.b_left,.b_left_right{border-left:0!important}.b_left_right,.b_right{border-right:0!important}.tg .tg-s4m5{font-size:12px;font-family:Arial,Helvetica,sans-serif!important}.tg .tg-9e37,.tg .tg-i9x5{text-align:center;vertical-align:top}.cnt{color:red!important;font-size:12px!important}.l_content,.sqr{height:15px;width:15px;border:1px solid #000}.sqr{padding:1px;margin-right:6px}i.box{width:11px;height:11px;margin:0 5px;display:inline-block;border:1px solid}th.tg-031e{font-size:13.5px!important;line-height:1;padding:5px!important}.tg .tg-9e37{font-size:32px;font-family:"Arial Black",Gadget,sans-serif!important;padding:25px}.tg .tg-i9x5{background-color:#656565!important;color:#fff!important;border-color:#000}._ii .tg-0ord{text-align:right}._ii .tg-baqh,._iii .tg-baqh,._iii .tg-s6z2{text-align:center}._ii .tg-baqh,._ii .tg-yw4l{vertical-align:top}._iii .tg-baqh{vertical-align:top}._iii .tg-lqy6{text-align:right;vertical-align:top}._iii .tg-031e,._iv .tg-baqh,._iv .tg-s6z2,._v .tg-031e,._v .tg-0ord,._v .tg-baqh,._v .tg-s6z2{text-align:center}._iii .tg-031e,._iii .tg-yw4l{vertical-align:top}._iv .tg-baqh,._iv .tg-yw4l{vertical-align:top}._v .tg-baqh{vertical-align:top}._v .tg-lqy6{text-align:right;vertical-align:top}._v .tg-yw4l,.l_content,.l_title,.picture,.tg .tg-baqh,.tg .tg-s6z2{text-align:center}._v .tg-yw4l{vertical-align:top}.tg .tg-baqh{vertical-align:top}.ans{padding:5px 15px 5px!important}.tg .tg-yw4l{vertical-align:top}.l_section{padding:5px 20px 0!important}.l_content{border-bottom:0;min-height:25px;width:100%}.l_title,.picture,.thumbmark{border:1px solid #000}.l_title{background-color:silver!important}.thumbmark{height:128px;margin:10px 10px 0 0}._red{color:red!important}.picture{margin:10px 10px 0;min-height:227px;padding-top:45px}
                                    .border_ltr{border-top:4px solid #000;border-left:4px solid #000;border-right: 4px solid #000}
                                    .border_lrb{border-bottom:4px solid #000;border-left:4px solid #000;border-right: 4px solid #000}
                                    .border_lr{border-left:4px solid #000;border-right: 4px solid #000}
                                    .tg .tg-lqy6{font-size:12px}
                                    </style>
                                
                                    
                                    <table class="tg border_ltr" style="width: 1062px; color:#000;">
                              <tr>
                                <th class="tg-hsed" colspan="6">VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S</th>
                              </tr>
                              <tr>
                                <td class="tg-yw4l td_bg b_right" rowspan="2" style="width: 20px;">31.</td>
                                <td class="tg-s6z2 td_bg b_left" rowspan="2">NAME &amp; ADDRESS OF ORGANIZATION<br/>(Write in full)</td>
                                <td class="tg-s6z2 td_bg" colspan="2">INCLUSIVE DATES<br/>(mm/dd/yyyy)</td>
                                <td class="tg-s6z2 td_bg" rowspan="2" style="width: 80px;">NUMBER OF HOURS</td>
                                <td class="tg-s6z2 td_bg" rowspan="2">POSITION / NATURE OF WORK</td>
                              </tr>
                              <tr>
                                <td class="tg-s6z2 td_bg" style="width: 90px;">From</td>
                                <td class="tg-s6z2 td_bg" style="width: 90px;">To</td>
                              </tr>
                              
                              <?php 
                                if (isset($pds_vwork)) {
                                    foreach ($pds_vwork as $vw) {
                                        switch ($vw->vw_forapproval) {
                                            case 1:
                                                $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup  style="color:red!important;">new</sup>)</span>';
                                            break;
                                            case 2:
                                                $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup style="color:red!important;">update</sup>)</span>';
                                            break;
                                            case 3:
                                                $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup style="color:red!important;">for delete</sup>)</span>';
                                            break;
                                            default:
                                                $txt = $vw->vw_name;
                                            break;
                                        }
                                ?>
                                    <tr <?php if ($vw->vw_forapproval != 0 && $vw->vw_forapproval != NULL) { ?> style="background-color: #ffdfdc;color:red;height:45px;text-align:center;"<?php } else { ?>style="height:45px;text-align:center"<?php } ?>>
                                        <td class="tg-031e" colspan="2" <?php if ($vw->vw_forapproval != 0 && $vw->vw_forapproval != NULL) { ?> style="color:red!important;font-style:italic;text-align:left;"<?php } else { ?>style="text-align:left;"<?php }?>><?php echo $txt; ?></td>
                                        <td class="tg-031e" <?php if ($vw->vw_forapproval != 0 && $vw->vw_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php }?> ><?php $vw_datefrom = date_create($vw->vw_datefrom); echo date_format($vw_datefrom,"m/d/Y"); ?></td>
                                        <td class="tg-031e" <?php if ($vw->vw_forapproval != 0 && $vw->vw_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php }?>><?php $vw_dateto = date_create($vw->vw_dateto); echo date_format($vw_dateto,"m/d/Y"); ?></td>
                                        <td class="tg-031e" <?php if ($vw->vw_forapproval != 0 && $vw->vw_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php }?>><?php echo $vw->vw_nohours; ?></td>
                                        <td class="tg-031e"  <?php if ($vw->vw_forapproval != 0 && $vw->vw_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php }?>><?php echo $vw->vw_work; ?></td>
                                    </tr>
                                <?php 
                                    }
                                }
                                ?>
                              
                              <?php for ($i = $pds_vwork_cnt; $i <= 4; $i++) { ?>
                                <tr style="height:43px">
                                    <td class="tg-yw4l" colspan="2">&nbsp;</td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                  </tr>
                                <?php } ?>
                              
                              <tr>
                                <td class="tg-baqh td_bg cnt" colspan="6">(Continue on separate sheet if necessary)</td>
                              </tr>
                              <tr>
                                <td class="tg-hsed" colspan="6">VII. TRAINING PROGRAMS (Start from the most recent training.)</td>
                              </tr>
                              <tr>
                                <td class="tg-yw4l td_bg b_right" rowspan="2">32.</td>
                                <td class="tg-s6z2 td_bg b_left" rowspan="2">TITLE OF SEMINAR/CONFERENCE/WORKSHOP/SHORT <br/>COURSES (Write in full)</td>
                                <td class="tg-baqh td_bg" colspan="2">INCLUSIVE DATES OF ATTENDANCE<br/>(mm/dd/yyyy)</td>
                                <td class="tg-s6z2 td_bg" rowspan="2">NUMBER OF HOURS</td>
                                <td class="tg-s6z2 td_bg" rowspan="2">CONDUCTED/ SPONSORED BY<br/>(Write in full)</td>
                              </tr>
                              <tr>
                                <td class="tg-baqh td_bg">From</td>
                                <td class="tg-baqh td_bg">To</td>
                              </tr>
                              <?php 
                                if (isset($pds_training)) {
                                    foreach ($pds_training as $tr) {
                                        switch ($tr->t_forapproval) {
                                            case 1:
                                                $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup  style="color:red!important;">new</sup>)</span>';
                                            break;
                                            case 2:
                                                $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup style="color:red!important;">update</sup>)</span>';
                                            break;
                                            case 3:
                                                $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup style="color:red!important;">for delete</sup>)</span>';
                                            break;
                                            default:
                                                $txt = $tr->t_seminar;
                                            break;
                                        }
                                ?>
                                    <tr <?php if ($tr->t_forapproval != 0 && $tr->t_forapproval != NULL) { ?> style="background-color: #ffdfdc;color:red;height:45px;text-align:center;"<?php } else { ?>style="height:45px;text-align:center"<?php } ?>>
                                        <td class="tg-031e" colspan="2" <?php if ($tr->t_forapproval != 0 && $tr->t_forapproval != NULL) { ?> style="color:red!important;font-style:italic;text-align:left;"<?php } else { ?>style="text-align:left;"<?php }?>><?php echo $txt; ?></td>
                                        <td class="tg-031e" <?php if ($tr->t_forapproval != 0 && $tr->t_forapproval != NULL) { ?> style="color:red!important;font-style:italic;text-align:left;"<?php }?> ><?php $t_from = date_create($tr->t_from); echo date_format($t_from,"m/d/Y"); ?></td>
                                        <td class="tg-031e" <?php if ($tr->t_forapproval != 0 && $tr->t_forapproval != NULL) { ?> style="color:red!important;font-style:italic;text-align:left;"<?php }?>><?php $t_to = date_create($tr->t_to); echo date_format($t_to,"m/d/Y"); ?></td>
                                        <td class="tg-031e" <?php if ($tr->t_forapproval != 0 && $tr->t_forapproval != NULL) { ?> style="color:red!important;font-style:italic;text-align:left;"<?php }?>><?php echo $tr->t_hoursno; ?></td>
                                        <td class="tg-031e" <?php if ($tr->t_forapproval != 0 && $tr->t_forapproval != NULL) { ?> style="color:red!important;font-style:italic;text-align:left;"<?php }?>><?php echo $tr->t_conductor; ?></td>
                                    </tr>
                                <?php
                                    }
                                }
                                ?>
                                
                                <?php for ($i = $pds_training_cnt; $i <= 13; $i++) { ?>
                                <tr style="height:43px">
                                    <td class="tg-yw4l" colspan="2">&nbsp;</td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                  </tr>
                                <?php } ?>
                              
                              
                             
                              <tr>
                                <td class="tg-baqh td_bg cnt" colspan="6">(Continue on separate sheet if necessary)</td>
                              </tr>
                            </table>
                                
                                    <style type="text/css">
                                        .tg .tg-s6z2{text-align:center}
                                        .tg .tg-baqh{text-align:center;vertical-align:top}
                                        .tg .tg-lqy6{text-align:right;vertical-align:top}
                                        .tg .tg-yw4l{vertical-align:top}
                                    </style>
                                        <table class="tg border_lrb" style="width: 1062px; color:#000;">
                                          <tr>
                                            <th class="tg-hsed" colspan="6">VIII. OTHER INFORMATION</th>
                                          </tr>
                                          <tr>
                                            <td class="tg-yw4l td_bg b_right" style="width: 20px;">33.</td>
                                            <td class="tg-s6z2 td_bg b_left" style="width: 330px;">SPECIAL SKILLS / HOBBIES:</td>
                                            <td class="tg-yw4l td_bg b_right" style="width: 20px;">34.</td>
                                            <td class="tg-s6z2 td_bg b_left">NON-ACADEMIC DISTINCTIONS / RECOGNITION:<br/>(Write in full)</td>
                                            <td class="tg-yw4l td_bg b_right" style="width: 20px;">35.</td>
                                            <td class="tg-baqh td_bg b_left">MEMBERSHIP IN ASSOCIATION/ORGANIZATION<br/>(Write in full)</td>
                                          </tr>
                                          
                                        <?php 
                                            if (isset($pds_skills)) {
                                                foreach ($pds_skills as $sk) {
                                                    switch ($sk->sh_forapproval) {
                                                        case 1:
                                                            $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup  style="color:red!important;">new</sup>)</span>';
                                                        break;
                                                        case 2:
                                                            $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup style="color:red!important;">update</sup>)</span>';
                                                        break;
                                                        case 3:
                                                            $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup style="color:red!important;">for delete</sup>)</span>';
                                                        break;
                                                        default:
                                                            $txt = $sk->sh_skills;
                                                        break;
                                                    }
                                        ?>
                                          
                                          <tr <?php if ($sk->sh_forapproval != 0 && $sk->sh_forapproval != NULL) { ?> style="background-color: #ffdfdc;color:red;height:45px;text-align:center;"<?php } else { ?>style="height:45px;text-align:center"<?php } ?>>
                                            <td class="tg-031e" colspan="2" <?php if ($sk->sh_forapproval != 0 && $sk->sh_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php }?>><?php echo $txt; ?></td>
                                            <td class="tg-031e" colspan="2" <?php if ($sk->sh_forapproval != 0 && $sk->sh_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php }?>><?php echo $sk->sh_nonacademic; ?></td>
                                            <td class="tg-yw4l" colspan="2" <?php if ($sk->sh_forapproval != 0 && $sk->sh_forapproval != NULL) { ?> style="color:red!important;font-style:italic;"<?php }?>><?php echo $sk->sh_membership; ?></td>
                                          </tr>
                                         <?php
                                                }
                                            }
                                         ?> 
                                         
                                
                                        <?php for ($i = $pds_skills_cnt; $i <= 4; $i++) { ?>
                                         <tr style="height:43px">
                                            <td class="tg-031e" colspan="2">&nbsp;</td>
                                            <td class="tg-031e" colspan="2"></td>
                                            <td class="tg-yw4l" colspan="2"></td>
                                          </tr>
                                        <?php } ?>
        
                                          <tr>
                                            <td class="tg-baqh td_bg cnt" colspan="6">(Continue on separate sheet if necessary)</td>
                                          </tr>
                                          <tr>
                                            <td class="tg-lqy6" colspan="6">CS FORM 212 (Revised 2005), Page 3 of 4</td>
                                          </tr>
                                        </table>
                                
                                    <div style="text-align: right;padding: 5px 5px 0 0;"><?php echo $a_firstname.' '.$a_middlename.' '.$a_lastname.' '.$a_namext; ?></div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="page4" class="tab-pane fade">
                            <br/>
                            <div class="row">
                                <div class="col-sm-2 btn-print-section">
                                    <button id="pds_page1" onclick="printContent('page_4')" type="button" class="btn btn-primary form-control"><i class="glyphicon glyphicon-print"></i> Print</button>
                                </div>
                            </div>
                            
                            
                            <div id="page_4">
                                <div class="tg-wrap">
                                    <style>
                                    .tg td,.tg th{font-family:Arial,sans-serif;font-size:14.5px;border-style:solid;border-width:1px;overflow:hidden}.tg .tg-hsed,.tg .tg-le8v,.tg .tg-lqy6,.tg .tg-s4m5,.tg .tg-x5m0{vertical-align:top}.tg .tg-lqy6,.tg .tg-tkkh,.tg .tg-x5m0{text-align:right}.tg{border-collapse:collapse;border-spacing:0;margin:0 auto}.tg td{padding:4px 3px;border-color:#000;word-wrap:break-word;white-space:normal}.tg th{font-weight:400;padding:3px 0;word-break:normal}.cnt,.tg .tg-9e37,.tg .tg-hsed{font-weight:700}.tg .tg-x5m0{background-color:silver!important}.tg .tg-hsed{font-style:italic;background-color:#656565!important;color:#fff!important;border:1px solid #000;font-size:14.5px}.td_bg,.tg .tg-hy62,.tg .tg-le8v,.tg .tg-tkkh{background-color:silver!important}.b_top,.b_top_bottom{border-top:0!important}.b_bottom,.b_top_bottom{border-bottom:0!important}.b_left,.b_left_right{border-left:0!important}.b_left_right,.b_right{border-right:0!important}.tg .tg-s4m5{font-size:12px;font-family:Arial,Helvetica,sans-serif!important}.tg .tg-9e37,.tg .tg-i9x5{text-align:center;vertical-align:top}.cnt{color:red!important;font-size:12px!important}.l_content,.sqr{height:15px;width:15px;border:1px solid #000}.sqr{padding:1px;margin-right:6px}i.box{width:11px;height:11px;margin:0 5px;display:inline-block;border:1px solid}th.tg-031e{font-size:13.5px!important;line-height:1;padding:5px!important}.tg .tg-9e37{font-size:32px;font-family:"Arial Black",Gadget,sans-serif!important;padding:25px}.tg .tg-i9x5{background-color:#656565!important;color:#fff!important;border-color:#000}._ii .tg-0ord{text-align:right}._ii .tg-baqh,._iii .tg-baqh,._iii .tg-s6z2{text-align:center}._ii .tg-baqh,._ii .tg-yw4l{vertical-align:top}._iii .tg-baqh{vertical-align:top}._iii .tg-lqy6{text-align:right;vertical-align:top}._iii .tg-031e,._iv .tg-baqh,._iv .tg-s6z2,._v .tg-031e,._v .tg-0ord,._v .tg-baqh,._v .tg-s6z2{text-align:center}._iii .tg-031e,._iii .tg-yw4l{vertical-align:top}._iv .tg-baqh,._iv .tg-yw4l{vertical-align:top}._v .tg-baqh{vertical-align:top}._v .tg-lqy6{text-align:right;vertical-align:top}._v .tg-yw4l,.l_content,.l_title,.picture,.tg .tg-baqh,.tg .tg-s6z2{text-align:center}._v .tg-yw4l{vertical-align:top}.tg .tg-baqh{vertical-align:top}.ans{padding:5px 15px 5px!important}.tg .tg-yw4l{vertical-align:top}.l_section{padding:5px 20px 0!important}.l_content{border-bottom:0;min-height:25px;width:100%}.l_title,.picture,.thumbmark{border:1px solid #000}.l_title{background-color:silver!important}.thumbmark{height:128px;margin:10px 10px 0 0}._red{color:red!important}.picture{margin:10px 10px 0;min-height:227px;padding-top:45px}
                                    .border_ltr{border-top:4px solid #000;border-left:4px solid #000;border-right: 4px solid #000}
                                    .border_lrb{border-bottom:4px solid #000;border-left:4px solid #000;border-right: 4px solid #000}
                                    .border_lr{border-left:4px solid #000;border-right: 4px solid #000}
                                    .tg .tg-lqy6{font-size:12px}
                                    </style>
                                    <?php 
                                        if (!empty($pds_ques)) {
                                            foreach ($pds_ques as $q) {
                                                $q_36_a = $q->q_36_a;
                                                $q_36_a_details = $q->q_36_a_details;
                                                $q_36_b = $q->q_36_b;
                                                $q_36_b_details = $q->q_36_b_details;

                                                $q_37_a = $q->q_37_a;
                                                $q_37_a_details = $q->q_37_a_details;
                                                $q_37_b = $q->q_37_b;
                                                $q_37_b_details = $q->q_37_b_details;

                                                $q_38 = $q->q_38;
                                                $q_38_details = $q->q_38_details;

                                                $q_39 = $q->q_39;
                                                $q_39_details = $q->q_39_details;

                                                $q_40 = $q->q_40;
                                                $q_40_details = $q->q_40_details;

                                                $q_41_a = $q->q_41_a;
                                                $q_41_a_details = $q->q_41_a_details;
                                                $q_41_b = $q->q_41_b;
                                                $q_41_b_details = $q->q_41_b_details;
                                                $q_41_c = $q->q_41_c;
                                                $q_41_c_details = $q->q_41_c_details;
                                            }
                                         
                                        } else {
                                             $q_36_a ='';
                                                $q_36_a_details ='';
                                                $q_36_b = '';
                                                $q_36_b_details = '';
                                                $q_37_a = '';
                                                $q_37_a_details = '';
                                                $q_37_b = '';
                                                $q_37_b_details = '';
                                                $q_38 = '';
                                                $q_38_details = '';
                                                $q_39 = '';
                                                $q_39_details = '';
                                                $q_40 = '';
                                                $q_40_details = '';
                                                $q_41_a = '';
                                                $q_41_a_details = '';
                                                $q_41_b = '';
                                                $q_41_b_details = '';
                                                $q_41_c = '';
                                                $q_41_c_details = '';
                                        }
                                    ?>

                                       
                           <table class="tg border_ltr" style="width: 1062px; color:#000;">
                                <tr>
                                    <th class="tg-yw4l td_bg b_right b_bottom" style="width: 20px;">&nbsp;36.</th>
                                    <th class="tg-yw4l td_bg b_left b_bottom" colspan="2"> &nbsp;Are you related by consanguinity or affinity to any of the following :</th>
                                    <th class="tg-yw4l b_bottom" style="width: 324px;"></th>
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_top_bottom b_right"></td>
                                    <td class="tg-yw4l td_bg b_left_right b_top_bottom" style="width: 20px;">a.</td>
                                    <td class="tg-yw4l td_bg b_left_right b_top_bottom">Within the third degree (for National Government Employees): appointing authority, recommending authority, chief of office/bureau/departmentor person who has immediate supervision over you in the Office, Bureau or Department where you will be appointed?</td>
                                    <td class="tg-yw4l b_top_bottom ans">
                                        <span class="glyphicon <?php if ($q_36_a == 'Yes') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span>Yes &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="glyphicon <?php if ($q_36_a == 'No') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span>No
                                        <br/> If YES, give details: 
                                        <p class="q_ans"><?php if ($q_36_a == 'Yes') { echo $q_36_a_details; } ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_top_bottom b_right"></td>
                                    <td class="tg-yw4l td_bg b_top_bottom b_left_right">b</td>
                                    <td class="tg-yw4l td_bg b_top_bottom b_left_right">Within the fourth degree (for Local Government Employees): appointing authority or recommending authority where you will be appointed?</td>
                                    <td class="tg-yw4l b_top_bottom ans">
                                        <span class="glyphicon <?php if ($q_36_b == 'Yes') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span>Yes &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="glyphicon <?php if ($q_36_b == 'No') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span>No
                                        <br/> If YES, give details: 
                                        <p class="q_ans"><?php if ($q_36_b == 'Yes') { echo $q_36_b_details; } ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_right b_bottom">37.</td>
                                    <td class="tg-yw4l td_bg b_left_right b_bottom">a.</td>
                                    <td class="tg-yw4l td_bg b_left b_bottom">Have you ever been formally charged?</td>
                                    <td class="tg-yw4l ans b_bottom">
                                        <span class="glyphicon <?php if ($q_37_a == 'Yes') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span>Yes &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="glyphicon <?php if ($q_37_a == 'No') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span>No
                                        <br/> If YES, give details: 
                                        <p class="q_ans1"><?php if ($q_37_a == 'Yes') { echo $q_37_a_details; } ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_right b_top"></td>
                                    <td class="tg-yw4l td_bg b_left_right b_top">b.</td>
                                    <td class="tg-yw4l td_bg b_top b_left">Have you ever been guilty of any administrative offense?</td>
                                    <td class="tg-yw4l ans b_top">
                                        <span class="glyphicon <?php if ($q_37_b == 'Yes') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span>Yes &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="glyphicon <?php if ($q_37_b == 'No') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span>No
                                        <br/> If YES, give details: 
                                        <p class="q_ans1"><?php if ($q_37_b == 'Yes') { echo $q_37_b_details; } ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_right">38.</td>
                                    <td class="tg-yw4l td_bg b_left" colspan="2">Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</td>
                                    <td class="tg-yw4l ans">
                                        <span class="glyphicon <?php if ($q_38 == 'Yes') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span>Yes &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="glyphicon <?php if ($q_38 == 'No') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span>No
                                        <br/> If YES, give details: 
                                        <p class="q_ans1"><?php if ($q_38 == 'Yes') { echo $q_38_details; } ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_right">39.</td>
                                    <td class="tg-yw4l td_bg b_left" colspan="2">Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract, AWOL or phased out, in the public or private sector?</td>
                                    <td class="tg-yw4l ans">
                                        <span class="glyphicon <?php if ($q_39 == 'Yes') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span>Yes &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="glyphicon <?php if ($q_39 == 'No') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span>No
                                        <br/> If YES, give details: 
                                        <p class="q_ans1"><?php if ($q_39 == 'Yes') { echo $q_39_details; } ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_right">40.</td>
                                    <td class="tg-yw4l td_bg b_left" colspan="2">Have you ever been a candidate in a national or local election (except Barangay election)?</td>
                                    <td class="tg-yw4l ans">
                                        <span class="glyphicon <?php if ($q_40 == 'Yes') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span>Yes &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="glyphicon <?php if ($q_40 == 'No') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span>No
                                        <br/> If YES, give details: 
                                        <p class="q_ans1"><?php if ($q_40 == 'Yes') { echo $q_40_details; } ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_right b_bottom">41.</td>
                                    <td class="tg-yw4l td_bg b_left b_bottom" colspan="2">Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</td>
                                    <td class="tg-yw4l b_bottom"></td>
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_top_bottom b_right"></td>
                                    <td class="tg-yw4l td_bg b_left_right b_top_bottom">a.</td>
                                    <td class="tg-yw4l td_bg b_left_right b_top_bottom">Are you a member of any indigenous group?</td>
                                    <td class="tg-yw4l b_top_bottom ans">
                                        <span class="glyphicon <?php if ($q_41_a == 'Yes') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span>Yes &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="glyphicon <?php if ($q_41_a == 'No') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span>No
                                        <br/> If YES, give details: 
                                        <p class="q_ans2"><?php if ($q_41_a == 'Yes') { echo $q_41_a_details; } ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_top_bottom b_right"></td>
                                    <td class="tg-yw4l td_bg b_left_right b_top_bottom">b.</td>
                                    <td class="tg-yw4l td_bg b_left_right b_top_bottom">Are you differently abled?</td>
                                    <td class="tg-yw4l b_top_bottom ans">
                                        <span class="glyphicon <?php if ($q_41_b == 'Yes') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span>Yes &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="glyphicon <?php if ($q_41_b == 'No') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span>No
                                        <br/> If YES, give details: 
                                        <p class="q_ans2"><?php if ($q_41_b == 'Yes') { echo $q_41_b_details; } ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-yw4l td_bg b_top b_right"></td>
                                    <td class="tg-yw4l td_bg b_left_right b_top">c.</td>
                                    <td class="tg-yw4l td_bg b_top b_left">Are you a solo parent?</td>
                                    <td class="tg-yw4l b_top ans">
                                        <span class="glyphicon <?php if ($q_41_c == 'Yes') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span>Yes &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="glyphicon <?php if ($q_41_c == 'No') { echo "glyphicon-ok"; } ?> sqr" aria-hidden="true"></span>No
                                        <br/> If YES, give details: 
                                        <p class="q_ans2"><?php if ($q_41_c == 'Yes') { echo $q_41_c_details; } ?></p>
                                    </td>
                                </tr>
                            </table>

                              <table class="tg border_lrb" style="width: 1062px; color:#000;">
                                <tr>
                                    <th class="tg-s6z2 td_bg b_right" style="width: 20px;">42.</th>
                                    <th class="tg-yw4l td_bg b_left" colspan="4">REFERENCES <span class="_red">(Person not related by consanguinity or affinity to applicant / appointee)</span></th>
                                </tr>
                                <tr>
                                    <td class="tg-s6z2 td_bg" colspan="2">NAME</td>
                                    <td class="tg-s6z2 td_bg" style="width: 300px;">ADDRESS</td>
                                    <td class="tg-s6z2 td_bg" style="width: 120px;">TEL. NO.</td>
                                    <td class="tg-yw4l" style="width: 220px;height: 270px; text-align:center;" rowspan="6">
                                        <div class="picture">
                                            ID picture taken within<br/>
                                            the last  6 months<br/>
                                            3.5 cm. X 4.5 cm<br/>
                                            (passport size)<br/><br/>
                                            
                                            Computer generated <br/>
                                            or xerox copy of picture <br/>
                                            is not acceptable
                                        </div>
                                        PHOTO
                                    </td>
                                </tr>
                                
                                    <?php 
                                            if (isset($pds_ref)) {
                                                foreach ($pds_ref as $ref) {
                                                    switch ($ref->r_forapproval) {
                                                        case 1:
                                                            $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup  style="color:red!important;">new</sup>)</span>';
                                                        break;
                                                        case 2:
                                                            $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup style="color:red!important;">update</sup>)</span>';
                                                        break;
                                                        case 3:
                                                            $txt = '<span style="color:red!important;font-size:12px!important;font-weight:bold;font-style:italic!important;">(pending <sup style="color:red!important;">for delete</sup>)</span>';
                                                        break;
                                                        default:
                                                            $txt = $ref->r_name;
                                                        break;
                                                    }
                                        ?>
                                          
                                          <tr <?php if ($ref->r_forapproval != 0 && $ref->r_forapproval != NULL) { ?> style="background-color: #ffdfdc;color:red;"<?php } ?>>
                                            <td class="tg-031e" colspan="2" <?php if ($ref->r_forapproval != 0 && $ref->r_forapproval != NULL) { ?> style="padding: 0 10px;color:red!important;font-style:italic;"<?php } else { ?> style="padding: 0 10px;"<?php } ?>><?php echo $txt; ?></td>
                                            <td class="tg-031e" <?php if ($ref->r_forapproval != 0 && $ref->r_forapproval != NULL) { ?> style="font-size: 12px; padding: 0 10px;color:red !important;font-style:italic;"<?php } else { ?> style="font-size: 12px; padding: 0 10px;"<?php } ?>><?php echo $ref->r_address; ?></td>
                                            <td class="tg-031e" <?php if ($ref->r_forapproval != 0 && $ref->r_forapproval != NULL) { ?> style="padding: 0 10px;color:red!important;font-style:italic;"<?php } else { ?> style="padding: 0 10px;"<?php } ?>><?php echo $ref->r_contactnum; ?></td>
                                        </tr>
                                         <?php
                                                }
                                            }
                                         ?>
                                                
                                        <?php for ($i = $pds_ref_cnt; $i <= 2; $i++) { ?>
                                         <tr>
                                            <td class="tg-031e" colspan="2" style="padding: 0 10px;">&nbsp;</td>
                                            <td class="tg-031e" style="padding: 0 10px;"></td>
                                            <td class="tg-031e" style="padding: 0 10px;"></td>
                                          </tr>
                                        <?php } ?>
                               
                                <tr>
                                    <td class="tg-yw4l td_bg b_right b_bottom">43.</td>
                                    <td class="tg-yw4l td_bg b_left b_bottom" colspan="3">I declare under oath that this Personal Data Sheet has been accomplished by me, and is a true, correct and complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the Philippines.</td>
                                </tr>
                                <tr>
                                    <td class="tg-031e td_bg b_top b_right"></td>
                                    <td class="tg-031e td_bg b_left b_top" colspan="3">I also authorize the agency head / authorized representative to verify / validate the contents stated herein.,I trust that,this information shall remain confidential.</td>
                                </tr>
                                <tr>
                                    <td class="tg-yw4l l_section b_bottom b_right" colspan="2" style="padding-top: 10px !important; padding-right: 7px !important;">
                                        <div class="l_content"></div>
                                        <div class="l_title">COMMUNITY TAX CERTIFICATE NO.</div>
                                    </td>
                                    <td class="tg-yw4l l_section b_bottom b_left_right" colspan="2" rowspan="2" style="padding-top: 10px !important; padding-left: 7px !important; padding-right: 7px !important;">
                                        <div class="l_content" style="min-height: 80px;"></div>
                                        <div class="l_title">SIGNATURE <span class="_red">(Sign inside the box)</span></div>
                                    </td>
                                    <td class="tg-s6z2 b_left" rowspan="3" style="padding-top:0!important;">
                                        <div class="thumbmark" style="margin-top:0!important;">
                                        
                                        </div>
                                        RIGHT THUMBMARK
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-yw4l l_section b_top_bottom b_right" colspan="2" style="padding-right: 7px !important;">
                                        <div class="l_content"></div>
                                        <div class="l_title">ISSUED AT</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-yw4l l_section b_top b_right" colspan="2" style="padding-bottom: 10px !important; padding-right: 7px !important;">
                                        <div class="l_content"></div>
                                        <div class="l_title">ISSUED ON (mm/dd/yyyy)</div>
                                    </td>
                                    <td class="tg-yw4l l_section b_top b_left_right" colspan="2" style="padding-left: 7px !important; padding-right: 7px !important;">
                                        <div class="l_content"></div>
                                        <div class="l_title">DATE ACCOMPLISHED</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-lqy6" colspan="5">CS FORM 212 (Revised 2005),,Page 4 of 4</td>
                                  </tr>
                            </table>
                                    <div style="text-align: right;padding:0 22px 0px 0px!important;"><?php echo $a_firstname.' '.$a_middlename.' '.$a_lastname.' '.($a_namext != 'N/A' ? $a_namext : ''); ?></div>
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
