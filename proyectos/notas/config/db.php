<?php
class Database
{
    // ESTABLECER LA CONEXIÓN A LA BD
    public static function connect()
    {
        $db = new mysqli('localhost', 'root', '', 'notes');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
