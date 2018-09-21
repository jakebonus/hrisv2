$(window).bind("load", function() {
    $('.moffice tbody').removeClass('hide');
});

$('body').on('click', '#o_dessig', function() { 
    $(this).val(this.checked ? "1" : "0");
});

$.getJSON(base_url + "employee/ajax_get_office", function(data) {
    $(".edit #o_department option, .add #o_department option").detach();
    $.each(data, function(index, item) {
        $(".edit #o_department, .add #o_department").append("<option value=" + item.o_id + ">" + item.o_code + "</option>");

    });
});

// DELETE
$('#modal-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});

   //GET OFFICE
    $.getJSON(base_url + "employee/ajax_get_office", function(data) {
        $(".add #a_office option, .edit #a_office option, .add #a_office_a option, .edit #a_office_a option").detach();
        $(".add #a_office, .edit #a_office, .add #a_office_a, .edit #a_office_a").append('<option value="all">ALL</option>');
        $.each(data, function(index, item) {
            $(".add #a_office, .edit #a_office, .add #a_office_a, .edit #a_office_a").append("<option value=" + item.o_id + ">" + item.o_code + "</option>");
            var a = ".add #a_office option." + index;
            $(a).attr("value", item.o_code);

            var aa = ".edit #a_office option." + index;
            $(aa).attr("value", item.o_code);

            var b = ".add #a_office_a option." + index;
            $(a).attr("value", item.o_code);

            var bb = ".edit #a_office_a option." + index;
            $(aa).attr("value", item.o_code);
        });
    });
    
 
//GET DIVISION
$('.add #a_office').on('change', function() {
    var svr = {
        a_office: $('.add #a_office').val(),
        a_division: 'All',
        a_status: 'PERMANENT'
    }
    dynamicfilter(svr);
   // return false;
});

$('.edit #a_office').on('change', function() {
    var svr = {
        a_office: $('.edit #a_office').val(),
        a_division: 'All',
        a_status: 'PERMANENT'
    }
    dynamicfilter(svr);
});

function dynamicfilter(svr) {
    $.ajax({
        dataType: "json",
        type: "POST",
        url: base_url + "employee/ajax_get_employee/",
        data:  svr,
        success: function(result) {
            $(".add #employee option, .edit #employee option").detach();
          $(".add #employee, .edit #employee").append('<option value="(NULL)">ALL</option>');
            $.each(result, function(i, item) {
                $('.add #employee, .edit #employee').append('<option value="' + item.a_id + '">' + item.a_lastname +', '+ item.a_firstname +' ' + item.a_middlename + '</option>');
            });
        } 
    });
    return false;
}


$('.add #a_office_a').on('change', function() {
    var svr = {
        a_office: $('.add #a_office_a').val(),
        a_division: 'All',
        a_status: 'PERMANENT'
    }
    dynamicfilter1(svr);
   // return false;
});

$('.edit #a_office_a').on('change', function() {
    var svr = {
        a_office: $('.edit #a_office_a').val(),
        a_division: 'All',
        a_status: 'PERMANENT'
    }
    dynamicfilter1(svr);
});

function dynamicfilter1(svr) {
    $.ajax({
        dataType: "json",
        type: "POST",
        url: base_url + "employee/ajax_get_employee/",
        data:  svr,
        success: function(result) {
            $(".add #o_alternate option, .edit #o_alternate option").detach();
          $(".add #o_alternate, .edit #o_alternate").append('<option value="">ALL</option>');
            $.each(result, function(i, item) {
                $('.add #o_alternate, .edit #o_alternate').append('<option value="' + item.a_id + '">' + item.a_lastname +', '+ item.a_firstname +' ' + item.a_middlename + '</option>');
            });
        }
    });
    return false;
}

//SAVE
$(".add-dep-btn").click(function() {
    $(".edit-btn").removeClass("btn-primary");
    $('.add-section, .add .d_department').show();
    $('.edit-section, .add .d_division').hide();
    $("h2.edit-title").text('Add Department');
    $(".lbl-office").text('Office *');
    $("#frm_save_office").find("input[name=o_type]").val("Department");
});
$(".add-div-btn").click(function() {
    $(".edit-btn").removeClass("btn-primary");
    $('.add-section, .add .d_division').show();
    $('.edit-section, .add .d_department').hide();
    $("h2.edit-title").text('Add Division');
    $(".lbl-office").text('Division Name *');
    $("#frm_save_office").find("input[name=o_type]").val("Division");
});

$('#frm_save_office').on('submit', function() {
    $("input").val(function(i, val) {
        return val.toUpperCase();
    });

    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url + "office/ajax_save_office",
        data: $('#frm_save_office').serialize(),
        success: function(data) {
            if (data.status == "yes") {
                new PNotify({
                    title: 'Success',
                    text: data.content,
                    type: 'success',
                    styling: 'bootstrap3'
                });

                $("#frm_save_office").closest('form').find("input[type=text]").val("");
                setTimeout(function() {
                    $('.glyphicon-remove').trigger("click");
                }, 1600);
                table.ajax.reload();
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

// EDIT
$(".edit-btn").click(function() {
    $("#frm_update_office").closest('form').find("input[type=text], button, input:checkbox, select").prop('disabled', false);
    $(".edit-btn").removeClass("btn-primary");

});


$(".edit-modal").click(function() {
    $("h2.edit-title").text('Edit - ' + $(this).data('o_type'));

    if ($(this).data('o_type') == "Department") {
        $('.edit .d_department').show();
        $('.edit .d_division').hide();
        $(".edit #o_dessig").val(0);
    } else {
        $('.edit .d_division').show();
        $('.edit .d_department').hide();
    }

    $(".edit #o_id").val($(this).data('o_id'));
    $(".edit #o_name").val($(this).data('o_name'));
    $(".edit #o_code").val($(this).data('o_code'));
    $(".edit #o_type").val($(this).data('o_type'));
    $(".edit #o_department").val($(this).data('o_mother'));
    $(".edit #o_dessig").val($(this).data('o_dessig'));

    if ($(this).data('o_dessig') == 1) {
        $('.edit #o_dessig').prop('checked', true);
    }

    $(".edit #employee option, .edit #o_alternate option").detach();
    $(".edit #employee").append('<option value="'+ $(this).data('o_head') +'" selected>'+ $(this).data('name') +'</option>');
    $(".edit #o_alternate").append('<option value="'+ $(this).data('o_alternate') +'" selected>'+ $(this).data('o_alternate_name') +'</option>');
    

    $('.edit-section').show();
    $('.add-section').hide();
    $("a.del-btn").attr("data-toggle", "modal");
    $("a.del-btn").attr("data-target", "#modal-delete");
    $("a.del-btn").attr("data-target", "#modal-delete");
    $("a.del-btn").attr("data-href", base_url + "office/ajax_delete_office/" + $(this).data('o_id'));

    $("#frm_update_office").closest('form').find("input[type=text], button, input:checkbox, select").prop('disabled', true);
    $(".edit-btn").addClass("btn-primary");
});

$('#frm_update_office').on('submit', function() {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url + "office/ajax_update_office",
        data: $('#frm_update_office').serialize(),
        success: function(data) {
            if (data.status == "yes") {
                new PNotify({
                    title: 'Success',
                    text: data.content,
                    type: 'success',
                    styling: 'bootstrap3'
                });
                $("#frm_update_office").closest('form').find("input[type=text]").val("");
                $("input:checkbox").attr('checked', false);
                $("h2.edit-title").text('Office');
                $("#frm_update_office").closest('form').find("input[type=text], button, input:checkbox, select").prop('disabled', true);
                setTimeout(function() {
                    $('.glyphicon-remove').trigger("click");
                    location.reload();
                }, 1600);
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
