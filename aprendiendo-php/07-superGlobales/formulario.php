<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8"/>
        <title>Formulario en PHP</title>
    </head>
    <body>
        <h1>Formulario en php</h1>
        <form action="recibir.php" method="post">
            <p>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre">
            </p>
            <p>
                <label for="apellido">apellido</label>
                <input type="text" name="apellido">  
            </p>
            <input type="submit" value="Enviar datos">
        </form>
    </body>
</html>

<?php


?>