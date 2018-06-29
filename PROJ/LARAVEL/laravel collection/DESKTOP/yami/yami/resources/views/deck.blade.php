<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	
	<meta charset="utf-8">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<link href="/common/components/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="/common/css/reset.css" rel="stylesheet">
	<link href="/common/css/deck.css" rel="stylesheet">
	<link href="/common/css/alignment.css" rel="stylesheet">
	
	<script type="text/javascript" src="/common/js/jquery.js"></script>
	<script type="text/javascript" src="/common/js/deck.js"></script>
	<script type="text/javascript" src="/common/js/variables.js"></script>
	<script type="text/javascript" src="/common/components/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<p class="modal-title"><strong>Save Deck</strong></p>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="usr">Deck Title:</label>
						<input type="hidden" name="user_id" id="user_id" value="{{ session('user_id') }}">
						<input type="hidden" name="user_name" id="user_name" value="{{ session('user_name') }}">
						<input type="text" class="form-control" id="deck_name" value="@if( ! empty($deck_name)){{ $deck_name }}@endif">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" id="save_deck">Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="wrap">
		<div class="container">
			<div class="deck">
				<ul>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
				</ul>
			</div>
			<div class="side">
				<div class="card_information01">
				
				</div>
				<div class="card_information02">
					<div class="description">
						<p class="name">

						</p>
						<p class="level">

						</p>
						<p class="type">
							
						</p>
						<p class="desc">
							
						</p>
					</div>
					<div class="pow">
						<p>Atk: <span class="atk"></span></p>
						<p>Def: <span class="def"></span></p>
					</div>
				</div>
			</div>
		</divi>
	</div>
		
	<div class="card-list">
		<ul>
			@foreach ($cards_list as $card)
				<li id='{{ $card->id }}'><img src="/common/images/card_{{ $card->class }}.gif"></li>
			@endforeach
		</ul>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-3 text-center">
				<input type="button" name="save" id="save" class="btn btn-primary" value="SAVE" data-toggle="modal" data-target="#myModal">
				<input type="button" name="reset" id="reset" class="btn btn-default" value="RESET">
			</div>
			<div class="col-md-7">
				<div class="alert alert-success mt10" id="warning" style="display:none;">
					<p>&nbsp;</p>
				</div>
			</div>
			<div class="col-md-2">
				<input type="button" name="gotohome" id="gotohome" class="btn btn-default" value="HOME">
			</div>
		</div>
		
	</div>
	
	
	@if( ! empty($deck_name))
		<script>
			get_deck_put_array('{{ $deck_name }}','{{ session('user_id') }}');
		</script>
	@endif
	
</body>
</html>


