<?php
require_once 'models/user.php';

class UserController
{
    public function index()
    {
        echo "Controlador usuarios, Acción index";
    }

    public function register()
    {
        require_once 'views/user/register.php';
    }

    public function login()
    {
        require_once 'views/user/login.php';
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = isset($_POST['username']) ? trim($_POST['username']) : false;
            $password = isset($_POST['password']) ? trim($_POST['password']) : false;
            $email = isset($_POST['email']) ? trim($_POST['email']) : false;

            $errors = [];

            // Validar el nombre de usuario
            if ($username && strlen($username) >= 4 && strlen($username) <= 20) {
                $username = filter_var($username, FILTER_SANITIZE_STRING);
            } else {
                $errors[] = "El nombre de usuario no es válido.";
            }

            // Validar el correo electrónico
            if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                $email = strtolower($email); // Convertir a minúsculas
            } else {
                $errors[] = "El correo electrónico no es válido.";
            }

            // Validar la contraseña
            if ($password && strlen($password) >= 6) {
                $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
            } else {
                $errors[] = "La contraseña debe tener al menos 6 caracteres.";
            }

            // Si no hay errores, guarda el usuario
            if (empty($errors)) {
                $user = new User();
                $user->setUsername($username);
                $user->setPassword($password);
                $user->setEmail($email);
                $user->setRol('user'); // Aquí puedes definir el rol predeterminado, si es necesario

                // Guardar los datos a la BD gracias al método save() del modelo user
                $save = $user->save();
                if ($save) {
                    $_SESSION['register'] = "complete";
                } else {
                    $_SESSION['register'] = "failed";
                }
            } else {
                $_SESSION['register'] = "failed";
                $_SESSION['errors'] = $errors;
            }
        } else {
            $_SESSION['register'] = "failed";
        }

        header("Location:" . base_url . 'user/register');
        exit(); // Asegúrate de detener la ejecución después de redirigir
    }
}
