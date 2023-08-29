<?php

    //Una sesión almacena y persiste datos del usuario mientras que navega en un sitio web hasta que cierra la sesión o cierra el navegador.

    //Iniciar sesión
    session_start();
    //Variable local
    $variable_normal = "Una cadena de Texto";

    //Variable de sesión
    $_SESSION['variable_persistente'] = "Hola esta es una sesión activa";

    echo $variable_normal;
    echo "<br>";
    echo $_SESSION['variable_persistente']


?>