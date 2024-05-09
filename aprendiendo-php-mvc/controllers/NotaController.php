<?php

class NotaController
{
    public function listar()
    {
        //Modelo
        require_once 'models/nota.php';

        //Logica de la acción del controlador
        $nota = new Nota();


        $notas = $nota->conseguirTodos('notas');

        //Vista
        require_once 'views/nota/listar.php';
    }

    public function crear()
    {
        //Modelo
        require_once 'models/nota.php';

        //Objeto
        $nota = new Nota();
        $nota->setUsuarioId(1);
        $nota->setTitulo("Nota de MVC en PHP");
        $nota->setDescripcion("Descripción de una nota");
        $guardar = $nota->guardar();
        /* echo $nota->db->error;
        die(); */
        header ("Location: index.php?controller=Nota&action=listar");
    }

    public function borrar()
    {
    }
}
