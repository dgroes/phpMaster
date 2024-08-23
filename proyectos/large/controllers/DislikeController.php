<?php
require_once 'models/dislike.php';

class DislikeController
{

    public function add()
    {
        Utils::isIdentity();

        // Verificar que el usuario esté logueado
        if (isset($_SESSION['identity'])) {
            // Crear una instancia del modelo Like
            $dislike = new Dislike();

            // Asignar el ID del post y el ID del usuario al modelo

            $postId = $_POST['post_id'];
            $dislike->setPostId($_POST['post_id']); // ID del post desde la URL
            $dislike->setUserId($_SESSION['identity']->id); // ID del usuario desde la sesión

            // Llamar al método add() para guardar el dislike en la base de datos
            $save = $dislike->add();

            // Comprobar si la operación fue exitosa
            if ($save) {
                $_SESSION['dislike'] = "complete";
            } else {
                $_SESSION['dislike'] = "failed";
            }
        } else {
            $_SESSION['dislike'] = "failed";
        }

        // Redirigir de vuelta al post o a donde consideres adecuado
        header("Location:" . base_url . "post/see&id=$postId");
    }
}
