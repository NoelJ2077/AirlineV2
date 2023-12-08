<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airlinev2";

try {
    // connect to db
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // global var for xyz.php
    $dbstatus = $conn;
} catch(PDOException $e) {
    // errors
    die("Verbindung fehlgeschlagen: " . $e->getMessage());
}
?>
