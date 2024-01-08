<?php
// Verificar si se reciben los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $detalle = $_POST["detalle"];
    $fecha = $_POST["fecha"];

    // Aquí puedes guardar los datos en una base de datos o en un archivo, según tus necesidades

    // Por ejemplo, guardar en un archivo
    $tarea = "Título: $titulo\nDetalle: $detalle\nFecha: $fecha\n\n";
    file_put_contents('tareas.txt', $tarea, FILE_APPEND);

    // Redirigir a la página principal
    header("Location: index.php");
    exit();
}
?>
