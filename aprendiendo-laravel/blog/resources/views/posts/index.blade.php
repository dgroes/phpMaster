<x-app-layout>
    <h1>Aaquí se mostrarán todos los posts 🍅</h1>
    <article>
        <a href="/posts/create">Nuevo Post</a>
    </article>
    <ul>

        @foreach ($posts as $post)
            <li>
                <a href="/posts/{{ $post->id }}">
                    {{ $post->title }}
                </a>
            </li>
        @endforeach
    </ul>
</x-app-layout>
