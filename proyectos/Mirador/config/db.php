<?php

class Database
{
    // Conexión a la BD 'mirador'
    public static function connect()
    {
        $db = new mysqli('localhost', 'root', '', 'mirador');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
