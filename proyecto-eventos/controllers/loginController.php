<?php

//Iniciar la Sesión y la conexión a la BD:
require_once '../includes/conexion.php';

//Recoger los datos del Formulario:
if (isset($_POST)) {

    //Borrar errores antiguos
    if (isset($_SESSION['error_login'])) {
        unset($_SESSION['error_login']);
    }

    //Recoger datos del formulario por POST:
    $email = trim($_POST['email']);
    $contrasena = $_POST['contrasena'];

    //Consulta para combrobar si existen la credenciales del usuario:
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $sql);

    if ($login && mysqli_num_rows($login) == 1) {
        $usuario = mysqli_fetch_assoc($login);

        //Comprobar la contraseña:
        $verify = password_verify($contrasena, $usuario['contrasena']);

        if ($verify) {
            //Utilizar una SESIÓN para Guardar los datos del usuario logeado:
            $_SESSION['usuario'] = $usuario;
        } else {
            $_SESSION['error_login'] = "Login incorrecto!";
            header('Location:  ../?page=login');
            exit();
        }
    } else {
        //Mensaje de error
        $_SESSION['error_login'] = "Login Incorrecto!";
        header('Location:  ../?page=login');
        exit();
    }
}

//Redirigir al index
header('Location: ../index.php');
