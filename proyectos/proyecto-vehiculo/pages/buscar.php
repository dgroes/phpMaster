<?php require_once 'controller/listar-registro.php'; ?>
<?php require_once 'config/conexion.php'; ?>
<h2>Buscar</h2>
<h3>Busqueda: <?= $_POST['busqueda']; ?></h3>


<table>
    <thead>
        <tr>
            <th>Código</th>
            <th>Número de Motor</th>
            <th>Tipo de Vehículo</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Año</th>
            <th>Color</th>
            <th>Precio</th>
            <th>Estado</th>
            <th>Revisión</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $vehiculos = listarVehiculos($db, $_POST['busqueda']);
        if (!empty($vehiculos) && mysqli_num_rows($vehiculos) >= 1) :
            while ($vehiculo = mysqli_fetch_assoc($vehiculos)) :
        ?>
                <tr>
                    <td><?php echo $vehiculo['codigo']; ?></td>
                    <td><?php echo $vehiculo['num_motor']; ?></td>
                    <td><?php echo $vehiculo['tipo_vehiculo']; ?></td>
                    <td><?php echo $vehiculo['marca']; ?></td>
                    <td><?php echo $vehiculo['modelo']; ?></td>
                    <td><?php echo $vehiculo['anno']; ?></td>
                    <td><?php echo $vehiculo['color']; ?></td>
                    <td><?php echo $vehiculo['precio']; ?></td>
                    <td><?php echo $vehiculo['estado']; ?></td>
                    <td><?php echo $vehiculo['revision']; ?></td>
                </tr>
        <?php
            endwhile;
        endif;
        ?>

    </tbody>
</table>




</article>