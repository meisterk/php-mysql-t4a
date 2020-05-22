<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schülerverwaltung</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Schülerverwaltung</h1>
    <h2>Liste</h2>
    <table>
        <tr>
            <th>Vorname</th>
            <th>Nachname</th>
        </tr>

        <?php
        // DATA
        $databasename = 'testdatabase';
        $username = 'testuser';
        $password = '123';

        // Root-Connection to MySQL/MariaDB
        $pdo = new PDO(
            "mysql:host=localhost;dbname=$databasename",
            $username,
            $password
        );

        // Show errors
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create new schueler
        if(isset($_POST['vorname']) && isset($_POST['nachname'])){
            $vorname = $_POST['vorname'];
            $nachname = $_POST['nachname'];
            // SQL-Injection verhindern bei Eingabe: Prepared Statements          
            $sql = "INSERT INTO schueler SET vorname = ?, nachname = ?";
            $statement = $pdo->prepare($sql);
            $statement->execute([$vorname, $nachname]);
        }

        // Display data
        $sql = "SELECT * FROM schueler ORDER BY vorname DESC";
        foreach ($pdo->query($sql) as $zeile) {
            // XSS (Cross-Site-Scripting),
            // HTML-Injection, JavaScript-Injection
            // bei der Ausgabe verhindern
            $vorname = htmlspecialchars($zeile['vorname']);
            $nachname = htmlspecialchars($zeile['nachname']);
            echo "<tr><td>$vorname</td><td>$nachname</td></tr>";
        }
        ?>
    </table>
    <a class="button" href="new.html">Neue Schüler_in erstellen</a>
</body>

</html>