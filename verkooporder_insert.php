<?php

require_once 'classes/userclass.php';

$user = new User();
$verkooporder = new Verkooporder();

// Haal de lijst met klanten op
$klanten = $user->getKlanten();

// Haal de lijst met artikelen op
$artikelen = $user->getArtikelen();

// Verwerk het formulier indien verzonden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controleer of de array-sleutels zijn ingesteld
    if (isset($_POST['klantId'], $_POST['artId'], $_POST['verkOrdDatum'], $_POST['verkOrdStatus'], $_POST['verkOrdBestAantal'])) {
        // Verkrijg en stel de gegevens in van het verkooporder formulier
        $verkooporder->setKlantId($_POST['klantId']);
        $verkooporder->setArtId($_POST['artId']);
        $verkooporder->setVerkOrdDatum($_POST['verkOrdDatum']);
        $verkooporder->setVerkOrdStatus($_POST['verkOrdStatus']);
        $verkooporder->setVerkOrdBestAantal($_POST['verkOrdBestAantal']);

        // Voeg het verkooporder toe aan de database
        $verkooporder->addVerkooporder();

        // Geef een succesbericht weer
        echo "Verkooporder succesvol toegevoegd!";
    } else {
        echo "Niet alle vereiste velden zijn ingevuld!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Verkooporder aanmaken</title>
</head>
<body>
    <h2>Verkooporder aanmaken</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="klantId">Klant:</label>
        <select name="klantId" id="klantId">
            <?php foreach ($klanten as $klant) : ?>
                <option value="<?php echo $klant['klantid']; ?>"><?php echo $klant['klantnaam']; ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <label for="artId">Artikel:</label>
        <select name="artId" id="artId">
            <?php foreach ($artikelen as $artikel) : ?>
                <option value="<?php echo $artikel['artId']; ?>"><?php echo $artikel['artOmschrijving']; ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <label for="verkOrdDatum">Verkooporder datum:</label>
        <input type="date" id="verkOrdDatum" name="verkOrdDatum" required>
        <br><br>
        <label for="verkOrdStatus">Verkooporder status:</label>
        <input type="text" id="verkOrdStatus" name="verkOrdStatus" required>
        <br><br>
        <label for="verkOrdBestAantal">Verkooporder bestel aantal:</label>
        <input type="number" id="verkOrdBestAantal" name="verkOrdBestAantal" required>
        <br><br>
        <input type="submit" name="submit" value="Toevoegen">
    </form>
</body>
</html>
