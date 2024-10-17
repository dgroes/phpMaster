<?php

class User
{
    private $id, $username, $email, $password, $db;

    public function __construct(int $id, string $username, string $email, string $password)
    {
        //Conexión a la BD
        $this->db = Database::connect();

        //Asignación de los valores
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    //Getter y Setter para id
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
}
