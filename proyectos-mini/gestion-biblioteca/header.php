<?php
require_once 'class.php';

// Instanciar la clase Biblioteca
$biblioteca = new Biblioteca();

// Obtener la lista de libros disponibles
$librosDisponibles = $biblioteca->mostrarLibrosDisponibles();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Biblioteca</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
</head>

<body>
    <main class="container">
        <nav>
            <ul>
                <li>
                    <h1><strong>Mini Biblioteca</strong></h1>
                </li>
            </ul>
            <ul>
                <li><a href="index.php">Libros</a></li>
                <li><a href="agregar_libro.php">Agregar Libro</a></li>
                <li><a href="buscar_libro.php">Buscar</a></li>
            </ul>
        </nav>
