<?php

    //Operadores aritmeticos.
    $numero1 = 55;
    $numero2 = 33;

    echo 'Suma: '.($numero1 + $numero2).'<br>';
    echo 'Resta: '.($numero1 - $numero2).'<br>';
    echo 'Multiplicación: '.($numero1 * $numero2).'<br>';
    echo 'División: '.($numero1 / $numero2).'<br>';
    echo 'Resto: '.($numero1 % $numero2).'<br>';


    //Operadores de incremento y decremento.
    $anio = 2023;
    $anio ++;
    echo "<h2>$anio</h2>";

    $anio2 = 2013;
    $anio2 --;
    echo "<h2>$anio2</h2>";

    //Pre-incremento
    $anio3 = 2023;
    ++$anio3;
    echo "<h2>$anio3</h2>";


    //Operadores de asignación.
    $edad = 24;
    echo $edad.'<br>';
    
    $edad2 = 24;
    echo ($edad2+=6).'<br>';
    echo $edad2;



?>