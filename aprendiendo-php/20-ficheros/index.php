<?php

    //Abrir archivo
    $archivo = fopen("archivo.txt", "a+");
    
    //Leer contenido
    while(!feof($archivo)){
        $contenido = fgets($archivo);
        echo $contenido."<br>";
    }

    //Escribir en un archivo
    fwrite($archivo, "Soy una nueva linea de texto agregado con PHP.");

    //Cerrar archivo
    fclose($archivo);

    //Copiar ficheros
    copy("archivo.txt", "archivo_copiado.txt") or die("Error al copiar.");

    //Renombrar fichero
    rename("archivo_copiado.txt", "archivo_copiado_reenombrado.txt");

    //Eliminar
    unlink("archivo_copiado_reenombrado.txt") or die("Error al borrar");

    //Validar si un fichero existe
    if(file_exists("archivo_copiado_reenombrado.txt")){
        echo "El archivo existe";
    }else{
        echo "El archivo no existe";
    }

?>