<h1>Editar Categoría</h1>

<form action="<?= base_url ?>categoria/update" method="post">
    <input type="hidden" name="id" value="<?= $cat->id; ?>">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?= $cat->nombre; ?>" required>

    <input type="submit" value="Guardar">
</form>