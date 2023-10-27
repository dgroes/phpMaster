<?php
    if($_POST){
        $boton=$_POST['btn'];
        switch($boton){
            case 1;
            echo "El usuario presionó el botón 1";
            break;
            case 2;
            echo "El usuario presionó el botón 2";
            break;
            case 3;
            echo "El usuario presionó el botón 3";
            break;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13 SWITCH</title>
</head>
<body>
    <form action="ejercicio13.php" method="post">
        <input type="submit" name="btn" value="1">
        <br>
        <input type="submit" name="btn" value="2">
        <br>
        <input type="submit" name="btn" value="3">
    </form>
    
</body>
</html>