<?php

    //Cookie: Es un fichero que almacena en el ordenaro del usuario que visita la web, con el fin de recordar datos o rastrar el comportamiento del mismo.
 
    //Crear Cookie
    /*setcookie("nombre", "Valor que solo puede ser Texto", caducidad, ruta, dominio);*/
    setcookie("migalleta", "Valor de mi galleta");

    //Cookie con expiración.
    setcookie("oneYear", "Valor de mi cookie de 365 días", time()+(60*60*24*365));

?>

<a href="ver_cokkies.php"> ver las galletas </a>
<a href="borrar_cokkies.php"> Borrar mis galletas </a>