$('#db_employee_leave_for_verification').DataTable( {
    "ajax": {
        "url": base_url + "employee/ajax_get_leave_for_verification",
        "dataSrc": ""
    },
		createdRow: function( row, data, dataIndex ) {
			$(row).find('td').attr('data-l_id', data.l_id);
			$(row).find('td').attr('data-emp_name', data.emp_name);
			$(row).find('td').attr('data-l_agency', data.l_agency);
			$(row).find('td').attr('data-l_datefiled', data.l_datefiled);
			$(row).find('td').attr('data-l_position', data.l_position);
			$(row).find('td').attr('data-l_type', data.l_type);
			$(row).find('td').attr('data-l_inclusivedates', data.l_inclusivedates);
		},
	
        "columns": [
            { "data": "l_id" },
            // { "data": "emp_name" },
            { "data": function(data, type, row, meta) {
	            return '<a href="#" data-toggle="modal" data-target="#emp_pic" data-a_office="' + data.l_agency + '" data-a_position="' + data.l_position + '" data-id="' + data.a_id + '"  data-name="' + data.emp_name + '">' + data.emp_name + '</a>';
	            }
	        },
	        { "data": "l_datefiled" },
	         { "data": "l_type" },
	         { "data": "l_inclusivedates" },
            { "data": "l_agency" },
            
            { "data": "l_position" },
           
            
		],
dom: '<"wrapper"Bfit>',
buttons: [ { extend: 'excelHtml5', 
			customize: function( xlsx ) { 
					var sheet = xlsx.xl.worksheets['sheet1.xml']; 
							$('row c[r^="C"]', sheet).attr( 's', '2' ); } }, 
			{ extend: 'print', exportOptions: { columns: [ 0, 1, 3, 4 ] }, 
			}, 
		],
		columnDefs: [{
	        targets: [0],
	        visible: false,
	        searchable: true,
	    }, ],
    	deferRender: true,
        scrollY: 380,
        scrollCollapse: true,
        scroller: true,
    	scrollX: true,
        fixedColumns:   {
            leftColumns: 2,
            // rightColumns: 1
        },
        autoWidth: false,
        //stateSave: true
 });
 
	$('#db_employee_leave_for_verification tbody').on( 'click', 'tr', function () {
	   if ( $(this).hasClass('selected') ) {
		   $(this).removeClass('selected');
	   }
	   else {
		   $('#db_employee_leave_for_verification tbody tr.selected').removeClass('selected');
		   $(this).addClass('selected');
	   }
	});
 
 $('#db_employee_leave_for_verification tbody').on('click', 'td', function () {
	 // alert($(this).data('emp_name'));
   $('#frm_leaveverification #emp_name').val($(this).data('emp_name') +' - ' + $(this).data('l_agency'));
   // $('#frm_leaveverification #l_agency').;
   // $('#frm_leaveverification #l_datefiled').val($(this).data('l_datefiled'));
   // $('#frm_leaveverification #l_position').val($(this).data('l_position'));
   $('#frm_leaveverification #l_id').val($(this).data('l_id'));
   $('#frm_leaveverification #l_type').val($(this).data('l_type'));
   // $('#frm_leaveverification #l_inclusivedates').val($(this).data('l_inclusivedates'));
});

$('#frm_leaveverification').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/ajax_save_slvl/",
		data: $('#frm_leaveverification').serialize(),
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
