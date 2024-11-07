<article class="login">

    <!-- __ Mensajes de alerte de error al inciar sesión __ -->
    <?php if (isset($_SESSION['error_login'])) : ?>
        <div class="alert aler-error">
            <?= $_SESSION['error_login'] ?>
        </div>
        <?php unset($_SESSION['error_login']); ?>
    <?php endif; ?>
    <!-- <?php echo $_SESSION['identity']; ?> -->


    <form action="<?= base_url ?>auth/authenticate" method="POST" class="login__form">
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
    <!-- <a href="<?= base_url ?>auth/showRegisterForm">registrate</a> -->

</article>