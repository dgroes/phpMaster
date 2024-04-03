<?php require_once 'controllers/redireccion.php'; ?>
<article>
    <form class="register-invitaciones" method="POST" action="controllers/crearEventoController.php">


        <h2>Invitar Usuarios</h2>
        <div class="input-group">
            <div class="select-wrapper">
                <label for="evento">Evento</label>
                <select name="evento" id="evento">
                    <option value="" disabled selected>Seleccionar evento</option>
                    <option value="evento1">Evento 1</option>
                    <option value="evento2">Evento 2</option>
                    <!-- Aquí debes agregar más opciones según los eventos disponibles -->
                </select>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'evento') : ''; ?>
            </div>
            <div class="select-wrapper">
                <label for="usuario">Usuario</label>
                <select name="usuario" id="usuario">
                    <option value="" disabled selected>Seleccionar usuario</option>
                    <option value="usuario1">Usuario 1</option>
                    <option value="usuario2">Usuario 2</option>
                    <!-- Aquí debes agregar más opciones según los usuarios disponibles -->
                </select>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'usuario') : ''; ?>
            </div>
        </div>

        <div class="input-group">
            <label for="titulo">Mensaje de invitación</label>
            <input type="text" name="titulo" id="titulo">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'titulo') : ''; ?>
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

        <button type="submit">Invitar usuarios seleccionados</button>

        <?php borrarErrores(); ?>

    </form>

</article>