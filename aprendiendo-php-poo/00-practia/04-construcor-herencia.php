<?php

echo "<h2>Clase Persona y Empleado</h2>";
echo "<p>Crea una clase Persona con atributos como nombre, edad y género. Luego, crea una clase Empleado que herede de Persona y tenga atributos adicionales como salario y cargo.</p>";

class Persona
{
    public function __construct(
        public string $nombre,
        public int $edad,
        public string $genero,
    ) {
    }

    public function presentacion()
    {
        echo "Hola, mi nombre es {$this->nombre}, mi edad es {$this->edad} y me genero es {$this->genero}." . "<br>";
    }

    public function hambre()
    {
        echo "Tengo hambre, necesito comer";
    }
}

class Empleado extends Persona
{
    public function __construct(
        public string $puesto,
        public int $salario,
        public string $fechaContratacion,
        public int $idEmpleado,
        string $nombre,
        int $edad,
        string $genero,
    ) {
        parent::__construct($nombre, $edad, $genero);
    }

    public function presentacionE()
    {
        echo "Mi nombre es " . $this->nombre . " y soy " . $this->puesto . " y me genero es " . $this->genero . "<br>";
    }

    public function datosEmpleado()
    {
        echo "<h4>Datos de Empleado: {$this->idEmpleado}</h4>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Puesto: " . $this->puesto . "<br>";
        echo "Salario: " . $this->salario . "<br>";
        echo "Genero: " . $this->genero . "<br>";
        echo "Fecha de Contratación: " . $this->fechaContratacion . "<br>";
    }
}


$persona = new Persona("Manuel", 51, "Hombre");
$persona->presentacion();
$empleado = new Empleado("Arquitecto", 1400000, "03/18/2004", 37502, "Andrés", 45, "Masculino");
$empleado->presentacionE();
$empleado->datosEmpleado();
