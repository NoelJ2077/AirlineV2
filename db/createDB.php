<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airlinev2";

try {
    // Connect to server
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $createDBSQL = "CREATE DATABASE IF NOT EXISTS $dbname";
    $conn->exec($createDBSQL);

    // Connect to created db
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // tables 1 & 2 & 3
    $createTableSQL1 = "CREATE TABLE IF NOT EXISTS Kontenplan (
        KontoNr INT PRIMARY KEY,
        Bezeichnung VARCHAR(30) NOT NULL,
        Soll DECIMAL(10,2) NOT NULL,
        Haben DECIMAL(10,2) NOT NULL
    )";
    $conn->exec($createTableSQL1);

    $createTableSQL2 = "CREATE TABLE IF NOT EXISTS Hauptbuch (
        Datum DATE NOT NULL,
        Sollkonto INT,
        Habenkonto INT,
        Notizen VARCHAR(40),
        Betrag DECIMAL(10,2) NOT NULL,
        FOREIGN KEY (Sollkonto) REFERENCES Kontenplan(KontoNr)
    )";
    $conn->exec($createTableSQL2);

    $createTableSQL3 = "CREATE TABLE IF NOT EXISTS Benutzer (
        username VARCHAR(30) PRIMARY KEY,
        password VARCHAR(30) NOT NULL
    )";
    $conn->exec($createTableSQL3);
    
} catch(PDOException $e) {
    echo "Fehler: " . $e->getMessage();
}
    // close connection (use connector.php !)
    $conn = null;
?>
