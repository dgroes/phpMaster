<?php


class Usuario
{
    public $nombre;
    public $email;

    public function __construct()
    {
        $this->nombre = "Diego";
        $this->email = "diego@gmail.com";
        echo "Creando el  objeto <br>";
    }

    public function __toString()
    {
        return "Hola, {$this->nombre}, está registrado con {$this->email}";
    }

    public function __destruct()
    {
        echo "<br> Destruyendo el objeto <br>";
    }
}

$usuario = new Usuario();


/* for ($i = 0; $i <= 200; $i++) {
    echo  $i . "<br>";
}
 */
echo $usuario;
/* echo $usuario->email; */