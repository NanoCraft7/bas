<?php

require_once 'classes/database.php';
require_once 'classes/userclass.php';
require_once 'classes/inkorderclass.php';

$user = new User();
$inkooporder = new Inkooporder();

// Haal de lijst met leveranciers op
$leveranciers = $user->getLeveranciers();

// Haal de lijst met artikelen op
$artikelen = $user->getArtikelen();

// Verwerk het formulier indien verzonden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controleer of de array-sleutels zijn ingesteld
    if (isset($_POST['leverancierId'], $_POST['artId'], $_POST['inkOrdDatum'], $_POST['inkOrdStatus'], $_POST['inkOrdBestAantal'])) {
        // Verkrijg en stel de gegevens in van het inkooporder formulier
        $inkooporder->setLeverancierId($_POST['leverancierId']);
        $inkooporder->setArtId($_POST['artId']);
        $inkooporder->setInkOrdDatum($_POST['inkOrdDatum']);
        $inkooporder->setInkOrdBestAantal($_POST['inkOrdBestAantal']);
        $inkooporder->setInkOrdStatus($_POST['inkOrdStatus']);

        // Voeg het inkooporder toe aan de database
        $inkooporder->addInkooporder();

        // Geef een succesbericht weer
        echo "Inkooporder succesvol toegevoegd!";
    } else {
        echo "Niet alle vereiste velden zijn ingevuld!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Inkooporder aanmaken</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/index.css">
</head>
<body>
    <h2>Inkooporder aanmaken</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="leverancierId">Leverancier:</label>
        <select name="leverancierId">
            <option>Doritos Co.</option>
            <?php foreach ($leveranciers as $leverancier) { ?>
                <option value="<?php echo $leverancier['levId']; ?>"><?php echo $leverancier['levNaam']; ?></option>
            <?php } ?>
        </select>
        <br><br>
        <label for="artId">Artikel:</label>
        <select name="artId" id="artId">
            <?php foreach ($artikelen as $artikel) : ?>
                <option value="<?php echo $artikel['artId']; ?>"><?php echo $artikel['artOmschrijving']; ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <label for="inkOrdDatum">Inkooporder datum:</label>
        <input type="date" id="inkOrdDatum" name="inkOrdDatum" required>
        <br><br>
        <label for="inkOrdBestAantal">Inkooporder bestel aantal:</label>
        <input type="number" id="inkOrdBestAantal" name="inkOrdBestAantal" required>
        <br><br>
        <label for="inkOrdStatus">Inkooporder status:</label>
        <select name="inkOrdStatus" id="inkOrdStatus">
            <option value="0">In afwachting</option>
            <option value="1">In behandeling</option>
            <option value="2">Afgerond</option>
        </select><br><br>
        <input type="submit" name="submit" value="Toevoegen">
    </form>
    <a href="index.php" class="back-btn">Terug naar hoofdmenu</a>
</body>
</html>
