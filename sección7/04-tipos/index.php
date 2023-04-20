<?php

    /*Tipos de datos:
    Enteros (int / integer) = 12
    Coma flotante / decimal (Float / double) = 34.1
    Cadenas (string) ? "hola qe pasa"
    boleano (bool) = true o false
    null
    arrays (coleeción de datos)
    ojects 
    */

    $numero = 1000;
    $decimal = 123.2;
    $cadena = "Hola que pasa choro $decimal";
    $verdadero = true;
    $nula = null;
    echo $verdadero.'<br>';
    echo gettype($nula).'<br>';
    echo $cadena.'<br>';



    //denugear
    $mi_nombre = "Diego pastén";
    var_dump($mi_nombre).'<br>';

    
    $precio = 50;
    $cantidad_productos = 15;
    
    if ($cantidad_productos > 10) {
        $precio_final = 45;
    } else {
        $precio_final = $precio;
    }
    
    $total = $cantidad_productos * $precio_final;
    
    echo "Juan debería cobrar $" . $total . " por los " . $cantidad_productos . " productos vendidos.";
    

?>