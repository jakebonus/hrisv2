$(window).bind("load", function() {
   //GET OFFICE
	$.getJSON(base_url + "employee/ajax_get_office", function(data) {
		$("#a_office option").detach();
		$("#a_office").append('<option value="all">ALL</option>');
		$.each(data, function(index, item) {
			$("#a_office").append("<option value=" + item.o_id + ">" + item.o_code + "</option>");
			var a = "#a_office option." + index;
			$(a).attr("value", item.o_code);
		});
	});

	//GET Employee
	$.getJSON(base_url + "employee/ajax_get_employee", function(data) {
		$("#employee option").detach();
		$("#employee").append('<option value="all">ALL</option>');
		$.each(data, function(index, item) {
			$("#employee").append("<option value=" + item.a_id + ">" + item.a_lastname + ','+ item.a_firstname +' '+ item.a_middlename +' ' +"</option>");
			var a = "#employee option." + index;
			$(a).attr("value", item.o_code);
		});
	});
});

$('#dt_employee_sr').DataTable({
		"ajax": {
		"url": base_url + "employee/ajax_get_employee_list/",
		"dataSrc": ""
		},
		createdRow: function( row, data, dataIndex ) {
			$(row).find('td').attr('data-a_id', data.a_id);
		},

		"columns": [
				{ "data": "emp_name" },
				{ "data": "a_isactive" }
		],

		columnDefs: [{
        // targets: [0, 1],
        visible: false,
        searchable: true,
			}, ],

		dom: '<"wrapper"Bfit>',
		buttons: [ { extend: 'excelHtml5',
			className: 'green',
					'text': '<i class="fa fa-download"></i>',
					customize: function( xlsx ) {
							var sheet = xlsx.xl.worksheets['sheet1.xml'];
									$('row c[r^="C"]', sheet).attr( 's', '2' ); } },
					// { extend: 'print', exportOptions: { columns: [ 0, 1, 3, 4 ] },
					// },
				],

		deferRender: true,
		scrollY: 380,
		scrollCollapse: true,
		scroller: true,
		scrollX: true,
		autoWidth: false,
		stateSave: true
	});

$('select.column_filter').change(function() {
    filterColumn($(this).parents('div').attr('data-column'));

});

function filterColumn(i) {
		// alert(i);
    $('#dt_employee_sr').DataTable().column(i).search(
        $('#col' + i + '_filter').val(),
        $('#col' + i + '_regex').prop('checked'),
        $('#col' + i + '_smart').prop('checked')
    ).draw();
}

$('#dt_employee_sr tbody').on( 'click', 'td', function () {
	// alert($(this).data('w_id'));
   // $('#frm_servicerecord #a_id').val($(this).data('a_id'));
   // var a_id = $(this).data('a_id');
   // alert(a_id);
   $('#frm_servicerecord #a_id').val($(this).data('a_id'));
	emp_sr($(this).data('a_id'));
	// emp_sr($(this).data('a_id'));
});


//GET DIVISION
$('#a_office').on('change', function() {
		var svr = {
			a_office: $('#a_office').val(),
			a_division: $('#a_division').val(),
			a_status: $('#a_status').val(),
		}
	dynamicfilter(svr);


    var dynamicoffice = {
        sel_office: $('#a_office').val(),
    }
	 $.ajax({
        dataType: "json",
        type: "POST",
        url: base_url + "employee/ajax_get_division1/",
        data:  dynamicoffice,
        success: function(result) {
            $("#a_division option").detach();
            $('#a_division').append('<option value="all">ALL</option>');
			 $('#a_division').append('<option value="113">No Division</option>');
            $.each(result, function(i, item) {
                $('#a_division').append('<option value="' + item.o_id + '">' + result[i].o_code + '</option>');
            });
        }
    });

    return false;
});
$('#a_division').on('change', function() {
	var svr = {
			a_office: $('#a_office').val(),
			a_division: $('#a_division').val(),
			a_status: $('#a_status').val(),
		}
	dynamicfilter(svr);
});

$('#a_status').on('change', function() {
	var svr = {
			a_office: $('#a_office').val(),
			a_division: $('#a_division').val(),
			a_status: $('#a_status').val(),
		}
	dynamicfilter(svr);
});

var emp_svr_table = $('#dt_employee_service_record').DataTable({

	columnDefs: [{
        targets: [0, 1],
        visible: false,
        searchable: true,
			}, ],
});

$('#dt_employee_service_record tbody').on( 'click', 'td', function () {
	// alert($(this).data('w_id'));
	$('#label').text('Edit Service Record');
	$('#btn_save_sr').text('Update');
   $('#frm_servicerecord #w_id').val($(this).data('w_id'));
   $('#frm_servicerecord #a_id').val($(this).data('a_id'));
   $('#frm_servicerecord #p_position').val($(this).data('p_position'));
   $('#frm_servicerecord #p_from').val($(this).data('p_from'));
   $('#frm_servicerecord #p_to').val($(this).data('p_to'));
   $('#frm_servicerecord #p_company').val($(this).data('p_company'));
   $('#frm_servicerecord #p_salarygrade').val($(this).data('p_salarygrade'));
   $('#frm_servicerecord #p_appointment').val($(this).data('p_appointment'));
   $('#frm_servicerecord #p_salarymonthly').val($(this).data('p_salarymonthly'));

   $('#frm_servicerecord #p_salarystep').val($(this).data('p_salarystep'));
   $('#frm_servicerecord #p_dept').val($(this).data('p_dept'));
   $('#frm_servicerecord #p_div').val($(this).data('p_div'));
   $('#frm_servicerecord #p_lwop').val($(this).data('p_lwop'));
   $('#frm_servicerecord #p_sept_date').val($(this).data('p_sept_date'));
   $('#frm_servicerecord #p_sept_cause').val($(this).data('p_sept_cause'));
   $('#frm_servicerecord #p_note_remarks').val($(this).data('p_note_remarks'));

    // $('#frm_servicerecord #modal_id').attr($(this).data('w_id'));
    $('#frm_servicerecord #modal_id').attr('data-w_id',$(this).data('w_id'));
});

$('#employee').on('change', function() {

	if($('#employee').val() != 'all'){
		$('#a_id').val($('#employee').val());
		$('#dt_employee_service_record').dataTable().fnDestroy(); // Clean datatable before reinitialized
		emp_sr($('#employee').val());
	}
});

function emp_sr(emp){

	// alert(emp);
$('#dt_employee_service_record').dataTable().fnDestroy();
	$('#dt_employee_service_record').DataTable({
		"ajax": {
		"url": base_url + "employee/ajax_get_servicerecord/" + emp,
		"dataSrc": ""
		},
		createdRow: function( row, data, dataIndex ) {
			$(row).find('td').attr('data-w_id', data.w_id);
			$(row).find('td').attr('data-a_id', data.a_id);
			$(row).find('td').attr('data-p_position', data.p_position);
			$(row).find('td').attr('data-p_from', data.p_from);
			$(row).find('td').attr('data-p_to', data.p_to);
			$(row).find('td').attr('data-p_company', data.p_company);
			$(row).find('td').attr('data-p_salarygrade', data.p_salarygrade);
			$(row).find('td').attr('data-p_appointment', data.p_appointment);
			$(row).find('td').attr('data-p_salarymonthly', data.p_salarymonthly);

			$(row).find('td').attr('data-p_salarystep', data.p_salarystep);
			$(row).find('td').attr('data-p_dept', data.p_dept);
			$(row).find('td').attr('data-p_div', data.p_div);
			$(row).find('td').attr('data-p_lwop', data.p_lwop);
			$(row).find('td').attr('data-p_sept_date', data.p_sept_date);
			$(row).find('td').attr('data-p_sept_cause', data.p_sept_cause);
			$(row).find('td').attr('data-p_note_remarks', data.p_note_remarks);
		},

		"columns": [
			// function (data, type, row, meta) {
			// if(data.p_to_display != 'V-E-R-I-F-Y'){
				{ "data": "w_id" },
				{ "data": "a_id" },
				{ "data": "p_position" },
				{ "data": function (data, type, row, meta) { return data.p_from +' to ' + data.p_to }},
				{ "data": function (data, type, row, meta) { return data.p_salarygrade +'/' + data.p_salarystep }},
				{ "data": "p_appointment" },
				{ "data": "p_salarymonthly" },
				{ "data": "p_company" },
				{ "data": "p_dept" },
				{ "data": "p_div" },
				{ "data": "p_lwop" },
				{ "data": "p_sept_date" },
				{ "data": "p_sept_cause" },
				{ "data": "p_note_remarks" },
			// }
			// },
		],


		columnDefs: [{
        targets: [0, 1],
        visible: false,
        searchable: true,
			}, ],

		dom: '<"wrapper"Bfit>',
		buttons: [ { extend: 'excelHtml5',

					customize: function( xlsx ) {
							var sheet = xlsx.xl.worksheets['sheet1.xml'];
									$('row c[r^="C"]', sheet).attr( 's', '2' ); } },
					{ extend: 'print', exportOptions: { columns: [ 0, 1, 3, 4 ] },
					},
				],

		deferRender: true,
		scrollY: 380,
		scrollCollapse: true,
		scroller: true,
		scrollX: true,
		autoWidth: false,
		stateSave: true
	});


}

	$('#dt_employee_service_record tbody').on( 'click', 'tr', function () {
	   if ( $(this).hasClass('selected') ) {
		   $(this).removeClass('selected');
	   }
	   else {
		   $('#dt_employee_service_record tbody tr.selected').removeClass('selected');
		   $(this).addClass('selected');
	   }
	});

function dynamicfilter(svr) {
    $.ajax({
        dataType: "json",
        type: "POST",
        url: base_url + "employee/ajax_get_employee/",
        data:  svr,
        success: function(result) {
            $("#employee option").detach();
          $("#employee").append('<option value="all">ALL</option>');
            $.each(result, function(i, item) {
                $('#employee').append('<option value="' + item.a_id + '">' + item.a_lastname + ',' + item.a_firstname +' '+ item.a_middlename +' ' + '</option>');
            });
        }
    });
    return false;
}


$('#frm_servicerecord').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/ajax_save_service_record/",
			data: $('#frm_login').serialize(),
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
		},
		data: $('#frm_servicerecord').serialize(),
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });

					// alert($('#employee').val());
					$('#dt_employee_service_record').dataTable().fnDestroy();

					$('#frm_servicerecord')[0].reset();
					$('#a_id').val($('#employee').val());
					$('#w_id').val();
					emp_sr($('#employee').val());


					// setTimeout(function() {
                        // location.reload();
                    // }, 1000);
			}else{
				new PNotify({
                        title: 'Error',
                        text: data.content,
                        type: 'danger',
                        styling: 'bootstrap3'
                    });
			}
		}
	}).error(function(){
			alert('Connection problems occurred...');
	});
	return false;
});

$('#add_new_svr').on('click', function(){

	$('#label').text('Add New Service Record');
	$('#btn_save_sr').text('Save New');

	$('#frm_servicerecord #w_id').val('');
   // $('#frm_servicerecord #a_id').val('');
   $('#frm_servicerecord #p_position').val('');
   $('#frm_servicerecord #p_from').val('');
   $('#frm_servicerecord #p_to').val('');
   $('#frm_servicerecord #p_company').val('');
   $('#frm_servicerecord #p_salarygrade').val('');
   $('#frm_servicerecord #p_appointment').val('');
   $('#frm_servicerecord #p_salarymonthly').val('');

   $('#frm_servicerecord #p_salarystep').val('');
   $('#frm_servicerecord #p_dept').val('');
   $('#frm_servicerecord #p_div').val('');
   $('#frm_servicerecord #p_lwop').val('');
   $('#frm_servicerecord #p_sept_date').val('');
   $('#frm_servicerecord #p_sept_cause').val('');
   $('#frm_servicerecord #p_note_remarks').val('');

   // Modal
   $('#frm_servicerecord #modal_id').val('');
	$('#modal_id').removeAttr('data-w_id');
});

 $('#modal_svr_delete').on('show.bs.modal', function(e) {
	$('#m_w_id').val($(e.relatedTarget).data('w_id'));
	if($('#m_w_id').val() == ''){
		$('.p_title').html('No Service Record Selected!');
		$('#m_is_svr').val('0');
	}else{
		$('.p_title').html('');
		$('#m_is_svr').val('1');
	}
});

$('#frm_svr_delete').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + 'employee/delete_servicerecord',
		data: $('#frm_svr_delete').serialize(),
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
		},
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                        location.reload();
                    }, 1000);
			}else{
				$('#btn_close').trigger('click');
				new PNotify({
                        title: 'Error',
                        text: data.content,
                        type: 'danger',
                        styling: 'bootstrap3'
                    });
			}
		}
	}).error(function(){
			alert('Connection problems occurred...');
	});
	return false;
});

function ajax(destination,values){

}
