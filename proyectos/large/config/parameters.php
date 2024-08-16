<?php

//Para que el formateo liimpio de las URLs funcionen será importante que en el servidor de 'apache' esté activado el "rewrite_module".
define("base_url", "http://localhost/phpMaster/proyectos/large/"); // Ruta de la URL completa del directorio, en esté caso está en localhost dentro de phpMaster/proyedtos/large/
define("controller_default", "postController");
define("action_default", "index");
date_default_timezone_set('America/Santiago');
