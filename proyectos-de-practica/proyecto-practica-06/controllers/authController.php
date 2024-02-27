<?php


/* <!-- _CONTROLADOR DE REGISTRO_ --> */
if (isset($_POST)) {
    require_once '../config/conection.php';
    
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    //Array de errores
    $errores = array();

    //Validar campos
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_valido = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_valido = true;
    } else {
        $email_validado = false;
        $errores['email'] = "El email no es valido";
    }

    if (!empty($password)) {
        $password_validado = true;
    } else {
        $password_validado = false;
        $errores['password'] = "La constraseña está vacía";
    }

    //Guardar el Usuario en la BD
    $guardar_usuario = false;

    if (count($errores) == 0){
        $guardar_usuario = true;

        //Cifrar la contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

        //Insertar el usuario en la BD
        $sql = "INSERT INTO usuario VALUES(NULL, '$nombre', '$email', '$password_segura', CURDATE(), 1);";
        $guardar = mysqli_query($db, $sql);
        
        
    }
}
