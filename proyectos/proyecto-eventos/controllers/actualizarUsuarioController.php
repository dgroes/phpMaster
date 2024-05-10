<?php
if (isset($_POST)) {
    //Conexión a la Base de Datos:
    require_once '../includes/conexion.php';

    //Recoger los valores del formulario para actulaizar los datos del usuario:
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;

    //Array de errores:
    $errores = array();

    //Validar los datos antes de guardarlos en la BD:
    //Validación de Nombre:
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['editar_nombre'] = "El nombre no es válido";
    }

    //Validar el Email:
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
    } else {
        $email_validado = false;
        $errores['editar_email'] = "El email no es válido";
    }

    $guardar_usuario = false;

    if (count($errores) == 0) {
        $usuario = $_SESSION['usuario'];
        $guardar_usuario = true;

        //Verificar si el email y existe:
        $sql = "SELECT id, email FROM usuarios WHERE email = '$email'";
        $isset_email = mysqli_query($db, $sql);
        $isset_user = mysqli_fetch_assoc($isset_email);

        if ($isset_user['id'] == $usuario['id'] || empty($isset_user)) {

            // Convertir el nombre del usuario para que cada palabra comience con mayúscula
            $nombre = ucwords(strtolower($nombre));

            //Actualizar el usuario con los nuevos datos en la BD:
            $sql = "UPDATE usuarios SET " .
                "nombre = '$nombre', " .
                "email = LOWER('$email') " .
                "WHERE id = " . $usuario['id'];
            $guardar = mysqli_query($db, $sql);

            if ($guardar) {
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['email'] = $email;
                $_SESSION['completado'] = "Tus datos se han actualizado con éxito";
            } else {
                $_SESSION['errores']['general'] = "Fallo al guardar el actulizar tus datos!!";
            }
        } else {
            $_SESSION['errores']['general'] = "El usuario ya existe!!";
        }
    } else {
        $_SESSION['errores'] = $errores;
    }
}


header('Location: ../?page=perfil');
