<?php

    /// Ejercicio 1: Crear una sesión que aumente su valor en uno o disminuya en uno en función de si el parámetro counter está a uno o cero.

// Iniciando la sesión
session_start();

// Verificar si la variable de sesión 'numero' está definida
if (!isset($_SESSION['numero'])) {
    $_SESSION['numero'] = 0; // Si no está definida, inicializarla con cero
}

// Verificar si el parámetro 'counter' está definido en la URL
if (isset($_GET['counter'])) {
    $counter = $_GET['counter']; // Obtener el valor del parámetro 'counter'

    // Aumentar o disminuir el valor de la variable de sesión 'numero' según el valor del parámetro 'counter'
    if ($counter == 1) {
        $_SESSION['numero']++;
    } elseif ($counter == 0) {
        $_SESSION['numero']--;
    }
}

?>
<h1>El valor de la sesión numero es: <?=$_SESSION['numero']?></h1>
<a href="ejercicio1.php?counter=1">Aumentar el valor</a><br>
<a href="ejercicio1.php?counter=0">Disminuir el valor</a>

<a href="ejercicio1.php?counter=0">Disminuir el valor</a>