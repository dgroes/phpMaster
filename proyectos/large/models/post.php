<?php

class Post
{
    private $id;
    private $user_id;
    private $title;
    private $content;
    private $image;
    private $status;
    private $created_at;
    private $category_id;
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

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }


    //Obtener todas los post por rusuario
    public function getAllByUser($user_id)
    {
        $user_id = $this->db->real_escape_string($user_id);
        $sql = "SELECT posts.*, categories.name as category_name FROM posts LEFT JOIN categories on posts.category_id = categories.id WHERE posts.user_id = {$user_id} ORDER BY posts.created_at DESC;";
        $posts = $this->db->query($sql);
        return $posts;
    }


    public function save()
    {
        $userId = $this->db->real_escape_string($this->getUserId());
        $title = $this->db->real_escape_string($this->getTitle());
        $content = $this->db->real_escape_string($this->getContent());
        $image = $this->getImage() ? "'" . $this->db->real_escape_string($this->getImage()) . "'" : "NULL";
        $status = $this->getStatus() ? "'" . $this->db->real_escape_string($this->getStatus()) . "'" : "'Visible'";
        $categoryId = $this->getCategoryId() ? "'" . $this->db->real_escape_string($this->getCategoryId()) . "'" : "NULL";
        $sql = "INSERT INTO posts (id, user_id, title, content, image, status, created_at, category_id) VALUES (NULL, '$userId', '$title', '$content', $image, $status, NOW(), $categoryId)";
        $save = $this->db->query($sql);
        /* var_dump($sql);
        exit(); */
        $result = true;
        if ($save) {
            $result = true;
        }
        return $result;
    }
}
