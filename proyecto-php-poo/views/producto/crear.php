<h1>Crear Nuevos Productos</h1>
<div class="form_container">
    <form action="<?= base_url ?>producto/save" method="post">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">

        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" id=""></textarea>

        <label for="precio">Precio</label>
        <input type="text" name="precio">

        <label for="stock">Stock</label>
        <input type="number" name="stock">

        <label for="categoria">Categoria</label>
        <?php $categorias = Utils::showCategorias(); ?>
        <select name="categoria" id="">
            <?php while ($cat = $categorias->fetch_object()) : ?>
                <option value="<?= $cat->id ?>">
                    <?= $cat->nombre ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="imagen">Imagen</label>
        <input type="file" name="imagen">

       <input type="submit" value="Guardar">

    </form>
</div>