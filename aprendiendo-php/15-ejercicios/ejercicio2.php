<?php

    //Escribr un programa que añada valores a una array, mientras que su longitud sea menor a 12 y luego mostarlo en pantalla.
    $coleccion = array();

    for($i = 0; $i <12; $i++){
        array_push($coleccion, " / ".$i);
    }
    echo var_dump($coleccion);
?>