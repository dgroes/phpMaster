<?php
if (isset($_POST)) {
    //Conexión a la Base de Datos
    require_once 'includes/conexion.php';

    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
    $usuario = $_SESSION['usuario']['id'];

    //ARRAY DE ERRORES:
    //Almacenar los errores en un array es una buena práctica, de esta manera se manejarían los errores fácilmente y presentar dichos errores al usuario de una manera coherente
    $errores = array();


    //VALIDAR LOS DATOS ANTES DE GUARDARLOS EN LA BASE DE DATOS:
    //La condición del if define si no está vaciom no es numérico y no contiene ningún dígito. en $nombre, solo así el dato es valido.

    // VALIDAR LOS DATOS ANTES DE GUARDARLOS EN LA BASE DE DATOS:
    if (empty($titulo)) {
        $errores['titulo'] = 'El titulo no es válido';
    }

    if (empty($descripcion)) {
        $errores['descripcion'] = 'La descripción no es válida';
    }

    // Cambiar la condición para validar la categoría
    if (!is_numeric($categoria) || $categoria <= 0) {
        $errores['categoria'] = 'La categoría no es válida';
    }
    /* var_dump($errores);
    die(); */


    if (count($errores) == 0) {
        $sql = "INSERT INTO entradas VALUES(NULL, '$usuario', '$categoria',  '$titulo', '$descripcion', CURDATE());";
        $guardar = mysqli_query($db, $sql);
        header("Location: index.php");
    } else {
        $_SESSION['errores_entrada'] = $errores;
        header("Location: crear-entradas.php");
    }
}
