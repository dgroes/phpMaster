<?php

require_once 'models/trabajador.php';

class UsuarioController
{
    public function index()
    {
        require_once 'views/usuario/inicio.php';
    }

    public function log()
    {
        require_once 'views/usuario/login.php';
    }

    public function login()
    {
        if (isset($_POST)) {
           
            $trabajador = new Trabajador();
            $trabajador->setEmail($_POST['email']);
            $trabajador->setPassword($_POST['password']);
            $identity = $trabajador->login();

            if($identity && is_object($identity)){
                
            }
        }
    }
}
