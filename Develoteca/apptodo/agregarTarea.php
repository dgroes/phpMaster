<?php

try {
    $conn = new PDO('mysql:host=localhost;dbname=todolist', 'root', '');
    echo "Conexión establecida.<br/>";
} catch (PDOException $e) {
    echo "error de conexión: " . $e->getMessage();
}
