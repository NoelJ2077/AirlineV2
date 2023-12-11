<?php
function status() {
    // used from db/connector.php
    global $dbstatus;
    
    if ($dbstatus) {
        $statusText = '<span style="color: green;">Verbunden</span>';
    } else {
        $statusText = '<span style="color: red;">Getrennt</span>';
    }
    return $statusText;
}
function loggedUser() { // get username linked to userid
    global $dbstatus;
    try {
        $stmt = $dbstatus->prepare("SELECT username FROM Benutzer WHERE userID = :userID");
        $stmt->bindParam(':userID', $_SESSION['userID']);
        $stmt->execute();
        
    } catch (PDOException $e) {
        echo "Fehler: " . $e->getMessage();
    }
    // print username
    return isset($_SESSION["username"]) ? '<span style="color: green;">'.$_SESSION["username"].'</span>' : '<span style="color: orange;">Nicht angemeldet</span>';
}
function checkLogin() { // prevent unauthorized access
    try {
        if (!isset($_SESSION['userID'])) {
            header("Location: index.php?page=zgVerweigert");
            exit();
        }
    }
    catch (PDOException $e) {
        echo "Fehler: " . $e->getMessage();
    }
}

?>
