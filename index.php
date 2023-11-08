<?php
include("db/createDB.php");
include("db/status.php");

// Bestimmen Sie den ausgewählten Navigationspunkt (z. B. durch eine URL-Variable)
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "home";
}

// HTML Element : title und div class="content" für jeden Navigationspunkt
switch ($page) {
    case "home":
        $pageTitle = "Home";
        $pageContent = "content/home.php";
        break;
    case "kontenplan":
        $pageTitle = "Kontenplan";
        $pageContent = "content/kontenplan.php";
        break;
    case "hauptbuch":
        $pageTitle = "Hauptbuch";
        $pageContent = "content/hauptbuch.php";
        break;
    case "buchung":
        $pageTitle = "Buchung";
        $pageContent = "content/buchung.php";
        break;
    case "login":
        $pageTitle = "Anmelden";
        $pageContent = "content/login.php";
        break;
    default:
        $pageTitle = "Home";
        $pageContent = "content/home.php";
        break;
}

include("template.php");
?>
