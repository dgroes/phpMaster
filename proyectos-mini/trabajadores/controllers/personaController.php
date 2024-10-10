<?php
require_once 'models/persona.php';

class PersonaController
{

    public function index()
    {
        $persona = new Persona();
        $personas = $persona->listarTodos();  // Asegúrate de obtener los resultados
        require_once 'views/gestion.php';  // Pasas la vista después de obtener los datos
    }


    public function guardar()
    {
        if (isset($_POST) && isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['cedula']) && isset($_POST['cargo'])) {
            $trabajador = new Trabajador();
        }
    }
}
