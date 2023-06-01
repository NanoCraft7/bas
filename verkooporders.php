<?php

require_once 'classes/userclass.php';

$user = new User();
$verkooporder = new Verkooporder();

// Haal de lijst met verkooporders op
$verkooporders = $verkooporder->getVerkooporders();

// Haal de lijst met klanten op
$klanten = $user->getKlanten();

// Haal de lijst met artikelen op
$artikelen = $user->getArtikelen();

// Voeg klantnaam en artikelomschrijving toe aan verkooporders
foreach ($verkooporders as &$order) {
    $klantId = $order['klantId'];
    $artId = $order['artId'];

    // Haal klantnaam op
    $klant = $klanten[array_search($klantId, array_column($klanten, 'klantid'))];
    $order['klantnaam'] = $klant['klantnaam'];

    // Haal artikelomschrijving op
    $artikel = $artikelen[array_search($artId, array_column($artikelen, 'artId'))];
    $order['artOmschrijving'] = $artikel['artOmschrijving'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Verkooporders inzien</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/index.css">
</head>
<body>
    <h2>Verkooporders inzien</h2>

    <h3>Verkooporders</h3>
    <table>
    <thead>
        <tr>
            <th>Verkooporder ID</th>
            <th>Klant</th>
            <th>Artikel</th>
            <th>Datum</th>
            <th>Status</th>
            <th>Bestel aantal</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($verkooporders as $verkooporder) : ?>
            <tr>
                <td><?php echo $verkooporder['verkOrdId']; ?></td>
                <td>(<?php echo $verkooporder['klantId']; ?>) <?php echo $verkooporder['klantnaam']; ?></td>
                <td>(<?php echo $verkooporder['artId']; ?>) <?php echo $verkooporder['artOmschrijving']; ?></td>
                <td><?php echo $verkooporder['verkOrdDatum']; ?></td>
                <td><?php echo $verkooporder['verkOrdStatus']; ?></td>
                <td><?php echo $verkooporder['verkOrdBestAantal']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    <a href="index.php" class="back-btn">Terug naar hoofdmenu</a>
</body>
</html>
