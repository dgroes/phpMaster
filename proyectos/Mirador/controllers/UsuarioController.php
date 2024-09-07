<?php 

// require_once 'models/usuario.php';

class UsuarioController {
    public function index()
    {
        require_once 'views/usuario/inicio.php';
    }

    public function log(){
        require_once 'views/usuario/login.php';
    }
}