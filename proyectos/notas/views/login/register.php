<section class="register">
    <?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?>
        <div class="alert alert-success">
            <i class="fa-regular fa-square-check"></i> Registro completado correctamente
        </div>
    <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
        <div class="alert alert-error">
            <i class="fa-solid fa-ban"></i> El registro no se pudo completar, completa los campos de manera correcta
        </div>
    <?php endif; ?>
    <?php Utils::deleteSession('register'); ?>


    <form action="<?= base_url ?>user/save" class="register__form" method="POST">
        <fieldset class="form__fielset">
            <legend class="form__legend">Registro de Usuario</legend>
            <label for="username" class="form__label">Nombre de Usuario</label>
            <input type="text" name="username" class="form__input" required>

            <label for="email" class="form__label">Correo Electronico</label>
            <input type="email" name="email" class="form__input" required>

            <label for="password" class="form__label">Contraseña</label>
            <input type="password" name="password" class="form__input" required>

            <input type="submit" value="Registrarse" class="form__submit">
        </fieldset>
    </form>

    <div class="register__login">
        <p>
            ¿Ya tienes una cuenta? Inicia sesión desde aquí! => <a href="<?= base_url ?>user/loginForm">Iniciar sesión</a>
        </p>
    </div>


</section>