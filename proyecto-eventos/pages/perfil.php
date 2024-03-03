<?php require_once 'templates/header.php'; ?>
<article>
    <h1>Mis Datos</h1>
    <?php if (isset($_SESSION['completado'])) : ?>
        <div class="alerta alerta-exito">
            <?= $_SESSION['completado'] ?>
        </div>
    <?php elseif (isset($_SESSION['errores']['general'])) : ?>
        <div class="alerta alerta-error">
            <?= $_SESSION['errores']['general'] ?>
        </div>
    <?php endif; ?>

    <form class="register" action="controllers/actualizarUsuarioController.php" method="POST">
        <label for="nombre">Nombre de Usuario:</label>
        <input type="text" name="nombre" id="nombre" value="<?= $_SESSION['usuario']['nombre']; ?>">

        <label for="emil">Email</label>
        <input type="email" name="email" id="email" value="<?= $_SESSION['usuario']['email']; ?>">

        <input type="submit" name="submit" value="Editar">
    </form>
    
</article>

<?php require_once 'templates/footer.php'; ?>