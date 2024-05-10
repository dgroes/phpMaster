<?php require_once 'controllers/redireccion.php'; ?>
<article>
    <form class="register-evento" method="POST" action="controllers/crearEventoController.php">


        <h2>Crear Evento</h2>

        <div class="input-group">
            <label for="titulo">Nombre del Evento</label>
            <input type="text" name="titulo" id="titulo">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'titulo') : ''; ?>
        </div>

        <div class="input-group">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'descripcion') : ''; ?>
        </div>

        <div class="input-group">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'fecha') : ''; ?>
        </div>

        <div class="input-group">
            <label for="hora">Hora</label>
            <input type="time" name="hora" id="hora">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'hora') : ''; ?>
        </div>

        <div class="input-group">
            <label for="ubicacion">Ubicación</label>
            <input type="text" name="ubicacion" id="ubicacion">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'ubicacion') : ''; ?>
        </div>

        <?php if (isset($_SESSION['completado'])) : ?>
            <div class="alerta-exito">
                <?= $_SESSION['completado'] ?>
            </div>
        <?php elseif (isset($_SESSION['errores']['general'])) : ?>
            <div class="alerta-error">
                <?= $_SESSION['errores']['evento'] ?>
            </div>
        <?php endif; ?>

        <button type="submit">Crear Evento</button>

        <?php borrarErrores(); ?>

    </form>

</article>