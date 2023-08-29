<?php

    //Escribir un scrip en php que nos muestre todos los numeros pares del que hay del uno al cien.
    echo "<h2>Escribir un scrip en php que nos muestre todos los numeros pares del que hay del uno al cien.</h2>";
    echo "<h3>Resultado del dearrollo: </h3>";
    for ($numero=1; $numero <= 50; $numero++) { 
        echo ($numero * 2)." ";       
    }
    //Resuelto, me costó pensar en como hacer, pero lo decidí hacerlo de esta manera, se que hay mas forma de resolver este ejercicio.

    echo "<br>";
    echo "<h2>Otras forma de resolverlo: </h2>";
    for ($i = 1; $i <= 100; $i++) {
        if ($i % 2 == 0) {
            echo $i . " ";
        }
    }
    echo "<br>";
    $i = 1;
    while ($i <= 100) {
        if ($i % 2 == 0) {
        echo $i . " ";
    }
    $i++;
}

    

    
    

?>