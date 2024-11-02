<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sloth</title>

    <!-- Icono de la página -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🦥</text></svg>">

    <!-- CDN de Pico CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">

    <!-- CSS Link -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <main class="container-fluid">
        <nav>
            <ul>
                <li><strong>Sloth🦥</strong></li>
            </ul>
            <ul>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Products</a></li>
            </ul>
        </nav>
    </main>
    <section class="login">
        <form class="login__form">
            <label> First name
                <input name="first_name" placeholder="First name" autocomplete="given-name" />
            </label>

            <label for="email">Email
                <input type="email" id="email" placeholder="Email" autocomplete="email" />
            </label>

        </form>
    </section>
</body>

</html>