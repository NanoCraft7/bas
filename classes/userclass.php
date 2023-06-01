<?php

class User
{
    private $klantnaam;
    private $klantEmail;
    private $klantAdres;
    private $klantPostcode;
    private $klantWoonplaats;
    private $db;

    public function __construct()
    {
        require_once 'classes/database.php';
        $this->db = new Database();
    }

    public function addUser()
    {
        // Controleer of de klant al bestaat
        $query = "SELECT * FROM klanten WHERE klantnaam = ?";
        $existingUser = $this->db->execute($query, array($this->klantnaam));

        if ($existingUser->fetch()) {
            // Er bestaat al een klant met dezelfde naam, geef een foutmelding terug
            return false;
        }

        // Voeg de klant toe aan de database
        $query = "INSERT INTO klanten (klantnaam, klantEmail, klantAdres, klantPostcode, klantWoonplaats) VALUES (?, ?, ?, ?, ?)";
        $this->db->execute($query, array($this->klantnaam, $this->klantEmail, $this->klantAdres, $this->klantPostcode, $this->klantWoonplaats));

        return true;
    }

    // Setter-methoden voor de eigenschappen van de gebruiker
    public function setKlantnaam($klantnaam)
    {
        $this->klantnaam = $klantnaam;
    }

    public function setKlantEmail($klantEmail)
    {
        $this->klantEmail = $klantEmail;
    }

    public function setKlantAdres($klantAdres)
    {
        $this->klantAdres = $klantAdres;
    }

    public function setKlantPostcode($klantPostcode)
    {
        $this->klantPostcode = $klantPostcode;
    }

    public function setKlantWoonplaats($klantWoonplaats)
    {
        $this->klantWoonplaats = $klantWoonplaats;
    }

    public function getKlanten()
    {
        $query = "SELECT * FROM klanten";
        return $this->db->fetchAll($query);
    }

    public function getArtikelen()
    {
        $query = "SELECT * FROM artikelen";
        return $this->db->fetchAll($query);
    }
}

class Verkooporder
{
    private $db;
    private $klantId;
    private $artId;
    private $verkOrdDatum;
    private $verkOrdStatus;
    private $verkOrdBestAantal;

    public function __construct()
    {
        require_once 'classes/database.php';
        $this->db = new Database();
    }

    public function setKlantId($klantId)
    {
        $this->klantId = $klantId;
    }

    public function setArtId($artId)
    {
        $this->artId = $artId;
    }

    public function setVerkOrdDatum($verkOrdDatum)
    {
        $this->verkOrdDatum = $verkOrdDatum;
    }

    public function setVerkOrdStatus($verkOrdStatus)
    {
        $this->verkOrdStatus = $verkOrdStatus;
    }

    public function setVerkOrdBestAantal($verkOrdBestAantal)
    {
        $this->verkOrdBestAantal = $verkOrdBestAantal;
    }

    public function addVerkooporder()
    {
        $query = "INSERT INTO verkooporders (klantId, artId, verkOrdDatum, verkOrdStatus, verkOrdBestAantal)
                  VALUES (?, ?, ?, ?, ?)";
        $values = array($this->klantId, $this->artId, $this->verkOrdDatum, $this->verkOrdStatus, $this->verkOrdBestAantal);
        $this->db->execute($query, $values);
    }

    // Haal de lijst met verkooporders op
    public function getVerkooporders()
    {
        $query = "SELECT * FROM verkooporders";
        return $this->db->fetchAll($query);
    }
}
?>
