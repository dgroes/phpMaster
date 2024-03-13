<?php require_once 'templates/header.php'; ?>
<article>



    <form class="register" action="controllers/actualizarUsuarioController.php" method="POST">
        <h2>Mis Datos</h2>
        <div class="input-group">
            <label for="nombre">Nombre de Usuario:</label>
            <input type="text" name="nombre" id="nombre" value="<?= $_SESSION['usuario']['nombre']; ?>">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'editar_nombre') : ''; ?>
        </div>

        <div class="input-group">

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= $_SESSION['usuario']['email']; ?>">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'editar_email') : ''; ?>

        </div>

        <?php if (isset($_SESSION['completado'])) : ?>
            <div class="alerta alerta-exito">
                <?= $_SESSION['completado'] ?>
            </div>
        <?php elseif (isset($_SESSION['errores']['general'])) : ?>
            <div class="alerta alerta-error">
                <?= $_SESSION['errores']['general'] ?>
            </div>
        <?php endif; ?>

        <button type="submit">Editar</button>
        <?php borrarErrores(); ?>

    </form>

</article>

<?php require_once 'templates/footer.php'; ?>