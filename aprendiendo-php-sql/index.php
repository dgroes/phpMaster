<?php

//conectar a la base de datos.
$conexion = mysqli_connect("localhost", "root", "", "phpmysql");

//Comprobar si la conexión es correcta
if(mysqli_connect_errno()){
    echo "La conexión a la base de datos MySQL ha fallado: ".mysqli_connect_errno();
}else{
    echo "Conexión realizada correctamente"."<hr>";
}

// Consulta para configurar la codificación de caracteres
mysqli_query($conexion, "SET NAMES 'utf8'");

//Consulta SELECT desde PHP.
$query = mysqli_query($conexion, "SELECT * FROM notas");

while($nota = mysqli_fetch_assoc($query)){
    /* var_dump($nota); */
    echo "<h2>".$nota['titulo']."</h2>";
    echo $nota['descripcion']."<br>";
}


//Insertar en la Base de Datos desde PHP
$sql = "INSERT INTO notas VALUES(null, 'Nota desde PHP', 'Esto es una nota de PHP', 'green')";
$insert = mysqli_query($conexion, $sql);

if ($insert){
    echo "<hr>"."Datos insertados correctamente";
}else{
    echo "Error: ".mysqli_error($conexion);
}





?>