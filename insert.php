<?php
require_once 'classes/userclass.php';

$user = new UserClass();

// Gegevens van het nieuwe klantformulier
$klantnaam = $_POST['klantnaam'];
$klantEmail = $_POST['klantEmail'];
$klantAdres = $_POST['klantAdres'];
$klantPostcode = $_POST['klantPostcode'];
$klantWoonplaats = $_POST['klantWoonplaats'];

// Toevoegen van een nieuwe klant met behulp van de UserClass
$user->addUser($klantnaam, $klantEmail, $klantAdres, $klantPostcode, $klantWoonplaats);
?>


<!-- HTML-formulier om een nieuwe klant toe te voegen -->
<form method="POST" action="">
    <label for="klantnaam">Klantnaam:</label>
    <input type="text" name="klantnaam" required><br>

    <label for="klantEmail">E-mailadres:</label>
    <input type="email" name="klantEmail" required><br>

    <label for="klantAdres">Adres:</label>
    <input type="text" name="klantAdres" required><br>

    <label for="klantPostcode">Postcode:</label>
    <input type="text" name="klantPostcode" pattern="[0-9]{4}[A-Za-z]{2}" required><br>

    <label for="klantWoonplaats">Woonplaats:</label>
    <input type="text" name="klantWoonplaats" required><br>

    <input type="submit" value="Opslaan">
</form>
