<?php

class User
{
    private $id;
    private $username;
    private $password;
    private $email;
    private $rol;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // Getter and setter for id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter and setter for username
    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    // Getter and setter for password
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    // Getter and setter for email
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Getter and setter for rol
    public function getRol()
    {
        return $this->rol;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function save()
    {
        $username = $this->db->real_escape_string($this->getUsername());
        $password = $this->db->real_escape_string($this->getPassword());
        $email = $this->db->real_escape_string($this->getEmail());
        $rol = $this->db->real_escape_string($this->getRol());

        $sql = "INSERT INTO users (username, password, email, rol) VALUES ('$username', '$password', '$email', '$rol');";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function login()
    {
        $result = false;
        $email = $this->getEmail(); //tambien se deería probar si funciona y si es mejor con $hits->email, al igual que la password
        $password = $this->getPassword();

        //Comprobar si existe el usuario
        $sql = "SELECT * FROM users WHERE email = '$email';";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            $user = $login->fetch_object();

            //Verificar la contraseña
            $verify = password_verify($password, $user->password);

            if ($verify) {
                $result = $user;
            }
        }

        return $result;
    }
}
