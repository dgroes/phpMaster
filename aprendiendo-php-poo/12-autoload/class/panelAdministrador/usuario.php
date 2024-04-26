<?php

namespace PanelAdministrador;

class Usuario
{
    public $nombre;
    public $email;

    public function __construct()
    {
        $this->nombre = "Antonio José De Los Palomares";
        $this->email = "viva-el-vino.com";
    }
}
