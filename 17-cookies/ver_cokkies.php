<?php

    //Mostrar valor de las Cokkies se utilizas $_cookie, es una variable superglobal y es un array asociativo.
    if(isset($_COOKIE['migalleta'])){
        echo $_COOKIE['migalleta'];
    }else{
        echo "no existe la cookie";
    }
    echo "<br>";


    if(isset($_COOKIE['oneYear'])){
        echo $_COOKIE['oneYear'];
    }else{
        echo "no existe la cookie";
    }
?>