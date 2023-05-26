<?php

class UserClass
{
    private $db;
// aaa
    public function __construct()
    {
        require_once 'database.php';
        $this->db = new Database();
    }

    public function addUser($klantnaam, $klantEmail, $klantAdres, $klantPostcode, $klantWoonplaats)
    {
        $query = "INSERT INTO klanten (klantnaam, klantEmail, klantAdres, klantPostcode, klantWoonplaats) 
                  VALUES (?, ?, ?, ?, ?)";
        $params = array($klantnaam, $klantEmail, $klantAdres, $klantPostcode, $klantWoonplaats);
        
        return $this->db->executeQuery($query, $params);
    }
}
?>
