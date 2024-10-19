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

    public function __construct(string $username, string $email, string $password)
    {
        $this->db = Database::connect();

        // Validar los valores antes de asignarlos
        if (!empty($username) && !empty($email) && !empty($password)) {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        } else {
            throw new Exception("Los valores de username, email o password no son válidos.");
        }
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
        $username = $this->db->real_escape_string($this->getUsername());
        $password = $this->db->real_escape_string($this->getPassword());
        $email = $this->db->real_escape_string($this->getEmail());

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
            $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email');";
            $save = $this->db->query($sql);

            if ($save) {
                return true;
            } else {
                return false;
            }
        }

        return $errors;
    }
}
