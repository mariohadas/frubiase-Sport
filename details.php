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
    //Daten aus dem Formular extrahieren
    $anrede = $_POST['anrede'];
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $geburtsdatum = $_POST['geburtsdatum'];
    $TShirtGroesse = $_POST['TShirtGroesse'];

    $plz = $_POST['plz'];
    $ort = $_POST['ort'];
    $strasse = $_POST['strasse'];
    $hausnummer = $_POST['hausnummer'];

    $email = $_POST['email'];
    $telefonnummer = $_POST['telefonnummer'];

    $puzzleZeit = $_POST['elapsed_time'];

    // Datenbankverbindung herstellen
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Fehlermodus auf Ausnahmen setzen
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL-Abfrage vorbereiten
    $stmt_address = $conn->prepare("INSERT INTO Adresse (plz, ort, strasse, hausnummer) VALUES (:plz, :ort, :strasse, :hausnummer)");
    // Parameter binden
    $stmt_address->bindParam(':plz', $plz);
    $stmt_address->bindParam(':ort', $ort);
    $stmt_address->bindParam(':strasse', $strasse);
    $stmt_address->bindParam(':hausnummer', $hausnummer);

    // SQL-Abfrage ausführen
    $stmt_address->execute();

    // Die letzte eingefügte ID abrufen
    $adresseID = $conn->lastInsertId();

    // SQL-Abfrage vorbereiten
    $stmt_kontakt = $conn->prepare("INSERT INTO Kontakt (email, telefonnummer) VALUES (:email, :telefonnummer)");
    // Parameter binden
    $stmt_kontakt->bindParam(':email', $email);
    $stmt_kontakt->bindParam(':telefonnummer', $telefonnummer);

    // SQL-Abfrage ausführen
    $stmt_kontakt->execute();

    // Die letzte eingefügte ID abrufen
    $kontaktID = $conn->lastInsertId();   

    // SQL-Abfrage vorbereiten
    $stmt_person = $conn->prepare("INSERT INTO Person (anrede, vorname, nachname, geburtsdatum, TShirtGroesse, adresseID, kontaktID, puzzleZeit) VALUES (:anrede, :vorname, :nachname, :geburtsdatum, :TShirtGroesse, :adresseID, :kontaktID, :puzzleZeit)");
    // Parameter binden
    $stmt_person->bindParam(':anrede', $anrede);
    $stmt_person->bindParam(':vorname', $vorname);
    $stmt_person->bindParam(':nachname', $nachname);
    $stmt_person->bindParam(':geburtsdatum', $geburtsdatum);
    $stmt_person->bindParam(':TShirtGroesse', $TShirtGroesse);
    $stmt_person->bindParam(':adresseID', $adresseID);
    $stmt_person->bindParam(':kontaktID', $kontaktID);
    $stmt_person->bindParam(':puzzleZeit', $puzzleZeit);

    // SQL-Abfrage ausführen
    $stmt_person->execute();
    
    
}catch(PDOException $e) {
    echo "Fehler: " . $e->getMessage();
}


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
        $puzzleZeit = $user['puzzleZeit'];

        // Platzierung berechnen: Anzahl der Personen mit einer besseren Zeit
        $stmt = $conn->prepare("SELECT COUNT(*) as `rank` FROM Person WHERE puzzleZeit < :puzzleZeit");
        $stmt->bindParam(':puzzleZeit', $puzzleZeit);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $rank = $result['rank'] + 1; // Da COUNT(*) die Anzahl der Personen mit besserer Zeit liefert, ist die Platzierung um 1 höher

        // Hier könnten Sie den Rang weiterverwenden oder speichern
        // Beispiel: $savedRank = $rank;

        // Anzeige der Platzierung (oder Speichern in einer Variablen)


    } else {
        echo "Keine Daten gefunden.";
    }
} catch(PDOException $e) {
    echo "Fehler: " . $e->getMessage();
}


$conn = null; // Verbindung schließen






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frubiase</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- Header Section Start-->
    <!-- Header Section Start-->
    <!-- Header Section Start-->
    <header>
        <div class="navbar myContainer">
            <div class="nav-items">
                <ul>
                    <li><a href="index.php#puzzle"> Gewinnspiel </a></li>
                    <li><a href="index.php#prices"> Preise </a></li>
                </ul>
            </div>
            <div class="nav-logo">
                <a href="./index.php">
                    <img src="./images/logo.svg" alt="Logo">
                </a>
            </div>
            <div class="nav-items">
                <ul>
                    <li><a href="index.php#leaderboard"> Platzierung </a></li>
                    <li><a href="index.php#contact"> Kontakt </a></li>
                </ul>
            </div>
            <div id="hamburger-menu">&#9776;</div>
        </div>

        <div id="mobile-menu">
            <div class="mobile-nav-items">
                <ul>
                    <li><a href="#"> Gewinnspiel </a></li>
                    <li><a href="#"> Preise </a></li>
                    <li><a href="#"> Platzierung </a></li>
                    <li><a href="#"> Kontakt </a></li>
                </ul>
            </div>
            <div id="hamburger-cross">&#10006;</div>
        </div>
    </header>
    <!-- Header Section End -->
    <!-- Header Section End -->
    <!-- Header Section End -->

    <!-- Details Page Section -->
    <!-- Details Page Section -->
    <!-- Details Page Section -->
    <div class="details-page">
        <div class="details-container myContainer">
            
            
            <h1>#<?php echo $rank;?></h1>
            <div class="info">Vielen Dank für deine Teilnahme am Gewinnspiel. Auf der Startseite hast du ein Überblick,
                was
                du mit deiner aktuellen Platzierung gewonnen hast.</div>
            <div id="userData">
                <p><strong>T-Shirt:</strong> <span id="userSize" style="text-transform: uppercase;"><?php echo htmlspecialchars($TShirtGroesse); ?></span></p>
                <p><strong>Name:</strong> <span id="userName"><?php echo htmlspecialchars($vorname); ?></span></p>
                <p><strong>Zeit:</strong> <span id="completionTime"><?php echo htmlspecialchars($puzzleZeit); ?>s</span></p>

            </div>
            <div class="button-container">
                <a href="index.php"><button>Zurück zur Startseite</button></a>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="./js/script.js"></script>

</body>

</html>