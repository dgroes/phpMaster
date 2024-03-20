<?php

function mostrarError($errores, $campo)
{
    $alerta = '';
    if (isset($errores[$campo]) && !empty($campo)) {
        $alerta = "<div class ='alerta-error'>" . $errores[$campo] . '</div>';
    }
    return $alerta;
}

function borrarErrores()
{
    $borrado = false;
    if (isset($_SESSION['errores'])) {
        $_SESSION['errores'] = null;
        $borrado = true;
    }

    if (isset($_SESSION['error_login'])) {
        $_SESSION['error_login'] = null;
        $borrado = true;
    }

    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
        $borrado = true;
    }

    return $borrado;
}

function conseguirEventos($conexion) {
    // Ejecutar la consulta SQL
    // $sql = "SELECT id, titulo, descripcion, CONCAT(fecha, ' ', hora) AS datetime, ubicacion, organizador_id FROM eventos";
    $sql = "SELECT * FROM eventos";
    $eventos = mysqli_query($conexion, $sql);

    
    // Verificar si la consulta se ejecutó correctamente
    if (!$eventos) {
        // Manejar el error si la consulta falla
        echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
        return false;
    }

    // Verificar si se encontraron resultados
    if (mysqli_num_rows($eventos) == 0) {
        // Manejar el caso de que no haya eventos
        echo "No se encontraron eventos.";
        return false;
    }

    // Devolver el resultado de la consulta
    return $eventos;
}
