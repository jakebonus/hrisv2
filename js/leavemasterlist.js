$(window).on("blur focus",function(e){var prevType=$(this).data("prevType");if(prevType!=e.type){switch(e.type){case"blur":otable.ajax.reload();break;case"focus":otable.ajax.reload();break;}}
$(this).data("prevType",e.type);});
$.fn.dataTableExt.afnFiltering.push(function(oSettings,aData,iDataIndex){var iFini=document.getElementById('fini').value;var iFfin=document.getElementById('ffin').value;var iStartDateCol=1;var iEndDateCol=1;iFini=iFini.substring(6,10)+iFini.substring(3,5)+iFini.substring(0,2);iFfin=iFfin.substring(6,10)+iFfin.substring(3,5)+iFfin.substring(0,2);var datofini=aData[iStartDateCol].substring(6,10)+aData[iStartDateCol].substring(3,5)+aData[iStartDateCol].substring(0,2);var datoffin=aData[iEndDateCol].substring(6,10)+aData[iEndDateCol].substring(3,5)+aData[iEndDateCol].substring(0,2);if(iFini===""&&iFfin==="")
{return true;}
else if(iFini<=datofini&&iFfin==="")
{return true;}
else if(iFfin>=datoffin&&iFini==="")
{return true;}
else if(iFini<=datofini&&iFfin>=datoffin)
{return true;}
return false;});

$(window).bind("load", function() {
    filterColumn($('#col4_filter').parents('div').attr('data-column'));
    $('#dt_leavemasterlist_wrapper .buttons-print').after('<a class="buttons-reset buttons-html5 btn btn-default" tabindex="0" aria-controls="datatable_employee" onclick="filterReset();"><span><i class="fa fa-refresh"></i> Reset</span></a>');
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

var otable = $('#dt_leavemasterlist').DataTable({
    "ajax": {
        "url": base_url + "reports/ajax_get_leavemasterlist",
        "dataSrc": ""
    },
    createdRow: function( row, data, dataIndex ) {
        $(row).find('td').addClass(data.leave_status + ' ' + data.l_statusdivision + ' ' + data.l_statusdept + ' ' +  data.l_statushr + ' ' + data.l_statusasmayor);
    },
 
    "columns": [
        { "data": function(data, type, row, meta) {
            return '<a href="#" data-toggle="modal" data-target="#emp_pic" data-a_office="' + data.l_agency + '" data-a_position="' + data.l_position + '" data-id="' + data.a_id + '"  data-name="' + data.name + '">' + data.name + '</a>';
            }
        },
        { "data": "l_datefiled" },
        { "data": "l_type" },
        { "data": "l_inclusivedates" },
        // { "data": "leave_status" },
        { "data": function(data) {
            return '<a class="'+ data.leave_status +'">' + trim(data.leave_status) + '</a>';
            }
        },
        { "data": function(data) {
            return '<a class="'+ trim_hide(data.l_statusdivision,data.leave_status) +'">' + trim_null(data.l_div_action_date) + '</a>';
            }
        },
        { "data": function(data) {
            return '<a class="'+ trim_hide(data.l_statusdept,data.leave_status) +'">' + trim_null(data.l_dept_action_date) + '</a>';
            }
        },
        { "data": function(data) {
            return '<a class="'+ trim_hide(data.l_statushr,data.leave_status) +'">' + trim_null(data.l_hr_action_date) + '</a>';
            }
        },
        { "data": function(data) {
            return '<a class="'+ trim_hide(data.l_statusasmayor,data.leave_status) +'">' + trim_null(data.l_asmayor_action_date) + '</a>';
            }
        },
        { "data": "l_status" },
        { "data": "l_position" },
        { "data": "l_agency" },

        { "data": function(data) {
            return '<a class="'+ trim_hide(data.l_statusdivision,data.leave_status) +'">' + trim(data.l_statusdivision) + '</a>';
            }
        },
        { "data": function(data) {
            return '<a class="'+ trim_hide(data.l_statusdept,data.leave_status) +'">' + trim(data.l_statusdept) + '</a>';
            }
        },
        { "data": function(data) {
            return '<a class="'+ trim_hide(data.l_statushr,data.leave_status) +'">' + trim(data.l_statushr) + '</a>';
            }
        },
        { "data": function(data) {
            return '<a class="'+ trim_hide(data.l_statusasmayor,data.leave_status) +'">' + trim(data.l_statusasmayor) + '</a>';
            }
        },


        { "data": "l_sl" },
        { "data": "l_vl" },
        { "data": "l_asof" }

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
    order: [[ 1, "desc" ]],
    columnDefs: [{
        targets: [12,13,14,15],
        visible: false,
        searchable: true,
    }, ],
    deferRender: true,
    scrollY: 340,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,
    fixedColumns: {
        leftColumns: 1,
        rightColumns: 3
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
    $('#dt_leavemasterlist').DataTable().column( i ).search( $('#col'+i+'_filter').val() ).draw();
}
function filterReset() {
    $('#col0_filter,#col5_filter,#col6_filter,#col7_filter,#col8_filter,#col11_filter,#fini,#ffin').val('');
    $('#col4_filter').val('Applied');
    otable.search('').columns().search('').draw();
}

// EMPLOYEE PIC
$('#emp_pic').on('show.bs.modal', function(e) {
    var pic  = base_url + "pds_image/" + $(e.relatedTarget).data('id') + "/"+ $(e.relatedTarget).data('id') +".png";
    $(this).find('#pic_id').attr('src',pic);
    $(this).find('h5.modal-title').html('<b>' + $(e.relatedTarget).data('name') + '</b>');
    $(this).find('p.office').html('<b>OFFICE: </b>' + $(e.relatedTarget).data('a_office'));
    $(this).find('p.position').html('<b>POSITION: </b>' + $(e.relatedTarget).data('a_position'));
});

function trim(s) {
    if(s == "Disapproved") {
        s = 'Disapprov';
    }
    return s;
}

function trim_null(s) {
    if(s == null) {
        s = 'Pending';
    }
    return s;
}


function trim_hide(s,appl) {
    if(appl == "Cancelled") {
        if (s != "Approved") {
            str = 'hidden';
        }
         else {
            str = s;
        }
    } else {
        str = s;
    }
    return str;
}

$.getJSON(base_url + "reports/ajax_get_leaveoffice", function(data) {
    $("#col11_filter option").detach();
    $("#col11_filter").append('<option value="">ALL</option>');
    $.each(data, function(index, item) {
        $("#col11_filter").append("<option value=" + item.l_agency + ">" + item.l_agency + "</option>");
    });
});
