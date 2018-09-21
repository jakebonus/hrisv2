<!-- page content -->
       <div class="right_col" role="main">
         <div class="">

           <div class="clearfix"></div>

           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel" style="padding: 10px 0;">
			   
			  <?php
if($is_result != 1):
foreach ($result as $ai) :
	$a_id = $ai->a_id;
	$a_empno = $ai->a_empno;
	$a_lastname = $ai->a_lastname;
	$a_middlename = $ai->a_middlename;
	$a_mi = $ai->a_mi;
	$a_namext = $ai->a_namext;
	$a_firstname = $ai->a_firstname;
	$a_status = $ai->a_status;
	$a_position = $ai->a_position;
	$a_office = $ai->a_office;
	$a_division = $ai->a_division;
	$a_level = $ai->a_level;
	$pi_birthdate = $ai->pi_birthdate;
	$pi_gender = $ai->pi_gender;
	$pi_status = $ai->pi_status;
	$pi_permstreet = $ai->pi_permstreet;
	$pi_permbrgy = $ai->pi_permbrgy;
	$pi_permcity = $ai->pi_permcity;
	$pi_permprov = $ai->pi_permprov;
	$pi_permzip = $ai->pi_permzip;
	$pi_permphone = $ai->pi_permphone;
	$pi_resstreet = $ai->pi_resstreet;
	$pi_resbrgy = $ai->pi_resbrgy;
	$pi_rescity = $ai->pi_rescity;
	$pi_resprov = $ai->pi_resprov;
	$pi_resphone = $ai->pi_resphone;
	$pi_reszip = $ai->pi_reszip;
	$pi_mobile = $ai->pi_mobile;
	$pi_email = $ai->pi_email;
	$pi_tin = $ai->pi_tin;
	$pi_sss = $ai->pi_sss;
	$pi_philhealth = $ai->pi_philhealth;
	$pi_pagibig = $ai->pi_pagibig;
	$pi_gsis = $ai->pi_gsis;
	$a_fdos = $ai->a_fdos;
	$a_hieduc = $ai->a_hieduc;
	$a_hielig = $ai->a_hielig;
	$a_salarystep = $ai->a_salarystep;
	$a_salarygrade = $ai->a_salarygrade;
	$o_code = $ai->o_code;
endforeach;


?>
<div class="col-sm-12  col-md-12 ">
<div class="panel-body">
		<div class="col-xs-8">
		</div>
		<div class="col-xs-2">
		<!--
			<form id="frm_ledgerexport" name="frm_ledgerexport" method="POST" action="<?php echo base_url('manager/export/'); ?>">
				<input type="hidden" id="a_id" name="a_id" value="<?php echo $a_id; ?>"/>
				<input type="hidden" id="b_year" name="b_year" value="<?php echo $b_year; ?>"/>
				<button type="submit" class="form-control btn btn-success"><i class="glyphicon glyphicon-save"></i> Save to Excel</button>
			</form>
			
			-->
		</div>
		<div class="col-xs-2">
		<button onclick="printContent('print_leger')" type="button" class="btn btn-primary form-control"><i class="glyphicon glyphicon-print"></i> Print</button>
		</div>
<div class="col-xs-12"><hr></div>
<div id="print_leger">

<table width="100%" id="tbl_ledger"  class="table-striped tdclass" border="1">
 <tbody>
   <tr>
     <td colspan="17" style="background-color:#000 !important;"><center><strong style="color: #fff!important;">EMPLOYEE LEDGER</strong></center></td>
   </tr>
   <tr>
     <td width="5%">YEAR</td>
     <td width="4%"><?php echo $b_year; ?></td>
     <td colspan="6">&nbsp;</td>
     <td width="15%">&nbsp;</td>
     <td colspan="3">DATE PRINTED</td>
     <td colspan="3" width="15%"><?php echo date('d-F-Y');?></td>
     <td width="20%" colspan="2" rowspan="9"><?php 
										$file = 'pds_image/'.$a_id.'/'.$a_id.'.png';
										if (file_exists($file)) {
									?>
										<img src="<?php echo base_url($file); ?>" style="width:210px;height:200px; border: 1px solid #9E9E9E;">
									<?php } else { ?>
										<img src="<?php echo base_url('pds_image/default-pictures.jpg'); ?>" style="width:210px;height:200px;">
									<?php } ?></td>
   </tr>
   <tr>
     <td colspan="15" class="tdheader"><center><strong>EMPLOYEE INFORMATION</strong></center></td>
   </tr>
   <tr>
     <td colspan="2">NAME</td>
     <td colspan="3">SURNAME <br/><strong><?php echo strtoupper($a_lastname); ?></strong></td>
     <td colspan="2">FIRST NAME<br/><strong><?php echo strtoupper($a_firstname); ?></strong></td>
     <td colspan="3">MIDDLE NAME<br/><strong><?php echo strtoupper($a_middlename); ?></strong></td>
     <td colspan="5">EXT.<br/><strong><?php echo strtoupper($a_namext); ?></strong></td>

   </tr>
   <tr>
     <td colspan="3" width="13%">DATE OF BIRTH</td>
     <td colspan="2"><?php echo strtoupper($pi_birthdate); ?></td>
     <td colspan="1">AGE</td>
     <td colspan="1">
	 <?php
$bday = new DateTime($pi_birthdate);
$today =  new DateTime(date('Y-m-d'));
$diff = $today->diff($bday);
printf('%d',$diff->y);?></td>
     <td colspan="1">SEX</td>
     <td colspan="2"><?php echo strtoupper($pi_gender); ?></td>
     <td colspan="3">CIVIL STATUS</td>
     <td colspan="2"><?php echo strtoupper($pi_status); ?></td>
   </tr>
   <tr>
     <td colspan="4"  width="13%">PERMANENT ADDRESS</td>
     <td colspan="11"><?php echo strtoupper($pi_permstreet.','.$pi_permbrgy.','.$pi_permcity.','.$pi_permprov); ?></td>
   </tr>
   <tr>
     <td colspan="4"  width="13%">CONTACT NO</td>
     <td colspan="11"><?php echo strtoupper($pi_permphone); ?></td>
   </tr>
   <tr>
     <td colspan="4"  width="17%">CURRENT ADDRESS</td>
     <td colspan="11"><?php echo strtoupper($pi_resstreet.','.$pi_resbrgy.','.$pi_rescity.','.$pi_resprov); ?></td>
   </tr>
   <tr>
     <td colspan="4"  width="17%">CONTACT NO</td>
     <td colspan="11"><?php echo strtoupper($pi_resphone); ?></td>
   </tr>
   <tr>
     <td colspan="4"  width="17%">MOBILE NO/S</td>
     <td colspan="11"><?php echo $pi_mobile; ?></td>
   </tr>
   <tr>
     <td colspan="17" style='background-color: #000 !important;'><center><strong style="color: #fff!important;">EMPLOYMENT INFORMATION</strong></center></td>
   </tr>
   <tr>
     <td colspan="4"  width="17%">EMPLOYEE ID</td>
     <td colspan="1"><?php echo $a_empno; ?></td>
     <td colspan="1" >FDOS</td>
     <td colspan="3"><?php echo $a_fdos; ?></td>
     <td colspan="5" >TIN NO</td>
     <td colspan="4"><?php echo $pi_tin; ?></td>
   </tr>
   <tr>
     <td colspan="4"  width="17%">POSITION</td>
     <td colspan="5"><?php echo $a_position; ?></td>
     <td colspan="5">GSIS NO</td>
     <td colspan="4"><?php echo $pi_gsis; ?></td>
   </tr>
   <tr>

     <td colspan="4"  width="17%">SALARY GRADE</td>
     <td colspan="5"><?php echo $a_salarygrade.' - '.$a_salarystep;?></td>
     <td colspan="5">PHILHEALTH NO</td>
     <td colspan="4"><?php echo $pi_philhealth; ?></td>
   </tr>
   <tr>
     <td colspan="4"  width="17%">EMPLOYMENT STATUS</td>
     <td colspan="5"><?php echo strtoupper($a_status); ?></td>
     <td colspan="5">PAGIBIG NO</td>
     <td colspan="4"><?php echo $pi_pagibig; ?></td>
   </tr>
   <tr>
     <td colspan="4">OFFICE</td>
     <td colspan="5"><?php echo strtoupper($o_code); ?></td>
     <td colspan="5">SSS NO</td>
     <td colspan="4"><?php echo $pi_sss; ?></td>
   </tr>
   <tr>
     <td colspan="4">ELIGIBILITY</td>
     <td colspan="5"><?php echo strtoupper($a_hielig); ?></td>
     <td colspan="5">EDUCATIONAL</td>
     <td colspan="4"><?php echo strtoupper($a_hieduc); ?></td>
   </tr>
   </tbody>
     </table>
	<div class="col-lg-12 form-group" ></div>
	 <table width="100%"  class="table-striped tdclass" border="1" >
 <tbody>
   <tr>
      <tr >
     <td colspan="2" width="10%" style='background-color: #000!important;'><center><strong style="color: #fff!important;">SALARY</strong></center></td>
     <td colspan="1" width="3%" border="0">&nbsp;</td>
     <td colspan="2" width="10%" style='background-color: #000!important;'><center><strong style="color: #fff!important;">ALLOWANCE</strong></center></td>
     <td colspan="1" width="3%">&nbsp;</td>
     <td colspan="3" width="15%" style='background-color: #000!important;'><center><strong style="color: #fff!important;">PREMIUMS [GOVT SHARE]</strong></center></td>
     <td colspan="1" width="3%">&nbsp;</td>
     <td colspan="1" width="5%" style='background-color: #000!important;'><center><strong style="color: #fff!important;">SIF</strong></td>
     <td colspan="1" width="3%">&nbsp;</td>
     <td colspan="2" width="20%" style='background-color: #000!important;'><center><strong style="color: #fff!important;">MANDATORY BENEFITS</strong></center></td>
	 <td colspan="1" width="3%">&nbsp;</td>
	<td  colspan="2" width="15%" style='background-color: #000!important;'><center><strong style="color: #fff!important;">OTHER INCENTIVES</strong></center></td>
     </tr>
   </tr>
  
	 
	 <tr>
	 <td colspan="1" style='background-color: #000!important;'></td>
	 <td colspan="1" style='background-color: #000!important;'></td>
	 <td colspan="1" >&nbsp;</td>
	 <td colspan="1" style='background-color: #000!important;'><center style="color: #fff!important;">PERA</center></td>
	 <td colspan="1" style='background-color: #000!important;'><center style="color: #fff!important;">ACA</center></td>
	 <td colspan="1">&nbsp;</td>
	 <td colspan="1" style='background-color: #000!important;'><center style="color: #fff!important;">GSIS</center></td>
	 <td colspan="1" style='background-color: #000!important;'><center style="color: #fff!important;">PH</center></td>
	 <td colspan="1" style='background-color: #000!important;'><center style="color: #fff!important;">PAGIBIG</center></td>
	 <td colspan="1">&nbsp;</td>
	 <td colspan="1" style='background-color: #000!important;'></td>
	 <td colspan="1">&nbsp;</td>
	 <td colspan="1" style='background-color: #000!important;'></td>
	 <td colspan="1" style='background-color: #000!important;'></td>
	 <td colspan="1">&nbsp;</td>
	 <td colspan="1" style='background-color: #000!important;'></td>
	 <td colspan="1" style='background-color: #000!important;'></td>
	 </tr>
	 
	 <tr>
	<?php 
	$i = 1;
	
	$t = 0;
	$a = 0;
	$total_basic = 0;
	$total_pera = 0;
	$total_aca = 0;
	$total_gsis = 0;
	$total_philhealth = 0;
	$total_pagibig = 0;
	$total_si = 0;
	$total_mb = 0;
	$total_oi = 0;
	$type = array();
	$amount = array();
		if(is_array($insentives)){
				foreach($insentives as $i){
					
						$i_type = $i->b_type;
						$i_amount = $i->b_amount;
						if(in_array($i_type, $type)){
							//echo 'already in array';
						}else{
							array_push($type, $i_type);
							array_push($amount, $i_amount);
							//echo $i->b_type;
						}

					
				}
			}
		//	echo '<pre>';
		//print_r($type);
	//	print_r($amount);
		$count_type = count($type);

	for($m=1; $m <= 13; $m++) {
	

	//echo '<pre>';
	//print_r($type[$t]);
	//print_r($amount[$a]);
	
	?>
		<!--- All Months --->
	 <td colspan="1">
	 <?php
		if($m != 13){
			$month = date('F', mktime(0,0,0,$m));
			echo $month; 
		}
		
		?>
	</td> 
	
	<!-- Salary -->
	 <td colspan="1">
		<?php	 
			if(is_array($benefits)){
				foreach($benefits as $b){
					$month = $b->month;
					$basic = $b->basic;
					if($month == $m){
						echo $basic;
						$total_basic +=  $basic;
					}
					
				}
			}
		?>
	 </td>
	 <td colspan="1" >&nbsp;</td>
	 
	 <!-- Pera -->
	 <td colspan="1">
	 	<?php	 
			if(is_array($benefits)){
				foreach($benefits as $b){
					$month = $b->month;
					$pera = $b->pera;
					if($month == $m){
						echo $pera;
						$total_pera +=  $pera;
					}
				}
			}
		?>
	 </td>
	 
	<!--  aca -->
	 <td colspan="1">
	 	 <?php	 
			if(is_array($benefits)){
				foreach($benefits as $b){
					$month = $b->month;
					$aca = $b->aca;
					if($month == $m){
						echo $aca;
						$total_aca +=  $aca;
					}
				}
			}
		?>
	 </td>
	 <td colspan="1">&nbsp;</td>
	 
	<!-- gsis -->
	 <td colspan="1">	 
		<?php	 
		if(is_array($benefits)){
				foreach($benefits as $b){
					$month = $b->month;
					$gsis = $b->gsis;
					if($month == $m){
						echo $gsis;
						$total_gsis +=  $gsis;
					}
				}
			}
		?>
	</td>
	
	<!-- ph -->
	 <td colspan="1">
	 	<?php	 
		if(is_array($benefits)){
				foreach($benefits as $b){
					$month = $b->month;
					$philhealth = $b->philhealth;
					if($month == $m){
						echo $philhealth;
						$total_philhealth +=  $philhealth;
					}
				}
			}
		?>
	 </td>
	 
	 <!-- pagibig -->
	 <td colspan="1">
	  	<?php	 
		if(is_array($benefits)){
				foreach($benefits as $b){
					$month = $b->month;
					$pagibig = $b->pagibig;
					if($month == $m){
						echo $pagibig;
						$total_pagibig +=  $pagibig;
					}
				}
			}
		?>
	 </td>
	 <td colspan="1">&nbsp;</td>
	 
	 <!-- si -->
	 <td colspan="1">
	   	<?php	 
		if(is_array($benefits)){
				foreach($benefits as $b){
					$month = $b->month;
					$si = $b->si;
					if($month == $m){
						echo $si;
						$total_si +=  $si;
					}
				}
		}
		?>
	 </td>
	 <td colspan="1">&nbsp;</td>
	 <td colspan="1">
		<?php
			switch ($m){
				case '1':
					echo 'Representation A.';
				break;
				case '2':
					echo 'Travel A.';
				break;
				case '3':
					echo 'Hazard';
				break;
				case '4':
					echo 'Subsistence';
				break;
				case '5':
					echo 'Clothing A.';
				break;
				case '6':
					echo 'PIB';
				break;
				case '7':
					echo 'Year End Bonus';
				break;
				case '8':
					echo 'Cash Gift';
				break;
				case '9':
					echo 'Monetization';
				break;
				case '10':
					echo 'Loyalty';
				break;
				case '11':
					echo 'Gratuity';
				break;
				case '12':
					echo 'Anniv. Bonus';
				break;
				case '13':
					echo 'TLB';
				break;
			
			default:
				echo '';
			}
		?>
	 </td>
	<td colspan="1">
	 <?php 
	 if(is_array($mandatory_benefits)){
		 foreach($mandatory_benefits as $mb){
			$b_type = $mb->b_type;
			//$b_amount = $mb->b_amount;
			switch ($m){
				case '1':
					if($b_type == 'REPRESENTATION ALLOWANCE'){ 
					//	$b_amount = $b_amount + $b_amount;
					echo $mb->b_amount;
					$total_mb += $mb->b_amount;
					}
				break;
				
				case '2':
				
					if($b_type == 'TRAVEL ALLOWANCE'){
						echo $mb->b_amount;
						$total_mb += $mb->b_amount;
					}
					
				break;
				case '3':
					if($b_type == 'HAZARD'){
						echo $mb->b_amount;
						$total_mb += $mb->b_amount;
					}
				break;
				case '4':
					if($b_type == 'SUBSISTENCE'){
						echo $mb->b_amount;
						$total_mb += $mb->b_amount;
					}
				break;
				case '5':
					if($b_type == 'CLOTHING ALLOWANCE'){
						echo $mb->b_amount;
						$total_mb += $mb->b_amount;
					}
				break;
				case '6':
					if($b_type == 'PIB'){
						echo $mb->b_amount;
						$total_mb += $mb->b_amount;
					}
				break;
				case '7':
					if($b_type == 'YEAR END BONUS'){
						echo $mb->b_amount;
						$total_mb += $mb->b_amount;
					}
				break;
				case '8':
					if($b_type == 'CASH GIFT'){
						echo $mb->b_amount;
						$total_mb += $mb->b_amount;
					}
				break;
				case '9':
					if($b_type == 'MONETIZATION'){
						echo $mb->b_amount;
						$total_mb += $mb->b_amount;
					}
				break;
				case '10':
					if($b_type == 'LOYALTY'){
						echo $mb->b_amount;
						$total_mb += $mb->b_amount;
					}
				break;
				case '11':
					if($b_type == 'GRATUITY'){
						echo $mb->b_amount;
						$total_mb += $mb->b_amount;
					}
				break;
				case '12':
					if($b_type == 'ANNIVERSARY BONUS'){
						echo $mb->b_amount;
						$total_mb += $mb->b_amount;
					}
				break;
				case '13':
					if($b_type == 'TLB'){
						echo $mb->b_amount;
						$total_mb += $mb->b_amount;
					}
				break;
			
			default:
				echo '0.00';
			}
		 }
	 }
	 	
		
	 ?>
	  </td>
	  <td colspan="1">&nbsp;</td>
	  <td colspan="1"><?php 
	  if($count_type > $t){
		 print_r($type[$t]); 
		$t++;   
	  }
	  ?></td>
	  <td colspan="1"><?php 
	   if($count_type > $a){
		print_r($amount[$a]);
		$total_oi += $amount[$a];
		$a++; 
	   }
	   ?></td>
	 </tr>

	 <?php
	}
	
	?>
	
	
	  </tbody>
     </table>
	 <div class="col-lg-12 form-group"></div>

<table width="100%"  class="table-striped tdclass" border="1" >
 <tbody>
   <tr>
      <tr>
	<td colspan="1" width="6%"><center><strong>TOTAL</strong></center></td>
	<td colspan="1" width="5%"><center><strong><?php echo $total_basic; ?></strong></center></td>
	 <td colspan="1" width="3%"><center><strong>&nbsp;</strong></center></td>
	 <td colspan="1" width="5%"><center><strong><?php echo $total_pera; ?></strong></center></td>
	 <td colspan="1" width="6%"><center><strong><?php echo $total_aca; ?></strong></center></td>
	 <td colspan="1" width="3.5%"><center><strong>&nbsp;</strong></center></td>
	 <td colspan="1" width="5.5%"><center><strong><?php echo $total_gsis; ?></strong></center></td>
	 <td colspan="1" width="5%"><center><strong><?php echo $total_philhealth; ?></strong></center></td>
	 <td colspan="1" width="6%"><center><strong><?php echo $total_pagibig; ?></strong></center></td>
	 <td colspan="1" width="3.3%"><center><strong>&nbsp;</strong></center></td>
	 <td colspan="1" width="5.6%"><center><strong><?php echo $total_si; ?></strong></center></td>
	 <td colspan="1" width="3.1%">&nbsp;</strong></center></td>
	 <td colspan="1" width="15.5%"><center><strong>TOTAL</strong></center></td>
	 <td colspan="1" width="13%"><center><strong><?php echo $total_mb; ?></strong></center></td>
	 <td colspan="1" width="3.8%"><center><strong>&nbsp;</strong></center></td>
	 <td colspan="1" width="10%"><center><strong>TOTAL</strong></center></td>
	 <td colspan="1"><center><strong><?php echo $total_oi; ?></strong></center></td>
     </tr>
   </tr>
  </tbody>
  </table>
</body>
</html>
	</div>
</div>
</div>

<?php
else:
?>
  <h3 class="page-header">
    <div class="alert alert-danger">No record found!</div>
  </h3>
<?php
endif;
?>


 
			   
			   
			   
			   
			   
	 </div>
             </div>
           </div>
         </div>
       </div>
	   <script>
			function printContent(el){
				var restorepage = document.body.innerHTML;
				var printContent = document.getElementById(el).innerHTML;
				document.body.innerHTML = printContent;
				window.print();
				document.body.innerHTML = restorepage;
			}
		</script>
       <!-- /page content -->		   