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
        return $this->db->fetchAll($query);
    }

    public function verwijderArtikel($artikelId)
    {
        $query = "DELETE FROM artikelen WHERE artId = :artId";
        $params = array(':artId' => $artikelId);
        $this->db->execute($query, $params);
    }
}

?>
