hola<!-- resources/views/tasks/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Details</title>
</head>
<body>
    <h1>Detalles de la Tarea</h1>
    <p>Título: {{ $task->title }}</p>
    <p>Descripción: {{ $task->description }}</p>
    <p>Completado: {{ $task->completed ? 'Sí' : 'No' }}</p>
</body>
</html>
