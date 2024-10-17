<?php

require_once 'models/user.php';

class UserController
{
    public function register()
    {
        require_once 'views/login/register.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            // __Sanitización y validación de los datos recogidos__
            // $username = isset($_POST['username']) ? $_POST['username'] : false; //Modo largo
            $username = $_POST['username'] ?? false; //Modo Simple
            $email = $_POST['email'] ?? false;
            $password = $_POST['password'] ?? false;


            //Si los campos solicitados están presentes
            if ($username && $email && $password) {

                //Sanitización de los datos de entrada 
                $username = filter_var($username, FILTER_SANITIZE_STRING);
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                $password = filter_var($password, FILTER_SANITIZE_STRING);

                //Creación del objeto 'User' y establecemos sus atributos 
                $user = new User();
                $user->setUsername($username);
                $user->setEmail($email);
                $user->setPassword(password_hash($password, PASSWORD_DEFAULT)); //Hashing de la pass

                //Guardar el usuario en la BD
                $save = $user->save();

                //Estabelcer la variable de sesión según el resultado 
                $_SESSION['register'] = $save ? "complete" : "falied";
            } else {
                $_SESSION['register'] = "falied";
            }
        } else {
            $_SESSION['register'] = "falied";
        }

        //Redireccionar luego de realizar el proceso
        header("Location:" . base_url . 'user/register');
        exit();
    }
}
