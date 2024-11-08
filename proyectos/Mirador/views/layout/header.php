<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mirador</title>

    <!-- Icono de la página: -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🏢</text></svg>">

    <!-- Pico CSS: -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.pink.css">

    <!-- Estilos de CSS: -->
    <link rel="stylesheet" href="<?= base_url ?>assets/css/style.css">

    <!-- Font Awesome, par la carge de iconos personalizados: -->
    <script src="https://kit.fontawesome.com/335ff06f37.js" crossorigin="anonymous"></script>

</head>

<body>
    <main class="container">
        <nav class="nav">
            <ul class="nav__first_ul">
                <li class="nav__title"><strong>Mirador de los Andes</strong>
                    <?php if (isset($trabajador)) : ?>
                        <?= $trabajador->nombre ?>
                    <?php endif; ?>
                </li>
            </ul>
            <ul class="nav__second_ul">
                <?php if (!isset($_SESSION['identity'])) : ?>
                    <li><a href="<?= base_url ?>auth/showLoginForm" class="secondary">Iniciar Sesión</a></li>
                <?php else : ?>
                    <li class="nav__login">
                        <details class="dropdown">
                            <summary>
                                Servicios
                            </summary>
                            <ul dir="rtl">
                                <li><a href="<?= base_url?>log/logbook">Bitáctora</a></li>
                                <li><a href="#">Estacionamiento de visitas</a></li>
                                <li><a href="#">Visitas</a></li>
                                <li><a href="#">Recidencias</a></li>
                                <li><a href="#">Gimnacio</a></li>
                                <li><a href="#">Quejas y Sujerencias</a></li>
                                <li><a href="#">Eventos</a></li>
                                <li><a href="#">Encargos</a></li>
                                <li><a href="#">Bedegas y Estacionamientos</a></li>
                                <li><a href="#">Personal</a></li>
                                <li><a href="<?= base_url?>management/showShift">Turnos</a></li>
                                <li><a href="#">Perfil</a></li>
                                <li><a href="<?= base_url ?>auth/logout">Cerrar Sesión</a></li>
                            </ul>
                        </details>
                    </li>
                <?php endif; ?>
            </ul>
            <!--  <ul>
                <li>
                    <details class="dropdown">
                        <summary>
                            Account
                        </summary>
                        <ul dir="rtl">
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="#">Security</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </details>
                </li>
            </ul> -->
        </nav>

        <section class="mainContent">