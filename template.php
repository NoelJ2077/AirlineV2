<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>Flugbuchungsverwaltung V2</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <nav>
            <ul>
                <li id="user">Angemeldet als: <?php echo loggedUser(); ?></li>
                <li><a href="index.php?page=login">Anmelden</a></li>
                <li><a href="index.php?page=home">Home</a></li>
                <li><a href="index.php?page=kontenplan">Kontenplan</a></li>
                <li><a href="index.php?page=hauptbuch">Hauptbuch</a></li>
                <li><a href="index.php?page=buchung">Buchung</a></li>
                <li><a href="index.php?page=logout">Abmelden</a></li>
                <li id="status">DB Status: <?php echo status(); ?></li>
            </ul>
        </nav>
        <div class="content">
            <h1><?php echo $pageTitle; ?></h1>
            <?php include($pageContent); ?>
        </div>
        <footer>
            <p>&copy; 2023 - Flugbuchungsverwaltung V2</p>
        </footer>
    </body>
</html>
