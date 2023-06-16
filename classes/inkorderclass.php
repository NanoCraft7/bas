<?php
class Inkooporder
{
    private $db;
    private $leverancierId;
    private $artId;
    private $inkOrdDatum;
    private $inkOrdStatus;
    private $inkOrdBestAantal;

    public function __construct()
    {
        require_once 'classes/database.php';
        $this->db = new Database();
    }

    public function setLeverancierId($leverancierId)
    {
        $this->leverancierId = $leverancierId;
    }

    public function setArtId($artId)
    {
        $this->artId = $artId;
    }

    public function setInkOrdDatum($inkOrdDatum)
    {
        $this->inkOrdDatum = $inkOrdDatum;
    }

    public function setInkOrdStatus($inkOrdStatus)
    {
        $this->inkOrdStatus = $inkOrdStatus;
    }

    public function setInkOrdBestAantal($inkOrdBestAantal)
    {
        $this->inkOrdBestAantal = $inkOrdBestAantal;
    }

    public function addInkooporder()
    {
        $query = "INSERT INTO inkooporders (leverancierId, artId, inkOrdDatum, inkOrdStatus, inkOrdBestAantal)
                  VALUES (?, ?, ?, ?, ?)";
        $values = array($this->leverancierId, $this->artId, $this->inkOrdDatum, $this->inkOrdStatus, $this->inkOrdBestAantal);
        return $this->db->execute($query, $values);
    }

    // Haal de lijst met inkooporders op
    public function getLeveranciers()
    {
        $query = "SELECT * FROM leveranciers";
        return $this->db->fetchAll($query);
    }

    public function updateInkooporderStatus($inkOrdId, $inkOrdStatus)
    {
        $query = "UPDATE inkooporders SET inkOrdStatus = ? WHERE inkOrdId = ?";
        $values = array($inkOrdStatus, $inkOrdId);
        $this->db->execute($query, $values);
    }

    public function verwijderInkooporder($inkOrdId)
    {
        $query = "DELETE FROM inkooporders WHERE inkOrdId = :inkOrdId";
        $params = array(':inkOrdId' => $inkOrdId);
        $this->db->execute($query, $params);
    }

    public function getInkooporders()
    {
        $query = "SELECT * FROM inkooporders";
        return $this->db->fetchAll($query);
    }
    
}
?>
