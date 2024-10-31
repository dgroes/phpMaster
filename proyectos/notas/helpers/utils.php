<?php

class Utils
{
    public static function deleteSession($user)
    {
        if (isset($_SESSION[$user])) {
            $_SESSION[$user] = null;
            unset($_SESSION[$user]);
        }
        return $user;
    }

    public static function isIdentity()
    {
        if (!isset($_SESSION['identity'])) {
            header('Location:' . base_url);
            exit();
        } else {
            return true;
        }
    }

    public static function showColors()
    {
        require_once 'models/color.php';
        $color = new Color();
        $colors = $color->getAll();
        return $colors;
    }
}
