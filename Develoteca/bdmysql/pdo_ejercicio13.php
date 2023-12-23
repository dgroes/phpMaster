<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "pdodeveloteca";

try {
    $connection = new PDO("mysql:host=$server; dbname=$database", $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection Established..." . "<br>";

    $sentencia = $connection->prepare("CALL getName()");
    $sentencia->execute();
    
    $resultado = ($sentencia->fetchAll());
    print_r($resultado);

    
} catch (PDOException $error) {

    echo "ERROR: " . $error->getMessage();
}
