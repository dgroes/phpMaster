<?php

if (isset($_POST)) {
    require_once '../config/db_conection.php';
    $rut = isset($_POST['rut']) ? mysqli_real_escape_string($conn, $_POST['rut']) : '';
    $razonSocial = isset($_POST['razonSocial']) ? mysqli_real_escape_string($conn, $_POST['razonSocial']) : '';
    $nombreContacto = isset($_POST['nombreContacto']) ? mysqli_real_escape_string($conn, $_POST['nombreContacto']) : '';
    $mailContacto = isset($_POST['mailContacto']) ? mysqli_real_escape_string($conn, $_POST['mailContacto']) : '';
    $direccion = isset($_POST['direccion']) ? mysqli_real_escape_string($conn, $_POST['direccion']) : '';
    $telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($conn, $_POST['telefono']) : '';
    $actividad = isset($_POST['actividad']) ? mysqli_real_escape_string($conn, $_POST['actividad']) : '';
    $tipo = isset($_POST['tipo']) ? mysqli_real_escape_string($conn, $_POST['tipo']) : '';

    //VALIDACIÓN:

    //Array de errors, los posibles errores que aparezcan a causa del usuario serán almacenados en un array vacio, este posteriormente será llamado por el lado del ciente y mostrara el tipo de error que se está produciendo.
    $errors = array();

    if (empty($rut)) {
        $errors['rut'] = 'El rut es invalido';
    }

    if (empty($razonSocial)) {
        $errors['razonSocial'] = 'La razón social no es valida';
    }

    if (empty($nombreContacto)) {
        $errors['nombreContacto'] = 'El nombre de contacto no es valido';
    }

    if (empty($mailContacto)) {
        $errors['mailc$mailContacto'] = 'El mail de contacto no es valido';
    }

    if (empty($direccion)) {
        $errors['dire$direccion'] = 'La dirección no es valida';
    }

    if (empty($razonSocial)) {
        $errors['razonSocial'] = 'La razón social no es valida';
    }

    if (empty($telefono) && !is_numeric($telefono)) {
        $errors['telefono'] = 'El teléfono no es valido';
    }

    if (empty($actividad) && !is_numeric($actividad)) {
        $errors['$actividad'] = 'La actividad de empresa no es valida';
    }

    if (empty($tipo) && !is_numeric($tipo)) {
        $errors['tipo'] = 'El tipo de empresa no es valido';
    }

    //Agregar los valores a la BD
    if (count($errors) == 0) {
        // Escapar los valores para prevenir SQL injection
        $rut = mysqli_real_escape_string($conn, $rut);
        $actividad = mysqli_real_escape_string($conn, $actividad);
        $tipo = mysqli_real_escape_string($conn, $tipo);
        $razonSocial = mysqli_real_escape_string($conn, $razonSocial);
        $nombreContacto = mysqli_real_escape_string($conn, $nombreContacto);
        $mailContacto = mysqli_real_escape_string($conn, $mailContacto);
        $direccion = mysqli_real_escape_string($conn, $direccion);
        $telefono = mysqli_real_escape_string($conn, $telefono);

        // Construir la consulta SQL con valores escapados
        $sql = "INSERT INTO cliente VALUES('$rut', $actividad, $tipo, '$razonSocial', 
        '$nombreContacto', '$mailContacto', '$direccion', '$telefono');";

        // Verificar la consulta generada
        var_dump($sql);
        die;

        // Ejecutar la consulta
        $save = mysqli_query($conn, $sql);

        if (!$save) {
            die('Error al ejecutar la consulta: ' . mysqli_error($conn));
        }
    } else {
        die('Error en la validación del formulario.');
    }
}
