<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Proyecto Laravel')</title>
    
    <!-- Framework de estilos cargado desde CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.conditional.pink.min.css">


    <!-- Otras hojas de estilos o scripts -->
    @stack('styles')
</head>
<body>
    <header>
        <x-header />
    </header>

    <main class="container-fluid">
        @yield('content')
    </main>

    <footer>
        <!-- Contenido del pie de página -->
    </footer>
</body>
</html>
