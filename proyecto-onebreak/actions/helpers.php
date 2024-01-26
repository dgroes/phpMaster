<?php


//Conseguir Actividades de Empresa en la BD, desde la Tabla actividadempresa.
function getActividadEmpresa($conn)
{
    $sql = "SELECT * FROM actividadempresa ORDER BY id ASC;";
    $actividadEmpresa = mysqli_query($conn, $sql);

    $result = array();
    if ($actividadEmpresa && mysqli_num_rows($actividadEmpresa) >= 1) {
        $result = $actividadEmpresa;
    }

    return $result;
}


//Conseguir Tipo de Empresa en la BD, desde la Tabla tipoEmpresa.
function getTipoEmpresa($conn){
    $sql = "SELECT * FROM tipoempresa ORDER BY id ASC;";
    $tipoEmpresa = mysqli_query($conn, $sql);

    $result = array();
    if ($tipoEmpresa && mysqli_num_rows($tipoEmpresa) >= 1){
        $result = $tipoEmpresa;
    }

    return $result;
    
}