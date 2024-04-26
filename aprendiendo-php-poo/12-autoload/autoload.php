<?php

function autocargar_clases($class)
{
    require_once 'class/' . $class . '.php';
}

spl_autoload_register('autocargar_clases');
