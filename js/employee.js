$(window).on("blur focus",function(e){
  var prevType=$(this).data("prevType");
  if(prevType!=e.type){
    console.log(e.type);
    switch(e.type){
      case"blur":
          otable.ajax.reload();
      break;
      case"focus":
          otable.ajax.reload();
      break;
    }
  }
// });
$(this).data("prevType",e.type);});
$(window).bind("load", function() {
    filterColumn($('#col8_filter').parents('div').attr('data-column'));
    $('#datatable_employee_wrapper .buttons-excel').before('<a class="buttons-excel buttons-html5 btn btn-default" tabindex="0" aria-controls="datatable_employee" href="' + base_url + 'employee/add_new' + '" target="_blank"><span><i class="fa fa-plus"></i> Add Employee</span></a>');
    $('#datatable_employee_wrapper .buttons-print').after('<a class="buttons-reset buttons-html5 btn btn-default" tabindex="0" aria-controls="datatable_employee" onclick="filterReset();"><span><i class="fa fa-refresh"></i> Reset</span></a>');
});

new PNotify({
    title: 'Please wait...',
    text: "We're querying database records for you..",
    type: 'info',
    hide: false,
    styling: 'bootstrap3'
});

var otable = $('#datatable_employee').DataTable({
    "ajax": {
        "url": base_url + "employee/ajax_get_account",
        "dataSrc": ""
    },
    "columns": [
        { "data": function(data, type, row, meta) {
                return '<a href="' + base_url + 'employee/edit_employee/' + data.a_action + '" target="_blank" title="Edit">' + data.name + '</a>' }
        },
        { "data": function(data, type, row, meta) {
                return '<a href="#" data-toggle="modal" data-target="#emp_pic" data-a_office="' + data.a_office + '" data-a_position="' + data.a_position + '" data-id="' + data.a_action + '"  data-name="' + data.name + '">' + data.a_position + '</a>';
            }
        },
        { "data": "a_status" },
        { "data": "a_office" },
        { "data": "a_division" },
        { "data": "a_hielig" },
        { "data": "a_hieduc" },
        { "data": "pi_gender" },
        { "data": "a_isactive" },
        { "data": "salary_grade" },
        { "data": "pi_birthdate" },
        { "data": "pi_birthplace" },
        { "data": "pi_age" },
        { "data": "res_address" },
        { "data": "pi_resphone" },
        { "data": "perm_address" },
        { "data": "pi_permphone" },
        { "data": "pi_status" },
        { "data": "pi_tin" },
        { "data": "pi_gsis" },
        { "data": "pi_philhealth" },
        { "data": "pi_pagibig" },
        { "data": "pi_sss" },
        { "data": "a_machineid" },
        { "data": "a_id" },

        { "data": function(data, type, row, meta) {
                return '<!--a href="' + base_url + 'employee/edit_employee/' + data.a_action + '" target="_blank" title="Edit"><i class="fa fa-edit"></i></a--> <a id="isactive" class="' + data.active + '" data-toggle="modal" data-target="#modal-isactive" data-id="' + data.a_action + '"  data-name="' + data.name + '" data-isactive="' + data.a_isactive + '">' + data.active + '</a>';
            }
        },
        { "data": function(data, type, row, meta) {
                if (a_profile == 'admin asst ii-staff' || a_profile == 'sys admin' || a_profile == 'chrdo officer' || a_profile == 'hrmo iv-records' || a_profile == 'hrmo ii-records') {
                    return '<a title="View Ledger" data-href="' + base_url + 'employee/viewledger/' + data.a_action + '" data-toggle="modal" data-target="#frm_viewledger" href="#" data-title="' + data.name + '" data-a_id="' + data.a_action + '" title="Ledger" class="print_l" href="' + base_url + data.a_action + '"><i class="fa fa-print"></i></a> | <a title="PDS" class="print_pds" href="' + base_url + 'reports/pds/' + data.a_action + '" target="_blank"><i class="fa fa-print"></i></a> | <a title="Service Record" class="print_svr" href="' + base_url + 'reports/service_record/' + data.a_action + '" target="_blank"><i class="fa fa-print"></i></a> ';
                } else if (a_profile == 'admin asst ii-pds') {
                    return '<a title="View Ledger" data-href="' + base_url + 'employee/viewledger/' + data.a_action + '" data-toggle="modal" data-target="#frm_viewledger" href="#" data-title="' + data.name + '" data-a_id="' + data.a_action + '" title="Ledger" class="print_l" href="' + base_url + data.a_action + '"><i class="fa fa-print"></i></a> | <a title="PDS" class="print_pds" href="' + base_url + 'reports/pds/' + data.a_action + '" target="_blank"><i class="fa fa-print"></i></a> | <a class="print_svr"><i class="fa fa-print"></i></a> ';
                } else if (a_profile == 'admin asst ii-svr') {
                    return '<a class="print_l"><i class="fa fa-print"></i></a> | <a class="print_pds"><i class="fa fa-print"></i></a> | <a title="Service Record" class="print_svr" href="' + base_url + 'reports/service_record/' + data.a_action + '" target="_blank"><i class="fa fa-print"></i></a> ';
                } else {
                    return '<a class="print_l"><i class="fa fa-print"></i></a> | <a class="print_pds"><i class="fa fa-print"></i></a> | <a class="print_svr"><i class="fa fa-print"></i></a> ';
                }
            }
        },
        { "data": "a_lastname" },
        { "data": "a_middlename" },
        { "data": "a_firstname" },
        { "data": "a_namext" },
        { "data": "no_of_service" },
        { "data": "a_fdos" }
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
                columns: [0, 1, 3, 4, 23, 24]
            },
        },
        // 'colvis'
    ],
    columnDefs: [{
        targets: [8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22,24,27,28,29,30,31,32],
        visible: false,
        searchable: true,
    }, ],
    deferRender: true,
    scrollY: 380,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,
    fixedColumns: {
        leftColumns: 1,
        rightColumns: 8
    },
    fnInitComplete: function(oSettings, json) {
        $('.glyphicon-remove').trigger("click");
    },
    oScroller: {
      rowHeight: 30
    }
    //autoWidth: false,
    //stateSave: true
});


$('input.column_filter').on('keyup click', function() {
    filterColumn($(this).parents('div').attr('data-column'));
});

$('select.column_filter').change(function() {
    filterColumn($(this).parents('div').attr('data-column'));
});

function filterColumn(i) {
    $('#datatable_employee').DataTable().column(i).search(
        $('#col' + i + '_filter').val(),
        $('#col' + i + '_regex').prop('checked'),
        $('#col' + i + '_smart').prop('checked')
    ).draw();
}

function filterReset() {
    $('#col0_filter,#col1_filter,#col2_filter,#col3_filter,#col4_filter,#col5_filter,#col6_filter,#col7_filter').val('');
    $('#col8_filter').val('yes');
    otable.search('').columns().search('').draw();
    filterColumn($('#col8_filter').parents('div').attr('data-column'));
}

// DELETE
$('#modal-isactive').on('show.bs.modal', function(e) {
    $(this).find('.del_a_id').attr('value', $(e.relatedTarget).data('id'));

    if ($(e.relatedTarget).data('isactive') == 'yes') {
       var s = 'deactivate';
       var t = 'Confirm Deactivate';
       var b = 'Deactivate';
    } else {
       var s = 'activate';
       var t = 'Confirm Activate';
       var b = 'Activate';
    }
    $(this).find('.btn-ok').text(b);
    if (b == 'Deactivate') {
        $(this).find('.btn-ok').removeClass('btn-success').addClass('btn-danger');
    } else {
        $(this).find('.btn-ok').removeClass('btn-danger').addClass('btn-success');
    }
    $(this).find('.btn-ok').text(b);
    $(this).find('h4.modal-title').text(t);
    $(this).find('p.name').html('Do you want to ' + s +' <b>' + $(e.relatedTarget).data('name') + '</b>?');
});


// EMPLOYEE PIC
$('#emp_pic').on('show.bs.modal', function(e) {
	var id = $(e.relatedTarget).data('id');
    var pic  = base_url + "pds_image/" + id + "/"+ id +".png";

    $(this).find('#id').val(id);
    $(this).find('#pic_id').attr('src',pic);
    $(this).find('h5.modal-title').html('<b>' + $(e.relatedTarget).data('name') + '</b>');
    $(this).find('p.office').html('<b>OFFICE: </b>' + $(e.relatedTarget).data('a_office'));
    $(this).find('p.position').html('<b>POSITION: </b>' + $(e.relatedTarget).data('a_position'));
});

$('#frm_isactivate').on('submit', function() {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url + "employee/ajax_delete_employee",
        data: $('#frm_isactivate').serialize(),
        success: function(data) {
            if (data.status == "yes") {
                new PNotify({
                    title: 'Success',
                    text: data.content,
                    type: 'success',
                    styling: 'bootstrap3'
                });
                $('.close').trigger("click");
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


//GET POSITION
$.getJSON(base_url + "employee/ajax_get_position", function(data) {
    $("#col1_filter option").detach();
    $("#col1_filter").append('<option value="">ALL</option>');
    $.each(data, function(index, item) {
        $("#col1_filter").append("<option class=" + index + ">" + item.a_position + "</option>");
        var a = "#col1_filter option." + index;
        $(a).attr("value", item.a_position);
    });
});

//GET OFFICE
$.getJSON(base_url + "employee/ajax_get_office", function(data) {
    $("#col3_filter option").detach();
    $("#col3_filter").append('<option value="">ALL</option>');
    $.each(data, function(index, item) {
        $("#col3_filter").append("<option class=" + index + ">" + item.o_code + "</option>");
        var a = "#col3_filter option." + index;
        $(a).attr("value", item.o_code);
    });
});


//GET HIGHEST ELIGIBILITY
$.getJSON(base_url + "employee/ajax_get_hielig", function(data) {
    $("#col5_filter option").detach();
    $("#col5_filter").append('<option value="">ALL</option>');
    $.each(data, function(index, item) {
        $("#col5_filter").append("<option class=" + index + ">" + item.a_hielig + "</option>");
        var a = "#col5_filter option." + index;
        $(a).attr("value", item.a_hielig);
    });
});

//GET HIGHEST EDUCATION
$.getJSON(base_url + "employee/ajax_get_hieduc", function(data) {
    $("#col6_filter option").detach();
    $("#col6_filter").append('<option value="">ALL</option>');
    $.each(data, function(index, item) {
        $("#col6_filter").append("<option class=" + index + ">" + item.a_hieduc + "</option>");
        var a = "#col6_filter option." + index;
        $(a).attr("value", item.a_hieduc);
    });
});

//GET DIVISION
$('#col3_filter').on('change', function() {
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
            $("#col4_filter option").detach();
            $('#col4_filter').append('<option value="">ALL</option>');
            $.each(result, function(i, item) {
                $('#col4_filter').append('<option value="' + result[i].o_code + '">' + result[i].o_code + '</option>');
            });
        }
    });
});


function isactive(str) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url + "employee/ajax_delete_employee/" + str,
        data: $('#frm_update_holiday').serialize(),
        success: function(data) {
            if (data.status == "yes") {
                otable.ajax.reload(null, false);
                //otable.search( '' );
            }
        }
    }).error(function() {
        alert('Connection problems occurred... Unable to connect to the Internet! The Internet connection has been lost.');
    });
    return false;
}

$('#frm_viewledger').on('show.bs.modal', function(e) {
    //  $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
    var name = $(e.relatedTarget).data('title');
    $('.m_a_id').val($(e.relatedTarget).data('a_id'));
    $('.p_title').html("Please select year for, <b>" + name + "</b>'s ledger.");
    //$('.m_a_id').val(empno);
});



// $('#btn_resetpassword').on('click', function(){

// });

function resetpassword(){

	id = $('#emp_pic #id').val();
	$('#emp_pic').modal('hide');

	 $('#resetpassword #a_id').val(id);
	 $('#resetpassword').modal('show');




	// alert(id);
}

$('#resetpassword #btn_no').on('click', function(){

	 $('#resetpassword').modal('hide');
});

$('#resetpassword #btn_yes').on('click', function(){


	var a_id = $('#resetpassword #a_id').val();
	// alert(a_id);

	var xhr = new XMLHttpRequest();
			 xhr.open("GET", base_url + "employee/ajax_resetpassword/?a_id=" + a_id, true);
			 xhr.onreadystatechange = function() {

				 new PNotify({
						title: 'Please wait...',
						text: 'Checking database.',
						type: 'info',
						styling: 'bootstrap3'
					});

			   if (this.readyState == 4 && this.status == 200) {
					var myarr = JSON.parse(this.responseText);

					if(myarr.status == 'yes'){
						$('.alert-info .glyphicon-remove').trigger("click");
						 new PNotify({
								title: 'Success!',
								text: myarr.content,
								type: 'success',
								styling: 'bootstrap3'
						});
					}else if(myarr.status == 'no') {
						$('.alert-info .glyphicon-remove').trigger("click");
						new PNotify({
								title: 'Failed!',
								text: myarr.content,
								type: 'warning',
								styling: 'bootstrap3'
						});
					}else{
						$('.alert-info .glyphicon-remove').trigger("click");
						new PNotify({
								title: 'Error!',
								text: 'Something went wrong!',
								type: 'error',
								styling: 'bootstrap3'
						});
					}

			   }
			   $('#resetpassword').modal('hide');
			 }
			 xhr.send();

});

	// var id = $(e.relatedTarget).data('id');
    // var pic  = base_url + "pds_image/" + id + "/"+ id +".png";

    // $(this).find('#pic_id').attr('src',pic);
    // $(this).find('h5.modal-title').html('<b>' + $(e.relatedTarget).data('name') + '</b>');
    // $(this).find('p.office').html('<b>OFFICE: </b>' + $(e.relatedTarget).data('a_office'));
    // $(this).find('p.position').html('<b>POSITION: </b>' + $(e.relatedTarget).data('a_position'));
