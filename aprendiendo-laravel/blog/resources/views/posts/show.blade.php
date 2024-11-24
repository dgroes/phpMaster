<x-app-layout>

    <article>
        <a href="/posts">Volver a posts</a>
    </article>

    <article>
        <header>
            <h1>{{ $post->title }}</h1>
        </header>
        <p>
            {{ $post->content }}
        </p>
        <footer>
            <strong>{{ $post->category }}</strong>
        </footer>
    </article>

</x-app-layout>
