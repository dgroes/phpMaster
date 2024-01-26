<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$databse = 'onBreak';
$conn = mysqli_connect($servername, $username, $password, $databse);

//Para establecer el juego de caracteres a utf8. I'mportante si se trabaja con caracteres especiales entre la BD y el script de PHP
mysqli_query($conn, "SET NAMES 'utf8'");

//Para verificar si la configuración a la conexión es correcta
/* if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 */