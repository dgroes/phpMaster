<?php
/*
 * Reto #8
 * DECIMAL A BINARIO
 * Fecha publicación enunciado: 18/02/22
 * Fecha publicación resolución: 02/03/22
 * Dificultad: FÁCIL
 *
 * Enunciado: Crea un programa se encargue de transformar un número decimal a binario sin utilizar funciones propias del lenguaje que lo hagan directamente.
 *
 * Información adicional:
 * - Usa el canal de nuestro discord (https://mouredev.com/discord) "🔁reto-semanal" para preguntas, dudas o prestar ayuda a la acomunidad.
 * - Puedes hacer un Fork del repo y una Pull Request al repo original para que veamos tu solución aportada.
 * - Revisaré el ejercicio en directo desde Twitch el lunes siguiente al de su publicación.
 * - Subiré una posible solución al ejercicio el lunes siguiente al de su publicación.
 *
 */

echo "<h1>Decimal a binario</h1>";
echo decbin(13);
echo "<br>";


echo "<hr>";

$number = 13;
$binario = array(); // Aquí irán los números binarios, el resto de la división

while ($number > 0) {
    $rest = $number % 2; // Calcula el resto
    $binario[] = $rest; // Almacena el resto en el array
    $number = intdiv($number, 2); // Actualiza el número con la división entera por 2
}

// Invierte el array para obtener el binario correcto
$binario = array_reverse($binario);

// Concatena los elementos del array para formar el número binario final
$binaryString = implode('', $binario);

echo $binaryString;
