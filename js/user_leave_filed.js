var dt_leave_request = $('#dt_leave_request').DataTable({
    "ajax": {
        "url": base_url + "user/ajax_get_leave_filed",
        "dataSrc": ""
    },
    // createdRow: function( row, data, dataIndex ) {
        // $(row).find('td').attr('data-l_id', data.l_id);
        // $(row).find('td').attr('data-a_id', data.a_id);
    // },
    "columns": [
        { "data": "l_typeofapplication" },
        { "data": "l_type" },
        { "data": "l_datefiled" },
        // { "data": "l_statusdivision" },
		 { "data": function(data) {
			if(data.leave_status == 'Applied') {
				if(data.l_statusdivision == 'Pending'){
					return '<i class="orange"> Pending </i>';
				}else if(data.l_statusdivision == 'Approved') {
					return '<i class="green"> Approved </i>';
				}else if(data.l_statusdivision == 'Dissapproved') {
					return '<i class="red"> Dissapproved </i>';
				}else{
					return ' ';
				}
			}else{
				return ' ';
			}
		 }
		},
		// { "data": "l_statusdept"},
		{ "data": function(data) {
			if(data.leave_status == 'Applied') {
				if(data.l_statusdept == 'Pending'){
					return '<i class="orange"> Pending </i>';
				}else if(data.l_statusdept == 'Approved') {
					return '<i class="green"> Approved </i>';
				}else{
					return '<i class="red"> Dissapproved </i>';
				}
			}else{
				return ' ';
			}
		 }
		},
        
        // { "data": "l_statushr" },
		{ "data": function(data) {
			if(data.leave_status == 'Applied') {
				if(data.l_statushr == 'Pending'){
					return '<i class="orange"> Pending </i>';
				}else if(data.l_statushr == 'Approved') {
					return '<i class="green"> Approved </i>';
				}else{
					return '<i class="red"> Dissapproved </i>';
				}
			}else{
				return ' ';
			}
		 }
		},
        // { "data": "l_statusasmayor" },
		{ "data": function(data) {
			if(data.leave_status == 'Applied') {
				if(data.l_statusasmayor == 'Pending'){
					return '<i class="orange"> Pending </i>';
				}else if(data.l_statusasmayor == 'Approved') {
					return '<i class="green"> Approved </i>';
				}else{
					return '<i class="red"> Dissapproved </i>';
				}
			}else{
				return ' ';
			}
		 }
		},
        { "data": "l_inclusivedates" },
        { "data": "l_vl" },
        { "data": "l_sl" },
        { "data": "l_asof" },
        { "data": function(data) {
            if(data.leave_status == 'Applied' && data.l_statushr == 'Pending' ){return '<a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#frm_cancel_leave_application" data-l_id="'+ data.l_id +'"> Cancel</a>';}else{
				if(data.leave_status == 'Cancelled'){ return 'Cancelled'}
				if(data.l_statushr != 'Pending'){ return 'Processed'}
			}
		}
        }
    ],
    dom: '<"wrapper"Bfit>',
    buttons: [
        {
        extend: 'excelHtml5',
            customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('row c[r^="C"]', sheet).attr('s', '2');
            }
        },
        {
            extend: 'print',
        },
      
    ],
    select: true,
    // columnDefs: [{
        // targets: [0],
        // visible: false,
        // searchable: true,
	// }, ],
	ordering: false,
    deferRender: true,
    scrollY: 300,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,
    fnInitComplete: function(oSettings, json) {
        $('.glyphicon-remove').trigger("click");
    },

});
 
 $('#frm_cancel_leave_application').on('show.bs.modal', function(e) {
		$('.m_l_id').val($(e.relatedTarget).data('l_id'));
 });
 
 $('#frm_cancel_leave').on('submit', function(){
	 $.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "user/cancel_leave_application/",
		data: $('#frm_cancel_leave').serialize(),
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
					  dt_leave_request.ajax.reload();
					  $('#btn_leaveAppliedClosedModal').trigger('click');
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
