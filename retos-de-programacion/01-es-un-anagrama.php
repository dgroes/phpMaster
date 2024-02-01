<?php
/*
 * Reto #1
 * ¿ES UN ANAGRAMA?
 * Fecha publicación enunciado: 03/01/22
 * Fecha publicación resolución: 10/01/22
 * Dificultad: MEDIA
 *
 * Enunciado: Escribe una función que reciba dos palabras (String) y retorne verdadero o falso (Boolean) según sean o no anagramas.
 * Un Anagrama consiste en formar una palabra reordenando TODAS las letras de otra palabra inicial.
 * NO hace falta comprobar que ambas palabras existan.
 * Dos palabras exactamente iguales no son anagrama.
 */


/* FUNCION */



function comprobarAnagrama($palabraUno, $palabraDos)
{
    /* CONVERTIR A MINUSCULA TODO */
    $palabraUnoMinuscula = strtolower($palabraUno);
    $palabraDosMinuscula = strtolower($palabraDos);

    /* CONVERTIR A ARRAY CADA PALABRA */
    $palabraUnoArray = str_split($palabraUnoMinuscula);
    $palabraDosArray = str_split($palabraDosMinuscula);

    /* COMPARAR CADA LETRA DE UNA PALABRA CON OTRA */
    $comparar = array_diff($palabraUnoArray, $palabraDosArray);

    /* VERIFICAR SI HAY O NO COMPARACIÓN DE TODAS LAS LETRAS DE UNA PALABRA CON OTRA */
    return empty($comparar);
}

$palabraUno = "ENRIQUE";
$palabraDos = "quiEren";

if (comprobarAnagrama($palabraUno, $palabraDos)) {
    echo "Es anagrama";
} else {
    echo "No es anagrama";
}


/* 
empty($comparar) evaluará a true si el array $comparar está vacío, y a false si 
tiene algún elemento. La función empty en PHP devuelve true si el array está vacío y f
alse si tiene elementos.

Entonces, la línea return empty($comparar); en tu función comprobarAnagrama devolverá 
true si no hay diferencias (las palabras son anagramas) y false si hay diferencias 
(las palabras no son anagramas). 
*/