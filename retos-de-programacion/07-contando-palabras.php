<?php
/*
 * Reto #7
 * CONTANDO PALABRAS
 * Fecha publicación enunciado: 14/02/22
 * Fecha publicación resolución: 21/02/22
 * Dificultad: MEDIA
 *
 * Enunciado: Crea un programa que cuente cuantas veces se repite cada palabra y que muestre el recuento final de todas ellas.
 * - Los signos de puntuación no forman parte de la palabra.
 * - Una palabra es la misma aunque aparezca en mayúsculas y minúsculas.
 * - No se pueden utilizar funciones propias del lenguaje que lo resuelvan automáticamente.
 *
 * Información adicional:
 * - Usa el canal de nuestro discord (https://mouredev.com/discord) "🔁reto-semanal" para preguntas, dudas o prestar ayuda a la acomunidad.
 * - Puedes hacer un Fork del repo y una Pull Request al repo original para que veamos tu solución aportada.
 * - Revisaré el ejercicio en directo desde Twitch el lunes siguiente al de su publicación.
 * - Subiré una posible solución al ejercicio el lunes siguiente al de su publicación.
 *
 */
function contadorDePalabras($frase)
{
    $fraseSinComas = str_replace(",", "", $frase);
    $fraseSinPuntos = str_replace(".", "", $fraseSinComas);
    $fraseLimpia = strtolower($fraseSinPuntos);
    $separar = explode(" ", $fraseLimpia);




    $conteoPalabras = array();

    foreach ($separar as $palabra) {
        if (isset($conteoPalabras[$palabra])) {
            $conteoPalabras[$palabra]++;
        } else {
            $conteoPalabras[$palabra] = 1;
        }
    }

    echo "<h2>Recuento de palabras:</h2>";

    foreach ($conteoPalabras as $palabra => $recuento) {
        echo $palabra . " - " . $recuento . "<br>";
    }
}
echo "<h1>Contador de palabras en PHP</h1>";
echo "<hr>";
echo "<h2>Frase:</h2>";
$frase = "Hola, mi nombre es dgroes, mi objetivo con este reto es poder crear una función que permitá contar cuantas veces se repite cada palabra dentro de esta frase.";
echo "<p>$frase</p>";
contadorDePalabras($frase);
