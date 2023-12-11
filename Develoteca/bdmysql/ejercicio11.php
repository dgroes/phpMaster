<?php include "conexion.php";

$sql = "DELETE FROM alumnos WHERE id<4";

if ($conexion->query($sql) === TRUE) {
    echo "Registro borrado :)";
} else {
    echo "Problemas al borrar :( " . $conexion->error;
}
