$.getJSON(base_url + "rankingposition/get_dept/", function(data) {
				$.each(data, function(index, item) {
						$("#rp_office").append("<option value='"+item.office+"'>"+item.office+"</option>");
				});
			});

$('#rp_office').on('change', function(){
		$("#rp_position").empty();
	$.getJSON(base_url + "rankingposition/ajax_get_position/" + $('#rp_office').val(), function(data) {
	    $.each(data, function(index, item) {
			if(item.p_parent == null){
				$("#rp_position").append("<option value='"+item.p_id+"'>"+item.p_name+"</option>");
			}else{
				$("#rp_position").append("<option value='"+item.p_id+"'>"+item.p_name+'('+item.p_parent+')'+"</option>");
			}

	    });
	});

});


$("#rp_position").on('change', function(){
	$.getJSON(base_url + "rankingposition/ajax_get_position_sg/" + $("#rp_position").val(), function(data) {
		$.each(data, function(index, item) {

			$('div#rp_parent').html(item.p_parent);
			$('div#rp_sg').html(item.p_sg);
			$('div#rp_level').html(item.p_level);
			$('div#rp_educ').html('*<i>'+item.p_education+'</i>');
			$('div#rp_work').html('*<i>'+item.p_workdesc+'</i>');
			$('div#rp_training').html('*<i>'+item.p_trainingdesc+'</i>');
			$('div#rp_eligibility').html('*<i>'+item.p_eligibilitykind+'</i>');


			get_candidates($("#rp_position").val());
		});
	});
});

// education
// $.getJSON(base_url + "rankingposition/ajax_get_educ/", function(data) {
	// $.each(data, function(index, item) {
		// $("#rp_educ").append('<option value="'+item.p_education+'">'+item.p_education+'</option>');
		// });
	// });

// sector
// $.getJSON(base_url + "rankingposition/ajax_get_educ_sector/", function(data) {
	// $.each(data, function(index, item) {
		// $("#rp_educ_sector").append("<option value='"+item.p_educsector+"'>"+item.p_educsector+"</option>");
	// });
// });

var dt_rankingpositioncadidates = $('#dt_rankingpositioncadidates').DataTable();



function get_candidates(position){

	// alert(emp);
	$('#dt_rankingpositioncadidates').dataTable().fnDestroy();
	$('#dt_rankingpositioncadidates').DataTable({
		"ajax": {
		"url": base_url + "rankingposition/ajax_get_candidates/" + position,
		"dataSrc": ""
		},
		"columns": [
				{ "data": "name" },
				{ "data": "p_position" },
				{ "data": "office" }
		],

		columnDefs: [{
        // targets: [0, 1],
        visible: false,
        searchable: true,
			}, ],

		dom: '<"wrapper"Bfit>',
		buttons: [ { extend: 'excelHtml5',

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


}


	var dt_position = $('#dt_position').DataTable({
		"ajax": {
		"url": base_url + "rankingposition/ajax_get_position/",
		"dataSrc": ""
		},
		createdRow: function( row, data, dataIndex ) {
			$(row).find('td').attr('data-p_id', data.p_id);
			$(row).find('td').attr('data-p_code', data.p_code);
			$(row).find('td').attr('data-p_name', data.p_name);
			$(row).find('td').attr('data-p_sg', data.p_sg);
			$(row).find('td').attr('data-p_level', data.p_level);
			$(row).find('td').attr('data-p_eligibilitykind', data.p_eligibilitykind);
			$(row).find('td').attr('data-p_eligibility', data.p_eligibility);
			$(row).find('td').attr('data-p_education', data.p_education);
			$(row).find('td').attr('data-p_educdesc', data.p_educdesc);
			$(row).find('td').attr('data-p_educsector', data.p_educsector);
			$(row).find('td').attr('data-p_work_exp_years', data.p_work_exp_years);
			$(row).find('td').attr('data-p_workdesc', data.p_workdesc);
			$(row).find('td').attr('data-p_traininghrs', data.p_traininghrs);
			$(row).find('td').attr('data-p_trainingdesc', data.p_trainingdesc);
			$(row).find('td').attr('data-p_parent', data.p_parent);
			$(row).find('td').attr('data-p_relevance', data.p_relevance);
		},
		"columns": [
				{ "data": "p_code" },
				{ "data": "p_name" },
				{ "data": "p_sg" },
				{ "data": "p_level" },
				{ "data": "p_eligibilitykind" },
				{ "data": "p_eligibility" },
				{ "data": "p_education" },
				{ "data": "p_educdesc" },
				{ "data": "p_educsector" },
				{ "data": "p_work_exp_years" },
				{ "data": "p_workdesc" },
				{ "data": "p_traininghrs" },
				{ "data": "p_trainingdesc" },
				{ "data": "p_parent" },
				{ "data": "p_relevance" }
		],

		columnDefs: [{
        visible: false,
        searchable: true,
			}, ],

		dom: '<"wrapper"Bfit>',
		buttons: [ { extend: 'excelHtml5',

					customize: function( xlsx ) {
							var sheet = xlsx.xl.worksheets['sheet1.xml'];
									$('row c[r^="C"]', sheet).attr( 's', '2' ); } },

				],

		deferRender: true,
		scrollY: 380,
		scrollCollapse: true,
		scroller: true,
		scrollX: true,
		autoWidth: false,
		stateSave: true
	});

$('#dt_position tbody').on('click', 'td', function () {

   $('#frm_position #p_id').val($(this).data('p_id'));
   $('#frm_position #p_code').val($(this).data('p_code'));
   $('#frm_position #p_name').val($(this).data('p_name'));
   $('#frm_position #p_sg').val($(this).data('p_sg'));
   $('#frm_position #p_level').val($(this).data('p_level'));
   $('#frm_position #p_eligibilitykind').val($(this).data('p_eligibilitykind'));
   $('#frm_position #p_eligibility').val($(this).data('p_eligibility'));
   $('#frm_position #p_education').val($(this).data('p_education'));
   $('#frm_position #p_educdesc').val($(this).data('p_educdesc'));
   $('#frm_position #p_educsector').val($(this).data('p_educsector'));
   $('#frm_position #p_work_exp_years').val($(this).data('p_work_exp_years'));
   $('#frm_position #p_workdesc').val($(this).data('p_workdesc'));
   $('#frm_position #p_traininghrs').val($(this).data('p_traininghrs'));
   $('#frm_position #p_trainingdesc').val($(this).data('p_trainingdesc'));
   $('#frm_position #p_parent').val($(this).data('p_parent'));
   $('#frm_position #p_relevance').val($(this).data('p_relevance'));
});

$('#frm_position #btn_position_addnew').on('click',function(){
	$('#frm_position')[0].reset();
});

$('#frm_position').on('submit', function(){

	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "rankingposition/ajax_save_position/",
		data: $('#frm_position').serialize(),
			beforeSend: function(){
			new PNotify({
				title: 'Processing...',
                text: 'Please wait a moment',
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
					dt_position .ajax.reload();
					$('#frm_position')[0].reset();
				// setTimeout(function() {
                //        location.reload();
                //    }, 1000);
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



//---------------------------------------
$('#dt_employee_for_salary_adjustment').DataTable({
    "ajax": {
        "url": base_url + "salaryadjustment/ajax_get_candidate_for_salary_adjustment",
        "dataSrc": ""
    },
    "columns": [
		// function (data, type, row, meta) {
			// if(data.p_to_display != 'V-E-R-I-F-Y'){
				{ "data": function(data, type, row, meta) {
						return '<input type="checkbox" id="w_id" name="w_id" value="'+data.w_id+'">';
					}
				},
				{ "data": function(data, type, row, meta) {
						return '<a href="#"  data-toggle="modal" data-target="#modal-servicerecord" onclick="get_servicerecord('+ data.main_id +')">'+data.emp_name+'</a>';
					}
				},
				{ "data": "a_position" },
				{ "data": "a_status" },
				{ "data": "p_from" },
				{ "data": "p_to_display" },
				{ "data": "p_note_remarks" },
				{ "data": "a_office" },
				{ "data": "a_division" },
				{ "data": "pi_gender" },
				{ "data": "a_empno" },
				{ "data": "a_machineid" },
			// }
		// },
    ],
    dom: '<"wrapper"Bfit>',
    buttons: [{
            extend: 'excelHtml5',
            customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('row c[r^="C"]', sheet).attr('s', '2');
            }
        },

        {
            extend: 'print',
            exportOptions: {
                // columns: ':visible'
                // columns: [0, 1, 3, 4, 5, 6]
            },
        },
        // 'colvis'
    ],
    columnDefs: [{
        targets: [7],
        visible: false,
        searchable: true,
    }, ],
    deferRender: true,
    scrollY: 380,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,

});
