<?php
class Database
{
    public static function connect()
    {
        $db = new mysqli('localhost', 'host', '', 'large_blog');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
