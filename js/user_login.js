// $('#frm_userlogin #username').change(function(){
	
	// if($('#frm_userlogin #username').val() == '2380'){
		// new PNotify({
				// title: '!!! WARNING !!!',
                // text: "Sorry, You don't have enough leave credits to avail! You can watch youtube instead.",
                // type: 'danger',
                // styling: 'bootstrap3'
        // });
		// $('#frm_userlogin #password').attr('disabled','disabled');
		
		// setTimeout(function(){ 
			// window.location.href = "https://www.youtube.com/watch?v=CPIIiwzxju0";
		// }, 5000);
		
	// }
// });



$('#frm_userlogin').on('submit', function(){
	$('.alert-warning .glyphicon-remove').trigger("click");
	if($("body .ui-pnotify > .alert-info").length == 0){
		$.ajax({
		type: "POST",
		dataType: "json",
		url:base_url + "user/index/",
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
					
					$('.alert-info .glyphicon-remove').trigger("click");
						new PNotify({
							title: 'Success',
							text: data.content,
							type: 'success',
							styling: 'bootstrap3'
						});
						
					if(data.is_pword == '0'){
						setTimeout(function() {
								location.href = base_url + "user/change_password";
							}, 1000);
					}else{
						setTimeout(function() {
								location.href = base_url + "user/account";
							}, 1000);
					}
				}else{
					$('.alert-info .glyphicon-remove').trigger("click");
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
	}else{
		return false;
	}
	
});

// $('#frm_userchangepassword').on('submit', function(){
	// var frm = $('#frm_userchangepassword').serialize();
	// var destination = base_url + "user/update_password/";
	// var succes_destination = base_url + "user/account/";
	// ajax(destination,frm,succes_destination);
// });

// function ajax(destination,frm,succes_destination){
	// $.ajax({
		// type: "POST",
		// dataType: "json",
		// url: destination,
		// data: frm,
		 // beforeSend: function(){
			// new PNotify({
				// title: 'Processing...',
                // text: 'Please wait a moment',
                // type: 'info',
                // styling: 'bootstrap3'
            // });
		// },
		// success: function(data){
			
			// if(data.status == 'yes'){
				 	// new PNotify({
                        // title: 'Success',
                        // text: data.content,
                        // type: 'success',
                        // styling: 'bootstrap3'
                    // });
				
				// setTimeout(function() {
                        // location.href = succes_destination;
                    // }, 1300);
					
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
// }
