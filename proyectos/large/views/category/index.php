<h2 class="title-category">Gestionar Categorías</h2>

<br>

<h2 class="subtitle-category">Crear Nueva Categoría </h2>

<form action="<?= base_url ?>category/save" method="POST">
    <fieldset role="group">
        <input type="text" name="name" placeholder="Nombre de la categoría" required />
        <input type="submit" value="Crear" />
    </fieldset>
</form>

<!-- ALERTA DE CREACIÓN DE UNA NUEVA CATEGORÍA -->


<table class="striped">
    <thead data-theme="dark">
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </thead>
    <?php while ($cat = $categories->fetch_object()) : ?>
        <tr>
            <td>
                <?= $cat->id; ?>
            </td>
            <td>
                <?= $cat->name; ?>
            </td>
            <td>
                <a href="<?= base_url ?>category/edit&id=<?= $cat->id; ?>" data-tooltip="Editar">
                    <i class="fa-regular fa-pen-to-square"></i>
                </a>/

                <a href="<?= base_url ?>category/delete&id=<?= $cat->id; ?>" data-tooltip="Eliminar">
                    <i class="fa-regular fa-trash-can"></i>
                </a>

            </td>

        </tr>
    <?php endwhile; ?>
</table>

<!-- <button class="outline">Crear nueva categoría</button> -->