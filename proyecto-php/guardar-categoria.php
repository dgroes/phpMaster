<?php
if (isset($_POST)) {
    //Conexión a la Base de Datos
    require_once 'includes/conexion.php';

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;

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

    if (count($errores) == 0) {
        $sql = "INSERT INTO categorias VALUES (NULL, '$nombre');";
        $guardar = mysqli_query($db, $sql);

    }

}
header("Location: index.php");
