<?php

class Persona
{
    public function __construct(
        public string $nombre,
        public string $apellido,
        public int $edad,
        public string $genero
    ) {
    }

    public function presentarse(): void
    {
        echo "Hola, soy {$this->nombre} {$this->apellido}. Tengo {$this->edad} años y soy {$this->genero}.\n";
    }
}

// Crear un objeto de la clase Persona
$persona1 = new Persona("Juan", "Pérez", 30, "masculino");

// Mostrar información de la persona
$persona1->presentarse();

// Modificar la edad de la persona
$persona1->edad = 35;

// Mostrar información actualizada
$persona1->presentarse();

echo "<br>";

$persona2 = new Persona("Diego", "Pastén", 25, "masculino");
$persona2->presentarse();


echo "<hr>";
echo "<h2>Clase: Rectángulo</h2>";
echo "<p>Descripción: Crea una clase Rectangulo que represente un rectángulo. La clase debe tener propiedades para el ancho y la altura del rectángulo, un constructor para inicializar estas propiedades y métodos para calcular el área y el perímetro del rectángulo.</p>";

class Rectangle
{
    public function __construct(
        public float $width,
        public float $height,
    ) {
    }
    public function datos()
    {
        echo "El ancho de de: " . $this->width . ", su altura de: " . $this->height;
    }

    public function area()
    {
        echo "Su area es de: " . $this->width * $this->height;
    }
}
// Definir los valores adignados a la clase Rectangle
$rectangulo = new Rectangle(12.4, 4.8);

//LLamar una función de la clase
$rectangulo->datos();
echo "<br>";
$rectangulo->area();


echo "<hr>";
echo "<h2>Clase: Estudiante</h2>";
echo "<p>Descripción: Crea una clase Estudiante que represente a un estudiante. La clase debe tener propiedades para el nombre, la edad y el grado del estudiante, un constructor para inicializar estas propiedades y métodos para mostrar la información del estudiante y promover al siguiente grado.</p>";

class Student
{
    public function __construct(
        public string $name,
        public string $lastName,
        public int $age,
    ) {
    }

    public function informationStudent()
    {
        echo "<h3>Estudiante</h3>" .
            "Nombre: " . $this->name . "<br>" .
            "Apellido: " . $this->lastName . "<br>" .
            "Edad: " . $this->age . "<br>";
    }

    public function gradeStudent()
    {
        return match (true) {
            $this->age < 7 => $this->name . " aún no está en la enseñanza básica 👶",
            $this->age < 14 => $this->name . " está en la enseñanza básica 🧒",
            $this->age < 19 => $this->name . " está en la enseñanza media  🎓",
            default => "Ya eres un adulto, ya no deberías ir al colegio. 🧑",
        };
    }
}

$estudiante = new Student("Diego", "Pastén", 13);
$estudiante->informationStudent();
echo "<br>" . $estudiante->gradeStudent();  // Imprimir el resultado de gradeStudent() con un salto de línea antes


echo "<hr>";
echo "<h2>Clase: Circulo</h2>";
echo "<p>Descripción: Crea una clase Circulo que represente un círculo. La clase debe tener una propiedad para el radio del círculo, un constructor para inicializar esta propiedad y métodos para calcular el área y la circunferencia del círculo.</p>";


class Circle
{
    public function __construct(
        public float $raius,
    ) {
    }

    public function circleArea(){
        echo "El area del circulo es: " . pi() * $this->raius **2 . "<br>";
    }

    public function circlecCircumference(){
        $diameter = $this->raius * 2;
        echo "La circunferencia del circulo es: " . $diameter * pi();
    }
    
}

$circulo = new Circle(850);
$circulo->circleArea();
$circulo->circlecCircumference();
