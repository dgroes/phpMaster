<?php
ob_start();
session_start();

require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'views/layout/header.php';

function show_error()
{
    $error = new ErrorController();
    $error->index();
}

//Concatenación de controldor (Nombre del Controlador + Controller)
if (isset($_GET['controller'])) {
    $name_controller = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $name_controller = controller_default;
} else {
    show_error();
    exit();
}


//Verificar la clase del controlador existente y crear una instancia si existe
if (class_exists($name_controller)) {
    $controller = new $name_controller();

    //Verifica si existe el parámetro 'action' en URL y el método correspondiente en el controlador
    if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
        $action = $_GET['action']; //El $action será el nombre del metodo de las clases, por ejemplo si la clase tiene le metodo getAll, dentro de $action estará guardado 'getAll'
        $controller->$action(); //$name_controller es una variable que contiene el nombre del controlador, concatenando el nombre del controlador pasado por la URL con la palabra Controller. Por ejemplo, si $_GET['controller'] es user, entonces $name_controller será UserController.
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action_default = action_default;
        $controller->$action_default();
    } else {
        show_error();
    }
} else {
    show_error();
}

require_once 'views/layout/footer.php';

ob_end_flush();
