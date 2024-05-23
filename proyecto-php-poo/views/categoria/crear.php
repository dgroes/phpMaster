<h1>Crear Nueva Categoría</h1>

<form action="<?= base_url ?>categoria/save" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="" required>

    <input type="submit" value="Guardar">
</form>