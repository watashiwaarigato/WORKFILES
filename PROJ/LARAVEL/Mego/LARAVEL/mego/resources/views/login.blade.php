<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="UTF-8">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
	</head>
	<body>
		<form method="post" action="/auth">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
			@if($errors->any())
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			@endif
			
			
			<label>Email</label>
			<input type="text" name="user-id" value="">
			
			<label>Password</label>
			<input type="text" name="user-pw" value="">

			<input type="submit" name="btn-login" value="Login">
			<a href="/register">Register</a>
		</form>
	</body>
</html>