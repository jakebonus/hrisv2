        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="padding: 10px 0;">
                       
                 <?php 
                    if (isset($result)) {
                        foreach ($result as $r) {
                            $a_lastname = $r->a_lastname;
                            $a_firstname = $r->a_firstname;
                            $a_middlename = $r->a_middlename;
                            $pi_birthdate = $r->pi_birthdate;
                            $pi_birthplace = $r->pi_birthplace;
                        }
                    }
                    ?>

            
                <div class="col-sm-2">
                    <button id="onload_click" onclick="printContent('print_servicerecord')" type="button" class="btn btn-primary form-control"><i class="glyphicon glyphicon-print"></i> Print</button>
                </div>
           

            <div id="print_servicerecord">
                <style type="text/css">
                    .tg {
                        border-collapse: collapse;
                        border-spacing: 0;
                        margin: 0px auto;
                    }
                    
                    .tg p,
                    .tg strong {
                        font-family: Arial, sans-serif;
                        font-size: 16px;
                        padding: 10px 5px;
                        line-height: 1.3;
                    }
                    
                    .tg td,
                    .tg u {
                        font-family: Arial, sans-serif;
                        font-size: 14px;
                        padding: 5px;
                        border-width: 1px;
                        overflow: hidden;
                        word-wrap: break-word;
                        white-space: normal;
                        line-height: 1;
                    }
                    tr.border td {
                        font-size: 12px!important;  
                    }
                    
                    .tg th {
                        font-family: Arial, sans-serif;
                        font-size: 14px;
                        font-weight: normal;
                        padding: 10px 5px;
                        border-width: 1px;
                        overflow: hidden;
                        word-wrap: break-word;
                    }
                    
                    .tg .tg-s6z2 {
                        text-align: center
                    }
                    
                    .tg .tg-baqh {
                        text-align: center;
                        vertical-align: top
                    }
                    
                    .tg .tg-yw4l {
                        vertical-align: top
                    }
                    
                    .tg .tg-if35 {
                        text-decoration: underline;
                        text-align: center;
                        vertical-align: top
                    }
                    
                    .tg .tg-amwm {
                        font-weight: bold;
                        text-align: center;
                        vertical-align: top
                    }
                    
                    .tg .tg-hgcj {
                        font-weight: bold;
                        text-align: center
                    }
                    
                    .border td {
                        border-style: solid;
                    }
                </style>
                <table class="tg" style="width: 1067px; color:#000;">
                    <colgroup>
                        <col style="width: 119.66667px">
                            <col style="width: 119.66667px">
                                <col style="width: 195.66667px">
                                    <col style="width: 94.66667px">
                                        <col style="width: 162.66667px">
                                            <col style="width: 140.66667px">
                                                <col style="width: 86.66667px">
                                                    <col style="width: 70.66667px">
                                                        <col style="width: 120.66667px">
                                                            <col style="width: 130.66667px">
                    </colgroup>
                    <tbody>
                        <tr>
                            <th class="tg-031e" colspan="10"></th>
                        </tr>

                        <tr>
                            <td colspan="10" align="center">Republic of the Philippince
                                <br/>Province of Pampanga
                                <br/><strong>CITY OF SAN FERNANDO</strong>
                                <h2> <strong>OFFICE OF THE CITY MAYOR</strong></h2>
                                <br/>
                                <strong>S E R V I C E  &nbsp; R E C O R D</strong>
                                <br/>(To be accomplished by Employer)</td>
                        </tr>
                        <tr>
                            <td colspan="10">&nbsp;</td>
                        </tr>

                        <tr>
                            <td class="tg-yw4l">NAME:</td>
                            <td class="tg-baqh" colspan="2"><u><strong>&nbsp;<?php echo $a_lastname; ?>&nbsp;</strong></u>
                                <br/>(Surname)</td>
                            <td class="tg-baqh" colspan="2"><u><strong>&nbsp;<?php echo $a_firstname; ?>&nbsp;</strong></u>
                                <br/>(Given Name)</td>
                            <td class="tg-baqh"><u><strong>&nbsp;<?php echo $a_middlename; ?>&nbsp;</strong></u>
                                <br/>(M.N.)</td>
                            <td class="tg-yw4l" colspan="4">(If married woman, give also full maiden name)(Date herein should be checked form birth or baptismal certificate or some other reliable sources/documents)</td>
                        </tr>
                        <tr>
                            <td class="tg-yw4l">BIRTH:</td>
                            <td class="tg-baqh" colspan="2"><u>&nbsp;<?php echo $pi_birthdate; ?>&nbsp;</u>
                                <br/>Date</td>
                            <td class="tg-baqh" colspan="2">
                                <?php if ($pi_birthplace == "") { 
                                    echo "__________________";
                                } else {
                                ?>
                                    <u>&nbsp;<?php echo $pi_birthplace; ?>&nbsp;</u>
                                <?php } ?>
                                <br/>Place</td>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                        </tr>
                        <tr>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                        </tr>
                        <tr>
                            <td class="tg-yw4l" colspan="10">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;THIS IS TO CERTIFY that the employee named herein above actually rendered services in this Office as shown by the service record below, each line of which is supported by appointment and other papers actually issued by this Office and approved by the authorities concerned.</td>
                        </tr>
                        <tr>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                            <td class="tg-yw4l"></td>
                        </tr>
                        <tr class="border">
                            <td class="tg-amwm" colspan="2">SERVICE
                                <br>(Inclusive Date)</td>
                            <td class="tg-amwm" colspan="3">RECORD OF APPOINTMENT</td>
                            <td class="tg-amwm" colspan="2">OFF./ENTITY/DIVISION</td>
                            <td class="tg-amwm" rowspan="2">Leave of absence w/o pay</td>
                            <td class="tg-amwm" colspan="2">SEPARATION</td>
                        </tr>
                        <tr class="border">
                            <td class="tg-hgcj">From</td>
                            <td class="tg-hgcj">To</td>
                            <td class="tg-hgcj">Designation</td>
                            <td class="tg-hgcj">[1]
                                <br>Status</td>
                            <td class="tg-hgcj">[2]
                                <br>Salary</td>
                            <td class="tg-hgcj">Station/Place of Assignment</td>
                            <td class="tg-hgcj">[3]
                                <br>Branch</td>
                            <td class="tg-hgcj">Date</td>
                            <td class="tg-hgcj">Cause</td>
                        </tr>


                            <?php 
                            if (isset($workinfo)) {
                                foreach ($workinfo as $r) {
                                    if ($r->p_appointment == "PERMANENT") {
                                        $sal = number_format(($r->p_salarymonthly * 12),2);
                                        $sal = "P ".$sal."/a";
                                    } else {
                                        $sal =  number_format(($r->p_salarymonthly / 22),2);
                                        $sal = "P ".$sal."/day";
                                    }
                                    $p_from = date_create($r->p_from);

                                    if ($r->p_sept_date == null) {
                                        $p_sept_date = "";
                                    } else {
                                        $p_sept_date = date_create($r->p_sept_date);
                                        $p_sept_date = date_format($p_sept_date,"m-d--y");
                                    }
                            ?>
                            <tr class="border">
                                <td class="tg-baqh">
                                    <?php echo date_format($p_from,"m-d--y"); ?>
                                </td>
                                <td class="tg-baqh">
                                    <?php 
                                        if ($r->p_to == "V-E-R-I-F-Y") {
                                    ?>
                                        <strong style="color:red!important;font-size:12px!important;"><?php echo $r->p_to; ?></strong>
                                    <?php
                                    } else {
                                        echo $r->p_to; 
                                    } ?>
                                </td>
                                <td class="tg-baqh">
                                    <?php echo $r->p_position; ?>
                                </td>
                                <td class="tg-baqh">
                                    <?php echo $r->p_appointment; ?>
                                </td>
                                <td class="tg-baqh">
                                    <?php echo $sal; ?>
                                </td>
                                <td class="tg-baqh">
                                    <?php echo $r->p_dept.'-'.$r->p_div; ?>
                                </td>
                                <td class="tg-baqh">
                                    <?php echo $r->p_company; ?>
                                </td>
                                <td class="tg-baqh">
                                    <?php echo $r->p_lwop; ?>
                                </td>
                                <td class="tg-baqh">
                                    <?php echo $p_sept_date; ?>
                                </td>
                                <td class="tg-baqh">
                                    <?php echo $r->p_sept_cause; ?>
                                </td>
                            </tr>
                            <?php } } ?>

                                <tr class="border">
                                    <td class="tg-baqh" colspan="10">x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x Nothing Follows x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x</td>
                                </tr>
                                <tr class="border">
                                    <td class="tg-yw4l" style="height:23px;"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                </tr>
                                <tr>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                </tr>
                                <tr>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l" colspan="8">Issued in compliance with Executive Order No. 54 dated August 10,1954 and in accordance with&nbsp;Circular No. 58 Dated August 10, 1954 of the System</td>
                                    <td class="tg-yw4l"></td>
                                </tr>
                                <tr>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                </tr>
                                <tr>
                                    <td class="tg-amwm" colspan="10">CERTIFIED CORRECT:</td>
                                </tr>
                                <tr>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                </tr>
                                <tr>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-amwm" colspan="3">RACHELLE S. YUSI
                                        <br>CHRD Officer</td>
                                </tr>
                                <tr>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l"></td>
                                    <td class="tg-yw4l" colspan="3">Date:</td>
                                </tr>
                                <tr>
                                    <td class="tg-031e"></td>
                                    <td class="tg-031e"></td>
                                    <td class="tg-031e"></td>
                                    <td class="tg-031e"></td>
                                    <td class="tg-031e"></td>
                                    <td class="tg-031e"></td>
                                    <td class="tg-s6z2"></td>
                                    <td class="tg-s6z2"></td>
                                    <td class="tg-031e"></td>
                                    <td class="tg-031e"></td>
                                </tr>
                    </tbody>
                </table>
            </div>
        <?php //} ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
