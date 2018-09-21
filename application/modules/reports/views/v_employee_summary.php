<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="padding: 10px 0;">

                    <?php if ($count==0) { ?>
                        <div class="alert alert-warning">
                            <i class="glyphicon glyphicon-exclamation-sign"></i> <b class="text-danger">No Record Found</b> in our database!
                        </div>
                        <?php } else { ?>
                            <div class="container" style="max-width:1140px; margin: 0 auto;">
                                <br/>
                                <div class="row t_section">
                                    <div class="col-sm-2">
                                        <button onclick="printContent('print_reportlist')" type="button" class="btn btn-primary form-control"><i class="glyphicon glyphicon-print"></i> Print</button>
                                    </div>
                                </div>

                                <style type="text/css">
                                .t_section { padding: 10px; }
                                #print_reportlist .title h4 {
                                    font-weight: bold;
                                    font-size: 18px;
                                    margin-bottom: 2px !important;
                                    line-height: 1 !important;
                                }
                                #print_reportlist .title span {
                                    text-transform: uppercase;
                                    font-size: 14px;
                                    font-weight: bold;
                                }
                                .tg  {width: 100%;border-collapse:collapse;border-spacing:0;}
                                .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
                                .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
                                .tg .tg-yw4l{vertical-align:top}
                                tbody tr td {
                                    padding: 3px 8px !important;
                                    font-size: 11px !important;
                                }
                                tbody tr td, .thead th {
                                    border-right: 1px solid #000;
                                }
                                </style>

                                <div id="print_reportlist" style="padding: 10px;">
                                    <div class="title">
                                        <center>
                                            <h4 style="line-height: 1 !important;">CITY GOVERNMENT OF SAN FERNANDO (P)</h4>
                                        <span>List of Employees Summary</span>
                                        </center>
                                        <br/>
                                    </div>

                <?php
                    if (isset($results)){
                        $div_tot = 0;
                        foreach ($results as $r){
                    ?>
                    <table class="tg" style="width: 100%; max-width: 700px; margin: 0 auto;">
                        <thead>
                            <tr>
                            <td>Department</td>
                            <td>Divison</td>
                            <td>Count</td>
                            <td>Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $r->department; ?></td>
                                <td><?php echo $r->divison; ?></td>
                                <td><?php echo $r->divison_total; ?></td>
                                <td><?php 

                                foreach ($cnt_emp_per_office as $c) {
                                    if( $c->department == $r->department){
                                       echo $div_tot = $div_tot + $r->divison_total; 
                                    }else{
                                        $div_tot = 0;
                                    }
                                }

                                
                                ?>

                                </td>
                            </tr>

                        </tbody>
                    
                    </table>
                <?php } } ?>

                  <!--   <table class="tg" style="width: 100%; max-width: 700px; margin: 0 auto;">
                        <?php
                            if (isset($results)){
                                foreach ($results as $r){
                                 $office = $r->department;

                                foreach ($cnt_emp_per_office as $c){
                                    if($r->department == $c->department) {
                                        $c_dept = $c->department_total;
                                        $dept = $c->department;
                                    }
                                } 
                        ?>
                        <tr>
                            <td class="tg-yw4l" style="border:1px solid;border-right: 0; width:51px!important;"></td>
                            <td class="tg-yw4l" style="border:1px solid;border-left: 0; border-right: 0;">
                                <?php echo $office.' - '.$r->divison; ?>
                            </td>
                            <td class="tg-yw4l" style="border:1px solid; width=100px; text-align: right; border-left: 0; padding-right: 50px !important;"><?php echo $r->divison_total; ?>
                            </td>

                        </tr>
                         <tr>
                        <td> <?php if($office == $dept){ echo $c_dept;} ?></td>
                        </tr>
                        <?php

                                         
                            } //end for each 
                         }              
                        ?>
                                    </table> -->
                                </div>
                            </div>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
