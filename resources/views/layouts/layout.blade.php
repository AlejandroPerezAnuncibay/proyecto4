
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>WorkWise Html Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="css/line-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/estilosPagina.css">

</head>


<body>


<div class="wrapper">

    <header>
        <div class="container-fluid d-flex justify-content-around">
            <div class="header-data w-75 ">
                <div class="logo">
                    <a href="index.html" title=""><img src="images/logo.png" alt=""></a>
                </div><!--logo end-->
                <nav class="">
                    <ul>
                        <li>
                            <a href="{{route("home")}}" title="">
                                <span><i class="la la-home"></i></span>
                                Inicio
                            </a>
                        </li>
                        <li>
                            <a href="{{route("mostrarEstadisticas")}}" title="">
                                <span><i class="la la-bar-chart-o"></i></span>
                                Estadisticas
                            </a>
                        </li>
                        <li>
                            <a href="projects.html" title="">
                                <span><i class="la la-plus"></i></span>
                                Crear Projecto
                            </a>
                        </li>


                    </ul>
                </nav><!--nav end-->
                <div class="menu-btn">
                    <a href="#" title=""><i class="fa fa-bars"></i></a>
                </div><!--menu-btn end-->
                <div class="user-account">
                    <div class="user-info">
                        <a href="#" title="">John</a>
                        <i class="la la-sort-down"></i>
                    </div>
                    <div class="user-account-settingss">


                        <h3>Ajustes de usuario</h3>
                        <ul class="us-links">
                            <li><a href="{{route("mostrarAjustes")}}" title="">Ajustes de cuenta</a></li>
                        </ul>
                        <h3 class="tc"><a href="{{route("cerrarSesion")}}" title="">Cerrar sesión</a></h3>
                    </div><!--user-account-settingss end-->
                </div>
            </div><!--header-data end-->
        </div>
    </header>

            @yield("content")

    <footer>
        <div class="footy-sec mn no-margin">
            <div class="container">
                <ul>
                    <li><a href="#" title="">Help Center</a></li>
                    <li><a href="#" title="">Privacy Policy</a></li>
                    <li><a href="#" title="">Community Guidelines</a></li>
                    <li><a href="#" title="">Cookies Policy</a></li>
                    <li><a href="#" title="">Career</a></li>
                    <li><a href="#" title="">Forum</a></li>
                    <li><a href="#" title="">Language</a></li>
                    <li><a href="#" title="">Copyright Policy</a></li>
                </ul>
                <p><img src="images/copy-icon2.png" alt="">Copyright 2018</p>
                <img class="fl-rgt" src="images/logo2.png" alt="">
            </div>
        </div>
    </footer>

</div><!--theme-layout end-->


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/flatpickr.min.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
