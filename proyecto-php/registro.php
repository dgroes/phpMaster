<?php
if (isset($_POST)) {

    require_once 'includes/conexion.php';

    //Iniciar Sesión
    if (!isset($_SESSION)) {
        session_start();
    }
    //RECOGER LOS VALORES DEL FORMULARIO DE REGISTRO
    // Con el operador ternario se define si existe: ejemplo: Si $_POST['nombre'] está definido (es decir, si existe y no es null), entonces $nombre toma el valor de $_POST['nombre']. Si no está definido, $nombre se establece en false.
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;


    //ARRAY DE ERRORES:
    //Almacenar los errores en un array es una buena práctica, de esta manera se manejarían los errores fácilmente y presentar dichos errores al usuario de una manera coherente
    $errores = array();


    //VALIDAR LOS DATOS ANTES DE GUARDARLOS EN LA BASE DE DATOS:
    //La condición del if define si no está vaciom no es numérico y no contiene ningún dígito. en $nombre, solo así el dato es valido.

    //Validar Nombre
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    //Validar Apellidos
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
        $apellidos_validado = true;
    } else {
        $apellidos_validado = false;
        $errores['apellidos'] = "Los apellidos no son validos";
    }

    //Validar Email
    //La constante FILTER_VALIDATE_EMAIL comprueba si la variable posee estandar de una dirección de correo electronico valido.
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
    } else {
        $email_validado = false;
        $errores['email'] = "El email no es valido";
    }

    //Validar contraseña
    if (!empty($password)) {
        $password_validado = true;
    } else {
        $password_validado = false;
        $errores['password'] = "La contraseña está vacía.";
    }


    //GUARDAR USUARIO EN LA BASE DE DATOS:
    $guardar_usuario = false;

    if (count($errores) == 0) {
        $guardar_usuario = true;

        //Cifrar la contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

        //Insertar el usuario en la base de datos
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
        $guardar = mysqli_query($db, $sql);
        if ($guardar) {
            $_SESSION['completado'] = "El registro se ha completado con exito.";
        } else {
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario";
        }
    } else {
        $_SESSION['errores']  = $errores;
        header('Location: index.php');
    }
}
header('Location:index.php');
