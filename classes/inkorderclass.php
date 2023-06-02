<?php
require_once 'database.php';

class Inkooporder {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addInkoopOrder($levId, $artId, $inkOrdDatum, $inkOrdBestAantal, $inkOrdStatus) {
        $db = new Database();
    
        // Voer de query uit om een nieuwe inkooporder toe te voegen
        $query = "INSERT INTO inkooporders (levId, artId, inkOrdDatum, inkOrdBestAantal, inkOrdStatus)
                  VALUES (:levId, :artId, :inkOrdDatum, :inkOrdBestAantal, :inkOrdStatus)";
        $params = array(
            ':levId' => $levId,
            ':artId' => $artId,
            ':inkOrdDatum' => $inkOrdDatum,
            ':inkOrdBestAantal' => $inkOrdBestAantal,
            ':inkOrdStatus' => $inkOrdStatus
        );
    
        // Voer de query uit met de opgegeven parameters
        $result = $db->execute($query, $params);
    
        // Retourneer true als de query succesvol is uitgevoerd, anders false
        return $result;
    }
    
}
?>
