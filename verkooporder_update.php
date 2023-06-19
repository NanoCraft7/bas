<?php

require_once 'classes/userclass.php';
require_once 'classes/verkorderclass.php';

$user = new User();
$verkooporder = new Verkooporder();

// Controleer of verkOrdId is opgegeven
if (isset($_GET['verkOrdId'])) {
    $verkOrdId = $_GET['verkOrdId'];

    // Controleer of het formulier is ingediend
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Haal de ingediende gegevens op
        $klantId = $_POST['klantId'];
        $artId = $_POST['artId'];
        $verkOrdDatum = $_POST['verkOrdDatum'];
        $verkOrdStatus = $_POST['verkOrdStatus'];
        $verkOrdBestAantal = $_POST['verkOrdBestAantal'];

        // Werk de verkooporder bij
        $verkooporder->updateVerkooporder($verkOrdId, $klantId, $artId, $verkOrdDatum, $verkOrdStatus, $verkOrdBestAantal);

        // Redirect naar verkooporders.php
        header('Location: verkooporders.php');
        exit();
    }

    // Haal de verkooporder op basis van verkOrdId
    $verkooporderData = $verkooporder->getVerkooporder($verkOrdId);

    // Haal de lijst met klanten op
    $klanten = $user->getKlanten();

    // Haal de lijst met artikelen op
    $artikelen = $user->getArtikelen();
} else {
    // Redirect naar verkooporders.php als verkOrdId niet is opgegeven
    header('Location: verkooporders.php');
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Verkooporder bijwerken</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/index.css">
</head>
<body>
    <h2>Verkooporder bijwerken</h2>

    <form method="post" action="">
        <input type="hidden" name="verkOrdId" value="<?php echo $verkOrdId; ?>">
        <label for="klantId">Klant:</label>
        <select name="klantId" id="klantId">
            <?php foreach ($klanten as $klant) : ?>
                <option value="<?php echo $klant['klantid']; ?>" <?php echo ($verkooporderData['klantId'] == $klant['klantid']) ? 'selected' : ''; ?>><?php echo $klant['klantnaam']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="artId">Artikel:</label>
        <select name="artId" id="artId">
            <?php foreach ($artikelen as $artikel) : ?>
                <option value="<?php echo $artikel['artId']; ?>" <?php echo ($verkooporderData['artId'] == $artikel['artId']) ? 'selected' : ''; ?>><?php echo $artikel['artOmschrijving']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="verkOrdDatum">Datum:</label>
        <input type="date" name="verkOrdDatum" id="verkOrdDatum" value="<?php echo $verkooporderData['verkOrdDatum']; ?>">
        <label for="verkOrdStatus">Status:</label>
        <select name="verkOrdStatus" id="verkOrdStatus">
            <option value="0" <?php echo ($verkooporderData['verkOrdStatus'] == '0') ? 'selected' : ''; ?>>In behandeling</option>
            <option value="1" <?php echo ($verkooporderData['verkOrdStatus'] == '1') ? 'selected' : ''; ?>>Verzonden</option>
            <option value="2" <?php echo ($verkooporderData['verkOrdStatus'] == '2') ? 'selected' : ''; ?>>Geleverd</option>
        </select>
        <label for="verkOrdBestAantal">Bestel aantal:</label>
        <input type="number" name="verkOrdBestAantal" id="verkOrdBestAantal" value="<?php echo $verkooporderData['verkOrdBestAantal']; ?>">
        <input type="submit" value="Bijwerken">
    </form>

    <a href="verkooporders.php" class="back-btn">Terug naar verkooporders</a>
</body>
</html>

