<?php

// Conexión a la BD
class Database
{
    public static function connect()
    {
        $db = new mysqli('localhost', 'root', '', 'sloth');
        $db->query("SET NAMES 'utf8mb4'"); /* Para admitir todos los caracteres Unicode, 'utf8mb4' mejora las limitaciones de 'utf8' // Con utf8mb4 incluso se podrán aceptar emojis*/ 
        return $db;
    }
}
