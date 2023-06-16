<?php
require_once 'classes/database.php';
require_once 'classes/userclass.php';
require_once 'classes/inkorderclass.php';

$user = new User();
$inkooporder = new Inkooporder();

// Haal de lijst met inkooporders op
$inkooporders = $inkooporder->getInkooporders();

// Haal de lijst met leveranciers op
$leveranciers = $user->getLeveranciers();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Inkooporders</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/index.css">
</head>
<body>
    <h2>Inkooporders</h2>
    <table>
        <tr>
            <th>Leverancier</th>
            <th>Artikel</th>
            <th>Inkooporder datum</th>
            <th>Inkooporder status</th>
            <th>Inkooporder bestel aantal</th>
        </tr>
        <?php foreach ($inkooporders as $inkooporder) {
            // Controleer of de array-sleutels zijn ingesteld
            if (isset($inkooporder['leverancierId'], $inkooporder['artId'], $inkooporder['inkOrdDatum'], $inkooporder['inkOrdStatus'], $inkooporder['inkOrdBestAantal'])) {
                $leverancierId = $inkooporder['leverancierId'];
                $artId = $inkooporder['artId'];
                $inkOrdDatum = $inkooporder['inkOrdDatum'];
                $inkOrdStatus = $inkooporder['inkOrdStatus'];
                $inkOrdBestAantal = $inkooporder['inkOrdBestAantal'];

                // Haal de leverancier en artikelgegevens op
                $leverancier = $user->zoekLeverancierOpId($leverancierId);
                $artikel = $user->zoekArtikelOpId($artId);

                // Controleer of de leverancier en artikelgegevens zijn gevonden
                if ($leverancier && $artikel) {
                    $levNaam = $leverancier[0]['levNaam'];
                    $artOmschrijving = $artikel[0]['artOmschrijving'];
                    ?>
                    <tr>
                        <td><?php echo $levNaam; ?></td>
                        <td><?php echo $artOmschrijving; ?></td>
                        <td><?php echo $inkOrdDatum; ?></td>
                        <td><?php echo $inkOrdStatus; ?></td>
                        <td><?php echo $inkOrdBestAantal; ?></td>
                    </tr>
                    <?php
                }
            }
        } ?>
    </table>
    <a href="index.php" class="back-btn">Terug naar hoofdmenu</a>
</body>
</html>
