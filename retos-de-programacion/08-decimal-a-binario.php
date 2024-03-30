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
 
 $numero = 13;
 
 $divisionUno = $numero / 2; // 6.5
 $restoUno = $numero % 2;    // 1
 
 $divisionDos = $divisionUno / 2; // 3
 $restoDos = $divisionUno % 2;    //0

 $divisionTres = $divisionDos / 2;  // 1
 $restoTres = $divisionDos % 2;    //1

 $divisionCuatro = $divisionTres / 2;  // 0
 $restoCuatro = $divisionTres % 2;    //1

 echo $restoUno . "" . $restoDos . "" . $restoTres . "" . $restoCuatro;
 

 for ($i=$decimal; $i < 0; $i++) { 
    
 }


