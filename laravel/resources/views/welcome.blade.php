<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LOJO GRAM</title>
        <link rel="stylesheet" href="css/style.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <header class="header-welcome">
            <h1>LOJOGRAM</h1>
            @if (Route::has('login'))
                <div class="loging-register-button">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </header>
        <main class="main-welcome">
            <h2>LOJOGRAM</h2>
            <p>Una app de <strong>INFOLOJO</strong> si puedes imaginarlo puedes crearlo</p>
        </main>
        <footer class="footer-welcome">
            <p>
                Esta aplicación ha sido desarrollada por <a href="https://www.infolojo.es" alt="enlace a infolojo.es" title="enlace a infolojo" target="_blank">infolojo</a>
            <br>
                Puedes ver más proyectos desarrollados por mí en <a href="" alt="github" title="enlace a github" target="_blank">ajloinformatico</a>
            </p>
        </footer>
    </body>
</html>
