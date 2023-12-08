<!-- $pageContent from index.php -> template.php -->
<div class="myAccount">

    <h2>Mein Konto</h2>
    <p>Benutzername: <?php echo loggedUser(); ?></p>
    <p>Email: <?php echo $_SESSION['email']; ?></p>
    <p>BenutzerID: <?php echo $_SESSION['userID']; ?></p>
    <p>Passwort: <?php echo $_SESSION['password']; ?></p>


</div>