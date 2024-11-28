<x-app-layout>

    <h1>Aaquí se mostrarán todos los posts 🍅</h1>
    <article>
        <a href="{{ route('posts.create') }}">Nuevo Post</a>
    </article>
    <ul>

        @foreach ($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post) }}">
                    {{ $post->title }}
                </a>
            </li>
        @endforeach
    </ul>

    <article>
        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
        {{ $posts->links() }}
    </article>

</x-app-layout>
