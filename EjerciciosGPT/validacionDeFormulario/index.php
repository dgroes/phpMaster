<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario de contacto</title>
</head>
<body>
    <h1>Formulario de contacto</h1>
    <form action="procesar_formulario.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
