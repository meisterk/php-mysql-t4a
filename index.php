<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schülerverwaltung</title>
</head>

<body>
    <h1>Schülerverwaltung</h1>
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

        $sql = "SELECT * FROM schueler";
        foreach ($pdo->query($sql) as $zeile) {
            $vorname = $zeile['vorname'];
            $nachname = $zeile['nachname'];
            echo "<tr><td>$vorname</td><td>$nachname</td></tr>";
        }
        ?>
    </table>
</body>

</html>