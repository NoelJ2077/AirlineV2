<?php
include_once("login_check.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        // Je nach Aktion die entsprechende Funktion aufrufen
        $action = $_POST['action'];

        switch ($action) {
            case 'login':
                loginUser($_POST['username'], $_POST['password']);
                break;

            case 'register':
                registerUser($_POST['username'], $_POST['password']);
                break;

            case 'logout':
                logoutUser();
                header("Location: index.php?page=home");
                break;

            default:
                // sollte nicht passieren
                echo "Ungültige Aktion!";
                break;
        }
    }
}
?>

<p>Willkommen auf der Login-Seite.</p>
<p>Bitte melden Sie sich an oder registrieren Sie sich.</p>
<form class="login" method="post">
    <input type="text" name="username" placeholder="Benutzername" required>
    <input type="password" name="password" placeholder="Passwort" required>
    <div class="button-container">
        <button type="submit" name="action" value="login">Anmelden</button>
        <button type="submit" name="action" value="register">Registrieren</button>
    </div>
</form>
<form class="logout" method="post">
    <button type="submit" name="action" value="logout">Abmelden</button>
</form>

