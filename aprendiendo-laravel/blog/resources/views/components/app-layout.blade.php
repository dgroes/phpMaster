<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 11</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.red.min.css">
    {{-- fontawesome
    tipografia --}}
</head>

<body>
    <main class="container-fluid">
        <header>
            <h1>Esto es un header🎄 </h1>
        </header>


        {{ $slot }}



        <footer></footer>
    </main>
</body>

</html>
