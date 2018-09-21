var dt_computers = $('#dt_computers').DataTable({
	
    "ajax": {
        "url": base_url + "kuyamart/ajax_get_computers/",
        "dataSrc": ""
    },
	
	createdRow: function( row, data, dataIndex ) {

			$(row).find('td').attr('data-kuya_id', data.kuya_id);
			$(row).find('td').attr('data-kuya_compnum', data.kuya_compnum);
			$(row).find('td').attr('data-kuya_compname', data.kuya_compname);
			$(row).find('td').attr('data-kuya_group', data.kuya_group);
		},
	
    "columns": [

		{ "data": "kuya_group" },
		{ "data": "kuya_compname" },
		{ "data": "kuya_compnum" }
		],
    dom: '<"wrapper"Bfit>',
    buttons: [{
            extend: 'excelHtml5',
            customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('row c[r^="C"]', sheet).attr('s', '2');
            }
        },
    ],
    deferRender: true,
    scrollY: 380,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,

    oScroller: {
      rowHeight: 30
    }

});
	

$('#dt_computers tbody').on('click', 'td', function () {

   $('#frm_computer #kuya_id').val($(this).data('kuya_id'));
   $('#frm_computer #kuya_group').val($(this).data('kuya_group'));
   $('#frm_computer #kuya_compname').val($(this).data('kuya_compname'));
   $('#frm_computer #kuya_compnum').val($(this).data('kuya_compnum'));
   
   
   
   if ( $(this).hasClass('selected') ) {
		   $(this).removeClass('selected');
	   }
	   else {
		   $('#dt_computers tbody tr.selected').removeClass('selected');
		   $(this).addClass('selected');
	   }
});

$('#btn_addnew').on('click',function(){
	$('#frm_computer')[0].reset();
});

$('#btn_reloadtable').on('click',function(){
	dt_computers.ajax.reload();
});

$('#btn_delete').on('click',function(){
	$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "kuyamart/ajax_delete_computers/",
			data: $('#frm_computer').serialize(),
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
					dt_computers.ajax.reload();

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

$('#frm_computer').on('submit',function(){
	
	$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "kuyamart/ajax_save_computers/",
			data: $('#frm_computer').serialize(),
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
					dt_computers.ajax.reload();

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