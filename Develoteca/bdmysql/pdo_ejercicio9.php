<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "pdodeveloteca";

try {
    $connection = new PDO("mysql:host=$server; dbname=$database", $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection Established..." . "<br>";

    $sentencia = $connection->prepare("SELECT * FROM students WHERE email='sunho_esp@gmail.com'");
    $sentencia->execute();
    $sentencia->setFetchMode(PDO::FETCH_ASSOC);
    $resultado = ($sentencia->fetchAll());

    foreach ($resultado as $registro) {
        echo "id: " . $registro['id'] . ": " . $registro['name'] . "  " .  $registro['email']  . "<br>";
    }
} catch (PDOException $error) {

    echo "ERROR: " . $error->getMessage();
}
