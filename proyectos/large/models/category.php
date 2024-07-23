<?php
class Category
{
    private $id;
    private $name;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }
    // Getter for id
    public function getId()
    {
        return $this->id;
    }

    // Setter for id
    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter for name
    public function getName()
    {
        return $this->name;
    }

    // Setter for name
    public function setName($name)
    {
        $this->name = $this->db->real_escape_string($name);
    }

    public function getAll()
    {
        $categories = $this->db->query("SELECT * FROM categories ORDER BY id DESC;");
        return $categories;
    }

    public function getSome(){
        $categories = $this->db->query("SELECT * FROM categories ORDER BY id DESC LIMIT 8");
        return $categories;
    }

    public function getOne()
    {
        $category = $this->db->query("SELECT * FROM categories WHERE id = {$this->getId()};");
        return $category->fetch_object();
    }

    public function save()
    {
        //Escapar los datos antes de introducirlos a la BD
        $name = $this->db->real_escape_string($this->getName());

        $sql = "INSERT INTO categories VALUES (NULL, '$name')";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function delete()
    {
        $sql = "DELETE FROM categories WHERE id = '{$this->getId()}';";
        $delete = $this->db->query($sql);
        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }

    public function update()
    {
        $sql = "UPDATE categories SET name = '{$this->getName()}' WHERE id = {$this->getId()};";
        $update = $this->db->query($sql);
        $result = false;
        if ($update) {
            $result = true;
        }
        return $result;
    }

    public function nameExists()
    {
        $sql = "SELECT * FROM categories WHERE name = '{$this->getName()}'";
        $result = $this->db->query($sql);
        return $result->num_rows > 0;
    }
}
