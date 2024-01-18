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
    $borrado = false;

    if (isset($_SESSION['errores'])) {
        $_SESSION['errores'] = null;
        $borrado = true;
    }

    if (isset($_SESSION['errores_entrada'])) {
        $_SESSION['errores_entrada'] = null;
        $borrado = true;
    }

    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
        $borrado = true;
    }

    return $borrado;
}


function conseguirCategorias($conexion)
{
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $categorias = mysqli_query($conexion, $sql);

    $resultado = array();
    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $resultado = $categorias;
    }

    return $resultado;
}

function conseguirUltimasEntradas($conexion)
{
    $sql = "SELECT e.*, c.* FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id 
    ORDER BY e.id DESC LIMIT 4;";

    $entradas = mysqli_query($conexion, $sql);
    $resultado = array();
    if ($entradas && mysqli_num_rows($entradas) >= 1) {
        $resultado = $entradas;
    }
    return $entradas;
}
