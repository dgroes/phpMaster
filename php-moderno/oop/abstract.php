<?php

//La abstracción es un molde de lo que una clase debería tener por defecto,
//Un producto si o si debería tener un precio y nombre, la abstracción hace que definamos esas características de una clase debería tener 

//NO e puede crear un objeto a partir de una clase abstracta
// $e = new Product();

$beer = new Beer("Belirium", 15);
echo $beer->getName();

showInfo($beer);

function showInfo(Product $product)
{
    echo " $" . $product->calculatePrice();
}


abstract class Product
{
    protected float $price;
    protected string $name;

    abstract public function calculatePrice(): float;

    public function getName(): string
    {
        return $this->name;
    }
}


class Beer extends Product
{

    const TAX = 1.1;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function calculatePrice(): float
    {
        return $this->price * self::TAX;
    }
}


echo "<hr>";


abstract class Instrumento
{
    protected float $precio;
    protected string $marca;
    protected string $modelo;
    protected string $numero_de_serie;

    abstract public function mostrarNombre(): string;
}

class Guitarra extends Instrumento
{
    public function __construct(string $marca, string $modelo)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function mostrarNombre(): string
    {
        return $this->marca . " " . $this->modelo;
    }
}

$guitarra = new Guitarra("Fender", "Telecaster");
echo $guitarra->mostrarNombre();



echo "<hr>";

abstract class Transporte
{
    protected float $velocidadMaxima;

    // Método abstracto que deben implementar las clases hijas
    abstract public function mostrarTipo(): string;

    // Método abstracto que muestra la velocidad máxima
    abstract public function mostrarVelocidadMaxima(): string;
}

class Coche extends Transporte
{
    public function __construct(float $velocidadMaxima)
    {
        $this->velocidadMaxima = $velocidadMaxima;
    }

    public function mostrarTipo(): string
    {
        return "Coche";
    }

    // Implementación del método para mostrar la velocidad máxima
    public function mostrarVelocidadMaxima(): string
    {
       return "Velocidad máxima: " . $this->velocidadMaxima . " km/h";
    }
}

// Crear una instancia de Coche y especificar la velocidad máxima
$coche = new Coche(200);
echo $coche->mostrarTipo();             // Salida: "Coche"
echo "\n";
echo $coche->mostrarVelocidadMaxima();  // Salida: "Velocidad máxima: 200 km/h"
