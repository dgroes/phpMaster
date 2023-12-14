<?php
 //Identificaci+on del servidor.
$servidor = "localhost";
$usuario = "root";
$password = "";

//Intento de conexión al servidor:
/* Se utiliza un bloque try para intentar ejecutar el código dentro de él. Aquí, se crea un objeto PDO que representa la conexión a la base de datos MySQL. La cadena de conexión especifica el tipo de base de datos (mysql), el host (localhost), y se proporcionan el usuario y la contraseña. */

try { 
    //Conexi+on al servidor en base a las credenciales
    $conexion = new PDO("mysql:host=$servidor", $usuario, $password);

    //Configuración de atributos de conexión:
    /* Se establece el modo de error a PDO::ERRMODE_EXCEPTION. Esto significa que PDO lanzará excepciones en caso de errores, lo cual es útil para manejar errores de manera más efectiva. */
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión establecida..." . "<br>";

} catch (PDOException $error) {
    echo "Error" . $error->getMessage();
}
