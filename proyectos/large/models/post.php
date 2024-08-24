<?php

class Post
{
    private $id;
    private $user_id;
    private $title;
    private $sub_title;
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

    public function getSubTitle()
    {
        return $this->sub_title;
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

    public function setSubTitle($sub_title)
    {
        $this->sub_title = $sub_title;
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

    public function getOne()
    {
        $post = $this->db->query("SELECT posts.*, categories.name as category_name, users.username AS creator
                FROM posts 
                INNER JOIN categories ON posts.category_id = categories.id 
                INNER JOIN users ON posts.user_id = users.id 
                WHERE posts.id = {$this->getId()};");
        return $post->fetch_object();
    }

    //Obtener todas los post por rusuario
    public function getAllByUser($user_id)
    {
        $user_id = $this->db->real_escape_string($user_id);
        $sql = "SELECT posts.*, categories.name as category_name FROM posts LEFT JOIN categories on posts.category_id = categories.id WHERE posts.user_id = {$user_id} ORDER BY posts.created_at DESC;";
        $posts = $this->db->query($sql);
        return $posts;
    }

    public function getAllPosts()
    {
        $idUser = isset($_SESSION['identity']) ? $_SESSION['identity']->id : null;
        $sql = "SELECT posts.*, categories.name as category_name, users.username AS creator
                FROM posts 
                INNER JOIN categories ON posts.category_id = categories.id 
                INNER JOIN users ON posts.user_id = users.id ";

        //Si el user es Administrador
        if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {

            //NO Hay condición adicional, se muestran todos los posts existentes

        } elseif ($idUser) {

            //Si el user está logeado, se muestran los posts visibles y los suyos ocultos
            $sql .= "WHERE (posts.status = 'Visible' OR posts.user_id = $idUser)";
        } else {

            //Si el usuario no está logeado, se muestran solo los posts visibles
            $sql .= "WHERE posts.status = 'Visible'";
        }
        $sql .= " ORDER BY created_at DESC;";
        $posts = $this->db->query($sql);

        return $posts;
    }

    public function getPostMostComment()
    {
        $result = $this->db->query("SELECT comments.post_id, COUNT(comments.content) as contador, categories.name AS category_name, users.username AS creator, posts.status, posts.title AS title, posts.content AS content, posts.created_at AS created_at, posts.id as id
                                    FROM comments
                                    INNER JOIN posts ON posts.id = comments.post_id
                                    INNER JOIN categories ON categories.id = posts.category_id
                                    INNER JOIN users ON users.id = posts.user_id
                                    WHERE posts.status = 'Visible'
                                    GROUP BY post_id
                                    ORDER BY contador DESC
                                    LIMIT 2;");

        return $result;
    }

    public function getPostsByCategory($category)
    {
        $idUser = isset($_SESSION['identity']) ? $_SESSION['identity']->id : null;
        $sql = "SELECT posts.id AS id, posts.user_id AS user_id, posts.title AS title, posts.sub_title AS sub_title, posts.content AS content, posts.image AS image, posts.status AS status, posts.created_at AS created_at, posts.category_id AS category_id, categories.name AS category_name, users.username AS creator
            FROM posts
            INNER JOIN categories ON categories.id = posts.category_id
            INNER JOIN users ON users.id = posts.user_id ";

        // Siempre aplicar la condición de categoría
        $sql .= "WHERE categories.name = '$category' ";

        // Si el user es Administrador
        if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
            // No hay condición adicional, se muestran todos los posts de la categoría
        } elseif ($idUser) {
            // Si el user está logeado, se muestran los posts visibles y los suyos ocultos
            $sql .= "AND (posts.status = 'Visible' OR posts.user_id = $idUser) ";
        } else {
            // Si el usuario no está logeado, se muestran solo los posts visibles
            $sql .= "AND posts.status = 'Visible' ";
        }

        $sql .= "ORDER BY posts.created_at DESC;";
        $posts = $this->db->query($sql);

        return $posts;
    }


    //Se utilizó esta manera, ya que así se pueden manejar los datos si existen o no, por ejemplo si solo quiero actualizar el campo title esto ayuda que pueda hacer de manera correcta el UPDATE
    public function update()
    {
        $fields = [];
        if ($this->getTitle()) $fields[] = "title = '{$this->db->real_escape_string($this->getTitle())}'";
        if ($this->getSubTitle()) $fields[] = "sub_title = '{$this->db->real_escape_string($this->getSubTitle())}'";
        if ($this->getContent()) $fields[] = "content = '{$this->db->real_escape_string($this->getContent())}'";
        if ($this->getCategoryId()) $fields[] = "category_id = '{$this->db->real_escape_string($this->getCategoryId())}'";
        if ($this->getImage()) $fields[] = "image = '{$this->db->real_escape_string($this->getImage())}'";

        if (!empty($fields)) {
            $sql = "UPDATE posts SET " . implode(', ', $fields) . " WHERE id = '{$this->db->real_escape_string($this->getId())}'";
            $update = $this->db->query($sql);

            if (!$update) {
                // Log or debug the SQL error for further inspection
                echo "SQL Error: " . $this->db->error;
                return false;
            }

            return true;
        } else {
            return false;
        }
    }


    public function save()
    {
        $userId = $this->db->real_escape_string($this->getUserId());
        $title = $this->db->real_escape_string($this->getTitle());
        $sub_title = $this->db->real_escape_string($this->getSubTitle());
        $content = $this->db->real_escape_string($this->getContent());
        $image = $this->getImage() ? "'" . $this->db->real_escape_string($this->getImage()) . "'" : "NULL";
        $status = $this->getStatus() ? "'" . $this->db->real_escape_string($this->getStatus()) . "'" : "'Visible'";
        $categoryId = $this->getCategoryId() ? "'" . $this->db->real_escape_string($this->getCategoryId()) . "'" : "NULL";
        $sql = "INSERT INTO posts (id, user_id, title, sub_title, content, image, status, created_at, category_id) VALUES (NULL, '$userId', '$title', '$sub_title', '$content', $image, $status, NOW(), $categoryId)";
        $save = $this->db->query($sql);
        /* var_dump($sql);
        exit(); */
        $result = true;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function delete()
    {
        $sql = "DELETE FROM posts WHERE id = '{$this->getId()}';";
        $delete = $this->db->query($sql);
        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }

    public function updateStatus()
    {
        $sql = "UPDATE posts SET status = '{$this->getStatus()}' WHERE id = '{$this->getId()}';";
        /* var_dump($sql);
            exit();
 */
        $status = $this->db->query($sql);
        $result = false;
        if ($status) {
            $result = true;
        }
        return $result;
    }
}
