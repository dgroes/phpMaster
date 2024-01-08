<?php 

//Definiendo el servidor con las credenciales
$server = "localhost";
$user = "root";
$password = "";
$database = "mirador";

try {
    $conection = new PDO("mysql:host=$server;dbname=$database", $user, $password);

    $conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "conexión establecida...". "<br>";

} catch (PDOException $error){
    echo "error" . $error->getMessage();
}
