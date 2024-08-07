<article class="register">

    <header>

        <h3 class="register_title">Iniciar sesión</h3>
    </header>

    <!-- MOSTRAR MENSAJES DE ERROR -->
    <?php if (isset($_SESSION['error_login'])) : ?>
        <div class="alert alert-error">
            <i class="fa-solid fa-ban"></i><?= $_SESSION['error_login'] ?> 
        </div>
        <?php unset($_SESSION['error_login']); ?> <!-- //Eliminar mensaje de sesión_error -->
        <?php endif; ?>

    <p class="register_parrafo">
        Al continuar, aceptas nuestro <a href="">Acuerdo del usuario</a> y confirmas que has entendido la <a href="">Política de privacidad</a>.
    </p>

    <form class="form_register" action="<?= base_url ?>user/login" method="POST">
        <label for="email">Correo Electrónico</label>
        <input type="email" name="email" required>

        <label for="password">Contraseña</label>
        <input type="password" name="password" required>

        <input type="submit" value="Iniciar Sesión">
    </form>

    <br>
    <p class="register_parrafo">¿Aún no eres miembro?
        <a href="<?= base_url ?>user/register">Registrate</a>

    </p>

</article>