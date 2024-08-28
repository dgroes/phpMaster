<?php

class User
{
    private $id;
    private $username;
    private $bio;
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

    // Getter and setter for bio
    public function getBio()
    {
        return $this->bio;
    }

    public function setBio($bio)
    {
        $this->bio = $bio;
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

        //Verificación si el username ya existen en la BD
        $sql_check_username = "SELECT id FROM users WHERE username = '$username'";
        $result_check_username = $this->db->query($sql_check_username);

        if ($result_check_username && $result_check_username->num_rows > 0) {
            return 'username'; //Indicar que ya existe un usuario con el mismo username o email
        }

        //Verificación si el email ya existe en la BD
        $sql_check_email = "SELECT id FROM users WHERE email = '$email'";
        $result_check_email = $this->db->query($sql_check_email);

        if ($result_check_email && $result_check_email->num_rows > 0) {
            return 'email'; //Indicar que ya existe un usuario con el mismo email
        }

        if (empty($errors)) {
            $sql = "INSERT INTO users (username, password, email, rol) VALUES ('$username', '$password', '$email', '$rol')";
            $save = $this->db->query($sql);

            if ($save) {
                return true;
            } else {
                return false;
            }
        }

        return $errors;
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

    public function update()
    {
        $fields = [];
        if ($this->getBio()) {
            $fields[] = "bio = '{$this->db->real_escape_string($this->getBio())}'";
        }

        if (!empty($fields)) { // Cambiado a !empty
            $sql = "UPDATE users SET " . implode(', ', $fields) . " WHERE id = '{$this->db->real_escape_string($this->getId())}'";
            $update = $this->db->query($sql);

            if (!$update) {
                // Mostrar el error SQL para depuración
                echo "SQL Error: " . $this->db->error;
                return false;
            }

            return true;
        } else {
            return false;
        }
    }


    public function getOneUser()
    {
        $user = $this->db->query("SELECT * FROM users WHERE id = {$this->getId()};");
        return $user->fetch_object();
    }

    public function getPerfilByUser($user_id){

    }
}
