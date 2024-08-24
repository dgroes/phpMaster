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
            exit();
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

    public static function showAllCategories()
    {
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

    public static function showComments()
    {
        require_once 'models/comment.php';
        $postId = $_GET['id']; // Asegúrate de que 'id' está en la URL y contiene el ID correcto
        $comment = new Comment();
        $comment->setPostId($postId);
        $allComments = $comment->getAllCommentByPost();
        return $allComments;
    }

    public static function timeAgo($datetime)
    {
        // Asegúrate de que ambas fechas estén en la misma zona horaria
        $now = new DateTime('now', new DateTimeZone('America/Santiago')); // Ajusta la zona horaria según sea necesario
        $date = new DateTime($datetime, new DateTimeZone('America/Santiago'));

        $diff = $now->diff($date);

        if ($diff->y > 0) {
            return $date->format('d M Y');
        } elseif ($diff->m > 0 || $diff->d > 0) {
            return $date->format('d M');
        } elseif ($diff->h > 0) {
            return 'hace ' . $diff->h . ' horas';
        } elseif ($diff->i > 0) {
            return 'hace ' . $diff->i . ' minutos';
        } else {
            return 'hace unos momentos';
        }
    }

    public static function showLikes()
    {
        require_once 'models/like.php';
        $postId = $_GET['id'];
        $like = new Like();
        $like->setPostId($postId);
        $allLikes = $like->countLikesByPost($postId);
        return $allLikes;
    }

    public static function showDislikes()
    {
        require_once 'models/dislike.php';
        $postId = $_GET['id'];
        $dislike = new Dislike();
        $dislike->setPostId($postId);
        $allDislikes = $dislike->countDislikesByPost($postId);
        return $allDislikes;
    }
}
