<?php
interface Ordenador
{
    public function encender();
    public function apagar();
    public function reiniciar();
    public function desfracmentar();
    public function dectarUSB();
}

class Imac implements Ordenador
{
    private $modelo;

    function getModelo()
    {
        return $this->modelo;
    }

    function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function encender()
    {
        return "Encendido";
    }

    public function apagar()
    {
    }

    public function reiniciar()
    {
    }

    public function desfracmentar()
    {
    }

    public function dectarUSB()
    {
    }
}


$maquintosh = new Imac();

var_dump($maquintosh);
$maquintosh->setModelo("Mackbook Pro");
echo $maquintosh->getModelo();
