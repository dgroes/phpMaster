<?php
/* DEFINIR LAS CREDENCIALES PARA ACCEDER A LA BD: */
$server = 'localhost';
$user = 'root';
$password = '';
$database = 'blog-switzer';

/* Conexión a la BD */
$db = mysqli_connect($server, $user, $password, $database);

if (!$db) {
    die("Error de conexión: " . mysqli_connect_error());
}

/* ESTABLECER EL JUEGO DE CARACTERES A UTF8 */
if (!mysqli_set_charset($db, "utf8")) {
    die("Error al establecer el juego de caracteres: " . mysqli_error($db));
}
