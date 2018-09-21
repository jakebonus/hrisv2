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
    <script>var a_deptlocation = '<?php echo $this->session->userdata('a_deptlocation'); ?>';</script>
    <script>var a_profile = '<?php echo strtolower($this->session->userdata('a_profile')); ?>';</script>
    <script>var a_equivalentleaveday = '<?php echo $this->session->userdata('a_eld'); ?>';</script>
    <script>var a_id = '<?php echo $this->session->userdata('a_id'); ?>';</script>




    






     <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>

    <script src="<?php echo base_url('js/fastclick.js'); ?>"></script>
    <script src="<?php echo base_url('js/nprogress.js'); ?>"></script>
    <script src="<?php echo base_url('js/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>

    <!-- dataTables -->
    <script src="<?php echo base_url('js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/datatables.scroller.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/datatable/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/datatable/buttons.print.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/datatable/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/datatable/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/datatable/dataTables.fixedColumns.min.js'); ?>"></script>

    <!-- inputmask -->
    <script src="<?php echo base_url('js/jquery.inputmask.bundle.min.js'); ?>"></script>

    <!-- Select2 -->
		<script src="<?php echo base_url('js/select2/dist/js/select2.full.min.js'); ?>"></script>

    <!-- pnotify -->
    <script src="<?php echo base_url('js/pnotify/dist/pnotify.js'); ?>"></script>
    <script src="<?php echo base_url('js/pnotify/dist/pnotify.buttons.js'); ?>"></script>
    <script src="<?php echo base_url('js/pnotify/dist/pnotify.nonblock.js'); ?>"></script>

	  <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('vendors/moment/min/moment.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('js/custom.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/count_forapproval.js?r='.VERSION); ?>"></script>

    <!-- jquery.inputmask -->
    <script>

		$(".select2_multiple").select2({
          maximumSelectionLength: 5,
          placeholder: "With Max Selection limit 5",
          allowClear: true
        });

		$(".select2_single").select2({
          placeholder: "Select Course",
          allowClear: true
        });

		$('.date_range').daterangepicker(null, function(start, end, label) {
			console.log(start.toISOString(), end.toISOString(), label);
		});

		 // $('.date_pick').daterangepicker({
          // singleDatePicker: true,
          // singleClasses: "picker_2"
        // }, function(start, end, label) {
          // console.log(start.toISOString(), end.toISOString(), label);
        // });


    $('.datepicker').daterangepicker({
		singleDatePicker: true,
        autoclose: true
    });

      $(document).ready(function() {
        $(".time").inputmask("hh:mm",{ "placeholder": "hh:mm" });
        $(".date").inputmask("yyyy-mm-dd",{ "placeholder": "yyyy-mm-dd" });
        $(".numeric").inputmask('decimal', { rightAlign: false });
        $(".currency").inputmask("numeric", {
            radixPoint: ".",
            groupSeparator: ",",
            digits: 2,
            autoGroup: true,
            prefix: '₱ ',
            rightAlign: false,
            oncleared: function () { self.Value(''); }
        });
      });


    </script>

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
                responsive: true,
                scrollY:  '360px',
                scrollCollapse: true,
                paging:   false,
                deferRender: true,
                scrollY: 280,
                scrollCollapse: true,
                scrollX: true,
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        TableManageButtons.init();

        $('.dataTables_wrapper input[type=search]').addClass('form-control form-control1');
        $('.dataTables_wrapper .dt-buttons').addClass('btn-group');
        $('.dataTables_wrapper .dt-buttons a').addClass('btn btn-default');
        $('.dataTables_wrapper .dt-buttons a').removeClass('dt-button');
    });
    </script>
    <!-- /Datatables -->
       <script src="<?php echo base_url('js/preloadeddata.js?r='.VERSION); ?>"></script>
    <?php if($this->uri->segment(1) == "employee" && $this->uri->segment(2) == "change_password") { ?>
    	<script src="<?php echo base_url('js/admin_changepassword.js?r='.VERSION); ?>"></script>
    <?php } ?>

    <?php if($this->uri->segment(1) == "user") { ?>
	<!--script src="<?php //echo base_url('js/bootstrap-datepicker.js'); ?>"></script-->

    	<script src="<?php echo base_url('js/moment_2_18_1.js?r='.VERSION); ?>"></script>
	       <script src="<?php echo base_url('js/user.js?r='.VERSION); ?>"></script>
	       <script src="<?php echo base_url('js/user_profile.js?r='.VERSION); ?>"></script>
    <?php } ?>



	<?php if($this->uri->segment(1) == "employee" && $this->uri->segment(2) == "leave_for_approval") { ?>
    	<script src="<?php  echo base_url('js/forapproval.js?r='.VERSION); ?>"></script>
    <?php } ?>



	<?php if($this->uri->segment(2) == "get_forapproval_children" ||
			$this->uri->segment(2) == "get_forapproval_education" ||
			$this->uri->segment(2) == "get_forapproval_eligibility" ||
			$this->uri->segment(2) == "get_forapproval_workexp" ||
			$this->uri->segment(2) == "get_forapproval_volworkexp" ||
			$this->uri->segment(2) == "get_forapproval_training" ||
			$this->uri->segment(2) == "get_forapproval_skills"||
			$this->uri->segment(2) == "get_forapproval_reff"){ ?>
    	<script src="<?php echo base_url('js/forapproval.js?r='.VERSION); ?>"></script>
    <?php } ?>

	<?php if($this->uri->segment(1) == "employee" && $this->uri->segment(2) == "") { ?>
        <script src="<?php echo base_url('js/employee.js?r='.VERSION); ?>"></script>
    <?php } ?>

	<?php // if($this->uri->segment(1) == "reports" && $this->uri->segment(2) != "requestrecord") { ?>
        
    <?php // } ?>

    
    <?php if($this->uri->segment(1) == "reports" && $this->uri->segment(2) == "requestrecord") { ?>

        <link rel="stylesheet" href="<?php echo base_url('vendors/summernote-master/dist/summernote.css'); ?>">
  		<script type="text/javascript" src="<?php echo base_url('vendors/summernote-master/dist/summernote.js');?>"></script>
        <script>
			$(document).ready(function() {
				$('.summernote').summernote({
					height: 300,
					tabsize: 2
				});
				});
		</script>
        <script src="<?php echo base_url('js/reports.js?r='.VERSION); ?>"></script> 
   <?php } ?>

	<?php if($this->uri->segment(2) == "add_new") { ?>
        <script src="<?php echo base_url('js/new_employee.js?r='.VERSION); ?>"></script>
    <?php } ?>

	<?php if($this->uri->segment(2) == "service_record") { ?>
		<script src="<?php echo base_url('js/servicerecord.js?r='.VERSION); ?>"></script>
	<?php } ?>

  	<?php if($this->uri->segment(2) == "edit_employee") { ?>
  		<script src="<?php echo base_url('js/edit_employee.js?r='.VERSION); ?>"></script>

  	<?php } ?>

	 	<?php if($this->uri->segment(1) == "rankingposition") { ?>
  		<script src="<?php echo base_url('js/rankingposition.js?r='.VERSION); ?>"></script>

  	<?php } ?>

    <?php if($this->uri->segment(2) == "export") { ?>
        <script src="<?php echo base_url('js/export_xls.js?r='.VERSION); ?>"></script>
    <?php } ?>

    <?php if($this->uri->segment(1) == "office") { ?>
      <script src="<?php echo base_url('js/office.js?r='.VERSION); ?>"></script>
    <?php } ?>

    <?php if($this->uri->segment(1) == "salarygrade") { ?>
      <script src="<?php echo base_url('js/salarygrade.js?r='.VERSION); ?>"></script>
    <?php } ?>

    <?php if($this->uri->segment(2) == "requestrecord") { ?>
        <script src="<?php echo base_url('js/request_record.js?r='.VERSION); ?>"></script>
    <?php } ?>

    <?php if($this->uri->segment(2) == "leave") { ?>
        <script src="<?php echo base_url('js/leave.js?r='.VERSION); ?>"></script>
    <?php } ?>

    <?php if($this->uri->segment(2) == "leave_masterlist") { ?>
        <script src="<?php echo base_url('js/leavemasterlist.js?r='.VERSION); ?>"></script>
    <?php } ?>

    <?php if($this->uri->segment(2) == "grid_view") { ?>
	    <script src="<?php echo base_url('js/custom.js'); ?>"></script>
        <script src="<?php echo base_url('js/pace/pace.min.js'); ?>"></script>
    <?php } ?>

    <?php if($this->uri->segment(1) == "user" && $this->uri->segment(2) == "leave_for_approval" || $this->uri->segment(2) == "for_leave_for_approval") { ?>
	    <!--script src="<?php //  echo base_url('js/leaveforapproval.js?r='.time()); ?>"></script-->
    <?php } ?>

	 <?php if($this->uri->segment(1) == "user" && $this->uri->segment(2) == "own_leave_for_approval"  || $this->uri->segment(2) == "for_leave_for_approval" ) { ?>
	    <script src="<?php echo base_url('js/leaveforapproval.js?r='.VERSION); ?>"></script>
    <?php } ?>

    <?php if($this->uri->segment(2) == "own_get_actioned_leave" || $this->uri->segment(2) == "for_get_actioned_leave") { ?>
	    <script src="<?php echo base_url('js/leaveforapproval.js?r='.VERSION); ?>"></script>
    <?php } ?>

    <?php if($this->uri->segment(1) == "reports" && $this->uri->segment(2) == "step_increment_report") { ?>
        <script src="<?php echo base_url('js/step_increment_report.js?r='.VERSION); ?>"></script>
    <?php } ?>

    <?php if($this->uri->segment(2) == "edit_employee" ) { ?>
    	<script>
    	$('#example' ).photobooth().on( "image", function(event, dataUrl){
    		$( "#gallery" ).show().html( '<img id="userpics" name= "userpics" src="' + dataUrl + '" >');
    	});
    	$( '.tab_container' ).each(function( i, elem ){
    		$( elem ).find( ".tabs li" ).click(function(){
    			$( elem ).find( ".tabs li.selected" ).removeClass( "selected" );
    			$( this ).addClass( "selected" );
    			$( elem ).find( ".tab_content" ).hide();
    			$( elem ).find( ".tab_content." + $(this).attr( "calls" ) ).show();
        	});
        });
    	</script>
    <?php } ?>

    <?php if($this->uri->segment(2) == "request" || $this->uri->segment(2) == "leave_print_request") { ?>
        <script>
        $(document).ready(function() {
            setTimeout(function() {
                $( "#onload_click" ).trigger( "click" );
            }, 100);
        });
        </script>
    <?php } ?>

    <?php if($this->uri->segment(1) == "user" && $this->uri->segment(2) == "leave_filed") { ?>
        <script src="<?php echo base_url('js/user_leave_filed.js?r='.VERSION); ?>"></script>
    <?php } ?>
    <?php if($this->uri->segment(2) == "step_increment" ) { ?>
        <script src="<?php echo base_url('js/step_increment.js?r='.VERSION); ?>"></script>
    <?php } ?>

    <?php if($this->uri->segment(2) == "for_verification") { ?>
        <script src="<?php echo base_url('js/leaveforverification.js?r='.VERSION); ?>"></script>
    <?php } ?>

    <?php if($this->uri->segment(1) == "reports" && $this->uri->segment(2) == "salarygrade") { ?>
        <script src="<?php echo base_url('js/salarygrade_list.js?r='.VERSION); ?>"></script>
    <?php } ?>

	   <?php if($this->uri->segment(1) == "salaryadjustment") { ?>
        <script src="<?php echo base_url('js/salary_adjustment.js?r='.VERSION); ?>"></script>
    <?php } ?>





	   <?php if($this->uri->segment(1) == "onlineapplicant") { ?>
        <script src="<?php echo base_url('js/onlineapplicant.js?r='.VERSION); ?>"></script>

    <?php } ?>
	 <?php if($this->uri->segment(2) == "listofapplicants" || $this->uri->segment(2) == "edit_employee") { ?>
		<script type="text/javascript" src="<?php echo base_url('website/js/photobooth_min.js'); ?>"></script>
			<script>
			$('#example' ).photobooth().on( "image", function(event, dataUrl){
				$( "#gallery" ).show().html( '<img id="userpics" name= "userpics" src="' + dataUrl + '" >');
			});
			$( '.tab_container' ).each(function( i, elem ){
				$( elem ).find( ".tabs li" ).click(function(){
					$( elem ).find( ".tabs li.selected" ).removeClass( "selected" );
					$( this ).addClass( "selected" );
					$( elem ).find( ".tab_content" ).hide();
					$( elem ).find( ".tab_content." + $(this).attr( "calls" ) ).show();
				});
			});
    	</script>
<?php } ?>

<!-- set to upper case -->
<?php if($this->uri->segment(2) == "for_verification" || $this->uri->segment(2) == "service_record" || $this->uri->segment(2) == "change_password") { ?>
	<!--  AUTO CAPS LOCK IS DISABLED -->
<?php }else{ ?>
<script>
$(function() {
    $('input, textarea').keyup(function() {
        this.value = this.value.toLocaleUpperCase();
    });
});
</script>
<?php } ?>
	<script>
		$.getJSON(base_url + "onlineapplicant/ajax_get_province/", function(data) {
			$.each(data, function(index, item) {
				$("#frm_editappinfo #oa_province").append("<option value='"+item.p_id+"'>"+item.p_name+"</option>");
			});
		});

	</script>


  </body>
</html>
