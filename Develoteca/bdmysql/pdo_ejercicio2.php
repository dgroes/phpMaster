<?php

$server = "localhost";
$user = "root";
$password = "";

try {
    $conection = new PDO("mysql:host=$server", $user, $password);
    $conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión establecida con exito :) ..." . "<br>";
    //Creación de una BD el servidor
    //Se define una consulta SQL para crear una base de datos llamada "pdodeveloteca", y luego se ejecuta esa consulta utilizando el método exec de la instancia de PDO. Esto crea la base de datos en el servidor.
    $sql = "CREATE DATABASE pdodeveloteca"; 
    $conection->exec($sql);
    echo "Base de datos creada..." . "<br>";

} catch (PDOException $error) {
    echo "Error " . $error->getMessage();
}
