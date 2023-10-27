<?php
//CONEXION A LA BD
$servidor = 'localhost';
$usuario = 'root';
$password = '';
$basededatos = 'proyecto_practica_uno';
$db = mysqli_connect($servidor, $usuario, $password, $basededatos);

mysqli_query($db, "SET NAMES 'utf8'");

//Iniciar la sesión
session_start();

?>