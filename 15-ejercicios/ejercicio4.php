<?php

    //Crear un scrip que tenga 4 variables una de tipo array, otra string, otra int, otra booleana y que imprima un mensaje según el tipo de variable que sea.

    $matriz = array("Hola mundo", 23);
    $titulo = "Master en PHP";
    $numero = 28;
    $verdadero = true;
    
    if(is_array($matriz)){
        echo "El array es un array";
    }

    if(is_string($titulo)){
        echo $titulo;
    }

    if(is_integer($numero)){
        echo "Es un entero: $numero";
    }

    if(is_bool($verdadero)){
        echo "El booleano es verdadreo";
    }

?>