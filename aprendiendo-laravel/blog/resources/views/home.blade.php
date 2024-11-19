<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 11</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.red.min.css">
</head>

<body>
    <main class="container-fluid">

        <div class="max-w-4xl mx-auto px-4">

            <x-alert2 type="info" class="mb-4">
                <x-slot name="title">
                    Titulo
                </x-slot>
                Contenido de la alerta
            </x-alert2>
            <p>Hola mundo</p>
        </div>


        {{--  <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            <span class="font-medium">Info alert!</span> Change a few things up and try submitting again.
        </div> --}}
    </main>
</body>

</html>
