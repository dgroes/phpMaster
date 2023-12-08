<?php

include "conexion.php";

$sql = "INSERT INTO alumnos (id,nombre, correo)
    VALUES (NULL, 'Diego Pasten', 'diegopasten78@gmal.com')";

if ($conexion->query($sql) == TRUE) {
    $id = $conexion->insert_id;
    echo "Registro agregado con el id: " . $id;
} else {
    echo "Hube un error" . $conexion->error;
}
$conexion->close();
