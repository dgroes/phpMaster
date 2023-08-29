<?php

 //Ejercicio 1: Hacer un programa que tenga una Array con 8 numeros enteros y que haga lo siguiente: a) Recorer y mostrar el array, b) ordenarlo y mostrar el array, c) mostrar su longitud, d) mostrar algún elemento dentro del array.


    //Funciones
    function mostrarArray($numeros){
        $resultado = "";
        foreach ($numeros as $numero) {
            $resultado .= $numero." / ";
        }
        return $resultado;
    } 

    //Crear array
    $numeros = array(8, 2, 4, 5, 7, 6, 1, 3);
    
    //Recorrer y Mostrar
    echo "<h3>Recorrer y mostrar</h3>";
    echo mostrarArray($numeros);
    echo "<hr>";

    //Ordenar y mostrar
    echo "<h3>Ordenar y mostrar</h3>";
    sort($numeros);
    echo mostrarArray($numeros);

    //Mostrar su longitud
    echo "<hr>";
    echo "<h3>Longitud de Array</h3>";
    echo count($numeros);

    //Busqueda en el array
    echo "<hr>";
    $busqueda = 4;
    echo "<h3>Buscar en el array el numero $busqueda</h3>";
    $search = array_search($busqueda, $numeros);
    if(!empty($search)){
        echo "<p>EL numero buscado existe dentro del array, en el indice: $search</p>";
    }else{
        echo "<p>El numero buscado no existe dentro del array</p>";
    }
    

 

?>