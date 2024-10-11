<?php
require_once 'models/trabajador.php';
require_once 'models/persona.php'; // Incluye el modelo de Persona para usarlo aquí también

class TrabajadorController
{
    public function index()
    {
        $trabajador = new Trabajador();
        $trabajadores = $trabajador->listarTodos();

        // Inicializamos $personas como null si no estamos en el controlador de personas
        $personas = null;

        require_once 'views/gestion.php';
    }


    public function guardar()
    {
        if (isset($_POST) && isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['cedula']) && isset($_POST['cargo'])) {
            $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : false;
            $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : false;

            if ($nombres && $apellidos && $cedula && $cargo) {
                $trabajador = new Trabajador();
                $trabajador->setNombres($nombres);
                $trabajador->setApellidos($apellidos);
                $trabajador->setCedula($cedula);
                $trabajador->setCargoId($cargo);

                $save = $trabajador->guardar();
            }
        }
        header("Location:" . base_url . 'trabajador/gestion');
        exit();
    }
}
