<x-app-layout>
    <article>
        <a href="{{ route('posts.index') }}">Volver a posts</a>
    </article>
    <article>

        <head>
            <h1>Creación de Nuevo Post</h1>
        </head>

        {{-- {{__('Client Closed Request')}} --}}

        {{-- Primera forma de mostrar los errores de formulario --}}
        @if ($errors->any())

            <div>

                <h4>Errores:</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>

            </div>
        @endif


        <form action="{{ route('posts.store') }}" method="POST">

            {{-- Token oculto dentro del formulario --}}
            @csrf

            <label for="title">Titulo:</label>
            <input type="text" name="title" value="{{ old('title') }}">
            {{--  @error('title')
                <p>{{ $message }}</p>
            @enderror --}}

            <label for="slug">Slug:</label>
            <input type="text" name="slug" value="{{ old('slug') }}">
            {{-- @error('slug')
                <p>{{ $message }}</p>
            @enderror --}}

            <label for="category">Categoría:</label>
            <input type="text" name="category" value="{{ old('category') }}">
            {{-- @error('category')
                <p>{{ $message }}</p>
            @enderror --}}

            <label for="content">Contentido:</label>
            <textarea name="content" id="" cols="30" rows="20">{{ old('content') }}</textarea>

            <input type="submit" value="Guadar Registro">
        </form>
    </article>

</x-app-layout>
