<?php require_once 'includes/header.php'; ?>

<?php
// Obtener la página solicitada
$page = isset($_GET['page']) ? $_GET['page'] : 'agegar';

// Validar y cargar la página correspondiente
$allowedPages = ['crear-registro', 'listar', 'buscar'];
if (in_array($page, $allowedPages)) {
    include("pages/{$page}.php");
} else {
    include("pages/crear-registro.php");
}

?>
<?php require_once 'includes/footer.php'; ?>
