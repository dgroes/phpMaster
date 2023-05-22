<?php

    //Imprimir por pantalla los cuatrados, que es un numero multiplicado por si mismo de los 40 primero numeros naturales.
    //PD: Utilizar bucle While.
    echo "<h3>mprimir por pantalla los cuatrados, que es un numero multiplicado por si mismo de los 40 primero numeros naturales.</h3>";
    $a = 1;
    while ($a <= 40) {
        echo "Raiz cuadradade".$a.": ".($a * $a)."<br/>";
        $a++;
    }
    echo "<h3>Otro ejemplo:</3>";
    $contador = 0;
    while($contador <= 40){
        $cuadrado = $contador*$contador;
        echo $cuadrado." ";
        $contador++;
    }
    echo "<h3>Otro ejemplo con For: </3>";
    for ($numero=0; $numero <=40 ; $numero++) { 
        $cuadrado = $numero * $numero;
        echo $cuadrado." ";
    }

?>