<?php

$server = 'localhost';
$user = 'root';
$password = '';
$database = 'evento_db';

//Conexi+on a la BD:
$db = mysqli_connect($server, $user, $password, $database);

if (!$db) {
    die("Error de conexión: " . mysqli_connect_error());
}

//Establecer el juego de caracteres a UTF8
if (!mysqli_set_charset($db, "utf8")) {
    die("Error al establecer el juego de caracteres: " . mysqli_error($db));
}

//Iniciar la sesión
if (!isset($_SESSION)) {
    session_start();
}
