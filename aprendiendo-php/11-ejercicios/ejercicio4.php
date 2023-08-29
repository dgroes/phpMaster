<?php

    //Recoger dos numero por la URL (Post) y hacer todas las operaciones basicas de una calculadora.
    if($_POST){
        $valorA=$_POST['valorA'];
        $valorB=$_POST['valorB'];
        $suma = ($valorA + $valorB);
        echo $suma;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <form action="ejercicio4.php" method="post">
        <input type="text" name="valorA" id="">
        <br/>
        <input type="text" name="valorB" id="">
        <input type="submit" value="Calcular">
        
    </form>
    
</body>
</html>