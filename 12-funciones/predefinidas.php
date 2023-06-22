<?php

    echo "<h2>PHP proporciona muchas funciones predefinidas que son ampliamente utilizadas y útiles para realizar diversas tareas en el desarrollo de aplicaciones web.</h2>";
    echo "<hr>";
    echo "<h3>Debugear</h3>";
    $nombre = "diego";
    var_dump($nombre);
    echo "<hr>";

    echo "<h3>Fechas</h3>";
    echo date('d-m-y');
    echo "<br>";
    echo time();
    echo "<hr>";
    
    echo "<h3>Funciones Matematicas</h3>";
    echo "raiz cuadrada de 10: ".sqrt(10);
    echo "<br>";
    echo "Numero aleatoreo entre 10 y 40: ".rand(10,40);
    echo "<br>";
    echo "Numero PI: ".pi();
    echo "<br>";
    echo "Redondear nota 6.8558172: ".round(6.85, 1);
    echo "<hr>"
?>