<?php
require 'db.php';

$db = new Database();

// Gegevens van het nieuwe klantformulier
$klantnaam = $_POST['klantnaam'];
$klantEmail = $_POST['klantEmail'];
$klantAdres = $_POST['klantAdres'];
$klantPostcode = $_POST['klantPostcode'];
$klantWoonplaats = $_POST['klantWoonplaats'];

// Query voor het toevoegen van een nieuwe klant
$query = "INSERT INTO klanten (klantnaam, klantEmail, klantAdres, klantPostcode, klantWoonplaats) 
          VALUES (?, ?, ?, ?, ?)";

// Parameters voor de query
$params = array($klantnaam, $klantEmail, $klantAdres, $klantPostcode, $klantWoonplaats);

// Uitvoeren van de query
$db->executeQuery($query, $params);
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
