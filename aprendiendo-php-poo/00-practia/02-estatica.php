<?php

class MiClase
{
    // Propiedad estática
    public static string $mensaje = "Hola Mundo!";

    // Método estático
    public static function saludar()
    {
        echo self::$mensaje; // Acceso a la propiedad estática
    }
}

// Acceso a la propiedad estática sin necesidad de crear una instancia
echo MiClase::$mensaje; // Imprimirá "Hola Mundo!"
echo "<br>";

// Llamar al método estático sin necesidad de crear una instancia
MiClase::saludar(); // Imprimirá "Hola Mundo!"


echo "<hr>";
echo "<h1>Contador de instancias</h1>";
echo "<p>Crea una clase que mantenga un contador de instancias creadas y un método estático para obtener el número total de instancias creadas de esa clase.</p>";


class ContadorInstancias
{
    // Propiedad estática para almacenar el contador de instancias
    private static int $contador = 0;

    // Método estático para obtener el número total de instancias creadas
    public static function obtenerTotal(): int
    {
        return self::$contador;
    }

    // Método constructor para incrementar el contador de instancias
    public function __construct()
    {
        self::$contador++;
    }
}

// Crear algunas instancias de la clase ContadorInstancias
$instancia1 = new ContadorInstancias();
$instancia2 = new ContadorInstancias();
$instancia3 = new ContadorInstancias();

// Obtener el número total de instancias creadas
echo "Total de instancias creadas: " . ContadorInstancias::obtenerTotal(); // Imprimirá "Total de instancias creadas: 3"



echo "<hr>";
echo "<h1>Calculadora estática</h1>";
echo "<p>Calculadora estática: Crea una clase Calculadora con métodos estáticos para realizar operaciones matemáticas básicas como suma, resta, multiplicación y división.</p>";

class Calculadora
{
    // Método estático para sumar dos números
    public static function sumar(float $numero1, float $numero2): float
    {
        return $numero1 + $numero2;
    }

    //Método estático para restar dos números
    public static function restar(float $numero1, float $numero2): float
    {
        return $numero1 - $numero2;
    }

    public static function multiplicar(float $numero1, float $numero2): float
    {
        return $numero1 * $numero2;
    }

    public static function dividir(float $numero1, float $numero2): float
    {
        return $numero1 / $numero2;
    }
}
echo "Suma: " . Calculadora::sumar(4.2, 5.3) . "<br>";
echo "Resta: " . Calculadora::restar(10, 7) . "<br>";
echo "Multiplicar: " . Calculadora::multiplicar(5, 4) . "<br>";
echo "Dividir: " . Calculadora::dividir(40, 7);




echo "<hr>";
echo "<h1>Generador de IDs únicos</h1>";
echo "<p>Generador de IDs únicos: Crea una clase GeneradorID con un método estático que genere IDs únicos basados en la fecha y hora actual.</p>";

class GeneradorID
{
    // Método estático para generar un ID único basado en la fecha y hora actual
    public static function generarID(): string
    {
        // Obtener la fecha y hora actual en formato específico
        $fechaHora = date('YmdHis');
        // Generar un ID único concatenando la fecha y hora actual
        $idUnico = "ID_" . $fechaHora;
        // Devolver el ID único como cadena
        return $idUnico;
    }
}

// Generar un ID único utilizando el método estático de la clase GeneradorID
$idUnico = GeneradorID::generarID();

// Imprimir el ID único generado
echo "ID único generado: $idUnico";



echo "<hr>";
echo "<h1>Registro de eventos</h1>";
echo "<p>Registro de eventos: Crea una clase RegistroEventos con un método estático para registrar eventos en un archivo de registro, con un contador estático para llevar la cuenta de los eventos registrados.</p>";

class RegistroEventos
{
    //Método estatico de registro de eventos
    public static function registrarEventos()
    {
    }
}
