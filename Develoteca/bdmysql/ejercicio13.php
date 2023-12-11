<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "develoteca";
$conexion = new mysqli($servidor, $usuario, $password, $basedatos);

$resultado = $conexion->query("CALL obtenerNombre()");

while ($fila = $resultado->fetch_assoc()) {
    echo "Dato: " . $fila['dato'] . "<br>";
}
