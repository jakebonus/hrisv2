var childtable = $('#datatable_employee_children').DataTable( {
    "ajax": {
        "url": base_url + "employee/ajax_get_forapproval_children",
        "dataSrc": ""
    },
        "columns": [
			{ "data": function (data, type, row, meta) { return '<input type="checkbox">'} 
			},
            { "data": "fullname" },
            { "data": "o_code" },
            { "data": "a_status" },
            { "data": "child_name" },
            { "data": "c_birthdate" },
            { "data": function (data, type, row, meta) { if(data.c_forapproval == '1'){ return 'New'} if (data.c_forapproval == '2'){ return 'Updated'} if (data.c_forapproval == '3'){ return 'Delete'}} 
			}, 
			{ "data": function (data, type, row, meta) { 																	if(data.c_forapproval == '1'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation" data-title="'+data.fullname+'" data-c_id="' + data.c_id +'" data-c_forapproval="' + data.c_forapproval +'"> Approve </a>'} 																											if (data.c_forapproval == '2'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation" data-title="'+data.fullname+'" data-c_id="' + data.c_id +'" data-c_forapproval="' + data.c_forapproval +'"> Approve </a>'} 																											if (data.c_forapproval == '3'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation" data-title="'+data.fullname+'" data-c_id="' + data.c_id +'" data-c_forapproval="' + data.c_forapproval +'"> Approve </a>'}} 
			},

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

 $('#frm_approval_confirmation').on('show.bs.modal', function(e) {
		$('.p_title').html("Do you want to approved <b>" + $(e.relatedTarget).data('title')+ "</b>'s changes?");
		$('.m_c_id').val($(e.relatedTarget).data('c_id'));
		$('.m_c_forapproval').val($(e.relatedTarget).data('c_forapproval'));
 });
 $('#frm_childapproved').on('submit', function(){
	 $.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/apply_approved_child_changes/",
		data: $('#frm_childapproved').serialize(),
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
 
 // Education 
 
 var educationtable = $('#datatable_employee_education').DataTable( {
    "ajax": {
        "url": base_url + "employee/ajax_get_forapproval_education",
        "dataSrc": ""
    },
        "columns": [
			{ "data": function (data, type, row, meta) { return '<input type="checkbox">'} 
			},
            { "data": "fullname" },
            { "data": "o_code" },
            { "data": "a_status" },
            { "data": "pi_schoolname" },
            { "data": "date" },
            { "data": function (data, type, row, meta) { if(data.pi_forapproval == '1'){ return 'New'} if (data.pi_forapproval == '2'){ return 'Updated'} if (data.pi_forapproval == '3'){ return 'Delete'}} 
			}, 
			{ "data": function (data, type, row, meta) { 																	if(data.pi_forapproval == '1'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation_education" data-title="'+data.fullname+'" data-e_id="' + data.e_id +'" data-pi_forapproval="' + data.pi_forapproval +'"> Approve </a>'} 																											if (data.pi_forapproval == '2'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation_education" data-title="'+data.fullname+'" data-e_id="' + data.e_id +'" data-pi_forapproval="' + data.pi_forapproval +'"> Approve </a>'} 																											if (data.pi_forapproval == '3'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation_education" data-title="'+data.fullname+'" data-e_id="' + data.e_id +'" data-pi_forapproval="' + data.pi_forapproval +'"> Approve </a>'}} 
			},

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
 
 $('#frm_approval_confirmation_education').on('show.bs.modal', function(e) {
		$('.p_title').html("Do you want to approved <b>" + $(e.relatedTarget).data('title')+ "</b>'s changes?");
		$('.m_e_id').val($(e.relatedTarget).data('e_id'));
		$('.m_pi_forapproval').val($(e.relatedTarget).data('pi_forapproval'));
 });
 $('#frm_educationapproved').on('submit', function(){
	 $.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/apply_approved_education_changes/",
		data: $('#frm_educationapproved').serialize(),
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
 
 
 
// Eligibility 
 var educationtable = $('#datatable_employee_eligibility').DataTable( {
    "ajax": {
        "url": base_url + "employee/ajax_get_forapproval_eligibility",
        "dataSrc": ""
    },
        "columns": [
			{ "data": function (data, type, row, meta) { return '<input type="checkbox">'} 
			},
            { "data": "fullname" },
            { "data": "o_code" },
            { "data": "a_status" },
            { "data": "eligibility" },
            { "data": "el_rating" },
            { "data": function (data, type, row, meta) { if(data.el_forapproval == '1'){ return 'New'} if (data.el_forapproval == '2'){ return 'Updated'} if (data.el_forapproval == '3'){ return 'Delete'}} 
			}, 
			{ "data": function (data, type, row, meta) { 																	if(data.el_forapproval == '1'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation_eligibility" data-title="'+data.fullname+'" data-el_id="' + data.el_id +'" data-el_forapproval="' + data.el_forapproval +'"> Approve </a>'} 																											if (data.el_forapproval == '2'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation_eligibility" data-title="'+data.fullname+'" data-el_id="' + data.el_id +'" data-el_forapproval="' + data.el_forapproval +'"> Approve </a>'} 																											if (data.el_forapproval == '3'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation_eligibility" data-title="'+data.fullname+'" data-el_id="' + data.el_id +'" data-el_forapproval="' + data.el_forapproval +'"> Approve </a>'}} 
			},

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
 
 $('#frm_approval_confirmation_eligibility').on('show.bs.modal', function(e) {
		$('.p_title').html("Do you want to approved <b>" + $(e.relatedTarget).data('title')+ "</b>'s changes?");
		$('.m_el_id').val($(e.relatedTarget).data('el_id'));
		$('.m_el_forapproval').val($(e.relatedTarget).data('el_forapproval'));
 });
 $('#frm_eligibilityapproved').on('submit', function(){
	 $.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/apply_approved_eligibility_changes/",
		data: $('#frm_eligibilityapproved').serialize(),
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
 
 
 // Work exp
 
 var educationtable = $('#datatable_employee_workexp').DataTable( {
    "ajax": {
        "url": base_url + "employee/ajax_get_forapproval_workexp",
        "dataSrc": ""
    },
        "columns": [
			{ "data": function (data, type, row, meta) { return '<input type="checkbox">'} 
			},
            { "data": "fullname" },
            { "data": "o_code" },
            { "data": "a_status" },
            { "data": "p_company" },
            { "data": "p_position" },    
			{ "data": "date" },
            { "data": function (data, type, row, meta) { if(data.p_forapproval == '1'){ return 'New'} if (data.p_forapproval == '2'){ return 'Updated'} if (data.p_forapproval == '3'){ return 'Delete'}} 
			}, 
			{ "data": function (data, type, row, meta) { 																	if(data.p_forapproval == '1'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation_workexp" data-title="'+data.fullname+'" data-w_id="' + data.w_id +'" data-p_forapproval="' + data.p_forapproval +'"> Approve </a>'} 																											if (data.p_forapproval == '2'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation_workexp" data-title="'+data.fullname+'" data-w_id="' + data.w_id +'" data-p_forapproval="' + data.p_forapproval +'"> Approve </a>'} 																											if (data.p_forapproval == '3'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation_workexp" data-title="'+data.fullname+'" data-w_id="' + data.w_id +'" data-p_forapproval="' + data.p_forapproval +'"> Approve </a>'}} 
			},

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
 
 $('#frm_approval_confirmation_workexp').on('show.bs.modal', function(e) {
		$('.p_title').html("Do you want to approved <b>" + $(e.relatedTarget).data('title')+ "</b>'s changes?");
		$('.m_w_id').val($(e.relatedTarget).data('w_id'));
		$('.m_p_forapproval').val($(e.relatedTarget).data('p_forapproval'));
 });
 $('#frm_workexpapproved').on('submit', function(){
	 $.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/apply_approved_workexp_changes/",
		data: $('#frm_workexpapproved').serialize(),
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
 
 
 // Voluntary Work exp
 
 var educationtable = $('#datatable_employee_volworkexp').DataTable( {
    "ajax": {
        "url": base_url + "employee/ajax_get_forapproval_volworkexp",
        "dataSrc": ""
    },
        "columns": [
			{ "data": function (data, type, row, meta) { return '<input type="checkbox">'} 
			},
            { "data": "fullname" },
            { "data": "o_code" },
            { "data": "a_status" },
            { "data": "vw_name" },
            { "data": "vw_work" },    
			{ "data": "date" },
            { "data": function (data, type, row, meta) { if(data.vw_forapproval == '1'){ return 'New'} if (data.vw_forapproval == '2'){ return 'Updated'} if (data.vw_forapproval == '3'){ return 'Delete'}} 
			}, 
			{ "data": function (data, type, row, meta) { 																	if(data.vw_forapproval == '1'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation_volworkexp" data-title="'+data.fullname+'" data-vw_id="' + data.vw_id +'" data-vw_forapproval="' + data.vw_forapproval +'"> Approve </a>'} 																											if (data.vw_forapproval == '2'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation_volworkexp" data-title="'+data.fullname+'" data-vw_id="' + data.vw_id +'" data-vw_forapproval="' + data.vw_forapproval +'"> Approve </a>'} 																											if (data.vw_forapproval == '3'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation_volworkexp" data-title="'+data.fullname+'" data-vw_id="' + data.vw_id +'" data-vw_forapproval="' + data.vw_forapproval +'"> Approve </a>'}} 
			},

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
 
 $('#frm_approval_confirmation_volworkexp').on('show.bs.modal', function(e) {
		$('.p_title').html("Do you want to approved <b>" + $(e.relatedTarget).data('title')+ "</b>'s changes?");
		$('.m_vw_id').val($(e.relatedTarget).data('vw_id'));
		$('.m_vw_forapproval').val($(e.relatedTarget).data('vw_forapproval'));
 });
 $('#frm_volworkexpapproved').on('submit', function(){
	 $.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/apply_approved_volworkexp_changes/",
		data: $('#frm_volworkexpapproved').serialize(),
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
 
 // Training
 var educationtable = $('#datatable_employee_training').DataTable( {
    "ajax": {
        "url": base_url + "employee/ajax_get_forapproval_training",
        "dataSrc": ""
    },
        "columns": [
			{ "data": function (data, type, row, meta) { return '<input type="checkbox">'} 
			},
            { "data": "fullname" },
            { "data": "o_code" },
            { "data": "a_status" },
            { "data": "t_seminar" },
            { "data": "t_hoursno" },    
			{ "data": "date" },
            { "data": function (data, type, row, meta) { if(data.t_forapproval == '1'){ return 'New'} if (data.t_forapproval == '2'){ return 'Updated'} if (data.t_forapproval == '3'){ return 'Delete'}} 
			}, 
			{ "data": function (data, type, row, meta) { 																	if(data.t_forapproval == '1'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation_training" data-title="'+data.fullname+'" data-t_id="' + data.t_id +'" data-t_forapproval="' + data.t_forapproval +'"> Approve </a>'} 																											if (data.t_forapproval == '2'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation_training" data-title="'+data.fullname+'" data-t_id="' + data.t_id +'" data-t_forapproval="' + data.t_forapproval +'"> Approve </a>'} 																											if (data.t_forapproval == '3'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation_training" data-title="'+data.fullname+'" data-t_id="' + data.t_id +'" data-t_forapproval="' + data.t_forapproval +'"> Approve </a>'}} 
			},

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
 
 $('#frm_approval_confirmation_training').on('show.bs.modal', function(e) {
		$('.p_title').html("Do you want to approved <b>" + $(e.relatedTarget).data('title')+ "</b>'s changes?");
		$('.m_t_id').val($(e.relatedTarget).data('t_id'));
		$('.m_t_forapproval').val($(e.relatedTarget).data('t_forapproval'));
 });
 $('#frm_trainingapproved').on('submit', function(){
	 $.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/apply_approved_training_changes/",
		data: $('#frm_trainingapproved').serialize(),
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
 
 
 // Skills
 var educationtable = $('#datatable_employee_skillsapproved').DataTable( {
    "ajax": {
        "url": base_url + "employee/ajax_get_forapproval_skills",
        "dataSrc": ""
    },
        "columns": [
			{ "data": function (data, type, row, meta) { return '<input type="checkbox">'} 
			},
            { "data": "fullname" },
            { "data": "o_code" },
            { "data": "a_status" },
            { "data": "sh_skills" }, 
            { "data": function (data, type, row, meta) { if(data.sh_forapproval == '1'){ return 'New'} if (data.sh_forapproval == '2'){ return 'Updated'} if (data.sh_forapproval == '3'){ return 'Delete'}} 
			}, 
			{ "data": function (data, type, row, meta) { 																	if(data.sh_forapproval == '1'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation_skills" data-title="'+data.fullname+'" data-sh_id="' + data.sh_id +'" data-sh_forapproval="' + data.sh_forapproval +'"> Approve </a>'} 																											if (data.sh_forapproval == '2'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation_skills" data-title="'+data.fullname+'" data-sh_id="' + data.sh_id +'" data-sh_forapproval="' + data.sh_forapproval +'"> Approve </a>'} 																											if (data.sh_forapproval == '3'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation_skills" data-title="'+data.fullname+'" data-sh_id="' + data.sh_id +'" data-sh_forapproval="' + data.sh_forapproval +'"> Approve </a>'}} 
			},

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
 
 $('#frm_approval_confirmation_skills').on('show.bs.modal', function(e) {
		$('.p_title').html("Do you want to approved <b>" + $(e.relatedTarget).data('title')+ "</b>'s changes?");
		$('.m_sh_id').val($(e.relatedTarget).data('sh_id'));
		$('.m_sh_forapproval').val($(e.relatedTarget).data('sh_forapproval'));
 });
 $('#frm_skillsapproved').on('submit', function(){
	 $.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/apply_approved_skills_changes/",
		data: $('#frm_skillsapproved').serialize(),
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
 
 // Reff
 var educationtable = $('#datatable_employee_reffapproved').DataTable( {
    "ajax": {
        "url": base_url + "employee/ajax_get_forapproval_reff",
        "dataSrc": ""
    },
        "columns": [
			{ "data": function (data, type, row, meta) { return '<input type="checkbox">'} 
			},
            { "data": "fullname" },
            { "data": "o_code" },
            { "data": "a_status" },
            { "data": "r_name" }, 
			{ "data": "r_contactnum" }, 
            { "data": function (data, type, row, meta) { if(data.r_forapproval == '1'){ return 'New'} if (data.r_forapproval == '2'){ return 'Updated'} if (data.r_forapproval == '3'){ return 'Delete'}} 
			}, 
			{ "data": function (data, type, row, meta) { 																	if(data.r_forapproval == '1'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation_reff" data-title="'+data.fullname+'" data-r_id="' + data.r_id +'" data-r_forapproval="' + data.r_forapproval +'"> Approve </a>'} 																											if (data.r_forapproval == '2'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation_reff" data-title="'+data.fullname+'" data-r_id="' + data.r_id +'" data-r_forapproval="' + data.r_forapproval +'"> Approve </a>'} 																											if (data.r_forapproval == '3'){ return '<a class="btn btn-success" data-toggle="modal" data-target="#frm_approval_confirmation_reff" data-title="'+data.fullname+'" data-r_id="' + data.r_id +'" data-r_forapproval="' + data.r_forapproval +'"> Approve </a>'}} 
			},

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
 
 $('#frm_approval_confirmation_reff').on('show.bs.modal', function(e) {
		$('.p_title').html("Do you want to approved <b>" + $(e.relatedTarget).data('title')+ "</b>'s changes?");
		$('.m_r_id').val($(e.relatedTarget).data('r_id'));
		$('.m_r_forapproval').val($(e.relatedTarget).data('r_forapproval'));
 });
 $('#frm_reffapproved').on('submit', function(){
	 $.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/apply_approved_reff_changes/",
		data: $('#frm_reffapproved').serialize(),
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
 
 

 // GET EMPLOYEE LEAVE FOR APPROVAL
$('#db_employee_leave').DataTable( {
	"ajax": {
	"url": base_url + "employee/ajax_get_leave_forapproval",
	"dataSrc": ""
	},
		"columns": [
				// { "data": "emp_name" },
                { "data": function(data, type, row, meta) {
                    return '<a href="#" data-toggle="modal" data-target="#emp_pic" data-a_office="' + data.l_agency + '" data-a_position="' + data.l_position + '" data-id="' + data.a_id + '"  data-name="' + data.emp_name + '">' + data.emp_name + '</a>';
                    }
                },
                { "data": "l_datefiled" },
                { "data": "l_type" },
                { "data": "l_typeofapplication" },
                { "data": "l_inclusivedates" },
				{ "data": "l_agency" },
				{ "data": "l_position" },
                { "data": "l_vl" },
                { "data": "l_sl" },
				{ "data": "l_asof" },
				{ "data": function (data, type, row, meta) { return '<a class="btn btn-success btn-xs" data-toggle="modal" data-target="#frm_approval_confirmation_leave" data-title="'+data.emp_name+'" data-l_id="' + data.l_id +'" data-l_type="' + data.l_type +'"><i class="fa fa-thumbs-o-up"></i></a> <a data-toggle="modal" data-target="#frm_disapproval_confirmation_leave" data-title="'+data.emp_name+'" data-l_id="' + data.l_id +'" data-l_type="' + data.l_type +'" class="btn btn-danger btn-xs"><i class="fa fa-thumbs-o-down"></i> </a>' } 
				}
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
											rightColumns: 4
										},
										autoWidth: false,
										//stateSave: true
 });
 
$('#frm_approval_confirmation_leave').on('show.bs.modal', function(e) {
	$('.p_title').html($(e.relatedTarget).data('title') + ' ' + $(e.relatedTarget).data('l_type') + ' Leave');
	$('.m_l_id').val($(e.relatedTarget).data('l_id'));
});




 $('#frm_disapproval_confirmation_leave').on('show.bs.modal', function(e) {
	$('.p_title').html($(e.relatedTarget).data('title') + ' ' + $(e.relatedTarget).data('l_type') + ' Leave');
	$('.m_l_id').val($(e.relatedTarget).data('l_id'));
});
 
$('#frm_disapproved_leave').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/disapproved_leave/",
		data: $('#frm_disapproved_leave').serialize(),
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

$('#frm_approved_leave').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "employee/approved_leave/",
		data: $('#frm_approved_leave').serialize(),
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

// EMPLOYEE PIC
$('#emp_pic').on('show.bs.modal', function(e) {
    var pic  = base_url + "pds_image/" + $(e.relatedTarget).data('id') + "/"+ $(e.relatedTarget).data('id') +".png";
    $(this).find('#pic_id').attr('src',pic);
    $(this).find('h5.modal-title').html('<b>' + $(e.relatedTarget).data('name') + '</b>');
    $(this).find('p.office').html('<b>OFFICE: </b>' + $(e.relatedTarget).data('a_office'));
    $(this).find('p.position').html('<b>POSITION: </b>' + $(e.relatedTarget).data('a_position'));
});
