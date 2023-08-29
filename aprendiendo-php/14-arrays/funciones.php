<?php
    echo "<h3>Funciones en Arrays</h3>";
    echo "<p>En PHP, existen varias funciones integradas que se utilizan comúnmente para manipular y trabajar con arrays.</p>";

    $guitarras = ['Telecaster', 'Jazz Master', 'ES 335', 'Stratocaster', 'Les Paul'];
    $numeros = [1,5,3,6,2,4,8,7];
    asort($guitarras);
    var_dump($guitarras);
    echo "<br>";
    //El Ordena un array en orden ascendente. 
    sort($numeros);
    var_dump($numeros);
    echo "<hr>";

    echo "<p>Agregando nuevos elementos a una array</p>";
    $guitarras[]="SG";
    var_dump($guitarras);
    echo "<br>";
    array_push($guitarras, "RD");
    var_dump($guitarras);
    echo "<br>";
    array_pop($guitarras);
    var_dump($guitarras);
    unset($guitarras[4]);
    var_dump($guitarras);
    echo "<br>";

    //Aleatorieo
    // Aleatorio
    $indice = array_rand($guitarras);
    echo $guitarras[$indice];







?>