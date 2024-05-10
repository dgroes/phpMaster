<?php
    //  Inicar sesión
    session_start();

    //  Primero hacer la conexión a la BD
    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'proyecto_practica_dos'
    );

    //Comprobar si la conexión ha sido correcta
    /* if(isset($conn)){
        echo "Conectado";
    } */
