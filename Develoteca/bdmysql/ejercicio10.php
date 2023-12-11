<?php include "conexion.php";

$sql = "SELECT * FROM alumnos WHERE id>5 ORDER BY id DESC";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo "Registros encontrados..." . "<br>";
    while ($fila = $resultado->fetch_assoc()) {
        //Mostramos en $fila
        /* print_r($fila); */

        echo "id: " . $fila['id'] . " / Nombre: " . $fila['nombre'] . " / Correo: " . $fila['correo'] . "<br>";
    }
} else {
    echo "No hay registros en la tabla.";
}


?>