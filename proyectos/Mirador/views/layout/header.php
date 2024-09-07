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
        <nav>
            <ul>
                <li class="title_header"><strong>Mirador de los Andes</strong></li>
            </ul>
            <ul>
                <li><a href="<?= base_url ?>Usuario/log" class="secondary">Iniciar Sesión</a></li>
                <!--  <li>
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
                </li> -->
            </ul>
        </nav>

        <section class="main_content">