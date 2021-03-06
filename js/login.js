$('#frm_login').on('submit', function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: base_url + "login/index/",
		data: $('#frm_login').serialize(),
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
                        location.href = base_url + "employee";
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
