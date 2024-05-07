<?php
//Encabezado: Clase Registro Descripción: Crea una clase Registro que utilice un trait para agregar funcionalidades de registro de fecha y hora a las instancias de la clase. Utiliza métodos mágicos para registrar automáticamente la fecha y hora de creación de cada instancia.

trait Utilidades
{
    public function mostrarFechaHora()
    {
        echo "La fecha es: " . date('d-m-Y H:i:s');
    }
}

class Registro
{
    public string $id;

    public function __construct()
    {
        // Genera un ID único para cada instancia
        $this->id = uniqid();
    }

    // Usa el trait Utilidades
    use Utilidades;
}

// Crea una instancia de Registro
$registro = new Registro();

// Muestra la fecha y hora asociada con la instancia
$registro->mostrarFechaHora();