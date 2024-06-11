<?php
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

    $puzzleZeit = $_POST['puzzleZeit'];

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

    echo "Daten erfolgreich in die Datenbank eingefügt.";
    // Weiterleitung nach 2 Sekunden an die validation.php
    header("refresh:2;url=validation.php");
    exit();
}catch(PDOException $e) {
    echo "Fehler: " . $e->getMessage();
}
$conn = null; // Verbindung schließen
?>