<!DOCTYPE html>
<html lang="es" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Large')</title>
    <!-- Pico CSS desde CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@latest/css/pico.min.css">
    <!-- Tus propios estilos -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body class="container-fluid">
    <header class="header">
        <nav class="nav">
            <ul class="nav__ul">
                <li class="nav__li">
                    <a href="" class="nav__a">Login</a>
                </li>
            </ul>
            <ul class="nav__ul">
                <h1 class="nav__title">Large</h1>
            </ul>
            <ul class="nav__ul">
                <li class="nav__li">
                    <form role="search" class="nav__search" method="POST">
                        <input type="search" name="search" placeholder="Search" aria-label="Search" />
                    </form>
                </li>
            </ul>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>
