$(function() {
// get job vacancies
	$.getJSON(base_url + "onlineapplicant/ajax_get_vacancy/", function(data) {
				$.each(data, function(index, item) {
						$("#col6_filter").append("<option value='"+item.v_position+" ("+item.v_desc+")"+"'>"+item.v_position+"("+item.v_desc+")</option>");
				});
			});		
			
	$.getJSON(base_url + "onlineapplicant/ajax_get_brgy/", function(data) {
				$.each(data, function(index, item) {
						$("#col13_filter").append("<option value='"+item.b_name+"'>"+item.b_name+"</option>");
				});
			});	
});

$('input.column_filter').on('keyup click', function() {
    filterColumn($(this).parents('div').attr('data-column'));
});

$('select.column_filter').change(function() {
    filterColumn($(this).parents('div').attr('data-column'));
});

function filterColumn(i) {
		// alert(i);
    $('#dt_onlineapplicant').DataTable().column(i).search(
        $('#col' + i + '_filter').val(),
        $('#col' + i + '_regex').prop('checked'),
        $('#col' + i + '_smart').prop('checked')
    ).draw();
}


function filterReset() {
    $('#col7_filter').val('');
    // $('#col8_filter').val('yes');
    dt_onlineapplicant.search('').columns().search('').draw();
    filterColumn($('#col7_filter').parents('div').attr('data-column'));
}

var dt_onlineapplicant = $('#dt_onlineapplicant').DataTable({
	
    "ajax": {
        "url": base_url + "onlineapplicant/ajax_get_applicant",
        "dataSrc": ""
    },
    "columns": [
        { "data": function(data, type, row, meta) {
                // return '<a href="#" data-toggle="modal" data-oa_id="' + data.oa_id + '">' + data.oa_id + '</a>';
                return '<input type="checkbox" value="' + data.oa_id + '" id="oa_id" name="oa_id">';
            }
        },
        // { "data": "oa_id" },
        { "data": "application_no" },
		{ "data": "name" },
		{ "data": "education" },
		{ "data": "oa_eligibility" },
		{ "data": "oa_mobile" },
		{ "data": "position_desired" },
		{ "data": "oa_gender" },
		{ "data": "oa_email" },
		{ "data": "oa_course" },
		{ "data": "oa_school" },
		{ "data": "p_name" },
		{ "data": "c_name" },
		{ "data": "brgy" },
		{ "data": "oa_skills" },
		{ "data": "oa_awards" },
		{ "data": "oa_bdate" },
		{ "data": "age" }
    ],
    dom: '<"wrapper"Bfit>',
    buttons: [{
            extend: 'excelHtml5',
            customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('row c[r^="C"]', sheet).attr('s', '2');
            }
        },

        // {
            // extend: 'print',
            // exportOptions: {
                // columns: ':visible'
                // columns: [0, 1, 3, 4, 23, 24]
            // },
        // },
        // 'colvis'
    ],
    columnDefs: [{
        targets: [8, 9, 10, 11, 12, 13, 14, 15, 16, 17],
        visible: false,
        searchable: true,
    }, ],
    deferRender: true,
    scrollY: 380,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,
    fixedColumns: {
        leftColumns: 1
        // rightColumns: 8
    },
    // fnInitComplete: function(oSettings, json) {
        // $('.glyphicon-remove').trigger("click");
    // },
    oScroller: {
      rowHeight: 30
    }
    //autoWidth: false,
    //stateSave: true
});


$('#dt_vacancies tbody').on('click', 'td', function () {
alert('asdasd');
   $('#frm_vacancies #v_position').val($(this).data('v_position'));
   $('#frm_vacancies #v_desc').val($(this).data('v_desc'));
   $('#frm_vacancies #v_id').val($(this).data('v_id'));
});

var dt_vacancies = $('#dt_vacancies').DataTable({
	
    "ajax": {
        "url": base_url + "onlineapplicant/ajax_get_vacancy",
        "dataSrc": ""
    },
	
	createdRow: function( row, data, dataIndex ) {
			$(row).find('td').attr('data-v_position', data.v_position);
			$(row).find('td').attr('data-v_desc', data.v_desc);
			$(row).find('td').attr('data-v_id', data.v_id);
		},
	
    "columns": [

        { "data": "v_position" },
		{ "data": "v_desc" },
		{ "data": "v_id" }
		],
    dom: '<"wrapper"Bfit>',
    buttons: [{
            extend: 'excelHtml5',
            customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('row c[r^="C"]', sheet).attr('s', '2');
            }
        },

        // {
            // extend: 'print',
            // exportOptions: {
                // columns: ':visible'
                // columns: [0, 1, 3, 4, 23, 24]
            // },
        // },
        // 'colvis'
    ],
    // columnDefs: [{
        // targets: [8, 9, 10, 11, 12, 13, 14, 15, 16, 17],
        // visible: false,
        // searchable: true,
    // }, ],
    deferRender: true,
    scrollY: 380,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,
    // fixedColumns: {
        // leftColumns: 1
        // rightColumns: 8
    // },
    // fnInitComplete: function(oSettings, json) {
        // $('.glyphicon-remove').trigger("click");
    // },
    oScroller: {
      rowHeight: 30
    }
    //autoWidth: false,
    //stateSave: true
});
$('#frm_vacancies').on('submit', function(){
	 $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url + "onlineapplicant/ajax_save_vacancy",
        data: $('#frm_vacancies').serialize(),
		beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
                    type: 'info',
                    styling: 'bootstrap3'
                });
		},

        success: function(data) {
            if (data.status == "yes") {
                new PNotify({
                    title: 'Success',
                    text: data.content,
                    type: 'success',
                    styling: 'bootstrap3'
                });
                // $('.close').trigger("click");
                //otable.search( '' ).columns().search( '' ).draw();

                setTimeout(function() {
                    $('.glyphicon-remove').trigger("click");
                    location.reload();
                    // filterReset();
                }, 1000);
            } else {
                new PNotify({
                    title: 'Error',
                    text: data.content,
                    type: 'error',
                    styling: 'bootstrap3'
                });
            }
        }
    }).error(function() {
        alert('Connection problems occurred... Unable to connect to the Internet! The Internet connection has been lost.');
    });
    return false;
});


$('#btn_sendemail').on('click', function(){

		var checkValues =  $('input[name=oa_id]:checked').map(function()
			{
				return $(this).val();
			}).get();
			
		var promote = {
			oa_id: checkValues,
			es_date : $('#es_date').val(),
		};
	 // alert(checkValues);
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "onlineapplicant/send_email/",
			data: promote,
			beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
                    type: 'info',
                    styling: 'bootstrap3'
                });
			},
			success: function(data) {
				if (data.status == "yes") {
					new PNotify({
						title: 'Success',
						text: data.content,
						type: 'success',
						styling: 'bootstrap3'
					});
					// $('.close').trigger("click");
					
					
					// otable.search( '' ).columns().search( '' ).draw();

				
				} else {
					new PNotify({
						title: 'Error',
						text: data.content,
						type: 'error',
						styling: 'bootstrap3'
					});
				}
				
				if (data.sv_error_notify == "yes") {
					new PNotify({
							title: 'Error',
							text: data.names,
							type: 'error',
							styling: 'bootstrap3'
						});
				}
				
					setTimeout(function() {
						$('.glyphicon-remove').trigger("click");
						location.reload();
						// filterReset();
					}, 1000000);
			}
		}).error(function() {
			alert('Connection problems occurred... Unable to connect to the Internet! The Internet connection has been lost.');
		});
		return false;
	
});