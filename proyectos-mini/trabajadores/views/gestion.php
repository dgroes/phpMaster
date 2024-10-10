<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajadores</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <main>
        <header>
            <nav>
                Trabajardores/Personas
            </nav>
        </header>
        <br><br>

        <h2>Trabajadores</h2>
        <table style="width:100%">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cedula</th>
                <th>Cargo</th>
            </tr>
            <?php while ($tra = $trabajadores->fetch_object()): ?>
                <tr>
                    <td><?= $tra->id ?></td>
                    <td><?= $tra->nombres ?></td>
                    <td><?= $tra->apellidos ?></td>
                    <td><?= $tra->cedula ?></td>
                    <td><?= $tra->cargo ?></td>
                </tr>
            <?php endwhile; ?>
        </table>

        <br>

        <form action="<?= base_url ?>trabajador/guardar" method="POST">
            <h4>Crear Trabajador</h4>
            <label for="nombres">Nombres: </label>
            <input type="text" name="nombres">

            <label for="apellidos">Apellidos: </label>
            <input type="text" name="apellidos">

            <label for="cedula">Cedula: </label>
            <input type="text" name="Cedula">

            <label for="cargo">Cargo: </label>
            <input type="text" name="Cargo">

            <input type="submit" value="Crear">
        </form>


        <br>
        <h2>Personas</h2>
        <table style="width:100%">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cedula</th>
            </tr>
            <?php while ($per = $personas->fetch_object()) : ?>
                <tr>
                    <td><?= $per->id?></td>
                    <td><?= $per->nombres?></td>
                    <td><?= $per->apellidos?></td>
                    <td><?= $per->cedula?></td>
                </tr>
            <?php endwhile; ?>
        </table>

        <br>

        <form action="<?= base_url ?>persona/guardar">
            <h4>Crear Persona</h4>
            <label for="nombres">Nombres: </label>
            <input type="text" name="nombres">

            <label for="apellidos">Apellidos: </label>
            <input type="text" name="apellidos">

            <label for="cedula">Cedula: </label>
            <input type="text" name="Cedula">

            <input type="submit" value="Crear">
        </form>
    </main>



</body>

</html>