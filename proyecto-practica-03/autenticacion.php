<?php
session_start();

//CREDENCIALES DE ACCESO A LA BD
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'proyecto_practica_trea';

//CONEXION A LA BD
$conexion = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

//VALIDACIÓN DE CONEXION
if (mysqli_connect_error()) {
    //Si se encuentra error en la conexión
    exit('Fallo en la conexión de MySQL:' . mysqli_connect_error());
}

//SE VALIDA SI SE HA ENVIADO INFORMACIÓN, CON LA FUNCIÓN ISSET()
if (!isset($_POST['username'], $_POST['password'])) {
    //Si no hay datos muestra error y re-direccionar a login
    header('Location: index.html');
}

//EVITAR INYECCIÓN SQL
if ($stmt = $conexion->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
    //parametro de enlace de la cadena
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
}

//VALIDACIÓN DE LO INGRESADO CON LA BD
$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $password);
    $stmt->fetch();

    //Se confirma que la cuenta existe, ahora se valida la contraseña.
    if ($_POST['password'] === $password) {
        //La conexión sería exitosa, se crea la sesión.

        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $_POST['username'];
        $_SESSION['id'] = $id;
        header('Location: inicio.php');
    }
} else {
    //USUARIO INCORRECTO
    header('Location: index.html');
}

$stmt->close();

?>
