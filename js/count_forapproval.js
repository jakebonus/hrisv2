$(document).ready(function() {
	$.getJSON(base_url +'employee/ajax_count_leave_forapproval', function(data) {
		$.each(data, function(index, item) {
			 // $("span.children").text(item.count);
					  	if(item.count != 0){
				$("span.leave").text(item.count);
			}  else {
				$("span.leave").detach();
			}  
		});	   
	});	
	
	$.getJSON(base_url +'employee/ajax_count_forapproval_children', function(data) {
		$.each(data, function(index, item) {
			 // $("span.children").text(item.count);
					  	if(item.count != 0){
				$("span.children").text(item.count);
			}  else {
				$("span.children").detach();
			}  
		});	   
	});
	
	
		
	$.getJSON(base_url +'employee/ajax_count_forapproval_education', function(data) {
		$.each(data, function(index, item) {
			 // $("span.education").text(item.count);
				  	if(item.count != 0){
				$("span.education").text(item.count);
			}  else {
				$("span.education").detach();
			}
		});	   
	});
	
	
	$.getJSON(base_url +'employee/ajax_count_forapproval_eligibility', function(data) {
		$.each(data, function(index, item) {
			if(item.count != 0){
				$("span.eligibility").text(item.count);
			}  else {
				$("span.eligibility").detach();
			}
		});	   
	});
	
	$.getJSON(base_url +'employee/ajax_count_forapproval_workexp', function(data) {
		$.each(data, function(index, item) {
			 // $("span.workexp").text(item.count);
						  	if(item.count != 0){
				$("span.workexp").text(item.count);
			}  else {
				$("span.workexp").detach();
			}    
		});	   
	});
	
	$.getJSON(base_url +'employee/ajax_count_forapproval_volworkexp', function(data) {
		$.each(data, function(index, item) {
			 // $("span.volworkexp").text(item.count);
						  	if(item.count != 0){
				$("span.volworkexp").text(item.count);
			}  else {
				$("span.volworkexp").detach();
			} 	  
		});	   
	});
	
	$.getJSON(base_url +'employee/ajax_count_forapproval_training', function(data) {
		$.each(data, function(index, item) {
			 // $("span.training").text(item.count);
							  	if(item.count != 0){
				$("span.training").text(item.count);
			}  else {
				$("span.training").detach();
			}  
		});	   
	});
	
	$.getJSON(base_url +'employee/ajax_count_forapproval_skills', function(data) {
		$.each(data, function(index, item) {
			 // $("span.skills").text(item.count);
							  	if(item.count != 0){
				$("span.skills").text(item.count);
			}  else {
				$("span.skills").detach();
			} 
		});	   
	});
	
	$.getJSON(base_url +'employee/ajax_count_forapproval_reff', function(data) {
		$.each(data, function(index, item) {
			 // $("span.reff").text(item.count);
							  	if(item.count != 0){
				$("span.reff").text(item.count);
			}  else {
				$("span.reff").detach();
			} 	  
		});	   
	});
	

});


