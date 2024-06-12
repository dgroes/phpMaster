<!DOCTYPE html>
<html lang="es" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Large</title>
    <script src="https://kit.fontawesome.com/335ff06f37.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
    <link rel="stylesheet" href="<?= base_url ?>assets/css/style.css">
</head>

<body>
    <main class="container-fluid">
        <nav class="nav">
            <ul>
                <?php if (!isset($_SESSION['identity'])) : ?>
                    <li>
                        <a href="<?= base_url ?>user/log" class="">Login</a>
                    </li>
                <?php else : ?>
                    <li>
                        <details class="dropdown">
                            <summary>
                                Account
                            </summary>
                            <ul dir="rtl">
                                <li>
                                    <?php if (isset($_SESSION['identity']->username)) : ?>
                                        <p class="username"><?= $_SESSION['identity']->username ?></p>
                                    <?php else : ?>
                                        <p class="username">Usuario desconocido</p>
                                        <?= var_dump($_SESSION['identity']) ?>
                                    <?php endif; ?>
                                </li>
                                <hr class="line-ul">
                                <li><a href="#">Profile</a></li>
                                <?php if (isset($_SESSION['admin'])) : ?>
                                    <li><a href="#" class="admin-management">Categorías</a></li>
                                    <li><a href="#" class="admin-management">Usuarios</a></li>
                                    <li><a href="#" class="admin-management">Posts</a></li>
                                <?php endif; ?>

                                <?php if (isset($_SESSION['identity'])) : ?>
                                    <li>
                                        <a href="<?= base_url ?>user/logout" class="">Logout</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </details>
                    </li>
                <?php endif; ?>
            </ul>

            <ul>
                <li>
                    <h1 class="title"><a href="<?= base_url ?>" class="title-a">Large</a></h1>
                </li>
            </ul>

            <ul>
                <li>
                    <form role="search" class="principal_search">
                        <input type="search" name="search" placeholder="Search" aria-label="Search" />
                    </form>
                </li>
            </ul>
        </nav>

        <article class="category">
            <ul class="category-list">
                <li class="lista"><a href="">World</a></li>
                <li><a href="">U.S.</a></li>
                <li><a href="">Technology</a></li>
                <li><a href="">Design</a></li>
                <li><a href="">Culture</a></li>
                <li><a href="">Business</a></li>
                <li><a href="">Politics</a></li>
                <li><a href="">Opinion</a></li>
                <li><a href="">Science</a></li>
                <li><a href="">Health</a></li>
                <li><a href="">Style</a></li>
                <li><a href="">Travel</a></li>
            </ul>
        </article>