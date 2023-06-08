<?php

class Artikel
{
    private $db;

    public function __construct()
    {
        require_once 'classes/database.php';
        $this->db = new Database();
    }

    public function getArtikelen()
    {
        $query = "SELECT * FROM artikelen";
        $result = $this->db->execute($query);
        return $result;
    }
}

?>
