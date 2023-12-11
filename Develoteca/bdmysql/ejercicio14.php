<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "develoteca";
$conexion = new mysqli($servidor, $usuario, $password, $basedatos);

if ($conexion->connect_error) {
    die("No se conectó :(..." . $conexion->connect_error);
}

//Agregar una Tarea
echo "Archivo para ingresar tareas" . "<br>";
if ($_POST) {
    /* print_r($_POST); */
    $tarea = $_POST['tarea'];
    $stmt = $conexion->prepare("INSERT INTO tarea (id, nombre) VALUES (NULL, ?)");
    $stmt->bind_param("s", $tarea);
    $stmt->execute();
    echo "Sea ha insertado un registro a la base de datos.";
}

//Borrar una tarea
if ($_GET) {
    $id = $_GET['id'];
    $stmt = $conexion->prepare("DELETE FROM tarea WHERE id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
}

//Leer registros de la tabla tarea
$sql = "SELECT * FROM tarea ORDER BY id ASC";
$resultado  = $conexion->query($sql);
$datos = $resultado->fetch_all();
