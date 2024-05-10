<?php

require_once 'config/conexion.php';
require_once 'controller/listar-registro.php';
// Consulta SQL para obtener todos los registros de la tabla vehiculo
/* $sql = "SELECT * FROM vehiculo ORDER BY anno DESC";
$resultado = mysqli_query($db, $sql); */




// Verificar si hay resultados
?>
<h2>Listado de Registros</h2>
<div id="buscador" class="bloque">
    <h3>Buscar</h3>
    <form action="?page=buscar" method="post">
        <input type="text" name="busqueda" id="busqueda" placeholder="Código" oninput="limitarDigitos(this, 4)">
        <input type="submit" value="Buscar">
    </form>

</div>
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
        $resultado = listarVehiculos($db);

        if (!empty($resultado)) :
            while ($fila = mysqli_fetch_assoc($resultado)) :
        ?>
                <tr>
                    <td><?php echo $fila['codigo']; ?></td>
                    <td><?php echo $fila['num_motor']; ?></td>
                    <td><?php echo $fila['tipo_vehiculo']; ?></td>
                    <td><?php echo $fila['marca']; ?></td>
                    <td><?php echo $fila['modelo']; ?></td>
                    <td><?php echo $fila['anno']; ?></td>
                    <td><?php echo $fila['color']; ?></td>
                    <td><?php echo $fila['precio']; ?></td>
                    <td><?php echo $fila['estado']; ?></td>
                    <td><?php echo $fila['revision']; ?></td>
                </tr>
        <?php
            endwhile;
        endif;
        ?>

    </tbody>
</table>
</body>

</html>
<?php

?>


</article>