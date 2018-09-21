<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">
                        <div class="form-horizontal row filter">
                        	
                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                                <div class="col-md-9 col-sm-9 col-xs-12" id="filter_col1" data-column="0">
                                    <input type="text" class="column_filter form-control" id="col0_filter">
                                </div>
                            </div>

                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Isactive </label>
                                <div class="col-md-9 col-sm-9 col-xs-12" id="filter_col9" data-column="8">
                                    <select class="column_filter form-control" id="col8_filter">
                                        <option value="yes">YES</option>
                                        <option value="no">NO</option>
                                        <option value="">ALL</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender </label>
                                <div class="col-md-9 col-sm-9 col-xs-12" id="filter_col8" data-column="7">
                                    <select class="column_filter form-control" id="col7_filter">
                                        <option value="">All</option>
                                        <option value="F">FEMALE</option>
                                        <option value="M">MALE</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Office </label>
                                <div class="col-md-9 col-sm-9 col-xs-12" id="filter_col4" data-column="3">
                                    <select class="column_filter form-control" id="col3_filter">
                                        <option value="">ALL</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Division </label>
                                <div class="col-md-9 col-sm-9 col-xs-12" id="filter_col5" data-column="4">
                                    <select class="column_filter form-control" id="col4_filter">
                                        <option value="">ALL</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Position </label>
                                <div class="col-md-9 col-sm-9 col-xs-12" id="filter_col2" data-column="1">
                                    <select class="column_filter form-control" id="col1_filter">
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Status </label>
                                <div class="col-md-9 col-sm-9 col-xs-12" id="filter_col3" data-column="2">
                                    <select class="column_filter form-control" id="col2_filter">
                                        <option value="">ALL</option>
                                        <option value="PERMANENT">PERMANENT</option>
                                        <option value="CASUAL">CASUAL</option>
                                        <option value="PROJECT BASED">PROJECT BASED</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Highest Elig. </label>
                                <div class="col-md-8 col-sm-8 col-xs-12" id="filter_col6" data-column="5">
                                    <select class="column_filter form-control" id="col5_filter">
                                        <option value="">ALL</option>
                                    </select>
                                </div>
                            </div>

							<div class="form-group col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Highest Educ. </label>
                                <div class="col-md-8 col-sm-8 col-xs-12" id="filter_col7" data-column="6">
                                    <select class="column_filter form-control" id="col6_filter">
                                        <option value="">ALL</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <br/>

                        <style>
                            ul#menu6 {
                                left: 60px;
                                top: -7px;
                            }
                            
                            ul#menu6 li {
                                display: inline-flex;
                            }
                        </style>
                        <table id="datatable_employee" class="cell-border compact hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>POSITION</th>
                                    <th>STATUS</th>
                                    <th>OFFICE</th>
                                    <th>DIVISION</th>
                                    <th style="min-width: 150px;">HIGHEST ELIGIBILITY</th>
                                    <th style="min-width: 150px;">HIGHEST EDUCATION</th>
                                    <th>GENDER</th>
                                    <th>a_isactive</th>
                                    
                                    <th>Salary Grade</th>
                                    <th>Birthdate</th>
                                    <th>Birthplace</th>
                                    <th>Age</th>
                                    <th>Resident Address</th>
                                    <th>Resident Contact#</th>
                                    <th>Permanent Address</th>
                                    <th>Permanent Contact#</th>
                                    <th>Civil Status</th>
                                    <th>TIN</th>
                                    <th>GSIS</th>
                                    <th>PhilHealth</th>
                                    <th>Pag-ibig</th>
                                    <th>SSS</th>
                                    <th>FDOS</th>
                                    <th>LDOS</th>
                                    <th>Work Experience</th>
                                    <th>Training</th>
                                    <th>Eligibility</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
