<h1>Gestionar Categorías</h1>

<a href="<?= base_url ?>categoria/crear" class="button button-small">
    Crear Categoria
</a>
<!-- __ALERTA DE REGISTRO DE UNA NUEVA CATEGORIA__ -->
<?php if (isset($_SESSION['register-category']) && $_SESSION['register-category'] == 'complete') : ?>
    <strong class="alert_green">Nueva categoría agregada</strong>
<?php elseif (isset($_SESSION['register-category']) && $_SESSION['register-category'] == 'failed') : ?>
    <strong class="alert_red">No se pudo crear la categoría</strong>
    <!-- __ALERTA DE CATEGORÍA DUPLICADA__ -->
<?php elseif (isset($_SESSION['register-category']) && $_SESSION['register-category'] == 'duplicate') : ?>
    <strong class="alert_red">El nombre de la categoría ya existe</strong>
<?php endif; ?>

<!-- __ ALERTA DE ACTUALIZACIÓN DE UNA CATEGORIA __ -->
<?php if (isset($_SESSION['update-category']) && $_SESSION['update-category'] == 'complete') : ?>
    <strong class="alert_green">Categoría actualizada exitosamente</strong>
<?php elseif (isset($_SESSION['update-category']) && $_SESSION['update-category'] == 'failed') : ?>
    <strong class="alert_red">No se pudo actualizar la categoría</strong>
<?php endif; ?>

<!-- __ALERTA DE ELIMINACIÓN DE UNA CATEGORÍA__ -->
<?php if (isset($_SESSION['delete-category']) && $_SESSION['delete-category'] == 'complete') : ?>
    <strong class="alert_green">Categoría eliminada</strong>
<?php elseif (isset($_SESSION['delete-category']) && $_SESSION['delete-category'] == 'failed') : ?>
    <strong class="alert_red">No se pudo eliminar la categoría</strong>
<?php endif; ?>


<!-- Borrar sesión  -->
<?php Utils::deleteSession('register-category'); ?>
<?php Utils::deleteSession('delete-category'); ?>
<?php Utils::deleteSession('update-category'); ?>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acción</th>
    </tr>
    <?php while ($cat = $categorias->fetch_object()) : ?>
        <tr>
            <td><?= $cat->id; ?></td>
            <td><?= $cat->nombre; ?></td>
            <td>
                <a href="<?= base_url ?>categoria/delete&id=<?= $cat->id; ?>">🗑️</a>
                /
                <a href="<?= base_url ?>categoria/editar&id=<?= $cat->id; ?>">✏️</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>