<?php

    echo "<h2>Ejercicios a resolver de GPT </h2>";

    echo "<br>";
    echo "<h3>1) Escribe un programa que muestre los números del 1 al 10 en orden ascendente.</h3>";
    for ($numero=1; $numero <=10 ; $numero++) { 
        echo $numero." / ";;
    }

    echo "<br>";
    echo "<h3>2)Crea un programa que calcule la suma de los números del 1 al 100 e imprima el resultado.</h3>";
    $total = 0;
    for ($i=1; $i <=100 ; $i++) {
        $total += $i;
    }
    echo $total;

    echo "<br>";
    echo "<h3>3)Escribir un script en PHP que genere una tabla de multiplicar para un número específico ingresado por el usuario. La tabla debe mostrar los resultados de multiplicar el número del 1 al 10.</h3>";
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio GPT</title>
</head>
<body>
    <form action="ejercicioGPT.php" method="post">
        <p>Ingresar un numero por favor.</p>
        <input type="text" name="number" id="">
        <input type="submit" value="Multiplicar" style="background-color: yellow;">
    </form>
    
</body>
</html>
<?php

if($_POST){
    $number=$_POST['number'];
    for ($i=1; $i <=10 ; $i++) { 
        $tabla = ($number*$i);
        echo $tabla." / ";
    }
   
}else{
    echo "Por favor, debe ingresar un numero para que funcione el programa";
}

echo "<br>";
echo "<h3>4)Desarrolla un programa que pida al usuario un número y muestre si es par o impar.</h3>";
$num = 7;
if($num % 2 == 0){
    echo "El número es par.";
}else{
    echo "El número es impar";
}

echo "<br>";
echo "<h3>5) Crea un programa que solicite al usuario su edad y muestre un mensaje indicando si es mayor de edad o no.</h3>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio GPT</title>
</head>
<body>
    <form action="ejercicioGPT.php" method="post">
        <p>Ingresar tu edad porfavor.</p>
        <input type="text" name="edad" id="">
        <input type="submit" value="Multiplicar" style="background-color: yellow;">
    </form>
    
</body>
</html>
<?php

    if($_POST){
        $edad=$_POST['edad'];
        if($edad <=18){
            echo "Eres mayor de edad.";
        }else{
            echo "Eres menor ded edad, fuera de este lugar";
        }
    
    }else{
        echo "Por favor, debe ingresar un numero para que funcione el programa";
    }
?>