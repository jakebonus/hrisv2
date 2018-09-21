

// moment().format();

// var Leave_Start = moment('2017-03-01');
// var Leave_End = moment('2017-04-04').add(1, 'd');

// console.log('Difference is ', Leave_End.diff(Leave_Start), 'milliseconds');
// console.log('Difference is ', Leave_End.diff(Leave_Start, 'days'), 'days');
// console.log('Difference is ', Leave_End.diff(Leave_Start, 'months'), 'months');
var numOfDays = 0;
var numberOfWorkingDays = 0;
var l_noofworkingdays = '0';
var  msg = '';
var  isValid = false;
var holidays = [];
$.getJSON(base_url + "user/ajax_get_holidays", function(data) {
    $.each(data, function(index, item) {
        holidays.push(item.h_date);
    });
});


if (a_deptlocation == 'CAVO' || a_deptlocation == 'CDRRMD' || a_deptlocation == 'CEED' || a_deptlocation == 'UMSD' || a_deptlocation == 'TMD') {

    var start = new Date($("#l_from").val());
    var end = new Date($("#l_to").val());
    // initial total
    var totalBusinessDays = 0;
    // normalize both start and end to beginning of the day
    start.setHours(0, 0, 0, 0);
    end.setHours(0, 0, 0, 0);

    var current = new Date(start);
    current.setDate(current.getDate());
    var day;
    // loop through each day, checking
    while (current <= end) {
        var generatedDate = current.getFullYear() + '-' + ("0" + (current.getMonth() + 1)).slice(-2) + '-' + ("0" + (current.getDate())).slice(-2);
        day = current.getDay();
        // check GeneratedDate if Holiday
        if ($.inArray(generatedDate, holidays) > -1) {
            // alert('Holiday');
        } else {
            // Check if employee leave equivalent
            if (a_equivalentleaveday == '1.00') {
                // check day if sat or sunday
                if (day >= 1 && day <= 5) {
                    ++totalBusinessDays;
                }
            } else {
                ++totalBusinessDays;
            }
        }
        current.setDate(current.getDate() + 1);
    }
    // l_noofworkingdays = a_equivalentleaveday * totalBusinessDays ;

    $("#l_noofworkingdays").val(totalBusinessDays);

}



$('#frm_userlogin').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "user/index/",
		cache: false,
		data: $('#frm_userlogin').serialize(),
		 beforeSend: function(){
			new PNotify({
				title: 'Processing...',
                text: 'Please wait a moment',
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
				if(data.is_pword == '0'){
					setTimeout(function() {
							location.href = base_url + "user/change_password/";
						}, 1000);
				}else{
					setTimeout(function() {
							location.href = base_url + "user/account/";
						}, 1000);
				}
			}else{
				new PNotify({
                        title: 'Error',
                        text: data.content,
                        type: 'danger',
                        styling: 'bootstrap3'
                    });
			}
		}
	// }).error(function(){
			// alert('Connection problems occurred...');
	});
	return false;
});


// var childtable = $('#req').DataTable( {
var req = $('#req').DataTable( {
    "ajax": {
        "url": base_url + "user/ajax_get_request_details",
        "dataSrc": ""
    },
        "columns": [

            { "data": "r_type" },
            { "data": "r_datefiled" },
            { "data": "r_noofcopy" },
            { "data": "r_purpose" },
            { "data": "remarks" },
            // { "data": "r_id" },
            // { "data": function (data, type, row, meta) { if(data.c_forapproval == '1'){ return 'New'} if (data.c_forapproval == '2'){ return 'Updated'} if (data.c_forapproval == '3'){ return 'Delete'}}
			// },
			// { "data": function (data, type, row, meta) { 																	if(data.c_forapproval == '1'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation" data-title="'+data.fullname+'" data-c_id="' + data.c_id +'" data-c_forapproval="' + data.c_forapproval +'"> Approved </a>'} 																											if (data.c_forapproval == '2'){ return '<a class="btn btn-primary" data-toggle="modal" data-target="#frm_approval_confirmation" data-title="'+data.fullname+'" data-c_id="' + data.c_id +'" data-c_forapproval="' + data.c_forapproval +'"> Approved </a>'} 																											if (data.c_forapproval == '3'){ return '<a class="btn btn-warning" data-toggle="modal" data-target="#frm_approval_confirmation" data-title="'+data.fullname+'" data-c_id="' + data.c_id +'" data-c_forapproval="' + data.c_forapproval +'"> Approved </a>'}}
			// },

],
dom: '<"wrapper"Bfit>',
buttons: [ { extend: 'excelHtml5',
			customize: function( xlsx ) {
					var sheet = xlsx.xl.worksheets['sheet1.xml'];
							$('row c[r^="C"]', sheet).attr( 's', '2' ); } },
			{ extend: 'print', exportOptions: { columns: [ 0, 1, 3, 4 ] },
			},
		],
    	deferRender: true,
        scrollY: 380,
        scrollCollapse: true,
        scroller: true,
    	scrollX: true,
        fixedColumns:   {
            leftColumns: 1,
            rightColumns: 2
        },
        autoWidth: false,
        //stateSave: true
  });
  $('#is_vacation').hide();
$('#is_sick').hide();
  $('#l_typespecify').on('change',function(){

	var l_typespecify = $('#l_typespecify').val();
	if(l_typespecify == 'ML'){
		// Sick Leave
			$('#l_from').attr('required','required');
			$('#l_from').removeAttr('readonly','readonly');
			$('#l_to').removeAttr('readonly','readonly');
			$("#l_type").val('ALL');
			$("#l_where option").detach();
			$("#l_where").append('<option value="0" selected> Out-Patient</option>');
			$("#l_where").append('<option value="1">  In Hospital</option>');

	}else if(l_typespecify == 'RL'){
		// Sick Leave
			$('#l_from').attr('required','required');
			$('#l_from').removeAttr('readonly','readonly');
			$('#l_to').removeAttr('readonly','readonly');
			$("#l_type").val('Sick');
			$("#l_where option").detach();
			$("#l_where").append('<option value="0" selected> Out-Patient</option>');
			$("#l_where").append('<option value="1">  In Hospital</option>');

	}else if(l_typespecify == 'SL'){
		// Sick Leave
			$('#l_from').attr('required','required');
			$('#l_from').removeAttr('readonly','readonly');
			$('#l_to').removeAttr('readonly','readonly');
			$("#l_type").val('Sick');
			$("#l_where option").detach();
			$("#l_where").append('<option value="0" selected> Out-Patient</option>');
			$("#l_where").append('<option value="1">  In Hospital</option>');

	}else if(l_typespecify == 'PL'){
		// Sick Leave
			$('#l_from').attr('required','required');
			$('#l_from').removeAttr('readonly','readonly');
			$('#l_to').removeAttr('readonly','readonly');
			$("#l_type").val('Sick');
			$("#l_where option").detach();
			$("#l_where").append('<option value="0" selected> Out-Patient</option>');
			$("#l_where").append('<option value="1">  In Hospital</option>');


	}else if(l_typespecify == 'SPL'){
			// Sick Leave
				$('#l_from').attr('required','required');
				$('#l_from').removeAttr('readonly','readonly');
				$('#l_to').removeAttr('readonly','readonly');
				$("#l_type").val('ALL');
				$("#l_where option").detach();
				$("#l_where").append('<option value="0" selected> Out-Patient</option>');
				$("#l_where").append('<option value="1">  In Hospital</option>');
	
	}else if(l_typespecify == 'SLP(ML)'){
		// Mourning Leave
			$('#l_from').attr('required','required');
			$('#l_from').removeAttr('readonly','readonly');
			$('#l_to').removeAttr('readonly','readonly');
			$("#l_type").val('Sick');
			$("#l_where option").detach();
			$("#l_where").append('<option value="0" selected> Out-Patient</option>');
			$("#l_where").append('<option value="1">  In Hospital</option>');


	}else if(l_typespecify == 'Monetization of Leave Credits'){
		// Vacation Leave

			$('#l_from').removeAttr('required','required');
			$('#l_from').attr('readonly','readonly');
			$('#l_to').attr('readonly','readonly');
			$("#l_noofworkingdays").val('10');
			$("#l_type").val('Vacation');
			$("#l_where option").detach();
			$("#l_where").append('<option value="0" selected> Out-Patient</option>');
			$("#l_where").append('<option value="1">  In Hospital</option>');

	}else if(l_typespecify == ''){
		// Vacation Leave

			$('#l_from').removeAttr('required','required');
			$('#l_from').attr('readonly','readonly');
			$('#l_to').attr('readonly','readonly');
			$("#l_type").val('');
			$("#l_where option").detach();
			$("#l_where").append('<option value="0" selected> Out-Patient</option>');
			$("#l_where").append('<option value="1">  In Hospital</option>');
	}else{
		// Vacation Leave
			$('#l_from').attr('required','required');
			$('#l_from').removeAttr('readonly','readonly');
			$('#l_to').removeAttr('readonly','readonly');
			$("#l_type").val('Vacation');
			$("#l_where option").detach();
			$("#l_where").append('<option value="0" selected> Within the Philippines</option>');
			$("#l_where").append('<option value="1">  Abroad (Specify)</option>');
	}

	if(l_typespecify == 'Monetization of Leave Credits'){
			$("#l_commutation option").detach();
			$("#l_commutation").append('<option selected value="Requested">Requested</option>');
			$("#l_commutation").append('<optionvalue="Not Requested">Not Requested</option>');
	}else{
			$("#l_commutation option").detach();

			$("#l_commutation").append('<option  value="Requested">Requested</option>');
			$("#l_commutation").append('<option selected value="Not Requested">Not Requested</option>');
	}

  });

$('#frm_saverequest').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		cache: false,
		url: base_url + "user/save_request/",
		data: $('#frm_saverequest').serialize(),
		 beforeSend: function(){
			new PNotify({
				title: 'Processing...',
                text: 'Please wait a moment',
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

				// setTimeout(function() {
        //                 location.reload();
        //             }, 1000);

        req.ajax.reload();

			}else{
				new PNotify({
                        title: 'Error',
                        text: data.content,
                        type: 'danger',
                        styling: 'bootstrap3'
                    });
			}
		}
	// }).error(function(){
			// alert('Connection problems occurred...');
	});
	return false;
});

// Update Password
$('#frm_userchangepassword').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		cache: false,
		url: base_url + "user/update_password/",
		data: $('#frm_userchangepassword').serialize(),
		 beforeSend: function(){
			new PNotify({
				title: 'Processing...',
                text: 'Please wait a moment',
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
                        location.href = base_url + "user/account/";
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
	// }).error(function(){
			// alert('Connection problems occurred...');
	});
	return false;
});

// update employee Personal Info
$('#frm_personal').on('submit', function(){
// 	$.ajax({
// 		type: "POST",
// 		dataType: "json",
// 		cache: false,
// 		url: base_url + "user/update_employee_personal_info/",
// 		data: $('#frm_personal').serialize(),
//     beforeSend: function(){
//       new PNotify({
//                     title: 'Processing',
//                     text: 'Please wait...',
//                     type: 'info',
//                     styling: 'bootstrap3'
//                 });
//     },
// 		success: function(data){
// 			if(data.status == 'yes'){
// 				 	new PNotify({
//                         title: 'Success',
//                         text: data.content,
//                         type: 'success',
//                         styling: 'bootstrap3'
//                     });
// 				setTimeout(function() {
//                         location.reload();
//                     }, 1000);
// 			}else{
// 				new PNotify({
//                         title: 'Error',
//                         text: data.content,
//                         type: 'danger',
//                         styling: 'bootstrap3'
//                     });
// 			}
// 		}
// 	}).error(function(){
// 			alert('Connection problems occurred...');
// 	});
	return false;
});


// update employee familly bg
$('#frm_familly').on('submit', function(){
	// $.ajax({
	// 	type: "POST",
	// 	dataType: "json",
	// 	cache: false,
	// 	url: base_url + "user/update_employee_familly/",
	// 	data: $('#frm_familly').serialize(),
  //   beforeSend: function(){
  //     new PNotify({
  //                   title: 'Processing',
  //                   text: 'Please wait...',
  //                   type: 'info',
  //                   styling: 'bootstrap3'
  //               });
  //   },
	// 	success: function(data){
	// 		if(data.status == 'yes'){
	// 			 	new PNotify({
  //                       title: 'Success',
  //                       text: data.content,
  //                       type: 'success',
  //                       styling: 'bootstrap3'
  //                   });
	// 			setTimeout(function() {
  //                       location.reload();
  //                   }, 1000);
  //
	// 		}else{
	// 			new PNotify({
  //                       title: 'Error',
  //                       text: data.content,
  //                       type: 'danger',
  //                       styling: 'bootstrap3'
  //                   });
	// 		}
	// 	}
	// }).error(function(){
	// 		alert('Connection problems occurred...');
	// });
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
		cache: false,
		url: base_url + "user/add_employee_child/",
		data: $('#frm_child').serialize(),
    beforeSend: function(){
      new PNotify({
                    title: 'Processing',
                    text: 'Please wait...',
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
		cache: false,
		url: base_url + "user/add_employee_educ/",
		data: $('#frm_educbg').serialize(),
    beforeSend: function(){
      new PNotify({
                    title: 'Processing',
                    text: 'Please wait...',
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
		url: base_url + "user/add_employee_training/",
		data: $('#frm_training').serialize(),
    beforeSend: function(){
      new PNotify({
                    title: 'Processing',
                    text: 'Please wait...',
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
$('#add_new_elig').hide();
$('#add_elig').on('click', function(){
	$('#add_new_elig').slideToggle();
});

$('#frm_elig').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "user/add_employee_elig/",
		data: $('#frm_elig').serialize(),
    beforeSend: function(){
      new PNotify({
                    title: 'Processing',
                    text: 'Please wait...',
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


// add new work info
$('#add_new_work').hide();
$('#add_work').on('click', function(){
	$('#add_new_work').slideToggle();
});

$('#frm_work').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "user/add_employee_work/",
		data: $('#frm_work').serialize(),
    beforeSend: function(){
      new PNotify({
                    title: 'Processing',
                    text: 'Please wait...',
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
	// $.ajax({
	// 	type: "POST",
	// 	dataType: "json",
	// 	url: base_url + "user/add_employee_vol_work/",
	// 	data: $('#frm_vol_work').serialize(),
  //   beforeSend: function(){
  //     new PNotify({
  //                   title: 'Processing',
  //                   text: 'Please wait...',
  //                   type: 'info',
  //                   styling: 'bootstrap3'
  //               });
  //   },
	// 	success: function(data){
	// 		if(data.status == 'yes'){
	// 			 	new PNotify({
  //                       title: 'Success',
  //                       text: data.content,
  //                       type: 'success',
  //                       styling: 'bootstrap3'
  //                   });
	// 			setTimeout(function() {
  //                       location.reload();
  //                   }, 1000);
  //
	// 		}else{
	// 			new PNotify({
  //                       title: 'Error',
  //                       text: data.content,
  //                       type: 'danger',
  //                       styling: 'bootstrap3'
  //                   });
	// 		}
	// 	}
	// }).error(function(){
	// 		alert('Connection problems occurred...');
	// });
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
		url: base_url + "user/add_employee_skills/",
		data: $('#frm_skills').serialize(),
    beforeSend: function(){
      new PNotify({
                    title: 'Processing',
                    text: 'Please wait...',
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
	// $.ajax({
	// 	type: "POST",
	// 	dataType: "json",
	// 	url: base_url + "user/update_employee_answers/",
	// 	data: $('#frm_questions').serialize(),
  //   beforeSend: function(){
  //     new PNotify({
  //                   title: 'Processing',
  //                   text: 'Please wait...',
  //                   type: 'info',
  //                   styling: 'bootstrap3'
  //               });
  //   },
	// 	success: function(data){
	// 		if(data.status == 'yes'){
	// 			 	new PNotify({
  //                       title: 'Success',
  //                       text: data.content,
  //                       type: 'success',
  //                       styling: 'bootstrap3'
  //                   });
	// 			setTimeout(function() {
  //                       location.reload();
  //                   }, 1000);
  //
	// 		}else{
	// 			new PNotify({
  //                       title: 'Error',
  //                       text: data.content,
  //                       type: 'danger',
  //                       styling: 'bootstrap3'
  //                   });
	// 		}
	// 	}
	// }).error(function(){
	// 		alert('Connection problems occurred...');
	// });
	return false;
});

// add new skills info
$('#add_new_reff').hide();
$('#add_reff').on('click', function(){
	$('#add_new_reff').slideToggle();
});

$('#frm_reff').on('submit', function(){
	// $.ajax({
	// 	type: "POST",
	// 	dataType: "json",
	// 	url: base_url + "user/add_employee_reff/",
	// 	data: $('#frm_reff').serialize(),
  //   beforeSend: function(){
  //     new PNotify({
  //                   title: 'Processing',
  //                   text: 'Please wait...',
  //                   type: 'info',
  //                   styling: 'bootstrap3'
  //               });
  //   },
	// 	success: function(data){
	// 		if(data.status == 'yes'){
	// 			 	new PNotify({
  //                       title: 'Success',
  //                       text: data.content,
  //                       type: 'success',
  //                       styling: 'bootstrap3'
  //                   });
	// 			setTimeout(function() {
  //                       location.reload();
  //                   }, 1000);
  //
	// 		}else{
	// 			new PNotify({
  //                       title: 'Error',
  //                       text: data.content,
  //                       type: 'danger',
  //                       styling: 'bootstrap3'
  //                   });
	// 		}
	// 	}
	// }).error(function(){
	// 		alert('Connection problems occurred...');
	// });
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
		url: base_url + "user/edit_child_info/",
		data: $('#frm_child_update').serialize(),
    beforeSend: function(){
      new PNotify({
                    title: 'Processing',
                    text: 'Please wait...',
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
	// $.ajax({
	// 	type: "POST",
	// 	dataType: "json",
	// 	url: base_url + "user/add_employee_familybg/",
	// 	data: $('#frm_add_familly').serialize(),
  //   beforeSend: function(){
  //     new PNotify({
  //                   title: 'Processing',
  //                   text: 'Please wait...',
  //                   type: 'info',
  //                   styling: 'bootstrap3'
  //               });
  //   },
	// 	success: function(data){
	// 		if(data.status == 'yes'){
	// 			 	new PNotify({
  //                       title: 'Success',
  //                       text: data.content,
  //                       type: 'success',
  //                       styling: 'bootstrap3'
  //                   });
	// 			setTimeout(function() {
  //                     location.reload();
  //                   }, 1000);
  //
	// 		}else{
	// 			new PNotify({
  //                       title: 'Error',
  //                       text: data.content,
  //                       type: 'danger',
  //                       styling: 'bootstrap3'
  //                   });
	// 		}
	// 	}
	// }).error(function(){
	// 		alert('Connection problems occurred...');
	// });
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
			$('.e_type').val(e_type);
			$('.e_sector').val(e_sector);
        });

// edit education Background Information
$('#frm_educ_update').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "user/update_employee_educ/",
		data: $('#frm_educ_update').serialize(),
    beforeSend: function(){
      new PNotify({
                    title: 'Processing',
                    text: 'Please wait...',
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
	$('#frm_edit_elig').on('show.bs.modal', function(e) {
           // $(this).find('#btn_updateelig').attr('href', $(e.relatedTarget).data('href'));
			var name =   $(e.relatedTarget).data('title');
			var el_id =   $(e.relatedTarget).data('el_id');
			var el_type =   $(e.relatedTarget).data('el_type');
			var el_career =   $(e.relatedTarget).data('el_career');
			var el_rating =   $(e.relatedTarget).data('el_rating');
			var el_examdate =   $(e.relatedTarget).data('el_examdate');
			var el_examplace =   $(e.relatedTarget).data('el_examplace');
			var el_number =   $(e.relatedTarget).data('el_number');
			var el_daterelease =   $(e.relatedTarget).data('el_daterelease');
			$('.p_title').html("You can edit , <b>" + name + "</b>'s information.");
			$('.m_el_id').val(el_id);
			$('.m_el_type').val(el_type);
			$('.m_el_career').val(el_career);
			$('.m_el_rating').val(el_rating);
			$('.m_el_examdate').val(el_examdate);
			$('.m_el_examplace').val(el_examplace);
			$('.m_el_number').val(el_number);
			$('.m_el_daterelease').val(el_daterelease);
        });

// edit Elibility Background Information
$('#frm_elig_update').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "user/update_employee_elig/",
		data: $('#frm_elig_update').serialize(),
    beforeSend: function(){
      new PNotify({
                    title: 'Processing',
                    text: 'Please wait...',
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
			$('.m_w_type').val($(e.relatedTarget).data('w_type'));
			$('.p_title').html("You can edit , <b>" + name + "</b>'s information.");

        });

// edit Elibility Background Information
$('#frm_work_update').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "user/update_employee_work/",
		data: $('#frm_work_update').serialize(),
    beforeSend: function(){
      new PNotify({
                    title: 'Processing',
                    text: 'Please wait...',
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
	// $.ajax({
	// 	type: "POST",
	// 	dataType: "json",
	// 	url: base_url + "user/update_employee_vol_work/",
	// 	data: $('#frm_vol_work_update').serialize(),
  //   beforeSend: function(){
  //     new PNotify({
  //                   title: 'Processing',
  //                   text: 'Please wait...',
  //                   type: 'info',
  //                   styling: 'bootstrap3'
  //               });
  //   },
	// 	success: function(data){
	// 		if(data.status == 'yes'){
	// 			 	new PNotify({
  //                       title: 'Success',
  //                       text: data.content,
  //                       type: 'success',
  //                       styling: 'bootstrap3'
  //                   });
	// 			setTimeout(function() {
  //                     location.reload();
  //                   }, 1000);
  //
	// 		}else{
	// 			new PNotify({
  //                       title: 'Error',
  //                       text: data.content,
  //                       type: 'danger',
  //                       styling: 'bootstrap3'
  //                   });
	// 		}
	// 	}
	// }).error(function(){
	// 		alert('Connection problems occurred...');
	// });
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
			$('.m_t_type').val($(e.relatedTarget).data('t_type'));
			$('.p_title').html("You can edit , <b>" + name + "</b>'s information.");

        });

// edit Training Information
$('#frm_training_update').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "user/update_employee_training/",
		data: $('#frm_training_update').serialize(),
    beforeSend: function(){
      new PNotify({
                    title: 'Processing',
                    text: 'Please wait...',
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
		url: base_url + "user/update_employee_skills/",
		data: $('#frm_skills_update').serialize(),
    beforeSend: function(){
      new PNotify({
                    title: 'Processing',
                    text: 'Please wait...',
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
		url: base_url + "user/update_employee_reff/",
		data: $('#frm_reff_update').serialize(),
    beforeSend: function(){
      new PNotify({
                    title: 'Processing',
                    text: 'Please wait...',
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

// $('#takeaphoto').on('show.bs.modal', function(e) {
	// var name =   $(e.relatedTarget).data('title');
	// $('.emp_id').val($(e.relatedTarget).data('a_id'));
	// $('.emp_fullname').val($(e.relatedTarget).data('a_fullname'));
// });

// $('#btn_save_userpics').on('click', function() {
    // $( ".photobooth ul li.trigger" ).trigger( "click" );
// });

// $('#takeaphoto').on('shown.bs.modal', function () {
    // $( ".photobooth ul li.crop" ).trigger( "click" );
// });



// $('#btn_save_userpics').on('click', function(){

    //  --- function a() {
	// var data_userpics =
		// {
			// userpics: $('#userpics').attr('src'),
			// hid_id: $('#emp_id').val(),
			// hid_fullname: $('#emp_fullname').val(),
			// 'pic': 1
		// };
		// -- alert(data_userpics);
    // }
	// $.ajax({
		// type: "POST",
		// dataType: "json",
		// url: base_url + "employee/asaveimage/",
		// data: data_userpics,
		// success: function(data){
			// if(data.status == 'yes'){
				 	// new PNotify({
                        // title: 'Success',
                        // text: data.content,
                        // type: 'success',
                        // styling: 'bootstrap3'
                    // });
				// setTimeout(function() {
                      // location.reload();
                    // }, 1000);
			// }else{
				// new PNotify({
                        // title: 'Error',
                        // text: data.content,
                        // type: 'danger',
                        // styling: 'bootstrap3'
                    // });
			// }
		// }
	// }).error(function(){
			// alert('Connection problems occurred...');
	// });
	// return false;
// });
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
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "user/request_delete_employee_child/",
		data: $('#frm_child_delete').serialize(),
    beforeSend: function(){
      new PNotify({
                    title: 'Processing',
                    text: 'Please wait...',
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

// delete educ info
$('#frm_del_educ').on('show.bs.modal', function(e) {
	$('.p_title').html($(e.relatedTarget).data('title'));
	$('.m_e_id').val($(e.relatedTarget).data('e_id'));
});
$('#frm_educ_delete').on('submit', function(){
	// var destination = ;
	// var frm = ;
	// ajax_delete(destination,frm);
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "user/request_delete_employee_educ/",
		data: $('#frm_educ_delete').serialize(),
    beforeSend: function(){
      new PNotify({
                    title: 'Processing',
                    text: 'Please wait...',
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

// delete eligi info
$('#frm_del_elig').on('show.bs.modal', function(e) {
	$('.p_title').html($(e.relatedTarget).data('title'));
	$('.m_el_id').val($(e.relatedTarget).data('el_id'));
});
$('#frm_elig_delete').on('submit', function(){

	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "user/request_delete_employee_elig/",
		data: $('#frm_elig_delete').serialize(),
    beforeSend: function(){
      new PNotify({
                    title: 'Processing',
                    text: 'Please wait...',
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
	// ajax_delete(destination,frm);
});

// delete Work Exp info
$('#frm_del_work_exp').on('show.bs.modal', function(e) {
	$('.p_title').html($(e.relatedTarget).data('title'));
	$('.m_w_id').val($(e.relatedTarget).data('w_id'));
});
$('#frm_work_exp_delete').on('submit', function(){

	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "user/user_delete_employee_work_exp/",
		data: $('#frm_work_exp_delete').serialize(),
    beforeSend: function(){
      new PNotify({
                    title: 'Processing',
                    text: 'Please wait...',
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

// delete Voluntary Work Exp info
$('#frm_del_vol_work').on('show.bs.modal', function(e) {
	$('.p_title').html($(e.relatedTarget).data('title'));
	$('.m_vw_id').val($(e.relatedTarget).data('vw_id'));
});
$('#frm_vol_work_delete').on('submit', function(){
  //
	// $.ajax({
	// 	type: "POST",
	// 	dataType: "json",
	// 	url: base_url + "user/request_delete_employee_vol_work/",
	// 	data: $('#frm_vol_work_delete').serialize(),
  //   beforeSend: function(){
  //     new PNotify({
  //                   title: 'Processing',
  //                   text: 'Please wait...',
  //                   type: 'info',
  //                   styling: 'bootstrap3'
  //               });
  //   },
	// 	success: function(data){
	// 		if(data.status == 'yes'){
	// 			 	new PNotify({
  //                       title: 'Success',
  //                       text: data.content,
  //                       type: 'success',
  //                       styling: 'bootstrap3'
  //                   });
	// 			setTimeout(function() {
  //                     location.reload();
  //                   }, 1000);
  //
	// 		}else{
	// 			new PNotify({
  //                       title: 'Error',
  //                       text: data.content,
  //                       type: 'danger',
  //                       styling: 'bootstrap3'
  //                   });
	// 		}
	// 	}
	// }).error(function(){
	// 		alert('Connection problems occurred...');
	// });
	return false;
});

// delete Training info
$('#frm_del_training').on('show.bs.modal', function(e) {
	$('.p_title').html($(e.relatedTarget).data('title'));
	$('.m_t_id').val($(e.relatedTarget).data('t_id'));
});
$('#frm_training_delete').on('submit', function(){

	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "user/request_delete_employee_training/",
		data: $('#frm_training_delete').serialize(),
    beforeSend: function(){
      new PNotify({
                    title: 'Processing',
                    text: 'Please wait...',
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

// delete Skills info
$('#frm_del_skills').on('show.bs.modal', function(e) {
	$('.p_title').html($(e.relatedTarget).data('title'));
	$('.m_sh_id').val($(e.relatedTarget).data('sh_id'));
});
$('#frm_skills_delete').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "user/request_delete_employee_skills/",
		data: $('#frm_skills_delete').serialize(),
    beforeSend: function(){
      new PNotify({
                    title: 'Processing',
                    text: 'Please wait...',
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

// delete Skills info
$('#frm_del_reff').on('show.bs.modal', function(e) {
	$('.p_title').html($(e.relatedTarget).data('title'));
	$('.m_r_id').val($(e.relatedTarget).data('r_id'));
});
$('#frm_reff_delete').on('submit', function(){

	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "user/request_delete_employee_reff/",
		data: $('#frm_reff_delete').serialize(),
    beforeSend: function(){
      new PNotify({
                    title: 'Processing',
                    text: 'Please wait...',
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


// dynamic ajax function
function ajax_delete(destination,frm){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: destination,
		data: frm,
    beforeSend: function(){
      new PNotify({
                    title: 'Processing',
                    text: 'Please wait...',
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




$('#frm_leaverequest').on('submit', function(){
	numOfDays = 0;
	numberOfWorkingDays = 0;
	l_noofworkingdays.value = '';


	var res = calculateLeave();

	console.log('l_type '+ $('#l_type').val());
	console.log('numOfDays '+ numOfDays);
	console.log('numberOfWorkingDays '+ numberOfWorkingDays);
	console.log('isValid '+ isValid);

	if(res == true){
		
		// console.log('l_type '+ $('#l_type').val());
		// console.log('numOfDays '+ numOfDays);
		// console.log('numberOfWorkingDays '+ numberOfWorkingDays);
		// console.log('isValid '+ isValid);

		$.ajax({
			type: "POST",
			dataType: "json",
			cache: false,
			url: base_url + "user/save_leave/",
			data: $('#frm_leaverequest').serialize(),
			 beforeSend: function(){
				new PNotify({
					title: 'Processing...',
					text: 'Please wait a moment',
					type: 'info',
					styling: 'bootstrap3'
				});
			},
			success: function(data){
				$('.alert-info .glyphicon-remove').trigger("click");
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
		// }).error(function(){
				// alert('Connection problems occurred...');
		});

	}else{

		new PNotify({
			title: 'Error',
			text: msg,
			type: 'danger',
			styling: 'bootstrap3'
		});

	}

	
	
	return false;
});

$('#l_from').on('blur', function(){
	if($('#l_to').val() == ''){
		$('#l_to').val($('#l_from').val());
	}else{
		if(Date.parse(l_to) < Date.parse(l_from)){
			isValid = false;
			new PNotify({
				title: 'Error',
				text: '"Date to" must be greater than or equal to "Date From"',
				type: 'danger',
				styling: 'bootstrap3'
			});
		}
	}
});


$('#l_to').on('blur', function(){
	var l_to = $('#l_to').val(),
			l_from	= $('#l_from').val();
	if(l_to == ''){
		$('#l_to').val(l_from);
	}else{
		if(Date.parse(l_to) < Date.parse(l_from)){
			isValid = false;
			new PNotify({
				title: 'Error',
				text: '<strong>"Date to"</strong> must be greater than or equal to <strong>"Date From"</strong>',
				type: 'danger',
				styling: 'bootstrap3'
			});
		}
	}
});



function calculateLeave(){

    var l_typespecify = $('#l_typespecify').val(),
        l_type = $('#l_type').val(),
        l_datefiled = $('#l_datefiled').val(),
        l_from = $('#l_from').val(),
        l_to = $('#l_to').val();
        
       
        l_noofworkingdays = document.getElementById('l_noofworkingdays');
		
	if(Date.parse(l_to) < Date.parse(l_from)){	
		isValid = false;
		msg = '<strong>"Date to"</strong> must be greater than or equal to <strong>"Date From"</strong>';
	}else{

		if(l_type == 'ALL'){
			// if(l_datefiled > l_from){
			if(Date.parse(l_datefiled) > Date.parse(l_from)){
				isSick(l_datefiled,l_to);
				// console.log('isSick');
				if(numberOfWorkingDays > 7 || numberOfWorkingDays < 1){
					isValid = false;
					msg =  'Leave must be filed within <strong>7 working days</strong> after the last day of inclusive date(s)';
				}else{
				
						isValid = true;
				}
				
			}else{
				
				isVacation(l_datefiled,l_from);
//				if(numberOfWorkingDays < 5){
//					isValid = false;
//
//					msg =  'Leave must be filed within <strong>5 working days</strong> before the first day of inclusive date(s)';
//
//				}else{
					isValid = true;
//				}

			}
			
		}else if(l_type == 'Vacation'){

			if(Date.parse(l_datefiled) < Date.parse(l_from)){
				isVacation(l_datefiled,l_from);
				if(numberOfWorkingDays < 5){
					isValid = false;
					msg =  'Leave must be filed within <strong>5 working days</strong> before the first day of inclusive date(s)';
				}else{
					isValid = true;
				}

			}else{

				isValid = false;
				msg =  'Leave must be filed within <strong>5 working days</strong> before the first day of inclusive date(s)';
			}
		 // end of checking l_type = sick	

		}else if(l_type == 'Sick'){
			if(Date.parse(l_to) < Date.parse(l_datefiled)){

				isSick(l_datefiled,l_to);

				if(numberOfWorkingDays > 7 || numberOfWorkingDays < 1){
					isValid = false;
					msg =  'Leave must be filed within <strong>7 working days</strong> after the last day of inclusive date(s)';
				}else{
					isValid = true;
				}

			}else{
				isValid = false;
					msg =  'Leave must be filed within <strong>7 working days</strong> after the last day of inclusive date(s)';

			}

		// end of checking l_type = sick

		}else{
			isValid = false;
			msg =  '<strong>Leave Type</strong> is required';

		} 

	} // end of checking l_to < l_from


    // console.log('numOfDays '+numOfDays);
	// console.log('numberOfWorkingDays '+numberOfWorkingDays);

	if(isValid == true){
		// get the total inclusive dates
		getNumberOfInclusiveDates(l_from,l_to);

		// set value of Inclusive dates
		l_noofworkingdays.value = numOfDays;
		return true;
	}else{
		return false;
	}
    

}


function getNumberOfInclusiveDates(l_from,l_to){


    var start = new Date(l_from);
    var end = new Date(l_to);
    
    start.setHours(0,0,0,0);
    end.setHours(0,0,0,0);
    var current = new Date(start);
    current.setDate(current.getDate());
    var day;
    while (current <= end) {
    var generatedDate = current.getFullYear() + '-' + ("0" + (current.getMonth() + 1)).slice(-2) + '-' + ("0" + (current.getDate())).slice(-2);
	day = current.getDay();
		// check GeneratedDate if Holiday
	if ($.inArray(generatedDate, holidays) > -1) {
		// alert('Holiday');
	}else{

		// Check if employee leave equivalent
            if(a_equivalentleaveday == '1.00'){

                    // check day if sat or sunday
                    if (day > 0 && day < 6) {
                        ++numOfDays;
                    }

            }else if(a_equivalentleaveday == '3.00'){

                if (a_deptlocation == 'CAVO' ||
                    a_deptlocation == 'CDRRMD' ||
                    a_deptlocation == 'CEED' ||
                    a_deptlocation == 'UMSD' ||
                    a_deptlocation == 'TMD') {
                        ++numOfDays;
                }else{
                    // check day if sat or sunday
                    if (day > 0 && day < 6) {
                        ++numOfDays;
                    }
                }
            }else{
                    ++numOfDays;
            }
	}
        
		current.setDate(current.getDate() + 1);
    }

}


function isVacation(l_datefiled,l_from){

	// dateFiled plus one day
	var x = new Date(l_datefiled);
		x.setDate(x.getDate() + 1);
		
	// console.log(x);

    var start = new Date(x);
	var end = new Date(l_from);
	

	// console.log(start);
	
    start.setHours(0,0,0,0);
    end.setHours(0,0,0,0);
    var current = new Date(start);
	current.setDate(current.getDate());
	
    var day;
    while (current <= end) {
		
    var generatedDate = current.getFullYear() + '-' + ("0" + (current.getMonth() + 1)).slice(-2) + '-' + ("0" + (current.getDate())).slice(-2);
	day = current.getDay();
		// check GeneratedDate if Holiday


	if ($.inArray(generatedDate, holidays) > -1) {
		if($('#l_typespecify').val()== 'ML'){
			++numberOfWorkingDays;
		}
		// alert('Holiday');
	}else{
		// Check if employee leave equivalent
            if(a_equivalentleaveday == '1.00'){
                    // check day if sat or sunday
                    if (day >= 1 && day <= 5) {
						++numberOfWorkingDays;
					}else{
						if($('#l_typespecify').val() == 'ML'){
							++numberOfWorkingDays;
						}
					}

            }else if(a_equivalentleaveday == '3.00'){

                if (a_deptlocation == 'CAVO' ||
                    a_deptlocation == 'CDRRMD' ||
                    a_deptlocation == 'CEED' ||
                    a_deptlocation == 'UMSD' ||
                    a_deptlocation == 'TMD') {
                        ++numberOfWorkingDays;
                }else{
                    // check day if sat or sunday
					if (day >= 1 && day <= 5) {
						++numberOfWorkingDays;
					}else{
						
						if($('#l_typespecify').val() == 'ML'){
							++numberOfWorkingDays;
						}
					}
                }
            }else{
                    ++numberOfWorkingDays;
            }
	}
        
		current.setDate(current.getDate() + 1);
    }
 
    
}

function isSick(l_datefiled,l_to){
    var l_typespecify = $('#l_typespecify').val();
        
//	var slstart = new Date($("#l_to").val());
//	var slend = new Date($("#l_datefiled").val());
        
    var start = new Date(l_to);
	var end = new Date(l_datefiled);
        
	var sltotalBusinessDays = 0;
            start.setHours(0,0,0,0);
            end.setHours(0,0,0,0);
	var current = new Date(start);
            current.setDate(current.getDate());
	var day;
	
        while (current <= end) {
		var generatedDate = current.getFullYear() + '-' + ("0" + (current.getMonth() + 1)).slice(-2) + '-' + ("0" + (current.getDate())).slice(-2);
		day = current.getDay();
		// check GeneratedDate if Holiday
		if ($.inArray(generatedDate, holidays) > -1) {

			if($('#l_typespecify').val()== 'ML'){
				++numberOfWorkingDays;
			}
                     // alert('Holiday');
                     
		}else{
                    // Check if employee leave equivalent
                    if(a_equivalentleaveday == '1.00'){
						// check day if sat or sunday
						if (day >= 1 && day <= 5) {
							++numberOfWorkingDays;
						}else{
							if($('#l_typespecify').val() == 'ML'){
								++numberOfWorkingDays;
							}
						}
                        
                    }else if(a_equivalentleaveday == '3.00'){

                            if (a_deptlocation == 'CAVO' ||
                                a_deptlocation == 'CDRRMD' ||
                                a_deptlocation == 'CEED' ||
                                a_deptlocation == 'UMSD' ||
                                a_deptlocation == 'TMD') {
                            
                                ++numberOfWorkingDays;
                                
                            }else{
                                // check day if sat or sunday
                                if (day >= 1 && day <= 5) {
                                    ++numberOfWorkingDays;
                                }else{
                                    
									if($('#l_typespecify').val() == 'ML'){
										++numberOfWorkingDays;
									}
								}
                            }
                            
                    }else{
			++numberOfWorkingDays;
                    }
                    
		}
            current.setDate(current.getDate() + 1);
       }

    
}


$('#jm_reqnature').on('change', function(){
	if($('#jm_reqnature').val() == '1'){
		$('#request #specific #jm_reqnature_specific').detach();
		$('#request #specific').append('<input type="text" class="form-control numeric" id="jm_reqnature_specific" name="jm_reqnature_specific" placeholder="Number only" required="required"> ');
	}else if($('#jm_reqnature').val() == '2'){
		$('#request #specific #jm_reqnature_specific').detach();
		$('#request #specific').append('<select id="jm_reqnature_specific" name="jm_reqnature_specific" class="form-control" required="required" ><option >-- Choose --</option><option value="Resignation">Resignation</option><option value="End of Contract">End of Contract</option><option value="Vacancy">Vacancy</option></select>');
	}else if($('#jm_reqnature').val() == '3'){
		$('#request #specific #jm_reqnature_specific').detach();
		$('#request #specific').append('<input type="text" class="form-control" id="jm_reqnature_specific" name="jm_reqnature_specific" placeholder="Specify"  required="required">');
	}
});




// $(document).ready(function() {
    // $("#frm_personnelrequest #jm_course").append(courses);
// });
// $(function() {
    // $("#frm_personnelrequest #jm_course").append(courses);
// });

// $.each(items, function (i, item) {
    // $('#frm_personnelrequest #jm_course').append($('<option>', {
        // value: item.value,
        // text : item.text
    // }));
// });


$.getJSON(base_url + "onlineapplicant/ajax_get_course/", function(data) {
	$.each(data, function(index, item) {
		$("#frm_personnelrequest #jm_course").append('<option value="'+item.c_name+'">'+item.c_name+'</option>');
	});
});

$.getJSON(base_url + "onlineapplicant/ajax_get_vacancy/", function(data) {
				$.each(data, function(index, item) {
						$("#jm_position").append("<option value='"+item.v_position+"'>"+item.v_position+"</option>");
				});
			});

// $( window ).on( "load", $("#frm_personnelrequest #jm_course").append(courses););
// $('#frm_personnelrequest #jm_course').append($(courses));


$('#frm_personnelrequest').on('submit', function(){

	// var education = {
		// educ : $('select#jm_course').val()
		// data : $('#frm_personnelrequest').serialize()
	// }

	// var educ =  $('select#jm_course').val();
	// alert($('#frm_personnelrequest #jm_course').val());
	// $('select#my_multiselect').val()
	// alert($('select#jm_course').val());
	// alert($('#frm_personnelrequest').serialize());



	// alert($('#jm_position').val());
	var frm_personnelrequest = {
		jm_office 			: $('#jm_office').val(),
		jm_officehead 		: $('#jm_officehead').val(),
		jm_project	 		: $('#jm_project').val(),
		jm_dateneeded 		: $('#jm_dateneeded').val(),
		jm_projectduration 	: $('#jm_projectduration').val(),
		jm_reqnature 		: $('#jm_reqnature').val(),
		jm_reqnature_specific : $('#jm_reqnature_specific').val(),
		jm_justification 	: $('#jm_justification').val(),
		jm_emp_status 		: $('#jm_emp_status').val(),
		jm_position 		: $('#jm_position').val(),
		jm_desc 			: $('#jm_desc').val(),
		educ 				:  $('select#jm_course').val(),
		jm_eligibility 		: $('#jm_eligibility').val(),
		jm_training 		: $('#jm_training').val(),
		jm_experience 		: $('#jm_experience').val(),
		jm_skills 			: $('#jm_skills').val(),
		jm_gender 			: $('#jm_gender').val(),
		jm_postgrad 		: $('#jm_postgrad').val(),
	}
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "user/save_personnelrequest/",
		// data: $('#frm_personnelrequest').serialize() + '&&' + educ,
		data: frm_personnelrequest,
		beforeSend : function(){

			new PNotify({
                        title: 'Please wait...',
                        text: 'Processing...',
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
				setTimeout(function(){
						window.location.href = base_url + 'user/listofpersonnelrequest';
					}, 2000);
				$('#frm_personnelrequest')[0].reset();
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


var dt_personnelrequestlist = $('#dt_personnelrequestlist').DataTable( {
    "ajax": {
        "url": base_url + "user/ajax_get_personnelrequestlist",
        "dataSrc": ""
		},
        "columns": [

			{ "data": function (data, type, row, meta) {
						if(data.jm_prefix != null){
							return data.jm_prefix+'-'+data.jm_suffix;
						}else{
							return '';
						}

					}
			},
			{ "data": "jm_office" },
            { "data": "jm_project" },
            { "data": "jm_projectduration"},
			{ "data": "jm_course" },
            { "data": "jm_position" },
			{ "data": "jm_emp_status" },
			{ "data": function (data, type, row, meta) {
						if(data.jm_iscancel == 'NO' && data.jm_hrhead == 'Pending'){
							return '<a class="fa fa-remove" data-toggle="modal" data-target="#modal_cancelrequest" data-id="'+data.jm_id+'" ></a>';
						}else if(data.jm_iscancel == 'NO' && data.jm_hrhead == 'Approved'){
							return '<i class="green"> Approved</i>';
						}else if(data.jm_iscancel == 'YES'){
							return '<i class="red"> Cancelled</i>';
						}else if(data.jm_iscancel == 'NO' && data.jm_hrhead == 'Disapproved'){
							return '<i class="red"> Disapproved</i>';
						}

					}
			}
		],
		dom: '<"wrapper"Bfit>',
		buttons: [ { extend: 'excelHtml5',
					customize: function( xlsx ) {
					var sheet = xlsx.xl.worksheets['sheet1.xml'];
							$('row c[r^="C"]', sheet).attr( 's', '2' );
						}
					},
					{ 	extend: 'print',
						exportOptions: {
							columns: []
						},
					},
		],
    	deferRender: true,
        scrollY: 380,
        scrollCollapse: true,
        scroller: true,
    	scrollX: true,
        fixedColumns:   {
            // leftColumns: 1,
            rightColumns: 1
        },
        autoWidth: false,
        //stateSave: true
  });


	$('#modal_cancelrequest').on('show.bs.modal', function(e) {
		$('#modal_cancelrequest #m_jm_id').val($(e.relatedTarget).data('id'));
	});




$('#frm_cancelrequest').on('submit', function(){

	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "user/cancel_personnelrequest/",
		data: $('#frm_cancelrequest').serialize(),
		beforeSend : function(){
			new PNotify({
                        title: 'Please wait...',
                        text: 'Processing...',
                        type: 'info',
                        styling: 'bootstrap3'
                    });
		},
		success: function(data){
			$('.alert-info .glyphicon-remove').trigger("click");
				if(data.status == 'yes'){
				 	new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
				dt_personnelrequestlist.ajax.reload();

				$('#modal_cancelrequest').modal('hide');
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

