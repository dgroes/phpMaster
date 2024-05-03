<?php

echo "<h2>Clase Calculadora</h2>";
echo "<p>Descripción: Crea una clase Calculadora con métodos estáticos para realizar operaciones matemáticas básicas como suma, resta, multiplicación y división. Utiliza constantes para definir los operadores matemáticos.</p>";

class Calculadora
{
    const SUMA = '+';
    const RESTA = '-';
    const MULTIPLIACION = '*';
    const DIVISION = '/';


    public static function sumar($numero1, $numero2)
    {
        return $numero1 + $numero2;
    }

    public static function restar($numero1, $numero2)
    {
        return $numero1 - $numero2;
    }

    public static function multiplicar($numero1, $numero2)
    {
        return $numero1 * $numero2;
    }

    public static function dividir($numero1, $numero2)
    {
        return $numero1 / $numero2;
    }
}



echo Calculadora::sumar(4, 2);
echo "<br>";
echo Calculadora::restar(4, 2);
echo "<br>";
echo Calculadora::multiplicar(4, 2);
echo "<br>";
echo Calculadora::dividir(4, 2);
