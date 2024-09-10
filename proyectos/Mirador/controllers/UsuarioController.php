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

    public function login(){
        if(isset($_POST['email']) && isset($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $persona = new Trabajador();
            $persona->save();
        }
    }
}