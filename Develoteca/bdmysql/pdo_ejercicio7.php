<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "pdodeveloteca";

try {
    $connection = new PDO("mysql:host=$server; dbname=$database", $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection Established..." . "<br>";

    $sentencia = $connection->prepare("INSERT INTO students (id, name, email)
    VALUES(NULL,:name,:email)");
    $sentencia->bindParam(":name", $name);
    $sentencia->bindParam(":email", $email);
    $name = "Niña";
    $email = "nina@gmail.com";
    $sentencia->execute();

    $name = "Tadashi";
    $email = "tadashi.san@gmail.com";
    $sentencia->execute();

} catch (PDOException $error) {

    echo "ERROR: " . $error->getMessage();

}

//$sentencia = $connection->prepare("INSERT INTO students (id, name, email)
//En esta línea, se prepara una sentencia SQL para la inserción de datos en la tabla "students". Se utiliza la forma preparada de la sentencia SQL para evitar la inyección de SQL y mejorar la seguridad. Los marcadores de posición :name y :email se utilizan para representar los valores que se insertarán más adelante.

/* $sentencia->bindParam(":name", $name);
    Aquí, se utilizan los métodos bindParam para enlazar los valores de las variables $name y $email a los marcadores de posición :name y :email, respectivamente. Esto significa que cuando se ejecute la sentencia más adelante, estos valores se sustituirán en los lugares correspondientes.
 */

 /**$name = "Niña";
    $email = "nina@gmail.com";
    $sentencia->execute();
  *     Se asignan valores a las variables $name y $email. Estos valores se utilizarán en la    sentencia preparada cuando se ejecute. Después, se llama a $sentencia->execute() para ejecutar la sentencia SQL con los valores actuales de las variables.
  */