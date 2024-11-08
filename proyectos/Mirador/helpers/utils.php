<?php

class Utils
{

    // Delete Session
    public static function deleteSession($name)
    {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }

    // Is Admin
    public static function isAdmin()
    {
        if (!isset($_SESSION['admin'])) {
            header("Location:" . base_url);
            exit();
        } else {
            return true;
        }
    }

    public static function showBuilding(){
        
    }
}
