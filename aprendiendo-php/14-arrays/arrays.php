<?php

    //Arrays
    /*Los arrays en PHP son estructuras de datos que nos permiten almacenar múltiples valores en una sola variable. Son extremadamente útiles para organizar y manipular conjuntos de datos relacionados. */

    //Primera forma de definir un Array
    $peliculas = array('batman', 'spiderman', 'iron man', 'shrek');
    var_dump($peliculas[2]);
    
    //Segunda forma de definir un Array
    $cantantes = ['eminem', '50cent', 'lamar'];
    echo "<br>";
    
    
    echo $peliculas['0'];
    echo "<br>";
    echo $cantantes['1'];
    echo "<br>";
    
    //Mostrar todos los valores de una Array mediante un bucle
    echo "<h3>Listado de peiculas</h3>";
    echo "<ul>";
    for ($i=0; $i < count($peliculas) ; $i++) { 
        echo "<li>".$peliculas[$i]."</li>";
    }
    echo "</ul>";
    echo "<br>";
    
    //Recorer un array con un foreache
    /* El bucle foreach en PHP se utiliza para iterar sobre los elementos de un array o una colección de elementos. Es especialmente útil cuando quieres recorrer todos los elementos de un array sin necesidad de utilizar un índice.*/
    echo "<h3>Listado de cantantes</h3>";
    echo "<ul>";
    foreach ($cantantes as $key => $cantante) {
        echo "<li>".$cantante."</li>";
    }
    echo "</ul>";
    echo "<hr>";
    echo "<h3>Array asociativo</h3>";
    echo "<p>Los arrays asociativos en PHP son una estructura de datos que permite asociar claves con valores. A diferencia de los arrays numéricos, donde los valores se acceden mediante índices numéricos, en los arrays asociativos los valores se acceden mediante claves personalizadas</p>";

    $personas = array(
        'nombre'=>'diego',
        'apellidos'=>'pasten',
        'profesion'=>'ingeniero informatico'
    );

    var_dump($personas);
    "<br>";
    echo $personas['profesion'];
    
    echo "<hr>";
    echo "<h3>Array Multidimensional</h3>";
    echo "<p>Los arrays multidimensionales en PHP son arrays que contienen otros arrays como elementos. En otras palabras, un array multidimensional es un array en el que cada elemento puede ser otro array, lo que crea una estructura de datos jerárquica con múltiples niveles.</p>";
    $contactos = array(
        array(
            'nombre'=>'Diego',
            'email'=>'diegop@gmail.com'
        ),
        array(
            'nombre'=>'Damian',
            'email'=>'damian2048@gmail.com'
        ),
        array(
            'nombre'=>'Brian',
            'email'=>'brianssyn@gmail.com'
        )
    );
    var_dump($contactos);
    echo "<br>";
    echo $contactos[1]['email'];
    echo "<br>";

    foreach ($contactos as $key => $contacto) {
        var_dump($contacto['nombre']);
    }



?>