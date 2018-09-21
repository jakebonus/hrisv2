$(window).on("blur focus",function(e){
//	var prevType=$(this).data("prevType");
//	if(prevType!=e.type){
//		switch(e.type){
//			case"blur":otable.ajax.reload();
//				break;
//			case"focus":
//			otable.ajax.reload();
//				break;
//		}
//	}
//$(this).data("prevType",e.type);
otable
}
);
$.fn.dataTableExt.afnFiltering.push(function(oSettings,aData,iDataIndex){
		var iFini=document.getElementById('fini').value;
		var iFfin=document.getElementById('ffin').value;
		var iStartDateCol=4;
		var iEndDateCol=4;iFini=iFini.substring(6,10)+iFini.substring(3,5)+iFini.substring(0,2);iFfin=iFfin.substring(6,10)+iFfin.substring(3,5)+iFfin.substring(0,2);
		var datofini=aData[iStartDateCol].substring(6,10)+aData[iStartDateCol].substring(3,5)+aData[iStartDateCol].substring(0,2);
		var datoffin=aData[iEndDateCol].substring(6,10)+aData[iEndDateCol].substring(3,5)+aData[iEndDateCol].substring(0,2);
		if(iFini===""&&iFfin==="")
		{
			return true;
		}else if(iFini<=datofini&&iFfin===""){
			return true;
		}else if(iFfin>=datoffin&&iFini===""){
			return true;
		}else if(iFini<=datofini&&iFfin>=datoffin)
		{
			return true;
		}
	return false;
}
);

$(window).bind("load", function() {
    $('#dt_leave_wrapper .buttons-print').after('<a class="buttons-reset buttons-html5 btn btn-default" tabindex="0" aria-controls="datatable_employee" onclick="filterReset();"><span><i class="fa fa-refresh"></i> Reset</span></a>');
});

new PNotify({
    title: 'Please wait...',
    text: "We're querying database records for you..",
    type: 'info',
    hide: false,
    styling: 'bootstrap3'
});

$('#fini').keyup( function() { otable.draw(); } );
$('#ffin').keyup( function() { otable.draw(); } );

var otable = $('#dt_leave').DataTable({
    "ajax": {
        "url": base_url + "reports/ajax_get_leave",
        "dataSrc": ""
    },
    createdRow: function( row, data, dataIndex ) {
        $(row).find('td').attr('data-l_id', data.l_id);
        $(row).find('td').attr('data-a_id', data.a_id);
    },
    "columns": [
       
        { "data": function(data, type, row, meta) {
				if(data.remarks == 'Pending'){
					return '<center><input id="l_id" name="l_id" type="checkbox" value="'+ data.l_id+ '"/></center>';
				}else{
					return '<center><i class="fa fa-check"></i></center>';
				}
            } 
		},
		 { "data": "a_id" },
        { "data": function(data, type, row, meta) {
            return '<a href="#" data-toggle="modal" data-target="#emp_pic" data-a_office="' + data.l_agency + '" data-a_position="' + data.l_position + '" data-id="' + data.a_id + '"  data-name="' + data.name + '">' + data.name + '</a>';
            }
        },
        { "data": "l_datefiled" },
        { "data": "l_asmayor_action_date" },
        { "data": "l_type" },
        { "data": "l_inclusivedates" },
        { "data": "l_position" },
        { "data": "l_agency" },
        { "data": "l_status" },
        { "data": "l_sl" },
        { "data": "l_vl" },
        { "data": "l_asof" },
        { "data": function(data) {
            return '<a class="'+ data.remarks +'">' + data.remarks + '</a>';
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
            exportOptions: {
                // columns: ':visible'
                columns: [1, 2, 3, 4, 5, 6, 10, 11, 12, 13, 14]
            },
        },
    ],
    order: [[ 3, "desc" ]],
    // select: true,
    columnDefs: [{
        targets: [1],
        visible: false,
        searchable: true,
    }, ],
    deferRender: true,
    scrollY: 300,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,
    fixedColumns: {
        leftColumns: 3,
        rightColumns: 4
    },
    fnInitComplete: function(oSettings, json) {
        $('.glyphicon-remove').trigger("click");
    },
    oScroller: {
      rowHeight: 30
    }

    //stateSave: true
});
 
$('.column_filter').on( 'keyup click change', function () {
    filterColumn( $(this).parents('div').attr('data-column') );
});
function filterColumn ( i ) {
    $('#dt_leave').DataTable().column( i ).search( $('#col'+i+'_filter').val() ).draw();
}
function filterReset() {
    $('#col2_filter,#col8_filter,#fini,#ffin').val('');
    otable.search('').columns().search('').draw();
}

$('#dt_leave tbody').on( 'click', 'tr', function () {
    if ( $(this).hasClass('selected') ) {
        $(this).removeClass('selected');
    }
    else {
        otable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
    }
});

$('#dt_leave tbody').on( 'click', 'td', function () {
    $('#frm_leave_report #l_id').val($(this).data('l_id'));
    $('#frm_leave_report #a_id').val($(this).data('a_id'));
});


$('#btn_printsummary').on( 'click', function () {
   var checkValues =  $('input[name=l_id]:checked').map(function()
			{
				return $(this).val();
			}).get();
	var promote = {
			w: checkValues
		};
	// alert(promote);
	
	$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "reports/ajax_printsummary",
			data: promote,
			success: function(data) {
				if (data.status == "yes") {
					new PNotify({
						title: 'Success',
						text: data.content,
						type: 'success',
						styling: 'bootstrap3'
					});
					otable.search( '' ).columns().search( '' ).draw();
					// var str = data.l_ids
					// var res = str.replace(",", "a");
					window.open(base_url + 'reports/get_leaves_summary/'+ data.l_ids, '_blank');
					
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
					}, 1000000);
			}
		}).error(function() {
			alert('Connection problems occurred... Unable to connect to the Internet! The Internet connection has been lost.');
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
