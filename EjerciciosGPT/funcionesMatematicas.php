<?php

    /* 
    Calcular el valor absoluto de un número ingresado por el usuario.
    Calcular la raíz cuadrada de un número ingresado por el usuario.
    Calcular el valor máximo de dos números ingresados por el usuario.
    Calcular el valor mínimo de tres números ingresados por el usuario.
    Calcular la suma de los dígitos de un número ingresado por el usuario.
    Calcular el factorial de un número ingresado por el usuario.
    Calcular el área de un círculo con un radio ingresado por el usuario.
    Calcular el perímetro de un cuadrado con un lado ingresado por el usuario.
    Convertir grados Celsius a Fahrenheit, donde el valor en Celsius es ingresado por el usuario.
    Generar un número aleatorio entre un rango de valores ingresados por el usuario.
    */
    
    echo "<h1>Comentarios de GPT</h1>";
    echo "<p>¡Excelente trabajo en la resolución de los ejercicios! Revisé tu código y parece estar correcto en general. Has utilizado las funciones matemáticas de PHP de manera adecuada para cada caso.</p>";
    echo "<p>En general, has comprendido cómo utilizar las funciones matemáticas en PHP y has aplicado las funciones adecuadas para cada ejercicio. ¡Sigue practicando y mejorando tus habilidades en PHP! Si tienes alguna otra pregunta o necesitas más ejercicios, no dudes en preguntar.</p>";
    echo "<hr>";

    echo "<h2>Calcular el valor absoluto de un número ingresado por el usuario</h2>";
    $numAbsoluto = abs(-4.2);
    echo $numAbsoluto;
    echo "<hr>";

    $numRaiz = 10;
    echo "<h2>Calcular la raíz cuadrada de un número ingresado por el usuario ($numRaiz).</h2>";
    echo sqrt($numRaiz);
    echo "<hr>";

    echo "<h2>Calcular el valor máximo de dos números ingresados por el usuario.</h2>";
    $matriz = array(2, 8);
    echo max($matriz);

    echo "<hr>";
    echo "<h2>Calcular el valor mínimo de tres números ingresados por el usuario.</h2>";
    $matrizMin = array(14,63,39);
    echo min($matrizMin);
    echo "<hr>";

    echo "<h2>Calcular la suma de los dígitos de un número ingresado por el usuario.</h2>";
    function sumas($num1, $num2){
        $suma = $num1 + $num2;
        $resultado = $num1." + ".$num2." = ".$suma;
        return $resultado;
    }
    echo sumas(15,23);
    echo "<hr>";

    echo "<h2>Calcular el factorial de un número ingresado por el usuario.</h2>";
    function factorial($numF){
        $resultado = 1; // Inicializar el resultado en 1

        for ($i = 1; $i <= $numF; $i++) { 
            $resultado *= $i; // Multiplicar el resultado por cada número desde 1 hasta $numF
        }

        return $resultado;
    }

    echo factorial(5);
    echo "<hr>";

    echo "<h2>Calcular el área de un círculo con un radio ingresado por el usuario.</h2>";
    function calcularRadio($diametro){
        $radio = ($diametro / 2);
        return $radio;
    }
    echo calcularRadio(5);
    echo "<hr>";

    echo "<h2>Calcular el perímetro de un cuadrado con un lado ingresado por el usuario.</h2>";
    $poligono = array(17,11,15);
    echo "El perimetro del poligono es: ".array_sum($poligono)."cm "; echo "<br>";
    $cuadrado = array(30,30,30,30);
    echo "El perimetro del cuadrado es: ".array_sum($cuadrado)."cm ";
    echo "<hr>";

    echo "<h2>Convertir grados Celsius a Fahrenheit, donde el valor en Celsius es ingresado por el usuario.</h2>";
    function calcularTemperatura($celsius){
        $fahrenheit = ($celsius * 9/5)+ 32;
        return $fahrenheit;
    }
    echo "La conversión de Celsius a Fahrenheit es: ".calcularTemperatura(3)."°F";
    echo "<hr>";

    echo "<h2>Generar un número aleatorio entre un rango de valores ingresados por el usuario.</h2>";
    echo rand(20,10000000);

    

?>