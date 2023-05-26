<?php
require_once 'classes/userclass.php';

if (isset($_POST["submit"])) {
    // Ontvang de formuliervelden
    $klantnaam = $_POST['klantnaam'];
    $klantEmail = $_POST['klantEmail'];
    $klantAdres = $_POST['klantAdres'];
    $klantPostcode = $_POST['klantPostcode'];
    $klantWoonplaats = $_POST['klantWoonplaats'];

    // Maak een nieuwe User-object aan
    $user = new User();

    // Voeg de gebruiker toe aan de database
    $user->addUser($klantnaam, $klantEmail, $klantAdres, $klantPostcode, $klantWoonplaats);

    // Bevestiging bericht
    echo "De klant is succesvol toegevoegd aan de database.";
}
?>

<!-- HTML-formulier om een nieuwe klant toe te voegen -->
<!DOCTYPE html>
<html>
    <head>
        <title>Nieuwe klant toevoegen</title>
    </head>
    <body>
        <h1>Nieuwe klant toevoegen</h1>
        <form method="POST" action="">
            <label for="klantnaam">Klantnaam:</label>
            <input type="text" id="klantnaam" name="klantnaam" required><br>

            <label for="klantEmail">Email:</label>
            <input type="email" id="klantEmail" name="klantEmail" required><br>

            <label for="klantAdres">Adres:</label>
            <input type="text" id="klantAdres" name="klantAdres" required><br>

            <label for="klantPostcode">Postcode:</label>
            <input type="text" id="klantPostcode" name="klantPostcode" required><br>

            <label for="klantWoonplaats">Woonplaats:</label>
            <input type="text" id="klantWoonplaats" name="klantWoonplaats" required><br>

            <input type="submit" name="submit" value="Toevoegen">
        </form>
    </body>
</html>
