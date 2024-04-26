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
use MisClases\Usuario, MisClases\Categoria, MisClases\Entrada;
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
}

//Objeto principal
$principal = new Principal();
var_dump($principal->usuario);

//Objeto de otro paquete
$usuario = new UsuarioAdmin();

var_dump($usuario);
