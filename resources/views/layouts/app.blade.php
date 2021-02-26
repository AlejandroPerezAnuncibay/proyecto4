
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/line-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/line-awesome-font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('lib/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('lib/slick/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/estilosPagina.css')}}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="icon" href="img/logo1/logo_small_icon_only_inverted.png">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>


<body>


<div class="wrapper">

    <header>
        <div class="container-fluid d-flex justify-content-around">
            <div class="header-data w-75 ">
                <div class="logo">
                    <a href="{{route('dashboard')}}" title=""><img src="{{ URL::asset('img/logo1/logo_white_large.png') }}" alt=""></a>
                </div><!--logo end-->
                <nav class="nav">
                    <ul class="menu">
                        <li>
                            <a href="{{route("home")}}" title="">
                                <span><i class="la la-home"></i></span>
                                <span class="tituloMenu">Inicio</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route("mostrarEstadisticas")}}" title="">
                                <span><i class="la la-bar-chart-o"></i></span>
                                <span class="tituloMenu">Estadísticas</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route("mostrarFormularioCrearProyectos") }}">
                                <span><i class="la la-plus"></i></span>
                                <span class="tituloMenu">Crear proyecto</span>
                            </a>
                        </li>


                    </ul>
                </nav><!--nav end-->
                <div class="menu-btn">
                    <a href="#" title=""><i class="fa fa-bars"></i></a>
                </div><!--menu-btn end-->
                <div class="user-account">
                    <div class="user-info">
                        <a href="#" title="">{{ ucfirst(Auth::user()->name )}}</a>
                        <i class="la la-sort-down"></i>
                    </div>
                    <div class="user-account-settingss">


                        <h3>Ajustes de usuario</h3>
                        <ul class="us-links">
                            <li class="d-inline-flex">
                                <i class="la la-cogs pr-1"></i>
                                <a href="{{route("mostrarAjustes")}}" title="">Ajustes de cuenta</a>
                            </li>
                        </ul>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <h3 class="tc">
                                <a class="dropdown-item btn btn-primary btnEnviar" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </a>

                            </h3>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest

                    </div><!--user-account-settingss end-->
                </div>
            </div><!--header-data end-->
        </div>
    </header>

    @yield("content")

    <footer>
        <div class="footy-sec mn no-margin">
            <div class="container">
                <p><img src="{{ URL::asset('images/copy-icon2.png') }}" alt="">Copyright 2021</p>
            </div>
        </div>
    </footer>

</div><!--theme-layout end-->


<script type="text/javascript" src="{{ asset ('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset ('js/popper.js')}}"></script>
<script type="text/javascript" src="{{ asset ('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset ('js/flatpickr.min.js')}}"></script>
<script type="text/javascript" src="{{ asset ('lib/slick/slick.min.js')}}"></script>
<script type="text/javascript" src="{{ asset ('js/script.js')}}"></script>
<!--<script type="text/javascript" src="js/layouts.js')}}"></script>-->
</body>
</html>
