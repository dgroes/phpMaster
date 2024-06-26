<h1>Bienvenido a mi WEB con MVC</h1>
<?php

require_once 'autoload.php';

if (isset($_GET['controller'])) {
    $nombreControlador = $_GET['controller'] . 'Controller';
} else {
    echo "La página que buscas no existe";
    exit();
}


if (isset($nombreControlador) && class_exists($nombreControlador)) {

    $controlador = new $nombreControlador();

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];

        $controlador->$action();
    } else {
        "La pagina no existe";
    }
} else {
    echo "La página no existe";
}
