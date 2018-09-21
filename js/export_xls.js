$(window).bind("load", function() {
    filterColumn($('#col8_filter').parents('div').attr('data-column'));
    $('#datatable_employee_wrapper .buttons-excel').after('<a class="buttons-reset buttons-html5 btn btn-default" tabindex="0" aria-controls="datatable_employee" onclick="filterReset();"><span><i class="fa fa-refresh"></i> Reset</span></a>');
});

new PNotify({
    title: 'Please wait...',
    text: "We're querying database records for you..",
    type: 'info',
    hide: false,
    styling: 'bootstrap3'
});

var otable = $('#datatable_employee').DataTable({
    "ajax": {
        "url": base_url + "employee/ajax_get_employee_xls",
        "dataSrc": ""
    },
    "columns": [
        { "data": "name" },
        { "data": "a_position" },
        { "data": "a_status" },
        { "data": "a_office" },
        { "data": "a_division" },
        { "data": "a_hielig" },
        { "data": "a_hieduc" },
        { "data": "pi_gender" },
        { "data": "a_isactive" },
        { "data": "salary_grade" },
        { "data": "pi_birthdate" },
        { "data": "pi_birthplace" },
        { "data": "pi_age" },
        { "data": "res_address" },
        { "data": "pi_resphone" },
        { "data": "perm_address" },
        { "data": "pi_permphone" },
        { "data": "pi_status" },
        { "data": "pi_tin" },
        { "data": "pi_gsis" },
        { "data": "pi_philhealth" },
        { "data": "pi_pagibig" },
        { "data": "pi_sss" },
        { "data": "a_fdos" },
        { "data": "a_ldos" },
        { "data": "work_experience" },
        { "data": "training" },
        { "data": "eligibility" }
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
    columnDefs: [{
        targets: [8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22,25,26,27],
        visible: false,
        searchable: true,
    }, ],
    deferRender: true,
    scrollY: 380,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,
    fixedColumns: {
        leftColumns: 1,
        //rightColumns: 2
    },
    fnInitComplete: function(oSettings, json) {
        $('.glyphicon-remove').trigger("click");
    }  
});


$('input.column_filter').on('keyup click', function() {
    filterColumn($(this).parents('div').attr('data-column'));
});

$('select.column_filter').change(function() {
    filterColumn($(this).parents('div').attr('data-column'));
});

function filterColumn(i) {
    $('#datatable_employee').DataTable().column(i).search(
        $('#col' + i + '_filter').val(),
        $('#col' + i + '_regex').prop('checked'),
        $('#col' + i + '_smart').prop('checked')
    ).draw();
}

function filterReset() {
    $('#col0_filter,#col1_filter,#col2_filter,#col3_filter,#col4_filter,#col5_filter,#col6_filter,#col7_filter').val('');
    $('#col8_filter').val('yes');
    otable.search('').columns().search('').draw();
    filterColumn($('#col8_filter').parents('div').attr('data-column'));
}

//GET POSITION
$.getJSON(base_url + "employee/ajax_get_position", function(data) {
    $("#col1_filter option").detach();
    $("#col1_filter").append('<option value="">ALL</option>');
    $.each(data, function(index, item) {
        $("#col1_filter").append("<option class=" + index + ">" + item.a_position + "</option>");
        var a = "#col1_filter option." + index;
        $(a).attr("value", item.a_position);
    });
});

//GET OFFICE
$.getJSON(base_url + "employee/ajax_get_office", function(data) {
    $("#col3_filter option").detach();
    $("#col3_filter").append('<option value="">ALL</option>');
    $.each(data, function(index, item) {
        $("#col3_filter").append("<option class=" + index + ">" + item.o_code + "</option>");
        var a = "#col3_filter option." + index;
        $(a).attr("value", item.o_code);
    });
});


//GET HIGHEST ELIGIBILITY
$.getJSON(base_url + "employee/ajax_get_hielig", function(data) {
    $("#col5_filter option").detach();
    $("#col5_filter").append('<option value="">ALL</option>');
    $.each(data, function(index, item) {
        $("#col5_filter").append("<option class=" + index + ">" + item.a_hielig + "</option>");
        var a = "#col5_filter option." + index;
        $(a).attr("value", item.a_hielig);
    });
});

//GET HIGHEST EDUCATION
$.getJSON(base_url + "employee/ajax_get_hieduc", function(data) {
    $("#col6_filter option").detach();
    $("#col6_filter").append('<option value="">ALL</option>');
    $.each(data, function(index, item) {
        $("#col6_filter").append("<option class=" + index + ">" + item.a_hieduc + "</option>");
        var a = "#col6_filter option." + index;
        $(a).attr("value", item.a_hieduc);
    });
});

//GET DIVISION
$('#col3_filter').on('change', function() {
    var dynamicoffice = {
        sel_office: $(this).val(),
        // search: 1
    }
    $.ajax({
        dataType: "json",
        type: "POST",
        url: base_url + "employee/ajax_get_division",
        data: dynamicoffice,
        success: function(result) {
            $("#col4_filter option").detach();
            $('#col4_filter').append('<option value="">ALL</option>');
            $.each(result, function(i, item) {
                $('#col4_filter').append('<option value="' + result[i].o_code + '">' + result[i].o_code + '</option>');
            });
        }
    });
});


//GET DIVISION
$('#a_office').on('change', function() {
    var dynamicoffice = {
        sel_office: $(this).val(),
    }
    $.ajax({
        dataType: "json",
        type: "POST",
        url: base_url + "employee/ajax_get_division1/",
        data: dynamicoffice,
        success: function(result) {
            $("#a_division option").detach();
            $('#a_division').append('<option value="113">No Division</option>');
            $.each(result, function(i, item) {
                $('#a_division').append('<option value="' + item.o_id + '">' + result[i].o_code + '</option>');
            });
        }
    });
    return false;
});
