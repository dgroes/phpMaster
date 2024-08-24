<?php

/*  
    Este archivo define una función de autoload y la registra con spl_autoload_register 
    para cargar automáticamente las clases de los controladores.
 */

//Esta función toma el nombre de una clase como párametro($classname)
function controllers_autoload($classname)
{
    $paths = ['controllers/', 'models/']; // Rutas donde buscar las clases

    foreach ($paths as $path) {
        $file = $path . strtolower($classname) . '.php';
        if (file_exists($file)) {
            include $file;
            break; // Detenemos la búsqueda si encontramos el archivo
        }
    } //Incluye el archivo correspondiente en el directorio controllers con extensión .php.
}

//Registra la función controllers_autoload como la implementación de la función de autoload para cargar clases automáticamente.
spl_autoload_register('controllers_autoload');



/*

$paths: Este array contiene los directorios donde se buscarán las clases (controllers/ y models/).
strtolower($classname): Esto convierte el nombre de la clase a minúsculas para coincidir con el nombre del archivo (si es necesario).
file_exists($file): Verifica si el archivo existe antes de intentar incluirlo.
include $file: Si el archivo existe, se incluye, y se detiene la búsqueda.

*/
