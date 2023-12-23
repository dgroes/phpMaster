<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "pdodeveloteca";

$conexion = new PDO("mysql:host=$servidor;dbname=$basedatos", $usuario, $password);
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo "Archivo para ingresar tareas" . "<br>";
if ($_POST) {
    $tarea = $_POST['tarea'];
    $sentencia = $conexion->prepare("INSERT INTO tareas(id, tarea) VALUES (NULL,:tarea)");
    $sentencia->bindParam(':tarea', $tarea);
    $sentencia->execute();
    echo "Registro agregado <br>";
    header("Location:?"); /*Evitar que se agregen registros de manera automatica cuando la pagina se actualiza */
}



if ($_GET) {
    $sentencia = $conexion->prepare("DELETE FROM tareas WHERE id =:id");
    $sentencia->bindParam(':id', $id);
    $id = $_GET['id'];
    $sentencia->execute();
    header("Location:?");
    
}

$sentencia = $conexion->prepare("SELECT * FROM tareas");
$sentencia->execute();
$resultado = $sentencia->setFetchMode(PDO::FETCH_ASSOC);
$datos = $sentencia->fetchAll();
