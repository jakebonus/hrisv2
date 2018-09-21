var db_employee_leave = $('#db_employee_leave').DataTable( {
    "ajax": {
        // "url": base_url + "user/ajax_get_leave_forapproval",
        "url": base_url + "user/ajax_own_get_leave_for_approval",
        "dataSrc": ""
    },
        "columns": [
            // { "data": "emp_name" },
            { "data": function(data, type, row, meta) {
                return '<a href="#" data-toggle="modal" data-target="#emp_pic" data-a_office="' + data.l_agency + '" data-a_position="' + data.l_position + '" data-id="' + data.a_id + '"  data-name="' + data.emp_name + '">' + data.emp_name + '</a>';
                }
            },
            { "data": "l_datefiled" },
            { "data": "l_type" },
            { "data": "l_typeofapplication" },
            { "data": "l_inclusivedates" },
            { "data": "t_remarks" },
            { "data": "l_agency" },
            { "data": "l_position" },
            
            { "data": "l_sl" },
            { "data": "l_vl" },
            { "data": "l_asof" },
            { "data": function (data, type, row, meta) { return '<a class="btn btn-success btn-xs" data-toggle="modal" data-target="#frm_approval_confirmation_leave" data-title="'+data.emp_name+'" data-l_id="' + data.l_id +'" data-l_type="' + data.l_type +'"><i class="fa fa-thumbs-o-up"></i></a> <a data-toggle="modal" data-target="#frm_disapproval_confirmation_leave" data-title="'+data.emp_name+'" data-l_id="' + data.l_id +'" data-l_type="' + data.l_type +'" class="btn btn-danger btn-xs"><i class="fa fa-thumbs-o-down"></i> </a>' } 
			}, 
],
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
        fixedColumns:   {
            leftColumns: 1,
            rightColumns: 4
        },
        autoWidth: false,
        //stateSave: true
 });
 
 
 $('#db_employee_leave_for').DataTable( {
    "ajax": {
        // "url": base_url + "user/ajax_get_leave_forapproval",
        "url": base_url + "user/ajax_for_get_leave_for_approval",
        "dataSrc": ""
    },
        "columns": [
            // { "data": "emp_name" },
            { "data": function (data, type, row, meta) { return '<a class="btn btn-success btn-xs" data-toggle="modal" data-target="#frm_approval_confirmation_leave" data-title="'+data.emp_name+'" data-l_id="' + data.l_id +'" data-l_type="' + data.l_type +'"><i class="fa fa-thumbs-o-up"></i></a> <a data-toggle="modal" data-target="#frm_disapproval_confirmation_leave" data-title="'+data.emp_name+'" data-l_id="' + data.l_id +'" data-l_type="' + data.l_type +'" class="btn btn-danger btn-xs"><i class="fa fa-thumbs-o-down"></i> </a>' } 
			},
            { "data": function(data, type, row, meta) {
                return '<a href="#" data-toggle="modal" data-target="#emp_pic" data-a_office="' + data.l_agency + '" data-a_position="' + data.l_position + '" data-id="' + data.a_id + '"  data-name="' + data.emp_name + '">' + data.emp_name + '</a>';
                }
            },
            { "data": "l_inclusivedates" },
            { "data": "l_type" },
            { "data": "l_datefiled" },
            { "data": "l_typeofapplication" },
            { "data": "l_agency" },
            { "data": "l_position" },
            { "data": "l_sl" },
            { "data": "l_vl" },
            { "data": "l_asof" },
             
],
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
        fixedColumns:   {
            leftColumns: 1
        },
        autoWidth: false,
        //stateSave: true
 });
 
 
 $('#db_employee_leave_not_pending').DataTable( {
    "ajax": {
        // "url": base_url + "user/ajax_get_approved_leave",
        "url": base_url + "user/ajax_own_get_approved_leave",
        "dataSrc": ""
    },
        "columns": [
            // { "data": "emp_name" },
            { "data": function(data, type, row, meta) {
                return '<a href="#" data-toggle="modal" data-target="#emp_pic" data-a_office="' + data.l_agency + '" data-a_position="' + data.l_position + '" data-id="' + data.a_id + '"  data-name="' + data.emp_name + '">' + data.emp_name + '</a>';
                }
            },
            { "data": "l_datefiled" },
            { "data": "l_type" },
            { "data": "l_typeofapplication" },
            { "data": "l_inclusivedates" },
            { "data": "t_remarks" },
            { "data": "l_agency" },
            { "data": "l_position" },
            { "data": "l_sl" },
            { "data": "l_vl" },
            { "data": "l_asof" }

],
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
        fixedColumns:   {
            leftColumns: 1,
            rightColumns: 1
        },
        autoWidth: false,
        //stateSave: true
 });
 
 $('#db_employee_leave_not_pending_for').DataTable( {
    "ajax": {
        // "url": base_url + "user/ajax_get_approved_leave",
        "url": base_url + "user/ajax_for_get_approved_leave",
        "dataSrc": ""
    },
        "columns": [
            // { "data": "emp_name" },
            { "data": function(data, type, row, meta) {
                return '<a href="#" data-toggle="modal" data-target="#emp_pic" data-a_office="' + data.l_agency + '" data-a_position="' + data.l_position + '" data-id="' + data.a_id + '"  data-name="' + data.emp_name + '">' + data.emp_name + '</a>';
                }
            },
            { "data": "l_datefiled" },
            { "data": "l_type" },
            { "data": "l_typeofapplication" },
            { "data": "l_inclusivedates" },
            { "data": "l_agency" },
            { "data": "l_position" },
            { "data": "l_sl" },
            { "data": "l_vl" },
            { "data": "l_asof" }
],
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
        fixedColumns:   {
            leftColumns: 1,
            rightColumns: 1
        },
        autoWidth: false,
        //stateSave: true
 });
 
 
 // $('#frm_approval_confirmation_leave').on('show')
 
 $('#frm_approval_confirmation_leave').on('show.bs.modal', function(e) {
	$('.p_title').html($(e.relatedTarget).data('title') + ' ' + $(e.relatedTarget).data('l_type') + ' Leave');
	$('.m_l_id').val($(e.relatedTarget).data('l_id'));
});



$('#leave_btn_forapproval').on('click', function(){
	var leave = {
		l_id: $('#m_l_id').val(),
		l_statusdivision: 'Approved',
	};
	approve_leave(leave);
});

$('#leave_btn_fordisapproval').on('click', function(){
	var leave = {
		l_id: $('#m_l_id').val(),
		l_statusdivision: 'For Disapproval',
	};
	approve_leave(leave);
});
$('#dept_forapproval').on('click', function(){
	var leave = {
		l_id: $('#m_l_id').val(),
		// l_statusdept: 'Approved',
	};
	approve_leave(leave);
});

$('#btn_approve').on('click', function(){

	var leave = {
		m_l_id: $('#m_l_id').val(),
	};
		$.ajax({
			type: "POST",
			dataType: "json",
			// url: base_url + "user/approved_leave/",
			url: base_url + "user/btn_approve_leave/",
			data: leave,
			success: function(data){
				if(data.status == 'yes'){
						new PNotify({
							title: 'Success',
							text: data.content,
							type: 'success',
							styling: 'bootstrap3'
						});
					setTimeout(function() {
						  // location.reload();
						   db_employee_leave.ajax.reload();
							$('#btn_leaveForApprovalClosedModal').trigger('click');
						}, 1000);
						
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


$('#btn_approve_asmayor').on('click', function(){

	var leave = {
		m_l_id: $('#m_l_id').val(),
	};
		$.ajax({
			type: "POST",
			dataType: "json",
			// url: base_url + "user/approved_leave/",
			url: base_url + "user/btn_approve_leave_asmayor/",
			data: leave,
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

function approve_leave(leave){
	$.ajax({
		type: "POST",
		dataType: "json",
		// url: base_url + "user/approved_leave/",
		url: base_url + "user/btn_approve_leave/",
		data: leave,
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
}


 
 $('#frm_disapproval_confirmation_leave').on('show.bs.modal', function(e) {
	$('.p_title').html($(e.relatedTarget).data('title') + ' ' + $(e.relatedTarget).data('l_type') + ' Leave');
	$('.m_l_id').val($(e.relatedTarget).data('l_id'));
});


$('#frm_disapproved_leave').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "user/disapproved_leave/",
		data: $('#frm_disapproved_leave').serialize(),
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                      // location.reload();
					   db_employee_leave.ajax.reload();
					  $('#btn_leaveForApprovalClosedModal_disapproved').trigger('click');
                    }, 1000);
					
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


$('#frm_disapproved_leave_asmayor').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "user/disapproved_leave_asmayor/",
		data: $('#frm_disapproved_leave_asmayor').serialize(),
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

// EMPLOYEE PIC
$('#emp_pic').on('show.bs.modal', function(e) {
    var pic  = base_url + "pds_image/" + $(e.relatedTarget).data('id') + "/"+ $(e.relatedTarget).data('id') +".png";
    $(this).find('#pic_id').attr('src',pic);
    $(this).find('h5.modal-title').html('<b>' + $(e.relatedTarget).data('name') + '</b>');
    $(this).find('p.office').html('<b>OFFICE: </b>' + $(e.relatedTarget).data('a_office'));
    $(this).find('p.position').html('<b>POSITION: </b>' + $(e.relatedTarget).data('a_position'));
});
