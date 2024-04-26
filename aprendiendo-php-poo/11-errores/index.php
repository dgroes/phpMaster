<?php

//Capturar exepciones en códgio susceptible a errores
try {
    if (isset($_GET['id'])) {
        echo "<h1>El parametro es: {$_GET['id']}</h1>";
    } else {
        throw new Exception("Faltan parametros por la URL");
    }
} catch (Exception $e) {
    echo "Hay habido en error: " . $e->getMessage();
}
