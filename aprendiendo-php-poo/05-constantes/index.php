<?php

class Usuario {
    // Propiedades
    const URL_COMPLETA = "http://localhost";
    public $email;
    public $password;

    // Setter para el email
    public function setEmail($email) {
        $this->email = $email;
    }

    // Getter para el email
    public function getEmail() {
        return $this->email;
    }

    // Setter para la contraseña
    public function setPassword($password) {
        $this->password = $password;
    }

    // Getter para la contraseña
    public function getPassword() {
        return $this->password;
    }
}

$usuario = new Usuario();
echo $usuario::URL_COMPLETA;
echo "<br>";
var_dump($usuario);
echo "<br>";
echo Usuario::URL_COMPLETA;