<?php

    //Crear carpeta
    if(!is_dir('mi_carpeta')){
        mkdir('mi_carpeta', 0777) or die("No se puede crear la carpeta.");
    }else{
        echo "Ya existe la carpeta";
    }

    echo "<hr>";

    /* //Borrar directorios
    rmdir('mi_carpeta'); */

    //Recorer contenido de un directorio
    if($gestor = opendir('./mi_carpeta')){
        while(false !== ($archivo = readdir($gestor))){
            if($archivo != '.' && $archivo != '..'){
                echo $archivo."<br>";
            }
        }
    }



?>