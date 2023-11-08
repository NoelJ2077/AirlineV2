<?php
function status() {
    global $conn;
    
    if ($conn) {
        $statusText = '<span style="color: green;">Verbunden</span>';
    } else {
        $statusText = '<span style="color: red;">Getrennt</span>';
    }
    return $statusText;
}
?>
