<?php
/*
 * Reto #3
 * ¿ES UN NÚMERO PRIMO?
 * Fecha publicación enunciado: 17/01/22
 * Fecha publicación resolución: 24/01/22
 * Dificultad: MEDIA
 *
 * Enunciado: Escribe un programa que se encargue de comprobar si un número es o no primo.
 * Hecho esto, imprime los números primos entre 1 y 100.
 * 
 * Los números primos son aquellos que tienen exactamente dos divisores enteros, sin residuo: 
 * 1 y ellos mismos. Estas divisiones resultan en números enteros, es decir, no tienen decimales.
 *
 * Información adicional:
 * - Usa el canal de nuestro discord (https://mouredev.com/discord) "🔁reto-semanal" para preguntas, dudas o prestar ayuda a la acomunidad.
 * - Puedes hacer un Fork del repo y una Pull Request al repo original para que veamos tu solución aportada.
 * - Revisaré el ejercicio en directo desde Twitch el lunes siguiente al de su publicación.
 * - Subiré una posible solución al ejercicio el lunes siguiente al de su publicación.
 *
 */


function esPrimo($num)
{
    if ($num <= 1) {
        return "no es primo";
    }
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            return "no es primo";
        }
    }
    return "es primo";
}

for ($i = 1; $i <= 100; $i++) {
    echo "$i " . esPrimo($i) . "\n";
}
