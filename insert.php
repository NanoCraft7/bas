<?php
require_once 'classes/userclass.php';

    if(isset($_POST["submit"])) {
        $user = new UserClass();

        // Gegevens van het nieuwe klantformulier
        $klantnaam = $_POST['klantnaam'];
        $klantEmail = $_POST['klantEmail'];
        $klantAdres = $_POST['klantAdres'];
        $klantPostcode = $_POST['klantPostcode'];
        $klantWoonplaats = $_POST['klantWoonplaats'];

        // Toevoegen van een nieuwe klant met behulp van de UserClass
        $user->addUser($klantnaam, $klantEmail, $klantAdres, $klantPostcode, $klantWoonplaats);

        echo "De klant is succesvol toegevoegd aan de database.";
    } else {
        echo "Niet alle vereiste velden zijn ingevuld.";
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
        <form method="POST" action="insert.php">
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

            <input type="submit" value="Toevoegen">
        </form>
    </body>
</html>