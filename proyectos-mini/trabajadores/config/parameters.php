<?php

//Para que el formateo limpiio de las URLs funcinen será importante que en el servidor de apache esté activado el "rewrite_module"
define("base_url", "http://localhost/phpMaster/proyectos-mini/trabajadores/"); //Importante que la ruta completa del localhost sea correcta.
define("controller_default", "TrabajadorController");
define("action_default", "index");
date_default_timezone_set('America/Santiago');
