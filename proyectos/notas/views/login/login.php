<section class="login">


    <form action="<?= base_url ?>user/log" class="register__form" method="POST">
        <fieldset class="form__fielset">
            <legend class="form__legend">Inicio de sesión</legend>

            <?php if (isset($_SESSION['error_login'])) : ?>
                <div class="alert alert-error">
                    <i class="fa-solid fa-ban"></i><?= $_SESSION['error_login'] ?>
                </div>
                <?php unset($_SESSION['error_login']); ?> <!-- //Eliminar mensaje de sesión_error -->
            <?php endif; ?>


            <label for="email" class="form__label">Correo Electrónico</label>
            <input type="text" name="email" class="form__input" required>

            <label for="password" class="form__label">Contraseña</label>
            <input type="password" name="password" class="form__input" required>

            <input type="submit" value="Iniciar Sesión" class="form__submit">
        </fieldset>
    </form>

    <div class="register__login">
        <p>
            ¿Aun no tienes una cuenta? Registrate desde aquí! => <a href="<?= base_url ?>user/register">Registrarse</a>
        </p>
    </div>

</section>