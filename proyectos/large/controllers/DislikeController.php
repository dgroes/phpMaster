<?php
require_once 'models/dislike.php';

class DislikeController
{
    public function add()
    {
        Utils::isIdentity();

        if (isset($_SESSION['identity'])) {
            $userId = $_SESSION['identity']->id;
            $postId = $_POST['post_id'];

            $dislike = new Dislike();
            $like = new Like();

            if ($dislike->userHasDisliked($postId, $userId)) {
                // Si el usuario ya ha dado "Dislike", eliminar el "Dislike"
                $dislike->removeDislike($postId, $userId);
                $_SESSION['dislike'] = "removed";
            } else {
                // Si el usuario ha dado "Like", eliminar el "Like"
                if ($like->userHasLiked($postId, $userId)) {
                    $like->removeLike($postId, $userId);
                }
                // Añadir el "Dislike"
                $dislike->setPostId($postId);
                $dislike->setUserId($userId);
                $save = $dislike->add();

                $_SESSION['dislike'] = $save ? "complete" : "failed";
            }

            header("Location:" . base_url . "post/see&id=$postId");
            exit();
        }
    }
}
