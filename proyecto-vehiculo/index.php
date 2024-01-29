<?php require_once 'includes/header.php'; ?>
        
<?php
// Obtener la página solicitada
$page = isset($_GET['page']) ? $_GET['page'] : 'agegar';

// Validar y cargar la página correspondiente
$allowedPages = ['crear-registro', 'listar'];
if (in_array($page, $allowedPages)) {
    include("pages/{$page}.php");
} else {
    include("pages/crear-registro.php");
}

/* $allowedPages = ['home', 'adminClientes', 'listadoClientes', 'adminContratos', 'listadoContratos', 'usuario'];: Aquí se crea un array llamado $allowedPages que contiene los nombres de las páginas que están permitidas. Este array se utiliza para validar si la página solicitada es válida.*/

/* if (in_array($page, $allowedPages)) {: Esta es una estructura condicional (if). Verifica si el valor de $page se encuentra en el array $allowedPages. Si es cierto, significa que la página solicitada es válida y se ejecuta el bloque de código dentro de las llaves {}.*/
?>
<?php require_once 'includes/footer.php'; ?>