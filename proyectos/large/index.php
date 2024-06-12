<?php
session_start();
/*  
    Este fichero actúa como putnode entrada principal de la app. Tiene como proposito gestionar las 
    solicitudes HTTP y redirigirlas al contorlador y acción acorrespondientes.
*/
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';




function show_error()
{
    $error = new ErrorController();
    $error->index();
}

//Concatenación de contralor (nombreDeControlaro + Controller)
if (isset($_GET['controller'])) {
    $name_controller = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $name_controller = controller_default;
} else {
    show_error();
    exit();
}

//Verificar la clase del controlador existetente y crear una instancia si existe
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

require_once 'views/layout/sidebar.php';

require_once 'views/layout/footer.php';



/* 
    FLUJO DE TRABABAJO COMPLETO ENTRE INDEX Y AUTOLOAD 
    - Cuando se accede a index.php, se incluye autoload.php.
    - autoload.php registra la función controllers_autoload para cargar clases automáticamente.
    - index.php verifica los parámetros controller y action en la URL.
    - Si el controlador existe, se crea una instancia del controlador.
    - Si la acción (método) existe en el controlador, se llama a dicha acción.
    - Si cualquiera de estos pasos falla, se muestra un mensaje de error indicando que la página no existe.

    Ejemplo:
    Si accedes a index.php?controller=user&action=login:
    $_GET['controller'] es user.
    $_GET['action'] es login.
    Se buscará la clase userController en el archivo controllers/userController.php.
    Si la clase userController existe y tiene un método login, se llamará a ese método.

*/