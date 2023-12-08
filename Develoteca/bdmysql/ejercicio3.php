<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "develoteca";

$conexion = new mysqli($servidor, $usuario, $password, $basedatos);

if ($conexion->connect_error) {
    die("Error de concexión: " . $conexion->connect_error);
}

echo "Conexión establecida..." . "<br>";

$sql = "CREATE TABLE alumnos(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    correo VARCHAR(50) NOT NULL
    );";

if ($conexion->query($sql) == TRUE) {
    echo "Tabla creada";
} else {
    echo "Hubo un error" . $conexion->error;
}
