<?php
$servidor = "localhost";
$usuario = 'root';
$password = '';
$basededatos = 'unifile';

try {
    $dsn = "mysql:host=$servidor;dbname=$basededatos;charset=utf8mb4";
    $opciones = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $db = new PDO($dsn, $usuario, $password, $opciones);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

// Iniciar la sesión
if (!isset($_SESSION)) {
    session_start();
}
