<?php
if (isset($_POST)) {
    require_once '../includes/conexion.php';

    //Recoger los valores del formulario de creación de eventos:
    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    $fecha = isset($_POST['fecha']) ? mysqli_real_escape_string($db, $_POST['fecha']) : false;
    $hora = isset($_POST['hora']) ? mysqli_real_escape_string($db, $_POST['hora']) : false;
    $ubicacion = isset($_POST['ubicacion']) ? mysqli_real_escape_string($db, $_POST['ubicacion']) : false;
    $organizador = $_SESSION['usuario']['id'];

    //Array de errores:
    $errores = array();

    //Validación del Titulo:
    if (!empty($titulo)) {
        $titulo_validado = true;
    } else {
        $titulo_validado = false;
        $errores['titulo'] = "El nombre de titulo está vacío";
    }

    //Validación de la Descripción
    if (!empty($descripcion)) {
        $descripcion_valido = true;
    } else {
        $descripcion_valido = false;
        $errores['descripcion'] = "La descripción del evento está vacía";
    }

    //Validación de Fecha:
    if (!empty($fecha)) {

        //Obtener la Fecha Actual
        $fecha_actual = date('Y-m-d');

        //Calcular la fecha mínima permitida para el evento (2 días después de la fecha actual):
        $fecha_minima = date('Y-m-d', strtotime('+2 days', strtotime($fecha_actual)));

        //Verificar si la fecha del evento es posterior a la fecha mínima permitida:
        if ($fecha >= $fecha_minima) {
            $fecha_valido = true;
        } else {
            $fecha_valido = false;
            $errores['fecha'] = "La fecha del evento debe ser como mínimo 2 días después de la fecha actual";
        }
    } else {
        $fecha_valido = false;
        $errores['fecha'] = "La fecha del evento no es valida";
    }

    //Validación de Hora:
    if (!empty($hora)) {
        $hora_valido = true;
    } else {
        $hora_valido = false;
        $errores['hora'] = "La hora del evento está vacía";
    }

    //Validación de Ubicación:
    if (!empty($ubicacion)) {
        $ubicacion_valido = true;
    } else {
        $ubicacion_valido = false;
        $errores['ubicacion'] = "La ubicación del evento está vacía";
    }

    //Insertar en la BD:
    if (count($errores) == 0 && $organizador == $_SESSION['usuario']['id']) {
        $sql = "INSERT INTO eventos VALUES(null, '$titulo', '$descripcion', '$fecha', '$hora', '$ubicacion', '$organizador');";
        $guardar = mysqli_query($db, $sql);

        if ($guardar) {
            $_SESSION['completado'] = "El registro se ha completado con éxito";
            // Redirigir solo después de procesar el formulario
            header('Location: ../?page=crear_evento');
            exit; // Salir del script después de la redirección
        } else {
            $_SESSION['errores']['evento'] = "Fallo al guardar el evento";
            header('Location:  ../?page=crear_evento');
            exit();
        }
    } else {
        $_SESSION['errores'] = $errores;
        header('Location:  ../?page=crear_evento');
        exit();
    }
}

// Redirigir a crear_evento.php si no se enviaron datos por POST
// Redirigir solo si la página actual no es crear_evento.php para evitar bucles de redirección
if ($_GET['page'] != 'crear_evento') {
    header('Location: ?page=crear_evento');
    exit; // Salir del script después de la redirección
}
