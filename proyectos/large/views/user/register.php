<article class="register">

    <header>
        <h3 class="register_title">Regístrate</h3>
    </header>
    <?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?>
        <div class="alert alert-success">
            <i class="fa-regular fa-square-check"></i> Registro completado correctamente
        </div>
    <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
        <div class="alert alert-error">
            <i class="fa-solid fa-ban"></i> El registro no se pudo completar, completa los campos de manera correcta
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) : ?>
        <div class="alert alert-error">
            <ul>
                <?php foreach ($_SESSION['errors'] as $error) : ?>
                    <li><i class="fa-solid fa-xmark"></i> <?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php Utils::deleteSession('errors'); ?>
    <?php endif; ?>

    <?php Utils::deleteSession('register'); ?>

    <p class="register_parrafo">
        Al continuar, aceptas nuestro <a href="">Acuerdo del usuario</a> y confirmas que has entendido la <a href="">Política de privacidad</a>.
    </p>

    <form class="form_register" action="<?= base_url ?>user/save" method="POST">
        <label for="username">Nombre de usuario
            <a href="#" data-tooltip="El nombre de usuario debe tener entre 4 y 20 caracteres">
                <i class="fa-solid fa-circle-info"></i>
            </a>
        </label>
        <input type="text" name="username" maxlength="20" required>

        <label for="password">Contraseña
            <a href="#" data-tooltip="La contraseña debe tener al menos 6 caracteres">
                <i class="fa-solid fa-circle-info"></i>
            </a>
        </label>
        <input type="password" name="password" maxlength="30" required>

        <label for="email">Correo Electrónico</label>
        <input type="email" name="email" maxlength="30" required>

        <input type="submit" value="Crear usuario">
    </form>
    <p class="register_parrafo">
        ¿Ya eres miembro? <a href="<?= base_url ?>user/log">Iniciar sesión</a>
    </p>
</article>