<?php



class Pedido
{
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;

    private $db; //Conexión a la BD

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // Getter y Setter para id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter y Setter para usuario_id
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    // Getter y Setter para provincia
    public function getProvincia()
    {
        return $this->provincia;
    }

    public function setProvincia($provincia)
    {
        $this->provincia = $this->db->real_escape_string($provincia);
    }

    // Getter y Setter para localidad
    public function getLocalidad()
    {
        return $this->localidad;
    }

    public function setLocalidad($localidad)
    {
        $this->localidad = $this->db->real_escape_string($localidad);
    }

    // Getter y Setter para direccion
    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    // Getter y Setter para coste
    public function getCoste()
    {
        return $this->coste;
    }

    public function setCoste($coste)
    {
        $this->coste = $coste;
    }

    // Getter y Setter para estado
    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    // Getter y Setter para fecha
    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    // Getter y Setter para hora
    public function getHora()
    {
        return $this->hora;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    public function getAll()
    {
        $productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC;");
        return $productos;
    }


    public function getOne()
    {
        $producto = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()};");
        return $producto->fetch_object();
    }

    public function getOneByUser()
    {
        $sql = "SELECT p.id, p.coste FROM pedidos p "
            // . "INNER JOIN lineas_pedidos lp ON lp.pedido_id = p.id "
            . "WHERE p.usuario_id = {$this->getUsuarioId()} ORDER BY id DESC LIMIT 1";

        $pedido = $this->db->query($sql);

        return $pedido->fetch_object();
    }

    public function getAllByUser()
    {
        $sql = "SELECT p.* FROM pedidos p "
            . "WHERE p.usuario_id = {$this->getUsuarioId()} ORDER BY id DESC";

        $pedido = $this->db->query($sql);

        return $pedido;
    }

    public function getProductosByPedido($id)
    {
        /* $sql = "SELECT * FROM productos "
            . "WHERE id IN (SELECT producto_id FROM  lineas_pedidos WHERE pedido_id = {$id});"; */

        // Selecciona todos los campos de productos y las unidades de la línea de pedido correspondiente
        $sql = "SELECT pr.*, lp.unidades FROM productos pr "
            . "INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id "
            . "WHERE lp.pedido_id = {$id}";
        $productos = $this->db->query($sql);
        return $productos;
    }

    public function save()
    {
        $sql = "INSERT INTO pedidos VALUES(NULL, {$this->getUsuarioId()}, '{$this->getProvincia()}', '{$this->getLocalidad()}', '{$this->getDireccion()}', {$this->getCoste()}, 'confirm',CURDATE(), CURTIME());";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }


    // __METODOS DE LINEAS DE PEDIDOS__
    public function save_linea()
    {
        $sql = "SELECT LAST_INSERT_ID() AS 'pedido' ; ";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;

        foreach ($_SESSION['carrito'] as $elemento) {
            $producto = $elemento['producto'];
            $insert = "INSERT INTO lineas_pedidos VALUES(NULL, {$pedido_id}, {$producto->id}, {$elemento['unidades']})";
            $save = $this->db->query($insert);
            /*  var_dump($producto);
            var_dump($insert);
            echo $this->db->error;
            die(); */
        }

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function edit()
    {
        $sql = "UPDATE pedidos SET estado='{$this->getEstado()}'";
        $sql .= " WHERE id={$this->getId()};";


        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
}
