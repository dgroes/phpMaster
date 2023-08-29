<?php

    /* Ejercicio3:
    Hacer interfaz de usuario (formulario) con 4 botones, 2 imputs y 4 botones, uno para sumar, restar, dividir y multiplicar*/
    $resultado = false;
    if(isset($_POST['n1']) && isset($_POST['n2'])){
        
        if(isset($_POST['sumar'])){
            $resultado = "El resultado es ".($_POST['n1'] + $_POST['n2']);
        }
        if(isset($_POST['restar'])){
            $resultado = "El resultado es ".($_POST['n1'] - $_POST['n2']);
        }
        if(isset($_POST['multiplicar'])){
            $resultado = "El resultado es ".($_POST['n1'] * $_POST['n2']);
        }
        if(isset($_POST['dividir'])){
            $resultado = "El resultado es ".($_POST['n1'] / $_POST['n2']);
        }     
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
    <h1>Calculadora</h1>
    <form action="ejercicio3.php" method="post">
        <label for="n1">Numero 1</label>
        <input type="number" name="n1">
        <label for="n2">Numero 2</label>
        <input type="number" name="n2">

        <input type="submit" value="sumar" name="sumar">
        <input type="submit" value="restar" name="restar">
        <input type="submit" value="multiplicar" name="multiplicar">
        <input type="submit" value="dividir" name="dividir">
    </form>
    <?php

    //Resultado
    if($resultado != false):
        echo "<h2>$resultado</h2>";
    endif;

    ?>
    
</body>
</html>