<?php

$server = 'localhost';
$user = 'root';
$password = '';
$database = 'transporte';
$db = mysqli_connect($server, $user, $password, $database);

//Establecer el juego de caracteres a UTF8.
mysqli_query($db, "SET NAMES 'utf8'");

