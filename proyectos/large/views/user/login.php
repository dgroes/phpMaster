<article class="register">

    <header>

        <h3 class="register_title">Iniciar sesión</h3>
    </header>

    <p class="register_parrafo">
        Al continuar, aceptas nuestro <a href="">Acuerdo del usuario</a> y confirmas que has entendido la <a href="">Política de privacidad</a>.
    </p>

    <form class="form_register" action="<?= base_url ?>user/login" method="POST">
        <label for="email">Correo Electrónico</label>
        <input type="email" name="email" required>

        <label for="password">Contraseña</label>
        <input type="password" name="password" required>

        <input type="submit" value="Crear usuario">
    </form>

    <br>
    <p class="register_parrafo">¿Aún no eres miembro?
        <a href="<?= base_url ?>user/register">Registrate</a>

    </p>

</article>