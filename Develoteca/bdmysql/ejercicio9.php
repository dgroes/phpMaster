<?php include "conexion.php";


//Conectamos con la tabla
$sql = "SELECT * FROM alumnos WHERE nombre='Kathia Espinoza' ";

//Ejecutamos esta instrucción almacenandola en $resultado
$resultado = $conexion->query($sql);

//Preguntamos si hay o no registos en la tabla
if ($resultado->num_rows > 0) {
    echo "Registros encontrados..." . "<br>";
    //Leemos los registros uno por uno con fetch_assoc
    while ($fila = $resultado->fetch_assoc()) {
        //Mostramos en $fila
        /* print_r($fila); */

        echo "id: " . $fila['id'] . " / Nombre: " . $fila['nombre'] . " / Correo: " . $fila['correo'] . "<br>";
    }
} else {
    echo "No hay registros en la tabla.";
}


?>