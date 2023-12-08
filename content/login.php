<?php
include_once("login_check.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        // Je nach Aktion die entsprechende Funktion aufrufen
        $action = $_POST['action'];

        switch ($action) {
            case 'login':
                loginUser($_POST['email'], $_POST['password']);
                break;

            case 'register':
                registerUser($_POST['username'], $_POST['email'], $_POST['password']);
                break;

            case 'logout':
                logoutUser();
                header("Location: index.php?page=home");
                break;

            default:
                // sollte niemals passieren!
                echo "Ungültige Aktion!";
                break;
        }
    }
}
?>

<p>Willkommen auf der Login-Seite.</p>
<p>Bitte melden Sie sich an oder registrieren Sie sich.</p>
<!-- Login Form -->
<form class="login" method="post">
    <input type="email" name="email" placeholder="E-Mail" required>
    <input type="password" name="password" placeholder="Passwort" required>
    <div class="button-container">
        <button type="submit" name="action" value="login">Anmelden</button>
        <button type="button" id="showUsername">Registrieren</button>
    </div>
</form>
<!-- Register Form -->
<form class="register" method="post" style="display: none;">
    <input type="email" name="email" placeholder="E-Mail" required>
    <input type="password" name="password" placeholder="Passwort" required>
    <input type="text" name="username" placeholder="Benutzername" required>
    <div class="button-container">
        <button type="button" id="goBack">Zurück</button>    
        <button type="submit" name="action" value="register">Registrieren</button>
    </div>
</form>
<!-- Logout Form (always visible) -->
<form class="logout" method="post">
    <button type="submit" name="action" value="logout">Abmelden</button>
</form>

<script> // Switches from login <-> register form & back
    document.addEventListener("DOMContentLoaded", function() {
        const showUsernameButton = document.getElementById("showUsername");
        const registerForm = document.querySelector(".register");
    
        showUsernameButton.addEventListener("click", function() {
            showUsernameButton.style.display = "none";
            registerForm.style.display = "block";
            // make login form invisible
            const loginForm = document.querySelector(".login");
            loginForm.style.display = "none";
            // goBack button
            const goBackButton = document.getElementById("goBack");
            goBackButton.addEventListener("click", function() {
                showUsernameButton.style.display = "block";
                registerForm.style.display = "none";
                loginForm.style.display = "block";
            });
        });
    });
</script>