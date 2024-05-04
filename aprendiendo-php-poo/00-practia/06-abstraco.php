<?php
//Encabezado: Clase FiguraGeometrica y Rectangulo Descripción: Crea una clase abstracta FiguraGeometrica con un método abstracto para calcular el área. Luego, crea una clase Rectangulo que implemente esta clase abstracta y tenga métodos para calcular el área y el perímetro de un rectángulo.
abstract class FiguraGeometrica
{
    abstract public function calcularArea();
}


class Rectangulon extends FiguraGeometrica
{
    public $largo;
    public $ancho;


    public function __construct($largo, $ancho)
    {
        $this->largo = $largo;
        $this->ancho = $ancho;
    }

    public function calcularArea()
    {
        return $this->largo * $this->ancho;
    }

    public function calcularPerimetro()
    {
        return 2 * ($this->largo + $this->ancho);
    }
}

$rectangulo = new Rectangulon(2, 4);
echo "Área del rectángulo: " . $rectangulo->calcularArea() . "<br>";
echo "Perímetro del rectángulo: " . $rectangulo->calcularPerimetro();
