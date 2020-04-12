<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('titulo')<title>master</title>
     {{--TOKEN PARA CAMBIOS--}}
    <meta name="token" id="token" value="{{ csrf_token() }}">
    {{--META PARA RUTA DINAMICA--}}
    <meta name="route" id="route" value="{{url('/')}}">
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/main.css"> -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="css/fontawesome.min.css"> -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/icofont.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/jQuery.verticalCarousel.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body class="loading">
    <div class="wrapper">
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-3 col-xs-2">
                        <div class="logo">

                            <a><img src="img/logo_empresa/{{Session::get('img')}}" width="85px" style="margin-top: 15px"></a>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-9 col-xs-10">
                        <div class="menu">
                            <ul class="nav navbar-nav h4">
                                <li><a href="{{url('/')}}">Inicio</a></li>
                                <li><a href="#citas">Citas</a></li>
                                <li><a href="{{url('login')}}">Iniciar Sesión/Regístrate</a></li>
                                <!-- <li><a href="{{url('registrar')}}">Registrarte</li> -->
								<!-- <a href="{{url('registrar')}}"><span class="icon-edit t"></span>Registrarse</a> -->
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
				        <div class="text" align="justify">
				            <h3 align="center">{{Session::get('nombre')}}</h3>
				            <h6>Aalak' Soft es un servicio de plataforma digital orientada a brindar atencion especializada y de calidad a través de módulos y apartados destinados a promocionar, administrar y gestionar de manera adecuda los servicios que la veterinaria ofrece a sus consumidores</h6>
				            <!-- <a class="button" href="#">Inicia Session</a>
				            <a class="button white" href="#">Registrate</a> -->
				        </div>
   					</div>
   					<div class="col-md-6 col-xs-12" style="display:table-cell; vertical-align:middle;">
                        <img src="img/galeria/estetica3.jpg" class="img-responsive img-rounded" alt="Responsive image">
                    </div>
                </div>
            </div>
        </header>
        @yield('contenido')

        <footer class="footer">
            <div class="container">
                <!-- inicio del row -->
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="footer-logo">
                            <span>
                                <img src="img/logo_empresa/{{Session::get('img')}}" width="45px" style="margin-top: 15px; float: right;">

                                <h3 style="color: white">{{Session::get('nombre')}}</h3>
                            </span>
                        </div>
                        <div class="footer_first_menu">
                            <ul>
                                <li><a>Políticas de Privacidad</a></li>
                                <li><a>Correo:</a></li>
                                <li><a>Colitas.felices@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-8 col-xs-12">
                        <div class="footer_last_menu">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <ul style="vertical-align: middle;">
                                        <li class="active"><a href="{{url('/')}}">Inicio</a></li>
                                        <li><a href="#citas">Citas</a></li>
                                        <li><a href="{{url('login')}}">Iniciar Sesión/Regístrate</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row"> -->
                            <!-- <div class="col-md-12 col-sm-12"> -->
                                <div class="footer_last_icon">
                                    <ul s>
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    </ul>
                                </div>
                            <!-- </div> -->
                        <!-- </div> -->
                    </div>
                </div>
                <!-- fin del row -->
            </div>
        </footer>
    </div>
    

    @stack('scripts')

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- <script src="js/jquery-3.1.1.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.flexslider.js"></script>
    <script src="js/jQuery.verticalCarousel.js"></script>
    <script src="js/jquery-ui.js"></script>
    <!-- <script src="js/active.js"></script> -->
</body>
</html>