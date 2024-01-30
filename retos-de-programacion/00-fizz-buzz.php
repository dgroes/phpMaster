<?php
/*
 * Reto #0
 * EL FAMOSO "FIZZ BUZZ"
 * Fecha publicación enunciado: 27/12/21
 * Fecha publicación resolución: 03/01/22
 * Dificultad: FÁCIL
 * Enunciado: Escribe un programa que muestre por consola (con un print) los números de 1 a 100 (ambos incluidos y con un salto de línea entre cada impresión), sustituyendo los siguientes:
 * - Múltiplos de 3 por la palabra "fizz".
 * - Múltiplos de 5 por la palabra "buzz".
 * - Múltiplos de 3 y de 5 a la vez por la palabra "fizzbuzz".
 *
 * Información adicional:
 * - Usa el canal de nuestro discord (https://mouredev.com/discord) "🔁reto-semanal" para preguntas, dudas o prestar ayuda a la acomunidad.
 * - Puedes hacer un Fork del repo y una Pull Request al repo original para que veamos tu solución aportada.
 * - Revisaré el ejercicio en directo desde Twitch el lunes siguiente al de su publicación.
 * - Subiré una posible solución al ejercicio el lunes siguiente al de su publicación.
 *
 */
for ($i = 1; $i <= 100; $i++) {

    $multiploTres = ($i % 3) == 0;
    $multiplocinto = ($i % 5) == 0;

    if ($multiplocinto && $multiploTres) {
        echo "fizz buzz" . "<br>";
    } elseif ($multiplocinto) {
        echo "buzz" . "<br>";
    } elseif ($multiploTres) {
        echo "fizz" . "<br>";
    } else {
        echo $i . "<br>";
    }
}

/* 
- Cuando colocas $multiplocinto && $multiploTres después de las condiciones de los 
múltiplos de 3 y 5, la evaluación de esa condición puede interferir con las condiciones 
anteriores.

- En PHP, las condiciones se evalúan de izquierda a derecha y la evaluación se detiene
tan pronto como se encuentra una condición verdadera. Si $i es un múltiplo de 3, la 
primera condición se cumple y no se evalúan las condiciones restantes, incluida la que 
verifica si es también un múltiplo de 5.

- Por eso, es importante tener la condición de ambos ($multiplocinto && $multiploTres) 
como la primera en el conjunto de condiciones, ya que si es verdadera, las demás no se 
evalúan y se evita la interferencia.*/