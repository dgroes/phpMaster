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
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {


            $trabajador = new Trabajador();
            $trabajador->setEmail($_POST['email']);
            $trabajador->setPassword($_POST['password']);
            $identity = $trabajador->login();


            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;

                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
                header("Location:" . base_url);
                exit();
            } else {
                $_SESSION['error_login'] = 'Identificación Fallida' . '<br>' . 'La contraseña y el email no coicidente, intentalo nuevamente';
                header("Location:" . base_url . 'Usuario/log');
                exit();
            }
        } else {
            $_SESSION['error_login'] = "Correo electónico y contraseña son requeridos";
            header("Location:" . base_url);
            exit();
        }
    }

    public function logout()
    {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }

        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }

        header("Location:" . base_url);
        exit();
    }
}
