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
function loggedUser() {
    return isset($_SESSION["username"]) ? '<span style="color: green;">'.$_SESSION["username"].'</span>' : '<span style="color: orange;">Nicht angemeldet</span>';
}
?>
