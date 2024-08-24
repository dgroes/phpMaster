<?php
require_once 'models/like.php';

class LikeController
{

    public function add()
    {
        Utils::isIdentity();

        // Verificar que el usuario esté logueado
        if (isset($_SESSION['identity'])) {
            // Crear una instancia del modelo Like
            $like = new Like();

            // Asignar el ID del post y el ID del usuario al modelo

            $postId = $_POST['post_id'];
            $like->setPostId($_POST['post_id']); // ID del post desde la URL
            $like->setUserId($_SESSION['identity']->id); // ID del usuario desde la sesión

            // Llamar al método add() para guardar el like en la base de datos
            $save = $like->add();

            // Comprobar si la operación fue exitosa
            if ($save) {
                $_SESSION['like'] = "complete";
            } else {
                $_SESSION['like'] = "failed";
            }
        } else {
            $_SESSION['like'] = "failed";
        }

        // Redirigir de vuelta al post o a donde consideres adecuado
        header("Location:" . base_url . "post/see&id=$postId");
    }
}
