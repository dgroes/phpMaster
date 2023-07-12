<?php

    $error = "faltan_valores";
    if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['edad']) && !empty($_POST['email']) && !empty($_POST['contrasena']) && !empty($_POST[''])){
        $error = "ok";
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $email = $_POST['email'];
        $contrasena = $_POST['contrasena'];

        //Validar nombre:
        if(!is_string($nombre) && preg_match("/[1-9]+", $nombre)){
            $error = 'nombre';
        }
        if(!is_string($apellido) && preg_match("/[1-9]+", $apellido)){
            $error = 'apellido';
        }
        if(!is_int($edad) && !filter_var($edad, FILTER_VALIDATE_INT)){
            $error = 'apellido';
        }
        if(!is_string($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = 'email';
        }
        if(empty($contrasena) && strlen($contrasena)<5){
            $error = 'contrasena';
        }


    }else{
        $error = "faltan_valores";
        
    }

    if($error != 'ok'){
        header("Location:index.php?error=$error");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Datos validados correctamente</h2>
    <?php if($error == 'ok'): ?>
        <p><?=$nombre?></p>
        <p><?=$apellido?></p>
        <p><?=$edad?></p>
        <p><?=$email?></p>
       
    <?php endif; ?>
    
    
</body>
</html>