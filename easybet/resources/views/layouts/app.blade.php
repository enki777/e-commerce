<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>E'asyBet</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .app-dd a:hover {
            background: none;
        }
    </style>
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
                    <div class="dropdown-menu bg-dark app-dd">
                        <a class="dropdown-item text-white" href="{{ route('user.profile') }}">Profile<img
                                src="{{ asset('images/profile.png') }}" width="25"
                                class="float-right bg-white rounded-circle"></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-white" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}<img
                                src="{{ asset('images/logout.png') }}" width="25"
                                class="float-right bg-white rounded-circle">
                        </a>
                    </div>
                    <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
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
<main>
    @yield('content')
</main>
</body>
</html>
