
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/animate.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/line-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/line-awesome-font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('lib/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('lib/slick/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/responsive.css')}}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css"/>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="icon" href="img/logo1/logo_small_icon_only_inverted.png">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/estilosPagina.css')}}">

</head>


<body>

<div class="wrapper overflow-hidden">

    <header>
        <div class="container-fluid d-flex justify-content-around menuNav">
            <div class="header-data w-100 ">
                <div class="logo">
                    <a href="{{route('dashboard')}}" title=""><img src="{{ URL::asset('img/logo1/logo_white_large.png') }}" alt=""></a>
                </div><!--logo end-->
                <nav class="nav">
                    <ul class="menu">
                        <li>
                            <a href="{{route("dashboard")}}" title="">
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

                </nav>
               <!--nav end-->
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
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="darkSwitch" />
                    <label class="custom-control-label darkmode" for="darkSwitch" style="color: white;padding-top: 5%">Dark Mode</label>
                </div>
            </div><!--header-data end-->
        </div>
    </header>

    @yield("content")

    <footer>
        <div class="footy-sec mn no-margin">
            <div class="container d-flex justify-content-center">
                <p><img src="{{ URL::asset('images/copy-icon2.png') }}" alt="">Copyright 2021</p>
            </div>
        </div>
    </footer>

</div><!--theme-layout end-->
<script type="text/javascript " src="{{asset('js/dark-mode-switch.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script type="text/javascript" src="{{ asset('js/graficos.js') }}"></script>
<script type="text/javascript" src="{{ asset ('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset ('js/popper.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('js/tabla.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>
<script type="text/javascript" src="{{ asset ('js/flatpickr.min.js')}}"></script>
<script type="text/javascript" src="{{ asset ('lib/slick/slick.min.js')}}"></script>
<script type="text/javascript" src="{{ asset ('js/script.js')}}"></script>
<script type="text/javascript" src="{{ asset ('js/graficos.js')}}"></script>
@yield("scripts")

<script type="text/javascript" src="{{ asset ('typescript/tareas.js')}}"></script>
<!--<script type="text/javascript" src="js/layouts.js')}}"></script>-->
</body>
</html>
