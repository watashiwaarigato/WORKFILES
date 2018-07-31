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
			
			<p>Account Successfully Registered!</p>
			<p>{{ $data->email }}</p>
			
			<input type="hidden" name="user-id" value="{{ $data->email }}">
			<input type="hidden" name="user-pw" value="{{ $data->password }}">

			<input type="submit" name="btn-login" value="Login Now">
		</form>
	</body>
</html>