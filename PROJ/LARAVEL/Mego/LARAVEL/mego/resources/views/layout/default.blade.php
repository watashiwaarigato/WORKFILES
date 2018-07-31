<!DOCTYPE html>
<html>
	<head>
		@include('includes.head')
	</head>
	<body>
		<header>
			@include('includes.header')
		</header>
		<main>
			@yield('content')
		</main>
		<footer>
			@include('includes.footer')
		</footer>
	</body>
</html>