<?php
    
    echo "<h2>1) Escribe un programa que muestre los números del 1 al 10 utilizando un bucle while.</h2>";
    $a = 0;
    while ($a <= 9) {
        $a ++;
        echo $a." ";
    }
    echo "<br>";
    echo "<h2>2)Crea un programa que solicite al usuario un número y muestre todos los números pares desde 2 hasta ese número utilizando un bucle for.</h2>  ";
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicios GPT 2</title>
    </head>
    <body>
        <form action="ejercicioGPT2.php" method="post">
            <input type="text" name="number" id="">
            <input type="submit" value="Enviar" style="background-color: yellow;">
        </form>
        
    </body>
    </html>
<?php

    if($_POST){
        $number=$_POST['number'];
        for ($i = 2; $i <= $number; $i += 2) {
            echo $i . " ";
        }
    
    }else{
        echo "Por favor, debe ingresar un numero para que funcione el programa";
    }

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="ejercicioGPT2.php" method="post">
            <input type="text" name="edad" id="">
            <input type="submit" value="Enviar edad">
        </form>
    </body>
    </html>
    <?php
        if($_POST){
        $edad=$_POST['edad'];
        if ($edad >= 18){
            echo "Eres mayor de edad";
        }else{
            echo "Eres menor de edad";

        }
        }
        
        echo "Desarrolla un programa que pida al usuario ingresar su edad y muestre un mensaje que diga si es mayor de edad o no, utilizando una estructura de control if-else.";
    ?>
    
    <!-- 
    
    echo "Escribe un script que calcule el área de un triángulo. El usuario debe ingresar la base y la altura, y el programa debe mostrar el resultado.";
    echo "Crea un programa que solicite al usuario ingresar un número y determine si es positivo, negativo o cero utilizando una estructura de control switch.";
    echo "Desarrolla un programa que muestre los primeros 10 múltiplos de 3 utilizando un bucle do-while."; -->


