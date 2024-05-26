<h1>Gestión de Productos</h1>
<a href="<?= base_url ?>producto/crear" class="button button-small">Crear Producto</a>

<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == "complete") : ?>
    <strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != "complete") : ?>
    <strong class="alert_green">El producto NO ha creado correctamente</strong>
<?php endif; ?>

<!-- Borrar sesión  -->
<?php Utils::deleteSession('producto'); ?>


<!-- __Alertas de eliminado__ -->
<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == "complete") : ?>
    <strong class="alert_green">El producto se ha borrado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != "complete") : ?>
    <strong class="alert_green">El producto NO ha borrado</strong>
<?php endif; ?>

<!-- Borrar sesión  -->
<?php Utils::deleteSession('delete'); ?>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acción</th>
    </tr>
    <?php while ($pro = $productos->fetch_object()) : ?>
        <tr>
            <td><?= $pro->id; ?></td>
            <td><?= $pro->nombre; ?></td>
            <td><?= $pro->precio; ?></td>
            <td><?= $pro->stock; ?></td>
            <td>
                <a href="<?= base_url ?>producto/eliminar&id=<?= $pro->id ?> " class="icon">🗑️</a>
                /
                <a href="<?= base_url ?>producto/editar&id=<?= $pro->id ?>" class="icon">✏️</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>