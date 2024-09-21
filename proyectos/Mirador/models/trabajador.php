<?php

class Trabajador
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

    public function login()
    {
        $result = false;
        $email = $this->email;
        $password = $this->password;


        //Comprobar si existe el usuario logeado
        $sql = "SELECT * FROM trabajadores WHERE email = '$email';";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            //Transformar la consulta como objeto y almacenarla en $user
            $trabajador = $login->fetch_object();

            //Verificar la contraseña
            // $verify = password_verify($password, $trabajador->password);
            if ($password === $trabajador->password) {
                $result = $trabajador;
            }

           /*  if ($verify) {
                $result = $trabajador;
            } */
        }

        return $result;
    }
}
