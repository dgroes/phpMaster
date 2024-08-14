<?php
class Comment
{
    private $id;
    private $post_id;
    private $user_id;
    private $content;
    private $create_at;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getPostId()
    {
        return $this->post_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getCreateAt()
    {
        return $this->create_at;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPostId($post_id)
    {
        $this->post_id = $post_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setCreateAt($create_at)
    {
        $this->create_at = $create_at;
    }

    public function getAllComments()
    {
        $comments = $this->db->query("SELECT * FROM comments;");
        return $comments;
    }
}
