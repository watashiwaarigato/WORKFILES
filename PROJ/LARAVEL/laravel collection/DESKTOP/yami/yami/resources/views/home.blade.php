<!DOCTYPE html>
<html>
<head>
    <title>Menu | YAMI YUGI</title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    
	<link href="/common/components/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<link href="/common/css/alignment.css" rel="stylesheet">
	
	<script type="text/javascript" src="/common/js/jquery.js"></script>
	<script type="text/javascript" src="/common/components/bootstrap/js/bootstrap.min.js"></script>
	
	<style>
		.wrap {
			margin-top: 50px;
			padding: 30px;
		}
		.deck {
			width: 500px;
			margin: 10px 0 20px 20px;
		}
	</style>
</head>
<body>

	<div class="wrap">
		<p>Menu</p>
		<ul class="mb20">
			<li><a href="/room">Rooms</a></li>
			<li><a href="/deck">Deck Construction</a></li>
			<li><a href="/account">My Account</a></li>
		</ul>

		<p><strong>Deck List</strong></p>
		<div class="deck">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Deck Title</th>
						<th>Total Cards</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					@if($data)
						@foreach($data as $index => $deck)
						<tr>
							<td><strong>{{ $deck['deck_name'] }}</strong></td>
							<td>{{ $ctr[$index] }} cards</td>
							<td>
								<a  class="btn btn-primary" href="/deck/edit/{{ $deck['deck_name'] }}">edit</a>
								<a  class="btn btn-danger" href="/deck/delete/{{ $deck['deck_name'] }}">del</a>
							</td>
						</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>

</body>
</html>