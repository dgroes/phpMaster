<?php

class Shift
{
    private $id, $trabajador_id, $torre_id, $diaInicio, $diaTermino, $horaInicio, $horaTermino, $detalle;

    // Getter y Setter para $id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter y Setter para $trabajador_id
    public function getTrabajadorId()
    {
        return $this->trabajador_id;
    }

    public function setTrabajadorId($trabajador_id)
    {
        $this->trabajador_id = $trabajador_id;
    }

    // Getter y Setter para $torre_id
    public function getTorreId()
    {
        return $this->torre_id;
    }

    public function setTorreId($torre_id)
    {
        $this->torre_id = $torre_id;
    }

    // Getter y Setter para $diaInicio
    public function getDiaInicio()
    {
        return $this->diaInicio;
    }

    public function setDiaInicio($diaInicio)
    {
        $this->diaInicio = $diaInicio;
    }

    // Getter y Setter para $diaTermino
    public function getDiaTermino()
    {
        return $this->diaTermino;
    }

    public function setDiaTermino($diaTermino)
    {
        $this->diaTermino = $diaTermino;
    }

    // Getter y Setter para $horaInicio
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;
    }

    // Getter y Setter para $horaTermino
    public function getHoraTermino()
    {
        return $this->horaTermino;
    }

    public function setHoraTermino($horaTermino)
    {
        $this->horaTermino = $horaTermino;
    }

    // Getter y Setter para $detalle
    public function getDetalle()
    {
        return $this->detalle;
    }

    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;
    }

   
}
