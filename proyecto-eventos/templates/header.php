<?php require_once 'includes/conexion.php' ?>

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
            <a href="registro.php">Registrarse</a>
            <a href="login.php">Inicar Sesión</a>
            <a href="#">Crear Evento</a>
            <a href="#">Invitaciones</a>
            <a href="#">Calendario</a>
        </nav>
        <?php if (isset($_SESSION['usuario'])) : ?>
            <p>hola<?= $_SESSION['usuario']['nombre'];?></p>
            <a href="../logout.php" class="">Cerrar Sesión</a>

        <?php endif; ?>

    </header>
    <section class="container">
        <?php var_dump($_SESSION) ?>

        