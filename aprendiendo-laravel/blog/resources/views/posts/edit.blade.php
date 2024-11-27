<x-app-layout>
    <article>

        <head>
            <h1>Edición de post: <i>"{{ $post->title }}"</i></h1>
        </head>

        <form action="{{ route('posts.update', $post) }}" method="POST">

            {{-- Token oculto dentro del formulario --}}
            @csrf
            @method('PUT')

            <label for="title">Titulo:</label>
            <input type="text" name="title" value="{{ $post->title }}">

            <label for="slug">Slug:</label>
            <input type="text" name="slug" value="{{ $post->slug }}">

            <label for="category">Categoría:</label>
            <input type="text" name="category" value="{{ $post->category }}">

            <label for="content">Contentido:</label>
            <textarea name="content" id="" cols="30" rows="20">{{ $post->content }}</textarea>

            <input type="submit" value="Editar Registro">
        </form>
    </article>

</x-app-layout>
