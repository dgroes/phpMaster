<article class="login">
    <form action="<?= base_url ?>usuario/login" method="POST">
        <fieldset>
            <label class="login__label">
                Correo
                <input type="email" name="email" placeholder="Ejemplo: mirador@gmail.com" required />
            </label>
            <label class="login__label">
                Contraseña
                <input type="password" name="password" id="" placeholder="Ejemplo: papimiperro" required>
            </label>
        </fieldset>

        <input class="login__submit" type="submit" value="Iniciar Sesión" />
    </form>
</article>