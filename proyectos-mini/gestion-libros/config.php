<?php
// config.php

define('DB_HOST', 'localhost');
define('DB_NAME', 'library');
define('DB_USER', 'root');    // Cambia 'tu_usuario' por tu usuario de BD
define('DB_PASS', ''); // Cambia 'tu_contraseña' por tu contraseña de BD

function getDatabaseConnection() {
    try {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Error en la conexión: " . $e->getMessage());
    }
}
