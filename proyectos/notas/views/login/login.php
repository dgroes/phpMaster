<section class="login">

<form action="<?= base_url ?>user/verifyLogin" class="register__form" method="POST">
        <fieldset class="form__fielset">
            <legend class="form__legend">Inicio de sesión</legend>
            <label for="username" class="form__label">Nombre de Usuario</label>
            <input type="text" name="username" class="form__input" required>

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