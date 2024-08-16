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

    //Método de prueba para conseguir todos lso comentarios, independiente del post
    public function getAllComments()
    {
        $comments = $this->db->query("SELECT posts.id AS post_id, posts.user_id AS creator_id, comments.content AS comment, comments.id AS comment_id, users.username AS creator, comments.created_at AS created_at
                                    FROM posts
                                    INNER JOIN comments ON posts.id = comments.post_id
                                    INNER JOIN users ON comments.user_id = users.id;");
        return $comments;
    }

    //Metodo para conseguir todos los comentarios pero por post
    public function getAllCommentByPost()
    {
        $postId = $this->getPostId();
        /*  var_dump($postId); 
        die();  */

        if ($postId) {
            $comments = $this->db->query("SELECT posts.id AS post_id, posts.user_id AS creator_id, comments.content AS comment, comments.id AS comment_id, users.username AS creator, comments.created_at AS created_at
                                            FROM posts
                                            INNER JOIN comments ON posts.id = comments.post_id
                                            INNER JOIN users ON comments.user_id = users.id
                                            WHERE posts.id = {$postId}
                                            ORDER BY created_at DESC;");
            return $comments;
        } else {
            return null; // Si no hay post_id, regresa null
        }
    }


    public function save()
    {
        // $userId = $this->db->real_escape_string($this->get());
        $postId = $this->db->real_escape_string($this->getPostId());
        $userId = $this->db->real_escape_string($this->getUserId());
        $content = $this->db->real_escape_string($this->getContent());
        $sql = "INSERT INTO comments (id, post_id, user_id, content, created_at) VALUES (NULL, '$postId', '$userId', '$content', NOW());";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function countCommentsByPost($postId)
    {
        $result = $this->db->query("SELECT COUNT(*) AS total FROM comments WHERE post_id = $postId;");
        return $result->fetch_object()->total;
    }
}
