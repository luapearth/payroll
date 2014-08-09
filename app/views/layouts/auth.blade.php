<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DTR Data</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" media="screen" href="{{ asset('css/bootstrap.min.css') }}">
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('ionicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/AdminLTE.css') }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-black">
	@yield('content')

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/AdminLTE/app.js') }}" type="text/javascript"></script>
	@yield('scripts')

</body>
</html>