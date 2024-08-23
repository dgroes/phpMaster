<?php

class Dislike
{
    private $id;
    private $post_id;
    private $user_id;
    private $created_at;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // Getter y Setter para id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter y Setter para post_id
    public function getPostId()
    {
        return $this->post_id;
    }

    public function setPostId($post_id)
    {
        $this->post_id = $post_id;
    }

    // Getter y Setter para user_id
    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    // Getter y Setter para created_at
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function add()
    {
        $postId = $this->db->real_escape_string($this->getPostId());
        $userId = $this->db->real_escape_string($this->getUserId());
        $sql = "INSERT INTO dislikes (id, post_id, user_id, created_at) VALUES (NULL, '$postId', '$userId', NOW());";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function countDislikesByPost($postId)
    {
        $result = $this->db->query("SELECT COUNT(*) AS total FROM dislikes WHERE post_id = $postId;");
        return $result->fetch_object()->total;
    }
}
