<?php
require_once 'models/comment.php';

class CommentController
{
    public function create()
    {
        Utils::isIdentity();
    }

    public function save()
    {
        Utils::isIdentity();

        // Guardar la categoría a la BD
        if (isset($_POST) && isset($_POST['comentario']) && !empty($_POST['comentario'])) {
            $comment = new Category();
            $comment->setName($_POST['comentario']);

            if ($comment->nameExists()) {
                $_SESSION['register-comment'] = "duplicate"; // Mensaje de alerta
            } else {
                $save = $comment->save();

                // Mensajes de alerta
                if ($save) {
                    $_SESSION['register-comment'] = "complete";
                } else {
                    $_SESSION['register-comment'] = "failed_save";
                }
            }
        } else {
            $_SESSION['register-comment'] = "empty_name";
        }

        header("Location:" . base_url . "comment/index");
        exit();
    }

}
