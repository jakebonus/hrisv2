
      </div>
    </div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-38967746-3', 'auto');
  ga('send', 'pageview');

</script>
    <script>var base_url = '<?php echo base_url(); ?>';</script>
		
			<script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
	<!-- pnotify -->
		<script src="<?php echo base_url('js/pnotify/dist/pnotify.js'); ?>"></script>
		<script src="<?php echo base_url('js/pnotify/dist/pnotify.buttons.js'); ?>"></script>
		<script src="<?php echo base_url('js/pnotify/dist/pnotify.nonblock.js'); ?>"></script>

		
		
		<!-- kuya mart sample request -->
		    <script src="<?php echo base_url('js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/datatables.scroller.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/datatable/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/datatable/buttons.print.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/datatable/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/datatable/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/datatable/dataTables.fixedColumns.min.js'); ?>"></script>
			<!-- kuya mart sample request -->
	
	
	
		<script src="<?php echo base_url('js/kuyamart.js?r='.time()); ?>"></script>
	<?php if($this->uri->segment('1') == 'login'){?>
		<script src="<?php echo base_url('js/login.js?r='.time()); ?>"></script>
	<?php }else{ ?>
		<script src="<?php echo base_url('js/user_login.js?r='.time()); ?>"></script>
	<?php } ?>
  
  </body>
  <script>
	// url = window.location.href;
	// alert(url);
	// if(url == 'www.cityofsanfernando.gov.ph/hris'){
		// window.location.href = 'http://cityofsanfernando.gov.ph/hris';
	// }
	
	// if(url == 'www.cityofsanfernando.gov.ph/hris/login'){
		// window.location.href = 'http://cityofsanfernando.gov.ph/hris/login';
	// }
  </script>
</html>
