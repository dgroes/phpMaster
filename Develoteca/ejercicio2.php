<?php
    if($_POST){
         //Recibir información del fomrulario html [Metodo post]
        $nombre=$_POST['txtNombre'];
        echo "<h2> Hola $nombre como estás?</h2>";
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <form action="ejercicio2.php" method="post">
        Nombre:
        <input type="text" name="txtNombre" id="">
        <br/>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>