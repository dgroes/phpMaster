<?php

function listarVehiculos($db, $busqueda = null) {
    $sql = "SELECT * FROM vehiculo ";
    
    // Verificar si hay una búsqueda
    if (!empty($busqueda)) {
        $sql .= "WHERE codigo LIKE '%$busqueda%' ";  // Asumiendo que el campo de código se llama 'codigo'
    }
    
    // Completar la consulta SQL y ejecutarla
    $sql .= "ORDER BY anno DESC";
    
    return mysqli_query($db, $sql);
}
