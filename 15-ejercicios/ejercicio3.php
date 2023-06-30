<?php

    //Comprobar si una variable está vacia, y si está vacia rellenarla en texto en minusculas y mostarlo en mayusculaes y negrita.

    $texto = "";
    if(empty($texto)){
        $texto = "Rellenando texto";
        $textoMayus = strtoupper($texto);
        echo  $textoMayus;
    }


?>