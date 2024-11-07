<?php

class Position
{
    private $id;
    private $cargo;
    private $descripcion;

    // Constructor opcional
    public function __construct($cargo = null, $descripcion = null)
    {
        $this->cargo = $cargo;
        $this->descripcion = $descripcion;
    }

    // Getter y Setter para id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter y Setter para cargo
    public function getCargo()
    {
        return $this->cargo;
    }

    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    // Getter y Setter para descripcion
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
}
