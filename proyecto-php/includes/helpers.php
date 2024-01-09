<?php
function mostrarError($errores, $campo)
{
    //en un ejemplo del campo nombre en el registro se explicaría así:
    //'nombre' es el valor que se pasa como segundo argumento ($campo) a la función. Dentro de la función, se utiliza $campo para verificar si hay un mensaje de error asociado con ese campo en particular. ese argumento está en un inicio en index.php en lateral
    $alerta = '';
    if (isset($errores[$campo]) && !empty($campo)) {
        $alerta = "<div class='alerta alerta-error'>" . $errores[$campo] . "</div>";
    } else {
    }
    return $alerta;
}

function borrarErrores()
{
    $_SESSION['errores'] = null;
    session_unset();

    return true;  // o podrías devolver directamente session_unset()
}
