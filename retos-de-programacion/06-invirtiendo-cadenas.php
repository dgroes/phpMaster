<?php
/*
 * Reto #6
 * INVIRTIENDO CADENAS
 * Fecha publicación enunciado: 07/02/22
 * Fecha publicación resolución: 14/02/22
 * Dificultad: FÁCIL
 *
 * Enunciado: Crea un programa que invierta el orden de una cadena de texto sin usar funciones propias del lenguaje que lo hagan de forma automática.
 * - Si le pasamos "Hola mundo" nos retornaría "odnum aloH"
 *
 * Información adicional:
 * - Usa el canal de nuestro discord (https://mouredev.com/discord) "🔁reto-semanal" para preguntas, dudas o prestar ayuda a la acomunidad.
 * - Puedes hacer un Fork del repo y una Pull Request al repo original para que veamos tu solución aportada.
 * - Revisaré el ejercicio en directo desde Twitch el lunes siguiente al de su publicación.
 * - Subiré una posible solución al ejercicio el lunes siguiente al de su publicación.
 *
 */

 echo "<h2>Invirtiendo Cadenas</h2>";
 $cadena = "Hola Mundo";

// Inicializar una cadena vacía para almacenar la inversión
$cadena_invertida = '';

// Obtener la longitud de la cadena
$longitud = strlen($cadena);

// Iterar sobre la cadena desde el último carácter hasta el primero
for ($i = $longitud - 1; $i >= 0; $i--) {
    // Concatenar cada carácter a la cadena invertida
    $cadena_invertida .= $cadena[$i];
}

// Imprimir la cadena invertida
echo "Cadena original: $cadena <br>";
echo "Cadena invertida: $cadena_invertida";