<x-app-layout>

    {{-- <article>
        <a href="{{ route('posts.index') }}">Volver al post</a>
    </article>
 --}}
    <article>

        <head>
            <h1>Edición de post: <i>"{{ $post->title }}"</i></h1>
        </head>

        @if ($errors->any())

            <br>
            <article>

                <h4>Errores:</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>

            </article>
            <br>
        @endif

        <form action="{{ route('posts.update', $post) }}" method="POST">

            {{-- Token oculto dentro del formulario --}}
            @csrf
            @method('PUT')

            <label for="title">Titulo:</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}">

            <label for="slug">Slug:</label>
            <input type="text" name="slug" value="{{ old('slug', $post->slug) }}">

            <label for="category">Categoría:</label>
            <input type="text" name="category" value="{{ old('category', $post->category) }}">

            <label for="content">Contentido:</label>
            <textarea name="content" id="" cols="30" rows="20">{{ old('content', $post->content) }}</textarea>

            <input type="submit" value="Editar Registro">
        </form>
    </article>

</x-app-layout>
