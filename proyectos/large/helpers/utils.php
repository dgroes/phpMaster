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

    public static function showAllCategories(){
        require_once 'models/category.php';
        $category = new Category();
        $categories = $category->getAll();
        return $categories;
    }

    // Función para verficar el ususario a travez de su id de sessión
    public static function isIdentity()
    {
        if (!isset($_SESSION['identity'])) {
            header('Location:' . base_url);
            exit();
        } else {
            return true;
        }
    }

    public static function showComments(){
        require_once 'models/comment.php';
        $comment = new Comment();
        $allComments = $comment->getAllComments();
        return $allComments;
    }

    
}
