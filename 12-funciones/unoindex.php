<?php

    //Función es un bloque de código que se puede reutilizar para realizar una tarea específica. Las funciones en PHP tienen un nombre, pueden recibir argumentos (parámetros), pueden devolver un valor y se pueden llamar desde otras partes del código.
    function muestra_nombres(){
        echo "Diego </br>";
        echo "Andrés</br>";
        echo "Ramon </br>";
    }
    muestra_nombres();

    echo "<br>";

    //Ejemplo 2
    function tabla($numero){
            echo "<h3>Tabla de multiplicar del numero: $numero</h3>";
            for ($i=0; $i <= 10 ; $i++) { 
                $operacion = $numero*$i;
                echo "$numero x $i = $operacion <br>";
            }
    }
    tabla(29);

    //Ejemplo 3
    echo "<br>";
    echo "<h3>Calculadora</h3>";
    function calculadora($numero1, $numero2){
        $suma = $numero1 + $numero2;
        $resta = $numero1 - $numero2;
        $multiplicacion = $numero1 * $numero2;
        $division = $numero1 / $numero2;
        echo "Suma: $suma <br>";
        echo "Resta: $resta <br>";
        echo "Multiplicación: $multiplicacion <br>";
        echo "División: $division";
    }
    calculadora(5,5);

    echo "<hr>";
    echo "<h3>Return en una Función</h3>";
    function devuelveNombre ($name){
        return "El nombre es: $name";
    }
    echo devuelveNombre("Andy");


    /* function devuelveNombre ($name){
        echo "El nombre es: $name";
    }
    devuelveNombre("Andy"); */

    //Ejemplo 4
    echo "<hr>";
    echo "<h3>Función dentro de otra</h3>";
    function getNombre($name){
        $texto = "El nombbre es: $name";
        return $texto;
    }
    function getApellido($lastName){
        $texto = "El apellido es: $lastName";
        return $texto;
    }


    function devuelveNombreApellido($name, $lastName){
        $texto = getNombre($name)
        ."<br/>".
        getApellido($lastName);
       return $texto;
    }
    echo devuelveNombreApellido("Diego","Pastén");

    echo "<hr>";
    function getSexo($sexo){
        if($sexo = "hombre"){
            $texto = "El nivel es Facil.";
        }else {
            $texto = "El Nivel Es Dificil.";
        }
        return $texto;
    }
    function dificultad($name, $lastName, $sexo){
        $texto = getNombre($name)
        ."<br>".
        getApellido($lastName)
        ."<br>".
        getSexo($sexo);
        return $texto;
    }
    echo dificultad("diego", "pasten", "hombre");


    echo "<hr>";
    echo "<h2>Ejercicios ft GPT 3.5</h2>";
    echo "<h3>Crear una función llamada saludar() que reciba como argumento el nombre de una persona y muestre por pantalla el mensaje ¡Hola, [nombre]!</h3>";
    function saludar($nombre){
        echo "¡Hola $nombre como estás?";
    }
    if(isset($_GET['nombre'])) {
        $nombre = $_GET['nombre'];
        saludar($nombre);
    } else {
        echo "Introduzca un nombre con ?nombre";
    }

    echo "<br>";
    echo "<h3>Escribir una función llamada esPar() que reciba un número como argumento y devuelva true si el número es par o false si es impar.</h3>";
    function esPar($num){
        if($num % 2 == 0){
            echo "El numero es par";
        }else{
            echo "El numero es impar";
        }
    }
    if(isset($_GET['num'])){
        esPar($_GET['num']);
    }else{
        echo "Introzuca un numero utilizando ?num";
    }

    echo "<br>";
    echo "<h3>Escribir una función llamada esPrimo() que reciba un número como argumento y determine si es un número primo. Un número primo es aquel que solo es divisible por sí mismo y por 1.</h3>";
    function esPrimo($numero) {
        // Casos especiales: 0, 1 y números negativos no son primos
        if ($numero <= 1) {
            return false;
        }
    
        // Iteramos desde 2 hasta la mitad del número para verificar si es divisible por algún otro número
        for ($i = 2; $i <= $numero / 2; $i++) {
            if ($numero % $i === 0) {
                // Si el número es divisible por $i, no es primo
                echo "No es primo";
                return false;
                
            }
        }
    
        // Si no se encontró ningún divisor, el número es primo
        return true;
    }
    echo esPrimo(6);  // Devuelve true




    echo "<br>";
    echo "<h3>Crear una función llamada calcularPromedio() que reciba un array de números como argumento y devuelva el promedio de esos números.</h3>";
    function calcularPromedio($numeros) {
        $total = 0;
        $cantidad = count($numeros);
    
        foreach ($numeros as $numero) {
            $total += $numero;
        }
    
        $promedio = $total / $cantidad;
    
        return $promedio;
    }
    
    // Ejemplo de uso de la función calcularPromedio()
    $arrayNumeros = [4, 8, 12, 6, 10];
    $promedio = calcularPromedio($arrayNumeros);
    
    echo "El promedio de los números es: " . $promedio;
    
    

?>