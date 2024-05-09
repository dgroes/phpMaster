<?php
require_once 'ModeloBase.php';
class Nota extends ModeloBase
{
    public $usuario_id;
    public $titulo;
    public $descripcion;

    public function __construct()
    {
        parent::__construct();
    }

    // Setter para usuario_id
    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    // Getter para usuario_id
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    // Setter para titulo
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    // Getter para titulo
    public function getTitulo()
    {
        return $this->titulo;
    }

    // Setter para descripcion
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    // Getter para descripcion
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function guardar()
    {
        $sql = "INSERT INTO notas(usuario_id, titulo, descripcion, fecha) VALUES ('{$this->usuario_id}', '{$this->titulo}', '{$this->descripcion}', CURDATE());";
        $guardado = $this->db->query($sql);
        return $guardado;
    }
}
