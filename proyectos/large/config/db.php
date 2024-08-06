<?php
class Database
{
    public static function connect()
    {
        try {
            $db = new mysqli('localhost', 'root', '', 'large');
            if ($db->connect_error) {
                throw new Exception("Error de conexión a la base de datos: " . $db->connect_error);
            }
            $db->query("SET NAMES 'utf8'");
            return $db;
        } catch (Exception $e) {
            error_log($e->getMessage());
            die("No se puede conectar a la base de datos en este momento. Por favor, inténtelo más tarde.");
        }
    }
}
