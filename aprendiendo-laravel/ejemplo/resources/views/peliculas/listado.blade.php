<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practicando 🥀</title>

</head>

<body>
    {{-- Imprimir variables --}}
    <h1>{{ $titulo }}</h1>
    <h3>{{ $listado[2] }}</h3>


    {{-- Comentario --}}
    <p>{{ date('Y') }}</p>
    <p>{{-- date('M') --}}</p> {{-- Comentario de Blade --}}


    {{-- MOSTRAR SI EXISTE UNA VARIABLE --}}
    {{-- UTILIZANDO PHP NORMAL: --}}
    <?= isset($director) ? $director : 'No hay director' ?>
    <br>
    {{-- Con Laravel --}}
    {{ $director ?? 'no hay ningún director 🎥' }}
    <br>

    {{-- ESTRUCURAS DE CONTROL --}}
    @if ($titulo && count($listado) >= 2)
        <h3>El titulo existe y es este: {{ $titulo }} y el listado es mayor a 2</h3>
    @elseif($titulo)
        <h2>El titulo existe y el listado no es mayor a 5</h2>
    @else
        <h1>El titulo no existe 💀</h1>
    @endif


    {{-- BUCLES --}}
    @for ($i = 0; $i <= 8; $i++)
    El número es: {{ $i }} <br>
    @endfor
    
    <br>
    <?php $contador = 1; ?>
    @while ($contador < 25)
        @if ($contador % 2 == 0)
            Número par: {{ $contador }} <br>
        @endif
        <?php $contador++; ?>
    @endwhile

    <br>
    @foreach($listado as $pelicula)
        <p>{{$pelicula}}</p>
    @endforeach


</body>

</html>
