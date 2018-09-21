<!-- page content -->
<div class="right_col holiday-page" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Certificate of Employment</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row t_section">
                            <div class="col-sm-2">
                                <button id="onload_click" onclick="printContent('print_reportlist')" type="button" class="btn btn-primary form-control"><i class="glyphicon glyphicon-print"></i> Print</button>
                            </div>
                        </div>
                        <div id="print_reportlist" class="t_section">
                            <div class="p_cert_of_emp_benefits">
                            <?php 
                                if (isset($result)) {
                                    foreach ($result as $r) {
                                        $a_lastname = $r->a_lastname;
                                        $a_firstname = $r->a_firstname;
                                        $a_middlename = $r->a_middlename;
                                        $a_mi = $r->a_mi;
                                        $mi = $r->mi;
                                        $a_status = $r->a_status;
                                        $department_name = $r->department_name;
                                        $gender = $r->gender;
                                        $a_fdos = date('F d, Y',strtotime($r->a_fdos));
                                        if ($a_mi == '(NULL)' || $a_mi == '' || $a_mi == ' ') {
                                            $mi = $mi;
                                        } else {
                                            $mi = $a_mi;
                                        }
                                    }
                                }
                            ?>

                            <?php
                                $p_from = '';
                                if (isset($workinfo)) {
                                    foreach ($workinfo as $r) {
                                        //if ($r->p_appointment == "PERMANENT") {
                                        $a_sal = number_format(($r->p_salarymonthly * 12),2);
                                        $m_sal = number_format(($r->p_salarymonthly),2);

                                        
                                        $p_from = date('F d, Y',strtotime($r->p_from));

                                        $m5k = number_format((5000),2);
                                        $m24k = number_format((24000),2);

                                        $total = ($r->p_salarymonthly * 12) + ($r->p_salarymonthly * 2) + 5000 + (24000 * 3);
                                        $total = number_format(($total),2);
                                        $p_position = $r->p_position;
                                        //} else {
                                           // $sal =  number_format(($r->p_salarymonthly / 22),2);
                                           // echo $sal = "P ".$sal."/day";
                                       // }
                                    }
                                }
                            ?>
                                    <center><br/><br/><br/><br/><h4 style="line-height: 1 !important; font-size: 18px; margin-top: 1in;"><strong>EMPLOYMENT CERTIFICATION</strong></h4> <br/><br/></center>

                                    <h4 style="line-height: 1 !important; font-size: 15px;"><strong>TO WHOM IT MAY CONCERN:</strong></h4><br/>

                                    <p style="text-indent: 50px;text-align: justify;"> THIS IS TO CERTIFY that <strong><?php echo $a_firstname.' '.$mi.'. '.$a_lastname; ?></strong> is presently employed on a <?php echo $a_status;?> basis as <?php echo $p_position;?>, assigned at the <?php echo $department_name;?> of the City of San Fernando, Pampanga. <?php echo $gender;?> has been in the City Government since <?php echo $a_fdos;?> and receiving the following annual compensation package: </p>
                                    <br/>
                                    <?php if ($count2 != 0 ) { ?>
                                        <ul style="list-style: none;width: 400px;margin: 0 auto;">
                                            <li><span style="width: 150px;display: inline-block;">Annual Basic Salary</span> - - - - - - <span style="float: right;"><?php echo "₱ ".$a_sal;?></span></li>
                                            <li><span style="width: 150px;display: inline-block;">13<sup>th</sup> month pay</span> - - - - - -<span style="float: right;"><?php echo $m_sal;?></span></li>
                                            <li><span style="width: 150px;display: inline-block;">14<sup>th</sup> month pay</span> - - - - - -<span style="float: right;"><?php echo $m_sal;?></span></li>
                                            <li><span style="width: 150px;display: inline-block;">PERA</span> - - - - - -<span style="float: right;">24,000.00</span></li>
                                            <li><span style="width: 150px;display: inline-block;">Cash Gift</span> - - - - - -<span style="float: right;">5,000.00</span></li>
                                            <li><span style="width: 150px;display: inline-block;">Clothing Allowance</span> - - - - - -<span style="float: right;">5,000.00</span></li>
                                            <li><span style="width: 150px;display: inline-block;">PEI</span> - - - - - -<span style="float: right;">5,000.00</span></li>
                                            <li><span style="width: 150px;display: inline-block;">T O T A L</span> - - - - - -<span style="float: right;text-decoration: overline;"><?php echo "₱ ".$total;?></span></li>
                                        </ul>
                                    <?php } else { ?>
                                        <div class="alert alert-info alert-dismissible fade in" role="alert">
                                            <strong>Sorry!</strong> No record found!. Please input Service Record.
                                          </div>
                                    <?php } ?>
                                    <br/>
                                    <p style="text-indent: 50px;text-align: justify;">This certification is issued upon the request of <?php echo ($gender == 'He' ? 'Mr.' : 'Ms.').' '.$a_lastname; ?> for whatever legal intent it may serve this <?php echo date('j').'<sup>'.date('S').'</sup> '.date('F Y'); ?> at the City of San Fernando, Pampanga.</p>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <div>
                                        <p style="width: 308px;margin-left: auto;text-align: center;line-height: 1.2;"><strong>RACHELLE S. YUSI</strong>
                                            <br/>City Human Resource Development Officer</p>
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
