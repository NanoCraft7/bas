<!DOCTYPE html>
<html>
<head>
    <title>Klanten</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/index.css">
    <style>
        .scrollable-table {
            max-height: 300px;
            overflow-y: scroll;
        }
    </style>
</head>
<body>
    <?php
    require_once 'classes/userclass.php';

    $user = new User();

    // Haal de lijst met klanten op
    $klanten = $user->getKlanten();

    // Zoekresultaten initialiseren
    $zoekresultaten = array();

    // Verwerken van het zoekformulier
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $zoekKlantId = $_POST['zoekKlantId'];

        // Zoek de klant op basis van klant-ID
        $zoekresultaten = $user->zoekKlantOpId($zoekKlantId);
    }

    // Verwerken van het verwijderformulier
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verwijderKlantId'])) {
        $verwijderKlantId = $_POST['verwijderKlantId'];

        // Verwijder de klant
        $user->verwijderKlant($verwijderKlantId);

        // Herlaad de lijst met klanten
        $klanten = $user->getKlanten();
    }
    ?>

    <h2>Klanten</h2>

    <h3>Alle klanten</h3>
    <div class="scrollable-table">
        <table>
            <thead>
                <tr>
                    <th>Klant ID</th>
                    <th>Klant Naam</th>
                    <th>Klant Email</th>
                    <th>Klant Adres</th>
                    <th>Klant Postcode</th>
                    <th>Klant Woonplaats</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($klanten as $klant) : ?>
                    <tr>
                        <td><?php echo $klant['klantid']; ?></td>
                        <td><?php echo $klant['klantnaam']; ?></td>
                        <td><?php echo $klant['klantEmail']; ?></td>
                        <td><?php echo $klant['klantAdres']; ?></td>
                        <td><?php echo $klant['klantPostcode']; ?></td>
                        <td><?php echo $klant['klantWoonplaats']; ?></td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="verwijderKlantId" value="<?php echo $klant['klantid']; ?>">
                                <input type="submit" value="Verwijderen">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <h3>Zoeken op klant ID</h3>
    <form method="post" action="klanten.php">
        <label for="zoekKlantId">Klant ID:</label>
        <input type="text" id="zoekKlantId" name="zoekKlantId" required>
        <input type="submit" value="Zoeken">
    </form>

    <?php if (!empty($zoekresultaten)) : ?>
        <h3>Zoekresultaten</h3>
        <table>
            <thead>
                <tr>
                    <th>Klant ID</th>
                    <th>Klant Naam</th>
                    <th>Klant Email</th>
                    <th>Klant Adres</th>
                    <th>Klant Postcode</th>
                    <th>Klant Woonplaats</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($zoekresultaten as $resultaat) : ?>
                    <tr>
                        <td><?php echo $resultaat['klantid']; ?></td>
                        <td><?php echo $resultaat['klantnaam']; ?></td>
                        <td><?php echo $resultaat['klantEmail']; ?></td>
                        <td><?php echo $resultaat['klantAdres']; ?></td>
                        <td><?php echo $resultaat['klantPostcode']; ?></td>
                        <td><?php echo $resultaat['klantWoonplaats']; ?></td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="verwijderKlantId" value="<?php echo $resultaat['klantid']; ?>">
                                <input type="submit" value="Verwijderen">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <a href="index.php" class="back-btn">Terug naar hoofdmenu</a>
</body>
</html>
