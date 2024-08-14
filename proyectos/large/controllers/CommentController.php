<?php
require_once 'models/comment.php';

class CommentController 
{
    public function create()
    {
        Utils::isIdentity();
    }

    public function showComments(){
        Utils::isAdmin();
        $comment = new Comment();
        $allComments = $comment->getAllComments();
        require_once 'views/post/general_management.php';
    }
}
