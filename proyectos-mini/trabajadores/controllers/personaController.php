<?php
require_once 'models/persona.php';

class PersonaController
{

    public function index()
    {
        $persona = new Persona();
        $personas = $persona->listarTodos();

        // Inicializamos $trabajadores como null si no estamos en el controlador de trabajadores
        $trabajadores = null;

        require_once 'views/gestion.php';
    }


    public function guardar()
    {
        if (isset($_POST) && isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['cedula'])) {
            $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : false;

            if ($nombres && $apellidos && $cedula) {
                $persona = new Persona();
                $persona->setNombres($nombres);
                $persona->setApellidos($apellidos);
                $persona->setCedula($cedula);

                $save = $persona->guardar();
            }
        }
        header("Location:" . base_url . 'persona/index');
        exit();
    }
}
