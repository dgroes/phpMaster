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
                                <li><a href="<?= base_url ?>user/perfil&creator=<?= $_SESSION['identity']->username; ?>">Profile</a></li>
                                <?php if (isset($_SESSION['admin'])) : ?>
                                    <li><a href="<?= base_url ?>category/index" class="admin-management">Categorías</a></li>
                                    <li><a href="#" class="admin-management">Usuarios</a></li>
                                    <li><a href="<?= base_url ?>post/general_management" class="admin-management">Gestión Posts</a></li>
                                <?php endif; ?>

                                <?php if (isset($_SESSION['identity'])) : ?>
                                    <li>
                                        <a href="<?= base_url ?>post/management" class="admin-management">Mis Posts</a>
                                    </li>
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
                    <form role="search" class="principal_search" action="<?= base_url ?>post/search" method="POST">
                        <input type="search" name="search" placeholder="Search" aria-label="Search" />
                    </form>
                </li>
            </ul>
        </nav>

        <?php $categories = Utils::showCategories(); ?>
        <article class="category overflow-auto">

            <ul class="category-list ">
                <?php while ($cat = $categories->fetch_object()) : ?> <!-- El urlencode es importante para las categorías que tienen espacios entremedio de su nombre -->
                    <li class="lista"><a href="<?= base_url ?>post/seeByCategories&category=<?= urlencode($cat->name) ?>"> <?= $cat->name ?> </a></li>
                <?php endwhile; ?>
            </ul>

        </article>