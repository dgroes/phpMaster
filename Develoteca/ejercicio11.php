<?php

    if($_POST){
        $valora=$_POST['valora'];
        $valorb=$_POST['valorb'];

        $suma = $valora+$valorb;
        echo $suma;

        if($valora==$valorb){
            echo "El valor de A es igual a el valor de B";
    
            if($valora==4){
                echo "El valor es 4";
            }
            if($valorA==5){
                echo "El valor es 5";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 11</title>
</head>
<body>
    <form action="ejercicio11.php" method="post">
        Valor A:
        <input type="text" name="valora" id="">
        Valor B
        <input type="text" name="valorb" id="">
        <br/>
        <input type="submit" value="Calcular">
    </form>
    
</body>
</html>