<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "develoteca";

$conexion = new mysqli($servidor, $usuario, $password, $basedatos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
echo "Conexión establecida..."."<br>";
