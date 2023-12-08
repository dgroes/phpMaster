<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$conexion = new mysqli($servidor, $usuario, $password);

if ($conexion->connect_error) {
    die("Error de concexión: " . $conexion->connect_error);
}

echo "Conexión establecida..."."<br>";

$sql = "CREATE DATABASE develoteca";

if ($conexion->query($sql) === TRUE) {
    echo "Base de datos Creada";
} else {
    echo "Error ".$conexion->error;
}
