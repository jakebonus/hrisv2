<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="padding: 10px 0;">

                    <?php if ($count==0) { ?>
                        <div class="alert alert-warning"><i class="glyphicon glyphicon-exclamation-sign"></i> <b class="text-danger">No Record Found</b> in our database!</div>
                        <?php } else { ?>

                            <div class="container" style="max-width:1140px; margin: 0 auto;">
                                <br/>
                                <div class="row t_section">
                                    <div class="col-sm-2">
                                        <button onclick="printContent('print_reportlist')" type="button" class="btn btn-primary form-control"><i class="glyphicon glyphicon-print"></i> Print</button>
                                    </div>
                                </div>

                                <div id="print_reportlist" class="t_section">
                                    <style>
                                        .t_section { padding: 10px; }
                                        .table > thead > tr > th,
                                        .table > tbody > tr > th,
                                        .table > tfoot > tr > th,
                                        .table > thead > tr > td,
                                        .table > tbody > tr > td,
                                        .table > tfoot > tr > td {
                                            border-color: #000 !important;
                                        }
                                        
                                        .thead {
                                            border-right: 1px solid #000;
                                            border-left: 1px solid #000;
                                        }
                                        
                                        tbody tr td {
                                            padding: 3px 8px !important;
                                            font-size: 11px;
                                        }
                                        
                                        .table > thead > tr > th {
                                            vertical-align: bottom;
                                            border-bottom: 1px solid #000;
                                        }
                                        
                                        tbody {
                                            border-left: 1px solid #000;
                                            border-bottom: 1px solid #000;
                                        }
                                        
                                        tbody tr td,
                                        .thead th {
                                            border-right: 1px solid #000;
                                        }
                                        
                                        #print_reportlist .title h3 {
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
                                        
                                        .o_head {
                                            background-color: #FFF7A1 !important;
                                            color: #000;
                                        }
                                        
                                        .d_head {
                                            background-color: #a1eaff !important;
                                            color: #000;
                                        }
                                    </style>

                                    <div class="title">
                                        <center>
                                            <h3 style="line-height: 1 !important;">CITY GOVERNMENT OF SAN FERNANDO (P)</h3>

                                            <?php if(isset($status)) { ?>
                                                <span><?php if(isset($status[0])) { echo $status[0].', '; } if(isset($status[1])) { echo $status[1].', '; } if(isset($status[2])) {echo $status[2];}?><span><br/>
                                <?php } ?>
                                <span>List of Employees</span>
                                        </center>
                                    </div>

                                    <table class="table">
                                        <?php
   
                                            $cnt = 1;
                                            $total = 0;
                                            $last = null;
                                            $title = "";
                                            $office = "";
                            
                                            if (is_array($results)) {
                                                
                                            foreach($results as $r)
                                            {
                                                if ($r->division) {
                                                    // $office = $r->o_code.'&nbsp;&nbsp;&nbsp;&nbsp; - '.$r->division;
                                                    $office = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - '.$r->division;
                                                    $title = "d_head";
                                                } else {
                                                    $office = $r->o_code;
                                                    $title = "o_head";
                                                }

                                              if($office != $last)
                                                {
                                                $cnt = 1;
                                                $total = 0;
                                        ?>
                                            <thead>
                                                <tr>
                                                    <th colspan="4" style="border: 0!important; padding: 0!important;">&nbsp;</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="4" style="<?php if($title == "d_head") { ?>background-color: #a1eaff !important;<?php } else { ?>background-color: #FFF7A1 !important;<?php } ?> font-size: 13px;font-weight: 900; border: 1px solid;">
                                                        <?php echo $office;  //echo $r->o_name !='' ? $r->o_name : $r->office; ?>
                                                    </th>
                                                </tr>

                                                <tr class="thead">
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Salary Grade</th>
                                                </tr>
                                            </thead>

                                            <?php
                                                $last = $office;
                                            }
                                            ?>

                                                <tr>
                                                    <td>
                                                        <?php echo $cnt; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $r->a_lastname.', '.$r->a_firstname.' '.$r->a_middlename; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $r->a_position !='' ? $r->a_position : '&nbsp;'; ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            $r->a_salarygrade !='Choose Grade' ? $r->a_salarygrade : '&nbsp;'; 
                                                            $r->a_salarystep !='Choose Step' ? $r->a_salarystep : '&nbsp;'; 

                                                            $r->a_salarygrade = str_replace("Choose","1",$r->a_salarygrade);
                                                            $r->a_salarystep = str_replace("Choose","1",$r->a_salarystep);
                                                            $r->a_salarystep = str_replace("No","1",$r->a_salarystep);

                                                            echo str_replace("Grade","",$r->a_salarygrade).'/'.str_replace("Step","",$r->a_salarystep);
                                                        ?>
                                                    </td>
                                                </tr>

                                            <?php
                                                $cnt++;
                                            }  } 
                                            ?>
                                    </table>
                                </div>
                            </div>
                            <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
