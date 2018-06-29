<!DOCTYPE html>
<html>
	<head>
		<title>Room | YAMI YUGI</title>
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
		<script type="text/javascript" src="/common/js/room.js"></script>
	</head>
	<body>
	
	
		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				
				<form method="post" action="/room/join">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<p class="modal-title"><strong>Join Game</strong></p>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="usr">Deck :</label>
							<input type="hidden" class="join_room_id" name="join_room_id" value="">
							<select name="deck" class="form-control" required="required">
								@if($deck_data)
								@foreach($deck_data as $deck)
								<option>{{ $deck['deck_name'] }}</option>
								@endforeach
								@endif
							</select>
						</div>
						<div class="form-group">
							<label for="room_name">Password:</label>
							<input type="password" name="password" class="form-control" required="required">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-default">Join</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
				
				</form>
			</div>
		</div>

	
	
	
	
		<div class="wrap">
			<input type="button" name="gotohome" class="btn btn-default mb20" value="HOME" onclick="location='/home'">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<form method="post" action="/room/create" class="mb40">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<label for="room_name">Player 1:</label>
								<input type="text" class="form-control" value="{{ session('user_name') }}" readonly="readonly">
							</div>
							<div class="form-group">
								<label for="room_name">Password:</label>
								<input type="password" name="password" class="form-control" required="required">
							</div>
							<div class="form-group">
								<label for="sel1">Deck: <a href="/deck"><img src="/common/images/add.png" width="20" height="20"></a></label>
								<select name="deck" class="form-control" required="required">
									@if($deck_data)
										@foreach($deck_data as $deck)
										<option>{{ $deck['deck_name'] }}</option>
										@endforeach
									@endif
								</select>
							</div>
							<button type="submit" class="btn btn-default">Create</button>
						</form>
						
						@if($errors->any())
							<div class="alert alert-danger">
								<strong>Warning!</strong> {{$errors->first()}}
							</div>
						@endif
						
						<table class="table table-striped">
							<thead>
								<tr>
									<th width="42%">Player 1</th>
									<th width="42%">Player 2</th>
									<th>Option</th>
								</tr>
							</thead>
							<tbody class="room_list">
								
							</tbody>
						</table>
						
					</div>
					<div class="col-md-6">
						<div class="chatContainer">

							<div class="chathead">
								<div>Global</div>
								<div>
									<p class="online-count"><img src="/common/images/chat_online.png" height="20"><span class='online_list'></span></p>
									<ul class="online-list">
										
									</ul>
								</div>
							</div>
							<div class="chatbox">
								<input type="hidden" name="chatlast" value="{{ $last_id }}" id="chatlast">
								<input type="hidden" name="room_id" value="global" id="room_id">
								<p class="btnprevious"><a href="#">more previous messages</a></p>
								<ul>
									
								</ul>
							</div>
							<div class="form-group globalmsgCon">
								<textarea class="form-control" rows="2" id="globalmsg" placeholder="(press Shift + Enter for breakline)"></textarea>
								
								
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
				</div>
			</div>
		</div>
	</body>
</html>