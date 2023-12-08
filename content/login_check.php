<?php
// debug login_check.php



function loginUser($email, $password) {
    global $dbstatus; // Access the database connection

    try {
        // Fetch user data by email
        $stmt = $dbstatus->prepare("SELECT * FROM Benutzer WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
       
        if ($user) {
            // Check if password matches the hashed password
            if (password_verify($password, $user['password'])) {
                // auth successful & put user data into session
                $_SESSION['userID'] = $user['userID'];
                $_SESSION['email'] = $user['email'];
                // username is set in loggedUser()
                header("Location: index.php?page=home");
                exit();
            } else {
                echo '<span style="color: red;">' . "Password verification failed!" . '</span>';
            }
        } else {
            echo '<span style="color: red;">' . "User not found!" . '</span>';
        }
    } catch (PDOException $e) {
        // db errors
        echo "Fehler: " . $e->getMessage();
    }
}





function registerUser($username, $email, $password) {
    global $dbstatus;

    try {
        // check if email already exists
        $checkStmt = $dbstatus->prepare("SELECT * FROM Benutzer WHERE email = :email");
        $checkStmt->bindParam(':email', $email);
        $checkStmt->execute();

        if ($checkStmt->rowCount() > 0) {
            echo '<span style="color: red;">' . "Diese E-Mail ist bereits vergeben!" . '</span>';
            return;
        } else {
            
            $userID = uniqid();

            // Hash the password before inserting into the database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $insertStmt = $dbstatus->prepare("INSERT INTO Benutzer (username, email, password, userID) VALUES (:username, :email, :password, :userID)");
            $insertStmt->bindParam(':username', $username);
            $insertStmt->bindParam(':email', $email);
            $insertStmt->bindParam(':password', $hashedPassword);
            $insertStmt->bindParam(':userID', $userID);
            $insertStmt->execute();
            echo '<span style="color: green;">' . "Registrierung erfolgreich!" . '</span>';
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
