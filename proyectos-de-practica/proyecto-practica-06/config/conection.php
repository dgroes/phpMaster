<?php

$server = 'localhost';
$user = 'root';
$pasword = '';
$database = 'blog_cirice';
$db = mysqli_connect($server, $user, $pasword, $database);

mysqli_query($db, "SET NAMES 'utf8'");

//Iniciar la Sesión
if (!isset($_SESSION)){
    session_start();
}