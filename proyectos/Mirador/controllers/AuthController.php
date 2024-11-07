<?php

require_once 'models/worker.php';
require_once 'models/person.php';

// Controller para manejo de (login, registro, logout) centralizando la lógica en un solo controlador
class AuthController
{

    public function showLoginForm()
    {
        require_once 'views/auth/login.php';
    }

    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {


            $worker = new Worker();
            $worker->setEmail($_POST['email']);
            $worker->setPassword($_POST['password']);
            $identity = $worker->verifyCredentials();

            

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

   /*  public function showRegisterForm()
    {
        require_once 'views/auth/register.php';
    } */

   /*  public function createAccount()
    {
        if (isset($_POST)) {
            $persona_id = $_POST['persona_id'];
            $cargo_id = $_POST['cargo_id'];
            $email = $_POST['email'];
            $password = isset($_POST['password']) ? trim($_POST['password']) : false;


            // Validar la contraseña
            if ($password && strlen($password) >= 6) {
                $segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
            } else {
                $errors[] = "La contraseña debe tener al menos 6 caracteres.";
            }
        }

        $worker = new Worker();
        $worker->setPersonaId($persona_id);
        $worker->setCargoId($cargo_id);
        $worker->setEmail($email);
        $worker->setPassword($segura);

        $save = $worker->save();
    } */
}
