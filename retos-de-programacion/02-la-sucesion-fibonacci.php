<?php

/* LA SUCESIÓN DE FIBONACCI
 * Fecha publicación enunciado: 10/01/22
 * Fecha publicación resolución: 17/01/22
 * Dificultad: DIFÍCIL
 *
 * Enunciado: Escribe un programa que imprima los 50 primeros números de la sucesión de Fibonacci empezando en 0.
 * La serie Fibonacci se compone por una sucesión de números en la que el siguiente siempre es la suma de los dos anteriores.
 * 0, 1, 1, 2, 3, 5, 8, 13...
 *
 * Información adicional:
 * - Usa el canal de nuestro discord (https://mouredev.com/discord) "🔁reto-semanal" para preguntas, dudas o prestar ayuda a la acomunidad.
 * - Puedes hacer un Fork del repo y una Pull Request al repo original para que veamos tu solución aportada.
 * - Revisaré el ejercicio en directo desde Twitch el lunes siguiente al de su publicación.
 * - Subiré una posible solución al ejercicio el lunes siguiente al de su publicación. */

/*  El 1 se obtiene sumando  0 + 1= 1   /  el 2 se calcula sumando 1+1  /  análogamente, el 3 es 1+2  /   el 5 es 2+3 */

/* 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610, 987, 1597, 2584, 4181, 6765, 10946, 17711, 28657, 46368, 75025, 121393, 196418, 317811,*/

$q = 0; // Inicializa el primer número de Fibonacci
$r = 1; // Inicializa el segundo número de Fibonacci

echo $q . " "; // Imprime el primer número de Fibonacci
echo $r . " "; // Imprime el segundo número de Fibonacci

for ($i = 2; $i < 50; $i++) { // Comienza desde el tercer número de Fibonacci (índice 2)
    $temp = $q + $r; // Calcula el siguiente número de Fibonacci sumando los dos anteriores
    echo $temp . " "; // Imprime el siguiente número de Fibonacci

    // Actualiza $q y $r para preparar el cálculo del siguiente número de Fibonacci
    $q = $r;
    $r = $temp;
}
