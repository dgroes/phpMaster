<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List con PHP</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Crear Tarea</h2>
    <form action="procesar_tarea.php" method="post">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required><br>

        <label for="detalle">Detalle:</label>
        <textarea name="detalle" required></textarea><br>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" required><br>

        <input type="submit" value="Agregar Tarea">
    </form>

    <h2>Calendario</h2>
    <?php include 'mostrar_tareas.php'; ?>
</body>
</html>
