<?php require_once 'config/db_conection.php'; ?>
<?php require_once ('actions/helpers.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <title>OneBreak</title>
</head>

<body>
    <header id="header">
        <h1 id="titulo">OneBreak</h1>
        <nav id="menu">
            <ul>
                <li>
                    <a href="?page=adminClientes">Administración de Clientes</a>
                </li>
                <li>
                    <a href="?page=listadoClientes">Listado de Clientes</a>
                </li>
                <li>
                    <a href="?page=adminContratos">Administración de Contratos</a>
                </li>
                <li>
                    <a href="?page=listadoContratos">Listado de Contratos</a>
                </li>
                <li>
                    <a href="?page=usuario">Usuario</a>
                </li>


            </ul>
        </nav>
    </header>

    <section class="container">