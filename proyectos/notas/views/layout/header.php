<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url ?>assets/css/style.css">
    <script src="https://kit.fontawesome.com/335ff06f37.js" crossorigin="anonymous"></script>
</head>

<body>
    <main class="container-fluid">
        <!-- NAV DE LA PÁGINA -->
        <nav class="nav">
            <ul class="nav__items">
                <li class="nav__item nav__item--title"><a href="<?= base_url ?>note/index" class="nav__link">
                        <h1 class="nav__title">Notes</h1>
                    </a></li>
            </ul>
            <ul class="nav__items nav__items--right">

                <?php if (isset($_SESSION['identity'])) : ?>
                    <li class="username"><?= $_SESSION['identity']->username ?></p>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['identity'])): ?>
                    <li class="nav__item">
                        <details class="dropdown">
                            <summary class="dropdown__toggle">
                                Account
                            </summary>
                            <ul class="dropdown__menu">
                                <li class="dropdown__item"><a href="#">Profile</a></li>
                                <li class="dropdown__item"><a href="#">Settings</a></li>
                                <li class="dropdown__item"><a href="#">Security</a></li>
                                <li class="dropdown__item"><a href="<?= base_url ?>user/logout" class="">Logout</a></li>
                            </ul>
                        </details>
                    </li>
                <?php else : ?>
                    <?php $currentUrl = $_SERVER['REQUEST_URI']; ?>
                    <?php if (strpos($currentUrl, 'user/loginForm') !== false) : ?>
                        <a href="<?= base_url ?>user/register" class="">Registrarse</a></li>
                    <?php elseif (strpos($currentUrl, 'note/index') !== false) : ?>
                        <a href="<?= base_url ?>user/loginForm" class="">Iniciar Sesión</a></li>
                    <?php elseif (strpos($currentUrl, 'user/register') !== false) : ?>
                        <a href="<?= base_url ?>user/loginForm" class="">Iniciar Sesión</a></li>
                    <?php endif; ?>

                <?php endif; ?>
                <!-- <a href="javascript:history.back()">Go Back</a> -->
            </ul>

        </nav>