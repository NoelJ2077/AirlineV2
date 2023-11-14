<?php

$servername = "localhost";
$username = "root";
$password = ""; // no password
$dbname = "airlinev2";

try {
    // connect -> server
    $serverConnection = new PDO("mysql:host=$servername", $username, $password);
    $serverConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // connect -> database
    $dbstatus = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $dbstatus->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // print error message
    echo "Fehler: " . $e->getMessage();
}
?>
