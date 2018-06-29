$(document).ready(function () {
	var p1_username = $('.p1_username').html();
	if (p1_username) {
		$('.p1_img').animate({
			left: 0
		}, 'slow');
	}


	get_player2();
	get_button();
	
	//buttons action
	$('#btnleave').click(function(){
		location = '/room/leave'
	});
	$('#btnstart').click(function(){
		var room_id = $('#room_id').val();

		$.ajax({
			type: "GET",
			url: "/room/create_status/" + room_id,
			cache: false,
			success: function (data) {
				if(data == 'started'){
					game_started(room_id,'4500');
				}
			}
		});
	});

});

function game_started(room_id, speed){
	$(".modal").fadeIn('fast');
	setTimeout(function(){
		location = "/battle/" + room_id;
	},speed);
	
}

function refresh_get_player2() {
	setTimeout(function () {
		get_player2();
	}, 2000);
}

function get_player2() {
	var room_id = $('#room_id').val();

	$.ajax({
		type: "GET",
		url: "/room/check_player2/" + room_id,
		cache: false,
		success: function (data) {
			if (data == "") {
				$('.p2_username').html('Waiting for other players...');
				$('.p2_img').animate({
					right: '-900px'
				}, 'slow');
				$('#btnstart').prop('disabled', true);
			} else {
				$('.p2_username').html(data);
				$('.p2_img').animate({
					right: '25px'
				}, 'slow');
				$('#btnstart').prop('disabled', false);
			}

			refresh_get_player2();
		}
	});
}

function get_button(){
	var session_user = $('#session_user').val();
	var player1_user = $('.p1_username').html();
	
	if(session_user == player1_user){
		//player1
		$('#btnstart').css('display','inline-block');
	}
}