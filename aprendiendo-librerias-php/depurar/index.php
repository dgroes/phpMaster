<?php

require_once '../vendor/autoload.php';

$frutas = array("Mazanas", "Naranjas", "Platanos");

\FB::log($frutas);

echo "Hola Mundo";


\FB::log("Muestrame esto en consola");



// Enviar un mensaje de información a la consola de herramientas de desarrollo
fb("Este es un mensaje de información");

// Enviar un mensaje de error a la consola de herramientas de desarrollo
fb("¡Error! Algo salió mal", FirePHP::ERROR);