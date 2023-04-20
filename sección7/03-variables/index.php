<?php

//UNA VARIABLE ES UN CONTENEDOR DE INFORMACIÓN, PUEDE GUARDAR CUALQUIER DATO DENTRO DE ELLA.
$variableUno = "Hola Andy, esta es una variable.";

//El contenido de las variables se puede sustituir por otro, PHP siempre dará la ultima actualización de una varialbe, en este caso va a imprimir la seggunda modificación, es decir "21".
$numero = 19;
$numero = 21;

echo '<h1>'.$variableUno.'</h1>';
echo $numero;


?>