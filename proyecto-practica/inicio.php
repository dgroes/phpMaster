<!-- Include del Header -->
<?php require_once 'includes/header.php'; ?>

<section class="container-inicio">

    <form action="registro.php" method="POST" class="form">
        <h3>Registro</h3>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" name="submit" value="Registrar" id="submit">
    </form>


    <form action="login.php" method="POST" class="form">
        <h3 id="inicio_sesion">Iniciar Sesión</h3>
        <label for="email-login">Email:</label>
        <input type="email" id="email-login" name="email-login" required>

        <label for="password-login">Contraseña:</label>
        <input type="password" id="password-login" name="password-login" required>

        <input type="submit" name="submit" value="Iniciar" id="submit">

    </form>

</section>



<!-- Include del Footer -->
<?php require_once 'includes/footer.php'; ?>