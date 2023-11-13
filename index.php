<?php

session_start();
require("db/createDB.php");
include("db/status.php");
include("db/connector.php");

// eg: http://localhost:8080/index.php?page=home
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "home";
}

// HTML Element : title / div class="content"
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
    case "logout":
        $pageTitle = "Abmelden";
        $pageContent = "content/logout.php";
        break;
    default:
        $pageTitle = "Home";
        $pageContent = "content/home.php";
        break;
}
include("template.php");
?>
