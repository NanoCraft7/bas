<?php

require_once 'classes/artikel.php';
$artikel = new Artikel();

// Haal de lijst met artikelen op
$artikelen = $artikel->getArtikelen();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Artikelen inzien</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/index.css">
</head>
<body>
    <h2>Artikelen inzien</h2>

    <h3>Artikelen</h3>
    <table>
    <thead>
        <tr>
            <th>Artikel ID</th>
            <th>Omschrijving</th>
            <th>Inkoop</th>
            <th>Verkoop</th>
            <th>Voorraad</th>
            <th>Minimale voorraad</th>
            <th>Maximale voorraad</th>
            <th>Locatie</th>
            <th>Leverancier</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($artikelen as $artikel) : ?>
            <tr>
                <td><?php echo $artikel['artId']; ?></td>
                <td><?php echo $artikel['artOmschrijving']; ?></td>
                <td><?php echo $artikel['artInkoop']; ?></td>
                <td><?php echo $artikel['artVerkoop']; ?></td>
                <td><?php echo $artikel['artVoorraad']; ?></td>
                <td><?php echo $artikel['artMinVoorraad']; ?></td>
                <td><?php echo $artikel['artMaxVoorraad']; ?></td>
                <td><?php echo $artikel['artLocatie']; ?></td>
                <td><?php echo $artikel['levId']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    <a href="index.php" class="back-btn">Terug naar hoofdmenu</a>
</body>
</html>
