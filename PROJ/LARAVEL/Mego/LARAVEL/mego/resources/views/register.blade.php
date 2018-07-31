<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="UTF-8">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
	</head>
	<body>
		<form method="post" action="/register">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			
			

			<label>Email</label>
			<p>{{ $errors->first('email') }}</p>
			<input type="text" name="user-id" value="{{ app('request')->input('user-id') }}" placeholder="example@gmail.com"><br>

			<label>Password</label>
			<p>{{ $errors->first('password') }}</p>
			<input type="password" name="user-pw" value=""><br>
			
			<label>Confirm Password</label>
			<p>{{ $errors->first('password2') }}</p>
			<input type="password" name="user-pw2" value=""><br>
			
			<label>First Name</label>
			<p>{{ $errors->first('fname') }}</p>
			<input type="text" name="fname" value="{{ app('request')->input('fname') }}"><br>
			
			<label>Last Name</label>
			<p>{{ $errors->first('lname') }}</p>
			<input type="text" name="lname" value="{{ app('request')->input('lname') }}"><br>
			
			<label>Gender</label>
			<select name="gender">
				<option>Male</option>
				<option>Femail</option>
			</select><br>

			<input type="submit" name="btn-login" value="Register">
		</form>
	</body>
</html>