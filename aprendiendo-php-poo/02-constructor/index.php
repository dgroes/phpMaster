<?php 
require_once 'coche.php';

$coche = new Coche("Amarillo", "Renaul", "Clio", 150, 200, 5);
$coche1 = new Coche("Rojo", "Seat   ", "Panda", 150, 200, 5);
$coche2 = new Coche("Azúl", "Citroen", "Xara", 150, 200, 5);


$coche->color = "Rosa";
$coche->setMarca("Audi");
/* var_dump($coche->getModelo());

echo '<pre>';
var_dump($coche);
echo '</pre>';
 */

/* echo '<pre>';
var_dump($coche);
var_dump($coche1);
var_dump($coche2);
echo '</pre>';
 */


 echo $coche->mostarInformacion($coche1);
