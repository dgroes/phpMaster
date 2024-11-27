<x-app-layout>

    <article>
        <a href="{{ route('posts.index') }}">Volver a posts</a>
    </article>

    <article>
        <header>
            <h1>{{ $post->title }}</h1>
        </header>
        <header>
            Slug
            <h1>{{ $post->slug }}</h1>
        </header>
        <p>
            {{ $post->content }}
        </p>
        <footer>
            <strong>{{ $post->category }}</strong>
        </footer>

        <footer>

            <a href="{{ route('posts.edit', $post) }}">Editar</a>

            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Elimina Post">
            </form>
        </footer>
    </article>

</x-app-layout>
