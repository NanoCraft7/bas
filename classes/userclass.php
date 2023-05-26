<?php

class User
{
    private $db;

    public function __construct()
    {
        require_once 'database.php';
        $this->db = new Database();
    }

    public function addUser($klantnaam, $klantEmail, $klantAdres, $klantPostcode, $klantWoonplaats)
    {
        $query = "INSERT INTO klanten (klantnaam, klantEmail, klantAdres, klantPostcode, klantWoonplaats) VALUES (?, ?, ?, ?, ?)";
        $values = array($klantnaam, $klantEmail, $klantAdres, $klantPostcode, $klantWoonplaats);
        $this->db->execute($query, $values);
    }
}
?>