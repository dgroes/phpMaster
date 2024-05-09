<?php
require_once 'ModeloBase.php';
class Usuario extends ModeloBase
{
    public $nombre;
    public $apellidos;
    public $email;
    public $password;

    public function __construct()
    {
        parent::__construct();
    }

    // Setter para el nombre
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    // Getter para el nombre
    public function getNombre()
    {
        return $this->nombre;
    }

    // Setter para los apellidos
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    // Getter para los apellidos
    public function getApellidos()
    {
        return $this->apellidos;
    }

    // Setter para el email
    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Getter para el email
    public function getEmail()
    {
        return $this->email;
    }

    // Setter para la contraseña (password)
    public function setPassword($password)
    {
        $this->password = $password;
    }

    // Getter para la contraseña (password)
    public function getPassword()
    {
        return $this->password;
    }
}
