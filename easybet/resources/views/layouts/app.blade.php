<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-secondary">
<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">E'asyBet</a>
        <ul class="navbar-nav">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#"
                       data-toggle="dropdown">{{ Auth::user()->username }}</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('register') }}">Sign up</a>
                </li>
                <li class="nav-item">
                    <span class="nav-link text-white"> / </span>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('login') }}">Sign in</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
@yield('content')
</body>
</html>
