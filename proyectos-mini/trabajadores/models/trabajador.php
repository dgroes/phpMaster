<?php

class Trabajador extends Persona
{
    private $id;
    private $persona_id;
    private $cargo_id;
    private $email;
    private $password;
    private $rol;
    private $db;

    public function __construct()
    {
        parent::__construct();  // Llama al constructor de Persona
        $this->db = Database::connect();
    }

    

    //Getter de id
    public function getId()
    {
        return $this->id;
    }

    //Getter de persona_id
    public function getPersonaId()
    {
        return $this->persona_id;
    }

    //Getter de cargo_id
    public function getCargoId()
    {
        return $this->cargo_id;
    }

    //Getter de email
    public function getEmail()
    {
        return $this->email;
    }

    //Getter de contraseña
    public function getPassword()
    {
        return $this->password;
    }

    //Getter de rol
    public function getRol()
    {
        return $this->rol;
    }


    //Setter de id
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPersonaId($persona_id)
    {
        $this->persona_id = $persona_id;
    }

    public function setCargoId($cargo_id)
    {
        $this->$cargo_id = $cargo_id;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function listarTodos()
    {
        $sql = "SELECT p.nombres AS nombres, p.apellidos AS apellidos, c.cargo AS cargo, p.cedula AS cedula, t.id AS id
                FROM personas p
                LEFT JOIN trabajadores t ON p.id = t.persona_id
                JOIN cargos c ON c.id = t.cargo_id
                WHERE t.persona_id = p.id;";
        $trabajadores = $this->db->query($sql);
        return $trabajadores;
    }

    public function guardar(){
        $sql = "INSERT INTO trabajadores VALUES (NULL, {})";
    }
}
