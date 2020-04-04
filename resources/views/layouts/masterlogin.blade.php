<!DOCTYPE html>
<html lang="es">
<head>
	 <meta charset="utf-8">
 	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
  	{{--TOKEN PARA CAMBIOS--}}
    <meta name="token" id="token" value="{{ csrf_token() }}">
    {{--META PARA RUTA DINAMICA--}}
    <meta name="route" id="route" value="{{url('/')}}">


	<title>LogIn</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/main.css">
	 <link rel="stylesheet" type="text/css" href="css/sweetalert2.css">
	<script src="js/vue.js"></script>
	<script src="js/vue-resource.min.js"></script>
	<script src="js/sweetalert2.js"></script> 
</head>
<body class="cover" style="background-image: url(img/a.jpg);">
	@yield('contenido')




	@stack('scripts')
	<!--====== Scripts -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- <script src="js/material.min.js"></script> -->
	<!-- <script src="js/ripples.min.js"></script> -->
	
	<!-- <script src="js/jquery.mCustomScrollbar.concat.min.js"></script> -->
	<!-- <script src="js/main.js"></script> -->
	<!-- <script>
		$.material.init();
	</script> -->
</body>
</html>
