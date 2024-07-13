<?php
/*
 * Reto #9
 * CÓDIGO MORSE
 * Fecha publicación enunciado: 02/03/22
 * Fecha publicación resolución: 07/03/22
 * Dificultad: MEDIA
 *
 * Enunciado: Crea un programa que sea capaz de transformar texto natural a código morse y viceversa.
 * - Debe detectar automáticamente de qué tipo se trata y realizar la conversión.
 * - En morse se soporta raya "—", punto ".", un espacio " " entre letras o símbolos y dos espacios entre palabras "  ".
 * - El alfabeto morse soportado será el mostrado en https://es.wikipedia.org/wiki/Código_morse.
 */


$morseCode = [
    'A' => '· —', 'B' => '— · · ·', 'C' => '— · — ·', 'CH' => '— — — —', 'D' => '— · ·',
    'E' => '·', 'F' => '· · — ·', 'G' => '— — ·', 'H' => '· · · ·', 'I' => '· ·',
    'J' => '· — — —', 'K' => '— · —', 'L' => '· — · ·', 'M' => '— —', 'N' => '— ·',
    'Ñ' => '— — · — —', 'O' => '— — —', 'P' => '· — — ·', 'Q' => '— — · —', 'R' => '· — ·',
    'S' => '· · ·', 'T' => '—', 'U' => '· · —', 'V' => '· · · —', 'W' => '· — —',
    'X' => '— · · —', 'Y' => '— · — —', 'Z' => '— — · ·', '0' => '— — — — —',
    '1' => '· — — — —', '2' => '· · — — —', '3' => '· · · — —', '4' => '· · · · —',
    '5' => '· · · · ·', '6' => '— · · · ·', '7' => '— — · · ·', '8' => '— — — · ·',
    '9' => '— — — — ·', '.' => '· — · — · —', ',' => '— — · · — —', '?' => '· · — — · ·',
    '"' => '· — · · — ·', '/' => '— · · — ·'
];

$textoInicial = "Hola esto es un texto en palabras normales";
$mayuscula = strtoupper($textoInicial);
$texto = str_split($mayuscula);

echo var_dump($texto);

echo "<hr>";
foreach ($texto as $valorUno){
    foreach ($morseCode as $calveDos => $valorDos){
        
    }
}

// echo "<hr>";
// $comparar = array_diff($separar, $morseCode);

// print_r($comparar);

echo "<hr>";

$arrayUno = ['h'];
$arrayDos = ['a' => '1', 'h' => 2];

foreach ($arrayUno as $valorUno) {
    foreach ($arrayDos as $claveDos => $valorDos) {
        if ($valorUno == $claveDos) {
            echo "Coincidencia encontrada: Clave = $claveDos, Valor en arrayDos = $valorDos\n";
        }
    }
}
