<?php

// FOR
/* estructura de control de flujo en PHP que permite repetir un bloque de código un número determinado de veces. Se utiliza comúnmente cuando se conoce de antemano la cantidad de veces que se desea repetir el código.
*/    
    
    $resultado = 0;
    for($i = 0; $i <= 100; $i++){
        $resultado = $resultado + $i;
    }
    echo $resultado;

?>