<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de Videojuegos</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- CABECERA -->
    <header id="cabecera">
        <!-- LOGO -->
        <div id="logo">
            <a href="index.php">
                Blog de VideoJuegos
            </a>
        </div>

        <!-- MENÚ -->
        <nav id="menu">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>
                <li>
                    <a href="index.php">Categoria 1</a>
                </li>
                <li>
                    <a href="index.php">Categoria 2</a>
                </li>
                <li>
                    <a href="index.php">Categoria 3</a>
                </li>
                <li>
                    <a href="index.php">Categoria 4</a>
                </li>
                <li>
                    <a href="index.php">Sobre Mi</a>
                </li>
                <li>
                    <a href="index.php">Contacto</a>
                </li>
            </ul>
        </nav>
    </header>
    <div id="contenedor">
        <!-- BARRAR LATERAL -->
        <aside id="sidebar">
            <div id="login" class="blocke">
                <h3>Identificate</h3>
                <form action="login.php" method="post">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">

                    <label for="password">Contraseña</label>
                    <input type="password" name="password">
                    <input type="submit" value="Entrar">
                </form>
            </div>

            <div id="register" class="blocke">
                <h3>Registrate</h3>
                <form action="registro.php" method="post">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre">

                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos">

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">

                    <label for="password">Contraseña</label>
                    <input type="password" name="password">
                    <input type="submit" value="Registrar">
                </form>
            </div>
        </aside>

        <!-- CAJA PRINCIPAL -->
        <div id="principal">
            <h1>Ultimas Entradas</h1>
            <article class="entrada">
                <h2>Titulo de mi entrada</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, incidunt, sequi inventore impedit ipsum suscipit commodi necessitatibus nam quidem modi nihil corrupti saepe consequatur delectus illum fugiat amet, beatae in.</p>
            </article>

            <article class="entrada">
                <h2>Titulo de mi entrada</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, incidunt, sequi inventore impedit ipsum suscipit commodi necessitatibus nam quidem modi nihil corrupti saepe consequatur delectus illum fugiat amet, beatae in.</p>
            </article>

            <article class="entrada">
                <h2>Titulo de mi entrada</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, incidunt, sequi inventore impedit ipsum suscipit commodi necessitatibus nam quidem modi nihil corrupti saepe consequatur delectus illum fugiat amet, beatae in.</p>
            </article>

            <article class="entrada">
                <h2>Titulo de mi entrada</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, incidunt, sequi inventore impedit ipsum suscipit commodi necessitatibus nam quidem modi nihil corrupti saepe consequatur delectus illum fugiat amet, beatae in.</p>
            </article>

            <article class="entrada">
                <h2>Titulo de mi entrada</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, incidunt, sequi inventore impedit ipsum suscipit commodi necessitatibus nam quidem modi nihil corrupti saepe consequatur delectus illum fugiat amet, beatae in.</p>
            </article>
        </div>
    </div>

    <!-- PIE DE PÁGINA -->
    <footer id="pie">
        <p>Desarrollado por Diego Pastén &copy; 2023</p>
    </footer>

</body>

</html>