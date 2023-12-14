<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "pdodeveloteca";

try {
    $connection = new PDO("mysql:host=$server; dbname=$database", $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection Established..." . "<br>";
    $sql = "INSERT INTO students (id, name, email) VALUES (NULL, 'Diego Pasten', 'diego@gmail.com')";

    $connection->exec($sql);
    $id = $connection->lastInsertId();
    echo "Datos insertados...   Ultimo registro insertado: " . $id;
} catch (PDOException $error) {
    echo "ERROR: " . $error->getMessage();
}
