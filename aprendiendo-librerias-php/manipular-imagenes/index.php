<?php
require_once "../vendor/autoload.php";

$foto_original = "bugs.jpg";
$guardar_en = "fotomodificada.jpg";

$thumb = new PHPThumb\GD($foto_original);

//Redimencionar
$thumb->resize(50, 50);


//Recortar
$thumb->crop(50, 50, 120, 120);
$thumb->show();
$thumb->save($guardar_en);