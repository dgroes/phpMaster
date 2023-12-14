<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "pdodeveloteca";

try {
    $connection = new PDO("mysql:host=$server; dbname=$database", $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection Established..." . "<br>";

    //Creación de una TABLA
    $sql = "CREATE TABLE students (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL
    )";

    $connection->exec($sql);
    echo "New Table Created In The Database";


} catch (PDOException $error) {
    echo "Error " . $error->getMessage();
}
