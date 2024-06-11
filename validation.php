<?php
// Fehler-Reporting aktivieren
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Datenbankverbindung herstellen
$servername = "db5015939564.hosting-data.io";
$username = "dbu1674238"; // Benutzername der Datenbank
$password = "B6(+dJO14PG!NS7"; // Passwort der Datenbank
$dbname = "dbs12991471"; // Name der Datenbank

try {
    // Datenbankverbindung herstellen
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Fehlermodus auf Ausnahmen setzen
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Daten des letzten eingefügten Benutzers abrufen
    $stmt = $conn->prepare("SELECT vorname, nachname, puzzleZeit FROM Person ORDER BY personID DESC LIMIT 1");
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $vorname = $user['vorname'];
        $nachname = $user['nachname'];
        $puzzleZeit = $user['puzzleZeit'];

        // Platzierung berechnen: Anzahl der Personen mit einer besseren Zeit
        $stmt = $conn->prepare("SELECT COUNT(*) as `rank` FROM Person WHERE puzzleZeit < :puzzleZeit");
        $stmt->bindParam(':puzzleZeit', $puzzleZeit);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $rank = $result['rank'] + 1; // Da COUNT(*) die Anzahl der Personen mit besserer Zeit liefert, ist die Platzierung um 1 höher

        // Anzeige der Daten
        echo "<h1>Herzlichen Glückwunsch, du bist Platz $rank!</h1>";
        echo "<p>Deine Daten:</p>";
        echo "<p>Vorname: $vorname</p>";
        echo "<p>Nachname: $nachname</p>";
        echo "<p>Zeit für das Puzzle: $puzzleZeit</p>";
    } else {
        echo "Keine Daten gefunden.";
    }
} catch(PDOException $e) {
    echo "Fehler: " . $e->getMessage();
}

$conn = null; // Verbindung schließen
?>
