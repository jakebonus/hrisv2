// $('body').on('click', 'input[type="checkbox"]', function() { 
//     $(this).val(this.checked ? "1" : "0");
// });

$('body').on('click', '#permanent', function() { 
    $(this).val(this.checked ? "PERMANENT" : "ALL");
});
$('body').on('click', '#casual', function() { 
    $(this).val(this.checked ? "CASUAL" : "ALL");
});
$('body').on('click', '#project-based', function() { 
    $(this).val(this.checked ? "PROJECT BASED" : "ALL");
});

$('tbody tr.cnt:last-child').css('display','table-row');

function printContent(el){
    var restorepage = document.body.innerHTML;
    var printContent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = restorepage;
}

//GET OFFICE
$.getJSON(base_url + "employee/ajax_get_office", function(data) {
    $("#a_office option").detach();
    $("#a_office").append('<option value="ALL">ALL</option>');
    $.each(data, function(index, item) {
        $("#a_office").append("<option value="+ item.o_id +">"+ item.o_code +"</option>");
       
    });
});

//GET DIVISION
$('#a_office').on('change',function(){
    var dynamicoffice = {
        sel_office: $(this).val(),  
    }
    $.ajax({
        dataType:"json",
        type: "POST",
        url: base_url + "employee/ajax_get_division1/",
        data: dynamicoffice,          
        success: function(result)
        {
            $("#a_division option").detach();
            $('#a_division').append('<option value="ALL">ALL</option>');
            $.each(result,function(i,item){
                $('#a_division').append('<option value="'+ item.o_id+ '">'+result[i].o_code+'</option>');
            });
        }
    }); 
    return false;
});
