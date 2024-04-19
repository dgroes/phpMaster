<?php

// Herencia: Posibilidad de compartir atributos y metodos entre clases.

class Persona
{
    public $nombre;
    public $apellidos;
    public $altura;
    public $edad;

    // Métodos Get
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getAltura()
    {
        return $this->altura;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    // Métodos Set
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function setAltura($altura)
    {
        $this->altura = $altura;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

    public function hablar()
    {
        return "Estoy hablando";
    }

    public function caminar()
    {
        return "Estoy caminando";
    }
}


class Informatico extends Persona
{

    public $lenguajes;
    public $experienciaProgramador;

    public function __construct()
    {
        $this->lenguajes = "HTML, CSS, JS";
        $this->experienciaProgramador = 4;
    }

    public function sabeLenguajes($lenguajes)
    {
        $this->lenguajes = $lenguajes;
        return $this->lenguajes;
    }
    public function programar()
    {
        return "Soy programador";
    }

    public function repararOrdenador()
    {
        return "Reparar Ordenadores";
    }

    public function hacerOfimatica()
    {
        return "Estoy escribiendo en Word";
    }
}

class TecnicoRedes extends Informatico
{
    public $auditarRedes;
    public $experienciaRedes;

    public function __construct()
    {
        parent::__construct();
        $this->auditarRedes = "Experto";
        $this->experienciaRedes = 5;
    }

    public function auditoria()
    {
        return "Estoy auditando una red";
    }
}
