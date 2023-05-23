<?php

    //Mostrar una tabla HTML con las tablas demultiplicar del uno al diez

    echo "<table border='1'> <tr>";
    echo "<tr>";
        for($cabecera = 1; $cabecera <= 10; $cabecera++){
            echo "<td>Tabla del $cabecera </td>";
        }
    echo "</tr>";
    echo "<tr>";
    for ($i = 1; $i <= 10; $i++){
        echo "<td>";
            for($x= 1; $x <= 10; $x++){
                echo "$i x $x =".($i*$x)."<br>";
            }
        echo "</td>";

    }
    echo "</tr>";
    echo "</table>";

?>

