<?php
require_once 'models/user.php';
require_once 'models/post.php';

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

    public function log()
    {
        require_once 'views/user/login.php';
    }

    public function Perfil()
    {
        Utils::isIdentity();

        $user = new User();
        $user->setId($_SESSION['identity']->id);

        $user = $user->getOneUser();

        $user_id = $_SESSION['identity']->id;
        $post = new Post();
        $myPosts = $post->getAllByUser($user_id);

        require_once 'views/user/perfil.php';
    }


    public function edit()
    {
        require_once 'views/user/edit.php';
    }

    public function update()
    {
        Utils::isIdentity();
        if (isset($_POST) && isset($_POST['bio'])) {
            $bio = $_POST['bio'];

            $user = new User();
            $user->setId($_SESSION['identity']->id);
            $user->setBio($bio);

            $update = $user->update();

            if ($update) {
                $_SESSION['user-update'] = "complete";
            } else {
                $_SESSION['user-update'] = "failed";
            }
        } else {
            $_SESSION['user-update'] = "failed";
        }
        header("Location:" . base_url . "user/perfil");
    }


    public function seePerfil()
    {
        if (isset($_GET['id'])) {
            $user_id = $_GET['id'];
            $user = new User();
            $perfilByUser = $user->getPerfilByUser($user_id);
        }
        require_once 'views/user/perfilPublic.php';
    }

    public function login()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {

            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);

            $identity = $user->login();

            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;

                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
                header("Location:" . base_url);
                exit();
            } else {
                $_SESSION['error_login'] = " Identificación fallida";
                header("Location:" . base_url . 'user/log');
                exit();
            }
        } else {
            $_SESSION['error_login'] = "Correo electónico y contraseña son requeridos";
            header("Location:"  . base_url . 'user/log');
            exit();
        }
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
                $user->setRol('user'); // por defecto, se deja en user, y en la BD se puede cambiar por un admin una cuanta a 'admin'

                // Guardar los datos a la BD gracias al método save() del modelo user
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

        header("Location:" . base_url . 'user/register');
        exit(); // Asegúrate de detener la ejecución después de redirigir
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
