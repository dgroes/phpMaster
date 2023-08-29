<?php

    echo "<h2>PHP proporciona muchas funciones predefinidas que son ampliamente utilizadas y útiles para realizar diversas tareas en el desarrollo de aplicaciones web.</h2>";
    echo "<hr>";
    echo "<h3>Debugear</h3>";
    $nombre = "diego";
    var_dump($nombre);
    echo "<hr>";

    echo "<h3>Fechas</h3>";
    echo date('d-m-y');
    echo "<br>";
    echo time();
    echo "<hr>";
    
    echo "<h3>Funciones Matematicas</h3>";
    echo "raiz cuadrada de 10: ".sqrt(10);
    echo "<br>";
    echo "Numero aleatoreo entre 10 y 40: ".rand(10,40);
    echo "<br>";
    echo "Numero PI: ".pi();
    echo "<br>";
    echo "Redondear nota 6.8558172: ".round(6.85, 1);
    echo "<hr>";

    echo gettype($nombre);
    echo "<br>";

    if(is_string($nombre)){
        echo "Es un String";
    }else{
        echo "Esa variable no es un String";
    }

    echo "<br>";
    if(isset($edad)){
        echo "La variable existe";
    }else{
        echo "La variable no existe.";
    }
    echo "<br>";
    $frase = "   Hola     que    tal   ?";
    var_dump(trim($frase));

    echo "<br>";
    //Eliminar indices / varaibles 
    $year = 2023;
    unset($year);
    var_dump($year);
    
    echo "<br>";
    //COmprovar varible vacia
    $texto= "";
    if(empty($texto)){
        echo "La variable texto está vacia";
    }else{
        echo "La varible tiene contenido";
    }
    
    //Contar caracteres de un String
    echo "<br>";
    $cadena = "abcde";
    echo strlen($cadena);


    //Encontrar caracter
    echo "<br>";
    $frases = "Ya tu sabe";
    echo strpos($frases, "t");
    echo "<br>";
    if(strpos($frases, "sabe")){
        echo "Dentro de la frase, si existe 'sabe'.";
    }else{
        echo "Dentro de la frase no existe 'sabe'.";
    }

    echo "<br>";
    //Reemplazar palabras de un string
    $frases =str_replace("ya", "Hola", $frases);
    echo $frase;
    echo "<br>";
    
    //Matusculas y minusculas
    echo strtolower($frases);
    echo "<br>";
    echo strtoupper($frases);

    ?>