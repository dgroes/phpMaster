<?php

    //Las condicionales son estructuras de control de flujo que permiten que in bloque de código se ejecute solo si se cunple una determinada condición.

    /* IF: Estructura
        if (condición) {
            Código a ejecutar si se cumple la condición
        }
    */


    /* OPERADORES DE COMPARACIÓN:
        Igualdad: ==. Compara si dos valores son iguales, sin tener en cuenta el tipo de dato.

        Identidad: ===. Compara si dos valores son iguales y del mismo tipo de dato.

        Desigualdad: != o <>. Compara si dos valores son diferentes, sin tener en cuenta el tipo de dato.

        No Identidad: !==. Compara si dos valores son diferentes o no son del mismo tipo de dato.

        Mayor que: >. Compara si el primer valor es mayor que el segundo valor.

        Mayor o igual que: >=. Compara si el primer valor es mayor o igual que el segundo valor.

        Menor que: <. Compara si el primer valor es menor que el segundo valor.

        Menor o igual que: <=. Compara si el primer valor es menor o igual que el segundo valor.

        Estos operadores pueden combinarse con los operadores lógicos && (AND) y || (OR) para crear expresiones más complejas de comparación.

    */
    $color = "red";
    if($color == "red"){
        echo "El color es Rojo";
    }else{
        echo "El color no es rojo";
    }

    echo "<br>";
    $anio = 2019;
    if($anio < 2019){
        echo "Estamos en 2019!";
    }else{
        echo "No estamos en el 2019 :(";
    }

    echo '<br>';
    $num1 = 10;
    $num2 = 15;
    if($num1 < $num2){
        echo "El primer numero".$num1.", es menor que ".$num2;
    }else{
        echo "El segundo numero".$num2.", es mayor que ".$num1;
    }


    echo "<br>";
    echo "<h3>"."Crea una variable edad y determina si es mayor o menor de edad."."</h3>";
    $edad = 17;
    if($edad >= 18){
        echo "La persona es mayor de edad.";
    }else "La persona sigue siendo menor de edad, lo siento.";


    echo "<br>";
    echo "<h3>"."Crea una variable num y determina si es positivo, negativo o cero."."</h3>";
    $num = 0;
    if($num == 0){
        echo "El numero es cero";
    }elseif($num < 0){
        echo "El numero es negativo";
    }else{
        echo "El numero es positivo";
    }


    echo "<br>";
    echo "<h3>"."Crea una variable hora y determina si es de día o de noche."."</h3>";
    $hora = date("H");
    if($hora >= 6 && $hora <= 18){
        echo "Es de día";
    }else{
        echo "Es de noche";
    }


    echo "<br>";
    echo "<h3>"."Crea una variable temperatura y determina si está haciendo calor o frío."."</h3>";
    $temperatura = 14;
    if($temperatura >= 27){
        echo "Hace calor";
    }elseif($temperatura <= 26 &&  $temperatura >= 15){
        echo "Está templado";
    }else{
        echo "Hace frio";
    }

    echo "<hr>";
    echo "<h2>"."Nivel de dificultad de identidad sexual y etnia."."</h2>";
    $sexo = "hombre";
    $piel = "blanco";
    if($sexo == "mujer" ){
        if($piel == "moreno"){
            echo "Estás en nivel muy dificil.";
        }elseif($piel == "blanca"){
            echo "Estás en nivel dificil.";
        }else{
            echo "Estás en nivel Extremo";
        }
    }elseif($sexo == "hombre"){
        if($piel == "blanco"){
            echo "Estás en modo  tutorial";
        }elseif($piel == "moreno"){
            echo "Estás en nivel facil";
        }else{
            echo "Estás en nivel medio";
        }
    }

    echo "<hr>";
    $age1 = 18;
    $age2 = 65;
    $age = 17;
    if($age >= $age1 && $age < $age2){
        echo "Estás en condiciones de trabajar";
    }elseif($age < $age1){
        echo "Lo siento, no contratamos menores de edad.";
    }else{
        echo "Ya estás jubilado, no lo siento, pero no puedes trabajar con nostros";
    }


    echo "<hr>";
    $pais = "peru";
    if($pais == "chile" || $pais == "mexico" || $pais == "peru" || $pais == "argentina"){
        echo "Eres de latam";
    }else{
        echo "No eres de latam;";
    }

    echo "<hr>";
    $dia = 6;
    switch ($dia){
        case 1:
            echo "Es lunes";
            break;
        case 2:
            echo "Es martes";
            break;
        case 3:
            echo "Es miercoles";
            break;
        case 4:
            echo "Es jueves";
            break;
        case 5:
            echo "Es viernes";
            break;
        case 6:
            echo "Es sabado";
            break;
        case 7:
            echo "Es domingo";
            break;
        default:
            echo "Debe introducir un día de la semana entre el 1 y 7.";
    }

    echo "<hr>";
    $mes = 6;
    switch($mes){
        case 1:
            echo "Enero";
            break;
        case 2:
            echo "Febrero";
            break;
        case 3:
            echo "Marzo";
            break;
        case 4:
            echo "Abril";
            break;
        case 5:
            echo "Mayo";
            break;
        case 6:
            echo "Junio";
            break;
        case 7:
            echo "Julio";
            break;
        case 8:
            echo "Agosto";
            break;
        case 9:
            echo "Septiembre";
            break;
        case 10:
            echo "Octubre";
            break;
        case 11:
            echo "Noviembre";
            break;
        case 12:
            echo "Diciembre";
            break;
        default:
            echo "El mes no corresponde, debe ser entre el 1 y 12.";
            
    }

?>