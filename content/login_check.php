<?php

function loginUser($username, $password) {
    global $dbstatus; // from connector.php

    try {
        $stmt = $dbstatus->prepare("SELECT * FROM Benutzer WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        // delivers an array with the user data from the db
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // auth successful
            session_start();
            $_SESSION['username'] = $user['username'];
            header("Location: index.php?page=home");
            exit();
        } else {
            // auth failed
            echo "Anmeldung fehlgeschlagen!";
        }
    } catch (PDOException $e) {
        echo "Fehler: " . $e->getMessage();
    }
}
function registerUser($username, $password) {
    global $dbstatus;

    try {
        // check if already exists
        $checkStmt = $dbstatus->prepare("SELECT * FROM Benutzer WHERE username = :username");
        $checkStmt->bindParam(':username', $username);
        $checkStmt->execute();

        if ($checkStmt->rowCount() > 0) {
            echo "Benutzername bereits vergeben!";
        } else {
            // add user into db
            $insertStmt = $dbstatus->prepare("INSERT INTO Benutzer (username, password) VALUES (:username, :password)");
            $insertStmt->bindParam(':username', $username);
            $insertStmt->bindParam(':password', $password);
            $insertStmt->execute();
            echo "Registrierung erfolgreich!";
        }
    } catch (PDOException $e) {
        echo "Fehler: " . $e->getMessage();
    }
}
function logoutUser() {
    session_start();
    session_unset();
    session_destroy();
    header("Location: index.php?page=login");
    exit();
}
?>
