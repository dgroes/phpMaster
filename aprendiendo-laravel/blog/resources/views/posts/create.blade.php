<x-app-layout>
    <article>

        <head>
            <h1>Creación de Nuevo Post</h1>
        </head>

        <form action="/posts" method="POST">

            {{-- Token oculto dentro del formulario --}}
            @csrf
            
            <label for="title">Titulo:</label>
            <input type="text" name="title">

            <label for="category">Categoría:</label>
            <input type="text" name="category">

            <label for="content">Contentido:</label>
            <textarea name="content" id="" cols="30" rows="20"></textarea>

            <input type="submit" value="Guadar Registro">
        </form>
    </article>

</x-app-layout>
