<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "pdodeveloteca";

try {
    $connection = new PDO("mysql:host=$server; dbname=$database", $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection Established..." . "<br>";

    //Importante el WHERE en el UPDATE, sino se actualizarán todos los registros.
    $sentencia = $connection->prepare("UPDATE students SET name = 'David' WHERE id = 5");
    $sentencia->execute();
    echo "Registro actualizado ...";
} catch (PDOException $error) {

    echo "ERROR: " . $error->getMessage();
}
