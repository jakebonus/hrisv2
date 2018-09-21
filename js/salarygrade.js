var dt_sg = $('#dt_sg').DataTable({
    "ajax": {
        "url": base_url + "salarygrade/ajax_get_sg",
        "dataSrc": ""
    },
	createdRow: function( row, data, dataIndex ) {
			$(row).find('td').attr('data-ss_id', data.ss_id);
			$(row).find('td').attr('data-ss_grade', data.ss_grade);
			$(row).find('td').attr('data-ss_step', data.ss_step);
			$(row).find('td').attr('data-ss_monthly', data.ss_monthly);
			$(row).find('td').attr('data-ss_effectivitydate', data.ss_effectivitydate);
		},
    "columns": [
        { "data": "ss_id" },
        { "data": "ss_grade" },
        { "data": "ss_step" },
        { "data": "ss_monthly" },
        { "data": "ss_effectivitydate" }
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
        },
        // 'colvis'
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
    // fixedColumns: {
        // leftColumns: 1,
        // rightColumns: 2
    // },
    // fnInitComplete: function(oSettings, json) {
        // $('.glyphicon-remove').trigger("click");
    // },
    //autoWidth: false,
    //stateSave: true
});

$('#btn_new_sg').on('click', function () {
	$('#ss_id').val('');
	$('#ss_grade').val('');
	$('#ss_step').val('');
	$('#ss_monthly').val('');
	$('#ss_effectivitydate').val('');
});
$('#dt_sg tbody').on('click', 'td', function () {
	// alert($(this).data('ss_step'));
	// alert($(this).data('w_id'));
   $('#frm_sg #ss_id').val($(this).data('ss_id'));
   $('#frm_sg #ss_grade').val($(this).data('ss_grade'));
   $('#frm_sg #ss_step').val($(this).data('ss_step'));
   $('#frm_sg #ss_monthly').val($(this).data('ss_monthly'));
   $('#frm_sg #ss_effectivitydate').val($(this).data('ss_effectivitydate'));
});

$('#frm_sg').on('submit', function(){
	// alert('try');
	
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "salarygrade/ajax_save_sg/",
		data: $('#frm_sg').serialize(),
			beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
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
					dt_sg.ajax.reload();
					$('#ss_id').val('');
					$('#ss_step').val('');
					$('#ss_monthly').val('');
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

