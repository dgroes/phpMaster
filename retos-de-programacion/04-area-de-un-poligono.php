<?php
/*
 * Reto #4
 * ÁREA DE UN POLÍGONO
 * Fecha publicación enunciado: 24/01/22
 * Fecha publicación resolución: 31/01/22
 * Dificultad: FÁCIL
 *
 * Enunciado: Crea UNA ÚNICA FUNCIÓN (importante que sólo sea una) que sea capaz de calcular y retornar el área de un polígono.
 * - La función recibirá por parámetro sólo UN polígono a la vez.
 * - Los polígonos soportados serán Triángulo, Cuadrado y Rectángulo.
 * - Imprime el cálculo del área de un polígono de cada tipo.
 *
 * Información adicional:
 * - Usa el canal de nuestro discord (https://mouredev.com/discord) "🔁reto-semanal" para preguntas, dudas o prestar ayuda a la acomunidad.
 * - Puedes hacer un Fork del repo y una Pull Request al repo original para que veamos tu solución aportada.
 * - Revisaré el ejercicio en directo desde Twitch el lunes siguiente al de su publicación.
 * - Subiré una posible solución al ejercicio el lunes siguiente al de su publicación.
 *
 */

function calcularArea($poligonos)
{
    foreach ($poligonos as $tipo => $datos) {
        switch ($tipo) {
            case 'triangulo':
                $base_tri = $datos["base"];
                $altura_tri = $datos["altura"];
                $area_tri = ($base_tri * $altura_tri) / 2;
                echo "Area del Triángulo : " . $area_tri . "<br>";
                break;
            case 'cuadrado':
                $lado_cua = $datos["lado"];
                $area_cua = $lado_cua * $lado_cua;
                echo "Area del Cuadrado es : " . $area_cua . "<br>";
                break;
            case 'rectangulo':
                $base_rec = $datos["base"];
                $altura_rec = $datos["altura"];
                $area_rec = $base_rec * $altura_rec;
                echo "Area del Rectángulo es : " . $area_rec . "<br>";
                break;
            default:
                echo "Tipo de polígono no válido <br>";
                break;
        }
    }
}

$poligonos = array(
    "triangulo" => array("base" => 14, "altura" => 22),
    "cuadrado" => array("lado" => 31),
    "rectangulo" => array("base" => 62, "altura" => 24)
);

calcularArea($poligonos);
