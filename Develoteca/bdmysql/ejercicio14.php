<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "develoteca";
$conexion = new mysqli($servidor, $usuario, $password, $basedatos);

if ($conexion->connect_error) {
    die("No se conectó :(..." . $conexion->connect_error);
}

echo "Archivo para ingresar tareas" . "<br>";
if ($_POST) {
    /* print_r($_POST); */
    $tarea = $_POST['tarea'];
    $stmt = $conexion->prepare("INSERT INTO tarea (id, nombre) VALUES (NULL, ?)");
    $stmt->bind_param("s", $tarea);
    $stmt->execute();
    echo "Sea ha insertado un registro a la base de datos.";
}
