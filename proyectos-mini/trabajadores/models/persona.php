<?php

class Persona
{
    private $id;
    private $nombres;
    private $apellidos;
    private $cedula;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    //Getter de id
    public function getId()
    {
        return $this->id;
    }

    //Getter de nombres
    public function getNombres()
    {
        return $this->nombres;
    }

    //Getter de apellidos
    public function getApellidos()
    {
        return $this->apellidos;
    }

    //Getter de cedula
    public function getCedula()
    {
        return $this->cedula;
    }


    //Setter de id
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM personas;";
        $personas = $this->db->query($sql);
        return $personas;
    }
}
