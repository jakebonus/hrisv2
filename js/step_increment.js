$('#dt_employee_for_step_increment').DataTable({
    "ajax": {
        "url": base_url + "employee/ajax_get_candidate_for_step_increment",
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

$('input.column_filter').on('keyup click', function() {
    filterColumn($(this).parents('div').attr('data-column'));
});

$('select.column_filter').change(function() {
    filterColumn($(this).parents('div').attr('data-column'));
});

function filterColumn(i) {
    $('#dt_employee_for_step_increment').DataTable().column(i).search(
        $('#col' + i + '_filter').val(),
        $('#col' + i + '_regex').prop('checked'),
        $('#col' + i + '_smart').prop('checked')
    ).draw();
}

//GET OFFICE
$.getJSON(base_url + "employee/ajax_get_office", function(data) {
    $("#col6_filter option").detach();
    $("#col6_filter").append('<option value="">ALL</option>');
    $.each(data, function(index, item) {
        $("#col6_filter").append("<option class=" + index + ">" + item.o_code + "</option>");
        var a = "#col6_filter option." + index;
        $(a).attr("value", item.o_code);
    });
});


//GET DIVISION
$('#col6_filter').on('change', function() {
    var dynamicoffice = {
        sel_office: $(this).val(),
        // search: 1
    }
    $.ajax({
        dataType: "json",
        type: "POST",
        url: base_url + "employee/ajax_get_division",
        data: dynamicoffice,
        success: function(result) {
            $("#col7_filter option").detach();
            $('#col7_filter').append('<option value="">ALL</option>');
            $.each(result, function(i, item) {
                $('#col7_filter').append('<option value="' + result[i].o_code + '">' + result[i].o_code + '</option>');
            });
        }
    });
});

//GET POSITION
$.getJSON(base_url + "employee/ajax_get_position", function(data) {
    $("#col4_filter option").detach();
    $("#col4_filter").append('<option value="">ALL</option>');
    $.each(data, function(index, item) {
        $("#col4_filter").append("<option class=" + index + ">" + item.a_position + "</option>");
        var a = "#col4_filter option." + index;
        $(a).attr("value", item.a_position);
    });
});

$('#btn_promote').on('click', function(){

		var checkValues =  $('input[name=w_id]:checked').map(function()
			{
				return $(this).val();
			}).get();
			
		var promote = {
			w: checkValues,
			p_effectivitydate : $('#p_effectivitydate').val(),
		};
	 // alert(checkValues);
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "employee/ajax_step_increment",
			data: promote,
			success: function(data) {
				if (data.status == "yes") {
					new PNotify({
						title: 'Success',
						text: data.content,
						type: 'success',
						styling: 'bootstrap3'
					});
					// $('.close').trigger("click");
					
					
					otable.search( '' ).columns().search( '' ).draw();

				
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

//GET SERVICERECORD
function get_servicerecord(str) {
    var data = { a_id: str }
    $.ajax({
        dataType: "json",
        type: "POST",
        url: base_url + "employee/list_service_record",
        data: data,
        success: function(result) {
           $("tbody.sr_content tr").detach();
           $.each(result, function(index, item) {
                $("tbody.sr_content").append("<tr>" +
                    "<td>" + item.p_position + "</td>" +
                    "<td>" + item.p_from + "</td>" +
                    "<td>" + item.p_to + "</td>" +
                    "<td>" + item.salarygrade + "</td>" +
                "</tr>");
            });
        }
    });
}
