<?php

    /*
    Crear una función que reciba una cadena como argumento y devuelva la longitud de la cadena.
    Crear una función que reciba una cadena como argumento y la convierta en mayúsculas.
    Crear una función que reciba una cadena como argumento y la convierta en minúsculas.
    Crear una función que reciba dos cadenas como argumentos y las concatene.
    Crear una función que reciba una cadena como argumento y devuelva el primer carácter de la cadena.
    Crear una función que reciba una cadena como argumento y devuelva el último carácter de la cadena.
    Crear una función que reciba una cadena como argumento y devuelva la cadena invertida (al revés).
    Crear una función que reciba una cadena como argumento y devuelva la cantidad de palabras que contiene la cadena.
    Crear una función que reciba una cadena como argumento y reemplace todas las ocurrencias de una palabra específica por otra palabra.
    Crear una función que reciba una cadena como argumento y devuelva la cadena sin los espacios en blanco al inicio y al final.
    */

    echo "<h1>Funciones String</h1>";
    echo "<hr>";
    
    //1
    echo "<h2>Crear una función que reciba una cadena como argumento y devuelva la longitud de la cadena.</h2>";
    function longtudCadena($texto){
        $longitud = strlen($texto);
        return $longitud;
    }
    echo longtudCadena("Hola como estas?");
    echo "<hr>";

    //2
    echo "<h2>Crear una función que reciba una cadena como argumento y la convierta en mayúsculas.</h2>";
    function convertirMayusculas($minusculas){
        $transMayusculas = strtoupper($minusculas);
        return $transMayusculas;
    }
    echo convertirMayusculas("este es un texto en minusculas, pero lo estás leyendo en mayusculas si es que salió bien el código"); 
    echo "<hr>";

    //3
    echo "<h2>Crear una función que reciba una cadena como argumento y la convierta en minúsculas.</h2>";
    function convertirMinusculas($mayusculas){
        $transMinusculas = strtolower($mayusculas);
        return $transMinusculas;
    }
    echo convertirMinusculas("ESTE ES UN TEXTO ESCRITO EN MAYUSCULAS, SI EL CÓDIGO SALIÓ BIEN LO ESTARÁS LEYENDO EN MINUSCULAS."); 
    echo "<hr>";

    //4
    echo "<h2>Crear una función que reciba dos cadenas como argumentos y las concatene.</h2>";
    $primera = "Esta es la primera parte del texto y";
    $segunda = "Esta es la segunda parte del texto.";
    function concatenarTexto($primera, $segunda){
        $juntar = $primera." ".$segunda;
        return $juntar;
    }
    echo concatenarTexto($primera, $segunda);
    echo "<hr>";

    //5
    echo "<h2>Crear una función que reciba una cadena como argumento y devuelva el primer carácter de la cadena.</h2>";
    $primerCaracter = "Devolver el primer caracter";
    echo $primerCaracter[0];
    echo "<hr>";

    //6
    echo "<h2>Crear una función que reciba una cadena como argumento y devuelva el último carácter de la cadena.</h2>";
    $ultimoCaracter = "Devolver ultimo caracter";
    echo $ultimoCaracter[-1];
    echo "<hr>";

    //7
    echo "<h2>Crear una función que reciba una cadena como argumento y devuelva la cadena invertida (al revés).</h2>";
    $invertida = "Este texto esta al revez";
    echo strrev($invertida);
    echo "<hr>";

    //8
    echo "<h2>Crear una función que reciba una cadena como argumento y devuelva la cantidad de palabras que contiene la cadena.</h2>";
    $contarStr = "Me pregunto cuantos caracteres tiene este string.";
    echo strlen($contarStr);
    echo "<hr>";

    //9
    echo "<h2>Crear una función que reciba una cadena como argumento y reemplace todas las ocurrencias de una palabra específica por otra palabra.</h2>";
    function reemplazarPalabra($cadena, $palabraBusqueda, $palabraReemplazo) {
        $resultado = str_replace($palabraBusqueda, $palabraReemplazo, $cadena);
        return $resultado;
    }
    
    $cadena = "La casa es roja. La casa es grande.";
    $palabraBusqueda = "casa";
    $palabraReemplazo = "edificio";
    
    $resultado = reemplazarPalabra($cadena, $palabraBusqueda, $palabraReemplazo);
    echo $resultado;
    echo "<hr>";

    //10
    echo "<h2>Crear una función que reciba una cadena como argumento y devuelva la cadena sin los espacios en blanco al inicio y al final.</h2>";
    function eliminarEspacios($cadena) {
        $resultado = trim($cadena);
        return $resultado;
    }
    
    $cadena = "   Hola, soy una cadena con espacios en blanco.    ";
    
    $resultado = eliminarEspacios($cadena);
    echo $resultado;
    


   

    


?>