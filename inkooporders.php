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
            <th>Actie</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td>9</td>
                <td>(51) Doritos Co.</td>
                <td>(16) NFT Pepe Bee</td>
                <td>2023-01-05</td>
                <td>1</td>
                <td>5</td>
                <td>
                    <form>
                        <select name="inkOrdStatus">
                            <option value="0">In behandeling</option>
                            <option value="1"selected>Verzonden</option>
                            <option value="2">Geleverd</option>
                        </select>
                        <input type="submit" value="Bijwerken">
                    </form>
                    <a href="inkooporder_update.php">Bijwerken</a>
                    <a href="inkooporders.php" onclick="return confirm('Weet je zeker dat je deze inkooporder wilt verwijderen?')">Verwijderen</a>
                </td>
            </tr>
            <tr>
                <td>10</td>
                <td>(52) Mountain Dew In</td>
                <td>(17) Viral Cat T-</td>
                <td>2023-02-10</td>
                <td>0</td>
                <td>10</td>
                <td>
                    <form>
                        <select name="inkOrdStatus">
                            <option value="0"selected>In behandeling</option>
                            <option value="1">Verzonden</option>
                            <option value="2">Geleverd</option>
                        </select>
                        <input type="submit" value="Bijwerken">
                    </form>
                    <a href="inkooporder_update.php">Bijwerken</a>
                    <a href="inkooporders.php" onclick="return confirm('Weet je zeker dat je deze inkooporder wilt verwijderen?')">Verwijderen</a>
                </td>
            </tr>
    </tbody>
    </table>
    <a href="index.php" class="back-btn">Terug naar hoofdmenu</a>
</body>
</html>