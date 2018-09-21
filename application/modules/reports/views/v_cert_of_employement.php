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
                            <div style="width:630px; margin: 0 auto; font-size:15px; line-height: 1.3;">
                            <?php 
                                if (isset($result)) {
                                    foreach ($result as $r) {
                                        $a_lastname = $r->a_lastname;
                                        $a_firstname = $r->a_firstname;
                                        $a_middlename = $r->a_middlename;
                                        $a_mi = $r->a_mi;
                                        $mi = $r->mi;
                                        $a_status = $r->a_status;
                                        $a_position = $r->a_position;
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
                                    <center><br/><br/><br/><br/><h4 style="line-height: 1 !important; font-size: 18px;"><strong>EMPLOYMENT CERTIFICATION</strong></h4> <br/><br/></center>

                                    <h4 style="line-height: 1 !important; font-size: 15px;"><strong>TO WHOM IT MAY CONCERN:</strong></h4><br/>

                                    <p style="text-indent: 50px;text-align: justify;"> THIS IS TO CERTIFY that <strong><?php echo $a_firstname.' '.$mi.'. '.$a_lastname; ?></strong> is presently employed on a <?php echo $a_status;?> basis as <?php echo $a_position;?>, assigned at the <?php echo $department_name;?> of the City of San Fernando, Pampanga. <?php echo $a_fdos;?> has been in the City Government since <?php //echo $p_from;?> </p>
                                    <br/>
                                    
                                    <br/>
                                    <p style="text-indent: 50px;text-align: justify;">This certification is issued upon the request of <?php echo ($gender == 'He' ? 'Mr.' : 'Ms.').' '.$a_lastname; ?> for whatever legal intent it may serve this <?php echo date('jS F Y'); ?> at the City San Fernando, Pampanga.</p>
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
