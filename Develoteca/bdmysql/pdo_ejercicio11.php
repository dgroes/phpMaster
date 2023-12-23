<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "pdodeveloteca";

try {
    $connection = new PDO("mysql:host=$server; dbname=$database", $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection Established..." . "<br>";

    $sentencia = $connection->prepare("DELETE FROM students WHERE id < 5");
    $sentencia->execute();
    echo "Registro Borrado ...";
    
} catch (PDOException $error) {

    echo "ERROR: " . $error->getMessage();
}
