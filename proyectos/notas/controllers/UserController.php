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

   /*  public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = isset($_POST['username']) ? trim($_POST['username']) : false;
            $password = isset($_POST['password']) ? trim($_POST['password']) : false;
            $email = isset($_POST['email']) ? trim($_POST['email']) : false;

            $errors = [];

            // Validar el nombre de usuario (mínimo 4, máximo 20 caracteres)
            if ($username && preg_match('/^[a-zA-Z0-9_]{4,20}$/', $username)) {
                $username = filter_var($username, FILTER_SANITIZE_STRING);
            } else {
                $errors[] = "El nombre de usuario debe tener entre 4 y 20 caracteres y solo puede contener letras, números y guiones bajos.";
            }

            // Validar el correo electrónico
            if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                $email = strtolower($email); // Convertir a minúsculas
            } else {
                $errors[] = "El correo electrónico no es válido.";
            }

            // Validar la contraseña (mínimo 6 caracteres)
            if ($password && strlen($password) >= 6) {
                $password = password_hash($password, PASSWORD_DEFAULT);
            } else {
                $errors[] = "La contraseña debe tener al menos 6 caracteres.";
            }

            // Si no hay errores, guarda el usuario
            if (empty($errors)) {
                $user = new User();
                $user->setUsername($username);
                $user->setPassword($password);
                $user->setEmail($email);
                // $user = new User($username, $email, $password);


                // Guardar los datos en la BD
                $save = $user->save();

                if ($save === true) {
                    $_SESSION['register'] = "complete";
                } else {
                    $_SESSION['register'] = "failed";
                    if ($save === 'username') {
                        $errors[] = "El nombre de usuario ya existe.";
                    } elseif ($save === 'email') {
                        $errors[] = "El correo electrónico ya existe.";
                    }
                }
            } else {
                $_SESSION['register'] = "failed";
            }

            $_SESSION['errors'] = $errors;
        } else {
            $_SESSION['register'] = "failed";
        }

        // Redireccionar y detener la ejecución
        header("Location:" . base_url . 'user/register');
        exit();
    }
 */

 public function save()
    {
        if (isset($_POST)) {

            $username = isset($_POST['username']) ? $_POST['username'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

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
            }
        } else {
            $_SESSION['register'] = "failed";
        }
        header("Location:" . base_url . 'user/register');
    }
    //Verificación de login e inicio de usuario
    /*  public function verifyLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
            $user = new User();
            $user->setUsername($_POST['username']);
            $user->setPassword($_POST['password']);

            $identity = $user->login();

            // Verificar si el login fue exitoso
            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;

                
                exit(); 

                header("Location:" . base_url);
                exit();
            } else {
                $_SESSION['error_login'] = "Identificación Fallida";
                header("Location:" . base_url . 'user/loginForm');
                exit();
            }
        } else {
            $_SESSION['error_login'] = "Correo electrónico y contraseña son requeridos";
            header("Location:" . base_url . 'user/loginForm'); 
            exit();
        }
    }
 */
    public function log()
    {
        if (isset($_POST)) {
            // Identificar al usuario
            // Consultar a la BD
            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            $identity = $user->login();

            if($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;

               
            }else{
                $_SESSION['error_login'] = 'Identificación fallida';
            }


            //Crear sesión
        }
        header("Location:" . base_url);
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
