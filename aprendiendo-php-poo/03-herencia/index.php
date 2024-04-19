<?php
require_once "clases.php";

$persona = new Persona();
$persona->setNombre("Diego");


echo "<pre>";
var_dump($persona);
echo "</pre>";

$informatico = new Informatico();

echo "<pre>";
var_dump($informatico);
echo "</pre>";


$tenicoRedes = new TecnicoRedes();
echo "<pre>";
var_dump($tenicoRedes);
echo "</pre>";



