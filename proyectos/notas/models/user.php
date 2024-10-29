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

    public function __construct()
    {
        $this->db = Database::connect();
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

    // Getter y Setter para email
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);
    }

    // Getter y Setter para password
    public function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }


    public function save()
    {

        $username = $this->db->real_escape_string($this->getUsername());
        $password = $this->db->real_escape_string($this->getPassword());
        $email = $this->db->real_escape_string($this->getEmail());

        //Verificación si el username ya existen en la BD
        $sql_check_username = "SELECT id FROM users WHERE username = '$username'";
        $result_check_username = $this->db->query($sql_check_username);

        if ($result_check_username && $result_check_username->num_rows > 0) {
            return 'username'; //Indicar que ya existe un usuario con el mismo username
        }

        //Verificación si el email ya existe en la BD
        $sql_check_email = "SELECT id FROM users WHERE email = '$email'";
        $result_check_email = $this->db->query($sql_check_email);

        if ($result_check_email && $result_check_email->num_rows > 0) {
            return 'email'; //Indicar que ya existe un usuario con el mismo email
        }

        if (empty($errors)) {
            $sql = "INSERT INTO users VALUES(NULL, '$username', '$password', '{$this->getEmail()}');";
            $save = $this->db->query($sql);
        }
        $result = false;

        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function login()
    {
        $result = false;
        $email = $this->email;
        $password = $this->password;

        //Comprobar si existe el usuario
        $sql = "SELECT * FROM users WHERE email = '$email';";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            $usuario = $login->fetch_object();
            //Verificar la contraseña
            $verify = password_verify($password, $usuario->password);
            /*  var_dump($verify);
            die(); */

            if ($verify) {
                $result = $usuario;
            }
        }
        return $result;
    }
}
