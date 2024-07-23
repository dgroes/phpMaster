<?php

class Utils
{
    public static function deleteSession($name)
    {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }

    //Método para comprobar si un user es admin
    public static function isAdmin()
    {
        if (!isset($_SESSION['admin'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }

    public static function showCategories()
    {
        require_once 'models/category.php';
        $category = new Category();
        $categories = $category->getSome();
        return $categories;
    }
}
