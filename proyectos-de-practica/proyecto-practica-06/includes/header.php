<?php require_once 'config/conection.php'; ?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <title>Cirice</title>
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
    <header>
        <h1>Cirice</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="register.php">Registrarse</a>
            <a href="login.php">Inicar Sesión</a>
            <?php if (isset($_SESSION['usuario'])) : ?>
                <?= $_SESSION['usuario']['nombre']; ?>
            <?php endif; ?>

            <form>
                <input type="search" name="q" placeholder="Search query" />
                <input type="submit" value="Go!" />
            </form>
        </nav>
    </header>

    <section class="container">