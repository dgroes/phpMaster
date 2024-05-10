<?php require_once '../config/conection.php';
?>

<?php
if (isset($_POST)) {
     

/*  _CONTORLADOR DE LOGIN_ */
    //Regoger los datos de formulario
    $nombre = trim($_POST['nombre']);
    $password = $_POST['password'];

    //Consulta para comprobar las credenciales del usuario.
    $sql = "SELECT * FROM usuario WHERE nombre = '$nombre'";
    $login = mysqli_query($db, $sql);

    if ($login && mysqli_num_rows($login) == 1) {
        $usuario = mysqli_fetch_assoc($login);

        //Comprobar la contraseña
        $verify = password_verify($password, $usuario['password']);

        if ($verify) {
            //Utilizar la sesión para guarda los daos del usuario Logeado.
            $_SESSION['usuario'] = $usuario;
        } else {
            //Si algo falla enviar una sesión con el fallo.
            $_SESSION['error_login'] = "Login incorrecto";
        }
    } else {
        //Mensaje de error
        $_SESSION['error_login'] = "Login incorrecto";
    }
}

//Redirigir al index.php
header('Location: index.php');
