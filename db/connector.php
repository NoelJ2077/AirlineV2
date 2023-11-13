<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airlinev2";

try {
    // connect to server
    $serverConnection = new PDO("mysql:host=$servername", $username, $password);
    $serverConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // connect to database
    $dbstatus = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $dbstatus->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Fehler: " . $e->getMessage();
}

?>
