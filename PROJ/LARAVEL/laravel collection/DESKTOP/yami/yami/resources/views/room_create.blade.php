<!DOCTYPE html>
<html>
<head>
    <title>Connecting... | YAMI YUGI</title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
    
	<link href="/common/components/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="/common/css/alignment.css" rel="stylesheet">
	<link href="/common/css/room.css" rel="stylesheet">

	<script type="text/javascript" src="/common/js/jquery.js"></script>
	<script type="text/javascript" src="/common/components/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/common/js/chat.js"></script>
	<script type="text/javascript" src="/common/js/room_create.js"></script>
   
    <style>
		body {
			font-family: Century Gothic;
			font-size: 12px;
			padding: 20px;
			overflow: hidden;
			background: #565656 url("/common/images/loading_body_bg.jpg") top repeat-x;
		}
		.wrap {
			position: relative;
			width: 960px;
			height: 588px;
			margin: 0 auto;
			background: url("/common/images/loading_p_bg.png") 10px 0;
		}
		.p1_img {
			position: absolute;
			top: 0;
			left: -900px;
			width: 305px;
			height: 298px;
		}
		.p2_img {
			position: absolute;
			top: 300px;
			right: -900px;
			width: 305px;
			height: 298px;
		}
		.p1_user {
			position: absolute;
			top: 212px;
			left: 287px;
			width: 200px;
			height: 45px;
			font-size: 123%;
			font-weight: bold;
			letter-spacing: 3px;
			color: #fff;
			text-align: center;
		}
		.p2_user {
			position: absolute;
			top: 311px;
			left: 427px;
			width: 262px;
			height: 44px;
			font-size: 123%;
			font-weight: bold;
			letter-spacing: 2px;
			color: #fff;
			text-align: center;
		}
		.chatContainer {
			position: absolute;
			width: 560px;
			top: 370px;
			left: 30px;
		}
		.chatContainer .chatbox {
			height: 155px;
		}
		.buttons {
			position: absolute;
			top: 180px;
			right: 80px;
			width: 300px;
			height: 100px;
			text-align: right;
		}
		.buttons input {
			display: none;
		}
		.buttons #btnleave {
			display: inline-block;
		}
		
		.modal {
			display: none;
			position: fixed;
			width: 100%;
			height: 100%;
			background-color:rgba(0,0,0,0.3);
			z-index: 99;
		}
		.modal p {
			position: fixed;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			margin: auto;
			width: 400px;
			height: 50px;
			font-size: 160%;
			font-weight: bold;
			color: #fff;
			text-align: center;
			text-shadow: 2px 2px #000;
		}
	</style>
</head>
<body>
	<!-- Modal -->
	<div class="modal">
		<p>Game starting . . .</p>
	</div>



	<input type="hidden" name="session_user" value="{{ session('user_name') }}" id="session_user">
	<input type="hidden" name="id" value="{{ $room_data['id'] }}">
	<div class="wrap">
	
		<div class="buttons">
			<input type="button" name="start" class="btn btn-primary" value="START" id="btnstart" disabled="disabled">
			<input type="button" name="leave" class="btn btn-default" value="LEAVE" id="btnleave">
		</div>
	
		<div class="p1_img"><img src="/common/images/loading_p1.png"></div>
		<div class="p2_img"><img src="/common/images/loading_p2.png"></div>
		
		<div class="p1_user">
			<p class="p1_username">{{ $room_data['p1_username'] }}</p>
			
		</div>
		<div class="p2_user">
			<p class="p2_username">Waiting for other players...</p>
		</div>
		

		<div class="chatContainer">
			<p class="mb00"><label>Room Chat</label></p>
			<div class="chatbox">
				<input type="hidden" name="chatlast" value="{{ $last_id }}" id="chatlast">
				<input type="hidden" name="room_id" value="{{ $room_data['id'] }}" id="room_id">
				<p class="btnprevious"><a href="#">more previous messages</a></p>
				<ul>

				</ul>
			</div>
			<div class="form-group globalmsgCon">
				<input type="text" class="form-control" id="globalmsg">

				<div class="icon"></div>
				<div class="emCon">
					<table border="1">
						<tr>
							<td><img src="/common/images/emoticons/Annoyed.gif" alt="Annoyed"></td>
							<td><img src="/common/images/emoticons/Bignose.gif" alt="Bignose"></td>
							<td><img src="/common/images/emoticons/Blush.gif" alt="Blush"></td>
							<td><img src="/common/images/emoticons/Confused.gif" alt="Confused"></td>
							<td><img src="/common/images/emoticons/Cool.gif" alt="Cool"></td>
							<td><img src="/common/images/emoticons/Cries.gif" alt="Cries"></td>
						</tr>
						<tr>
							<td><img src="/common/images/emoticons/Dies.gif" alt="Dies"></td>
							<td><img src="/common/images/emoticons/Eeemmph.gif" alt="Eeemmph"></td>
							<td><img src="/common/images/emoticons/Eek.gif" alt="Eek"></td>
							<td><img src="/common/images/emoticons/Fufu.gif" alt="Fufu"></td>
							<td><img src="/common/images/emoticons/Gross.gif" alt="Gross"></td>
							<td><img src="/common/images/emoticons/Hihi.gif" alt="Hihi"></td>
						</tr>
						<tr>
							<td><img src="/common/images/emoticons/Kikik.gif" alt="Kikik"></td>
							<td><img src="/common/images/emoticons/LOL.gif" alt="LOL"></td>
							<td><img src="/common/images/emoticons/Mad.gif" alt="Mad"></td>
							<td><img src="/common/images/emoticons/Music.gif" alt="Music"></td>
							<td><img src="/common/images/emoticons/Nyu.gif" alt="Nyu"></td>
							<td><img src="/common/images/emoticons/Nyuuu.gif" alt="Nyuuu"></td>
						</tr>
						<tr>
							<td><img src="/common/images/emoticons/Question.gif" alt="Question"></td>
							<td><img src="/common/images/emoticons/Rolleyes.gif" alt="Rolleyes"></td>
							<td><img src="/common/images/emoticons/Sad.gif" alt="Sad"></td>
							<td><img src="/common/images/emoticons/Sleep.gif" alt="Sleep"></td>
							<td><img src="/common/images/emoticons/Sleepy.gif" alt="Sleepy"></td>
							<td><img src="/common/images/emoticons/Smile.gif" alt="Smile"></td>
						</tr>
						<tr>
							<td><img src="/common/images/emoticons/Sorry.gif" alt="Sorry"></td>
							<td><img src="/common/images/emoticons/Sure.gif" alt="Sure"></td>
							<td><img src="/common/images/emoticons/Surprise.gif" alt="Surprise"></td>
							<td><img src="/common/images/emoticons/Waks.gif" alt="Waks"></td>
							<td><img src="/common/images/emoticons/Yawn.gif" alt="Yawn"></td>
							<td><img src="/common/images/emoticons/Woooot.gif" alt="Woooot"></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		

	</div>
</body>
</html>