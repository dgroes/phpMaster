<?php
// require_once 'models/bitacora.php';

class LogController
{
    public function logbook()
    {
        require_once 'views/log/logbook.php';

        $worker = new Worker;

        require_once 'models/worker.php';
    }

    public function hola(){
        echo "hola mundo";
    }
}
