<?php
require_once 'models/pedido.php';

class PedidoController
{
    public function hacer()
    {
        require_once 'views/pedido/hacer.php';
    }

    public function add()
    {

        if (isset($_SESSION['identity'])) {
            $usuario_id = $_SESSION['identity']->id;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;

            $stats = Utils::statsCarrito();
            $coste = $stats['total'];
            if ($provincia && $direccion && $localidad) {
                //Guardar datos en la BD
                $pedido = new Pedido();
                $pedido->setUsuarioId($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setDireccion($direccion);
                $pedido->setLocalidad($localidad);
                $pedido->setCoste($coste);

                $save = $pedido->save();

                //Guardar Linea Pedido
                $save_linea = $pedido->save_linea();

                if ($save && $save_linea) {
                    $_SESSION['pedido'] = "complete";
                } else {
                    $_SESSION['pedido'] = "falied";
                }
            } else {
                $_SESSION['pedido'] = "falied";
            }

            header("Location:" . base_url . 'pedido/confirmado');
        } else {
            //Redirigir al Index
            header("Location:" . base_url);
        }
    }

    public function confirmado()
    {
        if (isset($_SESSION['identity'])) {
            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setUsuarioId($identity->id);
            $pedido = $pedido->getOneByUser();

            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($pedido->id);
        }
        require_once 'views/pedido/confirmado.php';
    }

    public function mis_pedidos()
    {
        Utils::isIdentity();
        $usuario_id = $_SESSION['identity']->id;
        $pedido = new Pedido();

        // Sacar los pedidos del usuario
        $pedido->setUsuarioId($usuario_id);
        $pedidos = $pedido->getAllByUser();

        require_once 'views/pedido/mis_pedidos.php';
    }

    public function detalle()
    {
        Utils::isIdentity();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            //Sacar el Pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();

            //Sacar los productos
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($id);


            require_once 'views/pedido/detalle.php';
        } else {
            header("Location:" . base_url . 'pedido/mis_pedidos');
        }
        require_once 'views/pedido/detalle.php';
    }

    public function gestion()
    {
        Utils::isAdmin();
        $gestion = true;

        $pedido = new Pedido();
        $pedidos = $pedido->getAll();

        require_once 'views/pedido/mis_pedidos.php';
    }

    public function estado()
    {
        Utils::isAdmin();
        if (isset($_POST['pedido_id']) && isset($_POST['estado'])) {
            // Recoger los datos del formulario
            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];

            // UPDATE del pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->edit();

            // Verificar si las cabeceras ya se han enviado
            if (!headers_sent()) {
                header("Location:" . base_url . 'pedido/detalle&id=' . $id);
                exit();
            } else {
                echo "<script>window.location.href='" . base_url . 'pedido/detalle&id=' . $id . "';</script>";
                exit();
            }
        } else {
            // Verificar si las cabeceras ya se han enviado
            if (!headers_sent()) {
                header("Location:" . base_url);
                exit();
            } else {
                echo "<script>window.location.href='" . base_url . "';</script>";
                exit();
            }
        }
    }
}
