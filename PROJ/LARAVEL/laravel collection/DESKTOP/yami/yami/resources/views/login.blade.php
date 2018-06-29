<!DOCTYPE html>
<html>
<head>
	<title>Login | YAMI YUGI</title>
	<meta charset="UTF-8">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	
	<link href="common/components/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="common/css/alignment.css" rel="stylesheet">

	<script type="text/javascript" src="common/js/jquery.js"></script>
	<script type="text/javascript" src="common/components/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container mt50" style="width: 500px;">
		<form class="form-signin" method="post" action="/">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<h2 class="form-signin-heading">Please sign in</h2>
			
			
			@if($errors->any())
			<div class="alert alert-warning mt10" id="warning">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			
			
			<label for="inputEmail" class="sr-only">Username</label>
			<input type="text" name="username" id="inputEmail" class="form-control mb20" placeholder="Username" required autofocus>
			
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" name="password" id="inputPassword" class="form-control mb20" placeholder="Password" required>
			
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		</form>

	</div> <!-- /container -->
</body>
</html>