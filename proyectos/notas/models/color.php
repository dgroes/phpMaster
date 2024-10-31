<?php
class Color
{
    private $id, $detail, $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // Getter de id
    public function getId()
    {
        return $this->id;
    }

    // Setter de id
    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter de detail
    public function getDetail()
    {
        return $this->detail;
    }

    // Setter de detail
    public function setDetail($detail)
    {
        $this->detail = $this->db->real_escape_string($detail);
    }

    public function getAll()
    {
        $colors = $this->db->query("SELECT * FROM colors ORDER BY detail DESC");
        return $colors;
    }
}
