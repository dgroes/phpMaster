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
        $this->name = $name;
    }

    public function getAll(){
        $categories = $this->db->query("SELECT * FROM categories;");
        return $categories;
    }
}
