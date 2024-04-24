<?php
//_HERENCIAS_

//Ejemplo
class Animal
{
    //Propiedades + Constructor
    public function __construct(
        public $nombre,
        public $edad,
    ) {
    }

    //Método
    public function emitirSonido()
    {
        echo "Haciendo ruido...";
    }
}


// Declaración de una subclase (Derivada)
class Perro extends Animal
{
    // Propiedades adicionales específicas de un Perro 
    public function __construct(
        public string $raza,
        string $nombre, // Agregar $nombre como argumento
        int $edad       // Agregar $edad como argumento
    ) {
        // Llamar al constructor de la clase base
        parent::__construct($nombre, $edad);

        // Inicializar la propiedad específica de la clase Perro
        $this->raza = $raza;
    }
}

$perrito = new Perro("Pug", "Guts", 4);
var_dump($perrito);

echo "<hr>";
echo "<h2>Ejercicio 1: Figuras geométricas</h2>";
echo "<p>Crea una clase base llamada FiguraGeometrica con propiedades color y relleno, y métodos para obtener y establecer estas propiedades. Luego, crea subclases para representar diferentes tipos de figuras geométricas, como Cuadrado, Círculo, Triángulo, etc., cada una con sus propias propiedades y métodos específicos. Por ejemplo, un Cuadrado podría tener propiedades adicionales lado, mientras que un Círculo podría tener radio.</p>";
class FiguraGeometrica
{
    public function __construct(
        public string $color,
        public string $relleno,
    ) {
    }
}

class Triangulo extends FiguraGeometrica
{
    public function __construct(
        public float $vertice,
        string $color,
        string $relleno
    ) {
        parent::__construct($color, $relleno);
        $this->vertice = $vertice;
    }
}

class Cuadrado extends FiguraGeometrica
{
    public function __construct(
        public int $lados,
        string $color,
        string $relleno
    ) {
        parent::__construct($color, $relleno);
        $this->lados = $lados;
    }
}

class Rectangulo extends Cuadrado
{
    public function __construct(
        public int $diagonal,
        int $lados,
        string $color,
        string $relleno
    ) {
        parent::__construct($lados, $color, $relleno);
        $this->diagonal = $diagonal;
    }
}

$rectangulo = new Rectangulo(5, 4, "Verde", "Morado");
var_dump($rectangulo);


echo "<hr>";
echo "<h2>Ejercicio 2: Empleados</h2>";
echo "<p>Crea una clase base llamada Empleado con propiedades nombre, apellido, edad y salario, y métodos para obtener y establecer estas propiedades. Luego, crea subclases para representar diferentes tipos de empleados, como EmpleadoTiempoCompleto y EmpleadoTiempoParcial, cada una con sus propias propiedades y métodos específicos. Por ejemplo, un EmpleadoTiempoCompleto podría tener una propiedad adicional horasExtra, mientras que un EmpleadoTiempoParcial podría tener horasTrabajadas.</p>";
class Empleado
{
    public function __construct(
        public string $nombre,
        public string $apellido,
        public int $edad,
        public float $salario,
    ) {
    }
}

class BackEnd extends Empleado
{
    public function __construct(
        public string $lenguaje,
        string $nombre,
        string $apellido,
        int $edad,
        float $salario,
    ) {
        parent::__construct($nombre, $apellido, $edad, $salario);
    }

    public function labores()
    {
        echo "El empleado " . $this->nombre . " " . $this->apellido . " programa con " . $this->lenguaje . ".";
    }

    public function especializacion()
    {
        return match ($this->lenguaje) {
            "PHP", "Python", "Java", "C#", "Ruby" => "Es Back-End",
            "JavaScript", "React", "TypeScript", "Vue", "Angular", "JQuery" => "Es Front-End",
            default => "mmm... no se exactamente de qué área eres.",
        };
    }
}



$desarrollador = new BackEnd("React", "Manuel", "Garcia", 23, 600.000);
$desarrollador->labores();
echo "<br>";
echo $desarrollador->especializacion();



echo "<hr>";
echo "<h2>Ejercicio 3: Vehículos</h2>";
echo "<p>Crea una clase base llamada Vehiculo con propiedades marca, modelo y año, y métodos para obtener y establecer estas propiedades. Luego, crea subclases para representar diferentes tipos de vehículos, como Coche, Motocicleta, Camioneta, etc., cada una con sus propias propiedades y métodos específicos. Por ejemplo, un Coche podría tener propiedades adicionales como numeroPuertas, mientras que una Motocicleta podría tener cilindrada.</p>";
