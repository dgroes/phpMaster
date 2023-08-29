<?php

    //Ejercicio2
    /*
    - Una función
    - Validar un email con filter_Var
    - Recorrer variable por get y validarla
    - Mostrar Resultado


    */

    function validarEmail($email){
        $status = "No valido";
        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $status = "Valido";
        }
        return $status;
    }

    if(isset($_GET['email'])){
        echo validarEmail($_GET['email']);
    }else{
        echo "Introduce por get un Email";
    }


?>