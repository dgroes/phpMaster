<?php

    if($_POST){
        $valora=$_POST['valora'];
        $valorb=$_POST['valorb'];

        if(($valora != $valorb) && ($valora > $valorb)){
            echo "El valor A es diferente al valor B y tambien es mayor";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10 </title>
</head>
<body>
    <form action="ejercicio10.php" method="post">
        Valor A:
        <input type="text" name="valora" id="">
        Valor B
        <input type="text" name="valorb" id="">
        <br/>
        <input type="submit" value="Calcular">
    </form>
    
</body>
</html>