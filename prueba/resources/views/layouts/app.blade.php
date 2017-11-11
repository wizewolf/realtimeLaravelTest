<!doctype html>
<html lang="{{ app()->getlocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'laravel') }}</title>

    <!-- styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- collapsed hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- branding image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'laravel') }}
                    </a>
                </div>

                <div  class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- left side of navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- right side of navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- authentication links -->
                        @guest
                            <li><a href="{{ route('login') }}">login</a></li>
                            <li><a href="{{ route('register') }}">register</a></li>
                        @else
                            {{--<li class="nav-item dorpdown notification">
                                <a class="dropdown-toggle notification-desplegado" data-toggle="dropdown" data-state="false">
                                    Notificaciones
                                    <span class="caret"></span>
                                </a>

                                <span :user="{{\Illuminate\Support\Facades\Auth::user()->id}}" class="msj dropdown-menu"></span>
                            </li>--}}
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    Notificaciones <span class="caret"></span>
                                </a>
                                <notifications :user="{{ Auth::user()->id }}"> </notifications>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">

                                    <li>
                                        <a
                                            onclick="document.getElementById('logout-form').submit();">
                                            logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/notifications.js') }}"></script>

</body>
</html>
