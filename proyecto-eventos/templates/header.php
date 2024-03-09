<?php require_once  'includes/conexion.php'; ?>
<?php require_once  'includes/funciones.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <title>Eventos X</title>
    <link rel="stylesheet" href="css/style.css">

    <!-- _FUENTES_ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">


</head>

<body>
    <header class="cabecera">
        <h1>Eventos X</h1>
        <nav>
            <a href="index.php">Home</a>
            <?php if(!isset($_SESSION['usuario'])):?>
            <a href="?page=registro">Registrarse</a>
            <a href="?page=login">Inicar Sesión</a>
            <?php endif; ?>
            
            
            <?php if (isset($_SESSION['usuario'])) : ?>
                <a href="?page=calendario">Calendario</a>
                <a href="?page=crear_evento">Crear Evento</a>
                <a href="?page=notificaciones">Invitaciones</a>
                <a href="?page=perfil">Perfil</a>
                <a href="?page=logout" class="">Cerrar Sesión</a>
                <p>hola<?= $_SESSION['usuario']['nombre']; ?></p>

            <?php endif; ?>

        </nav>



    </header>
    <section class="container">
      