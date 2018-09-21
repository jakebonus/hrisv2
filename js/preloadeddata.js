var provinces = [];
$.getJSON(base_url + "onlineapplicant/ajax_get_province", function(data) {
    $.each(data, function(index, item) {
		 provinces.push('<option value="'+item.p_id+'">'+item.p_name+'</option>');
    });
});

var cities = [];
	$.getJSON(base_url + "onlineapplicant/ajax_get_all_city/", function(data) {
		$.each(data, function(index, item) {
			 cities.push('<option value="'+item.c_id+'">'+item.c_name+'</option>');
		});
});

var courses = [];
	$.getJSON(base_url + "onlineapplicant/ajax_get_course/", function(data) {
		$.each(data, function(index, item) {
			 courses.push('<option value="'+item.c_name+'">'+item.c_name+'</option>');
		});
});
