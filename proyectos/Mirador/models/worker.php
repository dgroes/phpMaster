<?php

class Worker extends Person
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

    //Método para verificar las credenciales del login
    public function verifyCredentials()
    {
        $result = false;
        $email = $this->email;
        $password = $this->password;


        //Comprobar si existe el usuario logeado
        $sql = "SELECT * FROM trabajadores WHERE email = '$email';";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            //Transformar la consulta como objeto y almacenarla en $user
            $worker = $login->fetch_object();

            //Verificar la contraseña
            $verify = password_verify($password, $worker->password);
            
            /* var_dump($verify);
            die();
 */
            if ($verify) {
                $result = $worker;
            }
        }

        return $result;
    }

    //Método para registrar un usuario 
    public function save()
    {
        $persona_id = $this->db->real_escape_string($this->getPersonaId());
        $cargo_id = $this->db->real_escape_string($this->getCargoId());
        $email = $this->db->real_escape_string($this->getEmail());
        $segura = $this->db->real_escape_string($this->getPassword());

        $sql = "INSERT INTO trabajadores (persona_id, cargo_id, email, password ) VALUES ('$persona_id', '1', '$email', '$segura');";
        $save = $this->db->query($sql);

        if ($save) {
            return true;
        } else {
            return false;
        }
    }



    public function workesData()
    {
        $id_worker = $_SESSION['identity']->id;
        $sql = "SELECT * FROM personas WHERE id = $id_worker";
        $worker = $this->db->query($sql);

        if ($worker && $worker->num_rows == 1) {
            //Transformar la consulta como objeto y almacenarla en $user
            $trabajador = $worker->fetch_object();
        }
    }
}
