<h2 class="title-category">Gestionar Categorías </h2>

<!-- <i class="fa-solid fa-square-plus"></i> -->
<a href="#" class="crear-categoria">Crear Categoría</a>

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
                <a href=""><i class="fa-regular fa-pen-to-square"></i></a> /
                <a href=""><i class="fa-regular fa-trash-can"></i></a>
            </td>

        </tr>
    <?php endwhile; ?>
</table>

<!-- <button class="outline">Crear nueva categoría</button> -->