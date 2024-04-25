<?php

trait Utilidades
{
    public function mostrarNombre()
    {
        echo "El nombre es: " . $this->nombre;
    }
}

class Coches
{
    public $nombre;
    public $marca;

    use Utilidades;
}

class Personas
{
    public $nombre;
    public $apellidos;
    
    use Utilidades;
}

class VideoJuego
{
    public $nombre;
    public $anio;

    use Utilidades;
}

$coche = new Coches();
$coche->nombre = "Maruti";

$persona = new Personas();
$persona->nombre = "Raul";

$videoJuego = new VideoJuego();
$videoJuego->nombre = "Bloodborne";

$coche->mostrarNombre();
echo "<br>";
$persona->mostrarNombre();
echo "<br>";
$videoJuego->mostrarNombre();
echo "<br>";
