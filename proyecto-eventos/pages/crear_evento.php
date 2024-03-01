<article>
    <h2>Crear Evento</h2>
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
