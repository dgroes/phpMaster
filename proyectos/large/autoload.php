<?php

/*  
    Este archivo define una función de autoload y la registra con spl_autoload_register 
    para cargar automáticamente las clases de los controladores.
 */

//Esta función toma el nombre de una clase como párametro($classname)
function controllers_autoload($classname)
{
    include 'controllers/' . $classname . '.php'; //Incluye el archivo correspondiente en el directorio controllers con extensión .php.
}

//Registra la función controllers_autoload como la implementación de la función de autoload para cargar clases automáticamente.
spl_autoload_register('controllers_autoload');
