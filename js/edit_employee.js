$(window).bind("load", function() {
    $('#takeaphoto,#mdl_signature').addClass('modal');
});


//GET OFFICE
// $.getJSON(base_url + "employee/ajax_get_office", function(data) {
    // $("#a_office option").detach();
    // $("#a_office").append('<option value="ALL">ALL</option>');
    // $.each(data, function(index, item) {
        // $("#a_office").append("<option value="+ item.o_id +">"+ item.o_code +"</option>");
       
    // });
// });

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

//GET OFFICE Location
// $.getJSON(base_url + "employee/ajax_get_office", function(data) {
    // $("#a_deptlocation option").detach();
    // $("#a_deptlocation").append('<option value="ALL">ALL</option>');
    // $.each(data, function(index, item) {
        // $("#a_deptlocation").append("<option value="+ item.o_id +">"+ item.o_code +"</option>");
       
    // });
// });

//GET DIVISION Location
$('#a_deptlocation').on('change',function(){
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
            $("#a_divlocation option").detach();
            $('#a_divlocation').append('<option value="ALL">ALL</option>');
            $.each(result,function(i,item){
                $('#a_divlocation').append('<option value="'+ item.o_id+ '">'+result[i].o_code+'</option>');
            });
        }
    }); 
    return false;
});





// update employee Personal Info
$('#frm_personal').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/update_employee_personal_info/",
		data: $('#frm_personal').serialize(),
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
			},
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                        location.reload();
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

// update employee familly bg
$('#frm_familly').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/update_employee_familly/",
		data: $('#frm_familly').serialize(),
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
			},
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                        location.reload();
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

// add new child info
$('#add_new_child').hide();
$('#add_child').on('click', function(){
	$('#add_new_child').slideToggle();
});

$('#frm_child').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/add_employee_child/",
		data: $('#frm_child').serialize(),
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
			},
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                        location.reload();
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


// add new educ info
$('#add_new_educ').hide();
$('#add_educ').on('click', function(){
	$('#add_new_educ').slideToggle();
});

$('#frm_educbg').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/add_employee_educ/",
		data: $('#frm_educbg').serialize(),
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
			},
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                        location.reload();
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


// add new training info
$('#add_new_training').hide();
$('#add_training').on('click', function(){
	$('#add_new_training').slideToggle();
});

$('#frm_training').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/add_employee_training/",
		data: $('#frm_training').serialize(),
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                        location.reload();
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


// add new training info
$('#add_new_elig').hide();
$('#add_elig').on('click', function(){
	$('#add_new_elig').slideToggle();
});

$('#frm_elig').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/add_employee_elig/",
		data: $('#frm_elig').serialize(),
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				dt_eligibility.ajax.reload();
					
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


// add new work info
$('#add_new_work').hide();
$('#add_work').on('click', function(){
	$('#add_new_work').slideToggle();
});

$('#frm_work').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/add_employee_work/",
		data: $('#frm_work').serialize(),
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
			},
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                        location.reload();
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


// add new voluntary work info
$('#add_new_vol_work').hide();
$('#add_vol_work').on('click', function(){
	$('#add_new_vol_work').slideToggle();
});

$('#frm_vol_work').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/add_employee_vol_work/",
		data: $('#frm_vol_work').serialize(),
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
			},
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                        location.reload();
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

// add new skills info
$('#add_new_skills').hide();
$('#add_skills').on('click', function(){
	$('#add_new_skills').slideToggle();
});

$('#frm_skills').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/add_employee_skills/",
		data: $('#frm_skills').serialize(),
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
			},
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                        location.reload();
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

$('#frm_questions').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/update_employee_answers/",
		data: $('#frm_questions').serialize(),
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
			},
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                        location.reload();
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

// add new skills info
$('#add_new_reff').hide();
$('#add_reff').on('click', function(){
	$('#add_new_reff').slideToggle();
});

$('#frm_reff').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/add_employee_reff/",
		data: $('#frm_reff').serialize(),
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
			},
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                        location.reload();
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

//Ledger

		
// Print Content
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}




//edit child info modal show
	$('#frm_edit_child').on('show.bs.modal', function(e) {
            $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
			var name =   $(e.relatedTarget).data('title');
			var child_id =   $(e.relatedTarget).data('child_id');
			var c_fname =   $(e.relatedTarget).data('c_fname');
			var c_mi =   $(e.relatedTarget).data('c_mi');
			var c_lname =   $(e.relatedTarget).data('c_lname');
			var c_extname =   $(e.relatedTarget).data('c_extname');
			var c_birthdate =   $(e.relatedTarget).data('c_birthdate');
			$('.p_title').html("You can edit , <b>" + name + "</b>'s information.");
			$('.c_id').val(child_id);
			$('.c_fname').val(c_fname);
			$('.c_mi').val(c_mi);
			$('.c_lname').val(c_lname);
			$('.c_extname').val(c_extname);
			$('.c_birthdate').val(c_birthdate);
        });
		
	// Save update Child Information
$('#frm_child_update').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/edit_child_info/",
		data: $('#frm_child_update').serialize(),
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
			},
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                      location.reload();
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


// Add familly Background Information
$('#frm_add_familly').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/add_employee_familybg/",
		data: $('#frm_add_familly').serialize(),
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
			},
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                      location.reload();
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



//edit education info modal show
	$('#frm_edit_educ').on('show.bs.modal', function(e) {
            $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
			var name =   $(e.relatedTarget).data('title');
			var educ_id =   $(e.relatedTarget).data('educ_id');
			var pi_level =   $(e.relatedTarget).data('pi_level');
			var pi_schoolname =   $(e.relatedTarget).data('pi_schoolname');
			var pi_degree =   $(e.relatedTarget).data('pi_degree');
			var pi_yrgrad =   $(e.relatedTarget).data('pi_yrgrad');
			var pi_from =   $(e.relatedTarget).data('pi_from');
			var pi_to =   $(e.relatedTarget).data('pi_to');
			var pi_honors =   $(e.relatedTarget).data('pi_honors');
			var e_type =   $(e.relatedTarget).data('e_type');
			var e_sector =   $(e.relatedTarget).data('e_sector');
			$('.p_title').html("You can edit , <b>" + name + "</b>'s information.");
			$('.e_id').val(educ_id);
			$('.pi_level').val(pi_level);
			$('.pi_schoolname').val(pi_schoolname);
			$('.pi_degree').val(pi_degree);
			$('.pi_yrgrad').val(pi_yrgrad);
			$('.pi_from').val(pi_from);
			$('.pi_to').val(pi_to);
			$('.pi_honors').val(pi_honors);
			$('.e_sector').val(e_sector);
			$('.e_type').val(e_type);
        });

// edit education Background Information
$('#frm_educ_update').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/update_employee_educ/",
		data: $('#frm_educ_update').serialize(),
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
			},
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                      location.reload();
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


//edit Elibility info modal show
// $('a#popup_elig').on('click', function(){
$('#frm_edit_elig').on('show.bs.modal', function(e){
	$('#frm_edit_elig .p_title').html("You can edit , <b>" + $(e.relatedTarget).data('title') + "</b>'s information.");
	$('#frm_edit_elig #m_el_type').val($(e.relatedTarget).data('el_type'));
	$('#frm_edit_elig #m_el_id').val($(e.relatedTarget).data('el_id'));
	
	$('#frm_edit_elig #m_el_career').val($(e.relatedTarget).data('el_career'));
	$('#frm_edit_elig #m_el_rating').val($(e.relatedTarget).data('el_rating'));
	$('#frm_edit_elig #m_el_examdate').val($(e.relatedTarget).data('el_examdate'));
	
	$('#frm_edit_elig #m_el_examplace').val($(e.relatedTarget).data('el_examplace'));
	$('#frm_edit_elig #m_el_number').val($(e.relatedTarget).data('el_number'));
	$('#frm_edit_elig #m_el_daterelease').val($(e.relatedTarget).data('el_daterelease'));

});

// edit Elibility Background Information



$('#frm_elig_update').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/update_employee_elig/",
		data: $('#frm_elig_update').serialize(),
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
			},
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                      location.reload();
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



//edit Work info modal show
	$('#frm_edit_work').on('show.bs.modal', function(e) {
           // $(this).find('#btn_updateelig').attr('href', $(e.relatedTarget).data('href'));
			var name =   $(e.relatedTarget).data('title');
			$('.m_w_id').val($(e.relatedTarget).data('w_id'));
			$('.m_p_from').val($(e.relatedTarget).data('p_from'));
			$('.m_p_to').val($(e.relatedTarget).data('p_to'));
			$('.m_p_position').val($(e.relatedTarget).data('p_position'));
			$('.m_p_company').val($(e.relatedTarget).data('p_company'));
			$('.m_p_salarymonthly').val($(e.relatedTarget).data('p_salarymonthly'));
			$('.m_p_salarygrade').val($(e.relatedTarget).data('p_salarygrade'));
			$('.m_p_salarystep').val($(e.relatedTarget).data('p_salarystep'));
			$('.m_p_appointment').val($(e.relatedTarget).data('p_appointment'));
			$('.m_p_isgovt').val($(e.relatedTarget).data('p_isgovt'));
			$('.p_title').html("You can edit , <b>" + name + "</b>'s information.");

        });

// edit Elibility Background Information
$('#frm_work_update').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/update_employee_work/",
		data: $('#frm_work_update').serialize(),
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
			},
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                      location.reload();
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


//edit Voluntary Work info modal show
	$('#frm_edit_vol_work').on('show.bs.modal', function(e) {
           // $(this).find('#btn_updateelig').attr('href', $(e.relatedTarget).data('href'));
			var name =   $(e.relatedTarget).data('title');
			$('.m_vw_id').val($(e.relatedTarget).data('vw_id'));
			$('.m_vw_name').val($(e.relatedTarget).data('vw_name'));
			$('.m_vw_name').val($(e.relatedTarget).data('vw_name'));
			$('.m_vw_address').val($(e.relatedTarget).data('vw_address'));
			$('.m_vw_datefrom').val($(e.relatedTarget).data('vw_datefrom'));
			$('.m_vw_dateto').val($(e.relatedTarget).data('vw_dateto'));
			$('.m_vw_nohours').val($(e.relatedTarget).data('vw_nohours'));
			$('.m_vw_work').val($(e.relatedTarget).data('vw_work'));
	
			$('.p_title').html("You can edit , <b>" + name + "</b>'s information.");

        });

// edit Voluntary Work Information
$('#frm_vol_work_update').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/update_employee_vol_work/",
		data: $('#frm_vol_work_update').serialize(),
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
			},
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                      location.reload();
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




//edit Training info modal show
	$('#frm_edit_training').on('show.bs.modal', function(e) {
           // $(this).find('#btn_updateelig').attr('href', $(e.relatedTarget).data('href'));
			var name =   $(e.relatedTarget).data('title');
			$('.m_t_id').val($(e.relatedTarget).data('t_id'));
			$('.m_t_seminar').val($(e.relatedTarget).data('t_seminar'));
			$('.m_t_from').val($(e.relatedTarget).data('t_from'));
			$('.m_t_to').val($(e.relatedTarget).data('t_to'));
			$('.m_t_hoursno').val($(e.relatedTarget).data('t_hoursno'));
			$('.m_t_conductor').val($(e.relatedTarget).data('t_conductor'));
			$('.m_t_relevant').val($(e.relatedTarget).data('t_relevant'));
			$('.p_title').html("You can edit , <b>" + name + "</b>'s information.");

        });

// edit Training Information
$('#frm_training_update').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/update_employee_training/",
		data: $('#frm_training_update').serialize(),
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
			},
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                      location.reload();
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


//edit Training info modal show
	$('#frm_edit_skills').on('show.bs.modal', function(e) {
           // $(this).find('#btn_updateelig').attr('href', $(e.relatedTarget).data('href'));
			var name =   $(e.relatedTarget).data('title');
			$('.m_sh_id').val($(e.relatedTarget).data('sh_id'));
			$('.m_sh_skills').val($(e.relatedTarget).data('sh_skills'));
			$('.m_sh_nonacademic').val($(e.relatedTarget).data('sh_nonacademic'));
			$('.m_sh_membership').val($(e.relatedTarget).data('sh_membership'));
			
			$('.p_title').html("You can edit , <b>" + name + "</b>'s information.");

        });

// edit Training Information
$('#frm_skills_update').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/update_employee_skills/",
		data: $('#frm_skills_update').serialize(),
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
			},
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                      location.reload();
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

//edit Skills info modal show
	$('#frm_edit_reff').on('show.bs.modal', function(e) {
           // $(this).find('#btn_updateelig').attr('href', $(e.relatedTarget).data('href'));
			var name =   $(e.relatedTarget).data('title');
			$('.m_r_id').val($(e.relatedTarget).data('r_id'));
			$('.m_r_name').val($(e.relatedTarget).data('r_name'));
			$('.m_r_address').val($(e.relatedTarget).data('r_address'));
			$('.m_r_contactnum').val($(e.relatedTarget).data('m_r_contactnum'));

			$('.p_title').html("You can edit , <b>" + name + "</b>'s information.");

        });

// edit Training Information
$('#frm_reff_update').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/update_employee_reff/",
		data: $('#frm_reff_update').serialize(),
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
			},
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                      location.reload();
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


//TAKING PHOTO

$('#takeaphoto').on('show.bs.modal', function(e) {
	var name =   $(e.relatedTarget).data('title');
	$('.emp_id').val($(e.relatedTarget).data('a_id'));
	$('.emp_fullname').val($(e.relatedTarget).data('a_fullname'));
});

$('#btn_save_userpics').on('click', function() {
    $( ".photobooth ul li.trigger" ).trigger( "click" );
});

$('#takeaphoto').on('shown.bs.modal', function () {
    $( ".photobooth ul li.crop" ).trigger( "click" );
});



$('#btn_save_userpics').on('click', function(){

    // function a() {
	var data_userpics = 
		{
			userpics: $('#userpics').attr('src'),
			hid_id: $('#emp_id').val(),
			hid_fullname: $('#emp_fullname').val(),
			'pic': 1
		};
		// alert(data_userpics);
    // }
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/asaveimage/",
		data: data_userpics,
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
			},
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                      location.reload();
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
//end of taking photo


// Signature
$('#mdl_signature').on('show.bs.modal', function(e) {
	var name =   $(e.relatedTarget).data('title');
	$('.emp_id').val($(e.relatedTarget).data('a_id'));
	$('.emp_fullname').val($(e.relatedTarget).data('a_fullname'));
});

$('#save_empsig').on('click',function(){
	onDone(); // function on header
	setTimeout(function() {
		var signature = {
			emp_id: $('#emp_id').val(),
			sigImageData: $('#sigImageData').val(),
			sigImage: 1
		}	
		$.ajax({
			dataType:"json",
			type: "POST",
			url: base_url + "employee/savesignature",
			data: signature,	
  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
			},			
			success: function(data)
			{							
				if(data.status == 'yes'){
					new PNotify({
						title: 'Success',
						text: data.content,
						type: 'success',
						styling: 'bootstrap3'
					});
						setTimeout(function() {
							location.reload();
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
			alert('Connection problems occurred... Unable to connect to the Internet! The Internet connection has been lost.');
		});	
		return false;	
	}, 500);
});


// Delete Child
$('#frm_del_child').on('show.bs.modal', function(e) {
	$('.p_title').html($(e.relatedTarget).data('title'));
	$('.m_c_id').val($(e.relatedTarget).data('c_id'));
});

$('#frm_child_delete').on('submit', function(){
	var destination = base_url + "employee/delete_employee_child/";
	var frm = $('#frm_child_delete').serialize();
	ajax_delete(destination,frm);
});

// delete educ info
$('#frm_del_educ').on('show.bs.modal', function(e) {
	$('.p_title').html($(e.relatedTarget).data('title'));
	$('.m_e_id').val($(e.relatedTarget).data('e_id'));
});
$('#frm_educ_delete').on('submit', function(){
	var destination = base_url + "employee/delete_employee_educ/";
	var frm = $('#frm_educ_delete').serialize();
	ajax_delete(destination,frm);
});

// delete eligi info
$('#frm_del_elig').on('show.bs.modal', function(e) {
	$('.p_title').html($(e.relatedTarget).data('title'));
	$('.m_el_id').val($(e.relatedTarget).data('el_id'));
});
$('#frm_elig_delete').on('submit', function(){
	var destination = base_url + "employee/delete_employee_elig/";
	var frm = $('#frm_elig_delete').serialize();
	ajax_delete(destination,frm);
});

// delete Work Exp info
$('#frm_del_work_exp').on('show.bs.modal', function(e) {
	$('.p_title').html($(e.relatedTarget).data('title'));
	$('.m_w_id').val($(e.relatedTarget).data('w_id'));
});
$('#frm_work_exp_delete').on('submit', function(){
	var destination = base_url + "employee/delete_employee_work_exp/";
	var frm = $('#frm_work_exp_delete').serialize();
	ajax_delete(destination,frm);
});

// delete Voluntary Work Exp info
$('#frm_del_vol_work').on('show.bs.modal', function(e) {
	$('.p_title').html($(e.relatedTarget).data('title'));
	$('.m_vw_id').val($(e.relatedTarget).data('vw_id'));
});
$('#frm_vol_work_delete').on('submit', function(){
	var destination = base_url + "employee/delete_employee_vol_work/";
	var frm = $('#frm_vol_work_delete').serialize();
	ajax_delete(destination,frm);
});

// delete Training info
$('#frm_del_training').on('show.bs.modal', function(e) {
	$('.p_title').html($(e.relatedTarget).data('title'));
	$('.m_t_id').val($(e.relatedTarget).data('t_id'));
});
$('#frm_training_delete').on('submit', function(){
	var destination = base_url + "employee/delete_employee_training/";
	var frm = $('#frm_training_delete').serialize();
	ajax_delete(destination,frm);
});

// delete Skills info
$('#frm_del_skills').on('show.bs.modal', function(e) {
	$('.p_title').html($(e.relatedTarget).data('title'));
	$('.m_sh_id').val($(e.relatedTarget).data('sh_id'));
});
$('#frm_skills_delete').on('submit', function(){
	var destination = base_url + "employee/delete_employee_skills/";
	var frm = $('#frm_skills_delete').serialize();
	ajax_delete(destination,frm);
});

// delete Skills info
$('#frm_del_reff').on('show.bs.modal', function(e) {
	$('.p_title').html($(e.relatedTarget).data('title'));
	$('.m_r_id').val($(e.relatedTarget).data('r_id'));
});
$('#frm_reff_delete').on('submit', function(){
	var destination = base_url + "employee/delete_employee_reff/";
	var frm = $('#frm_reff_delete').serialize();
	ajax_delete(destination,frm);
});


// dynamic ajax function
function ajax_delete(destination,frm){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: destination,
		data: frm,
		  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
			},
		success: function(data){
			if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				setTimeout(function() {
                      location.reload();
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
}


var newURL = window.location.protocol + "://" + window.location.host 
var pathArray = window.location.pathname.split( '/' );
var segment_4 = pathArray[4];

var dt_workinfo = $('#dt_workinfo').DataTable({
	"ajax": {
		"url": base_url + "employee/ajax_get_workinfo/" + segment_4,
		"dataSrc": ""
		},
		// createdRow: function( row, data, dataIndex ) {
			// $(row).find('td').attr('data-a_id', data.a_id);
		// },

		"columns": [
				{ "data": function(data, type, row, meta) {
						return '<input type="checkbox" id="w_id" name="w_id" value="'+data.w_id+'">';
					}
				},
				{ "data": 
						function(data, type, row, meta) {	
							return data.p_from +" to "+  data.p_to;
						}
				},
				{ "data": "p_position" },
				{ "data": "w_type" },
				{ "data": "p_company" },
				{ "data": "p_salarymonthly" },
				{ "data": function(data, type, row, meta) {
							if(data.p_salarygrade != null){
									return data.p_salarygrade + " / "+  data.p_salarystep;
								}else{
									return "-";
								}
							}
						
				 },
				{ "data": "p_appointment" },
				{ "data": "p_isgovt" },
				
				{ "data":  function(data, type, row, meta) {
							return '<center><a title="Edit Work Info" data-href="'+ base_url +'employee/update_employee_work/'+data.w_id+'" data-toggle="modal" data-target="#frm_edit_work" data-title="'+data.p_position+' '+p_company+'" data-p_from="'+data.p_from+'" data-p_to="'+data.p_to+'" data-p_position="'+data.p_position+'" data-p_company="'+data.p_company+'" data-p_salarymonthly="'+data.p_salarymonthly+'" data-p_salarygrade="'+data.p_salarygrade+'" data-p_salarystep="'+data.p_salarystep+'" data-p_appointment="'+data.p_appointment+'" data-p_isgovt="'+data.p_isgovt+'" data-w_id="'+data.w_id+'"><i class="fa fa-pencil"></i></a> | <a title="Delete Education Info" data-href="'+base_url +'employee/delete_elig_work_exp/'+data.w_id+'" data-toggle="modal" data-target="#frm_del_work_exp" data-title="'+data.p_position+' '+ data.p_company +'" data-w_id="'+data.w_id+'"><i class="glyphicon glyphicon-trash"></i></a></center>';
							}
				},
			
		],

		columnDefs: [{
        visible: false,
        searchable: true,
			}, ],
		
		// dom: '<"wrapper"Bfit>',
		buttons: [ { extend: 'excelHtml5',
			className: 'green',
					'text': '<i class="fa fa-download"></i>',
					customize: function( xlsx ) { 
							var sheet = xlsx.xl.worksheets['sheet1.xml']; 
									$('row c[r^="C"]', sheet).attr( 's', '2' ); } }, 
				],
			
		deferRender: true,
		scrollY: 380,
		scrollCollapse: true,
		scroller: true,
		scrollX: true,
		autoWidth: false
		// stateSave: true

});




$('#btn_save_worktype').on('click', function(){

		var checkValues =  $('input[name=w_id]:checked').map(function()
			{
				return $(this).val();
			}).get();
			
		var worktype = {
			w: checkValues,
			w_type : $('#w_type').val(),
			'ajax' : 1
		};
	 // alert(checkValues);
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "employee/ajax_save_worktype",
			data: worktype,
			  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
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
					dt_workinfo.ajax.reload();
				
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




var dt_training = $('#dt_training').DataTable({
	"ajax": {
		"url": base_url + "employee/ajax_get_emp_training/" + segment_4,
		"dataSrc": ""
		},
		// createdRow: function( row, data, dataIndex ) {
			// $(row).find('td').attr('data-a_id', data.a_id);
		// },

		"columns": [
				{ "data": function(data, type, row, meta) {
						return '<input type="checkbox" id="t_id" name="t_id" value="'+data.t_id+'">';
					}
				},
				{ "data": "t_seminar" },
				{ "data": "t_type" },
				{ "data": "t_from" },
				{ "data": "t_to" },
				{ "data": "t_hoursno" },
				{ "data": "t_conductor" },
				
				{ "data":  function(data, type, row, meta) {
							return '<center><a title="Edit Work Info" data-href="'+ base_url +'employee/update_employee_training/'+data.t_id+'" data-toggle="modal" data-target="#frm_edit_training" data-title="'+data.t_seminar+'" data-t_seminar="'+data.t_seminar+'" data-t_from="'+data.t_from+'" data-t_to="'+data.t_to+'" data-t_hoursno="'+data.t_hoursno+'" data-t_conductor="'+data.t_conductor+'" data-t_relevant="'+data.t_relevant+'" data-t_id="'+data.t_id+'""><i class="fa fa-pencil"></i></a> | <a title="Delete Training Info" data-href="'+base_url +'employee/delete_traing_delete/'+data.t_id+'" data-toggle="modal" data-target="#frm_del_training" data-title="'+data.t_seminar+'" data-t_id="'+data.t_id+'"><i class="glyphicon glyphicon-trash"></i></a></center>';
							}
				},
			
		],

		columnDefs: [{
        visible: false,
        searchable: true,
			}, ],
		
		// dom: '<"wrapper"Bfit>',
		buttons: [ { extend: 'excelHtml5',
			className: 'green',
					'text': '<i class="fa fa-download"></i>',
					customize: function( xlsx ) { 
							var sheet = xlsx.xl.worksheets['sheet1.xml']; 
									$('row c[r^="C"]', sheet).attr( 's', '2' ); } }, 
				],
			
		deferRender: true,
		scrollY: 380,
		scrollCollapse: true,
		scroller: true,
		scrollX: true,
		autoWidth: false
		// stateSave: true
});


$('#btn_save_trainingtype').on('click', function(){

		var checkValues =  $('input[name=t_id]:checked').map(function()
			{
				return $(this).val();
			}).get();
			
		var worktype = {
			t: checkValues,
			t_type : $('#t_type').val(),
			'ajax' : 1
		};
	 // alert(checkValues);
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "employee/ajax_save_trainingtype",
			data: worktype,
			  beforeSend: function() {
			new PNotify({
                        title: 'Processing',
                        text: 'Please wait..',
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
					dt_training.ajax.reload();
				
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


var dt_eligibility = $('#dt_eligibility').DataTable({
	"ajax": {
		"url": base_url + "employee/ajax_get_emp_eligibility/" + segment_4,
		"dataSrc": ""
		},
		"columns": [
				{ "data": function(data, type, row, meta) {
						return '<input type="checkbox" id="el_id" name="el_id" value="'+data.el_id+'">';
					}
				},
				{ "data": "el_type" },
				{ "data": "el_career" },
				{ "data": "el_rating" },
				{ "data": "el_examdate" },
				{ "data": "el_examplace" },
				{ "data": "el_number" },
				{ "data": "el_daterelease" },
				
				{ "data":  function(data, type, row, meta) {
							return '<center><a id="popup_elig" title="Edit Work Info" data-href="'+ base_url +'employee/update_employee_elig/'+data.el_id+'" data-toggle="modal" data-target="#frm_edit_elig" data-title="'+data.el_type+' - '+data.el_career+'" data-el_type="'+data.el_type+'" data-el_career="'+data.el_career+'" data-el_rating="'+data.el_rating+'" data-el_examdate="'+data.el_examdate+'" data-el_examplace="'+data.el_examplace+'" data-el_number="'+data.el_number+'" data-el_daterelease="'+data.el_daterelease+'" data-el_id="'+data.el_id+'""><i class="fa fa-pencil"></i></a> | <a title="Delete Education Info" data-href="'+base_url +'employee/delete_elig_info/'+data.el_id+'" data-toggle="modal" data-target="#frm_del_elig" data-title="'+data.el_type+' - '+data.el_career+'" data-el_id="'+data.el_id+'"><i class="glyphicon glyphicon-trash"></i></a></center>';
							}
				}
			
		],
		columnDefs: [{
			visible: false,
			searchable: true,
		}, ],
		buttons: [ { 
			extend: 'excelHtml5',
			className: 'green',
					'text': '<i class="fa fa-download"></i>',
			customize: function( xlsx ) { 
					var sheet = xlsx.xl.worksheets['sheet1.xml']; 
									$('row c[r^="C"]', sheet).attr( 's', '2' ); } }, 
		],
		deferRender: true,
		scrollY: 380,
		scrollCollapse: true,
		scroller: true,
		scrollX: true,
		autoWidth: false
		// stateSave: true
});