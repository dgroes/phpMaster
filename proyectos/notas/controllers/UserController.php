<?php

require_once 'models/user.php';

class UserController
{
    public function register()
    {
        require_once 'views/login/register.php';
    }

    public function loginForm()
    {
        require_once 'views/login/login.php';
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = isset($_POST['username']) ? $_POST['username'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            //Array vacio para almacenar los posibles errores del registro
            $errors = [];

            //Validar el nombre de usuario
            if ($username && strlen($username) >= 4 && strlen($username) <= 20) {
                $username = filter_var($username, FILTER_SANITIZE_STRING);
            } else {
                $errors[] = "El nombre de usuario no es valido";
            }

            //Validar el correo
            if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                $email = strtolower($email);
            } else {
                $errors[] = "El correo electrónico no es válido";
            }

            //VAlidar contraseña
            if($password && strlen($password) >= 5){
                
            } else {
                $errors[] = "La contraseña debe tener al menos 5 caracteres";
            }


            //Sin no hay errores se guardará el usuario
            if (empty($errors)) {
                $user = new User();
                $user->setUsername($username);
                $user->setEmail($email);
                $user->setPassword($password);

                //Guardar los datos en la BD
                $save = $user->save();
                if ($save === true) {
                    $_SESSION['register'] = "complete";
                } else {
                    $_SESSION['register'] = "falied";
                    if ($save === 'username') {
                        $errors[] = "El nombre de usuario ya existe";
                    } elseif ($save === 'email') {
                        $errors[] = "El correo electrónico ya existe";
                    }
                }
            } else {
                $_SESSION['register'] = "falied";
            }

            /* 
            if ($username && $email && $password) {
                $user = new User();
                $user->setUsername($username);
                $user->setEmail($email);
                $user->setPassword($password);

                $save = $user->save();
                if ($save) {
                    $_SESSION['register'] = "complete";
                } else {
                    $_SESSION['register'] = "failed";
                }
            } else {
                $_SESSION['register'] = "failed";
            } */
            $_SESSION['errors'] = $errors;
        } else {
            $_SESSION['register'] = "falied";
        }
        header("Location:" . base_url . 'user/register');
        exit();
    }

    public function log()
    {
        if (isset($_POST)) {
            // Identificar al usuario
            // Consultar a la BD
            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            $identity = $user->login();

            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;
            } else {
                $_SESSION['error_login'] = 'Identificación fallida, el correo o la contraseña no coinciden';
                header("Location:" . base_url . 'user/loginForm');
                exit();
            }


            //Crear sesión
        }
        header("Location:" . base_url);
        exit();
    }


    public function logout()
    {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }

        // Destruir todas las variables de sesión
        session_destroy();

        header("Location:" . base_url);
        exit();
    }
}
