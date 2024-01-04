<?php include "quieries.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>Mirador de Los Andes</h1>
    </header>
    <section>
        <article class="registro">
            <h2>Registro</h2>
            <form action="" method="post">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha" required>
                <br>

                <label for="hora_llegada">Hora de Llegada:</label>
                <input type="time" name="hora_llegada" id="hora_llegada" required>
                <br>

                <label for="depto">Departamento:</label>
                <input type="text" name="depto" id="depto" required>
                <br>

                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required>
                <br>

                <label for="run">Run:</label>
                <input type="text" name="run" id="run" required>
                <br>

                <label for="matricula">Matricula:</label>
                <input type="text" name="matricula" id="matricula">
                <br>

                <label for="marca">Marca:</label>
                <input type="text" name="marca" id="marca">
                <br>

                <label for="parentesco">Parentesco:</label>
                <input type="text" name="parentesco" id="parentesco">
                <br>

                <input type="submit" value="Agregar">
            </form>

        </article>

        <article class="visitas">
            <table>
                <thead>
                    <tr>
                        <th colspan="8">Visitas</th>
                    </tr>
                    <tr>
                        <th colspan="1">Fecha</th>
                        <th colspan="1">Hora Llegada</th>
                        <th colspan="1">Hora Salida</th>
                        <th colspan="1">Depto</th>
                        <th colspan="1">Run</th>
                        <th colspan="1">Matricula</th>
                        <th colspan="1">Marca</th>
                        <th colspan="1">Parentesco</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($date as $dato) { ?>
                        <tr>
                            <td><?php echo $dato['fecha']; ?></td>
                            <td><?php echo $dato['hora_llegada']; ?></td>
                            <td><?php echo $dato['hora_salida']; ?></td>
                            <td><?php echo $dato['depto']; ?></td>
                            <td><?php echo $dato['id_persona']; ?></td>
                            <td><?php echo $dato['id_vehiculo']; ?></td>
                            <td><?php echo $dato['marca']; ?></td>
                            <td><?php echo $dato['parentesco']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </article>

    </section>

</body>

</html>