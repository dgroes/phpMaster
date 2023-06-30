<?php

    //Crear un array con el contenido de la siguiente tabla:
    /*
    Accion Aventura  Deportes
    GTA    Assasins  Fifa
    COD    Crash     Pess
    PUGB  Uncharted  Moto GP 

    Cada fila debería ir en un fichero separado(includes).
    */
    $tabla = array(
        "ACCION" => array("GTA", "COD", "PUGB"),
        "AVENTURA" => array("Assasins", "Crash", "Uncharted"),
        "DEPORTES" => array("Fifa", "NBA", "Maden")
    );
    $categorias = array_keys($tabla);
?>

<table border="1">
    <tr>
        <?php foreach($categorias as $categoria):?>
        <th><?=$categoria?></th>
        <?php endforeach; ?>
    </tr>
    <tr>
        <td><?=$tabla['ACCION'] [0] ?></tDd>
        <td><?=$tabla['AVENTURA'] [0] ?></td>
        <td><?=$tabla['DEPORTES'] [0] ?></td>
    </tr>
    <tr>
        <td><?=$tabla['ACCION'] [1] ?></tDd>
        <td><?=$tabla['AVENTURA'] [1] ?></td>
        <td><?=$tabla['DEPORTES'] [1] ?></td>
    </tr>
    <tr>
        <td><?=$tabla['ACCION'] [2] ?></tDd>
        <td><?=$tabla['AVENTURA'] [2] ?></td>
        <td><?=$tabla['DEPORTES'] [2] ?></td>
    </tr>
</table>