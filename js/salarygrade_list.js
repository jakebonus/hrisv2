$(window).on("blur focus",function(e){var prevType=$(this).data("prevType");if(prevType!=e.type){switch(e.type){case"blur":otable.ajax.reload();break;case"focus":otable.ajax.reload();break;}}
$(this).data("prevType",e.type);});
// $.fn.dataTableExt.afnFiltering.push(function(oSettings,aData,iDataIndex){var iFini=document.getElementById('fini').value;var iFfin=document.getElementById('ffin').value;var iStartDateCol=1;var iEndDateCol=1;iFini=iFini.substring(6,10)+iFini.substring(3,5)+iFini.substring(0,2);iFfin=iFfin.substring(6,10)+iFfin.substring(3,5)+iFfin.substring(0,2);var datofini=aData[iStartDateCol].substring(6,10)+aData[iStartDateCol].substring(3,5)+aData[iStartDateCol].substring(0,2);var datoffin=aData[iEndDateCol].substring(6,10)+aData[iEndDateCol].substring(3,5)+aData[iEndDateCol].substring(0,2);if(iFini===""&&iFfin==="")
// {return true;}
// else if(iFini<=datofini&&iFfin==="")
// {return true;}
// else if(iFfin>=datoffin&&iFini==="")
// {return true;}
// else if(iFini<=datofini&&iFfin>=datoffin)
// {return true;}
// return false;});

// $(window).bind("load", function() {
//     filterColumn($('#col4_filter').parents('div').attr('data-column'));
//     $('#dt_leavemasterlist_wrapper .buttons-print').after('<a class="buttons-reset buttons-html5 btn btn-default" tabindex="0" aria-controls="datatable_employee" onclick="filterReset();"><span><i class="fa fa-refresh"></i> Reset</span></a>');
// });

new PNotify({
    title: 'Please wait...',
    text: "We're querying database records for you..",
    type: 'info',
    hide: false,
    styling: 'bootstrap3'
});

// $('#fini').keyup( function() { otable.draw(); } );
// $('#ffin').keyup( function() { otable.draw(); } );

var otable = $('#dt_salarygrade').DataTable({
    "ajax": {
        "url": base_url + "reports/ajax_salarygrade",
        "dataSrc": ""
    },
    "columns": [
        { "data": "ss_effectivitydate" },
        { "data": "ss_grade" },
        { "data": "daily_wage" },
        { "data": "step1" },
        { "data": "step2" },
        { "data": "step3" },
        { "data": "step4" },
        { "data": "step5" },
        { "data": "step6" },
        { "data": "step7" },
        { "data": "step8" }

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
                columns: ':visible'
                // columns: [1, 2, 3, 4, 5, 6, 10, 11, 12, 13, 14]
            },
        },
    ],
    select: true,
    // columnDefs: [{
    //     targets: [0,1],
    //     visible: false,
    //     searchable: true,
    // }, ],
    order: [[ 0, "desc" ]],
    deferRender: true,
    scrollY: 400,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,
    fnInitComplete: function(oSettings, json) {
        $('.glyphicon-remove').trigger("click");
    },
    oScroller: {
      rowHeight: 30
    }
});
 
$('.column_filter').on( 'keyup click change', function () {
    filterColumn( $(this).parents('div').attr('data-column') );
});
function filterColumn ( i ) {
    $('#dt_salarygrade').DataTable().column( i ).search( $('#col'+i+'_filter').val() ).draw();
}
// function filterReset() {
//     $('#col0_filter,#col5_filter,#col6_filter,#col7_filter,#col8_filter,#col11_filter,#fini,#ffin').val('');
//     $('#col4_filter').val('Applied');
//     otable.search('').columns().search('').draw();
// }


$.getJSON(base_url + "reports/ajax_salarygrade_year", function(data) {
    $("#col0_filter option").detach();
    $("#col0_filter").append('<option value="">ALL</option>');
    $.each(data, function(index, item) {
        $("#col0_filter").append("<option value=" + item.year + ">" + item.year + "</option>");
    });
});

