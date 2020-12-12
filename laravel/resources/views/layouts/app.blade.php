<!DOCTYPE html>
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
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>



                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto pt-2">


                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <!--Menú Burger de navegación-->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/gente') }}">People</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/favoritas')}}">Favs</a>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link" href="{{ url('/image/'.Auth::user()->id.'/save')}}">Upload new</a>
                            </li>

                            <li class="nav-item dropdown">
                                <!--Imágen del usuario si es distinta a la imágen por defecto-->
                                @if (Auth::user()->image_profile != 'standUser.jpg')
                                <!--<script>alert("existo")</script>-->
                                   <img  src="{{asset('/storage/users/'.Auth::user()->image_profile)}}" alt="imagen del usuario" title="imágen del usuario" width='50px' class="rounded-circle">
                               <!--Si no carga la imágen por-->

                                @else
                                    <img  src="{{asset('/storage/general/standUser.jpg')}}" alt="imágen del usuario" title="imágen del usuario" width='50px' class="rounded-circle">

                               @endif



                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <!--Menú desplegable-->
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <!--GET con la id al perfil del usuario-->
                                    <a class="dropdown-item" href="{{ url('/userPerfil/') }}">{{__('Profile')}}</a>

                                    <!--GET con la id a la configuración-->
                                    <!--con Autho::user()->id Accedo a la id-->
                                    <a class="dropdown-item" href="{{ url('user/'.Auth::user()->id.'/config/') }}">{{__('Config')}}</a>

                                    <!--Logout button-->
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                 <!--INTRODUZCO LA CISTA DE PAGINACIÓN AL FINAL DE CADA PÁGINA-->

                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')

        </main>

    </div>
    <!--Font awesome icons-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" data-auto-replace-svg="nest"></script>
</body>
</html>
