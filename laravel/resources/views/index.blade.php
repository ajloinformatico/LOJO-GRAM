<!DOCTYPE html>
<html lang="eS">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="title" content="LOJOGRAM">
    <meta name="author" content="INFOLOJO">
    <meta name="keyboard" content="LOJOGRAM, INFOLOJO">
    <title>LOJOGRAM</title>
</head>
<body>
    <header>
        <h1>LOJOGRAM</h1>
    </header>
    <main>
        <section class="intro">
            <h2>¿QUÉ ES LOJOGRAM?</h2>
            <p>LOJOGRAM es una aplicación web desarrollada por INFOLOJO como proyecto final de laravel para desarrollo entorno servidor.<br>
            Se trata de un pseudo instagram codificado en php con la ayuda de laravel. Este incluye todas las características del original incluso
            lo mejora. Puedes registrarte e iniciar sesión aquí
            </p>
        </section>
        <section>
        <a href="{{url('/loging/')}}">Iniciar Sesión</a>
        <a href="{{url('/register/')}}">Regístrame</a>
        </section>
    </main>
    <footer>
        <p>LOJOGRAM © Codificado por <q><a alt="enlace a infolojo.es" target="_blank" title="enlace a infolojo.es" href="https://www.infolojo.es">infolojo</a></q>
        Puedes ver más proyectos en <a  alt="enlace a github.com/ajloinformatico" target="_blank" tilte="enlace al github de infolojo" href="https://github.com/ajloinformatico">ajloinformatico</a></p>
    </footer>
</body>
</html>
