<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Titulo - @yield('titulo') 😃</title>
</head>

<body>
    @section('header')
        <h1>Cabecera de la web (master)</h1>
    @show

    <hr>

    <article class="container">
        @yield('content')
    </article>


    @section('footer')
        Pie de página de la web
    @show

</body>


</html>
