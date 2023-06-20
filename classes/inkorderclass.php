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
                  VALUES ('$this->leverancierId', '$this->artId', '$this->inkOrdDatum', '$this->inkOrdStatus', '$this->inkOrdBestAantal')";

        $this->db->executeQuery($query);
    }

    public function updateInkooporder($inkOrdId, $leverancierId, $artId, $inkOrdDatum, $inkOrdStatus, $inkOrdBestAantal)
    {
        $query = "UPDATE inkooporders SET leverancierId = '$leverancierId', artId = '$artId', inkOrdDatum = '$inkOrdDatum',
                  inkOrdStatus = '$inkOrdStatus', inkOrdBestAantal = '$inkOrdBestAantal' WHERE inkOrdId = '$inkOrdId'";

        $this->db->executeQuery($query);
    }

    public function updateInkooporderStatus($inkOrdId, $inkOrdStatus)
    {
        $query = "UPDATE inkooporders SET inkOrdStatus = '$inkOrdStatus' WHERE inkOrdId = '$inkOrdId'";

        $this->db->executeQuery($query);
    }

    public function verwijderInkooporder($inkOrdId)
    {
        $query = "DELETE FROM inkooporders WHERE inkOrdId = '$inkOrdId'";

        $this->db->executeQuery($query);
    }

    public function getInkooporder($inkOrdId)
    {
        $query = "SELECT * FROM inkooporders WHERE inkOrdId = '$inkOrdId'";

        $result = $this->db->executeQuery($query);

        return mysqli_fetch_assoc($result);
    }

    public function getInkooporders()
    {
        $query = "SELECT * FROM inkooporders";

        $result = $this->db->executeQuery($query);

        $inkooporders = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $inkooporders[] = $row;
        }

        return $inkooporders;
    }
}
?>
