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
        // Obtener y limpiar los datos
        $username = $this->db->real_escape_string($this->getUsername());
        $email = $this->db->real_escape_string($this->getEmail());
        $password = $this->db->real_escape_string($this->getPassword());

        // Verificación si el username ya existe en la BD
        $sql_check_username = "SELECT id FROM users WHERE username = '$username'";
        $result_check_username = $this->db->query($sql_check_username);

        if ($result_check_username && $result_check_username->num_rows > 0) {
            return 'username'; // Indicar que ya existe un usuario con el mismo username
        }

        // Verificación si el email ya existe en la BD
        $sql_check_email = "SELECT id FROM users WHERE email = '$email'";
        $result_check_email = $this->db->query($sql_check_email);

        if ($result_check_email && $result_check_email->num_rows > 0) {
            return 'email'; // Indicar que ya existe un usuario con el mismo email
        }

        // Hashear la contraseña antes de guardar
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Realizar la inserción en la base de datos
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashed_password', '$email')";
        $save = $this->db->query($sql);

        if ($save) {
            return true; // Guardado exitoso
        } else {
            return false; // Fallo en el guardado
        }
    }


    public function login()
    {
        $result = false;
        $username = $this->getUsername();
        $password = $this->password; // Obtener la contraseña en texto plano

        // Comprobar si existe el usuario en la BD
        $sql = "SELECT * FROM users WHERE username = '$username';";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            $user = $login->fetch_object();

            // Verificar la contraseña usando password_verify
            $verify = password_verify($password, $user->password);

            // Depurar: Verificar si la contraseña es válida
            /* var_dump("Resultado de password_verify: " . $verify); die(); */

            if ($verify) {
                $result = $user; // Aquí asignamos el objeto usuario
            }
        }

        return $result; // Retorna el objeto usuario o false
    }
}
