<?php require_once 'config/conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Blog</title>
    <link rel="icon" href="images/logo/logo.gif" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header id="titulo">
        <a href="index.php" class="logo">
            <img src="images/logo/logo.gif" alt="logo">
            <h2 class="name-page">Switzer</h2>
        </a>
        <nav>
            <a href="index.php" class="nav-link">Inicio</a>
            <a href="" class="nav-link">Categoría</a>
            <?php if (isset($_SESSION['usuario'])) : ?>
                <a href="post.php" class="nav-link">Crear Post</a>
                <a href="configuracion.php" class="nav-link">Configuración</a>
                <a href="logout.php" class="nav-link">Cerrar Sesión</a>
                <!-- <?php if (isset($_SESSION['usuario']['nombre'])) : ?>
                    <div class="usuario-info">
                        <span class="nav-link"><?= $_SESSION['usuario']['nombre']; ?></span>
                        <img src="<?= $_SESSION['usuario']['foto']; ?>" alt="Foto de perfil" class="perfil-img">
                    </div>
                <?php endif; ?> -->
            <?php else : ?>
                <a href="login.php" class="nav-link">Iniciar Sesión</a>
            <?php endif; ?>
        </nav>
    </header>
    <section class="container">