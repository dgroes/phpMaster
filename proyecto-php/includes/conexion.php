<?php

$servidor = 'localhost';
$usuario = 'root';
$password = '';
$basededatos = 'blog_master';
$db = mysqli_connect($servidor, $usuario, $password, $basededatos);

//Para establecer el juego de caracteres a utf8. Importante si se trabaja con caracteres especiales entre la BD y el script de PHP
mysqli_query($db, "SET NAMES 'utf8'");
