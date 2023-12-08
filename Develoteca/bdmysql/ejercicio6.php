<?php

include "conexion.php";


$sql = "INSERT INTO alumnos (id,nombre, correo)
    VALUES (NULL, 'Kathia Espinoza', 'julieta_20@gmail.com');";

$sql .= "INSERT INTO alumnos (id,nombre, correo)
    VALUES (NULL, 'Esteban Hidalgo', 'estebi@gmail.com');";

$sql .= "INSERT INTO alumnos (id,nombre, correo)
    VALUES (NULL, 'Jose Alarcon', 'soyhuaso@gmail.com');";
if ($conexion->multi_query($sql) == TRUE) {
    $id = $conexion->insert_id;
    echo "Registro agregado con el id: " . $id . "<br>";
} else {
    echo "Hube un error" . $conexion->error;
}
$conexion->close();
