
// Add New Employee
$('#frm_new_emp').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/add_new_employee/",
		data: $('#frm_new_emp').serialize(),
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                       location.href = base_url + "employee/edit_employee/" + data.a_id;
                    }, 1000);
					
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

$('#a_deptlocation').on('change', function() {
    var dynamicoffice = {
        sel_office: $(this).val(),
    }
    $.ajax({
        dataType: "json",
        type: "POST",
        url: base_url + "employee/ajax_get_division1/",
        data: dynamicoffice,
        success: function(result) {
            $("#a_divlocation option").detach();
            $('#a_divlocation').append('<option value="113">No Division</option>');
            $.each(result, function(i, item) {
                $('#a_divlocation').append('<option value="' + item.o_id + '">' + result[i].o_code + '</option>');
            });
        }
    });
    return false;
});

$('#sameasres').on('click', function() {
    $('#pi_permstreet').val($('#pi_resstreet').val());
    $('#pi_permbrgy').val($('#pi_resbrgy').val());
    $('#pi_permcity').val($('#pi_rescity').val());
    $('#pi_permprov').val($('#pi_resprov').val());
    $('#pi_permzip').val($('#pi_reszip').val());
    $('#pi_permphone').val($('#pi_resphone').val());
});