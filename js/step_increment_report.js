$(window).on("blur focus",function(e){var prevType=$(this).data("prevType");if(prevType!=e.type){switch(e.type){case"blur":otable.ajax.reload();break;case"focus":otable.ajax.reload();break;}}
$(this).data("prevType",e.type);});
$.fn.dataTableExt.afnFiltering.push(function(oSettings, aData, iDataIndex) {
    var iFini = document.getElementById('fini').value;
    var iFfin = document.getElementById('ffin').value;
    var iStartDateCol = 4;
    var iEndDateCol = 4;
    iFini = iFini.substring(6, 10) + iFini.substring(3, 5) + iFini.substring(0, 2);
    iFfin = iFfin.substring(6, 10) + iFfin.substring(3, 5) + iFfin.substring(0, 2);
    var datofini = aData[iStartDateCol].substring(6, 10) + aData[iStartDateCol].substring(3, 5) + aData[iStartDateCol].substring(0, 2);
    var datoffin = aData[iEndDateCol].substring(6, 10) + aData[iEndDateCol].substring(3, 5) + aData[iEndDateCol].substring(0, 2);
    if (iFini === "" && iFfin === "") {
        return true;
    } else if (iFini <= datofini && iFfin === "") {
        return true;
    } else if (iFfin >= datoffin && iFini === "") {
        return true;
    } else if (iFini <= datofini && iFfin >= datoffin) {
        return true;
    }
    return false;
});

$(window).bind("load", function() {
    filterColumn($('#col3_filter').parents('div').attr('data-column'));
    $('#dt_stepincrement_wrapper .buttons-print').after('<a class="buttons-reset buttons-html5 btn btn-default" tabindex="0" aria-controls="datatable_employee" onclick="filterReset();"><span><i class="fa fa-refresh"></i> Reset</span></a>');
});

// new PNotify({
//     title: 'Please wait...',
//     text: "We're querying database records for you..",
//     type: 'info',
//     hide: false,
//     styling: 'bootstrap3'
// });

$('#fini').keyup( function() { otable.draw(); } );
$('#ffin').keyup( function() { otable.draw(); } );

var otable = $('#dt_stepincrement').DataTable({
    "ajax": {
        "url": base_url + "reports/ajax_step_increment",
        "dataSrc": ""
    },
    // createdRow: function( row, data, dataIndex ) {
    //     $(row).find('td').attr('data-id', data.id);
    //     $(row).find('td').attr('data-a_id', data.a_id);
    //     $(row).find('td').attr('data-r_type', data.r_type);
    //     $(row).find('td').attr('data-r_noofcopy', data.r_noofcopy);
    // },
    "columns": [
        { "data": function(data, type, row, meta) {
                return '<input type="checkbox" id="w_id" name="w_id" value="'+data.w_id+'">';
            }
        },
        { "data": "w_id" },
        { "data": "emp_name" },
        { "data": "p_note_remarks" },
        { "data": "p_from" },
        { "data": "a_position" },
        { "data": "a_status" },
        { "data": "a_office" },
        { "data": "a_division" },
        { "data": "pi_gender" },
        
        // { "data": function(data) {
        //     return '<a class="'+ data.remarks +'">' + data.remarks + '</a>';
        //     }
        // }
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
    // columnDefs: [{
    //     targets: [1],
    //     visible: false,
    //     searchable: true,
    // }, ],
    deferRender: true,
    scrollY: 300,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,
    // fixedColumns: {
    //     leftColumns: 3
    //     //rightColumns: 2
    // },
    // fnInitComplete: function(oSettings, json) {
    //     $('.glyphicon-remove').trigger("click");
    // },
    order: [[ 4, "desc" ]]
    //stateSave: true
});
 

$('input.column_filter').on('keyup click', function() {
    filterColumn($(this).parents('div').attr('data-column'));
});

$('select.column_filter').change(function() {
    filterColumn($(this).parents('div').attr('data-column'));
});

function filterColumn(i) {
    $('#dt_stepincrement').DataTable().column(i).search(
        $('#col' + i + '_filter').val(),
        $('#col' + i + '_regex').prop('checked'),
        $('#col' + i + '_smart').prop('checked')
    ).draw();
}

function filterReset() {
    $('input, select').val('');
    otable.search('').columns().search('').draw();
}

// $('#dt_requestrecord tbody').on( 'click', 'tr', function () {
//     if ( $(this).hasClass('selected') ) {
//         $(this).removeClass('selected');
//     }
//     else {
//         otable.$('tr.selected').removeClass('selected');
//         $(this).addClass('selected');
//     }
// });

// $('#dt_requestrecord tbody').on( 'click', 'td', function () {
//     $('#frm_request_report #r_id').val($(this).data('id'));
//     $('#frm_request_report #a_id').val($(this).data('a_id'));
//     $('#frm_request_report #r_type').val($(this).data('r_type'));
//     $('#frm_request_report #r_noofcopy').val($(this).data('r_noofcopy'));
// });


$('body').on('click', '#w_id', function() { 
    $('#w_id1').val($('#dt_stepincrement input[name=w_id]:checked').map(function(){ return $(this).val(); }).get()); 
});

//GET POSITION
$.getJSON(base_url + "employee/ajax_get_position", function(data) {
    $("#col5_filter option").detach();
    $("#col5_filter").append('<option value="">ALL</option>');
    $.each(data, function(index, item) {
        $("#col5_filter").append("<option class=" + index + ">" + item.a_position + "</option>");
        var a = "#col5_filter option." + index;
        $(a).attr("value", item.a_position);
    });
});

//GET OFFICE
$.getJSON(base_url + "employee/ajax_get_office", function(data) {
    $("#col7_filter option").detach();
    $("#col7_filter").append('<option value="">ALL</option>');
    $.each(data, function(index, item) {
        $("#col7_filter").append("<option class=" + index + ">" + item.o_code + "</option>");
        var a = "#col7_filter option." + index;
        $(a).attr("value", item.o_code);
    });
});

//GET DIVISION
$('#col7_filter').on('change', function() {
    var dynamicoffice = {
        sel_office: $(this).val(),
    }
    $.ajax({
        dataType: "json",
        type: "POST",
        url: base_url + "employee/ajax_get_division",
        data: dynamicoffice,
        success: function(result) {
            $("#col8_filter option").detach();
            $('#col8_filter').append('<option value="">ALL</option>');
            $.each(result, function(i, item) {
                $('#col8_filter').append('<option value="' + result[i].o_code + '">' + result[i].o_code + '</option>');
            });
        }
    });
});
