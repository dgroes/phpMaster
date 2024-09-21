<?php
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php'; //Importante el orden de este requite, si está bajo los require de view no funcionará
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';

function show_eror()
{
    // LLamar al método index del controlador ErrorController
    $error = new ErrorController();
    $error->index();
}

// Comprovar si me llega el controlador por la URL
if (isset($_GET['controller'])) {
    $nameController = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nameController = controller_default;
} else {
    show_eror();
    exit();
}

// Comprovar si existe el controlador y la Clase
if (isset($nameController) && class_exists($nameController)) {
    $controller = new $nameController();

    if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
        $action = $_GET['action'];

        $controller->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action_default = action_default;
        $controller->$action_default();
    } else {
        show_eror();
    }
} else {
    show_eror();
}
// Incluir el SideBar solo si un usuario está logeado
if (isset($_SESSION['identity'])) {
    require_once 'views/layout/sidebar.php';
}
require_once 'views/layout/footer.php';
