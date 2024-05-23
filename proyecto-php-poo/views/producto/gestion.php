<h1>Gestión de Productos</h1>
<a href="<?= base_url ?>producto/crear" class="button button-small">Crear Producto</a>

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
                <a href="#">🗑️</a>
                /
                <a href="#">✏️</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>