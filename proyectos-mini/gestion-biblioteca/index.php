<?php require_once 'header.php' ?>
<h1>Lista de Libros Disponibles</h1>
<table>
    <thead>
        <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Autor</th>
            <th scope="col">Genero</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($librosDisponibles as $libro) : ?>
            <tr>
                <td><?php echo $libro->titulo; ?></td>
                <td><?php echo $libro->autor; ?></td>
                <td><?php echo $libro->genero; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</main>
</body>



</html>