<?php
require_once 'models/trabajador.php';
require_once 'models/persona.php'; // Incluye el modelo de Persona para usarlo aquí también

class TrabajadorController
{
    public function index()
    {
        $trabajador = new Trabajador();
        $trabajadores = $trabajador->listarTodos();

        $persona = new Persona();
        $personas = $persona->listarTodos();  // También carga los datos de las personas

        require_once 'views/gestion.php';  // Pasas la vista después de obtener los datos
    }

    public function guardar()
    {
        if (isset($_POST) && isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['cedula']) && isset($_POST['cargo'])) {
            $trabajador = new Trabajador();
        }
    }

    public function listar()
    {
        $trabajador = new Trabajador();
        $trabajadores = $trabajador->listarTodos();
        require_once 'views/gestion.php';
    }
}
