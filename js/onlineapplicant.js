function validateEmail(emailField){
		new PNotify({
				title: 'Please wait...',
				text: 'validating email.',
				type: 'info',
				styling: 'bootstrap3'
			});
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    if (reg.test(emailField.value) == false)
    {
        // alert('Invalid Email Address');
		$('.alert-info .glyphicon-remove').trigger("click");
		$('.alert-warning .glyphicon-remove').trigger("click");
		$('.alert-success .glyphicon-remove').trigger("click");
		new PNotify({
				title: 'Warning!',
				text: 'Invalid Email!',
				type: 'warning',
				styling: 'bootstrap3'
			});

			$('#oa_fname').attr('disabled', 'disabled');
			$('#oa_mname').attr('disabled', 'disabled');
			$('#oa_lname').attr('disabled', 'disabled');
			$('#oa_extname').attr('disabled', 'disabled');
			$('#oa_gender').attr('disabled', 'disabled');
			$('#oa_province').attr('disabled', 'disabled');
			$('#oa_city').attr('disabled', 'disabled');

			$('#oa_brgy').attr('disabled', 'disabled');
			$('#oa_street').attr('disabled', 'disabled');
			$('#oa_bdate').attr('disabled', 'disabled');
			$('#oa_course').attr('disabled', 'disabled');
			$('#oa_educremarks').attr('disabled', 'disabled');
			$('#oa_eligibility').attr('disabled', 'disabled');
			$('#oa_school').attr('disabled', 'disabled');
			$('#oa_postgraduate').attr('disabled', 'disabled');
			$('#oa_postgraduateremarks').attr('disabled', 'disabled');
			$('#oa_mobile').attr('disabled', 'disabled');
			$('#oa_recwork').attr('disabled', 'disabled');
			$('#oa_rectraining').attr('disabled', 'disabled');
			$('#oa_skills').attr('disabled', 'disabled');
			$('#oa_awards').attr('disabled', 'disabled');
			$('#oa_date').attr('disabled', 'disabled');
			$('#btn_encodeapplicant').attr('disabled', 'disabled');

            return false;
    }else{

		var oa_email = $('#oa_email').val();
		// alert(oa_email);

		if(oa_email.length != 0 || oa_email > 0){
			var xhr = new XMLHttpRequest();
			 xhr.open("GET", base_url + "onlineapplicant/ajax_check_oa_email/?oa_email=" + oa_email, true);
			 xhr.onreadystatechange = function() {

				 new PNotify({
						title: 'Please wait...',
						text: 'Checking database.',
						type: 'info',
						styling: 'bootstrap3'
					});

			   if (this.readyState == 4 && this.status == 200) {
					var myarr = JSON.parse(this.responseText);

					if(myarr.status == 'yes'){
						$('.alert-info .glyphicon-remove').trigger("click");
						$('.alert-warning .glyphicon-remove').trigger("click");
						$('.alert-success .glyphicon-remove').trigger("click");

						new PNotify({
							title: 'Email exist',
							text: myarr.content,
							type: 'warning',
							styling: 'bootstrap3'
						});


						$('#oa_fname').attr('disabled', 'disabled');
						$('#oa_mname').attr('disabled', 'disabled');
						$('#oa_lname').attr('disabled', 'disabled');
						$('#oa_extname').attr('disabled', 'disabled');
						$('#oa_gender').attr('disabled', 'disabled');
						$('#oa_province').attr('disabled', 'disabled');
						$('#oa_city').attr('disabled', 'disabled');

						$('#oa_brgy').attr('disabled', 'disabled');
						$('#oa_street').attr('disabled', 'disabled');
						$('#oa_bdate').attr('disabled', 'disabled');
						$('#oa_course').attr('disabled', 'disabled');
						$('#oa_educremarks').attr('disabled', 'disabled');
						$('#oa_eligibility').attr('disabled', 'disabled');
						$('#oa_school').attr('disabled', 'disabled');
						$('#oa_postgraduate').attr('disabled', 'disabled');
						$('#oa_postgraduateremarks').attr('disabled', 'disabled');
						$('#oa_mobile').attr('disabled', 'disabled');
						$('#oa_recwork').attr('disabled', 'disabled');
						$('#oa_rectraining').attr('disabled', 'disabled');
						$('#oa_skills').attr('disabled', 'disabled');
						$('#oa_awards').attr('disabled', 'disabled');
						$('#oa_date').attr('disabled', 'disabled');
						$('#btn_encodeapplicant').attr('disabled', 'disabled');

					}else if(myarr.status == 'no') {
						$('.alert-info .glyphicon-remove').trigger("click");
						$('.alert-success .glyphicon-remove').trigger("click");
						$('.alert-warning .glyphicon-remove').trigger("click");

						new PNotify({
							title: 'Valid email!',
							text: myarr.content,
							type: 'success',
							styling: 'bootstrap3'
						});

						$('#oa_fname').removeAttr('disabled', 'disabled');
						$('#oa_mname').removeAttr('disabled', 'disabled');
						$('#oa_lname').removeAttr('disabled', 'disabled');
						$('#oa_extname').removeAttr('disabled', 'disabled');
						$('#oa_gender').removeAttr('disabled', 'disabled');
						$('#oa_province').removeAttr('disabled', 'disabled');
						$('#oa_city').removeAttr('disabled', 'disabled');

						$('#oa_brgy').removeAttr('disabled', 'disabled');
						$('#oa_street').removeAttr('disabled', 'disabled');
						$('#oa_bdate').removeAttr('disabled', 'disabled');
						$('#oa_course').removeAttr('disabled', 'disabled');
						$('#oa_educremarks').removeAttr('disabled', 'disabled');
						$('#oa_eligibility').removeAttr('disabled', 'disabled');
						$('#oa_school').removeAttr('disabled', 'disabled');
						$('#oa_postgraduate').removeAttr('disabled', 'disabled');
						$('#oa_postgraduateremarks').removeAttr('disabled', 'disabled');
						$('#oa_mobile').removeAttr('disabled', 'disabled');
						$('#oa_recwork').removeAttr('disabled', 'disabled');
						$('#oa_rectraining').removeAttr('disabled', 'disabled');
						$('#oa_skills').removeAttr('disabled', 'disabled');
						$('#oa_awards').removeAttr('disabled', 'disabled');
						$('#oa_date').removeAttr('disabled', 'disabled');
						$('#btn_encodeapplicant').removeAttr('disabled', 'disabled');


					}else{

						$('#oa_fname').attr('disabled', 'disabled');
						$('#oa_mname').attr('disabled', 'disabled');
						$('#oa_lname').attr('disabled', 'disabled');
						$('#oa_extname').attr('disabled', 'disabled');
						$('#oa_gender').attr('disabled', 'disabled');
						$('#oa_province').attr('disabled', 'disabled');
						$('#oa_city').attr('disabled', 'disabled');

						$('#oa_brgy').attr('disabled', 'disabled');
						$('#oa_street').attr('disabled', 'disabled');
						$('#oa_bdate').attr('disabled', 'disabled');
						$('#oa_course').attr('disabled', 'disabled');
						$('#oa_educremarks').attr('disabled', 'disabled');
						$('#oa_eligibility').attr('disabled', 'disabled');
						$('#oa_school').attr('disabled', 'disabled');
						$('#oa_postgraduate').attr('disabled', 'disabled');
						$('#oa_postgraduateremarks').attr('disabled', 'disabled');
						$('#oa_mobile').attr('disabled', 'disabled');
						$('#oa_recwork').attr('disabled', 'disabled');
						$('#oa_rectraining').attr('disabled', 'disabled');
						$('#oa_skills').attr('disabled', 'disabled');
						$('#oa_awards').attr('disabled', 'disabled');
						$('#oa_date').attr('disabled', 'disabled');
						$('#btn_encodeapplicant').attr('disabled', 'disabled');

						$('.alert-info .glyphicon-remove').trigger("click");
						$('.alert-warning .glyphicon-remove').trigger("click");
						$('.alert-success .glyphicon-remove').trigger("click");

						new PNotify({
							title: 'Something went wrong!',
							text: 'Kindly contact system developer. <br/> Thank you!',
							type: 'error',
							styling: 'bootstrap3'
						});
					}

			   }
			 }
			 xhr.send();

		}else{
			$('.alert-info .glyphicon-remove').trigger("click");
			$('.alert-warning .glyphicon-remove').trigger("click");
			$('.alert-success .glyphicon-remove').trigger("click");
			new PNotify({
				title: 'Warning!',
				text: 'Please fill out email!',
				type: 'warning',
				styling: 'bootstrap3'
			});
		}

	}

    // return true;

}



// $('#oa_email').on('blur', function(){


	// var oa_email = $('#oa_email').val();

	// alert(oa_email);

	// if(oa_email.length != 0 || oa_email > 0){
		// var xhr = new XMLHttpRequest();
		 // xhr.open("GET", base_url + "onlineapplicant/ajax_check_oa_email/?oa_email=" + oa_email, true);
		 // xhr.onreadystatechange = function() {
		   // if (this.readyState == 4 && this.status == 200) {
				// var myarr = JSON.parse(this.responseText);

				// if(myarr.status == 'yes'){

					// $('.alert-success .glyphicon-remove').trigger("click");

					// new PNotify({
						// title: 'Email exist',
						// text: myarr.content,
						// type: 'warning',
						// styling: 'bootstrap3'
					// });


					// $('#oa_fname').attr('disabled', 'disabled');
					// $('#oa_mname').attr('disabled', 'disabled');
					// $('#oa_lname').attr('disabled', 'disabled');
					// $('#oa_extname').attr('disabled', 'disabled');
					// $('#oa_gender').attr('disabled', 'disabled');
					// $('#oa_province').attr('disabled', 'disabled');
					// $('#oa_city').attr('disabled', 'disabled');

					// $('#oa_brgy').attr('disabled', 'disabled');
					// $('#oa_street').attr('disabled', 'disabled');
					// $('#oa_bdate').attr('disabled', 'disabled');
					// $('#oa_course').attr('disabled', 'disabled');
					// $('#oa_educremarks').attr('disabled', 'disabled');
					// $('#oa_eligibility').attr('disabled', 'disabled');
					// $('#oa_school').attr('disabled', 'disabled');
					// $('#oa_postgraduate').attr('disabled', 'disabled');
					// $('#oa_postgraduateremarks').attr('disabled', 'disabled');
					// $('#oa_mobile').attr('disabled', 'disabled');
					// $('#oa_recwork').attr('disabled', 'disabled');
					// $('#oa_rectraining').attr('disabled', 'disabled');
					// $('#oa_skills').attr('disabled', 'disabled');
					// $('#oa_awards').attr('disabled', 'disabled');
					// $('#btn_encodeapplicant').attr('disabled', 'disabled');

				// }else if(myarr.status == 'no') {
					// $('.alert-warning .glyphicon-remove').trigger("click");
					// new PNotify({
						// title: 'Valid email!',
						// text: myarr.content,
						// type: 'success',
						// styling: 'bootstrap3'
					// });

					// $('#oa_fname').removeAttr('disabled', 'disabled');
					// $('#oa_mname').removeAttr('disabled', 'disabled');
					// $('#oa_lname').removeAttr('disabled', 'disabled');
					// $('#oa_extname').removeAttr('disabled', 'disabled');
					// $('#oa_gender').removeAttr('disabled', 'disabled');
					// $('#oa_province').removeAttr('disabled', 'disabled');
					// $('#oa_city').removeAttr('disabled', 'disabled');

					// $('#oa_brgy').removeAttr('disabled', 'disabled');
					// $('#oa_street').removeAttr('disabled', 'disabled');
					// $('#oa_bdate').removeAttr('disabled', 'disabled');
					// $('#oa_course').removeAttr('disabled', 'disabled');
					// $('#oa_educremarks').removeAttr('disabled', 'disabled');
					// $('#oa_eligibility').removeAttr('disabled', 'disabled');
					// $('#oa_school').removeAttr('disabled', 'disabled');
					// $('#oa_postgraduate').removeAttr('disabled', 'disabled');
					// $('#oa_postgraduateremarks').removeAttr('disabled', 'disabled');
					// $('#oa_mobile').removeAttr('disabled', 'disabled');
					// $('#oa_recwork').removeAttr('disabled', 'disabled');
					// $('#oa_rectraining').removeAttr('disabled', 'disabled');
					// $('#oa_skills').removeAttr('disabled', 'disabled');
					// $('#oa_awards').removeAttr('disabled', 'disabled');
					// $('#btn_encodeapplicant').removeAttr('disabled', 'disabled');


				// }else{
					// new PNotify({
						// title: 'Something went wrong!',
						// text: 'Kindly contact system developer. <br/> Thank you!',
						// type: 'error',
						// styling: 'bootstrap3'
					// });
				// }

		   // }
		 // }
		 // xhr.send();
	// }else{
		// new PNotify({
			// title: 'Warning!',
			// text: 'Please fill out email!',
			// type: 'warning',
			// styling: 'bootstrap3'
		// });
	// }






// });

$(window).bind("load", function() {
    $('#takeaphoto').addClass('modal');
});
function printContent(el){
    var restorepage = document.body.innerHTML;
    var printContent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = restorepage;
}
$(function() {
// get job vacancies
	$.getJSON(base_url + "onlineapplicant/ajax_get_vacancy/", function(data) {
				$.each(data, function(index, item) {
						$("#col6_filter, #jm_position").append("<option value='"+item.v_position+"'>"+item.v_position+"</option>");
				});
			});

	$.getJSON(base_url + "onlineapplicant/ajax_get_brgy/", function(data) {
				$.each(data, function(index, item) {
						$("#col13_filter").append("<option value='"+item.b_name+"'>"+item.b_name+"</option>");
				});
			});

	$.getJSON(base_url + "onlineapplicant/ajax_get_province/", function(data) {
				$.each(data, function(index, item) {
						$("#oa_province").append("<option value='"+item.p_id+"'>"+item.p_name+"</option>");
				});
			});

	$.getJSON(base_url + "onlineapplicant/ajax_get_offices/", function(data) {
				$.each(data, function(index, item) {
						$("#jm_office").append("<option value='"+item.office+"'>"+item.office+"</option>");
				});
			});


	$.getJSON(base_url + "onlineapplicant/ajax_get_course_category/", function(data) {
		// alert('asdasd');
			$.each(data, function(index, item) {
					$("#frm_jobmatch #jm_category").append("<option value='"+item.category+"'>"+item.category+"</option>");
			});
	});

	$.getJSON(base_url + "onlineapplicant/ajax_get_course/", function(data) {
	// alert('asdasd');
		$.each(data, function(index, item) {
			$("#filter_col10 #col9_filter, #frm_jobmatch #jm_course, #frm_encodeapplicant #oa_course").append("<option value='"+item.c_name+"'>"+item.c_name+"</option>");
		});
		});
});
$('input[type=checkbox]').on('change', function (e) {
    if ($('input[type=checkbox]:checked').length > 5) {
        $(this).prop('checked', false);
        // alert("allowed only 5");
		$('.alert-error .glyphicon-remove').trigger("click");
		 new PNotify({
                    title: 'Warning',
                    text: 'You are only allowed to choose maximum of 5 position.',
                    type: 'error',
                    styling: 'bootstrap3'
                });
		// $('input[type=checkbox]').attr('disabled','disabled');
    }
});

$('#oa_province').on('change', function(){
	$("#oa_city").empty();
	$.getJSON(base_url + "onlineapplicant/ajax_get_city/"+ $('#oa_province').val(), function(data) {
		$.each(data, function(index, item) {
			$("#oa_city").append("<option value='"+item.c_id+"'>"+item.c_name+"</option>");
		});
	});
});

$('#editappinfo #oa_province').on('change', function(){
	$("#editappinfo #oa_city").empty();
	$.getJSON(base_url + "onlineapplicant/ajax_get_city/"+ $('#editappinfo #oa_province').val(), function(data) {
		$.each(data, function(index, item) {
			$("#editappinfo #oa_city").append("<option value='"+item.c_id+"'>"+item.c_name+"</option>");
		});
	});
});


$('#oa_city').on('change', function(){
	var city = $('#oa_city').val();
	// alert(city);
	if(city == '3'){

		$('div #oa_brgy').detach();
		$("div .brgy").append("<select class='form-control' id='oa_brgy' name='oa_brgy'></select>");
		$.getJSON(base_url + "onlineapplicant/ajax_get_brgys/"+ city, function(data) {
			$.each(data, function(index, item) {
				$("#oa_brgy").append("<option value='"+item.b_id+"'>"+item.b_name+"</option>");
			});
		});
	}else{
		$('.brgy #oa_brgy').detach();
		$("div .brgy").append("<input type='text' class='form-control' id='oa_brgy' name='oa_brgy'>");
	}
});





$('#editappinfo #oa_city').on('change', function(){
	var city = $('#editappinfo #oa_city').val();
	// alert(city);
	if(city == '3'){

		$('#editappinfo div #oa_brgy').detach();
		$("#editappinfo div .brgy").append("<select class='form-control' id='oa_brgy' name='oa_brgy'></select>");
		$.getJSON(base_url + "onlineapplicant/ajax_get_brgys/"+ city, function(data) {
			$.each(data, function(index, item) {
				$("#editappinfo #oa_brgy").append("<option value='"+item.b_id+"'>"+item.b_name+"</option>");
			});
		});
	}else{
		$('#editappinfo .brgy #oa_brgy').detach();
		$("#editappinfo div .brgy").append("<input type='text' class='form-control' id='oa_brgy' name='oa_brgy'>");
	}


});

$('#frm_jobmatch #jm_category').on('change',function(){
if($('#frm_jobmatch #jm_category').val() != ' ' || $('#frm_jobmatch #jm_category').val() != null){
		$('#frm_jobmatch #jm_course').val('');
	}
});

$('#frm_jobmatch #jm_course').on('change',function(){
	if($('#frm_jobmatch #jm_course').val() != ' ' || $('#frm_jobmatch #jm_course').val() != null){
		$('#frm_jobmatch #jm_category').val('');
	}

});

$('input.column_filter').on('keyup click', function() {
    filterColumn($(this).parents('div').attr('data-column'));
    filterColumn_forexam($(this).parents('div').attr('data-column'));
    filterColumn_forfiling($(this).parents('div').attr('data-column'));
    filterColumn_forforward($(this).parents('div').attr('data-column'));
    filterColumn_forregret($(this).parents('div').attr('data-column'));
});

$('select.column_filter').change(function() {
    filterColumn($(this).parents('div').attr('data-column'));
    filterColumn_forexam($(this).parents('div').attr('data-column'));
    filterColumn_forfiling($(this).parents('div').attr('data-column'));
    filterColumn_forforward($(this).parents('div').attr('data-column'));
    filterColumn_forregret($(this).parents('div').attr('data-column'));
 //   filterColumn_foraction($(this).parents('div').attr('data-column'));
});

$('#ah_status').change(function() {

  $('#dt_onlineapplicantforaction').dataTable().fnDestroy();
$('#dt_onlineapplicantforaction').DataTable({

    "ajax": {
        "url": base_url + "onlineapplicant/ajax_get_application_foraction_bystatus/" + $('#ah_status').val(),
        "dataSrc": ""
    },

    "columns": [

	  { "data": function(data, type, row, meta) {
			if(data.ah_status == 'Pending'){
				return '<center><input type="checkbox" value="' + data.ah_id + '" id="ah_id" name="ah_id"></center>';
			}else{
			  return '';
			}
            }
        }, // 1

        { "data": "oa_num" },
		 // { "data": "oa_name" },
		 	{ "data": function(data, type, row, meta) {
                return '<a href="#" data-toggle="modal" data-target="#mdl_appinfo" data-oa_id="' + data.oa_id + '" data-name="' + data.oa_name + '">' + data.oa_name + '</a>';
            }
        }, //3
		{ "data": "oa_positionapplied" },
		{ "data": "ah_remarks" },
			{ "data": function(data, type, row, meta) {
                return '<a href="#" data-toggle="modal" data-target="#mdl_applicationhistory" data-oa_id="' + data.oa_id + '" data-name="' + data.oa_name + '"><i class="fa fa-eye"></i> View</a>';
            }
        }, //3
		{ "data": "ah_status" },
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
    deferRender: true,
    scrollY: 380,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,

    oScroller: {
      rowHeight: 30
    }

});
});
// function filterColumn_foraction(i) {
		// alert(i);
   // $('#dt_onlineapplicantforaction').DataTable().column(i).search(
   //     $('#col' + i + '_filter').val(),
   //     $('#col' + i + '_regex').prop('checked'),
   //     $('#col' + i + '_smart').prop('checked')
   // ).draw();
//}
function filterColumn(i) {
		// alert(i);
    $('#dt_onlineapplicant').DataTable().column(i).search(
        $('#col' + i + '_filter').val(),
        $('#col' + i + '_regex').prop('checked'),
        $('#col' + i + '_smart').prop('checked')
    ).draw();
}
function filterColumn_forexam(i) {
		// alert(i);
    $('#dt_onlineapplicant_forexam').DataTable().column(i).search(
        $('#col' + i + '_filter').val(),
        $('#col' + i + '_regex').prop('checked'),
        $('#col' + i + '_smart').prop('checked')
    ).draw();
}
function filterColumn_forfiling(i) {
		// alert(i);
    $('#dt_onlineapplicant_forfiling').DataTable().column(i).search(
        $('#col' + i + '_filter').val(),
        $('#col' + i + '_regex').prop('checked'),
        $('#col' + i + '_smart').prop('checked')
    ).draw();
}
function filterColumn_forforward(i) {
		// alert(i);
    $('#dt_onlineapplicant_forforward').DataTable().column(i).search(
        $('#col' + i + '_filter').val(),
        $('#col' + i + '_regex').prop('checked'),
        $('#col' + i + '_smart').prop('checked')
    ).draw();
}
function filterColumn_forregret(i) {
		// alert(i);
    $('#dt_onlineapplicant_forregret').DataTable().column(i).search(
        $('#col' + i + '_filter').val(),
        $('#col' + i + '_regex').prop('checked'),
        $('#col' + i + '_smart').prop('checked')
    ).draw();
}




function filterReset() {
    $('#col7_filter').val('');
    // $('#col8_filter').val('yes');
    dt_onlineapplicant.search('').columns().search('').draw();
    filterColumn($('#col7_filter').parents('div').attr('data-column'));
}

var dt_requestingoffice = $('#dt_requestingoffice').DataTable({

    "ajax": {
        "url": base_url + "onlineapplicant/ajax_get_jobmatching",
        "dataSrc": ""
    },

		createdRow: function( row, data, dataIndex ) {
			$(row).find('td').attr('data-jm_id', data.jm_id);
			$(row).find('td').attr('data-rnum', data.rnum);
			$(row).find('td').attr('data-jm_office', data.jm_office);
			$(row).find('td').attr('data-jm_position', data.jm_position);
			$(row).find('td').attr('data-jm_desc', data.jm_desc);
			$(row).find('td').attr('data-jm_category', data.jm_category);
			$(row).find('td').attr('data-jm_course', data.jm_course);
			$(row).find('td').attr('data-jm_eligibility', data.jm_eligibility);
			$(row).find('td').attr('data-jm_gender', data.jm_gender);
			$(row).find('td').attr('data-jm_reqdate', data.jm_reqdate);
			$(row).find('td').attr('data-jm_postgrad', data.jm_postgrad);
		},

    "columns": [

		{ "data": "rnum" }, // 4
		{ "data": "jm_office" } // 5


    ],
    dom: '<"wrapper"Bfit>',
    buttons: [{
            extend: 'excelHtml5',
			className: 'green',
			 'text': '<i class="fa fa-download"></i>',
            customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('row c[r^="C"]', sheet).attr('s', '2');

            }
        },

    ],
    columnDefs: [{
       // targets: [],
        visible: false,
        searchable: true,
    }, ],
    deferRender: true,
    scrollY: 250,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,
  //  fixedColumns: {
     //   leftColumns: 1
        // rightColumns: 8
   // },

    oScroller: {
      rowHeight: 30
    }
    //autoWidth: false,
    //stateSave: true
});

$('#dt_requestingoffice tbody').on('click', 'td', function () {
   var jm_id = $(this).data('jm_id');
   $('#frm_jobmatch #jm_id').val($(this).data('jm_id'));
   $('#frm_jobmatch #requestnumber').val($(this).data('rnum'));
   $('#frm_jobmatch #jm_office').val($(this).data('jm_office'));
   $('#frm_jobmatch #jm_desc').val($(this).data('jm_desc'));
   $('#frm_jobmatch #jm_position').val($(this).data('jm_position'));
   $('#frm_jobmatch #jm_course').val($(this).data('jm_course'));
   $('#frm_jobmatch #jm_category').val($(this).data('jm_category'));
   $('#frm_jobmatch #jm_eligibility').val($(this).data('jm_eligibility'));
   $('#frm_jobmatch #jm_gender').val($(this).data('jm_gender'));
   $('#frm_jobmatch #jm_reqdate').val($(this).data('jm_reqdate'));
   $('#frm_jobmatch #jm_postgrad').val($(this).data('jm_postgrad'));

	candidates(jm_id);
});

// $('#dt_requestingoffice tbody').on('click', 'td', function () {
 //  var jm_id = $(this).data('jm_id');
//   $('#frm_jobmatch #jm_id').val($(this).data('jm_id'));
//   $('#frm_jobmatch #requestnumber').val($(this).data('rnum'));
 //  $('#frm_jobmatch #jm_office').val($(this).data('jm_office'));
 //  $('#frm_jobmatch #jm_desc').val($(this).data('jm_desc'));
 //  $('#frm_jobmatch #jm_position').val($(this).data('jm_position'));
//   $('#frm_jobmatch #jm_course').val($(this).data('jm_course'));
 //  $('#frm_jobmatch #jm_category').val($(this).data('jm_category'));
//   $('#frm_jobmatch #jm_eligibility').val($(this).data('jm_eligibility'));
//   $('#frm_jobmatch #jm_gender').val($(this).data('jm_gender'));
//   $('#frm_jobmatch #jm_reqdate').val($(this).data('jm_reqdate'));

//	candidates(jm_id);
// });

$('#dt_candidates').DataTable();

function candidates(jm_id){

$('#dt_candidates').dataTable().fnDestroy();
$('#dt_candidates').DataTable({

    "ajax": {
        "url": base_url + "onlineapplicant/ajax_get_candidate/" + jm_id,
        "dataSrc": ""
    },

		// createdRow: function( row, data, dataIndex ) {
			// $(row).find('td').attr('data-jm_id', data.jm_id);
			// $(row).find('td').attr('data-rnum', data.rnum);
			// $(row).find('td').attr('data-jm_office', data.jm_office);
			// $(row).find('td').attr('data-jm_position', data.jm_position);
			// $(row).find('td').attr('data-jm_course', data.jm_course);
			// $(row).find('td').attr('data-jm_eligibility', data.jm_eligibility);
			// $(row).find('td').attr('data-jm_gender', data.jm_gender);
			// $(row).find('td').attr('data-jm_reqdate', data.jm_reqdate);
		// },

    "columns": [
		{ "data": function(data, type, row, meta) {

				return '<center><input type="checkbox" value="' + data.oa_id + '" id="oa_id" name="oa_id"></center>';

            }
        }, // 1
		// { "data": "appnum" }, // 4
		{ "data": function(data, type, row, meta) {
                return '<a target="_blank" href="'+base_url+'onlineapplicant/applicant_details/'+data.oa_id+'">' + data.appnum + '</a>';
            }
        },
		// { "data": "name" }, // 5
			{ "data": function(data, type, row, meta) {
                return '<a href="#" data-toggle="modal" data-target="#mdl_appinfo" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '">' + data.name + '</a>';
            }
        }, //3
		{ "data": "oa_course" }, // 5
		{ "data": "oa_eligibility" },
		{ "data": "ah_remarks" },
		{ "data": "ah_status" },
		{ "data": function(data, type, row, meta) {

				var cls = "red";
				var tst = "#mdl_addresult";
			if(data.ah_remarks == 'For Exam and Interview' && data.ah_status == 'Approved'){
				var modal = '#mdl_sendemailforexam_individual';
				var cls = "green";
			}else if(data.ah_remarks == 'For Job Interview' && data.ah_status == 'Approved'){
				var modal = '#mdl_forjobinterview';
				var cls = "green";
			}else if(data.ah_remarks == 'For Filing' && data.ah_status == 'Approved'){
				var modal = '#mdl_forfilling_individual';
				var cls = "green";
			}else if(data.ah_remarks == 'Forward to CESD' && data.ah_status == 'Approved'){
				var modal = '#mdl_forforward_individual';
				var cls = "green";
			}else if(data.ah_remarks == 'For Regret' && data.ah_status == 'Approved') {
				var modal = '#mdl_forregret_individual';
				var cls = "green";
				var tst = "#NOMADAL";
			}

			return '<center><a href="" data-toggle="modal" data-target="#editappinfo" data-oa_id="' + data.oa_id + '"> <i class="fa fa-pencil"></i></a>  | <a href="" data-toggle="modal" data-target="#mdl_addapplicationhistory" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '"> <i class="fa fa-plus"></i></a> | <a href="" data-toggle="modal" data-target="#mdl_recform" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '"> <i class="fa fa-print"> </i></a> | <a href="" data-toggle="modal" data-target="#mdl_applicationhistory" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '"> <i class="fa fa-eye"> </i> </a>| <a href=""  data-toggle="modal" data-target="'+modal+'" data-ah_id="' + data.ah_id + '" data-name="' + data.name + '"> <i class="fa fa-envelope-o '+cls+'"> </i> </a>| <a href=""  data-toggle="modal" data-target="'+tst+'" data-ah_id="' + data.ah_id + '" data-name="' + data.name + '" data-ah_remarks="' + data.ah_remarks + '"> <i class="fa fa-file-text"> </i> </a></center>';
			}
		},
		{ "data": function(data, type, row, meta) {
			if(data.ah_emailsent == null){
				return '<strong class="red"> No Email Sent</strong>';
			}else{
				return '<strong class="green">'+ data.ah_emailsent +'</strong>';
			}

			}
		},

		{ "data": "ah_remarks_status" },
		{ "data": "ah_remarksdate" }


    ],
    dom: '<"wrapper"Bfit>',
    buttons: [{
            extend: 'excelHtml5',
			className: 'green',
			 'text': '<i class="fa fa-download"></i>',
            customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('row c[r^="C"]', sheet).attr('s', '2');

            }
        },
		// {
			// className: 'green',
			 // 'text': '<i data-toggle="modal" data-target="#mdl_sendemailforexam" class="fa fa-envelope-o"></i>',
        // },
		{
			className: 'green',
			 'text': '<i data-toggle="modal" data-target="#mdl_application" class="fa fa-file-o" title="Add Application"></i>',
        },

    ],
    columnDefs: [{
       // targets: [],
        visible: false,
        searchable: true,
    }, ],
    deferRender: true,
    scrollY: 250,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,
   // fixedColumns: {
       // leftColumns: 1
        // rightColumns: 8
  //  },

    oScroller: {
      rowHeight: 25
    }
    //autoWidth: false,
    //stateSave: true
});
}


$('#mdl_application').on('show.bs.modal', function(e) {
	var oa_id =  $('input[name=oa_id]:checked').map(function()
		{
			return $(this).val();
		}).get();

	// var oa_id = $(e.relatedTarget).data('oa_id');
    $(this).find('#m_oa_id').val(oa_id);
    $(this).find('#m_ah_positiondesired').val($('#jm_position').val());
    // $(this).find('h5.modal-title').html('<b>' + $(e.relatedTarget).data('name') + '</b>');
    $(this).find('h5.modal-title').html('<b>' + $('#jm_office').val() + '</b>');
    $(this).find('#jm_reqnum').val($('#requestnumber').val());
    $(this).find('#m_office').val($('#jm_office').val());
    $(this).find('#m_ah_desc').val($('#jm_desc').val());
    $(this).find('#m_jm_id').val($('#jm_id').val());

});

$('#btn_reset').on('click', function(){
	$('#frm_jobmatch')[0].reset();
});
$('#mdl_frm_application').on('submit', function(){
		// alert($('#mdl_frm_forexam').serialize());
		$.ajax({
			type: "POST",
			dataType: "json",
			// url: base_url + "onlineapplicant/for_examinterview/",
			url: base_url + "onlineapplicant/ajax_application/",
			data: $('#mdl_frm_application').serialize(),
			beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
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
					$('.close').trigger("click");
					// dt_positionapplied.ajax.reload();
					dt_onlineapplicant.ajax.reload();

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

$('#frm_addapplication').on('submit', function(){
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "onlineapplicant/ajax_addapplication/",
			data: $('#frm_addapplication').serialize(),
			beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
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
					$('.close').trigger("click");
					// dt_positionapplied.ajax.reload();
					dt_onlineapplicant.ajax.reload();

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

var dt_onlineapplicant = $('#dt_onlineapplicant').DataTable({

    "ajax": {
        "url": base_url + "onlineapplicant/ajax_get_applicant",
        "dataSrc": ""
    },
    "columns": [
        { "data": function(data, type, row, meta) {
				if(data.ah_status != 'Pending'){
					return '<center><input type="checkbox" value="' + data.ah_id + '" id="ah_id" name="ah_id"></center>';
				}else{
					return '<center><i class="fa fa-exclamation red"></i></center>';
				}
            }
        }, // 1
		 { "data": function(data, type, row, meta) {
                return '<a target="_blank" href="'+base_url+'onlineapplicant/applicant_details/'+data.oa_id+'">' + data.application_no + '</a>';
            }
        }, //3
		 { "data": function(data, type, row, meta) {
                return '<a href="#" data-toggle="modal" data-target="#mdl_appinfo" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '">' + data.name + '</a>';
            }
        }, //3


		{ "data": "education" }, // 4
		{ "data": "oa_eligibility" }, // 5
		{ "data": "oa_mobile" }, // 6
		{ "data": "position_desired" }, // 7
		{ "data": "oa_gender" }, // 8
		{ "data": "oa_email" }, // 9
		{ "data": "oa_course" }, // 10
		{ "data": "oa_school" }, // 11
		{ "data": "p_name" }, // 12
		{ "data": "c_name" }, // 13
		{ "data": "brgy" }, // 14
		{ "data": "oa_skills" }, // 15
		{ "data": "oa_awards" }, // 16
		{ "data": "oa_bdate" }, // 17
		{ "data": "age" }, // 18
		{ "data": "ah_remarks" }, // 19

		 { "data": "oa_date" }, // 20

		{ "data": "ah_status" }, // 21


		{ "data": "ah_actiondate" }, // 22

		{ "data": function(data, type, row, meta) {
				var cls = "red";
				var tst = "#mdl_addresult";
			if(data.ah_remarks == 'For Exam and Interview' && data.ah_status == 'Approved'){
				var modal = '#mdl_sendemailforexam_individual';
				var cls = "green";
			}else if(data.ah_remarks == 'For Job Interview' && data.ah_status == 'Approved'){
				var modal = '#mdl_forjobinterview';
				var cls = "green";
			}else if(data.ah_remarks == 'For Filing' && data.ah_status == 'Approved'){
				var modal = '#mdl_forfilling_individual';
				var cls = "green";
			}else if(data.ah_remarks == 'Forward to CESD' && data.ah_status == 'Approved'){
				var modal = '#mdl_forforward_individual';
				var cls = "green";
			}else if(data.ah_remarks == 'Forward to City Schools' && data.ah_status == 'Approved'){
				var modal = '#mdl_forcityschools_individual';
				var cls = "green";
			}else if(data.ah_remarks == 'For Regret' && data.ah_status == 'Approved') {
				var modal = '#mdl_forregret_individual';
				var cls = "green";
				var tst = "#NOMADAL";
			}

			return '<center><a href="" data-toggle="modal" data-target="#editappinfo" data-oa_id="' + data.oa_id + '"> <i class="fa fa-pencil"></i></a> | <a href="" data-toggle="modal" data-target="#takeaphoto" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '"> <i class="fa fa-camera"></i></a> | <a href="" data-toggle="modal" data-target="#mdl_addapplicationhistory" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '"> <i class="fa fa-plus"></i></a> | <a href="" data-toggle="modal" data-target="#mdl_recform" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '"> <i class="fa fa-print"> </i></a> | <a href="" data-toggle="modal" data-target="#mdl_applicationhistory" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '"> <i class="fa fa-eye"> </i> </a>| <a href=""  data-toggle="modal" data-target="'+modal+'" data-ah_id="' + data.ah_id + '" data-name="' + data.name + '"> <i class="fa fa-envelope-o '+cls+'"> </i> </a>| <a href=""  data-toggle="modal" data-target="'+tst+'" data-ah_id="' + data.ah_id + '" data-name="' + data.name + '" data-ah_remarks="' + data.ah_remarks + '"> <i class="fa fa-file-text"> </i> </a></center>';
			}
		}, //23
		// { "data": "ah_emailsent" }, // 22
		{ "data": function(data, type, row, meta) {
			if(data.ah_emailsent == null){
				return '<strong class="red"> No Email Sent</strong>';
			}else{
				return '<strong class="green">'+ data.ah_emailsent +'</strong>';
			}

			}
		},

		{ "data": "ah_remarks_status" }, // 21
		{ "data": "ah_remarksdate" } // 22
    ],
    dom: '<"wrapper"Bfit>',
    buttons: [{
            extend: 'excelHtml5',
			className: 'green',
			 'text': '<i class="fa fa-download"></i>',
            customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('row c[r^="C"]', sheet).attr('s', '2');

            }
        },
		// {
            // extend: 'excelHtml5',
			// className: 'green',
			 // 'text': '<a href="' + base_url + 'onlineapplicant/encodeapplicant" target="_blank" class="fa fa-plus"></a>',
            // customize: function(xlsx) {
                // var sheet = xlsx.xl.worksheets['sheet1.xml'];
                // $('row c[r^="C"]', sheet).attr('s', '2');

            // }
        // },

    ],
    columnDefs: [{
        targets: [3,4,5,6,7,8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 19],
        visible: false,
        searchable: true,
    }, ],
    deferRender: true,
    scrollY: 410,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,
    fixedColumns: {
        leftColumns: 1
        // rightColumns: 8
    },
    // fnInitComplete: function(oSettings, json) {
        // $('.glyphicon-remove').trigger("click");
    // },
    oScroller: {
      rowHeight: 50
    }
   // autoWidth: false,
    //stateSave: true
});

var dt_onlineapplicant_forexam = $('#dt_onlineapplicant_forexam').DataTable({

    "ajax": {
        "url": base_url + "onlineapplicant/ajax_get_applicant_forexam",
        "dataSrc": ""
    },
    "columns": [
        { "data": function(data, type, row, meta) {
				if(data.ah_status != 'Pending'){
					return '<center><input type="checkbox" value="' + data.ah_id + '" id="ah_id" name="ah_id"></center>';
				}else{
					return '<center><i class="fa fa-exclamation red"></i></center>';
				}
            }
        }, // 1
        { "data": "application_no" }, //2
		 { "data": function(data, type, row, meta) {
                return '<a href="#" data-toggle="modal" data-target="#mdl_appinfo" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '">' + data.name + '</a>';
            }
        }, //3


		{ "data": "education" }, // 4
		{ "data": "oa_eligibility" }, // 5
		{ "data": "oa_mobile" }, // 6
		{ "data": "position_desired" }, // 7
		{ "data": "oa_gender" }, // 8
		{ "data": "oa_email" }, // 9
		{ "data": "oa_course" }, // 10
		{ "data": "oa_school" }, // 11
		{ "data": "p_name" }, // 12
		{ "data": "c_name" }, // 13
		{ "data": "brgy" }, // 14
		{ "data": "oa_skills" }, // 15
		{ "data": "oa_awards" }, // 16
		{ "data": "oa_bdate" }, // 17
		{ "data": "age" }, // 18
		{ "data": "ah_remarks" }, // 19
		{ "data": "oa_date" }, // 20
		{ "data": "ah_status" }, // 21
		{ "data": "ah_actiondate" }, // 22

		{ "data": function(data, type, row, meta) {
			return '<center><a href="" data-toggle="modal" data-target="#mdl_recform" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '"> <i class="fa fa-print"> </i></a> | <a href="" data-toggle="modal" data-target="#mdl_applicationhistory" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '"> <i class="fa fa-eye"> </i> </a></center>';
			}
		}, //23
		// { "data": "ah_emailsent" }, // 22
		{ "data": function(data, type, row, meta) {
			if(data.ah_emailsent == null){
				return '<strong class="red"> No Email Sent</strong>';
			}else{
				return '<strong class="green">'+ data.ah_emailsent +'</strong>';
			}

			}
		},
    ],
    dom: '<"wrapper"Bfit>',
    buttons: [{
            extend: 'excelHtml5',
			className: 'green',
			 'text': '<i class="fa fa-download"></i>',
            customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('row c[r^="C"]', sheet).attr('s', '2');

            }
        },
		{
			className: 'green',
			 'text': '<i data-toggle="modal" data-target="#mdl_sendemailforexam" class="fa fa-envelope-o"></i>',
        },

    ],
    columnDefs: [{
        targets: [3,4,5,6,7,8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 19],
        visible: false,
        searchable: true,
    }, ],
    deferRender: true,
    scrollY: 500,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,
    fixedColumns: {
        leftColumns: 1
        // rightColumns: 8
    },
    // fnInitComplete: function(oSettings, json) {
        // $('.glyphicon-remove').trigger("click");
    // },
    oScroller: {
      rowHeight: 30
    }
    //autoWidth: false,
    //stateSave: true
});

var dt_onlineapplicant_forfiling = $('#dt_onlineapplicant_forfiling').DataTable({

    "ajax": {
        "url": base_url + "onlineapplicant/ajax_get_applicant_forfiling",
        "dataSrc": ""
    },
    "columns": [
        { "data": function(data, type, row, meta) {
				if(data.ah_status != 'Pending'){
					return '<center><input type="checkbox" value="' + data.ah_id + '" id="ah_id" name="ah_id"></center>';
				}else{
					return '<center><i class="fa fa-exclamation red"></i></center>';
				}
            }
        }, // 1
        { "data": "application_no" }, //2
		 { "data": function(data, type, row, meta) {
                return '<a href="#" data-toggle="modal" data-target="#mdl_appinfo" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '">' + data.name + '</a>';
            }
        }, //3


		{ "data": "education" }, // 4
		{ "data": "oa_eligibility" }, // 5
		{ "data": "oa_mobile" }, // 6
		{ "data": "position_desired" }, // 7
		{ "data": "oa_gender" }, // 8
		{ "data": "oa_email" }, // 9
		{ "data": "oa_course" }, // 10
		{ "data": "oa_school" }, // 11
		{ "data": "p_name" }, // 12
		{ "data": "c_name" }, // 13
		{ "data": "brgy" }, // 14
		{ "data": "oa_skills" }, // 15
		{ "data": "oa_awards" }, // 16
		{ "data": "oa_bdate" }, // 17
		{ "data": "age" }, // 18
		{ "data": "ah_remarks" }, // 19
		{ "data": "oa_date" }, // 20
		{ "data": "ah_status" }, // 21
		{ "data": "ah_actiondate" }, // 22

		{ "data": function(data, type, row, meta) {
			// return '<a href="" data-toggle="modal" data-target="#mdl_applicationhistory" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '"> <i class="fa fa-plus"></i> Add History</a>';
				return '<center><a href="" data-toggle="modal" data-target="#mdl_recform" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '"> <i class="fa fa-print"> </i></a> | <a href="" data-toggle="modal" data-target="#mdl_applicationhistory" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '"> <i class="fa fa-eye"> </i> </a></center>';

			}
		}, //23
		// { "data": "ah_emailsent" }, // 22
		{ "data": function(data, type, row, meta) {
			if(data.ah_emailsent == null){
				return '<strong class="red"> No Email Sent</strong>';
			}else{
				return '<strong class="green">'+ data.ah_emailsent +'</strong>';
			}

			}
		},
    ],
    dom: '<"wrapper"Bfit>',
    buttons: [{
            extend: 'excelHtml5',
			className: 'green',
			 'text': '<i class="fa fa-download"></i>',
            customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('row c[r^="C"]', sheet).attr('s', '2');

            }
        },{
			className: 'green',
			 'text': '<i data-toggle="modal" id="btn_forfiling" name="btn_forfiling" data-target="#mdl_sendemailforexam" class="fa fa-envelope-o"></i>',
        },

    ],
    columnDefs: [{
        targets: [3,4,5,6,7,8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 19],
        visible: false,
        searchable: true,
    }, ],
    deferRender: true,
    scrollY: 500,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,
    fixedColumns: {
        leftColumns: 1
        // rightColumns: 8
    },
    // fnInitComplete: function(oSettings, json) {
        // $('.glyphicon-remove').trigger("click");
    // },
    oScroller: {
      rowHeight: 30
    }
    //autoWidth: false,
    //stateSave: true
});

var dt_onlineapplicant_forforward = $('#dt_onlineapplicant_forforward').DataTable({

    "ajax": {
        "url": base_url + "onlineapplicant/ajax_get_applicant_forforward",
        "dataSrc": ""
    },
    "columns": [
        { "data": function(data, type, row, meta) {
				if(data.ah_status != 'Pending'){
					return '<center><input type="checkbox" value="' + data.ah_id + '" id="ah_id" name="ah_id"></center>';
				}else{
					return '<center><i class="fa fa-exclamation red"></i></center>';
				}
            }
        }, // 1
        { "data": "application_no" }, //2
		 { "data": function(data, type, row, meta) {
                return '<a href="#" data-toggle="modal" data-target="#mdl_appinfo" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '">' + data.name + '</a>';
            }
        }, //3


		{ "data": "education" }, // 4
		{ "data": "oa_eligibility" }, // 5
		{ "data": "oa_mobile" }, // 6
		{ "data": "position_desired" }, // 7
		{ "data": "oa_gender" }, // 8
		{ "data": "oa_email" }, // 9
		{ "data": "oa_course" }, // 10
		{ "data": "oa_school" }, // 11
		{ "data": "p_name" }, // 12
		{ "data": "c_name" }, // 13
		{ "data": "brgy" }, // 14
		{ "data": "oa_skills" }, // 15
		{ "data": "oa_awards" }, // 16
		{ "data": "oa_bdate" }, // 17
		{ "data": "age" }, // 18
		{ "data": "ah_remarks" }, // 19
		{ "data": "oa_date" }, // 20
		{ "data": "ah_status" }, // 21
		{ "data": "ah_actiondate" }, // 22

		{ "data": function(data, type, row, meta) {
			// return '<a href="" data-toggle="modal" data-target="#mdl_applicationhistory" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '"> <i class="fa fa-plus"> </i> Add History</a>';
			return '<center><a href="" data-toggle="modal" data-target="#mdl_recform" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '"> <i class="fa fa-print"> </i></a> | <a href="" data-toggle="modal" data-target="#mdl_applicationhistory" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '"> <i class="fa fa-eye"> </i> </a></center>';
			}
		}, //23
		// { "data": "ah_emailsent" }, // 22
		{ "data": function(data, type, row, meta) {
			if(data.ah_emailsent == null){
				return '<strong class="red"> No Email Sent</strong>';
			}else{
				return '<strong class="green">'+ data.ah_emailsent +'</strong>';
			}

			}
		},
    ],
    dom: '<"wrapper"Bfit>',
    buttons: [{
            extend: 'excelHtml5',
			className: 'green',
			 'text': '<i class="fa fa-download"></i>',
            customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('row c[r^="C"]', sheet).attr('s', '2');

            }
        },
		{
			className: 'green',
			 'text': '<i data-toggle="modal" id="btn_forwardtocesd" name="btn_forwardtocesd" data-target="#mdl_sendemailforexam" class="fa fa-envelope-o"></i>',
        },

    ],
    columnDefs: [{
        targets: [3,4,5,6,7,8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 19],
        visible: false,
        searchable: true,
    }, ],
    deferRender: true,
    scrollY: 500,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,
    fixedColumns: {
        leftColumns: 1
        // rightColumns: 8
    },
    // fnInitComplete: function(oSettings, json) {
        // $('.glyphicon-remove').trigger("click");
    // },
    oScroller: {
      rowHeight: 30
    }
    //autoWidth: false,
    //stateSave: true
});

var dt_onlineapplicant_forregret = $('#dt_onlineapplicant_forregret').DataTable({

    "ajax": {
        "url": base_url + "onlineapplicant/ajax_get_applicant_forregret",
        "dataSrc": ""
    },
    "columns": [
        { "data": function(data, type, row, meta) {
				if(data.ah_status != 'Pending'){
					return '<center><input type="checkbox" value="' + data.ah_id + '" id="ah_id" name="ah_id"></center>';
				}else{
					return '<center><i class="fa fa-exclamation red"></i></center>';
				}
            }
        }, // 1
        { "data": "application_no" }, //2
		 { "data": function(data, type, row, meta) {
                return '<a href="#" data-toggle="modal" data-target="#mdl_appinfo" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '">' + data.name + '</a>';
            }
        }, //3


		{ "data": "education" }, // 4
		{ "data": "oa_eligibility" }, // 5
		{ "data": "oa_mobile" }, // 6
		{ "data": "position_desired" }, // 7
		{ "data": "oa_gender" }, // 8
		{ "data": "oa_email" }, // 9
		{ "data": "oa_course" }, // 10
		{ "data": "oa_school" }, // 11
		{ "data": "p_name" }, // 12
		{ "data": "c_name" }, // 13
		{ "data": "brgy" }, // 14
		{ "data": "oa_skills" }, // 15
		{ "data": "oa_awards" }, // 16
		{ "data": "oa_bdate" }, // 17
		{ "data": "age" }, // 18
		{ "data": "ah_remarks" }, // 19
		{ "data": "oa_date" }, // 20
		{ "data": "ah_status" }, // 21
		{ "data": "ah_actiondate" }, // 22

		{ "data": function(data, type, row, meta) {
			// return '<a href="" data-toggle="modal" data-target="#mdl_applicationhistory" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '"> <i class="fa fa-plus"> </i> Add History</a>';
			return '<center><a href="" data-toggle="modal" data-target="#mdl_recform" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '"> <i class="fa fa-print"> </i></a> | <a href="" data-toggle="modal" data-target="#mdl_applicationhistory" data-oa_id="' + data.oa_id + '" data-name="' + data.name + '"> <i class="fa fa-eye"> </i> </a></center>';
			}
		}, //23
		// { "data": "ah_emailsent" }, // 22
		{ "data": function(data, type, row, meta) {
			if(data.ah_emailsent == null){
				return '<strong class="red"> No Email Sent</strong>';
			}else{
				return '<strong class="green">'+ data.ah_emailsent +'</strong>';
			}

			}
		},
    ],
    dom: '<"wrapper"Bfit>',
    buttons: [{
            extend: 'excelHtml5',
			className: 'green',
			 'text': '<i class="fa fa-download"></i>',
            customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('row c[r^="C"]', sheet).attr('s', '2');

            }
        },{
			className: 'green',
			 'text': '<i data-toggle="modal" id="btn_forregret" name="btn_forregret" class="fa fa-envelope-o"></i>',
        },

    ],
    columnDefs: [{
        targets: [3,4,5,6,7,8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 19],
        visible: false,
        searchable: true,
    }, ],
    deferRender: true,
    scrollY: 500,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,
    fixedColumns: {
        leftColumns: 1
        // rightColumns: 8
    },
    // fnInitComplete: function(oSettings, json) {
        // $('.glyphicon-remove').trigger("click");
    // },
    oScroller: {
      rowHeight: 30
    }
    //autoWidth: false,
    //stateSave: true
});



var dt_vacancies = $('#dt_vacancies').DataTable({

    "ajax": {
        "url": base_url + "onlineapplicant/ajax_get_vacancy",
        "dataSrc": ""
    },

	createdRow: function( row, data, dataIndex ) {
			$(row).find('td').attr('data-v_position', data.v_position);
			$(row).find('td').attr('data-v_desc', data.v_desc);
			$(row).find('td').attr('data-v_id', data.v_id);
		},

    "columns": [

        { "data": "v_position" },
		{ "data": "v_desc" }
		// { "data": "v_id" }
		],
    dom: '<"wrapper"Bfit>',
    buttons: [{
            extend: 'excelHtml5',
            customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('row c[r^="C"]', sheet).attr('s', '2');
            }
        },
		{
			className: 'yellow',
			 // 'text': '<i data-toggle="modal" data-target="#mdl_sendemailforexam" class="fa fa-envelope-o"></i>',
			 'text': '<div id="btn_reset_vacancies" name="btn_reset_vacancies"><i class="fa fa-refresh"></i> Reset</div>',
        },
    ],
    deferRender: true,
    scrollY: 250,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,

    oScroller: {
      rowHeight: 30
    }

});



$('#dt_vacancies tbody').on('click', 'td', function () {
   $('#frm_vacancies #v_position').val($(this).data('v_position'));
   $('#frm_vacancies #v_desc').val($(this).data('v_desc'));
   $('#frm_vacancies #v_id').val($(this).data('v_id'));

   if ( $(this).hasClass('selected') ) {
		   $(this).removeClass('selected');
	   }
	   else {
		   $('#dt_vacancies tbody tr.selected').removeClass('selected');
		   $(this).addClass('selected');
	   }
});

$('#frm_vacancies').on('submit', function(){
	 $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url + "onlineapplicant/ajax_save_vacancy",
        data: $('#frm_vacancies').serialize(),
		beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
                    type: 'info',
                    styling: 'bootstrap3'
                });
		},

        success: function(data) {
            if (data.status == "yes") {
				$('.close').trigger("click");
                new PNotify({
                    title: 'Success',
                    text: data.content,
                    type: 'success',
                    styling: 'bootstrap3'
                });

				dt_vacancies.ajax.reload();
				$('#v_id').val('');
				$('#v_position').val('');
				$('#v_desc').val('');

            } else {
				$('.close').trigger("click");
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


$('#btn_addnew').on('click', function(){
	$('#v_id').val('');
	$('#v_position').val('');
	$('#v_desc').val('');
});
$('#btn_reloadtable').on('click', function(){
		dt_vacancies.ajax.reload();
});

$('#btn_removeposition').on('click', function(){
	 $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url + "onlineapplicant/ajax_deactivate_vacancy",
        data: $('#frm_vacancies').serialize(),
		beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
                    type: 'info',
                    styling: 'bootstrap3'
                });
		},

        success: function(data) {
            if (data.status == "yes") {
					$('.close').trigger("click");
                new PNotify({
                    title: 'Success',
                    text: data.content,
                    type: 'success',
                    styling: 'bootstrap3'
                });
   	$('.close').trigger("click");
				dt_vacancies.ajax.reload();
				$('#v_id').val('');
				$('#v_position').val('');
				$('#v_desc').val('');
                // setTimeout(function() {
                    // $('.glyphicon-remove').trigger("click");
                    // location.reload();
                    // filterReset();
                // }, 1000);
            } else {
					$('.close').trigger("click");
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


$('#mdl_frm_sendemailforexam').on('submit', function(){

		var forexam = {
			m_ah_id 	: $('#m_ah_id').val(),
			es_date 	: $('#es_date').val(),
			es_time	 	: $('#es_time').val(),
			es_venue 	: $('#es_venue').val()
		};

		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "onlineapplicant/email_forexam/",
			data: forexam,
			beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
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
					$('.close').trigger("click");

					dt_onlineapplicant_forexam.ajax.reload();

				} else {
					new PNotify({
						title: 'Error',
						text: data.content,
						type: 'error',
						styling: 'bootstrap3'
					});
				}

				if (data.sv_error_notify == "yes") {
					new PNotify({
							title: 'Error',
							text: data.names,
							type: 'error',
							styling: 'bootstrap3'
						});
				}

					setTimeout(function() {
						$('.glyphicon-remove').trigger("click");
						location.reload();
						// filterReset();
					}, 1000000);
			}
		}).error(function() {
			alert('Connection problems occurred... Unable to connect to the Internet! The Internet connection has been lost.');
		});
		return false;

});

$('#mdl_frm_sendemailforexam_individual').on('submit', function(){

		var forexam = {
			m_ah_id 	: $('#mdl_frm_sendemailforexam_individual #m_ah_id').val(),
			es_date 	: $('#mdl_frm_sendemailforexam_individual #es_date').val(),
			es_time	 	: $('#mdl_frm_sendemailforexam_individual #es_time').val(),
			es_venue 	: $('#mdl_frm_sendemailforexam_individual #es_venue').val()
		};

		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "onlineapplicant/email_forexam_individual/",
			data: forexam,
			beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
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
					$('.close').trigger("click");

					dt_onlineapplicant.ajax.reload();

				} else {
					new PNotify({
						title: 'Error',
						text: data.content,
						type: 'error',
						styling: 'bootstrap3'
					});
				}

				if (data.sv_error_notify == "yes") {
					new PNotify({
							title: 'Error',
							text: data.names,
							type: 'error',
							styling: 'bootstrap3'
						});
				}

					setTimeout(function() {
						$('.glyphicon-remove').trigger("click");
						location.reload();
						// filterReset();
					}, 1000000);
			}
		}).error(function() {
			alert('Connection problems occurred... Unable to connect to the Internet! The Internet connection has been lost.');
		});
		return false;

});

$('#mdl_frm_sendemailforjobinterview').on('submit', function(){

		var forjobinterview = {
			m_ah_id 	: $('#mdl_frm_sendemailforjobinterview #m_ah_id').val(),
			es_date 	: $('#mdl_frm_sendemailforjobinterview #es_date').val(),
			es_time	 	: $('#mdl_frm_sendemailforjobinterview #es_time').val(),
			es_venue 	: $('#mdl_frm_sendemailforjobinterview #es_venue').val()
		};

		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "onlineapplicant/email_forjobinterview/",
			data: forjobinterview,
			beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
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
					$('.close').trigger("click");

					dt_onlineapplicant.ajax.reload();

				} else {
					new PNotify({
						title: 'Error',
						text: data.content,
						type: 'error',
						styling: 'bootstrap3'
					});
				}

				if (data.sv_error_notify == "yes") {
					new PNotify({
							title: 'Error',
							text: data.names,
							type: 'error',
							styling: 'bootstrap3'
						});
				}

					setTimeout(function() {
						$('.glyphicon-remove').trigger("click");
						location.reload();
						// filterReset();
					}, 1000000);
			}
		}).error(function() {
			alert('Connection problems occurred... Unable to connect to the Internet! The Internet connection has been lost.');
		});
		return false;

});

$('#mdl_frm_forfilling_individual').on('submit', function(){


		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "onlineapplicant/email_forfiling_individual/",
			data: $('#mdl_frm_forfilling_individual').serialize(),
			beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
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
					$('.close').trigger("click");

					dt_onlineapplicant.ajax.reload();

				} else {
					new PNotify({
						title: 'Error',
						text: data.content,
						type: 'error',
						styling: 'bootstrap3'
					});
				}

				if (data.sv_error_notify == "yes") {
					new PNotify({
							title: 'Error',
							text: data.names,
							type: 'error',
							styling: 'bootstrap3'
						});
				}

					setTimeout(function() {
						$('.glyphicon-remove').trigger("click");
						location.reload();
						// filterReset();
					}, 1000000);
			}
		}).error(function() {
			alert('Connection problems occurred... Unable to connect to the Internet! The Internet connection has been lost.');
		});
		return false;

});

$('#mdl_frm_forforward_individual').on('submit', function(){
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "onlineapplicant/email_forwardtocesd_individual/",
			data: $('#mdl_frm_forforward_individual').serialize(),
			beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
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
					$('.close').trigger("click");

					dt_onlineapplicant.ajax.reload();

				} else {
					new PNotify({
						title: 'Error',
						text: data.content,
						type: 'error',
						styling: 'bootstrap3'
					});
				}

				if (data.sv_error_notify == "yes") {
					new PNotify({
							title: 'Error',
							text: data.names,
							type: 'error',
							styling: 'bootstrap3'
						});
				}

					setTimeout(function() {
						$('.glyphicon-remove').trigger("click");
						location.reload();
						// filterReset();
					}, 1000000);
			}
		}).error(function() {
			alert('Connection problems occurred... Unable to connect to the Internet! The Internet connection has been lost.');
		});
		return false;

});


$('#mdl_frm_forcityschools_individual').on('submit', function(){
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "onlineapplicant/email_forwardtocityschools/",
			data: $('#mdl_frm_forcityschools_individual').serialize(),
			beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
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
					$('.close').trigger("click");

					dt_onlineapplicant.ajax.reload();

				} else {
					new PNotify({
						title: 'Error',
						text: data.content,
						type: 'error',
						styling: 'bootstrap3'
					});
				}

				if (data.sv_error_notify == "yes") {
					new PNotify({
							title: 'Error',
							text: data.names,
							type: 'error',
							styling: 'bootstrap3'
						});
				}

					setTimeout(function() {
						$('.glyphicon-remove').trigger("click");
						location.reload();
						// filterReset();
					}, 1000000);
			}
		}).error(function() {
			alert('Connection problems occurred... Unable to connect to the Internet! The Internet connection has been lost.');
		});
		return false;

});


$('#mdl_frm_forregret_individual').on('submit', function(){
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "onlineapplicant/email_forregret_individual/",
			data: $('#mdl_frm_forregret_individual').serialize(),
			beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
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
					$('.close').trigger("click");

					dt_onlineapplicant.ajax.reload();

				} else {
					new PNotify({
						title: 'Error',
						text: data.content,
						type: 'error',
						styling: 'bootstrap3'
					});
				}

				if (data.sv_error_notify == "yes") {
					new PNotify({
							title: 'Error',
							text: data.names,
							type: 'error',
							styling: 'bootstrap3'
						});
				}

					setTimeout(function() {
						$('.glyphicon-remove').trigger("click");
						location.reload();
						// filterReset();
					}, 1000000);
			}
		}).error(function() {
			alert('Connection problems occurred... Unable to connect to the Internet! The Internet connection has been lost.');
		});
		return false;

});

$('#mdl_frm_addresult').on('submit', function(){
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "onlineapplicant/update_applicant_result/",
			data: $('#mdl_frm_addresult').serialize(),
			beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
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
					$('.close').trigger("click");

					dt_onlineapplicant.ajax.reload();

				} else {
					new PNotify({
						title: 'Error',
						text: data.content,
						type: 'error',
						styling: 'bootstrap3'
					});
				}

				if (data.sv_error_notify == "yes") {
					new PNotify({
							title: 'Error',
							text: data.names,
							type: 'error',
							styling: 'bootstrap3'
						});
				}

					setTimeout(function() {
						$('.glyphicon-remove').trigger("click");
						location.reload();
						// filterReset();
					}, 1000000);
			}
		}).error(function() {
			alert('Connection problems occurred... Unable to connect to the Internet! The Internet connection has been lost.');
		});
		return false;

});

$('#btn_forfiling').on('click', function(){

		var checkValues =  $('input[name=ah_id]:checked').map(function()
			{
				return $(this).val();
			}).get();

		var forfiling = {
			ah_id: checkValues,
			// es_date : $('#es_date').val(),
			// es_time : $('#es_time').val(),
			// es_venue : $('#es_venue').val(),
		};
	 // alert(checkValues);
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "onlineapplicant/email_forfiling/",
			data: forfiling,
			beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
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
					$('.close').trigger("click");

						dt_onlineapplicant_forfiling.ajax.reload();

					// otable.search( '' ).columns().search( '' ).draw();

				} else {
					new PNotify({
						title: 'Error',
						text: data.content,
						type: 'error',
						styling: 'bootstrap3'
					});
				}

				if (data.sv_error_notify == "yes") {
					new PNotify({
							title: 'Error',
							text: data.names,
							type: 'error',
							styling: 'bootstrap3'
						});
				}

					setTimeout(function() {
						$('.glyphicon-remove').trigger("click");
						location.reload();
						// filterReset();
					}, 1000000);
			}
		}).error(function() {
			alert('Connection problems occurred... Unable to connect to the Internet! The Internet connection has been lost.');
		});
		return false;

});

$('#btn_forwardtocesd').on('click', function(){

		var checkValues =  $('input[name=ah_id]:checked').map(function()
			{
				return $(this).val();
			}).get();

		var forwardtocesd = {
			ah_id: checkValues,
			// es_date : $('#es_date').val(),
			// es_time : $('#es_time').val(),
			// es_venue : $('#es_venue').val(),
		};
	 // alert(checkValues);
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "onlineapplicant/email_forwardtocesd/",
			data: forwardtocesd,
			beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
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
					$('.close').trigger("click");
					dt_onlineapplicant_forforward.ajax.reload();

					// otable.search( '' ).columns().search( '' ).draw();


				} else {
					new PNotify({
						title: 'Error',
						text: data.content,
						type: 'error',
						styling: 'bootstrap3'
					});
				}

				if (data.sv_error_notify == "yes") {
					new PNotify({
							title: 'Error',
							text: data.names,
							type: 'error',
							styling: 'bootstrap3'
						});
				}

					setTimeout(function() {
						$('.glyphicon-remove').trigger("click");
						location.reload();
						// filterReset();
					}, 1000000);
			}
		}).error(function() {
			alert('Connection problems occurred... Unable to connect to the Internet! The Internet connection has been lost.');
		});
		return false;

});

$('#btn_forregret').on('click', function(){

		var checkValues =  $('input[name=ah_id]:checked').map(function()
			{
				return $(this).val();
			}).get();

		var forregret = {
			ah_id: checkValues,
			// es_date : $('#es_date').val(),
			// es_time : $('#es_time').val(),
			// es_venue : $('#es_venue').val(),
		};
	 // alert(checkValues);
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "onlineapplicant/email_forregret/",
			data: forregret,
			beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
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
					$('.close').trigger("click");
					dt_onlineapplicant_forregret.ajax.reload();

					// otable.search( '' ).columns().search( '' ).draw();


				} else {
					new PNotify({
						title: 'Error',
						text: data.content,
						type: 'error',
						styling: 'bootstrap3'
					});
				}

				if (data.sv_error_notify == "yes") {
					new PNotify({
							title: 'Error',
							text: data.names,
							type: 'error',
							styling: 'bootstrap3'
						});
				}

					setTimeout(function() {
						$('.glyphicon-remove').trigger("click");
						location.reload();
						// filterReset();
					}, 1000000);
			}
		}).error(function() {
			alert('Connection problems occurred... Unable to connect to the Internet! The Internet connection has been lost.');
		});
		return false;

});

$('#mdl_appinfo').on('show.bs.modal', function(e) {
    // var pic  = base_url + "pds_image/" + $(e.relatedTarget).data('id') + "/"+ $(e.relatedTarget).data('id') +".png";
	var oa_id = $(e.relatedTarget).data('oa_id');
    $(this).find('#mdl_appinfo #m_oa_id').val(oa_id);
   // $(this).find('#app_id').src(base_url +'onlineapplicant_images/'+ oa_id + '.png');
	 var a  	= "https://cityofsanfernando.gov.ph/careers/images/" + oa_id + "/" + oa_id +".JPG";
	 var aa  	= "https://cityofsanfernando.gov.ph/careers/images/" + oa_id + "/" + oa_id +".jpg";
	 var b  	= "https://cityofsanfernando.gov.ph/careers/images/" + oa_id + "/" + oa_id +".JPEG";
	 var bb  	= "https://cityofsanfernando.gov.ph/careers/images/" + oa_id + "/" + oa_id +".jpeg";
	 var c  	= "https://cityofsanfernando.gov.ph/careers/images/" + oa_id + "/" + oa_id +".PNG";
	 var cc  	= "https://cityofsanfernando.gov.ph/careers/images/" + oa_id + "/" + oa_id +".png";
	 var csfp  	= "https://cityofsanfernando.gov.ph/careers/img/img.png";


	 var img_a 	= a.width;
	 var img_aa = aa.width;
	 var img_b 	= b.width;
	 var img_bb = bb.width;
	 var img_c 	= c.width;
	 var img_cc = cc.width;
	 var img_csfp = csfp.width;

	 var pic;

	 if (img_a!=0) {
		pic = a;
	} else if(img_aa!=0) {
		pic = aa;
	}else if(img_b!=0) {
		pic = b;
	} else if(img_bb!=0) {
		pic = bb;
	} else if(img_c!=0) {
		pic = c;
	} else if(img_cc!=0) {
		pic = cc;
	}else if(img_csfp!=0) {
		pic = csfp;
	}



	 $('#mdl_appinfo #app_id').attr('src',pic);




	// alert(pic);
    $(this).find('h5.modal-title').html('<b>' + $(e.relatedTarget).data('name') + '</b>');

	 var xhr = new XMLHttpRequest();
	 xhr.open("GET", base_url + "onlineapplicant/ajax_get_info/"+ oa_id, true);
	 xhr.onreadystatechange = function() {
	   if (this.readyState == 4 && this.status == 200) {
		   var myarr = JSON.parse(this.responseText);
			for (i = 0; i < myarr.length; i++) {

				$('#mdl_appinfo #oa_fname').val(myarr[i].oa_fname);
				 $('#mdl_appinfo #oa_mname').val(myarr[i].oa_mname);
				 $('#mdl_appinfo #oa_lname').val(myarr[i].oa_lname);
				 $('#mdl_appinfo #oa_extname').val(myarr[i].oa_extname);
				 $('#mdl_appinfo #oa_gender').val(myarr[i].oa_gender);
				 $('#mdl_appinfo #oa_bdate').val(myarr[i].oa_bdate);
				 $('#mdl_appinfo #oa_school').val(myarr[i].oa_school);
				 $('#mdl_appinfo #oa_course').val(myarr[i].oa_course);
				 $('#mdl_appinfo #oa_educremarks').val(myarr[i].oa_educremarks);
				 $('#mdl_appinfo #oa_eligibility').val(myarr[i].oa_eligibility);
				 $('#mdl_appinfo #oa_eligremarks').val(myarr[i].oa_eligremarks);
				 $('#mdl_appinfo #oa_province').val(myarr[i].p_name);
				 $('#mdl_appinfo #oa_city').val(myarr[i].c_name);
				 $('#mdl_appinfo #oa_brgy').val(myarr[i].brgy);
				 $('#mdl_appinfo #oa_skills').val(myarr[i].oa_skills);
				 $('#mdl_appinfo #oa_awards').val(myarr[i].oa_awards);
				 $('#mdl_appinfo #oa_mobile').val(myarr[i].oa_mobile);
			}
	   }
	}
	xhr.send();



	// $.getJSON(base_url + "onlineapplicant/ajax_get_info/" + oa_id, function(data) {
		// $.each(data, function(index, item) {
			 // $('#modal_body').find('#oa_fname').val(item.oa_fname);
			 // $('#mdl_appinfo #oa_fname').val(item.oa_fname);
			 // $('#modal_body').find('#oa_mname').val(item.oa_mname);
			 // $('#mdl_appinfo #oa_mname').val(item.oa_mname);
			 // $('#modal_body').find('#oa_lname').val(item.oa_lname);
			 // $('#mdl_appinfo #oa_lname').val(item.oa_lname);
			 // $('#modal_body').find('#oa_extname').val(item.oa_extname);
			 // $('#mdl_appinfo #oa_extname').val(item.oa_extname);
			 // $('#modal_body').find('#oa_gender').val(item.oa_gender);
			 // $('#mdl_appinfo #oa_gender').val(item.oa_gender);
			 // $('#modal_body').find('#oa_bdate').val(item.oa_bdate);
			 // $('#mdl_appinfo #oa_bdate').val(item.oa_bdate);
			 // $('#modal_body').find('#oa_school').val(item.oa_school);
			 // $('#mdl_appinfo #oa_school').val(item.oa_school);
			 // $('#modal_body').find('#oa_course').val(item.oa_course);
			 // $('#mdl_appinfo #oa_course').val(item.oa_course);
			 // $('#modal_body').find('#oa_educremarks').val(item.oa_educremarks);
			 // $('#mdl_appinfo #oa_educremarks').val(item.oa_educremarks);
			 // $('#modal_body').find('#oa_eligibility').val(item.oa_eligibility);
			 // $('#mdl_appinfo #oa_eligibility').val(item.oa_eligibility);
			 // $('#modal_body').find('#oa_eligremarks').val(item.oa_eligremarks);
			 // $('#mdl_appinfo #oa_eligremarks').val(item.oa_eligremarks);
			 // $('#modal_body').find('#oa_province').val(item.p_name);
			 // $('#mdl_appinfo #oa_province').val(item.p_name);
			 // $('#modal_body').find('#oa_city').val(item.c_name);
			 // $('#mdl_appinfo #oa_city').val(item.c_name);
			 // $('#modal_body').find('#oa_brgy').val(item.brgy);
			 // $('#mdl_appinfo #oa_brgy').val(item.brgy);
			 // $('#modal_body').find('#oa_skills').val(item.oa_skills);
			 // $('#mdl_appinfo #oa_skills').val(item.oa_skills);
			 // $('#modal_body').find('#oa_awards').val(item.oa_awards);
			 // $('#mdl_appinfo #oa_awards').val(item.oa_awards);
			 // $('#modal_body').find('#oa_mobile').val(item.oa_mobile);
			 // $('#mdl_appinfo #oa_mobile').val(item.oa_mobile);

			// $("#modal_body tbody").append('<tr><td>'+item.v_position +' ('+ item.v_desc+')'+'</td></tr>');
		// });
	// });


    // $(this).find('p.office').html('<b>OFFICE: </b>' + $(e.relatedTarget).data('a_office'));
    // $(this).find('p.position').html('<b>POSITION: </b>' + $(e.relatedTarget).data('a_position'));
	$("#mdl_appinfo tbody").empty();
	 var xhr = new XMLHttpRequest();
	 xhr.open("GET", base_url + "onlineapplicant/ajax_get_appliedposition/"+ oa_id, true);
	 xhr.onreadystatechange = function() {
	   if (this.readyState == 4 && this.status == 200) {
		   var myarr = JSON.parse(this.responseText);
			for (i = 0; i < myarr.length; i++) {
				$("#mdl_appinfo tbody").append('<tr><td>'+myarr[i].v_position +'</td></tr>');
			}
	   }
	}
	xhr.send();
	// $.getJSON(base_url + "onlineapplicant/ajax_get_appliedposition/" + oa_id, function(data) {
				// $.each(data, function(index, item) {
						// $("#modal_body").append('<br/>');
						// $("#modal_body").append('<label class="form-label">'+ item.v_position + '('+ item.v_desc +')'+'</label>');
						// $("#modal_body").append('<br/>');
				// $("#mdl_appinfo tbody").append('<tr><td>'+item.v_position +'</td></tr>');

				// });
			// });
});

$('#mdl_appinfo').on('hidden.bs.modal', function(e) {

    $(this).find('#mdl_appinfo #m_oa_id').val('');

    $(this).find('h5.modal-title').html('');

			 $('#mdl_appinfo #oa_fname').val('');
			 $('#mdl_appinfo #oa_mname').val('');
			 $('#mdl_appinfo #oa_lname').val('');
			 $('#mdl_appinfo #oa_extname').val('');
			 $('#mdl_appinfo #oa_gender').val('');
			 $('#mdl_appinfo #oa_bdate').val('');
			 $('#mdl_appinfo #oa_school').val('');
			 $('#mdl_appinfo #oa_course').val('');
			 $('#mdl_appinfo #oa_educremarks').val('');
			 $('#mdl_appinfo #oa_eligibility').val('');
			 $('#mdl_appinfo #oa_eligremarks').val('');
			 $('#mdl_appinfo #oa_province').val('');
			 $('#mdl_appinfo #oa_city').val('');
			 $('#mdl_appinfo #oa_brgy').val('');
			 $('#mdl_appinfo #oa_skills').val('');
			 $('#mdl_appinfo #oa_awards').val('');
			 $('#mdl_appinfo #oa_mobile').val('');


	$("#mdl_appinfo tbody").empty();
});


$('#mdl_recform').on('show.bs.modal', function(e) {
	var oa_id = $(e.relatedTarget).data('oa_id');
    $(this).find('h5.modal-title').html('<b>' + $(e.relatedTarget).data('name') + '</b>');
    // $(this).find('#applicant_name').html('<b> :' + $(e.relatedTarget).data('name') + '</b>');
	$.getJSON(base_url + "onlineapplicant/ajax_get_info/" + oa_id, function(data) {
		$.each(data, function(index, item) {
			$('#mdl_recform #applicant_name').html(':'+item.oa_lname + ', ' + item.oa_fname + ' ' + item.oa_mname);
			$('#mdl_recform #education').html(':'+item.oa_course + ' - ' + item.oa_educremarks);
			$('#mdl_recform #eligibility').html(':'+ item.oa_eligibility);
			if(item.oa_recwork == ''){
				$('#mdl_recform #work_exp').html(': N/A');
			}else{
				$('#mdl_recform #work_exp').html(':'+ item.oa_recwork);
			}

			if(item.oa_rectraining == ''){
				$('#mdl_recform #training').html(': N/A');
			}else{
				$('#mdl_recform #training').html(':'+ item.oa_rectraining);
			}


			if(item.oa_skills == ''){
				$('#mdl_recform #skills').html(': N/A');
			}else{
				$('#mdl_recform #skills').html(':'+ item.oa_skills);
			}

			if(item.oa_awards == ''){
				$('#mdl_recform #awards').html(': N/A');
			}else{
				$('#mdl_recform #awards').html(': '+ item.oa_awards);
			}
			$('#mdl_recform #remarks_notes').html(item.ah_remarksnotes);
			$('#mdl_recform #remarks_notes_date').html(item.ah_remarksnotes_date);
			$('#mdl_recform #age').html('Age:'+ item.age+ ' y/o');
			$('#mdl_recform #appnum').html('RECRUITMENT SELECTION OF EMPLOYEES - <u>'+ item.oa_prefix + '-'+ item.oa_suffix +'</u>');
		});
	});
	// url": base_url + "onlineapplicant/ajax_get_application_status/" + oa_id,
	$.getJSON(base_url + "onlineapplicant/ajax_get_application_status/" + oa_id, function(data) {
		$.each(data, function(index, item) {
			if(item.ah_remarks == 'For Exam and Interview'){
				$('#mdl_recform #date_forexam').html(item.ah_datefiled);
				$('#mdl_recform #remarks_forexam').html('&nbsp;&nbsp;&nbsp;<i class="fa fa-check"></i>');
			}

			if(item.ah_remarks == 'For Job Interview'){
				$('#mdl_recform #date_jobinterview').html(item.ah_datefiled);
				$('#mdl_recform #remarks_jobinterview').html('&nbsp;&nbsp;&nbsp;<i class="fa fa-check"></i>');
			}
			if(item.ah_remarks == 'For Filing'){
				$('#mdl_recform #date_filing').html(item.ah_datefiled);
				$('#mdl_recform #remarks_filing').html('&nbsp;&nbsp;&nbsp;<i class="fa fa-check"></i>');
			}
			if(item.ah_remarks == 'For Regret'){
				$('#mdl_recform #date_regret').html(item.ah_datefiled);
				$('#mdl_recform #remarks_regret').html('&nbsp;&nbsp;&nbsp;<i class="fa fa-check"></i>');
			}
			if(item.ah_remarks == 'Forward to CESD'){
				$('#mdl_recform #date_forward').html(item.ah_datefiled);
				$('#mdl_recform #remarks_forward').html('&nbsp;&nbsp;&nbsp;<i class="fa fa-check"></i>');
			}
		});
	});
});


$('#mdl_recform').on('hidden.bs.modal', function(e) {
			$('#mdl_recform #applicant_name').html('');
			$('#mdl_recform #education').html('');
			$('#mdl_recform #eligibility').html('');
			$('#mdl_recform #skills').html('');
			$('#mdl_recform #awards').html('');
			$('#mdl_recform #remarks_notes').html('');
			$('#mdl_recform #remarks_notes_date').html('');
			$('#mdl_recform #age').html('');
			$('#mdl_recform #appnum').html('');

			$('#mdl_recform #date_forexam').html('');
			$('#mdl_recform #remarks_forexam').html('');

			$('#mdl_recform #date_jobinterview').html('');
			$('#mdl_recform #remarks_jobinterview').html('');

			$('#mdl_recform #date_filing').html('');
			$('#mdl_recform #remarks_filing').html('');

			$('#mdl_recform #date_regret').html('');
			$('#mdl_recform #remarks_regret').html('');

			$('#mdl_recform #date_forward').html('');
			$('#mdl_recform #remarks_forward').html('');
});


$('#mdl_addapplicationhistory').on('show.bs.modal', function(e) {
	var oa_id = $(e.relatedTarget).data('oa_id');
    $(this).find('h5.modal-title').html('<b>' + $(e.relatedTarget).data('name') + '</b>');
    $(this).find('#m_oa_id').val(oa_id);
    // $(this).find('#applicant_name').html('<b> :' + $(e.relatedTarget).data('name') + '</b>');

});





$('#mdl_sendemailforexam').on('show.bs.modal', function(e) {
		// For Exam
		var ah_id =  $('input[name=ah_id]:checked').map(function()
		{
			return $(this).val();
		}).get();


		// Job Matching
		// var oa_id =  $('input[name=oa_id]:checked').map(function()
		// {
			// return $(this).val();
		// }).get();



	// For Exam
	if(ah_id != ''){

		 $(this).find('#m_ah_id').val(ah_id);
		 $('#mdl_frm_sendemailforexam #es_date').removeAttr('readonly','readonly');
		$('#mdl_frm_sendemailforexam #es_time').removeAttr('readonly','readonly');
		$('#mdl_frm_sendemailforexam #es_venue').removeAttr('readonly','readonly');
		$('#mdl_frm_sendemailforexam button').removeAttr('disabled','disabled');
	}else{

		$('#mdl_sendemailforexam').find('#m_ah_id').val('');
		$('#mdl_frm_sendemailforexam #es_date').attr('readonly','readonly');
		$('#mdl_frm_sendemailforexam #es_time').attr('readonly','readonly');
		$('#mdl_frm_sendemailforexam #es_venue').attr('readonly','readonly');
		$('#mdl_frm_sendemailforexam button').attr('disabled','disabled');
	}


	// Job Matching
	// if(oa_id != ''){

		 // $(this).find('#m_oa_id').val(oa_id);
		 // $('#mdl_frm_sendemailforexam #es_date').removeAttr('readonly','readonly');
		// $('#mdl_frm_sendemailforexam #es_position').removeAttr('readonly','readonly');
		// $('#mdl_frm_sendemailforexam #es_time').removeAttr('readonly','readonly');
		// $('#mdl_frm_sendemailforexam #es_venue').removeAttr('readonly','readonly');
		// $('#mdl_frm_sendemailforexam button').removeAttr('disabled','disabled');
	// }else{

		// $('#mdl_sendemailforexam').find('#m_oa_id').val('');
		// $('#mdl_frm_sendemailforexam #es_position').attr('readonly','readonly');
		// $('#mdl_frm_sendemailforexam #es_date').attr('readonly','readonly');
		// $('#mdl_frm_sendemailforexam #es_time').attr('readonly','readonly');
		// $('#mdl_frm_sendemailforexam #es_venue').attr('readonly','readonly');
		// $('#mdl_frm_sendemailforexam button').attr('disabled','disabled');
	// }

});


$('#mdl_positionapplied').on('show.bs.modal', function(e) {
	var oa_id = $(e.relatedTarget).data('oa_id');
    $(this).find('#m_oa_id').val(oa_id);
    $(this).find('h5.modal-title').html('<b>' + $(e.relatedTarget).data('name') + '</b>');

	$("#m_positiondesired option").detach();
		$.getJSON(base_url + "onlineapplicant/ajax_get_appliedposition/" + oa_id, function(data) {
				$.each(data, function(index, item) {
				$("#m_positiondesired").append('<option value="'+item.v_id+'">'+item.v_position +'</option>');

				});
			});

$('#dt_positionapplied').dataTable().fnDestroy();
$('#dt_positionapplied').DataTable({

    "ajax": {
        "url": base_url + "onlineapplicant/ajax_get_application_status/" + oa_id,
        "dataSrc": ""
    },

	createdRow: function( row, data, dataIndex ) {
			$(row).find('td').attr('data-v_position', data.v_position);
			$(row).find('td').attr('data-v_desc', data.v_desc);
			$(row).find('td').attr('data-v_id', data.v_id);
		},

    "columns": [

        { "data": "v_position" },
		{ "data": "v_desc" },
		{ "data": "ah_status" },
		{ "data": "ah_remarks" }
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
    deferRender: true,
    scrollY: 380,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,

    oScroller: {
      rowHeight: 30
    }

});


});
 $('#mdl_applicationhistory #dt_positionapplied ').DataTable();

$('#mdl_applicationhistory').on('show.bs.modal', function(e) {
		var oa_id = $(e.relatedTarget).data('oa_id');
		 $(this).find('h5.modal-title').html('<b>' + $(e.relatedTarget).data('name') + '</b>');
		 $(this).find('#m_oa_id').val(oa_id);
		$('#mdl_applicationhistory #dt_positionapplied').dataTable().fnDestroy();
		// $('#mdl_applicationhistory #dt_positionapplied').empty();
		$('#mdl_applicationhistory #dt_positionapplied').DataTable({
			"ajax": {
				"url": base_url + "onlineapplicant/ajax_get_application_status/" + oa_id,
				"dataSrc": ""
			},
			"columns": [
				{ "data": "ah_position" },
				{ "data": "ah_desc" },
				{ "data": "ah_status" },
				{ "data": "ah_remarks" },
				{ "data": "ah_remarks_status" },
				{ "data": "ah_remarksdate" },
				{ "data": "ah_datefiled" },
				{ "data": "ah_islatest" }
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
			deferRender: true,
			scrollY: 380,
			scrollCollapse: true,
			scroller: true,
			scrollX: true,
			oScroller: {
			  rowHeight: 30
			}
		});


});
$('#frm_changeremarks').on('submit',function(){
	$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "onlineapplicant/ajax_addapplication/",
			data: $('#frm_changeremarks').serialize(),
			beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
                    type: 'info',
                    styling: 'bootstrap3'
                });

			},
			success: function(data) {
				$('#frm_changeremarks')[0].reset();
				$('#mdl_applicationhistory').modal('hide');
				if (data.status == "yes") {
					new PNotify({
						title: 'Success',
						text: data.content,
						type: 'success',
						styling: 'bootstrap3'
					});

					$('.alert-info .glyphicon-remove').trigger("click");
					// dt_positionapplied.ajax.reload();

					dt_onlineapplicantforaction.ajax.reload();

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
var dt_courses = $('#dt_courses').DataTable({
    "ajax": {
        "url": base_url + "onlineapplicant/ajax_get_course/",
        "dataSrc": ""
    },
		createdRow: function( row, data, dataIndex ) {
			$(row).find('td').attr('data-c_id', data.c_id);
			$(row).find('td').attr('data-c_name', data.c_name);
			$(row).find('td').attr('data-c_code', data.c_code);
			$(row).find('td').attr('data-c_category', data.c_category);

		},
    "columns": [

        { "data": "c_name" },
		{ "data": "c_code" },
		{ "data": "c_category" }
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
    deferRender: true,
    scrollY: 250,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,

    oScroller: {
      rowHeight: 30
    }

});



$('#dt_courses tbody').on('click', 'td', function () {
   $('#frm_courses #c_id').val($(this).data('c_id'));
   $('#frm_courses #c_name').val($(this).data('c_name'));
   $('#frm_courses #c_category').val($(this).data('c_category'));
   $('#frm_courses #c_code').val($(this).data('c_code'));
});


$('#frm_courses').on('submit', function(){
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "onlineapplicant/ajax_save_course/",
			data: $('#frm_courses').serialize(),
			beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
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
					$('#frm_courses')[0].reset();
					$('.close').trigger("click");
					dt_courses.ajax.reload();

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


$('#btn_deletecourse').on('click', function(){
	 $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url + "onlineapplicant/ajax_deactivate_course",
        data: $('#frm_courses').serialize(),
		beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
                    type: 'info',
                    styling: 'bootstrap3'
                });
		},

        success: function(data) {
            if (data.status == "yes") {
					$('.close').trigger("click");
                new PNotify({
                    title: 'Success',
                    text: data.content,
                    type: 'success',
                    styling: 'bootstrap3'
                });
					$('#frm_courses')[0].reset();
					$('.close').trigger("click");
					dt_courses.ajax.reload();
            } else {
					$('.close').trigger("click");
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

$('#mdl_confirmationforexam').on('show.bs.modal', function(e) {
	var checkValues =  $('input[name=oa_id]:checked').map(function()
		{
			return $(this).val();
		}).get();
		// alert(checkValues);
	// $(this).find('#m_oa_id').val(checkValues);
	// $(this).find('#m_oa_id').val($(e.relatedTarget).data('oa_id'));
	$(this).find('h5.modal-title').html('<b>' + $(e.relatedTarget).data('ah_remarks') + '</b>');
	$(this).find('#m_ah_remarks').val($(e.relatedTarget).data('ah_remarks'));
});


$('#mdl_frm_forexam').on('submit', function(){
		// alert($('#mdl_frm_forexam').serialize());
		$.ajax({
			type: "POST",
			dataType: "json",
			// url: base_url + "onlineapplicant/for_examinterview/",
			url: base_url + "onlineapplicant/ajax_updateapplicationhistory/",
			data: $('#mdl_frm_forexam').serialize(),
			beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
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
					$('.close').trigger("click");
					// dt_positionapplied.ajax.reload();
					dt_onlineapplicant.ajax.reload();

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

$('#mdl_jm_forexam').on('submit', function(){
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "onlineapplicant/ajax_jm_matching_update_and_email/",
			data: $('#mdl_jm_forexam').serialize(),
			beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
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
					$('.close').trigger("click");
					// dt_positionapplied.ajax.reload();
					dt_onlineapplicant.ajax.reload();

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



var dt_onlineapplicantforaction = $('#dt_onlineapplicantforaction').DataTable({

    "ajax": {
        "url": base_url + "onlineapplicant/ajax_get_application_foraction/",
        "dataSrc": ""
    },

    "columns": [

	  { "data": function(data, type, row, meta) {
					// return '<center><input type="checkbox" value="' + data.ah_id + '" id="ah_id" name="ah_id"></center>';
					if(data.ah_status == 'Pending'){
						return '<center><input type="checkbox" value="' + data.ah_id + '" id="ah_id" name="ah_id"></center>';
					}else{
						return '<center><i class="green fa fa-check"></i></center>';
					}
            }
        }, // 1

        { "data": "oa_num" },
		 	{ "data": function(data, type, row, meta) {
                return '<a href="#" data-toggle="modal" data-target="#mdl_appinfo" data-oa_id="' + data.oa_id + '" data-name="' + data.oa_name + '">' + data.oa_name + '</a>';
            }
        }, //3
		{ "data": "oa_positionapplied" },
		{ "data": "ah_remarks" },
		// { "data": function(data, type, row, meta) {
                // return '<a href="#" data-toggle="modal" data-target="#mdl_changeremarks" data-oa_id="' + data.oa_id + '" data-name="' + data.oa_name + '"><i class="fa fa-pencil"></i> '+ data.ah_remarks +'</a>';
            // }
        // },
		//3
		{ "data": function(data, type, row, meta) {
                return '<a href="#" data-toggle="modal" data-target="#mdl_applicationhistory" data-oa_id="' + data.oa_id + '" data-name="' + data.oa_name + '"><i class="fa fa-eye"></i> View</a>';
            }
        }, //3
		{ "data": "ah_status" },
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
    deferRender: true,
    scrollY: 380,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,

    oScroller: {
      rowHeight: 30
    }

});

$('#mdl_applicantforaction').on('show.bs.modal', function(e) {
	var checkValues =  $('input[name=ah_id]:checked').map(function()
		{
			return $(this).val();
		}).get();
		if(checkValues.length > 0){
			$('#mdl_applicantforaction #btn_disapproved').removeAttr('disabled','disabled');
				$('#mdl_applicantforaction #btn_approved').removeAttr('disabled','disabled');
			// alert(checkValues);
			$(this).find('#m_ah_id').val(checkValues);
			// $(this).find('#m_oa_id').val($(e.relatedTarget).data('oa_id'));
			$(this).find('h5.modal-title').html('<b>' + $(e.relatedTarget).data('title') + '</b>');
			// $(this).find('#m_ah_remarks').val($(e.relatedTarget).data('ah_remarks'));
		}else{

				new PNotify({
						title: 'Warning',
						text: 'Please select applicant',
						type: 'error',
						styling: 'bootstrap3'
					});
				$('#mdl_applicantforaction #btn_disapproved').attr('disabled','disabled');
				$('#mdl_applicantforaction #btn_approved').attr('disabled','disabled');
				// $('#mdl_applicantforaction').modal('hide');
		}
});

$('#mdl_sendemailforexam_individual').on('show.bs.modal', function(e) {
	$(this).find('#m_ah_id').val($(e.relatedTarget).data('ah_id'));
	$(this).find('h5.modal-title').html('<b>' + $(e.relatedTarget).data('name') + '</b>');
});

$('#mdl_forjobinterview').on('show.bs.modal', function(e) {
	$(this).find('#m_ah_id').val($(e.relatedTarget).data('ah_id'));
	$(this).find('h5.modal-title').html('<b>' + $(e.relatedTarget).data('name') + '</b><br/> <small>For Job Interview</small>');
});

$('#mdl_forfilling_individual').on('show.bs.modal', function(e) {
	$(this).find('#m_ah_id').val($(e.relatedTarget).data('ah_id'));
	$(this).find('h5.modal-title').html('<b>' + $(e.relatedTarget).data('name') + ' For Filling</b>');
});

$('#mdl_forforward_individual').on('show.bs.modal', function(e) {
	$(this).find('#m_ah_id').val($(e.relatedTarget).data('ah_id'));
	$(this).find('h5.modal-title').html('<b>' + $(e.relatedTarget).data('name') + ' For Forward to CESD</b>');
});


$('#mdl_forcityschools_individual').on('show.bs.modal', function(e) {
	$(this).find('#m_ah_id').val($(e.relatedTarget).data('ah_id'));
	$(this).find('h5.modal-title').html('<b>' + $(e.relatedTarget).data('name') + ' For Forward to City Schools</b>');
});

$('#mdl_forregret_individual').on('show.bs.modal', function(e) {
	$(this).find('#m_ah_id').val($(e.relatedTarget).data('ah_id'));
	$(this).find('h5.modal-title').html('<b>' + $(e.relatedTarget).data('name') + ' For Regret</b>');

});

$('#mdl_addresult').on('show.bs.modal', function(e) {
	$(this).find('#m_ah_id').val($(e.relatedTarget).data('ah_id'));
	$(this).find('h5.modal-title').html('<b> ' + $(e.relatedTarget).data('name') + '</b>');
	var ah_remarks = $(e.relatedTarget).data('ah_remarks');

	$(this).find('label.ah_status').html(ah_remarks + ' Result?');
		$("#m_ah_remarks_status option").detach();
	if(ah_remarks == 'For Exam and Interview'){
		$("#m_ah_remarks_status").append("<option>-- Choose --</option><option value='PASSED[1]'>PASSED[1]</option><option value='PASSED[2]'>PASSED[2]</option><option value='PASSED[3]'>PASSED[3]</option><option value='FAILED'>FAILED</option>");
	}else if(ah_remarks == 'For Filing' || ah_remarks == 'Forward to CESD'){
		$("#m_ah_remarks_status").append("<option>-- Choose --</option><option value='PASSED[1]'>PASSED[1]</option><option value='PASSED[2]'>PASSED[2]</option><option value='PASSED[3]'>PASSED[3]</option>");
	}

});

$('#btn_disapproved').on('click', function(){

	var action = {
		ah_id : $('#m_ah_id').val(),
		ah_status : 'Disapproved'
	}

	hrofficeraction(action);
});


$('#btn_approved').on('click', function(){
		var action = {
		ah_id : $('#m_ah_id').val(),
		ah_status : 'Approved'
	}

	hrofficeraction(action);
});

function hrofficeraction(action){

	$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "onlineapplicant/ajax_action_for_applicant/",
			data: action,
			beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
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
					$('#dt_onlineapplicantforaction').dataTable().fnDestroy();
					$('#dt_onlineapplicantforaction').DataTable({

						"ajax": {
							"url": base_url + "onlineapplicant/ajax_get_application_foraction_bystatus/" + $('#ah_status').val(),
							"dataSrc": ""
						},

						"columns": [

							{ "data": function(data, type, row, meta) {
									if(data.ah_status == 'Pending'){
										return '<center><input type="checkbox" value="' + data.ah_id + '" id="ah_id" name="ah_id"></center>';
									}else{
									  return '';
									}
								}
							},
							{ "data": "oa_num" },
								{ "data": function(data, type, row, meta) {
									return '<a href="#" data-toggle="modal" data-target="#mdl_appinfo" data-oa_id="' + data.oa_id + '" data-name="' + data.oa_name + '">' + data.oa_name + '</a>';
								}
							}, //3
							{ "data": "oa_positionapplied" },
							{ "data": "ah_remarks" },
								{ "data": function(data, type, row, meta) {
									return '<a href="#" data-toggle="modal" data-target="#mdl_applicationhistory" data-oa_id="' + data.oa_id + '" data-name="' + data.oa_name + '"><i class="fa fa-eye"></i> View</a>';
								}
							}, //3
							{ "data": "ah_status" },
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
						deferRender: true,
						scrollY: 380,
						scrollCollapse: true,
						scroller: true,
						scrollX: true,
						oScroller: {
						  rowHeight: 30
						}
					});

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
}


$('#frm_jobmatch').on('submit', function(){
	 $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url + "onlineapplicant/ajax_save_job_matching",
        data: $('#frm_jobmatch').serialize(),
		beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
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

				 $('#frm_jobmatch')[0].reset();
				dt_requestingoffice.ajax.reload();

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

$('#frm_encodeapplicant').on('submit', function(){
		var checkValues =  $('input[name=v_id]:checked').map(function()
			{
				return $(this).val();
			}).get();


		var oa_course = $("#oa_course").val();

	if(checkValues.length != 0 || checkValues.length > 0){
		$.ajax({
        type: "POST",
        dataType: "json",
        url: base_url + "onlineapplicant/save_applicant",
        data: $('#frm_encodeapplicant').serialize() + '&checkValues=' + checkValues + '&oa_course=' + oa_course,
		beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
                    type: 'info',
                    styling: 'bootstrap3'
                });
		},

        success: function(data) {
            if (data.status == "yes") {
				$('.alert-info .glyphicon-remove').trigger("click");
                new PNotify({
                    title: 'Success',
                    text: data.content,
                    type: 'success',
                    styling: 'bootstrap3'
                });

				 $('#frm_encodeapplicant')[0].reset();

				 $('#oa_fname').attr('disabled', 'disabled');
				$('#oa_mname').attr('disabled', 'disabled');
				$('#oa_lname').attr('disabled', 'disabled');
				$('#oa_extname').attr('disabled', 'disabled');
				$('#oa_gender').attr('disabled', 'disabled');
				$('#oa_province').attr('disabled', 'disabled');
				$('#oa_city').attr('disabled', 'disabled');

				$('#oa_brgy').attr('disabled', 'disabled');
				$('#oa_street').attr('disabled', 'disabled');
				$('#oa_bdate').attr('disabled', 'disabled');
				$('#oa_course').attr('disabled', 'disabled');
				$('#oa_educremarks').attr('disabled', 'disabled');
				$('#oa_eligibility').attr('disabled', 'disabled');
				$('#oa_school').attr('disabled', 'disabled');
				$('#oa_postgraduate').attr('disabled', 'disabled');
				$('#oa_postgraduateremarks').attr('disabled', 'disabled');
				$('#oa_mobile').attr('disabled', 'disabled');
				$('#oa_recwork').attr('disabled', 'disabled');
				$('#oa_rectraining').attr('disabled', 'disabled');
				$('#oa_skills').attr('disabled', 'disabled');
				$('#oa_awards').attr('disabled', 'disabled');
				$('#btn_encodeapplicant').attr('disabled', 'disabled');


				// dt_requestingoffice.ajax.reload();

            } else {
				$('.alert-info .glyphicon-remove').trigger("click");
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
	}else{
		// $('.alert-info .glyphicon-remove').trigger("click");
				new PNotify({
					title: 'Error',
                    text: 'Please select position.',
                    type: 'error',
                    styling: 'bootstrap3'
                });
				return false;
	}

});



$('#btn_reset_vacancies').on('click', function(){
	 $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url + "onlineapplicant/ajax_reset_vacancy",
       // data: $('#frm_vacancies').serialize(),
		beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
                    text: 'Please wait...',
                    type: 'info',
                    styling: 'bootstrap3'
                });
		},

        success: function(data) {
            if (data.status == "yes") {
				$('.close').trigger("click");
                new PNotify({
                    title: 'Success',
                    text: data.content,
                    type: 'success',
                    styling: 'bootstrap3'
                });

				dt_vacancies.ajax.reload();
				$('#v_id').val('');
				$('#v_position').val('');
				$('#v_desc').val('');


            } else {
				$('.close').trigger("click");
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


//TAKING PHOTO

$('#takeaphoto').on('show.bs.modal', function(e) {
	var name =   $(e.relatedTarget).data('title');
	$('.oa_id').val($(e.relatedTarget).data('oa_id'));
	// $('.emp_fullname').val($(e.relatedTarget).data('a_fullname'));
});

$('#btn_save_userpics').on('click', function() {
    $( ".photobooth ul li.trigger" ).trigger( "click" );
});

$('#takeaphoto').on('shown.bs.modal', function () {
    $( ".photobooth ul li.crop" ).trigger( "click" );
});



$('#frm_editappinfo').on('submit', function(){
	$('#editappinfo').modal('hide');
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "onlineapplicant/update_applicant_info/",
		data: $('#frm_editappinfo').serialize(),
			beforeSend: function(){
			 new PNotify({
                    title: 'Processing..',
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
				dt_onlineapplicant.ajax.reload();
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

$('#btn_save_userpics').on('click', function(){

    // function a() {
	var data_userpics =
		{
			userpics: $('#userpics').attr('src'),
			oa_id: $('#oa_id').val(),
			// hid_fullname: $('#emp_fullname').val(),
			'pic': 1
		};
		// alert(data_userpics);
    // }
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "onlineapplicant/asaveimage/",
		data: data_userpics,
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


$('#editappinfo').on('show.bs.modal', function(e) {
	var oa_id = $(e.relatedTarget).data('oa_id');
	var city = '';
	var brgy = '';
    $(this).find('h3.modal-title').html('<b> Edit Applicant Information</b>');

	$("#frm_editappinfo #oa_course").empty();
	$("#frm_editappinfo #oa_course").append('<option value="Elementary">Elementary</option><option value="High School">High School</option><option value="Vocational (2 years)">Vocational (2 years)</option>'+courses);

	$('#frm_editappinfo #oa_id').val(oa_id);

	$("#frm_editappinfo #oa_province").empty();
	$("#frm_editappinfo #oa_province").append(provinces);
	// $.getJSON(base_url + "onlineapplicant/ajax_get_province/", function(data) {
		// $.each(data, function(index, item) {
			// $("#frm_editappinfo #oa_province").append("<option value='"+item.p_id+"'>"+item.p_name+"</option>");
		// });
	// });

	$("#frm_editappinfo #oa_city").empty();
	$("#frm_editappinfo #oa_city").append(cities);


	$.getJSON(base_url + "onlineapplicant/ajax_get_info/" + oa_id, function(data) {
		$.each(data, function(index, item) {

			$('#frm_editappinfo #oa_lname').val(item.oa_lname);
			$('#frm_editappinfo #oa_fname').val(item.oa_fname);
			$('#frm_editappinfo #oa_mname').val(item.oa_mname);
			$('#frm_editappinfo #oa_extname').val(item.oa_extname);
			$('#frm_editappinfo #oa_gender').val(item.oa_gender);
			$('#frm_editappinfo #oa_province').val(item.oa_province);
			$('#frm_editappinfo #oa_city').val(item.oa_city);
			// $('#frm_editappinfo #oa_brgy').val(item.oa_brgy);
			brgy = item.oa_brgy;
			$('#frm_editappinfo #oa_street').val(item.oa_street);
			$('#frm_editappinfo #oa_bdate').val(item.oa_bdate);
			$('#frm_editappinfo #oa_email').val(item.oa_email);
			$('#frm_editappinfo #oa_course').val(item.oa_course);
			$('#frm_editappinfo #oa_educremarks').val(item.oa_educremarks);
			$('#frm_editappinfo #oa_eligibility').val(item.oa_eligibility);
			$('#frm_editappinfo #oa_school').val(item.oa_school);
			$('#frm_editappinfo #oa_postgraduate').val(item.oa_postgraduate);
			$('#frm_editappinfo #oa_postgraduateremarks').val(item.oa_postgraduateremarks);
			$('#frm_editappinfo #oa_mobile').val(item.oa_mobile);
			$('#frm_editappinfo #oa_recwork').val(item.oa_recwork);
			$('#frm_editappinfo #oa_rectraining').val(item.oa_rectraining);
			$('#frm_editappinfo #oa_skills').val(item.oa_skills);
			$('#frm_editappinfo #oa_awards').val(item.oa_awards);


			city = $('#frm_editappinfo #oa_city').val();
				// alert(city);



		});

		if(city == '3'){

			$('#frm_editappinfo div  #oa_brgy').detach();

			$("#frm_editappinfo div .brgy").append("<select class='form-control' id='oa_brgy' name='oa_brgy'></select>");

			$.getJSON(base_url + "onlineapplicant/ajax_get_brgys/"+ city, function(data) {
				$("#frm_editappinfo #oa_brgy").append("<select class='form-control' id='oa_brgy' name='oa_brgy'>");
					$.each(data, function(index, item) {
						$("#frm_editappinfo #oa_brgy").append("<option value='"+item.b_id+"'>"+item.b_name+"</option>");
					});

				$("#frm_editappinfo #oa_brgy").append("</select>");
				$('#frm_editappinfo #oa_brgy').val(brgy);
			});

		}else{
			// $('#frm_editappinfo .brgy #oa_brgy').detach();
			// $("#frm_editappinfo div .brgy").append("<input type='text' class='form-control' id='oa_brgy' name='oa_brgy'>");4
			$('#frm_editappinfo #oa_brgy').val(brgy);
		}


	});

});



$('#editappinfo').on('hidden.bs.modal', function(e) {

	$("#frm_editappinfo #oa_course").empty();

	$("#frm_editappinfo #oa_province").empty();

	$("#frm_editappinfo #oa_city").empty();

	$('#frm_editappinfo #oa_brgy').empty();

	$('#frm_editappinfo #oa_lname').val('');
	$('#frm_editappinfo #oa_fname').val('');
	$('#frm_editappinfo #oa_mname').val('');
	$('#frm_editappinfo #oa_extname').val('');
	$('#frm_editappinfo #oa_gender').val('');
	$('#frm_editappinfo #oa_province').val('');
	$('#frm_editappinfo #oa_city').val('');
	$('#frm_editappinfo #oa_street').val('');
	$('#frm_editappinfo #oa_bdate').val('');
	$('#frm_editappinfo #oa_email').val('');
	$('#frm_editappinfo #oa_course').val('');
	$('#frm_editappinfo #oa_educremarks').val('');
	$('#frm_editappinfo #oa_eligibility').val('');
	$('#frm_editappinfo #oa_school').val('');
	$('#frm_editappinfo #oa_postgraduate').val('');
	$('#frm_editappinfo #oa_postgraduateremarks').val('');
	$('#frm_editappinfo #oa_mobile').val('');
	$('#frm_editappinfo #oa_recwork').val('');
	$('#frm_editappinfo #oa_rectraining').val('');
	$('#frm_editappinfo #oa_skills').val('');
	$('#frm_editappinfo #oa_awards').val('');

});



var dt_personnelrequestlist = $('#dt_personnelrequestlist').DataTable( {
    "ajax": {
        "url": base_url + "onlineapplicant/ajax_get_reqeuestlist",
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
			{ "data": function (data, type, row, meta) {
						if(data.jm_hrstaff == 'Pending'){
							return '<i> **Pending</i>';
						}else if(data.jm_hrstaff == 'Approved'){
							return '<i class="green">'+data.jm_hrstaff_actiondate+'</i>';
						}else if(data.jm_hrstaff == 'Disapproved'){
							return '<i class="red">'+data.jm_hrstaff_actiondate+'</i>';
						}else{
							return '-';
						}

					}
			},
			{ "data": function (data, type, row, meta) {
						if(data.jm_hrmofficer == 'Pending'){
							return '<i> **Pending</i>';
						}else if(data.jm_hrmofficer == 'Approved'){
							return '<i class="green">'+data.jm_hrmofficer_actiondate+'</i>';
						}else if(data.jm_hrmofficer == 'Disapproved'){
							return '<i class="red">'+data.jm_hrmofficer_actiondate+'</i>';
						}else{
							return '-';
						}

					}
			},
			{ "data": function (data, type, row, meta) {
						if(data.jm_hrhead == 'Pending'){
							return '<i> **Pending</i>';
						}else if(data.jm_hrhead == 'Approved'){
							return '<i class="green">'+data.jm_hrhead_actiondate+'</i>';
						}else if(data.jm_hrhead == 'Disapproved'){
							return '<i class="red">'+data.jm_hrhead_actiondate+'</i>';
						}else{
							return '-';
						}

					}
			},
            { "data": "jm_projectduration"},
			{ "data": "jm_course" },
            { "data": "jm_position" },
			{ "data": "jm_emp_status" },
			{ "data": function (data, type, row, meta) {
						if(data.jm_iscancel == 'NO'){

							if(	a_profile == 'admin asst ii-staff' && data.jm_hrstaff == 'Pending'){
								return '<a class="fa fa-gavel" data-toggle="modal" data-target="#modal_approverequest" data-id="'+data.jm_id+'" ></a></a> |  <a class="fa fa-remove" data-toggle="modal" data-target="#mdl_cancelrequest" data-id="'+data.jm_id+'"></a> | <a target="_blank" href="'+base_url+'onlineapplicant/requestform/'+data.jm_id+'" class="fa fa-print"></a>';
							}else if(a_profile == 'hrmo iv-records' && data.jm_hrmofficer == 'Pending' && data.jm_hrstaff == 'Approved'){
								return '<a class="fa fa-gavel" data-toggle="modal" data-target="#modal_approverequest" data-id="'+data.jm_id+'" ></a></a> |  <a class="fa fa-remove" data-toggle="modal" data-target="#mdl_cancelrequest" data-id="'+data.jm_id+'"></a> | <a target="_blank" href="'+base_url+'onlineapplicant/requestform/'+data.jm_id+'" class="fa fa-print"></a>';
							} else if (a_profile == 'chrdo officer' && data.jm_hrhead == 'Pending' && data.jm_hrstaff == 'Approved' && data.jm_hrmofficer == 'Approved'){
								return '<a class="fa fa-gavel" data-toggle="modal" data-target="#modal_approverequest" data-id="'+data.jm_id+'" ></a> |  <a class="fa fa-remove" data-toggle="modal" data-target="#mdl_cancelrequest" data-id="'+data.jm_id+'"></a> | <a target="_blank" href="'+base_url+'onlineapplicant/requestform/'+data.jm_id+'" class="fa fa-print"></a>';
							}else{
									if(a_profile == 'admin asst ii-staff'){
										return '<i>'+data.jm_hrstaff+'</i> | <a target="_blank" href="'+base_url+'onlineapplicant/requestform/'+data.jm_id+'" class="fa fa-print"></a>';
									}else if(a_profile == 'hrmo iv-records' && data.jm_hrstaff == 'Approved'){
										return '<i>'+data.jm_hrmofficer+'</i> | <a target="_blank" href="'+base_url+'onlineapplicant/requestform/'+data.jm_id+'" class="fa fa-print"></a>';
									}else if(a_profile == 'chrdo officer' && data.jm_hrmofficer == 'Approved'){
										return '<i>'+data.jm_hrhead+'</i> | <a target="_blank" href="'+base_url+'onlineapplicant/requestform/'+data.jm_id+'" class="fa fa-print"></a>';
									}else{
										return ' - - -';
									}
								}

						}else{
							return 'Cancelled |  <a target="_blank" href="'+base_url+'onlineapplicant/requestform/'+data.jm_id+'" class="fa fa-print"></a>';
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
            leftColumns: 6,
            rightColumns: 1
        },
        autoWidth: false,
        //stateSave: true
  });


  	$('#modal_approverequest').on('show.bs.modal', function(e) {
		$('#modal_approverequest #m_jm_id').val($(e.relatedTarget).data('id'));
	});

  	$('#mdl_cancelrequest').on('show.bs.modal', function(e) {
		$('#mdl_cancelrequest #jm_id').val($(e.relatedTarget).data('id'));
	});

	$('#disapproved_request').on('click', function(){
		// var segment_url = 'onlineapplicant/disapproved_request';
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + 'onlineapplicant/disapproved_request',
			data: $('#frm_request').serialize(),
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

					$('#modal_approverequest').modal('hide');
					setTimeout(function(){
						$('.alert-success .glyphicon-remove').trigger("click");
					}, 3000);
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

	$('#approved_request').on('click', function(){
		// var segment_url = 'onlineapplicant/approved_request';
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + 'onlineapplicant/approved_request',
			data: $('#frm_request').serialize(),
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

					$('#modal_approverequest').modal('hide');
					setTimeout(function(){
						$('.alert-success .glyphicon-remove').trigger("click");
					}, 3000);

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

$('#mdl_cancelrequest #btn_canceljm').on('click', function(){
	var jm_id = $('#mdl_cancelrequest #jm_id').val();
	$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + 'onlineapplicant/ajax_cancel_request/' + jm_id,
			// data: $('#frm_request').serialize(),
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

					$('#mdl_cancelrequest').modal('hide');
					setTimeout(function(){
						$('.alert-success .glyphicon-remove').trigger("click");
					}, 3000);

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
