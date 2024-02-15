<?php
require_once 'config/conexion.php';

//Regocer los datos del Formulario
if (isset($_POST)) {

    // Borrar error antiguo
    if (isset($_SESSION['error_login'])) {
        unset($_SESSION['error_login']);
    }

    // Recoger datos del formulario
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    //Consulta para comprobar las Crenciales del Usuario.
    $sql = "SELECT * FROM usuario WHERE correo = '$email'";
    $login = mysqli_query($db, $sql);

    if ($login && mysqli_num_rows($login) == 1) { //mysqli_num_rows es una función que se utiliza para obtener el número de filas en el resultado de una consulta SELECT. En este caso, $login es el resultado de la consulta que busca un usuario con el email proporcionado. Si $login es verdadero (es decir, la consulta se ejecutó con éxito) y mysqli_num_rows($login) == 1, significa que se encontró exactamente una fila que cumple con la condición especificada en la consulta. En este contexto, la condición es que haya un usuario con el email proporcionado.
        $usuario = mysqli_fetch_assoc($login); //$usuario se convierte en un array asociativo que contiene las columnas de la fila obtenida. En este caso, contendría las columnas de la tabla usuarios para el usuario encontrado, como id, nombre, apellidos, etc.

        // Comprobar la contraseña
        $verify = password_verify($password, $usuario['password']);

        if ($verify) {
            // Utilizar una sesión para guardar los datos del usuario logueado
            $_SESSION['usuario'] = $usuario;
        } else {
            // Si algo falla enviar una sesión con el fallo
            $_SESSION['error_login'] = "Login incorrecto!!";
        }
    } else {
        // mensaje de error
        $_SESSION['error_login'] = "Login incorrecto!!";
    }


    // Redirigir al index.php
    header('Location: index.php');
}
