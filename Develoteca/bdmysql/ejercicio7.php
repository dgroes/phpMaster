<?php

include "conexion.php";

//prepare 
/* La función prepare en MySQLi se utiliza para preparar una consulta SQL para su ejecución. La preparación de consultas SQL es una técnica recomendada para mejorar la seguridad y el rendimiento en aplicaciones web. */

//STMT
/* stmt es una convención comúnmente utilizada para referirse a un objeto mysqli_stmt, que representa una sentencia preparada en MySQLi.

Utilizar nombres descriptivos y significativos para las variables es una buena práctica de programación, ya que hace que el código sea más legible y comprensible. En el contexto de MySQLi, muchos desarrolladores optan por usar stmt como una abreviatura de "statement" (sentencia), ya que ayuda a indicar claramente que se trata de un objeto de sentencia preparada.

Es importante destacar que el nombre exacto de la variable es una cuestión de preferencia y estilo de codificación. Siempre es bueno elegir nombres que sean descriptivos y que otros desarrolladores puedan entender fácilmente al leer el código. Si prefieres utilizar un nombre más descriptivo y específico en lugar de stmt, eso está bien siempre y cuando sigas siendo consistente en tu código.*/

//BIND_PARAM
/* El método bind_param en MySQLi se utiliza para vincular variables a los marcadores de posición en una sentencia preparada antes de ejecutarla.  */
/* "ss": Es un formato de cadena que indica los tipos de datos de las variables que se van a enlazar. En este caso, "ss" significa que se esperan dos cadenas. Si los datos fueran enteros, usarías "ii", y así sucesivamente. Los tipos de datos posibles son:

i: integer
d: double
s: string
b: blob (para datos binarios)
$nombre y $correo: Son las variables que se están vinculando a los marcadores de posición. Estas variables contendrán los valores reales que se insertarán en la base de datos.

El uso de bind_param ayuda a prevenir inyecciones SQL al proporcionar un mecanismo seguro para incorporar datos variables en declaraciones SQL. Cuando utilizas bind_param, MySQLi se encarga de escapar y citar correctamente los valores, reduciendo así el riesgo de ataques de inyección SQL. Además, mejora el rendimiento al permitir a MySQLi preparar y optimizar la consulta una vez, y luego ejecutarla varias veces con diferentes valores.

En resumen, bind_param es esencial cuando trabajas con sentencias preparadas en MySQLi para garantizar la seguridad y la eficiencia en tus consultas SQL. */

$stmt = $conexion->prepare("INSERT INTO alumnos (id, nombre, correo)
    VALUES (NULL, ?, ?) ");

$stmt->bind_param("ss", $nombre, $correo);

$nombre = "Buzz Lightyear";
$correo = "miNave@gmail.com";
$stmt->execute();

$nombre = "Woody";
$correo = "unaSerpienteEnMiBota@gmail.com";
$stmt->execute();


$conexion->close();
