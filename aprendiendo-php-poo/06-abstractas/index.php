<?php

abstract class Ordenador
{
    public $encendido;

    abstract public function encender();
    public function apagar()
    {
        $this->encendido = false;
    }
}


class PcAcer extends Ordenador
{
    public $software;

    public function arrancarSoftware()
    {
        $this->software = true;
    }

    public function encender()
    {
        $this->encendido = true;
    }
}

$ordenador = new PcAcer();
$ordenador->arrancarSoftware();
$ordenador->encender();
$ordenador->apagar();
var_dump($ordenador);