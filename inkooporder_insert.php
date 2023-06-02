<?php
require_once 'classes/database.php';
require_once 'classes/levclass.php';
require_once 'classes/inkorderclass.php';

$db = new Database();
$lev = new Leverancier();
$inkOrder = new Inkooporder();

// Verwerk het formulier voor het toevoegen van inkooporders
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Haal de ingevulde gegevens uit het formulier
    $levId = $_POST['levId'];
    $artId = $_POST['artId'];
    $inkOrdDatum = $_POST['inkOrdDatum'];
    $inkOrdBestAantal = $_POST['inkOrdBestAantal'];
    $inkOrdStatus = $_POST['inkOrdStatus'];

    // Maak een nieuw InkoopOrder object aan
    $inkoopOrder = new InkoopOrder();

    // Roep de methode aan om een inkooporder toe te voegen
    $result = $inkoopOrder->addInkoopOrder($levId, $artId, $inkOrdDatum, $inkOrdBestAantal, $inkOrdStatus);

    // Controleer het resultaat en geef een melding weer
    if ($result) {
        echo 'Inkooporder succesvol toegevoegd.';
    } else {
        echo 'Er is een fout opgetreden bij het toevoegen van de inkooporder.';
    }
}


$leveranciers = $lev->getLeveranciers();
$artikelen = $db->fetchAll("SELECT * FROM artikelen");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inkooporder toevoegen</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/index.css">
</head>
<body>
    <h1>Inkooporder toevoegen</h1>
    <form method="POST" action="">
        <label for="levId">Leverancier:</label>
        <select name="levId" id="levId">
            <?php foreach ($leveranciers as $leverancier): ?>
                <option value="<?php echo $leverancier['levid']; ?>"><?php echo $leverancier['levnaam']; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="artId">Artikel:</label>
        <select name="artId" id="artId">
            <?php foreach ($artikelen as $artikel): ?>
                <option value="<?php echo $artikel['artId']; ?>"><?php echo $artikel['artOmschrijving']; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="inkOrdDatum">Datum:</label>
        <input type="date" name="inkOrdDatum" id="inkOrdDatum" required><br><br>

        <label for="inkOrdBestAantal">Aantal:</label>
        <input type="number" name="inkOrdBestAantal" id="inkOrdBestAantal" required><br><br>

        <label for="inkOrdStatus">Inkooporder status:</label>
        <select name="inkOrdStatus" id="inkOrdStatus">
            <option value="0">In afwachting</option>
            <option value="1">In behandeling</option>
            <option value="2">Afgerond</option>
        </select><br><br>


        <input type="submit" value="Toevoegen">
    </form>
    <a href="index.php" class="back-btn">Terug naar hoofdmenu</a>
</body>
</html>
