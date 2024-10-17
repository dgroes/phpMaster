<?php

class User
{
    private $id, $username, $email, $password, $db;

    /**
     * Constructor de la clase User
     *
     * @param Database $db Conexión a la base de datos
     * @param int $id ID del usuario
     * @param string $username Nombre de usuario
     * @param string $email Correo electrónico
     * @param string $password Contraseña en texto plano
     */

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

    //Get y Set para usernames
    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username)
    {
        $this->username = $this->db->real_escape_string($username);
    }

    //Get y Set para email
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $this->db->real_escape_string($email);
    }

    // Getter y Setter para password
    public function getPassword(): string
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }


    //Insertar los valores recogidos en la BD
    public function save()
    {
        $sql = "INSERT INTO users VALUES (NULL, '{$this->getUsername()}', '{$this->getEmail()}', '{$this->getPassword()}'";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
}
