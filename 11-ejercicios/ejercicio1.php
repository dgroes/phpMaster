<?php

    // Crear 2 variables, pais y continente y mostrar su valor por pantalla
    // y luego poner en un comentario poner el tipo de dato que tienen.
    
    $pais = "Chile";
    $continente = "LATAM";
    echo "El país es ".$pais." y el continente al cual pertenece es ".$continente.".";
    echo "<br>";
    echo " Y sus datos son: ".var_dump($pais)." y ".var_dump($continente);


?>