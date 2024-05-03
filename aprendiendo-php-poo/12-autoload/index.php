<?php
require_once 'autoload.php';

/* 
$usuario = new Usuario();
echo $usuario->nombre;
echo "<br>";
echo $usuario->email;
echo "<br>";


$categoria = new Categoria();
echo $categoria->nombre;
 */

// ESPACIOS DE NOMBRES Y PAQUETES
use MisClases\Usuario, MisClases\Categoria, MisClases\Entrada;;
use PanelAdministrador\Usuario as UsuarioAdmin;

class Principal
{
    public $usuario;
    public $categoria;
    public $entrada;

    public function __construct()
    {
        /* new MisClases */
        $this->usuario = new Usuario();
        $this->categoria = new Categoria();
        $this->entrada = new Entrada();
    }

    // Métodos getter
    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function getEntrada()
    {
        return $this->entrada;
    }

    // Métodos setter
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function setEntrada($entrada)
    {
        $this->entrada = $entrada;
    }
}

//Objeto principal
$principal = new Principal();
// var_dump($principal->usuario);

$metodos = (get_class_methods($principal));


$busqueda = array_search('setApellido', $metodos);

echo "<pre>";
var_dump($busqueda);
echo "</pre>";

//Objeto de otro paquete
/* $usuario = new UsuarioAdmin();

var_dump($usuario);
 */

//__Comprobar si existe una clase__
$clase = @class_exists("PanelAdministrador\Usuario");
if ($clase) {
    echo "<h3>La clase si existe!</h3>";
} else {
    echo "<h3>La clase no existe :(</h3>";
}

//Push desde Ubuntu
