<?php require_once 'templates/header.php' ?>

<?php
    // Obtener la página solicitada
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    // Validar y cargar la página correspondiente
    $allowedPages = ['home', 'login', 'logout', 'perfil', 'registro', 'invitar_usuarios', 'crear_evento', 'calendario'];
    if (in_array($page, $allowedPages)) {
        include("pages/{$page}.php");
    } else {
        include("pages/home.php");
    }
    ?>
<?php require_once 'templates/footer.php' ?>