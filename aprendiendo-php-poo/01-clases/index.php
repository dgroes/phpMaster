<?php

// _PROGRAMACIÓN ORIENTADA A OBJETOS EN PHP (POO)_

//Definir una clase (Molde para crear más objetos te tipo coche con caracteristicas parecidas)
class Coche
{
    // Atributos o Propiedades, (Variables);
    public $color = "Rojo";
    public $modelo = "Aventador";
    public $velocidad = 300;
    public $marca = "Ferrari";
    public $caballaje = 500;
    public $plaza = 2;

    //Métodos (Antes serían funciones);
    public function getColor()
    {
        ///Buca en esta clase la propiedad X
        return $this->color;
    }

    // Cambiar el color del coche, seteamos el nombre, es decir lo cambiamos
    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function acelerar()
    {
        $this->velocidad++;
    }

    public function frenar()
    {
        $this->velocidad--;
    }

    public function getVelocidad()
    {
        return $this->velocidad;
    }
} //Fin definción de la clase;

//Crear un objeto / instanciar la clase
// $coche = new Coche;
var_dump($coche);
echo "<br>";

// Usar los metodos
echo $coche->velocidad;
echo "<br>";

$coche->setColor("Amarillo");
echo "El color del " . $coche->marca . " es " . $coche->getColor() . ".";
echo "<br>";

$coche->acelerar();
$coche->acelerar();
$coche->acelerar();
$coche->acelerar();
$coche->acelerar();
$coche->frenar();
echo "Valocidad del coche: " . $coche->getVelocidad() . "K ";



// $coche2 = new Coche;
$coche2->setColor("Verde");
$coche2->setModelo("Gallardo");
var_dump($coche2);
