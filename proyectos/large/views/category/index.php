<h2 class="title-category">Gestionar Categorías</h2>

<h2 class="subtitle-category">Crear Nueva Categoría </h2>

<form action="<?= base_url ?>category/save" method="POST">
    <fieldset role="group">
        <input type="text" name="name" placeholder="Nombre de la categoría" />
        <input type="submit" value="Crear" />
    </fieldset>
</form>

<!-- ALERTA DE CREACIÓN DE UNA NUEVA CATEGORÍA -->
<?php if (isset($_SESSION['register-category'])) : ?>
    <?php if ($_SESSION['register-category'] == 'complete') : ?>
        <div class="alert alert-success">
            <i class="fa-regular fa-square-check"></i> Categoría creada correctamente.
        </div>
    <?php elseif ($_SESSION['register-category'] == 'duplicate') : ?>
        <div class="alert alert-warning">
            <i class="fa-solid fa-triangle-exclamation"></i> El nombre de la categoría que desea guardar ya está en uso.
        </div>
    <?php elseif ($_SESSION['register-category'] == 'failed_save') : ?>
        <div class="alert alert-danger">
            <i class="fa-solid fa-xmark"></i> Error al guardar la categoría. Por favor, intenta nuevamente.
        </div>
    <?php elseif ($_SESSION['register-category'] == 'empty_name') : ?>
        <div class="alert alert-warning">
            <i class="fa-solid fa-triangle-exclamation"></i> El nombre de la categoría no puede estar vacío.
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['register-category']); ?>
<?php endif; ?>


<!-- ALERTA DE ELMINACIÓN DE UN REGISTRO -->
<?php if (isset($_SESSION['delete-category'])) : ?>
    <?php if ($_SESSION['delete-category'] == 'complete') : ?>
        <div class="alert alert-success">
            <i class="fa-regular fa-square-check"></i> Categoría eliminada correctamente.
        </div>
    <?php elseif ($_SESSION['delete-category'] == 'failed_delete') : ?>
        <div class="alert alert-danger">
            <i class="fa-solid fa-xmark"></i> Error al eliminar la categoría. Por favor, intenta nuevamente.
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['delete-category']); ?>
<?php endif; ?>

<!-- ALERTA DE EDICIÓN DE UN REGISTRO -->
<?php if (isset($_SESSION['update-category'])) : ?>
    <?php if ($_SESSION['update-category'] == 'complete') : ?>
        <div class="alert alert-success">
            <i class="fa-regular fa-square-check"></i> Categoría editada correctamente.
        </div>
    <?php elseif ($_SESSION['update-category'] == 'failed') : ?>
        <div class="alert alert-danger">
            <i class="fa-solid fa-xmark"></i> Error al editar la categoría. Por favor, intenta nuevamente.
        </div>
    <?php elseif ($_SESSION['update-category'] == 'duplicate') : ?>
        <div class="alert alert-warning">
            <i class="fa-solid fa-triangle-exclamation"></i> El nombre de la categoría que desea guardar ya está en uso.
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['update-category']); ?>
<?php endif; ?>


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