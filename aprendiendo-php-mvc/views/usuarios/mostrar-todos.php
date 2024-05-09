<h1>Listado de Usuarios</h1>
<?php while ($usuario = $todos_los_usuarios->fetch_object()) : ?>
    <?= $usuario->email ?> - <?= $usuario->nombre ?> <br>
<?php endwhile; ?>