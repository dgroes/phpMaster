<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "develoteca";

$conexion = new mysqli($servidor, $usuario, $password, $basedatos);
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
echo "Conexión establecida..." . "<br>";

$sql = "INSERT INTO alumnos (id, nombre, correo)
VALUES (NULL, 'Diego Pasten', 'diegopasten78@gmail.com')";

if ($conexion->query($sql) == TRUE) {
    echo "Registro agregado";
} else {
    echo "Hubo un error" . $conexion->error;
}

$conexion->close();
