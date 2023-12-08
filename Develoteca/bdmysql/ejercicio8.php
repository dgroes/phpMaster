<?php

include "conexion.php";

/* 
Ejecución de Consultas SQL:
Se ejecuta una consulta SQL para seleccionar todos los registros de la tabla de alumnos.

Manejo de Resultados:
Se utiliza $conexion->query($sql) para ejecutar la consulta y se almacenan los resultados en la variable $resultado.
Se verifica si hay resultados con $resultado->num_rows.
Se utiliza un bucle while para recorrer los resultados uno por uno con $resultado->fetch_assoc().

Mostrar Resultados:
Se muestran los resultados en formato legible, en este caso, se imprimen los campos id, nombre, y correo de cada registro.

Seguridad:
Aunque este código no muestra la forma de evitar la inyección SQL, es importante destacar que el uso de consultas preparadas (prepared statements) es una mejor práctica para evitar este tipo de ataques. En un entorno de producción, se deberían usar consultas preparadas y vinculación de parámetros.

Prácticas de Codificación:
Se utiliza la estructura de control if para manejar errores y mostrar mensajes apropiados según el resultado. Se comentan las líneas de código para explicar el propósito de cada sección.

Estos conceptos son fundamentales para desarrollar aplicaciones web robustas y seguras con PHP y MySQLi. Además, este ejercicio proporciona una introducción al manejo de resultados de consultas y a la visualización de datos en un formato fácil de entender.
*/


//Conectamos con la tabla
$sql = "SELECT * FROM alumnos";

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


//fetch_assoc es un método de la clase mysqli_result en PHP que se utiliza para obtener una fila de resultados como un array asociativo.