<article>
    <h2>Crear Evento</h2>

    <?php if (isset($_SESSION['completado'])) : ?>
        <div class="alerta alerta-exito">
            <?= $_SESSION['completado'] ?>
        </div>
    <?php elseif (isset($_SESSION['errores']['general'])) : ?>
        <div class="alerta alerta-error">
            <?= $_SESSION['errores']['general'] ?>
        </div>
    <?php endif; ?>

    <form class="register" method="POST" action="controllers/crearEventoController.php">
        <label for="titulo">Nombre del Evento</label>
        <input type="text" name="titulo" id="titulo">

        <label for="descripcion">Descripcion</label>
        <input type="text" name="descripcion" id="descripcion">

        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha">

        <label for="hora">Hora</label>
        <input type="time" name="hora" id="hora">

        <label for="ubicacion">Ubicación</label>
        <input type="text" name="ubicacion" id="ubicacion">

        <button type="submit">Crear Evento</button>

    </form>
   
</article>