<?php

class Note
{
    private $id, $user_id, $color_id, $title, $content, $created_at, $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // Getter y Setter para id
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    // Getter y Setter para user_id
    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id)
    {
        $this->user_id = $user_id;
    }

    // Getter y Setter para color_id
    public function getColorId(): int
    {
        return $this->color_id;
    }

    public function setColorId(int $color_id)
    {
        $this->color_id = $color_id;
    }

    // Getter y Setter para title
    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    // Getter y Setter para content
    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content)
    {
        $this->content = $content;
    }

    // Getter y Setter para created_at
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at)
    {
        $this->created_at = $created_at;
    }

    public function getAllByUser($user_id)
    {
        //Escapado de datos de entrada
        $user_id = $this->db->real_escape_string($user_id);
        $sql = "SELECT n.id, n.title, n.content, c.detail as color, n.created_at, u.username
                FROM notes n
                INNER JOIN users u ON n.user_id = u.id
                INNER JOIN colors c ON n.color_id = c.id
                WHERE n.user_id = {$user_id}
                ORDER BY n.created_at DESC;";
        $notes = $this->db->query($sql);
        return $notes;
    }
}
