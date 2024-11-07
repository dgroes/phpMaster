<?php

class Person
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

    public function setCargoId($cargo_id)
    {
        $this->$cargo_id = $cargo_id;
    }

    public function workesData (){
        $id_worker = $_SESSION['identity']->id;
        $sql = "SELECT * FROM personas WHERE id = $id_worker";
        $worker = $this->db->query($sql);

        if ($worker && $worker->num_rows == 1) {
            //Transformar la consulta como objeto y almacenarla en $user
            $trabajador = $worker->fetch_object();
        }

    }
}
