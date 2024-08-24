<?php
require_once 'models/like.php';

class LikeController
{

    public function add()
    {
        Utils::isIdentity();

        if (isset($_SESSION['identity'])) {
            $userId = $_SESSION['identity']->id;
            $postId = $_POST['post_id'];

            $like = new Like();
            $dislike = new Dislike();

            if ($like->userHasLiked($postId, $userId)) {
                // Si el usuario ya ha dado "Like", eliminar el "Like"
                $like->removeLike($postId, $userId);
                $_SESSION['like'] = "removed";
            } else {
                // Si el usuario ha dado "Dislike", eliminar el "Dislike"
                if ($dislike->userHasDisliked($postId, $userId)) {
                    $dislike->removeDislike($postId, $userId);
                }
                // Añadir el "Like"
                $like->setPostId($postId);
                $like->setUserId($userId);
                $save = $like->add();

                $_SESSION['like'] = $save ? "complete" : "failed";
            }

            header("Location:" . base_url . "post/see&id=$postId");
            exit();
        }
    }
}
