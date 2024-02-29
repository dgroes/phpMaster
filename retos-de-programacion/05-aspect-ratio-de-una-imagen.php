<?php
/*
 * Reto #5
 * ASPECT RATIO DE UNA IMAGEN
 * Fecha publicación enunciado: 01/02/22
 * Fecha publicación resolución: 07/02/22
 * Dificultad: DIFÍCIL
 *
 * Enunciado: Crea un programa que se encargue de calcular el aspect ratio de una imagen a partir de una url.
 * - Nota: Esta prueba no se puede resolver con el playground online de Kotlin. Se necesita Android Studio.
 * - Url de ejemplo: https://raw.githubusercontent.com/mouredev/mouredev/master/mouredev_github_profile.png
 * - Por ratio hacemos referencia por ejemplo a los "16:9" de una imagen de 1920*1080px.
 *
 * Información adicional:
 * - Usa el canal de nuestro discord (https://mouredev.com/discord) "🔁reto-semanal" para preguntas, dudas o prestar ayuda a la acomunidad.
 * - Puedes hacer un Fork del repo y una Pull Request al repo original para que veamos tu solución aportada.
 * - Revisaré el ejercicio en directo desde Twitch el lunes siguiente al de su publicación.
 * - Subiré una posible solución al ejercicio el lunes siguiente al de su publicación.
 *
 */


 function calcularAspectRatio($url) {
     // Descargar la imagen desde la URL
     $imagen = file_get_contents($url);
 
     // Crear un recurso de imagen desde la URL
     $imagenResource = imagecreatefromstring($imagen);
 
     // Obtener el ancho y alto de la imagen
     $ancho = imagesx($imagenResource);
     $alto = imagesy($imagenResource);
 
     // Calcular el aspect ratio
     $aspectRatio = $ancho / $alto;
 
     // Devolver el aspect ratio
     return $aspectRatio;
 }
 
 // URL de ejemplo
 $urlEjemplo = 'https://raw.githubusercontent.com/mouredev/mouredev/master/mouredev_github_profile.png';
 
 // Calcular el aspect ratio
 $aspectRatio = calcularAspectRatio($urlEjemplo);
 
 // Imprimir el resultado
 echo 'El aspect ratio de la imagen es: ' . $aspectRatio;
 
 ?>
 