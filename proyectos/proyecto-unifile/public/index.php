<?php require_once '../templates/header.php'; ?>

<?php
//Obtener la página solicitada
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

//Validar y cargar la página correspondiente
$allowedPages = ['home', 'login', 'logout', 'perfil', 'registro'];
if (in_array($page, $allowedPages)) {
    include("../pages/{$page}.php"); //"pages" es el directorio en donde estarán las páginas
} else {
    include("../pages/home.php"); //Si no se encuentra la página solicitada mandará a "home"
}
?>
<?php require_once '../templates/footer.php'; ?>