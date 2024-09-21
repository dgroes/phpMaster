<?php
// require_once 'models/bitacora.php';

class BitacoraController
{
    public function logbook()
    {
        require_once 'views/bitacora/bitacora.php';
    }

    public function hola(){
        echo "hola mundo";
    }
}
