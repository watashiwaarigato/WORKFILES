$(document).ready(function(){
	var enter_key_enabled = 0;

	/*$.fn.enterKey = function (fnc) {
		return this.each(function () {
			$(this).keypress(function (ev) {
				var keycode = (ev.keyCode ? ev.keyCode : ev.which);
				if (keycode == '13') {
					fnc.call(this, ev);
				}
			})
		})
	}
	$("#globalmsg").enterKey(function(){

		if(enter_key_enabled == 0){
			enter_key_enabled = 1;

			var msg = $(this).val();
			if($('#globalmsg').val('') != ""){
				$('#globalmsg').val('');

				setTimeout(function(){
					enter_key_enabled = 0;
				}, 1000);

			}
			get_chat_bot(msg);
		}
		else {
			return false;
		}
	});*/
	
	
	var down = {};
	$(document).keydown(function(e) {
		down[e.keyCode] = true;
	}).keyup(function(e) {
		
		
		if (down[16] && down[13]) {
			down[e.keyCode] = false;
		}
		else if(down[13]) {
			down[e.keyCode] = false;
			if(enter_key_enabled == 0){
				enter_key_enabled = 1;

				var msg = $("#globalmsg").val();
				if($('#globalmsg').val('') != ""){
					$('#globalmsg').val('');

					setTimeout(function(){
						enter_key_enabled = 0;
					}, 1000);

				}
				get_chat_bot(msg);
			}
			else {
				down[e.keyCode] = false;
			}
		}
		down[e.keyCode] = false;
		down = {};
	});



	
	
	$("#globalmsg").keypress(function(){
		newMsg = "";
		document.title = "Room | YAMI YUGI";
	});
	$("#globalmsg").focusin(function(){
		newMsg = "";
		document.title = "Room | YAMI YUGI";
	});
	$('.btnprevious a').click(function(e){
		e.preventDefault();
		more_previous_message();
	});
	get_online();
	
	//refresh
	function refreshChat(){
		get_chat_bot('');
		
		console.log("5 seconds");
		setTimeout(function(){
			refreshChat();
		}, 3000);
	}
	setTimeout(function(){
		refreshChat();
	}, 3000);
	
	
	
	//chat emoticon
	$('.globalmsgCon .icon').click(function(){
		if($('.emCon').css('display') == "none"){
			$('.emCon').show();
		}
		else {
			$('.emCon').hide();
		}
	});
	
	$('.emCon img').click(function(){
		var temp = " -" + $(this).attr('alt') + "- ";
		var chatmsg = $('#globalmsg').val() + temp;
		$('#globalmsg').val(chatmsg);
		$('#globalmsg').focus();
		
		$('.emCon').hide();
	});
	
	$('.chathead .online-count').click(function(){
		if($('.chathead .online-list').css('display') == "none"){
			$('.chathead .online-list').show();
		}
		else {
			$('.chathead .online-list').hide();
		}
	});
});


function get_chat_bot(msg){
	var token = $('meta[name="csrf-token"]').attr('content');
	var last_id = $('#chatlast').val();
	var room_id = $('#room_id').val();

	$.ajax({
		type: "POST",
		url: "/chatbox",
		data: { _token: token, msg: msg, last_id: last_id, room_id: room_id },
		cache: false,
		success: function(data){

			if(data.length >= Number(1)){
				data = get_em_icon(data);
				$('.chatbox ul').append(data);
				$('#chatlast').val($('.chatbox ul li').last().attr('id'));
				
				var d = $('.chatbox');
				d.scrollTop(d.prop("scrollHeight"));

			}
	
		}
	});
}

function get_online(){
	var room_id = $('#room_id').val();
	var token = $('meta[name="csrf-token"]').attr('content');
	
	$.ajax({
		type: "POST",
		url: "/chatbox/online",
		data: { _token: token, room_id: room_id },
		cache: false,
		success: function(data){
			$('.chathead .online-list').empty();
			$('.chathead .online-list').append(data);
			
			$('.online_list').html($('.chathead .online-list').children('li').length + " Online on Chat");
			
			setTimeout(function(){
				get_online();
			}, 15000);
		}
	});
}

var newMsg = "";
function refreshTitle(){
	if(document.title == "Room | New Message"){
		document.title = "Room | YAMI YUGI";
	}
	else {
		document.title = "Room | New Message";
	}

	if(newMsg == "Continue"){
		setTimeout(function(){
			refreshTitle();
		}, 800);
	}
	else {
		document.title = "Room | YAMI YUGI";
	}
	
}


function more_previous_message(){

	var last_id = $('.chatbox ul li:first-child').attr('id');
	var token = $('meta[name="csrf-token"]').attr('content');
	var room_id = $('#room_id').val();

	if(typeof last_id !== typeof undefined && last_id !== false){
		
	}
	else {
		var last_id = $('#chatlast').val();
	}
	
	var count = $(".chatbox ul").children().length;
	if(count >= 1){
		var cache_item = 1;
	}
	else {
		var cache_item = 0;
	}
	
	
	$.ajax({
		type: "POST",
		url: "/chatbox_prev",
		data: { _token: token, last_id: last_id, room_id: room_id, cache_item: cache_item },
		cache: false,
		success: function(data){

			if(data.length >= Number(1)){
				data = get_em_icon(data);

				$('.chatbox ul').prepend(data);

				var d = $('.chatbox');
				d.scrollTop(d.prop("30"));

				//fade last added
				setTimeout(function(){
					$('.chatContainer .chatbox ul li.prev').animate({
						backgroundColor : '#fff'
					},'fast');
				},500);
				
			}
			
		}
	});
	
}



function get_em_icon(data){
	data = data.replace(/-Annoyed-/g, '<img src="/common/images/emoticons/Annoyed.gif" width="30" height="30">');
	data = data.replace(/-Bignose-/g, '<img src="/common/images/emoticons/Bignose.gif" width="30" height="30">');
	data = data.replace(/-Blush-/g, '<img src="/common/images/emoticons/Blush.gif" width="30" height="30">');
	data = data.replace(/-Confused-/g, '<img src="/common/images/emoticons/Confused.gif" width="30" height="30">');
	data = data.replace(/-Cool-/g, '<img src="/common/images/emoticons/Cool.gif" width="30" height="30">');
	data = data.replace(/-Cries-/g, '<img src="/common/images/emoticons/Cries.gif" width="30" height="30">');
	data = data.replace(/-Dies-/g, '<img src="/common/images/emoticons/Dies.gif" width="30" height="30">');
	data = data.replace(/-Eeemmph-/g, '<img src="/common/images/emoticons/Eeemmph.gif" width="30" height="30">');
	data = data.replace(/-Eek-/g, '<img src="/common/images/emoticons/Eek.gif" width="30" height="30">');
	data = data.replace(/-Fufu-/g, '<img src="/common/images/emoticons/Fufu.gif" width="30" height="30">');
	data = data.replace(/-Gross-/g, '<img src="/common/images/emoticons/Gross.gif" width="30" height="30">');
	data = data.replace(/-Hihi-/g, '<img src="/common/images/emoticons/Hihi.gif" width="30" height="30">');
	data = data.replace(/-Kikik-/g, '<img src="/common/images/emoticons/Kikik.gif" width="30" height="30">');
	data = data.replace(/-LOL-/g, '<img src="/common/images/emoticons/LOL.gif" width="30" height="30">');
	data = data.replace(/-Mad-/g, '<img src="/common/images/emoticons/Mad.gif" width="30" height="30">');
	data = data.replace(/-Music-/g, '<img src="/common/images/emoticons/Music.gif" width="30" height="30">');
	data = data.replace(/-Nyu-/g, '<img src="/common/images/emoticons/Nyu.gif" width="30" height="30">');
	data = data.replace(/-Nyuuu-/g, '<img src="/common/images/emoticons/Nyuuu.gif" width="30" height="30">');
	data = data.replace(/-Question-/g, '<img src="/common/images/emoticons/Question.gif" width="30" height="30">');
	data = data.replace(/-Rolleyes-/g, '<img src="/common/images/emoticons/Rolleyes.gif" width="30" height="30">');
	data = data.replace(/-Sad-/g, '<img src="/common/images/emoticons/Sad.gif" width="30" height="30">');
	data = data.replace(/-Sleep-/g, '<img src="/common/images/emoticons/Sleep.gif" width="30" height="30">');
	data = data.replace(/-Sleepy-/g, '<img src="/common/images/emoticons/Sleepy.gif" width="30" height="30">');
	data = data.replace(/-Smile-/g, '<img src="/common/images/emoticons/Smile.gif" width="30" height="30">');
	data = data.replace(/-Sorry-/g, '<img src="/common/images/emoticons/Sorry.gif" width="30" height="30">');
	data = data.replace(/-Sure-/g, '<img src="/common/images/emoticons/Sure.gif" width="30" height="30">');
	data = data.replace(/-Surprise-/g, '<img src="/common/images/emoticons/Surprise.gif" width="30" height="30">');
	data = data.replace(/-Waks-/g, '<img src="/common/images/emoticons/Waks.gif" width="30" height="30">');
	data = data.replace(/-Yawn-/g, '<img src="/common/images/emoticons/Yawn.gif" width="30" height="30">');
	data = data.replace(/-Woooot-/g, '<img src="/common/images/emoticons/Woooot.gif" width="30" height="30">');
	
	data = data.replace('[img]', '<div class="attach"><img src="');
	data = data.replace('[/img]', '"></div>');

	return data;
}


