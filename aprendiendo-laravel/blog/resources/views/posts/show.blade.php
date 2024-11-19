<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 11 | Posts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.red.min.css">
</head>

<body>
    <main class="container-fluid">
        <h1>Aquí se mostrá un formulario para crear un post 🐕. {{ $post }}</h1>
        @if ($post == 'pene')
            <h3>Ordinado</h3>
        @endif
    </main>
</body>

</html>
