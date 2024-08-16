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
        if (isset($_POST) && isset($_POST['content']) && !empty($_POST['content'])) {
            $comment = new Comment();
            // $postId = $_GET['id'];
            $postId = $_POST['post_id'];
            $comment->setPostId($postId); 
            $comment->setUserId($_SESSION['identity']->id);
            $comment->setContent($_POST['content']);
            $save = $comment->save();
            if ($save) {
                $_SESSION['register-comment'] = "complete";
            } else {
                $_SESSION['register-comment'] = "failed";
            }
        } else {
            $_SESSION['register-comment'] = "failed";
        }
        header("Location:" . base_url . "post/see&id=$postId");
        exit();
    }


}
