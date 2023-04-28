<?php

    //  WHILE
    echo "<h3> El while en PHP es una estructura de control de flujo que permite repetir un bloque de código mientras se cumpla una determinada condición. Es decir, mientras la condición sea verdadera, el código dentro del while se ejecutará una y otra vez. </h3>";

    $num = 0;
    while($num <= 100){
        echo $num." ";
        $num++;
    }

    echo "<hr>";
    $num = 1;
    $sum = 0;
    while ($num <= 100) {
        $sum += $num;
        $num++;
    }
    echo "La suma es: " . $sum;
    echo "<hr>";

    // Tabla de multiplicar
    if(isset($_GET[$numero])){
        $numero = $_GET['numero'];
    }else{
        $numero = 1;
    }
    var_dump($numero);

?>