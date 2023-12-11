<?php include "conexion.php";

$sql = "UPDATE alumnos SET nombre='Diego Andres' WHERE id=5";

if ($conexion->query($sql) === TRUE) {
    echo "Registro Actualizado :) ";
} else {
    echo "El registro no se pudo actualizar :( " . $conexion->error;
}
