<?php

namespace MisClases;

class Usuario
{
    public $nombre;
    public $email;

    public function __construct()
    {
        $this->nombre = "Juanito Esmeralda";
        $this->email = "el-loco-juan@gmail.com";
    }
}
