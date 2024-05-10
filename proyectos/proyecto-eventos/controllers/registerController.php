<?php
if (isset($_POST)) {
    require_once '../includes/conexion.php';

    //Iniciar Sesión:
    if (!isset($_SESSION)) {
        session_start();
    }

    //Regore los valores del formulario de reristro, en registro.php
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
    $contrasena = isset($_POST['contrasena']) ? mysqli_real_escape_string($db, $_POST['contrasena']) : false;

    //Array de errores:
    $errores = array();

    //Validación de Nombre:
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es válido" ;
    }

    //Validación Email:
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
    } else {
        $email_validado = false;
        $errores['email'] = "El email no es válido";
    }

    //Validación de Contraseña:
    if (!empty($contrasena)) {
        $contrasena_valido = true;
    } else {
        $contrasena_valido = false;
        $errores['contrasena'] = "La contraseña está vacía";
    }

    //Registrar el Usuario en la BD:
    $guardar_usuario = false;
    if(count($errores) == 0) {
        $guardar_usuario = true;

        //Cifrar la Contraseña:
        $contrasena_segura = password_hash($contrasena, PASSWORD_BCRYPT, ['cost' => 5]);

        // Convertir el nombre del usuario para que cada palabra comience con mayúscula
        $nombre = ucwords(strtolower($nombre));

        //Insertar los Datos Validados en la BD:
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', LOWER('$email'), '$contrasena_segura', CURDATE());";
        $guardar = mysqli_query($db, $sql);
        if ($guardar) {
            $_SESSION['completado'] = "El registro se ha completado con exito";
        } else {
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario";
        }

    } else {
        $_SESSION['errores'] = $errores;
        header('Location:  ../?page=registro');
        exit();
    }
}
// header('Location: ../index.php');
header('Location: ../?page=registro');
exit();
