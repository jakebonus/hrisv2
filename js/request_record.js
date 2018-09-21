$(window).on("blur focus",function(e){var prevType=$(this).data("prevType");if(prevType!=e.type){switch(e.type){case"blur":otable.ajax.reload();break;case"focus":otable.ajax.reload();break;}}
$(this).data("prevType",e.type);});
$.fn.dataTableExt.afnFiltering.push(function(oSettings,aData,iDataIndex){var iFini=document.getElementById('fini').value;var iFfin=document.getElementById('ffin').value;var iStartDateCol=4;var iEndDateCol=4;iFini=iFini.substring(6,10)+iFini.substring(3,5)+iFini.substring(0,2);iFfin=iFfin.substring(6,10)+iFfin.substring(3,5)+iFfin.substring(0,2);var datofini=aData[iStartDateCol].substring(6,10)+aData[iStartDateCol].substring(3,5)+aData[iStartDateCol].substring(0,2);var datoffin=aData[iEndDateCol].substring(6,10)+aData[iEndDateCol].substring(3,5)+aData[iEndDateCol].substring(0,2);if(iFini===""&&iFfin==="")
{return true;}
else if(iFini<=datofini&&iFfin==="")
{return true;}
else if(iFfin>=datoffin&&iFini==="")
{return true;}
else if(iFini<=datofini&&iFfin>=datoffin)
{return true;}
return false;});

$(window).bind("load", function() {
    $('#dt_requestrecord_wrapper .buttons-print').after('<a class="buttons-reset buttons-html5 btn btn-default" tabindex="0" aria-controls="datatable_employee" onclick="filterReset();"><span><i class="fa fa-refresh"></i> Reset</span></a>');
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

var otable = $('#dt_requestrecord').DataTable({
    "ajax": {
        "url": base_url + "reports/ajax_get_requestrecord",
        "dataSrc": ""
    },
    createdRow: function( row, data, dataIndex ) {
        $(row).find('td').attr('data-id', data.id);
        $(row).find('td').attr('data-a_id', data.a_id);
        $(row).find('td').attr('data-r_type', data.r_type);
        $(row).find('td').attr('data-r_noofcopy', data.r_noofcopy);
    },
    "columns": [
        { "data": "id" },
        { "data": "name" },
        { "data": "r_type" },
        { "data": "r_noofcopy" },
        { "data": "r_datefiled" },
        { "data": "r_purpose" },
        { "data": "r_processedby" },
        { "data": "r_printeddate" },
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
            // exportOptions: {
            //     columns: ':visible'
            //     columns: [0, 1, 3, 4, 5, 6]
            // },
        },
        // {
        //     extend: 'print',
        //     text: 'Print selected',
        //     exportOptions: {
        //         modifier: {
        //             selected: true
        //         }
        //     }
        // },
        // {
        //     extend: 'excelHtml5',
        //     text: 'excel selected',
        //     customize: function(xlsx) {
        //         var sheet = xlsx.xl.worksheets['sheet1.xml'];
        //         $('row c[r^="C"]', sheet).attr('s', '2');
        //     },
        //     exportOptions: {
        //             modifier: {
        //                 selected: true
        //             }
        //         }
        // },
    ],
    select: true,
    columnDefs: [{
        targets: [0],
        visible: false,
        searchable: true,
    }, ],
    deferRender: true,
    scrollY: 300,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,
    fnInitComplete: function(oSettings, json) {
        $('.glyphicon-remove').trigger("click");
    },
    //stateSave: true
});
 
$('.column_filter').on( 'keyup click change', function () {
    filterColumn( $(this).parents('div').attr('data-column') );
});
function filterColumn ( i ) {
    $('#dt_requestrecord').DataTable().column( i ).search( $('#col'+i+'_filter').val() ).draw();
}
function filterReset() {
    $('#col2_filter,#col8_filter,#fini,#ffin').val('');
    otable.search('').columns().search('').draw();
}

$('#dt_requestrecord tbody').on( 'click', 'tr', function () {
    if ( $(this).hasClass('selected') ) {
        $(this).removeClass('selected');
    }
    else {
        otable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
    }
});

$('#dt_requestrecord tbody').on( 'click', 'td', function () {
    $('#frm_request_report #r_id').val($(this).data('id'));
    $('#frm_request_report #a_id').val($(this).data('a_id'));
    $('#frm_request_report #r_type').val($(this).data('r_type'));
    $('#frm_request_report #r_noofcopy').val($(this).data('r_noofcopy'));
});

