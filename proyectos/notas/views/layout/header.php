<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url ?>assets/css/style.css">
</head>

<body>
    <main class="container-fluid">
        <!-- NAV DE LA PÁGINA -->
        <nav class="nav">
            <ul class="nav__items">
                <li class="nav__item nav__item--title"><a href="" class="nav__link">
                        <h1 class="nav__title">Notes</h1>
                    </a></li>
            </ul>
            <ul class="nav__items nav__items--right">
                <li class="nav__item"><a href="#" class="nav__link">Services</a></li>
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
            </ul>
            <?php if (isset($_SESSION['identity'])) : ?>
                <p class="username"><?= $_SESSION['identity']->username ?></p>
            <?php else : ?>
                <p class="username">Usuario desconocido</p>
            <?php endif; ?>

        </nav>