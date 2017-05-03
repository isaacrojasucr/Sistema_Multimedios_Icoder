<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistema ICODER</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top" style="height: 70px;">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->

                <a class="navbar-brand" style="padding-top: 0px;" href="{{ url('/home') }}">
                    <img style="height: 70px;" src="images/icoder-logo-cool.png">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->


                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Inicio de Sesión</a></li>
                    @else
                        <div style="margin-top: 10px; background: white;" >
                            <ul class="nav navbar-nav">
                                <!-- Menu, hay que arreglar que este en una linea -->

                                <!-- Deportes-->
                                <li class="dropdown" >

                                    <a href="#" class="dropdown-toggle btn" data-toggle="dropdown" role="button"
                                       aria-expanded="false">
                                        Deportes <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#">Futbol</a></li>
                                        <li><a href="#">Atletismo</a></li>
                                        <li><a href="#">Natación</a></li>
                                        <li><a href="#">Alterofilia</a></li>
                                        <li><a href="#">Baloncesto</a></li>
                                    </ul>

                                </li>

                                <li><a href="{{ url('inscription/inscription') }}">Inscripción Individual</a></li>

                                <li><a href="#">Inscripción Excel</a></li>

                                <li><a href="#">Reporte</a></li>

                                <!-- Nombre del usuario-->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Salir
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
