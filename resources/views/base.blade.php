<!DOCTYPE html>
<html>
<head>
	<title>catalogo_beta</title>
	<!-- Style -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	

	<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
	
	<h2>navegador</h2>
	<div>
		@yield('content')
	</div>

	
	<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>

	<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
		@yield('script')

</body>
</html>