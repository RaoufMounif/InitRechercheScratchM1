<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>


    <title> BISCUIT</title>

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <script src="js/jquery-1.11.0.min.js"></script>

    <!-- bootstrap -->

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/playground.css">
    <link rel="stylesheet" href="css/zenburn.css">


    <link rel="stylesheet" href="css/main.css">

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

<div id="app">
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand  bg-info  " href="{{ url('/') }}">
                    <img src="/img/play.PNG" width="30" height="30" style="display: inline-block" alt="">&nbsp;
                    Scratch
                </a>

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-left">
                        <!-- Authentication Links -->

                        @if (Auth::guest())
                            <li><a href="{{ url('/') }}">Accueil</a></li>
                            <li><a href="{{ url('/aide') }}">Aide</a></li>

                        @else
                            <li><a href="{{ url('/') }}">Accueil</a></li>
                            <li><a href="{{ url('/video') }}">Vidéo</a></li>
                            <li><a href="{{ url('/comment') }}">Commenter</a></li>
                            <li><a href="{{ url('/aide') }}">Aide</a></li>
                        @endif
                    </ul>


                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Se Connecter</a></li>
                        <li><a href="{{ route('register') }}">Créer un compte</a></li>
                    @else
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
                                        Se Déconnecter
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
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
