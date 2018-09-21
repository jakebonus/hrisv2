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
                        <div id="print_reportlist" class="t_section page">
                        <?php 

                                if (isset($results)) {
                                    foreach ($results as $r) {
                                        $a_firstname = $r->a_firstname;
                                        $a_mi = $r->a_mi;   
                                        $a_lastname = $r->a_lastname;
                                        $pi_gender = $r->pi_gender;
                                        $p_position = $r->p_position;
                                        $p_salarystep = $r->p_salarystep;
                                        $sg = 'SG '.$r->p_salarygrade.'/'.$r->old_salary_step;
                                        $oldsalary = number_format(($r->oldsalary),2);
                                        $annual_salary = number_format(($r->annual_salary),2);
                                        ?>
                           
                            <div class="f_times_new subpage">
                            
                            
                                 
                                    <div class="title">NOTICE OF STEP INCREMENT</div>
                                    <br>
                                    <br>
                                    <p class="capitalize">
                                        <strong><?php echo $pi_gender.' '.$a_firstname.' '.$a_mi.'. '.$a_lastname; ?></strong><br>
                                        City General Services Office<br>
                                        City of San Fernando (P)
                                    </p>

                                    <p class="capitalize">Dear <?php echo $pi_gender.' '.$a_lastname; ?>,</p>
                
                                    <p>Pursuant to the Joint Civil Service Commosion (CSC) and Department of Budget and Management (DBM) Circular No.1 s 1990, implementing Section 13C of RA 6758, your salary as <strong class="capitalize"><?php echo $p_position; ?>, SG <?php echo $sg;?></strong> is hereby adjusted effective <strong>01 August 2015</strong> as shown below: </p>
                                        
                                        <div class="width-80">
                                        <p>BASIC ANNUAL SALARY<br>
                                        As if 31 July 2015 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;-&nbsp; - &nbsp;-&nbsp; - &nbsp;- &nbsp;- &nbsp;-&nbsp; -&nbsp; -&nbsp; -<span class="alignright">P <?php echo $oldsalary; ?></span>
                                        </p>

                                        <p>SALARY ADJUSTMENT</p>
                                        <p>a) Merit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;-&nbsp; - &nbsp;-&nbsp; - &nbsp;- &nbsp;- &nbsp;-&nbsp; -&nbsp; -&nbsp; - (_Step/s) - &nbsp;-&nbsp; - &nbsp;- <span class="alignright">P&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                                        <p>b) Length of Service &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp; - &nbsp;-&nbsp; -&nbsp; - (<span class="step"><?php echo $p_salarystep;?></span> Step/s) -&nbsp; -&nbsp; - &nbsp;- <span class="alignright t">P <?php echo $annual_salary; ?></span></p>
                                        </div>

                                    <p>The step increment is subject to review and post audit by the Department of Budget and Management and to re-adjustment and refund if found not in order: </p>

                                    <p>Very truly yours,</p>
                                    <br/>
                                    <br/>
                                    <br/>
                                    
                                    <p><strong>EDWIN D. SANTIAGO</strong><br/>City Mayor</p>
                                    
                                    <p class="no-margin">Copy Furnished;</p>
                                    <ul class="list">
                                        <li>City Budget Office</li>
                                        <li>City Accountant</li>
                                        <li>City Treasurer</li>
                                        <li>City Human Resource Development Office</li>
                                        <li>Government Service Insurance System</li>
                                        <li>Civil Service Commission, Pampanga Field Office</li>
                                        <li>201 File of Employee</li>
                                        <li>File</li>
                                    </ul>
                           
                            </div>
                           
                            <div class="page-break"></div>
                              <?php }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
