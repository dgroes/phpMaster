<?php

//Varibales Locales
/* las variables locales son aquellas que se declaran dentro de una función y solo están accesibles dentro del ámbito de esa función. Esto significa que solo se pueden usar y modificar dentro de la función en la que se declaran. Las variables locales se utilizan para almacenar valores temporales o intermedios necesarios para realizar cálculos o ejecutar acciones dentro de la función.*/

//Variables Globales
/* las variables globales son aquellas que se declaran fuera de cualquier función o en un ámbito global. Estas variables son accesibles desde cualquier parte del script, incluyendo las funciones. Esto significa que se pueden utilizar tanto dentro como fuera de las funciones.*/

//variable global: esta se puede utilizar dentro de todo el script 
$frase = "Ya tu sabe";

function hola(){
    global $frase;
    echo "hola $frase";
}
hola();

?>