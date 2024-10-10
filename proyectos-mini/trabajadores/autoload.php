<?php

function controllers_autoload($classname)
{
    $paths = ['controllers/', 'models/']; // Rutas  en donde se deben buscar las clases

    foreach ($paths as $path) {
        $file = $path . strtolower($classname) . '.php';
        if (file_exists($file)) {
            include $file;
            break; // Detención de la búsqueda si se encuentra el fichero
        }
    }
}

spl_autoload_register('controllers_autoload');
