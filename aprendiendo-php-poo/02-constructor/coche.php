<?php

// _PROGRAMACIÓN ORIENTADA A OBJETOS EN PHP (POO)_

//Definir una clase (Molde para crear más objetos te tipo coche con caracteristicas parecidas)
class Coche
{
    // Atributos o Propiedades, (Variables);
    public $color;
    protected $marca;
    private $modelo;
    public $velocidad;
    public $caballaje;
    public $plazas;


    //constructor
    public function __construct($color, $marca, $modelo, $valocidad, $caballaje, $plazas)
    {
        $this->color = $color;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = $valocidad;
        $this->caballaje = $caballaje;
        $this->plazas = $plazas;
    }

    // ___ESTA ES OTRA FORMA DE HACERLO, EN PHP 8 SE PUEDE HACER DE MANERA MAS EFICIENTE LOGRANDO EL MISMO RESUTLADO HACIENDOLO DE ESTA MANERA___
    /*  public function  __construct(
        //Public: Podemos acceder a el desde cualquier lugar, dentro de clase actual o dentro de clases que hereden esta clase o fuera de la clase.
        public $marca,

        //Protected: Podemos acceder desde la clase que los define y desde cases ques hereden esta clase
        protected $modelo,

        //Private: Se puede acceder desde esta clase.
        private $velocidad,
        public $caballaje,
        public $plazas,

    ) {
    } */

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

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function getModelo()
    {
        return $this->modelo;
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

    public function mostarInformacion(Coche $miObjeto)
    {
        if (is_object($miObjeto)) {
            $informacion = "<h1> Información del coche </h1>";
            $informacion .= "Color: " . $miObjeto->color . "<br>";
            $informacion .= "Modelo: " . $miObjeto->modelo . "<br>";
            $informacion .= "Velocidad: " . $miObjeto->velocidad . "<br>";
        } else {
            $informacion = "Tu dato es este: $miObjeto";
        }
        return $informacion;
    }
} //Fin definción de la clase;
