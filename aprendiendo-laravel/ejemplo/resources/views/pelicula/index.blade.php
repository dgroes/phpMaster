<h1>{{ $titulo }}</h1>
<p>Acción index del controlador PeliculaController</p>

@if (isset($pagina))
    <h3>La página es: {{ $pagina }}</h3>
@endif

<a href="{{ route('peliculas.detalle') }}">Ir al detalle</a>
