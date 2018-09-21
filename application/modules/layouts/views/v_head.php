<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- header -->
    <meta charset="utf-8">
	<meta name="referrer" content="origin-when-crossorigin" id="meta_referrer" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="1" />
	<?php define("VERSION", "2.2.5");   ?>
    <title><?php echo (isset($title)) ? $title . ' - CSFP - HRIS' : 'CSFP - HRIS'; ?></title>
    <link rel="icon" href="<?php echo base_url('img/csfplogo.ico');?>" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo base_url('img/csfplogo.ico');?>" type="image/x-icon" />

    <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">

    <link href="<?php echo base_url('css/font-awesome.min.css'); ?>" rel="stylesheet">

    <link href="<?php echo base_url('css/blue.css'); ?>" rel="stylesheet">

    <link href="<?php echo base_url('css/buttons.bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/fixedHeader.bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/responsive.bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/scroller.bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/jquery.mCustomScrollbar.min.css'); ?>" rel="stylesheet">

    <!-- pnotify -->
    <link href="<?php echo base_url('js/pnotify/dist/pnotify.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('js/pnotify/dist/pnotify.buttons.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('js/pnotify/dist/pnotify.nonblock.css'); ?>" rel="stylesheet">

    <link href="<?php echo base_url('css/custom.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/style.css?r='.time()); ?>" rel="stylesheet">

    <!-- datatable -->
    <link href="<?php echo base_url('css/datatable/jquery.dataTables.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/datatable/buttons.dataTables.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/datatable/fixedColumns.dataTables.min.css'); ?>" rel="stylesheet">

    <!-- Select2  -->
    <link href="<?php echo base_url('js/select2/dist/css/select2.min.css'); ?>" rel="stylesheet">

	<link href="<?php echo base_url('css/print.css?r='.time()); ?>" rel="stylesheet" type="text/css" media="print"/>

	<?php if($this->uri->segment(2) == 'grid_view')	{ ?>
		<link href="<?php echo base_url('css/animate.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('css/custom.css'); ?>" rel="stylesheet">
	    <link href="<?php echo base_url('css/icheck/flat/green.css'); ?>" rel="stylesheet">
	<?php } ?>

    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url('vendors/bootstrap-daterangepicker/daterangepicker.css'); ?>" rel="stylesheet">

	<?php if($this->uri->segment(1) == "reports" && $this->uri->segment(2) == "requestrecord") { ?>
		<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> -->

		<!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" /> -->
  		<!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> -->

		 <link rel="stylesheet" href="<?php echo base_url('vendors/summernote-master/dist/summernote.css'); ?>">
  		<!-- <script type="text/javascript" src="<?php echo base_url('vendors/summernote-master/dist/summernote.js');?>"></script> -->


        <!-- <script>
			// $('.summernote').summernote();
			$(document).ready(function() {
				$('.summernote').summernote({
					height: 300,
					tabsize: 2
				});
				});
		</script> -->


   <?php } ?>

	<?php if($this->uri->segment(2) == 'edit_employee' || $this->uri->segment(2) == 'listofapplicants' )	{ ?>
		<!-- Topaz Signature -->
		<script type="text/javascript" src="<?php echo base_url('website/js/SigWebTablet.js'); ?>"></script>

		<!-- photobooth -->
		<link href="<?php echo base_url('website/css/page.css');?>" rel="stylesheet" media="screen"  />
		<link href="<?php echo base_url('website/css/Photobooth.css'); ?>" rel="stylesheet">

		<!-- Click Function for Signature -->
		<script type="text/javascript">
			var tmr;
			function onSign()
			{
			   var ctx = document.getElementById('cnv').getContext('2d');
				// var ctx = $('#cnv').getContext('2d');
			   SetDisplayXSize( 500 );
			   SetDisplayYSize( 100 );
			   SetJustifyMode(0);
			   ClearTablet();
			   tmr = SetTabletState(1, ctx, 50) || tmr;
			}
			function onClear()
			{
			   ClearTablet();
			}
			function onDone()
			{
			   if(NumberOfTabletPoints() == 0)
			   {
				alert("Please sign before continuing");
			   }
			   else
			   {
				  SetTabletState(0, tmr);
				  //RETURN TOPAZ-FORMAT SIGSTRING
				  SetSigCompressionMode(1);
				  // document.frm_editemployee.bioSigData.value=GetSigString();
				  // document.frm_editemployee.sigStringData.value += GetSigString();
				  $('#bioSigData').val(GetSigString());
				  $('#sigStringData').val(GetSigString());
				  //this returns the signature in Topaz's own format, with biometric information
				  //RETURN BMP BYTE ARRAY CONVERTED TO BASE64 STRING
				  SetImageXSize(500);
				  SetImageYSize(100);
				  SetImagePenWidth(5);
				  GetSigImageB64(SigImageCallback);
			   }
			}

			function SigImageCallback( str )
			{
			   // document.frm_editemployee.sigImageData.value = str;
			    $('#sigImageData').val(str);
			}
		</script>
			<script type="text/javascript">
			window.onunload = window.onbeforeunload = (function(){
			closingSigWeb()
			})
			function closingSigWeb()
			{
			   ClearTablet();
			   SetTabletState(0, tmr);
			}
			</script>
	<?php } ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
