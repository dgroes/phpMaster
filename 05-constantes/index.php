
<?php

    //Constantes
    //Es un contenedor de información que no puede variar.
    define('nombre', 'Diego Pasten');
    define('web', 'diegopasten.com');

    //La constante se muestra sin el simbolo de dolar.
    echo nombre."<br>";
    

    //Constantes pre-definidas
    echo PHP_VERSION."<br>";
    echo PHP_EXTENSION_DIR."<br>";
    echo __LINE__."<br>";
    echo __FILE__."<br>";
    echo __FUNCTION__."<br>";

?>