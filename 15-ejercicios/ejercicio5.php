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
    <?php require_once 'encabezado.php'?>
    <?php require_once 'primeraFila.php'?>
    <?php require_once 'segundaFila.php'?>
    <?php require_once 'terceraFila.php'?>
    
   
</table>