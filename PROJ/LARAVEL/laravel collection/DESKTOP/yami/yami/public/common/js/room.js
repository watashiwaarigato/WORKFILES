$(document).ready(function () {
	

	
	get_room_list();
});

function refresh_get_room_list() {
	setTimeout(function () {
		get_room_list();
	}, 3100);
}

function get_room_list(){
	$.ajax({
		type: "GET",
		url: "/room/get_created_room/",
		cache: false,
		success: function (data) {
			$('.room_list').html(data);
			
			refresh_get_room_list();
		}
	});
}

function join_room(){
	
}

function get_join_room_id(id){
	$('.join_room_id').val(id);
}