<?php

    echo "<h2>Ejercicios</h2>";
    
    echo "<h3>1. Suma de elementos: Crea una función llamada sumaArray que reciba un array de números como argumento y devuelva la suma de todos los elementos.</h3>"; 
    function sumaArray($array) {
        $suma = 0;
        foreach ($array as $numero) {
            $suma += $numero;
        }
        return $suma;
    }
    
    $nums = [1, 2, 3, 4, 5];
    echo sumaArray($nums); // Output: 15
    


    echo "<h3>2. Buscar elemento: Escribe una función llamada buscarElemento que reciba un array y un elemento a buscar. La función debe devolver true si el elemento se encuentra en el array y false en caso contrario. </h3>";
    function buscarElemento($array, $elemento) {
        foreach ($array as $valor) {
            if ($valor === $elemento) {
                return true;
            }
        }
        return false;
    }
    
    $nums = [1, 2, 3, 4, 5];
    echo buscarElemento($nums, 3); // Output: true
    echo buscarElemento($nums, 6); // Output: false
    
    
    echo "<h3>. </h3>"; 
    echo "<h3>. </h3>"; 
    echo "<h3>. </h3>"; 
    echo "<h3>. </h3>"; 
    echo "<h3>. </h3>"; 
    echo "<h3>. </h3>"; 
    echo "<h3>. </h3>"; 
    echo "<h3>. </h3>"; 
    echo "<h3>. </h3>"; 


?>